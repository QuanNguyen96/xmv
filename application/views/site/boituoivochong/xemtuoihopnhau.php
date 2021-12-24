<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div>
    	<?php echo $this->my_seolink->get_text(); ?>
    </div> 
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="search_xem_tuoi_hop_lam_an" action="" method="post" onsubmit="send_form_xem_tuoi_hop_lam_an();return false;">
       	<div class="field clearfix">
         	<div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
            	<label>Năm sinh (AL):</label>
        	</div>
        	<div class="col-md-3 col-sm-3 col-xs-6">
	            <select name="namsinh" class="namsinh myinput" id="">
	            	<?php 
                        $sltnb = isset($nam) ? $nam : 1992;
	            	    foreach (list_age_text() as $key => $value): ?>
	            		<?php $selected = $sltnb==$value?'selected=""':''; ?>
	            		<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
	            	<?php endforeach ?>
	            </select>
        	</div>
       </div>
       <div class="field clearfix">
       	<div class="row">
            <div class="col-md-12">
                <p class="" style="font-size: 12px;text-align: center;"><i>Quý bạn vui lòng sử dụng: <a href="<?php echo base_url('doi-ngay-duong-lich-sang-am-lich.html'); ?>">Đổi Ngày Dương Lịch Sang Ngày Âm Lịch</a> nếu không nhớ năm sinh âm lịch của mình</i></p>
            </div>
        </div>
       </div>
       <div class="field field_center clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button" name="check">Xem kết quả</button>
          </div>
       </div>
    </form>
    <div class="field">
    	
      	<div class="col-md-12">
        	<?php if (isset($info_user)): ?>
        		<?php
        			$canchi 	= $info_user['namcanchi']; 
        			$slugcanchi = get_can_slug($info_user['canchinam_text']['can']).'-'.get_chi_slug($info_user['canchinam_text']['chi']);
        			$namsinh	= $namsinh; 
        		?>
        		<div class="row">
	                <div class="col-md-12">
	                    <p class="title_p h3" style="font-size: 18px;font-weight: bold;">Thông tin gia chủ</p>
	                </div>
	            </div>
        		<div class="row">
        			<div class="col-md-4">
        				<div class="boxImageOne">
        					<img style="width: 80%;" src="<?php echo public_url('images/icon/tuoi-hop.jpg'); ?>">
        				</div>
        			</div>
        			<div class="col-md-8">
        				<table class="table table-hover table-bordered">
							<tr>
								<td>
									<label>Năm sinh âm lịch:</label>
								</td>
								<td>
									<p class="text-center"><?php echo $info_user['amlich'][2]; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Xem mệnh ngũ hành:</label>
								</td>
								<td>
									<p><?php echo $info_user['lucthap']['nghiahan'].' '.$info_user['lucthap']['he'] ?> ( mệnh <?php echo $info_user['lucthap']['he'] ?> )</p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Thiên can:</label>
								</td>
								<td>
									<p><?php echo $info_user['canchinam_text']['can']; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Địa chi:</label>
								</td>
								<td>
									<p><?php echo $info_user['canchinam_text']['chi']; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Cung mệnh:</label>
								</td>
								<td>
									<p><?php echo $info_user['cung_user']['cung']; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Niên mệnh năm sinh:</label>
								</td>
								<td>
									<p><?php echo $info_user['cung_user']['menh']; ?></p>
								</td>
							</tr>
						</table>
        			</div>
        		</div>
        	<?php endif ?>
      	</div>
    </div>
    <div class="field" id="boxTool_new">
      	<div class="col-md-12">
        	<?php if ($submit == 1): ?>
        		<?php
        			$canchi	= $info_user['namcanchi'];
        			$slugcanchi	= get_can_slug($info_user['canchinam_text']['can']).'-'.get_chi_slug($info_user['canchinam_text']['chi']); 
        			$namsinh	= $namsinh;
        		?>
				<div id="result">
					<div class="row">
						<div class="col-md-12">
							<h2 class="title_c title_h1 h4 boidam">Tổng hợp những tuổi hợp với tuổi <?php echo $canchi; ?></h2>
							<div class="text-center">
								<table class="table table-hover table-bordered table_cuatui table_cangiua">
									<tr>
										<td><label>STT</label></td>
										<td><label>Tuổi hợp</label></td>
										<td><label>Điểm đánh giá</label></td>
										<td><label>Luận giải chi tiết</label></td>
									</tr>
									<?php if (!empty($send_namhop)): ?>
										<?php $i = 1; ?>
										<?php foreach ($send_namhop as $key => $value): ?>
											<tr>
												<td>
													<p><?php echo $i++; ?></p>
												</td>
												<td>
													<p><?php echo $value['namhop'] ?> - <?php echo $value['info']['al_tuoivo_show'] ?></p>
												</td>
												<td>
													<p><?php echo $value['info']['total_scores'] ?></p>
												</td>
												<td>
													<p>
														<a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-'.$namsinh.'-va-tuoi-vo-'.$value['namhop'].'.html'); ?>">Xem tuổi <?php echo get_chi_replace($canchi); ?> và tuổi <?php echo get_chi_replace($value['info']['al_tuoivo_show']) ?></a>
													</p>
												</td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
								</table>
							</div>
						</div>
						<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
                        <div class="col-md-12">
		                        <div class="notification_tuvi_2020">
		                          <ul>
		                            <li>
		                               <a href="<?php echo base_url($dieu_huong_tv_2021_link_nam);?>"><?php echo $dieu_huong_tv_2021_text_nam;?></a>
		                            </li>
                                  <?php if(isset($dieu_huong_tv_2021_text_nu)){?>
                                      <li>
                                          <a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>" style="font-weight: bold;">
                                              <?php echo $dieu_huong_tv_2021_text_nu; ?>
                                          </a>
                                      </li>
                                  <?php } ?>
		                            <li>
		                               <a href="<?php echo base_url($dieu_huong_tv_2020_link_nam);?>"><?php echo $dieu_huong_tv_2020_text_nam;?></a>
		                            </li>
		                            <li>
		                               <a href="<?php echo base_url($dieu_huong_tv_2020_link_nu);?>"><?php echo $dieu_huong_tv_2020_text_nu;?></a>
		                            </li>
		                            <?php if(isset($dieu_huong_sim)): ?>
		                            <?php foreach ($dieu_huong_sim as $key => $value): ?>
                                       <li><a href="<?php echo base_url($value['link']);?>"><?php echo $value['anchor'];?></a></li> 
                                    <?php endforeach ?>
                                    <?php endif; ?>
		                          </ul>
		                        </div>
                        </div>  
						<div class="col-md-12">
							<!-- boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
	                            <?php
	                                $namsinhnam = $info_user['nam_sinh'];
	                                $canchinam  = $info_user['namcanchi'];
	                                $canchislug_nam = $iNamsinh;
	                             ?>
	                            <div class="hidden_destop">
	                                <div class="bg_vienvang_full">
	                                    <div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnam ?></div>
	                                    <div class="ul_list ul_list_sao" id="ul_list_sao">
	                                        <div class="text-justify box_limit enable_limit">
	                                            <ul class="ul">
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Xuất Hành hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-khai-truong-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Khai Trương hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-mua-xe-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Xe hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Cưới Hỏi hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-mua-nha-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Nhà hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-dong-tho-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Động Thổ hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                                <li>
	                                                    <a href="<?php echo base_url('xem-ngay-tot-nhap-trach-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Nhập Trạch hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <button id="btn_toogle_limit" class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
	                                            <div class="lbl_view">Hiển thị thêm</div><br>
	                                            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
	                                        </button>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="hidden_mobile">
	                                <div class="bg_vienvang_full">
	                                    <div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnam ?></div>
	                                    <ul class="ul_list ul_list_sao" id="ul_list_sao">
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Xuất Hành hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-khai-truong-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Khai Trương hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-mua-xe-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Xe hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Cưới Hỏi hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-mua-nha-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Nhà hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-dong-tho-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Động Thổ hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                        <li>
	                                            <a href="<?php echo base_url('xem-ngay-tot-nhap-trach-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Nhập Trạch hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
	                                        </li>
	                                    </ul>
	                                </div>
	                            </div>
	                        <!-- end boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
						</div>
						
					  	<div class="col-md-12">
					  		<?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
					  	</div>

					</div>
					<div class="row">
						<div class="col-md-12">
							<h3 class="title_h2 color_red boidam">Xem theo mục đích công việc khác</h3>
							<div class="nenxanh">
								<form name="form_search_congviec" onsubmit="return search_congviec_foot();">
									<table class="table table-hover table-bordered">
										<tr>
											<td class="text_center">
												<label>Năm sinh <?php echo $namsinh; ?></label>
											</td>
											<td>
												<input type="hidden" name="namsinh" value="<?php echo $namsinh; ?>">
												<input type="hidden" name="canchi" value="<?php echo $slugcanchi; ?>">
												<select name="congviec">
													<option value="xem-tuoi-lam-an/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-lam-an-voi-tuoi-nao.html">Xem tuổi làm ăn</option>
													<option value="xem-tuoi-lam-nha/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-lam-nha-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi làm nhà</option>
													<option value="xem-tuoi-hop-nhau/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-voi-tuoi-nao.html">Xem tuổi hợp</option>
													<option value="xem-tuoi-ket-hon/nam-tuoi-<?php echo $slugcanchi; ?>-<?php echo $namsinh; ?>-lay-vo-nam-nao-tot.html">Xem tuổi kết hôn</option>
													<option value="xem-tuoi-mua-nha/tuoi-<?php echo $slugcanchi; ?>-mua-nha-nam-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi mua nhà</option>
													<option value="xem-tuoi-sinh-con.html">Xem tuổi sinh con</option>
													<option value="xem-huong-nha-tot-xau/tuoi-<?php echo $slugcanchi; ?>-xay-nha-huong-nao-tot.html">Xem hướng nhà tốt xấu</option>
													<option value="xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html">Xem tuổi vợ chồng</option>
												</select>
											</td>
											<td>
												<button class="button">Xem chi tiết</button>
											</td>
										</tr>
									</table>
								</form>
								<script type="text/javascript">
								  	function search_congviec_foot() {
								      	var frm = document.form_search_congviec;
								      	var congviec  = frm.congviec.value;
								      	window.location.href = "<?php echo base_url('');?>"+congviec;
								      	return false;
								  	}
								</script>
							</div>
						</div>
					</div>
					<div class="field">
						<?php $this->load->view('site/import/import_anhduong'); ?>
					</div>
				</div>

			<?php endif ?>
      	</div>
    </div>
    <div class="field">
      	<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                
                <?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  	function send_form_xem_tuoi_hop_lam_an() {
      	var frm = document.search_xem_tuoi_hop_lam_an;
      	var namsinh  = frm.namsinh.value;
      	var nam   = $('.myinput option:selected').text();
      	url = "<?php echo base_url('xem-tuoi-hop-nhau/tuoi-"+namsinh+"-sinh-nam-"+nam+"-hop-voi-tuoi-nao');?>.html";

      	window.location.href = url;
  	}
</script>










