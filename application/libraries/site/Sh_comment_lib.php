<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Sh_comment_lib
    {
        public  $CI = null;
        public $listQue = null;

        public function __construct(){
            // parent::__construct(); 
            $this->CI =& get_instance();
            $this->CI->load->database();
        }

        public function getByTheme($url = null){
            // 1. Get all comment by url
            $recordComment = $this->CI->db->select('sh_comment.*, sh_member.name as member_name, sh_member.gender as member_gender, user.fullname as admin_name')
                                            ->from('sh_comment')
                                            ->join('sh_member','sh_member.id = sh_comment.member_id','left')
                                            ->join('user','user.id = sh_comment.user_id','left')
                                            ->where(array('url_id'=> $url,'status' => 'publish'))
                                            ->order_by('meta_left', 'desc')
                                            ->order_by('meta_right', 'asc')
                                            ->order_by('created_date', 'asc')
                                            ->get()
                                            ->result_array();
            if (!$recordComment) {
                return false;
            }
            return array(
                'recordComment' => $this->getListRecursive($recordComment, 0),
                'countRC' => count($recordComment)
            );
        }

        public function getListRecursive(&$elements, $parentId = 0){
            $branch = array();
            foreach ($elements as $key => $element) {
                if ($element['root_id'] == $parentId) {

                    $element['children'] = $this->getListRecursive($elements, $element['id']);

                    $branch[] = $element;                 
                }
            }
            return $branch;
        }
    }
