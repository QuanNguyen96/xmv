<?php 
    $html_xemboiSDT      = $this->load->view('site/import/rep_xemboiSDT', '', true);
    $html_ynghiaso       = $this->load->view('site/import/rep_ynghiaso', '', true);
    $html_sohoptuoi      = $this->load->view('site/import/rep_sohoptuoi', '', true);
    $html_sohopmenh      = $this->load->view('site/import/rep_sohopmenh', '', true);
    $arr_search  = array('$rep_xemboiSDT', '$rep_ynghiaso', '$rep_sohoptuoi', '$rep_sohopmenh');
    $arr_replace = array($html_xemboiSDT, $html_ynghiaso, $html_sohoptuoi, $html_sohopmenh);
 ?>
<?php
	$labai   = array(
	    array(
	        '0',
	        '0',
	        '0',
	        ' ',
	        'background-position:0px -0px;'
	    ),
	    array(
	        '1',
	        '0',
	        '1',
	        ' ',
	        'background-position:71px -0px;'
	    ),
	    array(
	        '2',
	        '0',
	        '2',
	        ' ',
	        'background-position:142px -0px;'
	    ),
	    array(
	        '3',
	        '0',
	        '3',
	        ' ',
	        'background-position:213px -0px;'
	    ),
	    array(
	        '4',
	        '1',
	        '0',
	        ' ',
	        'background-position:0px -96px;'
	    ),
	    array(
	        '5',
	        '1',
	        '1',
	        ' ',
	        'background-position:71px -96px;'
	    ),
	    array(
	        '6',
	        '1',
	        '2',
	        ' ',
	        'background-position:142px -96px;'
	    ),
	    array(
	        '7',
	        '1',
	        '3',
	        ' ',
	        'background-position:213px -96px;'
	    ),
	    array(
	        '8',
	        '2',
	        '0',
	        ' ',
	        'background-position:0px -192px;'
	    ),
	    array(
	        '9',
	        '2',
	        '1',
	        ' ',
	        'background-position:71px -192px;'
	    ),
	    array(
	        '10',
	        '2',
	        '2',
	        ' ',
	        'background-position:142px -192px;'
	    ),
	    array(
	        '11',
	        '2',
	        '3',
	        ' ',
	        'background-position:213px -192px;'
	    ),
	    array(
	        '12',
	        '3',
	        '0',
	        ' ',
	        'background-position:0px -288px;'
	    ),
	    array(
	        '13',
	        '3',
	        '1',
	        ' ',
	        'background-position:71px -288px;'
	    ),
	    array(
	        '14',
	        '3',
	        '2',
	        ' ',
	        'background-position:142px -288px;'
	    ),
	    array(
	        '15',
	        '3',
	        '3',
	        ' ',
	        'background-position:213px -288px;'
	    ),
	    array(
	        '16',
	        '4',
	        '0',
	        ' ',
	        'background-position:0px -384px;'
	    ),
	    array(
	        '17',
	        '4',
	        '1',
	        ' ',
	        'background-position:71px -384px;'
	    ),
	    array(
	        '18',
	        '4',
	        '2',
	        ' ',
	        'background-position:142px -384px;'
	    ),
	    array(
	        '19',
	        '4',
	        '3',
	        ' ',
	        'background-position:213px -384px;'
	    ),
	    array(
	        '20',
	        '5',
	        '0',
	        ' ',
	        'background-position:0px -480px;'
	    ),
	    array(
	        '21',
	        '5',
	        '1',
	        ' ',
	        'background-position:71px -480px;'
	    ),
	    array(
	        '22',
	        '5',
	        '2',
	        ' ',
	        'background-position:142px -480px;'
	    ),
	    array(
	        '23',
	        '5',
	        '3',
	        ' ',
	        'background-position:213px -480px;'
	    ),
	    array(
	        '24',
	        '6',
	        '0',
	        ' ',
	        'background-position:0px -576px;'
	    ),
	    array(
	        '25',
	        '6',
	        '1',
	        ' ',
	        'background-position:71px -576px;'
	    ),
	    array(
	        '26',
	        '6',
	        '2',
	        ' ',
	        'background-position:142px -576px;'
	    ),
	    array(
	        '27',
	        '6',
	        '3',
	        ' ',
	        'background-position:213px -576px;'
	    ),
	    array(
	        '28',
	        '7',
	        '0',
	        ' ',
	        'background-position:0px -672px;'
	    ),
	    array(
	        '29',
	        '7',
	        '1',
	        ' ',
	        'background-position:71px -672px;'
	    ),
	    array(
	        '30',
	        '7',
	        '2',
	        ' ',
	        'background-position:142px -672px;'
	    ),
	    array(
	        '31',
	        '7',
	        '3',
	        ' ',
	        'background-position:213px -672px;'
	    ),
	    array(
	        '32',
	        '8',
	        '0',
	        ' ',
	        'background-position:0px -768px;'
	    ),
	    array(
	        '33',
	        '8',
	        '1',
	        ' ',
	        'background-position:71px -768px;'
	    ),
	    array(
	        '34',
	        '8',
	        '2',
	        ' ',
	        'background-position:142px -768px;'
	    ),
	    array(
	        '35',
	        '8',
	        '3',
	        ' ',
	        'background-position:213px -768px;'
	    ),
	    array(
	        '36',
	        '9',
	        '0',
	        ' ',
	        'background-position:0px -864px;'
	    ),
	    array(
	        '37',
	        '9',
	        '1',
	        ' ',
	        'background-position:71px -864px;'
	    ),
	    array(
	        '38',
	        '9',
	        '2',
	        ' ',
	        'background-position:142px -864px;'
	    ),
	    array(
	        '39',
	        '9',
	        '3',
	        ' ',
	        'background-position:213px -864px;'
	    ),
	    array(
	        '40',
	        '10',
	        '0',
	        ' ',
	        'background-position:0px -960px;'
	    ),
	    array(
	        '41',
	        '10',
	        '1',
	        ' ',
	        'background-position:71px -960px;'
	    ),
	    array(
	        '42',
	        '10',
	        '2',
	        ' ',
	        'background-position:142px -960px;'
	    ),
	    array(
	        '43',
	        '10',
	        '3',
	        ' ',
	        'background-position:213px -960px;'
	    ),
	    array(
	        '44',
	        '11',
	        '0',
	        ' ',
	        'background-position:0px -1056px;'
	    ),
	    array(
	        '45',
	        '11',
	        '1',
	        ' ',
	        'background-position:71px -1056px;'
	    ),
	    array(
	        '46',
	        '11',
	        '2',
	        ' ',
	        'background-position:142px -1056px;'
	    ),
	    array(
	        '47',
	        '11',
	        '3',
	        ' ',
	        'background-position:213px -1056px;'
	    ),
	    array(
	        '48',
	        '12',
	        '0',
	        ' ',
	        'background-position:0px -1152px;'
	    ),
	    array(
	        '49',
	        '12',
	        '1',
	        ' ',
	        'background-position:71px -1152px;'
	    ),
	    array(
	        '50',
	        '12',
	        '2',
	        ' ',
	        'background-position:142px -1152px;'
	    ),
	    array(
	        '51',
	        '12',
	        '3',
	        ' ',
	        'background-position:213px -1152px;'
	    )
	);
	$xaobai  = $labai;
	$arr_ok  = array();
	$key_arr = array();
	for ($i = 1; $i <= 7; $i++) {
	    shuffle($xaobai);
	}
	for ($i = 0; $i < 51; $i++) {
	    $j = $i + 1;
	    if ($xaobai[$i][1] == $xaobai[$j][1]) {
	        if ($xaobai[$i][0] > $xaobai[$j][0]) {
	            $arr_ok[]  = $xaobai[$j][0];
	            $arr_ok[]  = $xaobai[$i][0];
	            $key_arr[] = $xaobai[$j][0] . ',' . $xaobai[$i][0];
	        } else {
	            $arr_ok[]  = $xaobai[$i][0];
	            $arr_ok[]  = $xaobai[$j][0];
	            $key_arr[] = $xaobai[$i][0] . ',' . $xaobai[$j][0];
	        }
	        $i = $i + 2;
	    }
	}
