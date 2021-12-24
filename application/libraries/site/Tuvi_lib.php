<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tuvi_lib{
	public $numberOut	= null;	// mang danh sach cac sao duoc danh so thu tu tu 1 -> 12 theo chieu kim dong ho
	public $numberOutCungmenh	= null;
	public $numberOutSttKhung	= null;
	public $khungSuyraCung	= null;	// mang danh sach tu stt ô sang tên cung hiện tại
	public $xacDinhTamGiac	= null;
	public $xacDinhTuan = null;
	public $xacDinhTriet = null;
	public $keyCung    = null;
	public $namdaihanMin	= 6;
	public $vitriNamdaihanMin	= 0;
	public $saoChinhtinhArr = null;
	public $saoPhutinhArr = null;
	public $get12DinhSaohan = null;
	public $get12DinhSaohanTrecon = null;

	public $tonghopsao = array
                          (
                                  //saochinhtinh
                                  '18' => 'Liêm trinh (M)',
                                  '19' => 'Liêm trinh (V)',
                                  '20' => 'Liêm trinh (Đ)',
                                  '21' => 'Liêm trinh (H)',
                                  '22' => 'Thiên đồng (M)',
                                  '23' => 'Thiên đồng (V)',
                                  '24' => 'Thiên đồng (Đ)',
                                  '25' => 'Thiên đồng (H)',
                                  '26' => 'Vũ khúc (M)',
                                  '27' => 'Vũ khúc (V)',
                                  '28' => 'Vũ khúc (Đ)',
                                  '29' => 'Vũ khúc (H)',
                                  '30' => 'Thái dương (M)',
                                  '31' => 'Thái dương (V)',
                                  '32' => 'Thái dương (Đ)',
                                  '33' => 'Thái dương (H)',
                                  '34' => 'Thiên cơ (M)',
                                  '35' => 'Thiên cơ (V)',
                                  '36' => 'Thiên cơ (Đ)',
                                  '37' => 'Thiên cơ (H)',
                                  '38' => 'Thiên phủ (M)',
                                  '39' => 'Thiên phủ (V)',
                                  '40' => 'Thiên phủ (Đ)',
                                  '41' => 'Thiên phủ (B)',
                                  '42' => 'Thái âm (M)',
                                  '43' => 'Thái âm (V)',
                                  '44' => 'Thái âm (Đ)',
                                  '45' => 'Thái âm (H)',
                                  '46' => 'Tham lang (M)',
                                  '47' => 'Tham lang (V)',
                                  '48' => 'Tham lang (Đ)',
                                  '49' => 'Tham lang (H)',
                                  '50' => 'Cự môn (M)',
                                  '51' => 'Cự môn (V)',
                                  '52' => 'Cự môn (Đ)',
                                  '53' => 'Cự môn (H)',
                                  '54'=> 'Thiên tướng (M)',
                                  '55'=> 'Thiên tướng (V)',
                                  '56'=> 'Thiên tướng (Đ)',
                                  '57'=> 'Thiên tướng (H)',
                                  '58'=> 'Thiên lương (M)',
                                  '59'=> 'Thiên lương (V)',
                                  '60'=> 'Thiên lương (Đ)',
                                  '61'=> 'Thiên lương (H)',
                                  '62'=> 'Thất sát (M)',
                                  '63'=> 'Thất sát (V)',
                                  '64'=> 'Thất sát (Đ)',
                                  '65'=> 'Thất sát (H)',
                                  '66'=> 'Phá quân (M)',
                                  '67'=> 'Phá quân (V)',
                                  '68'=> 'Phá quân (Đ)',
                                  '69'=> 'Phá quân (H)',
                                  '70'=> 'Tử vi (M)',
                                  '71'=> 'Tử vi (V)',
                                  '72'=> 'Tử vi (Đ)',
                                  '73'=> 'Tử vi (BH)',
                                  //saotheogiosing
                                  '74' =>'Văn xương',
                                  '75' =>'Văn khúc', 
                                  '76' =>'Thai phụ', 
                                  '77' =>'Phong cáo', 
                                  '78' =>'Địa không', 
                                  '79' =>'Địa kiếp',
                                  //saotheothangsinh
                                  '80'=>'Hữu bật',  
                                  '81'=>'Tả phù',
                                  '82'=>'Thiên giải',
                                  '83'=>'Thiên y',
                                  '84'=>'Thiên riêu',
                                  '85'=>'Thiên hình',
                                  '86'=>'Địa giải',
                                  //saotheocanvacung
                                  '87'=>'Đà la',
                                  '88'=>'Lộc tồn',
                                  '89'=>'Kình dương',
                                  '90'=>'Quốc ấn',
                                  '91'=>'Đường phù',
                                  '92'=>'LN văn tinh',
                                  '93'=>'Thiên khôi',
                                  '94'=>'Thiên việt',
                                  '95'=>'Thiên quan',
                                  '96'=>'Thiên phúc',
                                  '97'=>'Lưu hà',
                                  '98'=>'Thiên trù',
                                  '99'=>'Triệt',
                                  //saotheochivacung
                                  '100'=>'Thiên mã',
                                  '101'=>'Hoa cái',
                                  '102'=>'Kiếp sát',
                                  '103'=>'Đào hoa',
                                  '104'=>'Phá toái',
                                  '105'=>'Cô thần',
                                  '106'=>'Quả tú',
                                  '107'=>'Thiên không',
                                  '108'=>'Thiên khốc',
                                  '109'=>'Thiên hư',
                                  '110'=>'Thiên đức',
                                  '111'=>'Nguyệt đức',
                                  '112'=>'Hồng loan',
                                  '113'=>'Thiên hỷ',
                                  '114'=>'Long trì',
                                  '115'=>'Phượng các',
                                  '116'=>'Giải thần',
                                  //saohoa
                                  '117'=>'Hóa lộc',
                                  '118'=>'Hóa quyền',
                                  '119'=>'Hóa khoa',
                                  '120'=>'Hóa kỵ',
                                  //saothaitue
                                  '121'=>'Thái tuế',
                                  '122'=>'Thiếu dương',
                                  '123'=>'Tang môn',
                                  '124'=>'Thiếu âm',
                                  '125'=>'Quan phù',
                                  '126'=>'Tử phù',
                                  '127'=>'Tuế phá',
                                  '128'=>'Long  đức',
                                  '129'=>'Bạch hổ',
                                  '130'=>'Phúc đức',
                                  '131'=>'Điếu khách',
                                  '132'=>'Trực phù',
                                  //saotheolocton
                                  '133'=>'Bác sỹ', 
                                  '134'=>'Lực sỹ', 
                                  '135'=>'Thanh long', 
                                  '136'=>'Tiểu Hao', 
                                  '137'=>'Tướng quân', 
                                  '138'=>'Tấu thư', 
                                  '139'=>'Phi liêm', 
                                  '140'=>'Hỷ thần', 
                                  '141'=>'Bệnh phù', 
                                  '142'=>'Đại hao', 
                                  '143'=>'Phục binh', 
                                  '144'=>'Quan phủ',
                                  //saotheotruongsinh
                                  '145'=>'Trường sinh', 
                                  '146'=>'Mộc dục', 
                                  '147'=>'Quan đới', 
                                  '148'=>'Lâm quan', 
                                  '149'=>'Đế vượng', 
                                  '150'=>'Suy', 
                                  '151'=>'Bệnh', 
                                  '152'=>'Tử', 
                                  '153'=>'Mộ', 
                                  '154'=>'Tuyệt', 
                                  '155'=>'Thai', 
                                  '156'=>'Dưỡng',
                                  //saothieu
                                  '157' => 'Thiên Thương',
                                  '158' => 'Thiên sứ',
                                  '159' => 'Thiên Tài',
                                  '160' => 'Thiên Thọ',
                                  '161' => 'Tam thai',
                                  '162' => 'Bát Tọa',
                                  '163' => 'Ân Quan',
                                  '164' => 'Thiên Quý',
                                  '165' => 'Hỏa Tinh',
                                  '166' => 'Linh Tinh',
                                  '167' => 'Thiên La',
                                  '168' => 'Địa Võng',
                                  '169' => 'Đẩu Quân',
                          );
	public $saoAddId    = array(
		//saochinhtinh
		'18' => 'Liêm trinh (M)',
		'19' => 'Liêm trinh (V)',
		'20' => 'Liêm trinh (Đ)',
		'21' => 'Liêm trinh (H)',
		'22' => 'Thiên đồng (M)',
		'23' => 'Thiên đồng (V)',
		'24' => 'Thiên đồng (Đ)',
		'25' => 'Thiên đồng (H)',
		'26' => 'Vũ khúc (M)',
		'27' => 'Vũ khúc (V)',
		'28' => 'Vũ khúc (Đ)',
		'29' => 'Vũ khúc (H)',
		'30' => 'Thái dương (M)',
		'31' => 'Thái dương (V)',
		'32' => 'Thái dương (Đ)',
		'33' => 'Thái dương (H)',
		'34' => 'Thiên cơ (M)',
		'35' => 'Thiên cơ (V)',
		'36' => 'Thiên cơ (Đ)',
		'37' => 'Thiên cơ (H)',
		'38' => 'Thiên phủ (M)',
		'39' => 'Thiên phủ (V)',
		'40' => 'Thiên phủ (Đ)',
		'41' => 'Thiên phủ (B)',
		'42' => 'Thái âm (M)',
		'43' => 'Thái âm (V)',
		'44' => 'Thái âm (Đ)',
		'45' => 'Thái âm (H)',
		'46' => 'Tham lang (M)',
		'47' => 'Tham lang (V)',
		'48' => 'Tham lang (Đ)',
		'49' => 'Tham lang (H)',
		'50' => 'Cự môn (M)',
		'51' => 'Cự môn (V)',
		'52' => 'Cự môn (Đ)',
		'53' => 'Cự môn (H)',
		'54'=> 'Thiên tướng (M)',
		'55'=> 'Thiên tướng (V)',
		'56'=> 'Thiên tướng (Đ)',
		'57'=> 'Thiên tướng (H)',
		'58'=> 'Thiên lương (M)',
		'59'=> 'Thiên lương (V)',
		'60'=> 'Thiên lương (Đ)',
		'61'=> 'Thiên lương (H)',
		'62'=> 'Thất sát (M)',
		'63'=> 'Thất sát (V)',
		'64'=> 'Thất sát (Đ)',
		'65'=> 'Thất sát (H)',
		'66'=> 'Phá quân (M)',
		'67'=> 'Phá quân (V)',
		'68'=> 'Phá quân (Đ)',
		'69'=> 'Phá quân (H)',
		'70'=> 'Tử vi (M)',
		'71'=> 'Tử vi (V)',
		'72'=> 'Tử vi (Đ)',
		'73'=> 'Tử vi (BH)',
		//saotheogiosing
		'74' =>'Văn xương',
		'75' =>'Văn khúc', 
		'76' =>'Thai phụ', 
		'77' =>'Phong cáo', 
		'78' =>'Địa không', 
		'79' =>'Địa kiếp',
		//saotheothangsinh
		'80'=>'Hữu bật',  
		'81'=>'Tả phù',
		'82'=>'Thiên giải',
		'83'=>'Thiên y',
		'84'=>'Thiên riêu',
		'85'=>'Thiên hình',
		'86'=>'Địa giải',
		//saotheocanvacung
		'87'=>'Đà la',
		'88'=>'Lộc tồn',
		'89'=>'Kình dương',
		'90'=>'Quốc ấn',
		'91'=>'Đường phù',
		'92'=>'LN văn tinh',
		'93'=>'Thiên khôi',
		'94'=>'Thiên việt',
		'95'=>'Thiên quan',
		'96'=>'Thiên phúc',
		'97'=>'Lưu hà',
		'98'=>'Thiên trù',
		'99'=>'Triệt',
		//saotheochivacung
		'100'=>'Thiên mã',
		'101'=>'Hoa cái',
		'102'=>'Kiếp sát',
		'103'=>'Đào hoa',
		'104'=>'Phá toái',
		'105'=>'Cô thần',
		'106'=>'Quả tú',
		'107'=>'Thiên không',
		'108'=>'Thiên khốc',
		'109'=>'Thiên hư',
		'110'=>'Thiên đức',
		'111'=>'Nguyệt đức',
		'112'=>'Hồng loan',
		'113'=>'Thiên hỷ',
		'114'=>'Long trì',
		'115'=>'Phượng các',
		'116'=>'Giải thần',
		//saohoa
		'117'=>'Hóa lộc',
		'118'=>'Hóa quyền',
		'119'=>'Hóa khoa',
		'120'=>'Hóa kỵ',
		//saothaitue
		'121'=>'Thái tuế',
		'122'=>'Thiếu dương',
		'123'=>'Tang môn',
		'124'=>'Thiếu âm',
		'125'=>'Quan phù',
		'126'=>'Tử phù',
		'127'=>'Tuế phá',
		'128'=>'Long  đức',
		'129'=>'Bạch hổ',
		'130'=>'Phúc đức',
		'131'=>'Điếu khách',
		'132'=>'Trực phù',
		//saotheolocton
		'133'=>'Bác sỹ', 
		'134'=>'Lực sỹ', 
		'135'=>'Thanh long', 
		'136'=>'Tiểu Hao', 
		'137'=>'Tướng quân', 
		'138'=>'Tấu thư', 
		'139'=>'Phi liêm', 
		'140'=>'Hỷ thần', 
		'141'=>'Bệnh phù', 
		'142'=>'Đại hao', 
		'143'=>'Phục binh', 
		'144'=>'Quan phủ',
		//saotheotruongsinh
		'145'=>'Trường sinh', 
		'146'=>'Mộc dục', 
		'147'=>'Quan đới', 
		'148'=>'Lâm quan', 
		'149'=>'Đế vượng', 
		'150'=>'Suy', 
		'151'=>'Bệnh', 
		'152'=>'Tử', 
		'153'=>'Mộ', 
		'154'=>'Tuyệt', 
		'155'=>'Thai', 
		'156'=>'Dưỡng',
		//saothieu
		'157' => 'Thiên Thương',
		'158' => 'Thiên sứ',
		'159' => 'Thiên Tài',
		'160' => 'Thiên Thọ',
		'161' => 'Tam thai',
		'162' => 'Bát Tọa',
		'163' => 'Ân Quan',
		'164' => 'Thiên Quý',
		'165' => 'Hỏa Tinh',
		'166' => 'Linh Tinh',
		'167' => 'Thiên La',
		'168' => 'Địa Võng',
		'169' => 'Đẩu Quân',
		'170'=>'Tử Vi',
        '171'=>'Phá Quân',
        '172'=>'Thất sát',
        '173'=>'Thiên Lương',
        '174'=>'Thiên tướng',
        '175'=>'Cự môn',
        '176'=>'Tham lang',
        '177'=>'Thái âm',
        '178'=>'Thiên phủ',
        '179'=>'Thiên cơ',
        '180'=>'Thái dương',
        '181'=>'Vũ khúc',
        '182'=>'Thiên đồng',
        '183'=>'Liêm trinh',
        '184'=>'Tuần',
	);
    public $con_giap= array
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
	                        '10'=> 'Dậu',
	                        '11'=> 'Tuất',
	                        '12'=> 'Hợi'
	                    );
	public $arrAmduongChi = array(
		0 => 1,
		1 => 0,
		2 => 1,
		3 => 0,
		4 => 1,
		5 => 0,
		6 => 1,
		7 => 0,
		8 => 1,
		9 => 0,
		10 => 1,
		11 => 0,
	);
	public $cung    = array
						(
	                        '1' => 'Mệnh viên',
	                        '2' => 'Phụ mẫu',
	                        '3' => 'Phúc đức',
	                        '4' => 'Điền trạch',
	                        '5' => 'Quan lộc',
	                        '6' => 'Nô bộc',
	                        '7' => 'Thiên di',
	                        '8' => 'Tật ách',
	                        '9' => 'Tài bạch',
	                        '10'=> 'Tử tức',
	                        '11'=> 'Phu thê',
	                        '12'=> 'Huynh đệ'
	                	);
	public $cuc     = array
						(
	                        '13' => 'Thủy nhị cục',
	                        '14' => 'Mộc tam cục',
	                        '15' => 'Kim tứ cục',
	                        '16' => 'Thổ ngũ cục',
	                        '17' => 'Hỏa lục cục',
	                   );
	public $can     = array
						(
	                        '0'  => 'Canh',
	                        '1'  => 'Tân',
	                        '2'  => 'Nhâm',
	                        '3'  => 'Quý',
	                        '4'  => 'Giáp',
	                        '5'  => 'Ất',
	                        '6'  => 'Bính',
	                        '7'  => 'Đinh',
	                        '8'  => 'Mậu',
	                        '9'  => 'Kỷ'
	                    );
	public $chi     =array
					(
                        '0'  => 'Tý',
                        '1'  => 'Sửu',
                        '2'  => 'Dần',
                        '3'  => 'Mão',
                        '4'  => 'Thìn',
                        '5'  => 'Tỵ',
                        '6'  => 'Ngọ',
                        '7'  => 'Mùi',
                        '8'  => 'Thân',
                        '9'  => 'Dậu',
                        '10' => 'Tuất',
                        '11' => 'Hợi'
                	);
	public $sao_chinh_tinh   = array
							( 
		                        '18' => 'Liêm trinh (M)',
		                        '19' => 'Liêm trinh (V)',
		                        '20' => 'Liêm trinh (Đ)',
		                        '21' => 'Liêm trinh (H)',
		                        '22' => 'Thiên đồng (M)',
		                        '23' => 'Thiên đồng (V)',
		                        '24' => 'Thiên đồng (Đ)',
		                        '25' => 'Thiên đồng (H)',
		                        '26' => 'Vũ khúc (M)',
		                        '27' => 'Vũ khúc (V)',
		                        '28' => 'Vũ khúc (Đ)',
		                        '29' => 'Vũ khúc (H)',
		                        '30' => 'Thái dương (M)',
		                        '31' => 'Thái dương (V)',
		                        '32' => 'Thái dương (Đ)',
		                        '33' => 'Thái dương (H)',
		                        '34' => 'Thiên cơ (M)',
		                        '35' => 'Thiên cơ (V)',
		                        '36' => 'Thiên cơ (Đ)',
		                        '37' => 'Thiên cơ (H)',
		                        '38' => 'Thiên phủ (M)',
		                        '39' => 'Thiên phủ (V)',
		                        '40' => 'Thiên phủ (Đ)',
		                        '41' => 'Thiên phủ (B)',
		                        '42' => 'Thái âm (M)',
		                        '43' => 'Thái âm (V)',
		                        '44' => 'Thái âm (Đ)',
		                        '45' => 'Thái âm (H)',
		                        '46' => 'Tham lang (M)',
		                        '47' => 'Tham lang (V)',
		                        '48' => 'Tham lang (Đ)',
		                        '49' => 'Tham lang (H)',
		                        '50' => 'Cự môn (M)',
		                        '51' => 'Cự môn (V)',
		                        '52' => 'Cự môn (Đ)',
		                        '53' => 'Cự môn (H)',
		                        '54'=> 'Thiên tướng (M)',
		                        '55'=> 'Thiên tướng (V)',
		                        '56'=> 'Thiên tướng (Đ)',
		                        '57'=> 'Thiên tướng (H)',
		                        '58'=> 'Thiên lương (M)',
		                        '59'=> 'Thiên lương (V)',
		                        '60'=> 'Thiên lương (Đ)',
		                        '61'=> 'Thiên lương (H)',
		                        '62'=> 'Thất sát (M)',
		                        '63'=> 'Thất sát (V)',
		                        '64'=> 'Thất sát (Đ)',
		                        '65'=> 'Thất sát (H)',
		                        '66'=> 'Phá quân (M)',
		                        '67'=> 'Phá quân (V)',
		                        '68'=> 'Phá quân (Đ)',
		                        '69'=> 'Phá quân (H)',
		                        '70'=> 'Tử vi (M)',
		                        '71'=> 'Tử vi (V)',
		                        '72'=> 'Tử vi (Đ)',
		                        '73'=> 'Tử vi (BH)',
		                 	);
	public $chinh_tinh       = array
								(
				                        '1' => 'Liêm trinh',
				                        '2' => 'Thiên đồng',
				                        '3' => 'Vũ khúc',
				                        '4' => 'Thái dương',
				                        '5' => 'Thiên cơ',
				                        '6' => 'Thiên phủ',
				                        '7' => 'Thái âm',
				                        '8' => 'Tham lang',
				                        '9' => 'Cự môn',
				                        '10'=> 'Thiên tướng',
				                        '11'=> 'Thiên lương',
				                        '12'=> 'Thất sát',
				                        '13'=> 'Phá quân',
				                        '157' => 'Thiên Thương',
										'158' => 'Thiên sứ',
										'159' => 'Thiên Tài',
										'160' => 'Thiên Thọ',
										'161' => 'Tam thai',
										'162' => 'Bát Tọa',
										'163' => 'Ân Quang',
										'164' => 'Thiên Quý',
										'165' => 'Hỏa Tinh',
										'166' => 'Linh Tinh',
										'167' => 'Thiên La',
										'168' => 'Địa Võng',
										'169' => 'Đẩu Quân',
				                );
	public $ct_xem_cuc       = array
								(
		                            '41' =>13 ,
									'42' =>13 ,
									'43' =>17 ,
									'44' =>17 ,
									'45' =>14 ,
									'46' =>14 ,
									'47' =>16 ,
									'48' =>16 ,
									'49' =>15 ,
									'410' =>15 ,
									'411' =>17 ,
									'412' =>17 ,
									'91' =>13 ,
									'92' =>13 ,
									'93' =>17 ,
									'94' =>17 ,
									'95' =>14 ,
									'96' =>14 ,
									'97' =>16 ,
									'98' =>16 ,
									'99' =>15 ,
									'910' =>15 ,
									'911' =>17 ,
									'912' =>17 ,
									'51'   =>17,
									'52'   =>17,
									'53'   =>16,
									'54'   =>16,
									'55'   =>15,
									'56'   =>15,
									'57'   =>14,
									'58'   =>14,
									'59'   =>13,
									'510'   =>13,
									'511'   =>16,
									'512'   =>16,
									'01'   =>17,
									'02'   =>17,
									'03'   =>16,
									'04'   =>16,
									'05'   =>15,
									'06'   =>15,
									'07'   =>14,
									'08'   =>14,
									'09'   =>13,
									'010'   =>13,
									'011'   =>16,
									'012'   =>16,
									'61' =>16,
									'62' =>16,
									'63' =>14,
									'64' =>14,
									'65' =>13,
									'66' =>13,
									'67' =>15,
									'68' =>15,
									'69' =>17,
									'610' =>17,
									'611' =>14,
									'612' =>14,
									'11' =>16,
									'12' =>16,
									'13' =>14,
									'14' =>14,
									'15' =>13,
									'16' =>13,
									'17' =>15,
									'18' =>15,
									'19' =>17,
									'110' =>17,
									'111' =>14,
									'112' =>14,
									'71' =>14,
									'72' =>14,
									'73' =>15,
									'74' =>15,
									'75' =>17,
									'76' =>17,
									'77' =>13,
									'78' =>13,
									'79' =>16,
									'710' =>16,
									'711' =>15,
									'712' =>15,
									'21' =>14,
									'22' =>14,
									'23' =>15,
									'24' =>15,
									'25' =>17,
									'26' =>17,
									'27' =>13,
									'28' =>13,
									'29' =>16,
									'210' =>16,
									'211' =>15,
									'212' =>15,
									'81' =>15,
									'82' =>15,
									'83' =>13,
									'84' =>13,
									'85' =>16,
									'86' =>16,
									'87' =>17,
									'88' =>17,
									'89' =>14,
									'810' =>14,
									'811' =>13,
									'812' =>13,
									'31' =>15,
									'32' =>15,
									'33' =>13,
									'34' =>13,
									'35' =>16,
									'36' =>16,
									'37' =>17,
									'38' =>17,
									'39' =>14,
									'310' =>14,
									'311' =>13,
									'312' =>13,
								); 
	public $menh_than   = array
							(
	                            '11'  => array('menh'=>3,'than'=>3), 
	                            '12'  => array('menh'=>2,'than'=>4), 
	                            '13'  => array('menh'=>1,'than'=>5), 
	                            '14'  => array('menh'=>12,'than'=>6), 
	                            '15'  => array('menh'=>11,'than'=>7), 
	                            '16'  => array('menh'=>10,'than'=>8), 
	                            '17'  => array('menh'=>9,'than'=>9), 
	                            '18'  => array('menh'=>8,'than'=>10), 
	                            '19'  => array('menh'=>7,'than'=>11), 
	                            '110'  => array('menh'=>6,'than'=>12), 
	                            '111'  => array('menh'=>5,'than'=>1), 
	                            '112'  => array('menh'=>4,'than'=>2), 
	                            
	                            '21'  => array('menh'=>4,'than'=>4), 
	                            '22'  => array('menh'=>3,'than'=>5), 
	                            '23'  => array('menh'=>2,'than'=>6), 
	                            '24'  => array('menh'=>1,'than'=>7), 
	                            '25'  => array('menh'=>12,'than'=>8), 
	                            '26'  => array('menh'=>11,'than'=>9), 
	                            '27'  => array('menh'=>10,'than'=>10), 
	                            '28'  => array('menh'=>9,'than'=>11), 
	                            '29'  => array('menh'=>8,'than'=>12), 
	                            '210'  => array('menh'=>7,'than'=>1), 
	                            '211'  => array('menh'=>6,'than'=>2), 
	                            '212'  => array('menh'=>5,'than'=>3), 
	                            
	                            '31'  => array('menh'=>5,'than'=>5), 
	                            '32'  => array('menh'=>4,'than'=>6), 
	                            '33'  => array('menh'=>3,'than'=>7), 
	                            '34'  => array('menh'=>2,'than'=>8), 
	                            '35'  => array('menh'=>1,'than'=>9), 
	                            '36'  => array('menh'=>12,'than'=>10), 
	                            '37'  => array('menh'=>11,'than'=>11), 
	                            '38'  => array('menh'=>10,'than'=>12), 
	                            '39'  => array('menh'=>9,'than'=>1), 
	                            '310'  => array('menh'=>8,'than'=>2), 
	                            '311'  => array('menh'=>7,'than'=>3), 
	                            '312'  => array('menh'=>6,'than'=>4), 
	                            
	                            '41'  => array('menh'=>6,'than'=>6),
	                            '42'  => array('menh'=>5,'than'=>7),
	                            '43'  => array('menh'=>4,'than'=>8),
	                            '44'  => array('menh'=>3,'than'=>9),
	                            '45'  => array('menh'=>2,'than'=>6),
	                            '46'  => array('menh'=>1,'than'=>11),
	                            '47'  => array('menh'=>12,'than'=>12),
	                            '48'  => array('menh'=>11,'than'=>1),
	                            '49'  => array('menh'=>10,'than'=>2),
	                            '410'  => array('menh'=>9,'than'=>3),
	                            '411'  => array('menh'=>8,'than'=>4),
	                            '412'  => array('menh'=>7,'than'=>5),
	                            
	                            '51'  => array('menh'=>7,'than'=>7),
	                            '52'  => array('menh'=>6,'than'=>8),
	                            '53'  => array('menh'=>5,'than'=>9),
	                            '54'  => array('menh'=>4,'than'=>10),
	                            '55'  => array('menh'=>3,'than'=>11),
	                            '56'  => array('menh'=>2,'than'=>12),
	                            '57'  => array('menh'=>1,'than'=>1),
	                            '58'  => array('menh'=>12,'than'=>2),
	                            '59'  => array('menh'=>11,'than'=>3),
	                            '510'  => array('menh'=>10,'than'=>4),
	                            '511'  => array('menh'=>9,'than'=>5),
	                            '512'  => array('menh'=>8,'than'=>6),
	                            
	                            '61'  => array('menh'=>8,'than'=>8),
	                            '62'  => array('menh'=>7,'than'=>9),
	                            '63'  => array('menh'=>6,'than'=>10),
	                            '64'  => array('menh'=>5,'than'=>11),
	                            '65'  => array('menh'=>4,'than'=>12),
	                            '66'  => array('menh'=>3,'than'=>1),
	                            '67'  => array('menh'=>2,'than'=>2),
	                            '68'  => array('menh'=>1,'than'=>4),
	                            '69'  => array('menh'=>12,'than'=>4),
	                            '610'  => array('menh'=>11,'than'=>5),
	                            '611'  => array('menh'=>10,'than'=>6),
	                            '612'  => array('menh'=>9,'than'=>7),
	                            
	                            '71'  => array('menh'=>9,'than'=>9),
	                            '72'  => array('menh'=>8,'than'=>10),
	                            '73'  => array('menh'=>7,'than'=>11),
	                            '74'  => array('menh'=>6,'than'=>12),
	                            '75'  => array('menh'=>5,'than'=>1),
	                            '76'  => array('menh'=>4,'than'=>2),
	                            '77'  => array('menh'=>3,'than'=>3),
	                            '78'  => array('menh'=>2,'than'=>4),
	                            '79'  => array('menh'=>1,'than'=>5),
	                            '710'  => array('menh'=>12,'than'=>6),
	                            '711'  => array('menh'=>11,'than'=>7),
	                            '712'  => array('menh'=>10,'than'=>8),
	                            
	                            '81'  => array('menh'=>10,'than'=>10),
	                            '82'  => array('menh'=>9,'than'=>11),
	                            '83'  => array('menh'=>8,'than'=>12),
	                            '84'  => array('menh'=>7,'than'=>1),
	                            '85'  => array('menh'=>6,'than'=>2),
	                            '86'  => array('menh'=>5,'than'=>3),
	                            '87'  => array('menh'=>4,'than'=>4),
	                            '88'  => array('menh'=>3,'than'=>5),
	                            '89'  => array('menh'=>2,'than'=>8),
	                            '810'  => array('menh'=>1,'than'=>7),
	                            '811'  => array('menh'=>12,'than'=>8),
	                            '812'  => array('menh'=>11,'than'=>9),
	                            
	                            '91'  => array('menh'=>11,'than'=>11),
	                            '92'  => array('menh'=>10,'than'=>12),
	                            '93'  => array('menh'=>9,'than'=>1),
	                            '94'  => array('menh'=>8,'than'=>2),
	                            '95'  => array('menh'=>7,'than'=>3),
	                            '96'  => array('menh'=>6,'than'=>4),
	                            '97'  => array('menh'=>5,'than'=>5),
	                            '98'  => array('menh'=>4,'than'=>6),
	                            '99'  => array('menh'=>3,'than'=>7),
	                            '910'  => array('menh'=>2,'than'=>8),
	                            '911'  => array('menh'=>1,'than'=>9),
	                            '912'  => array('menh'=>12,'than'=>10),
	                            
	                            '101'  => array('menh'=>12,'than'=>12),
	                            '102'  => array('menh'=>11,'than'=>1),
	                            '103'  => array('menh'=>10,'than'=>2),
	                            '104'  => array('menh'=>9,'than'=>3),
	                            '105'  => array('menh'=>8,'than'=>4),
	                            '106'  => array('menh'=>7,'than'=>5),
	                            '107'  => array('menh'=>6,'than'=>6),
	                            '108'  => array('menh'=>5,'than'=>7),
	                            '109'  => array('menh'=>4,'than'=>8),
	                            '1010'  => array('menh'=>3,'than'=>9),
	                            '1011'  => array('menh'=>2,'than'=>10),
	                            '1012'  => array('menh'=>1,'than'=>11),
	                            
	                            '111'  => array('menh'=>1,'than'=>1),
	                            '112'  => array('menh'=>12,'than'=>2),
	                            '113'  => array('menh'=>11,'than'=>3),
	                            '114'  => array('menh'=>10,'than'=>4),
	                            '115'  => array('menh'=>9,'than'=>5),
	                            '116'  => array('menh'=>8,'than'=>6),
	                            '117'  => array('menh'=>7,'than'=>7),
	                            '118'  => array('menh'=>6,'than'=>8),
	                            '119'  => array('menh'=>5,'than'=>9),
	                            '1110'  => array('menh'=>4,'than'=>10),
	                            '1111'  => array('menh'=>3,'than'=>11),
	                            '1112'  => array('menh'=>2,'than'=>12),
	                            
	                            '121'  => array('menh'=>2,'than'=>2),
	                            '122'  => array('menh'=>1,'than'=>3),
	                            '123'  => array('menh'=>12,'than'=>4),
	                            '124'  => array('menh'=>11,'than'=>5),
	                            '125'  => array('menh'=>10,'than'=>6),
	                            '126'  => array('menh'=>9,'than'=>7),
	                            '127'  => array('menh'=>8,'than'=>8),
	                            '128'  => array('menh'=>7,'than'=>9),
	                            '129'  => array('menh'=>6,'than'=>10),
	                            '1210'  => array('menh'=>5,'than'=>11),
	                            '1211'  => array('menh'=>4,'than'=>12),
	                            '1212'  => array('menh'=>3,'than'=>1),
                        	);
	public $tu_vi    = array
						(
                           '11' =>2,
                           '12' =>5,
                           '13' =>12,
                           '14' =>7,
                           '15' =>10,
                           
                           '21' =>3,
                           '22' =>2,
                           '23' =>5,
                           '24' =>12,
                           '25' =>7,
                           
                           '31' =>3,
                           '32' =>3,
                           '33' =>2,
                           '34' =>5,
                           '35' =>12,
                           
                           '41' =>4,
                           '42' =>6,
                           '43' =>3,
                           '44' =>2,
                           '45' =>5,
                           
                           '51' =>4,
                           '52' =>3,
                           '53' =>1,
                           '54' =>3,
                           '55' =>2,
                           
                           '61' =>5,
                           '62' =>4,
                           '63' =>6,
                           '64' =>8,
                           '65' =>3,
                           
                           '71' =>5,
                           '72' =>7,
                           '73' =>3,
                           '74' =>1,
                           '75' =>11,
                           
                           '81' =>6,
                           '82' =>4,
                           '83' =>4,
                           '84' =>6,
                           '85' =>8,
                           
                           '91' =>6,
                           '92' =>5,
                           '93' =>2,
                           '94' =>3,
                           '95' =>1,
                           
                           '101' =>7,
                           '102' =>8,
                           '103' =>7,
                           '104' =>4,
                           '105' =>6,
                           
                           '111' =>7,
                           '112' =>5,
                           '113' =>4,
                           '114' =>9,
                           '115' =>3,
                           
                           '121' =>8,
                           '122' =>6,
                           '123' =>5,
                           '124' =>2,
                           '125' =>4,
                           
                           '131' =>8,
                           '132' =>9,
                           '133' =>3,
                           '134' =>7,
                           '135' =>12,
                           
                           '141' =>9,
                           '142' =>6,
                           '143' =>8,
                           '144' =>4,
                           '145' =>9,
                           
                           '151' =>9,
                           '152' =>7,
                           '153' =>5,
                           '154' =>5,
                           '155' =>2,
                           
                           '161' =>10,
                           '162' =>10,
                           '163' =>6,
                           '164' =>10,
                           '165' =>7,
                           
                           '171' =>10,
                           '172' =>7,
                           '173' =>4,
                           '174' =>3,
                           '175' =>4,
                           
                           '181' =>11,
                           '182' =>8,
                           '183' =>9,
                           '184' =>8,
                           '185' =>5,
                           
                           '191' =>11,
                           '192' =>11,
                           '193' =>6,
                           '194' =>5,
                           '195' =>1,
                           
                           '201' =>12,
                           '202' =>8,
                           '203' =>7,
                           '204' =>6,
                           '205' =>10,
                           
                           '211' =>12,
                           '212' =>9,
                           '213' =>5,
                           '214' =>11,
                           '215' =>3,
                           
                           '221' =>1,
                           '222' =>12,
                           '223' =>10,
                           '224' =>4,
                           '225' =>8,
                           
                           '231' =>1,
                           '232' =>9,
                           '233' =>7,
                           '234' =>9,
                           '235' =>5,
                           
                           '241' =>2,
                           '242' =>10,
                           '243' =>8,
                           '244' =>6,
                           '245' =>6,
                           
                           '251' =>2,
                           '252' =>1,
                           '253' =>6,
                           '254' =>7,
                           '255' =>2,
                           
                           '261' =>3,
                           '262' =>10,
                           '263' =>11,
                           '264' =>12,
                           '265' =>11,
                           
                           '271' =>3,
                           '272' =>11,
                           '273' =>8,
                           '274' =>5,
                           '275' =>4,
                           
                           '281' =>4,
                           '282' =>2,
                           '283' =>9,
                           '284' =>10,
                           '285' =>9,
                           
                           '291' =>4,
                           '292' =>11,
                           '293' =>7,
                           '294' =>7,
                           '295' =>6,
                           
                           '301' =>5,
                           '302' =>12,
                           '303' =>12,
                           '304' =>8,
                           '305' =>7,
                        );
	public $xac_dinh_sao_chinh_tinh = array
										(
				                            '11'=>'73',
				                            '12'=>'',
				                            '13'=>'69',
				                            '14'=>'',
				                            '15'=>'18,39',
				                            '16'=>'45',
				                            '17'=>'49',
				                            '18'=>'25,53',
				                            '19'=>'27,54',
				                            '110'=>'33,61',
				                            '111'=>'65',
				                            '112'=>'37',
				                            '21'=>'36',
				                            '22'=>'72,67',
				                            '23'=>'',
				                            '24'=>'41',
				                            '25'=>'45',
				                            '26'=>'21,49',
				                            '27'=>'51',
				                            '28'=>'56',
				                            '29'=>'22,59',
				                            '210'=>'28,65',
				                            '211'=>'33',
				                            '212'=>'',
				                            '31'=>'66',
				                            '32'=>'36',
				                            '33'=>'70,38',
				                            '34'=>'45',
				                            '35'=>'47',
				                            '36'=>'53',
				                            '37'=>'19,55',
				                            '38'=>'60',
				                            '39'=>'62',
				                            '310'=>'25',
				                            '311'=>'26',
				                            '312'=>'33',
				                            '41'=>'33',
				                            '42'=>'41',
				                            '43'=>'37,45',
				                            '44'=>'73,49',
				                            '45'=>'53',
				                            '46'=>'56',
				                            '47'=>'58',
				                            '48'=>'20,64',
				                            '49'=>'',
				                            '410'=>'',
				                            '411'=>'25',
				                       		'412'=>'29,69',
				                            '51'=>'26,38',
				                            '52'=>'32,44',
				                            '53'=>'48',
				                            '54'=>'34,50',
				                            '55'=>'71,55',
				                            '56'=>'61',
				                            '57'=>'62',
				                            '58'=>'',
				                            '59'=>'19',
				                            '510'=>'',
				                            '511'=>'68',
				                            '512'=>'24',
				                            '61'=>'23,43',
				                            '62'=>'26,46',
				                            '63'=>'51,31',
				                            '64'=>'56',
				                            '65'=>'34,58',
				                      		'66'=>'71,63',
				                            '67'=>'',
				                            '68'=>'',
				                            '69'=>'',
				                            '610'=>'21,69',
				                            '611'=>'',
				                            '612'=>'40',
				                            '71'=>'49',
				                            '72'=>'25,53',
				                            '73'=>'27,54',
				                            '74'=>'31,59',
				                            '75'=>'65',
				                            '76'=>'35',
				                            '77'=>'70',
				                            '78'=>'',
				                            '79'=>'69',
				                            '710'=>'',
				                            '711'=>'18,39',
				                            '712'=>'42',
				                            '81'=>'51',
				                            '82'=>'56',
				                            '83'=>'22,59',
				                            '84'=>'28,65',
				                            '85'=>'31',
				                            '86'=>'',
				                            '87'=>'35',
				                            '88'=>'72,67',
				                            '89'=>'',
				                            '810'=>'41',
				                            '811'=>'42',
				                            '812'=>'21,49',
				                            '91'=>'19,55',
				                            '92'=>'60',
				                            '93'=>'62',
				                            '94'=>'24',
				                            '95'=>'26',
				                            '96'=>'30',
				                            '97'=>'66',
				                            '98'=>'36',
				                            '99'=>'70,38',
				                            '910'=>'42',
				                            '911'=>'47',
				                            '912'=>'52',
				                            '101'=>'59',
				                            '102'=>'20,64',
				                            '103'=>'',
				                            '104'=>'',
				                            '105'=>'25',
				                            '106'=>'29,69',
				                            '107'=>'30',
				                            '108'=>'40',
				                            '109'=>'35,43',
				                            '1010'=>'73,49',
				                            '1011'=>'53',
				                            '1012'=>'56',
				                            '111'=>'62',
				                            // '112'=>'',
				                            '113'=>'19',
				                            '114'=>'',
				                            '115'=>'68',
				                            '116'=>'24',
				                            '117'=>'26,38',
				                            '118'=>'32,44',
				                            '119'=>'48',
				                            '1110'=>'34,50',
				                            '1111'=>'71,55',
				                            '1112'=>'61',
				                            '121'=>'',
				                            '122'=>'',
				                            '123'=>'',
				                            '124'=>'21,69',
				                            '125'=>'',
				                            '126'=>'40',
				                            '127'=>'25,45',
				                            '128'=>'26,46',
				                            '129'=>'52,33',
				                            '1210'=>'57',
				                            '1211'=>'34,58',
				                            '1212'=>'73,62',
					                    );
    public $sao_theo_gio_sinh = array
    							(
	                                '74' =>'Văn xương',
                                    '75' =>'Văn khúc', 
                                    '76' =>'Thai phụ', 
                                    '77' =>'Phong cáo', 
                                    '78' =>'Địa không', 
                                    '79' =>'Địa kiếp',
	                            );
    public $ct_xem_sao_theo_gio_sinh = array
    									(
			                                    '1,11'=>'74',
			                                    '2,10'=>'74',
			                                    '3,9'=>'74,76',
			                                    '4,8'=>'74,75',
			                                    '5,7'=>'74,77',
			                                    '6,6'=>'74',
			                                    '7,5'=>'74',
			                                    '8,4'=>'74',
			                                    '9,3'=>'74,76',
			                                    '10,2'=>'74,75',
			                                    '11,1'=>'74,77',
			                                    '12,12'=>'74',
			                                    '1,5'=>'75',
			                                    '2,6'=>'75',
			                                    '3,7'=>'75',
			                                    '5,9'=>'75',
			                                    '6,10'=>'75',
			                                    '7,11'=>'75',
			                                    '8,12'=>'75',
			                                    '9,1'=>'75',
			                                    '11,3'=>'75',
			                                    '12,4'=>'75',
			                                    '1,7'=>'76',
			                                    '2,8'=>'76',
			                                    '4,10'=>'76',
			                                    '5,11'=>'76',
			                                    '6,12'=>'76',
			                                    '7,1'=>'76',
			                                    '8,2'=>'76',
			                                    '10,4'=>'76',
			                                    '11,5'=>'76',
			                                    '12,6'=>'76',
			                                    '1,3'=>'77',
			                                    '2,4'=>'77',
			                                    '3,5'=>'77',
			                                    '4,6'=>'77',
			                                    '6,8'=>'77',
			                                    '7,9'=>'77',
			                                    '8,10'=>'77',
			                                    '9,11'=>'77',
			                                    '10,12'=>'77',
			                                    '12,2'=>'77',
			                                    '1,12'=>'78',
			                                    '2,11'=>'78',
			                                    '3,10'=>'78',
			                                    '4,9'=>'78',
			                                    '5,8'=>'78',
			                                    '6,7'=>'78',
			                                    '7,6'=>'78',
			                                    '8,5'=>'78',
			                                    '9,4'=>'78',
			                                    '10,3'=>'78',
			                                    '11,2'=>'78',
			                                    '12,1'=>'78',
			                                    '1,12'=>'79',
			                                    '2,1'=>'79',
			                                    '3,2'=>'79',
			                                    '4,3'=>'79',
			                                    '5,4'=>'79',
			                                    '6,5'=>'79',
			                                    '7,6'=>'79',
			                                    '8,7'=>'79',
			                                    '9,8'=>'79',
			                                    '10,9'=>'79',
			                                    '11,10'=>'79',
			                                    '12,11'=>'79',
			                             	);
    public $sao_theo_thang_sinh      = array
    									(
			                                    '80'=>'Hữu bật',  
			                                    '81'=>'Tả phù',
			                                    '82'=>'Thiên giải',
			                                    '83'=>'Thiên y',
			                                    '84'=>'Thiên riêu',
			                                    '85'=>'Thiên hình',
			                                    '86'=>'Địa giải',
				                            );
    public $ct_xem_sao_theo_thang_sinh  = array
    										(
			                                    '1,11'=>'80',
			                                    '2,10'=>'80,82',
			                                    '3,9'=>'80',
			                                    '4,8'=>'80,81',
			                                    '5,7'=>'80',
			                                    '6,6'=>'80',
			                                    '7,5'=>'80',
			                                    '8,4'=>'80,82',
			                                    '9,3'=>'80',
			                                    '10,2'=>'80,81',
			                                    '11,1'=>'80',
			                                    '12,12'=>'80',
			                                    '1,5'=>'81',
			                                    '2,6'=>'81',
			                                    '3,7'=>'81',
			                                    '5,9'=>'81',
			                                    '6,10'=>'81',
			                                    '7,11'=>'81',
			                                    '8,12'=>'81',
			                                    '9,1'=>'81',
			                                    '11,3'=>'81',
			                                    '12,8'=>'82',
			                                    '12,4'=>'81',
			                                    '1,9'=>'82',
			                                    '3,11'=>'82',
			                                    '4,12'=>'82',
			                                    '5,1'=>'82',
			                                    '6,2'=>'82',
			                                    '7,3'=>'82',
			                                    '9,5'=>'82',
			                                    '10,6'=>'82',
			                                    '11,7'=>'82',
			                                    '1,2'=>'83,84',
			                                    '2,3'=>'83,84',
			                                    '3,4'=>'83,84',
			                                    '4,5'=>'83,84',
			                                    '5,6'=>'83,84',
			                                    '6,7'=>'83,84',
			                                    '7,8'=>'83,84',
			                                    '8,9'=>'83,84',
			                                    '9,10'=>'83,84',
			                                    '10,11'=>'83,84',
			                                    '11,12'=>'83,84',
			                                    '12,1'=>'83,84',
			                                    '1,10'=>'85',
			                                    '2,11'=>'85',
			                                    '3,12'=>'85',
			                                    '4,1'=>'85',
			                                    '5,2'=>'85',
			                                    '6,3'=>'85',
			                                    '7,4'=>'85',
			                                    '8,5'=>'85',
			                                    '9,6'=>'85',
			                                    '10,7'=>'85',
			                                    '11,8'=>'85',
			                                    '12,9'=>'85',
			                                    '1,8'=>'86',
			                                    '2,9'=>'86',
			                                    '3,10'=>'86',
			                                    '4,11'=>'86',
			                                    '5,12'=>'86',
			                                    '6,1'=>'86',
			                                    '7,2'=>'86',
			                                    '8,3'=>'86',
			                                    '9,4'=>'86',
			                                    '10,5'=>'86',
			                                    '11,6'=>'86',
			                                    '12,7'=>'86',
				                            );
    public $sao_theo_can_va_cung     = array
    									(
		                                    '87'=>'Đà la',
		                                    '88'=>'Lộc tồn',
		                                    '89'=>'Kình dương',
		                                    '90'=>'Quốc ấn',
		                                    '91'=>'Đường phù',
		                                    '92'=>'LN văn tinh',
		                                    '93'=>'Thiên khôi',
		                                    '94'=>'Thiên việt',
		                                    '95'=>'Thiên quan',
		                                    '96'=>'Thiên phúc',
		                                    '97'=>'Lưu hà',
		                                    '98'=>'Thiên trù',
		                                    '99'=>'Triệt',
		                              	);
    public $ct_xem_sao_theo_can_va_cung = array
    										(
			                                    '4,2'=>'87,93',
			                                    '5,3'=>'87',
			                                    '6,5'=>'87',
			                                    '7,6'=>'87,98',
			                                    '8,5'=>'87',
			                                    '9,6'=>'87',
			                                    '0,8'=>'87',
			                                    '1,9'=>'87',
			                                    '2,11'=>'87,95',
			                                    '3,12'=>'87',
			                                    '3,11'=>'98',
			                                    '4,3'=>'88',
			                                    '5,4'=>'88',
			                                    '6,6'=>'88,91',
			                                    '7,7'=>'88',
			                                    '8,6'=>'88,97',
			                                    '9,7'=>'88,97',
			                                    '0,9'=>'88,97',
			                                    '1,10'=>'88,95',
			                                    '2,12'=>'88,97',
			                                    '3,1'=>'88',
			                                    '4,4'=>'89',
			                                    '5,5'=>'89,95',
			                                    '6,7'=>'89',
			                                    '7,8'=>'89',
			                                    '8,7'=>'89,98',
			                                    '9,8'=>'89',
			                                    '0,10'=>'89',
			                                    '1,11'=>'89',
			                                    '2,1'=>'89',
			                                    '3,2'=>'89',
			                                    '4,11'=>'90',
			                                    '5,12'=>'90',
			                                    '6,2'=>'90',
			                                    '7,3'=>'90,95',
			                                    '8,2'=>'90,93',
			                                    '9,3'=>'90,96',
			                                    '0,5'=>'90',
			                                    '1,6'=>'90,96',
			                                    '2,8'=>'90',
			                                    '3,9'=>'90',
			                                    '4,8'=>'91,94,95',
			                                    '5,9'=>'91,94,96',
			                                    '6,11'=>'91',
			                                    '7,12'=>'91,93,96',
			                                    '8,11'=>'91',
			                                    '9,12'=>'91',
			                                    '0,2'=>'91',
			                                    '1,3'=>'91,94',
			                                    '2,5'=>'91',
			                                    '3,6'=>'91,94,96',
			                                    '4,6'=>'92,98',
			                                    '5,7'=>'92,98',
			                                    '6,9'=>'92',
			                                    '7,10'=>'92,94',
			                                    '8,9'=>'92',
			                                    '9,10'=>'92,95',
			                                    '0,12'=>'92,95',
			                                    '1,1'=>'92',
			                                    '2,10'=>'92',
			                                    '3,4'=>'92,93',
			                                    '5,1'=>'93',
			                                    '6,12'=>'93',
			                                    '9,1'=>'93',
			                                    '0,7'=>'93,96',
			                                    '1,7'=>'93,98',
			                                    '2,4'=>'93',
			                                    '6,10'=>'94',
			                                    '8,8'=>'94',
			                                    '9,9'=>'94,98',
			                                    '0,3'=>'94,98',
			                                    '2,6'=>'94',
			                                    '8,4'=>'95,96',
			                                    '3,7'=>'95',
			                                    '4,10'=>'96,97',
			                                    '6,1'=>'96,98',
			                                    '2,7'=>'96',
			                                    '5,11'=>'97',
			                                    '6,8'=>'97',
			                                    '7,5'=>'97',
			                                    '1,4'=>'97',
			                                    '3,3'=>'97',
			                                    '2,10'=>'98',
			                              	);
    public $sao_theo_chi_va_cung     = array
    									(
	                                        '100'=>'Thiên mã',
		                                    '101'=>'Hoa cái',
		                                    '102'=>'Kiếp sát',
		                                    '103'=>'Đào hoa',
		                                    '104'=>'Phá toái',
		                                    '105'=>'Cô thần',
		                                    '106'=>'Quả tú',
		                                    '107'=>'Thiên không',
		                                    '108'=>'Thiên khốc',
		                                    '109'=>'Thiên hư',
		                                    '110'=>'Thiên đức',
		                                    '111'=>'Nguyệt đức',
		                                    '112'=>'Hồng loan',
		                                    '113'=>'Thiên hỷ',
		                                    '114'=>'Long trì',
		                                    '115'=>'Phượng các',
		                                    '116'=>'Giải thần',
		                              	);
    public $ct_xem_sao_theo_chi_va_cung = array
    										(
			                                    '0,3' =>'100,105',
			                                    '0,5' =>'101,114',
			                                    '0,6' =>'102,104,111',
			                                    '0,10' =>'103,110,113',
			                                    '0,11' =>'106,115,116',
			                                    '0,2' =>'107',
			                                    '0,7' =>'108,109',
			                                    '0,4' =>'112',
			                                    '1,12' =>'100',
			                                    '1,2' =>'101,104',
			                                    '1,3' =>'102,105,107,112',
			                                    '1,7' =>'103,111',
			                                    '1,11' =>'106,110',
			                                    '1,6' =>'108,114',
			                                    '1,8' =>'109',
			                                    '1,9' =>'113',
			                                    '1,10' =>'115,116',
			                                    '2,9' =>'100,109,115,116',
			                                    '2,11' =>'101,110',
			                                    '2,12' =>'102',
			                                    '2,4' =>'103,107',
			                                    '2,10' =>'104',
			                                    '2,6' =>'105',
			                                    '2,2' =>'106,112',
			                                    '2,5' =>'108',
			                                    '2,8' =>'111,113',
			                                    '2,7' =>'114',
			                                    '3,6' =>'100,104,105',
			                                    '3,8' =>'101,114,115,116',
			                                    '3,9' =>'102,111',
			                                    '3,1' =>'103,110,112',
			                                    '3,2' =>'106',
			                                    '3,5' =>'107',
			                                    '3,4' =>'108',
			                                    '3,10' =>'109',
			                                    '3,7' =>'113',
			                                    '4,3' =>'100,108',
			                                    '4,5' =>'101',
			                                    '4,6' =>'102,105,107,113',
			                                    '4,10' =>'103,111',
			                                    '4,2' =>'104,106,110',
			                                    '4,11' =>'109',
			                                    '4,12' =>'112',
			                                    '4,9' =>'114',
			                                    '4,7' =>'115,116',
			                                    '5,12' =>'100,109',
			                                    '5,2' =>'101,108',
			                                    '5,3' =>'102,110',
			                                    '5,7' =>'103,107',
			                                    '5,10' =>'104,114',
			                                    '5,9' =>'105',
			                                    '5,5' =>'106,113',
			                                    '5,11' =>'111,112',
			                                    '5,6' =>'115,116',
			                                    '6,9' =>'100,105',
			                                    '6,11' =>'101,114',
			                                    '6,12' =>'102,111',
			                                    '6,4' =>'103,110,113',
			                                    '6,6' =>'104',
			                                    '6,5' =>'106,115,116',
			                                    '6,8' =>'107',
			                                    '6,1' =>'108,109',
			                                    '6,10' =>'112',
			                                    '7,6' =>'100',
			                                    '7,8' =>'101',
			                                    '7,9' =>'102,105,107,112',
			                                    '7,1' =>'103,111',
			                                    '7,2' =>'104,109',
			                                    '7,5' =>'106,110',
			                                    '7,12' =>'108,114',
			                                    '7,3' =>'113',
			                                    '7,4' =>'115,116',
			                                    '8,3' =>'100,109,115,116',
			                                    '8,5' =>'101',
			                                    '8,6' =>'102,110',
			                                    '8,10' =>'103,104,107',
			                                    '8,12' =>'105',
			                                    '8,8' =>'106,112',
			                                    '8,11' =>'108',
			                                    '8,2' =>'111,113',
			                                    '8,1' =>'114',
			                                    '9,12' =>'100,105',
			                                    '9,2' =>'101,114,115,116',
			                                    '9,3' =>'102,111',
			                                    '9,7' =>'103,110,112',
			                                    '9,6' =>'104',
			                                    '9,8' =>'106',
			                                    '9,11' =>'107',
			                                    '9,10' =>'108',
			                                    '9,4' =>'109',
			                                    '9,1' =>'113',
			                                    '10,9' =>'100,108',
			                                    '10,11' =>'101',
			                                    '10,12' =>'102,105,107,113',
			                                    '10,4' =>'103,110',
			                                    '10,2' =>'104',
			                                    '10,8' =>'106,110',
			                                    '10,5' =>'109',
			                                    '10,6' =>'112',
			                                    '10,3' =>'114',
			                                    '10,1' =>'115,116',
			                                    '11,6' =>'100,109',
			                                    '11,8' =>'101,108',
			                                    '11,9' =>'102,110',
			                                    '11,1' =>'103,107',
			                                    '11,10' =>'104',
			                                    '11,3' =>'105',
			                                    '11,11' =>'106,113',
			                                    '11,5' =>'111,112',
			                                    '11,4' =>'114',
			                                    '11,12' =>'115,116',
			                              	);
    public $sao_hoa      = array
    						(
                                '117'=>'Hóa lộc',
                                '118'=>'Hóa quyền',
                                '119'=>'Hóa khoa',
                                '120'=>'Hóa kỵ',
                          	);
    public $sh_color     = array
    						(
                                '1'=>'5',
                                '2'=>'3',
                                '3'=>'2',
                                '4'=>'1',
                           	); 
	public $ct_xem_sao_hoa_loc_va_hoa_quyen  = array
												(
				                                    '4,1'=>'117',
                      								'4,49'=>'118',
				                                    '5,17'=>'117',
				                                    '5,41'=>'118',
				                                    '6,5'=>'117',
				                                    '6,17'=>'118',
				                                    '7,25'=>'117',
				                                    '7,5'=>'118',
				                                    '8,29'=>'117',
				                                    '8,25'=>'118',
				                                    '9,9'=>'117',
				                                    '9,29'=>'118',
				                                    '0,13'=>'117',
				                                    '0,9'=>'118',
				                                    '1,33'=>'117',
				                                    '1,13'=>'118',
				                                    '2,41'=>'117',
				                              	);
    public $shkhk_saochinhtinh  = array
    								( 
    									'4,9'=>'119', 
    									'4,13' =>'120', 
    									'5,53'=>'119',
    									'5,25'=>'120',
    									'6,1'=>'120',
    									'7,17'=>'119',
    									'7,33'=>'120',
    									'8,17'=>'120',
    									'9,41'=>'119',
    									'0,25'=>'119',
    									'0,5'=>'120',
    									'2,21'=>'119',
    									'2,9'=>'120',
    									'3,25'=>'119',
    									'3,29'=>'120'
    								);
    public $shkhk_saogio  = array
    							(
    								'6,1'=>'119',
    								'9,2'=>'120',
    								'1,2'=>'119',
    								'1,1'=>'120'
    							);
    public $shkhk_saothang= array
							    ( 
							    	'8,1'=>'119', 
							    );
    public $ct_vi_tri_triet    = array
    								(
				                         '0'=>'7',
				                         '1'=>'5',
				                         '2'=>'3',
				                         '3'=>'1',
				                         '4'=>'9',
				                         '5'=>'7',
				                         '6'=>'5',
				                         '7'=>'3',
				                         '8'=>'1',
				                         '9'=>'9',
				                    );
    public $ct_vi_tri_tuan     = array
    								(
			                            '4,0'=>'11',
			                            '4,2'=>'1',
			                            '4,4'=>'3',
			                            '4,6'=>'5',
			                            '4,8'=>'7',
			                            '4,10'=>'9',
			                            '5,1'=>'11',
			                            '5,3'=>'1',
			                            '5,5'=>'3',
			                            '5,7'=>'5',
			                            '5,9'=>'7',
			                            '5,11'=>'9',
			                            '6,0'=>'9',
			                            '6,2'=>'11',
			                            '6,4'=>'1',
			                            '6,6'=>'3',
			                            '6,8'=>'5',
			                            '6,10'=>'7',
			                            '7,1'=>'9',
			                            '7,3'=>'11',
			                            '7,5'=>'1',
			                            '7,7'=>'3',
			                            '7,9'=>'5',
			                            '7,11'=>'7',
			                            '8,0'=>'7',
			                            '8,2'=>'9',
			                            '8,4'=>'11',
			                            '8,6'=>'1',
			                            '8,8'=>'3',
			                            '8,10'=>'5',
			                            '9,1'=>'7',
			                            '9,3'=>'9',
			                            '9,5'=>'11',
			                            '9,7'=>'1',
			                            '9,9'=>'3',
			                            '9,11'=>'5',
			                            '0,0'=>'5',
			                            '0,2'=>'7',
			                            '0,4'=>'9',
			                            '0,6'=>'11',
			                            '0,8'=>'1',
			                            '0,10'=>'3',
			                            '1,1'=>'5',
			                            '1,3'=>'7',
			                            '1,5'=>'9',
			                            '1,7'=>'11',
			                            '1,9'=>'1',
			                            '1,11'=>'3',
			                            '2,0'=>'3',
			                            '2,2'=>'5',
			                            '2,4'=>'7',
			                            '2,6'=>'9',
			                            '2,8'=>'11',
			                            '2,10'=>'1',
			                            '3,1'=>'3',
			                            '3,3'=>'5',
			                            '3,5'=>'7',
			                            '3,7'=>'9',
			                            '3,9'=>'11',
			                            '3,11'=>'1',
					                );
    public $xdad_amduong  = array
    							( 
	                              '0,4' =>'3',
	                              '1,4' =>'1',
	                              '0,5' =>'4',
	                              '1,5' =>'2',
	                              '0,6' =>'3',
	                              '1,6' =>'1',
	                              '0,7' =>'4',
	                              '1,7' =>'2',
	                              '0,8' =>'3',
	                              '1,8' =>'1',
	                              '0,9' =>'4',
	                              '1,9' =>'2',
	                              '0,0' =>'3',
	                              '1,0' =>'1',
	                              '0,1' =>'4', 
	                              '1,1' =>'2',
	                              '0,2' =>'3',
	                              '1,2' =>'1',
	                              '0,3' =>'4',
	                              '1,3' =>'2',
	                         	);
    public $xdad_nam_nu   = array
    						(
	                            '1' => 'Dương nam',
	                            '2' => 'Âm nam',
	                            '3' => 'Dương nữ',
	                            '4' => 'Âm nữ',
	                        );
    public $xdht_duong_nam_am_nu = array
    								(
                                        '18'=>'3',
                                        '28'=>'4',
                                        '38'=>'5',
                                        '48'=>'4',
                                        '58'=>'7',
                                        '68'=>'8',
                                        '78'=>'9',
                                        '88'=>'10',
                                        '98'=>'11',
                                        '108'=>'12',
                                        '118'=>'1',
                                        '128'=>'2',
                                        '10'=>'3',
                                        '20'=>'4',
                                        '30'=>'5',
                                        '40'=>'4',
                                        '50'=>'7',
                                        '60'=>'8',
                                        '70'=>'9',
                                        '80'=>'10',
                                        '90'=>'11',
                                        '100'=>'12',
                                        '110'=>'1',
                                        '120'=>'2',
                                        '14'=>'3',
                                        '24'=>'4',
                                        '34'=>'5',
                                        '44'=>'4',
                                        '54'=>'7',
                                        '64'=>'8',
                                        '74'=>'9',
                                        '84'=>'10',
                                        '94'=>'11',
                                        '104'=>'12',
                                        '114'=>'1',
                                        '124'=>'2',
                                        '15'=>'4',
                                        '25'=>'5',
                                        '35'=>'6',
                                        '45'=>'7',
                                        '55'=>'8',
                                        '65'=>'9',
                                        '75'=>'10',
                                        '85'=>'11',
                                        '95'=>'12',
                                        '105'=>'1',
                                        '115'=>'2',
                                        '125'=>'3',
                                        '19'=>'4',
                                        '29'=>'5',
                                        '39'=>'6',
                                        '49'=>'7',
                                        '59'=>'8',
                                        '69'=>'9',
                                        '79'=>'10',
                                        '89'=>'11',
                                        '99'=>'12',
                                        '109'=>'1',
                                        '119'=>'2',
                                        '129'=>'3',
                                        '11'=>'4',
                                        '21'=>'5',
                                        '31'=>'6',
                                        '41'=>'7',
                                        '51'=>'8',
                                        '61'=>'9',
                                        '71'=>'10',
                                        '81'=>'11',
                                        '91'=>'12',
                                        '101'=>'1',
                                        '111'=>'2',
                                        '121'=>'3',
                                        '12'=>'2',
                                        '22'=>'3',
                                        '32'=>'4',
                                        '42'=>'5',
                                        '52'=>'6',
                                        '62'=>'7',
                                        '72'=>'8',
                                        '82'=>'9',
                                        '92'=>'10',
                                        '102'=>'11',
                                        '112'=>'12',
                                        '122'=>'1',
                                        '16'=>'2',
                                        '26'=>'3',
                                        '36'=>'4',
                                        '46'=>'5',
                                        '56'=>'6',
                                        '66'=>'7',
                                        '76'=>'8',
                                        '86'=>'9',
                                        '96'=>'10',
                                        '106'=>'11',
                                        '116'=>'12',
                                        '126'=>'1',
                                        '110'=>'2',
                                        '210'=>'3',
                                        '310'=>'4',
                                        '410'=>'5',
                                        '510'=>'6',
                                        '610'=>'7',
                                        '710'=>'8',
                                        '810'=>'9',
                                        '910'=>'10',
                                        '1010'=>'11',
                                        '1110'=>'12',
                                        '1210'=>'1',
                                        '111'=>'10',
                                        '211'=>'11',
                                        '311'=>'12',
                                        '411'=>'1',
                                        '511'=>'2',
                                        '611'=>'3',
                                        '711'=>'4',
                                        '811'=>'5',
                                        '911'=>'6',
                                        '1011'=>'7',
                                        '1111'=>'8',
                                        '1211'=>'9',
                                        '13'=>'10',
                                        '23'=>'11',
                                        '33'=>'12',
                                        '43'=>'1',
                                        '53'=>'2',
                                        '63'=>'3',
                                        '73'=>'4',
                                        '83'=>'5',
                                        '93'=>'6',
                                        '103'=>'7',
                                        '113'=>'8',
                                        '123'=>'9',
                                        '17'=>'10',
                                        '27'=>'11',
                                        '37'=>'12',
                                        '47'=>'1',
                                        '57'=>'2',
                                        '67'=>'3',
                                        '77'=>'4',
                                        '87'=>'5',
                                        '97'=>'6',
                                        '107'=>'7',
                                        '117'=>'8',
                                        '127'=>'9',
                               		); 
    public $xdht_am_nam_duong_nu = array
    								(
                                        '18'=>'3',
                                        '28'=>'2',
                                        '38'=>'1',
                                        '48'=>'12',
                                        '58'=>'11',
                                        '68'=>'10',
                                        '78'=>'9',
                                        '88'=>'8',
                                        '98'=>'7',
                                        '108'=>'6',
                                        '118'=>'5',
                                        '128'=>'4',
                                        '10'=>'3',
                                        '20'=>'2',
                                        '30'=>'1',
                                        '40'=>'12',
                                        '50'=>'11',
                                        '60'=>'10',
                                        '70'=>'9',
                                        '80'=>'8',
                                        '90'=>'7',
                                        '100'=>'6',
                                        '110'=>'5',
                                        '120'=>'4',
                                        '14'=>'3',
                                        '24'=>'2',
                                        '34'=>'1',
                                        '44'=>'12',
                                        '54'=>'11',
                                        '64'=>'10',
                                        '74'=>'9',
                                        '84'=>'8',
                                        '94'=>'7',
                                        '104'=>'6',
                                        '114'=>'5',
                                        '124'=>'4',
                                        '15'=>'4',
                                        '25'=>'3',
                                        '35'=>'2',
                                        '45'=>'1',
                                        '55'=>'12',
                                        '65'=>'11',
                                        '75'=>'10',
                                        '85'=>'9',
                                        '95'=>'8',
                                        '105'=>'7',
                                        '115'=>'6',
                                        '125'=>'5',
                                        '19'=>'4',
                                        '29'=>'3',
                                        '39'=>'2',
                                        '49'=>'1',
                                        '59'=>'12',
                                        '69'=>'11',
                                        '79'=>'10',
                                        '89'=>'9',
                                        '99'=>'8',
                                        '109'=>'7',
                                        '119'=>'6',
                                        '129'=>'5',
                                        '11'=>'4',
                                        '21'=>'3',
                                        '31'=>'2',
                                        '41'=>'1',
                                        '51'=>'12',
                                        '61'=>'11',
                                        '71'=>'10',
                                        '81'=>'9',
                                        '91'=>'8',
                                        '101'=>'7',
                                        '111'=>'6',
                                        '121'=>'5',
                                        '12'=>'2',
                                        '22'=>'1',
                                        '32'=>'12',
                                        '42'=>'11',
                                        '52'=>'10',
                                        '62'=>'9',
                                        '72'=>'8',
                                        '82'=>'7',
                                        '92'=>'6',
                                        '102'=>'5',
                                        '112'=>'4',
                                        '122'=>'3',
                                        '16'=>'2',
                                        '26'=>'1',
                                        '36'=>'12',
                                        '46'=>'11',
                                        '56'=>'10',
                                        '66'=>'9',
                                        '76'=>'8',
                                        '86'=>'7',
                                        '96'=>'6',
                                        '106'=>'5',
                                        '116'=>'4',
                                        '126'=>'3',
                                        '110'=>'2',
                                        '210'=>'1',
                                        '310'=>'12',
                                        '410'=>'11',
                                        '510'=>'10',
                                        '610'=>'9',
                                        '710'=>'8',
                                        '810'=>'7',
                                        '910'=>'6',
                                        '1010'=>'5',
                                        '1110'=>'4',
                                        '1210'=>'3',
                                        '111'=>'10',
                                        '211'=>'9',
                                        '311'=>'8',
                                        '411'=>'7',
                                        '511'=>'6',
                                        '611'=>'5',
                                        '711'=>'4',
                                        '811'=>'3',
                                        '911'=>'2',
                                        '1011'=>'1',
                                        '1111'=>'12',
                                        '1211'=>'11',
                                        '13'=>'10',
                                        '23'=>'9',
                                        '33'=>'8',
                                        '43'=>'7',
                                        '53'=>'6',
                                        '63'=>'5',
                                        '73'=>'4',
                                        '83'=>'3',
                                        '93'=>'2',
                                        '103'=>'1',
                                        '113'=>'12',
                                        '123'=>'11',
                                        '17'=>'10',
                                        '27'=>'9',
                                        '37'=>'8',
                                        '47'=>'7',
                                        '57'=>'6',
                                        '67'=>'5',
                                        '77'=>'4',
                                        '87'=>'3',
                                        '97'=>'2',
                                        '107'=>'1',
                                        '117'=>'12',
                                        '127'=>'11',
                                	); 
	public $xdlt_duong_nam_am_nu = array
									(
                                        '12'=>'4',
                                        '22'=>'3',
                                        '32'=>'2',
                                        '42'=>'1',
                                        '52'=>'12',
                                        '62'=>'11',
                                        '72'=>'10',
                                        '82'=>'9',
                                        '92'=>'8',
                                        '102'=>'7',
                                        '112'=>'6',
                                        '122'=>'5',
                                        '16'=>'4',
                                        '26'=>'3',
                                        '36'=>'2',
                                        '46'=>'1',
                                        '56'=>'12',
                                        '66'=>'11',
                                        '76'=>'10',
                                        '86'=>'9',
                                        '96'=>'8',
                                        '106'=>'7',
                                        '116'=>'6',
                                        '126'=>'5',
                                        '110'=>'4',
                                        '210'=>'3',
                                        '310'=>'2',
                                        '410'=>'1',
                                        '510'=>'12',
                                        '610'=>'11',
                                        '710'=>'10',
                                        '810'=>'9',
                                        '910'=>'8',
                                        '1010'=>'7',
                                        '1110'=>'6',
                                        '1210'=>'5',
                                        '18'=>'11',
                                        '28'=>'10',
                                        '38'=>'9',
                                        '48'=>'8',
                                        '58'=>'7',
                                        '68'=>'6',
                                        '78'=>'5',
                                        '88'=>'4',
                                        '98'=>'3',
                                        '108'=>'2',
                                        '118'=>'1',
                                        '128'=>'12',
                                        '10'=>'11',
                                        '20'=>'10',
                                        '30'=>'9',
                                        '40'=>'8',
                                        '50'=>'7',
                                        '60'=>'6',
                                        '70'=>'5',
                                        '80'=>'4',
                                        '90'=>'3',
                                        '100'=>'2',
                                        '110'=>'1',
                                        '120'=>'12',
                                        '14'=>'11',
                                        '24'=>'10',
                                        '34'=>'9',
                                        '44'=>'8',
                                        '54'=>'7',
                                        '64'=>'6',
                                        '74'=>'5',
                                        '84'=>'4',
                                        '94'=>'3',
                                        '104'=>'2',
                                        '114'=>'1',
                                        '124'=>'12',
                                        '111'=>'11',
                                        '211'=>'10',
                                        '311'=>'9',
                                        '411'=>'8',
                                        '511'=>'7',
                                        '611'=>'6',
                                        '711'=>'5',
                                        '811'=>'4',
                                        '911'=>'3',
                                        '1011'=>'2',
                                        '1111'=>'1',
                                        '1211'=>'12',
                                        '13'=>'11',
                                        '23'=>'10',
                                        '33'=>'9',
                                        '43'=>'8',
                                        '53'=>'7',
                                        '63'=>'6',
                                        '73'=>'5',
                                        '83'=>'4',
                                        '93'=>'3',
                                        '103'=>'2',
                                        '113'=>'1',
                                        '123'=>'12',
                                        '17'=>'11',
                                        '27'=>'10',
                                        '37'=>'9',
                                        '47'=>'8',
                                        '57'=>'7',
                                        '67'=>'6',
                                        '77'=>'5',
                                        '87'=>'4',
                                        '97'=>'3',
                                        '107'=>'2',
                                        '117'=>'1',
                                        '127'=>'12',
                                        '15'=>'11',
                                        '25'=>'10',
                                        '35'=>'9',
                                        '45'=>'8',
                                        '55'=>'7',
                                        '65'=>'6',
                                        '75'=>'5',
                                        '85'=>'4',
                                        '95'=>'3',
                                        '105'=>'2',
                                        '115'=>'1',
                                        '125'=>'12',
                                        '19'=>'11',
                                        '29'=>'10',
                                        '39'=>'9',
                                        '49'=>'8',
                                        '59'=>'7',
                                        '69'=>'6',
                                        '79'=>'5',
                                        '89'=>'4',
                                        '99'=>'3',
                                        '109'=>'2',
                                        '119'=>'1',
                                        '129'=>'12',
                                        '11'=>'11',
                                        '21'=>'10',
                                        '31'=>'9',
                                        '41'=>'8',
                                        '51'=>'7',
                                        '61'=>'6',
                                        '71'=>'5',
                                        '81'=>'4',
                                        '91'=>'3',
                                        '101'=>'2',
                                        '111'=>'1',
                                        '121'=>'12',
                                  	);
	public $xdlt_am_nam_duong_nu = array
									(
	                                    '12'=>'4',
	                                    '22'=>'5',
	                                    '32'=>'6',
	                                    '42'=>'7',
	                                    '52'=>'8',
	                                    '62'=>'9',
	                                    '72'=>'10',
	                                    '82'=>'11',
	                                    '92'=>'12',
	                                    '102'=>'1',
	                                    '112'=>'2',
	                                    '122'=>'3',
	                                    '16'=>'4',
	                                    '26'=>'5',
	                                    '36'=>'6',
	                                    '46'=>'7',
	                                    '56'=>'8',
	                                    '66'=>'9',
	                                    '76'=>'10',
	                                    '86'=>'11',
	                                    '96'=>'12',
	                                    '106'=>'1',
	                                    '116'=>'2',
	                                    '126'=>'3',
	                                    '110'=>'4',
	                                    '210'=>'5',
	                                    '310'=>'6',
	                                    '410'=>'7',
	                                    '510'=>'8',
	                                    '610'=>'9',
	                                    '710'=>'10',
	                                    '810'=>'11',
	                                    '910'=>'12',
	                                    '1010'=>'1',
	                                    '1110'=>'2',
	                                    '1210'=>'3',
	                                    '18'=>'11',
	                                    '28'=>'12',
	                                    '38'=>'1',
	                                    '48'=>'2',
	                                    '58'=>'3',
	                                    '68'=>'4',
	                                    '78'=>'5',
	                                    '88'=>'6',
	                                    '98'=>'7',
	                                    '108'=>'8',
	                                    '118'=>'9',
	                                    '128'=>'10',
	                                    '10'=>'11',
	                                    '20'=>'12',
	                                    '30'=>'1',
	                                    '40'=>'2',
	                                    '50'=>'3',
	                                    '60'=>'4',
	                                    '70'=>'5',
	                                    '80'=>'6',
	                                    '90'=>'7',
	                                    '100'=>'8',
	                                    '110'=>'9',
	                                    '120'=>'10',
	                                    '14'=>'11',
	                                    '24'=>'12',
	                                    '34'=>'1',
	                                    '44'=>'2',
	                                    '54'=>'3',
	                                    '64'=>'4',
	                                    '74'=>'5',
	                                    '84'=>'6',
	                                    '94'=>'7',
	                                    '104'=>'8',
	                                    '114'=>'9',
	                                    '124'=>'10',
	                                    '111'=>'11',
	                                    '211'=>'12',
	                                    '311'=>'1',
	                                    '411'=>'2',
	                                    '511'=>'3',
	                                    '611'=>'4',
	                                    '711'=>'5',
	                                    '811'=>'6',
	                                    '911'=>'7',
	                                    '1011'=>'8',
	                                    '1111'=>'9',
	                                    '1211'=>'10',
	                                    '13'=>'11',
	                                    '23'=>'12',
	                                    '33'=>'1',
	                                    '43'=>'2',
	                                    '53'=>'3',
	                                    '63'=>'4',
	                                    '73'=>'5',
	                                    '83'=>'6',
	                                    '93'=>'7',
	                                    '103'=>'8',
	                                    '113'=>'9',
	                                    '123'=>'10',
	                                    '17'=>'11',
	                                    '27'=>'12',
	                                    '37'=>'1',
	                                    '47'=>'2',
	                                    '57'=>'3',
	                                    '67'=>'4',
	                                    '77'=>'5',
	                                    '87'=>'6',
	                                    '97'=>'7',
	                                    '107'=>'8',
	                                    '117'=>'9',
	                                    '127'=>'10',
	                                    '15'=>'11',
	                                    '25'=>'12',
	                                    '35'=>'1',
	                                    '45'=>'2',
	                                    '55'=>'3',
	                                    '66'=>'4',
	                                    '75'=>'5',
	                                    '85'=>'6',
	                                    '95'=>'7',
	                                    '105'=>'8',
	                                    '115'=>'9',
	                                    '125'=>'10',
	                                    '19'=>'11',
	                                    '29'=>'12',
	                                    '39'=>'1',
	                                    '49'=>'2',
	                                    '59'=>'3',
	                                    '69'=>'4',
	                                    '79'=>'5',
	                                    '89'=>'6',
	                                    '99'=>'7',
	                                    '109'=>'8',
	                                    '119'=>'9',
	                                    '129'=>'10',
	                                    '11'=>'11',
	                                    '21'=>'12',
	                                    '31'=>'1',
	                                    '41'=>'2',
	                                    '51'=>'3',
	                                    '61'=>'4',
	                                    '71'=>'5',
	                                    '81'=>'6',
	                                    '91'=>'7',
	                                    '101'=>'8',
	                                    '111'=>'9',
	                                    '121'=>'10',
	                            	); 
	public $vong_sao_thai_tue  = array
									(
			                           '121'=>'Thái tuế',
			                           '122'=>'Thiếu dương',
			                           '123'=>'Tang môn',
			                           '124'=>'Thiếu âm',
			                           '125'=>'Quan phù',
			                           '126'=>'Tử phù',
			                           '127'=>'Tuế phá',
			                           '128'=>'Long  đức',
			                           '129'=>'Bạch hổ',
			                           '130'=>'Phúc đức',
			                           '131'=>'Điếu khách',
			                           '132'=>'Trực phù',
			                      	);
	public $sao_theo_loc_ton   = array
									( 
				                          '133'=>'Bác sỹ', 
					                      '134'=>'Lực sỹ', 
					                      '135'=>'Thanh long', 
					                      '136'=>'Tiểu Hao', 
					                      '137'=>'Tướng quân', 
					                      '138'=>'Tấu thư', 
					                      '139'=>'Phi liêm', 
					                      '140'=>'Hỷ thần', 
					                      '141'=>'Bệnh phù', 
					                      '142'=>'Đại hao', 
					                      '143'=>'Phục binh', 
					                      '144'=>'Quan phủ'
				                    );
	public $sao_theo_truong_sinh = array
										(  
				                           '145'=>'Trường sinh', 
				                           '146'=>'Mộc dục', 
				                           '147'=>'Quan đới', 
				                           '148'=>'Lâm quan', 
				                           '149'=>'Đế vượng', 
				                           '150'=>'Suy', 
				                           '151'=>'Bệnh', 
				                           '152'=>'Tử', 
				                           '153'=>'Mộ', 
				                           '154'=>'Tuyệt', 
				                           '155'=>'Thai', 
				                           '156'=>'Dưỡng'
				                      	);
	public $ct_sao_theo_loc_ton = array
										(
										   '1'=>'133', 
				                           '2'=>'134', 
				                           '3'=>'135', 
				                           '4'=>'136', 
				                           '5'=>'137', 
				                           '6'=>'138', 
				                           '7'=>'139', 
				                           '8'=>'140', 
				                           '9'=>'141', 
				                           '10'=>'142', 
				                           '11'=>'143', 
				                           '12'=>'144', 
										);
	public $ct_sao_theo_truong_sinh = array
										(
										   '1'=>'145', 
				                           '2'=>'146', 
				                           '3'=>'147', 
				                           '4'=>'148', 
				                           '5'=>'149', 
				                           '6'=>'150', 
				                           '7'=>'151', 
				                           '8'=>'152', 
				                           '9'=>'153', 
				                           '10'=>'154', 
				                           '11'=>'155', 
				                           '12'=>'156', 
										);
	public $xac_dinh_can_cung_dai_van = array
											(
								                    '41'=>'6',
								                    '51'=>'8',
								                    '61'=>'0',
								                    '71'=>'2',
								                    '81'=>'4',
								                    '91'=>'6',
								                    '01'=>'8',
								                    '11'=>'0',
								                    '21'=>'2',
								                    '31'=>'4',
								                    '42'=>'7',
								                    '52'=>'9',
								                    '62'=>'1',
								                    '72'=>'3',
								                    '82'=>'5',
								                    '92'=>'7',
								                    '02'=>'9',
								                    '12'=>'1',
								                    '22'=>'3',
								                    '32'=>'5',
								                    '43'=>'6',
								                    '53'=>'8',
								                    '63'=>'0',
								                    '73'=>'2',
								                    '83'=>'4',
								                    '44'=>'7',
								                    '54'=>'9',
								                    '64'=>'1',
								                    '74'=>'3',
								                    '84'=>'5',
								                    '45'=>'8',
								                    '55'=>'0',
								                    '65'=>'2',
								                    '75'=>'4',
								                    '85'=>'6',
								                    '46'=>'9',
								                    '56'=>'1',
								                    '66'=>'3',
								                    '76'=>'5',
								                    '86'=>'7',
								                    '47'=>'0',
								                    '57'=>'2',
								                    '67'=>'4',
								                    '77'=>'6',
								                    '87'=>'8',
								                    '48'=>'1',
								                    '58'=>'3',
								                    '68'=>'5',
								                    '78'=>'7',
								                    '88'=>'9',
								                    '49'=>'2',
								                    '59'=>'4',
								                    '69'=>'6',
								                    '79'=>'8',
								                    '89'=>'0',
								                    '410'=>'3',
								                    '510'=>'5',
								                    '610'=>'7',
								                    '710'=>'9',
								                    '810'=>'1',
								                    '411'=>'4',
								                    '511'=>'6',
								                    '611'=>'8',
								                    '711'=>'0',
								                    '811'=>'2',
								                    '412'=>'5',
								                    '512'=>'7',
								                    '612'=>'9',
								                    '712'=>'1',
								                    '812'=>'3',
								                    '93'=>'6',
								                    '03'=>'8',
								                    '13'=>'0',
								                    '23'=>'2',
								                    '33'=>'4',
								                    '94'=>'7',
								                    '04'=>'9',
								                    '14'=>'1',
								                    '24'=>'3',
								                    '34'=>'5',
								                    '95'=>'8',
								                    '05'=>'0',
								                    '15'=>'2',
								                    '25'=>'4',
								                    '35'=>'6',
								                    '96'=>'9',
								                    '06'=>'1',
								                    '16'=>'3',
								                    '26'=>'5',
								                    '36'=>'7',
								                    '97'=>'0',
								                    '07'=>'2',
								                    '17'=>'4',
								                    '27'=>'6',
								                    '37'=>'8',
								                    '98'=>'1',
								                    '08'=>'3',
								                    '18'=>'5',
								                    '28'=>'7',
								                    '38'=>'9',
								                    '99'=>'2',
								                    '09'=>'4',
								                    '19'=>'6',
								                    '29'=>'8',
								                    '39'=>'0',
								                    '910'=>'3',
								                    '010'=>'5',
								                    '110'=>'7',
								                    '210'=>'9',
								                    '310'=>'1',
								                    '911'=>'4',
								                    '011'=>'6',
								                    '1,11'=>'8',
								                    '2,11'=>'0',
								                    '3,11'=>'2',
								                    '912'=>'5',
								                    '012'=>'7',
								                    '112'=>'9',
								                    '212'=>'1',
								                    '312'=>'3',
								           		);
	public $chu_menh    = array
							(
                                '0'=>'Tham lang',
                                '1'=>'Cự môn',
                                '2'=>'Lộc tồn',
                                '3'=>'Văn khúc',
                                '4'=>'Liêm trinh',
                                '5'=>'Vũ khúc',
                                '6'=>'Phá quân',
                                '7'=>'Vũ khúc',
                                '8'=>'Liêm trinh',
                                '9'=>'Văn khúc',
                                '10'=>'Lộc tồn',
                                '11'=>'Cự môn',
                          	);
	public $chu_than    = array
							(
	                            '0'=>'Linh tinh',
	                            '1'=>'Thiên tướng',
	                            '2'=>'Thiên lương',
	                            '3'=>'Thiên đồng',
	                            '4'=>'Văn xương',
	                            '5'=>'Thiên cơ',
	                            '6'=>'Hỏa tinh',
	                            '7'=>'Thiên tướng',
	                            '8'=>'Thiên lương',
	                            '9'=>'Thiên đồng',
	                            '10'=>'Văn xương',
	                            '11'=>'Thiên cơ',
	                        );
	public $xddh_duong_nam_am_nu = array
								(
                                    '1,1'=>'2',
                                    '1,2'=>'12',
                                    '1,3'=>'22',
                                    '1,4'=>'32',
                                    '1,5'=>'42',
                                    '1,6'=>'52',
                                    '1,7'=>'62',
                                    '1,8'=>'72',
                                    '1,9'=>'82',
                                    '1,10'=>'92',
                                    '1,11'=>'102',
                                    '1,12'=>'112',
                                    '2,1'=>'3',
                                    '2,2'=>'13',
                                    '2,3'=>'23',
                                    '2,4'=>'33',
                                    '2,5'=>'43',
                                    '2,6'=>'53',
                                    '2,7'=>'63',
                                    '2,8'=>'73',
                                    '2,9'=>'83',
                                    '2,10'=>'93',
                                    '2,11'=>'103',
                                    '2,12'=>'113',
                                    '3,1'=>'4',
                                    '3,2'=>'14',
                                    '3,3'=>'24',
                                    '3,4'=>'34',
                                    '3,5'=>'44',
                                    '3,6'=>'54',
                                    '3,7'=>'64',
                                    '3,8'=>'74',
                                    '3,9'=>'84',
                                    '3,10'=>'94',
                                    '3,11'=>'104',
                                    '3,12'=>'114',
                                    '4,1'=>'5',
                                    '4,2'=>'15',
                                    '4,3'=>'25',
                                    '4,4'=>'35',
                                    '4,5'=>'45',
                                    '4,6'=>'55',
                                    '4,7'=>'65',
                                    '4,8'=>'75',
                                    '4,9'=>'85',
                                    '4,10'=>'95',
                                    '4,11'=>'105',
                                    '4,12'=>'115',
                                    '5,1'=>'6',
                                    '5,2'=>'16',
                                    '5,3'=>'26',
                                    '5,4'=>'36',
                                    '5,5'=>'46',
                                    '5,6'=>'56',
                                    '5,7'=>'66',
                                    '5,8'=>'76',
                                    '5,9'=>'86',
                                    '5,10'=>'96',
                                    '5,11'=>'106',
                                    '5,12'=>'116',
                                );
	public $xddh_am_nam_duong_nu = array
									(
	                                    '1,1'=>'2',
	                                    '1,12'=>'12',
	                                    '1,11'=>'22',
	                                    '1,10'=>'32',
	                                    '1,9'=>'42',
	                                    '1,8'=>'52',
	                                    '1,7'=>'62',
	                                    '1,6'=>'72',
	                                    '1,5'=>'82',
	                                    '1,4'=>'92',
	                                    '1,3'=>'102',
	                                    '1,4'=>'112',
	                                    '2,1'=>'3',
	                                    '2,12'=>'13',
	                                    '2,11'=>'23',
	                                    '2,10'=>'33',
	                                    '2,9'=>'43',
	                                    '2,8'=>'53',
	                                    '2,7'=>'63',
	                                    '2,6'=>'73',
	                                    '2,5'=>'83',
	                                    '2,4'=>'93',
	                                    '2,3'=>'103',
	                                    '2,2'=>'113',
	                                    '3,1'=>'4',
	                                    '3,12'=>'14',
	                                    '3,11'=>'24',
	                                    '3,10'=>'34',
	                                    '3,9'=>'44',
	                                    '3,8'=>'54',
	                                    '3,7'=>'64',
	                                    '3,6'=>'74',
	                                    '3,5'=>'84',
	                                    '3,4'=>'94',
	                                    '3,3'=>'104',
	                                    '3,2'=>'114',
	                                    '4,1'=>'5',
	                                    '4,12'=>'15',
	                                    '4,11'=>'25',
	                                    '4,10'=>'35',
	                                    '4,9'=>'45',
	                                    '4,8'=>'55',
	                                    '4,7'=>'65',
	                                    '4,6'=>'75',
	                                    '4,5'=>'85',
	                                    '4,4'=>'95',
	                                    '4,3'=>'105',
	                                    '4,2'=>'115',
	                                    '5,1'=>'6',
	                                    '5,12'=>'16',
	                                    '5,11'=>'26',
	                                    '5,10'=>'36',
	                                    '5,9'=>'46',
	                                    '5,8'=>'56',
	                                    '5,7'=>'66',
	                                    '5,6'=>'76',
	                                    '5,5'=>'86',
	                                    '5,4'=>'96',
	                                    '5,3'=>'106',
	                                    '5,2'=>'116',
                                	);
	public $xdth_tieu_han_nam = array
								(
	                                '0,0'=>'11',
	                                '0,1'=>'12',
	                                '0,2'=>'1',
	                                '0,3'=>'2',
	                                '0,4'=>'3',
	                                '0,5'=>'4',
	                                '0,6'=>'5',
	                                '0,7'=>'6',
	                                '0,8'=>'7',
	                                '0,9'=>'8',
	                                '0,10'=>'9',
	                                '0,11'=>'10',
	                                '1,0'=>'7',
	                                '1,1'=>'8',
	                                '1,2'=>'9',
	                                '1,3'=>'10',
	                                '1,4'=>'11',
	                                '1,5'=>'12',
	                                '1,6'=>'1',
	                                '1,7'=>'2',
	                                '1,8'=>'3',
	                                '1,9'=>'4',
	                                '1,10'=>'5',
	                                '1,11'=>'6',
	                                '2,0'=>'3',
	                                '2,1'=>'4',
	                                '2,2'=>'5',
	                                '2,3'=>'6',
	                                '2,4'=>'7',
	                                '2,5'=>'8',
	                                '2,6'=>'9',
	                                '2,7'=>'10',
	                                '2,8'=>'11',
	                                '2,9'=>'12',
	                                '2,10'=>'1',
	                                '2,11'=>'2',
	                                '3,0'=>'11',
	                                '3,1'=>'12',
	                                '3,2'=>'1',
	                                '3,3'=>'2',
	                                '3,4'=>'3',
	                                '3,5'=>'4',
	                                '3,6'=>'5',
	                                '3,7'=>'6',
	                                '3,8'=>'7',
	                                '3,9'=>'8',
	                                '3,10'=>'9',
	                                '3,11'=>'10',
	                                '4,0'=>'7',
	                                '4,1'=>'8',
	                                '4,2'=>'9',
	                                '4,3'=>'10',
	                                '4,4'=>'11',
	                                '4,5'=>'12',
	                                '4,6'=>'1',
	                                '4,7'=>'2',
	                                '4,8'=>'3',
	                                '4,9'=>'4',
	                                '4,10'=>'5',
	                                '4,11'=>'6',
	                                '5,0'=>'3',
	                                '5,1'=>'4',
	                                '5,2'=>'5',
	                                '5,3'=>'6',
	                                '5,4'=>'7',
	                                '5,5'=>'8',
	                                '5,6'=>'9',
	                                '5,7'=>'10',
	                                '5,8'=>'11',
	                                '5,9'=>'12',
	                                '5,10'=>'1',
	                                '5,11'=>'2',
	                                '6,0'=>'11',
	                                '6,1'=>'12',
	                                '6,2'=>'1',
	                                '6,3'=>'2',
	                                '6,4'=>'3',
	                                '6,5'=>'4',
	                                '6,6'=>'5',
	                                '6,7'=>'6',
	                                '6,8'=>'7',
	                                '6,9'=>'8',
	                                '6,10'=>'9',
	                                '6,11'=>'10',
	                                '7,0'=>'7',
	                                '7,1'=>'8',
	                                '7,2'=>'9',
	                                '7,3'=>'10',
	                                '7,4'=>'11',
	                                '7,5'=>'12',
	                                '7,6'=>'1',
	                                '7,7'=>'2',
	                                '7,8'=>'3',
	                                '7,9'=>'4',
	                                '7,10'=>'5',
	                                '7,11'=>'6',
	                                '8,0'=>'3',
	                                '8,1'=>'4',
	                                '8,2'=>'5',
	                                '8,3'=>'6',
	                                '8,4'=>'7',
	                                '8,5'=>'8',
	                                '8,6'=>'9',
	                                '8,7'=>'10',
	                                '8,8'=>'11',
	                                '8,9'=>'12',
	                                '8,10'=>'1',
	                                '8,11'=>'2',
	                                '9,0'=>'11',
	                                '9,1'=>'12',
	                                '9,2'=>'1',
	                                '9,3'=>'2',
	                                '9,4'=>'3',
	                                '9,5'=>'4',
	                                '9,6'=>'5',
	                                '9,7'=>'6',
	                                '9,8'=>'7',
	                                '9,9'=>'8',
	                                '9,10'=>'9',
	                                '9,11'=>'10',
	                                '10,0'=>'7',
	                                '10,1'=>'8',
	                                '10,2'=>'9',
	                                '10,3'=>'10',
	                                '10,4'=>'11',
	                                '10,5'=>'12',
	                                '10,6'=>'1',
	                                '10,7'=>'2',
	                                '10,8'=>'3',
	                                '10,9'=>'4',
	                                '10,10'=>'5',
	                                '10,11'=>'6',
	                                '11,0'=>'3',
	                                '11,1'=>'4',
	                                '11,2'=>'5',
	                                '11,3'=>'6',
	                                '11,4'=>'7',
	                                '11,5'=>'8',
	                                '11,6'=>'9',
	                                '11,7'=>'10',
	                                '11,8'=>'11',
	                                '11,9'=>'12',
	                                '11,10'=>'1',
	                                '11,11'=>'2',
	                           	);
	public $xdth_tieu_han_nu = array
								(
                                    '0,0'=>'11',
                                    '0,1'=>'10',
                                    '0,2'=>'9',
                                    '0,3'=>'8',
                                    '0,4'=>'7',
                                    '0,5'=>'6',
                                    '0,6'=>'5',
                                    '0,7'=>'4',
                                    '0,8'=>'3',
                                    '0,9'=>'2',
                                    '0,10'=>'1',
                                    '0,11'=>'12',
                                    '1,0'=>'9',
                                    '1,1'=>'8',
                                    '1,2'=>'7',
                                    '1,3'=>'6',
                                    '1,4'=>'5',
                                    '1,5'=>'4',
                                    '1,6'=>'3',
                                    '1,7'=>'2',
                                    '1,8'=>'1',
                                    '1,9'=>'12',
                                    '1,10'=>'11',
                                    '1,11'=>'10',
                                    '2,0'=>'7',
                                    '2,1'=>'6',
                                    '2,2'=>'5',
                                    '2,3'=>'4',
                                    '2,4'=>'3',
                                    '2,5'=>'2',
                                    '2,6'=>'1',
                                    '2,7'=>'12',
                                    '2,8'=>'11',
                                    '2,9'=>'10',
                                    '2,10'=>'9',
                                    '2,11'=>'8',
                                    '3,0'=>'5',
                                    '3,1'=>'4',
                                    '3,2'=>'6',
                                    '3,3'=>'2',
                                    '3,4'=>'1',
                                    '3,5'=>'12',
                                    '3,6'=>'11',
                                    '3,7'=>'10',
                                    '3,8'=>'9',
                                    '3,9'=>'8',
                                    '3,10'=>'7',
                                    '3,11'=>'6',
                                    '4,0'=>'3',
                                    '4,1'=>'2',
                                    '4,2'=>'1',
                                    '4,3'=>'12',
                                    '4,4'=>'11',
                                    '4,5'=>'10',
                                    '4,6'=>'9',
                                    '4,7'=>'8',
                                    '4,8'=>'7',
                                    '4,9'=>'6',
                                    '4,10'=>'5',
                                    '4,11'=>'4',
                                    '5,0'=>'1',
                                    '5,1'=>'12',
                                    '5,2'=>'11',
                                    '5,3'=>'10',
                                    '5,4'=>'9',
                                    '5,5'=>'8',
                                    '5,6'=>'7',
                                    '5,7'=>'6',
                                    '5,8'=>'5',
                                    '5,9'=>'4',
                                    '5,10'=>'3',
                                    '5,11'=>'2',
                                    '6,0'=>'11',
                                    '6,1'=>'10',
                                    '6,2'=>'9',
                                    '6,3'=>'8',
                                    '6,4'=>'7',
                                    '6,5'=>'6',
                                    '6,6'=>'5',
                                    '6,7'=>'4',
                                    '6,8'=>'3',
                                    '6,9'=>'2',
                                    '6,10'=>'1',
                                    '6,11'=>'12',
                                    '7,0'=>'9',
                                    '7,1'=>'8',
                                    '7,2'=>'7',
                                    '7,3'=>'6',
                                    '7,4'=>'5',
                                    '7,5'=>'4',
                                    '7,6'=>'3',
                                    '7,7'=>'2',
                                    '7,8'=>'1',
                                    '7,9'=>'12',
                                    '7,10'=>'11',
                                    '7,11'=>'10',
                                    '8,0'=>'7',
                                    '8,1'=>'6',
                                    '8,2'=>'5',
                                    '8,3'=>'4',
                                    '8,4'=>'3',
                                    '8,5'=>'2',
                                    '8,6'=>'1',
                                    '8,7'=>'12',
                                    '8,8'=>'11',
                                    '8,9'=>'10',
                                    '8,10'=>'9',
                                    '8,11'=>'8',
                                    '9,0'=>'5',
                                    '9,1'=>'4',
                                    '9,2'=>'3',
                                    '9,3'=>'2',
                                    '9,4'=>'1',
                                    '9,5'=>'12',
                                    '9,6'=>'11',
                                    '9,7'=>'10',
                                    '9,8'=>'9',
                                    '9,9'=>'8',
                                    '9,10'=>'7',
                                    '9,11'=>'6',
                                    '10,0'=>'3',
                                    '10,1'=>'2',
                                    '10,2'=>'1',
                                    '10,3'=>'12',
                                    '10,4'=>'11',
                                    '10,5'=>'10',
                                    '10,6'=>'9',
                                    '10,7'=>'8',
                                    '10,8'=>'7',
                                    '10,9'=>'6',
                                    '10,10'=>'5',
                                    '10,11'=>'4',
                                    '11,0'=>'1',
                                    '11,1'=>'12',
                                    '11,2'=>'11',
                                    '11,3'=>'10',
                                    '11,4'=>'9',
                                    '11,5'=>'8',
                                    '11,6'=>'7',
                                    '11,7'=>'6',
                                    '11,8'=>'5',
                                    '11,9'=>'4',
                                    '11,10'=>'3',
                                    '11,11'=>'2',  
                              	); 
	public $sld_sao_theo_chi_nam = array
									(
                                        '1'=>'L Thái tuế',
                                        '2'=>'L Thiên khốc',
                                        '3'=>'L Thiên hư',
                                        '4'=>'L Tang môn',
                                        '5'=>'L Bạch hổ',
                                        '6'=>'L Thiên mã',
                                        //'7'=>'L Lộc tồn',
										//'8'=>'L Kình dương',
										//'9'=>'L Đà la'
                                    );
	public $sld_an_sao_theo_chi_nam = array
										(
                                            '0,1'=>'1',
                                            '1,2'=>'1',
                                            '2,3'=>'1',
                                            '3,4'=>'1',
                                            '4,5'=>'1',
                                            '5,6'=>'1',
                                            '6,7'=>'1',
                                            '7,8'=>'1',
                                            '8,9'=>'1',
                                            '9,10'=>'1',
                                            '10,11'=>'1',
                                            '11,12'=>'1',
                                            '0,7'=>'2',
                                            '1,6'=>'2',
                                            '2,5'=>'2',
                                            '3,4'=>'2',
                                            '4,3'=>'2',
                                            '5,2'=>'2',
                                            '6,1'=>'2',
                                            '7,12'=>'2',
                                            '8,11'=>'2',
                                            '9,10'=>'2',
                                            '10,9'=>'2',
                                            '11,8'=>'2',
                                            '0,7'=>'3',
                                            '1,8'=>'3',
                                            '2,9'=>'3',
                                            '3,10'=>'3',
                                            '4,11'=>'3',
                                            '5,12'=>'3',
                                            '6,1'=>'3',
                                            '7,2'=>'3',
                                            '8,3'=>'3',
                                            '9,4'=>'3',
                                            '10,5'=>'3',
                                            '11,6'=>'3',
                                            '0,3'=>'4',
                                            '1,4'=>'4',
                                            '2,5'=>'4',
                                            '3,6'=>'4',
                                            '4,7'=>'4',
                                            '5,8'=>'4',
                                            '6,9'=>'4',
                                            '7,10'=>'4',
                                            '8,11'=>'4',
                                            '9,12'=>'4',
                                            '10,1'=>'4',
                                            '11,2'=>'4',
                                            '0,9'=>'5',
                                            '1,10'=>'5',
                                            '2,11'=>'5',
                                            '3,12'=>'5',
                                            '4,1'=>'5',
                                            '5,2'=>'5',
                                            '6,3'=>'5',
                                            '7,4'=>'5',
                                            '8,5'=>'5',
                                            '9,12'=>'5',
                                            '10,7'=>'5',
                                            '11,8'=>'5',
                                            '0,3'=>'6',
                                            '1,12'=>'6',
                                            '2,9'=>'6',
                                            '3,6'=>'6',
                                            '4,3'=>'6',
                                            '5,12'=>'6',
                                            '6,9'=>'6',
                                            '7,6'=>'6',
                                            '8,3'=>'6',
                                            '9,12'=>'6',
                                            '10,9'=>'6',
                                            '11,6'=>'6',
	                                    ); 
	public $sld_sao_theo_can_nam = array
										(
                                         '1'=>'L Lộc tồn',
                                         '2'=>'L Kình dương',
                                         '3'=>'L Đà la',
	                                    ); 
	public $sld_an_sao_theo_can_nam = array
										(
                                            '4,3'=>'1',
                                            '5,4'=>'1',
                                            '6,6'=>'1',
                                            '7,7'=>'1',
                                            '8,6'=>'1',
                                            '9,7'=>'1',
                                            '0,9'=>'1',
                                            '1,10'=>'1',
                                            '2,12'=>'1',
                                            '3,1'=>'1',
                                            '4,4'=>'2',
                                            '5,5'=>'2',
                                            '6,7'=>'2',
                                            '7,8'=>'2',
                                            '8,7'=>'2',
                                            '9,8'=>'2',
                                            '0,10'=>'2',
                                            '1,11'=>'2',
                                            '2,1'=>'2',
                                            '3,2'=>'2',
                                            '4,2'=>'3',
                                            '5,3'=>'3',
                                            '6,5'=>'3',
                                            '7,6'=>'3',
                                            '8,5'=>'3',
                                            '9,6'=>'3',
                                            '0,8'=>'3',
                                            '1,9'=>'3',
                                            '2,11'=>'3',
                                            '3,12'=>'3',
	                                    ); 
	public $nhnabm_mang_can_chi = array
									(
					                    '4,0'=>'1',
					                    '5,1'=>'1',
					                    '6,2'=>'2',
					                    '7,3'=>'2',
					                    '8,4'=>'3',
					                    '9,5'=>'3',
					                    '0,6'=>'4',
					                    '1,7'=>'4',
					                    '2,8'=>'5',
					                    '3,9'=>'5',
					                    '4,10'=>'6',
					                    '5,11'=>'6',
					                    '6,0'=>'7',
					                    '7,1'=>'7',
					                    '8,2'=>'8',
					                    '9,3'=>'8',
					                    '0,4'=>'9',
					                    '1,5'=>'9',
					                    '2,6'=>'10',
					                    '3,7'=>'10',
					                    '4,8'=>'11',
					                    '5,9'=>'11',
					                    '6,10'=>'12',
					                    '7,11'=>'12',
					                    '8,0'=>'13',
					                    '9,1'=>'13',
					                    '0,2'=>'14',
					                    '1,3'=>'14',
					                    '2,4'=>'15',
					                    '3,5'=>'15',
					                    '4,6'=>'16',
					                    '5,7'=>'16',
					                    '6,8'=>'17',
					                    '7,9'=>'17',
					                    '8,10'=>'18',
					                    '9,11'=>'18',
					                    '0,0'=>'19',
					                    '1,1'=>'19',
					                    '2,2'=>'20',
					                    '3,3'=>'20',
					                    '4,4'=>'21',
					                    '5,5'=>'21',
					                    '6,6'=>'22',
					                    '7,7'=>'22',
					                    '8,8'=>'23',
					                    '9,9'=>'23',
					                    '0,10'=>'24',
					                    '1,11'=>'24',
					                    '2,0'=>'25',
					                    '3,1'=>'25',
					                    '4,2'=>'26',
					                    '5,3'=>'26',
					                    '6,4'=>'27',
					                    '7,5'=>'27',
					                    '8,6'=>'28',
					                    '9,7'=>'28',
					                    '0,8'=>'29',
					                    '1,9'=>'29',
					                    '2,10'=>'30',
					                    '3,11'=>'30',
					          		);
	public $nguhanhNow = array(
		'1'=>'Kim',
		'2'=>'Hỏa',
		'3'=>'Mộc',
		'4'=> 'Thổ',
		'5'=>'Kim',
		'6'=> 'Hỏa',
		'7'=> 'Thủy',
		'8'=>  'Thổ',
		'9'=>  'Kim',
		'10'=>  'Mộc',
		'11'=>  'Thủy',
		'12'=>  'Thổ',
		'13'=>  'Thủy',
		'14'=>  'Mộc',
		'15'=>  'Thủy',
		'16'=>  'Kim',
		'17'=>  'Hỏa',
		'18'=>  'Mộc',
		'19'=>  'Thổ',
		'20'=>   'Kim',
		'21'=>   'Hỏa',
		'22'=>   'Thủy',
		'23'=>   'Thổ',
		'24'=>   'Kim',
		'25'=>  'Mộc',
		'26'=>  'Thủy',
		'27'=>  'Thổ',
		'28'=>  'Hỏa',
		'29'=>   'Mộc',
		'30'=>   'Thủy',
	);
	public $nhnabm_mang_result = array
									(
					                    '1'=>'Hải Trung Kim',
					                    '2'=>'Lư Trung Hỏa',
					                    '3'=>'Đại Lâm Mộc',
					                   '4'=> 'Lộ Bàng Thổ',
					                    '5'=>'Kiếm Phong Kim',
					                   '6'=> 'Sơn Đầu Hỏa',
					                   '7'=> 'Giản Hạ Thủy',
					                  '8'=>  'Thành Đầu Thổ',
					                  '9'=>  'Bạch Lạp Kim',
					                  '10'=>  'Dương Liễu Mộc',
					                  '11'=>  'Tuyền Trung Thủy',
					                  '12'=>  'Ốc Thượng Thổ',
					                  '13'=>  'Tích Lịch Thủy',
					                  '14'=>  'Tùng Bách Mộc',
					                  '15'=>  'Trường Lưu Thủy',
					                  '16'=>  'Sa Trung Kim',
					                  '17'=>  'Sơn Hạ Hỏa',
					                  '18'=>  'Bình Địa Mộc',
					                  '19'=>  'Bích Thượng Thổ',
					                 '20'=>   'Kim Bạch Kim',
					                 '21'=>   'Phúc Dăng Hỏa',
					                 '22'=>   'Thiên Hà Thủy',
					                 '23'=>   'Đại Dịch Thổ',
					                 '24'=>   'Thoa Xuyến Kim',
					                  '25'=>  'Tang Đố Mộc',
					                  '26'=>  'Đại khê Thủy',
					                  '27'=>  'Sa Trung Thổ',
					                  '28'=>  'Thiên Thượng Hỏa',
					                 '29'=>   'Thạch Lựu Mộc',
					                 '30'=>   'Đại Hải Thủy',
	        						);
	public $color_chinh_dieu = array
								(
		                            '1'=>'3',
		                            '2'=>'3',
		                            '3'=>'3',
		                            '4'=>'3',
		                            '5'=>'1',
		                            '6'=>'1',
		                            '7'=>'1',
		                            '8'=>'1',
		                            '9'=>'5',
		                            '10'=>'5',
		                            '11'=>'5',
		                            '12'=>'5',
		                            '13'=>'3',
		                            '14'=>'3',
		                            '15'=>'3',
		                            '16'=>'3',
		                            '17'=>'2',
		                            '18'=>'2',
		                            '19'=>'2',
		                            '20'=>'2',
		                            '21'=>'4',
		                            '22'=>'4',
		                            '23'=>'4',
		                            '24'=>'4',
		                            '25'=>'1',
		                            '26'=>'1',
		                            '27'=>'1',
		                            '28'=>'1',
		                            '29'=>'2',
		                            '30'=>'2',
		                            '31'=>'2',
		                            '32'=>'2',
		                            '33'=>'1',
		                            '34'=>'1',
		                            '35'=>'1',
		                            '36'=>'1',
		                            '37'=>'1',
		                            '38'=>'1',
		                            '39'=>'1',
		                            '40'=>'1',
		                            '41'=>'2',
		                            '42'=>'2',
		                            '43'=>'2',
		                            '44'=>'2',
		                            '45'=>'5',
		                            '46'=>'5',
		                            '47'=>'5',
		                            '48'=>'5',
		                            '49'=>'1',
		                            '50'=>'1',
		                            '51'=>'1',
		                            '52'=>'1',
		                            '53'=>'4',
		                            '54'=>'4',
		                            '55'=>'4',
		                            '56'=>'4',
		                        );
	public $color_sao_theo_gio = array
									(
		                                '1'=>'1',
		                                '2'=>'5',
		                                '3'=>'5',
		                                '4'=>'4',
		                                '5'=>'3',
		                                '6'=>'3',
		                         	);
	public $color_sao_theo_thang = array
									(
		                                '1'=>'1',
		                                '2'=>'4',
		                                '3'=>'3',
		                                '4'=>'1',
		                                '5'=>'1',
		                                '6'=>'3',
		                                '7'=>'4',
		                         	);
    public $color_sao_theo_can_va_cung = array
    										(
				                                '1'=>'5',
				                                '2'=>'4',
				                                '3'=>'5',
				                                '4'=>'4',
				                                '5'=>'2',
				                                '6'=>'5',
				                                '7'=>'3',
				                                '8'=>'3',
				                                '9'=>'3',
				                                '10'=>'4',
				                                '11'=>'1',
				                                '12'=>'4',
				                         	);
    public $color_sao_theo_chi_va_cung = array
    										(
				                                '1'=>'2',
				                                '2'=>'5',
				                                '3'=>'3',
				                                '4'=>'2',
				                                '5'=>'3',
				                                '6'=>'4',
				                                '7'=>'4',
				                                '8'=>'3',
				                                '9'=>'5',
				                                '10'=>'1',
				                                '11'=>'3',
				                                '12'=>'3',
				                                '13'=>'1',
				                                '14'=>'1',
				                                '15'=>'1',
				                                '16'=>'2',
				                                '17'=>'2',
				                         	);
    public $color_vong_sao_thai_tue    = array
    										(
				                               '1'=>'3',
				                                '2'=>'3',
				                                '3'=>'2',
				                                '4'=>'1',
				                                '5'=>'3',
				                                '6'=>'3',
				                                '7'=>'3',
				                                '8'=>'1',
				                                '9'=>'5',
				                                '10'=>'4',
				                                '11'=>'3',
				                                '12'=>'3',
				                         	);
    public $color_sao_theo_loc_ton     = array
    										(
			                                    '1'=>'1',
				                                '2'=>'3',
				                                '3'=>'1',
				                                '4'=>'3',
				                                '5'=>'2',
				                                '6'=>'5',
				                                '7'=>'3',
				                                '8'=>'3',
				                                '9'=>'4',
				                                '10'=>'3',
				                                '11'=>'3',
				                                '12'=>'3',
				                         	);
    public $muiTenTamHop	= array(
    	'1' => '1,5,9',
		'2' => '2,6,10',
		'3' => '3,7,11',
		'4' => '4,8,12',
		'5' => '5,9,1',
		'6' => '6,10,2',
		'7' => '7,11,3',
		'8' => '8,12,4',
		'9' => '9,1,5,',
		'10' => '10,2,6',
		'11' => '11,3,7',
		'12' => '12,4,8',
    );

    public $cungKetHop	= array(
    	'1' => '1,2,5,7,9',
		'2' => '2,6,8,10,1',
		'3' => '3,7,9,11,12',
		'4' => '4,8,10,11,12',
		'5' => '5,9,10,11,1',
		'6' => '6,9,10,12,2',
		'7' => '7,8,11,1,3',
		'8' => '8,12,2,4,7',
		'9' => '9,1,3,5,6',
		'10' => '10,2,4,5,6',
		'11' => '11,3,4,5,7',
		'12' => '12,3,4,6,8',
    );

    public $arrCungHopNhat	= array(
    	'18' => '183',
		'19' => '183',
		'20' => '183',
		'21' => '183',
		'22' => '182',
		'23' => '182',
		'24' => '182',
		'25' => '182',
		'26' => '181',
		'27' => '181',
		'28' => '181',
		'29' => '181',
		'30' => '180',
		'31' => '180',
		'32' => '180',
		'33' => '180',
		'34' => '179',
		'35' => '179',
		'36' => '179',
		'37' => '179',
		'38' => '178',
		'39' => '178',
		'40' => '178',
		'41' => '178',
		'42' => '177',
		'43' => '177',
		'44' => '177',
		'45' => '177',
		'46' => '176',
		'47' => '176',
		'48' => '176',
		'49' => '176',
		'50' => '175',
		'51' => '175',
		'52' => '175',
		'53' => '175',
		'54'=> '174',
		'55'=> '174',
		'56'=> '174',
		'57'=> '174',
		'58'=> '173',
		'59'=> '173',
		'60'=> '173',
		'61'=> '173',
		'62'=> '172',
		'63'=> '172',
		'64'=> '172',
		'65'=> '172',
		'66'=> '171',
		'67'=> '171',
		'68'=> '171',
		'69'=> '171',
		'70'=> '170',
		'71'=> '170',
		'72'=> '170',
		'73'=> '170',
    );

    public $arr_saochieu  = array
                                (
                                    1=>'La Hầu',
                                    2=>'Thổ Tú',   
                                    3=>'Thủy Diệu',
                                    4=>'Thái Bạch',
                                    5=>'Thái Dương',
                                    6=>'Vân Hớn',
                                    7=>'Kế Đô',
                                    8=>'Thái Âm',
                                    9=>'Mộc Đức',
                                );
    public $arr_saochieutuvi_nam = array
                                    (
                                        10=>1,
                                        11=>2,   
                                        12=>3,
                                        13=>4,
                                        14=>5,
                                        15=>6,
                                        16=>7,
                                        17=>8,
                                        18=>9,
                                        19=>1,
                                        20=>2,   
                                        21=>3,
                                        22=>4,
                                        23=>5,
                                        24=>6,
                                        25=>7,
                                        26=>8,
                                        27=>9,
                                        28=>1,
                                        29=>2,   
                                        30=>3,
                                        31=>4,
                                        32=>5,
                                        33=>6,
                                        34=>7,
                                        35=>8,
                                        36=>9,
                                        37=>1,
                                        38=>2,   
                                        39=>3,
                                        40=>4,
                                        41=>5,
                                        42=>6,
                                        43=>7,
                                        44=>8,
                                        45=>9,
                                        46=>1,
                                        47=>2,   
                                        48=>3,
                                        49=>4,
                                        50=>5,
                                        51=>6,
                                        52=>7,
                                        53=>8,
                                        54=>9,
                                        55=>1,
                                        56=>2,   
                                        57=>3,
                                        58=>4,
                                        59=>5,
                                        60=>6,
                                        61=>7,
                                        62=>8,
                                        63=>9,
                                        64=>1,
                                        65=>2,   
                                        66=>3,
                                        67=>4,
                                        68=>5,
                                        69=>6,
                                        70=>7,
                                        71=>8,
                                        72=>9,
                                        73=>1,
                                        74=>2,   
                                        75=>3,
                                        76=>4,
                                        77=>5,
                                        78=>6,
                                        79=>7,
                                        80=>8,
                                        81=>9,
                                        82=>1,
                                        83=>2,   
                                        84=>3,
                                        85=>4,
                                        86=>5,
                                        87=>6,
                                        88=>7,
                                        89=>8,
                                        90=>9,
                                        91=>1,
                                        92=>2,   
                                        93=>3,
                                        94=>4,
                                        95=>5,
                                        96=>6,
                                        97=>7,
                                        98=>8,
                                        99=>9,
                                    );
    public $arr_saochieutuvi_nu  = array
                                        (
                                            10=>7,
                                            11=>6,
                                            12=>9,
                                            13=>8,
                                            14=>2,
                                            15=>1,
                                            16=>5,
                                            17=>4,
                                            18=>3,
                                            19=>7,
                                            20=>6,
                                            21=>9,
                                            22=>8,
                                            23=>2,
                                            24=>1,
                                            25=>5,
                                            26=>4,
                                            27=>3,
                                            28=>7,
                                            29=>6,
                                            30=>9,
                                            31=>8,
                                            32=>2,
                                            33=>1,
                                            34=>5,
                                            35=>4,
                                            36=>3,
                                            37=>7,
                                            38=>6,
                                            39=>9,
                                            40=>8,
                                            41=>2,
                                            42=>1,
                                            43=>5,
                                            44=>4,
                                            45=>3,
                                            46=>7,
                                            47=>6,
                                            48=>9,
                                            49=>8,
                                            50=>2,
                                            51=>1,
                                            52=>5,
                                            53=>4,
                                            54=>3,
                                            55=>7,
                                            56=>6,
                                            57=>9,
                                            58=>8,
                                            59=>2,
                                            60=>1,
                                            61=>5,
                                            62=>4,
                                            63=>3,
                                            64=>7,
                                            65=>6,
                                            66=>9,
                                            67=>8,
                                            68=>2,
                                            69=>1,
                                            70=>5,
                                            71=>4,
                                            72=>3,
                                            73=>7,
                                            74=>6,
                                            75=>9,
                                            76=>8,
                                            77=>2,
                                            78=>1,
                                            79=>5,
                                            80=>4,
                                            81=>3,
                                            82=>7,
                                            83=>6,
                                            84=>9,
                                            85=>8,
                                            86=>2,
                                            87=>1,
                                            88=>5,
                                            89=>4,
                                            90=>3,
                                            91=>7,
                                            92=>6,
                                            93=>9,
                                            94=>8,
                                            95=>2,
                                            96=>1,
                                            97=>5,
                                            98=>4,
                                            99=>3,

                                        );
    public $arr_saohan  = array
                            (
                                1 => 'Tam Kheo',
                                2 => 'Ngũ Hộ',
                                3 => 'Thiên Tinh',
                                4 => 'Toán Tận',
                                5 => 'Thiên la',
                                6 => 'Địa Võng',
                                7 => 'Diêm Vương',
                                8 => 'Huỳnh Tuyền',
                            );
    public $arr_saohantuvi_nam = array
                                    (   
                                        11 => 1,
                                        12 => 2,
                                        13 => 3,
                                        14 => 4,
                                        15 => 5,
                                        16 => 6,
                                        17 => 7,
                                        18 => 8,
                                        19 => 1,
                                        21 => 2,
                                        22 => 3,
                                        23 => 4,
                                        24 => 5,
                                        25 => 6,
                                        26 => 7,
                                        27 => 8,
                                        20 => 1,
                                        29 => 2,
                                        31 => 3,
                                        32 => 4,
                                        33 => 5,
                                        34 => 6,
                                        35 => 7,
                                        36=> 8,
                                        28 => 1,
                                        30 => 2,
                                        39 => 3,
                                        41 => 4,
                                        42 => 5,
                                        43 => 6,
                                        44 => 7,
                                        45 => 8,
                                        37 => 1,
                                        38 => 2,
                                        40 => 3,
                                        49 => 4,
                                        51 => 5,
                                        52 => 6,
                                        53 => 7,
                                        54 => 8,
                                        46 => 1,
                                        47 => 2,
                                        48 => 3,
                                        50 => 4,
                                        59 => 5,
                                        61 => 6,
                                        62 => 7,
                                        63 => 8,
                                        55 => 1,
                                        56 => 2,
                                        57 => 3,
                                        58 => 4,
                                        60 => 5,
                                        69 => 6,
                                        71 => 7,
                                        72 => 8,
                                        64 => 1,
                                        65 => 2,
                                        66 => 3,
                                        67 => 4,
                                        68 => 5,
                                        70 => 6,
                                        79 => 7,
                                        81 => 8,
                                        73 => 1,
                                        74 => 2,
                                        75 => 3,
                                        76 => 4,
                                        77 => 5,
                                        78 => 6,
                                        80 => 7,
                                        89 => 8,
                                        82 => 1,
                                        83 => 2,
                                        84 => 3,
                                        85 => 4,
                                        86 => 5,
                                        87 => 6,
                                        88 => 7,
                                        90 => 8,
                                        91 => 1,
                                        92 => 2,
                                        93 => 3,
                                        94 => 4,
                                        95 => 5,
                                        96 => 6,
                                        97 => 7,
                                        98 => 8,

                                    );
    public $arr_saohantuvi_nu  = array
                                    (
                                        11 => 3,
                                        12 => 2,
                                        13 => 1,
                                        14 => 8,
                                        15 => 7,
                                        16 => 6,
                                        17 => 5,
                                        18 => 4,
                                        19 => 3,
                                        21 => 2,
                                        22 => 1,
                                        23 => 8,
                                        24 => 7,
                                        25 => 6,
                                        26 => 5,
                                        27 => 4,
                                        20 => 3,
                                        29 => 2,
                                        31 => 1,
                                        32 => 8,
                                        33 => 7,
                                        34 => 6,
                                        35 => 5,
                                        36 => 4,
                                        28 => 3,
                                        30 => 2,
                                        39 => 1,
                                        41 => 8,
                                        42 => 7,
                                        43 => 6,
                                        44 => 5,
                                        45 => 4,
                                        37 => 3,
                                        38 => 2,
                                        40 => 1,
                                        49 => 8,
                                        51 => 7,
                                        52 => 6,
                                        54 => 4,
                                        46 => 3,
                                        47 => 2,
                                        48 => 1,
                                        50 => 8,
                                        59 => 7,
                                        61 => 6,
                                        62 => 5,
                                        63 => 4,
                                        55 => 3,
                                        56 => 2,
                                        57 => 1,
                                        58 => 8,
                                        60 => 7,
                                        69 => 6,
                                        71 => 5,
                                        72 => 4,
                                        64 => 3,
                                        65 => 2,
                                        66 => 1,
                                        67 => 8,
                                        68 => 7,
                                        70 => 6,
                                        79 => 5,
                                        81 => 4,
                                        73 => 3,
                                        74 => 2,
                                        75 => 1,
                                        76 => 8,
                                        77 => 7,
                                        78 => 6,
                                        80 => 5,
                                        89 => 4,
                                        82 => 3,
                                        83 => 2,
                                        84 => 1,
                                        85 => 8,
                                        86 => 7,
                                        87 => 6,
                                        88 => 5,
                                        90 => 4,
                                        91 => 3,
                                        92 => 2,
                                        93 => 1,
                                        94 => 8,
                                        95 => 7,
                                        96 => 6,
                                        97 => 5,
                                        98 => 4,

                                    );
    
    public function __construct(){
        // parent::__construct();
    }

   	/**
	 * Ham  lay thong tin phan tu cua mang $con_giap
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $con_giap neu khong tim thay phan tu $key
	 */
    public function con_giap( $key = null )
	    {
	    	$mang = $this->con_giap;
	       	if( $key != null ){
	            return $mang[$key];
	       	}else{
	            return $mang;
	       	}
	   }

	/**
	 * Ham  lay thong tin phan tu cua mang $cung
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $cung neu khong tim thay phan tu $key
	 */
	public function cung( $key = null )
		{
			$mang = $this->cung;
	       	if( $key != null ){
	            return $mang[$key];
	       	}else{
	            return $mang;
	       	}
	    }
	
	/**
	 * Ham  lay thong tin phan tu cua mang $cuc
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $cuc neu khong tim thay phan tu $key
	 */
	public function cuc( $key = null )
		{
			$mang = $this->cuc;
	       if( $key != null ){
	            return $mang[$key + 12];
	       }else{
	            return $mang;
	       }
	   }
	
	/**
	 * Ham  lay thong tin phan tu cua mang $can
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $can neu khong tim thay phan tu $key
	 */
	public function can( $key = null )
		{
			$mang = $this->can;
	       if( $key != null ){
	            return $mang[$key];
	       }else{
	            return $mang;
	       }
	    }
	
	/**
	 * Ham  lay thong tin phan tu cua mang $chi
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $chi neu khong tim thay phan tu $key
	 */
	public function chi( $key = null )
		{
			$mang = $this->chi;
	       if( $key != null ){
	            return $mang[$key];
	       }else{
	            return $mang;
	       }
	    }

	/**
	 * Ham  lay thong tin phan tu cua mang $sao_chinh_tinh
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $sao_chinh_tinh neu khong tim thay phan tu $key
	 */
    public function sao_chinh_tinh( $key )
	    {
	    	$mang = $this->sao_chinh_tinh;
	                $ketqua = array('sao1'=>'','sao2'=>'');   
	                $arr = explode(',',$key);
	                // dd($arr, 1);
	                if( isset( $arr[0] ) && $arr[0] != null ){
	                     $ketqua['sao1'] = '<span class="color_'.$this->color_chinh_dieu($arr[0] -17 ).'">'.$mang[ $arr[0]].'</span>';
	                    $ketqua['sao1_number']	 = $arr[0];
	                }  
	                if( isset( $arr[1] ) && $arr[1] != null ){
	                     $ketqua['sao2'] = '<span class="color_'.$this->color_chinh_dieu($arr[1] -17 ).'">'.$mang[ $arr[1]  ].'</span>';
	                     $ketqua['sao2_number']	 = $arr[1];
	                }  
	                return $ketqua;   
	    }

                        
	/**
	 * Ham  lay thong tin phan tu cua mang $chinh_tinh
	 *
	 * @param	string key
	 * @return	mixed : phan tu cua mang tai $key, hoac mang $chinh_tinh neu khong tim thay phan tu $key
	 */
	public function Chinh_tinh( $key = null )
		{
			$mang = $this->chinh_tinh;
			// dd(' Chính tinh : '.$key,1);
	       if( $key != null ){
	            return $mang[$key];
	       }else{
	            return $mang;
	       }
	    }

	/**
	 * Ham  tinh gio sinh
	 *
	 * @param	array $ngaysinh
	 * @return	int 
	 */
	public function gio_sinh( $ngaysinh )
		{
			$time = ( $ngaysinh['gio'] * 60 *60 ) + ( 30*60 );
			if(( $time >= 82800 && $time <= 86340 ) || ($time >= 0 && $time <= 3540 ) ){
			$gio = 1;
			}elseif( $time >= 3600 && $time <= 10740 ){
			$gio = 2;
			}elseif( $time >= 10800 && $time <= 17940 ){
			$gio = 3;
			}elseif( $time >= 18000 && $time <= 25140 ){
			$gio = 4;
			}elseif( $time >= 25200 && $time <= 32340 ){
			$gio = 5;
			}elseif( $time >= 32400 && $time <= 39540 ){
			$gio = 6;
			}elseif( $time >= 39600 && $time <= 46740 ){
			$gio = 7;
			}elseif( $time >= 46800 && $time <= 53940 ){
			$gio = 8;
			}elseif( $time >= 54000 && $time <= 61140 ){
			$gio = 9;
			}elseif( $time >= 61200 && $time <= 68340 ){
			$gio = 10;
			}elseif( $time >= 68400 && $time <= 75540 ){
			$gio = 11;
			}elseif( $time >= 75600 && $time <= 82740 ){
			$gio = 12;
			} 

			return $gio;
	    }

	/**
	 * Ham  tinh nam am lich dua vao nam duong lich
	 *
	 * @param	string $nam_duong_lich
	 * @return	mixed
	 */
	public function am_lich( $nam_duong_lich, $rt = 1 )
		{
		   $mang['can'] =  substr( $nam_duong_lich, -1, 1 );
	       $chi = ( $nam_duong_lich % 12 ) + 8;
	       if( $chi >= 12 ){
	           $chi = $chi - 12;
	       }
	      $mang['chi'] = $chi;
	      if( $rt == 1 ){
	          return $mang['can'];
	      }elseif( $rt == 2 ){
	          return $mang['chi'];
	      }else{
	        return $mang;
	      }
	    }

	 /**
	 * Ham  xem cuc
	 *
	 * @param	string $can
	 * @param	string $cung
	 * @return	mixed
	 */
	public function xem_cuc( $can,$cung )
		{
		       $key = $can.$cung;
		       $mang = $this->ct_xem_cuc;
               if( $key != null ){
                   return $mang[$key];
               }else{
                   return $mang;
               }     
	                        
	           
	    }

	/**
	 * Ham  xem menh than
	 *
	 * @param	string $thang
	 * @param	string $gio
	 * @return	string
	 */
	public function menh_than( $thang,$gio )
		{
			$mang = $this->menh_than;
	        $key = $thang.$gio;
	        return $mang[$key];              
	    }

	/**
	 * Ham  xem tu vi
	 *
	 * @param	string $ngaysinh
	 * @param	string $cuc
	 * @return	string
	 */
    public function tu_vi( $ngaysinh, $cuc )
    	{

    		$mang = $this->tu_vi;
	        $key = $ngaysinh.$cuc; 
	        return $mang[$key];       
	    }
 
 	/**
	 * Ham  xac dinh  vi tri sao chinh tinh
	 *
	 * @param	string $vi_tri_sao
	 * @param	bool $flip
	 * @return	string
	 */
	public function xac_dinh_sao_chinh_tinh( $vi_tri_sao, $flip = false )
		{
			$mang = $this->xac_dinh_sao_chinh_tinh;
             if( isset( $mang[ $vi_tri_sao ] ) ){
                return $mang[ $vi_tri_sao ];
             }
	                     
	    }    
	/**
	 * Ham sao theo gio sinh
	 *
	 * @param	string $key
	 * @return	array
	 */
    public function sao_theo_gio_sinh( $key = null )
	    {            
	    			$mang = $this->sao_theo_gio_sinh;
	                  $ketqua = array();   
	                  $arr = explode(',',$key);
	                  if( isset( $arr[0] ) && $arr[0] != null ){
	                  	$html = '<span class="color_'.$this->color_sao_theo_gio($arr[0] - 73 ).'">'.$mang[ $arr[0] ].'</span>';
	                     if( in_array($arr[0], array(5 + 73,6 + 73) ) ){
	                        $ketqua['right'][] = $html;
	                        $ketqua['right_number'][] = $arr[0];
	                     }else{
	                        $ketqua['left'][] = $html;
	                        $ketqua['left_number'][] = $arr[0];
	                     }
	                     
	                  }  
	                  if( isset( $arr[1] ) && $arr[1] != null ){
	                  	$html = '<span class="color_'.$this->color_sao_theo_gio($arr[1] - 73 ).'">'.$mang[ $arr[1] ].'</span>';
	                     if( in_array($arr[1], array(5 + 73,6 + 73)) ){
	                        $ketqua['right'][] = $html;
	                        $ketqua['right_number'][] = $arr[1];
	                     }else{
	                        $ketqua['left'][] = $html;
	                        $ketqua['left_number'][] = $arr[1];
	                     }
	                  } 
	                  return $ketqua;
	    }

	// Xem sao theo gio sinh

	/**
	 * Ham  xem sao theo gio sinh
	 *
	 * @param	string $gio
	 * @param	string $cung
	 * @return	string
	 */
	public function xem_sao_theo_gio_sinh( $gio, $cung )
		{
			$mang = $this->ct_xem_sao_theo_gio_sinh;
	        $key = $gio.','.$cung;
	        if( $key != null && isset( $mang[ $key ] ) ){
	              return $mang[ $key ];
	        }
	    }

	/**
	 * Ham sao theo thang sinh
	 *
	 * @param	string $key
	 * @return	array
	 */
    public function sao_theo_thang_sinh( $key = null )
	    {
	    			$mang = $this->sao_theo_thang_sinh;
	                  $ketqua = array();   
	                  $arr = explode(',',$key);
	                  if( isset( $arr[0] ) && $arr[0] != null ){
	                  	$html = '<span class="color_'.$this->color_sao_theo_thang($arr[0] - 79).'">'.$mang[ $arr[0] ].'</span>';
	                     if( in_array($arr[0], array(5 + 79 ,6 + 79)) ){
	                        $ketqua['right'][] =  $html;
	                        $ketqua['right_number'][] = $arr[0];
	                     }else{
	                        $ketqua['left'][] =  $html;
	                        $ketqua['left_number'][] = $arr[0];
	                     }
	                  }  
	                  if( isset( $arr[1] ) && $arr[1] != null ){
	                  	$html = '<span class="color_'.$this->color_sao_theo_thang($arr[1] - 79).'">'.$mang[ $arr[1] ].'</span>';
	                     if( in_array($arr[1], array(5 + 79 ,6 + 79)) ){
	                        $ketqua['right'][] = $html;
	                        $ketqua['right_number'][] = $arr[1];
	                     }else{
	                        $ketqua['left'][] = $html;
	                        $ketqua['left_number'][] = $arr[1];
	                     }
	                  } 
	                  return $ketqua;
	    }

	/**
	 * Ham  xem sao theo thang sinh
	 *
	 * @param	string $thang
	 * @param	string $cung
	 * @return	string
	 */
	public function xem_sao_theo_thang_sinh( $thang, $cung )
		{
					$mang = $this->ct_xem_sao_theo_thang_sinh;
	                $key = $thang.','.$cung; 
	                if( $key != null && isset( $mang[ $key ] ) ){
	                    return $mang[ $key ];
	                }             
	    }

	/**
	 * Ham  sao theo can va cung
	 *
	 * @param	string $key
	 * @return	array
	 */
    public function sao_theo_can_va_cung( $key = null )
	    {
	    	$mang = $this->sao_theo_can_va_cung;
            $ketqua = array();   
            $arr = explode(',',$key);
            if( isset( $arr[0] ) && $arr[0] != null ){
            	$html = '<span class="color_'.$this->color_sao_theo_can_va_cung($arr[0] - 86 ).'">'.$mang[ $arr[0] ].'</span>';
                if( in_array($arr[0], array(1 + 86 ,3 + 86 ,11 + 86 )) ){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[0];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[0];
                }
            }  
            if( isset( $arr[1] ) && $arr[1] != null ){
            	$html = '<span class="color_'.$this->color_sao_theo_can_va_cung($arr[1] - 86 ).'">'.$mang[ $arr[1] ].'</span>';
                if( in_array($arr[1], array(1 + 86 ,3 + 86 ,11 + 86 )) ){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[1];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[1];
                }
            } 
            if( isset( $arr[2] ) && $arr[2] != null ){
            	$html = '<span class="color_'.$this->color_sao_theo_can_va_cung($arr[2] - 86 ).'">'.$mang[ $arr[2]].'</span>';
                if( in_array($arr[2], array(1 + 86 ,3 + 86 ,11 + 86 )) ){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[2];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[2];
                }
            } 
            return $ketqua;                
	    }

	/**
	 * Ham  xem sao theo can va cung
	 *
	 * @param	string $can
	 * @param	string $cung
	 * @return	string
	 */
    public function xem_sao_theo_can_va_cung( $can, $cung )
	    {
	    	$mang = $this->ct_xem_sao_theo_can_va_cung;
            $key = $can.','.$cung;
                if( $key != null && isset( $mang[ $key ] ) ){
                  return $mang[ $key ];

                }           
	    }

	/**
	 * Ham  sao theo chi va cung
	 *
	 * @param	string $key
	 * @return	array
	 */
    public function sao_theo_chi_va_cung( $key = null )
	    {
	    	$mang = $this->sao_theo_chi_va_cung;
            $ketqua = array();   
            $arr = explode(',',$key);
            // dd($key,1);
            if( isset( $arr[0] ) && $arr[0] != null ){
              	$html = '<span class="color_'.$this->color_sao_theo_chi_va_cung($arr[0] - 99).'">'.$mang[ $arr[0] ].'</span>';
              	if(in_array($arr[0], array(3 +99 ,5 +99 ,6 +99 ,7 +99 ,8 +99 ,9 +99 ,10 +99 ))){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[0];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[0];
                }
            }  
            if( isset( $arr[1] ) && $arr[1] != null ){
              	$html = '<span class="color_'.$this->color_sao_theo_chi_va_cung($arr[1] - 99).'">'.$mang[ $arr[1] ].'</span>';
              	if( in_array($arr[1], array(3 +99 ,5 +99 ,6 +99 ,7 +99 ,8 +99 ,9 +99 ,10 +99 ))){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[1];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[1];
                }
            } 
            if( isset( $arr[2] ) && $arr[2] != null ){
            	$html = '<span class="color_'.$this->color_sao_theo_chi_va_cung($arr[2] - 99).'">'.$mang[ $arr[2] ].'</span>';
            	if( in_array($arr[2], array(3 +99 ,5 +99 ,6 +99 ,7 +99 ,8 +99 ,9 +99 ,10 +99 ))){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[2];
                 }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[2];
                 }
            } 
            if( isset( $arr[3] ) && $arr[3] != null ){
            	$html = '<span class="color_'.$this->color_sao_theo_chi_va_cung($arr[3] - 99).'">'.$mang[ $arr[3] ].'</span>';
            	if( in_array($arr[3], array(3 +99 ,5 +99 ,6 +99 ,7 +99 ,8 +99 ,9 +99 ,10 +99 ))){
                    $ketqua['right'][] = $html;
                    $ketqua['right_number'][] = $arr[3];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[3];
                }
            } 
            return $ketqua;          
	    }

	/**
	 * Ham  xem sao theo chi va cung
	 *
	 * @param	string $chi
	 * @param	string $cung
	 * @return	string
	 */
    public function xem_sao_theo_chi_va_cung( $chi, $cung )
	    {
	    	$mang = $this->ct_xem_sao_theo_chi_va_cung;
            $key  = $chi.','.$cung;
            if( $key != null && isset( $mang[ $key ] ) ){
                return $mang[ $key ];
            }                  
	    }

	/**
	 * Ham  sao hoa
	 *
	 * @param	array $key
	 * @return	array
	 */
    public function sao_hoa( $key = array() )
	    {
	    	$mang = $this->sao_hoa;
	    	$color = $this->sh_color;
            $ketqua = array();   
            $arr = $key;
            if( isset( $arr[0] ) && $arr[0] != null ){
            	$html = '<span class="color_'.$color[ $arr[0] - 116 ].'">'.$mang[ $arr[0]].'</span>';
                if( $arr[0] == 4 +116 ){
                    $ketqua['right'] = $html;
                    $ketqua['right_number'][] = $arr[0];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[0];
                }
            }  
            if( isset( $arr[1] ) && $arr[1] != null ){
            	$html = '<span class="color_'.$color[ $arr[1] - 116  ].'">'.$mang[ $arr[1] ].'</span>';
                if( $arr[1] == 4 + 116 ){
                     $ketqua['right'] = $html;
                     $ketqua['right_number'][] = $arr[1];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[1];
                }
            } 
            if( isset( $arr[2] ) && $arr[2] != null ){
            	$html = '<span class="color_'.$color[ $arr[2] - 116 ].'">'.$mang[ $arr[2]].'</span>';
                if( $arr[2] == 4 + 116 ){
                     $ketqua['right'] = $html;
                     $ketqua['right_number'][] = $arr[2];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[2];
                }
            } 
            if( isset( $arr[3] ) && $arr[3] != null ){
            	$html = '<span class="color_'.$color[ $arr[3] - 116 ].'">'.$mang[ $arr[3]].'</span>';
                if( $arr[3] == 4 + 116 ){
                     $ketqua['right'] = $html;
                     $ketqua['right_number'][] = $arr[3];
                }else{
                    $ketqua['left'][] = $html;
                    $ketqua['left_number'][] = $arr[3];
                }
            } 
            return $ketqua;               
	    }

	/**
	 * Ham  xem sao hoa loc va hoa quyen
	 *
	 * @param	string $can
	 * @param	string $chinhtinh
	 * @return	array
	 */
    public function xem_sao_hoa_loc_va_hoa_quyen( $can, $chinhtinh )
	    {
	    	$mang = $this->ct_xem_sao_hoa_loc_va_hoa_quyen;
            $ar_ct = explode(',',$chinhtinh);
            $rt = array();

            if( isset( $ar_ct[0] ) && $ar_ct[0] != null ){
                $key = $can.','.$this->xep_loai_chinh_tinh( $ar_ct[0] - 17 );

                if( isset( $mang[$key] ) ){
                    $rt[] = $mang[$key];
                }
                 
            }
            if( isset( $ar_ct[1] ) && $ar_ct[1] != null ){
                $key = $can.','.$this->xep_loai_chinh_tinh( $ar_ct[1] - 17 );
                if( isset( $mang[$key] ) ){
                    $rt[] = $mang[$key];
                }
            }    
            return $rt;          
	    }

	/**
	 * Ham  xep loai chinh tinh
	 *
	 * @param	int $chinhtinh
	 * @return	int
	 */
    public function xep_loai_chinh_tinh( $chinhtinh )
	    {
	        if( $chinhtinh >= 1 && $chinhtinh <= 4 ){
	            $chinhtinh = 1;
	        }elseif( $chinhtinh >=5 && $chinhtinh <= 8 ){
	            $chinhtinh = 5;
	        }elseif( $chinhtinh >=9 && $chinhtinh <= 12 ){
	            $chinhtinh = 9;
	        }elseif( $chinhtinh >=13 && $chinhtinh <= 16 ){
	            $chinhtinh = 13;
	        }elseif( $chinhtinh >=17 && $chinhtinh <= 20 ){
	            $chinhtinh = 17;
	        }elseif( $chinhtinh >=21 && $chinhtinh <= 24 ){
	            $chinhtinh = 21;
	        }elseif( $chinhtinh >=25 && $chinhtinh <= 28 ){
	            $chinhtinh = 25;
	        }elseif( $chinhtinh >=29 && $chinhtinh <= 32 ){
	            $chinhtinh = 29;
	        }elseif( $chinhtinh >=33 && $chinhtinh <= 36 ){
	            $chinhtinh = 33;
	        }elseif( $chinhtinh >=37 && $chinhtinh <= 40 ){
	            $chinhtinh = 37;
	        }elseif( $chinhtinh >=41 && $chinhtinh <= 44 ){
	            $chinhtinh = 41;
	        }elseif( $chinhtinh >=45 && $chinhtinh <= 48 ){
	            $chinhtinh = 45;
	        }elseif( $chinhtinh >=49 && $chinhtinh <= 52 ){
	            $chinhtinh = 49;
	        }elseif( $chinhtinh >=53 && $chinhtinh <= 56 ){
	            $chinhtinh = 53;
	        }
	       return $chinhtinh;
	    }
        
	/**
	 * Ham sao hoa khoa va hoa ky
	 *
	 * @param	stringt $can
	 * @param	string $chinhtinh
	 * @param	string $sao_theo_gio
	 * @param	string $sao_theo_thang
	 * @return	array
	 */
    public function sao_hoa_khoa_hoa_ky( $can, $chinhtinh = null, $sao_theo_gio = null, $sao_theo_thang = null )
	    {
	    	$mang = $this->shkhk_saochinhtinh;
	        $rt = array();
	         if( $chinhtinh != null ){
	              $ar_ct = explode(',',$chinhtinh);
	               if( isset( $ar_ct[0] ) && $ar_ct[0] != null ){
	                     $key = $can.','.$this->xep_loai_chinh_tinh( $ar_ct[0] - 17 );
	                     if( isset( $mang[$key] ) ){
	                        $rt[] = $mang[$key];
	                     }
	                     
	               }
	               if( isset( $ar_ct[1] ) && $ar_ct[1] != null ){
	                     $key = $can.','.$this->xep_loai_chinh_tinh( $ar_ct[1] - 17 );
	                     if( isset( $mang[$key] ) ){
	                        $rt[] = $mang[$key];
	                     }
	                     
	               }  
	         }
	         
		       if( $sao_theo_gio != null ){
		             $ar_g = explode(',',$sao_theo_gio);
		               if( isset( $ar_g[0] ) && $ar_g[0] != null ){
		                     $key = $can.','.($ar_g[0] - 73);
		                     if( isset( $shkhk_saogio[$key] ) ){
		                        $rt[] = $shkhk_saogio[$key];
		                     }
		                     
		               }
		               if( isset( $ar_g[1] ) && $ar_g[1] != null ){
		                     $key = $can.','.($ar_g[1] - 73);
		                     if( isset( $shkhk_saogio[$key] ) ){
		                        $rt[] = $shkhk_saogio[$key];
		                     }
		                     
		               }
		       } 
		       
		       if( $sao_theo_thang != null ){
		           $ar_t = explode(',',$sao_theo_thang);
		               if( isset( $ar_t[0] ) && $ar_t[0] != null ){
		                     $key = $can.','.($ar_t[0] - 79);
		                     if( isset( $shkhk_saothang[$key] ) ){
		                        $rt[] = $shkhk_saothang[$key];
		                     }
		                     
		               }
		               if( isset( $ar_t[1] ) && $ar_t[1] != null ){
		                     $key = $can.','.($ar_t[1] - 79);
		                     if( isset( $shkhk_saothang[$key] ) ){
		                        $rt[] = $shkhk_saothang[$key];
		                     }
		                     
		               }
		       } 
		       
		       return $this->sao_hoa( $rt );
	    }

	/**
	 * Ham  xem vi tri triet
	 *
	 * @param	string $can
	 * @return	string
	 */
	public function vi_tri_triet( $can ){
		$mang = $this->ct_vi_tri_triet;
        return $mang[$can];
    }
    
	/**
	 * Ham  xac dinh vi tri tuan
	 *
	 * @param	string $can
	 * @param	string $chi
	 * @return	string
	 */
    public function vi_tri_tuan( $can, $chi )
	    {
	         $key = $can.','.$chi;
	         $mang = $this->ct_vi_tri_tuan;
	        if( isset($mang[$key]) ){
	            return $mang[$key];
	        }
	    }

	/**
	 * Ham  xac dinh am duong
	 *
	 * @param	string $gioitinh
	 * @param	string $namsinh
	 * @param	string $ten
	 * @return	string
	 */
    public function xac_dinh_am_duong( $gioitinh, $namsinh, $ten = false )
	    {
	    	$amduong = $this->xdad_amduong;
	    	$nam_nu = $this->xdad_nam_nu;
	         $key = $gioitinh.','.$namsinh;
	             if( $ten == false ){
	                  return $amduong[$key];
	             }else{
	                  $key1 = $amduong[$key];
	                  return $nam_nu[$key1];
	             }
	    }

	/**
	 * Ham  xac dinh hoa tinh
	 *
	 * @param	string $gio
	 * @param	string $chi
	 * @param	string $gioitinh
	 * @param	string $cung
	 * @return	string
	 */
    public function xac_dinh_hoa_tinh( $gio, $chi, $gioitinh, $namsinh, $cung )
	    {
	        $key = $gio.$chi;
	        $duong_nam_am_nu = $this->xdht_duong_nam_am_nu;
                                   
            $am_nam_duong_nu =  $this->xdht_am_nam_duong_nu;
	                                   
	       $loai = $this->xac_dinh_am_duong( $gioitinh, $namsinh );
	       if( $loai == 1 || $loai == 4 ){
	          $cung_n = $duong_nam_am_nu[$key];
	       }else{
	          $cung_n = $am_nam_duong_nu[$key];
	       }
	       if( $cung == $cung_n ){
	           return '<span class="color_3">Hỏa tinh</span>';
	       }else{
	           return '';
	       }
	    }

    		
	/**
	 * Ham  xac dinhh linh tinh
	 *
	 * @param	string $gio
	 * @param	string $chi
	 * @param	string $gioitinh
	 * @param	string $namsinh
	 * @param	string $cung
	 * @return	string
	 */
    public function xac_dinh_linh_tinh( $gio, $chi, $gioitinh, $namsinh, $cung )
	    {
	            $key = $gio.$chi;
	            $duong_nam_am_nu = $this->xdlt_duong_nam_am_nu;
	            $am_nam_duong_nu = $this->xdlt_am_nam_duong_nu;
	                 
               $loai = $this->xac_dinh_am_duong( $gioitinh, $namsinh );
               if( $loai == 1 || $loai == 4 ){
                  $cung_n = $duong_nam_am_nu[$key];
               }else{
                  @$cung_n = $am_nam_duong_nu[$key];
               }
               if( $cung == $cung_n ){
                   return '<span class="color_3">Linh tinh</span>';
               }else{
                   return '';
               }
	    }

	/**
	 * Ham xem vong sao thai tue
	 *
	 * @param	string $key
	 * @return	array
	 */
    public function vong_sao_thai_tue( $key )
	    {
	    	$mang = $this->vong_sao_thai_tue;
	        $ketqua = array();
	        $html = '<span class="color_'.$this->color_vong_sao_thai_tue($key ).'">'.$mang[$key + 120 ].'</span>';

	        if( in_array($key+120, array(2 + 120 ,4 + 120 ,8 + 120 ,10 + 120 ))){
	            $ketqua['left'][] = $html;
	            $ketqua['left_number'][] = $key + 120;
	        }else{
	            $ketqua['right'][] = $html;
	            $ketqua['right_number'][] = $key + 120;
	        }
	        return $ketqua;
	    }

	/**
	 * Ham xem sao loc ton
	 *
	 * @param	string $key
	 * @return	array
	 */
    public function sao_theo_loc_ton($key)
	    {
	    	$mang = $this->sao_theo_loc_ton;
	        $ketqua = array();
	        $html = '<span class="color_'.$this->color_sao_theo_loc_ton($key).'">'.$mang[$key + 132].'</span>';
	        
	        if( in_array($key + 132, array(1 + 132,2 + 132,3 + 132,6 + 132,8 + 132))){
	            $ketqua['left'][] = $html;
	            $ketqua['left_number'][] = $key+132;
	        }else{
	            $ketqua['right'][] = $html;
	            $ketqua['right_number'][] = $key+132;
	        }
	        return $ketqua;
	    }

	/**
	 * Ham  xem sao theo truong sinh
	 *
	 * @param	strng $key
	 * @return	array
	 */
    public function sao_theo_truong_sinh($key)
	    {
	    	// $mang = $this->sao_theo_truong_sinh;
	     //    $ketqua = array();
	     //    if( in_array($key + 144, array(1 + 144,3+ 144,4 +144,5 +144,11 +144,12 +144)) ){
	     //        $ketqua['left'][] = $mang[$key + 144];
	     //        $ketqua['left_number'][] = $key + 144;
	     //    }else{
	     //        $ketqua['right'][] = $mang[$key + 144];
	     //        $ketqua['right_number'][] = $key + 144;
	     //    }
	     //    return $ketqua;
	    	$mang = $this->sao_theo_truong_sinh;
	        $ketqua = array();
	        if( $key != null ){
	        	$ketqua['center'] =  $mang[$key + 144];
	        	$ketqua['center_number'][] = $key + 144;
	        }
	        return $ketqua;

	    }

    /**
	 * Ham  xac dinh can cung dai van
	 *
	 * @param	string $can
	 * @param	string $cung
	 * @return	string
	 */
    public function xac_dinh_can_cung_dai_van($can,$cung)
	    {
	    	$mang = $this->xac_dinh_can_cung_dai_van;
	           $key = $can.$cung;
	         if( isset( $mang[$key] ) ){
	            return $mang[$key];
	         }
	    }

    /**
	 * Ham  xac dinh vi tri sao truong sinh
	 *
	 * @param	int $cuc
	 * @return	int
	 */
    public function vi_tri_sao_truong_sinh( $cuc )
	    {
	           if( $cuc == 1 || $cuc == 4 ){
	              $cung = 9;
	           }elseif( $cuc == 2 ){
	               $cung = 12;
	           }elseif( $cuc == 3 ){
	               $cung = 6;
	           }else{
	               $cung = 3;
	           }
	           
	           return $cung;
	    }
        
    
	/**
	 * Ham  xac dinh vi tri sao an quan
	 *
	 * @param	string $cung_chua_sao_van_xuong
	 * @param	string $ngaysinh
	 * @return	int
	 */
    public function vi_tri_sao_an_quan( $cung_chua_sao_van_xuong, $ngaysinh )
       {
            $vitri = $cung_chua_sao_van_xuong;
            for( $i = 1; $i < $ngaysinh-1; $i++ ){
                if( $vitri == 12 ){
                    $vitri = 0;
                }
                $vitri++;
            }
          return $vitri; 
       }

    /**
	 * Ham  xac dinh vi tri sao thien quy
	 *
	 * @param	int $cung_chua_sao_van_khuc
	 * @param	int $ngaysinh
	 * @return	int
	 */
    public function vi_tri_sao_thien_quy( $cung_chua_sao_van_khuc, $ngaysinh )
       {
            $vitri = $cung_chua_sao_van_khuc;
            for( $i = 1; $i < $ngaysinh-1; $i++ ){
                if( $vitri == 1 ){
                    $vitri = 13;
                }
                $vitri--;
            }
          return $vitri; 
       }

   /**
	 * Ham  xac dinh vi tri sao tam thai
	 *
	 * @param	int $cung_chua _sao_ta_phu
	 * @param	int $ngaysinh
	 * @return	int
	 */
    public function vi_tri_sao_tam_thai( $cung_chua_sao_ta_phu, $ngaysinh )
       {
            $vitri = $cung_chua_sao_ta_phu;
            for( $i = 1; $i < $ngaysinh; $i++ ){
                if( $vitri == 12 ){
                    $vitri = 0;
                }
                $vitri++;
            }
          return $vitri; 
       }

    /**
	 * Ham  xac dinh vi tri sao bat toa
	 *
	 * @param	int $cung_chua_sao_huu_bat
	 * @param	int $ngaysinh
	 * @return	int
	 */
	public function vi_tri_sao_bat_toa( $cung_chua_sao_huu_bat, $ngaysinh )
		{
            $vitri = $cung_chua_sao_huu_bat;
            for( $i = 1; $i < $ngaysinh; $i++ ){
                if( $vitri == 1 ){
                    $vitri = 13;
                }
                $vitri--;
            }
          return $vitri; 
        }

    /**
	 * Ham  xac dinh vi tri sao dau quan
	 *
	 * @param	int $vi_tri_sao_thai_tue
	 * @param	int $thangsinh
	 * @param	int $gio_sinh
	 * @return	int
	 */
    public function vi_tri_sao_dau_quan( $vi_tri_sao_thai_tue, $thang_sinh, $gio_sinh )
       {
            $vitri = $vi_tri_sao_thai_tue;
            for( $i = 1; $i < $thang_sinh; $i++ ){
                if( $vitri == 1 ){
                    $vitri = 13;
                }
                $vitri--;
            }
            for( $j = 1; $j < $gio_sinh; $j++ ){
                 if( $vitri == 12 ){
                     $vitri = 0;
                 }
                 $vitri++;
            }
          return $vitri; 
        }

    /**
	 * Ham  xep loai chinh tiinh
	 *
	 * @param	int $vi_tri_cung_menh_vien
	 * @param	int $nam_sinh
	 * @return	int
	 */
    public function vi_tri_sao_thien_tai( $vi_tri_cung_menh_vien, $nam_sinh )
	    {
	        $vitri = $vi_tri_cung_menh_vien;
	        for( $i = 0; $i < $nam_sinh; $i++ ){
	            if( $vitri == 12 ){
	                $vitri = 0;
	            }
	            $vitri++;
	        }
	        return $vitri; 
        }

    /**
	 * Ham  xac dinh vi tri sao thien tho
	 *
	 * @param	int $vi_tri_sao_cung_than
	 * @param	int $nam_sinh
	 * @return	int
	 */
    public function vi_tri_sao_thien_tho( $vi_tri_cung_than, $nam_sinh )
       {
            $vitri = $vi_tri_cung_than;
            for( $i = 0; $i < $nam_sinh; $i++ ){
                if( $vitri == 12 ){
                    $vitri = 0;
                }
                $vitri++;
            }
            
          return $vitri; 
        }

    /**
	 * Ham  xac dinh chu menh
	 *
	 * @param	int $chi_nam_sinh
	 * @return	string
	 */
    public function chu_menh( $chi_nam_sinh )
    	{
    		$mang = $this->chu_menh;
            return $mang[ $chi_nam_sinh ];
         }

    /**
	 * Ham xac dinh chu than
	 *
	 * @param	int $chi_nam_sinh
	 * @return	string
	 */
    public function chu_than( $chi_nam_sinh )
	    {
	    	$mang = $this->chu_than;
	        return $mang[ $chi_nam_sinh ];
	    }

	/**
	 * Ham  xac dinh dai han
	 *
	 * @param	int $cuc
	 * @param	int $cung
	 * @param	int $am_duong
	 * @return	string
	 */
	public function xac_dinh_dai_han( $cuc, $cung, $am_duong )
		{
               $key = ($cuc).','.$cung;
               $duong_nam_am_nu = $this->xddh_duong_nam_am_nu;
               $am_nam_duong_nu =$this->xddh_am_nam_duong_nu;

               if( in_array($am_duong, array(1,4)) ){
                    if( isset( $duong_nam_am_nu[ $key ] ) ){
                          return $duong_nam_am_nu[ $key ];
                    }
               }else{
                   if( isset( $am_nam_duong_nu[ $key ] ) ){
                          return $am_nam_duong_nu[ $key ];
                    }
               }                                       
	    }

	/**
	 * Ham xac dinh tieu han
	 *
	 * @param	int $gioitinh
	 * @param	int $tuoi
	 * @param	int $nam_xem_han
	 * @return	string
	 */
	public function xac_dinh_tieu_han( $gioitinh, $tuoi, $nam_xem_han )
		{
                $key = $tuoi.','.$nam_xem_han;
                $tieu_han_nam = $this->xdth_tieu_han_nam;
                $tieu_han_nu  = $this->xdth_tieu_han_nu;
                if( $gioitinh == 1 ){
                     return $tieu_han_nam[ $key ];
                }else{
                     return $tieu_han_nu[ $key ];
                } 
	    }

	/**
	 * Ham  xem sao luu dong
	 *
	 * @param	int $chi_nam_xem
	 * @param	int $can_nam_xem
	 * @param	int $cung
	 * @return	string
	 */
	public function sao_luu_dong($chi_nam_xem, $can_nam_xem, $cung )
		{
			$sao_theo_chi_nam = $this->sld_sao_theo_chi_nam;
			$an_sao_theo_chi_nam = $this->sld_an_sao_theo_chi_nam;
			$sao_theo_can_nam = $this->sld_sao_theo_can_nam;
			$an_sao_theo_can_nam = $this->sld_an_sao_theo_can_nam;

			$key_chi_nam_xem = $chi_nam_xem.','.$cung;
			$rt ='';
			if( isset( $an_sao_theo_chi_nam[ $key_chi_nam_xem ] ) ){

				$rt['text'] ='<li>'.$sao_theo_chi_nam[ $an_sao_theo_chi_nam[ $key_chi_nam_xem ] ].'</li>';

				$rt['number_center']    = $an_sao_theo_chi_nam[ $key_chi_nam_xem ];
			}
			$key_can_nam_xem = $can_nam_xem.','.$cung;
			if( isset( $an_sao_theo_can_nam[ $key_can_nam_xem ] ) ){

				$rt['text'] ='<li>'.$sao_theo_can_nam[ $an_sao_theo_can_nam[ $key_can_nam_xem ] ].'</li>';

				$rt['number_center']    = $an_sao_theo_can_nam[ $key_can_nam_xem ];
			}

			return $rt;
	    }

	/**
	 * Ham  xac dinh han thang
	 *
	 * @param	int $vi_tri_tieu_han
	 * @param	int $gio_sinh_chi
	 * @param	int $gio_sinh_chi
	 * @param	int $thang_sinh_an
	 * @return	int
	 */
	public function xac_dinh_han_thang( $vi_tri_tieu_han, $gio_sinh_chi, $thang_sinh_am )
		{
	             $start = $vi_tri_tieu_han;
	             for( $i = 1; $i < $gio_sinh_chi; $i++ ){
	                 $start++;
	                 if( $start > 12 ){
	                     $start = 1;
	                 }
	             }
	             
	             for( $i = 1; $i< $thang_sinh_am; $i++ ){
	                $start--;
	                if( $start < 1 ){
	                     $start = 12;
	                 }
	             }
	             
	            return $start; 
	    }

	/**
	 * Ham  xem ngu hanh nap am ban menh
	 *
	 * @param	int $can
	 * @param	int $chi
	 * @return	string
	 */
	public function ngu_hanh_nap_am_ban_menh( $can, $chi )
		{
	        $key = $can.','.$chi;
	        $mang_can_chi = $this->nhnabm_mang_can_chi;
	        $mang_result = $this->nhnabm_mang_result;
	        if( isset( $mang_can_chi[$key] ) ){
	             return $mang_result[ $mang_can_chi[ $key ] ];
	        }else{
	            return '';
	        } 
	    }

	/**
	*
	* 
	* @param string	 ---
	* @return bool|null	---
	*
	**/
	function nguhanhOfUser($can, $chi){
		$key = $can.','.$chi;
        $mang_can_chi = $this->nhnabm_mang_can_chi;
        $mang_result = $this->nguhanhNow;
        if( isset( $mang_can_chi[$key] ) ){
             return $mang_result[ $mang_can_chi[ $key ] ];
        }else{
            return '';
        } 
	}
    
    /**
	 * Ham  tao ma html cung
	 *
	 * @param	array $val
	 * @param	int $key
	 * @param	int $tuan
	 * @param	int $triet
	 * @return	string
	 */
    
