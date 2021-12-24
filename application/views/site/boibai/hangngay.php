<?php 
    $html_xemboiSDT      = $this->load->view('site/import/rep_xemboiSDT', '', true);
    $html_ynghiaso       = $this->load->view('site/import/rep_ynghiaso', '', true);
    $html_sohoptuoi      = $this->load->view('site/import/rep_sohoptuoi', '', true);
    $html_sohopmenh      = $this->load->view('site/import/rep_sohopmenh', '', true);
    $arr_search          = array('$rep_xemboiSDT', '$rep_ynghiaso', '$rep_sohoptuoi', '$rep_sohopmenh');
    $arr_replace         = array($html_xemboiSDT, $html_ynghiaso, $html_sohoptuoi, $html_sohopmenh);
 ?>
<?php
$labai = array(
                    array('0','0','0',' ', 'background-position:0px -0px;'),
                    array('1','0','1',' ', 'background-position:71px -0px;'),
                    array('2','0','2',' ', 'background-position:142px -0px;'),
                    array('3','0','3',' ', 'background-position:213px -0px;'),
                    array('4','1','0',' ', 'background-position:0px -96px;'),
                    array('5','1','1',' ', 'background-position:71px -96px;'),
                    array('6','1','2',' ', 'background-position:142px -96px;'),
                    array('7','1','3',' ', 'background-position:213px -96px;'),
                    array('8','2','0',' ', 'background-position:0px -192px;'),
                    array('9','2','1',' ', 'background-position:71px -192px;'),
                    array('10','2','2',' ', 'background-position:142px -192px;'),
                    array('11','2','3',' ', 'background-position:213px -192px;'),
                    array('12','3','0',' ','background-position:0px -288px;'),
                    array('13','3','1',' ', 'background-position:71px -288px;'),
                    array('14','3','2',' ', 'background-position:142px -288px;'),
                    array('15','3','3',' ','background-position:213px -288px;'),
                    array('16','4','0',' ','background-position:0px -384px;'),
                    array('17','4','1',' ','background-position:71px -384px;'),
                    array('18','4','2',' ','background-position:142px -384px;'),
                    array('19','4','3',' ','background-position:213px -384px;'),
                    array('20','5','0',' ','background-position:0px -480px;'),
                    array('21','5','1',' ','background-position:71px -480px;'),
                    array('22','5','2',' ','background-position:142px -480px;'),
                    array('23','5','3',' ','background-position:213px -480px;'),
                    array('24','6','0',' ','background-position:0px -576px;'),
                    array('25','6','1',' ','background-position:71px -576px;'),
                    array('26','6','2',' ','background-position:142px -576px;'),
                    array('27','6','3',' ','background-position:213px -576px;'),
                    array('28','7','0',' ','background-position:0px -672px;'),
                    array('29','7','1',' ','background-position:71px -672px;'),
                    array('30','7','2',' ','background-position:142px -672px;'),
                    array('31','7','3',' ','background-position:213px -672px;'),
                    array('32','8','0',' ','background-position:0px -768px;'),
                    array('33','8','1',' ','background-position:71px -768px;'),
                    array('34','8','2',' ','background-position:142px -768px;'),
                    array('35','8','3',' ','background-position:213px -768px;'),
                    array('36','9','0',' ','background-position:0px -864px;'),
                    array('37','9','1',' ','background-position:71px -864px;'),
                    array('38','9','2',' ','background-position:142px -864px;'),
                    array('39','9','3',' ','background-position:213px -864px;'),
                    array('40','10','0',' ','background-position:0px -960px;'),
                    array('41','10','1',' ','background-position:71px -960px;'),
                    array('42','10','2',' ','background-position:142px -960px;'),
                    array('43','10','3',' ','background-position:213px -960px;'),
                    array('44','11','0',' ','background-position:0px -1056px;'),
                    array('45','11','1',' ','background-position:71px -1056px;'),
                    array('46','11','2',' ','background-position:142px -1056px;'),
                    array('47','11','3',' ','background-position:213px -1056px;'),
                    array('48','12','0',' ','background-position:0px -1152px;'),
                    array('49','12','1',' ','background-position:71px -1152px;'),
                    array('50','12','2',' ','background-position:142px -1152px;'),
                    array('51','12','3',' ','background-position:213px -1152px;'),
                 
              );
