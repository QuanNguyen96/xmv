<?php
    $tuoivo = $tuoi['tuoivo'];
    $tuoichong = $tuoi['tuoichong'];
    $namsinhnam     = $send_input_tuoichong;
    $namsinhnu      = $send_input_tuoivo;
    $canchinam      = $al_tuoichong_show;
    $canchinu       = $al_tuoivo_show;
    $al_tuoichong   = $al_tuoichong;
    $al_tuoivo      = $al_tuoivo;
    $slugcanchinam  = $this->vnkey->format_key($al_tuoichong_show);
    $slugcanchinu   = $this->vnkey->format_key($al_tuoivo_show);
    $arr_input      = array(
        '$namsinhnam'    => $namsinhnam,
        '$namsinhnu'     => $namsinhnu,
        '$canchinam'     => $canchinam,
        '$canchinu'      => $canchinu,
        '$namsinhnam'    => $namsinhnam,
        '$slugcanchinam' => $slugcanchinam,
        '$slugcanchinu'  => $slugcanchinu,
    );
?>
<section>
	<div class="col-md-12">
	    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	        <?php echo $breadcrumb; ?>
	    <?php endif ?>
	</div>
	<div class="box-mobile">
		<h1 class="title-new-mobile"><?php echo $this->my_seolink->get_name(); ?></h1>
		<div class="box-mobile">
			<?php $this->load->view('site/adsen/code1'); ?>
		</div>
		<div class="text-justify">
			<section id="pageTextAuto">
				<?php echo $this->my_seolink->get_text(); ?>
			</section>
		</div>
		<div class="form-tool-mobile">
			<form name="search_tuoivochong" onsubmit="send_form(); return false;" action="" method="post">
				<div class="text-center">
					<p class="title-form-mobile">Thông tin xem tuổi vợ chồng</p>
					<p class="title-condition">Nhập thông tin theo ngày dương</p>
				</div>
				<div class="row">
					<div class="form-group clearfix">
						<div class="col-xs-6">
							<select name="tuoichong">
				                <option value="">Năm sinh chồng</option>
				                <?php
		                            for($i=1970 ; $i <= 2027 ; $i++){
		                            	 $slt = $i == 1992 ? 'selected=""' : '';
		                                echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
		                            }
		                        ?>
		                        <?php
		                            for($i=1947 ; $i <= 1969 ; $i++){
		                                echo '<option value="'.$i.'" >'.$i.'</option>';
		                            }
		                        ?>
				             </select>
						</div>
						<div class="col-xs-6">
							<select name="tuoivo">
				                <option value="">Năm sinh vợ</option>
				                <?php
		                            for($i=1970 ; $i <= 2027 ; $i++){
		                            	 $slt = $i == 1992 ? 'selected=""' : '';
		                                echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
		                            }
		                        ?>
		                        <?php
		                            for($i=1947 ; $i <= 1969 ; $i++){
		                                echo '<option value="'.$i.'" >'.$i.'</option>';
		                            }
		                        ?>
				             </select>
						</div>
					</div>
					<div class="form-group clearfix text-center">
						<button type="submit" name="">Xem kết quả</button>
					</div>
				</div>
			</form>
			<script type="text/javascript">
			    function send_form() {
			        var frm = document.search_tuoivochong;
			        var tuoichong   = frm.tuoichong.value;
			        var tuoivo  = frm.tuoivo.value;
			        window.location.href = "<?php echo base_url($this->uri->segment(1).'/');?>tuoi-chong-"+tuoichong+"-va-tuoi-vo-"+tuoivo+".html";
			    }
			</script>
		</div>
		<?php if ($submit == 1): ?>
			<section class="box-kq-mobile pageKqMb">
				<p class="title-kq-mobile">Kết quả</p>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-md-12">
							<p class="topKq">Thông tin chung về vợ tuổi 1990 và chồng 1990</p>
							<table class="table table-bordered tableVCMb">
								<tr>
									<th>Tiêu chí</th>
									<th>Thông tin <br>Tuổi chồng</th>
									<th style="text-align: left;background: #fceb9c;">Thông tin <br>Tuổi vợ</th>
								</tr>
								<tr>
									<td>Năm sinh <br>dương lịch</td>
									<td><?php echo $namsinhnam; ?></td>
									<td style="text-align: left;background: #fceb9c;"><?php echo $namsinhnu; ?></td>
								</tr>
								<tr>
									<td>Năm sinh <br>âm lịch</td>
									<td><?php echo get_chi_replace($canchinam); ?></td>
									<td style="text-align: left;background: #fceb9c;"><?php echo get_chi_replace($canchinu); ?></td>
								</tr>
								<tr>
									<td>Ngũ hành <br>bản mệnh</td>
									<td><?php echo $menh_tuoichong['nghiahan'].' '.$menh_tuoichong['he']?></td>
									<td style="text-align: left;background: #fceb9c;"><?php echo $menh_tuoivo['nghiahan'].' '.$menh_tuoivo['he']?></td>
								</tr>
								<tr>
									<td>Cung phi</td>
									<td><?php echo $cung_tuoichong['cung']?></td>
									<td style="text-align: left;background: #fceb9c;"><?php echo $cung_tuoivo['cung']?></td>
								</tr>
								<tr>
									<td>Ngũ hành <br>cung phi</td>
									<td><?php echo $cung_tuoichong['menh']?></td>
									<td style="text-align: left;background: #fceb9c;"><?php echo $cung_tuoivo['menh']?></td>
								</tr>
								<tr>
                                    <td colspan="3">
                                        <ul class="ul_anchor_tv2021">
                                            <li><a href="<?php echo base_url($dieu_huong_tv_2021_link_nam);?>"><?php echo $dieu_huong_tv_2021_text_nam;?></a></li>
                                            <li><a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>"><?php echo $dieu_huong_tv_2021_text_nu; ?></a></li>
                                        </ul>
                                    </td>
                                </tr>
							</table>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-md-12">
							<p class="topKq">Bình giải chồng tuổi ất sửu vợ tuổi đinh mão</p>
							<table class="table table-bordered tableVCMb">
								<tr>
									<th style="width: 25%;">Tiêu chí</th>
									<th>Bình giải</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>Ngũ hành <br>bản mệnh</td>
									<td>
										<?php
											$textMenh = get_text_by_scores($show_scores_menh, 2); 
											$idTextMenh = $this->vnkey->format_key($textMenh);
										?>
										<p class="khachop" id="<?php echo $idTextMenh; ?>">
											<?php echo $textMenh; ?>
										</p>
										<?php echo $show_menh_vochong; ?>
									</td>
									<td><?php echo $show_scores_menh; ?></td>
								</tr>
								<tr>
									<td>Thiên can</td>
									<td>
										<?php
											$textThiencan = get_text_by_scores($show_scores_thiencan, 2); 
											$idTextThiencan = $this->vnkey->format_key($textThiencan);
										?>
										<p class="khachop" id="<?php echo $idTextThiencan; ?>">
											<?php
												echo $textThiencan; 
											?>
										</p>
										<?php echo $show_thiencan_vochong; ?>
									</td>
									<td><?php echo $show_scores_thiencan; ?></td>
								</tr>
								<tr>
									<td>Địa chi</td>
									<td>
										<?php
											$textDiachi = get_text_by_scores($show_scores_diachi, 2); 
											$idTextDiachi = $this->vnkey->format_key($textDiachi);
										?>
										<p class="khachop" id="<?php echo $idTextDiachi; ?>">
											<?php
												echo $textDiachi; 
											?>
										</p>
										<?php echo $show_diachi_vochong; ?>
									</td>
									<td><?php echo $show_scores_diachi; ?></td>
								</tr>
								<tr>
									<td>Cung phi</td>
									<td>
										<?php
											$textCungkham = get_text_by_scores($show_scores_cungkham, 2); 
											$idTextCungkham = $this->vnkey->format_key($textCungkham);
										?>
										<p class="khachop" id="<?php echo $idTextCungkham; ?>">
											<?php
												echo $textCungkham; 
											?>
										</p>
										<?php echo $show_cungkham_vochong; ?>
									</td>
									<td><?php echo $show_scores_cungkham; ?></td>
								</tr>
								<tr>
									<td>Ngũ hành<br>cung phi</td>
									<td>
										<?php
											$textThienmenh = get_text_by_scores($show_scores_thienmenh, 2); 
											$idTextThienmenh = $this->vnkey->format_key($textThienmenh);
										?>
										<p class="khachop" id="<?php echo $idTextThienmenh; ?>">
											<?php
												echo $textThienmenh; 
											?>
										</p>
										<?php echo $show_thienmenh_vochong; ?>
									</td>
									<td><?php echo $show_scores_thienmenh; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="box-info-mobile tongdoan">
					<div class="row">
						<div class="col-md-12">
							<p class="totalFastMb">Tổng Điểm <?php echo $total_scores; ?>/10</p>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Nhận xét</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right info_right_tongquat">
								<section>
									<?php echo replace_page_text($total_content,$arr_input); ?>
								</section>
							</div>
						</div>
					</div>
				</div>

				<div class="box-info-mobile boxListArtVCMb" id="pageTextAuto">
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
						</div>
						<div class="col-xs-10">
							<p>
								<a href="<?php echo base_url('phuong-phap-hoa-giai-xung-khac-vo-chong-hon-nhan-A630.html'); ?>" style="font-weight: bold;">Khám phá phương pháp hóa giải xung khắc của chồng <?php echo $namsinhnam; ?> vợ <?php echo $namsinhnu; ?></a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
						</div>
						<div class="col-xs-10">
							<p>
								<a href="<?php echo base_url('xem-tuoi-sinh-con/sinh-con-'.date('Y').'-hop-tuoi-bo-me-khong.html'); ?>" style="font-weight: bold;">Bố tuổi <?php echo $namsinhnam; ?> mẹ tuổi <?php echo $namsinhnu; ?> sinh con năm <?php echo date('Y'); ?> tốt hay xấu?</a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
						</div>
						<div class="col-xs-10">
							<p>
								<a href="<?php echo base_url('xem-tuoi-sinh-con/sinh-con-'.(date('Y')+1).'-hop-tuoi-bo-me-khong.html'); ?>" style="font-weight: bold;">Bố tuổi <?php echo $namsinhnam; ?> mẹ tuổi <?php echo $namsinhnu; ?> sinh con năm <?php echo (date('Y')+1); ?> tốt hay xấu?</a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
						</div>
						<div class="col-xs-10">
							<p>
								<a href="<?php echo $dieu_huong_tv_2021_link_nam; ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2021_text_nam; ?></a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
						</div>
						<div class="col-xs-10">
							<p>
								<a href="<?php echo $dieu_huong_tv_2021_link_nu; ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2021_text_nu; ?></a>
							</p>
						</div>
					</div>

                    <div class="row">
                        <div class="col-xs-2">
                            <div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
                        </div>
                        <div class="col-xs-10">
                            <p>
                                <a href="<?php echo $dieu_huong_tv_2022_link_nam; ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2022_text_nam; ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/anh-ben-trai-vo-chong.png"></div>
                        </div>
                        <div class="col-xs-10">
                            <p>
                                <a href="<?php echo $dieu_huong_tv_2022_link_nu; ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2022_text_nu; ?></a>
                            </p>
                        </div>
                    </div>
				</div>

				<!-- boxdieuhuong 8cc xemngaytheotuoi [vochong] -->
                    <?php 
                        $canchislug_nam = list_age_text((int)$namsinhnam);
                        $canchislug_nu =  list_age_text((int)$namsinhnu);
                     ?>
                    <div class="box-info-mobile">
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
								<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
									<div class="lbl_view">Hiển thị thêm</div><br>
						            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
						        </button>
                            </div>
                        </div>
                        <br>
                        <div class="bg_vienvang_full">
                        	<div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnu ?></div>

                        	<div class="ul_list ul_list_sao" id="ul_list_sao">
                            	<div class="text-justify box_limit enable_limit">
                            		<ul class="ul">
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Xuất Hành hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-khai-truong-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Khai Trương hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-mua-xe-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Mua Xe hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Cưới Hỏi hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-mua-nha-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Mua Nhà hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-dong-tho-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Động Thổ hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                                <li>
		                                    <a href="<?php echo base_url('xem-ngay-tot-nhap-trach-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Nhập Trạch hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
		                                </li>
		                            </ul>
								</div>
								<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
									<div class="lbl_view">Hiển thị thêm</div><br>
						            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
						        </button>
                            </div>
                        </div>
                    </div>
                <!-- end boxdieuhuong 8cc xemngaytheotuoi [vochong] -->

				<div class="box-info-mobile" style="margin: 0px;">
					<?php $this->load->view('site/import/frame_xemtuoivochong_mb'); ?>
				</div>
				<div class="box-info-mobile" style="margin: 0px;">
					<?php $this->load->view('site/import/frame_xemtuoilaman_mb'); ?>
				</div>
				<div class="box-info-mobile" style="margin: 0px;">
					<?php $this->load->view('site/import/frame_xemboingaythangnamsinh_mb'); ?>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-md-12">
							<p class="topKq">* Ngoài ra, chồng tuổi <?php echo $namsinhnam; ?> nên xem thêm:</p>
						</div>
					</div>
				</div>
				<div class="box-info-mobile boxListArtVCMb" id="pageTextAuto">
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>" style="font-weight: bold;">Bói tình yêu qua ngày tháng năm sinh</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" style="font-weight: bold;">Lá số tử vi tuổi <?php echo $namsinhnam; ?> có bình giải chi tiết</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slugcanchinam.'-sinh-nam-'.$namsinhnam.'-hop-lam-an-voi-tuoi-nao.html'); ?>" style="font-weight: bold;">Xem tuổi <?php echo $namsinhnam; ?> hợp làm ăn với tuổi nào</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>" style="font-weight: bold;">Bói ngày hôm nay tốt hay xấu với tuổi <?php echo $namsinhnam; ?></a></p>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-md-12">
							<p class="topKq">* Vợ tuổi <?php echo $namsinhnu; ?> nên xem thêm:</p>
						</div>
					</div>
				</div>
				<div class="box-info-mobile boxListArtVCMb" id="pageTextAuto">
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>" style="font-weight: bold;">Bói bài tình yêu cho tuổi <?php echo $namsinhnu; ?></a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>" style="font-weight: bold;">Xem bói nốt ruồi tài lộc</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slugcanchinu.'-sinh-nam-'.$namsinhnu.'-hop-lam-an-voi-tuoi-nao.html'); ?>" style="font-weight: bold;">Xem tuổi <?php echo $namsinhnu; ?> hợp làm ăn với tuổi nào</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="imagemb"><img src="<?php echo base_url(); ?>templates/site/images/icon/trontron.png"></div>
						</div>
						<div class="col-xs-10">
							<p><a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>" style="font-weight: bold;">Xem tên của bạn có ý nghĩa gì</a></p>
						</div>
					</div>
				</div>
				<!-- Load box question -->
				<?php $this->load->view('site/import/box_question_mobile'); ?>
				<!-- end -->
			</section>
		<?php endif; ?>
		
		<div class="text-justify">
			<?php echo $this->my_seolink->get_text_foot(); ?>
		</div>
		<div class="box-mobile">
			<?php $this->load->view('site/import/frame_tuvi2018_mb'); ?>
		</div>
		<div class="box-mobile">
			<?php $this->load->view('site/import/frame_tuvihangngay_mb'); ?>
		</div>
		<section>
			<?php if ($getComment): ?>
              	<?php echo $getComment; ?>
          	<?php endif ?>
		</section>
		<section>
			<?php $this->load->view('site/sh_comment/get_by_theme'); ?>
		</section>
	</div>
</section>