<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhaplieu_model extends CI_Model {
	protected $table = 'xvm_tvtrondoi';
 	public function __construct()
 	{
	    $this->load->database();
 	}
         
 	public function Db_count_index( $get )
 	{         
 		if( $get['key'] != null )
       	{
          	$this->db->like('namsinh',$get['key']);
          	$this->db->or_like('canchi_slug',$get['key']);
       	}    
       	return $this->db->count_all_results('xvm_tvtrondoi');        
            
 	}
         
 	public function Db_get_index( $get, $limit )
 	{ 
      	$offset = ( (int)$get['page'] - 1 ) * $limit;
      	$this->db->select('*');
      	$this->db->from('xvm_tvtrondoi as tv');
      	if($get['key'] != null )
      	{
            $this->db->like('tv.namsinh',$get['key']); 
            $this->db->or_like('tv.canchi_slug',$get['key']); 
      	}
      	$this->db->limit($limit, $offset); 
      	$query = $this->db->get(); 
      	return $query->result_array();
 	}
         
 	public function Db_get_edit( $get )
 	{
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('tv.*');
        $this->db->from('xvm_tvtrondoi as tv');
        $this->db->where('tv.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
 	}

  // Màu xe hợp mệnh
  public function Db_count_index_mauxe( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('menh_text',$get['key']);
            $this->db->or_like('menh_slug',$get['key']);
        }    
        return $this->db->count_all_results('ci_mauxehopmenh');        
            
  }
         
  public function Db_get_index_mauxe( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('ci_mauxehopmenh as mx');
        if($get['key'] != null )
        {
            $this->db->like('mx.menh_text',$get['key']); 
            $this->db->or_like('mx.menh_slug',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }
         
  public function Db_get_edit_mauxe( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('mx.*');
        $this->db->from('ci_mauxehopmenh as mx');
        $this->db->where('mx.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }

  // Bói nốt ruồi
  public function Db_count_index_notruoi( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('position_text',$get['key']);
            $this->db->or_like('position_slug',$get['key']);
        }    
        return $this->db->count_all_results('ci_boinotruoi');        
            
  }
         
  public function Db_get_index_notruoi( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('ci_boinotruoi as nr');
        if($get['key'] != null )
        {
            $this->db->like('nr.position_text',$get['key']); 
            $this->db->or_like('nr.position_slug',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }
         
  public function Db_get_edit_notruoi( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('nr.*');
        $this->db->from('ci_boinotruoi as nr');
        $this->db->where('nr.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }

  // Bói kiều
  public function Db_count_index_boikieu( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('socau',$get['key']);
        }    
        return $this->db->count_all_results('ci_xemboikieu');        
            
  }
         
  public function Db_get_index_boikieu( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('ci_xemboikieu as bk');
        if($get['key'] != null )
        {
            $this->db->like('bk.socau',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }
         
  public function Db_get_edit_boikieu( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('bk.*');
        $this->db->from('ci_xemboikieu as bk');
        $this->db->where('bk.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }

  // boi chi tay
  public function Db_count_index_boichitay( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('name_text',$get['key']);
            $this->db->or_like('name_slug',$get['key']);
        }    
        return $this->db->count_all_results('ci_boichitay');        
            
  }
         
  public function Db_get_index_boichitay( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('ci_boichitay as ct');
        if($get['key'] != null )
        {
            $this->db->like('ct.name_text',$get['key']); 
            $this->db->or_like('ct.name_slug',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }
         
  public function Db_get_edit_boichitay( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('ct.*');
        $this->db->from('ci_boichitay as ct');
        $this->db->where('ct.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }

  // sủa thập nhị bát tú anh dương
  public function Db_count_index_tnbt( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('name',$get['key']);
            $this->db->or_like('title',$get['key']);
        }    
        return $this->db->count_all_results('ci_xemngay_nhithapbattu_anhduong');        
            
  }
         
  public function Db_get_index_tnbt( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('ci_xemngay_nhithapbattu_anhduong as ad');
        if($get['key'] != null )
        {
            $this->db->like('ad.name',$get['key']); 
            $this->db->or_like('ad.title',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }
         
  public function Db_get_edit_tnbt( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('ad.*');
        $this->db->from('ci_xemngay_nhithapbattu_anhduong as ad');
        $this->db->where('ad.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }


  // thông tin người dùng nhập khi submit xem cc
  public function Db_count_index_infouser( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('url',$get['key']);
            $this->db->or_like('date_submit',$get['key']);
        }    
        return $this->db->count_all_results('table_save_data_user');        
            
  }
         
  public function Db_get_index_infouser( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('table_save_data_user as s');
        if($get['key'] != null )
        {
            $this->db->like('s.url',$get['key']); 
            $this->db->or_like('s.date_submit',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }

  public function Db_get_edit_infouser( $get )
  {
    $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
    $this->db->select('us.*');
    $this->db->from('table_save_data_user as us');
    $this->db->where('us.id', $get['id'] );
    $query = $this->db->get();
    return $query->row_array();
  }

  // Count click xong dat 2018
  public function Db_get_count_click()
  {
    $this->db->select('cl.*, COUNT(cl.name_click) as total');
    $this->db->from('count_click as cl');
    $this->db->group_by('cl.name_click');
    $this->db->group_by('cl.date_click');
    // $this->db->order_by('cl.name_click','ASC');
    $this->db->order_by('cl.date_click','ASC');
    return $this->db->get()->result_array();
  }

  // Thông tin mã code và thời gian người dùng nhập
  public function Db_get_info_code()
  {
    $this->db->select('if.*, COUNT(if.url) as total');
    $this->db->from('info_code as if');
    $this->db->group_by('if.url');
    $this->db->group_by('if.date');
    $this->db->order_by('if.date','ASC');
    return $this->db->get()->result_array();
  }
  

  public function Db_get_info_user()
  {
    $this->db->select('us.*, COUNT(us.url) as total');
    $this->db->from('table_save_data_user as us');
    $this->db->group_by('us.url');
    $this->db->group_by('us.date_submit');
    $this->db->order_by('us.date_submit','DESC');
    return $this->db->get()->result_array();
  }

  public function Db_count_info_lasotuvi()
  {
    return $this->db->count_all_results('info_lasotuvi');
  }

  public function Db_get_info_lasotuvi($get,$limit)
  {
    $offset = ( (int)$get['page'] - 1 ) * $limit;
    $this->db->select('tv.*,COUNT(tv.text) as total');
    $this->db->from('info_lasotuvi as tv');
    $this->db->group_by('tv.text');
    $this->db->limit($limit, $offset); 
    $query = $this->db->get(); 
    return $query->result_array();
  }

  public function Db_count_index_question( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('name',$get['key']);
            $this->db->or_like('them',$get['key']);
        }    
        return $this->db->count_all_results('tbl_question');        
            
  }
         
  public function Db_get_index_question( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('tbl_question as tq');
        if($get['key'] != null )
        {
            $this->db->like('tq.them',$get['key']); 
            $this->db->or_like('tq.name',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }

  public function Db_get_edit_question( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('tq.*');
        $this->db->from('tbl_question as tq');
        $this->db->where('tq.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }


  public function Db_count_index_chinhtinh( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('name_sao',$get['key']);
            $this->db->or_like('id_sao',$get['key']);
        }    
        return $this->db->count_all_results('tbl_chinhtinh');        
            
  }
         
  public function Db_get_index_chinhtinh( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('tbl_chinhtinh as ct');
        if($get['key'] != null )
        {
            $this->db->like('ct.name_sao',$get['key']); 
            $this->db->or_like('ct.id_sao',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }

  public function Db_get_edit_chinhtinh( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('ct.*');
        $this->db->from('tbl_chinhtinh as ct');
        $this->db->where('ct.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }

  public function Db_count_index_phutinh( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('name_sao',$get['key']);
            $this->db->or_like('id_sao',$get['key']);
        }    
        return $this->db->count_all_results('tbl_phutinh');        
            
  }
         
  public function Db_get_index_phutinh( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('*');
        $this->db->from('tbl_phutinh as pt');
        if($get['key'] != null )
        {
            $this->db->like('pt.name_sao',$get['key']); 
            $this->db->or_like('pt.id_sao',$get['key']); 
        }
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }

  public function Db_get_edit_phutinh( $get )
  {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('pt.*');
        $this->db->from('tbl_phutinh as pt');
        $this->db->where('pt.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
  }
  // Bói bài tarot
  public function Db_count_index_boibaitarot( $get )
  {         
    if( $get['key'] != null )
        {
            $this->db->like('name',$get['key']);
        }    
        return $this->db->count_all_results('tbl_tarot');        
    
  }
         
  public function Db_get_index_boibaitarot( $get, $limit )
  { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('ci.*');
        $this->db->from('tbl_tarot as ci');
        if($get['key'] != null )
        {
          $this->db->like('ci.name',$get['key']); 
        }
      $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
  }
         
  public function Db_get_edit_boibaitarot( $get )
  {
      $router_id  = isset( $get['id'] ) ? $get['id'] : 0;
      $this->db->select('ci.*');
      $this->db->from('tbl_tarot ci');
      $this->db->where('ci.id', $router_id );
      $query = $this->db->get();
      return $query->row_array();
  }
}

/* End of file Nhaplieu_model.php */
/* Location: .//C/Users/admin/AppData/Local/Temp/fz3temp-2/Nhaplieu_model.php */