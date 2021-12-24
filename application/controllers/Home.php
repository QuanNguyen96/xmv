<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->action_view_mobile = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '_mobile';
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array('site/my_config', 'site/mobile_detect'));
        $this->load->model(array('site/home_model', 'site/myconfig_model'));
        $this->load->helper('form');
    }

    public function index()
    {
        $data['main_menu'] = $this->home_model->Db_main_menu('content');
        $data['title'] = $this->my_config->get_config('title');
        $data['keywords'] = $this->my_config->get_config('keywords');
        $data['schemaHome'] = 1;
        $data['description'] = $this->my_config->get_config('description');
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = $this->action_view_mobile;
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }
    }

    public function home_product()
    {
        if ($_POST) {
            $html = '';
            $parent = $this->input->post('id');
            $list = $this->home_model->db->select('id,parent,name,slug,avatar,giaban,giakhuyenmai, hidden_price')->where('parent', $parent)->order_by('id', 'DESC')->limit(8)->get('product')->result_array();
            if (!empty($list)) {
                $arr_menu = $this->myconfig_model->Db_get_menu();
                foreach ($list as $val) {
                    $product_avatar = base_url('media/images/product/' . $val['id'] . '/' . $val['avatar']);
                    $product_link = $this->my_config->get_url_menu($arr_menu, $val['parent']) . '/' . $val['slug'] . '.html';
                    $product_link = base_url($product_link);
                    $html .= '<div class="col-md-3 col-sm-3 col-xs-6 product product_left"><div class="">';
                    $html .= '<a href="' . $product_link . '"><img src="' . $product_avatar . '" /></a>';
                    $html .= '<p><a href="' . $product_link . '">' . $val['name'] . '</a></p>';
                    $html .= giaban($val, '', '', true, false);
                    $html .= '</div></div>';
                }
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('html' => $html)));
        }
    }

    public function config_db()
    {
        $result = 'http://112.213.95.93/phpmyadmin/index.php?db=tsvn_xvm&token=6c54f2cfa4594b260da6de97db2db648';
    }

    public function get_info()
    {
        require_once(PUBLICPATH . 'simple_html_dom.php');

    }

    function get_list_link()
    {
        $input = $this->input->post();
        $url_sub = $input['url_sub'];
        $list_url = array(
            'xem-tu-vi-tuoi-canh-ty-nam-2018-nu-mang-sinh-nam-1960' => 'xem-tu-vi-tuoi-canh-ty-nam-2018-nu-mang-sinh-nam-1960-A207',
            'xem-tu-vi-tuoi-nham-ty-nam-2018-nu-mang-sinh-nam-1972' => 'xem-tu-vi-tuoi-nham-ty-nam-2018-nu-mang-sinh-nam-1972-A208',
            'xem-tu-vi-tuoi-giap-ty-nam-2018-nu-mang-sinh-nam-1984' => 'xem-tu-vi-tuoi-giap-ty-nam-2018-nu-mang-sinh-nam-1984-A209',
            'xem-tu-vi-tuoi-binh-ty-nam-2018-nu-mang-sinh-nam-1996' => 'xem-tu-vi-tuoi-binh-ty-nam-2018-nu-mang-sinh-nam-1996-A210',
            'xem-tu-vi-tuoi-mau-ty-nam-2018-nu-mang-sinh-nam-2008' => 'xem-tu-vi-tuoi-mau-ty-nam-2018-nu-mang-sinh-nam-2008-A211',
            'xem-tu-vi-tuoi-tan-suu-nam-2018-nu-mang-sinh-nam-1961' => 'xem-tu-vi-tuoi-tan-suu-nam-2018-nu-mang-sinh-nam-1961-A212',
            'xem-tu-vi-tuoi-quy-suu-nam-2018-nu-mang-sinh-nam-1973' => 'xem-tu-vi-tuoi-quy-suu-nam-2018-nu-mang-sinh-nam-1973-A213',
            'xem-tu-vi-tuoi-at-suu-nam-2018-nu-mang-sinh-nam-1985' => 'xem-tu-vi-tuoi-at-suu-nam-2018-nu-mang-sinh-nam-1985-A214',
            'xem-tu-vi-tuoi-dinh-suu-nam-2018-nu-mang-sinh-nam-1997' => 'xem-tu-vi-tuoi-dinh-suu-nam-2018-nu-mang-sinh-nam-1997-A215',
            'xem-tu-vi-tuoi-ky-suu-nam-2018-nu-mang-sinh-nam-2009' => 'xem-tu-vi-tuoi-ky-suu-nam-2018-nu-mang-sinh-nam-2009-A216',
            'xem-tu-vi-tuoi-canh-dan-nam-2018-nu-mang-sinh-nam-1950' => 'xem-tu-vi-tuoi-canh-dan-nam-2018-nu-mang-sinh-nam-1950-A217',
            'xem-tu-vi-tuoi-nham-dan-nam-2018-nu-mang-sinh-nam-1962' => 'xem-tu-vi-tuoi-nham-dan-nam-2018-nu-mang-sinh-nam-1962-A218',
            'xem-tu-vi-tuoi-giap-dan-nam-2018-nu-mang-sinh-nam-1974' => 'xem-tu-vi-tuoi-giap-dan-nam-2018-nu-mang-sinh-nam-1974-A219',
            'xem-tu-vi-tuoi-binh-dan-nam-2018-nu-mang-sinh-nam-1986' => 'xem-tu-vi-tuoi-binh-dan-nam-2018-nu-mang-sinh-nam-1986-A220',
            'xem-tu-vi-tuoi-mau-dan-nam-2018-nu-mang-sinh-nam-1998' => 'xem-tu-vi-tuoi-mau-dan-nam-2018-nu-mang-sinh-nam-1998-A221',
            'xem-tu-vi-tuoi-tan-mao-nam-2018-nu-mang-sinh-nam-1951' => 'xem-tu-vi-tuoi-tan-mao-nam-2018-nu-mang-sinh-nam-1951-A222',
            'xem-tu-vi-tuoi-quy-mao-nam-2018-nu-mang-sinh-nam-1963' => 'xem-tu-vi-tuoi-quy-mao-nam-2018-nu-mang-sinh-nam-1963-A223',
            'xem-tu-vi-tuoi-at-mao-nam-2018-nu-mang-sinh-nam-1975' => 'xem-tu-vi-tuoi-at-mao-nam-2018-nu-mang-sinh-nam-1975-A224',
            'xem-tu-vi-tuoi-dinh-mao-nam-2018-nu-mang-sinh-nam-1987' => 'xem-tu-vi-tuoi-dinh-mao-nam-2018-nu-mang-sinh-nam-1987-A225',
            'xem-tu-vi-tuoi-ky-mao-nam-2018-nu-mang-sinh-nam-1999' => 'xem-tu-vi-tuoi-ky-mao-nam-2018-nu-mang-sinh-nam-1999-A226',
            'xem-tu-vi-tuoi-nham-thin-nam-2018-nu-mang-sinh-nam-1952' => 'xem-tu-vi-tuoi-nham-thin-nam-2018-nu-mang-sinh-nam-1952-A227',
            'xem-tu-vi-tuoi-giap-thin-nam-2018-nu-mang-sinh-nam-1964' => 'xem-tu-vi-tuoi-giap-thin-nam-2018-nu-mang-sinh-nam-1964-A228',
            'xem-tu-vi-tuoi-binh-thin-nam-2018-nu-mang-sinh-nam-1976' => 'xem-tu-vi-tuoi-binh-thin-nam-2018-nu-mang-sinh-nam-1976-A229',
            'xem-tu-vi-tuoi-mau-thin-nam-2018-nu-mang-sinh-nam-1988' => 'xem-tu-vi-tuoi-mau-thin-nam-2018-nu-mang-sinh-nam-1988-A230',
            'xem-tu-vi-tuoi-canh-thin-nam-2018-nu-mang-sinh-nam-2000' => 'xem-tu-vi-tuoi-canh-thin-nam-2018-nu-mang-sinh-nam-2000-A231',
            'xem-tu-vi-tuoi-quy-ty-nam-2018-nu-mang-sinh-nam-1953' => 'xem-tu-vi-tuoi-quy-ty-nam-2018-nu-mang-sinh-nam-1953-A232',
            'xem-tu-vi-tuoi-at-ty-nam-2018-nu-mang-sinh-nam-1965' => 'xem-tu-vi-tuoi-at-ty-nam-2018-nu-mang-sinh-nam-1965-A233',
            'xem-tu-vi-tuoi-dinh-ty-nam-2018-nu-mang-sinh-nam-1977' => 'xem-tu-vi-tuoi-dinh-ty-nam-2018-nu-mang-sinh-nam-1977-A234',
            'xem-tu-vi-tuoi-ky-ty-nam-2018-nu-mang-sinh-nam-1989' => 'xem-tu-vi-tuoi-ky-ty-nam-2018-nu-mang-sinh-nam-1989-A235',
            'xem-tu-vi-tuoi-tan-ty-nam-2018-nu-mang-sinh-nam-2001' => 'xem-tu-vi-tuoi-tan-ty-nam-2018-nu-mang-sinh-nam-2001-A236',
            'xem-tu-vi-tuoi-giap-ngo-nam-2018-nu-mang-sinh-nam-1954' => 'xem-tu-vi-tuoi-giap-ngo-nam-2018-nu-mang-sinh-nam-1954-A237',
            'xem-tu-vi-tuoi-binh-ngo-nam-2018-nu-mang-sinh-nam-1966' => 'xem-tu-vi-tuoi-binh-ngo-nam-2018-nu-mang-sinh-nam-1966-A238',
            'xem-tu-vi-tuoi-mau-ngo-nam-2018-nu-mang-sinh-nam-1978' => 'xem-tu-vi-tuoi-mau-ngo-nam-2018-nu-mang-sinh-nam-1978-A239',
            'xem-tu-vi-tuoi-canh-ngo-nam-2018-nu-mang-sinh-nam-1990' => 'xem-tu-vi-tuoi-canh-ngo-nam-2018-nu-mang-sinh-nam-1990-A240',
            'xem-tu-vi-tuoi-nham-ngo-nam-2018-nu-mang-sinh-nam-2002' => 'xem-tu-vi-tuoi-nham-ngo-nam-2018-nu-mang-sinh-nam-2002-A241',
            'xem-tu-vi-tuoi-at-mui-nam-2018-nu-mang-sinh-nam-1955' => 'xem-tu-vi-tuoi-at-mui-nam-2018-nu-mang-sinh-nam-1955-A242',
            'xem-tu-vi-tuoi-dinh-mui-nam-2018-nu-mang-sinh-nam-1967' => 'xem-tu-vi-tuoi-dinh-mui-nam-2018-nu-mang-sinh-nam-1967-A243',
            'xem-tu-vi-tuoi-ky-mui-nam-2018-nu-mang-sinh-nam-1979' => 'xem-tu-vi-tuoi-ky-mui-nam-2018-nu-mang-sinh-nam-1979-A244',
            'xem-tu-vi-tuoi-tan-mui-nam-2018-nu-mang-sinh-nam-1991' => 'xem-tu-vi-tuoi-tan-mui-nam-2018-nu-mang-sinh-nam-1991-A245',
            'xem-tu-vi-tuoi-quy-mui-nam-2018-nu-mang-sinh-nam-2003' => 'xem-tu-vi-tuoi-quy-mui-nam-2018-nu-mang-sinh-nam-2003-A246',
            'xem-tu-vi-tuoi-binh-than-nam-2018-nu-mang-sinh-nam-1956' => 'xem-tu-vi-tuoi-binh-than-nam-2018-nu-mang-sinh-nam-1956-A247',
            'xem-tu-vi-tuoi-mau-than-nam-2018-nu-mang-sinh-nam-1968' => 'xem-tu-vi-tuoi-mau-than-nam-2018-nu-mang-sinh-nam-1968-A248',
            'xem-tu-vi-tuoi-canh-than-nam-2018-nu-mang-sinh-nam-1980' => 'xem-tu-vi-tuoi-canh-than-nam-2018-nu-mang-sinh-nam-1980-A249',
            'xem-tu-vi-tuoi-nham-than-nam-2018-nu-mang-sinh-nam-1992' => 'xem-tu-vi-tuoi-nham-than-nam-2018-nu-mang-sinh-nam-1992-A250',
            'xem-tu-vi-tuoi-giap-than-nam-2018-nu-mang-sinh-nam-2004' => 'xem-tu-vi-tuoi-giap-than-nam-2018-nu-mang-sinh-nam-2004-A251',
            'xem-tu-vi-tuoi-dinh-dau-nam-2018-nu-mang-sinh-nam-1957' => 'xem-tu-vi-tuoi-dinh-dau-nam-2018-nu-mang-sinh-nam-1957-A252',
            'xem-tu-vi-tuoi-ky-dau-nam-2018-nu-mang-sinh-nam-1969' => 'xem-tu-vi-tuoi-ky-dau-nam-2018-nu-mang-sinh-nam-1969-A253',
            'xem-tu-vi-tuoi-tan-dau-nam-2018-nu-mang-sinh-nam-1981' => 'xem-tu-vi-tuoi-tan-dau-nam-2018-nu-mang-sinh-nam-1981-A254',
            'xem-tu-vi-tuoi-quy-dau-nam-2018-nu-mang-sinh-nam-1993' => 'xem-tu-vi-tuoi-quy-dau-nam-2018-nu-mang-sinh-nam-1993-A255',
            'xem-tu-vi-tuoi-at-dau-nam-2018-nu-mang-sinh-nam-2005' => 'xem-tu-vi-tuoi-at-dau-nam-2018-nu-mang-sinh-nam-2005-A256',
            'xem-tu-vi-tuoi-mau-tuat-nam-2018-nu-mang-sinh-nam-1958' => 'xem-tu-vi-tuoi-mau-tuat-nam-2018-nu-mang-sinh-nam-1958-A257',
            'xem-tu-vi-tuoi-canh-tuat-nam-2018-nu-mang-sinh-nam-1970' => 'xem-tu-vi-tuoi-canh-tuat-nam-2018-nu-mang-sinh-nam-1970-A258',
            'xem-tu-vi-tuoi-nham-tuat-nam-2018-nu-mang-sinh-nam-1982' => 'xem-tu-vi-tuoi-nham-tuat-nam-2018-nu-mang-sinh-nam-1982-A259',
            'xem-tu-vi-tuoi-giap-tuat-nam-2018-nu-mang-sinh-nam-1994' => 'xem-tu-vi-tuoi-giap-tuat-nam-2018-nu-mang-sinh-nam-1994-A260',
            'xem-tu-vi-tuoi-binh-tuat-nam-2018-nu-mang-sinh-nam-2006' => 'xem-tu-vi-tuoi-binh-tuat-nam-2018-nu-mang-sinh-nam-2006-A261',
            'xem-tu-vi-tuoi-ky-hoi-nam-2018-nu-mang-sinh-nam-1959' => 'xem-tu-vi-tuoi-ky-hoi-nam-2018-nu-mang-sinh-nam-1959-A262',
            'xem-tu-vi-tuoi-tan-hoi-nam-2018-nu-mang-sinh-nam-1971' => 'xem-tu-vi-tuoi-tan-hoi-nam-2018-nu-mang-sinh-nam-1971-A263',
            'xem-tu-vi-tuoi-quy-hoi-nam-2018-nu-mang-sinh-nam-1983' => 'xem-tu-vi-tuoi-quy-hoi-nam-2018-nu-mang-sinh-nam-1983-A264',
            'xem-tu-vi-tuoi-at-hoi-nam-2018-nu-mang-sinh-nam-1995' => 'xem-tu-vi-tuoi-at-hoi-nam-2018-nu-mang-sinh-nam-1995-A265',
            'xem-tu-vi-tuoi-dinh-hoi-nam-2018-nu-mang-sinh-nam-2007' => 'xem-tu-vi-tuoi-dinh-hoi-nam-2018-nu-mang-sinh-nam-2007-A266',
            'xem-tu-vi-nam-2018-tuoi-canh-ty-nam-mang-sinh-nam-1960' => 'xem-tu-vi-nam-2018-tuoi-canh-ty-nam-mang-sinh-nam-1960-A147',
            'xem-tu-vi-nam-2018-tuoi-nham-ty-nam-mang-sinh-nam-1972' => 'xem-tu-vi-nam-2018-tuoi-nham-ty-nam-mang-sinh-nam-1972-A148',
            'xem-tu-vi-nam-2018-tuoi-giap-ty-nam-mang-sinh-nam-1984' => 'xem-tu-vi-nam-2018-tuoi-giap-ty-nam-mang-sinh-nam-1984-A149',
            'xem-tu-vi-nam-2018-tuoi-binh-ty-nam-mang-sinh-nam-1996' => 'xem-tu-vi-nam-2018-tuoi-binh-ty-nam-mang-sinh-nam-1996-A150',
            'xem-tu-vi-nam-2018-tuoi-mau-ty-nam-mang-sinh-nam-2008' => 'xem-tu-vi-nam-2018-tuoi-mau-ty-nam-mang-sinh-nam-2008-A151',
            'xem-tu-vi-nam-2018-tuoi-tan-suu-nam-mang-sinh-nam-1961' => 'xem-tu-vi-nam-2018-tuoi-tan-suu-nam-mang-sinh-nam-1961-A152',
            'xem-tu-vi-nam-2018-tuoi-quy-suu-nam-mang-sinh-nam-1973' => 'xem-tu-vi-nam-2018-tuoi-quy-suu-nam-mang-sinh-nam-1973-A153',
            'xem-tu-vi-nam-2018-tuoi-at-suu-nam-mang-sinh-nam-1985' => 'xem-tu-vi-nam-2018-tuoi-at-suu-nam-mang-sinh-nam-1985-A154',
            'xem-tu-vi-nam-2018-tuoi-dinh-suu-nam-mang-sinh-nam-1997' => 'xem-tu-vi-nam-2018-tuoi-dinh-suu-nam-mang-sinh-nam-1997-A155',
            'xem-tu-vi-nam-2018-tuoi-ky-suu-nam-mang-sinh-nam-2009' => 'xem-tu-vi-nam-2018-tuoi-ky-suu-nam-mang-sinh-nam-2009-A156',
            'xem-tu-vi-nam-2018-tuoi-canh-dan-nam-mang-sinh-nam-1950' => 'xem-tu-vi-nam-2018-tuoi-canh-dan-nam-mang-sinh-nam-1950-A157',
            'xem-tu-vi-nam-2018-tuoi-nham-dan-nam-mang-sinh-nam-1962' => 'xem-tu-vi-nam-2018-tuoi-nham-dan-nam-mang-sinh-nam-1962-A158',
            'xem-tu-vi-nam-2018-tuoi-giap-dan-nam-mang-sinh-nam-1974' => 'xem-tu-vi-nam-2018-tuoi-giap-dan-nam-mang-sinh-nam-1974-A159',
            'xem-tu-vi-nam-2018-tuoi-binh-dan-nam-mang-sinh-nam-1986' => 'xem-tu-vi-nam-2018-tuoi-binh-dan-nam-mang-sinh-nam-1986-A160',
            'xem-tu-vi-nam-2018-tuoi-mau-dan-nam-mang-sinh-nam-1998' => 'xem-tu-vi-nam-2018-tuoi-mau-dan-nam-mang-sinh-nam-1998-A161',
            'xem-tu-vi-nam-2018-tuoi-tan-mao-nam-mang-sinh-nam-1951' => 'xem-tu-vi-nam-2018-tuoi-tan-mao-nam-mang-sinh-nam-1951-A162',
            'xem-tu-vi-nam-2018-tuoi-quy-mao-nam-mang-sinh-nam-1963' => 'xem-tu-vi-nam-2018-tuoi-quy-mao-nam-mang-sinh-nam-1963-A163',
            'xem-tu-vi-nam-2018-tuoi-at-mao-nam-mang-sinh-nam-1975' => 'xem-tu-vi-nam-2018-tuoi-at-mao-nam-mang-sinh-nam-1975-A164',
            'xem-tu-vi-nam-2018-tuoi-dinh-mao-nam-mang-sinh-nam-1987' => 'xem-tu-vi-nam-2018-tuoi-dinh-mao-nam-mang-sinh-nam-1987-A165',
            'xem-tu-vi-nam-2018-tuoi-ky-mao-nam-mang-sinh-nam-1999' => 'xem-tu-vi-nam-2018-tuoi-ky-mao-nam-mang-sinh-nam-1999-A166',
            'xem-tu-vi-nam-2018-tuoi-nham-thin-nam-mang-sinh-nam-1952' => 'xem-tu-vi-nam-2018-tuoi-nham-thin-nam-mang-sinh-nam-1952-A167',
            'xem-tu-vi-nam-2018-tuoi-giap-thin-nam-mang-sinh-nam-1964' => 'xem-tu-vi-nam-2018-tuoi-giap-thin-nam-mang-sinh-nam-1964-A168',
            'xem-tu-vi-nam-2018-tuoi-binh-thin-nam-mang-sinh-nam-1976' => 'xem-tu-vi-nam-2018-tuoi-binh-thin-nam-mang-sinh-nam-1976-A169',
            'xem-tu-vi-nam-2018-tuoi-mau-thin-nam-mang-sinh-nam-1988' => 'xem-tu-vi-nam-2018-tuoi-mau-thin-nam-mang-sinh-nam-1988-A170',
            'xem-tu-vi-nam-2018-tuoi-canh-thin-nam-mang-sinh-nam-2000' => 'xem-tu-vi-nam-2018-tuoi-canh-thin-nam-mang-sinh-nam-2000-A171',
            'xem-tu-vi-nam-2018-tuoi-quy-ty-nam-mang-sinh-nam-1953' => 'xem-tu-vi-nam-2018-tuoi-quy-ty-nam-mang-sinh-nam-1953-A172',
            'xem-tu-vi-nam-2018-tuoi-at-ty-nam-mang-sinh-nam-1965' => 'xem-tu-vi-nam-2018-tuoi-at-ty-nam-mang-sinh-nam-1965-A173',
            'xem-tu-vi-nam-2018-tuoi-dinh-ty-nam-mang-sinh-nam-1977' => 'xem-tu-vi-nam-2018-tuoi-dinh-ty-nam-mang-sinh-nam-1977-A174',
            'xem-tu-vi-nam-2018-tuoi-ky-ty-nam-mang-sinh-nam-1989' => 'xem-tu-vi-nam-2018-tuoi-ky-ty-nam-mang-sinh-nam-1989-A175',
            'xem-tu-vi-nam-2018-tuoi-tan-ty-nam-mang-sinh-nam-2001' => 'xem-tu-vi-nam-2018-tuoi-tan-ty-nam-mang-sinh-nam-2001-A176',
            'xem-tu-vi-nam-2018-tuoi-giap-ngo-nam-mang-sinh-nam-1954' => 'xem-tu-vi-nam-2018-tuoi-giap-ngo-nam-mang-sinh-nam-1954-A177',
            'xem-tu-vi-nam-2018-tuoi-binh-ngo-nam-mang-sinh-nam-1966' => 'xem-tu-vi-nam-2018-tuoi-binh-ngo-nam-mang-sinh-nam-1966-A178',
            'xem-tu-vi-nam-2018-tuoi-mau-ngo-nam-mang-sinh-nam-1978' => 'xem-tu-vi-nam-2018-tuoi-mau-ngo-nam-mang-sinh-nam-1978-A179',
            'xem-tu-vi-nam-2018-tuoi-canh-ngo-nam-mang-sinh-nam-1990' => 'xem-tu-vi-nam-2018-tuoi-canh-ngo-nam-mang-sinh-nam-1990-A180',
            'xem-tu-vi-nam-2018-tuoi-nham-ngo-nam-mang-sinh-nam-2002' => 'xem-tu-vi-nam-2018-tuoi-nham-ngo-nam-mang-sinh-nam-2002-A181',
            'xem-tu-vi-nam-2018-tuoi-at-mui-nam-mang-sinh-nam-1955' => 'xem-tu-vi-nam-2018-tuoi-at-mui-nam-mang-sinh-nam-1955-A182',
            'xem-tu-vi-nam-2018-tuoi-dinh-mui-nam-mang-sinh-nam-1967' => 'xem-tu-vi-nam-2018-tuoi-dinh-mui-nam-mang-sinh-nam-1967-A183',
            'xem-tu-vi-nam-2018-tuoi-ky-mui-nam-mang-sinh-nam-1979' => 'xem-tu-vi-nam-2018-tuoi-ky-mui-nam-mang-sinh-nam-1979-A184',
            'xem-tu-vi-nam-2018-tuoi-tan-mui-nam-mang-sinh-nam-1991' => 'xem-tu-vi-nam-2018-tuoi-tan-mui-nam-mang-sinh-nam-1991-A185',
            'xem-tu-vi-nam-2018-tuoi-quy-mui-nam-mang-sinh-nam-2003' => 'xem-tu-vi-nam-2018-tuoi-quy-mui-nam-mang-sinh-nam-2003-A186',
            'xem-tu-vi-nam-2018-tuoi-binh-than-nam-mang-sinh-nam-1956' => 'xem-tu-vi-nam-2018-tuoi-binh-than-nam-mang-sinh-nam-1956-A187',
            'xem-tu-vi-nam-2018-tuoi-mau-than-nam-mang-sinh-nam-1968' => 'xem-tu-vi-nam-2018-tuoi-mau-than-nam-mang-sinh-nam-1968-A188',
            'xem-tu-vi-nam-2018-tuoi-canh-than-nam-mang-sinh-nam-1980' => 'xem-tu-vi-nam-2018-tuoi-canh-than-nam-mang-sinh-nam-1980-A189',
            'xem-tu-vi-nam-2018-tuoi-nham-than-nam-mang-sinh-nam-1992' => 'xem-tu-vi-nam-2018-tuoi-nham-than-nam-mang-sinh-nam-1992-A190',
            'xem-tu-vi-nam-2018-tuoi-giap-than-nam-mang-sinh-nam-2004' => 'xem-tu-vi-nam-2018-tuoi-giap-than-nam-mang-sinh-nam-2004-A191',
            'xem-tu-vi-nam-2018-tuoi-ky-dau-nam-mang-sinh-nam-1969' => 'xem-tu-vi-nam-2018-tuoi-ky-dau-nam-mang-sinh-nam-1969-A193',
            'xem-tu-vi-nam-2018-tuoi-tan-dau-nam-mang-sinh-nam-1981' => 'xem-tu-vi-nam-2018-tuoi-tan-dau-nam-mang-sinh-nam-1981-A194',
            'xem-tu-vi-nam-2018-tuoi-quy-dau-nam-mang-sinh-nam-1993' => 'xem-tu-vi-nam-2018-tuoi-quy-dau-nam-mang-sinh-nam-1993-A195',
            'xem-tu-vi-nam-2018-tuoi-at-dau-nam-mang-sinh-nam-2005' => 'xem-tu-vi-nam-2018-tuoi-at-dau-nam-mang-sinh-nam-2005-A196',
            'xem-tu-vi-nam-2018-tuoi-dinh-dau-nam-mang-sinh-nam-1957' => 'xem-tu-vi-nam-2018-tuoi-dinh-dau-nam-mang-sinh-nam-1957-A192',
            'xem-tu-vi-nam-2018-tuoi-mau-tuat-nam-mang-sinh-nam-1958' => 'xem-tu-vi-nam-2018-tuoi-mau-tuat-nam-mang-sinh-nam-1958-A197',
            'xem-tu-vi-nam-2018-tuoi-canh-tuat-nam-mang-sinh-nam-1970' => 'xem-tu-vi-nam-2018-tuoi-canh-tuat-nam-mang-sinh-nam-1970-A198',
            'xem-tu-vi-nam-2018-tuoi-nham-tuat-nam-mang-sinh-nam-1982' => 'xem-tu-vi-nam-2018-tuoi-nham-tuat-nam-mang-sinh-nam-1982-A199',
            'xem-tu-vi-nam-2018-tuoi-giap-tuat-nam-mang-sinh-nam-1994' => 'xem-tu-vi-nam-2018-tuoi-giap-tuat-nam-mang-sinh-nam-1994-A200',
            'xem-tu-vi-nam-2018-tuoi-binh-tuat-nam-mang-sinh-nam-2006' => 'xem-tu-vi-nam-2018-tuoi-binh-tuat-nam-mang-sinh-nam-2006-A201',
            'xem-tu-vi-nam-2018-tuoi-ky-hoi-nam-mang-sinh-nam-1959' => 'xem-tu-vi-nam-2018-tuoi-ky-hoi-nam-mang-sinh-nam-1959-A202',
            'xem-tu-vi-nam-2018-tuoi-tan-hoi-nam-mang-sinh-nam-1971' => 'xem-tu-vi-nam-2018-tuoi-tan-hoi-nam-mang-sinh-nam-1971-A203',
            'xem-tu-vi-nam-2018-tuoi-quy-hoi-nam-mang-sinh-nam-1983' => 'xem-tu-vi-nam-2018-tuoi-quy-hoi-nam-mang-sinh-nam-1983-A204',
            'xem-tu-vi-nam-2018-tuoi-at-hoi-nam-mang-sinh-nam-1995' => 'xem-tu-vi-nam-2018-tuoi-at-hoi-nam-mang-sinh-nam-1995-A205',
            'xem-tu-vi-nam-2018-tuoi-dinh-hoi-nam-mang-sinh-nam-2007' => 'xem-tu-vi-nam-2018-tuoi-dinh-hoi-nam-mang-sinh-nam-2007-A206',
        );
        if (array_key_exists($url_sub, $list_url)) {
            echo base_url($list_url[$url_sub]) . '.html';
        } else {
            echo base_url();
        }
    }

    /**HAM AJAX LAY LINK BAI VIET CON TUVI2019**/
    public function ajax_getLinkArticle2019()
    {
        echo 1;
        $array = baiviet_tuvi2019();

        if ($_POST) {
            $namsinh = $_POST['namsinh'];
            $gioitinh = $_POST['gioitinh'];
            redirect(base_url($array[(int)$namsinh][$gioitinh]));
        }
    }
}
