<?php
defined('BASEPATH') or exit('No direct script access allowed');
class My_seolink
{
    public $message = '';
    public $name = '';
    public $title = '';
    public $keywords = '';
    public $description = '';
    public $text = '';
    public $text_foot = '';
    public $text_content = '';
    public function __construct($ngay = null, $thang = null, $nam = null)
    {
        $this->CI = &get_instance();
        $this->CI->load->library('site/my_config');
        $this->CI->load->model('site/seolink_model');
    }

    public function set_seolink($ngay = null, $thang = null, $nam = null)
    {
        $ngay = empty($ngay) ? (int)date('d') : $ngay;
        $thang = empty($thang) ? (int)date('m') : $thang;
        $nam = empty($nam) ? date('Y') : $nam;
        $arr_url = $this->CI->uri->segment_array();
        if (!isset($arr_url[2])) {
            $link = $arr_url[1];
        } else {
            $link = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $seolink = $this->CI->seolink_model->db->where('link', $link)->get('seolink')->
            row_array();
        //var_dump($seolink);
        if (!empty($seolink)) {
            $seolink['title'] = str_replace('$ngay', $ngay, $seolink['title']);
            $seolink['title'] = str_replace('$thang', $thang, $seolink['title']);
            $seolink['title'] = str_replace('$nam', $nam, $seolink['title']);
            $seolink['keywords'] = str_replace('$ngay', $ngay, $seolink['keywords']);
            $seolink['keywords'] = str_replace('$thang', $thang, $seolink['keywords']);
            $seolink['keywords'] = str_replace('$nam', $nam, $seolink['keywords']);
            $seolink['description'] = str_replace('$ngay', $ngay, $seolink['description']);
            $seolink['description'] = str_replace('$thang', $thang, $seolink['description']);
            $seolink['description'] = str_replace('$nam', $nam, $seolink['description']);
            //echo $seolink['keywords'];
            $seolink['text'] = str_replace('$ngay', $ngay, $seolink['text']);
            $seolink['text'] = str_replace('$thang', $thang, $seolink['text']);
            $seolink['text'] = str_replace('$nam', $nam, $seolink['text']);
            $seolink['name'] = str_replace('$ngay', $ngay, $seolink['name']);
            $seolink['name'] = str_replace('$thang', $thang, $seolink['name']);
            $seolink['name'] = str_replace('$nam', $nam, $seolink['name']);
            $seolink['text_foot'] = str_replace('$ngay', $ngay, $seolink['text_foot']);
            $seolink['text_foot'] = str_replace('$thang', $thang, $seolink['text_foot']);
            $seolink['text_foot'] = str_replace('$nam', $nam, $seolink['text_foot']);
            $seolink['text_content'] = str_replace('$ngay', $ngay, $seolink['text_content']);
            $seolink['text_content'] = str_replace('$thang', $thang, $seolink['text_content']);
            $seolink['text_content'] = str_replace('$nam', $nam, $seolink['text_content']);
            $this->title = $seolink['title'];
            $this->keywords = $seolink['keywords'];
            $this->description = $seolink['description'];
            $this->text = $seolink['text'];
            $this->name = $seolink['name'];
            $this->text_foot = $seolink['text_foot'];
            $this->text_content = $seolink['text_content'];
        } else {
            $this->title = $this->CI->my_config->get_config('title');
            $this->keywords = $this->CI->my_config->get_config('keywords');
            $this->description = $this->CI->my_config->get_config('description');
        }
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_keywords()
    {
        return $this->keywords;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_text()
    {
        return $this->text;
    }
    public function get_text_foot()
    {
        return $this->text_foot;
    }
    public function get_text_content()
    {
        return $this->text_content;
    }
    public function get_name()
    {
        return $this->name;
    }

    public function seolink_cst($input = null)
    {
        $url = trim($input['link']);
        $input_replace = $input['replace'];
        $result_seolink = $this->CI->seolink_model->db->where('link', $url)->get('seolink')->
            row_array();
        if ($result_seolink) {
            foreach ($input_replace as $key => $value) {
                $result_seolink['name'] = str_replace($key, $value, $result_seolink['name']);
                $result_seolink['title'] = str_replace($key, $value, $result_seolink['title']);
                $result_seolink['keywords'] = str_replace($key, $value, $result_seolink['keywords']);
                $result_seolink['description'] = str_replace($key, $value, $result_seolink['description']);
                $result_seolink['text'] = str_replace($key, $value, $result_seolink['text']);
                $result_seolink['text_foot'] = str_replace($key, $value, $result_seolink['text_foot']);
                $result_seolink['text_content'] = str_replace($key, $value, $result_seolink['text_content']);
            }

            $this->name = $result_seolink['name'];
            $this->title = $result_seolink['title'];
            $this->keywords = $result_seolink['keywords'];
            $this->description = $result_seolink['description'];
            $this->text = $result_seolink['text'];
            $this->text_foot = $result_seolink['text_foot'];
            $this->text_content = $result_seolink['text_content'];
        } else {
            $this->title = $this->CI->my_config->get_config('title');
            $this->keywords = $this->CI->my_config->get_config('keywords');
            $this->description = $this->CI->my_config->get_config('description');
        }
    }
}
