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
				<?php echo $this->my_seolink->get_text(); ?>
			</div>
		<?php endif ?>
		<div class="form-tool-mobile">
			<form action="" method="POST">
				<div class="text-center">
					<p class="title-form-mobile">Thông tin xem bói tình yêu</p>
					<p class="title-condition">Nhập thông tin theo ngày dương</p>
				</div>
				<div class="row">
					<div class="form-group clearfix">
						<div class="col-xs-12">
							<input type="text" name="tentrai" value="" placeholder="Nhập tên bạn nam">
						</div>
					</div>
					<div class="form-group clearfix">
						<div class="col-xs-4">
							<select name="ngaysinhtrai">
				                <option value="">Ngày sinh dương</option>
				                <?php 
				                    for( $i = 1; $i<= 31; $i++ ){
				                        $slt = isset($ngay) == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
						<div class="col-xs-4">
							<select name="thangsinhtrai">
				                <option value="">Tháng sinh</option>
				                <?php 
				                    for( $i = 1; $i<= 12; $i++ ){
				                        $slt = isset($thang) == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
						<div class="col-xs-4">
							<select name="namsinhtrai">
				                <option value="">Năm sinh</option>
				                <?php 
				                    for( $i = 1950; $i<= 2025; $i++ ){
				                        // $slt = $nam == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" >'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
					</div>
					<div class="form-group clearfix">
						<div class="col-xs-12">
							<input type="text" name="tengai" value="" placeholder="Nhập tên bạn gái" />
						</div>
					</div>
					<div class="form-group clearfix">
						<div class="col-xs-4">
							<select name="ngaysinhgai">
				                <option value="">Ngày sinh dương</option>
				                <?php 
				                    for( $i = 1; $i<= 31; $i++ ){
				                        $slt = isset($ngay) == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
						<div class="col-xs-4">
							<select name="thangsinhgai">
				                <option value="">Tháng sinh</option>
				                <?php 
				                    for( $i = 1; $i<= 12; $i++ ){
				                        $slt = isset($thang) == $i ? 'selected=""' :'';
				                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
				                    }
				                 ?>
				             </select>
						</div>
						<div class="col-xs-4">
							<select name="namsinhgai">
				                <option value="">Năm sinh</option>
				                <?php 
				                    for( $i = 1950; $i<= 2025; $i++ ){
				                        // $slt = $nam == $i ? 'selected=""' :'';
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
		</div>
		<?php if (isset($content)): ?>
			<div class="box-kq-mobile">
				<p class="title-kq-mobile">Kết quả</p>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Nam giới</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<p><b>Họ và tên: </b> <?php echo $i_post['tentrai'] ?></p>
								<p><b>Ngày sinh: </b> <?php echo $i_post['ngaysinhtrai'].'-'.$i_post['thangsinhtrai'].'-'.$i_post['namsinhtrai']; ?></p>
								<p><b>Bản mệnh: </b><?php echo $info_chong['lucthap']['nghiahan'].' '.$info_chong['lucthap']['he']; ?> (<?php echo $info_chong['lucthap']['lucthap_giai'] ?>)</p>
							</div>
						</div>
					</div>
				</div>
				<div class="box-info-mobile">
					<div class="row">
						<div class="col-xs-1">
							<div class="male">Nữ giới</div>
						</div>
						<div class="col-xs-11">
							<div class="info-right">
								<p><b>Họ và tên: </b> <?php echo $i_post['tengai'] ?></p>
								<p><b>Ngày sinh: </b> <?php echo $i_post['ngaysinhgai'].'-'.$i_post['thangsinhgai'].'-'.$i_post['namsinhgai']; ?></p>
								<p><b>Bản mệnh: </b><?php echo $info_vo['lucthap']['nghiahan'].' '.$info_vo['lucthap']['he']; ?> (<?php echo $info_vo['lucthap']['lucthap_giai'] ?>)</p>
							</div>
						</div>
					</div>
				</div>
				<div class="text-justify" id="content_show">
					<?php $contentShow = $content; ?>
					<?php
						$contentShow = str_replace('<i style="color:#B76D10; font-weight:bold;">', '<div class="text-kluan">' , $contentShow);
						$contentShow = str_replace('</i>', '</div>', $contentShow); 
					?>
					<?php echo $contentShow; ?>
				</div>
				<div class="field">
               <div class="dieuhuong_tu_vi_2020">
            		<a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html');?>" class="nut_ban_repon">Xem bói tử vi năm 2020 Canh Tý</a>
            		<a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>" class="nut_ban_repon">Xem bói SĐT</a>
	            </div>
	          </div> 
              <?php if(isset($dieu_huong_tv_2020_link_nam)): ?>
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
               <?php endif; ?>
				<div class="clearfix">
					<?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
				</div>
				<style type="text/css">
					#content_show{  }
					#content_show table{ display: none; }
				</style>
				<div class="img-dieuhuong">
					<a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
						<img src="<?php echo base_url('templates/site/images/newmobile/2_xemboitinhyeu_banner1.jpg'); ?>" alt="">
					</a>
				</div>
				<div class="img-dieuhuong">
					<a href="<?php echo base_url('xem-tuoi-ket-hon.html'); ?>">
						<img src="<?php echo base_url('templates/site/images/newmobile/2_xemboitinhyeu_banner2.jpg'); ?>" alt="">
					</a>
				</div>
				<div class="img-dieuhuong">
					<a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">
						<img src="<?php echo base_url('templates/site/images/newmobile/2_xemboitinhyeu_banner3.jpg'); ?>" alt="">
					</a>
				</div>
			</div>
		<?php endif ?>
		<div class="box-mobile">
			<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
		</div>	
		<div class="box-mobile">
			<h3 class="title-new-mobile">Công cụ xem bói hợp tuổi</h3>
			<div class="row">
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
							<p>Bói bài hàng ngày</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-mau-hop-menh.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/mau-hop-menh.jpg'); ?>" alt="">
							<p>Xem màu hợp mệnh</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/boi-bai-tinh-yeu.jpg'); ?>" alt="">
							<p>Bói bài tình yêu</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/la-so-tu-vi.jpg'); ?>" alt="">
							<p>Lá số tử vi</p>
						</a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
							<p>Xem bói ngày sinh</p>
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="text-center">
						<a href="<?php echo base_url('xem-mau-hop-menh.html'); ?>">
							<img src="<?php echo base_url('templates/site/images/anhdaidien/mau-hop-menh.jpg'); ?>" alt="">
							<p>Tử vi trọn đời</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php if ($_POST): ?>
			<div class="text-justify">
				<?php echo $this->my_seolink->get_text(); ?>
			</div>
		<?php endif ?>
		<section>
			<?php if ($getComment): ?>
              	<?php echo $getComment; ?>
          	<?php endif ?>
		</section>
		
	</div>
</section>