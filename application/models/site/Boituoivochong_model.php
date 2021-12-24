<?php
    class Boituoivochong_model extends CI_Model{
        public $sql = '';
        public $result = null;
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function getNgay(){
            //echo 'hello';
        }
        
        public function getLucThap($canchi){
            $sql = "SELECT * FROM `jos_sao_lucthap` WHERE `canchi` LIKE '%$canchi%' ";
            $rows = $this->db->query($sql);
            return $rows->row_array();
        }
        
        function getCungMenh($a,$b){  
    		$cung_r = array();
    		$t=0;
    		for($i=0;$i<4;$i++){
    		$a1=substr($a,$i,1);
    		$t=$a1+$t;				
    		if($t>8)$t=$t-9;
    		}
    		if($t==0)$t=9;
            
    		if($b=="1")$t=$t+9;		
    		$sql = "SELECT *
    				FROM `jos_sao_cung`
    				WHERE `id` = '$t'";
                    
    		$rows = $this->db->query($sql);
            return $rows->row_array();
    	}

        /**
         * 
         * input    : $input1 : chi cua nam sinh - $input2 : nam so sanh tam tai
         * return   : array 
         * 
         * */
        function getTamtai($input1 = null , $input2 = null){
            $sql = "select * from ci_tamtai where nam_tuoi like '%$input1%' and nam_tamtai like '%$input2%'";
            //echo $sql;
            $rows = $this->db->query($sql);
            return $rows->row_array();
        }
        
        /**
         * 
         * input    : $input1 : tuoi tinh toi thoi diem nam xac dinh lam nha
         * return   : array
         * 
         * */
        function getHoangoc($input = null){
            $query = $this->db->select()
                                ->where('age',$input)
                                ->get('ci_hoangoc')
                                ->row_array();
            return $query;
        }
        
        /** 
         * 
         * input    : $input = tuoi am lich gia chu
         * return   : array kim lau
         * 
         * */
        function getKimlau($input = null){  
            $input = (int)$input;
            $query = $this->db->select()
                                ->from('ci_kimlau')
                                ->where('age',$input)
                                ->get();
            $result = $query->row_array();
            return $result;
        }
        
        function getTamtai_tranh($input = null){
            $sql = "select * from ci_tamtai where nam_tuoi like '%$input%'";
            //echo $sql;
            $rows = $this->db->query($sql);
            return $rows->row_array();
        }
        
        public function get_content_canxuongtinhso($luong,$chi)
        {
            $this->db->where('luong',$luong);
            $this->db->where('chi',$chi);
            $this->db->select('*');
            $this->db->from('ci_canxuong_tinhso');
            return $this->db->get()->row_array();
        }
    }
?>