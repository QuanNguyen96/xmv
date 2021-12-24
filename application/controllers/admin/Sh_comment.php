<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Sh_comment extends CI_Controller
{
	public $limit = 20;
	public $module_view = 'admin';
	public $action_view = '';
	public $view = 'index';
	
	public $arr_list = null;
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
			'form_validation',
			'email',
		));
		$this->load->model(array('admin/sh_comment_model'));
		$this->admin_auth->check_login();
	}
	public function index()
	{
		$get = $this->input->get();
		if (!isset($get['page']))
			$get['page'] = 1;
		if (!isset($get['key']))
			$get['key'] = null;
		if (!isset($get['url']))
			$get['url'] = null;
		if (!isset($get['order']))
			$get['order'] = 'desc';
		$total_recod = $this->sh_comment_model->Db_count_index($get);
		$list = $this->sh_comment_model->Db_get_index($get, $this->limit);

		$recursiveList = $list;

		$this->admin_pagination->set_url($get);
		$this->admin_pagination->set_total_row($total_recod);
		$this->admin_pagination->set_page_row($this->limit);
		$this->admin_pagination->set_current_page($get['page']);
		$data['pagination'] = $this->admin_pagination->created();

		// 1. feild url
		$data['url'] = $url = $this->sh_comment_model->Db_group_url();

		$data['list'] = $recursiveList;
		$data['get'] = $get;
		$data['success'] = $this->session->flashdata('success');
		$data['total_recod'] = $total_recod;
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}

	public function index_struct()
	{
		$get = $this->input->get();
		if (!isset($get['page']))
			$get['page'] = 1;
		if (!isset($get['key']))
			$get['key'] = null;
		if (!isset($get['url']))
			$get['url'] = null;
		if (!isset($get['order']))
			$get['order'] = 'desc';
		$total_recod = $this->sh_comment_model->Db_count_index($get);
		$list = $this->sh_comment_model->Db_get_index_struct($get, $this->limit);

		$recursiveList = $this->setAbc($list);

		$this->admin_pagination->set_url($get);
		$this->admin_pagination->set_total_row($total_recod);
		$this->admin_pagination->set_page_row($this->limit);
		$this->admin_pagination->set_current_page($get['page']);
		$data['pagination'] = $this->admin_pagination->created();

		// 1. feild url
		$data['url'] = $url = $this->sh_comment_model->Db_group_url();

		$data['list'] = $recursiveList;
		$data['get'] = $get;
		$data['success'] = $this->session->flashdata('success');
		$data['total_recod'] = $total_recod;
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}

	public function setAbc($input,$id_parent = 0,$heading = ''){
        $menu_tmp = array();
        foreach ($input as $key => $item)
        {
            if ($item['root_id'] == $id_parent)
            {
                $menu_tmp[] = $item;
                unset($input[$key]);
            }
        }
        if ($menu_tmp)
        {
            //$this->menu_arr[$heading]    = $item;
            foreach ($menu_tmp as $item)
            {
                $this->arr_list[$item['id']]    = $item;
                $this->arr_list[$item['id']]['heading']    = $heading;
                 
                $this->setAbc($input, $item['id'],$heading.'|----');
            }
        }
        return $this->arr_list;
    }

	public function showCategories($categories, $parent_id = 0, $char = '')
	{
	    foreach ($categories as $key => $item)
	    {
	        // Nếu là chuyên mục con thì hiển thị
	        if ($item['parent_id'] == $parent_id)
	        {
	            echo '<option value="'.$item[$key].'">';
	                echo $char . $item['title'];
	            echo '</option>';
	             
	            // Xóa chuyên mục đã lặp
	            unset($categories[$key]);
	             
	            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
	            showCategories($categories, $item['id'], $char.'|---');
	        }
	    }
	}

	public function add()
	{
		$get = $this->input->get();
		if ($_POST)
		{
			$post = $this->input->post();
			$insert['name'] = $post['name'];
			$insert['email'] = $post['email'];
			$insert['content'] = $post['content'];
			$insert['url'] = $post['url'];

			$this->sh_comment_model->db->insert('sh_comment', $insert);
			if ($get['ac'] == 'save')
			{
				$id = $this->sh_comment_model->db->select_max('id')->get('sh_comment')->row('id');
				redirect(base_url('admin/sh_comment/edit?id=' . $id));
			} else
			{
				redirect(base_url('admin/sh_comment/index'));
			}
		}
		// 1. feild url
		// $data['url'] = $url = $this->url;

		$action_view_image = base_url() . 'media/images/sh_comment/';
		$this->session->set_userdata('action_view_image', $action_view_image);
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}

	public function edit()
	{
		$get = $this->input->get();
		if ($_POST)
		{
			$post = $this->input->post();
			$update['content'] = $post['content'];
			$update['status'] = $post['status'];

			$this->sh_comment_model->db->where('id', $post['id'])->update('sh_comment', $update);
			$success = '<div class="success"><p>Lưu thành công!</p></div>';
			if ($get['ac'] == 'save')
			{
				$data['success'] = $success;
			} else
			{
				$this->session->set_flashdata('success', $success);
				$page = isset($get['page']) ? (int)$get['page'] : 1;
				redirect(base_url('admin/sh_comment/index?page=' . $page));
			}
		}
		// 1. feild url
		// $data['url'] = $url = $this->url;

		$data['item'] = $this->sh_comment_model->Db_get_edit($get);
		if (empty($data['item']))
			show_404();
		$action_view_image = base_url() . 'media/images/sh_comment/';
		$this->session->set_userdata('action_view_image', $action_view_image);
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}

	public function delete()
	{
		if ($_POST && !empty($_POST['cid']))
		{
			$cid = $this->input->post('cid');
			$page = $this->input->post('cid');
			$this->sh_comment_model->db->where_in('id', $cid)->delete('sh_comment');
			$this->session->set_flashdata('success',
				'<div class="success"><p>Xóa thành công!</p></div>');
			redirect(base_url('admin/sh_comment/index'));
		}
	}

	public function addAns(){
		$get = $this->input->get();
		// 1. Lay thong tin comment
		if (!isset($_GET['id'])) {
			return false;
		}
		$id = $get['id'];
		$data['item'] = $item = $this->sh_comment_model->Db_get_edit($get);
		$adminInfo = $this->session->userdata('login');
		if ($_POST)
		{
			$post = $this->input->post();

			$insert['is_admin'] = $post['is_admin'];
			$insert['url_id'] = $post['url_id'];
			$insert['content'] = $post['content'];
			
			$insert['parent_id'] = $post['parent_id'];
			$insert['status'] = 'publish';
			$insert['user_id'] = $adminInfo['id'];

			/** Cap nhap so thu tu left, right, level **/
            $leftRightUpdate = $this->processLeftRightComment(array(
            	'url_id' => $post['url_id'],
            	'parent_id' => $post['parent_id'],
            ));

			$insert['meta_left'] = $leftRightUpdate['meta_left'];
			$insert['meta_right'] = $leftRightUpdate['meta_right'];
			$insert['root_id'] = $leftRightUpdate['root_id'];
			$insert['created_date'] = date('Y-m-d h:i:s');

			$this->sh_comment_model->db->insert('sh_comment', $insert);

			/** Neu comment duoc tra loi la user thi gui email **/
			if (!$item['is_admin']) {
				$itemDetail = $this->sh_comment_model->Db_item_detail_comment($id);
				$body = $this->trang_phanhoi_mail($itemDetail, $post['content']);
				$emailTo = $itemDetail['member_email'];
				$name_user = $itemDetail['member_name'];
				$this->sendMail($emailTo, $name_user, $body);
			}

			if ($get['ac'] == 'save')
			{
				$id = $this->sh_comment_model->db->select_max('id')->get('sh_comment')->row('id');
				redirect(base_url('admin/sh_comment/addAns?id=' . $id));
			} else
			{
				redirect(base_url('admin/sh_comment/index'));
			}
		}
		$action_view_image = base_url() . 'media/images/sh_comment/';
		$this->session->set_userdata('action_view_image', $action_view_image);
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}

	private function processLeftRightComment($iPost){
        // Check url have 
        $arrCheck = array(
            'url_id' => $iPost['url_id'],
            'id' => $iPost['parent_id'],
        );
        $checkPost = $this->db->select('')
                                ->from('sh_comment')
                                ->where($arrCheck)
                                ->get()
                                ->row_array();
        /** Neu khong co comment hoac parent_id = 0 **/
        if (!$checkPost) {
            // Check max left + 1
            $maxLeftRoot_none = $this->db->query('SELECT MAX(meta_left)+1 as max_meta_left FROM sh_comment WHERE url_id = "'.$iPost['url_id'].'"')
                                            ->row_array();
            return array(
                'meta_left' => $maxLeftRoot_none['max_meta_left']?$maxLeftRoot_none['max_meta_left']:1,
                'meta_right' => 0,
                'root_id' => 0,
            );
        }

        /** Neu co comment hoac parent_id != 0 **/
        // Check root of parent
        // Neu root_id khac 0
        if ($checkPost['root_id']) {
            $rootIdCheck = $checkPost['root_id'];
        }
        else{
            $rootIdCheck = $iPost['parent_id'];
        }
        $rootOfParent = array(
            'url_id' => $iPost['url_id'],
            'id' => $rootIdCheck,
        );
        $itemROP = $this->db->select('')
                                ->from('sh_comment')
                                ->where($rootOfParent)
                                ->get()
                                ->row_array();
        // Get max right of root
        $maxRightRoot = $this->db->query('SELECT MAX(meta_right)+1 as max_meta_right FROM sh_comment WHERE url_id = "'.$iPost['url_id'].'" and root_id = '.$rootIdCheck)
                                            ->row_array();
        return array(
            'meta_left' => $itemROP['meta_left'],
            'meta_right' => $maxRightRoot['max_meta_right']?$maxRightRoot['max_meta_right']:1,
            'root_id' => $rootIdCheck,
        );

    }

    public function sendMail($email_to, $ten_user, $info = null){
        // $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = "ad.xemvanmenh@gmail.com"; 
        $config['smtp_pass'] = "123456kieuvanduong";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        
        $this->email->from('ad.xemvanmenh@gmail.com', 'Tử Vi Khoa Học');
        $this->email->to($email_to);
        // $this->CI->email->bcc('bathe0603it@gmail.com');
        $this->email->subject('Phản hồi - tư vấn câu hỏi phong thủy của bạn '.$ten_user.' trên Xemvanmenh.net');
        $this->email->message($info);
        $this->email->send();
    }

    public function trang_phanhoi_mail($itemDetail, $content){
        $html = '';

                $html .= '<!DOCTYPE html>';
                $html .= '<html>';
                $html .= '<head>';
                $html .= '    <title>Phản hồi từ xemvanmenh.net</title>';
                $html .= '    <meta name="viewport" content="width=device-width, initial-scale=1">';
                $html .= '</head>';
                $html .= '<body>';
                    $html .= '<header style="margin-bottom: 10px;"><img src="https://xemvanmenh.net/templates/site/images/banner.jpg" style="width:100%;"/></header>';
                    $html .= '<section style="padding: 10px 15px;border: 1px solid #e98f31;margin-bottom: 10px;border-radius: 5px;">';
                    $html .= '<div style="padding-bottom: 20px;">';
                    $html .= '<div style="padding-bottom: 20px;background-color:#ddd;border-radius: 4px 4px 4px 4px;"><p>Câu hỏi của bạn '.$itemDetail['member_name'].' là : </p><section>'.$itemDetail['content'].'</section></div>';

                    $html .= '<div style="padding-bottom: 20px;background-color:#ddd;border-radius: 4px 4px 4px 4px;"><p>Xemvanmenh.net xin trả lời câu hỏi của bạn như sau : </p><section>'.$content.'</section></div>';
                    
                    $html .= '<p><a href="'.base_url($itemDetail['url_id'].'.html').'">Xem lại bài viết</a></p>';
                            
                    $html .= '</div>';
                    $html .= '</section>';
                    $html .= '<footer></footer>';
                    
                $html .= '</body>';
        $html .= '</html>';
        return $html;
    }
}
