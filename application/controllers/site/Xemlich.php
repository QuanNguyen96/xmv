<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Xemlich extends CI_Controller
{
	public $module_view = 'site';
	public $action_view = '';
	public $action_view_mobile = '';
	public $view = 'index';
	public $view_mobile = 'index_mobile';
	public function __construct()
	{
		parent::__construct();
		$this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
			'/' . $this->router->fetch_method();
		$this->action_view_mobile = $this->module_view . '/' . $this->router->
			fetch_class() . '/' . $this->router->fetch_method() . '_mobile';
		$this->view = $this->module_view . '/' . $this->view;
		$this->view_mobile = $this->module_view . '/' . $this->view_mobile;
		$this->load->library(
			array(
				'site/my_seolink',
				'site/my_info',
				'site/vnkey',
				'site/lich',
				'site/comment_lib'
			)
		);
		$this->load->helper(array(
			'text',
			'tuvi',
			'file',
			'xemngay',
			'licham',
			'form',
			));
	}
	public function lichngay()
	{
		if (isset($_POST['submit']) && $_POST['submit'])
		{
			$data['ngay'] = $_POST['show_ngay'];
			$data['thang'] = $_POST['show_thang'];
			$data['nam'] = $_POST['show_nam'];
		} else
		{
			$data['ngay'] = date('j');
			$data['thang'] = date('n');
			$data['nam'] = date('Y');
		}
		// $data['noindex']     = '<meta name="robots" content="noindex, nofollow"/>';
		$data['lichngay'] = $this->get_lichngay($data['ngay'], $data['thang'], $data['nam']);
		$data['lichthang'] = $this->get_lichthang(1, $data['thang'], $data['nam']);
		$data['mangcongcu'] = array(
			'xem-ngay-tot' => 'Xem ngày tốt xấu',
			'xem-ngay-tot-xuat-hanh' => 'Xem ngày xuất hành',
			'xem-ngay-tot-cuoi-hoi' => 'Xem ngày tốt kết hôn',
			'xem-ngay-hoang-dao' => 'Xem ngày hoàng đạo',
			'xem-ngay-tot-dong-tho' => 'Xem ngày động thổ',
			'xem-ngay-tot-xay-dung' => 'Xem ngày tốt xây dựng',
			'xem-ngay-tot-do-tran-lop-mai' => 'Xem ngày đổ trần, lợp mái',
			'xem-ngay-tot-nhap-trach-nha-moi' => 'Xem ngày nhập trạch nhà mới',
			'xem-ngay-tot-mua-nha' => 'Xem ngày mua nhà',
			'xem-ngay-tot-khai-truong' => 'Xem ngày khai trương',
			'xem-ngay-tot-ky-hop-dong' => 'Xem ngày ký hợp đồng',
			'xem-ngay-tot-mua-xe' => 'Xem ngày mua xe',
			'xem-ngay-tot-nhan-chuc' => 'Xem ngày tốt nhận chức',
			'xem-ngay-tot-an-tang' => 'Xem ngày an táng',
			);

		// 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Lịch',
                'slug' => 'lich',
            ),
            1 => array(
                'name' => 'Lịch vạn niên',
                'slug' => 'xem-lich-van-nien',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->my_seolink->set_seolink($data['ngay'], $data['thang'], $data['nam']);
		$data['title'] = $this->my_seolink->get_title();
		$data['keywords'] = $this->my_seolink->get_keywords();
		$data['description'] = $this->my_seolink->get_description();
		if ($this->mobile_detect->isMobile())
		{
			$data['view'] = $this->action_view_mobile;
			$this->load->view($this->view_mobile, $data);
		} else
		{
			$data['view'] = $this->action_view;
			$this->load->view($this->view, $data);
		}
		// $data['view'] = $this->action_view;
		// $this->load->view( $this->view,$data);
	}
	public function lichthang($thang, $nam)
	{
		// $data['noindex']     = '<meta name="robots" content="noindex, nofollow"/>';
		$data['lichngay'] = $this->get_lichngay();
		$data['lichthang'] = $this->get_lichthang(1, $thang, $nam);
		$data['mangcongcu'] = array(
			'xem-ngay-tot' => 'Xem ngày tốt xấu',
			'xem-ngay-tot-xuat-hanh' => 'Xem ngày xuất hành',
			'xem-ngay-tot-cuoi-hoi' => 'Xem ngày tốt kết hôn',
			'xem-ngay-hoang-dao' => 'Xem ngày hoàng đạo',
			'xem-ngay-tot-dong-tho' => 'Xem ngày động thổ',
			'xem-ngay-tot-xay-dung' => 'Xem ngày tốt xây dựng',
			'xem-ngay-tot-do-tran-lop-mai' => 'Xem ngày đổ trần, lợp mái',
			'xem-ngay-tot-nhap-trach-nha-moi' => 'Xem ngày nhập trạch nhà mới',
			'xem-ngay-tot-mua-nha' => 'Xem ngày mua nhà',
			'xem-ngay-tot-khai-truong' => 'Xem ngày khai trương',
			'xem-ngay-tot-ky-hop-dong' => 'Xem ngày ký hợp đồng',
			'xem-ngay-tot-mua-xe' => 'Xem ngày mua xe',
			'xem-ngay-tot-nhan-chuc' => 'Xem ngày tốt nhận chức',
			'xem-ngay-tot-an-tang' => 'Xem ngày an táng',
			);
		$songaytrongthang = $this->lich->get_songay();
		for ($i = 1; $i <= $songaytrongthang; $i++)
		{
			$ngaytx[] = $this->get_lichngay($i, $thang, $nam);
		}
		$data['ngaytx'] = $ngaytx;
		$data['thang'] = $thang;
		$data['nam'] = $nam;
		$arr_list = array(
			'link' => 'xem-lich-van-nien/lich-thang-$thang-nam-$nam',
			'replace' => array('$thang' => $thang, '$nam' => $nam),
			);
		// 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
		$this->my_seolink->seolink_cst($arr_list);
		$data['title'] = $this->my_seolink->get_title();
		$data['keywords'] = $this->my_seolink->get_keywords();
		$data['description'] = $this->my_seolink->get_description();
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}
	public function lichnam($nam)
	{
		// $data['noindex']     = '<meta name="robots" content="noindex, nofollow"/>';
		for ($i = 1; $i <= 12; $i++)
		{
			$lich[$i] = $this->get_lichthang(1, $i, $nam);
		}
		$data['list'] = $lich;
		$data['nam'] = $nam;
		$arr_list = array(
			'link' => 'xem-lich-am-duong-$nam',
			'replace' => array('$nam' => $nam),
			);
		// 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
		$this->my_seolink->seolink_cst($arr_list);
		$data['mangcongcu'] = array(
			'xem-ngay-tot' => 'Xem ngày tốt xấu',
			'xem-ngay-tot-xuat-hanh' => 'Xem ngày xuất hành',
			'xem-ngay-tot-cuoi-hoi' => 'Xem ngày tốt kết hôn',
			'xem-ngay-hoang-dao' => 'Xem ngày hoàng đạo',
			'xem-ngay-tot-dong-tho' => 'Xem ngày động thổ',
			'xem-ngay-tot-xay-dung' => 'Xem ngày tốt xây dựng',
			'xem-ngay-tot-do-tran-lop-mai' => 'Xem ngày đổ trần, lợp mái',
			'xem-ngay-tot-nhap-trach-nha-moi' => 'Xem ngày nhập trạch nhà mới',
			'xem-ngay-tot-mua-nha' => 'Xem ngày mua nhà',
			'xem-ngay-tot-khai-truong' => 'Xem ngày khai trương',
			'xem-ngay-tot-ky-hop-dong' => 'Xem ngày ký hợp đồng',
			'xem-ngay-tot-mua-xe' => 'Xem ngày mua xe',
			'xem-ngay-tot-nhan-chuc' => 'Xem ngày tốt nhận chức',
			'xem-ngay-tot-an-tang' => 'Xem ngày an táng',
			);
		// get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Lịch',
                'slug' => 'lich',
            ),
            1 => array(
                'name' => 'Lịch âm dương '.$nam,
                'slug' => 'xem-lich-am-duong-'.$nam,
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
		$data['title'] = $this->my_seolink->get_title();
		$data['keywords'] = $this->my_seolink->get_keywords();
		$data['description'] = $this->my_seolink->get_description();
		$data['view'] = $this->action_view;
		$this->load->view($this->view, $data);
	}
	public function ajax_get_lichngay()
	{
		if (!$this->input->is_ajax_request()) {
            return redirect(base_url('error.html'),'location',301);
        }
		if ($_POST)
		{
			$ngayduong = $this->input->post('ngay');
			$thangduong = $this->input->post('thang');
			$namduong = $this->input->post('nam');
			$lich = $this->get_lichngay($ngayduong, $thangduong, $namduong);
			$url_lich_thang = 'xem-lich-van-nien/lich-thang-'.$lich['thangduong'].'-nam-'.$lich['namduong'].'.html';
			$url_lich_ngay  = 'xem-ngay-tot-xau/ngay-'.$lich['ngayduong'].'-thang-'.$lich['thangduong'].'-nam-'.$lich['namduong'].'.html';
			$html='
            <div class="banglich">
               <div class="banglich1">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="banglich1_preview" onclick="show_lichngay('. $lich['ngaytruoc']['0'] .','. $lich['ngaytruoc']['1'] .','. $lich['ngaytruoc']['2'] .')"></div>
                    </div>
                    <div class="col-md-4">
                       <div class="banglich1_show">
                         Tháng '. $lich['thangduong'] .' Năm '. $lich['namduong'].'
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="banglich1_next" onclick="show_lichngay('. $lich['ngaytiep']['0'] .','. $lich['ngaytiep']['1'] .','. $lich['ngaytiep']['2'] .')"></div>
                    </div>
                  </div>
               </div>
               <div class="banglich2">
                  <div class="row">
                     <div class="col-md-3">
                       <div class="banglich2_preview" onclick="show_lichngay('. $lich['ngaytruoc']['0'] .','. $lich['ngaytruoc']['1'] .','. $lich['ngaytruoc']['2'] .')">Hôm qua</div>
                     </div>
                     <div class="col-md-6 text-center">
                       <div class="banglich2_number">'. $lich['ngayduong'].'</div>
                       <div class="banglich2_text">'. $lich['thu'].'</div>
                       <div class="banglich2_summary">
                       </div>
                     </div>
                     <div class="col-md-3">
                       <div class="banglich2_next" onclick="show_lichngay('. $lich['ngaytiep']['0'] .','. $lich['ngaytiep']['1'] .','. $lich['ngaytiep']['2'] .')">Ngày mai</div>
                     </div>
                  </div>
               </div>
               <div class="banglich3">
                 <div class="row">
                    <div class="col-md-4">
                       <ul>
                         <li>NĂM '. $lich['namcanchi'].'</li>
                         <li>THÁNG '. $lich['thangcanchi'].'</li>
                         <li>NGÀY '. $lich['ngaycanchi'].'</li>
                       </ul>
                    </div>
                    <div class="col-md-4">
                       <div class="banglic3_vong_tron">
                          <div class="banglic3_vong_tron1">Tháng '. $lich['thangam'] .'</div>
                          <div class="banglic3_vong_tron2">'. $lich['ngayam'].'</div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <ul>
                         <li>NGÀY '. $lich['ngayhoangdao'].'</li>
                         <li>NGŨ HÀNH: </li>
                         <li><b>'. $lich['nguhanh'].'</b></li>
                       </ul>
                    </div>
                 </div>
               </div>
               <div class="banglich4">
                  <div class="banglich4_tt">Giờ hoàng đạo</div>
                  <ul>';
                    foreach ($lich['giohoangdao']['hoangdao'] as $key => $value){
                        $html.= '<li>'.$value.'</li>';
                    }
               $html.='</ul>  
               </div>
               <div class="banglich5">
                 <div class="row"> 
                   <div class="col-md-3">
                     <div class="banglich5_bv">
                       <a href="'.base_url($url_lich_ngay).'" title="">Xem chi tiết</a>
                     </div>
                   </div>
                   <div class="col-md-3">
                     <div class="banglich5_thang">
                       <a href="'.base_url($url_lich_thang).'" title="">Lịch tháng</a>
                     </div>
                   </div>
                   <div class="col-md-3">
                     <div class="banglich5_ngay">
                       <a href="'.base_url('doi-ngay-duong-lich-sang-am-lich.html').'" title="">Đổi ngày</a>
                     </div>
                   </div>
                   <div class="col-md-3">
                     <div class="banglich5_tv">
                       <a href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'" title="">Tử vi 2020</a>
                     </div>
                   </div>
                 </div>
               </div>
            </div>';
			$this->output->set_content_type('application/json')->set_output(json_encode(array
				('html' => $html)));
		}
	}
	public function ajax_get_lichngay_mb()
	{
		if (!$this->input->is_ajax_request()) {
            return redirect(base_url('error.html'),'location',301);
        }
		if ($_POST)
		{
			$ngayduong = $this->input->post('ngay');
			$thangduong = $this->input->post('thang');
			$namduong = $this->input->post('nam');
			$lich = $this->get_lichngay($ngayduong, $thangduong, $namduong);
			$url_lich_thang = 'xem-lich-van-nien/lich-thang-'.$lich['thangduong'].'-nam-'.$lich['namduong'].'.html';
			$url_lich_ngay  = 'xem-ngay-tot-xau/ngay-'.$lich['ngayduong'].'-thang-'.$lich['thangduong'].'-nam-'.$lich['namduong'].'.html';
			$html='
            <div class="banglich">
               <div class="banglich1">
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="banglich1_preview" onclick="show_lichngay('. $lich['ngaytruoc']['0'] .','. $lich['ngaytruoc']['1'] .','. $lich['ngaytruoc']['2'] .')"></div>
                    </div>
                    <div class="col-xs-6">
                       <div class="banglich1_show">
                         Tháng '. $lich['thangduong'] .' Năm '. $lich['namduong'].'
                       </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="banglich1_next" onclick="show_lichngay('. $lich['ngaytiep']['0'] .','. $lich['ngaytiep']['1'] .','. $lich['ngaytiep']['2'] .')"></div>
                    </div>
                  </div>
               </div>
               <div class="banglich2">
                  <div class="row">
                     <div class="col-xs-3">
                       <div class="banglich2_preview" onclick="show_lichngay('. $lich['ngaytruoc']['0'] .','. $lich['ngaytruoc']['1'] .','. $lich['ngaytruoc']['2'] .')">Hôm qua</div>
                     </div>
                     <div class="col-xs-6 text-center">
                       <div class="banglich2_number">'. $lich['ngayduong'].'</div>
                       <div class="banglich2_text">'. $lich['thu'].'</div>
                     </div>
                     <div class="col-xs-3">
                       <div class="banglich2_next" onclick="show_lichngay('. $lich['ngaytiep']['0'] .','. $lich['ngaytiep']['1'] .','. $lich['ngaytiep']['2'] .')">Ngày mai</div>
                     </div>
                  </div>
                  <div class="banglich2_summary">
		          </div>
               </div>
               <div class="banglich3">
                 <div class="row">
                    <div class="col-xs-4">
                       <ul>
                         <li>NĂM '. $lich['namcanchi'].'</li>
                         <li>THÁNG '. $lich['thangcanchi'].'</li>
                         <li>NGÀY '. $lich['ngaycanchi'].'</li>
                       </ul>
                    </div>
                    <div class="col-xs-4">
                       <div class="banglic3_vong_tron">
                          <div class="banglic3_vong_tron1">Tháng '. $lich['thangam'] .'</div>
                          <div class="banglic3_vong_tron2">'. $lich['ngayam'].'</div>
                       </div>
                    </div>
                    <div class="col-xs-4">
                       <ul>
                         <li>NGÀY '. $lich['ngayhoangdao'].'</li>
                         <li>NGŨ HÀNH: </li>
                         <li><b>'. $lich['nguhanh'].'</b></li>
                       </ul>
                    </div>
                 </div>
               </div>
               <div class="banglich4">
                  <div class="banglich4_tt">Giờ hoàng đạo</div>
                  <ul>';
                    foreach ($lich['giohoangdao']['hoangdao'] as $key => $value){
                        $html.= '<li>'.$value.'</li>';
                    }
               $html.='</ul>  
               </div>
               <div class="banglich5">
                 <div class="row"> 
                   <div class="col-xs-3">
                     <div class="banglich5_bv">
                       <a href="'.base_url($url_lich_ngay).'" title="">Xem chi tiết</a>
                     </div>
                   </div>
                   <div class="col-xs-3">
                     <div class="banglich5_thang">
                       <a href="'.base_url($url_lich_thang).'" title="">Lịch tháng</a>
                     </div>
                   </div>
                   <div class="col-xs-3">
                     <div class="banglich5_ngay">
                       <a href="'.base_url('doi-ngay-duong-lich-sang-am-lich.html').'" title="">Đổi ngày</a>
                     </div>
                   </div>
                   <div class="col-xs-3">
                     <div class="banglich5_tv">
                       <a href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'" title="">Tử vi 2020</a>
                     </div>
                   </div>
                 </div>
               </div>
            </div>';
			$this->output->set_content_type('application/json')->set_output(json_encode(array('html' => $html)));
		}
	}
	private function get_lichngay($ngayduong = null, $thangduong = null, $namduong = null)
	{
		$this->lich->set_ngayduong((int)$ngayduong, (int)$thangduong, (int)$namduong);
		$lich['ngayduong'] = $this->lich->get_ngayduong();
		$lich['thangduong'] = $this->lich->get_thangduong();
		$lich['namduong'] = $this->lich->get_namduong();
		$lich['ngayam'] = $this->lich->get_ngayam();
		$lich['thangam'] = $this->lich->get_thangam();
		$lich['namam'] = $this->lich->get_namam();
		$lich['ngaycanchi'] = $this->lich->get_ngaycan() . ' ' . $this->lich->
			get_ngaychi();
		$lich['thangcanchi'] = $this->lich->get_thangcan() . ' ' . $this->lich->
			get_thangchi();
		$lich['namcanchi'] = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
		$lich['thu'] = $this->lich->get_thu();
		$lich['ngayhoangdao'] = $this->lich->get_ngayhoangdao();
		$lich['truc'] = $this->lich->get_trucngay();
		$lich['nguhanh'] = $this->lich->get_nguhanh();
		$lich['giohoangdao'] = $this->lich->get_giohoangdao();
		$lich['ngaytiep'] = $this->lich->get_ngaythangnamtiep();
		$lich['thangtiep'] = $this->lich->get_thangnamtiep();
		$lich['ngaytruoc'] = $this->lich->get_ngaythangnamtruoc();
		$lich['thangtruoc'] = $this->lich->get_thangnamtruoc();
		return $lich;
	}
	private function get_lichthang($ngay = 1, $thang = null, $nam = null)
	{
		$thang = $thang == null ? date('n', time()) : $thang;
		$nam = $nam == null ? date('Y', time()) : $nam;
		$time = strtotime($thang . '/' . $ngay . '/' . $nam);
		$songaytrongthang = date('t', $time);
		$ngaydau = date('N', $time);
		$html = '<div class="banglichthang_tt ' . 'thang' . $thang .
			'"><span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>CN</span></div>';
		$html .= '<div class="banglichthang_ct">';
		$j = 0;
		for ($i = 1; $i < $songaytrongthang + $ngaydau; $i++)
		{
			if ($i >= $ngaydau)
				$j++;
			if ($j > 0)
			{
				$ngay = $this->get_lichngay($j, $thang, $nam);
				$link_ngay = base_url('xem-ngay-tot-xau/ngay-' . $ngay['ngayduong'] . '-thang-' .
					$ngay['thangduong'] . '-nam-' . $ngay['namduong'] . '.html');
				// xử lí kiểm tra nếu ngày là thứ 7 thì chữ màu xanh, chủ nhật thì chữ màu đỏ
				$ngay_thu = trim($ngay['thu']);
				if ($ngay_thu == 'Thứ bảy')
					$class_gr = 'text-success';
				elseif ($ngay_thu == 'Chủ nhật')
					$class_gr = 'text-danger';
				else
					$class_gr = '';
				$ngay_duong = '<span class="sp_nd ' . $class_gr . '">' . $ngay['ngayduong'] .
					'</span>';
				//end xu li
				$li_ngayduong = $ngay['ngayduong'] . '/' . $ngay['thangduong'] . '/' . $ngay['namduong'] .
					'(' . $ngay['thu'] . ')';
				$li_ngayam = $ngay['ngayam'] . '/' . $ngay['thangam'] . '/' . $ngay['namam'];
				$li_canchi = 'Ngày:' . $ngay['ngaycanchi'] . ' Tháng: ' . $ngay['thangcanchi'] .
					' Năm:' . $ngay['namcanchi'];
				$class_yellow = $ngay['ngayduong'] == date('j') && $ngay['thangduong'] == date('n') &&
					$ngay['namduong'] == date('Y') ? 'dayok' : '';
				// Ktra ngày nếu là 1,2,3 âm lịch thì hiện ngay/thang
				if ($ngay['ngayam'] == 1 || $ngay['ngayam'] == 2 || $ngay['ngayam'] == 3)
				{
					$ktra_ngay = $ngay['ngayam'] . '/' . $ngay['thangam'];
					$class_red = 'text-red';
				} else
				{
					$ktra_ngay = $ngay['ngayam'];
					$class_red = '';
				}
				// end kiểm tra
				$class_star = trim($ngay['ngayhoangdao']) == 'Hoàng đạo' ? 'text-yellow' :
					'text-black';
				$star = '<span class="' . $class_star .
					'"><span class="glyphicon glyphicon-star st"></span></span>';
				$html .= '<div class="lt_item ' . $class_yellow . '" id="'.$class_star.'"><a href="' . $link_ngay .
					'">' . $ngay_duong . '<span class="sp_ngayam ' . $class_red . '">' . $ktra_ngay .
					'</span>' . $star . '</a><ul>';
				$html .= '<li><label>Dương lịch:</label><b>' . $li_ngayduong . '</b></li>';
				$html .= '<li><label>Âm lịch:</label><b>' . $li_ngayam . '</b></li>';
				$html .= '<li><label>Bát tự:</label><b>' . $li_canchi . '</b></li>';
				$html .= '<li><label>Là ngày:</label><b>' . $ngay['ngayhoangdao'] . '</b></li>';
				$html .= '<li><label></label></li>';
				$html .= '</ul></div>';
			} else
			{
				$html .= '<div class="lt_item"></div>';
			}
		}
		$html .= '</div>';
		return $html;
	}
	function ajax_get_lichthang()
	{
		if (!$this->input->is_ajax_request()) {
            return redirect(base_url('error.html'),'location',301);
        }
		$ngay = $this->input->post('ngay');
		$thang = $this->input->post('thang');
		$nam = $this->input->post('nam');
		$lich = $this->get_lichngay($ngay, $thang, $nam);
		$lichthang = $this->get_lichthang($ngay, $thang, $nam);
		$html = '
            <div class="lt_content">
              <div class="lt_header">
                <div class="left_prev">
                  <span class="glyphicon glyphicon-arrow-left" onclick="show_lichthang(' .
			$lich['thangtruoc'][1] . ',' . $lich['thangtruoc'][2] . ')"></span>
                </div>
              <p class="box_aside_tt1"><a href="' . base_url('xem-lich-van-nien/lich-thang-' .
			$lich['thangduong'] . '-nam-' . $lich['namduong'] . '.html') . '">Tháng ' . $lich['thangduong'] .
			' Năm ' . $lich['namduong'] . '</a></p>
              <div class="right_next">
                <span class="glyphicon glyphicon-arrow-right" onclick="show_lichthang(' .
			$lich['thangtiep'][1] . ',' . $lich['thangtiep'][2] . ')"></span>
              </div>
             </div> 
             <div class="lt_body">
              <div class="banglichthang_ngay" >
                ' . $lichthang . '
              </div>
              <p class="star_hd"><span class="text-yellow"><span class="glyphicon glyphicon-star"></span></span>&nbsp;:Ngày hoàng đạo &nbsp;<span class="text-black"><span class="glyphicon glyphicon-star"></span>&nbsp;:Ngày hắc đạo</p>
             </div>
                 <div class="lt_btom"><a href="' . base_url('xem-ngay-tot-trong-thang-' .
			$thang . '-nam-' . $nam . '.html') . '">Xem ngày tốt tháng ' . $thang . ' Năm ' .
			$nam . '</a></div> 
              </div>
        ';
		$this->output->set_content_type('application/json')->set_output(json_encode(array
			('html' => $html)));
	}
	function ajax_get_lichthang_mb()
	{
		if (!$this->input->is_ajax_request()) {
            return redirect(base_url('error.html'),'location',301);
        }
		$ngay = $this->input->post('ngay');
		$thang = $this->input->post('thang');
		$nam = $this->input->post('nam');
		$lich = $this->get_lichngay($ngay, $thang, $nam);
		$lichthang = $this->get_lichthang($ngay, $thang, $nam);
		$html = '
            
			<div class="topTCAMb clearfix">
				<span class="text-left thang">Tháng '.$lich['thangduong'].'</span>
				<span class="text-right nam">Năm '.$lich['namduong'].'</span>
				<span class="text-right truocsau"><i onclick="show_lichthang(' .
			$lich['thangtruoc'][1] . ',' . $lich['thangtruoc'][2] . ')"><</i>&nbsp<i onclick="show_lichthang(' .
			$lich['thangtiep'][1] . ',' . $lich['thangtiep'][2] . ')">></i></span>
			</div>
			<div class="bodyTCAMb">
				<div class="lt_body">
				    <div class="banglichthang_ngay">
				        '.$lichthang.'
				    </div>
				    
				</div>
			</div>
			<div class="footerTCAMb">
				<ul class="ul clearfix">
					<li><p class="hoangdao"><span>-</span>&nbsp Ngày hoàng đạo</p></li>
					<li><p class="hacdao"><span>-</span>&nbsp Ngày hắc đạo</p></li>
				</ul>
			</div>

        ';
		$this->output->set_content_type('application/json')->set_output(json_encode(array
			('html' => $html)));
	}
}
