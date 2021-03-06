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
imagettftext($image, 11, 0, 200, 30, $colorBlack, $font, 'Chu k??? nh???p sinh h???c c???a b???n trong 30 ng??y t???i');
imagettftext($image, 11, 0,120, 50, $colorBlack, $font, "Ng??y sinh : $ngaysinhcuaban ???? tr???i qua $traiqua ng??y, c??n $conngay ng??y n???a ?????n sinh nh???t");

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

imagettftext($image, 10, 0, $rong*1-$trukhoangcach, $cach+10, $suckhoe, $font, 'S???c kh???e 23');
imagettftext($image, 10, 0, $rong*2-$trukhoangcach,$cach+10, $tinhcam, $font, 'T??nh c???m 28');
imagettftext($image, 10, 0, $rong*3-$trukhoangcach,$cach+10, $tritue, $font, 'Tr?? tu??? 33');
imagettftext($image, 10, 0, $rong*4-$trukhoangcach,$cach+10, $trucquan, $font, 'Tr???c quan 38');
imagettftext($image, 10, 0, $rong*5-$trukhoangcach,$cach+10, $thammy, $font, 'Th???m m??? 43');
imagettftext($image, 10, 0, $rong*6-$trukhoangcach,$cach+10, $tamlinh, $font, 'T??m linh 53');

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

  $kq['khoang'][1]="Qu?? nh??n";
  $kq['khoang'][2]="Hi???m ho???";
  $kq['khoang'][3]="Thi??n tai";
  $kq['khoang'][4]="Thi??n t??i";
  $kq['khoang'][5]="Nh??n l???c";
  $kq['khoang'][6]="C?? ?????c";
  $kq['khoang'][7]="Thi??n t???c";
  $kq['khoang'][8]="T??? t?????ng";
  $kq['khoang'][9]="Qu?? nh??n";
  $kq['khoang'][0]="T??? t?????ng";
  
  $kq['cung'][1]="Quy???n l???c";
  $kq['cung'][2]="Trung t??n";
  $kq['cung'][3]="T??c quan";
  $kq['cung'][4]="Ph??t ?????t";
  $kq['cung'][5]="Th??ng minh";
  $kq['cung'][6]="??n th??nh";
  $kq['cung'][7]="H???n nh??n";
  $kq['cung'][8]="Th???t hi???u";
  $kq['cung'][9]="Tai hoa";
  $kq['cung'][10]="Th?????ng b???nh";
  $kq['cung'][11]="Ho??n t???";
  $kq['cung'][12]="Quan t??i";
  $kq['cung'][13]="Th??n t??n";
  $kq['cung'][14]="Th???t t??i";
  $kq['cung'][15]="H??? qu???";
  $kq['cung'][16]="Thi th??";
  $kq['cung'][17]="V??n h???c";
  $kq['cung'][18]="Thanh qu??";
  $kq['cung'][19]="T??c l???c";
  $kq['cung'][20]="Thi??n l???c";
  $kq['cung'][21]="Tr?? t???n";
  $kq['cung'][22]="Ph?? qu??";
  $kq['cung'][23]="Ti???n b???u";
  $kq['cung'][24]="Th???p thi???n";
  $kq['cung'][25]="V??n ch????ng";
  $kq['cung'][26]="B???c ngh???ch";
  $kq['cung'][27]="V?? v???ng";
  $kq['cung'][28]="Ly t??n";
  $kq['cung'][29]="T???u th???c";
  $kq['cung'][30]="D??m d???c";
  $kq['cung'][31]="Phong b???nh";
  $kq['cung'][32]="Chi??u ??n";
  $kq['cung'][33]="??n t??i";
  $kq['cung'][34]="Ng???c t??";
  $kq['cung'][35]="Quan t??i";
  $kq['cung'][36]="?????i t??i";
  $kq['cung'][37]="Thi th??";
  $kq['cung'][38]="Ho???nh t??i";
  $kq['cung'][39]="Hi???u t???";
  $kq['cung'][40]="Qu?? nh??n";
  
}else if($type_f==2){

 $kq['khoang'][1]="??inh";
 $kq['khoang'][2]="H???i";
 $kq['khoang'][3]="V?????ng";
 $kq['khoang'][4]="Kh???";
 $kq['khoang'][5]="Ngh??a";
 $kq['khoang'][6]="Quan";
 $kq['khoang'][7]="T???";
 $kq['khoang'][8]="H??ng";
 $kq['khoang'][9]="Th???t";
 $kq['khoang'][10]="T??i";
 $kq['khoang'][11]="??inh";
 $kq['khoang'][0]="T??i";

 
  $kq['cung'][1]="Ph??c tinh";
  $kq['cung'][2]="C???p ?????";
  $kq['cung'][3]="T??i v?????ng";
  $kq['cung'][4]="????ng khoa";
  $kq['cung'][5]="Kh???u thi???t";
  $kq['cung'][6]="B???nh l??m";
  $kq['cung'][7]="T??? tuy???t";
  $kq['cung'][8]="Tai ch??";
  $kq['cung'][9]="Thi??n ?????c";
  $kq['cung'][10]="H??? s???";
  $kq['cung'][11]="Ti???n b???o";
  $kq['cung'][12]="N???p ph??c";
  $kq['cung'][13]="Th???t tho??t";
  $kq['cung'][14]="Quan qu???";
  $kq['cung'][15]="Ki???p t??i";
  $kq['cung'][16]="V?? t???";
  $kq['cung'][17]="?????i c??t";
  $kq['cung'][18]="T??i v?????ng";
  $kq['cung'][19]="??ch l???i";
  $kq['cung'][20]="Thi??n kh???";
  $kq['cung'][21]="Ph?? qu??";
  $kq['cung'][22]="Ti???n b???o";
  $kq['cung'][23]="Ho???nh t??i";
  $kq['cung'][24]="Thu???n khoa";
  $kq['cung'][25]="Ly h????ng";
  $kq['cung'][26]="T??? bi???t";
  $kq['cung'][27]="Tho??i ??inh";
  $kq['cung'][28]="Th???t t??i";
  $kq['cung'][29]="????ng khoa";
  $kq['cung'][30]="Qu?? t???";
  $kq['cung'][31]="Thi??m ??inh";
  $kq['cung'][32]="H??ng v?????ng";
  $kq['cung'][33]="C?? qu???";
  $kq['cung'][34]="Lao ch???p";
  $kq['cung'][35]="C??ng s???";
  $kq['cung'][36]="Tho??i t??i";
  $kq['cung'][37]="Nghinh ph??c";
  $kq['cung'][38]="L???c h???p";
  $kq['cung'][39]="Ti???n b???o";
  $kq['cung'][40]="T??i ?????c";



}else{

  $kq['khoang'][1]="T??i";
  $kq['khoang'][2]="B???nh";
  $kq['khoang'][3]="Ly";
  $kq['khoang'][4]="Ngh??a";
  $kq['khoang'][5]="Quan";
  $kq['khoang'][6]="Ki???p";
  $kq['khoang'][7]="H???i";
  $kq['khoang'][8]="B???n";
  $kq['khoang'][9]="T??i";
  $kq['khoang'][0]="B???n";


  $kq['cung'][32]="H??ng v????ng";
  $kq['cung'][31]="Ti???n b???o";
  $kq['cung'][30]="????ng khoa";
  $kq['cung'][29]="T??i ch??";
  $kq['cung'][28]="Kh???u thi???t";
  $kq['cung'][27]="B???nh l??m";
  $kq['cung'][26]="T??? tuy???t";
  $kq['cung'][25]="Tai ch??";
  $kq['cung'][24]="T??i th???t";
  $kq['cung'][23]="Ly h????ng";
  $kq['cung'][22]="Tho??i kh???u";
  $kq['cung'][21]="T??? bi???t";
  $kq['cung'][20]="Ph?? qu??";
  $kq['cung'][19]="Ti???n ??ch";
  $kq['cung'][18]="Ho???nh t??i";
  $kq['cung'][17]="Thu???n khoa";
  $kq['cung'][16]="?????i c??t";
  $kq['cung'][15]="Qu?? t???";
  $kq['cung'][14]="??ch l???i";
  $kq['cung'][13]="Thi??m ??inh";
  $kq['cung'][12]="Th???t tho??t";
  $kq['cung'][11]="Quan qu???";
  $kq['cung'][10]="Ki???p T??i";
  $kq['cung'][9]="Tr?????ng kh???";
  $kq['cung'][8]="C?? qu???";
  $kq['cung'][7]="Lao ch???p";
  $kq['cung'][6]="C??ng s???";
  $kq['cung'][5]="Tho??i t??i";
  $kq['cung'][4]="Nghinh ph??c";
  $kq['cung'][3]="L???c h???p";
  $kq['cung'][2]="B???o kh???";
  $kq['cung'][1]="T??i ?????c";
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

$ten=JRequest::getVar('hoten','T?? Ho??i Thanh');
$namsinh=JRequest::getInt('namsinh','1986');
$gioitinh=JRequest::getInt('gioitinh',0);
$year_b=$namsinh;

$canchi_y=$this->doiCan($year_b)." ".$this->doichi($year_b);
$cungchon=$this->getCung($year_b,$gioitinh);
$quachon=$this->getQua($phuong);

if($cungchon->qua==$quachon)$loaihuongchon="t???t";
else $loaihuongchon="x???u";

$loai_huong=$this->getLoaiHuong($cungchon->cung);
$loaihuong=explode(",",$loai_huong[0]);
$huong_tot_xau=explode(",",$loai_huong[1]);
$huongxay=explode(",",$loai_huong[2]);
$nguhanh=$this->getNguHanh($canchi_y);


$menh=$cungchon->cung;
$degrees=JRequest::getInt('do',0);
$huongnha=$degrees;
$huong='B??nh';
$toa='Nh??m';
//$this->veTen($img,$ten,$ngaysinh,$menh,$huongnha,$huong,$toa);

$font = JPATH_SITE.DS.'components'.DS.'com_boi'.DS.'font'.DS.'arial.ttf';
$do  = imagecolorallocate($img, 255,60,0);
$den  = imagecolorallocate($img, 0, 0, 0);

$degrees=-JRequest::getInt('do',0);
$do1=$this->getDo(-$degrees);

imagettftext($img, 13, 0,170 ,30,  $do, $font,'XEM H?????NG NH?? C???A B???N');
imagettftext($img, 11, 0,10 ,50,  $den, $font,'H??? v?? t??n: '.$ten);
imagettftext($img, 11, 0,10 ,70,  $den, $font,'N??m sinh: '.$namsinh.' - '.$canchi_y);
imagettftext($img, 11, 0,10 ,90,  $den, $font,'M???nh: '.$menh.' - '.$cungchon->qua.' m???nh');
imagettftext($img, 11, 0,10 ,110,  $den, $font,'Ng?? h??nh: '.$nguhanh->nghiahan." ".$nguhanh->he);
imagettftext($img, 11, 0,360 ,50,  $den, $font,'????? quay: '.$huongnha.' ?????');
imagettftext($img, 11, 0,360 ,70,  $den, $font,'H?????ng: '.$do1->huong);
imagettftext($img, 11, 0,360 ,90,  $den, $font,'T???a: '.$do1->toa);

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
		if($a=="T??y"||$a=="T??y Nam"||$a=="T??y B???c"||$a=="????ng B???c")$m="T??y T???";
		else
		$m="????ng T???";
		return $m;
		}
	function getLoaiHuong($a){
		
     if($a=="Kh???m"){
		 $m[]="L???c s??t,Ph???c v???,Ng?? qui,Ho??? h???i,Thi??n y,Tuy???t m???nh,Di??n ni??n,Sinh kh??";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
	 else if($a=="Ly"){
		 $m[]="Tuy???t m???nh,Di??n ni??n,Ho??? h???i,Ng?? qui,Sinh kh??,L???c s??t,Ph???c v???,Thi??n y";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
	 else if($a=="C???n"){
		 $m[]="Thi??n y,Ng?? qui,Ph???c v???,Di??n ni??n,L???c s??t,Sinh kh??,Ho??? h???i,Tuy???t m???nh";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="??o??i"){
		 $m[]="Sinh kh??,Ho??? h???i,Di??n ni??n,Ph???c v???,Tuy???t m???nh,Thi??n y,Ng?? qui,L???c s??t";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="C??n"){
		 $m[]="Ph???c v???,L???c s??t,Thi??n y,Sinh kh??,Ng?? qui,Di??n ni??n,Tuy???t m???nh,Ho??? h???i";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="Kh??n"){
		 $m[]="Di??n ni??n,Tuy???t m???nh,Sinh kh??,Thi??n y,Ho??? h???i,Ph???c v???,L???c s??t,Ng?? qui";
		 $m[]="1,0,1,1,0,1,0,0";
		 }
	 else if($a=="T???n"){
		 $m[]="Ho??? h???i,Sinh kh??,Tuy???t m???nh,L???c s??t,Di??n ni??n,Ng?? qui,Thi??n y,Ph???c v???";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
	 else if($a=="Ch???n"){
		 $m[]="Ng?? qui,Thi??n y,L???c s??t,Tuy???t m???nh,Ph???c v???,Ho??? h???i,Sinh kh??,Di??n ni??n";
		 $m[]="0,1,0,0,1,0,1,1";
		 }
		 $m[]="T??y B???c,B???c,????ng B???c,T??y,????ng,T??y Nam,Nam,????ng Nam";
		return $m;
		}
	function getGiaiHuong($a){
		if($a=="Ng?? qui")$m="G???p tai ho???";
		else if($a=="Thi??n y")$m="G???p thi??n th???i ???????c che ch???";
		else if($a=="L???c s??t")$m="Nh?? c?? s??t kh??";
		else if($a=="Tuy???t m???nh")$m="Ch???t ch??c";
		else if($a=="Ph???c v???")$m="???????c s??? gi??p ?????";
		else if($a=="Ho??? h???i")$m="Nh?? c?? hung kh??";
		else if($a=="Sinh kh??")$m="Ph??c l???c v???n to??n";
		else if($a=="Di??n ni??n")$m="M???i s??? ???n ?????nh";
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
if($huong=='Ph???c v???'||$huong=='Thi??n y'||$huong=='Di??n ni??n'||$huong=='Sinh kh??'){
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
imagettftext($img, 13, 0,170 ,30,  $do, $font,'XEM H?????NG NH?? C???A B???N');
imagettftext($img, 11, 0,10 ,50,  $den, $font,'H??? v?? t??n: '.$ten);
imagettftext($img, 11, 0,10 ,70,  $den, $font,'N??m sinh: '.$ngaysinh);
imagettftext($img, 11, 0,10 ,90,  $den, $font,'M???nh: '.$menh);
imagettftext($img, 11, 0,400 ,50,  $den, $font,'????? quay: '.$huongnha);
imagettftext($img, 11, 0,400 ,70,  $den, $font,'H?????ng: '.$huong);
imagettftext($img, 11, 0,400 ,90,  $den, $font,'T???a: '.$toa);

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