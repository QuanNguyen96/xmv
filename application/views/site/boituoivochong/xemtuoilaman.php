<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div>
    	<?php echo $this->my_seolink->get_text();?>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="search_xem_tuoi_hop_lam_an" action="" method="post" onsubmit="send_form_xem_tuoi_hop_lam_an();return false;">
       	<div class="field clearfix">
         	<div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
            	<label>Năm sinh (AL):</label>
        	</div>
        	<div class="col-md-3 col-sm-3 col-xs-6">
	            <select name="namsinh" class="namsinh myinput" id="">
	            	<?php foreach (list_age_text() as $key => $value): ?>
	            		<?php if ($value >=1960): ?>
	            			<?php $selected = $iNamsinh==$key?'selected=""':''; ?>
	            			<option <?php echo $selected; ?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
	            		<?php endif ?>
	            	<?php endforeach ?>
	            </select>
        	</div>
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
        			<div class="col-md-4">
        				<div class="boxImageOne">
        					<img src="<?php echo public_url('images/icon/lam-an.jpg'); ?>">
        				</div>
        				
        			</div>
        			<div class="col-md-8">
        				<table class="table table-hover table-bordered table_cuatui">
							<tr>
								<td colspan="2"><h3 class="text_center h4 boidam">Thông tin về người tuổi <?php echo $namsinh; ?></h3></td>
							</tr>
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
					<div class="content_nd">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title_c title_h1 h3">Tổng hợp những tuổi hợp làm ăn với tuổi <?php echo $canchi; ?></h2>
								<div class="text-center">
									<table class="table table-hover table-bordered table_cuatui table_cangiua" id="arrowToTable">
										<tr>
											<td><label>STT</label></td>
											<td><label>Tuổi hợp</label></td>
											<td><label>Điểm đánh giá</label></td>
											<td><label>Luận giải chi tiết</label></td>
										</tr>
										<?php if (!empty($send_namhop)): ?>
											<?php $i = 0; ?>
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
														<p><a class="reloadWithUrl" data-value="xem-tuoi-hop-<?php echo $value['namhop'] ?>" href="<?php echo current_url(); ?>#xem-tuoi-hop-<?php echo $value['namhop'] ?>">Tại đây</a></p>
													</td>
												</tr>
											<?php endforeach ?>
										<?php endif ?>
										
									</table>
								</div>
                                <div class="notification_tuvi_2020">
									<ul>
										<li>
										<a href="<?php echo base_url($dieu_huong_tv_2021_link_nam); ?>"><?php echo $dieu_huong_tv_2021_text_nam; ?></a>
										</li>
										<li>
										<a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>"><?php echo $dieu_huong_tv_2021_text_nu; ?></a>
										</li>
										<li>
										<a href="<?php echo base_url($dieu_huong_tv_2022_link_nam); ?>"><?php echo $dieu_huong_tv_2022_text_nam; ?></a>
										</li>
										<li>
										<a href="<?php echo base_url($dieu_huong_tv_2022_link_nu); ?>"><?php echo $dieu_huong_tv_2022_text_nu; ?></a>
										</li>
									</ul>
								</div>
								<div>
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

								<?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
							</div>
							
						</div>
						<!-- 4 box hop lam an -->
						<?php if (!empty($send_namhop)): ?>
							<?php foreach ($send_namhop as $key => $value): ?>
								<div class="row boxTuoiHopLamAn" id="xem-tuoi-hop-<?php echo $value['namhop'] ?>">
									<div class="col-md-12">
										<div class="panel panel-info">
									      	<div class="panel-heading">
									      		<p class="title_c title_h2"><b>Tuổi <?php echo $canchi ?> hợp làm ăn với tuổi <?php echo $value['info']['al_tuoivo_show'] ?> sinh năm <?php echo $value['namhop']; ?></b></p>
									      	</div>
									      	<div class="panel-body">
									      		<div class="">
													<div>
														<p class="title_h3">Ngũ hành bản mệnh</p>
														<div>
															<p>- Quý bạn tuổi <?php echo $canchi ?> có ngũ hành bản mệnh là <?php echo $value['info']['show_menh_chong'] ?> chọn tuổi kết hợp làm ăn là tuổi <?php echo $value['info']['al_tuoivo_show'] ?> có ngũ hành bản mệnh: <?php echo $value['info']['show_menh_vo'] ?> . Theo ngũ hành sinh khắc có: <?php echo $value['info']['show_menh_chong'] ?> <?php echo $value['info']['show_luan_menh_vochong'] ?> <?php echo $value['info']['show_menh_vo'] ?> ==> <?php echo get_color_for_u($value['info']['show_luan_menh_vochong']) ?> = <?php echo $value['info']['show_scores_menh'] ?> điểm</p>
														</div>
													</div>
													<div>
														<p class="title_h3">Theo thiên can</p>
														<div>
															<p>Quý bạn tuổi <?php echo $canchi; ?> có thiên can là <?php echo $value['info']['show_thiencan_chong'] ?> chọn tuổi kết hợp làm ăn là tuổi <?php echo $value['info']['al_tuoivo_show'] ?> có thiên can <?php echo $value['info']['show_thiencan_vo']; ?>.</p>
															<div>
																<p>- Theo bình địa thiên can có <?php echo $value['info']['show_thiencan_chong'] ?> <?php echo $value['info']['show_luan_thiencan_vochong'] ?> <?php echo $value['info']['show_thiencan_vo'] ?> ==>> <?php echo get_color_for_u($value['info']['show_luan_thiencan_vochong']) ?> = <?php echo $value['info']['show_scores_thiencan'] ?> điểm</p>	
																<p>- Theo ngũ hành của thiên can: <?php echo ($info_user['canchinam_text']['can']); ?> thuộc <?php echo what_can_to_menh($info_user['canchinam_number']['can']); ?>, <?php echo $value['info']['show_thiencan_vo']; ?> thuộc <?php echo what_can_to_menh($value['info']['show_thiencan_vo']); ?> mà <?php echo what_can_to_menh($info_user['canchinam_number']['can']); ?> <?php echo $value['info']['luan_thiencan_vochong_theomenh']; ?> <?php echo what_can_to_menh($value['info']['show_thiencan_vo']); ?> ==>> <?php echo get_color_for_u($value['info']['luan_thiencan_vochong_theomenh']); ?> = <?php echo $value['info']['point_thiencan_vochong_theomenh']; ?> điểm</p>
															</div>		
														</div>
													</div>
													<div>
														<p class="title_h3">Theo địa chi</p>
														<div>
															<p>Quý bạn tuổi <?php echo $canchi; ?> có địa chi là <?php echo $value['info']['show_diachi_chong'] ?> chọn tuổi kết hợp làm ăn là tuổi <?php echo $value['info']['al_tuoivo_show'] ?>
															có địa chi <?php echo $value['info']['show_diachi_vo'] ?>.</p>
															<p>- Theo hợp khắc địa chi có <?php echo $value['info']['show_diachi_chong']; ?> và <?php echo $value['info']['show_diachi_vo'] ?> <?php echo get_color_for_u($value['info']['show_luan_diachi_vochong']); ?> ==>> <?php echo $value['info']['show_scores_diachi'] ?> điểm</p>	
															<p>- Theo ngũ hành của địa chi: <?php echo $value['info']['show_diachi_chong']; ?> thuộc <?php echo what_chi_to_menh($value['info']['show_diachi_chong']); ?>, <?php echo $value['info']['show_diachi_vo']; ?> thuộc <?php echo what_chi_to_menh($value['info']['show_diachi_vo']) ?> mà <?php echo what_chi_to_menh($value['info']['show_diachi_chong']); ?> <?php echo $value['info']['luan_diachi_vochong_theomenh'] ?> <?php echo what_chi_to_menh($value['info']['show_diachi_vo']); ?> ==>> <?php echo get_color_for_u($value['info']['luan_diachi_vochong_theomenh']) ?> = <?php echo $value['info']['point_diachi_vochong_theomenh'] ?> điểm</p>		
														</div>
													</div>
													<div>
														<p class="title_h3">Theo thiên mệnh cung phi</p>
														<div>
															Tuổi <?php echo $value['info']['al_tuoichong_show'] ?> có cung phi thuộc <?php echo $value['info']['show_thienmenh_chong'] ?> chọn kết hợp làm ăn với tuổi <?php echo $value['info']['al_tuoivo_show'] ?> có cung phi thuộc <?php echo $value['info']['show_thienmenh_vo'] ?>. Ứng theo Cung Phi Bát Trạch thì <?php echo $value['info']['show_thienmenh_chong'] ?> và <?php echo $value['info']['show_thienmenh_vo'] ?> là <?php echo get_color_for_u($value['info']['show_luan_thienmenh_vochong']) ?> => = <?php echo $value['info']['show_scores_thienmenh'] ?> điểm			
														</div>
													</div>
													<div>
														<p class="title_h3">Theo Ngũ Hành Cung Phi</p>
														<div>
															Tuổi <?php echo $value['info']['al_tuoichong_show'] ?>có ngũ hành cung phi thuộc <?php echo $value['info']['show_cungkham_chong'] ?> chọn kết hợp làm ăn với tuổi <?php echo $value['info']['al_tuoichong_show'] ?> có ngũ hành cung phi thuộc <?php echo $value['info']['show_cungkham_vo'] ?>. Chiếu theo ngũ Hành sinh khắc thì <?php echo $value['info']['show_cungkham_chong'] ?> <?php echo $value['info']['show_luan_cungkham_chong'] ?> <?php echo get_color_for_u($value['info']['show_cungkham_vo']) ?> => = <?php echo $value['info']['show_scores_cungkham'] ?> điểm	
														</div>
													</div>
													<div class="alert alert-warning arrowToTable">
														<a href="#arrowToTable" class="itemArrowToTable"><label class="" title="quay lại bảng danh sách tuổi hợp"></label></a>
														<p class="boidam">Tổng điểm = <?php echo $value['info']['total_scores']; ?> <span class="btn_nhaynhay"></span> Bạn có thể kết hợp làm ăn, kinh doanh với tuổi <?php echo $value['info']['al_tuoivo_show'] ?> 							
														</p>
														<?php 
															$arr_menh = array(
																'1960' => 'tho',
																'1961' => 'tho',
																'1968' => 'tho',
																'1969' => 'tho',
																'1976' => 'tho',
																'1977' => 'tho',
																'1990' => 'tho',
																'1991' => 'tho',
																'1998' => 'tho',
																'1999' => 'tho',
																'2006' => 'tho',
																'2007' => 'tho',
																'1956' => 'hoa',
																'1957' => 'hoa',
																'1964' => 'hoa',
																'1965' => 'hoa',
																'1978' => 'hoa',
																'1979' => 'hoa',
																'1986' => 'hoa',
																'1987' => 'hoa',
																'1994' => 'hoa',
																'1995' => 'hoa',
																'2008' => 'hoa',
																'2009' => 'hoa',
																'2016' => 'hoa',
																'2017' => 'hoa',
																'1954' => 'kim',
																'1955' => 'kim',
																'1962' => 'kim',
																'1963' => 'kim',
																'1970' => 'kim',
																'1971' => 'kim',
																'1984' => 'kim',
																'1985' => 'kim',
																'1992' => 'kim',
																'1993' => 'kim',
																'2000' => 'kim',
																'2001' => 'kim',
																'2014' => 'kim',
																'2015' => 'kim',
																'1950' => 'moc',
																'1951' => 'moc',
																'1958' => 'moc',
																'1959' => 'moc',
																'1972' => 'moc',
																'1973' => 'moc',
																'1980' => 'moc',
																'1981' => 'moc',
																'1988' => 'moc',
																'1989' => 'moc',
																'2002' => 'moc',
																'2003' => 'moc',
																'2010' => 'moc',
																'2011' => 'moc',
																'2018' => 'moc',
																'2019' => 'moc',
																'1952' => 'thuy',
																'1953' => 'thuy',
																'1966' => 'thuy',
																'1967' => 'thuy',
																'1974' => 'thuy',
																'1975' => 'thuy',
																'1982' => 'thuy',
																'1983' => 'thuy',
																'1996' => 'thuy',
																'1997' => 'thuy',
																'2004' => 'thuy',
																'2005' => 'thuy',
																'2012' => 'thuy',
																'2013' => 'thuy',
																
															);
															$menh_slug = $arr_menh[$namsinh];
														?>
														<?php if($value['namhop'] >= 1950 && $value['namhop'] <= 1961): ?>
															<p>Trong lĩnh vực làm ăn, ngoài việc chọn đối tác hợp tuổi thì quý bạn cũng cần sử dụng những phương pháp cải vận, kích phong thủy cho chính mình. Đó là: <br>
															<span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>"><b>Sim phong thủy hợp tuổi</b></a>
															<br>
															<span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-mau-hop-menh/menh-'.$menh_slug.'-hop-mau-gi.html'); ?>"><b>Màu hợp mệnh <?php echo $value['info']['show_menh_chong']; ?></b></a>
															</p>
														<?php endif ?>
														<?php if($value['namhop'] >= 1962 && $value['namhop'] <= 1971): ?>
															<p>
																Khi quý bạn chọn được đối tác làm ăn hợp tuổi với mình thì đường công danh, sự nghiệp của quý bạn cũng từ đó mà đi lên. Để cho mọi công việc được viên mãn nhất, trước khi tiến hành việc gì, quý bạn nên <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('gieo-que-dich-so.html'); ?>"><b> Gieo Quẻ Kinh Dịch</b></a> để luận đoán vận cát - hung trong thời gian sắp tới của mình
															</p>
														<?php endif ?>
														<?php if($value['namhop'] >= 1972 && $value['namhop'] <= 1981): ?>
															<p>
																Chọn bạn hợp tuổi làm ăn là việc vô cùng quan trọng, thế nhưng quý bạn cần khám phá cung Quan Lộc trong <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>"><b> Lá Số Tử Vi</b></a> của mình. Qua đó nắm được tài vận theo từng năm cũng như các phương pháp kích công danh, tài lộc cho mình
															</p>
														<?php endif ?>
														<?php if($value['namhop'] >= 1982 && $value['namhop'] <= 1989): ?>
															<p>
																Con cái chính là lộc trời cho và cũng là động lực cho các bậc cha mẹ. Đồng thời khi sinh con hợp tuổi cũng sẽ giúp việc làm ăn của quý bạn thêm thuận lợi và có nhiều tài lộc. Vậy nên quý bạn hãy: <br>
																<span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>"><b>Xem tuổi sinh con hợp tuổi bố mẹ</b></a> <br>
																<span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>"><b>Chọn tên cho con hợp phong thủy</b></a> <br>
																để đứa trẻ khi khôn lớn sẽ mạnh khỏe và thành đạt
															</p>
														<?php endif ?>
														<?php if($value['namhop'] >= 1990 && $value['namhop'] <= 1994): ?>
															<p>
																Chuyện hôn nhân và sự nghiệp luôn luôn là điểm tựa để quý bạn phát triển trên con đường công danh. Khi đã chọn được bạn làm ăn, thì quý bạn nên lựa chọn người hợp tuổi trong chuyện hôn nhân với mình tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>"><b>Xem tuổi vợ chồng tốt xấu</b></a>
															</p>
														<?php endif ?>
														<?php if($value['namhop'] >= 1995): ?>
															<p>
																Tình yêu và sự nghiệp của mỗi con người thường đi song hành với nhau. Vậy nên, ngoài việc làm ăn thì quý bạn cũng phải chọn ý chung nhân cho mình, có như vậy với giúp việc hôn nhân cũng như làm ăn được hanh thông, thuận lợi. Để khám phá điều này, mời quý bạn tham khảo tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>"><b>Xem bói tình yêu</b></a>
															</p>
														<?php endif ?>
														<?php if($value['namhop'] < 1950): ?>
															<p>
																Ngoài xem tuổi làm ăn, quý bạn còn cần tham khảo xem mình hợp với tuổi nào trong mọi lĩnh vực trong cuộc sống, có như vậy thì vạn sự với được viên mãn và thuận theo ý mình. Để khám phá điều này, mời quý bạn xem chi tiết tại: <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-tuoi-hop-nhau/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-hop-voi-tuoi-nao.html'); ?>"><b>Tuổi <?php echo $info_user['namcanchi']; ?> hợp tuổi nào</b></a>
															</p>
														<?php endif ?>
													</div>
												</div>
									      	</div>
									    </div>
									</div>
								</div>
							<?php endforeach ?>
							<?php $this->load->view('site/adsen/code2'); ?>
							<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
							<?php if(isset($dieu_huong_sim)): ?>
			                    <div class="anchor_simhoptuoi">
			                        <ul>
			                            <?php foreach ($dieu_huong_sim as $key => $value): ?>
			                               <li><a href="<?php echo base_url($value['link']);?>"><?php echo $value['anchor'];?></a></li> 
			                            <?php endforeach ?>
			                        </ul>
			                    </div>  
			                <?php endif; ?>  
						<?php endif ?>
						<!-- end -->
					</div>
					<!-- form nhập mã -->
					<div class="form-shownd clearfix hidden" style="background-color: #f7e6ec;">
			          	<form action="" method="POST">
			          		<br>
			              	<div class="text-center">
			                  	<i>Vui lòng Soạn tin nhắn theo cú pháp <b>DK PT1</b> gửi <b>5657</b> <i>(3000đ/sms)</i> để lấy <b>Mã xác nhận</b> ,Sau khi nhập <b>Mã</b>, quý bạn sẽ nhận được kết quả chi tiết.</i>
			              	</div>
			              	<br>
			              	<div class="col-md-3">
			                  	<label>Mã xác nhận:</label>
			              	</div>
			              	<div class="col-md-6">
			                  	<input type="text" class="code" maxlength="50" name="code" value="" placeholder="Nhập mã xác nhận tại đây..." required="">
			              	</div>
			              	<div class="col-md-3 text-center">
			                  	<button class="shownoidung">Nhận kết quả</button>
			              	</div>
			          	</form>
			        </div>
					<!-- end form nhập mã -->

					<div class="row">
						<div class="col-md-12">
							<p class="title_c">Các công cụ xem tuổi khác cho tuổi <?php echo $canchi; ?></p>
							<div>
								<ul>
									<li>
										1. <a href="<?php echo base_url(); ?>xem-tuoi-ket-hon/nam-tuoi-<?php echo $slugcanchi; ?>-<?php echo $namsinh; ?>-lay-vo-nam-nao-tot.html">Xem tuổi lấy vợ năm <?php echo $namsinh; ?></a></li>
									<li>
										2. <a href="<?php echo base_url(); ?>nam-tuoi-<?php echo $slugcanchi; ?>-<?php echo $namsinh; ?>-lay-chong-nam-nao-tot.html">Xem tuổi lấy chồng nữ <?php echo $namsinh; ?></a>
									</li>
									<li>
										3. <a href="<?php echo base_url(); ?>xem-huong-nha-tot-xau/tuoi-<?php echo $slugcanchi; ?>-xay-nha-huong-nao-tot.html">Xem hướng nhà hợp tuổi <?php echo $canchi; ?></a>
									</li>
									<li>
										4. <a href="<?php echo base_url(); ?>xem-ngay-tot-khai-truong.html">Xem ngày tốt khai trương hợp tuổi <?php echo $canchi; ?></a>
									</li>
									<li>
										5. <a href="<?php echo base_url(); ?>xem-ngay-tot-ky-hop-dong.html">Xem ngày ký hợp đồng hợp tuổi <?php echo $canchi; ?></a>
									</li>
									<li>
										6. <a href="<?php echo base_url(); ?>xem-ngay-tot-nhan-chuc.html">Xem ngày tốt nhận chức hợp tuổi <?php echo $canchi; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="title_h2">Xem theo mục đích công việc khác</p>
							<div>
								<form name="form_search_congviec" onsubmit="return search_congviec_foot();">
									<table class="table table-hover table-bordered">
										<tr>
											<td>
												<label>Năm sinh <?php echo $namsinh; ?></label>
											</td>
											<td>
												<input type="hidden" name="namsinh" value="<?php echo $namsinh; ?>">
												<input type="hidden" name="canchi" value="<?php echo $slugcanchi; ?>">
												<select name="congviec">
													<option value="xem-tuoi-lam-an/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-lam-an-voi-tuoi-nao.html">xem tuổi làm ăn</option>
													<option value="xem-tuoi-lam-nha/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-lam-nha-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi làm nhà</option>
													<option value="xem-tuoi-hop-nhau/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-voi-tuoi-nao.html">xem tuổi hợp</option>
													<option value="xem-tuoi-ket-hon/nam-tuoi-<?php echo $slugcanchi; ?>-<?php echo $namsinh; ?>-lay-vo-nam-nao-tot.html">xem tuổi kết hôn</option>
													<option value="xem-tuoi-mua-nha/tuoi-<?php echo $slugcanchi; ?>-mua-nha-nam-<?php echo date('Y');?>-co-tot-khong.html">xem tuổi mua nhà</option>
													<option value="xem-tuoi-sinh-con.html">xem tuổi sinh con</option>
													<option value="xem-huong-nha-tot-xau/tuoi-<?php echo $slugcanchi; ?>-xay-nha-huong-nao-tot.html">xem hướng nhà tốt xấu</option>
													<option value="xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html">Xem tuổi vợ chồng</option>
												</select>
											</td>
											<td>
												<button class="btn btn-default">Xem chi tiết</button>
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
    <div class="field clearfix">
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
    <div class="field">
      	<div class="col-md-12">
      		<?php if ($getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>
      	</div>
    </div>
</div>
<script type="text/javascript">
  	function send_form_xem_tuoi_hop_lam_an() {
      	var frm = document.search_xem_tuoi_hop_lam_an;
      	var namsinh  = frm.namsinh.value;
      	var nam   = $('.myinput option:selected').text();
      	window.location.href = "<?php echo base_url('xem-tuoi-lam-an/tuoi-"+namsinh+"-sinh-nam-"+nam+"-hop-lam-an-voi-tuoi-nao');?>.html";
  	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.reloadWithUrl').click(function(){
			$url = $(this).attr('href');
			window.location.href = $url;
			location.reload();
		});
	});
</script>
<!-- <script>
    $(document).ready(function(){
    	$('.shownoidung').on('click',function(){
	        var code = $('.code').val();
	        var date_created = '<?php echo strtotime(date('j-n-Y')) ?>';
	        var url = window.location.href;
	        if (code == '') {
	            alert('Quý vị vui lòng nhập mã xác nhận!');
	        }else{
	          	$.ajax({
	              	url: '<?php echo base_url(); ?>' + 'ajax-check-code',
	              	type:'POST',
	              	dataType: 'json',
	              	data:{
	                	code: code,date:date_created,url:url,
	              	},
	              	success:function(response){
		                if (response.check == true) {
		              		$('.content_nd').removeClass('hidden');
							$('.form-shownd').hide();
		                }else{
		                  	alert(response.mes);
		                }
	              	}
	          });
        }
        return false;
    	});
    });
</script> -->
