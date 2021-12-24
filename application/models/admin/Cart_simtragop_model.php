<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_simtragop_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }    
    // Mua hàng trả góp
    public function Db_count_index_tragop( $get )
    {         
        if( $get['key'] != null )
       {
          $this->db->like('ho_ten',$get['key']);
          $this->db->or_like('dien_thoai',$get['key']);
       }    
       return $this->db->count_all_results('datsim_tragop');        
    }

    public function Db_get_index_tragop( $get, $limit )
    { 
        $offset = ( (int)$get['page'] - 1 ) * $limit;
        $this->db->select('ds.*');
        $this->db->from('datsim_tragop as ds');
        if($get['key'] != null )
        {
            $this->db->like('ds.ho_ten',$get['key']);
            $this->db->or_like('ds.dien_thoai',$get['key']);
        }
        $this->db->order_by( 'ds.id', $get['order'] );
        $this->db->limit($limit, $offset); 
        $query = $this->db->get(); 
        return $query->result_array();
    }

    public function Db_get_edit_tragop( $get )
    {
        $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
        $this->db->select('ds.*');
        $this->db->from('datsim_tragop as ds');
        $this->db->where('ds.id', $get['id'] );
        $query = $this->db->get();
        return $query->row_array();
    }

}         