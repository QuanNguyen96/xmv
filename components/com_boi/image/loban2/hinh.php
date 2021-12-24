<?php
/**
 * phongthuys Model for phongthuy World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

/**
 * phongthuy Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class boiModelHinh extends JModel
{
	function kieu($image,$k,$mau,$o,$width=968,$left,$right,$top,$bottom,$hientext,$traiqua){

$tu=0;
$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
$chia=$o/10;
$o=$o;
$giua=(int)$k/2;

$a=$traiqua%$k;

for ($i=$a; $i<$a+30; $i++){
$h=$i;
$tru=$o*$a;

$m=2*90*$h;
$m2=2*90*($h+1);
$tinh1=deg2rad($m/$giua);
$gt1=340-(int)(sin($tinh1)*100)*$chia;
$x1=$o*$h+32-$tru;

$x2= $o*($h+1)+32-$tru;
$tinh2=deg2rad($m2/$giua);
$gt2=340-(int)(sin($tinh2)*100)*$chia;

if($x2<$width){
	$con1=$i%$k;
    $chiadoi1=(int)($k/2);
    if($con1<$chiadoi1){imageline($image, $x1, (int)($gt1/2)+20,$x2, (int)($gt2/2)+20, $mau);imageline($image, $x1+1, (int)($gt1/2)+20,$x2+1, (int)($gt2/2)+20, $mau);}
	else if($con1>$chiadoi1){imageline($image, $x1, (int)($gt1/2)+20,$x2, (int)($gt2/2)+20, $mau);imageline($image, $x1+1, (int)($gt1/2)+20,$x2+1, (int)($gt2/2)+20, $mau);}
	else {imageline($image, $x1, (int)($gt1/2)+21,$x2, (int)($gt2/2)+21, $mau);imageline($image, $x1+1, (int)($gt1/2)+21,$x2+1, (int)($gt2/2)+21, $mau);}
}
if($hientext==1){
$con=$i%$k;
$chiadoi=(int)($k/2);

if($con<$chiadoi){
	$trung=($gt2/2+18-$top)/$o;
    $dem=$trung;
    $phantram=100-$dem*10;
    imagettftext($image, 10, 0,$x2 ,(int)($gt2/2)+20,  $mau, $font,(int)$phantram);
}
else if($con>$chiadoi){
	$trung=($gt2/2+20-$top)/$o;
    $dem=$trung;
    $phantram=100-$dem*10;
	imagettftext($image, 10, 0,$x2 ,(int)($gt2/2)+20,  $mau, $font,(int)$phantram);
}else{
	
	$trung=($gt2/2+21-$top)/$o;
    $dem=$trung;
    $phantram=100-$dem*10;
	imagettftext($image, 10, 0,$x2 ,(int)($gt2/2)+20,  $mau, $font,(int)$phantram);

}
}

}


}

function songay($thang,$nam){
switch($thang){
case 1: return 31;break;
case 2: if($nam%4==0){
	return 29;break;
    }else{ 
	return 28;
	break;
	}
case 3: return 31;break;
case 5: return 31;break;
case 7: return 31;break;
case 8: return 31;break;
case 10: return 31;break;
case 12: return 31;break;
case 4: return 30;break;
case 6: return 30;break;
case 9: return 30;break;
case 11: return 30;break;
}
}
function getThangTiep($thang){
if($thang==12)return 1;
else return $thang+1;
}

function get30($hientai){
$arr=array();
$ex=explode('-',$hientai);
$ngay=(int)$ex[0];
$thang=(int)$ex[1];
$nam=$ex[2];
$songaythang=$this->songay($thang,$nam);
for($i=$ngay;$i<$songaythang+1;$i++)$arr[]=$i.'.'.$thang;

if(count($arr)<32){
$thangtiep=$this->getThangTiep($thang);
$songaythang=$this->songay($thangtiep,$nam);
$con=32-count($arr);
for($i=1;$i<$con;$i++)$arr[]=$i.'.'.$thangtiep;
}
return $arr;

}
function layNgay($ngay){
	$date = new DateTime('');
	$ngayxuat=array();
	$hientai[]=$date->format('Y-m-d');
	$hientai[]=$date->format('d-m-Y');
	$ex=explode('-',$ngay);
	$ngay=$ex[0];
	$thang=$ex[1];
	$nam=$ex[2];
	$songay=$this->songay($thang,$nam);
	if($ngay>$songay){return $hientai;break;}
	if($thang>12||$thang<0){return $hientai;break;}
	if($nam<1900||$nam>2100){return $hientai;break;}
	$ngayxuat[]=$nam.'-'.$thang.'-'.$ngay;
	$ngayxuat[]=$ngay.'-'.$thang.'-'.$nam;
	return $ngayxuat;
}
function cachngay($ngaysinh){
jimport( 'joomla.utilities.date' );
$a=new JDate($ngaysinh.' 00:00:00');	
//$date1 = new DateTime($ngaysinh.' 00:00:00');
//$t1=$date1->getTimestamp();
$t1=$a->toUnix();
//$date = new DateTime();
//$t2=$date->getTimestamp();

$b =new JDate();
$t2=$b->toUnix();

$du=$t2-$t1;
$ngay1=24*60*60;
return (int)($du/$ngay1);
}
function namdu($ngay){
$ex=explode('-',$ngay);
$nam=$ex[2];
$date = new DateTime();
$namhientai=$date->format('Y');
$namdu=$namhientai-$nam;
$du=(int)($namdu/4);
if($namhientai%4==0)$du=$du+1;
return $du;
}


function showNhipSinhHoc(){

$graphValues=array(0,10,11,12,13,14,50,80,111,240,55);
$imgWidth=750;
$imgHeight=400;
$o=($imgWidth-100)/25;
$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';


$image=imagecreate($imgWidth, $imgHeight);

$colorWhite=imagecolorallocate($image, 255, 255, 255);
$colorGrey=imagecolorallocate($image, 192, 192, 192);
$colorBlue=imagecolorallocate($image, 0, 0, 255);
$colorBlack=imagecolorallocate($image, 0, 0, 0);

$tritue=imagecolorallocate($image,42,214,42);
$suckhoe=imagecolorallocate($image,241,104,60);
$tinhcam=imagecolorallocate($image,29,139,209);
$tamlinh=imagecolorallocate($image,255,0,153);
$trucquan=imagecolorallocate($image,205,178,0);
$thammy=imagecolorallocate($image,153,0,153);


$margin_left=10;
$margin_top=80;
$margin_bottom=40;
$margin_right=10;

$o=22;
for ($i=1; $i<32; $i++){
imageline($image, $i*$o+$margin_left, $margin_top, $i*$o+$margin_left, 300, $colorGrey);
}


for ($i=0; $i<11; $i++){
imageline($image,$margin_left+$o, $o*$i+$margin_top, $imgWidth-$margin_right-48, $o*$i+$margin_top, $colorGrey);
}


$x=$margin_left-5;
$y=$o;
for($i=0;$i<11;$i++){
imagettftext($image, 8, 0, $x, $y*($i-1)+100,  $colorBlack, $font, ((10-$i)*10).'%');
}

$cach=340;
$rong=125;
$trukhoangcach=105;
$trukhoang=50;


imagefilledrectangle($image,$rong*1-120, $cach-$trukhoang+50,$rong*1-$trukhoang-60, $cach+10, $suckhoe);
imagefilledrectangle($image,$rong*2-120, $cach-$trukhoang+50,$rong*2-$trukhoang-60, $cach+10, $tinhcam);
imagefilledrectangle($image,$rong*3-120, $cach-$trukhoang+50,$rong*3-$trukhoang-60, $cach+10, $tritue);
imagefilledrectangle($image,$rong*4-120, $cach-$trukhoang+50,$rong*4-$trukhoang-60, $cach+10, $trucquan);
imagefilledrectangle($image,$rong*5-120, $cach-$trukhoang+50,$rong*5-$trukhoang-60, $cach+10, $thammy);
imagefilledrectangle($image,$rong*6-120, $cach-$trukhoang+50,$rong*6-$trukhoang-60, $cach+10, $tamlinh);


$ngaysinh1=JRequest::getVar('ngaysinh');
$mang_ngay=$this->layNgay($ngaysinh1);
$ngaysinh=$mang_ngay[0];
$ngaysinhcuaban=$mang_ngay[1];
$traiqua=$this->cachngay($mang_ngay[0]);
$namdu=$this->namdu($ngaysinhcuaban);
$conngay=365-$traiqua%365+$namdu;
imagettftext($image, 11, 0, 200, 30, $colorBlack, $font, 'Chu kỳ nhịp sinh học của bạn trong 30 ngày tới');
imagettftext($image, 11, 0,120, 50, $colorBlack, $font, "Ngày sinh : $ngaysinhcuaban đã trải qua $traiqua ngày, còn $conngay ngày nữa đến sinh nhật");

$x=30;
$y=$imgHeight-$margin_bottom-35;

$width=968;
$hientext=0;
$hien=JRequest::getInt('hien',0);
$sk=JRequest::getInt('sk',0);
$tt=JRequest::getInt('tt',0);
$tc=JRequest::getInt('tc',0);
$tq=JRequest::getInt('tq',0);
$tm=JRequest::getInt('tm',0);
$tl=JRequest::getInt('tl',0);
$ex_l=explode(',',$t);
if($sk==1)$this->kieu($image,23,$suckhoe,$o,$width,$margin_left,$margin_right,$margin_top,$margin_bottom,$hien,$traiqua);
if($tc==1)$this->kieu($image,28,$tinhcam,$o,$width,$margin_left,$margin_right,$margin_top,$margin_bottom,$hien,$traiqua);
if($tt==1)$this->kieu($image,33,$tritue,$o,$width,$margin_left,$margin_right,$margin_top,$margin_bottom,$hien,$traiqua);
if($tq==1)$this->kieu($image,38,$trucquan,$o,$width,$margin_left,$margin_right,$margin_top,$margin_bottom,$hien,$traiqua);
if($tm==1)$this->kieu($image,43,$thammy,$o,$width,$margin_left,$margin_right,$margin_top,$margin_bottom,$hien,$traiqua);
if($tl==1)$this->kieu($image,53,$tamlinh,$o,$width,$margin_left,$margin_right,$margin_top,$margin_bottom,$hien,$traiqua);

$date = new DateTime('');
$hientai=$date->format('d-m-Y');
$ngay30=$this->get30($hientai);

for($i=0;$i<31;$i++){
imagettftext($image, 8, 90, $o*($i)+40, $y, $colorBlack, $font, $ngay30[$i]);
}

imagettftext($image, 10, 0, $rong*1-$trukhoangcach, $cach+10, $suckhoe, $font, 'Sức khỏe 23');
imagettftext($image, 10, 0, $rong*2-$trukhoangcach,$cach+10, $tinhcam, $font, 'Tình cảm 28');
imagettftext($image, 10, 0, $rong*3-$trukhoangcach,$cach+10, $tritue, $font, 'Trí tuệ 33');
imagettftext($image, 10, 0, $rong*4-$trukhoangcach,$cach+10, $trucquan, $font, 'Trực quan 38');
imagettftext($image, 10, 0, $rong*5-$trukhoangcach,$cach+10, $thammy, $font, 'Thẩm mỹ 43');
imagettftext($image, 10, 0, $rong*6-$trukhoangcach,$cach+10, $tamlinh, $font, 'Tâm linh 53');

imagepng($image);
imagedestroy($image);
}
function getCung2($cung,$tai,$so){
$a=array();
$tam=$tai+$so;
if($tam-1==count($cung))$a['cung_truoc']=$cung[1];
else $a['cung_truoc']=$cung[$tai+$so];

if($tai-1==0)$a['cung_sau']=$cung[count($cung)];
else $a['cung_sau']=$cung[$tai-1];

//$a['cung_truoc']='truoc';
//$a['cung_sau']='sau';
return $a;

}
function getKhoang($khoang,$tai){
$a=array();	

if($tai+1==count($khoang))$a['truoc']=$khoang[0];
else $a['truoc']=$khoang[$tai+1];

if($tai-1==0)$a['sau']=$khoang[count($khoang)-2];
else $a['sau']=$khoang[$tai-1];


return $a;
}

function showthuocloban(){
$loai=JRequest::getVar('loai','v52');
$khoang=JRequest::getInt('khoang','');
$cung=JRequest::getInt('cung','');

$loaithuoc=$this->getTypev($loai);	
$mang=$this->getNameKC($loaithuoc);

$khoang_name=$mang['khoang'][$khoang];
$cung_name=$mang['cung'][$cung];
$so=count($mang['cung'])/(count($mang['khoang'])-2);
$taikhoang=$khoang*$so-$so+1;
$tai=$khoang*$so-$so+1;
$truocsau=$this->getKhoang($mang['khoang'],$khoang);



$imgHeight=600;
$imgWidth=90;

$dem=count($mang['khoang'])-2;
$demcung=count($mang['cung'])/$dem;
$demne=$demcung-($demcung*$khoang-$cung);
if($demcung==5){
$thuoc= JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'image'.DS.'loban2'.DS.'thuoc.png';
$them=0;
}else {
	$thuoc= JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'image'.DS.'loban2'.DS.'thuoc0.png';
	$them=25;
}
$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
$img = $this->LoadPNG($thuoc);

$colorWhite=imagecolorallocate($img, 255, 255, 255);
$colorGrey=imagecolorallocate($img, 192, 192, 192);
$colorBlue=imagecolorallocate($img, 0, 0, 255);
$colorBlack=imagecolorallocate($img, 0, 0, 0);




for($i=0;$i<$so;$i++){
$tencung=$mang['cung'][$i];	
imagettftext($img, 8, 0, 95+$i*(87+$them), 50, $colorBlack, $font,$mang['cung'][$taikhoang]);
$taikhoang=$taikhoang+1;
}

$cung_TS=$this->getCung2($mang['cung'],$tai,$so);


$taikhoang=$taikhoang-$so;
imagettftext($img, 12, 0, 250, 25, $colorBlue, $font,$khoang_name);


imagettftext($img, 12, 0, 5, 25,  $colorBlack, $font,$truocsau['sau']);
imagettftext($img, 9, 0, 5, 50,  $colorBlack, $font,$cung_TS['cung_sau']);

imagettftext($img, 12, 0, 520, 25,  $colorBlack, $font,$truocsau['truoc']);
imagettftext($img, 9, 0, 520, 50,  $colorBlack, $font,$cung_TS['cung_truoc']);





$dem=count($mang['khoang'])-2;
$demcung=count($mang['cung'])/$dem;
$demne=$demcung-($demcung*$khoang-$cung);

$hinhchon = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'image'.DS.'loban2'.DS.'chon.png';
$hinhquay=imagecreatefrompng($hinhchon);
imagecopy($img, $hinhquay,125+(83+$them)*($demne-1),55,0 ,0, 18, 15);


//imagettftext($img, 12, 0, 100, 25,  $colorBlack, $font,$demne.' '.$cung);








imagepng($img);
imagedestroy($img);

}
function getTypev($v){
	if($v=="v52"||$v=="v51"||$v=="v48")$l=1;
    else if($v=="v42") $l=3;
	else $l=2;
	return $l;
}


function getNameKC($type_f,$khoang=null,$cung=null){
if($type_f=="1"){

  $kq['khoang'][1]="Quý nhân";
  $kq['khoang'][2]="Hiểm hoạ";
  $kq['khoang'][3]="Thiên tai";
  $kq['khoang'][4]="Thiên tài";
  $kq['khoang'][5]="Nhân lộc";
  $kq['khoang'][6]="Cô độc";
  $kq['khoang'][7]="Thiên tặc";
  $kq['khoang'][8]="Tể tướng";
  $kq['khoang'][9]="Quý nhân";
  $kq['khoang'][0]="Tể tướng";
  
  $kq['cung'][1]="Quyền lộc";
  $kq['cung'][2]="Trung tín";
  $kq['cung'][3]="Tác quan";
  $kq['cung'][4]="Phát đạt";
  $kq['cung'][5]="Thông minh";
  $kq['cung'][6]="Án thành";
  $kq['cung'][7]="Hỗn nhân";
  $kq['cung'][8]="Thất hiếu";
  $kq['cung'][9]="Tai hoa";
  $kq['cung'][10]="Thường bệnh";
  $kq['cung'][11]="Hoàn tử";
  $kq['cung'][12]="Quan tài";
  $kq['cung'][13]="Thân tàn";
  $kq['cung'][14]="Thất tài";
  $kq['cung'][15]="Hệ quả";
  $kq['cung'][16]="Thi thơ";
  $kq['cung'][17]="Văn học";
  $kq['cung'][18]="Thanh quý";
  $kq['cung'][19]="Tác lộc";
  $kq['cung'][20]="Thiên lộc";
  $kq['cung'][21]="Trí tồn";
  $kq['cung'][22]="Phú quý";
  $kq['cung'][23]="Tiến bửu";
  $kq['cung'][24]="Thập thiện";
  $kq['cung'][25]="Văn chương";
  $kq['cung'][26]="Bạc nghịch";
  $kq['cung'][27]="Vô vọng";
  $kq['cung'][28]="Ly tán";
  $kq['cung'][29]="Tửu thục";
  $kq['cung'][30]="Dâm dục";
  $kq['cung'][31]="Phong bệnh";
  $kq['cung'][32]="Chiêu ôn";
  $kq['cung'][33]="Ôn tài";
  $kq['cung'][34]="Ngục tù";
  $kq['cung'][35]="Quan tài";
  $kq['cung'][36]="Đại tài";
  $kq['cung'][37]="Thi thơ";
  $kq['cung'][38]="Hoạnh tài";
  $kq['cung'][39]="Hiếu tử";
  $kq['cung'][40]="Quý nhân";
  
}else if($type_f==2){

 $kq['khoang'][1]="Đinh";
 $kq['khoang'][2]="Hại";
 $kq['khoang'][3]="Vượng";
 $kq['khoang'][4]="Khổ";
 $kq['khoang'][5]="Nghĩa";
 $kq['khoang'][6]="Quan";
 $kq['khoang'][7]="Tử";
 $kq['khoang'][8]="Hưng";
 $kq['khoang'][9]="Thất";
 $kq['khoang'][10]="Tài";
 $kq['khoang'][11]="Đinh";
 $kq['khoang'][0]="Tài";

 
  $kq['cung'][1]="Phúc tinh";
  $kq['cung'][2]="Cập đệ";
  $kq['cung'][3]="Tài vượng";
  $kq['cung'][4]="Đăng khoa";
  $kq['cung'][5]="Khấu thiệt";
  $kq['cung'][6]="Bệnh lâm";
  $kq['cung'][7]="Tử tuyệt";
  $kq['cung'][8]="Tai chí";
  $kq['cung'][9]="Thiên đức";
  $kq['cung'][10]="Hỉ sự";
  $kq['cung'][11]="Tiền bảo";
  $kq['cung'][12]="Nạp phúc";
  $kq['cung'][13]="Thất thoát";
  $kq['cung'][14]="Quan quỉ";
  $kq['cung'][15]="Kiếp tài";
  $kq['cung'][16]="Vô tự";
  $kq['cung'][17]="Đại cát";
  $kq['cung'][18]="Tài vượng";
  $kq['cung'][19]="Ích lợi";
  $kq['cung'][20]="Thiên khổ";
  $kq['cung'][21]="Phú quý";
  $kq['cung'][22]="Tiền bảo";
  $kq['cung'][23]="Hoạnh tài";
  $kq['cung'][24]="Thuận khoa";
  $kq['cung'][25]="Ly hương";
  $kq['cung'][26]="Tử biệt";
  $kq['cung'][27]="Thoái đinh";
  $kq['cung'][28]="Thất tài";
  $kq['cung'][29]="Đăng khoa";
  $kq['cung'][30]="Quý tử";
  $kq['cung'][31]="Thiêm đinh";
  $kq['cung'][32]="Hưng vượng";
  $kq['cung'][33]="Cô quả";
  $kq['cung'][34]="Lao chấp";
  $kq['cung'][35]="Công sự";
  $kq['cung'][36]="Thoái tài";
  $kq['cung'][37]="Nghinh phúc";
  $kq['cung'][38]="Lục hợp";
  $kq['cung'][39]="Tiền bảo";
  $kq['cung'][40]="Tài đức";



}else{

  $kq['khoang'][1]="Tài";
  $kq['khoang'][2]="Bệnh";
  $kq['khoang'][3]="Ly";
  $kq['khoang'][4]="Nghĩa";
  $kq['khoang'][5]="Quan";
  $kq['khoang'][6]="Kiếp";
  $kq['khoang'][7]="Hại";
  $kq['khoang'][8]="Bản";
  $kq['khoang'][9]="Tài";
  $kq['khoang'][0]="Bản";


  $kq['cung'][32]="Hưng vương";
  $kq['cung'][31]="Tiến bảo";
  $kq['cung'][30]="Đăng khoa";
  $kq['cung'][29]="Tài chí";
  $kq['cung'][28]="Khẩu thiệt";
  $kq['cung'][27]="Bệnh lâm";
  $kq['cung'][26]="Tử tuyệt";
  $kq['cung'][25]="Tai chí";
  $kq['cung'][24]="Tài thất";
  $kq['cung'][23]="Ly hương";
  $kq['cung'][22]="Thoái khẩu";
  $kq['cung'][21]="Tử biệt";
  $kq['cung'][20]="Phú quý";
  $kq['cung'][19]="Tiến Ích";
  $kq['cung'][18]="Hoạnh tài";
  $kq['cung'][17]="Thuận khoa";
  $kq['cung'][16]="Đại cát";
  $kq['cung'][15]="Quí tử";
  $kq['cung'][14]="Ích lợi";
  $kq['cung'][13]="Thiêm Đinh";
  $kq['cung'][12]="Thất thoát";
  $kq['cung'][11]="Quan quỉ";
  $kq['cung'][10]="Kiếp Tài";
  $kq['cung'][9]="Trường khố";
  $kq['cung'][8]="Cô quả";
  $kq['cung'][7]="Lao chấp";
  $kq['cung'][6]="Công sự";
  $kq['cung'][5]="Thoái tài";
  $kq['cung'][4]="Nghinh phúc";
  $kq['cung'][3]="Lục hợp";
  $kq['cung'][2]="Bảo khố";
  $kq['cung'][1]="Tài đức";
}
return $kq;
}



function showHuongnha(){
$imgHeight=900;
$imgWidth=582;

$batquai= JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'image'.DS.'hinh'.DS.'batquai.png';
$img = $this->LoadPNG($batquai);
$colorBlue=imagecolorallocate($img, 0, 0, 255);
$img=$this->vekhung($img,$doquay,$colorBlue);

$ten=JRequest::getVar('hoten','Tô Hoài Thanh');
$namsinh=JRequest::getInt('namsinh','1986');
$gioitinh=JRequest::getInt('gioitinh',0);
$year_b=$namsinh;

$canchi_y=$this->doiCan($year_b)." ".$this->doichi($year_b);
$cungchon=$this->getCung($year_b,$gioitinh);
$quachon=$this->getQua($phuong);

if($cungchon->qua==$quachon)$loaihuongchon="tốt";
else $loaihuongchon="xấu";

$loai_huong=$this->getLoaiHuong($cungchon->cung);
$loaihuong=explode(",",$loai_huong[0]);
$huong_tot_xau=explode(",",$loai_huong[1]);
$huongxay=explode(",",$loai_huong[2]);
$nguhanh=$this->getNguHanh($canchi_y);


$menh=$cungchon->cung;
$degrees=JRequest::getInt('do',0);
$huongnha=$degrees;
$huong='Bính';
$toa='Nhâm';
//$this->veTen($img,$ten,$ngaysinh,$menh,$huongnha,$huong,$toa);

$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
$do  = imagecolorallocate($img, 255,60,0);
$den  = imagecolorallocate($img, 0, 0, 0);

$degrees=-JRequest::getInt('do',0);
$do1=$this->getDo(-$degrees);

imagettftext($img, 13, 0,170 ,30,  $do, $font,'XEM HƯỚNG NHÀ CỦA BẠN');
imagettftext($img, 11, 0,10 ,50,  $den, $font,'Họ và tên: '.$ten);
imagettftext($img, 11, 0,10 ,70,  $den, $font,'Năm sinh: '.$namsinh.' - '.$canchi_y);
imagettftext($img, 11, 0,10 ,90,  $den, $font,'Mệnh: '.$menh.' - '.$cungchon->qua.' mệnh');
imagettftext($img, 11, 0,10 ,110,  $den, $font,'Ngũ hành: '.$nguhanh->nghiahan." ".$nguhanh->he);
imagettftext($img, 11, 0,360 ,50,  $den, $font,'Độ quay: '.$huongnha.' độ');
imagettftext($img, 11, 0,360 ,70,  $den, $font,'Hướng: '.$do1->huong);
imagettftext($img, 11, 0,360 ,90,  $den, $font,'Tọa: '.$do1->toa);

$vitri=explode(',',$loai_huong[0]);
$this->vitri($img,$vitri);
$watermark = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'image'.DS.'loban2'.DS.'watermark.png';
$watermark2=imagecreatefrompng($watermark);
imagecopy($img, $watermark2,5,360,0 ,0, 600, 80);
imagepng($img);
imagedestroy($img);

}

function doiCan($a){
	$number=substr($a,3);
	$number=$number>=4?$number-3:$number+7;
	$db		=& JFactory::getDBO();
    $query="SELECT *
            FROM `jos_sao_can`
            WHERE `id` = '$number'";
    $db->setQuery($query);
	$rows = $db->loadObjectList();
	return $rows[0]->can;
	}
	function doiChi($a){
	$number=$a%12;
	$number=$number>=4?$number-3:$number+9;
	$db		=& JFactory::getDBO();
    $query="SELECT *
            FROM `jos_sao_chi`
            WHERE `id` = '$number'";
    $db->setQuery($query);
	$rows = $db->loadObjectList();
	return $rows[0]->chi;
	}
 		function getCung($a,$b){  
		    $cung_r=array();
			$t=0;
			for($i=0;$i<4;$i++){
			$a1=substr($a,$i,1);
			$t=$a1+$t;				
			if($t>8)$t=$t-9;
			}
			if($t==0)$t=9;
			$db		=& JFactory::getDBO();
	if($b=="1")$t=$t+9;		
    $query="SELECT *
            FROM `jos_sao_cung`
            WHERE `id` = '$t'";
    $db->setQuery($query);
	$rows = $db->loadObjectList();
	return $rows[0];
	    }
	function getQua($a){
		if($a=="Tây"||$a=="Tây Nam"||$a=="Tây Bắc"||$a=="Đông Bắc")$m="Tây Tứ";
		else
		$m="Đông Tứ";
		return $m;
		}
	function getLoaiHuong($a){
		
     if($a=="Khảm"){
		 $m[]="Lục sát,Phục vị,Ngũ qui,Hoạ hại,Thiên y,Tuyệt mệnh,Diên niên,Sinh khí";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
	 else if($a=="Ly"){
		 $m[]="Tuyệt mệnh,Diên niên,Hoạ hại,Ngũ qui,Sinh khí,Lục sát,Phục vị,Thiên y";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
	 else if($a=="Cấn"){
		 $m[]="Thiên y,Ngũ qui,Phục vị,Diên niên,Lục sát,Sinh khí,Hoạ hại,Tuyệt mệnh";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="Đoài"){
		 $m[]="Sinh khí,Hoạ hại,Diên niên,Phục vị,Tuyệt mệnh,Thiên y,Ngũ qui,Lục sát";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="Càn"){
		 $m[]="Phục vị,Lục sát,Thiên y,Sinh khí,Ngũ qui,Diên niên,Tuyệt mệnh,Hoạ hại";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="Khôn"){
		 $m[]="Diên niên,Tuyệt mệnh,Sinh khí,Thiên y,Hoạ hại,Phục vị,Lục sát,Ngũ qui";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="Tốn"){
		 $m[]="Hoạ hại,Sinh khí,Tuyệt mệnh,Lục sát,Diên niên,Ngũ qui,Thiên y,Phục vị";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
	 else if($a=="Chấn"){
		 $m[]="Ngũ qui,Thiên y,Lục sát,Tuyệt mệnh,Phục vị,Hoạ hại,Sinh khí,Diên niên";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
		 $m[]="Tây Bắc,Bắc,Đông Bắc,Tây,Đông,Tây Nam,Nam,Đông Nam";
		return $m;
		}
	function getGiaiHuong($a){
		if($a=="Ngũ qui")$m="Gặp tai hoạ";
		else if($a=="Thiên y")$m="Gặp thiên thời được che chở";
		else if($a=="Lục sát")$m="Nhà có sát khí";
		else if($a=="Tuyệt mệnh")$m="Chết chóc";
		else if($a=="Phục vị")$m="Được sự giúp đỡ";
		else if($a=="Hoạ hại")$m="Nhà có hung khí";
		else if($a=="Sinh khí")$m="Phúc lộc vẹn toàn";
		else if($a=="Diên niên")$m="Mọi sự ổn định";
		return $m;
		}
	function getNguHanh1($a){
		if($a>1964){
		  $m=($a-1964)%60;
			}	
		else if($a<1964){
			$du=(1964-$a)%60;
			$nguyen=(1964-$a-$du)/60;
			//echo $nguyen;
			$m=$a+(($nguyen+1)*60);
			echo $m;
			$m=($m-1964)%60;
			}
		return $m;
		
		}
	function getNguHanh($a){
		$db		=& JFactory::getDBO();
    $query="SELECT *
            FROM `jos_sao_lucthap`
            WHERE `canchi` = '$a'";
    $db->setQuery($query);
	$rows = $db->loadObjectList();
	return $rows[0];
		}	



function LoadPNG($imgname)
{
    /* Attempt to open */
    $im = @imagecreatefrompng($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a blank image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }

    return $im;
}
function vekhung($img,$doquay,$mau){	
$degrees=-JRequest::getInt('do',0);
$cach_y=JRequest::getInt('cach_y',0);
$cach_x=JRequest::getInt('cach_x',0);
$do_x=JRequest::getInt('do_x',0);
$do_y=JRequest::getInt('do_y',$do_x);
$do1=$this->getDo(-$degrees);
$hinhkhungquay = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'image'.DS.'hinh'.DS.'khungquay.png';
$hinhquay=imagecreatefrompng($hinhkhungquay);
$hinhquay = imagerotate($hinhquay, $degrees,-1);
//imagecopy($img, $hinhquay,0,120, $do_x,$do_y, 582, 700);
imagecopy($img, $hinhquay,0,$do1->cach_y, $do1->do_x,$do1->do_y, 582, 700);
$den  = imagecolorallocate($img, 0, 0, 0);
$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
//imagettftext($img, 12, 0,30 ,30, $den, $font,$degrees.' '.$do1->do_x.' '.$do1->do_y);
imagedestroy($hinhquay);
return $img;
}