public function cung_html( $val, $key, $tuan, $triet, $sttKhung )
		{
			$tempIdsao = null;
			$tempIdCung = null;
			$tempNumberHour = null;
			if ($val['sao']['sao1']) {
				$this->saoChinhtinhArr[]	= array(
					'id_sao'	=> $val['sao']['sao1_number'],
					'id_cung'	=> isset($val['cung_id'])?$val['cung_id']:1,
					'numberHour' => $key,
				);
			}
			if ($val['sao']['sao2']) {
				$this->saoChinhtinhArr[]	= array(
					'id_sao'	=> $val['sao']['sao2_number'],
					'id_cung'	=> isset($val['cung_id'])?$val['cung_id']:1,
					'numberHour' => $key,
				);
			}

            $cung_id = $val['cung'] == 'Mệnh viên' ? 1 : $val['cung_id'];
            $this->khungSuyraCung[$key]	= $cung_id;
            // echo $cung_id.'-';
            $this->keyCung[$key]    = $val['cung'];
            // echo $key.' - '.$val['cung'].'<br>';

            $html = '<div class="cung cung_' . $key . '" style="">
	            <div class="cung_content">';
			@$html .= '<div class="c_giap">' . $val['can_cung_dai_van'] . ' ' . $this->
				con_giap($key) . '</div>';
			$html .= '<span class="c_cung">' . $val['cung'] . '</span>';
			$this->namdaihanMin	= $this->namdaihanMin>$val['dai_han']?$val['dai_han']:$this->namdaihanMin;
			$this->vitriNamdaihanMin	= $this->namdaihanMin>=$val['dai_han']?$key:$this->vitriNamdaihanMin;
			$html .= '<div class="daihan" >' . $val['dai_han'] . '</div>';
			// $html .= '<p style="font-weight:bold;padding:2px 0px">' . $val['cung'] . '</p>';
			$html .= '<p class="sao1">' . $val['sao']['sao1'] .
				'</p>';
			$html .= '<p class="sao2">' . $val['sao']['sao2'] .
				'</p>';
			$html .= '<ul class="sao_left">';
			if ($val['cung'] == 'Mệnh viên') {
				$this->xacDinhTamGiac	= $key;
			}
			if (isset($val['sao']['sao1_number'])) {
				$this->numberOut[$key][]	= $val['sao']['sao1_number'];
				$this->numberOutCungmenh[$cung_id][]	= $val['sao']['sao1_number'];
				$this->numberOutSttKhung[$sttKhung][]	= $val['sao']['sao1_number'];
				// echo '1 : '.$val['sao']['sao1_number'].' - ';
			}
			if (isset($val['sao']['sao2_number'])) {
				$this->numberOut[$key][]	= $val['sao']['sao2_number'];
				$this->numberOutCungmenh[$cung_id][]	= $val['sao']['sao2_number'];
				$this->numberOutSttKhung[$sttKhung][]	= $val['sao']['sao2_number'];
				// echo '2 : '.$val['sao']['sao1_number'].' - ';
			}
			// dd($val,1);
			if (isset($val['sao_theo_gio']['left']) && !empty($val['sao_theo_gio']['left']))
			{
				foreach ($val['sao_theo_gio']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_gio']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_thang']['left']) && !empty($val['sao_theo_thang']['left']))
			{
				foreach ($val['sao_theo_thang']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_thang']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_can_va_cung']['left']) && !empty($val['sao_theo_can_va_cung']['left']))
			{
				foreach ($val['sao_theo_can_va_cung']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_can_va_cung']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_chi_va_cung']['left']) && !empty($val['sao_theo_chi_va_cung']['left']))
			{
				foreach ($val['sao_theo_chi_va_cung']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_chi_va_cung']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_thai_tue']['left']) && !empty($val['sao_thai_tue']['left']))
			{
				foreach ($val['sao_thai_tue']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_thai_tue']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_loc_ton']['left']) && !empty($val['sao_theo_loc_ton']['left']))
			{
				foreach ($val['sao_theo_loc_ton']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_loc_ton']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			// if (isset($val['sao_theo_truong_sinh']['left']) && !empty($val['sao_theo_truong_sinh']['left']))
			// {
			// 	foreach ($val['sao_theo_truong_sinh']['left'] as $val1)
			// 	{
			// 		$html .= '<li>' . $val1 . '</li>';
			// 	}
			// 	foreach ($val['sao_theo_truong_sinh']['left_number'] as $val1)
			// 	{
			// 		$this->numberOut[$cung_id][]	= $val1;
			// 	}
			// }
			if (isset($val['sao_an_quan']))
			{
				$html .= '<li>' . $val['sao_an_quan'] . '</li>';
				if (!empty($val['sao_an_quan'])) {
					$this->numberOut[$key][]	= 163;
					$this->numberOutCungmenh[$cung_id][]	= 163;
					$this->numberOutSttKhung[$sttKhung][]	= 163;
				}
				
			}
			if (isset($val['sao_thien_quy']))
			{
				$html .= '<li>' . $val['sao_thien_quy'] . '</li>';
				if (!empty($val['sao_thien_quy'])) {
					$this->numberOut[$key][]	= 164;
					$this->numberOutCungmenh[$cung_id][]	= 164;
					$this->numberOutSttKhung[$sttKhung][]	= 164;
				}
				
			}
			if (isset($val['sao_tam_thai']))
			{
				$html .= '<li>' . $val['sao_tam_thai'] . '</li>';
				if (!empty($val['sao_tam_thai'])) {
					$this->numberOut[$key][]	= 161;
					$this->numberOutCungmenh[$cung_id][]	= 161;
					$this->numberOutSttKhung[$sttKhung][]	= 161;
				}
			}
			if (isset($val['sao_bat_toa']))
			{
				$html .= '<li>' . $val['sao_bat_toa'] . '</li>';
				if (!empty($val['sao_bat_toa'])) {
					$this->numberOut[$key][]	= 162;
					$this->numberOutCungmenh[$cung_id][]	= 162;
					$this->numberOutSttKhung[$sttKhung][]	= 162;
				}
				
			}
			if (isset($val['sao_thien_tai']))
			{
				$html .= '<li>' . $val['sao_thien_tai'] . '</li>';
				if (!empty($val['sao_thien_tai'])) {
					$this->numberOut[$key][]	= 159;
					$this->numberOutCungmenh[$cung_id][]	= 159;
					$this->numberOutSttKhung[$sttKhung][]	= 159;
				}
				
			}
			if (isset($val['sao_thien_tho']))
			{
				$html .= '<li>' . $val['sao_thien_tho'] . '</li>';
				if (!empty($val['sao_thien_tho'])) {
					$this->numberOut[$key][]	= 160;
					$this->numberOutCungmenh[$cung_id][]	= 160;
					$this->numberOutSttKhung[$sttKhung][]	= 160;
				}
				
			}
			if (isset($val['sao_hoa_loc_va_hoa_quyen']['left']) && !empty($val['sao_hoa_loc_va_hoa_quyen']['left']))
			{
				foreach ($val['sao_hoa_loc_va_hoa_quyen']['left'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_hoa_loc_va_hoa_quyen']['left_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_hoa_khoa_va_hoa_ky']['left'][0]))
			{
				$html .= '<li>' . $val['sao_hoa_khoa_va_hoa_ky']['left'][0] . '</li>';
				$this->numberOut[$key][]	= $val['sao_hoa_khoa_va_hoa_ky']['left_number'][0];
				$this->numberOutCungmenh[$cung_id][]	= $val['sao_hoa_khoa_va_hoa_ky']['left_number'][0];
				$this->numberOutSttKhung[$sttKhung][]	= $val['sao_hoa_khoa_va_hoa_ky']['left_number'][0];
			}
			$html .= '</ul>';
			$html .= '<ul class="sao_right ul_saoright">';
			if (isset($val['hoa_tinh']))
			{
				$html .= '<li>' . $val['hoa_tinh'] . '</li>';
				if (!empty($val['hoa_tinh'])) {
					$this->numberOut[$key][]	= 165;
					$this->numberOutCungmenh[$cung_id][]	= 165;
					$this->numberOutSttKhung[$sttKhung][]	= 165;
				}
			}
			if (isset($val['linh_tinh']))
			{
				$html .= '<li>' . $val['linh_tinh'] . '</li>';
				if (!empty($val['linh_tinh'])) {
					$this->numberOut[$key][]	= 166;
					$this->numberOutCungmenh[$cung_id][]	= 166;
					$this->numberOutSttKhung[$sttKhung][]	= 166;
				}
			}
			if (isset($val['sao_theo_gio']['right']) && !empty($val['sao_theo_gio']['right']))
			{
				foreach ($val['sao_theo_gio']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_gio']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_thang']['right']) && !empty($val['sao_theo_thang']['right']))
			{
				foreach ($val['sao_theo_thang']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_thang']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_can_va_cung']['right']) && !empty($val['sao_theo_can_va_cung']['right']))
			{
				foreach ($val['sao_theo_can_va_cung']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_can_va_cung']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_chi_va_cung']['right']) && !empty($val['sao_theo_chi_va_cung']['right']))
			{
				foreach ($val['sao_theo_chi_va_cung']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_chi_va_cung']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_thai_tue']['right']) && !empty($val['sao_thai_tue']['right']))
			{
				foreach ($val['sao_thai_tue']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_thai_tue']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_theo_loc_ton']['right']) && !empty($val['sao_theo_loc_ton']['right']))
			{
				foreach ($val['sao_theo_loc_ton']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_theo_loc_ton']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			// if (isset($val['sao_theo_truong_sinh']['right']) && !empty($val['sao_theo_truong_sinh']['right']))
			// {
			// 	foreach ($val['sao_theo_truong_sinh']['right'] as $val1)
			// 	{
			// 		$html .= '<li>' . $val1 . '</li>';
			// 	}
			// 	foreach ($val['sao_theo_truong_sinh']['right_number'] as $val1)
			// 	{
			// 		$this->numberOut[$cung_id][]	= $val1;
			// 	}
			// }
			if (isset($val['sao_thien_la']))
			{
				$html .= '<li>' . $val['sao_thien_la'] . '</li>';
				if (!empty($val['sao_thien_la'])) {
					$this->numberOut[$key][]	= 167;
					$this->numberOutCungmenh[$cung_id][]	= 167;
					$this->numberOutSttKhung[$sttKhung][]	= 167;
				}
			}
			//if( isset( $val['sao_an_quan'] ) ){ $html.='<li>'.$val['sao_an_quan'].'</li>'; }
			// if( isset( $val['sao_thien_quy'] ) ){ $html.='<li>'.$val['sao_thien_quy'].'</li>'; }
			//if( isset( $val['sao_tam_thai'] ) ){ $html.='<li>'.$val['sao_tam_thai'].'</li>'; }
			//if( isset( $val['sao_bat_toa'] ) ){ $html.='<li>'.$val['sao_bat_toa'].'</li>'; }
			if (isset($val['sao_thien_tai']))
			{
				$html .= '<li>' . $val['sao_thien_tai'] . '</li>';
				if (!empty($val['sao_thien_tai'])) {
					$this->numberOut[$key][]	= 159;
					$this->numberOutCungmenh[$cung_id][]	= 159;
					$this->numberOutSttKhung[$sttKhung][]	= 159;
				}
			}
			// if( isset( $val['sao_thien_tho'] ) ){ $html.='<li>'.$val['sao_thien_tho'].'</li>'; }
			if (isset($val['sao_dia_vong']))
			{
				$html .= '<li>' . $val['sao_dia_vong'] . '</li>';
				if (!empty($val['sao_dia_vong'])) {
					$this->numberOut[$key][]	= 168;
					$this->numberOutCungmenh[$cung_id][]	= 168;
					$this->numberOutSttKhung[$sttKhung][]	= 168;
				}
			}
			if (isset($val['sao_hoa_loc_va_hoa_quyen']['right']) && !empty($val['sao_hoa_loc_va_hoa_quyen']['right']))
			{
				foreach ($val['sao_hoa_loc_va_hoa_quyen']['right'] as $val1)
				{
					$html .= '<li>' . $val1 . '</li>';
				}
				foreach ($val['sao_hoa_loc_va_hoa_quyen']['right_number'] as $val1)
				{
					$this->numberOut[$key][]	= $val1;
					$this->numberOutCungmenh[$cung_id][]	= $val1;
					$this->numberOutSttKhung[$sttKhung][]	= $val1;
				}
			}
			if (isset($val['sao_hoa_khoa_va_hoa_ky']['right']))
			{
				$html .= '<li>' . $val['sao_hoa_khoa_va_hoa_ky']['right'] . '</li>';
				$this->numberOut[$key][]	= $val['sao_hoa_khoa_va_hoa_ky']['right_number'][0];
				$this->numberOutCungmenh[$cung_id][]	= $val['sao_hoa_khoa_va_hoa_ky']['right_number'][0];
				$this->numberOutSttKhung[$sttKhung][]	= $val['sao_hoa_khoa_va_hoa_ky']['right_number'][0];
			}
			if (isset($val['sao_dau_quan']))
			{
				$html .= '<li>' . $val['sao_dau_quan'] . '</li>';
				if (!empty($val['sao_dau_quan'])) {
					$this->numberOut[$key][]	= 169;
					$this->numberOutCungmenh[$cung_id][]	= 169;
					$this->numberOutSttKhung[$sttKhung][]	= 169;
				}
			}
			if (isset($val['sao_thien_thuong']))
			{
				$html .= '<li>' . $val['sao_thien_thuong'] . '</li>';
				if (!empty($val['sao_thien_thuong'])) {
					$this->numberOut[$key][]	= 157;
					$this->numberOutCungmenh[$cung_id][]	= 157;
					$this->numberOutSttKhung[$sttKhung][]	= 157;
				}
			}
			if (isset($val['sao_thien_su']))
			{
				$html .= '<li>' . $val['sao_thien_su'] . '</li>';
				if (!empty($val['sao_thien_su'])) {
					$this->numberOut[$key][]	= 158;
					$this->numberOutCungmenh[$cung_id][]	= 158;
					$this->numberOutSttKhung[$sttKhung][]	= 158;
				}
			}
			$html .= isset($val['sao_luu_dong']['text'])?$val['sao_luu_dong']['text']:'';
			if (isset($val['sao_luu_dong']['number_center'])) {
				$this->numberOut[$key][]	= $val['sao_luu_dong']['number_center'];
				$this->numberOutCungmenh[$cung_id][]	= $val['sao_luu_dong']['number_center'];
				$this->numberOutSttKhung[$sttKhung][]	= $val['sao_luu_dong']['number_center'];
			}
			$html .= '</ul>';
			$html .= '<div class="tieu_han">' . $val['tieu_han'] . '</div>';
			// hh edit truongsinh
			$html .= '<div class="truong_sinh">' . $val['sao_theo_truong_sinh']['center'] . '</div>';
			if ($val['sao_theo_truong_sinh']['center_number']) {
				foreach ($val['sao_theo_truong_sinh']['center_number'] as $value) {
					$this->numberOut[$key][]	= $value;
					$this->numberOutCungmenh[$cung_id][]	= $value;
					$this->numberOutSttKhung[$sttKhung][]	= $value;
					// echo $key.'<br>';
					// dd($value, 1);
					// echo 'trang milu<br><hr>';
				}
			}

			
			// end hh edit truongsinh
			$html .= '<div class="han_thang">' . $val['han_thang'] . '</div>';
			if ($tuan == $triet && $tuan == $key)
			{
				$html .= '<span class="tuan_triet tuantriet tuan triet' . $key .
					'">Tuần - Triệt</span>';
				$this->numberOut[$key][]	= 99; // key sao triet
				$this->numberOut[$key][]	= 184; // key sao tuan

				$this->numberOutCungmenh[$cung_id][]	= 99;
				$this->numberOutCungmenh[$cung_id][]	= 184;
				$this->numberOutSttKhung[$sttKhung][]	= 99;
				$this->numberOutSttKhung[$sttKhung][]	= 184;

				$this->xacDinhTuan    = $key;
				$this->xacDinhTriet    = $key;
			} elseif ($tuan == $key)
			{
				$html .= '<span class="tuan_triet triet triet' . $key . '">Tuần</span>';
				$this->xacDinhTuan    = $key;

				$this->numberOut[$key][]	= 184; // key sao tuan
				$this->numberOutCungmenh[$cung_id][]	= 184;
				$this->numberOutSttKhung[$sttKhung][]	= 184;
			} elseif ($triet == $key)
			{
				$html .= '<span class="tuan_triet triet triet' . $key . '">Triệt</span>';
				$this->xacDinhTriet    = $key;

				$this->numberOut[$key][]	= 99; // key sao triet
				$this->numberOutCungmenh[$cung_id][]	= 99;
				$this->numberOutSttKhung[$sttKhung][]	= 99;
			}

			$html .= '</div></div>';
			return $html;
	    }

	/**
	 * Ham  mau sao chinh dieu
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_chinh_dieu( $key )
	    {
	    	$mang = $this->color_chinh_dieu;
	        return $mang[ $key ];         
	    }

	/**
	 * Ham  mau sao theo gio
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_sao_theo_gio( $key )
    	{
    		$mang = $this->color_sao_theo_gio;
           return $mang[ $key ];                 
        }

    /**
	 * Ham  mau sao theo thang
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_sao_theo_thang( $key )
    	{
    		$mang = $this->color_sao_theo_thang;
           return $mang[ $key ];                 
        }

    /**
	 * Ham  mau sao theo can va cung
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_sao_theo_can_va_cung( $key )
    	{
    		$mang = $this->color_sao_theo_can_va_cung;
           return $mang[ $key ];                 
        }

    /**
	 * Ham  mau sao theo chi va cung
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_sao_theo_chi_va_cung( $key )
    	{
    		$mang = $this->color_sao_theo_chi_va_cung;
           return $mang[ $key ];                 
        }

    /**
	 * Ham  mau  vong sao thai tue
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_vong_sao_thai_tue( $key )
    	{
    		$mang = $this->color_vong_sao_thai_tue;
           return $mang[ $key ];                 
        }

    /**
	 * Ham  mau sao theo loc ton 
	 *
	 * @param	int $key
	 * @return	string
	 */
    public function color_sao_theo_loc_ton( $key )
    	{
    		$mang = $this->color_sao_theo_loc_ton;
           return $mang[ $key ];                 
        }

    public function getN( $d, $m, $y ){
         if ($y < 1582)
            $n_3 = 47;
            else if ($y == 1582) {
            if ($m < 10)
            $n_3 = 47;
            else
            return 57;
            } else if ($y > 1582 && $y < 1700) {
            $n_3 = 57;
            } else if ($y >= 1700) {
            $nam_2 = (int) ($y / 100);
            if ($nam_2 % 4 == 0)
            $nam_2 = $nam_2 - 1;
            $du = $nam_2 - 17;
            $ng = (int) ($du / 4);
            if ($du == 0)
            $n_3 = 58;
            else
            $n_3 = $du - $ng + 58;
            $l = $y % 100;
            $k = $y % 4;
            if ($l == 0 && $k == 0 && $m == 2 && $d < 28) {
            $n_3 = $n_3 - 1;
            }
            }
            return $n_3;
    }

    function songay($d, $m, $y)
        {
            if ($m == 1)
            return $d;
            $t = 0;
            for ($i = 1; $i < $m; $i++) {
            if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
            $t = $t + 31;
            } elseif ($i == 2) {
            if ($y % 4 == 0)
            $t = $t + 29;
            else
            $t = $t + 28;
            } else {
            $t = $t + 30;
            }
            }
            return $t + $d;
        }

    public function getCanChiNgay($n, $songay, $y)
    {
        $t1  = ($y - 1) * 365.25 + $songay - $n;
        $t2  = (int) ($t1 / 60);
        $t   = $t1 - $t2 * 60;
        $chi = $t % 12;
        
        if ($chi == 0)
            $chi = 12;
        $canchi['chi'] = $chi;
        
        $can = $t % 10;
        if ($can == 0)
            $can = 10;
        $canchi['can'] = $can;
        return $canchi;
    }

    public function getCan( $key )
    {
        
		$mang = array(
                       '1' => 'Giáp',
                       '2' => 'Ất',
                       '3' => 'Bính',
                       '4' => 'Đinh',
                       '5' => 'Mậu',
                       '6' => 'Kỷ',
                       '7' => 'Canh',
                       '8' => 'Tân',
                       '9' => 'Nhâm',
                       '10'=> 'Quý'
        );

		return $mang[ $key ];
    }

    function getChi( $key )
    {
        
		$mang = array(
                        '1' => 'Tý',
                        '2' => 'Sửu',
                        '3' => 'Dần',
                        '4' => 'Mão',
                        '5' => 'Thìn',
                        '6' => 'Tỵ',
                        '7' => 'Ngọ',
                        '8' => 'Mùi',
                        '9' => 'Thân',
                        '10'=> 'Dậu',
                        '11'=> 'Tuất',
                        '12'=> 'Hợi'
        );

		return $mang[ $key ];
    }

    function getCanChiThang( $thang, $nam ){
        $t         = $thang >= 11 ? $thang - 10 : $thang + 2;
        $thang_chi = $this->getChi($t);
        $thang_can = $this->getcanThang($nam, $thang);
        return $thang_can.' '.$thang_chi;
    }

    function getcanThang($nam, $thang)
    {
        $number = substr($nam, 3);
        if ($number == 1 || $number == 6)
            $can = 7;
        if ($number == 2 || $number == 7)
            $can = 9;
        if ($number == 3 || $number == 8)
            $can = 1;
        if ($number == 4 || $number == 9)
            $can = 3;
        if ($number == 5 || $number == 0)
            $can = 5;
        $m = ($can + $thang - 1) % 10;
        if ($m == 0)
            $m = 10;
        return $this->getCan($m);
    }

    function getCanChiNam( $nam ){
        $t       = (int) substr($nam, 3);
        $t       = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);
        $nam_can = $this->getCan($t);
        $t       = $nam % 12;
        $t       = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);
        $nam_chi = $this->getChi($t);
        return $nam_can.' '.$nam_chi;
    }

    function getCanChiNamNumber( $nam ){
        $t       = (int) substr($nam, 3);
        $t       = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);
        $can 	 = $t;
        $t       = $nam % 12;
        $t       = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);
        $chi     = $t;
        return array(
        	'can'	=> $can,
        	'chi'	=> $chi,
        );
    }

    /**
    *
    * Xác định 3 đỉnh của tam giác => background
    * @param int 	dinh vien mien
    * @param array 	mang 12 cung
    * @return array	---
    *
    **/
    function tinhTongCacDinhTamGiac($vitriDinhTamgiac, $mang12DinhTamgiac){
    	$muiTenTamHop	= $this->muiTenTamHop;
    	
    	// xac dinh 3 dinh tam giac
    	$vitriDinhTamgiac	= $muiTenTamHop[$vitriDinhTamgiac];
    	$arrVitriDinhTamgiac	= explode(',', $vitriDinhTamgiac);
    	foreach ($arrVitriDinhTamgiac as $key => $row) {
    		// dd($row,1);
    	}
    }

    function tinhTongCacDinh12DinhTamGiac($vitriDinhTamgiac, $mang12DinhTamgiac){
    	$cungKetHop		= $this->cungKetHop;
    	$vitriCungKetHop	= $cungKetHop[$vitriDinhTamgiac];
    	$arrvitriCungKetHop	= explode(',', $vitriCungKetHop);

    	$traveCung    = null;
    	foreach ($arrvitriCungKetHop as $key => $row) {
    		$traveCung[$row]    = $mang12DinhTamgiac[$row];
    	}
    	$cungHienTai    = $mang12DinhTamgiac[$vitriDinhTamgiac];
    	unset($traveCung[$vitriDinhTamgiac]);
    	$cungConLai    = array();
    	foreach ($traveCung as $value) {
    		$cungConLai    = array_merge($cungConLai, $value);
    	}
    	$arrCungHopNhat    = $this->arrCungHopNhat;

    	// Hop nhat cung hien tai
    	foreach ($cungHienTai as $key => $value) {
    		if (array_key_exists($value, $arrCungHopNhat)) {
    			$cungHienTai[$key]    = $arrCungHopNhat[$value];
    		}
    	}
    	

    	// Hop nhat cac cung con lai
    	foreach ($cungConLai as $key => $value) {
    		if (array_key_exists($value, $arrCungHopNhat)) {
    			$cungConLai[$key]    = $arrCungHopNhat[$value];
    		}
    	}
    	
    	// Kiem tra trong db
    	$this->CI =& get_instance();
    	$this->CI->load->database();
    	// dd($this->khungSuyraCung);
    	$cungBaygioLa	= $this->khungSuyraCung[$vitriDinhTamgiac];

    	$this->saoPhutinhArr[$cungBaygioLa] = $cungHienTai;

    	// dd($cungHienTai, 1);
    	$resultQuery    = $this->CI->db->select()
    								->from('sao_ghep_tu_vi')
    								->where('cung_id',$cungBaygioLa)
    								->where_in('sao_id',$cungHienTai)
    								->get()
    								->result_array();
    	$resultContent    = null;
    	if ($resultQuery) {
    		foreach ($resultQuery as $key => $value) {
    			$arrSaoghep    = explode(',', $value['sao_ghep_id']);
    			$okSaoghep    = true;
    			foreach ($arrSaoghep as $keySaoghep => $valueSaoghep) {
    				if (!in_array($valueSaoghep, $cungConLai)) {
    					$okSaoghep    = false;
    					break;
    				}
    			}
    			if ($okSaoghep) {
    				$resultContent[]    = $value;
    			}
    		}
    	}
    	return $resultContent;
    	//dd($traveCungKhongbaogomCunghientai);
    }

    function tinhTongCacDinhSaohan($vitriDinhTamgiac, $mang12DinhTamgiac){
    	$cungKetHop		= $this->cungKetHop;
    	$vitriCungKetHop	= $cungKetHop[$vitriDinhTamgiac];
    	$arrvitriCungKetHop	= explode(',', $vitriCungKetHop);

    	$traveCung    = null;
    	foreach ($arrvitriCungKetHop as $key => $row) {
    		$traveCung[$row]    = $mang12DinhTamgiac[$row];
    	}
    	$cungHienTai    = $mang12DinhTamgiac[$vitriDinhTamgiac];
    	unset($traveCung[$vitriDinhTamgiac]);

    	$cungConLai    = array();
    	foreach ($traveCung as $value) {
    		$cungConLai    = array_merge($cungConLai, $value);
    	}
    	$arrCungHopNhat    = $this->arrCungHopNhat;

    	// Hop nhat cung hien tai
    	foreach ($cungHienTai as $key => $value) {
    		if (array_key_exists($value, $arrCungHopNhat)) {
    			$cungHienTai[$key]    = $arrCungHopNhat[$value];
    		}
    	}

    	// Hop nhat cac cung con lai
    	foreach ($cungConLai as $key => $value) {
    		if (array_key_exists($value, $arrCungHopNhat)) {
    			$cungConLai[$key]    = $arrCungHopNhat[$value];
    		}
    	}

    	/*array(49) {
			[0]=>
			string(3) "171"
			[1]=>
			string(2) "75"
			[2]=>
			string(2) "81"
			[3]=>
			string(2) "96"
			[4]=>
			string(2) "98"
			[5]=>
			int(140)
			[6]=>
			int(162)
		}*/
		// Kiem tra trong db
    	$this->CI =& get_instance();
    	$this->CI->load->database();
    	$this->CI->db->select();
		$this->CI->db->from('sao_ghep_theo_tuoi');
		$this->CI->db->like('sao_ghep_id',$cungHienTai[0]);
		foreach ($cungHienTai as $value) {
			$this->CI->db->or_like('sao_ghep_id',$value);
		}
		$resultCungGhep = $this->CI->db->get()->result_array();

		// Kiem tra cung ghep ton tai sao nam trong danh sach khong
		$arrContent = null;
		if ($resultCungGhep) {
			foreach ($resultCungGhep as $value) {
				$arrSaoghepTemp    = explode(',', $value['sao_ghep_id']);

				$okTemp = false;
				foreach ($arrSaoghepTemp as $valueASGT) {
					if (in_array($valueASGT, $cungConLai) or in_array($valueASGT, $cungHienTai)) {
						$okTemp = true;
					}
					else{
						$okTemp = false;break;
					}
				}
				if ($okTemp) {
					$arrContent[] = $value;
				}
				// if (count($arrSaoghepTemp) == 1) {
				// 	$okTemp = true;
				// }
				// if ($okTemp) {
				// 	$arrContent[] = $value;
				// }
			}
		}
		return $arrContent;





    	
    	// Kiem tra trong db
    	$this->CI =& get_instance();
    	$this->CI->load->database();
    	// dd($this->khungSuyraCung);
    	$cungBaygioLa	= $this->khungSuyraCung[$vitriDinhTamgiac];

    	$this->saoPhutinhArr[$cungBaygioLa] = $cungHienTai;

    	// dd($cungHienTai, 1);
    	$resultQuery    = $this->CI->db->select()
    								->from('sao_ghep_theo_tuoi')
    								->like('sao_ghep_id',$cungHienTai)
    								->get()
    								->result_array();
    	$resultContent    = null;
    	if ($resultQuery) {
    		foreach ($resultQuery as $key => $value) {
    			$arrSaoghep    = explode(',', $value['sao_ghep_id']);
    			$okSaoghep    = true;
    			foreach ($arrSaoghep as $keySaoghep => $valueSaoghep) {
    				if (!in_array($valueSaoghep, $cungConLai)) {
    					$okSaoghep    = false;
    					break;
    				}
    			}
    			if ($okSaoghep) {
    				$resultContent[]    = $value;
    			}
    		}
    	}
    	return $resultContent;
    }

    function tinhTongCacDinhSaohanTrecon($vitriDinhTamgiac, $mang12DinhTamgiac){
    	$cungKetHop		= $this->cungKetHop;
    	$vitriCungKetHop	= $cungKetHop[$vitriDinhTamgiac];
    	$arrvitriCungKetHop	= explode(',', $vitriCungKetHop);

    	$traveCung    = null;
    	foreach ($arrvitriCungKetHop as $key => $row) {
    		$traveCung[$row]    = $mang12DinhTamgiac[$row];
    	}
    	$cungHienTai    = $mang12DinhTamgiac[$vitriDinhTamgiac];
    	unset($traveCung[$vitriDinhTamgiac]);

    	$cungConLai    = array();
    	foreach ($traveCung as $value) {
    		$cungConLai    = array_merge($cungConLai, $value);
    	}
    	$arrCungHopNhat    = $this->arrCungHopNhat;

    	// Hop nhat cung hien tai
    	foreach ($cungHienTai as $key => $value) {
    		if (array_key_exists($value, $arrCungHopNhat)) {
    			$cungHienTai[$key]    = $arrCungHopNhat[$value];
    		}
    	}

    	// Hop nhat cac cung con lai
    	foreach ($cungConLai as $key => $value) {
    		if (array_key_exists($value, $arrCungHopNhat)) {
    			$cungConLai[$key]    = $arrCungHopNhat[$value];
    		}
    	}
		// Kiem tra trong db
    	$this->CI =& get_instance();
    	$this->CI->load->database();
    	$this->CI->db->select();
		$this->CI->db->from('sao_ghep_theo_tuoi_trecon');
		$this->CI->db->like('sao_ghep_id',$cungHienTai[0]);
		foreach ($cungHienTai as $value) {
			$this->CI->db->or_like('sao_ghep_id',$value);
		}
		$resultCungGhep = $this->CI->db->get()->result_array();

		// Kiem tra cung ghep ton tai sao nam trong danh sach khong
		$arrContent = null;
		if ($resultCungGhep) {
			foreach ($resultCungGhep as $value) {
				$arrSaoghepTemp    = explode(',', $value['sao_ghep_id']);

				$okTemp = false;
				foreach ($arrSaoghepTemp as $valueASGT) {
					if (in_array($valueASGT, $cungConLai) or in_array($valueASGT, $cungHienTai)) {
						$okTemp = true;
					}
					else{
						$okTemp = false;break;
					}
				}
				if ($okTemp) {
					$arrContent[] = $value;
				}
				// if (count($arrSaoghepTemp) == 1) {
				// 	$okTemp = true;
				// }
				// if ($okTemp) {
				// 	$arrContent[] = $value;
				// }
			}
		}
		return $arrContent;
    }

    function amDuongOfCan($canChiNamSinh = null){
    	$arr = array(
    		// 1	=> 1,
    		// 2	=> 0,
    		// 3	=> 1,
    		// 4	=> 0,
    		// 5	=> 1,
    		// 6	=> 0,
    		// 7	=> 1,
    		// 8	=> 0,
    		// 9	=> 1,
    		// 10	=> 0
    		0	=> 1,
    		1	=> 0,
    		2	=> 1,
    		3	=> 0,
    		4	=> 1,
    		5	=> 0,
    		6	=> 1,
    		7	=> 0,
    		8	=> 1,
    		9	=> 0,
    	);
    	return $arr[$canChiNamSinh];
    }

    function amDuongOfViTriCung($vitri = null){
    	$arr = array(
    		// 1	=> 1,
    		// 2	=> 0,
    		// 3	=> 1,
    		// 4	=> 0,
    		// 5	=> 1,
    		// 6	=> 0,
    		// 7	=> 1,
    		// 8	=> 0,
    		// 9	=> 1,
    		// 10	=> 0,
    		// 11	=> 1,
    		// 12	=> 0
    		1	=> 1,
    		2	=> 0,
    		3	=> 1,
    		4	=> 0,
    		5	=> 1,
    		6	=> 0,
    		7	=> 1,
    		8	=> 0,
    		9	=> 1,
    		10	=> 0,
    		11	=> 1,
    		12	=> 0
    	);
    	return $arr[$vitri];
    }

    /**
    *
    * method tinh sao han tu cong thuc tra ve cac cung menh
    * @param array	 mang bao gom menh nguoi dung, can nguoi dung
    * @return array    danh sach cac thong tin cac sao ung voi cac tuoi
    *
    **/
    function tinhSaoHan($param1, $param2 = null){
    	$canUserNumber	= $param1['can'];

    	// $danhSach12Cung	= $param2;
    	$listCanTuvi	= $this->can;
    	$canUser 	= $listCanTuvi[$canUserNumber];

    	$canDuong 	= array(
    		'Giáp', 'Bính', 'Mậu', 'Canh', 'Nhâm'
    	);
    	$canAm 	= array(
    		'Ất', 'Đinh', 'Kỷ', 'Tân', 'Qúy'
    	);
    	// $tuoiStart	= array(
    	// 	'Thủy'	=> 2,
    	// 	'Mộc'	=> 3,
    	// 	'Kim'	=> 4,
    	// 	'Thổ'	=> 5,
    	// 	'Hỏa'	=> 6,
    	// );
    	$khungGhep	= array(
    		1	=> 7,
    		2	=> 8,
    		3	=> 9,
    		4	=> 10,
    		5	=> 11,
    		6	=> 12,
    		7	=> 1,
    		8	=> 2,
    		9	=> 3,
    		10	=> 4,
    		11	=> 5,
    		12	=> 6,
    	);

    	$tuoiHanFirst	= $this->namdaihanMin;	// Xac dinh nam dai han nho nhat de chay
    	$tinhChieuChay	= in_array($canUser, $canDuong)?'Dương':'Âm';	// Xac dinh chieu chay
    	$vitriNamdaihanMin	= $this->vitriNamdaihanMin;

    }

    /**
    *
    * 
    * @param string	 ---
    * @return bool|null	---
    *
    **/
    function luanCucAndMenh($paramCuc, $paramMenh){
    	$cuc    = array(
            'Thủy nhị cục'	=> 3,
            'Mộc tam cục'	=> 2,
            'Kim tứ cục'	=> 1,
            'Thổ ngũ cục'	=> 5,
            'Hỏa lục cục'	=> 4,
       	);
    	$menh 	= array(
    		'Hải Trung Kim' => '1',
            'Lư Trung Hỏa'  =>'4',
            'Đại Lâm Mộc'   =>'2',
            'Lộ Bàng Thổ'   =>'5',
            'Kiếm Phong Kim'=>'1',
            'Sơn Đầu Hỏa'   =>'4',
            'Giản Hạ Thủy'  =>'3',
            'Thành Đầu Thổ' =>'5',
            'Bạch Lạp Kim'  =>'1',
            'Dương Liễu Mộc'=>'2',
            'Tuyền Trung Thủy'=>'3',
            'Ốc Thượng Thổ' =>'5',
            'Tích Lịch Thủy'=>'3',
            'Tùng Bách Mộc' =>'2',
            'Trường Lưu Thủy'=>'3',
            'Sa Trung Kim'  =>'1',
            'Sơn Hạ Hỏa'    =>'4',
            'Bình Địa Mộc'  =>'2',
            'Bích Thượng Thổ'=>'5',
            'Kim Bạch Kim'  =>'1',
            'Phúc Dăng Hỏa' =>'4',
            'Thiên Hà Thủy' =>'3',
            'Đại Dịch Thổ'  =>'5',
            'Thoa Xuyến Kim'=>'1',
            'Tang Đố Mộc'   =>'2',
            'Đại khê Thủy'  =>'3',
            'Sa Trung Thổ'  =>'5',
            'Thiên Thượng Hỏa'=>'4',
            'Thạch Lựu Mộc' =>'2',
            'Đại Hải Thủy'  =>'3',
    	);
    	$itemCuc	= (int)$cuc[$paramCuc];
    	$itemMenh	= (int)$menh[$paramMenh];

    	// xet tương khắc của cục với mệnh
    	$tuongKhacCucMenh	= $this->bang_tuong_khac($itemCuc, $itemMenh);
    	// xet tuong khac cua menh voi cuc 
    	$tuongKhacMenhCuc	= $this->bang_tuong_khac($itemMenh, $itemCuc);
    	// xet tuong sinh cua cuc voi menh
    	$tuongSinhCucMenh	= $this->bang_tuong_sinh($itemCuc, $itemMenh);
    	// xet tuong sinh cua menh voi cuc
    	$tuongSinhMenhCuc	= $this->bang_tuong_sinh($itemMenh, $itemCuc);

    	// Kiem tra
    	if ($tuongKhacCucMenh) {
    		return array(
    			'item' => 'Cục khắc mệnh',
    			'content'	=> '<p dir="ltr">Sự thành công của người này thường gặp nhiều gian khổ hoặc cảnh trái ý hoặc gặp mà không thích hợp</p><p dir="ltr" style="text-align: center;"><strong>Mệnh sinh cục thời hay</strong></p><p dir="ltr" style="text-align: center;"><strong>Cục khắc mệnh tai bay có ngày</strong></p>',
    		);
    	}
    	if ($tuongKhacMenhCuc) {
    		return array(
    			'item'	=> 'Mệnh khắc cục',
    			'content'	=> '<p dir="ltr">Người này nếu muốn thành công thì phải có nhiều nghị lực vì cuộc đời họ sẽ gặp nhiều trở ngại để làm hỏng đại sự</p><p dir="ltr" style="text-align: center;"><strong>Mệnh sinh cục thời hay</strong></p><p dir="ltr" style="text-align: center;"><strong>Cục khắc mệnh tai bay có ngày</strong></p>',
    		);
    	}
    	if ($tuongSinhCucMenh) {
    		return array(
    			'item'	=> 'Cục sinh mệnh',
    			'content'	=> '<p dir="ltr">Người này ra ngoài luôn gặp quý nhân giúp đỡ, cuộc đời họ là một chuỗi may mắn, sự thành công của người này một phần là nhờ người khác đưa tới chứ bản thân họ chưa đủ khả năng. Người này được trời ưu đãi để làm việc vừa có khả năng vừa gặp may mắn thuận lợi để đưa đến thành công đễ dàn</p>',
    		);
    	}
    	if ($tuongSinhMenhCuc) {
    		return array(
    			'item'	=> 'Mệnh sinh cục',
    			'content'	=> '<p dir="ltr">Người này làm lợi cho thiên hạ. Mặc dù người này có cung mệnh ở thế sinh nhập. Cung mệnh ở cung dương thế thu vào, thế hưởng lợi. Thường là người kỹ lưỡng, làm việc gì cũng suy sét, tính toán cẩn thận trước khi bắt tay vào công việc. Cung mệnh ở cung âm ở thế sinh xuất tức là người hảo sảng phóng khoáng dễ tha thứ</p>',
    		);
    	}
    	return array(
    		'item'	=> 'Cục mệnh bình hòa',
    		'content'	=> '<p dir="ltr">Người này dễ hòa đồng với đời sống bên ngoài. Dù với hoàn cảnh nào người này cũng có thể hòa đồng, vui vẻ chấp nhận</p>',
    	);
    }

    public function bang_tuong_sinh($param1, $param2){
        $arr = array(
            1 => 3,
            2 => 4,
            3 => 2,
            4 => 5,
            5 => 1
        );
        if ($arr[$param1] == $param2) {
        	return true;
        }
        return false;
    }

    public function bang_tuong_khac($param1, $param2){
        $arr = array(
            1 => 2,
            2 => 5,
            3  => 4,
            4 => 1,
            5 => 3
        );
        if ($arr[$param1] == $param2) {
        	return true;
        }
        return false;
    }

    public function contentAmDuong($param1){
    	$arr = array(
    		'Âm dương thuận lý'	=> '',
    		'Âm dương nghịch lý'	=> '',
    	);
    	return $arr[$param1];
    }

    public function contentThanCu($param1){
    	$CI =& get_instance();
    	$CI->load->database();
    	$query = $CI->db->select()
    				->from('tuvi_thancu')
    				->like('name', $param1)
    				->get()
    				->row_array();
    	return $query;
    }
    //hh
    public function luanCanChi($p_can, $p_chi){
    	$arr_nguhanhcan = array
    						(
    							'0' => '1',
    							'1' => '1',
    							'2' => '3',
    							'3' => '3',
    							'4' => '2',
    							'5' => '2',
    							'6' => '4',
    							'7' => '4',
    							'8' => '5',
    							'9' => '5',
    						);
		$arr_nguhanhchi = array
    						(
    							'0' => '3',
    							'1' => '5',
    							'2' => '2',
    							'3' => '2',
    							'4' => '5',
    							'5' => '4',
    							'6' => '4',
    							'7' => '5',
    							'8' => '1',
    							'9' => '1',
    							'10' => '5',
    							'11' => '3',
    						);
    	
    	$can = (int)$arr_nguhanhcan[$p_can];
    	$chi = (int)$arr_nguhanhchi[$p_chi];

    	$tuongKhacCanChi	= $this->bang_tuong_khac($can, $chi);
    	$tuongKhacChiCan	= $this->bang_tuong_khac($chi, $can);
    	$tuongSinhCanChi	= $this->bang_tuong_sinh($can, $chi);
    	$tuongSinhChiCan	= $this->bang_tuong_sinh($chi, $can);
    	
    	if ($tuongKhacCanChi) return $this->result_luanCanChi(4);
    	if ($tuongKhacChiCan) return $this->result_luanCanChi(5);
    	if ($tuongSinhCanChi) return $this->result_luanCanChi(1);
    	if ($tuongSinhChiCan) return $this->result_luanCanChi(2);
    	return $this->result_luanCanChi(3);

    }
    public function luanCucMenh($p_cuc,$p_menh){
    	$arr_nguhanhcuc    = array
						    	(
						            'Thủy nhị cục'	=> 3,
						            'Mộc tam cục'	=> 2,
						            'Kim tứ cục'	=> 1,
						            'Thổ ngũ cục'	=> 5,
						            'Hỏa lục cục'	=> 4,
						       	);
    	$arr_nguhanhmenh 	= array
						    	(
						    		'Hải Trung Kim' => '1',
						            'Lư Trung Hỏa'  =>'4',
						            'Đại Lâm Mộc'   =>'2',
						            'Lộ Bàng Thổ'   =>'5',
						            'Kiếm Phong Kim'=>'1',
						            'Sơn Đầu Hỏa'   =>'4',
						            'Giản Hạ Thủy'  =>'3',
						            'Thành Đầu Thổ' =>'5',
						            'Bạch Lạp Kim'  =>'1',
						            'Dương Liễu Mộc'=>'2',
						            'Tuyền Trung Thủy'=>'3',
						            'Ốc Thượng Thổ' =>'5',
						            'Tích Lịch Thủy'=>'3',
						            'Tùng Bách Mộc' =>'2',
						            'Trường Lưu Thủy'=>'3',
						            'Sa Trung Kim'  =>'1',
						            'Sơn Hạ Hỏa'    =>'4',
						            'Bình Địa Mộc'  =>'2',
						            'Bích Thượng Thổ'=>'5',
						            'Kim Bạch Kim'  =>'1',
						            'Phúc Dăng Hỏa' =>'4',
						            'Thiên Hà Thủy' =>'3',
						            'Đại Dịch Thổ'  =>'5',
						            'Thoa Xuyến Kim'=>'1',
						            'Tang Đố Mộc'   =>'2',
						            'Đại khê Thủy'  =>'3',
						            'Sa Trung Thổ'  =>'5',
						            'Thiên Thượng Hỏa'=>'4',
						            'Thạch Lựu Mộc' =>'2',
						            'Đại Hải Thủy'  =>'3',
						    	);
    	
    	$cuc = (int)$arr_nguhanhcuc[$p_cuc];
    	$menh = (int)$arr_nguhanhmenh[$p_menh];

    	$tuongKhacCucMenh	= $this->bang_tuong_khac($cuc, $menh);
    	$tuongKhacMenhCuc	= $this->bang_tuong_khac($menh, $cuc);
    	$tuongSinhCucMenh	= $this->bang_tuong_sinh($cuc, $menh);
    	$tuongSinhMenhCuc	= $this->bang_tuong_sinh($menh, $cuc);
    	
    	if ($tuongKhacCucMenh) return $this->result_luanCucMenh(4);
    	if ($tuongKhacMenhCuc) return $this->result_luanCucMenh(5);
    	if ($tuongSinhCucMenh) return $this->result_luanCucMenh(1);
    	if ($tuongSinhMenhCuc) return $this->result_luanCucMenh(2);
    	return $this->result_luanCucMenh(3);
    }
    // ham ho tro ham luanCanChi
    private function result_luanCanChi($loai){
    	$luancanchi = array
    					(
    						1 => 'Can sinh chi',
    						2 => 'Chi sinh can',
    						3 => 'Can chi bình hòa',
    						4 => 'Can khắc chi',
    						5 => 'Chi khắc can',
    					);
    	$CI =& get_instance();
    	$CI->load->database();
    	$result_loaicanchi = $CI->db->where('loaicanchi', $loai)->get('loai_can_chi')->row_array();

    	if( !empty($result_loaicanchi)){
    		return array
    				(
    					'item' => $luancanchi[$result_loaicanchi['loaicanchi']],
    					'content' => $result_loaicanchi['noidung'],
    				);
    	}
    	return false;
    }
    // ham ho tro ham luanCucAndMenh
    private function result_luanCucMenh($loai){
    	$luancucmenh = array
    					(
    						1 => 'Cục sinh mệnh',
    						2 => 'Mệnh sinh cục',
    						3 => 'Cục mệnh bình hòa',
    						4 => 'Cục khắc mệnh',
    						5 => 'Mệnh khắc cục',
    					);
    	$CI =& get_instance();
    	$CI->load->database();
    	$result_loaicucmenh = $CI->db->where('loaicucmenh', $loai)->get('loai_cuc_menh')->row_array();

    	if( !empty($result_loaicucmenh)){
    		return array
    				(
    					'item' => $luancucmenh[$result_loaicucmenh['loaicucmenh']],
    					'content' => $result_loaicucmenh['noidung'],
    				);
    	}
    	return false;
    }
    //end hh

    public function get_info_date($ngay = 6,$thang = 6 , $nam = 2017){
    	$this->CI = &get_instance();
    	$this->CI->load->library(array('site/ngayamduong'));
        $duonglich = array( $ngay, $thang, $nam );
        $amlich      = $this->CI->ngayamduong->get_amlich( $duonglich ); 
        $canchingay  = $this->CI->ngayamduong->get_canchi_ngay( $duonglich );
        $canchithang = $this->CI->ngayamduong->get_canchi_thang( $amlich );
        $canchinam   = $this->CI->ngayamduong->get_canchi_nam( $amlich );
        $data['ngaycanchi'] = $this->CI->ngayamduong->get_canchi_ngay( $duonglich, 'text' );
        $data['thangcanchi'] = $this->CI->ngayamduong->get_canchi_thang( $amlich, 'text'  );
        $data['namcanchi']   = $this->CI->ngayamduong->get_canchi_nam( $amlich, 'text'  );
        $data['ngaythu']     = $this->CI->ngayamduong->get_ngaythu($duonglich);
        $data['canchingay_text'] = array('can'=>$this->get_can_menh((int)$canchingay['can']),'chi'=>$this->get_chi_menh((int)$canchingay['chi']));
        $data['canchithang_text'] = array('can'=>$this->get_can_menh((int)$canchithang['can']),'chi'=>$this->get_chi_menh((int)$canchithang['chi']));
        $data['canchinam_text'] = array('can'=>$this->get_can_menh((int)$canchinam['can']),'chi'=>$this->get_chi_menh((int)$canchinam['chi']));
        //var_dump($data['namcanchi']);
        $data['amlich'] = $amlich;
        $data['canchingay'] = $canchingay;
        $data['canchithang']    = $canchithang;
        $data['canchinam']  = $canchinam;
        return $data;
    }

    public function Db_get_info_user($input){
    	$this->CI = &get_instance();
    	$this->CI->load->library(array('site/ngayamduong'));
        $ngay_sinh = $input['ngay_sinh'];
        $thang_sinh = $input['thang_sinh'];
        $nam_sinh   = $input['nam_sinh'];
        $gioi_tinh  = isset($input['gioitinh'])?$input['gioitinh']:0;   // nam is 0, nu is 1
        $data      = array(
            'ngay_sinh' => $ngay_sinh,
            'thang_sinh' => $thang_sinh,
            'nam_sinh' => $nam_sinh,
        );
        // add data user
        //$result = $this->CI->public_model->db->insert('dev_data_users',$data);

        // info send
        $duonglich = array( $ngay_sinh, $thang_sinh, $nam_sinh );
        $amlich      = $this->CI->ngayamduong->get_amlich( $duonglich ); 
        // $canchingay  = $this->CI->ngayamduong->get_canchi_ngay( $duonglich );
        // $canchithang = $this->CI->ngayamduong->get_canchi_thang( $amlich );
        $canchinam   = $this->CI->ngayamduong->get_canchi_nam( $amlich );
        $data['canchinam_number']   = $canchinam;
        // $data['ngaycanchi'] = $this->CI->ngayamduong->get_canchi_ngay( $duonglich, 'text' );
        // $data['thangcanchi'] = $this->CI->ngayamduong->get_canchi_thang( $amlich, 'text'  );
        $data['namcanchi']   = $this->CI->ngayamduong->get_canchi_nam( $amlich, 'text'  );

        //var_dump($data['namcanchi']);
        $data['amlich'] = $amlich;
        // $data['canchingay'] = $canchingay;
        // $data['canchithang']    = $canchithang;
        //$data['canchinam']  = $canchinam;

        
        $data['canchinam_text'] = array('can'=>$this->get_can_menh((int)$canchinam['can']),'chi'=>$this->get_chi_menh((int)$canchinam['chi']));
        return $data;
    }

    function get_can_menh($input = null){
        $arr = array(
            'Giáp'  => 1,
            'Ất'    => 2,
            'Bính'  => 3,
            'Đinh'  => 4,
            'Mậu'   => 5,
            'Kỷ'    => 6,
            'Canh'  => 7,
            'Tân'   => 8,
            'Nhâm'  => 9,
            'Quý'   => 10,
        );
        if($input == ''){
            return $arr;
        }
        if(is_int($input)){
            $result = array_flip($arr);
            return $result[$input];
        }
        else{
            //echo $input; exit()
            return $arr[$input];
        }
    }

    function get_chi_menh($input = null){
        $arr = array(
            'Tí'    => 1,
            'Sửu'   => 2,
            'Dần'   => 3,
            'Mão'   => 4,
            'Thìn'  => 5,
            'Tỵ'    => 6,
            'Ngọ'   => 7,
            'Mùi'   => 8,
            'Thân'  => 9,
            'Dậu'   => 10,
            'Tuất'  => 11,
            'Hợi'   => 12
        );
        if($input == ''){
            return $arr;
        }
        if(is_int($input)){
            $result = array_flip($arr);
            return $result[$input];
        }
        else{
            return $arr[$input];
        }
    }

    function isSao($param = null){
    	$saoAddId    = $this->saoAddId;
    	if ($param) {
    		return array_key_exists($param, $saoAddId)?$saoAddId[$param]:'';
    	}
    	return $saoAddId;
    }

    function getContentChinhtinhDetail(){
    	$this->CI =& get_instance();
        $this->CI->load->database();

        return $this->CI->db->select()
								->get('tbl_chinhtinh_detail')
								->result_array();

    }

    function getContentPhutinhDetail(){
    	$this->CI =& get_instance();
        $this->CI->load->database();

        return $this->CI->db->select()
								->get('tbl_phutinh_detail')
								->result_array();

    }

    function getContentSaoDetail($key, $arrSaoItem){
    	$this->CI =& get_instance();
        $this->CI->load->database();
        $arrCungHopNhat = $this->arrCungHopNhat;
        $arrTemp = null;
        foreach ($arrSaoItem as $value) {
        	if (array_key_exists($value, $arrCungHopNhat)) {
        		$arrTemp[] = $arrCungHopNhat[$value];
        	}
        	else{
        		$arrTemp[] = $value;
        	}
        }
        $getContentChinhtinhDetail = $this->CI->db->select()
        											->where_in('id_sao', $arrTemp)
													->get('tbl_chinhtinh_detail')
													->result_array();
		$getContentPhutinhDetail = $this->CI->db->select()
													->where_in('id_sao', $arrTemp)
													->get('tbl_phutinh_detail')
													->result_array();
		$arrResult = array(
			'cung_chi' => $key,
			'name_cung_chi' => $this->con_giap[$key],
			'content_chinh_tinh' => $getContentChinhtinhDetail,
			'content_phu_tinh' => $getContentPhutinhDetail, 
		);
		return $arrResult;
    }

    /**
    *
    * 
    * @param string	 ---
    * @return bool|null	---
    *
    **/
    function xacDinhNamTuoi($param){
    	$arrCuc = array(
    		'Thủy nhị cục'	=> 2,
            'Mộc tam cục'	=> 3,
            'Kim tứ cục'	=> 4,
            'Thổ ngũ cục'	=> 5,
            'Hỏa lục cục'	=> 6,
    	);
    	return $arrCuc[$param];
    }

    function xacDinhChieuChay($param1, $param2){
    	$chiUser = $param1;	// int
    	$gioitinhUser = $param2;	// nam = 1, nu = 0
    	
    	$arrAmduongChi = $this->arrAmduongChi;

    	$userChiAmduong = $arrAmduongChi[$chiUser];
    	if ($userChiAmduong and $gioitinhUser) {
    		return true;
    	}
    	if (!$userChiAmduong and !$gioitinhUser) {
    		return true;
    	}
    	if (!$userChiAmduong and $gioitinhUser) {
    		return false;
    	}
    	if ($userChiAmduong and !$gioitinhUser) {
    		return false;
    	}
    }

    function createdLaso($arr = null){
    	$ngaycanchi['nam'] ='';
        $ngaycanchi['thang'] ='';
        $ngaycanchi['ngay'] ='';
        if( $arr['lich'] == 1 ){
            $gioitinh  = $arr['gioitinh'];
            $lich_am   = xem_ngay_am($arr['ngay'],$arr['thang'],$arr['nam']);
            $ngay_am   = $lich_am[0];
            $thang_am  = $lich_am[1]; 
            $nam_sinh_am_lich = $lich_am[2];
            $gio       =  $arr['gio'];
            $can       = $this->am_lich( $lich_am[2] );
            $chi       = (string)$this->am_lich( $lich_am[2], 2 );
            $trungtam_tuvi['nam']   = $arr['nam'].' ('.$this->can($can).' '.$this->chi($chi).')';
            $trungtam_tuvi['thang'] = $arr['thang'].' ('.$thang_am.')';
            $trungtam_tuvi['ngay']  = $arr['ngay'].' ('.$ngay_am.')';
            $trungtam_tuvi['gio']   = list_gio_sinh_operator($arr['gio']);
            $trungtam_tuvi['namxem'] = $arr['namxem'];
                    // NGAY CAN CHI.
             $n       = $this->getN($arr['ngay'], $arr['thang'], $arr['nam']);
             $so_ngay = $this->songay($arr['ngay'], $arr['thang'], $arr['nam']);
             $can_chi_ngay = $this->getCanChiNgay($n, $so_ngay, $arr['nam']);
             $ngaycanchi['ngay']    = $this->getCan( $can_chi_ngay['can'] ).' '.$this->getChi( $can_chi_ngay['chi'] );
             $ngaycanchi['thang']   = $this->getCanChiThang( $thang_am, $lich_am[2] );
             $ngaycanchi['nam']     = $this->getCanChiNam( $arr['nam'] );

            $canChiNamNumber    = $this->getCanChiNamNumber( $arr['nam'] );
        }else{
            $gioitinh  = $arr['gioitinh'];
            $ngay_am   = $arr['ngay'];
            $thang_am  = $arr['thang']; 
            $gio       = $arr['gio'];
            $can       = $arr['can'];
            $nam_sinh_am_lich = $arr['nam'];
            $chi       = (string)$arr['chi'];
            $trungtam_tuvi['nam']   = $this->can($can).' '.$this->chi($chi);
            $trungtam_tuvi['thang'] = $thang_am;
            $trungtam_tuvi['ngay']  = $ngay_am;
            $trungtam_tuvi['gio']   = $this->con_giap($gio);
            $trungtam_tuvi['namxem'] = $arr['namxem'];
        }
        $data['can']    = $can;
        $data['chi']    = $chi;
        $data['thang_am']    = $thang_am;
        $data['gio']    = $gio;
        $data['gioitinh']    = $gioitinh;
        $data['ngay_am']    = $ngay_am;
        // XAC DINH TIỂU HẠN.
        $nam_sinh = (string)$this->am_lich( $nam_sinh_am_lich, 2 );
        $nam_xem  = (string)$this->am_lich( $arr['namxem'], 2 );
        $vi_tri_tieu_han = $this->xac_dinh_tieu_han( $gioitinh, $nam_sinh, $nam_xem );
        $vi_tri_tieu_han_cung = $vi_tri_tieu_han;
        $cung_tieu_han = $nam_xem;
        if( $gioitinh == 1 ){
            for( $i = 1; $i<= 12; $i++ ){
                $tuvi[ $vi_tri_tieu_han_cung ]['tieu_han'] = $this->chi( (string)$cung_tieu_han );
                $vi_tri_tieu_han_cung++;
                $cung_tieu_han++;
                if( $vi_tri_tieu_han_cung > 12 ){
                     $vi_tri_tieu_han_cung = 1;
                }
                if( $cung_tieu_han > 11 ){
                     $cung_tieu_han = 0;
                }
            }
        }else{
            for( $i = 1; $i<= 12; $i++ ){
                $tuvi[ $vi_tri_tieu_han_cung ]['tieu_han'] = $this->chi( (string)$nam_xem );
                $vi_tri_tieu_han_cung--;
                $nam_xem++;
                if( $vi_tri_tieu_han_cung <1 ){
                     $vi_tri_tieu_han_cung = 12;
                }
                if( $nam_xem > 11 ){
                     $nam_xem = 0;
                }
            }
        }    
        
        $menh_than =  $this->menh_than( $thang_am,$gio );
        // XAC DINH AM DUONG
        $am_duong = $this->xac_dinh_am_duong( $gioitinh, $can);
        // XÁC ĐỊNH CUNG.
        $vitri_lap_cung = $menh_than['menh']; 
        // XÁC ĐỊNH CỤC
        $cuc = $this->xem_cuc( $can, $vitri_lap_cung ) - 12;
        $vi_tri_cung_menh_vien = $vitri_lap_cung;
        $cung  = 1;
        $tuvi[ $vitri_lap_cung ]['cung'] = $this->cung( $cung );
        $tuvi[ $vitri_lap_cung ]['dai_han'] = $this->xac_dinh_dai_han( $cuc, $cung, $am_duong );
        if( $vitri_lap_cung == 12 ){
            $vitri = 1;
        }else{
            $vitri = $vitri_lap_cung + 1;
        }
        $luanThanCu = null;
        $cung  = $cung+1;
        for( $i = $cung; $i<= 12; $i++ ){
            
            $tuvi[ $vitri ]['cung'] = $this->cung( $cung );
            $tuvi[ $vitri ]['cung_id'] = $cung;
            if( $vitri == $menh_than['than'] ){
                $luanThanCu = $tuvi[ $vitri ]['cung'];
                $tuvi[ $vitri ]['cung'] = $tuvi[ $vitri ]['cung'].' (Thân)';
            }
            
            $tuvi[ $vitri ]['dai_han'] = $this->xac_dinh_dai_han( $cuc, $cung, $am_duong );
            if( $cung == 6 ){
                $vi_tri_cung_no_boc = $vitri;
            }
            if( $cung == 8 ){
                $vi_tri_cung_tat_ach = $vitri;
            }
            if( $vitri == 12 ){
                $vitri = 0;
            }
            $vitri++;
            $cung++;
        }

        $vi_tri_tu_vi = $this->tu_vi($ngay_am,$cuc);
        // dd($_POST);
         // XAC DINH VI TRI SAO CHINH TINH
        foreach( $tuvi as $key => $val ){
            $n_chinhtinh = $this->xac_dinh_sao_chinh_tinh( $vi_tri_tu_vi.$key );
            $n_sao_theo_gio = $this->xem_sao_theo_gio_sinh( $gio, $key );
            $arr_sao_theo_gio = explode(',',$n_sao_theo_gio);
            // dd($arr_sao_theo_gio,1);
            if( in_array( 1 + 73, $arr_sao_theo_gio ) ){
                $vi_tri_sao_van_xuong = $key;
            }
            if( in_array( 2 + 73, $arr_sao_theo_gio ) ){
                $vi_tri_sao_van_khuc = $key;
            }
            
            $n_sao_theo_thang = $this->xem_sao_theo_thang_sinh( $thang_am, $key );
            
            $arr_sao_theo_thang = explode(',',$n_sao_theo_thang);
            if( in_array( 2 + 79, $arr_sao_theo_thang ) ){
                $vi_tri_sao_ta_phu = $key;
            }
            
            if( in_array( 1 + 79, $arr_sao_theo_thang ) ){
                $vi_tri_sao_huu_bat = $key;
            }
            
            $n_sao_theo_van_va_cung = $this->xem_sao_theo_can_va_cung($can,$key);
            $n_mang = explode(',',$n_sao_theo_van_va_cung);
            if( in_array( 2 + 86,$n_mang) ){
                $vi_tri_loc_ton = $key;
            }
            // dd($vi_tri_loc_ton,1);
            // dd($n_chinhtinh,1);

            $tuvi[$key]['sao'] = $this->sao_chinh_tinh( $n_chinhtinh );
            // dd('hello ------------------------',1);
            $tuvi[$key]['sao_theo_gio']             = $this->sao_theo_gio_sinh( $n_sao_theo_gio );

            $tuvi[$key]['sao_theo_thang']           = $this->sao_theo_thang_sinh( $n_sao_theo_thang );
            $tuvi[$key]['sao_theo_can_va_cung']     = $this->sao_theo_can_va_cung( $n_sao_theo_van_va_cung );
            $tuvi[$key]['sao_theo_chi_va_cung']     = $this->sao_theo_chi_va_cung( $this->xem_sao_theo_chi_va_cung($chi,$key) );
            $tuvi[$key]['sao_hoa_loc_va_hoa_quyen'] = $this->sao_hoa( $this->xem_sao_hoa_loc_va_hoa_quyen( $can, $n_chinhtinh ) );
            $tuvi[$key]['sao_hoa_khoa_va_hoa_ky']   = $this->sao_hoa_khoa_hoa_ky( $can, $n_chinhtinh, $n_sao_theo_gio, $n_sao_theo_thang );
            $tuvi[$key]['hoa_tinh']                 = $this->xac_dinh_hoa_tinh( $gio, $chi, $gioitinh, $can, $key );
            $tuvi[$key]['linh_tinh']                = $this->xac_dinh_linh_tinh( $gio, $chi, $gioitinh, $can, $key );
            $tuvi[$key]['can_cung_dai_van']         = $this->can( $this->xac_dinh_can_cung_dai_van($can,$key) );
            if ($val['cung'] == 'Mệnh viên') {
                $this->xacDinhTamGiac   = $key;
            }
        }
        $vitri_tt = $chi+1;
        $vi_tri_sao_thai_tue = $vitri_tt;
        for( $j = 1; $j <= 12; $j++ ){
           $tuvi[$vitri_tt]['sao_thai_tue'] =    $this->vong_sao_thai_tue($j);
           if( $vitri_tt == 12 ){
             $vitri_tt = 1;
           } else{
              $vitri_tt++;
           } 
        }
        
        $vi_tri_truong_sinh = $this->vi_tri_sao_truong_sinh($cuc);
        // dd($vi_tri_loc_ton);
        if( $am_duong == 1 || $am_duong == 4 ){
            // XAC DINH LOC TON
            for( $k = 1; $k<=12; $k++ ){
                $tuvi[$vi_tri_loc_ton]['sao_theo_loc_ton'] =    $this->sao_theo_loc_ton($k);
                if( $vi_tri_loc_ton == 12 ){
                     $vi_tri_loc_ton = 0;
                }
                $vi_tri_loc_ton++;
            }
            // XAC DINH TRUONG SINH
            for( $l = 1; $l<=12; $l++ ){
                $tuvi[$vi_tri_truong_sinh]['sao_theo_truong_sinh'] =  $this->sao_theo_truong_sinh($l);
                if( $vi_tri_truong_sinh == 12 ){
                     $vi_tri_truong_sinh = 0;
                }
                $vi_tri_truong_sinh++;
            }
            
        }else{
            // XAC DINH LOC TON
            for( $k = 1; $k<=12; $k++ ){
                $tuvi[$vi_tri_loc_ton]['sao_theo_loc_ton'] =    $this->sao_theo_loc_ton($k);
                if( $vi_tri_loc_ton == 1 ){
                     $vi_tri_loc_ton = 13;
                }
                $vi_tri_loc_ton--;
            }
            
            // XAC DINH TRUONG SINH
            for( $l = 1; $l<=12; $l++ ){
                $tuvi[$vi_tri_truong_sinh]['sao_theo_truong_sinh'] =    $this->sao_theo_truong_sinh($l);
                if( $vi_tri_truong_sinh == 1 ){
                     $vi_tri_truong_sinh = 13;
                }
                $vi_tri_truong_sinh--;
            }
        }

        // dd($tuvi[$vi_tri_truong_sinh]['sao_theo_truong_sinh']);
        //XAC DINH SAO AN QUAN
        $vi_tri_sao_an_quan = $this->vi_tri_sao_an_quan( $vi_tri_sao_van_xuong, $ngay_am );
        $tuvi[$vi_tri_sao_an_quan]['sao_an_quan'] = '<span class="color_2">Ân quang</span>';
        //XAC DINH SAO THIEN QUY
        $vi_tri_sao_thien_quy = $this->vi_tri_sao_thien_quy( $vi_tri_sao_van_khuc,$ngay_am);
        $tuvi[$vi_tri_sao_thien_quy]['sao_thien_quy'] = '<span class="color_4">Thiên quý</span>';
        // XAC DINH SAO TAM THAI
        $vi_tri_sao_tam_thai    = $this->vi_tri_sao_tam_thai( $vi_tri_sao_ta_phu, $ngay_am );
        $tuvi[$vi_tri_sao_tam_thai]['sao_tam_thai'] = '<span class="color_1">Tam thai</span>';
        // XAC DINH SAO BAT TOA
        $vi_tri_sao_bat_toa    = $this->vi_tri_sao_bat_toa( $vi_tri_sao_huu_bat, $ngay_am );
        $tuvi[$vi_tri_sao_bat_toa]['sao_bat_toa'] = '<span class="color_2">Bát tọa</span>';
        // XAC DINH VI TRI SAO DAU QUAN
        $vi_tri_sao_dau_quan = $this->vi_tri_sao_dau_quan( $vi_tri_sao_thai_tue, $thang_am, $gio );
        $tuvi[$vi_tri_sao_dau_quan]['sao_dau_quan'] = '<span class="color_3">Đẩu quân</span>';
        // XAC DINH VI TRI SAO THIEN TAI
        $vi_tri_sao_thien_tai = $this->vi_tri_sao_thien_tai( $vi_tri_cung_menh_vien, $chi );
        $tuvi[ $vi_tri_sao_thien_tai ]['sao_thien_tai'] ='<span class="color_4">Thiên tài</span>';
        // XAC DINH VI TRI SAO THIEN THO
        $vi_tri_cung_than =  $menh_than['than'];
        $vi_tri_sao_thien_tho = $this->vi_tri_sao_thien_tho( $vi_tri_cung_than, $chi );
        $tuvi[$vi_tri_sao_thien_tho]['sao_thien_tho'] = '<span class="color_4">Thiên thọ</span>';
        // XAC DINH VI TRI SAO THIEN THUONG
        $tuvi[$vi_tri_cung_no_boc]['sao_thien_thuong'] = '<span class="color_4">Thiên thương</span>';
        // XAC DINH VI TRI SAO THIEN SU
        $tuvi[$vi_tri_cung_tat_ach]['sao_thien_su'] = '<span class="color_1">Thiên sứ</span>';
        // XAC DINH VI TRI SAO THIEN LA
        $tuvi[5]['sao_thien_la'] = '<span class="color_5">Thiên la</span>';
        // XAC DINH VI TRI SAO DIA VONG
        $tuvi[11]['sao_dia_vong'] = '<span class="color_5">Địa võng</span>';
        // XAC DINH SAO LUU DONG
        $can_nam_xem       = $this->am_lich( $arr['namxem'] );
        $chi_nam_xem       = (string)$this->am_lich( $arr['namxem'], 2 );
        for( $i = 1; $i<= 12; $i++ ){
           	$tuvi[$i]['sao_luu_dong'] =   $this->sao_luu_dong( $chi_nam_xem,$can_nam_xem,$i );  
        }
        // XAC DINH THANG HAN
        $vi_tri_han_thang = $this->xac_dinh_han_thang( $vi_tri_tieu_han, $gio, $thang_am );
        for( $i = 1; $i<=12; $i++ ){
			$tuvi[ $vi_tri_han_thang ]['han_thang'] = 'Tháng '.$i;
			$vi_tri_han_thang++;
			if( $vi_tri_han_thang > 12 ){
				$vi_tri_han_thang = 1;
			}
        }
        // dd($tuvi);
        $data['triet'] = $this->vi_tri_triet( $can ); 
        $data['tuan']  = $this->vi_tri_tuan( $can, $chi ); 
        $trungtam_tuvi['hovaten'] = $arr['hovaten'];
        $trungtam_tuvi['cuc']   = $this->cuc( $cuc );
        $trungtam_tuvi['amduong'] = $this->xac_dinh_am_duong( $gioitinh, $can, true );
        // XAC DINH CHU MENH
        $trungtam_tuvi['chumenh'] =  $this->chu_menh( $chi );
         // XAC DINH CHU THAN
        $trungtam_tuvi['chuthan'] =  $this->chu_than( $chi );  
        $trungtam_tuvi['nguhanh'] =  $this->ngu_hanh_nap_am_ban_menh($can,$chi);
        $data['nguhanh_of_user'] = $nguhanhOfUser = $this->nguhanhOfUser($can, $chi);
        $data['trungtam_tuvi'] = $trungtam_tuvi;
        $data['tuvi']          = $tuvi;

        // tinh am duong cua can
        // hh : key can trong tu vi khac key can trong my_helper
        $namam  = $this->get_info_date($_POST['ngay'],$_POST['thang'],$_POST['nam']);
        $flip_can_tuvi      = array_flip( $this->can());
        $can_am             = $flip_can_tuvi[$namam['canchinam_text']['can']];
        // end hh
        // $amDuongOfCan   = $this->amDuongOfCan($canChiNamNumber['can']);edit
        $amDuongOfCan   = $this->amDuongOfCan($can_am);
        $amDuongOfViTriCung = $this->amDuongOfViTriCung($this->xacDinhTamGiac);
        // dd($this->xacDinhTamGiac);
        $amDuongThuanHop    = $amDuongOfCan==$amDuongOfViTriCung?'Âm dương thuận lý':'Âm dương nghịch lý';

        // hh ngaythangnamam
        
        $tuoi_am     = ($_POST['namxem'] - $namam['amlich'][2]) + 1 ;
        $data['tuoi_am'] = $tuoi_am;
        // end hh ngaythangnamam

        // luan cuc va menh
        // $luanCucAndMenh = $this->luanCucAndMenh($trungtam_tuvi['cuc'], $trungtam_tuvi['nguhanh']);
        $luanCucAndMenh = $this->luanCucMenh($trungtam_tuvi['cuc'], $trungtam_tuvi['nguhanh']);
        
        $data['menh_than'] = $this->menh_than( $thang_am,$gio );
        $html ='<div class="lasotuvi" id="lasotuvi">
                   <div class="cot_cung3_4_5_6" >';
        $html.= $this->cung_html( $tuvi[6],6, $data['tuan'], $data['triet'], 1 );
        $html.= $this->cung_html( $tuvi[5],5, $data['tuan'], $data['triet'], 2 );
        $html.= $this->cung_html( $tuvi[4],4, $data['tuan'], $data['triet'], 3 );
        $html.= $this->cung_html( $tuvi[3],3, $data['tuan'], $data['triet'], 4 );            
                      
        $html.=' </div>';
        $html.='        <div class="cot_cung1_2_tt_7_8" > ';
                         $html.= $this->cung_html( $tuvi[7],7, $data['tuan'], $data['triet'], 5 );
                         $html.= $this->cung_html( $tuvi[8],8, $data['tuan'], $data['triet'], 6 );
                      
                    $html.='<div class="cot_trungtam">
                      		<div class="top_trungtam hidden_desktop">
                      			<div class="titleLaso">Lá số tử vi</div>
	                      		<div class="domainName">( xemvanmenh.net )</div>
                      		</div>
		                    <div class="center_trungtam">
		                    	<table>
			                        <tbody>
			                            <tr class="mb_color_hoten">
			                               <td><label>Họ tên:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['hovaten'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label>Năm:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['nam'].' </td>
			                            </tr>
			                            <tr>
			                               <td><label>Tháng:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['thang'].' '.$ngaycanchi["thang"].' </td>
			                            </tr>
			                            <tr>
			                               <td><label>Ngày:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['ngay'].' '.$ngaycanchi["ngay"].' </td>
			                            </tr>
			                            <tr>
			                               <td><label>Giờ:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['gio'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label>Năm xem:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['namxem'].' ( '.$tuoi_am.' tuổi )</td>
			                            </tr>
			                            <tr>
			                               <td><label>Âm dương:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['amduong'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label>Mệnh:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'.$trungtam_tuvi['nguhanh'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label>Cục:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['cuc'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label></label></td>
			                               <td></td>
			                            </tr>
			                            <tr>
			                               <td><label>Chủ mệnh:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['chumenh'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label>Chủ thân:&nbsp;&nbsp;</label></td>
			                               <td class="trungtam_ct">'. $trungtam_tuvi['chuthan'].'</td>
			                            </tr>
			                            <tr>
			                               <td><label></label></td>
			                               <td></td>
			                            </tr>
			                        </tbody>
			                    </table>
			                    <section class="trungtam_bot">
			                        <h6 class="font_trungtam_bot"><b>'.$amDuongThuanHop.'</b></h6>
			                        <h6 class="font_trungtam_bot"><b>'.$luanCucAndMenh['item'].'</b></h6>
			                        <h6 class="font_trungtam_bot"><b> Thân cư '.$luanThanCu.'</b></h6>
			                    </section>
		                    </div>
                        </div>';
        $html.= $this->cung_html( $tuvi[2],2, $data['tuan'], $data['triet'], 7 );
        $html.= $this->cung_html( $tuvi[1],1, $data['tuan'], $data['triet'], 8); 
                          
        $html.='          </div>';
        $html.='   <div class="cot_cung9_10_11_12">';
        $html.= $this->cung_html( $tuvi[9],9, $data['tuan'], $data['triet'], 9 );
        $html.= $this->cung_html( $tuvi[10],10, $data['tuan'], $data['triet'], 10 );
        $html.= $this->cung_html( $tuvi[11],11, $data['tuan'], $data['triet'], 11 );
        $html.= $this->cung_html( $tuvi[12],12, $data['tuan'], $data['triet'], 12 );          
        $html.='</div>';   
        $data['backgroundLaSo'] = $background = $GLOBALS['backgroundLaSo'] = 'background_'.$this->xacDinhTamGiac.'.png';
        //$html.= '<style type="text/css">#lasotuvi{ background: url("'.base_url('templates/site/images/bg_laso/'.$background).'"); }</style>';
        // $html.= '<style type="text/css">#lasotuvi{ 
        // 	background: url("'.base_url().'templates/site/laso/bg_laso/'.$background.'"), url('.base_url().'templates/site/laso/bg_laso/laso.png) no-repeat top left;
        // }</style>';
        $html.= '<style type="text/css">.cot_trungtam{ 
        	background: url("'.base_url().'templates/site/laso/bg_laso/'.$background.'");background-size:100% 100%;}</style>';
        // $html.= '<style type="text/css">#lasotuvi{ 
        // 	background: url("'.base_url().'templates/site/laso/bg_laso/'.$background.'")
        // }</style>';
        require_once('templates/site/laso/laso.css.php');
        $data['success'] = $html;
        $tinhTongCacDinhTamGiac = $this->tinhTongCacDinhTamGiac($this->xacDinhTamGiac,$this->numberOut);

        $arrBoxTungthang	= array(
        	6, 5, 4, 3, 2, 1, 9, 10, 11, 12
        );
        for ($i = 1; $i <= 12 ; $i++) {
        	$tinhTongCacDinh12DinhTamGiac[$i]    = $this->tinhTongCacDinh12DinhTamGiac($i, $this->numberOut);
        	
        }

        $quyDoiCacKhungTheoCungmenh	= null;
        foreach ($tinhTongCacDinh12DinhTamGiac as $key => $value) {
        	// $quyDoiCacKhungTheoCungmenh
        }

        // Tinh sao han
        $arrSaohan 	= $this->tinhSaoHan(array(
        	'can'	=> $can,
        ));

        $list_sao = array();
        $this->CI =& get_instance();
        $this->CI->load->database();
        foreach( $this->numberOutCungmenh as $key => $val )
        {
           $rs = $this->CI->db->where('cungmenh_id',$key)->where_in('sao_id',$val)->get('cung_menh')->result_array(); 
           $list_sao = array_merge($list_sao,$rs);
        }
        $data['ynghiasao']  = $list_sao;
        $data['tonghopsao']  = $this->tonghopsao;
        $data['tonghopcung'] = $this->cung;


        // Noi dung am duong
        
        $contentThanCu  = $this->contentThanCu($luanThanCu);
        $data['contentAmDuong'] = $contentAmDuong = $this->contentAmDuong($amDuongThuanHop);
        $data['amDuongThuanHop']    = $amDuongThuanHop;
        $data['nameThanCu']     = $luanThanCu;
        $data['contentThanCu']  = $contentThanCu;
        $data['luanCucAndMenh'] = $luanCucAndMenh;
        $data['tinhTongCacDinh12DinhTamGiac']    = $tinhTongCacDinh12DinhTamGiac;

        // Noi dung sao chinh tinh
        if ($this->saoChinhtinhArr) {
        	foreach ($this->saoChinhtinhArr as $value) {
        		$contentSaochinhtinhArr[] = $this->CI->db->select()
						        						->where('id_sao',$this->arrCungHopNhat[$value['id_sao']])
						        						->where('id_cung',$value['id_cung'])
						        						->where('position', $value['numberHour'])
						        						->get('tbl_chinhtinh')
						        						->row_array();
        	}
        }
        $data['contentSaochinhtinhArr']	= $contentSaochinhtinhArr;

        // Noi dung sao phu tinh
        if ($this->saoPhutinhArr) {
        	foreach ($this->saoPhutinhArr as $key => $value) {
        		$nameSao = $this->cung[$key];
        		$contentSaophutinhArr[$key] = $this->CI->db->select()
        													->where_in('id_sao', $value)
        													->where('id_cung', $key)
        													->get('tbl_phutinh')
        													->result_array();
        	}
        }
        $data['contentSaophutinhArr']	= $contentSaophutinhArr;

        // Nọi dung sao chinh tinh va phu tinh tai cung
        if ($this->numberOut) {
        	foreach ($this->numberOut as $key => $value) {
        		$getContentSaoDetail[$key] = $this->getContentSaoDetail($key, $value);
        	}
        }
        $data['get_content_sao_detail']	= $getContentSaoDetail;
        

        // $data['get_content_chinhtinh_detail']	= $this->getContentChinhtinhDetail();
        // $data['get_content_phutinh_detail']	= $this->getContentPhutinhDetail();

        // Tinh sao ghep theo tuoi
        $xacDinhNamTuoiFirst = (int)$this->xacDinhNamTuoi($trungtam_tuvi['cuc']);
        $xacDinhNamTuoiEnd = $xacDinhNamTuoiFirst+80;
        $xacDinhChieuChay = $this->xacDinhChieuChay($chi ,$gioitinh);	// true or false
        $xacDinhCungBatDauChay = $this->xacDinhTamGiac;
        /** Quy doi thanh cung dau tien de chay **/

		// Xac dinh 24 tuoi dau
		$arrCungJoin = array(
			1	=> 7,
			2	=> 8,
			3	=> 9,
			4	=> 10,
			5	=> 11,
			6	=> 12,
			7	=> 1,
			8	=> 2,
			9	=> 3,
			10	=> 4,
			11	=> 5,
			12	=> 6,
		);
		// Xac dinh cac tuoi cheo

		$tuoiNow = $xacDinhNamTuoiFirst;
		$cungNow = $xacDinhCungBatDauChay;
		$arrHungData[$cungNow][] = $tuoiNow;

		$tuoiNext = $tuoiNow+1;
		$cungNext = $arrCungJoin[$xacDinhCungBatDauChay];
		$arrHungData[$cungNext][] = $tuoiNext;

		$tuoiNextOfNext = $tuoiNext+1;
		if ($xacDinhChieuChay) {	// neu chieu thuan thi tru cung di 1
			$cungNextOfNext = $cungNext - 1>=1?$cungNext-1:12-($cungNext - 1);
		}
		else{
			$cungNextOfNext = $cungNext + 1<=12?$cungNext+1:$cungNext+1-12;
		}
		$arrHungData[$cungNextOfNext][] = $tuoiNextOfNext;

		$cungTemp = $cungNextOfNext;
		// Cung con lai trong 10 cung sau
		if ($xacDinhChieuChay) {	// Neu chay vong theo chieu thuan
			for ($j = $tuoiNextOfNext+1; $j <= $xacDinhNamTuoiFirst + 10 ; $j++) {
				$tuoiTemp = $j;
				$cungTemp++;
				if ( $cungTemp > 12 ) {
					$cungTemp = $cungTemp - 12;
				}
				if ($tuoiTemp <= 100) {
					$arrHungData[$cungTemp][] = $tuoiTemp;
				}
			}
		}
		else{
			for ($j = $tuoiNextOfNext+1; $j <= $xacDinhNamTuoiFirst + 10 ; $j++) {
				$tuoiTemp = $j;
				$cungTemp--;
				if ( $cungTemp <= 0 ) {
					$cungTemp = 12 + $cungTemp;
				}
				if ($tuoiTemp <= 100) {
					$arrHungData[$cungTemp][] = $tuoiTemp;
				}
			}
		}

		$arrTuoiMin = $arrHungData;
		foreach ($arrTuoiMin as $key => $value) {
			if ($value) {
				foreach ($value as $valueTM) {
					if ($xacDinhChieuChay) {
						$valueTuoiTemp = $valueTM;
						$cungTemp = $key;
						for ($i = 10; $i <= 110 ; $i+=10) {
							$cungTemp++;
							if ($cungTemp == 13) {
								$cungTemp = 1;
							}
							$tuoiTemp = $valueTuoiTemp + $i;
							if ($tuoiTemp <= 100) {
								$arrHungData[$cungTemp][]	= $tuoiTemp;
							}
						}
					}
					else{
						$valueTuoiTemp = $valueTM;
						$cungTemp = $key;
						for ($i = 10; $i <= 110 ; $i+=10) {
							$cungTemp--;
							if ($cungTemp == 0) {
								$cungTemp = 12;
							}
							$tuoiTemp = $valueTuoiTemp + $i;
							if ($tuoiTemp <= 100) {
								$arrHungData[$cungTemp][]	= $tuoiTemp;
							}
						}
					}
				}
			}
		}

		/** Tinh han tuổi trong từng cung **/
		$hanTuoiTrongCung = $this->hanTuoiTrongCung(
			$arrHungData, 
			array($arr['ngay'], $arr['thang'], $arr['nam'])
		);
		/** End **/

		/** Tinh han tuoi tre con **/
		$this->hanTuoiTrongCungTrecon(
			$arrHungData,
			array($arr['ngay'], $arr['thang'], $arr['nam'])
		);
		$data['han_tuoi_tre_con']	= $hanTuoiTrecon = $this->hanTuoiTrecon(array($arr['ngay'], $arr['thang'], $arr['nam']));
		/** End **/

		// Merger tuoi voi nhau
		foreach ($hanTuoiTrecon as $key => $value) {
			$hanTuoiTrongCung[$key] = $value;
		}
		ksort($hanTuoiTrongCung);
		$data['han_tuoi_trong_cung'] = $hanTuoiTrongCung;

		/** Tinh han tuoi can **/
		$data['han_tuoi_can'] = $this->hanTuoiCan($can);
		$data['han_tuoi_chi'] = $this->hanTuoiChi($chi);
		$data['han_tong_quat'] = $this->hanTongQuat($nguhanhOfUser);


        return $data;
    }

    /**
    *
    * Tinh han tuoi trong tung cung
    * @param array	 mang danh sach cac du lieu tuoi
    * @return array  danh sach noi dung sao trong cac cung
    *
    **/
    /*function hanTuoiTrongCungDemo($param){
    	for ($i = 1; $i <= 12 ; $i++) {
        	$get12DinhSaohan[$i]    = $this->tinhTongCacDinhSaohan($i, $this->numberOut);
        }
        $result = null;
        foreach ($param as $key => $value) {
        	sort($value);
        	$result[$key]	= array(
        		'age' => $value,
        		'han' => $get12DinhSaohan[$key],
        	);
        }
        return $result;
    }*/

    function hanTuoiTrongCung($param, $param_ngaysinh){
    	for ($i = 1; $i <= 12 ; $i++) {
        	$get12DinhSaohan[$i]    = $this->tinhTongCacDinhSaohan($i, $this->numberOut);
        }
        $this->get12DinhSaohan = $get12DinhSaohan;
        $result = null;
        foreach ($param as $key => $value) {
        	if ($value) {
        		foreach ($value as $valueItemTuoi) {
        			$lich_am   = xem_ngay_am($param_ngaysinh[0],$param_ngaysinh[1],$param_ngaysinh[2]+$valueItemTuoi-1);
					$can       = $this->am_lich( $lich_am[2] );
            		$chi       = (string)$this->am_lich( $lich_am[2], 2 );
            		$canchi = $this->can($can).' '.$this->chi($chi);

        			$result[$valueItemTuoi]	= array(
        				'year'	=> $canchi,
        				'han' => $get12DinhSaohan[$key],
        			);
        		}
        	}
        	// $result[$key]	= $get12DinhSaohan[$key];
        }
        ksort($result);
        return $result;
    }

    function hanTuoiTrongCungTrecon($param, $param_ngaysinh){
    	for ($i = 1; $i <= 12 ; $i++) {
        	$get12DinhSaohanTrecon[$i]    = $this->tinhTongCacDinhSaohanTrecon($i, $this->numberOut);
        }
        $this->get12DinhSaohanTrecon = $get12DinhSaohanTrecon;
        $result = null;
        foreach ($param as $key => $value) {
        	if ($value) {
        		foreach ($value as $valueItemTuoi) {
        			$lich_am   = xem_ngay_am($param_ngaysinh[0],$param_ngaysinh[1],$param_ngaysinh[2]+$valueItemTuoi-1);
					$can       = $this->am_lich( $lich_am[2] );
            		$chi       = (string)$this->am_lich( $lich_am[2], 2 );
            		$canchi = $this->can($can).' '.$this->chi($chi);

        			$result[$valueItemTuoi]	= array(
        				'year'	=> $canchi,
        				'han' => $get12DinhSaohanTrecon[$key],
        			);
        		}
        	}
        	// $result[$key]	= $get12DinhSaohan[$key];
        }
        ksort($result);
        return $result;
    }

    function hanTuoiTrecon($param_ngaysinh){
    	$arrAgeChildren = array(	// Xac dinh tuoi han theo cung
    		1 => 1,
    		2 => 9,
    		3 => 8,
    		4 => 11,
    		5 => 3,
    		6 => 5,
    		7 => 6,
    		8 => 7,
    		9 => 10,
    		10 => 12,
    		11 => 2,
    		12 => 4,
    	);
    	$khungSuyraCung = $this->khungSuyraCung;
    	foreach ($this->khungSuyraCung as $key => $value) {
    		$contentCung[$value] = $this->get12DinhSaohanTrecon[$key];
    	}
    	// dd($this->get12DinhSaohan, 1);
    	// Chay 12 tuoi tre con
    	for ($i = 1; $i <= 12 ; $i++) {
    		// xac dinh cung thuoc tuoi
    		$cungOfAge = $arrAgeChildren[$i];
    		$contentOfAge = $contentCung[$cungOfAge];
    		$lich_am   = xem_ngay_am($param_ngaysinh[0],$param_ngaysinh[1],$param_ngaysinh[2]+$i-1);
			$can       = $this->am_lich( $lich_am[2] );
    		$chi       = (string)$this->am_lich( $lich_am[2], 2 );
    		$canchi = $this->can($can).' '.$this->chi($chi);

    		$resultContent[$i] = array(
    			'year' => $canchi,
    			'han' => $contentOfAge,
    		);
    	}
    	return $resultContent;
    }

    function hanTuoiCan($param){
    	$arr = array(
    		'0'  => '',
            '1'  => '',
            '2'  => '',
            '3'  => '',
            '4'  => 'Người tuổi Giáp (mệnh MỘC) phải cẩn thận khi gặp sao Thiên-Hình, ngay cả sao THIÊN-TƯỚNG cũng bị Thiên-Hình khuất phục. Trường hợp giảm khinh khi Thiên-Hình đắc địa (Dần, Mão, Dậu, Tuất) (trích TỬ VI NGHIỆM LÝ của cụ Thiên-Lương trang 55)',
            '5'  => 'Người tuổi Ất (mệnh MỘC) phải cẩn thận khi gặp sao Thiên-Hình, ngay cả sao THIÊN-TƯỚNG cũng bị Thiên-Hình khuất phục. Trường hợp giảm khinh khi Thiên-Hình đắc địa (Dần, Mão, Dậu, Tuất) (trích TỬ VI NGHIỆM LÝ của cụ Thiên-Lương trang 55)',
            '6'  => 'Người tuổi Bính (mệnh HỎA) phải cẩn thận khi gặp sao Hóa-Kỵ. Trừ khi Hóa-Kỵ ở những cung sau: Thìn, Tuất, Sửu, Mùi (trích TỬ VI NGHIỆM LÝ của cụ Thiên-Lương trang 55)',
            '7'  => 'Người tuổi Đinh (mệnh HỎA) phải cẩn thận khi gặp sao Hóa-Kỵ. Trừ khi Hóa-Kỵ ở những cung sau: Thìn, Tuất, Sửu, Mùi (trích TỬ VI NGHIỆM LÝ của cụ Thiên-Lương trang 55)',
            '8'  => '',
            '9'  => ''
    	);
    	if (array_key_exists($param, $arr)) {
    		return $arr[$param];
    	}
    	return null;
    }

    function hanTuoiChi($param){
    	$arr = array(
    		'0'  => 'Người tuổi Tí kỵ năm: Dần, Thân, Tí, Ngọ và Hạn Tam-Tai: Dần, Mão, Thìn. Năm hạn: Dần, Thân. Năm xung: Ngọ',
            '1'  => 'Người tuổi Sửu kỵ năm: Sửu, Ngọ và tối kỵ khi sao THẤT-SÁT nhập hạn. Hạn Tam-Tai: Tí, Sửu, Hợị Năm hạn: Sửu, Ngọ',
            '2'  => 'Người tuổi Dần kỵ năm: Tỵ, Hợi, Mão, Dậu và hạn Tam-Tai: Thân, Dậu, Tuất. Năm hạn: Tỵ, Hợị Năm xung: Thân',
            '3'  => 'Người tuổi Mão kỵ năm: Tỵ, Hợi, Mão, Dậu và hạn Tam-Tai: Tỵ, Ngọ, Mùị Năm hạn: Tỵ, Hợị Năm xung: Dậụ',
            '4'  => 'Người tuổi Thìn kỵ năm: Thìn và tối kỵ gặp hạn ở cung Thìn, Tuất và cung an Thân. Hạn Tam-Tai: Dần, Mão, Thìn. Năm xung: Tuất',
            '5'  => 'Người tuổi Tỵ kỵ năm: Tỵ và tối kỵ khi gặp hạn ở cung Tỵ và cung an Thân. Hạn Tam-Tai: Tí, Sửu, Hợị Năm xung: Hợị',
            '6'  => 'Người tuổi Ngọ kỵ năm: Sửu, Ngọ và tối kỵ khi sao THẤT-SÁT nhập hạn. Hạn Tam-Tai: Thân, Dậu, Tuất. Năm hạn: Sửu, Ngọ',
            '7'  => 'Người tuổi Mùi kỵ năm: Dậu, Hợi và tối kỵ khi sao Kình-Dương nhập hạn. Hạn Tam-Tai: Tỵ, Ngọ, Mùị Năm hạn: Dậu, Hợị',
            '8'  => 'Người tuổi Thân kỵ năm: Dần, Ngọ và sao Hỏa-Tinh hay sao Linh-Tinh nhập hạn. Hạn Tam-Tai: Dần, Mão, Thìn. Năm hạn: Ngọ. Năm xung: Dần',
            '9'  => 'Người tuổi Dậu kỵ năm: Mão, Dậu và sao Kình-Dương hay sao Đà-La nhập hạn. Hạn Tam-Tai: Tí, Sửu, Hợị Năm xung: Mãọ',
            '10' => 'Người tuổi Tuất kỵ năm: Thìn, Tuất, và gặp hạn ở cung Thìn, cung Tuất và cung an Thân và sao Kình-Dương, Đà-Lạ Hạn Tam-Tai: Thân, Dậu, Tuất. Năm hạn: Tỵ. Năm xung: Thìn',
            '11' => 'Người tuổi Hợi kỵ năm: Thìn, Tuất, cung Thìn, Tuất và tối kỵ sao Kình-Dương, Đà-La nhập hạn. Hạn Tam-Tai: Tỵ, Ngọ, Mùị Năm xung: Tỵ'
    	);
    	if (array_key_exists($param, $arr)) {
    		return $arr[$param];
    	}
    	return null;
    }

    function hanTongQuat($nguhanh = null){
    	$arr = array(
    		'Kim' => array(
    			'content' => 'Kim-Mệnh: Hạn đến cung Tí, thuộc quẻ Khảm, thuộc Thủy, Kim sinh Thủy, ví như vàng chảy ra nước. Vì thế Bản-Mệnh bị hao tổn. Do đó thường mắc tại ương, rất đáng lo ngại',
    			'cung' => 1
    		),
    		'Mộc' => array(
    			'content' => 'Mộc-Mệnh: Hạn đến cung Ngọ, thuộc quẻ Ly, thuộc Hỏa Mộc sinh Hỏa, ví như củi gổ nhóm lửa sau tan thành tro than. Vì thế Bản-Mệnh tuy sáng sủa rực rở, nhưng chẳng được lâu bền. Do đó khó tránh được những tại ương, họa hại',
    			'cung' => 7
    		),
    		'Thủy' => array(
    			'content' => 'Hỏa-Mệnh: Hạn đến cung Dậu, thuộc quẻ Đoài, thuộc Kim. Hỏa khắc Kim, ví như lửa nung vàng nóng chảy. Vì thế Bản-Mệnh bị nguy khốn. Nên khó tránh thoát được những tại ương khủng khiếp.',
    			'cung' => 10
    		),
    		'Hỏa' => array(
    			'content' => 'Thủy-Mệnh: Hạn đến cung Dần, thuộc quẻ Cấn, thuộc Mộc. Thủy dưỡng Mộc, ví như nước tươi tắm cho cây cỏ, về sau khô cằn nên Bản-Mệnh lâm vào chỗ  bế tắc. Bởi vậy mọi việc đều trắc trở, không được xứng ý, toại lòng.',
    			'cung' => 3,
    		),
    		'Thổ' => array(
    			'content' => 'Thổ-Mệnh: Hạn đến cung Mão, thuộc quẻ Chấn thuộc Mộc. Thổ khắc Mộc, vã lại Chấn là biểu tượng của sấm sét, điện, lửạ Vì thế Bản-Mệnh đã suy nhược lại bị hoại thương. Do đó thường hay mắc bệnh điên cuồng, hay bệnh khí huyết rất nguy hiểm.',
    			'cung' => 4,
    		)
    	);
    	if (array_key_exists($nguhanh, $arr)) {
    		return $arr[$nguhanh];
    	}
    	return false;
    }
}      