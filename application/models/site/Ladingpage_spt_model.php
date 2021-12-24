<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ladingpage_spt_model extends CI_Model
{
    private $table = 'ladingpage_simphongthuy';

    public function __construct()
    {
        $this->load->database();
    }

    public function Db_item()
    {
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function Db_list_article($item)
    {
        $data = array();
        $bv_sim_hop_tuoi = $item['bv_sim_hop_tuoi'] != '' ? unserialize($item['bv_sim_hop_tuoi']) : array();
        $bv_sim_hop_menh = $item['bv_sim_hop_menh'] != '' ? unserialize($item['bv_sim_hop_menh']) : array();
        $bv_so_dien_thoai = $item['bv_so_dien_thoai'] != '' ? unserialize($item['bv_so_dien_thoai']) : array();
        $bv_y_nghia_so = $item['bv_y_nghia_so'] != '' ? unserialize($item['bv_y_nghia_so']) : array();
        $article_id = array_merge($bv_sim_hop_tuoi, $bv_sim_hop_menh, $bv_so_dien_thoai, [$bv_y_nghia_so]);
        $this->db->select('id,name,slug,avatar');
        $this->db->where_in('id', $article_id);
        $query = $this->db->get('article');
        $list = $query->result_array();
        $list_bv_sim_hop_tuoi = array();
        $list_bv_sim_hop_menh = array();
        $list_bv_so_dien_thoai = array();
        $list_bv_y_nghia_so = array();
        if (!empty($list)) {
            foreach ($list as $key => $value) {
                if (in_array($value['id'], $bv_sim_hop_tuoi)) {
                    array_push($list_bv_sim_hop_tuoi, $value);
                }
                if (in_array($value['id'], $bv_sim_hop_menh)) {
                    array_push($list_bv_sim_hop_menh, $value);
                }
                if (in_array($value['id'], $bv_so_dien_thoai)) {
                    array_push($list_bv_so_dien_thoai, $value);
                }
                if (!empty($bv_y_nghia_so) && in_array($value['id'], $bv_y_nghia_so)) {
                    array_push($list_bv_y_nghia_so, $value);
                }
            }
        }
        $data['bv_sim_hop_tuoi'] = $list_bv_sim_hop_tuoi;
        $data['bv_sim_hop_menh'] = $list_bv_sim_hop_menh;
        $data['bv_so_dien_thoai'] = $list_bv_so_dien_thoai;
        $data['bv_y_nghia_so'] = $list_bv_y_nghia_so;
        return $data;
    }
}    
