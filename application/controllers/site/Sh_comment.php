<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sh_comment extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
        ));
        $this->load->database();
    }

    /** 
     *
     Post comment user send 
     *
    **/
    public function processCommentAuto(){
        if ($this->input->is_ajax_request()) {
            if ($_POST) {
                if ($this->checkSession()) {
                    echo $this->postComment();
                }
                else{
                    $result = array(
                        'response' => null,
                        'msg' => null,
                        'acc' => 'no',
                    );
                    echo json_encode($result, true);
                }
            }
        }
        else {
            return redirect(base_url('error.html'),'location',301);
        }
    }

    private function postComment(){
        $this->form_validation->set_rules('parent_id', 'Lỗi hệ thống -', 'required|numeric');
        $this->form_validation->set_rules('url_id', 'Lỗi hệ thống -', 'required');
        $this->form_validation->set_rules('content', 'Nội dung bình luận', 'required|min_length[6]');

        $this->form_validation->set_message('required', '{field} không thể để trống.');
        $this->form_validation->set_message('numeric', 'Có lỗi trong hệ thống vui lòng thử lại.');
        $this->form_validation->set_message('min_length', '{field} không được dưới 6 kí tự.');
        $input = $this->input->post();
        if ($this->form_validation->run())
        {
            $response = '<div class="alert alert-success">Thông tin của bạn đã được gửi THÀNH CÔNG đến quản trị viên, vui lòng chờ phản hồi nhé!</div>';
            $msg = '1';

            // Lay noi dung session member_id
            $accArr = $this->session->userdata('acc_permit');
            $member_id = isset($accArr['acc_id'])?$accArr['acc_id']:null;

            /** Cap nhap so thu tu left, right, level **/
            $leftRightUpdate = $this->processLeftRightComment($input);

            // Cap nhap thong tin vao database quan ly nguoi dung
            $arrInsert = array(
                'parent_id' => $input['parent_id'],
                'url_id' => $input['url_id'],
                'content' => $input['content'],
                'member_id' => $member_id,
                'meta_left' => $leftRightUpdate['meta_left'],
                'meta_right' => $leftRightUpdate['meta_right'],
                'root_id' => $leftRightUpdate['root_id'],
                'created_date' => date('Y-m-d h:i:s')
            );
            $this->db->insert('sh_comment', $arrInsert);
        } else
        {
            $response = validation_errors('<div class="alert alert-warning">',
                '</div>');
            $msg = '0';
        }
        $result = array(
            'response' => $response,
            'msg' => $msg,
            'acc' => 'yes'
            );
        return json_encode($result, true);
    }

    private function processLeftRightComment($iPost){
        // Check url have 
        $arrCheck = array(
            'url_id' => $iPost['url_id'],
            'id' => $iPost['parent_id'],
        );
        $checkPost = $this->db->select('')
                                ->from('sh_comment')
                                ->where($arrCheck)
                                ->get()
                                ->row_array();
        /** Neu khong co comment hoac parent_id = 0 **/
        if (!$checkPost) {
            // Check max left + 1
            $maxLeftRoot_none = $this->db->query('SELECT MAX(meta_left)+1 as max_meta_left FROM sh_comment WHERE url_id = "'.$iPost['url_id'].'"')
                                            ->row_array();
            return array(
                'meta_left' => $maxLeftRoot_none['max_meta_left']?$maxLeftRoot_none['max_meta_left']:1,
                'meta_right' => 0,
                'root_id' => 0,
            );
        }

        /** Neu co comment hoac parent_id != 0 **/
        // Check root of parent
        // Neu root_id khac 0
        if ($checkPost['root_id']) {
            $rootIdCheck = $checkPost['root_id'];
        }
        else{
            $rootIdCheck = $iPost['parent_id'];
        }
        $rootOfParent = array(
            'url_id' => $iPost['url_id'],
            'id' => $rootIdCheck,
        );
        $itemROP = $this->db->select('')
                                ->from('sh_comment')
                                ->where($rootOfParent)
                                ->get()
                                ->row_array();
        // Get max right of root
        $maxRightRoot = $this->db->query('SELECT MAX(meta_right)+1 as max_meta_right FROM sh_comment WHERE url_id = "'.$iPost['url_id'].'" and root_id = '.$rootIdCheck)
                                            ->row_array();
        return array(
            'meta_left' => $itemROP['meta_left'],
            'meta_right' => $maxRightRoot['max_meta_right']?$maxRightRoot['max_meta_right']:1,
            'root_id' => $rootIdCheck,
        );

    }

    /** 
     *
     check User session 
     *
    **/
    public function checkSession(){
        return $this->session->has_userdata('acc_permit')?true:false;
    }

    /**
    *
    * User permittion commit
    *
    **/
    public function processAccPermittion(){
        if ($this->input->is_ajax_request()) {
            if ($_POST) {
                $resultPost = $this->postAccPermittion();
                $checkLoginOk = json_decode($resultPost, true);
                if ($checkLoginOk['msg']) {
                    $arrSsn = array(
                        'acc_info' => $this->input->post(),
                        'acc_id'    => $checkLoginOk['acc_id']
                    );
                    $this->session->set_userdata('acc_permit', $arrSsn);
                }
                echo $resultPost;
            }
        }
        else {
            return redirect(base_url('error.html'),'location',301);
        }
    }

    private function postAccPermittion(){
        $this->form_validation->set_rules('name', 'Họ tên', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tel', 'Số điện thoại liên hệ', 'required|numeric|min_length[10]|max_length[11]');
        $this->form_validation->set_rules('gender', 'Giới tính', 'required|numeric');

        $this->form_validation->set_message('required', '{field} không thể để trống.');
        $this->form_validation->set_message('numeric', '{field} không đúng định dạng.');
        $this->form_validation->set_message('valid_email', '{field} không đúng định dạng.');
        $this->form_validation->set_message('min_length', '{field} không được dưới {param} kí tự.');
        $this->form_validation->set_message('max_length', '{field} không được nhiều hơn {param} kí tự.');

        // $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');

        $input = $this->input->post();
        if ($this->form_validation->run())
        {
            $response = '<div class="alert alert-success">Thông tin của bạn đã được gửi THÀNH CÔNG đến quản trị viên, vui lòng chờ phản hồi nhé!</div>';
            $msg = '1';
            // Cap nhap thong tin vao database quan ly nguoi dung
            $arrInsert = array(
                'name' => $input['name'],
                'email' => $input['email'],
                'tel' => $input['tel'],
                'gender' => $input['gender'],
                'ip' => $_SERVER['REMOTE_ADDR'],
                'created_date' => date('Y-m-d h:i:s')
            );
            $this->db->insert('sh_member', $arrInsert);
            $acc_id = $this->db->insert_id();
        } else
        {
            $response = '<div class="alert alert-warning text-left"><h4><label>Bạn cần nhập đầy đủ và chính xác thông tin sau:</label></h4>';
            $response .= validation_errors('<div>',
                '</div>');
            $response .= '</div>';
            $msg = '0';
            $acc_id = '';
        }
        $result = array(
            'response' => $response,
            'msg' => $msg,
            'acc_id' => $acc_id
            );
        return json_encode($result, true);
    }

    public function redirect(){
        return redirect(base_url(),'location',301);
    }

    public function formComment()
    {
        echo $this->load->view('site/sh_comment/form_comment', '', true);
    }
}
