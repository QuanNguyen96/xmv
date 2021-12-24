<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller
{
    public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view = 'index';
    public $default_module = array(array(
            'id' => 0,
            'title' => 'Trang đơn',
            'name' => 'single'), array(
            'id' => 0,
            'title' => 'Liên kết',
            'name' => 'hyperlink'));
    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->load->helper(array('string', 'my'));
        $this->load->library(array(
            'admin/admin_auth',
            'admin/admin_pagination',
            'admin/admin_nestedset',
            'form_validation'));
        $this->load->model(array('admin/menu_model'));
        $this->admin_auth->check_login();


    }

    public function index()
    {
        $data['position'] = $this->get_position();
        $get = $this->input->get();
        if (!isset($get['page']))
            $get['page'] = 1;
        if (!isset($get['key']))
            $get['key'] = null;
        if (!isset($get['category']))
            $get['category'] = null;
        if (!isset($get['order']))
            $get['order'] = 'desc';
        if (!isset($get['module']))
            $get['module'] = null;
        if (!isset($get['position']))
            $get['position'] = null;
        if ($get['position'] == null) {
            $total_recod = $this->menu_model->Db_count_menu($get);
            $list = $this->menu_model->Db_get_menu($get, $this->limit);
            $this->admin_pagination->set_url($get);
            $this->admin_pagination->set_total_row($total_recod);
            $this->admin_pagination->set_page_row($this->limit);
            $this->admin_pagination->set_current_page($get['page']);
            $data['view'] = 'admin/menu/menu';
        } else {
            $total_recod = $this->menu_model->Db_count_menu_position($get);
            $list = $this->menu_model->Db_get_menu_position($get, $this->limit);
            $this->admin_pagination->set_url($get);
            $this->admin_pagination->set_total_row($total_recod);
            $this->admin_pagination->set_page_row($this->limit);
            $this->admin_pagination->set_current_page($get['page']);
            $data['listSort'] = $this->menu_model->Db_get_menu_position_sort($get);
            $data['view'] = $this->action_view;
        }

        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get'] = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $module = $this->menu_model->db->select('id,name,title')->where('menu', 1)->get('module')->
            result_array();
        $data['module'] = array_merge($module, $this->default_module);
        $this->load->view($this->view, $data);
    }

    public function add()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST) {
            if ($this->form_validation->run('add_menu') == true) {
                $post = $this->input->post();
                $insert['name'] = $post['name'];
                $this->load->library('admin/admin_validateslug');
                $slug = $this->admin_validateslug->validation($insert['name']);
                $check_slug = $this->menu_model->db->where('slug', $slug)->get('menu')->
                    row_array();
                if (!empty($check_slug)) {
                    $max_id = $this->menu_model->db->select_max('id')->get('menu')->row('id') + 1;
                    $slug = $slug .= '-' . $max_id;
                }
                $insert['slug'] = $slug;
                $avatar = explode('/', $post['avatar']);
                $insert['avatar'] = array_pop($avatar);
                $insert['summary'] = $post['summary'];
                $insert['content'] = $post['content'];
                $insert['content2'] = $post['content2'];
                $insert['style_in_catalog'] = $post['style_in_catalog'];
                $insert['note1'] = $post['note1'];
                $insert['tool_relation'] = $post['tool_relation'];
                $insert['title'] = $post['title'] != '' ? $post['title'] : $post['name'];
                $insert['keywords'] = $post['keywords'];
                $insert['description'] = $post['description'];
                $insert['parent'] = $post['parent'];
                $insert['state'] = $post['state'];
                $insert['sort'] = $post['sort'];
                $insert['module'] = $post['module'];
                if (isset($post['hyperlink']))
                    $insert['hyperlink'] = $post['hyperlink'];
                $insert['link1'] = $post['link1'];
                $insert['action_link1'] = $post['action_link1'];
                $insert['link2'] = $post['link2'];
                $insert['action_link2'] = $post['action_link2'];
                $insert['router'] = $post['router'];
                $insert['filter_router'] = $post['filter_router'];
                $insert['created_date'] = time();
                $insert['created_by'] = $this->admin_auth->get_colum('id');
                $insert['update_date'] = time();
                $insert['update_by'] = $this->admin_auth->get_colum('id');
                $this->admin_nestedset->setControlParams('menu');
                if ($insert['parent'] == 0) {
                    $this->admin_nestedset->insertNewTree($insert);
                } else {
                    $parentNode = $this->menu_model->db->where('id', $insert['parent'])->get('menu')->
                        row_array();
                    $insert['level'] = $parentNode['level'] + 1;
                    $this->admin_nestedset->insertNewChild($parentNode, $insert);
                }
                $id = $this->menu_model->db->select_max('id')->get('menu')->row('id');
                //$this->menu_model->db->insert('menu',$insert);
                if (isset($post['position'])) {
                    $this->admin_nestedset->setControlParams();
                    // Lấy danh sách vị trí của menu cha;
                    $parent_position = $this->menu_model->db->where('menu_id', $post['parent'])->
                        get('position')->result_array();
                    $parent_position_array = array();
                    if (!empty($parent_position)) {
                        foreach ($parent_position as $val) {
                            $parent_position_array[$val['position']] = $val;
                        }
                    }
                    foreach ($post['position'] as $val) {
                        $this->admin_nestedset->setPosition($val);
                        $current_position = array('menu_id' => $id, 'position' => $val);
                        if (isset($parent_position_array[$val])) {
                            $current_position['level'] = $parent_position_array[$val]['level'] + 1;
                            $current_position['parent'] = $parent_position_array[$val]['id'];
                            $this->admin_nestedset->insertNewChild($parent_position_array[$val], $current_position);
                        } else {
                            $this->admin_nestedset->insertNewTree($current_position);
                        }
                    }
                }
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                if ($get['ac'] == 'save') {

                    redirect(base_url('admin/menu/edit?id=' . $id));
                } else {
                    redirect(base_url('admin/menu/index'));
                }
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }
        $action_view_image = base_url() . 'media/images/menu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $module = $this->menu_model->db->select('id,name,title')->where('menu', 1)->get('module')->
            result_array();
        $data['module'] = array_merge($module, $this->default_module);
        $data['position'] = $this->get_position();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function edit()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            if ($this->form_validation->run('edit_menu') == true) {
                $post = $this->input->post();
                $update['name'] = $post['name'];
                $update['slug'] = $post['slug'];
                $update['summary'] = $post['summary'];
                $update['content'] = $post['content'];
                $update['content2'] = $post['content2'];
                $update['style_in_catalog'] = $post['style_in_catalog'];
                $update['note1'] = $post['note1'];
                $update['sort'] = $post['sort'];
                $update['tool_relation'] = $post['tool_relation'];
                //$update['parent']   = $post['parent'];
                $avatar = explode('/', $post['avatar']);
                $update['avatar'] = array_pop($avatar);
                $update['title'] = $post['title'] != '' ? $post['title'] : $post['name'];
                $update['keywords'] = $post['keywords'];
                $update['description'] = $post['description'];
                if (isset($post['hyperlink']) && $post['hyperlink'] != null)
                    $update['hyperlink'] = $post['hyperlink'];
                $update['link1'] = $post['link1'];
                $update['action_link1'] = $post['action_link1'];
                $update['link2'] = $post['link2'];
                $update['action_link2'] = $post['action_link2'];
                $update['router'] = $post['router'];
                $update['filter_router'] = $post['filter_router'];
                $this->menu_model->db->where('id', $get['id'])->update('menu', $update);
                $position = $post['position'];
                if ($post['parent'] == $post['curent_parent']) {
                    //Lấy danh sách vị trí hiện tại của menu.
                    $arr_menu_id_position = $this->menu_model->db->where('menu_id', $get['id'])->
                        get('position')->result_array();
                    foreach ($arr_menu_id_position as $val) {
                        if (in_array($val['position'], $position)) {
                            foreach ($position as $key => $val1) {
                                if ($val1 == $val['position']) {
                                    unset($position[$key]);
                                    break;
                                }
                            }
                        } else {
                            $this->admin_nestedset->setControlParams('position');
                            $this->admin_nestedset->setPosition($val['position']);
                            $this->admin_nestedset->deleteNode($val);
                        }
                    }

                    if (isset($position) && !empty($position)) {
                        $this->admin_nestedset->setControlParams('position');
                        foreach ($position as $val) {
                            $this->admin_nestedset->setPosition($val);
                            $parentNode = $this->menu_model->db->where('menu_id', $post['parent'])->where('position',
                                $val)->get('position')->row_array();

                            if (empty($parentNode)) {
                                $newNode = array(
                                    'menu_id' => $post['id'],
                                    'parent' => 0,
                                    'position' => $val,
                                    'level' => 0);

                                $this->admin_nestedset->insertNewTree($newNode);
                            } else {
                                $newNode = array(
                                    'menu_id' => $post['id'],
                                    'parent' => $parentNode['id'],
                                    'position' => $val,
                                    'level' => $parentNode['level'] + 1);
                                $this->admin_nestedset->insertNewChild($parentNode, $newNode);
                            }

                        }
                    }
                }
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                if ($get['ac'] == 'save') {
                    $data['success'] = $success;
                } else {
                    $this->session->set_flashdata('success', $success);
                    $page = isset($get['page']) ? (int)$get['page'] : 1;
                    redirect(base_url('admin/menu/index?page=' . $page));
                }
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }
        $data['item'] = $this->menu_model->Db_get_edit($get);
        if (empty($data['item']))
            show_404();
        if ($data['item']['created_by'] != $this->admin_auth->get_colum('id') && $this->
            admin_auth->get_colum('manage') != 1 && $this->admin_auth->get_colum('email') !=
            $this->admin_auth->get_root_email()) {
            $this->session->set_flashdata('error',
                '<div class="error"><p>Bạn không thể sửa nội dung do người khác tạo.</p></div>');
            redirect('admin/menu/index');
        }
        $action_view_image = base_url() . 'media/images/menu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['category'] = $this->menu_model->Db_get_category_edit($data['item']['module']);
        $cr_position = $this->menu_model->db->select('position')->where('menu_id', $data['item']['id'])->
            get('position')->result_array();
        $ar_position = array();
        if (!empty($cr_position)) {
            foreach ($cr_position as $val) {
                $ar_position[] = $val['position'];
            }
        }
        $data['cr_position'] = $ar_position;
        $data['position'] = $this->get_position();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);

    }

    public function delete()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST) {
            $cid = $this->input->post('cid');
            $module = $this->input->post('module');
            $position = $this->input->post('position');
            $arr_position = $this->get_position();
            $error = false;
            foreach ($cid as $val) {
                $created_by = $this->menu_model->db->where('id', $val)->get('menu')->row('created_by');
                if ($created_by == $this->admin_auth->get_colum('id') || $this->admin_auth->
                    get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->
                    admin_auth->get_root_email()) {
                    $node = $this->menu_model->db->where('id', $val)->get('menu')->row_array();
                    if (!empty($node)) {
                        $this->admin_nestedset->setControlParams('menu');
                        $this->admin_nestedset->setPosition(null);
                        $this->admin_nestedset->deleteNode($node);
                    }
                    $nodePosition = $this->menu_model->db->where('menu_id', $val)->get('position')->
                        result_array();
                    if (!empty($nodePosition)) {
                        $this->admin_nestedset->setControlParams('position');
                        foreach ($nodePosition as $val1) {
                            $this->admin_nestedset->setPosition($val1['position']);
                            $this->admin_nestedset->deleteNode($val1);
                        }
                    }
                } else
                    $error = true;
            }
            if ($error)
                $this->session->set_flashdata('error',
                    '<div class="error"><p>Bạn không thể xóa nội dung của người khác</p></div>');
            else
                $this->session->set_flashdata('success',
                    '<div class="success"><p>Xóa thành công!</p></div>');
            redirect(base_url('admin' . '/' . $this->router->fetch_class() .
                '/index?module=' . $module . '&position' . $position));
        }
    }

    /** Callback check slug **/
    public function check_slug($str)
    {
        $this->load->library('admin/admin_validateslug');
        $curent_id = $this->input->post('id');
        $slug = $this->admin_validateslug->validation($this->input->post('slug'));
        $check = $this->menu_model->db->where('slug', $slug)->get('menu')->row_array();
        if (!empty($check) && $check['id'] != $curent_id)
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
            $count = $this->menu_model->db->where('slug', $slug)->count_all_results('url');
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
    /** LẤY DANH SÁCH MENU THEO MODULE GỬI TỪ AJAX **/
    public function ajax_get_menu_module()
    {
        if ($_POST) {
            $module = $this->input->post('module');
            $data = $this->menu_model->db->select('id,parent,level,name')->where('module', $module)->
                order_by('lft', 'ASC')->order_by('rgt', 'DESC')->get('menu')->result_array();
            //dequy($data,0,$result);
            $html = '<option value="0"> Là chuyên mục gốc</option>';
            if (!empty($data)) {
                foreach ($data as $val) {
                    $char = '';
                    for ($i = 1; $i <= $val['level']; $i++) {
                        $char .= '--';
                    }
                    $html .= '<option value="' . $val['id'] . '">' . $char . ' ' . $val['name'] .
                        '</option>';
                }
            }
            $arr = array('result' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($arr));
        }
    }

    /** LẤY DANH SÁCH VỊ TRÍ THEO ID GỬI TỪ AJAX **/
    public function ajax_get_position()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $data = $this->menu_model->db->select('position')->where('menu_id', $id)->get('position')->
                result_array();
            $html = '';
            $cp = array();
            if (!empty($data)) {
                foreach ($data as $val) {
                    $cp[] = $val['position'];
                }
            }
            $position = $this->get_position();
            foreach ($position as $val) {
                $ck = in_array($val['name'], $cp) ? 'checked=""' : '';
                $html .= '<li><input type="checkbox" name="position[]" value="' . $val['name'] .
                    '" ' . $ck . ' >&nbsp<span>' . ucfirst($val['title']) . '</span>';
            }
            $arr = array('result' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($arr));
        }
    }

    /** SẮP XẾP VỊ TRÍ CÁC MENU **/
    public function ajax_sort_menu()
    {
        if ($_POST) {
            $sort = $this->input->post('sort');
            $parent = $this->input->post('parent');
            $curent_id = $this->input->post('id');
            $position = $this->input->post('position');
            $target = $this->menu_model->db->where('id', $parent)->where('position', $position)->
                get('position')->row_array();
            $node = $this->menu_model->db->where('id', $curent_id)->where('position', $position)->
                get('position')->row_array();
            $this->admin_nestedset->setControlParams();
            $this->admin_nestedset->setPosition($node['position']);
            switch ($sort) {
                case 'pre':
                    $node['level'] = $target['level'];
                    $this->admin_nestedset->setNodeAsPrevSibling($node, $target);
                    $this->menu_model->db->where('id', $node['id'])->update('position', array('level' =>
                            $node['level']));
                    $this->update_level($node);
                    break;
                case 'next':
                    $node['level'] = $target['level'];
                    $this->admin_nestedset->setNodeAsNextSibling($node, $target);
                    $this->menu_model->db->where('id', $node['id'])->update('position', array('level' =>
                            $node['level']));
                    $this->update_level($node);
                    break;
                case 'in':
                    $node['level'] = $target['level'] + 1;
                    $this->admin_nestedset->setNodeAsFirstChild($node, $target);
                    $this->menu_model->db->where('id', $node['id'])->update('position', array('level' =>
                            $node['level']));
                    $this->update_level($node);
                    break;
            }

            $arr = array('result' => $node);
            $this->output->set_content_type('application/json')->set_output(json_encode($arr));
        }
    }
    /** CẬP NHẬT LẠI LEVEL CHO CÁC MENU CON **/
    public function update_level($node = null)
    {
        //$node = array('id'=>3,'menu_id'=>3,'parent'=>0,'position'=>'content','lft'=>2,'rgt'=>9,'level'=>1);
        $node = $this->menu_model->db->where('id', $node['id'])->get('position')->
            row_array();
        $data = $this->menu_model->db->select('id,level,parent')->where('position', $node['position'])->
            where('lft > ', $node['lft'])->where('rgt < ', $node['rgt'])->get('position')->
            result_array();

        if (!empty($data)) {
            $parent = $node['id'];
            $level = $node['level'] + 1;
            $id = 0;
            foreach ($data as $key => $val) {
                if ($val['parent'] == $parent) {
                    //$data[$key]['level'] = $level;
                    $val['level'] = $level;
                } else {
                    //$data[$key]['level'] = $level+1;
                    $val['level'] = $level + 1;
                    $parent = $id;
                }
                $this->menu_model->db->where('id', $val['id'])->update('position', $val);
                $id = $val['id'];
                $level = $val['level'];
            }
        }
        //$data = $this->menu_model->db->select('id,level,parent')->where('position',$node['position'])->where('lft > ',$node['lft'] )->where('rgt < ', $node['rgt'])->get('position')->result_array();
        //            echo "<pre>";
        //            print_r($data);
        //            echo"</pre>";
        //            exit();
    }

    /** Đọc các vị trí menu từ templates **/
    public function get_position()
    {
        return get_position_menu();
    }

}
?>