$xaobai = $labai;
$arr_ok = array();
$key_arr = array();
for($i= 1; $i<=7; $i++){ shuffle($xaobai); }
for( $i =0; $i<51; $i++ )
{
   $j = $i+1;
   if( $xaobai[$i][1] == $xaobai[$j][1] )
   {
     if( $xaobai[$i][0] > $xaobai[$j][0] )
     {
        $arr_ok[] = $xaobai[$j][0];
        $arr_ok[] = $xaobai[$i][0];
        $key_arr[] = $xaobai[$j][0].','.$xaobai[$i][0];
     }
     else
     {
        $arr_ok[]  = $xaobai[$i][0];
        $arr_ok[]  = $xaobai[$j][0];
        $key_arr[] = $xaobai[$i][0].','.$xaobai[$j][0];
     }
     $i = $i+2;
   }   
}

?>
<link rel="stylesheet" href="<?php echo base_url('templates/site/css/boibai.css');?>" />
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm block_boibai hangngay">
    <h1 class="box_content_tt"> <?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="field">
      <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?></div>
    </div> 
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <div class="field hangngaybutton bbnh_ok">
      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12">
         <a href="<?php echo current_url(); ?>?gioitinh=nam&sl=14" class="button btn_xao_bai" style="padding: 5px 7px;width: 179px;height: 41px;text-decoration: none;color: #fff48e;text-transform: uppercase;font-weight: bold;line-height: 32px;font-size: 16px;">Nam xáo 7 lần</a>
       </div>
       <div class="col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12">
         <a href="<?php echo current_url(); ?>?gioitinh=nu&sl=18" class="button btn_xao_bai" style="padding: 5px 7px;width: 179px;height: 41px;text-decoration: none;color: #fff48e;text-transform: uppercase;font-weight: bold;line-height: 32px;font-size: 16px;">Nữ xáo 9 lần</a>
       </div>
    </div>

    <div class="col-md-12 field text-center">
       <div class="" id="bbhn_thong_bao"></div>
        <?php if (isset($_GET['gioitinh']) and isset($_GET['sl'])): ?>
          <script type="text/javascript">
            function luanSimScroll(box){var x=$(box).offset();var height_x=x.top;$("html, body").animate({scrollTop:height_x},800);}
            luanSimScroll('#bbhn_thong_bao');
          </script>
        <?php endif ?>
        
       <?php foreach($labai as $key => $val): 
                        $class = in_array( $key, $arr_ok ) ? 'la_bai_ok' : '';
                ?>
                  <div class="la_bai <?php echo $class;?>" id="#la_bai<?php echo $val[0].'_'.$val[1];?>" style="<?php echo $val[4];?>"> </div>
       <?php endforeach; ?>
       <div id="ok_bbhn_okok" data-ok="da_co_cap_chon2"></div>
       <div id="bbhn_ket_qua_cuoi_cung">
          <div>
            <div class="notification_tuvi_2020" style="margin-bottom: 10px;">
              <a href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>" class="nut_bam">Bói vận hạn năm 2021</a>
              <a href="<?php echo base_url('/xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>" class="nut_bam">Xem bói vận mệnh của 12 con giáp năm 2022 Nhâm Dần</a>
            </div>
          </div>
          <div class="" style="margin-top: 8px;text-align: center;">
            <a class="md_nut_bam btn_delete_first" href="<?php echo base_url('boi-bai-hang-ngay.html');?>">Xóa và xem lại từ đầu</a>
            <a class="md_nut_bam btn_load_againt" href="<?php echo base_url('boi-bai-hang-ngay.html');?>">Xem cho người khác</a>
          </div>
       </div>
       
    </div>  
    <div class="field">
      <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text_foot()); ?></div>
    </div>
</div>
<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
<div class="box_content">
  <?php if (isset($getComment) and $getComment): ?>
  <div class="row">
      <div class="col-md-12">
        <?php echo $getComment; ?>
      </div>
  </div>
  <?php endif ?>
</div>