?>
<link rel="stylesheet" href="<?php echo base_url('templates/site/css/boibai.css');?>" />
<section>
	<div class="col-md-12">
	    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	        <?php echo $breadcrumb; ?>
	    <?php endif ?>
	</div>
	<div class="box-mobile clearfix">
		<h1 class="title-new-mobile"><?php echo $this->my_seolink->get_name(); ?></h1>
		<div class="box-mobile">
			<?php $this->load->view('site/adsen/code1'); ?>
		</div>
		<div class="text-justify">
			<section id="pageTextAuto">
				<?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?>
			</section>
		</div>
		<section class="">
			<div class="box-info-mobile">
				<div class="row">
					<div class="col-xs-12">
						<div class="boxNamNuXao clearfix">
							<div class="miniBox boxLeft">
								<a href="<?php echo current_url(); ?>?gioitinh=nam&sl=14" class="button btn_xao_bai">NAM XÁO 7</a>
							</div>
							<div class="miniBox boxRight">
								<a href="<?php echo current_url(); ?>?gioitinh=nu&sl=18" class="button btn_xao_bai">NỮ XÁO 9</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 text-center">
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
						<div id="bbhn_ket_qua_cuoi_cung" class="text-justify">
							<div class="showInternalLink" style="margin-bottom: 10px;">
				              	<a href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">Bói tử vi năm 2021</a>
				              	<a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html'); ?>">Xem bói vận hạn hung cát năm 2020 Canh Tý</a>
				            </div>
						    <div class="" style="margin-top: 8px;text-align: center;">
						        <p><a style="background: #000;padding: 5px 20px;border: 1px solid #fe0000;color: #fff;cursor: pointer;font-weight: bold;" class="md_nut_bam btn_delete_first" href="<?php echo base_url('boi-bai-hang-ngay.html');?>">Xóa và xem lại từ đầu</a></p>
						        <p><a style="background: #000;padding: 5px 20px;border: 1px solid #fe0000;color: #fff;cursor: pointer;font-weight: bold;" class="md_nut_bam btn_load_againt" href="<?php echo base_url('boi-bai-hang-ngay.html');?>">Xem cho người khác</a></p>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<div class="text-justify">
			<section id="pageTextAuto">
				<?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text_foot()); ?>
			</section>
		</div>
		<div class="box-mobile">
			<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
		</div>
		<div class="box-mobile">
			<div class="row">
                <div class="col-md-12">
                    
                    <?php if (isset($getComment) and $getComment): ?>
                        <?php echo $getComment; ?>
                    <?php endif ?>

                </div>
            </div>
		</div>

		

		<div class="box-mobile">
			<h3 class="title-new-mobile">công cụ Xem bói - Tử vi liên quan</h3>
			<div class="row">
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-bai-thoi-van.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/thoi-van.jpg'); ?>" alt="">
							<p>Bói bài thời vận</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
							<p>Xem bói ngày sinh</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-tinh-yeu.jpg'); ?>" alt="">
							<p>Xem bói tình yêu</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
							<p>Tử vi hàng ngày</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
							<p>Tử vi trọn đời</p>
						</a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/not-ruoi-chuan.jpg'); ?>" alt="">
							<p>Xem bói nốt ruồi</p>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<script type = "text/javascript"
