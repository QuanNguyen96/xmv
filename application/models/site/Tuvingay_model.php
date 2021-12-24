<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tuvingay_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function Db_list_que($arr_que_id)
    {
//        pr($arr_que_id);die();
        if(empty($arr_que_id) ){
            return [];
        }
    	$this->db->select('que_id,name,y_nghia');
    	$this->db->where_in('que_id',$arr_que_id);
    	$query = $this->db->get('tvn_que');
    	$data = $query->result_array();
    	foreach ($data as $key => $value) {
    		$list_que[$value['que_id']]['name'] = $value['name'];
    		$list_que[$value['que_id']]['y_nghia'] = unserialize($value['y_nghia']);
    	}
    	return $list_que;
    }
    public function Db_list_quan_he($arr_nhom_quan_he_id)
    {
    	$this->db->select('quan_he_id,quan_he_name,nhom_quan_he_id,nhom_quan_he_name,y_nghia');
    	$this->db->where_in('nhom_quan_he_id',$arr_nhom_quan_he_id);
    	$query = $this->db->get('tvn_quan_he');
    	$data = $query->result_array();
        $list_quan_he = array();
        if(!empty($data))
        {
            foreach ($data as $key => $value) {
                $list_quan_he[$value['nhom_quan_he_id']]['name']    = $value['nhom_quan_he_name'];
                $list_quan_he[$value['nhom_quan_he_id']]['y_nghia'] = unserialize($value['y_nghia']);
            }
        }
    	return $list_quan_he;
    }
    public function Db_list_ngu_hanh($arr_ngu_hanh_id)
    {
        $this->db->select('ngu_hanh_key,ngu_hanh_name,y_nghia');
        $this->db->where_in('ngu_hanh_key',$arr_ngu_hanh_id);
        $query = $this->db->get('tvn_ngu_hanh');
        $data = $query->result_array();
        foreach ($data as $key => $value) {
            $list_ngu_hanh[$value['ngu_hanh_key']]['name'] = $value['ngu_hanh_name'];
            $list_ngu_hanh[$value['ngu_hanh_key']]['y_nghia'] = unserialize($value['y_nghia']);
        }
        return $list_ngu_hanh;
    }
}