<div class="box_content">
        <div class="box_content_tt1">
          Các công cụ Xem bói - Tử vi liên quan
        </div>
        <div class="col-md-4 col-xs-6">
            <a href="<?php echo base_url('xem-boi-bai-thoi-van.html'); ?>">
                <div class="text-center">
                      <div class="thumbnail">
                        <img src="<?php echo base_url('templates/site/images/anhdaidien/thoi-van.jpg'); ?>" alt="">
                      </div>
                      <div>Bói bài thời vận</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xs-6">
            <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
                <div class="text-center">
                        <div class="thumbnail">
                            <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                        </div>
                        <div>Xem bói ngày sinh</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-tinh-yeu.jpg'); ?>" alt="">
                </div>
                <div>Xem bói tình yêu</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                </div>
                <div>Tử vi hàng ngày</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                </div>
                <div>Tử vi trọn đời</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/not-ruoi-chuan.jpg'); ?>" alt="">
                </div>
                <div>Xem bói nốt ruồi</div>
            </div>
          </a>
        </div>
    </div>

<script type="text/javascript" language="javascript">
jQuery.fn.shuffle_labai = function () {
        var j;
        for (var i = 0; i < this.length; i++) {
            j = Math.floor(Math.random() * this.length);
			$(this[i]).fadeTo("slow",Math.random()+0.2);
			if(j!=i)
			{
				if($(this[i]).hasClass("la_bai_ok")==false && $(this[j]).hasClass("la_bai_ok")==false)
				{
					$(this[i]).before($(this[j]));
				}
				else
				{
					var bbhn_c = Math.floor(Math.random() * this.length);
					if($(this[bbhn_c]).hasClass("la_bai_ok")==false)
					{
						$(this[i]).before($(this[bbhn_c]));
					}
				}
			}
        }
    };
var xao_bai_time_down = 3;
var xao_bai_size = 5;
var run_xao_bai;
var run_loai_bo_bai;
$(function(){
	if($("#ok_bbhn_okok").attr("data-ok") == "da_co_cap_chon0")
	{
		$(".bbnh_ok").remove();
	}
	else
	{
		$(".bbnh_chua_ok").remove();
	}
});

<?php if (isset($_GET['gioitinh']) and isset($_GET['sl'])): ?>
  xao_bai_time_down = <?php echo $_GET['sl']; ?>;
  //$(".btn_xao_bai").fadeOut(10);
  run_xao_bai=setInterval(xao_bai,510);
  $("#bbhn_thong_bao").text("Đang xáo bài: "+(xao_bai_time_down/2)+" lần");

<?php endif ?>


function xao_bai()
{
		xao_bai_time_down=xao_bai_time_down-1;
		if(xao_bai_size==3)
		{
			xao_bai_size=0;
		}
		else{
			xao_bai_size=3;
		}
		if(xao_bai_time_down<0)
		{
			xao_bai_size =3;
			$(".btn_xao_bai").remove();
			clearInterval(run_xao_bai);
			loai_bo_bai();
			$("#bbhn_thong_bao").text("Bài hôm nay của bạn :");
		}
		$(".la_bai").shuffle_labai();		
}
function loai_bo_bai()
{
	var time_loa_bobbhn = 100 ;
	$(".la_bai").each(function(){
		if($(this).hasClass("la_bai_ok")==false)
		{
			time_loa_bobbhn += 100;
			$(this).fadeOut(time_loa_bobbhn);
		}
	});
	setTimeout(function(){
		
        $.ajax({
    			type: "POST",
    			dataType: 'json',
                url: "<?php echo base_url('boi-bai-hang-ngay.html');?>",
    			data: {key:'<?php echo implode('_',$key_arr);?>'},
    			success: function(result)
                {
                  var contentSub = result.luan;
                  if (contentSub == '') {
                    contentSub = '<span>Rất tiếc có lỗi khi XÁO bài. Vui lòng XÁO lại bài của bạn để nhận kết quả chính xác nhất nhé!</span>';
                  }
                  $('#bbhn_ket_qua_cuoi_cung').prepend(contentSub);
    			},
          error: function(xhr){
            contentSub = '<span>Rất tiếc có lỗi khi XÁO bài. Vui lòng XÁO lại bài của bạn để nhận kết quả chính xác nhất nhé!</span>';
            $('#bbhn_ket_qua_cuoi_cung').prepend(contentSub);
          }
		}); 
        $("#bbhn_ket_qua_cuoi_cung").fadeIn(1000);
		$(".la_bai_ok").fadeTo("fast",1);
	},time_loa_bobbhn);
	
}
</script>