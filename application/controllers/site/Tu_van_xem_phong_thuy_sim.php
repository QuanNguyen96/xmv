<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Tu_van_xem_phong_thuy_sim extends CI_Controller
{
	public $module_view = 'site';
	public $action_view = '';
	public $view = 'index';
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array(
			'form_validation',
			'site/curl_lib'
		));
	}
	public function actionInsert()
	{
		if (!$this->input->is_ajax_request()) {
            return redirect(base_url('error.html'),'location',301);
        }
		$this->load->database();
		if ($_POST)
		{
			$this->form_validation->set_rules('name', 'Tên người dùng', 'required');
			$this->form_validation->set_rules('ngaysinh', 'Ngày sinh', 'required');
			$this->form_validation->set_rules('thangsinh', 'Tháng sinh', 'required');
			$this->form_validation->set_rules('namsinh', 'Năm sinh', 'required');
			$this->form_validation->set_rules('giosinh', 'Giờ sinh', 'required');
			$this->form_validation->set_rules('gioitinh', 'Giới tính', 'required');
			$this->form_validation->set_rules('phone_now', 'Thông tin về bạn', 'required');
			$this->form_validation->set_rules('phone_view', 'Số điện thoại cần xem', 'required');
			$this->form_validation->set_message('required', '{field} không thể để trống.');
			$input = $this->input->post();
			if ($this->form_validation->run())
			{
				$iPhoneNow = $input['phone_now'];
				if (preg_match('/@/', $iPhoneNow)) {
					if (!filter_var($iPhoneNow, FILTER_VALIDATE_EMAIL)) {
					  	$response = '<div class="alert alert-warning">Thông tin <b>Email của bạn</b> có định dạng sai !</div>';
						$msg = '0';
						$result = array(
							'response' => $response,
							'msg' => $msg,
						);
						echo json_encode($result, true);
						return;
					}
				}
				else{
					if (!preg_match('/[0-9]/', $iPhoneNow)) {
						$response = '<div class="alert alert-warning">Thông tin <b>Số điện thoại của bạn</b> có định dạng sai !</div>';
						$msg = '0';
						$result = array(
							'response' => $response,
							'msg' => $msg,
							);
						echo json_encode($result, true);
						return;
					}
				}
				$response = '<div class="alert alert-success">Thông tin của bạn đã được gửi THÀNH CÔNG đến quản trị viên, vui lòng chờ phản hồi nhé!</div>';
				$msg = '1';
				// Cap nhap thong tin vao database quan ly nguoi dung
				$arrInsert = array(
					'name' => $input['name'],
					'ngaysinh' => $input['ngaysinh'],
					'thangsinh' => $input['thangsinh'],
					'namsinh' => $input['namsinh'],
					'giosinh' => $input['giosinh'],
					'gioitinh' => $input['gioitinh'],
					'phone_now' => $input['phone_now'],
					'phone_view' => $input['phone_view'],
				    'domain'   => $_SERVER['HTTP_HOST'],
				);     
				//$this->db->insert('tbl_tuvan_phongthuysim', $arrInsert);

				// Curl dữ liệu gửi qua bên kia
				$this->curl_lib->url = "http://simphongthuy.quanlybansim.com/tuvansim";
				$this->curl_lib->post = $arrInsert;
				$this->curl_lib->submit_post();

			} else
			{
				$response = validation_errors('<div class="alert alert-warning"><p><label>Bạn cần nhập đầy đủ và chính xác các thông tin sau: </label></p>',
					'</div>');
				$msg = '0';
			}
			$result = array(
				'response' => $response,
				'msg' => $msg,
				);
			echo json_encode($result, true);
		}
	}
}
