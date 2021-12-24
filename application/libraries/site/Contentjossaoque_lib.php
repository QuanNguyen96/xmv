<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Contentjossaoque_lib
    {
        private  $CI = null;
        public $listQue = null;

        public function __construct(){
            $this->CI =& get_instance();
            $this->CI->load->database();
            $this->setQue();
        }

        /**
        *
        * 
        * @param string     ---
        * @return bool|null    ---
        *
        **/
        public function getContent($param = null){
            $listQue    = $this->listQue;
            if (array_key_exists($param, $listQue)) {
                return $listQue[$param];
            }
            return $listQue['Thuần Càn (乾 qián)'];
        }

        /**
        *
        * Hiển thị thông tin của quẻ được truyền vào
        * @param string     Tên quẻ
        * @return array    Mảng chi tiết thông tin của quẻ đó
        *
        **/
        public function getContentQue($param = null){
            $listQue    = $this->listQue;
            if (array_key_exists($param, $listQue)) {
                return $listQue[$param];
            }
            return $listQue['Thuần Càn (乾 qián)'];
        }

        private function setQue(){
            $resultSim = $this->CI->db->query('select * from jos_sao_que')
                                ->result_array();
            $result     = $this->getKeyToArray('ten', $resultSim);
            $this->listQue  = $result;
        }

        /**
        *
        * Lấy quẻ theo khóa param1 truyền vào
        * @param string     ---
        * @return bool|null    ---
        *
        **/
        private function getKeyToArray($param1,$param2 = null){
            $arrResult  = null;
            foreach ($param2 as $key => $value) {
                $arrResult[$value[$param1]] = $value;
            }
            return $arrResult;
        }
    }
