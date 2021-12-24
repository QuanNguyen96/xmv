<section class="clearfix">
	<?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	    <div class="box-mobile">
	        <?php echo $breadcrumb; ?>
		</div>
	<?php endif ?>

	<div class="box-mobile">
		<h1 class="title-new-mobile text-uppercase"><?php echo $name; ?></h1>
		<div>
			<p class="title-mobile-form">Nhập đầy đủ thông tin để có kết quả tốt nhất</p>
			<?php $this->load->view('site/import/form_ngaytot_congviec_theotuoi',false); ?>
		</div>

		<?php if ($this->my_seolink->get_text() != null): ?>
			<div class="text-justify box_limit enable_limit">
				<br>
				<?php echo $this->my_seolink->get_text(); ?>
			</div>
			<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
				<div class="lbl_view">Xem thêm mô tả</div><br>
	            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
	        </button>
		<?php endif ?>

		<?php if (isset($success) && $success == 1): ?>
			<!-- link 2 thang tiep -->
		    <?php
		        $month_show_next_1 = ($thang_xem+1>12)?($thang_xem+1-12):($thang_xem+1); 
		        $year_show_next_1  = ($thang_xem+1>12)?($nam_xem+1):($nam_xem);
		        $month_show_next_2 = ($thang_xem+2>12)?($thang_xem+2-12):($thang_xem+2); 
		        $year_show_next_2  = ($thang_xem+2>12)?($nam_xem+1):($nam_xem);
		     ?>
		    <div class="box-mobile mar-top-10">
		        <div class="row">
		            <div class="col-md-12">
		                <p class="text-left">
		                	<span class="muiten_link"></span>
		                	<a class="text_red text-uppercase" href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$month_show_next_1.'-nam-'.$year_show_next_1) ?>.html">
		                		<label>Xem ngày tốt tháng <?php echo $month_show_next_1; ?> năm <?php echo $year_show_next_1; ?></label>
		                	</a>
		                </p>
		            </div>
		             <div class="col-md-12">
		                <p class="text-left">
		                	<span class="muiten_link"></span>
		                	<a class="text_red text-uppercase" href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$month_show_next_2.'-nam-'.$year_show_next_2) ?>.html">
		                		<label>Xem ngày tốt tháng <?php echo $month_show_next_2; ?> năm <?php echo $year_show_next_2; ?></label>
		                	</a>
		                </p>
		            </div>
		        </div>
		    </div>
		   <!-- end link 2 thang tiep -->
			<?php if (!empty($list_ngaytot)): ?><!-- co ngay tot -->
		        <div class="box-mobile">
		        	<section class="headingTopUpdate">
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="titleUpd text-uppercase">
			                    	NGÀY TỐT <?php echo $data_date['name'] ?> HỢP TUỔI <?php echo $canchitext ?> THÁNG <?php echo $thang_xem ?> NĂM <?php echo $nam_xem ?>
			                    </div>
			                </div>
			            </div>
			        </section>
		        </div>

			    <div class="box-mobile">
		        	<section class="list_thang_tot_mb">
	        			<?php foreach ($list_ngaytot as $key => $value): ?>
	        				<div class="box_item_thang_mb">
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

			        					<?php if (preg_match('/color_black/', $value['loaingay'])): ?>
	                                        <label class="color_black" >Ngày <?php echo $value['loaingay']; ?></label>
	                                    <?php else: ?>    
	                                        <label>Ngày <?php echo $value['loaingay']; ?></label>
	                                    <?php endif ?>
			        					

			        				</p>
			        				<section>
										<p><?php echo $value['ngaythu'] ?>, <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>">ngày <?php echo join('/',$value['duonglich']) ?></a> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
										<p>Ngày <label class="canchi"><?php echo $value['ngaycanchi'] ?></label>, tháng <label class="canchi"><?php echo $value['thangcanchi'] ?></label>, năm <label class="canchi"><?php echo $value['namcanchi'] ?></label></p>
										<p><span class="text_black"><?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?></span></p>
										<p class="hourok"><i class="glyphicon glyphicon-time"></i>&nbspGIỜ TỐT TRONG NGÀY :</p>
										<p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
			        				</section>
			        				<br>
			        				<p class="text-center"><a class="btn_vangsoc" href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2]); ?>.html" class="bg_red">Xem chi tiết</a></p>
			        			</div>
			        		</div>
	        			<?php endforeach; ?>
		        	</section>
		        </div>
			<?php else: ?><!-- khong co ngay nao tot -->
				<div class="box-mobile">
					<div class="bg_vienvang_longden">
						<div class="txt_1">Không có ngày nào tốt</div>
						<p style="text-align: center!important;font-weight: bold;">
							Tháng <?php echo $thang_xem ?> năm <?php echo $nam_xem ?> không có ngày nào tốt hợp tuổi <?php echo $canchitext ?>
						</p>
						<div>
							<i style="font-family: Arial">Qúy bạn vui lòng chọn tháng khác để xem ngày tốt hợp tuổi <?php echo $canchitext ?></i>
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endif ?>
        <div class="box-mobile">
        	<div class="notification_tuvi_2020">
			  <ul>
				<li>
				   <a href="<?php echo $dieu_huong_tv_2020_link_nam; ?>"><?php echo $dieu_huong_tv_2020_text_nam; ?></a>
				</li>
				<li>
				   <a href="<?php echo $dieu_huong_tv_2020_link_nu; ?>"><?php echo $dieu_huong_tv_2020_text_nu; ?></a>
				</li>
			  </ul>
			</div>
        </div>
		<div class="box-mobile">
			<div class="row">
				<div class="col-md-12">
					<div class="bg_vienvang_full">
						<div class="txt_1">
							Bạn nên xem ngày tốt hợp tuổi <?php echo isset($canchitext) ? $canchitext : ''; ?> cho công việc khác
						</div>

						<?php 
							$toolList = toolListXemNgayTheoTuoi($canchislug, $canchiint);
							$this_link= $this->uri->segment(1);
						 ?>
						<ul class="ul_list">
							<?php foreach ($toolList as $key => $value): ?>
								<li class="<?php echo $key == $this_link ? 'hidden' : ''; ?>">
									<a href="<?php echo base_url($key); ?>.html"><?php echo $value ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="outter_2box">
						<?php 
							$list_2box     = array();
							$function_name = 'data_2box_'.$type_date;
							if (1950 <= $canchiint && $canchiint <= 1969) {
								$list_2box = $function_name($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 1);
							}
							elseif(1970 <= $canchiint && $canchiint <= 1979){
								$list_2box = $function_name($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 1);
							}
							elseif(1980 <= $canchiint && $canchiint <= 1989){
								$list_2box = $function_name($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 1);
							}
							elseif(1990 <= $canchiint && $canchiint <= 1999){
								$list_2box = $function_name($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 1);
							}
							elseif(2000 <= $canchiint && $canchiint <= 2009){
								$list_2box = $function_name($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 1);
							}
						 ?>
						<div class="inner_2box">
							<div class="box_bg_head">
								<div class="box_bg_head_title">Công cụ liên quan</div>
								<ul class="box_bg_head_body">
									<?php foreach ($list_2box['lienquan'] as $key => $value): ?>
										<li>
											<a href="<?php echo base_url($value); ?>"><?php echo $key ?></a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
						<div class="inner_2box">
							<div class="box_bg_head">
								<div class="box_bg_head_title">Công cụ xem nhiều nhất</div>
								<ul class="box_bg_head_body">
									<?php foreach ($list_2box['xemnhieu'] as $key => $value): ?>
										<li>
											<a href="<?php echo base_url($value); ?>"><?php echo $key ?></a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			
			<?php if ($this->my_seolink->get_text_foot() != null): ?>
				<div class="row" style="margin-top:-10px">
					<div class="col-md-12 text-justify">
						<?php echo $this->my_seolink->get_text_foot(); ?>
					</div>
				</div>
			<?php endif ?>
            <?php $this->load->view('site/adsen/code_migd'); ?>
			<div class="row" style="margin-top: -10px">
				<div class="col-md-12">
					<div class="box_xvm">
						<?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>