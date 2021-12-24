<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhaplieu extends CI_Controller {

	public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view        = 'index';
    public $saochinh = array(
        '170'=>'Tử Vi',
        '171'=>'Phá Quân',
        '172'=>'Thất sát',
        '173'=>'Thiên Lương',
        '174'=>'Thiên tướng',
        '175'=>'Cự môn',
        '176'=>'Tham lang',
        '177'=>'Thái âm',
        '178'=>'Thiên phủ',
        '179'=>'Thiên cơ',
        '180'=>'Thái dương',
        '181'=>'Vũ khúc',
        '182'=>'Thiên đồng',
        '183'=>'Liêm trinh',
    );
    public $saophu = array(
        '74' =>'Văn xương',
          '75' =>'Văn khúc', 
          '76' =>'Thai phụ', 
          '77' =>'Phong cáo', 
          '78' =>'Địa không', 
          '79' =>'Địa kiếp',
          //saotheothangsinh
          '80'=>'Hữu bật',  
          '81'=>'Tả phù',
          '82'=>'Thiên giải',
          '83'=>'Thiên y',
          '84'=>'Thiên riêu',
          '85'=>'Thiên hình',
          '86'=>'Địa giải',
          //saotheocanvacung
          '87'=>'Đà la',
          '88'=>'Lộc tồn',
          '89'=>'Kình dương',
          '90'=>'Quốc ấn',
          '91'=>'Đường phù',
          '92'=>'LN văn tinh',
          '93'=>'Thiên khôi',
          '94'=>'Thiên việt',
          '95'=>'Thiên quan',
          '96'=>'Thiên phúc',
          '97'=>'Lưu hà',
          '98'=>'Thiên trù',
          '99'=>'Triệt',
          '184'=>'Tuần',
          //saotheochivacung
          '100'=>'Thiên mã',
          '101'=>'Hoa cái',
          '102'=>'Kiếp sát',
          '103'=>'Đào hoa',
          '104'=>'Phá toái',
          '105'=>'Cô thần',
          '106'=>'Quả tú',
          '107'=>'Thiên không',
          '108'=>'Thiên khốc',
          '109'=>'Thiên hư',
          '110'=>'Thiên đức',
          '111'=>'Nguyệt đức',
          '112'=>'Hồng loan',
          '113'=>'Thiên hỷ',
          '114'=>'Long trì',
          '115'=>'Phượng các',
          '116'=>'Giải thần',
          '117'=>'Hóa lộc',
          '118'=>'Hóa quyền',
          '119'=>'Hóa khoa',
          '120'=>'Hóa kỵ',
          '121'=>'Thái tuế',
          '122'=>'Thiếu dương',
          '123'=>'Tang môn',
          '124'=>'Thiếu âm',
          '125'=>'Quan phù',
          '126'=>'Tử phù',
          '127'=>'Tuế phá',
          '128'=>'Long  đức',
          '129'=>'Bạch hổ',
          '130'=>'Phúc đức',
          '131'=>'Điếu khách',
          '132'=>'Trực phù',
          '133'=>'Bác sỹ', 
         '134'=>'Lực sỹ', 
         '135'=>'Thanh long', 
         '136'=>'Tiểu Hao', 
         '137'=>'Tướng quân', 
         '138'=>'Tấu thư', 
         '139'=>'Phi liêm', 
         '140'=>'Hỷ thần', 
         '141'=>'Bệnh phù', 
         '142'=>'Đại hao', 
         '143'=>'Phục binh', 
         '144'=>'Quan phủ',
          '145'=>'Trường sinh', 
         '146'=>'Mộc dục', 
         '147'=>'Quan đới', 
         '148'=>'Lâm quan', 
         '149'=>'Đế vượng',
          '150'=>'Suy', 
         '151'=>'Bệnh', 
         '152'=>'Tử', 
         '153'=>'Mộ', 
         '154'=>'Tuyệt', 
         '155'=>'Thai', 
         '156'=>'Dưỡng',
          '157' => 'Thiên Thương',
          '158' => 'Thiên sứ',
          '159' => 'Thiên Tài',
          '160' => 'Thiên Thọ',
          '161' => 'Tam thai',
          '162' => 'Bát Tọa',
          '163' => 'Ân Quang',
          '164' => 'Thiên Quý',
          '165' => 'Hỏa Tinh',
          '166' => 'Linh Tinh',
          '167' => 'Thiên La',
          '168' => 'Địa Võng',
          '169' => 'Đẩu Quân',
    );
    public $arr_position = array(
        '1' => 'Tý',
        '2' => 'Sửu',
        '3' => 'Dần',
        '4' => 'Mão',
        '5' => 'Thìn',
        '6' => 'Tỵ',
        '7' => 'Ngọ',
        '8' => 'Mùi',
        '9' => 'Thân',
        '10' => 'Dậu',
        '11' => 'Tuất',
        '12' => 'Hợi', 
    );
    public $cung    = array
    (
        '1' => 'Mệnh viên',
        '2' => 'Phụ mẫu',
        '3' => 'Phúc đức',
        '4' => 'Điền trạch',
        '5' => 'Quan lộc',
        '6' => 'Nô bộc',
        '7' => 'Thiên di',
        '8' => 'Tật ách',
        '9' => 'Tài bạch',
        '10'=> 'Tử tức',
        '11'=> 'Phu thê',
        '12'=> 'Huynh đệ'
    );
    public function __construct(){
     	parent::__construct();
     	$this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
     	$this->view        =  $this->module_view.'/'.$this->view;
     	$this->load->helper( array('string','my') );
     	$this->load->library( array('admin/admin_auth','admin/admin_pagination', 'form_validation') );
     	$this->load->model( array('admin/nhaplieu_model') );
     	$this->admin_auth->check_login();
    }
	public function index_tuvi()
	{
		$get = $this->input->get();
      	if( !isset( $get['page'] ) )      $get['page'] = 1;
      	if( !isset( $get['key'] ) )       $get['key'] = null;
      	if( !isset( $get['order'] ) )     $get['order'] = 'desc';
      	$total_recod  = $this->nhaplieu_model->Db_count_index($get);
      	$list         = $this->nhaplieu_model->Db_get_index( $get, $this->limit );
      	$this->admin_pagination->set_url($get);
      	$this->admin_pagination->set_total_row($total_recod);
      	$this->admin_pagination->set_page_row($this->limit);
      	$this->admin_pagination->set_current_page($get['page']);
      	$data['pagination'] = $this->admin_pagination->created();
      	$data['list'] = $list;
      	$data['get']  = $get;
      	$data['success'] = $this->session->flashdata('success');
      	$data['total_recod'] = $total_recod;
      	$data['view'] = $this->action_view;
      	$this->load->view( $this->view, $data );  
	}

	public function add_tuvi()
    {
                          
      	$get = $this->input->get();
      	if( $_POST )
      	{
            $post = $this->input->post();
            $insert['namsinh']         = $post['namsinh'];
            $insert['canchi_slug']     = $post['canchi_slug'];
            $insert['content_nam']     = $post['content_nam'];
            $insert['content_nu']      = $post['content_nu'];
            $this->nhaplieu_model->db->insert('xvm_tvtrondoi',$insert);
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('xvm_tvtrondoi')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_tuvi?id='.$id) );
            }
            else
            {	
            	$this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/index_tuvi') );
            }
      	}
      	$action_view_image = base_url().'media/images/nhaplieu/';
      	$this->session->set_userdata('action_view_image', $action_view_image);
      	$data['view']       = $this->action_view;
      	$this->load->view( $this->view, $data );  
    }

    public function edit_tuvi()
    {
      	$get = $this->input->get();
      	if( $_POST )
      	{
            $post = $this->input->post();
            $update['namsinh']         = $post['namsinh'];
        	$update['canchi_slug']     = $post['canchi_slug'];
        	$update['content_nam']     = $post['content_nam'];
        	$update['content_nu']      = $post['content_nu'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('xvm_tvtrondoi',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/index_tuvi?page='.$page) );
        	}
      	}
      	$data['item']         = $this->nhaplieu_model->Db_get_edit( $get );
      	if( empty($data['item']) ) show_404();
      	$action_view_image = base_url().'media/images/nhaplieu/';
      	$this->session->set_userdata('action_view_image', $action_view_image);
 	 	$data['view']       = $this->action_view;
      	$this->load->view( $this->view, $data );  
    }

    public function delete_tuvi()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('xvm_tvtrondoi');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_tuvi') );
        }
    }

    //Màu xe hợp mệnh 
  public function index_mauxe()
  {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_mauxe($get);
        $list         = $this->nhaplieu_model->Db_get_index_mauxe( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
  }

  public function add_mauxe()
    {
                          
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $insert['menh_slug']     = $post['menh_slug'];
            $insert['menh_text']     = $post['menh_text'];
            $insert['content']       = $post['content'];
            $this->nhaplieu_model->db->insert('ci_mauxehopmenh',$insert);
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('ci_mauxehopmenh')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_mauxe?id='.$id) );
            }
            else
            { 
              $this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/index_mauxe') );
            }
        }
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_mauxe()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['menh_slug']   = $post['menh_slug'];
            $update['menh_text']   = $post['menh_text'];
            $update['content']     = $post['content'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('ci_mauxehopmenh',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/index_mauxe?page='.$page) );
          }
        }
        $data['item']         = $this->nhaplieu_model->Db_get_edit_mauxe( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_mauxe()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('ci_mauxehopmenh');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_mauxe') );
        }
    }

    // Bói nốt ruồi
    public function index_notruoi()
  {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_notruoi($get);
        $list         = $this->nhaplieu_model->Db_get_index_notruoi( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
  }

  public function add_notruoi()
    {
                          
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $insert['position_text']     = $post['position_text'];
            $insert['position_slug']     = $post['position_slug'];
            $insert['content']       = $post['content'];
            $this->nhaplieu_model->db->insert('ci_boinotruoi',$insert);
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('ci_boinotruoi')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_notruoi?id='.$id) );
            }
            else
            { 
              $this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/index_notruoi') );
            }
        }
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_notruoi()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['position_text']   = $post['position_text'];
            $update['position_slug']   = $post['position_slug'];
            $update['content']     = $post['content'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('ci_boinotruoi',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/index_notruoi?page='.$page) );
          }
        }
        $data['item']         = $this->nhaplieu_model->Db_get_edit_notruoi( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_notruoi()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('ci_boinotruoi');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_notruoi') );
        }
    }

    // Bói kiều
    public function index_boikieu()
  {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_boikieu($get);
        $list         = $this->nhaplieu_model->Db_get_index_boikieu( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
  }

  public function add_boikieu()
    {
                          
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $insert['socau']     = $post['socau'];
            $insert['noidung']     = $post['noidung'];
            $insert['dieu_huong']     = $post['dieu_huong'];
            $this->nhaplieu_model->db->insert('ci_xemboikieu',$insert);
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('ci_xemboikieu')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_boikieu?id='.$id) );
            }
            else
            { 
              $this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/index_boikieu') );
            }
        }
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_boikieu()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['socau']   = $post['socau'];
            $update['noidung']   = $post['noidung'];
            $update['dieu_huong']   = $post['dieu_huong'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('ci_xemboikieu',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/index_boikieu?page='.$page) );
          }
        }
        $data['item']         = $this->nhaplieu_model->Db_get_edit_boikieu( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_boikieu()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('ci_xemboikieu');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_boikieu') );
        }
    }

    // Bói chỉ tay
    public function index_boichitay()
    {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_boichitay($get);
        $list         = $this->nhaplieu_model->Db_get_index_boichitay( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
  }

  public function add_boichitay()
    {
                          
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $insert['name_text']     = $post['name_text'];
            $insert['name_slug']     = $post['name_slug'];
            $insert['content_chitay']       = $post['content_chitay'];
            $this->nhaplieu_model->db->insert('ci_boichitay',$insert);
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('ci_boichitay')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_boichitay?id='.$id) );
            }
            else
            { 
              $this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/index_boichitay') );
            }
        }
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_boichitay()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['name_text']   = $post['name_text'];
            $update['name_slug']   = $post['name_slug'];
            $update['content_chitay']     = $post['content_chitay'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('ci_boichitay',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/index_boichitay?page='.$page) );
          }
        }
        $data['item']         = $this->nhaplieu_model->Db_get_edit_boichitay( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_boichitay()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('ci_boichitay');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_boichitay') );
        }
    }

    // thập nhị bát tú a dương sửa
    public function index_tnbt()
    {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_tnbt($get);
        $list         = $this->nhaplieu_model->Db_get_index_tnbt( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_tnbt()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['name']         = $post['name'];
            $update['title']        = $post['title'];
            $update['nenlam']       = $post['nenlam'];
            $update['kilam']        = $post['kilam'];
            $update['ngoaile']      = $post['ngoaile'];
            $update['seo_ki']      = $post['seo_ki'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('ci_xemngay_nhithapbattu_anhduong
',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/index_tnbt?page='.$page) );
            }
        }
        $data['item']         = $this->nhaplieu_model->Db_get_edit_tnbt( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_tnbt()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('ci_xemngay_nhithapbattu_anhduong');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_tuvi') );
        }
    }


    // Thông tin người dùng nhập khi submit xem công cụ
    public function index_infouser()
    {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )    $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_infouser($get);
        $list         = $this->nhaplieu_model->Db_get_index_infouser( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_infouser()
    {   
        $get = $this->input->get();
        $data['item']         = $this->nhaplieu_model->Db_get_edit_infouser( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_infouser()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('table_save_data_user');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/index_infouser') );
        }
    }


    // đếm số lần click các button của xem tuổi xông đất 2018
    public function count_click()
    {   
        $data['list'] = $this->nhaplieu_model->Db_get_count_click();
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    // Thông tin mã code và thời gian người dùng nhập

    public function info_code()
    {
        $data['list'] = $this->nhaplieu_model->Db_get_info_code();
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );
    }


    public function export_excel_info_code(){   
        $data['list'] = $this->nhaplieu_model->Db_get_info_code();
        $this->load->view('admin/nhaplieu/export_excel_info_code', $data );
    }

    public function export_excel_info_user(){   
        $data['list'] = $this->nhaplieu_model->Db_get_info_user();
        $this->load->view('admin/nhaplieu/export_excel_info_user', $data );
    }

    // Thong tin nguoi dung xem cac muc o cc la so tu vi
    public function info_lasotuvi()
    {   
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )    $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_info_lasotuvi($get);
        $list         = $this->nhaplieu_model->Db_get_info_lasotuvi( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );
    }

    // question
    public function question()
    {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_question($get);
        $list         = $this->nhaplieu_model->Db_get_index_question( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function edit_question()
    {
        $get = $this->input->get();
        $data['item']         = $this->nhaplieu_model->Db_get_edit_question( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function chinhtinh()
    {   
        $data['vitri']   = $this->arr_position;
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_chinhtinh($get);
        $list         = $this->nhaplieu_model->Db_get_index_chinhtinh( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );
    }

    public function add_chinhtinh()
    {   
        $data['position']   = $this->arr_position;
        $data['cung']       = $this->cung;
        $data['saochinh']   = $this->saochinh;
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $cung                   = $post['cung'];
            $content      = $post['content'];
            foreach ($cung as $key => $value) {
              $insert['name_sao']     = $post['name_sao'];
              $insert['id_sao']       = array_search($post['name_sao'], $this->saochinh);
              $insert['position']     = $post['position'];
              $insert['cung']         = $value;
              $insert['id_cung']      = array_search($value, $this->cung);
              $insert['content']      = $content[$key];
              $this->nhaplieu_model->db->insert('tbl_chinhtinh',$insert);
            }
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('tbl_chinhtinh')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_chinhtinh?id='.$id) );
            }
            else
            {   
                $this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/chinhtinh') );
            }
        }
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );
    }

    public function edit_chinhtinh()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['name_sao']     = $post['name_sao'];
            $update['id_sao']       = array_search($post['name_sao'], $this->saochinh);
            $update['position']     = $post['position'];
            $update['cung']         = $post['cung'];
            $update['id_cung']      = array_search($post['cung'], $this->cung);
            $update['content']      = $post['content'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('tbl_chinhtinh',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/chinhtinh?page='.$page) );
            }
        }
        $data['position']   = $this->arr_position;
        $data['cung']       = $this->cung;
        $data['saochinh']   = $this->saochinh;
        $data['item']       = $this->nhaplieu_model->Db_get_edit_chinhtinh( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_chinhtinh()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('tbl_chinhtinh');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/chinhtinh') );
        }
    }

    public function phutinh()
    {
        $get = $this->input->get();
        if( !isset( $get['page'] ) )      $get['page'] = 1;
        if( !isset( $get['key'] ) )       $get['key'] = null;
        if( !isset( $get['order'] ) )     $get['order'] = 'desc';
        $total_recod  = $this->nhaplieu_model->Db_count_index_phutinh($get);
        $list         = $this->nhaplieu_model->Db_get_index_phutinh( $get, $this->limit );
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get']  = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );
    }

    public function add_phutinh()
    {   
        $data['position']   = $this->arr_position;
        $data['cung']       = $this->cung;
        $data['saophu']   = $this->saophu;
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $cung                     = $post['cung'];
            $content                  = $post['content'];
            foreach ($cung as $key => $value) {
              $insert['name_sao']     = $post['name_sao'];
              $insert['id_sao']       = array_search($post['name_sao'], $this->saophu);
              $insert['cung']         = $value;
              $insert['id_cung']      = array_search($value, $this->cung);
              $insert['content']      = $content[$key];
              $this->nhaplieu_model->db->insert('tbl_phutinh',$insert);
            }
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $id = $this->nhaplieu_model->db->select_max('id')->get('tbl_phutinh')->row('id');
                $this->session->set_flashdata('success','<div class="success"><p>Thêm thành công!</p></div>');
                redirect( base_url('admin/nhaplieu/edit_phutinh?id='.$id) );
            }
            else
            {   
                $this->session->set_flashdata('success',$success);
                redirect( base_url('admin/nhaplieu/phutinh') );
            }
        }
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );
    }

    public function edit_phutinh()
    {
        $get = $this->input->get();
        if( $_POST )
        {
            $post = $this->input->post();
            $update['name_sao']     = $post['name_sao'];
            $update['id_sao']       = array_search($post['name_sao'], $this->saophu);
            $update['cung']         = $post['cung'];
            $update['id_cung']      = array_search($post['cung'], $this->cung);
            $update['content']      = $post['content'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('tbl_phutinh',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if( $get['ac'] == 'save' )
            {
                $data['success'] = $success;
            }
            else
            {
                $this->session->set_flashdata('success',$success);
                $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                redirect( base_url('admin/nhaplieu/phutinh?page='.$page) );
            }
        }
        $data['position']   = $this->arr_position;
        $data['cung']       = $this->cung;
        $data['saophu']   = $this->saophu;
        $data['item']       = $this->nhaplieu_model->Db_get_edit_phutinh( $get );
        if( empty($data['item']) ) show_404();
        $action_view_image = base_url().'media/images/nhaplieu/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }

    public function delete_phutinh()
    {
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $cid  = $this->input->post('cid');
            $page = $this->input->post('cid');
            $this->nhaplieu_model->db->where_in('id',$cid)->delete('tbl_phutinh');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/phutinh') );
        }
    }
    // Nhập liệu bói bài tarot
    public function boibaitarot()
    { 
      $get  = $this->input->get();
      if( !isset( $get['page'] ) )      $get['page'] = 1;
      if( !isset( $get['key'] ) )       $get['key'] = null;
      if( !isset( $get['order'] ) )     $get['order'] = 'desc';
      $total_recod  = $this->nhaplieu_model->Db_count_index_boibaitarot($get);
      $list         = $this->nhaplieu_model->Db_get_index_boibaitarot($get,$this->limit);
      $this->admin_pagination->set_url($get);
      $this->admin_pagination->set_total_row($total_recod);
      $this->admin_pagination->set_page_row($this->limit);
      $this->admin_pagination->set_current_page($get['page']);
      $data['pagination'] = $this->admin_pagination->created();
      $data['list'] = $list;
      $data['get']  = $get;
      $data['success'] = $this->session->flashdata('success');
      $data['total_recod'] = $total_recod;
      $data['view'] = $this->action_view;
      $this->load->view( $this->view, $data );
    }

    public function add_boibaitarot()
    {
      $this->admin_auth->check_access($this->action_view);
        if( $_POST )
        {
            
            $post = $this->input->post();
            $insert['number']     = $post['number'];
            $insert['name']       = $post['name'];
            $insert['gioi_thieu'] = $post['gioi_thieu'];
            $insert['tong_quan']  = $post['tong_quan'];
            $insert['tinh_yeu']   = $post['tinh_yeu'];
            $insert['cong_viec']  = $post['cong_viec'];
            $insert['suc_khoe']   = $post['suc_khoe'];
            $this->nhaplieu_model->db->insert('tbl_tarot',$insert);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            $this->session->set_flashdata('success',$success);
            redirect( base_url('admin/nhaplieu/boibaitarot') );
        }
        $data['view']       = $this->action_view;
        $this->load->view( $this->view, $data );  
    }
    
    public function edit_boibaitarot()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if( $_POST )
        {
        
            $post = $this->input->post();
            $update['number']     = $post['number'];
            $update['name']       = $post['name'];
            $update['gioi_thieu'] = $post['gioi_thieu'];
            $update['tong_quan']  = $post['tong_quan'];
            $update['tinh_yeu']   = $post['tinh_yeu'];
            $update['cong_viec']  = $post['cong_viec'];
            $update['suc_khoe']   = $post['suc_khoe'];
            $this->nhaplieu_model->db->where('id',$post['id'])->update('tbl_tarot',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            $this->session->set_flashdata('success',$success);
            redirect( base_url('admin/nhaplieu/boibaitarot') );
        }
      $data['item']         = $this->nhaplieu_model->Db_get_edit_boibaitarot( $get );
      if( empty($data['item']) ) show_404();
      $data['view']       = $this->action_view;
      $this->load->view( $this->view, $data );  
    }
    
    public function delete_boibaitarot()
    {
        $this->admin_auth->check_access($this->action_view);
        if( $_POST && !empty( $_POST['cid'] ) )
        {
            $this->nhaplieu_model->db->where_in('id',$_POST['cid'])->delete('tbl_tarot');
            $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
            redirect( base_url('admin/nhaplieu/boibaitarot') );
        }
    }
}

/* End of file Nhaplieu.php */
/* Location: .//C/Users/admin/AppData/Local/Temp/fz3temp-2/Nhaplieu.php */