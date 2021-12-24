<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view = 'index';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->load->helper(array(
            'string',
            'my'
        ));
        $this->load->library(array(
            'admin/admin_auth',
            'admin/admin_pagination',
            'form_validation'
        ));
        $this->load->model(array(
            'admin/article_model',
            'admin/article_relation_model',
            'admin/tags_model'
        ));
        $this->admin_auth->check_login();
    }

    public function index()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page']))
            $get['page'] = 1;
        if (!isset($get['key']))
            $get['key'] = null;
        if (!isset($get['category']))
            $get['category'] = null;
        if (!isset($get['order']))
            $get['order'] = 'desc';
        $total_recod = $this->article_model->Db_count_index($get);
        $list = $this->article_model->Db_get_index($get, $this->limit);
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get'] = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function add()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['id'])) {
            $insert['state'] = 0;
            $insert['created_date'] = time();
            $insert['created_by'] = $this->admin_auth->get_colum('id');
            $this->article_model->db->insert('article', $insert);
            $id = $this->article_model->db->select_max('id')->get('article')->row('id');
            redirect(base_url('admin/article/add?id=' . $id));
        }
        if ($_POST) {
            if ($this->form_validation->run('add_article') == true) {
                $post = $this->input->post();
                $update['name'] = $post['name'];
                $this->load->library('admin/admin_validateslug');
                $slug = $this->admin_validateslug->validation($update['name']);
                $check_slug = $this->article_model->db->where('slug', $slug)->get('article')->row_array();
                if (!empty($check_slug)) {
                    $slug = $slug .= '-' . $get['id'];
                }
                $update['slug'] = $slug;
                $update['parent'] = $post['parent'];
                $avatar = explode('/', $post['avatar']);
                $update['avatar'] = array_pop($avatar);
                $update['article_relation'] = serialize($post['article_relation']);
                $update['article_category'] = serialize($post['article_category']);
                /** Image 01 and 02 **/
                $image1 = explode('/', $post['image1']);
                $update['image1'] = array_pop($image1);
                $image2 = explode('/', $post['image2']);
                $update['image2'] = array_pop($image2);
                $update['alt1'] = $post['alt1'];
                $update['alt2'] = $post['alt2'];

                $update['content'] = $post['content'];
                $update['meta_form_title'] = $post['meta_form_title'];
                $update['content_1'] = $post['content_1'];
                $update['content_2'] = $post['content_2'];
                $update['summary'] = $post['summary'];
                $update['title'] = $post['title'] != '' ? $post['title'] : $post['name'];
                $update['keywords'] = $post['keywords'];
                $update['description'] = $post['description'];
                $update['state'] = $post['state'];
                $update['feature'] = $post['feature'];
                $update['follow'] = $post['follow'];
                $this->article_model->db->where('id', $get['id'])->update('article', $update);

                /** Article relation **/
                // if (isset($post['article_relations'])) {
                //     $iArticleRelation = $post['article_relations'];
                //     foreach ($iArticleRelation as $key => $value) {
                //         $articleRelationsUpdate[] = array(
                //             'article_id'    => $get['id'],
                //             'relation_id'   => $value
                //         );
                //     }
                //     $this->article_relation_model->insert($articleRelationsUpdate);
                // }

                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                if ($get['ac'] == 'save') {
                    redirect(base_url('admin/article/edit?id=' . $get['id']));
                } else {
                    redirect(base_url('admin/article/index'));
                }

            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }
        }
        $action_view_image = base_url() . 'media/images/article/' . $get['id'] . '/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['item'] = $this->article_model->Db_get_edit($get);
        // Article relations
        //$data['articleAll'] = $this->article_model->Db_get_all();
        // $data['articleRelations'] = $articleRelations = $this->article_relation_model->getArticleRelations($get['id']);
        if (empty($data['item']))
            show_404();
        $data['category'] = $this->article_model->Db_list_menu();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function edit()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            if ($this->form_validation->run('edit_article') == true) {
                $post = $this->input->post();

                $update['name'] = $post['name'];
                $slug = $post['slug'];
                if ($slug == null) {
                    $this->load->library('admin/admin_validateslug');
                    $slug = $this->admin_validateslug->validation($update['name']);
                    $check_slug = $this->article_model->db->where('slug', $slug)->get('article')->row_array();
                    if (!empty($check_slug)) {
                        $slug .= '-' . $get['id'];
                    }
                }
                if (isset($post['hoi']) && $post['dap']) {
                    $update['questionAnswer'] = $this->questionAnswer($post['hoi'], $post['dap']);
                } else {
                    $update['questionAnswer'] = '';
                }

                $update['slug'] = $slug;
                $update['parent'] = $post['parent'];
                $update['content'] = $post['content'];
                $update['content_1'] = $post['content_1'];
                $update['content_2'] = $post['content_2'];
                $update['summary'] = $post['summary'];

                $update['meta_form_title'] = $post['meta_form_title'];
                $avatar = explode('/', $post['avatar']);
                $update['avatar'] = array_pop($avatar);
                $update['article_relation'] = serialize($post['article_relation']);
                $update['article_category'] = serialize($post['article_category']);
                /** Image 01 and 02 **/
                $image1 = explode('/', $post['image1']);
                $update['image1'] = array_pop($image1);
                $image2 = explode('/', $post['image2']);
                $update['image2'] = array_pop($image2);
                $update['alt1'] = $post['alt1'];
                $update['alt2'] = $post['alt2'];

                $update['title'] = $post['title'] != '' ? $post['title'] : $post['name'];
                $update['keywords'] = $post['keywords'];
                $update['description'] = $post['description'];
                $update['state'] = $post['state'];
                $update['feature'] = $post['feature'];
                $update['follow'] = $post['follow'];
                $update['update_date'] = time();
//                print_r($update); die;
                $this->article_model->db->where('id', $get['id'])->update('article', $update);

                /** Article relation **/
                //remove all article relation by id
                // $this->article_relation_model->removeArticleRelation($get['id']);
                // if (isset($post['article_relations'])) {
                //     $iArticleRelation = $post['article_relations'];
                //     foreach ($iArticleRelation as $key => $value) {
                //         $articleRelationsUpdate[] = array(
                //             'article_id'    => $get['id'],
                //             'relation_id'   => $value
                //         );
                //     }
                //     $this->article_relation_model->insert($articleRelationsUpdate);
                // }

                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                if ($get['ac'] == 'save') {
                    $data['success'] = $success;
                } else {
                    $this->session->set_flashdata('success', $success);
                    $page = isset($get['page']) ? (int)$get['page'] : 1;
                    redirect(base_url('admin/article/index?page=' . $page));
                }
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }
        $data['item'] = $this->article_model->Db_get_edit($get);

        if (empty($data['item']))
            show_404();
        if ($data['item']['created_by'] != $this->admin_auth->get_colum('id') && $this->admin_auth->get_colum('manage') != 1 && $this->admin_auth->get_colum('email') != $this->admin_auth->get_root_email()) {
            $this->session->set_flashdata('error', '<div class="error"><p>Bạn không thể sửa bài viết của người khác.</p></div>');
            redirect('admin/article/index');
        }
        $action_view_image = base_url() . 'media/images/article/' . $get['id'] . '/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['category'] = $this->article_model->Db_list_menu();
        $data['listTag'] = $this->tags_model->Db_get_listTags($data['item']['id'], 'article');
        $data['success'] = $this->session->flashdata('success');
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function questionAnswer($questions, $answers)
    {
        $questionAnswers = [];
        foreach ($answers as $key => $answer) {
            $questionAnswer['question'] = $questions[$key];
            $questionAnswer['answer'] = $answer;
            $questionAnswers[] = $questionAnswer;
        }
        return json_encode($questionAnswers);
    }


    public function delete()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST && !empty($_POST['cid'])) {
            $this->load->helper('file');
            $cid = $this->input->post('cid');
            $page = $this->input->post('page');
            $error = false;
            foreach ($cid as $val) {
                $created_by = $this->article_model->db->where('id', $val)->get('article')->row('created_by');
                if ($created_by == $this->admin_auth->get_colum('id') || $this->admin_auth->get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->admin_auth->get_root_email()) {
                    $this->article_model->db->where('id', $val)->delete('article');
                    $dir = MEDIAPATH . 'images/article/' . $val;
                    if (is_dir($dir)) {
                        delete_files($dir, true);
                        rmdir($dir);
                    }
                } else {
                    $error = true;
                }
            }
            if ($error)
                $this->session->set_flashdata('error', '<div class="error"><p>Bạn không thể xóa những bài viết của người khác.</p></div>');
            else
                $this->session->set_flashdata('success', '<div class="success"><p>Xóa thành công!</p></div>');
            redirect(base_url('admin/article/index'));
        }
    }

    /** Callback check slug **/
    public function check_slug($str)
    {
        $this->load->library('admin/admin_validateslug');
        $id = $this->input->post('id');
        $slug = $this->admin_validateslug->validation($this->input->post('slug'));
        $check = $this->article_model->db->where('slug', $slug)->get('article')->row_array();
        if (!empty($check) && $check['id'] != $id)
            return false;
        else
            return true;
    }

    /** AJAX ADD CATEGORY **/
    public function ajax_add_category()
    {
        if ($_POST) {
            $this->load->library('admin/admin_validateslug');
            $parent = $this->input->post('parent');
            $category = $this->input->post('category');
            $slug = $this->admin_validateslug->validation($category);
            $count = $this->article_model->db->where('slug', $slug)->count_all_results('url');
            if ($count > 0) {
                $arr['state'] = 'error';
                $arr['message'] = 'Url này đã tồn tại.';
            } else {
                $arr['state'] = 'true';
                $arr['message'] = '<option value="" selected="">' . $category . '</option>';
            }

            $this->output->set_content_type('application/json')->set_output(json_encode($arr));
        }
    }
}