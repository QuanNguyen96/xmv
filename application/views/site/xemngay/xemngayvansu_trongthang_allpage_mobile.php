<?php
$ngay_hien_tai  = date('j');
$thang_hien_tai = date('n');
$thang_dang_xem = $input['thang'];
if($thang_hien_tai != $thang_dang_xem)
$ngay_hien_tai = 5;
?>
<link rel="stylesheet" href="<?php echo base_url('templates/site/jquery_ui/jquery_ui.css');?>" />
<script src="<?php echo base_url('templates/site/jquery_ui/jquery_ui.min.js'); ?>"></script>
<script>
  	$(function() {
    	$( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
    	$( "#datepicker1" ).datepicker({ dateFormat: 'd/m/yy' });
  	});
</script>
<section>
	<div class="col-md-12">
	    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	        <?php echo $breadcrumb; ?>
	    <?php endif ?>
	</div>
	<div class="box-mobile">
		<h3 class="title-new-mobile"><?php echo $name; ?></h3>
		<div class="box-mobile">
        	<?php $this->load->view('site/adsen/code1'); ?>
        </div>
		<div class="box-form">
			<p class="title-mobile-form">Nhập đầy đủ thông tin để có kết quả tốt nhất</p>
			
			<div class="form-group clearfix">
				<form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
					<div class="row">
						<div class="col-xs-5">
							<label for="">Xem theo tháng</label>
						</div>
						<div class="col-xs-2">
							<select name="thang" id="">
								<?php
								    $cr_thang = isset($input['thang']) ? $input['thang'] : date('n'); 
			                        for ($i=1; $i<=12 ; $i++) { 
			                          $selected = $cr_thang == $i ? 'selected="" ':'';
			                          ?>
			                          <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
			                          <?php
			                        } 
			                  	?>
							</select>
						</div>
						<div class="col-xs-3">
							<select name="nam" id="">
								<?php
								    $cr_nam = isset($input['nam']) ? $input['nam'] : date('Y'); 
			                      	for ($i=1947; $i<=2027 ; $i++) {
			                        $selected = $cr_nam == $i ? 'selected="" ':'';
			                        ?>
			                        <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
			                        <?php
			                      	} 
			                  	?>
							</select>
						</div>
						<div class="col-xs-2"><button type="submit" name="submit" value="submit" class="">Xem</button></div>
					</div>
				</form>
			</div>
			
		</div>
		<div class="text-justify">
			<div class="">
				<?php echo $this->my_seolink->get_text(); ?>
			</div>
			
		</div>
      	<?php
      		$arr_seo_link_thang = 'xem-ngay-tot-trong-thang-$thang-nam-$nam'; 
      		$arr_seolink = str_replace('$thang', '"+thang+"', $arr_seo_link_thang);
      		$arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
    	?>
      	<script type="text/javascript">
          	function send_form_dong_tho() {
          		var frm   = document.formSearch;
          		var thang = frm.thang.value;
          		var nam   = frm.nam.value;
          		window.location.href = "<?php echo base_url().$arr_seolink; ?>.html";
          	}
          	function send_form_between() {
	            var frm   = document.formSearchbetween;
	            var input_time   = frm.input_time.value;
	            var arr = input_time.split('/');
	            window.location.href = "<?php echo base_url(); ?>xem-ngay-tot-xau/ngay-"+arr[0]+"-thang-"+arr[1]+"-nam-"+arr[2]+".html";
	        }
        </script>
        
        <div class="box-mobile">
        	<div class="dieuhuong2019 clearfix mgt0">
                <?php $this->load->view('site/import/form_tv_2021'); ?>
            </div>
        </div>

        
        <div class="box-mobile">
        	<section class="headingTopUpdate">
	            <div class="row">
	                <div class="col-md-12">
	                    <h2 class="titleUpd">TỔNG HỢP NGÀY TỐT XẤU TRONG THÁNG <?php echo $duonglich[1] ?> NĂM <?php echo $duonglich[2] ?></h2>
	                </div>
	            </div>
	        </section>
        </div>
        <div class="box-mobile">
        	<section class="list_thang_tot_mb">
        		<?php if (!empty($info_listdatenext)): 
        				$count_an = 0; 
                        $count_an_start = 1;
                        $hide_group = 1;
        		?>
        			<?php foreach ($info_listdatenext as $key => $value): 
        					$ads = '';
                            $frmxn = '';
                            $div_more = '';
                            $hide_class = '';
                            if($value['duonglich'][0]+1 < $ngay_hien_tai && $value['duonglich'][1] == $thang_hien_tai )
                            {
                                $count_an++;
                                $hide_class = 'div_hide';
                            }
                            if($count_an > 7 || $value['duonglich'][0]+1 == $ngay_hien_tai)
                            {
                                
                                $count_an_end   = $value['duonglich'][0] -1;
                                if($count_an == 0)
                                   $div_more = '<div class="lich_show_more" onclick="lich_thang_an_bot('.$hide_group.')"> Xem ngày '.$count_an_end.'</div>';
                                else    
                                   $div_more = '<div class="lich_show_more" onclick="lich_thang_an_bot('.$hide_group.')"> Xem từ ngày '.$count_an_start.' đến ngày '.$count_an_end.'</div>';
                                $count_an_start = $count_an_end + 1;
                                $count_an = 0;
                                $hide_group ++;
                            }
                            if($value['duonglich'][0]+1 < $ngay_hien_tai && $value['duonglich'][1] == $thang_hien_tai )
                            {
                                $hide_group_class = 'div_hide_group_'.$hide_group;
                            }
                            else
                            {
                                $hide_group_class = '';
                            }
                            if($value['duonglich'][0] == $ngay_hien_tai)
                                {
                                    $ads   = $this->load->view('site/adsen/mobile_code_ads_lich_thang','',true);
                                    $frmxn = $this->load->view('site/import/form_xem_ngay','',true);
                                }
                            if($value['duonglich'][0] == $ngay_hien_tai + 3)
                                $ads = $this->load->view('site/adsen/mobile_code_ads_lich_thang','',true);
                            if($value['duonglich'][0] == $ngay_hien_tai + 10)
                                $ads = $this->load->view('site/adsen/mobile_code_ads_lich_thang','',true);
                            if($value['duonglich'][0] == $ngay_hien_tai + 20)
                                $ads = $this->load->view('site/adsen/mobile_code_ads_lich_thang','',true);
        			?>
        				<?php echo $div_more;?> 
        				<div class="box_item_thang_mb <?php echo $hide_class.' '.$hide_group_class;?>">
		        			<div class="box_thang_duong_am_mb clearfix">
		        				<div class="box_duong_am box_duong">
		        					<p class="textTop">LỊCH DƯƠNG</p>
		        					<p class="textNumber"><?php echo $value['duonglich'][0] ?></p>
		        					<p class="textMonth">Tháng <?php echo $value['duonglich'][1] ?></p>
		        				</div>
		        				<div class="box_duong_am box_am">
		        					<p class="textTop">LỊCH ÂM</p>
		        					<p class="textNumber"><?php echo $value['amlich'][0] ?></p>
		        					<p class="textMonth">Tháng <?php echo $value['amlich'][1] ?></p>
		        				</div>
		        			</div>
		        			<div class="box_ngay_detail">
		        				<p class="type_ngay" style="text-align: center;">

		        					<?php if (preg_match('/color_black/', $value['ngayhientai'])): ?>
                                        <label class="color_black" >Ngày <?php echo $value['ngayhientai']; ?></label>
                                    <?php else: ?>    
                                        <label>Ngày <?php echo $value['ngayhientai']; ?></label>
                                    <?php endif ?>
		        					

		        				</p>
		        				<section>
									<p><?php echo $value['ngaythu'] ?>, <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>">ngày <?php echo join('/',$value['duonglich']) ?></a> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
									<p>Ngày <label class="canchi"><?php echo $value['ngaycanchi'] ?></label>, tháng <label class="canchi"><?php echo $value['thangcanchi'] ?></label>, năm <label class="canchi"><?php echo $value['namcanchi'] ?></label></p>
									<p><span class="text_black"><?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?></span></p>
									<p class="hourok"><i class="glyphicon glyphicon-time"></i>&nbspGIỜ TỐT TRONG NGÀY :</p>
									<p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
		        				</section>
		        				<p class="boxBtnxem"><a href="<?php echo base_url($input['link_parent'].'/'.'ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>" class="btnXemchitietMb">Xem chi tiết</a></p>
		        			</div>
		        		</div>
		        		<?php 
	                        echo $frmxn;
	                        echo $ads;
	                    ?>
        			<?php endforeach; ?>
        		<?php endif; ?>
        		<!-- <p>Hiển thị các ngày tiếp theo</p> -->
        	</section>
        	<section class="list_box_gioithieu_thang">
        		<?php
					$month_show_next_1 = ($duonglich[1]+1>12)?($duonglich[1]+1-12):($duonglich[1]+1); 
					$year_show_next_1  = ($duonglich[1]+1>12)?($duonglich[2]+1):($duonglich[2]);
					$month_show_next_2 = ($duonglich[1]+2>12)?($duonglich[1]+2-12):($duonglich[1]+2); 
					$year_show_next_2  = ($duonglich[1]+2>12)?($duonglich[2]+1):($duonglich[2]);

					$arr_seo_link_replace_trangxinh1 = str_replace('$thang', $month_show_next_1, $arr_seo_link);
					$arr_seo_link_replace_trangxinh1 = str_replace('$nam', $year_show_next_1, $arr_seo_link_replace_trangxinh1);

					$arr_seo_link_replace_trangxinh2 = str_replace('$thang', $month_show_next_2, $arr_seo_link);
					$arr_seo_link_replace_trangxinh2 = str_replace('$nam', $year_show_next_2, $arr_seo_link_replace_trangxinh2);
    			?>
        		<p class=""><a href="<?php echo base_url($arr_seo_link_replace_trangxinh1.'.html') ?>">Xem ngày tốt <?php echo $list_anchortext; ?> tháng <?php echo $month_show_next_1; ?>/<?php echo $year_show_next_1; ?></a></p>
        		<p class=""><a href="<?php echo base_url($arr_seo_link_replace_trangxinh2.'.html') ?>">Xem ngày tốt <?php echo $list_anchortext; ?> tháng <?php echo $month_show_next_2; ?>/<?php echo $year_show_next_2; ?></a></p>
        	</section>
        	<div class="box-next-day">
				<div class="text-danger title-next-day">Xem các ngày tiếp theo</div>
				<ul>
					<?php $linkThang = 'xem-ngay-tot-trong-thang-$thang-nam-$nam.html'; ?>
					<?php for ($i = 1; $i <= 12 ; $i++):?>
						<?php
							$linkTemp = str_replace('$thang', $i, $linkThang);
							$linkTemp = str_replace('$nam', $input['nam'], $linkTemp);
						?>
						<li>
							<a href="<?php echo base_url($linkTemp); ?>">Xem ngày tốt xấu tháng <?php echo $i; ?> năm <?php echo $input['nam']; ?></a>
						</li>
					<?php endfor; ?>
				</ul>
			</div>
			<!-- Load box question -->
			<?php $this->load->view('site/import/box_question_mobile'); ?>
			<!-- end -->
			<?php $this->load->view('site/import/frame_tuvi2018_mb'); ?>
			<?php $this->load->view('site/import/frame_tuvihangngay_mb'); ?>
			<?php $this->load->view('site/adsen/code_migd'); ?>
			<div>
				<?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>
			</div>
        </div>
	</div>

	

	

	
</section>
<script type="text/javascript">
	
</script>