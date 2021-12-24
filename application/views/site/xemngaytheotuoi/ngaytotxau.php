<div class="row">
	<?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	    <div class="col-md-12">
	        <?php echo $breadcrumb; ?>
		</div>
	<?php endif ?>
 
	<div class="col-md-12">
		<div class="box_content box_xvm box_ngaytotxau text-center">
		    <h1 class="box_content_tt text-uppercase"><?php echo $name; ?></h1>

		    <div class="desktop_padding">
		      <p class="text-center"><i>* Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</i></p>
		      <?php $this->load->view('site/import/form_ngaytotxautheotuoi',false); ?>

		      <div class="field">
		      	<div class="row">
			        <div class="col-md-12 text-justify">
			          <?php echo $this->my_seolink->get_text(); ?>
			        </div>
			    </div>
		      </div>
		    </div>

			<?php if (isset($success) && $success == 1): ?>
				<!-- link 2 thang tiep -->
			    <?php
			        $month_show_next_1 = ($thang_xem+1>12)?($thang_xem+1-12):($thang_xem+1); 
			        $year_show_next_1  = ($thang_xem+1>12)?($nam_xem+1):($nam_xem);
			        $month_show_next_2 = ($thang_xem+2>12)?($thang_xem+2-12):($thang_xem+2); 
			        $year_show_next_2  = ($thang_xem+2>12)?($nam_xem+1):($nam_xem);
			     ?>
			    <div class="field desktop_padding">
			        <div class="row">
			            <div class="col-md-12">
			                <p class="text-left">
			                	<span class="muiten_link"></span>
			                	<a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$month_show_next_1.'-nam-'.$year_show_next_1) ?>.html">
			                		<label>Xem ngày tốt tháng <?php echo $month_show_next_1; ?> năm <?php echo $year_show_next_1; ?></label>
			                	</a>
			                </p>
			            </div>
			             <div class="col-md-12">
			                <p class="text-left">
			                	<span class="muiten_link"></span>
			                	<a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$month_show_next_2.'-nam-'.$year_show_next_2) ?>.html">
			                		<label>Xem ngày tốt tháng <?php echo $month_show_next_2; ?> năm <?php echo $year_show_next_2; ?></label>
			                	</a>
			                </p>
			            </div>
			        </div>
			    </div>
			   <!-- end link 2 thang tiep -->

				<?php if (!empty($list_ngaytot)): ?><!-- co ngay tot -->
				    <div class="field">
				        <section class="headingTopUpdate">
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="titleUpd text-uppercase">
				                    	NGÀY TỐT HỢP TUỔI <?php echo $canchitext ?> THÁNG <?php echo $thang_xem ?> NĂM <?php echo $nam_xem ?>
			                    	</div>
				                </div>
				            </div>
				        </section>
				    </div>

				    <div class="field clearfix">
				        <div class="col-md-12">
				            <section class="result" id="result">
				                <div class="result_calendar">
				                    <div class="row">
				                        <section class="col-md-12">
				                            <article class="listDay_good">
				                                <table>
				                                    <thead>
				                                        <tr>
				                                            <th>
				                                                <!-- khong xoa -->
				                                            </th>
				                                            <th>
				                                                
				                                            </th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>
			                                            <?php foreach ($list_ngaytot as $key => $value): ?>
			                                                <tr>
			                                                    <td>
			                                                        <section class="clearfix">
			                                                            <div class="boxLichduong_left">
			                                                                <p class="title_lichduong">Lịch dương</p>
			                                                                <p class="title_date"><label><?php echo $value['duonglich'][0] ?></label></p>
			                                                                <p class="title_month">Tháng <?php echo $value['duonglich'][1] ?></p>
			                                                            </div>
			                                                            <div class="boxLichduong_right">
			                                                                <p class="title_licham">Lịch âm</p>
			                                                                <p class="title_date"><label><?php echo $value['amlich'][0] ?></label></p>
			                                                                <p class="title_month">Tháng <?php echo $value['amlich'][1] ?></p>
			                                                            </div>
			                                                            <div class="boxLichduong_bottom">
			                                                                <?php if (preg_match('/color_black/', $value['loaingay'])): ?>
			                                                                    <p class="color_black"><b>Ngày <?php echo $value['loaingay']; ?></b></p>
			                                                                <?php else: ?>    
			                                                                    <p><b>Ngày <?php echo $value['loaingay']; ?></b></p>
			                                                                <?php endif ?>
			                                                                
			                                                            </div>
			                                                        </section>
			                                                    </td>
			                                                    <?php
			                                                        if (isset($link_child)) {
			                                                          $input['link_parent'] = $link_child;
			                                                        } 
			                                                        ?>
			                                                    <td>
			                                                        <section class="boxRightListDay">
			                                                            <p><span class="text_red"><?php echo $value['ngaythu'] ?>,  <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>">ngày <?php echo join('/',$value['duonglich']) ?></a></span> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
			                                                            <p>Ngày <label><?php echo $value['ngaycanchi'] ?></label>, tháng <label><?php echo $value['thangcanchi'] ?></label>, năm <label><?php echo $value['namcanchi'] ?></label></p>
			                                                            
			                                                    		<?php if (!empty($value['ngay_hoang_dao'])): ?>
			                                                    			<p>
				                                                            	Ngày <span class="text_black">
			                                                            			<?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?>
			                                                            		</span>
			                                                            	</p>
			                                                    		<?php endif ?>
			                                                            <p><label>Giờ tốt trong ngày :</label></p>
			                                                            <p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
			                                                            <p><a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2]); ?>.html" class="bg_red">Xem chi tiết</a></p>
			                                                        </section>
			                                                    </td>
			                                                </tr>
			                                            <?php endforeach ?>
				                                    </tbody>
				                                </table>
				                            </article>
				                        </section>
				                    </div>
				                </div>
				            </section>
				        </div>
				    </div>
				<?php else: ?><!-- khong co ngay nao tot -->
					<div class=" field desktop_padding">
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
            <div class="field">
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
			<div class="field desktop_padding">
				<div class="row">
					<div class="col-md-12">
						<div class="bg_vienvang_full">
							<div class="txt_1">
								Bạn nên xem ngày tốt hợp tuổi <?php echo isset($canchitext) ? $canchitext : ''; ?> theo công việc cụ thể tại đây
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
					<div class="col-md-12">
						<div class="outter_2box">
							<?php 
									$list_2box = array();
									if (1950 <= $canchiint && $canchiint <= 1969) {
										$list_2box = data_2box_ngaytotxau($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 1);
									}
									elseif(1970 <= $canchiint && $canchiint <= 1979){
										$list_2box = data_2box_ngaytotxau($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 2);
									}
									elseif(1980 <= $canchiint && $canchiint <= 1989){
										$list_2box = data_2box_ngaytotxau($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 3);
									}
									elseif(1990 <= $canchiint && $canchiint <= 1999){
										$list_2box = data_2box_ngaytotxau($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 4);
									}
									elseif(2000 <= $canchiint && $canchiint <= 2009){
										$list_2box = data_2box_ngaytotxau($canchislug, $canchiint, $canchitext, $menh, $nam_xem, 5);
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

				<div class="row">
					<div class="col-md-12 text-justify">
						<?php echo $this->my_seolink->get_text_foot(); ?>
					</div>
				</div>
				<?php $this->load->view('site/adsen/code_migd'); ?>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box_xvm">
			<?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
		</div>
	</div>

	<script type="text/javascript">
	  function send_form() {
	      var frm = document.search_xemngay;
	      var input_time   = frm.input_time.value;
	      var arr = input_time.split('/');
	      window.location.href = "<?php echo base_url(); ?>xem-ngay-tot-xau/ngay-"+arr[0]+"-thang-"+arr[1]+"-nam-"+arr[2]+".html";
	  }
	</script>
</div>