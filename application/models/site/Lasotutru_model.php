<?php
    class Lasotutru_model extends CI_Model{
        public $sql = '';
        public $result = null;
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function get_laso_cung($input = null){
            return $this->db->select('*')
                        ->from('ci_laso_cung')
                        ->where('can',$input)
                        ->get()
                        ->row_array();
        }
        function get_laso_que($input1 = null,$input2 = null){
            $where = array(
                'can_nam'   => $input1,
                'can_gio'   => $input2,
            );
            return $this->db->select('*')
                        ->from('ci_laso_que')
                        ->where($where)
                        ->get()
                        ->row_array();
        }
        function get_laso_luan($input1 = null , $input2 = null,$can_nam = null){
            $where = array(
                'can_gio'   => $input1,
                'chi_gio'   => $input2,
                'can_nam'   => $can_nam
            );
            return $this->db->select('*')
                        ->from('ci_laso_luan')
                        ->where($where)
                        ->get()
                        ->row_array();
        }
        
        public function getLucThap($canchi){
            $sql = "SELECT * FROM `jos_sao_lucthap` WHERE `canchi` LIKE '%$canchi%' ";
            $rows = $this->db->query($sql);
            return $rows->row_array();
        }
        
    }
?>