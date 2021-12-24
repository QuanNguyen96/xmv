<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
$route['ql'] = 'admin/home';
$route['admin/(.*)'] = function ($slug) {
    return 'admin/' . $slug;
};
$route['ckfinder/(.*)'] = function ($slug) {
    return 'ckfinder/' . $slug;
};
$route['tra_cuu_xong_dat_2021'] = 'site/article/tracuuxongdat';
//$route['tra_cuu_xong_dat_2021'] = 'site/home/ajax_getLinkArticle2019';
$route['y-nghia-cac-chom-sao-12-cung-hoang-dao'] = 'site/cunghoangdao/index';
$route['dac-diem-tinh-cach-12-cung-hoang-dao-A2135'] = 'site/cunghoangdao/tinhcach';
$route['xem-ban-thuoc-cung-hoang-dao-nao-A2139'] = 'site/cunghoangdao/ngaysinh';
$route['boi-tinh-yeu-12-cung-hoang-dao-hop-nhau-khong-A2138'] = 'site/cunghoangdao/hopnhau';
$route['bi-mat-tinh-yeu-12-cung-hoang-dao-A2140'] = 'site/cunghoangdao/tinhyeu';
$route['xem-boi-nhom-mau-A2137'] = 'site/cunghoangdao/nhommau';
$route['tu-vi-hang-ngay/tu-vi-tuoi-([a-z]+)-ngay-hom-nay-([0-9]+)-([0-9]+)-([0-9]+)'] = 'site/xemtuvi/xemtuvihangngay_chitiet/$1/$2/$3/$4';
$route['ajax-doingayamduong'] = 'site/xemngay/ajax_doingayamduong';
$route['cach-tinh-sim-pho-bien'] = 'site/landingpage/cachtinhsim';
$route['sim-phong-thuy'] = 'site/ladingpage_spt/index';
$route['create_codes'] = 'site/codes/insert_codes';
$route['disable_codes'] = 'site/codes/disable_codes';
$route['test_codes'] = 'site/codes/test';
$route['ajax-check-code'] = 'site/boituoivochong/ajax_check_code';
$route['tu-vi-hang-ngay'] = 'site/xemtuvi/xemtuvihangngay';
$route['tu-vi-hang-ngay/tu-vi-ngay-([0-9]+)-thang-([0-9]+)-nam-([0-9]+)'] = 'site/xemtuvi/xemtuvihangngay/$1/$2/$3';
$route['xem-tu-vi-tuan-moi'] = 'site/xemtuvi/tuvituan';
$route['xem-lich-van-nien'] = 'site/xemlich/lichngay';
$route['ajaxlichngay'] = 'site/xemlich/ajax_get_lichngay';
$route['ajaxlichngay_mb'] = 'site/xemlich/ajax_get_lichngay_mb';
$route['xuatngaytotxau'] = 'site/xemngaytheotuoi/xuatngaytot';
/**ROUTE BAI VIET LINK CON TUVI2019**/
$route['bai-viet-tu-vi-nam-2019'] = 'home/ajax_getLinkArticle2019';
$route['xem-lich-am-duong-([0-9]+)'] = 'site/xemlich/lichnam/$1';
$route['xem-lich-van-nien/lich-thang-([0-9]+)-nam-([0-9]+)'] = 'site/xemlich/lichthang/$1/$2';

$route['xem-han-tu-vi'] = 'site/xemtuvi/xemvanhantuvi';

$route['xem-la-so'] = 'site/xemtuvi/index';
$route['xem-sim-phong-thuy'] = 'site/redirect301/index';
$route['([a-z0-9-]+)-A([0-9]+)'] = 'site/article/detail/$1/$2';
$route['([a-z0-9-]+)-P([0-9]+)'] = 'site/product/detail/$1/$2';
$route['tag/([a-z0-9-]+)'] = 'site/tag/detail/$1';

/** Comment id **/
$route['sh-form-comment'] = 'site/sh_comment/formComment';
$route['sh-process-comment-auto'] = 'site/sh_comment/processCommentAuto';
$route['sh-process-acc-permittion'] = 'site/sh_comment/processAccPermittion';
// $route['sh-process-check-account-permition'] = 'site/sh_comment/checkSession';
$route['feed'] = 'site/rss_feed/rss';
//$route['([a-z0-9-]+)/page/([0-9]+)'] = 'site/article/page/$1/$2';
require_once(BASEPATH . 'database/DB.php');
$db =& DB();
$dataRouter = $db->get('router')->result_array();
//pr($dataRouter); die;
if (!empty($dataRouter)) {
    foreach ($dataRouter as $val) {
        $route[$val['router_key']] = trim($val['router_result']);
        if (isset($_GET['t'])) {
            // echo $val['router_key'].' : '.$val['router_result'].'<br>';
        }
    }
}
$route['([a-z0-9-/]+)/page/([0-9]+)'] = function ($slug, $page = 1) {

    require_once(BASEPATH . 'database/DB.php');
    $db =& DB();
    $data = $db->select('id,parent,module,router, filter_router')->where('slug', $slug)->get('menu')->row_array();
    //echo $data['module'];
    if (!empty($data)) {
        //echo 'site/'.$data['module'].'/page/'.$slug.'/page/'.$page;
        return 'site/' . $data['module'] . '/page/' . $slug . '/' . $page;
    }
};
$route['([a-z0-9-/]+)'] = function ($slug) {
    require_once(BASEPATH . 'database/DB.php');
    $db =& DB();
    $data = $db->select('id,parent,module,router, filter_router')->where('slug', $slug)->get('menu')->row_array();
    if (!empty($data)) {
        return 'site/' . $data['module'] . '/page/' . $slug;
    } else {
        return 'site/page_not_found/index';
    }
};

//$route['([a-z0-9-/]+)'] = 'site/redirect301/index/$1';

