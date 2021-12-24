<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Tuvan_phongthuysim extends CI_Controller
{
	public $limit = 20;
	public $module_view = 'admin';
	public $action_view = '';
	public $view = 'index';
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
		$this->load->model(array('admin/tuvan_phongthuysim_model'));
		$this->admin_auth->check_login();
	}
	public function index()
	{
		$get = $this->input->get();
		if (!isset($get['page']))
			$get['page'] = 1;
		if (!isset($get['key']))
			$get['key'] = null;
		if (!isset($get['order']))
			$get['order'] = 'desc';
		$total_recod = $this->tuvan_phongthuysim_model->Db_count_index($get);
		$list = $this->tuvan_phongthuysim_model->Db_get_index($get, $this->limit);
		$this->admin_pagination->set_url($get);
		$this->admin_pagination->set_total_row($total_recod);
		$this->admin_pagination->set_page_row($this->limit);
		$this->admin_pagination->set_current_page($get['page']);
		$data['pagination'] = $this->admin_pagination->created();
		$data['list'] = $list;
		$data['get'] = $get;
		$data['success'] = $this->session->flashdata('success');
		$data['total_recod'] = $total_recod;
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}
	/*public function add()
	{
		$get = $this->input->get();
		if ($_POST)
		{
			$post = $this->input->post();
			$insert['anchor_text'] = $post['anchor_text'];
			$insert['internal_link'] = $post['internal_link'];
			$this->tuvan_phongthuysim_model->db->insert('tuvan_phongthuysim', $insert);
			if ($get['ac'] == 'save')
			{
				$id = $this->tuvan_phongthuysim_model->db->select_max('id')->get('tuvan_phongthuysim')->row('id');
				redirect(base_url('admin/tuvan_phongthuysim/edit?id=' . $id));
			} else
			{
				redirect(base_url('admin/tuvan_phongthuysim/index'));
			}
		}
		$action_view_image = base_url() . 'media/images/tuvan_phongthuysim/';
		$this->session->set_userdata('action_view_image', $action_view_image);
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}*/
	public function edit()
	{
		$get = $this->input->get();
		if ($_POST)
		{
			$post = $this->input->post();
			$update['name'] = $post['name'];
			
			$this->tuvan_phongthuysim_model->db->where('id', $post['id'])->update('tuvan_phongthuysim', $update);
			$success = '<div class="success"><p>Lưu thành công!</p></div>';
			if ($get['ac'] == 'save')
			{
				$data['success'] = $success;
			} else
			{
				$this->session->set_flashdata('success', $success);
				$page = isset($get['page']) ? (int)$get['page'] : 1;
				redirect(base_url('admin/tuvan_phongthuysim/index?page=' . $page));
			}
		}
		$data['item'] = $this->tuvan_phongthuysim_model->Db_get_edit($get);
		if (empty($data['item']))
			show_404();
		$action_view_image = base_url() . 'media/images/tuvan_phongthuysim/';
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
			$this->tuvan_phongthuysim_model->db->where_in('id', $cid)->delete('tbl_tuvan_phongthuysim');
			$this->session->set_flashdata('success',
				'<div class="success"><p>Xóa thành công!</p></div>');
			redirect(base_url('admin/tuvan_phongthuysim/index'));
		}
	}
}
