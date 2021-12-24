<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Comment extends CI_Controller
{
	public $limit = 20;
	public $module_view = 'admin';
	public $action_view = '';
	public $view = 'index';
	// private $url = array(
	// 	'xem-boi-tuoi-vo-chong-co-hop-nhau-khong' => 'Xem tuổi vợ chồng (đích chính)',
	// 	'xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-$namsinhnam-va-tuoi-vo-$namsinhnu' => 'Xem tuổi vợ chồng (đích con)',
	// 	'xem-tuoi-sinh-con'	=> 'Xem tuổi sinh con (đích chính)',
	// 	'chong-tuoi-$canchichong-$namsinhchong-vo-tuoi-$canchivo-$namsinhvo-sinh-con-nam-nao-tot' => 'Xem tuổi sinh con (đích con)',
	// 	'xem-tuoi-ket-hon' => 'Xem tuổi kết hôn',
	// 	'xem-tuoi-ket-hon/$gioitinh-tuoi-$canchi-$namsinh-lay-chong-nam-nao-tot' => 'Xem tuổi kết hôn (Chồng)',
	// 	'xem-tuoi-ket-hon/$gioitinh-tuoi-$canchi-$namsinh-lay-vo-nam-nao-tot'	=> 'Xem tuổi kết hôn (Vợ)',
	// 	'xem-boi-so-dien-thoai' => 'Xem bói số điện thoại',
	// 	'xem-boi-ngay-sinh' => 'Xem bói ngày sinh',
	// 	'xem-boi-tinh-yeu-theo-ngay-sinh'	=> 'Xem bói tình yêu theo ngày sinh',
	// 	'xem-ngay-tot-xau'	=> 'Xem ngày tốt xấu',
	// 	'xem-ngay-tot-trong-thang-$thang-nam-$nam'	=> 'Xem ngày tốt xấu đích tháng',
	// 	'xem-ngay-tot-xau/ngay-$ngay-thang-$thang-nam-$nam' => 'Xem ngày tốt xấu đích ngày tháng năm',
	// 	'xem-tuoi-lam-an' => 'Xem tuổi làm ăn',
	// 	'xem-tuoi-lam-an/tuoi-$canchi-sinh-nam-$namsinh-hop-lam-an-voi-tuoi-nao' => 'Xem tuổi làm ăn đích con',
	// 	'xem-la-so-tu-vi'	=> 'Xem lá số tử vi',
	// 	'sim-phong-thuy-co-phai-la-vat-pham-phong-thuy' => 'Langdingpage simpt vật phẩm pt'
	// );
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
			'form_validation'));
		$this->load->model(array('admin/comment_model'));
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
		$total_recod = $this->comment_model->Db_count_index($get);
		$list = $this->comment_model->Db_get_index($get, $this->limit);

		$recursiveList = $this->setAbc($list);

		$this->admin_pagination->set_url($get);
		$this->admin_pagination->set_total_row($total_recod);
		$this->admin_pagination->set_page_row($this->limit);
		$this->admin_pagination->set_current_page($get['page']);
		$data['pagination'] = $this->admin_pagination->created();

		// 1. feild url
		$data['url'] = $url = $this->comment_model->Db_group_url();

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
            if ($item['parent_id'] == $id_parent)
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
                 
                $this->setAbc($input, $item['id'],$heading.'|--');
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

			$this->comment_model->db->insert('tbl_comment', $insert);
			if ($get['ac'] == 'save')
			{
				$id = $this->comment_model->db->select_max('id')->get('tbl_comment')->row('id');
				redirect(base_url('admin/comment/edit?id=' . $id));
			} else
			{
				redirect(base_url('admin/comment/index'));
			}
		}
		// 1. feild url
		// $data['url'] = $url = $this->url;

		$action_view_image = base_url() . 'media/images/comment/';
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
			$update['name'] = $post['name'];
			$update['email'] = $post['email'];
			$update['content'] = $post['content'];
			$update['url'] = $post['url'];

			$this->comment_model->db->where('id', $post['id'])->update('tbl_comment', $update);
			$success = '<div class="success"><p>Lưu thành công!</p></div>';
			if ($get['ac'] == 'save')
			{
				$data['success'] = $success;
			} else
			{
				$this->session->set_flashdata('success', $success);
				$page = isset($get['page']) ? (int)$get['page'] : 1;
				redirect(base_url('admin/comment/index?page=' . $page));
			}
		}
		// 1. feild url
		// $data['url'] = $url = $this->url;

		$data['item'] = $this->comment_model->Db_get_edit($get);
		if (empty($data['item']))
			show_404();
		$action_view_image = base_url() . 'media/images/comment/';
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
			$this->comment_model->db->where_in('id', $cid)->delete('tbl_comment');
			$this->session->set_flashdata('success',
				'<div class="success"><p>Xóa thành công!</p></div>');
			redirect(base_url('admin/comment/index'));
		}
	}

	public function addAns(){
		$get = $this->input->get();
		// 1. Lay thong tin comment
		if (!isset($_GET['id'])) {
			return false;
		}
		$id = $get['id'];
		$data['item'] = $item = $this->comment_model->Db_get_edit($get);


		if ($_POST)
		{
			$post = $this->input->post();
			if ($post['is_admin'] == 'admin') {
				$insert['name'] = 'Quản trị viên';
				$insert['email'] = 'xemvanmenh.ad@gmail.com';
				$insert['content'] = $post['content'];
				$insert['url'] = $item['url'];
				$insert['is_admin'] = 1;
				$insert['parent_id'] = $item['id'];
			}
			else{
				$insert['name'] = $post['name'];
				$insert['email'] = $post['email'];
				$insert['content'] = $post['content'];
				$insert['url'] = $item['url'];
				$insert['is_admin'] = 0;
				$insert['parent_id'] = $item['id'];
			}
			

			$this->comment_model->db->insert('tbl_comment', $insert);
			if ($get['ac'] == 'save')
			{
				$id = $this->comment_model->db->select_max('id')->get('tbl_comment')->row('id');
				redirect(base_url('admin/comment/addAns?id=' . $id));
			} else
			{
				redirect(base_url('admin/comment/index'));
			}
		}
		$action_view_image = base_url() . 'media/images/comment/';
		$this->session->set_userdata('action_view_image', $action_view_image);
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}
}
