<section class="four-tool">
	<h1 class="title_l1">Xem bói sim theo kinh dịch</h1>
	<?php if (isset($text) && $text != null): ?>
		<div class="txt_top_bot">
			<?php echo $text; ?>
		</div>	
	<?php endif ?>

	<div class="outer_form">
		<div class="form_bg_thanhchi">
			<form action="<?php echo base_url('boi-sim-theo-kinh-dich.html'); ?>" method="post">
				<p class="titform">*Bạn hãy điền thông tin dưới đây</p>
				<?php if (isset($error)): ?>
					<?php echo $error ?>
				<?php endif ?>
				<input type="tel" name="sosim" class="input_thanhchi mar-bot" placeholder="Số điện thoại" value="<?php echo isset($sosim) ? $sosim : ''; ?>" required="">
				<div class="text-center">
					<button class="btn_thanhchi" type="submit">BÓI QUẺ DỊCH</button>
				</div>
			</form>
		</div>
	</div>


	<?php if (isset($submit) && $submit == 1): ?>
		<div class="bg_hoavando">
			<h2><span class="hidden-xs">Kết quả bói sim theo Kinh Dịch</h2>
		</div>
		<section class="main_4cc">
			<div class="mucluc_4cc">
				<p class="txt_ml">Mục lục</p>
				<div><a href="<?php echo current_url(); ?>#quechu">1. Quẻ chủ <?php echo $luanquechu['ten']; ?></a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#quechu_loaique">1.1. Loại quẻ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#quechu_phantich">1.2. Phân tích quẻ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#quechu_thoantu" class="padd-l">-  Thoán từ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#quechu_thoantruyen" class="padd-l">-  Thoán truyện, thoán viết</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#quechu_soluoc">1.3. Sơ lược từng hào của quẻ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#quechu_ynghia">1.4. Ý nghĩa quẻ</a></div>
				<p class="padd-l"><a href="<?php echo current_url(); ?>#quechu_totchoviec">1.5. Quẻ tốt cho việc gì?</a></p>

				<div><a href="<?php echo current_url(); ?>#queho">2. Quẻ hỗ <?php echo $luanqueho['ten']; ?></a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#queho_phantich">2.1. Phân tích quẻ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#queho_thoantu" class="padd-l">-  Thoán từ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#queho_thoantruyen" class="padd-l">-  Thoán truyện, thoán viết</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#queho_soluoc">2.2. Sơ lược từng hào của quẻ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#queho_ynghia">2.3. Ý nghĩa quẻ</a></div>
				<div class="padd-l"><a href="<?php echo current_url(); ?>#queho_totchoviec">2.4. Quẻ tốt cho việc gì?</a></div>
				
			</div>
			
			<!-- 1 -->
			<div class="row distance_top">
				<div class="div_tit clearfix">
					<div class="col-md-6 col-sm-12">
						<div class="bg_vienvang" id="quechu">
							1. Quẻ chủ
						</div>
					</div>
				</div>
			</div>
			<div class="body_box">
				<p class="txt_tenquechu">
					<?php echo $luanquechu['ten']; ?><span class="txt_nghiatenque"><?php echo '. '.$luanquechu['nghia_tenque']; ?></span>
				</p>
				<p class="bf_sun" id="quechu_loaique">Thuộc loại: Quẻ <?php echo $luanquechu['loai'] == 'Tốt' ? 'Cát' : 'Hung'; ?></p>
				<div class="row">
					<div class="col-md-8 col-md-offset-4 col-xs-12 text-center clearfix" style="display: flex;">
						<div class="div_anhque fl_l">
							<img src="<?php echo base_url(); ?>templates/site/images/que/<?php echo $luanquechu['queso'].'.gif'; ?>" alt="<?php echo $luanquechu['slugten'] ?>">
						</div>
						<div class="txt_anhque">
							<p><b><?php echo $luanquechu['ngoai']; ?> Ngoại</b></p>
							<p><i><?php echo 'Lời đoán: '.$luanquechu['nghia_ngoai']; ?></i></p>
							<p><b><?php echo $luanquechu['noi']; ?> Nội</b></p>
							<p><i><?php echo $luanquechu['nghia_noi']; ?></i></p>
						</div>
					</div>
				</div>

				<p class="bf_sun">Phân tích toàn quẻ <?php echo $luanquechu['ten']; ?></p>
				<div>
	                <p id="quechu_thoantu" class="limit"><b><i>*Thoán từ</i></b></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanquechu['phantich_thoantu']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
	            <div>
	                <p id="quechu_thoantruyen"><b><i>*Thoán truyện. Thoán viết</i></b></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanquechu['phantich_thoantruyen']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
	            <div>
	                <p class="bf_sun" id="quechu_soluoc">Sơ lược từng hào quẻ <?php echo $luanquechu['ten']; ?></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanquechu['soluoc']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
				<div>
	                <p class="bf_sun" id="quechu_ynghia">Ý nghĩa quẻ <?php echo $luanquechu['ten']; ?></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanquechu['ynghia']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
				<div>
	                <p class="bf_sun" id="quechu_totchoviec">Quẻ <?php echo $luanquechu['ten']; ?> tốt cho việc gì?</p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanquechu['totchoviec']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
			</div>
			
			<!-- 2 -->
			<div class="row distance_top">
				<div class="div_tit clearfix">
					<div class="col-md-9 col-sm-12">
						<div class="bg_vienvang" id="queho">
							2. Quẻ hỗ
						</div>
					</div>
				</div>
			</div>
			<div class="body_box">
				<p class="bf_sun">Phân tích toàn quẻ <?php echo $luanqueho['ten']; ?></p>
				<div>
	                <p id="queho_thoantu"><b><i>*Thoán từ</i></b></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanqueho['phantich_thoantu']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
	            <div>
	                <p id="queho_thoantruyen"><b><i>*Thoán truyện. Thoán viết</i></b></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanqueho['phantich_thoantruyen']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
				<div>
					<p class="bf_sun" id="queho_soluoc">Sơ lược từng hào quẻ <?php echo $luanqueho['ten']; ?></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanqueho['soluoc']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
				<div>
	                <p class="bf_sun" id="queho_ynghia">Ý nghĩa quẻ <?php echo $luanqueho['ten']; ?></p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanqueho['ynghia']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
				<div>
	                <p class="bf_sun" id="queho_totchoviec">Quẻ <?php echo $luanqueho['ten']; ?> tốt cho việc gì?</p>
					<div class="ndung_luan box_limit enable_limit">
						<?php echo $luanqueho['totchoviec']; ?>
					</div>
					<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
						<div class="lbl_view">Hiển thị thêm nội dung</div><br>
		                <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
		            </button>
	            </div>
			</div>
			<!-- ketluan -->
			<div class="div_last_ketluan">
				<div class="row outer_flex">
					<div class="col-md-4 col-xs-12">
						<div class="row">
							<div class="col-xs-12">
								<div class="div_img hidden_mobile">
									<img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/img_thayboikinhdich.jpg" alt="boi-sim-kinh-dich">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="div_right_ketluan">
							<p class="titloikhuyen">
								Kết luận quẻ dịch
							</p>
							<p class="right_luangian">
								- Dãy sim có quẻ chủ là <?php echo $luanquechu['ten']; ?>, quẻ hỗ là <?php echo $luanqueho['ten']; ?> trong đó quẻ chủ có vai trò quan trọng tác động đến cát hung của dãy sim.
							</p>
							<div class="right_luangian" style="margin-top: 10px">
								- Để xem sim phong thủy cần kết hợp đầy đủ 5 yếu tố: Âm dương tương phối, Ngũ hành - tứ trụ, Cửu tinh đồ pháp, Hành quẻ kinh dịch và Quan niệm dân gian mới có được kết quả chính xác nhất.
							</div>
							<div class="right_luangian" style="margin-top: 10px">
								- Sử dụng công cụ xem phong thủy sim dưới đây để biết dãy sim <?php echo $sosim ?> có tốt với công danh sự nghiệp, gia đạo hay công việc làm ăn của bạn hay không?
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>
	<section class="bot_4cc">
		<div class="div_img">
			<a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>">
		        <img style="width: 120px" src="<?php echo base_url();?>templates/site/images/4ccxemPTS/trangaytaiday.gif" alt="<?php echo current_url(); ?>" />
		      </a>
		</div>

		<?php if (isset($submit) && $submit == 1): ?>
			<?php $this->load->view('site/import/form_xemboisodienthoai'); ?>
		<?php endif ?>
		
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="div_box">
					<p class="title_l2">Các công cụ khác</p>
						<ul class="my_ul">
				            <li class="clearfix">
				              <a href="<?php echo base_url('xem-boi-so-dien-thoai.html') ?>">
				                <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simhoptuoi.png" alt="cong-cu-sim-hop-tuoi"></div>
				                <span class="li_text">Xem bói SĐT bạn đang dùng</span>
				              </a>
				            </li>
				            <li class="clearfix">
				              <a href="<?php echo base_url('xem-sim-hop-menh-A864.html') ?>">
				                <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simdangdung.png" alt="cong-cu-xem-boi-sim-dang-dung"></div>
				                <span class="li_text">Xem phong thủy sim hợp mệnh</span>
				              </a>
				            </li>
				            <li class="clearfix">
				              <a href="<?php echo base_url('xem-sim-so-dien-thoai-hop-tuoi.html') ?>">
				                <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simkinhdich.png" alt="cong-cu-boi-sim-kinh-dich"></div>
				                <span class="li_text">Xem phong thủy sim hợp tuổi</span>
				              </a>
				            </li>
				            <li class="clearfix">
				              <a href="<?php echo base_url('boi-sim-theo-kinh-dich.html') ?>">
				                <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simhopmenh.png" alt="cong-cu-sim-hop-menh"></div>
				                <span class="li_text">Xem bói sim theo Kinh Dịch</span>
				              </a>
				            </li>
				            <li class="clearfix">
				              <a href="<?php echo base_url('xem-boi-bien-so-xe.html') ?>">
				                <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_boibiensoxe.png" alt="cong-cu-boi-bien-so-xe"></div>
				                <span class="li_text">Xem bói biển số xe hung cát</span>
				              </a>
				            </li>
			          </ul>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="div_box">
					<p class="title_l2">Tin tức sim phong thủy</p>
					<ul class="my_ul">
						<li class="clearfix">
							<a href="<?php echo base_url('sim-phong-thuy.html');?>">
								<div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv1.jpg" alt="cong-cu-sim-hop-menh"></div>
								<div class="li_text">Sim phong thủy là gì?</div>
							</a>
						</li>
						<li class="clearfix">
							<a href="<?php echo base_url('cach-tinh-sim-dai-cat-la-gi-A1027.html'); ?>">
								<div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv2.jpg" alt="cong-cu-sim-hop-menh"></div>
								<span class="li_text">Sim Đại Cát - Luận Hung Cát SĐT</span>
							</a>
						</li>
						<li class="clearfix">
							<a href="<?php echo base_url('cach-chon-sim-so-dep-hop-tuoi-lam-an-theo-phong-thuy-A1071.html'); ?>">
								<div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv3.jpg" alt="cong-cu-sim-hop-menh"></div>
								<span class="li_text">Cách tìm SĐT hợp làm ăn</span>
							</a>
						</li>
						<li class="clearfix">
							<a href="<?php echo base_url('chon-so-hop-tuoi.html');?>">
								<div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv4.jpg" alt="cong-cu-sim-hop-menh"></div>
								<span class="li_text">Xem số hợp tuổi</span>
							</a>
						</li>
						<li class="clearfix">
							<a href="<?php echo base_url('con-so-may-man-theo-tuoi-cua-12-con-giap-A1092.html'); ?>">
								<div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv5.jpg" alt="cong-cu-sim-hop-menh"></div>
								<span class="li_text">Xem bói con số may mắn hợp tuổi</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<?php if (isset($text_foot) && $text_foot != null): ?>
		<div class="txt_top_bot">
			<?php echo $text_foot; ?>
		</div>	
	<?php endif ?>
	
</section>