function mau($img,$huong){
$den  = imagecolorallocate($img, 0, 0, 0);	
$do  = imagecolorallocate($img, 255,60,0);
if($huong=='Phục vị'||$huong=='Thiên y'||$huong=='Diên niên'||$huong=='Sinh khí'){
	return $do;
}else{
 return $den;
}

}

function vitri($image,$array){

$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
imagettftext($image, 12, 0,265 ,256,  $this->mau($image,$array[6]), $font,$array[6]);
imagettftext($image, 12, -45,374 ,276, $this->mau($image,$array[5]), $font,$array[5]);
imagettftext($image, 12, -90,444,378, $this->mau($image,$array[3]) , $font,$array[3]);
imagettftext($image, 12, -135,423,493,  $this->mau($image,$array[0]), $font,$array[0]);
imagettftext($image, 12, -180,318 ,562,  $this->mau($image,$array[1]), $font,$array[1]);
imagettftext($image, 12, -225,190 ,534, $this->mau($image,$array[2]) , $font,$array[2]);
imagettftext($image, 12, -270,128 ,445,  $this->mau($image,$array[4]), $font,$array[4]);
imagettftext($image, 12, -315,155 ,328, $this->mau($image,$array[7]), $font,$array[7]);
}
function VeTen($img,$ten,$ngaysinh,$menh,$huongnha,$huong,$toa){
$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
$do  = imagecolorallocate($img, 255,60,0);
$den  = imagecolorallocate($img, 0, 0, 0);
imagettftext($img, 13, 0,170 ,30,  $do, $font,'XEM HƯỚNG NHÀ CỦA BẠN');
imagettftext($img, 11, 0,10 ,50,  $den, $font,'Họ và tên: '.$ten);
imagettftext($img, 11, 0,10 ,70,  $den, $font,'Năm sinh: '.$ngaysinh);
imagettftext($img, 11, 0,10 ,90,  $den, $font,'Mệnh: '.$menh);
imagettftext($img, 11, 0,400 ,50,  $den, $font,'Độ quay: '.$huongnha);
imagettftext($img, 11, 0,400 ,70,  $den, $font,'Hướng: '.$huong);
imagettftext($img, 11, 0,400 ,90,  $den, $font,'Tọa: '.$toa);

}
function getDo($do){
		$db		=& JFactory::getDBO();
    $query="SELECT *
            FROM `jos_sao_doquay`
            WHERE doquay=$do";
    $db->setQuery($query);
	$rows = $db->loadObject();
	return $rows;

}


}