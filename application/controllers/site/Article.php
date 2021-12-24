<?php

class Article extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $limit = 10;
    public $cache_time = '1440';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array('site/my_config', 'site/comment_lib', 'site/tableOfContent_lib', 'site/mobile_detect'));
        $this->load->model(array('site/article_model', 'site/tags_model', 'site/article_relation_model'));
        $this->load->helper(array('site_helper'));
    }

    public function page($slug)
    {
        $page = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $offset = ($page - 1) * $this->limit;
        $category = $this->article_model->db->where('slug', $slug)->get('menu')->row_array();
        $this->load->model('myconfig_model');
        $list_article = $this->article_model->Db_article_parent($category['id'], $this->limit, $offset);
        $list_article_count = $this->article_model->Db_article_parent_count($category['id']);
        /** cau hinh phan trang -2 **/

        $this->load->library('pagination');
        $config['base_url'] = base_url($slug . '.html');
        $config['total_rows'] = $list_article_count;
        $config['per_page'] = $this->limit;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        /** end -2 **/
        $data['congcu'] = $this->article_model->Db_category($category['id']);
        $url = $this->uri->uri_string();
        if ($url == 'lich') {
            $curl_lich = $this->get_lich(date('m'), date('Y'));
            $lich = str_replace('Lịch vạn niên - Xem ngày tốt xấu',
                'Lịch vạn niên tháng ' . date('m') . ' năm ' . date('Y'), $curl_lich['noidung']);
            $lich = str_replace('/ngay-duong-sang-am', '/xem-ngay-tot-xau', $lich);
            $lich = str_replace('/thang', '-thang', $lich);
            $lich = str_replace('/nam', '-nam', $lich);
            $data['lich'] = $lich;
            $category['title'] = str_replace('$thang', (int)date('m'), $category['title']);
            $category['title'] = str_replace('$nam', (int)date('Y'), $category['title']);

            $category['keywords'] = str_replace('$thang', (int)date('m'), $category['keywords']);
            $category['keywords'] = str_replace('$nam', (int)date('Y'), $category['keywords']);

            $category['description'] = str_replace('$thang', (int)date('m'), $category['description']);
            $category['description'] = str_replace('$nam', (int)date('Y'), $category['description']);
        }
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        $data['category'] = $category;
        $data['list_article'] = $list_article;
        $data['title'] = $category['title'];
        $data['keywords'] = $category['keywords'];
        $data['description'] = $category['description'];
        $data['article_feature'] = $this->article_model->Db_article_feature();
        $data['arr_menu'] = $this->myconfig_model->Db_get_menu();
        $menu = $this->article_model->Db_get_Menu($category['id']);
        $data['breadcrumb'] = breadcrumb($menu);
        $data['link'] = createdlink($menu);
        $data['view'] = $this->action_view;

        if ($this->uri->segment(1) == 'xem-tu-vi-nam-2019-cua-12-con-giap') {
            $data['view'] = 'site/article/tuvi2019';
        }
        if ($this->uri->segment(1) == 'xem-boi-tu-vi-2020-cua-12-con-giap') {
            $data['arr_bai_viet_tu_vi'] = $this->article_model->Db_baiviettuvi();
            $data['view'] = 'site/article/tuvi2020';
        }
        if ($this->uri->segment(1) == 'xem-tu-vi-nam-2021') {
            $data['arr_bai_viet_tu_vi'] = $this->article_model->Db_baiviettuvi(2021);
            $data['view'] = 'site/article/tuvi2021';
        }

        if ($this->uri->segment(1) == 'xem-boi-tu-vi-2022-cua-12-con-giap') {
            //echo 'vao choi';die;
            $data['arr_bai_viet_tu_vi'] = $this->article_model->Db_baiviettuvi(2022);
            //pr($data['arr_bai_viet_tu_vi']);
            $data['view'] = 'site/article/tuvi2022';
        }

        if ($this->uri->segment(1) == 'xem-tuoi-xong-nha-xong-dat-nam-2020') {
            $data['arr_bai_viet_xong_dat'] = $this->article_model->Db_baivietxongdat($nam_xem = 2020);
            $data['view'] = 'site/article/xongdat2020';
        }
        //chức năng xem tuổi xông đất năm 2021
        if ($this->uri->segment(1) == 'xem-tuoi-xong-nha-2021') {
            $data['arr_bai_viet_xong_dat'] = $this->article_model->Db_baivietxongdat($nam_xem = 2021);
            $data['view'] = 'site/article/xongdat2021';
        }
        if ($this->mobile_detect->isMobile()) {
            $this->load->view($this->view_mobile, $data);
        } else {
            $this->load->view($this->view, $data);
        }
    }

    public function detail($slug = null, $id = 0)
    {

        $baiviet_simhoptuoi = '/xem-sim-phong-thuy-hop-tuoi-([a-z-]+)-((196[1-9])||(19[7-9][0-9])||(2000))/';
        if (preg_match($baiviet_simhoptuoi, $slug)) {
            redirect(base_url($slug . '.html'), '301');
        }
        $article = $this->article_model->db->where(array('id' => $id, 'slug' => $slug))->where('state', 1)->get('article')->row_array();
        $arr = array(
            'xem-tu-vi-2018-tuoi-mau-ty-nam-mang-sinh-nam-2008-A151' => 'xem-tu-vi-nam-2018-tuoi-mau-ty-nam-mang-sinh-nam-2008-A151',
            'xem-tu-vi-2018-tuoi-canh-thin-nam-mang-sinh-nam-2000-A171' => 'xem-tu-vi-nam-2018-tuoi-canh-thin-nam-mang-sinh-nam-2000-A171',
            'xem-tu-vi-2018-tuoi-quy-ty-nam-mang-sinh-nam-1953-A172' => 'xem-tu-vi-nam-2018-tuoi-quy-ty-nam-mang-sinh-nam-1953-A172',
            'xem-tu-vi-2018-tuoi-nham-ngo-nam-mang-sinh-nam-2002-A181' => 'xem-tu-vi-nam-2018-tuoi-nham-ngo-nam-mang-sinh-nam-2002-A181',
            'xem-tu-vi-2018-tuoi-tan-hoi-nam-mang-sinh-nam-1971-A203' => 'xem-tu-vi-nam-2018-tuoi-tan-hoi-nam-mang-sinh-nam-1971-A203',
            'xem-tu-vi-nam-2018-tuoi-tan-suu-nam-mang-sinh-nam-1991-A152' => 'xem-tu-vi-nam-2018-tuoi-tan-suu-nam-mang-sinh-nam-1961-A152',
            'khai-pha-cac-buoc-xem-sim-dien-thoai-chinh-xac-nhat-A342' => 'khai-pha-cac-buoc-xem-sim-dien-thoai-chinh-xac',
        );
        $url_now = $this->uri->uri_string();
        if (array_key_exists($url_now, $arr)) {
            return redirect(base_url('' . $arr[$url_now] . '.html'), 'location', 301);
        }
        if (empty($article)) {
            redirect('error');
        }
        $data['item'] = $article;
        // xử lý lấy năm sinh trong url để đưa vào button bên view (xongdat+namsinh) xử lý ngày 19/1/2018
        $data['namsinh_class'] = '';
        $arr_15link = array(
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-ty-sinh-nam-1972',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-ty-sinh-nam-1977',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-dan-sinh-nam-1986',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-thin-sinh-nam-1976',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-ty-sinh-nam-1984',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-than-sinh-nam-1980',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-hoi-sinh-nam-1983',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-tuat-sinh-nam-1970',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-tuat-sinh-nam-1982',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-ty-sinh-nam-1965',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-mui-sinh-nam-1979',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-dan-sinh-nam-1962',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-ngo-sinh-nam-1966',
            'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-dan-sinh-nam-1974',
        );
        foreach ($arr_15link as $value) {
            if ($slug == $value) {
                $arr_slug = explode('-', $slug);
                foreach ($arr_slug as $key => $value) {
                    if (is_numeric($value)) {
                        $data['namsinh_class'] = $value;
                    }
                }
            }
        }
        // end xử lý

        /** get article relations **/
        $artKeyRelations = $this->article_relation_model->getArticleRelationsToValue($article['id']);
        if ($artKeyRelations) {
            $data['relationship'] = $artRelations = $this->article_model->Db_list_where_array($artKeyRelations);
        } else {
            $data['relationship'] = $this->article_model->Db_list_relationship($article['id'],
                $article['parent']);
        }


        $data['listTag'] = $this->tags_model->Db_get_listTags($article['id'], 'article');
        if (empty($article['follow'])) {
            $data['noindex'] = '<meta name="robots" content="noindex, nofollow" />';
        }

        // 0. Get image for schema
        $data['imageSchem'] = $article['avatar'] ? (base_url('media/images/article/' . $article['id'] . '/' . $article['avatar'])) : show_link_logo();

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());

        // 2. Get image tv2019
        $data['image1'] = $article['image1'] ? base_url('media/images/article/' . $article['id'] . '/' . $article['image1']) : '';
        $data['alt1'] = $article['alt1'];
        $data['image2'] = $article['image2'] ? base_url('media/images/article/' . $article['id'] . '/' . $article['image2']) : '';
        $data['alt2'] = $article['alt2'];
        if ($article['image1'] and $article['image2']) {
            $data['countImages'] = 2;
        }
        if ($article['image1'] and !$article['image2']) {
            $data['countImages'] = 1;
        }
        if (!$article['image1'] and $article['image2']) {
            $data['countImages'] = 1;
        }
        if (!$article['image1'] and !$article['image2']) {
            $data['countImages'] = 0;
        }

        //toc
        $contentDoubleText = $article['content'];
        $this->tableofcontent_lib->setFilter($contentDoubleText);
        $tableofcontent = $this->tableofcontent_lib->getTableOfContent();


        $data['html_adsen1'] = $html_adsen1 = '<div class="col-md-12">
                      <div class="text-center">
                        <!-- banner_ads_new -->
                        <div id="ad-zone-254"><script src="//adoptimize.info/adzones/ad-zone-254.js"></script></div>
                      </div>
                    </div>';

        $data['html_adsen2'] = $html_adsen2 = '';
        $data['html_adsen3'] = $html_adsen3 = '<div class="col-md-12">
                <div class="text-center">
                  <!-- Link_ads_xemngay_2 -->
                </div>
                </div>';
        $html_adsen_giua_bai = $this->load->view('site/ads/content', '', true);
        $data['html_adsen_giua_bai'] = $html_adsen_giua_bai;
        // $data['html_adsen_giua_bai'] = $html_adsen_giua_bai = '
        //          <div class="text-center">
        //          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        //         <!-- xemvanmenh_giuabai -->
        //         <ins class="adsbygoogle"
        //              style="display:block"
        //              data-ad-client="ca-pub-7619887841727759"
        //              data-ad-slot="8272176186"
        //              data-ad-format="auto"
        //              data-full-width-responsive="true"></ins>
        //         <script>
        //              (adsbygoogle = window.adsbygoogle || []).push({});
        //         </script>
        //         </div>
        //     ';
        $data['arr_search'] = $arr_search = array('$_adsen_1', '$_adsen_2', '$_adsen_3', '$_adsen_giua_bai');
        $data['arr_replace'] = $arr_replace = array($html_adsen1, $html_adsen2, $html_adsen3, $html_adsen_giua_bai);

        $content = $this->tableofcontent_lib->getContentFilter($contentDoubleText);
        $content = str_replace($arr_search, $arr_replace, $content);
        $data['content'] = $content;
        $data['tableofcontent'] = $tableofcontent;

        // end toc
        $data['check_bv_tu_vi'] = $this->article_model->Db_check_bai_viet_tu_vi($id, $slug);
        $data['title'] = $article['title'];
        $data['keywords'] = $article['keywords'];
        $data['description'] = $article['description'];
        $menu = $this->article_model->Db_get_Menu($article['parent']);
        $data['breadcrumb'] = breadcrumb($menu);

        $data['link'] = createdlink($menu);
        $data['schemaBreadcrumb'] = $menu;
        $data['schemaArticle'] = 1;// để xác định đây là page Article thì sẽ hiển thị ngoài layout schema Article

        $data['article_feature'] = $this->article_model->Db_article_feature();
        $data['view'] = $this->action_view;
        //lay thong tin user trong config
        $data['username'] = $this->my_config->get_config('username');
        $data['avata'] = $this->my_config->get_config('avata');
        $data['noidung'] = $this->my_config->get_config('noidung');
        $data['linkuser'] = $this->my_config->get_config('linkuser');
        $data['tennhaxuatban'] = $this->my_config->get_config('tennhaxuatban');
        $data['localRequest'] = $this->get_client_ip();
        if ($this->mobile_detect->isMobile()) {
            $this->load->view($this->view_mobile, $data);
        } else {
            $this->load->view($this->view, $data);
        }
        // $this->output->cache($this->cache_time);
    }

    public function get_lich($thang = 1, $nam = 2018)
    {
        $post = array(
            'mMonth' => $thang,
            'mYear' => $nam,
            'act' => 'search',
            'option' => 'com_boi',
            'view' => 'vannien',
            'Itemid' => '27'
        );

        require_once PUBLICPATH . '/html_dom/simple_html_dom.php';
        $param = $post;
        $url = 'http://www.boitoanvui.com/lich-van-nien.html';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($ch);
        curl_close($ch);
        $html = str_get_html($result);
        $content['noidung'] = $html->find('div[class=ja-content-main]', 0)->innertext;
        $form = $html->find('form', 0)->outertext;
        $h1 = $html->find('h1', 0)->outertext;
        $content['noidung'] = str_replace($form, '', $content['noidung']);
        $content['noidung'] = str_replace($h1, '', $content['noidung']);
        $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
        $content['chugiai'] = $html->find('div[class=ja-box-ct]', 0)->innertext;
        $content['chugiai'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['chugiai']);
        $html->clear();
        unset($html);
        $data['content'] = $content;
        return $data['content'];
    }

    function ajax_insert_count_click()
    {
        $post = $this->input->post();
        $data = array(
            'name_click' => $post['name'],
            'date_click' => $post['date'],
        );
        $this->article_model->db->insert('count_click', $data);
    }

    public function ajax_bai_viet_tu_vi()
    {
        if ($_POST) {
            $post = $this->input->post();
            $data['link'] = $this->article_model->Db_ajax_bai_viet_tu_vi($post);
            echo json_encode($data);
        }
    }

    public function ajax_bai_viet_xong_dat()
    {
        if ($_POST) {
            $post = $this->input->post();
            $data['link'] = $this->article_model->Db_ajax_bai_viet_xong_dat($post);
            echo json_encode($data);
        }
    }


    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
