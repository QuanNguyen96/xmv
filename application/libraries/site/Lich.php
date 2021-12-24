<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lich extends CI_Controller
{
    private $_thu;
    private $_songay;
    private $_ngayduong;
    private $_thangduong;
    private $_namduong;
    private $_ngayam;
    private $_thangam;
    private $_namam;
    private $_ngaycan = array();
    private $_ngaychi = array();
    private $_thangcan = array();
    private $_thangchi = array();
    private $_namcan = array();
    private $_namchi = array();
    private $_dao_hoang_hac;
    private $_truc;
    private $_giotot;
    private $_gioxau;
    private $can = array
    (
        '1' => 'Giáp',
        '2' => 'Ất',
        '3' => 'Bính',
        '4' => 'Đinh',
        '5' => 'Mậu',
        '6' => 'Kỷ',
        '7' => 'Canh',
        '8' => 'Tân',
        '9' => 'Nhâm',
        '10' => 'Quý'
    );
    private $chi = array
    (
        '1' => 'Tý',
        '2' => 'Sửu',
        '3' => 'Dần',
        '4' => 'Mão',
        '5' => 'Thìn',
        '6' => 'Tỵ',
        '7' => 'Ngọ',
        '8' => 'Mùi',
        '9' => 'Thân',
        '10' => 'Dậu',
        '11' => 'Tuất',
        '12' => 'Hợi'
    );
    private $can_slug = array
    (
        '1' => 'giap',
        '2' => 'at',
        '3' => 'binh',
        '4' => 'dinh',
        '5' => 'mau',
        '6' => 'ky',
        '7' => 'canh',
        '8' => 'tan',
        '9' => 'nham',
        '10' => 'quy'
    );
    private $chi_slug = array
    (
        '1' => 'ty',
        '2' => 'suu',
        '3' => 'dan',
        '4' => 'mao',
        '5' => 'thin',
        '6' => 'ty',
        '7' => 'ngo',
        '8' => 'mui',
        '9' => 'than',
        '10' => 'dau',
        '11' => 'tuat',
        '12' => 'hoi'
    );
    private $ngayhoangdao = array
    (
        '1,1' => '1',
        '1,2' => '2',
        '1,3' => '3',
        '1,4' => '4',
        '1,5' => '5',
        '1,6' => '6',
        '1,7' => '7',
        '1,8' => '8',
        '1,9' => '9',
        '1,10' => '10',
        '1,11' => '11',
        '1,12' => '12',
        '2,1' => '11',
        '2,2' => '12',
        '2,3' => '1',
        '2,4' => '2',
        '2,5' => '3',
        '2,6' => '4',
        '2,7' => '5',
        '2,8' => '6',
        '2,9' => '7',
        '2,10' => '8',
        '2,11' => '9',
        '2,12' => '10',
        '3,1' => '9',
        '3,2' => '10',
        '3,3' => '11',
        '3,4' => '12',
        '3,5' => '1',
        '3,6' => '2',
        '3,7' => '3',
        '3,8' => '4',
        '3,9' => '5',
        '3,10' => '6',
        '3,11' => '7',
        '3,12' => '8',
        '4,1' => '7',
        '4,2' => '8',
        '4,3' => '9',
        '4,4' => '10',
        '4,5' => '11',
        '4,6' => '12',
        '4,7' => '1',
        '4,8' => '2',
        '4,9' => '3',
        '4,10' => '4',
        '4,11' => '5',
        '4,12' => '6',
        '5,1' => '5',
        '5,2' => '6',
        '5,3' => '7',
        '5,4' => '8',
        '5,5' => '9',
        '5,6' => '10',
        '5,7' => '11',
        '5,8' => '12',
        '5,9' => '1',
        '5,10' => '2',
        '5,11' => '3',
        '5,12' => '4',
        '6,1' => '3',
        '6,2' => '4',
        '6,3' => '5',
        '6,4' => '6',
        '6,5' => '7',
        '6,6' => '8',
        '6,7' => '9',
        '6,8' => '10',
        '6,9' => '11',
        '6,10' => '12',
        '6,11' => '1',
        '6,12' => '2',
        '7,1' => '1',
        '7,2' => '2',
        '7,3' => '3',
        '7,4' => '4',
        '7,5' => '5',
        '7,6' => '6',
        '7,7' => '7',
        '7,8' => '8',
        '7,9' => '9',
        '7,10' => '10',
        '7,11' => '11',
        '7,12' => '12',
        '8,1' => '11',
        '8,2' => '12',
        '8,3' => '1',
        '8,4' => '2',
        '8,5' => '3',
        '8,6' => '4',
        '8,7' => '5',
        '8,8' => '6',
        '8,9' => '7',
        '8,10' => '8',
        '8,11' => '9',
        '8,12' => '10',
        '9,1' => '9',
        '9,2' => '10',
        '9,3' => '11',
        '9,4' => '12',
        '9,5' => '1',
        '9,6' => '2',
        '9,7' => '3',
        '9,8' => '4',
        '9,9' => '5',
        '9,10' => '6',
        '9,11' => '7',
        '9,12' => '8',
        '10,1' => '7',
        '10,2' => '8',
        '10,3' => '9',
        '10,4' => '10',
        '10,5' => '11',
        '10,6' => '12',
        '10,7' => '1',
        '10,8' => '2',
        '10,9' => '3',
        '10,10' => '4',
        '10,11' => '5',
        '10,12' => '6',
        '11,1' => '5',
        '11,2' => '6',
        '11,3' => '7',
        '11,4' => '8',
        '11,5' => '9',
        '11,6' => '10',
        '11,7' => '11',
        '11,8' => '12',
        '11,9' => '1',
        '11,10' => '2',
        '11,11' => '3',
        '11,12' => '4',
        '12,1' => '3',
        '12,2' => '4',
        '12,3' => '5',
        '12,4' => '6',
        '12,5' => '7',
        '12,6' => '8',
        '12,7' => '9',
        '12,8' => '10',
        '12,9' => '11',
        '12,10' => '12',
        '12,11' => '1',
        '12,12' => '2',
    );
    private $ngayhoangdao_ynghia = array
    (
        '1' => 'thanh long hoàng đạo',
        '2' => 'minh đường hoàng đạo',
        '3' => 'thiên hình hắc đạo',
        '4' => 'chu tước hắc đạo',
        '5' => 'kim quỹ hoàng đạo',
        '6' => 'kim đường hoàng đạo',
        '7' => 'bạch hổ hắc đạo',
        '8' => 'ngọc đường hoàng đạo',
        '9' => 'thiên lao hắc đạo',
        '10' => 'nguyên vu hắc đạo',
        '11' => 'tư mệnh hoàng đạo',
        '12' => 'câu trần hắc đạo',
    );
    private $nguhanh = array
    (
        '1,1' => '1',
        '2,2' => '1',
        '3,3' => '2',
        '4,4' => '2',
        '5,5' => '3',
        '6,6' => '3',
        '7,7' => '4',
        '8,8' => '4',
        '9,9' => '5',
        '10,10' => '5',
        '1,11' => '6',
        '2,12' => '6',
        '3,1' => '7',
        '4,2' => '7',
        '5,3' => '8',
        '6,4' => '8',
        '7,5' => '9',
        '8,6' => '9',
        '9,7' => '10',
        '10,8' => '10',
        '1,9' => '11',
        '2,10' => '11',
        '3,11' => '12',
        '4,12' => '12',
        '5,1' => '13',
        '6,2' => '13',
        '7,3' => '14',
        '8,4' => '14',
        '9,5' => '15',
        '10,6' => '15',
        '1,7' => '16',
        '2,8' => '16',
        '3,9' => '17',
        '4,10' => '17',
        '5,11' => '18',
        '6,12' => '18',
        '7,1' => '19',
        '8,2' => '19',
        '9,3' => '20',
        '10,4' => '20',
        '1,5' => '21',
        '2,6' => '21',
        '3,7' => '22',
        '4,8' => '22',
        '5,9' => '23',
        '6,10' => '23',
        '7,11' => '24',
        '8,12' => '24',
        '9,1' => '25',
        '10,2' => '25',
        '1,3' => '26',
        '2,4' => '26',
        '3,5' => '27',
        '4,6' => '27',
        '5,7' => '28',
        '6,8' => '28',
        '7,9' => '29',
        '8,10' => '29',
        '9,11' => '30',
        '10,12' => '30',
    );
    private $nguhanh_text = array
    (
        '1' => 'Hải trung kim',
        '2' => 'Lư trung hỏa',
        '3' => 'Đại lâm mộc',
        '4' => 'Lộ bàng thổ',
        '5' => 'Kiếm phong kim',
        '6' => 'Sơn hạ hỏa',
        '7' => 'Giản hạ thủy',
        '8' => 'Thành đầu thổ',
        '9' => 'Bạch lạp kim',
        '10' => 'Dương liễu mộc',
        '11' => 'Tuyền trung thủy',
        '12' => 'Ôc thượng thổ',
        '13' => 'Tích lịch hỏa',
        '14' => 'Tùng bách mộc',
        '15' => 'Trường lưu thủy',
        '16' => 'Sa trung kim',
        '17' => 'Sơn hạ hỏa',
        '18' => 'Bình địa mộc',
        '19' => 'Bích thượng thổ',
        '20' => 'Kim bạch kim',
        '21' => 'Phúc đăng hỏa',
        '22' => 'Thiên hà thủy',
        '23' => 'Đại dịch thổ',
        '24' => 'Thoa xuyến kim',
        '25' => 'Tang đố mộc',
        '26' => 'Đại khê thủy',
        '27' => 'Sa trung thổ',
        '28' => 'Thiên thượng hỏa',
        '29' => 'Thạch lưu mộc',
        '30' => 'Đại hải thủy',
    );
    private $trucngay = array
    (
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
    private $trucngay_ynghia = array
    (
        1 => array(
            'ten' => 'TRỰC KIẾN',
            'tot' => 'Xuất hành đặng lợi, sinh con rất tốt.',
            'xau' => 'Động đất ban nền, đắp nền, lót giường, vẽ họa chụp ảnh, lên quan nhậm chức, nạp lễ cầu thân, vào làm hành chánh, dâng nộp đơn từ, mở kho vựa'
        ),
        2 => array(
            'ten' => 'TRỰC TRỪ',
            'tot' => 'Động đất, ban nền đắp nền, thờ cúng Táo Thần, cầu thầy chữa bệnh bằng cách mổ xẻ hay châm cứu, bốc thuốc, xả tang, khởi công làm lò nhuộm lò gốm, nữ nhân khởi đầu uống thuốc chữa bệnh.',
            'xau' => 'Đẻ con nhằm ngày này khó nuôi, nên làm Âm Đức cho con, nam nhân kỵ khởi đầu uống thuốc.'
        ),
        3 => array(
            'ten' => 'TRỰC MÃN',
            'tot' => 'Xuất hành, đi đường thủy, cho vay, thu nợ, mua hàng, bán hàng, nhập kho, đặt táng, kê gác, sửa chữa, lắp đặt máy, thuê thêm người, vào học kỹ nghệ, làm chuồng gà ngỗng vịt.',
            'xau' => 'Lên quan lĩnh chức, uống thuốc, vào làm hành chính, dâng nộp đơn từ.'
        ),
        4 => array(
            'ten' => 'TRỰC BÌNH',
            'tot' => 'Nhập vào kho, đặt táng, gắn cửa, kê gác, đặt yên chỗ máy, sửa chữa làm tàu, khai trương tàu thuyền, các việc bồi đắp thêm ( như bồi bùn, đắp đất, lót đá, xây bờ kè.) ',
            'xau' => 'Lót giường đóng giường, thừa kế tước phong hay thừa kế sự nghiệp, các vụ làm cho khuyết thủng ( như đào mương, móc giếng, xả nước.)'
        ),
        5 => array(
            'ten' => 'TRỰC ĐỊNH',
            'tot' => 'Động thổ, san nền, đắp nền, làm hay sửa phòng Bếp, lắp đặt máy móc, nhập học, làm lễ cầu thân, nộp đơn dâng sớ, sửa hay làm tàu thuyền, khai trương tàu thuyền, khởi công làm lò.',
            'xau' => 'Mua nuôi thêm súc vật.'
        ),
        6 => array(
            'ten' => 'TRỰC CHẤP',
            'tot' => 'Lập khế ước, giao dịch, động thổ san nền, cầu thầy chữa bệnh, đi săn thú cá, tìm bắt trộm cướp.',
            'xau' => 'Xây đắp nền-tường'
        ),
        7 => array(
            'ten' => 'TRỰC PHÁ',
            'tot' => 'Bốc thuốc, uống thuốc, chữa bệnh.',
            'xau' => 'Lót giường đóng giường, cho vay, động thổ, san nền đắp nền, vẽ họa chụp ảnh, lên quan nhậm chức, thừa kế chức tước hay sự nghiệp, nhập học, học kỹ nghệ, làm lễ cầu thân, vào làm hành chính, nộp đơn dâng sớ'
        ),
        8 => array(
            'ten' => 'TRỰC NGUY',
            'tot' => 'Lót giường đóng giường, đi săn thú cá, khởi công làm lò nhuộm lò gốm.',
            'xau' => 'Xuất hành đường thủy.'
        ),
        9 => array(
            'ten' => 'TRỰC THÀNH',
            'tot' => 'Lập khế ước, giao dịch, cho vay, thu nợ, mua hàng, bán hàng, xuất hành, đi tàu thuyền, khởi tạo, động Thổ, san nền đắp nền, gắn cửa, đặt táng, kê gác, dựng xây kho vựa, làm hay sửa chữa phòng Bếp, thờ phụng Táo Thần, lắp đặt máy móc ( hay các loại máy ), gặt lúa, đào ao giếng, tháo nước, cầu thầy chữa bệnh, mua gia súc, các việc trong vụ chăn nuôi, nhập học, làm lễ cầu thân, cưới gã, kết hôn, thuê người, nộp đơn dâng sớ, học kỹ nghệ, làm hoặc sửa tàu thuyền, khai trương tàu thuyền, vẽ tranh, tu sửa cây cối.',
            'xau' => 'Kiện tụng, tranh chấp.'
        ),
        10 => array(
            'ten' => 'TRỰC THÂU',
            'tot' => 'Cấy lúa gặt lúa, mua trâu, nuôi tằm, đi săn thú cá, tu sửa cây cối',
            'xau' => 'Động thổ, san nền đắp nền, nữ nhân khởi ngày uống thuốc chưa bệnh, lên quan lãnh chức, thừa kế chức tước hay sự nghiệp, vào làm hành chính, nộp đơn dâng sớ, mưu sự khuất tất.'
        ),
        11 => array(
            'ten' => 'TRỰC KHAI',
            'tot' => 'Xuất hành, đi tàu thuyền, khởi tạo, động thổ, san nền đắp nền, dựng xây kho vựa, làm hay sửa phòng Bếp, thờ cúng Táo Thần, đóng giường lót giường, may áo, lắp đặt cỗ máy dệt hay các loại máy, cấy lúa gặt lúa, đào ao giếng, tháo nước, các việc trong vụ chăn nuôi, mở thông hào rãnh, cầu thầy chữa bệnh, bốc thuốc, uống thuốc, mua trâu, làm rượu, nhập học, học kỹ nghệ, vẽ tranh, tu sửa cây cối.',
            'xau' => 'Chôn cất.'
        ),
        12 => array(
            'ten' => 'TRỰC BẾ',
            'tot' => 'Xây đắp tường, đặt táng, gắn cửa, kê gác, làm cầu. khởi công lò nhuộm lò gốm, uống thuốc, trị bệnh ( nhưng chớ trị bệnh mắt ), tu sửa cây cối.',
            'xau' => 'Lên quan nhận chức, thừa kế chức tước hay sự nghiệp, nhập học, chữa bệnh mắt, các việc trong vụ chăn nuôi'
        ),
    );
    private $giohoangdao = array
    (
        '3,1' => '1',
        '3,2' => '1',
        '3,3' => '2',
        '3,4' => '2',
        '3,5' => '1',
        '3,6' => '1',
        '3,7' => '2',
        '3,8' => '1',
        '3,9' => '2',
        '3,10' => '2',
        '3,11' => '1',
        '3,12' => '2',
        '4,1' => '1',
        '4,2' => '2',
        '4,3' => '1',
        '4,4' => '1',
        '4,5' => '2',
        '4,6' => '2',
        '4,7' => '1',
        '4,8' => '1',
        '4,9' => '2',
        '4,10' => '1',
        '4,11' => '2',
        '4,12' => '2',
        '5,1' => '2',
        '5,2' => '2',
        '5,3' => '1',
        '5,4' => '2',
        '5,5' => '1',
        '5,6' => '1',
        '5,7' => '2',
        '5,8' => '2',
        '5,9' => '1',
        '5,10' => '1',
        '5,11' => '2',
        '5,12' => '1',
        '6,1' => '2',
        '6,2' => '1',
        '6,3' => '2',
        '6,4' => '2',
        '6,5' => '1',
        '6,6' => '2',
        '6,7' => '1',
        '6,8' => '1',
        '6,9' => '2',
        '6,10' => '2',
        '6,11' => '1',
        '6,12' => '1',
        '7,1' => '1',
        '7,2' => '1',
        '7,3' => '2',
        '7,4' => '1',
        '7,5' => '2',
        '7,6' => '2',
        '7,7' => '1',
        '7,8' => '2',
        '7,9' => '1',
        '7,10' => '1',
        '7,11' => '2',
        '7,12' => '2',
        '8,1' => '2',
        '8,2' => '2',
        '8,3' => '1',
        '8,4' => '1',
        '8,5' => '2',
        '8,6' => '1',
        '8,7' => '2',
        '8,8' => '2',
        '8,9' => '1',
        '8,10' => '2',
        '8,11' => '1',
        '8,12' => '1',
        '9,1' => '1',
        '9,2' => '1',
        '9,3' => '2',
        '9,4' => '2',
        '9,5' => '1',
        '9,6' => '1',
        '9,7' => '2',
        '9,8' => '1',
        '9,9' => '2',
        '9,10' => '2',
        '9,11' => '1',
        '9,12' => '2',
        '10,1' => '1',
        '10,2' => '2',
        '10,3' => '1',
        '10,4' => '1',
        '10,5' => '2',
        '10,6' => '2',
        '10,7' => '1',
        '10,8' => '1',
        '10,9' => '2',
        '10,10' => '1',
        '10,11' => '2',
        '10,12' => '2',
        '11,1' => '2',
        '11,2' => '2',
        '11,3' => '1',
        '11,4' => '2',
        '11,5' => '1',
        '11,6' => '1',
        '11,7' => '2',
        '11,8' => '2',
        '11,9' => '1',
        '11,10' => '1',
        '11,11' => '2',
        '11,12' => '1',
        '12,1' => '2',
        '12,2' => '1',
        '12,3' => '2',
        '12,4' => '2',
        '12,5' => '1',
        '12,6' => '2',
        '12,7' => '1',
        '12,8' => '1',
        '12,9' => '2',
        '12,10' => '2',
        '12,11' => '1',
        '12,12' => '1',
        '1,1' => '1',
        '1,2' => '1',
        '1,3' => '2',
        '1,4' => '1',
        '1,5' => '2',
        '1,6' => '2',
        '1,7' => '1',
        '1,8' => '2',
        '1,9' => '1',
        '1,10' => '1',
        '1,11' => '2',
        '1,12' => '2',
        '2,1' => '2',
        '2,2' => '2',
        '2,3' => '1',
        '2,4' => '1',
        '2,5' => '2',
        '2,6' => '1',
        '2,7' => '2',
        '2,8' => '2',
        '2,9' => '1',
        '2,10' => '2',
        '2,11' => '1',
        '2,12' => '1',
    );
    private $giohoangdao_text = array
    (
        '1' => '<span>Tí</span> (23h - 01h)',
        '2' => '<span>Sửu</span> (01h - 03h)',
        '3' => '<span>Dần</span> (03h - 05h)',
        '4' => '<span>Mão</span> (05h - 07h)',
        '5' => '<span>Thìn</span> (07h - 09h)',
        '6' => '<span>Tỵ</span> (09h - 11h)',
        '7' => '<span>Ngọ</span> (11h - 13h)',
        '8' => '<span>Mùi</span> (13h - 15h)',
        '9' => '<span>Thân</span> (15h - 17h)',
        '10' => '<span>Dậu</span> (17h - 19h)',
        '11' => '<span>Tuất</span> (19h - 21h)',
        '12' => '<span>Hợi</span> (21h - 23h)',
    );

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library(array('site/lich'));
    }

    public function set_ngayduong($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            $strdate = date('j-n-Y', time());
            $arrdate = explode('-', $strdate);
            $this->_ngayduong = $arrdate[0];
            $this->_thangduong = $arrdate[1];
            $this->_namduong = $arrdate[2];
        } else {
            $this->_ngayduong = $ngay;
            $this->_thangduong = $thang;
            $this->_namduong = $nam;
        }
        $this->set_ngayam();
        $this->set_songay();
    }

    private function set_ngayam()
    {
        $amlich = $this->CI->lich->convertSolar2Lunar($this->_ngayduong, $this->_thangduong, $this->_namduong, 7.0);
        $this->_ngayam = $amlich[0];
        $this->_thangam = $amlich[1];
        $this->_namam = $amlich[2];
        $this->set_ngaycanchi();
        $this->set_thangcanchi();
        $this->set_namcanchi();
    }

    private function set_ngaycanchi()
    {
        $n = $this->getN($this->_ngayduong, $this->_thangduong, $this->_namduong);
        $songay = $this->songay($this->_ngayduong, $this->_thangduong, $this->_namduong);
        $t1 = ($this->_namduong - 1) * 365.25 + $songay - $n;
        $t2 = (int)($t1 / 60);
        $t = $t1 - $t2 * 60;
        $chi = $t % 12;
        if ($chi == 0) {
            $chi = 12;
        }
        $this->_ngaychi = array('number' => $chi, 'text' => $this->chi[$chi]);
        $can = $t % 10;
        if ($can == 0) {
            $can = 10;
        }
        $this->_ngaycan = array('number' => $can, 'text' => $this->can[$can]);
    }

    private function set_thangcanchi()
    {
        $number = substr($this->_namam, 3);
        if ($number == 1 || $number == 6) {
            $can = 7;
        }
        if ($number == 2 || $number == 7) {
            $can = 9;
        }
        if ($number == 3 || $number == 8) {
            $can = 1;
        }
        if ($number == 4 || $number == 9) {
            $can = 3;
        }
        if ($number == 5 || $number == 0) {
            $can = 5;
        }
        $m = ($can + $this->_thangam - 1) % 10;
        if ($m == 0) {
            $m = 10;
        }
        $can = $m;
        $chi = $this->_thangam >= 11 ? $this->_thangam - 10 : $this->_thangam + 2;
        $this->_thangcan = array('number' => $can, 'text' => $this->can[$can]);
        $this->_thangchi = array('number' => $chi, 'text' => $this->chi[$chi]);
    }

    private function set_namcanchi()
    {
        $t = (int)substr($this->_namam, 3);
        $t = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);
        $can = $t;
        $t = $this->_namam % 12;
        $t = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);
        $chi = $t;
        $this->_namcan = array('number' => $can, 'text' => $this->can[$can]);
        $this->_namchi = array('number' => $chi, 'text' => $this->chi[$chi]);
    }

    private function set_songay()
    {
        $time = strtotime($this->_thangduong . '/' . $this->_ngayduong . '/' . $this->_namduong);
        $this->_songay = date('t', $time);
    }

    public function get_ngayduong()
    {
        return $this->_ngayduong;
    }

    public function get_thangduong()
    {
        return $this->_thangduong;
    }

    public function get_namduong()
    {
        return $this->_namduong;
    }

    public function get_ngayam()
    {
        return $this->_ngayam;
    }

    public function get_thangam()
    {
        return $this->_thangam;
    }

    public function get_namam()
    {
        return $this->_namam;
    }

    public function get_songay()
    {
        return $this->_songay;
    }

    public function get_ngaycan($number = false)
    {
        if ($number) {
            return $this->_ngaycan['number'];
        } else {
            return $this->_ngaycan['text'];
        }
    }

    public function get_ngaychi($number = false)
    {
        if ($number) {
            return $this->_ngaychi['number'];
        } else {
            return $this->_ngaychi['text'];
        }
    }

    public function get_thangcan($number = false)
    {
        if ($number) {
            return $this->_thangcan['number'];
        } else {
            return $this->_thangcan['text'];
        }
    }

    public function get_thangchi($number = false)
    {
        if ($number) {
            return $this->_thangchi['number'];
        } else {
            return $this->_thangchi['text'];
        }
    }

    public function get_namcan($number = false)
    {
        if ($number) {
            return $this->_namcan['number'];
        } else {
            return $this->_namcan['text'];
        }
    }

    public function get_namchi($number = false)
    {
        if ($number) {
            return $this->_namchi['number'];
        } else {
            return $this->_namchi['text'];
        }
    }

    public function get_nam_can_slug()
    {
        return $this->can_slug[$this->_namcan['number']];
    }

    public function get_nam_chi_slug()
    {
        return $this->chi_slug[$this->_namchi['number']];
    }

    public function get_thu($number = null)
    {
        $weekday = date("l", mktime(0, 0, 0, $this->_thangduong, $this->_ngayduong, $this->_namduong));
        $weekday = strtolower($weekday);
        switch ($weekday) {
            case 'monday':
                if ($number) {
                    $weekday = 2;
                } else {
                    $weekday = 'Thứ hai';
                }
                break;
            case 'tuesday':
                if ($number) {
                    $weekday = 3;
                } else {
                    $weekday = 'Thứ ba';
                }
                break;
            case 'wednesday':
                if ($number) {
                    $weekday = 4;
                } else {
                    $weekday = 'Thứ tư';
                }
                break;
            case 'thursday':
                if ($number) {
                    $weekday = 5;
                } else {
                    $weekday = 'Thứ năm';
                }
                break;
            case 'friday':
                if ($number) {
                    $weekday = 6;
                } else {
                    $weekday = 'Thứ sáu';
                }
                break;
            case 'saturday':
                if ($number) {
                    $weekday = 7;
                } else {
                    $weekday = 'Thứ bảy';
                }
                break;
            default:
                if ($number) {
                    $weekday = 8;
                } else {
                    $weekday = 'Chủ nhật';
                }
                break;
        }
        return $weekday;
    }

    public function get_ngayhoangdao($ynghia = false)
    {
        $rt = '';
        $key = $this->_thangam . ',' . $this->_ngaychi['number'];
        if (isset($this->ngayhoangdao[$key])) {
            $key = $this->ngayhoangdao[$key];
            if (in_array($key, array(1, 2, 5, 6, 8, 11))) {
                $rt = 'Hoàng đạo';
            } else {
                $rt = 'Hắc đạo';
            }
            if ($ynghia) {
                $rt['ngay'] = $rt;
                $rt['ynghia'] = $this->ngayhoangdao_ynghia[$key];
            }
        }
        return $rt;
    }

    public function get_tietkhi($text = false)
    {
        $ngay_hien_tai = strtotime($this->_ngayduong . '-' . $this->_thangduong . '-' . $this->_namduong);
        $nam = $this->_namduong;
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
        if ($text) {
            return $rt;
        } else {
            return $id;
        }
    }

    public function get_nguhanh($number = false)
    {
        $arr_nguhanh = array(1 => 'Kim', 2 => 'Mộc', 3 => 'Thủy', 4 => 'Hỏa', 5 => 'Thổ');
        $key = $this->_ngaycan['number'] . ',' . $this->_ngaychi['number'];
        $nguhanh = $this->nguhanh[$key];
        if ($number) {
            return $nguhanh;
        } else {
            return $this->nguhanh_text[$nguhanh];
        }
    }

    public function get_trucngay($number = false)
    {
        $tietkhi = $this->get_tietkhi();
        $key = $tietkhi . ',' . $this->_ngaychi['number'];
        $tn = $this->trucngay[$key];
        if ($number) {
            return $tn;
        } else {
            return $this->trucngay_ynghia[$tn];
        }
    }

    public function get_giohoangdao()
    {
        $rt = array();
        for ($i = 1; $i <= 12; $i++) {
            $key = $this->_ngaychi['number'] . ',' . $i;
            if (isset($this->giohoangdao[$key])) {
                if ($this->giohoangdao[$key] == 1) {
                    $rt['hoangdao'][] = $this->giohoangdao_text[$i];
                } else {
                    $rt['hacdao'][] = $this->giohoangdao_text[$i];
                }
            }
        }
        return $rt;
    }

    public function get_ngaythangnamtiep()
    {
        $ngayhientai = $this->_thangduong . '/' . $this->_ngayduong . '/' . $this->_namduong;
        $time = strtotime($ngayhientai) + 86400;
        $next = date('j/n/Y', $time);
        return explode('/', $next);
    }

    public function get_thangnamtiep()
    {
        $ngayhientai = $this->_thangduong . '/' . $this->_ngayduong . '/' . $this->_namduong;
        $time = strtotime($ngayhientai . "+1 month");
        $next = date('j/n/Y', $time);
        return explode('/', $next);
    }

    public function get_ngaythangnamtruoc()
    {
        $ngayhientai = $this->_thangduong . '/' . $this->_ngayduong . '/' . $this->_namduong;
        $time = strtotime($ngayhientai) - 86400;
        $prev = date('j/n/Y', $time);
        return explode('/', $prev);
    }

    public function get_thangnamtruoc()
    {
        $ngayhientai = $this->_thangduong . '/' . $this->_ngayduong . '/' . $this->_namduong;
        $time = strtotime($ngayhientai . "-1 month");
        $prev = date('j/n/Y', $time);
        return explode('/', $prev);
    }

    /**
     * Tra ve thu trong tuan ( vi du: thu2, thu 3,..)
     * $duonglich = array( 'ngay', 'thang', 'nam' );
     **/

    public function get_ngaythu($duonglich = array(), $number = false)
    {
        $weekday = date("l", mktime(0, 0, 0, $duonglich[1], $duonglich[0], $duonglich[2]));

        $weekday = strtolower($weekday);

        switch ($weekday) {
            case 'monday':

                if ($number) {
                    $weekday = 2;
                } else {
                    $weekday = 'Thứ hai';
                }

                break;

            case 'tuesday':

                if ($number) {
                    $weekday = 3;
                } else {
                    $weekday = 'Thứ ba';
                }

                break;

            case 'wednesday':

                if ($number) {
                    $weekday = 4;
                } else {
                    $weekday = 'Thứ tư';
                }

                break;

            case 'thursday':

                if ($number) {
                    $weekday = 5;
                } else {
                    $weekday = 'Thứ năm';
                }

                break;

            case 'friday':

                if ($number) {
                    $weekday = 6;
                } else {
                    $weekday = 'Thứ sáu';
                }

                break;

            case 'saturday':

                if ($number) {
                    $weekday = 7;
                } else {
                    $weekday = 'Thứ bảy';
                }

                break;

            default:

                if ($number) {
                    $weekday = 8;
                } else {
                    $weekday = 'Chủ nhật';
                }

                break;
        }

        return $weekday;
    }

    private function INT($d)
    {
        return floor($d);
    }

    private function jdFromDate($dd, $mm, $yy)
    {
        $a = $this->INT((14 - $mm) / 12);
        $y = $yy + 4800 - $a;
        $m = $mm + 12 * $a - 3;
        $jd = $dd + $this->INT((153 * $m + 2) / 5) + 365 * $y + $this->INT($y / 4) - $this->INT($y / 100) + $this->INT($y / 400) - 32045;
        if ($jd < 2299161) {
            $jd = $dd + $this->INT((153 * $m + 2) / 5) + 365 * $y + $this->INT($y / 4) - 32083;
        }
        return $jd;
    }

    private function getN($d, $m, $y)
    {
        if ($y < 1582) {
            $n_3 = 47;
        } else {
            if ($y == 1582) {
                if ($m < 10) {
                    $n_3 = 47;
                } else {
                    return 57;
                }
            } else {
                if ($y > 1582 && $y < 1700) {
                    $n_3 = 57;
                } else {
                    if ($y >= 1700) {
                        $nam_2 = (int)($y / 100);
                        if ($nam_2 % 4 == 0) {
                            $nam_2 = $nam_2 - 1;
                        }
                        $du = $nam_2 - 17;
                        $ng = (int)($du / 4);
                        if ($du == 0) {
                            $n_3 = 58;
                        } else {
                            $n_3 = $du - $ng + 58;
                        }
                        $l = $y % 100;
                        $k = $y % 4;
                        if ($l == 0 && $k == 0 && $m == 2 && $d < 28) {
                            $n_3 = $n_3 - 1;
                        }
                    }
                }
            }
        }
        return $n_3;
    }

    private function songay($d, $m, $y)
    {
        if ($m == 1) {
            return $d;
        }
        $t = 0;
        for ($i = 1; $i < $m; $i++) {
            if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
                $t = $t + 31;
            } elseif ($i == 2) {
                if ($y % 4 == 0) {
                    $t = $t + 29;
                } else {
                    $t = $t + 28;
                }
            } else {
                $t = $t + 30;
            }
        }
        return $t + $d;
    }

    private function jdToDate($jd)
    {
        if ($jd > 2299160) { // After 5/10/1582, Gregorian calendar
            $a = $jd + 32044;
            $b = $this->INT((4 * $a + 3) / 146097);
            $c = $a - $this->INT(($b * 146097) / 4);
        } else {
            $b = 0;
            $c = $jd + 32082;
        }
        $d = $this->INT((4 * $c + 3) / 1461);
        $e = $c - $this->INT((1461 * $d) / 4);
        $m = $this->INT((5 * $e + 2) / 153);
        $day = $e - $this->INT((153 * $m + 2) / 5) + 1;
        $month = $m + 3 - 12 * $this->INT($m / 10);
        $year = $b * 100 + $d - 4800 + $this->INT($m / 10);
        //echo "day = $day, month = $month, year = $year\n";
        return array($day, $month, $year);
    }

    private function getNewMoonDay($k, $timeZone)
    {
        $T = $k / 1236.85; // Time in Julian centuries from 1900 January 0.5
        $T2 = $T * $T;
        $T3 = $T2 * $T;
        $dr = M_PI / 180;
        $Jd1 = 2415020.75933 + 29.53058868 * $k + 0.0001178 * $T2 - 0.000000155 * $T3;
        $Jd1 = $Jd1 + 0.00033 * sin((166.56 + 132.87 * $T - 0.009173 * $T2) * $dr); // Mean new moon
        $M = 359.2242 + 29.10535608 * $k - 0.0000333 * $T2 - 0.00000347 * $T3; // Sun's mean anomaly
        $Mpr = 306.0253 + 385.81691806 * $k + 0.0107306 * $T2 + 0.00001236 * $T3; // Moon's mean anomaly
        $F = 21.2964 + 390.67050646 * $k - 0.0016528 * $T2 - 0.00000239 * $T3; // Moon's argument of latitude
        $C1 = (0.1734 - 0.000393 * $T) * sin($M * $dr) + 0.0021 * sin(2 * $dr * $M);
        $C1 = $C1 - 0.4068 * sin($Mpr * $dr) + 0.0161 * sin($dr * 2 * $Mpr);
        $C1 = $C1 - 0.0004 * sin($dr * 3 * $Mpr);
        $C1 = $C1 + 0.0104 * sin($dr * 2 * $F) - 0.0051 * sin($dr * ($M + $Mpr));
        $C1 = $C1 - 0.0074 * sin($dr * ($M - $Mpr)) + 0.0004 * sin($dr * (2 * $F + $M));
        $C1 = $C1 - 0.0004 * sin($dr * (2 * $F - $M)) - 0.0006 * sin($dr * (2 * $F + $Mpr));
        $C1 = $C1 + 0.0010 * sin($dr * (2 * $F - $Mpr)) + 0.0005 * sin($dr * (2 * $Mpr + $M));
        if ($T < -11) {
            $deltat = 0.001 + 0.000839 * $T + 0.0002261 * $T2 - 0.00000845 * $T3 - 0.000000081 * $T * $T3;
        } else {
            $deltat = -0.000278 + 0.000265 * $T + 0.000262 * $T2;
        };
        $JdNew = $Jd1 + $C1 - $deltat;
        //echo "JdNew = $JdNew\n";
        return $this->INT($JdNew + 0.5 + $timeZone / 24);
    }

    private function getSunLongitude($jdn, $timeZone)
    {
        $T = ($jdn - 2451545.5 - $timeZone / 24) / 36525; // Time in Julian centuries from 2000-01-01 12:00:00 GMT
        $T2 = $T * $T;
        $dr = M_PI / 180; // degree to radian
        $M = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2; // mean anomaly, degree
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2; // mean longitude, degree
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M);
        $DL = $DL + (0.019993 - 0.000101 * $T) * sin($dr * 2 * $M) + 0.000290 * sin($dr * 3 * $M);
        $L = $L0 + $DL; // true longitude, degree
        //echo "\ndr = $dr, M = $M, T = $T, DL = $DL, L = $L, L0 = $L0\n";
        // obtain apparent longitude by correcting for nutation and aberration
        $omega = 125.04 - 1934.136 * $T;
        @ $L = $L - 0.00569 - 0.00478 * Math . sin($omega * $dr);
        @$L = $L * $dr;
        @$L = $L - M_PI * 2 * ($this->INT($L / (M_PI * 2))); // Normalize to (0, 2*PI)
        return $this->INT($L / M_PI * 6);
    }

    private function getLunarMonth11($yy, $timeZone)
    {
        $off = $this->jdFromDate(31, 12, $yy) - 2415021;
        $k = $this->INT($off / 29.530588853);
        $nm = $this->getNewMoonDay($k, $timeZone);
        $sunLong = $this->getSunLongitude($nm, $timeZone); // sun longitude at local midnight
        if ($sunLong >= 9) {
            $nm = $this->getNewMoonDay($k - 1, $timeZone);
        }
        return $nm;
    }

    private function getLeapMonthOffset($a11, $timeZone)
    {
        $k = $this->INT(($a11 - 2415021.076998695) / 29.530588853 + 0.5);
        $last = 0;
        $i = 1; // We start with the month following lunar month 11
        $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);
        do {
            $last = $arc;
            $i = $i + 1;
            $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);
        } while ($arc != $last && $i < 14);
        return $i - 1;
    }

    private function convertSolar2Lunar($dd, $mm, $yy, $timeZone)
    {
        $dayNumber = $this->jdFromDate($dd, $mm, $yy);
        $k = $this->INT(($dayNumber - 2415021.076998695) / 29.530588853);
        $monthStart = $this->getNewMoonDay($k + 1, $timeZone);
        if ($monthStart > $dayNumber) {
            $monthStart = $this->getNewMoonDay($k, $timeZone);
        }
        $a11 = $this->getLunarMonth11($yy, $timeZone);
        $b11 = $a11;
        if ($a11 >= $monthStart) {
            $lunarYear = $yy;
            $a11 = $this->getLunarMonth11($yy - 1, $timeZone);
        } else {
            $lunarYear = $yy + 1;
            $b11 = $this->getLunarMonth11($yy + 1, $timeZone);
        }
        $lunarDay = $dayNumber - $monthStart + 1;
        $diff = $this->INT(($monthStart - $a11) / 29);
        $lunarLeap = 0;
        $lunarMonth = $diff + 11;
        if ($b11 - $a11 > 365) {
            $leapMonthDiff = $this->getLeapMonthOffset($a11, $timeZone);
            if ($diff >= $leapMonthDiff) {
                $lunarMonth = $diff + 10;
                if ($diff == $leapMonthDiff) {
                    $lunarLeap = 1;
                }
            }
        }
        if ($lunarMonth > 12) {
            $lunarMonth = $lunarMonth - 12;
        }
        if ($lunarMonth >= 11 && $diff < 4) {
            $lunarYear -= 1;
        }
        //return array($lunarDay, $lunarMonth, $lunarYear, $lunarLeap);
        return array($lunarDay, $lunarMonth, $lunarYear);
    }

    private function convertLunar2Solar($lunarDay, $lunarMonth, $lunarYear, $lunarLeap, $timeZone)
    {
        if ($lunarMonth < 11) {
            $a11 = $this->getLunarMonth11($lunarYear - 1, $timeZone);
            $b11 = $this->getLunarMonth11($lunarYear, $timeZone);
        } else {
            $a11 = $this->getLunarMonth11($lunarYear, $timeZone);
            $b11 = $this->getLunarMonth11($lunarYear + 1, $timeZone);
        }
        $k = $this->INT(0.5 + ($a11 - 2415021.076998695) / 29.530588853);
        $off = $lunarMonth - 11;
        if ($off < 0) {
            $off += 12;
        }
        if ($b11 - $a11 > 365) {
            $leapOff = $this->getLeapMonthOffset($a11, $timeZone);
            $leapMonth = $leapOff - 2;
            if ($leapMonth < 0) {
                $leapMonth += 12;
            }
            if ($lunarLeap != 0 && $lunarMonth != $leapMonth) {
                return array(0, 0, 0);
            } else {
                if ($lunarLeap != 0 || $off >= $leapOff) {
                    $off += 1;
                }
            }
        }
        $monthStart = $this->getNewMoonDay($k + $off, $timeZone);
        return $this->jdToDate($monthStart + $lunarDay - 1);
    }
}            
