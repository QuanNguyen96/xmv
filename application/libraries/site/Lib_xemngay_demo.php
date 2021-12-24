<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lib_xemngay_demo
{
    public $output_ngayki = null;
    public $tinh_nguhanh = '';
    public $tinh_banhtobachkinhat = [];
    public $tinh_thapnhibattu = '';
    public $tinh_saotot = '';
    public $tinh_saoxau = '';
    public $arr_tinh_saotot = [];
    public $arr_tinh_saoxau = [];
    public $tinh_sao = [];
    public $tinh_khongminh = '';
    public $tinh_tietkhi = '';
    public $tinh_gioxuathanh = '';
    public $CI = '';

    public $xd_trucngay = array(
        '1,3' => '1',
        '1,4' => '2',
        '1,5' => '3',
        '1,6' => '4',
        '1,7' => '5',
        '1,8' => '6',
        '1,9' => '7',
        '1,10' => '8',
        '1,11' => '9',
        '1,12' => '10',
        '1,1' => '11',
        '1,2' => '12',
        '2,4' => '1',
        '2,5' => '2',
        '2,6' => '3',
        '2,7' => '4',
        '2,8' => '5',
        '2,9' => '6',
        '2,10' => '7',
        '2,11' => '8',
        '2,12' => '9',
        '2,1' => '10',
        '2,2' => '11',
        '2,3' => '12',
        '3,5' => '1',
        '3,6' => '2',
        '3,7' => '3',
        '3,8' => '4',
        '3,9' => '5',
        '3,10' => '6',
        '3,11' => '7',
        '3,12' => '8',
        '3,1' => '9',
        '3,2' => '10',
        '3,3' => '11',
        '3,4' => '12',
        '4,6' => '1',
        '4,7' => '2',
        '4,8' => '3',
        '4,9' => '4',
        '4,10' => '5',
        '4,11' => '6',
        '4,12' => '7',
        '4,1' => '8',
        '4,2' => '9',
        '4,3' => '10',
        '4,4' => '11',
        '4,5' => '12',
        '5,7' => '1',
        '5,8' => '2',
        '5,9' => '3',
        '5,10' => '4',
        '5,11' => '5',
        '5,12' => '6',
        '5,1' => '7',
        '5,2' => '8',
        '5,3' => '9',
        '5,4' => '10',
        '5,5' => '11',
        '5,6' => '12',
        '6,8' => '1',
        '6,9' => '2',
        '6,10' => '3',
        '6,11' => '4',
        '6,12' => '5',
        '6,1' => '6',
        '6,2' => '7',
        '6,3' => '8',
        '6,4' => '9',
        '6,5' => '10',
        '6,6' => '11',
        '6,7' => '12',
        '7,9' => '1',
        '7,10' => '2',
        '7,11' => '3',
        '7,12' => '4',
        '7,1' => '5',
        '7,2' => '6',
        '7,3' => '7',
        '7,4' => '8',
        '7,5' => '9',
        '7,6' => '10',
        '7,7' => '11',
        '7,8' => '12',
        '8,10' => '1',
        '8,11' => '2',
        '8,12' => '3',
        '8,1' => '4',
        '8,2' => '5',
        '8,3' => '6',
        '8,4' => '7',
        '8,5' => '8',
        '8,6' => '9',
        '8,7' => '10',
        '8,8' => '11',
        '8,9' => '12',
        '9,11' => '1',
        '9,12' => '2',
        '9,1' => '3',
        '9,2' => '4',
        '9,3' => '5',
        '9,4' => '6',
        '9,5' => '7',
        '9,6' => '8',
        '9,7' => '9',
        '9,8' => '10',
        '9,9' => '11',
        '9,10' => '12',
        '10,12' => '1',
        '10,1' => '2',
        '10,2' => '3',
        '10,3' => '4',
        '10,4' => '5',
        '10,5' => '6',
        '10,6' => '7',
        '10,7' => '8',
        '10,8' => '9',
        '10,9' => '10',
        '10,10' => '11',
        '10,11' => '12',
        '11,1' => '1',
        '11,2' => '2',
        '11,3' => '3',
        '11,4' => '4',
        '11,5' => '5',
        '11,6' => '6',
        '11,7' => '7',
        '11,8' => '8',
        '11,9' => '9',
        '11,10' => '10',
        '11,11' => '11',
        '11,12' => '12',
        '12,2' => '1',
        '12,3' => '2',
        '12,4' => '3',
        '12,5' => '4',
        '12,6' => '5',
        '12,7' => '6',
        '12,8' => '7',
        '12,9' => '8',
        '12,10' => '9',
        '12,11' => '10',
        '12,12' => '11',
        '12,1' => '12',
    );
    public $mang_trucngay = array(
        1 => array(
            'ten' => 'TRỰC KIẾN',
            'tot' => 'Xuất hành đặng lợi, sinh con rất tốt.',
            'xau' => 'Động đất ban nền, đắp nền, lót giường, vẽ họa chụp ảnh, lên quan nhậm chức, nạp lễ cầu thân, vào làm hành chánh, dâng nộp đơn từ, mở kho vựa, vì vậy nên chọn một ngày khác để tiến hành lợp mới nhà trăm đường đều thuận lợi <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-do-tran-lop-mai.html">Xem ngày tốt lợp mái</a>
'
        ),
        2 => array(
            'ten' => 'TRỰC TRỪ',
            'tot' => 'Động đất, ban nền đắp nền, thờ cúng Táo Thần, cầu thầy chữa bệnh bằng cách mổ xẻ hay châm cứu, bốc thuốc, xả tang, khởi công làm lò nhuộm lò gốm, nữ nhân khởi đầu uống thuốc chữa bệnh.',
            'xau' => 'Đẻ con nhằm ngày này khó nuôi, nên làm Âm Đức cho con, nam nhân kỵ khởi đầu uống thuốc.'
        ),
        3 => array(
            'ten' => 'TRỰC MÃN',
            'tot' => 'Xuất hành, đi đường thủy, cho vay, thu nợ, mua hàng, bán hàng, nhập kho, đặt táng, kê gác, sửa chữa, lắp đặt máy, thuê thêm người, vào học kỹ nghệ, làm chuồng gà ngỗng vịt.',
            'xau' => 'Lên quan lĩnh chức, uống thuốc, vào làm hành chính, dâng nộp đơn từ. Vì vậy, quý bạn nên chọn một ngày khác để tiến hành các việc trên <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-hoang-dao.html">Xem ngày đại minh cát nhật</a>'
        ),
        4 => array(
            'ten' => 'TRỰC BÌNH',
            'tot' => 'Nhập vào kho, đặt táng, gắn cửa, kê gác, đặt yên chỗ máy, sửa chữa làm tàu, khai trương tàu thuyền, các việc bồi đắp thêm ( như bồi bùn, đắp đất, lót đá, xây bờ kè.) ',
            'xau' => 'Lót giường đóng giường, thừa kế tước phong hay thừa kế sự nghiệp, các vụ làm cho khuyết thủng ( như đào mương, móc giếng, xả nước.). Vì vậy, nên chọn ngày khác để tiến hành các việc trên <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-xau.html">Xem ngày tốt</a>'
        ),
        5 => array(
            'ten' => 'TRỰC ĐỊNH',
            'tot' => 'Động thổ, san nền, đắp nền, làm hay sửa phòng Bếp, lắp đặt máy móc, nhập học, làm lễ cầu thân, nộp đơn dâng sớ, sửa hay làm tàu thuyền, khai trương tàu thuyền, khởi công làm lò.',
            'xau' => 'Mua nuôi thêm súc vật.'
        ),
        6 => array(
            'ten' => 'TRỰC CHẤP',
            'tot' => 'Lập khế ước, giao dịch, động thổ san nền, cầu thầy chữa bệnh, đi săn thú cá, tìm bắt trộm cướp.',
            'xau' => 'Xây đắp nền-tường. Vì vậy, Nếu quý bạn đang có ý định mở kho, khai trương buôn bán trong tháng này thì nên chọn ngày khác để tiến hành <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-khai-truong.html">Xem ngày tốt khai trương</a>'
        ),
        7 => array(
            'ten' => 'TRỰC PHÁ',
            'tot' => 'Bốc thuốc, uống thuốc, chữa bệnh.',
            'xau' => 'Lót giường đóng giường, cho vay, động thổ, san nền đắp nền, vẽ họa chụp ảnh, lên quan nhậm chức, thừa kế chức tước hay sự nghiệp, nhập học, học kỹ nghệ, làm lễ cầu thân, vào làm hành chính, nộp đơn dâng sớ. Nếu quý bạn đang có ý định động thổ xây dựng hay nhận chức trong tháng này thì nên chọn ngày khác để tiến hành. Nếu quý bạn đang có ý định động thổ xây dựng hay nhận chức trong tháng này thì nên chọn ngày khác để tiến hành <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-dong-tho.html">Xem ngày tốt động thổ</a> và <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-nhan-chuc.html">Xem ngày tốt nhận chức</a>
'
        ),
        8 => array(
            'ten' => 'TRỰC NGUY',
            'tot' => 'Lót giường đóng giường, đi săn thú cá, khởi công làm lò nhuộm lò gốm.',
            'xau' => 'Xuất hành đường thủy. Vì vậy, quý bạn nên chọn một ngày khác gần nhất để xuất hành trăm sự đều tốt <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-xuat-hanh.html">Xem ngày tốt xuất hành</a> hoặc <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-ket-hon.html">xem ngày tốt cưới hỏi</a>'
        ),
        9 => array(
            'ten' => 'TRỰC THÀNH',
            'tot' => 'Lập khế ước, giao dịch, cho vay, thu nợ, mua hàng, bán hàng, xuất hành, đi tàu thuyền, khởi tạo, động Thổ, san nền đắp nền, gắn cửa, đặt táng, kê gác, dựng xây kho vựa, làm hay sửa chữa phòng Bếp, thờ phụng Táo Thần, lắp đặt máy móc ( hay các loại máy ), gặt lúa, đào ao giếng, tháo nước, cầu thầy chữa bệnh, mua gia súc, các việc trong vụ chăn nuôi, nhập học, làm lễ cầu thân, cưới gã, kết hôn, thuê người, nộp đơn dâng sớ, học kỹ nghệ, làm hoặc sửa tàu thuyền, khai trương tàu thuyền, vẽ tranh, tu sửa cây cối.',
            'xau' => 'Kiện tụng, tranh chấp.'
        ),
        10 => array(
            'ten' => 'TRỰC THÂU',
            'tot' => 'Cấy lúa gặt lúa, mua trâu, nuôi tằm, đi săn thú cá, tu sửa cây cối',
            'xau' => 'Động thổ, san nền đắp nền, nữ nhân khởi ngày uống thuốc chưa bệnh, lên quan lãnh chức, thừa kế chức tước hay sự nghiệp, vào làm hành chính, nộp đơn dâng sớ, mưu sự khuất tất. Vì vậy, nên chọn một ngày đại cát trăm sự đều thuận để tiến hành các việc trên <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-hoang-dao.html">Xem ngày hoành đạo</a>
'
        ),
        11 => array(
            'ten' => 'TRỰC KHAI',
            'tot' => 'Xuất hành, đi tàu thuyền, khởi tạo, động thổ, san nền đắp nền, dựng xây kho vựa, làm hay sửa phòng Bếp, thờ cúng Táo Thần, đóng giường lót giường, may áo, lắp đặt cỗ máy dệt hay các loại máy, cấy lúa gặt lúa, đào ao giếng, tháo nước, các việc trong vụ chăn nuôi, mở thông hào rãnh, cầu thầy chữa bệnh, bốc thuốc, uống thuốc, mua trâu, làm rượu, nhập học, học kỹ nghệ, vẽ tranh, tu sửa cây cối.',
            'xau' => 'Chôn cất. Vì vậy, nên chọn một ngày khác gần nhất để tiến hành mai táng <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-an-tang.html">Xem ngày tốt an táng</a>
'
        ),
        12 => array(
            'ten' => 'TRỰC BẾ',
            'tot' => 'Xây đắp tường, đặt táng, gắn cửa, kê gác, làm cầu. khởi công lò nhuộm lò gốm, uống thuốc, trị bệnh ( nhưng chớ trị bệnh mắt ), tu sửa cây cối.',
            'xau' => 'Lên quan nhận chức, thừa kế chức tước hay sự nghiệp, nhập học, chữa bệnh mắt, các việc trong vụ chăn nuôi. Vậy nên chọn một ngày khác để tiến hành nhận chức cho công việc thuận lợi, đại cát <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-nhan-chuc.html">Xem ngày tốt nhận chức</a>
'
        ),
    );

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
    }

    function abc()
    {
    }

    function tinhngay_ki($input = null)
    {
        $this->tinhngay_nguyetki_tamnuong($input['ngayamlich']);
        $this->tinhngay_thutu($input['chingay'], $input['thang']);
        $this->tinhngay_trungtang_trungphuc($input['canngay'], $input['thang']);
        $this->tinhngay_duongcongluy($input['ngayamlich'], $input['thang']);
        $this->tinhngay_kimthanthatsat($input['chingay'], $input['cannam']);
        return $this->output_ngayki;
    }

    function tinhngay_nguyetki_tamnuong($ngayamlich = null)
    {
        $arr_nguyetki = array(1 => '5', 2 => '14', 3 => '23');
        $arr_tamnuong = array(1 => '3', 2 => '7', 3 => '13', 4 => '18', 5 => '22', 6 => '27');
        if (array_search($ngayamlich, $arr_nguyetki)) {
            $this->output_ngayki['nguyetki'] = array(
                '<a href="' . base_url('ngay-nguyet-ky-va-nhung-dieu-chua-biet-ve-mung-05-14-23-A624.html') . '">Nguyệt kị</a>',
                '“Mùng năm, mười bốn, hai ba - Đi chơi còn thiệt, nữa là đi buôn”'
            );
        }
        if (array_search($ngayamlich, $arr_tamnuong)) {
            $this->output_ngayki['tamnuong'] = array(
                '<a href="' . base_url('ngay-tam-nuong-la-gi-va-nhung-dieu-kieng-ky-ma-ban-can-biet-A621.html') . '">Tam nương</a>',
                'xấu, ngày này kỵ tiến hành các việc khai trương, xuất hành, cưới hỏi, sửa chữa hay cất (3,7,13,18,22,27)'
            );
        }
        return $this->output_ngayki;
    }

    function tinhngay_thutu($chingay = null, $thang = null)
    { // get ngay thu tu
        $chingay = ($chingay);
        $arr_thutu_satchu_satchu2 = array(
            0 => array('none', 'none', 'none'),
            1 => array('Tuất', 'Tỵ', 'Tý'),
            2 => array('Thìn', 'Tý', 'Sửu'),
            3 => array('Hợi', 'Mùi', 'Sửu'),
            4 => array('Tỵ', 'Mão', 'Tuất'),
            5 => array('Tý', 'Thân', 'Thìn'),
            6 => array('Ngọ', 'Tuất', 'Thìn'),
            7 => array('Sửu', 'Sửu', 'Sửu'),
            8 => array('Mùi', 'Hợi', 'Thìn'),
            9 => array('Dần', 'Ngọ', 'Sửu'),
            10 => array('Thân', 'Dậu', 'Thìn'),
            11 => array('Mão', 'Dần', 'Mùi'),
            12 => array('Dậu', 'none', 'Thìn'),
        );

        $thang = (int)$thang;
        $thutu_satchu_satchu2 = $arr_thutu_satchu_satchu2[$thang];

        foreach ($thutu_satchu_satchu2 as $key => $row) {
            if ($chingay == $row) {
            }
            if ($chingay == $row) {
                if ($key == 0) {
                    $this->output_ngayki['thutu'] = array(
                        '<a href="' . base_url('ngay-tho-tu-la-gi-va-cach-tinh-ngay-tho-tu-A622.html') . '">Thụ tử</a>',
                        'Ngày này trăm sự đều kỵ không nên tiến hành bất cứ việc gì.'
                    );
                }
                if ($key == 1) {
                    $this->output_ngayki['satchu_am'] = array(
                        '<a href="' . base_url('ngay-sat-chu-la-gi-va-nhung-dieu-kieng-ky-A625.html') . '">Sát chủ âm</a>',
                        'Ngày Sát chủ âm là ngày kỵ các việc về mai táng, tu sửa mộ phần.'
                    );
                }
                if ($key == 2) {
                    $this->output_ngayki['satchu_duong'] = array(
                        '<a href="' . base_url('ngay-sat-chu-la-gi-va-nhung-dieu-kieng-ky-A625.html') . '">Sát chủ dương</a>',
                        'Ngày này kỵ tiến hành các việc liên quan đến xây dựng, cưới hỏi, buôn bán, mua bán nhà, nhận việc, đầu tư.'
                    );
                }
            }
        }
    }

    function tinhngay_trungtang_trungphuc($canngay = null, $thang = null)
    {
        $canngay = ($canngay);
        $canngay = get_can_menh($canngay);
        $arr_trungtang_trungphuc = array(
            0 => array('none', 'none'),
            1 => array(1, 7),
            2 => array(2, 8),
            3 => array(6, 6),
            4 => array(3, 9),
            5 => array(4, 10),
            6 => array(5, 5),
            7 => array(7, 1),
            8 => array(6, 2),
            9 => array(6, 6),
            10 => array(9, 9),
            11 => array(10, 10),
            12 => array(6, 6),
        );

        $thang = (int)$thang;
        $trungtang_trungphuc = $arr_trungtang_trungphuc[$thang];

        foreach ($trungtang_trungphuc as $key => $row) {
            if ($canngay == $row) {
                if ($key == 0) {
                    $this->output_ngayki['trungtang'] = array(
                        '<a href="' . base_url('trung-tang-nhap-mo-la-gi-va-cach-tinh-cung-nhu-cach-hoa-giai-trung-tang-A626.html') . '"></a>',
                        'Kỵ Chôn cất, cưới xin, vợ chồng xuất hành,xây nhà ,xây mồ mả'
                    );
                }
                if ($key == 1) {
                    $this->output_ngayki['trungphuc'] = array(
                        '<a href="' . base_url('ngay-trung-phuc-la-gi-va-cach-tinh-ngay-trung-phuc-A648.html') . '">Trùng phục</a>',
                        'Kỵ Chôn cất, cưới xin, vợ chồng xuất hành,xây nhà ,xây mồ mả'
                    );
                }
            }
        }
    }

    function tinhngay_duongcongluy($ngay = null, $thang = null)
    {
        $arr_duongcongluy = array(
            0 => array('none', 'none'),
            1 => array(13),
            2 => array(11),
            3 => array(9),
            4 => array(7),
            5 => array(5),
            6 => array(3),
            7 => array(1, 29),
            8 => array(27),
            9 => array(25),
            10 => array(23),
            11 => array(21),
            12 => array(22),
        );
        $duongcongluy = $arr_duongcongluy[$thang];
        if (in_array($ngay, $duongcongluy)) {
            $this->output_ngayki['duongcongluy'] = array(
                '<a href="' . base_url('ngay-duong-cong-ky-nhat-la-gi-va-cach-tinh-ngay-trong-thang-A646.html') . '">Dương công lụy</a>',
                '...'
            );
        }
    }

    function tinhngay_kimthanthatsat($chingay = null, $cannam = null)
    {
        $chingay = ($chingay);
        $cannam = ($cannam);
        $cannam = get_can_menh($cannam);
        $chingay = get_chi_menh($chingay);
        $arr_kimthanthatsat = array(
            0 => array('none', 'none'),
            1 => array(7, 8),
            2 => array(5, 6),
            3 => array(1, 2, 3, 4),
            4 => array(11, 12),
            5 => array(9, 10),
            6 => array(7, 8),
            7 => array(1, 29),
            8 => array(5, 6),
            9 => array(1, 2, 3, 4),
            10 => array(11, 12),
        );
        $kimthanthatsat = $arr_kimthanthatsat[$cannam];

        if (in_array($chingay, $kimthanthatsat)) {
            $this->output_ngayki['kimthanthatsat'] = array(
                '<a href="' . base_url('ngay-kim-than-that-sat-la-gi-va-nhung-dieu-can-biet-ve-ngay-nay-A623.html') . '">Kim thần thất sát</a>',
                ''
            );
        }
    }

    function tinhngay_connuoc()
    {
    }

    function tinh_nguhanh($input)
    {
        $result = $this->CI->db->select()
            ->from('ci_xemngay_nguhanh_huongdi')
            ->like(array('can_ngay' => $input['canngay'], 'chi_ngay' => $input['chingay']))
            ->get()
            ->row_array();
        $this->tinh_nguhanh = $result;
        return $this->tinh_nguhanh;
    }

    function tinh_banhtobachkinhat($input)
    {
        //dd($input);
        $input['canngay'] = ($input['canngay']);
        $input['chingay'] = ($input['chingay']);
        $canngay = get_can_menh($input['canngay']);
        $chingay = get_chi_menh($input['chingay']);
        $arr_canngay = array(
            0 => '',
            1 => '“Bất khai thương tài vật hao vong” - Không nên tiến hành mở kho tránh tiền của hao mất, vì vậy ngày nay không nên tiến hành mở kho, khai trương <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-khai-truong.html">Xem ngày tốt khai trương</a>
',
            2 => '“Bất tải thực thiên chu bất trưởng” - Không nên tiến hành các việc liên quan đến gieo trồng, ngàn gốc không lên',
            3 => '“Bất tu táo tất kiến hỏa ương” - Không nên tiến hành sửa chữa bếp để tránh bị hỏa tai, vì vậy ngày nay không thích hợp để tiến hành xây dựng bếp <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-xay-dung.html">Xem ngày tốt xây dựng</a>
',
            4 => '“Bất thế đầu đầu chủ sanh sang” - Không nên tiến hành việc cắt tóc để tránh đầu sinh ra nhọt',
            5 => '“Bất thụ điền điền chủ bất tường” - Không nên tiến hành việc liên quan đến nhận đất để tránh gia chủ không được lành, vì vậy ngày này tránh tiến hành mua bán nhà đất <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-mua-nha.html">Xem ngày tốt mua nhà</a>',
            6 => '“Bất phá khoán nhị chủ tịnh vong” - Không nên tiến hành phá khoán để tránh cả 2 bên đều mất mát',
            7 => '“Bất kinh lạc chức cơ hư trướng” - Không nên tiến hành quay tơ để tránh cũi dệt hư hại ngang',
            8 => '“Bất hợp tương chủ nhân bất thường” - Không nên tiến hành trộn tương, chủ không được nếm qua',
            9 => '“Bất ương thủy nan canh đê phòng” - Không nên tiến hành tháo nước để tránh khó canh phòng đê điều',
            10 => '“Bất từ tụng lí nhược địch cường” - Không nên tiến hành các việc liên quan đến kiện tụng, ta lý yếu địch lý mạnh. Vì vậy, ngày này không tốt để ký kết hợp đồng <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-ky-hop-dong.html">Xem ngày tốt ký hợp đồng</a>
',
        );
        $arr_chingay = array(
            0 => '',
            1 => '“Bất vấn bốc tự nhạ tai ương” - Không nên tiến hành gieo quẻ hỏi việc để tránh tự rước lấy tai ương. Vì vậy, ngày này không thích hợp để làm các việc Xem bói, gieo quẻ như: <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-boi-ngay-sinh.html">xem bói theo ngày tháng năm sinh</a>, <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-boi-so-dien-thoai.html">xem bói số điện thoại</a>, <span class="btn_nhaynhay">>>></span> <a href="$domain/boi-bai-hang-ngay.html">xem bói bài</a>',
            2 => '“Bất quan đới chủ bất hoàn hương” - Không nên tiến hành các việc đi nhận quan để tránh việc gia chủ sẽ không hồi hương. Vì vậy, nếu quý bạn có ý định chuyển công tác hay nhận chức thì không nên tiến hành trong này này <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-nhan-chuc.html">Xem ngày tốt nhận chức</a>
',
            3 => '“Bất tế tự quỷ thần bất thường” - Không nên tiến hành công việc liên quan đến tế tự vì ngày này quỷ thần không bình thườngs',
            4 => '“Bất xuyên tỉnh tuyền thủy bất hương” - Không nên tiến hành đào giếng nước để tránh nước sẽ không trong lành',
            5 => '“Bất khốc khấp tất chủ trọng tang” - Không nên khóc lóc để tránh chủ có trùng tang',
            6 => '“Bất viễn hành tài vật phục tàng” - Không nên đi xa để tránh tiền của mất mát. Vì vậy, nếu quý bạn có ý định đi xa nên chọn ngày xuất hành khác gần nhất <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-xuat-hanh.html">Xem ngày tốt xuất hành</a>',
            7 => '“Bất thiêm cái thất chủ canh trương” - Không nên tiến hành lợp mái nhà để tránh chủ sẽ phải làm lại. Vì vậy, nếu quý bạn có ý định tiến hành đổ trần, lợp mái thì không nên chọn ngày này <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-do-tran-lop-mai.html">Xem ngày lợp mái nhà</a>',
            8 => '“Bất phục dược độc khí nhập tràng” - Không nên uống thuốc để tránh khí độc ngấm vào ruột',
            9 => '“Bất an sàng quỷ túy nhập phòng” - Không nên tiến hành kê giường để tránh quỷ ma vào phòng',
            10 => '“Bất hội khách tân chủ hữu thương” - Không nên tiến hành hội khách để tránh tân chủ có hại',
            11 => '“Bất cật khuyển tác quái thượng sàng” - Không nên ăn chó, quỉ quái lên giường',
            12 => '“Bất giá thú tất chủ phân trương” - Không nên tiến hành các việc liên quan đến cưới hỏi để tránh ly biệt. Vì vây, nếu quý bạn muốn chọn ngày cưới hỏi tốt thì nên chọn một ngày khác <span class="btn_nhaynhay">>>></span> <a href="$domain/xem-ngay-tot-ket-hon.html">Xem ngày tốt cưới hỏi</a>',
        );
        $this->tinh_banhtobachkinhat['canngay'] = $arr_canngay[$canngay];
        $this->tinh_banhtobachkinhat['chingay'] = $arr_chingay[$chingay];
        return $this->tinh_banhtobachkinhat;
    }

    function tinh_khongminhlucdieu($input)
    {
        $thang = $input['thang'];

        $ngay = $input['ngayamlich'];
        $arr_khongminhlucdieu = array(
            1 => 'Đại an',
            2 => 'Lưu liên',
            3 => 'Tốc hỷ',
            4 => 'Xích khẩu',
            5 => 'Tiểu cát',
            6 => 'Không vong',
            7 => 'Đại an',
            8 => 'Lưu liên',
            9 => 'Tốc hỷ',
            10 => 'Xích khẩu',
            11 => 'Tiểu cát',
            12 => 'Không vong',
        );
        $arr_vonglap = array(
            1 => 'Đại an',
            2 => 'Lưu liên',
            3 => 'Tốc hỷ',
            4 => 'Xích khẩu',
            5 => 'Tiểu cát',
            6 => 'Không vong',
        );
        $arr_hour = array(
            1 => 'Từ 11h-13h (Ngọ) và từ 23h-01h (Tý)',
            2 => 'Từ 13h-15h (Mùi) và từ 01-03h (Sửu)',
            3 => 'Từ 15h-17h (Thân) và từ 03h-05h (Dần)',
            4 => 'Từ 17h-19h (Dậu) và từ 05h-07h (Mão)',
            5 => 'Từ 19h-21h (Tuất) và từ 07h-09h (Thìn)',
            6 => 'Từ 21h-23h (Hợi) và từ 09h-11h (Tị)',
        );
        foreach ($arr_vonglap as $key => $row) {
            //echo $key.' : '.$row.'-';
        }
        $thang_khongminh = $arr_khongminhlucdieu[$thang];

        $ngay_khongminh = ($ngay + $thang - 1) % 6;
        if ($ngay_khongminh == 0) {
            $ngay_khongminh = 6;
        }
        //dd($ngay_khongminh);

        $text_ngay_khongminh = $arr_vonglap[$ngay_khongminh];
        $this->tinh_khongminh = array(
            $ngay_khongminh,
            $text_ngay_khongminh,
            $this->get_khongminh_db($text_ngay_khongminh)
        );
        //echo $text_ngay_khongminh;
        /** tinh thoi gian 24h trong 1 ngay **/
        $gio_xuathanh = [];
        foreach ($arr_hour as $key => $value) {
            $tmp = ($ngay_khongminh + $key - 1) % 6;
            if ($tmp == 0) {
                $tmp = 6;
            }
            $gio_xuathanh[$value] = array($key, $arr_vonglap[$tmp], $this->get_khongminh_db($arr_vonglap[$tmp]));
        }
        //dd($gio_xuathanh);
        /** end **/
        $this->tinh_gioxuathanh = $gio_xuathanh;
        return array('tinh_gioxuathanh' => $this->tinh_gioxuathanh, 'tinh_khongminh' => $this->tinh_khongminh);
    }

    function get_khongminh_db($khongminh = null)
    {
        $result_khongminh = $this->CI->db->select()
            ->from('ci_xemngay_khongminh')
            ->like('name', $khongminh)
            ->get()
            ->row_array();
        return $result_khongminh;
    }

    function tinh_saototsaoxau($input)
    {
        $thang = $input['thang'];
        $chingay = $input['chingay'];
        $canngay = $input['canngay'];
        $result_saochi = $this->CI->db->select()
            ->from('ci_xemngay_chingay')
            ->like(array('thang' => $thang, 'chi_ngay' => $chingay))
            ->get()
            ->row_array();
        $result_saocan = $this->CI->db->select()
            ->from('ci_xemngay_canngay')
            ->like(array('thang' => $thang, 'can_ngay' => $canngay))
            ->get()
            ->row_array();
        $this->tinh_saotot = $result_saochi['sao_tot'];
        $this->tinh_saotot .= isset($result_saocan['sao_tot']) ? $result_saocan['sao_tot'] : '';
        $this->tinh_saoxau = $result_saochi['sao_xau'];
        $this->tinh_saotot .= isset($result_saocan['sao_xau']) ? $result_saocan['sao_xau'] : '';
        $this->tinh_sao['sao_tot'] = $this->tinh_saotot;
        $this->tinh_sao['sao_xau'] = $this->tinh_saoxau;
        if ($result_saocan['sao_tot'] != '') {
            $arr = explode(':', $result_saocan['sao_tot']);
            $this->arr_tinh_saotot[] = $arr[0];
        }
        if ($result_saochi['sao_tot'] != '') {
            $arr = explode(':', $result_saocan['sao_tot']);
            $this->arr_tinh_saotot[] = $arr[0];
        }
        if ($result_saocan['sao_xau'] != '') {
            $arr = explode(':', $result_saocan['sao_xau']);
            $this->arr_tinh_saoxau[] = $arr[0];
        }
        if ($result_saochi['sao_xau'] != '') {
            $arr = explode(':', $result_saocan['sao_xau']);
            $this->arr_tinh_saoxau[] = $arr[0];
        }
        return $this->tinh_sao;
    }

    /** Ham nay phai chay sau ham tinh_saototsaoxau() */
    public function tinh_saototsaoxau_name()
    {
        $rt['sao_tot'] = $this->arr_tinh_saotot;
        $rt['sao_xau'] = $this->arr_tinh_saoxau;
        return $rt;
    }

    function tinh_thapnhibattu($input)
    {
        $ngayduong = $input['ngayduong'];
        $thangduong = $input['thangduong'];
        $namduong = $input['namduong'];
        $date_now = strtotime($namduong . '/' . $thangduong . '/' . $ngayduong . ' ' . '6:6:6');
        $date_old = strtotime('2017/1/1 6:6:6');
        $long_date = $date_now - $date_old;
        if ($long_date < 0) {
            $long_date = 0 - $long_date;
        }
        $day_long_date = (int)($long_date / (60 * 60 * 24));
        $vonglap_28ngay = ($day_long_date + 11) % 28; // cong voi 11 vi 1/1/2017 la 11
        $vonglap_28ngay = $vonglap_28ngay == 0 ? 28 : $vonglap_28ngay;
        $arr_nhithap = array(
            '1' => 'giác',
            '2' => 'cang',
            '3' => 'đê',
            '4' => 'phòng',
            '5' => 'tâm',
            '6' => 'vĩ',
            '7' => 'cơ',
            '8' => 'đẩu',
            '9' => 'ngưu',
            '10' => 'nữ',
            '11' => 'hư',
            '12' => 'nguy',
            '13' => 'thất',
            '14' => 'bích',
            '15' => 'khuê',
            '16' => 'lâu',
            '17' => 'vị',
            '18' => 'mão',
            '19' => 'tất',
            '20' => 'chủy',
            '21' => 'sâm',
            '22' => 'tinh',
            '23' => 'quỷ',
            '24' => 'liễu',
            '25' => 'tinh',
            '26' => 'trương',
            '27' => 'dực',
            '28' => 'chuẩn',
        );

        $result = $this->CI->db->select()
            ->from('ci_xemngay_nhithapbattu')
            ->like(array('name' => $arr_nhithap[$vonglap_28ngay]))
            ->get()
            ->row_array();

        $this->tinh_thapnhibattu = array($vonglap_28ngay, $arr_nhithap[$vonglap_28ngay], $result);
        return $this->tinh_thapnhibattu;
    }

    function tinh_thapnhibattu_anhduong($input)
    {
        $ngayduong = $input['ngayduong'];
        $thangduong = $input['thangduong'];
        $namduong = $input['namduong'];
        $date_now = strtotime($namduong . '/' . $thangduong . '/' . $ngayduong . ' ' . '6:6:6');
        $date_old = strtotime('2017/1/1 6:6:6');
        $long_date = $date_now - $date_old;
        if ($long_date < 0) {
            $long_date = 0 - $long_date;
        }
        $day_long_date = (int)($long_date / (60 * 60 * 24));
        $vonglap_28ngay = ($day_long_date + 11) % 28; // cong voi 11 vi 1/1/2017 la 11
        $vonglap_28ngay = $vonglap_28ngay == 0 ? 28 : $vonglap_28ngay;
        $arr_nhithap = array(
            '1' => 'giác',
            '2' => 'cang',
            '3' => 'đê',
            '4' => 'phòng',
            '5' => 'tâm',
            '6' => 'vĩ',
            '7' => 'cơ',
            '8' => 'đẩu',
            '9' => 'ngưu',
            '10' => 'nữ',
            '11' => 'hư',
            '12' => 'nguy',
            '13' => 'thất',
            '14' => 'bích',
            '15' => 'khuê',
            '16' => 'lâu',
            '17' => 'vị',
            '18' => 'mão',
            '19' => 'tất',
            '20' => 'chủy',
            '21' => 'sâm',
            '22' => 'tinh',
            '23' => 'quỷ',
            '24' => 'liễu',
            '25' => 'tinh',
            '26' => 'trương',
            '27' => 'dực',
            '28' => 'chuẩn',
        );

        $result = $this->CI->db->select()
            ->from('ci_xemngay_nhithapbattu_anhduong')
            ->like(array('name' => $arr_nhithap[$vonglap_28ngay]))
            ->get()
            ->row_array();

        $this->tinh_thapnhibattu = array($vonglap_28ngay, $arr_nhithap[$vonglap_28ngay], $result);
        return $this->tinh_thapnhibattu;
    }

    public function xacdinh_tietkhi($input)
    {
        $ngayduong = $input['ngayduong'];
        $thangduong = $input['thangduong'];
        $namduong = $input['namduong'];
        $ngay_hien_tai = strtotime($ngayduong . '-' . $thangduong . '-' . $namduong);
        $nam = $namduong;
        $nam1 = $nam + 1;
        if ($ngay_hien_tai >= strtotime('4-2-' . $nam) && $ngay_hien_tai < strtotime('19-2-' . $nam)) {
            $rt = 'Lập xuân ( Bước vào mùa xuân )';
            $id = 1;
        } elseif ($ngay_hien_tai >= strtotime('19-2-' . $nam) && $ngay_hien_tai < strtotime('5-3-' . $nam)) {
            $rt = 'Vũ thủy ( Mưa Ẩm )';
            $id = 1;
        } elseif ($ngay_hien_tai >= strtotime('5-3-' . $nam) && $ngay_hien_tai < strtotime('21-3-' . $nam)) {
            $rt = 'Kinh trập ( Sâu nở )';
            $id = 2;
        } elseif ($ngay_hien_tai >= strtotime('21-3-' . $nam) && $ngay_hien_tai < strtotime('5-4-' . $nam)) {
            $rt = 'Xuân phân ( Giữa xuân )';
            $id = 2;
        } elseif ($ngay_hien_tai >= strtotime('5-4-' . $nam) && $ngay_hien_tai < strtotime('20-4-' . $nam)) {
            $rt = 'Thanh minh ( Trong sáng )';
            $id = 3;
        } elseif ($ngay_hien_tai >= strtotime('20-4-' . $nam) && $ngay_hien_tai < strtotime('6-5-' . $nam)) {
            $rt = 'Cốc vũ ( Mưa rào )';
            $id = 3;
        } elseif ($ngay_hien_tai >= strtotime('6-5-' . $nam) && $ngay_hien_tai < strtotime('21-5-' . $nam)) {
            $rt = 'Lập hạ ( Bước vào mùa hạ )';
            $id = 4;
        } elseif ($ngay_hien_tai >= strtotime('21-5-' . $nam) && $ngay_hien_tai < strtotime('7-6-' . $nam)) {
            $rt = 'Tiểu mãn ( Lũ nhỏ )';
            $id = 4;
        } elseif ($ngay_hien_tai >= strtotime('6-6-' . $nam) && $ngay_hien_tai < strtotime('22-6-' . $nam)) {
            $rt = 'Mang chủng ( Chòm sao tua rua xuất hiện )';
            $id = 5;
        } elseif ($ngay_hien_tai >= strtotime('22-6-' . $nam) && $ngay_hien_tai < strtotime('8-7-' . $nam)) {
            $rt = 'Hạ chí ( Giữa mùa hạ )';
            $id = 5;
        } elseif ($ngay_hien_tai >= strtotime('8-7-' . $nam) && $ngay_hien_tai < strtotime('24-7-' . $nam)) {
            $rt = 'Tiểu thử ( Nắng nhẹ )';
            $id = 6;
        } elseif ($ngay_hien_tai >= strtotime('24-7-' . $nam) && $ngay_hien_tai < strtotime('8-8-' . $nam)) {
            $rt = 'Đại thử ( Nắng oi )';
            $id = 6;
        } elseif ($ngay_hien_tai >= strtotime('7-8-' . $nam) && $ngay_hien_tai < strtotime('23-8-' . $nam)) {
            $rt = 'Lập thu ( Bước vào mùa thu )';
            $id = 7;
        } elseif ($ngay_hien_tai >= strtotime('23-8-' . $nam) && $ngay_hien_tai < strtotime('8-9-' . $nam)) {
            $rt = 'Xử thử ( Mưa ngâu )';
            $id = 7;
        } elseif ($ngay_hien_tai >= strtotime('8-9-' . $nam) && $ngay_hien_tai < strtotime('23-9-' . $nam)) {
            $rt = 'Bạch lộ ( Nắng phạt )';
            $id = 8;
        } elseif ($ngay_hien_tai >= strtotime('23-9-' . $nam) && $ngay_hien_tai < strtotime('8-10-' . $nam)) {
            $rt = 'Thu phân ( Giữa thu )';
            //$rt  = 'Hàn lộ ( Mát mẻ )';
            $id = 8;
        } elseif ($ngay_hien_tai >= strtotime('8-10-' . $nam) && $ngay_hien_tai < strtotime('23-10-' . $nam)) {
            $rt = 'Hàn lộ ( Mát mẻ )';
            //$rt  = 'Sương giáng (Sương mù bắt đầu xuất hiện)';
            $id = 9;
        } elseif ($ngay_hien_tai >= strtotime('23-10-' . $nam) && $ngay_hien_tai < strtotime('7-11-' . $nam)) {
            $rt = 'Sương giáng (Sương mù bắt đầu xuất hiện)';
            //$rt  = 'Lập đông (Bước vào mùa đông)';
            $id = 9;
        } elseif ($ngay_hien_tai >= strtotime('7-11-' . $nam) && $ngay_hien_tai < strtotime('22-11-' . $nam)) {
            $rt = 'Lập đông (Bước vào mùa đông)';
            //$rt  = 'Tiểu tuyết (Tuyết xuất hiện)';
            $id = 10;
        } elseif ($ngay_hien_tai >= strtotime('22-11-' . $nam) && $ngay_hien_tai < strtotime('8-12-' . $nam)) {
            $rt = 'Tiểu tuyết (Tuyết xuất hiện)';

            $id = 10;
        } elseif ($ngay_hien_tai >= strtotime('7-12-' . $nam) && $ngay_hien_tai < strtotime('22-12-' . $nam)) {
            $rt = 'Đại tuyết (Tuyết dày)';
            $id = 11;
        } elseif ($ngay_hien_tai >= strtotime('22-12-' . $nam) && $ngay_hien_tai < strtotime('6-1-' . $nam1)) {
            $rt = 'Đông chí (Giữa đông)';
            $id = 11;
        } elseif ($ngay_hien_tai >= strtotime('6-1-' . $nam1) && $ngay_hien_tai < strtotime('21-1-' . $nam1)) {
            $rt = 'Tiểu hàn(Rét nhẹ)';
            $id = 12;
        } else {
            $rt = 'Đại hàn(Rét đậm)';
            $id = 12;
        }
        $tietkhi = array($id, $rt);
        $this->tinh_tietkhi = $tietkhi;
        return $this->tinh_tietkhi;
    }

    public function xacdinh_trucngay($input, $tietkhi)
    {
        $chingay = ($input['chingay']);
        $giatri_tietkhi = $tietkhi[0];
        $key = $giatri_tietkhi . ',' . get_chi_menh($chingay);
        $number = $this->xd_trucngay[$key];
        return $this->mang_trucngay[$number];
    }

    public function tinh_xuathanh_lythuanphong()
    {
    }
}    
