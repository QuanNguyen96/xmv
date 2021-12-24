<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Comment_lib
    {
        public  $CI = null;
        public $listQue = null;

        public function __construct(){
            // parent::__construct(); 
            $this->CI =& get_instance();
            $this->CI->load->database();
        }

        /**
        *
        * 
        * @param string     url get
        * @return bool|null    ---
        *
        **/
        public function get($param = null){
            // 1. Get all comment by url
            $recordComment = $this->CI->db->select()
                                            ->from('tbl_comment')
                                            ->where('url', $param)
                                            ->order_by('created_date', 'desc')
                                            ->get()
                                            ->result_array();
            return $this->getListRecursive($recordComment, 0);
        }

        public function getByTheme($param = null){
            // 1. Get all comment by url
            $recordComment = $this->CI->db->select()
                                            ->from('tbl_comment')
                                            ->where('url', $param)
                                            ->order_by('created_date', 'asc')
                                            ->get()
                                            ->result_array();
            if (!$recordComment) {
                return false;
            }
            $data['recursive_comment'] = $recursiveComment = $this->getListRecursive($recordComment, 0);
            return $this->CI->load->view('site/comment/get_by_theme',$data,true);
        }

        public function getListRecursive(&$elements, $parentId = 0){
            $branch = array();
            foreach ($elements as $key => $element) {
                if ($element['parent_id'] == $parentId) {

                    $element['children'] = $this->getListRecursive($elements, $element['id']);

                    $branch[] = $element;                 
                }
            }
            return $branch;
        }
    }
