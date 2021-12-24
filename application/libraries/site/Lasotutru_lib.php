<?php
    class Lasotutru_lib {
        var $CI;
        function __construct(){ 
            $this->CI = &get_instance();
            $this->CI->load->library(array('ngayamduong'));
            $this->CI->load->model('lasotutru_model');
        }
        
        
        public function getgioCanHH($can,$chi,$giosinh){
            $can = trim($can);
            $chi = trim($chi);
            //echo $can.'-'.$chi;
            $giosinh = trim($giosinh);
            $sql    = "SELECT b.can,e.chi
            FROM ci_sao_giocanchi a, ci_sao_can b,ci_sao_chi e,ci_sao_giohh c, ci_sao_hoang_hac d,ci_sao_khoanggio h
            WHERE a.cangio = b.id
            AND h.id=a.gio
            AND e.id=c.gio
            AND c.loai = d.id
            AND c.gio = a.gio
            AND h.khoanggio = '$giosinh'
            AND a.can LIKE '%$can%'
            AND c.chi LIKE '%$chi%'
            ORDER BY a.gio";
            $rows = $this->CI->lasotutru_model->db->query($sql);
            return $rows->row_array();
        }
    }
?>