<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_html extends CI_Controller
{
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function get_html_tag($content)
    {

    }

    public function text($content)
    {
        $html = '<div class="field">
                       <label>' . $content['name'] . '</label>
                       <input type="text" name="' . $content['name'] . '" value="' . $content['value'] . '">
                     </div>';
        return $html;
    }

    public function select($content)
    {
        $html = '<div class="field">
                       <label>' . $content['name'] . '</label>
                       <select name="' . $content['name'] . '">';
        $arroption = explode("\n", $content['name']);
        foreach ($arroption as $val) {
            $option = explode('=', $val);
            if (!isset($option[1])) {
                $option[1] = '';
            }
            $html .= '<option ="' . $option[0] . '">' . $option[1] . '</option>';
        }

        $html .= '</select>
                     </div>';
        return $html;
    }

    public function textarea($content)
    {
        $html = '<div class="field">
                       <label>' . $content['name'] . '</label>
                       <textarea name="' . $content['name'] . '">' . $content['value'] . '</textarea>
                     </div>';
        return $html;
    }

    public function editor($content)
    {
        $html = '<div class="field">
                       <label>' . $content['name'] . '</label>
                       <textarea name="' . $content['name'] . '" id="' . $content['name'] . '">' . $content['value'] . '</textarea>
                       <script>
                            CKEDITOR.replace( "' . $content['name'] . '" );
                            CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + "/" + ckeditor_config.html_path;
                            CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + "/" + ckeditor_config.html_path +"?type=Images";
                            CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + "/" + ckeditor_config.html_path +"?type=Images";
                            CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + "/" + ckeditor_config.connector_path +"?command=QuickUpload&type=Files"; 
                            CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + "/" + ckeditor_config.connector_path +"?command=QuickUpload&type=Images";
                        </script>
                     </div>';
        return $html;
    }
    public function file($content){

        $html = '<div class="field">
                    <label>Ảnh 1</label>
                    <input id="xFilePath" name="' . $content['name'] . '" type="hidden" size="60" value="' . $content['value'] . '"  />
                        <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
                        <div class="avatar" id="avatar" style="width: 100px; height: auto"><img src="'. $content['value'] .'" /></div>
                </div>';
        return $html;
    }
    // $avatar = is_file( MEDIAPATH.'images/article/'.$item['id'].'/'.$item['avatar'] ) ? '<img src="'.base_url('media/images/article/'.$item['id'].'/'.$item['avatar']).'" />' : '';? >

}         