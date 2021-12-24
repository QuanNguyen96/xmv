<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TableOfContent_lib
{
    private $title_h;
    private $value_h;
    private $content;
    private $content_after;
    private $title_all;

    public function __construct()
    {

        $this->CI = &get_instance();
        $this->CI->load->helper(array('url'));

    }

    public function setFilter($content = null)
    {
        $this->content = $content;
        require_once('public/simple_html_dom.php');
        $html = str_get_html($this->content);

        //$html->find('h1',0)->outertext='';
        // $html ->load($html ->save());
        // $tieude = $html->find('.title_news',0);
        // $noidung = $html->find('#article_content',0);
        $value_h2 = null;
        $value_h3 = null;
        $value_h4 = null;
        $value_h5 = null;
        $value_h6 = null;

        $title_all = null;
        $level_all = null;
        if ($this->content) {
            $get_all = $html->find('h1,h2,h3,h4,h5,h6');
            foreach ($get_all as $value) {
                $title_all[] = trim($value->plaintext);
                $level_all[] = intval($value->tag[1]);
            }
        }

        //pr($title_all);
        //pr($level_all);
        //die;


        /*$title_h2 = $html->find('h2');
        foreach ($title_h2 as $key => $value) {
            $value_h2[$key] = trim($value->plaintext);
        }

        $title_h3 = $html->find('h3');
        foreach ($title_h3 as $key => $value) {
            $value_h3[$key] = trim($value->plaintext);
        }

        $title_h4 = $html->find('h4');
        foreach ($title_h4 as $key => $value) {
            $value_h4[$key] = trim($value->plaintext);
        }

        $title_h5 = $html->find('h5');
        foreach ($title_h5 as $key => $value) {
            $value_h5[$key] = trim($value->plaintext);
        }

        $title_h6 = $html->find('h6');
        foreach ($title_h6 as $key => $value) {
            $value_h6[$key] = trim($value->plaintext);
        }

        $this->title_h    = array(
            'h2'    => $value_h2,
            'h3'    => $value_h3,
            'h4'    => $value_h4,
            'h5'    => $value_h5,
            'h6'    => $value_h6,
        );*/
        $this->title_all = $title_all;
        $this->level_all = $level_all;
        // dd($title_all,1);
        // dd($level_all);
        return $this->title_h;
    }

    public function getContentFilter()
    {
        $this->content_after = $this->content;

        $title_all = $this->title_all;
        if ($title_all) {
            foreach ($title_all as $key => $value) {
                $this->content_after = str_replace($value, '<span id="' . $this->format_key($value) . '">' . $value . '</span>', $this->content_after);
            }
        }

        return $this->content_after;
    }

    public function getContentFilterHere($content)
    {
        $this->content_after = $content;

        $title_all = $this->title_all;
        if ($title_all) {
            foreach ($title_all as $key => $value) {
                $this->content_after = str_replace($value, '<span id="' . $this->format_key($value) . '">' . $value . '</span>', $this->content_after);
            }
        }
        return $this->content_after;
    }

    public function getTableOfContent()
    {
        // Phan muc luc theo ul li tu tren xuong duoi
        $title_all = $this->title_all;
        $level_all = $this->level_all;
        $contents = '';
        $contents .= '<script type="text/javascript">
                            $(document).ready(function() {
                                $("#toc a").click(function(){
                                    var x = $(this).attr("href");
                                    var idi = x.indexOf("#");
                                    if (idi != -1) {
                                        x = x.substr(idi);
                                    }
                                    var hei = $(x).offset();
                                    
                                    if($(".menu-newmobile").length){
                                        var heightBannerTop = 120;
                                    }else{
                                        var heightBannerTop = 10;
                                    }
                                    var height_x = hei.top - heightBannerTop;

                                    $("html, body").animate({
                                        scrollTop: height_x
                                    }, 300);
                                });
                            });
                        </script>';
        $contents .= '<section id="toc" class="mucluc clearfix"><div class="btn_mucluc" id="click_menu_1" onclick="clickmenu2(\'click_menu_1\');" >Mục lục</div><ul id="click_menu_2" onclick="clickmenu2(\'click_menu_2\');"><div id="toc-header" class="titleDanhmuc"><label>MỤC LỤC</label> <span>Thu gọn</span></div>';

        if ($title_all) {
            /**
             * @description Nếu có > 15 mục lục thì chỉ lấy h2. nếu < 15 thì lấy hết
             */
            if (count($level_all) > 15) {
                foreach ($title_all as $key => $value) {
                    if ($level_all[$key] == 2) {
                        $contents .= '<li class="toc' . $level_all[$key] . '"><a href="' . current_url() . '#' . $this->format_key($value) . '">' . $value . '</a></li>';
                    }
                }
            } else {
                foreach ($title_all as $key => $value) {
                    $contents .= '<li class="toc' . $level_all[$key] . '"><a href="' . current_url() . '#' . $this->format_key($value) . '">' . $value . '</a></li>';
                }
            }
        }

        $contents .= '</ul></section>';
        return $contents;
    }

    private function format_key($str)
    {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        $str = html_entity_decode($str);
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $result = strtolower($str);
        $result = preg_replace('/[^a-zA-Z0-9 ]/', '', $result);
        $result = str_replace('-', '', $result);
        $result = str_replace(' ', '-', $result);
        return $result;
    }

    public function filter2($depth = 6, $content)
    {
        $contents = '<style>#toc{ padding: 25px; background-color: #f6f6f6; }
                    #toc ul{ }
                    .toc3{margin-left: 1em;}
                    .toc4{margin-left: 2em;}
                    .toc5{margin-left: 3em;}
                    .toc6{margin-left: 4em;}</style>';
        $this->content = $content;
        require_once('public/simple_html_dom.php');
        $html_string = str_get_html($this->content);

        //get the headings down to the specified depth
        $pattern = '/<h[2-' . $depth . ']*[^>]*>.*?<\/h[2-' . $depth . ']>/';
        $whocares = preg_match_all($pattern, $html_string, $winners);
        //reformat the results to be more usable
        $heads = implode("\n", $winners[0]);
        $heads = str_replace('<a name="', '<a href="#', $heads);
        $heads = str_replace('</a>', '', $heads);
        //$heads = preg_replace('/</', replacement, subject);
        $heads = preg_replace('/<h([1-' . $depth . ']*[^>]*)>/', '<li class="toc$1"><a href="#">', $heads);
        $heads = preg_replace('/<\/h[1-' . $depth . ']>/', '</a></li>', $heads);

        //plug the results into appropriate HTML tags
        $contents .= '<div id="toc"> 
            <p id="toc-header">Contents</p>
            <ul>
            ' . $heads . '
            </ul>
            </div>';
    }


    // ++ h2h3
    public function setFilterh2h3($content = null)
    {
        $this->content = $content;
        require_once('public/simple_html_dom.php');
        $html = str_get_html($this->content);

        $value_h2 = null;
        $value_h3 = null;
        $value_h4 = null;
        $value_h5 = null;
        $value_h6 = null;

        $title_all = null;
        $level_all = null;
        if ($this->content) {
            $get_all = $html->find('h2,h3');
            foreach ($get_all as $value) {
                $title_all[] = $innerTEXT = trim($value->plaintext);
                $level_all[] = intval($value->tag[1]);
            }
        }

        $this->title_all = $title_all;
        $this->level_all = $level_all;

        return $this->title_h;
    }
    // end ++ h2h3
}