language = "javascript" >
	jQuery.fn.shuffle_labai = function () {
		var j;
		for (var i = 0; i < this.length; i++) {
			j = Math.floor(Math.random() * this.length);
			$(this[i]).fadeTo("slow", Math.random() + 0.2);
			if (j != i) {
				if ($(this[i]).hasClass("la_bai_ok") == false && $(this[j]).hasClass("la_bai_ok") == false) {
					$(this[i]).before($(this[j]));
				} else {
					var bbhn_c = Math.floor(Math.random() * this.length);
					if ($(this[bbhn_c]).hasClass("la_bai_ok") == false) {
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
$(function () {
	if ($("#ok_bbhn_okok").attr("data-ok") == "da_co_cap_chon0") {
		$(".bbnh_ok").remove();
	} else {
		$(".bbnh_chua_ok").remove();
	}
});

<?php if (isset($_GET['gioitinh']) and isset($_GET['sl'])): ?>
	xao_bai_time_down = <?php echo $_GET['sl']; ?>;
	//$(".btn_xao_bai").fadeOut(10);
	run_xao_bai = setInterval(xao_bai, 510);
	$("#bbhn_thong_bao").text("Đang xáo bài: " + (xao_bai_time_down / 2) + " lần");

<?php endif ?>


function xao_bai() {
	xao_bai_time_down = xao_bai_time_down - 1;
	if (xao_bai_size == 3) {
		xao_bai_size = 0;
	} else {
		xao_bai_size = 3;
	}
	if (xao_bai_time_down < 0) {
		xao_bai_size = 3;
		$(".btn_xao_bai").remove();
		clearInterval(run_xao_bai);
		loai_bo_bai();
		$("#bbhn_thong_bao").text("Bài hôm nay của bạn :");
	}
	$(".la_bai").shuffle_labai();
}

function loai_bo_bai() {
	var time_loa_bobbhn = 100;
	$(".la_bai").each(function () {
		if ($(this).hasClass("la_bai_ok") == false) {
			time_loa_bobbhn += 100;
			$(this).fadeOut(time_loa_bobbhn);
		}
	});
	setTimeout(function () {

		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?php echo base_url('boi-bai-hang-ngay.html');?>",
			data: {
				key: '<?php echo implode('_',$key_arr);?>'
			},
			success: function (result) {
				show = '<div class="box-alarm"><div class="text-center"><img src="<?php echo base_url(); ?>templates/site/images/newmobile/alarm.png" alt=""><p class="title-alarm">NHẬN XÉT</p></div></div>'+result.luan;
				$('#bbhn_ket_qua_cuoi_cung').prepend(show);
			},
			error: function(xhr){
	            contentSub = '<div class="box-alarm"><div class="text-center"><img src="<?php echo base_url(); ?>templates/site/images/newmobile/alarm.png" alt=""><p class="title-alarm">NHẬN XÉT</p></div></div>'+'<span>Rất tiếc có lỗi khi XÁO bài. Vui lòng XÁO lại bài của bạn để nhận kết quả chính xác nhất nhé!</span>';
	            $('#bbhn_ket_qua_cuoi_cung').prepend(contentSub);
          	}
		});
		$("#bbhn_ket_qua_cuoi_cung").fadeIn(1000);
		$(".la_bai_ok").fadeTo("fast", 1);
	}, time_loa_bobbhn);

} </script>
<style type="text/css">
	
</style>