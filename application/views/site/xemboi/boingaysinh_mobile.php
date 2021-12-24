<?php 
    $html_xemboiSDT      = $this->load->view('site/import/rep_xemboiSDT', '', true);
    $html_ynghiaso       = $this->load->view('site/import/rep_ynghiaso', '', true);
    $html_sohoptuoi      = $this->load->view('site/import/rep_sohoptuoi', '', true);
    $html_sohopmenh      = $this->load->view('site/import/rep_sohopmenh', '', true);
    $arr_search  = array('$rep_xemboiSDT', '$rep_ynghiaso', '$rep_sohoptuoi', '$rep_sohopmenh');
    $arr_replace = array($html_xemboiSDT, $html_ynghiaso, $html_sohoptuoi, $html_sohopmenh);
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
		<?php if (!$_POST): ?>
			<div class="text-justify">
				<section id="pageTextAuto">
					<?php $text =  $this->my_seolink->get_text();
		                echo str_replace($arr_search,$arr_replace, $text);
		             ?>
				</section>
			</div>
		<?php endif ?>
		
		<div class="form-tool-mobile">
			<form name="xemBoiNgaySinh" action="/xem-boi-ngay-sinh.html" method="POST">
				<div class="text-center">
					<p class="title-form-mobile">Thông tin xem bói ngày sinh</p>
					<p class="title-condition">Nhập thông tin theo ngày dương</p>
				</div>
				<div class="row">
					<div class="form-group clearfix">
						<div class="col-xs-4">
							<select name="ngay" class="myinput">
				                <option value="">Ngày sinh dương</option>
				                <?php 
				                    $ngay = isset($ngay) ? $ngay : 20;
				                    for( $i = 1; $i<= 31; $i++ ){
				                        $slt = $ngay == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
						<div class="col-xs-4">
							<select name="thang" class="myinput">
				                <option value="">Tháng sinh</option>
				                <?php 
				                    $thang = isset($thang) ? $thang : 10;
				                    for( $i = 1; $i<= 12; $i++ ){
				                        $slt = $thang == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
						<div class="col-xs-4">
							<select name="nam" class="myinput">
				                <option value="">Năm sinh</option>
				                <?php 
				                    $nam = isset($nam) ? $nam : 1995;
				                    for( $i = 1950; $i<= 2025; $i++ ){
				                        $slt = $nam == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
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
		</div>
		<?php if( isset($luan) && !empty($luan)): ?>
			<section class="box-kq-mobile pageKqMb">
				<p class="title-kq-mobile">Kết quả</p>
				<div class="dinh_dang_font">
					<p><b>Ngày sinh:</b> <?php echo $ngay; ?> tháng <?php echo $thang; ?> năm <?php echo $nam; ?></p>
					<p><b>Cung:</b> <?php echo $luan['cung'];?></p>
					<p><b>Số hên:</b> <?php echo $luan['sohen'];?></p>
					<p><b>Nguyên tố:</b> <?php echo $luan['nguyento'];?></p>
					<p><b>Phẩm chất:</b> <?php echo $luan['phamchat'];?></p>
					<p><b>Tính chất:</b> <?php echo $luan['tinhchat'];?></p>
					<p><b>Tính cách điển hình:</b> <?php echo $luan['tinhcachdienhinh'];?></p>
					<p><b>Bất lợi:</b> <?php echo $luan['batloi'];?></p>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Tính cách</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<section class="contentMini">
									<?php echo $luan['tinhcach'];?>
								</section>
								<p class="viewShow viewmore" data-view="on"><span>Xem thêm mô tả</span><br><label class="imageButton"></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Tình yêu</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<section class="contentMini">
									<?php echo $luan['tinhyeu'];?>
								</section>
								<p class="viewShow viewmore" data-view="on"><span>Xem thêm mô tả</span><br><label class="imageButton"></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Sức khỏe</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<section class="contentMini">
									<?php echo $luan['suckhoe'];?>
								</section>
								<p class="viewShow viewmore" data-view="on"><span>Xem thêm mô tả</span><br><label class="imageButton"></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Gia đình</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<section class="contentMini">
									<?php echo $luan['giadinh'];?>
								</section>
								<p class="viewShow viewmore" data-view="on"><span>Xem thêm mô tả</span><br><label class="imageButton"></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Sự nghiệp</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<section class="contentMini">
									<?php echo $luan['sunghiep'];?>
								</section>
								<p class="viewShow viewmore" data-view="on"><span>Xem thêm mô tả</span><br><label class="imageButton"></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-info-mobile tongdoan">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Tổng quát</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right info_right_tongquat">
								<section class="contentMini">
									<?php echo $luan['tongquat'];?>
								</section>
								<p class="viewShow viewmore" data-view="on"><span style="color: #c37954;">Xem thêm mô tả</span><br><label class="imageButton"></label></p>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		
		<?php if( isset($luan) && !empty($luan)): ?>
		   <div class="box-mobile">
	            <div class="showInternalLink">
	            	<section class="cpnInternalLink">
	            		<a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html');?>" class="cst">Xem bói năm 2020</a>
	            		<a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>" class="cst">Xem bói sim</a>
	            	</section>
	            </div>
	        </div>
	    <?php endif; ?>
	    <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
		<?php if(isset($dieu_huong_tv_2020_link_nam)): ?>
          <div class="md-12"> 
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
         <?php endif; ?>
		
		<div class="box-mobile">
			<h3 class="title-new-mobile">Công cụ xem bói hợp tuổi quý bạn</h3>
			<div class="row">
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
						<a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
							<p>Xem tử vi trọn đời</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-vo-chong.jpg'); ?>" alt="">
							<p>Xem tuổi vợ chồng</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ten.jpg'); ?>" alt="">
							<p>Xem bói theo tên</p>
						</a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-tuoi-ket-hon.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-ket-hon.jpg'); ?>" alt="">
							<p>Xem tuổi kết hôn</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-sinh-con.jpg'); ?>" alt="">
							<p>Xem tuổi sinh con</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php if ($_POST): ?>
			<div class="text-justify">
				<section id="pageTextAuto">
					<?php 
		                echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text());
		             ?>
				</section>
			</div>
		<?php endif ?>
		<section>
			<?php if ($getComment): ?>
              	<?php echo $getComment; ?>
          	<?php endif ?>
		</section>
	</div>
</section>