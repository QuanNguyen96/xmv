<?php

class Cunghoangdao extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $arr_cung_name = array(
        1 => 'Bạch Dương',
        2 => 'Kim ngưu', 
        3 => 'Song Tử', 
        4 => 'Cự Giải', 
        5 => 'Sư Tử',
        6 => 'Xử Nữ', 
        7 => 'Thiên Bình', 
        8 => 'Bọ Cạp',       
        9 => 'Nhân Mã',
        10 => 'Ma Kết', 
        11 => 'Bảo Bình', 
        12 => 'Song Ngư',  
    );
    public $arr_cung_ngay = array(
        1 => '21/3 - 20/4',
        2 => '21/4 - 20/5', 
        3 => '21/5 - 20/6', 
        4 => '21/6 - 22/7', 
        5 => '23/7 - 22/8',
        6 => '23/8 - 22/9', 
        7 => '23/9 - 22/10', 
        8 => '23/10 - 21/11',       
        9 => '22/11 - 21/12',
        10 => '22/12 - 20/1', 
        11 => '21/1 - 18/2', 
        12 => '19/2 - 20/3',    
    );
    public $arr_nhom_mau = array(
        1 => 'A',
        2 => 'B',
        3 => 'AB',
        4 => 'O',
    );
    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array('site/my_config','site/my_seolink','site/comment_lib', 'site/tableOfContent_lib'));
        //$this->load->model(array('site/article_model', 'site/tags_model', 'site/article_relation_model'));
        $this->load->helper(array('site_helper'));
    }
    public function index()
    {
        $data['cung_hoang_dao_12_cung'] = array(
            1 => 'tong-quan-cung-bach-duong-A1566.html',
            2 => 'tong-quan-cung-kim-nguu-A1568.html',
            3 => 'tong-quan-cung-song-tu-A1569.html',
            4 => 'tong-quan-cung-cu-giai-A1571.html',
            5 => 'tong-quan-cung-su-tu-A1572.html',
            6 => 'tong-quan-cung-xu-nu-A1573.html',
            7 => 'tong-quan-cung-thien-binh-A1649.html',
            8 => 'tong-quan-cung-bo-cap-A1650.html',
            9 => 'tong-quan-cung-nhan-ma-A1651.html',
            10 => 'tong-quan-cung-ma-ket-A1652.html',
            11 => 'tong-quan-cung-bao-binh-A1653.html',
            12 => 'tong-quan-cung-song-ngu-A1654.html',
        );
        $data['list_cung_name'] = $this->arr_cung_name;
        $data['list_cung_ngay'] = $this->arr_cung_ngay;
        $breadcrumb = array(
                0 => array(
                    'name' => 'Cung hoàng đạo',
                    'slug' => 'y-nghia-cac-chom-sao-12-cung-hoang-dao.html',
                ),
            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view( $this->view_mobile, $data );
        } else{
            $this->load->view( $this->view, $data );
        }
    }
    public function tinhcach()
    {
        $data['cung_hoang_dao_tinh_cach'] = array(
            1 => 'tinh-cach-cua-cung-bach-duong-A1600.html',
            2 => 'tinh-cach-cua-cung-kim-nguu-A1602.html',
            3 => 'tinh-cach-cua-cung-song-tu-A1603.html',
            4 => 'tinh-cach-cua-cung-cu-giai-A1604.html',
            5 => 'tinh-cach-cua-cung-su-tu-A1605.html',
            6 => 'tinh-cach-cua-cung-xu-nu-A1606.html',
            7 => 'tinh-cach-cua-cung-thien-binh-A1607.html',
            8 => 'tinh-cach-cua-cung-bo-cap-A1609.html',
            9 => 'tinh-cach-cua-cung-nhan-ma-A1610.html',
            10 => 'tinh-cach-cua-cung-ma-ket-A1611.html',
            11 => 'tinh-cach-cua-cung-bao-binh-A1612.html',
            12 => 'tinh-cach-cua-cung-song-ngu-A1613.html',
        );
        $data['list_cung_name'] = $this->arr_cung_name;
        $data['list_cung_ngay'] = $this->arr_cung_ngay;
        $breadcrumb = array(
                0 => array(
                    'name' => 'Tính cách 12 cung hoàng đạo',
                    'slug' => 'dac-diem-tinh-cach-12-cung-hoang-dao-A2135.html',
                ),
            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view( $this->view_mobile, $data );
        } else{
            $this->load->view( $this->view, $data );
        }
    }
    public function tinhyeu()
    {
        $data['cung_hoang_dao_tinh_yeu'] = array(
            1 => 'cung-bach-duong-nam-nu-khi-yeu-A1516.html',
            2 => 'cung-kim-nguu-nam-nu-khi-yeu-A1518.html',
            3 => 'cung-song-tu-nam-nu-khi-yeu-A1524.html',
            4 => 'cung-cu-giai-nam-nu-khi-yeu-A1525.html',
            5 => 'cung-su-tu-nam-nu-khi-yeu-A1526.html',
            6 => 'cung-xu-nu-nam-nu-khi-yeu-A1521.html',
            7 => 'cung-thien-binh-nam-nu-khi-yeu-A1527.html',
            8 => 'cung-bo-cap-nam-nu-khi-yeu-A1528.html',
            9 => 'cung-nhan-ma-nam-nu-khi-yeu-A1529.html',
            10 => 'cung-ma-ket-nam-nu-khi-yeu-A1523.html',
            11 => 'cung-bao-binh-nam-nu-khi-yeu-A1519.html',
            12 => 'cung-song-ngu-nam-nu-khi-yeu-A1530.html',
        );
        $data['list_cung_name'] = $this->arr_cung_name;
        $data['list_cung_ngay'] = $this->arr_cung_ngay;
        $breadcrumb = array(
                0 => array(
                    'name' => 'Cung hoàng đạo',
                    'slug' => 'y-nghia-cac-chom-sao-12-cung-hoang-dao.html',
                ),
            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view( $this->view_mobile, $data );
        } else{
            $this->load->view( $this->view, $data );
        }
    }

    public function ngaysinh()
    {
        $data['cung_hoang_dao_ngay_sinh'] = array(
            '1,1' => 'sinh-ngay-1-1-la-cung-gi-A1595.html',
            '1,2' => 'sinh-ngay-2-1-la-cung-gi-A1597.html',
            '1,3' => 'sinh-ngay-3-1-la-cung-gi-A1598.html',
            '1,4' => 'sinh-ngay-4-1-la-cung-gi-A1599.html',
            '1,5' => 'sinh-ngay-5-1-la-cung-gi-A1601.html',
            '1,6' => 'sinh-ngay-6-1-la-cung-gi-A1608.html',
            '1,7' => 'sinh-ngay-7-1-la-cung-gi-A1614.html',
            '1,8' => 'sinh-ngay-8-1-la-cung-gi-A1615.html',
            '1,9' => 'sinh-ngay-9-1-la-cung-gi-A1616.html',
            '1,10' => 'sinh-ngay-10-1-la-cung-gi-A1617.html',
            '1,11' => 'sinh-ngay-11-1-la-cung-gi-A1618.html',
            '1,12' => 'sinh-ngay-12-1-la-cung-gi-A1619.html',
            '1,13' => 'sinh-ngay-13-1-la-cung-gi-A1620.html',
            '1,14' => 'sinh-ngay-14-1-la-cung-gi-A1621.html',
            '1,15' => 'sinh-ngay-15-1-la-cung-gi-A1622.html',
            '1,16' => 'sinh-ngay-16-1-la-cung-gi-A1623.html',
            '1,17' => 'sinh-ngay-17-1-la-cung-gi-A1624.html',
            '1,18' => 'sinh-ngay-18-1-la-cung-gi-A1625.html',
            '1,19' => 'sinh-ngay-19-1-la-cung-gi-A1626.html',
            '1,20' => 'sinh-ngay-20-1-la-cung-gi-A1627.html',
            '1,21' => 'sinh-ngay-21-1-la-cung-gi-A1628.html',
            '1,22' => 'sinh-ngay-22-1-la-cung-gi-A1629.html',
            '1,23' => 'sinh-ngay-23-1-la-cung-gi-A1630.html',
            '1,24' => 'sinh-ngay-24-1-la-cung-gi-A1631.html',
            '1,25' => 'sinh-ngay-25-1-la-cung-gi-A1632.html',
            '1,26' => 'sinh-ngay-26-1-la-cung-gi-A1633.html',
            '1,27' => 'sinh-ngay-27-1-la-cung-gi-A1634.html',
            '1,28' => 'sinh-ngay-28-1-la-cung-gi-A1635.html',
            '1,29' => 'sinh-ngay-29-1-la-cung-gi-A1636.html',
            '1,30' => 'sinh-ngay-30-1-la-cung-gi-A1637.html',
            '1,31' => 'sinh-ngay-31-1-la-cung-gi-A1638.html',
            '2,1' => 'sinh-ngay-1-2-la-cung-gi-A1639.html',
            '2,2' => 'sinh-ngay-2-2-la-cung-gi-A1640.html',
            '2,3' => 'sinh-ngay-3-2-la-cung-gi-A1641.html',
            '2,4' => 'sinh-ngay-4-2-la-cung-gi-A1642.html',
            '2,5' => 'sinh-ngay-5-2-la-cung-gi-A1643.html',
            '2,6' => 'sinh-ngay-6-2-la-cung-gi-A1644.html',
            '2,7' => 'sinh-ngay-7-2-la-cung-gi-A1645.html',
            '2,8' => 'sinh-ngay-8-2-la-cung-gi-A1646.html',
            '2,9' => 'sinh-ngay-9-2-la-cung-gi-A1647.html',
            '2,10' => 'sinh-ngay-10-2-la-cung-gi-A1648.html',
            '2,11' => 'sinh-ngay-11-2-la-cung-gi-A1655.html',
            '2,12' => 'sinh-ngay-12-2-la-cung-gi-A1656.html',
            '2,13' => 'sinh-ngay-13-2-la-cung-gi-A1657.html',
            '2,14' => 'sinh-ngay-14-2-la-cung-gi-A1658.html',
            '2,15' => 'sinh-ngay-15-2-la-cung-gi-A1659.html',
            '2,16' => 'sinh-ngay-16-2-la-cung-gi-A1660.html',
            '2,17' => 'sinh-ngay-17-2-la-cung-gi-A1661.html',
            '2,18' => 'sinh-ngay-18-2-la-cung-gi-A1662.html',
            '2,19' => 'sinh-ngay-19-2-la-cung-gi-A1663.html',
            '2,20' => 'sinh-ngay-20-2-la-cung-gi-A1664.html',
            '2,21' => 'sinh-ngay-21-2-la-cung-gi-A1665.html',
            '2,22' => 'sinh-ngay-22-2-la-cung-gi-A1666.html',
            '2,23' => 'sinh-ngay-23-2-la-cung-gi-A1667.html',
            '2,24' => 'sinh-ngay-24-2-la-cung-gi-A1668.html',
            '2,25' => 'sinh-ngay-25-2-la-cung-gi-A1669.html',
            '2,26' => 'sinh-ngay-26-2-la-cung-gi-A1670.html',
            '2,27' => 'sinh-ngay-27-2-la-cung-gi-A1671.html',
            '2,28' => 'sinh-ngay-28-2-la-cung-gi-A1672.html',
            '2,29' => 'sinh-ngay-29-2-la-cung-gi-A1673.html',
            '2,30' => '',
            '2,31' => '',
            '3,1' => 'sinh-ngay-1-3-la-cung-gi-A1674.html',
            '3,2' => 'sinh-ngay-2-3-la-cung-gi-A1675.html',
            '3,3' => 'sinh-ngay-3-3-la-cung-gi-A1676.html',
            '3,4' => 'sinh-ngay-4-3-la-cung-gi-A1677.html',
            '3,5' => 'sinh-ngay-5-3-la-cung-gi-A1678.html',
            '3,6' => 'sinh-ngay-6-3-la-cung-gi-A1679.html',
            '3,7' => 'sinh-ngay-7-3-la-cung-gi-A1680.html',
            '3,8' => 'sinh-ngay-8-3-la-cung-gi-A1681.html',
            '3,9' => 'sinh-ngay-9-3-la-cung-gi-A1682.html',
            '3,10' => 'sinh-ngay-10-3-la-cung-gi-A1683.html',
            '3,11' => 'sinh-ngay-11-3-la-cung-gi-A1684.html',
            '3,12' => 'sinh-ngay-12-3-la-cung-gi-A1685.html',
            '3,13' => 'sinh-ngay-13-3-la-cung-gi-A1686.html',
            '3,14' => 'sinh-ngay-14-3-la-cung-gi-A1687.html',
            '3,15' => 'sinh-ngay-15-3-la-cung-gi-A1688.html',
            '3,16' => 'sinh-ngay-16-3-la-cung-gi-A1689.html',
            '3,17' => 'sinh-ngay-17-3-la-cung-gi-A1690.html',
            '3,18' => 'sinh-ngay-18-3-la-cung-gi-A1691.html',
            '3,19' => 'sinh-ngay-19-3-la-cung-gi-A1692.html',
            '3,20' => 'sinh-ngay-20-3-la-cung-gi-A1693.html',
            '3,21' => 'sinh-ngay-21-3-la-cung-gi-A1694.html',
            '3,22' => 'sinh-ngay-22-3-la-cung-gi-A1695.html',
            '3,23' => 'sinh-ngay-23-3-la-cung-gi-A1696.html',
            '3,24' => 'sinh-ngay-24-3-la-cung-gi-A1697.html',
            '3,25' => 'sinh-ngay-25-3-la-cung-gi-A1698.html',
            '3,26' => 'sinh-ngay-26-3-la-cung-gi-A1699.html',
            '3,27' => 'sinh-ngay-27-3-la-cung-gi-A1700.html',
            '3,28' => 'sinh-ngay-28-3-la-cung-gi-A1701.html',
            '3,29' => 'sinh-ngay-29-3-la-cung-gi-A1702.html',
            '3,30' => 'sinh-ngay-30-3-la-cung-gi-A1703.html',
            '3,31' => 'sinh-ngay-31-3-la-cung-gi-A1704.html',
            '4,1' => 'sinh-ngay-1-4-la-cung-gi-A1705.html',
            '4,2' => 'sinh-ngay-2-4-la-cung-gi-A1706.html',
            '4,3' => 'sinh-ngay-3-4-la-cung-gi-A1707.html',
            '4,4' => 'sinh-ngay-4-4-la-cung-gi-A1708.html',
            '4,5' => 'sinh-ngay-5-4-la-cung-gi-A1709.html',
            '4,6' => 'sinh-ngay-6-4-la-cung-gi-A1710.html',
            '4,7' => 'sinh-ngay-7-4-la-cung-gi-A1711.html',
            '4,8' => 'sinh-ngay-8-4-la-cung-gi-A1712.html',
            '4,9' => 'sinh-ngay-9-4-la-cung-gi-A1713.html',
            '4,10' => 'sinh-ngay-10-4-la-cung-gi-A1714.html',
            '4,11' => 'sinh-ngay-11-4-la-cung-gi-A1715.html',
            '4,12' => 'sinh-ngay-12-4-la-cung-gi-A1716.html',
            '4,13' => 'sinh-ngay-13-4-la-cung-gi-A1717.html',
            '4,14' => 'sinh-ngay-14-4-la-cung-gi-A1718.html',
            '4,15' => 'sinh-ngay-15-4-la-cung-gi-A1719.html',
            '4,16' => 'sinh-ngay-16-4-la-cung-gi-A1720.html',
            '4,17' => 'sinh-ngay-17-4-la-cung-gi-A1721.html',
            '4,18' => 'sinh-ngay-18-4-la-cung-gi-A1722.html',
            '4,19' => 'sinh-ngay-19-4-la-cung-gi-A1723.html',
            '4,20' => 'sinh-ngay-20-4-la-cung-gi-A1724.html',
            '4,21' => 'sinh-ngay-21-4-la-cung-gi-A1725.html',
            '4,22' => 'sinh-ngay-22-4-la-cung-gi-A1726.html',
            '4,23' => 'sinh-ngay-23-4-la-cung-gi-A1727.html',
            '4,24' => 'sinh-ngay-24-4-la-cung-gi-A1728.html',
            '4,25' => 'sinh-ngay-25-4-la-cung-gi-A1729.html',
            '4,26' => 'sinh-ngay-26-4-la-cung-gi-A1730.html',
            '4,27' => 'sinh-ngay-27-4-la-cung-gi-A1731.html',
            '4,28' => 'sinh-ngay-28-4-la-cung-gi-A1732.html',
            '4,29' => 'sinh-ngay-29-4-la-cung-gi-A1733.html',
            '4,30' => 'sinh-ngay-30-4-la-cung-gi-A1743.html',
            '4,31' => '',
            '5,1' => 'sinh-ngay-1-5-la-cung-gi-A1734.html',
            '5,2' => 'sinh-ngay-2-5-la-cung-gi-A1735.html',
            '5,3' => 'sinh-ngay-3-5-la-cung-gi-A1736.html',
            '5,4' => 'sinh-ngay-4-5-la-cung-gi-A1737.html',
            '5,5' => 'sinh-ngay-5-5-la-cung-gi-A1738.html',
            '5,6' => 'sinh-ngay-6-5-la-cung-gi-A1739.html',
            '5,7' => 'sinh-ngay-7-5-la-cung-gi-A1740.html',
            '5,8' => 'sinh-ngay-8-5-la-cung-gi-A1741.html',
            '5,9' => 'sinh-ngay-9-5-la-cung-gi-A1744.html',
            '5,10' => 'sinh-ngay-10-5-la-cung-gi-A1742.html',
            '5,11' => 'sinh-ngay-11-5-la-cung-gi-A1745.html',
            '5,12' => 'sinh-ngay-12-5-la-cung-gi-A1746.html',
            '5,13' => 'sinh-ngay-13-5-la-cung-gi-A1747.html',
            '5,14' => 'sinh-ngay-14-5-la-cung-gi-A1748.html',
            '5,15' => 'sinh-ngay-15-5-la-cung-gi-A1749.html',
            '5,16' => 'sinh-ngay-16-5-la-cung-gi-A1750.html',
            '5,17' => 'sinh-ngay-17-5-la-cung-gi-A1751.html',
            '5,18' => 'sinh-ngay-18-5-la-cung-gi-A1752.html',
            '5,19' => 'sinh-ngay-19-5-la-cung-gi-A1753.html',
            '5,20' => 'sinh-ngay-20-5-la-cung-gi-A1754.html',
            '5,21' => 'sinh-ngay-21-5-la-cung-gi-A1755.html',
            '5,22' => 'sinh-ngay-22-5-la-cung-gi-A1756.html',
            '5,23' => 'sinh-ngay-23-5-la-cung-gi-A1757.html',
            '5,24' => 'sinh-ngay-24-5-la-cung-gi-A1758.html',
            '5,25' => 'sinh-ngay-25-5-la-cung-gi-A1759.html',
            '5,26' => 'sinh-ngay-26-5-la-cung-gi-A1760.html',
            '5,27' => 'sinh-ngay-27-5-la-cung-gi-A1761.html',
            '5,28' => 'sinh-ngay-28-5-la-cung-gi-A1762.html',
            '5,29' => 'sinh-ngay-29-5-la-cung-gi-A1763.html',
            '5,30' => 'sinh-ngay-30-5-la-cung-gi-A1764.html',
            '5,31' => 'sinh-ngay-31-5-la-cung-gi-A1765.html',
            '6,1' => 'sinh-ngay-1-6-la-cung-gi-A1766.html',
            '6,2' => 'sinh-ngay-2-6-la-cung-gi-A1767.html',
            '6,3' => 'sinh-ngay-3-6-la-cung-gi-A1768.html',
            '6,4' => 'sinh-ngay-4-6-la-cung-gi-A1769.html',
            '6,5' => 'sinh-ngay-5-6-la-cung-gi-A1770.html',
            '6,6' => 'sinh-ngay-6-6-la-cung-gi-A1771.html',
            '6,7' => 'sinh-ngay-7-6-la-cung-gi-A1772.html',
            '6,8' => 'sinh-ngay-8-6-la-cung-gi-A1773.html',
            '6,9' => 'sinh-ngay-9-6-la-cung-gi-A1775.html',
            '6,10' => 'sinh-ngay-10-6-la-cung-gi-A1776.html',
            '6,11' => 'sinh-ngay-11-6-la-cung-gi-A1777.html',
            '6,12' => 'sinh-ngay-12-6-la-cung-gi-A1778.html',
            '6,13' => 'sinh-ngay-13-6-la-cung-gi-A1832.html',
            '6,14' => 'sinh-ngay-14-6-la-cung-gi-A1833.html',
            '6,15' => 'sinh-ngay-15-6-la-cung-gi-A1834.html',
            '6,16' => 'sinh-ngay-16-6-la-cung-gi-A1835.html',
            '6,17' => 'sinh-ngay-17-6-la-cung-gi-A1836.html',
            '6,18' => 'sinh-ngay-18-6-la-cung-gi-A1837.html',
            '6,19' => 'sinh-ngay-19-6-la-cung-gi-A1838.html',
            '6,20' => 'sinh-ngay-20-6-la-cung-gi-A1839.html',
            '6,21' => 'sinh-ngay-21-6-la-cung-gi-A1840.html',
            '6,22' => 'sinh-ngay-22-6-la-cung-gi-A1841.html',
            '6,23' => 'sinh-ngay-23-6-la-cung-gi-A1842.html',
            '6,24' => 'sinh-ngay-24-6-la-cung-gi-A1843.html',
            '6,25' => 'sinh-ngay-25-6-la-cung-gi-A1844.html',
            '6,26' => 'sinh-ngay-26-6-la-cung-gi-A1845.html',
            '6,27' => 'sinh-ngay-27-6-la-cung-gi-A1846.html',
            '6,28' => 'sinh-ngay-28-6-la-cung-gi-A1847.html',
            '6,29' => 'sinh-ngay-29-6-la-cung-gi-A1848.html',
            '6,30' => 'sinh-ngay-30-6-la-cung-gi-A1849.html',
            '6,31' => '',
            '7,1' => 'sinh-ngay-1-7-la-cung-gi-A1850.html',
            '7,2' => 'sinh-ngay-2-7-la-cung-gi-A1851.html',
            '7,3' => 'sinh-ngay-3-7-la-cung-gi-A1852.html',
            '7,4' => 'sinh-ngay-4-7-la-cung-gi-A1853.html',
            '7,5' => 'sinh-ngay-5-7-la-cung-gi-A1854.html',
            '7,6' => 'sinh-ngay-6-7-la-cung-gi-A1855.html',
            '7,7' => 'sinh-ngay-7-7-la-cung-gi-A1856.html',
            '7,8' => 'sinh-ngay-8-7-la-cung-gi-A1857.html',
            '7,9' => 'sinh-ngay-9-7-la-cung-gi-A1858.html',
            '7,10' => 'sinh-ngay-10-7-la-cung-gi-A1859.html',
            '7,11' => 'sinh-ngay-11-7-la-cung-gi-A1860.html',
            '7,12' => 'sinh-ngay-12-7-la-cung-gi-A1861.html',
            '7,13' => 'sinh-ngay-13-7-la-cung-gi-A1862.html',
            '7,14' => 'sinh-ngay-14-7-la-cung-gi-A1863.html',
            '7,15' => 'sinh-ngay-15-7-la-cung-gi-A1864.html',
            '7,16' => 'sinh-ngay-16-7-la-cung-gi-A1865.html',
            '7,17' => 'sinh-ngay-17-7-la-cung-gi-A1866.html',
            '7,18' => 'sinh-ngay-18-7-la-cung-gi-A1867.html',
            '7,19' => 'sinh-ngay-19-7-la-cung-gi-A1868.html',
            '7,20' => 'sinh-ngay-20-7-la-cung-gi-A1869.html',
            '7,21' => 'sinh-ngay-21-7-la-cung-gi-A1870.html',
            '7,22' => 'sinh-ngay-22-7-la-cung-gi-A1871.html',
            '7,23' => 'sinh-ngay-23-7-la-cung-gi-A1872.html',
            '7,24' => 'sinh-ngay-24-7-la-cung-gi-A1873.html',
            '7,25' => 'sinh-ngay-25-7-la-cung-gi-A1874.html',
            '7,26' => 'sinh-ngay-26-7-la-cung-gi-A1875.html',
            '7,27' => 'sinh-ngay-27-7-la-cung-gi-A1876.html',
            '7,28' => 'sinh-ngay-28-7-la-cung-gi-A1879.html',
            '7,29' => 'sinh-ngay-29-7-la-cung-gi-A1877.html',
            '7,30' => 'sinh-ngay-30-7-la-cung-gi-A1878.html',
            '7,31' => 'sinh-ngay-31-7-la-cung-gi-A1880.html',
            '8,1' => 'sinh-ngay-1-8-la-cung-gi-A1881.html',
            '8,2' => 'sinh-ngay-2-8-la-cung-gi-A1882.html',
            '8,3' => 'sinh-ngay-3-8-la-cung-gi-A1883.html',
            '8,4' => 'sinh-ngay-4-8-la-cung-gi-A1884.html',
            '8,5' => 'sinh-ngay-5-8-la-cung-gi-A1885.html',
            '8,6' => 'sinh-ngay-6-8-la-cung-gi-A1886.html',
            '8,7' => 'sinh-ngay-7-8-la-cung-gi-A1887.html',
            '8,8' => 'sinh-ngay-8-8-la-cung-gi-A1888.html',
            '8,9' => 'sinh-ngay-9-8-la-cung-gi-A1889.html',
            '8,10' => 'sinh-ngay-10-8-la-cung-gi-A1890.html',
            '8,11' => 'sinh-ngay-11-8-la-cung-gi-A1891.html',
            '8,12' => 'sinh-ngay-12-8-la-cung-gi-A1892.html',
            '8,13' => 'sinh-ngay-13-8-la-cung-gi-A1893.html',
            '8,14' => 'sinh-ngay-14-8-la-cung-gi-A1894.html',
            '8,15' => 'sinh-ngay-15-8-la-cung-gi-A1895.html',
            '8,16' => 'sinh-ngay-16-8-la-cung-gi-A1896.html',
            '8,17' => 'sinh-ngay-17-8-la-cung-gi-A1897.html',
            '8,18' => 'sinh-ngay-18-8-la-cung-gi-A1898.html',
            '8,19' => 'sinh-ngay-19-8-la-cung-gi-A1899.html',
            '8,20' => 'sinh-ngay-20-8-la-cung-gi-A1900.html',
            '8,21' => 'sinh-ngay-21-8-la-cung-gi-A1901.html',
            '8,22' => 'sinh-ngay-22-8-la-cung-gi-A1902.html',
            '8,23' => 'sinh-ngay-23-8-la-cung-gi-A1903.html',
            '8,24' => 'sinh-ngay-24-8-la-cung-gi-A1904.html',
            '8,25' => 'sinh-ngay-25-8-la-cung-gi-A1905.html',
            '8,26' => 'sinh-ngay-26-8-la-cung-gi-A1906.html',
            '8,27' => 'sinh-ngay-27-8-la-cung-gi-A1907.html',
            '8,28' => 'sinh-ngay-28-8-la-cung-gi-A1908.html',
            '8,29' => 'sinh-ngay-29-8-la-cung-gi-A1909.html',
            '8,30' => 'sinh-ngay-30-8-la-cung-gi-A1910.html',
            '8,31' => 'sinh-ngay-31-8-la-cung-gi-A1911.html',
            '9,1' => 'sinh-ngay-1-9-la-cung-gi-A1912.html',
            '9,2' => 'sinh-ngay-2-9-la-cung-gi-A1913.html',
            '9,3' => 'sinh-ngay-3-9-la-cung-gi-A1914.html',
            '9,4' => 'sinh-ngay-4-9-la-cung-gi-A1915.html',
            '9,5' => 'sinh-ngay-5-9-la-cung-gi-A1916.html',
            '9,6' => 'sinh-ngay-6-9-la-cung-gi-A1917.html',
            '9,7' => 'sinh-ngay-7-9-la-cung-gi-A1918.html',
            '9,8' => 'sinh-ngay-8-9-la-cung-gi-A1919.html',
            '9,9' => 'sinh-ngay-9-9-la-cung-gi-A1920.html',
            '9,10' => 'sinh-ngay-10-9-la-cung-gi-A1921.html',
            '9,11' => 'sinh-ngay-11-9-la-cung-gi-A1922.html',
            '9,12' => 'sinh-ngay-12-9-la-cung-gi-A1923.html',
            '9,13' => 'sinh-ngay-13-9-la-cung-gi-A1924.html',
            '9,14' => 'sinh-ngay-14-9-la-cung-gi-A1925.html',
            '9,15' => 'sinh-ngay-15-9-la-cung-gi-A1926.html',
            '9,16' => 'sinh-ngay-16-9-la-cung-gi-A1927.html',
            '9,17' => 'sinh-ngay-17-9-la-cung-gi-A1928.html',
            '9,18' => 'sinh-ngay-18-9-la-cung-gi-A1929.html',
            '9,19' => 'sinh-ngay-19-9-la-cung-gi-A1930.html',
            '9,20' => 'sinh-ngay-20-9-la-cung-gi-A1931.html',
            '9,21' => 'sinh-ngay-21-9-la-cung-gi-A1932.html',
            '9,22' => 'sinh-ngay-22-9-la-cung-gi-A1933.html',
            '9,23' => 'sinh-ngay-23-9-la-cung-gi-A1934.html',
            '9,24' => 'sinh-ngay-24-9-la-cung-gi-A1935.html',
            '9,25' => 'sinh-ngay-25-9-la-cung-gi-A1936.html',
            '9,26' => 'sinh-ngay-26-9-la-cung-gi-A1937.html',
            '9,27' => 'sinh-ngay-27-9-la-cung-gi-A1938.html',
            '9,28' => 'sinh-ngay-28-9-la-cung-gi-A1939.html',
            '9,29' => 'sinh-ngay-29-9-la-cung-gi-A1940.html',
            '9,30' => 'sinh-ngay-30-9-la-cung-gi-A1941.html',
            '9,31' => '',
            '10,1' => 'sinh-ngay-1-10-la-cung-gi-A1942.html',
            '10,2' => 'sinh-ngay-2-10-la-cung-gi-A1943.html',
            '10,3' => 'sinh-ngay-3-10-la-cung-gi-A1944.html',
            '10,4' => 'sinh-ngay-4-10-la-cung-gi-A1945.html',
            '10,5' => 'sinh-ngay-5-10-la-cung-gi-A1946.html',
            '10,6' => 'sinh-ngay-6-10-la-cung-gi-A1947.html',
            '10,7' => 'sinh-ngay-7-10-la-cung-gi-A1948.html',
            '10,8' => 'sinh-ngay-8-10-la-cung-gi-A1949.html',
            '10,9' => 'sinh-ngay-9-10-la-cung-gi-A1950.html',
            '10,10' => 'sinh-ngay-10-10-la-cung-gi-A1951.html',
            '10,11' => 'sinh-ngay-11-10-la-cung-gi-A1952.html',
            '10,12' => 'sinh-ngay-12-10-la-cung-gi-A1953.html',
            '10,13' => 'sinh-ngay-13-10-la-cung-gi-A1954.html',
            '10,14' => 'sinh-ngay-14-10-la-cung-gi-A1955.html',
            '10,15' => 'sinh-ngay-15-10-la-cung-gi-A1956.html',
            '10,16' => 'sinh-ngay-16-10-la-cung-gi-A1957.html',
            '10,17' => 'sinh-ngay-17-10-la-cung-gi-A1958.html',
            '10,18' => 'sinh-ngay-18-10-la-cung-gi-A1959.html',
            '10,19' => 'sinh-ngay-19-10-la-cung-gi-A1960.html',
            '10,20' => 'sinh-ngay-20-10-la-cung-gi-A1961.html',
            '10,21' => 'sinh-ngay-21-10-la-cung-gi-A1962.html',
            '10,22' => 'sinh-ngay-22-10-la-cung-gi-A1963.html',
            '10,23' => 'sinh-ngay-23-10-la-cung-gi-A1964.html',
            '10,24' => 'sinh-ngay-24-10-la-cung-gi-A1965.html',
            '10,25' => 'sinh-ngay-25-10-la-cung-gi-A1966.html',
            '10,26' => 'sinh-ngay-26-10-la-cung-gi-A1967.html',
            '10,27' => 'sinh-ngay-27-10-la-cung-gi-A1968.html',
            '10,28' => 'sinh-ngay-28-10-la-cung-gi-A1969.html',
            '10,29' => 'sinh-ngay-29-10-la-cung-gi-A1970.html',
            '10,30' => 'sinh-ngay-30-10-la-cung-gi-A1971.html',
            '10,31' => 'sinh-ngay-31-10-la-cung-gi-A1972.html',
            '11,1' => 'sinh-ngay-1-11-la-cung-gi-A1973.html',
            '11,2' => 'sinh-ngay-2-11-la-cung-gi-A1974.html',
            '11,3' => 'sinh-ngay-3-11-la-cung-gi-A1997.html',
            '11,4' => 'sinh-ngay-4-11-la-cung-gi-A1998.html',
            '11,5' => 'sinh-ngay-5-11-la-cung-gi-A1999.html',
            '11,6' => 'sinh-ngay-6-11-la-cung-gi-A2000.html',
            '11,7' => 'sinh-ngay-7-11-la-cung-gi-A2001.html',
            '11,8' => 'sinh-ngay-8-11-la-cung-gi-A2002.html',
            '11,9' => 'sinh-ngay-9-11-la-cung-gi-A2003.html',
            '11,10' => 'sinh-ngay-10-11-la-cung-gi-A2004.html',
            '11,11' => 'sinh-ngay-11-11-la-cung-gi-A2005.html',
            '11,12' => 'sinh-ngay-12-11-la-cung-gi-A2006.html',
            '11,13' => 'sinh-ngay-13-11-la-cung-gi-A1975.html',
            '11,14' => 'sinh-ngay-14-11-la-cung-gi-A1976.html',
            '11,15' => 'sinh-ngay-15-11-la-cung-gi-A2007.html',
            '11,16' => 'sinh-ngay-16-11-la-cung-gi-A2008.html',
            '11,17' => 'sinh-ngay-17-11-la-cung-gi-A2009.html',
            '11,18' => 'sinh-ngay-18-11-la-cung-gi-A2010.html',
            '11,19' => 'sinh-ngay-19-11-la-cung-gi-A2011.html',
            '11,20' => 'sinh-ngay-20-11-la-cung-gi-A2012.html',
            '11,21' => 'sinh-ngay-21-11-la-cung-gi-A2013.html',
            '11,22' => 'sinh-ngay-22-11-la-cung-gi-A2014.html',
            '11,23' => 'sinh-ngay-23-11-la-cung-gi-A2015.html',
            '11,24' => 'sinh-ngay-24-11-la-cung-gi-A2016.html',
            '11,25' => 'sinh-ngay-25-11-la-cung-gi-A1977.html',
            '11,26' => 'sinh-ngay-26-11-la-cung-gi-A1978.html',
            '11,27' => 'sinh-ngay-27-11-la-cung-gi-A1979.html',
            '11,28' => 'sinh-ngay-28-11-la-cung-gi-A1980.html',
            '11,29' => 'sinh-ngay-29-11-la-cung-gi-A1981.html',
            '11,30' => 'sinh-ngay-30-11-la-cung-gi-A1982.html',
            '11,31' => '',
            '12,1' => 'sinh-ngay-1-12-la-cung-gi-A1983.html',
            '12,2' => 'sinh-ngay-2-12-la-cung-gi-A1984.html',
            '12,3' => 'sinh-ngay-3-12-la-cung-gi-A1985.html',
            '12,4' => 'sinh-ngay-4-12-la-cung-gi-A1986.html',
            '12,5' => 'sinh-ngay-5-12-la-cung-gi-A1987.html',
            '12,6' => 'sinh-ngay-6-12-la-cung-gi-A1988.html',
            '12,7' => 'sinh-ngay-7-12-la-cung-gi-A1989.html',
            '12,8' => 'sinh-ngay-8-12-la-cung-gi-A1990.html',
            '12,9' => 'sinh-ngay-9-12-la-cung-gi-A1991.html',
            '12,10' => 'sinh-ngay-10-12-la-cung-gi-A1992.html',
            '12,11' => 'sinh-ngay-11-12-la-cung-gi-A2017.html',
            '12,12' => 'sinh-ngay-12-12-la-cung-gi-A2018.html',
            '12,13' => 'sinh-ngay-13-12-la-cung-gi-A2019.html', 
            '12,14' => 'sinh-ngay-14-12-la-cung-gi-A2020.html',
            '12,15' => 'sinh-ngay-15-12-la-cung-gi-A2021.html',
            '12,16' => 'sinh-ngay-16-12-la-cung-gi-A2022.html',
            '12,17' => 'sinh-ngay-17-12-la-cung-gi-A2023.html',
            '12,18' => 'sinh-ngay-18-12-la-cung-gi-A2024.html',
            '12,19' => 'sinh-ngay-19-12-la-cung-gi-A1993.html',
            '12,20' => 'sinh-ngay-20-12-la-cung-gi-A1994.html',
            '12,21' => 'sinh-ngay-21-12-la-cung-gi-A1995.html',
            '12,22' => 'sinh-ngay-22-12-la-cung-gi-A1996.html',
            '12,23' => 'sinh-ngay-23-12-la-cung-gi-A2025.html',
            '12,24' => 'sinh-ngay-24-12-la-cung-gi-A2026.html',
            '12,25' => 'sinh-ngay-25-12-la-cung-gi-A2027.html',
            '12,26' => 'sinh-ngay-26-12-la-cung-gi-A2028.html',
            '12,27' => 'sinh-ngay-27-12-la-cung-gi-A2029.html',
            '12,28' => 'sinh-ngay-28-12-la-cung-gi-A2030.html',
            '12,29' => 'sinh-ngay-29-12-la-cung-gi-A2031.html',
            '12,30' => 'sinh-ngay-30-12-la-cung-gi-A2032.html',
            '12,31' => 'sinh-ngay-31-12-la-cung-gi-A2043.html',
        );
        $data['list_cung_name'] = $this->arr_cung_name;
        $data['list_cung_ngay'] = $this->arr_cung_ngay;
        $breadcrumb = array(
                0 => array(
                    'name' => 'Cung hoàng đạo',
                    'slug' => 'xem-ban-thuoc-cung-hoang-dao-nao-A2139.html',
                ),
            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view( $this->view_mobile, $data );
        } else{
            $this->load->view( $this->view, $data );
        }
    }
    public function hopnhau()
    {
        $data['list_cung_name'] = $this->arr_cung_name;
        $data['list_cung_ngay'] = $this->arr_cung_ngay;
        $breadcrumb = array(
                0 => array(
                    'name' => 'Cung hoàng đạo',
                    'slug' => 'boi-tinh-yeu-12-cung-hoang-dao-hop-nhau-khong-A2138.html',
                ),
            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view( $this->view_mobile, $data );
        } else{
            $this->load->view( $this->view, $data );
        }
    }
    public function nhommau()
    {
        $data['list_cung_name'] = $this->arr_cung_name;
        $data['list_cung_ngay'] = $this->arr_cung_ngay;
        $data['list_nhom_mau']  = $this->arr_nhom_mau;
        $breadcrumb = array(
                0 => array(
                    'name' => 'Cung hoàng đạo',
                    'slug' => 'xem-boi-nhom-mau-A2137.html',
                ),
            );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view( $this->view_mobile, $data );
        } else{
            $this->load->view( $this->view, $data );
        }
    }
}