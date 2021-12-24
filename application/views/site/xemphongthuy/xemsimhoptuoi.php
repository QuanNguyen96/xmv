<section class="four-tool">
	<h1 class="title_l1">Xem phong thủy sim hợp tuổi</h1>

	<div class="outer_form">
		<div class="form_bg_hoadao">
			<?php $this->load->view('site/import/form_xemsimhoptuoi'); ?>
		</div>
	</div>
	
	<?php if (isset($text) && $text != null): ?>
		<div class="txt_top_bot">
			<?php echo $text; ?>
		</div>
	<?php endif ?>
	
	<?php if(isset($submit)): ?>
		<div class="bg_hoavando">
			<p class="hidden_mobile">Kết quả xem số điện thoại <?php echo $sosim; ?> có hợp tuổi không</p>
			<p class="hidden_destop">Luận số <?php echo $sosim; ?> hợp tuổi không</p>
		</div>
		<section class="main_4cc">
			<div class="mucluc_4cc">
				<?php if(isset($laythongtinthanchu)) :?>
					<p class="txt_ml">Thông tin thân chủ</p>
					<p>
						<b>Ngày tháng năm sinh, giờ sinh: </b><i><?php echo $ngaysinh.'/'.$thangsinh.'/'.$namsinh.' - '.$giosinh; ?></i>
					</p>
					<p>
						<b>Mệnh ngũ hành: </b><i><?php echo $lucthap['he'].' - '.$lucthap['nghiahan'].' '.$lucthap['he']; ?></i>
					</p>
				<?php endif; ?>
				<p class="txt_ml">Mục lục</p>
		        <p>
		          <a href="<?php echo current_url(); ?>#luannguhanhsinhkhac">1. Luận ngũ hành sinh khắc</a>
		        </p>
		        <p class="padd-l">
		          <a href="<?php echo current_url(); ?>#tinhnguhanhthanchu">1.1 Tính ngũ hành thân chủ</a>
		        </p>
		        <p class="padd-l">
		          <a href="<?php echo current_url(); ?>#tinhnguhanhdaysim">1.2 Tính ngũ hành dãy sim</a>
		        </p>
		        <p>
		          <a href="<?php echo current_url(); ?>#luanamduongtuongphoi">2. Luận âm dương tương phối</a>
		        </p>
		        <p class="padd-l">
		          <a href="<?php echo current_url(); ?>#tinhamduongcuabanmenh">2.1 Tính âm dương của bản mệnh</a>
		        </p>
		        <p class="padd-l">
		          <a href="<?php echo current_url(); ?>#tinhamduongcuadayso">2.2 Tính âm dương của dãy số</a>
		        </p>
		        <p>
		          <a href="<?php echo current_url(); ?>#luantutrumenh">3. Luận tứ trụ mệnh</a>
		        </p>
		        <p class="padd-l">
		          <a href="<?php echo current_url(); ?>#nguhanhdayso">3.1 Ngũ hành dãy số</a>
		        </p>
		        <p class="padd-l">
		          <a href="<?php echo current_url(); ?>#tutrumenhthanchu">3.2 Tứ trụ mệnh thân chủ</a>
		        </p>
			</div>
			
			<!-- 1 -->
			<div class="row distance_top">
				<div class="div_tit clearfix">
					<div class="col-md-9 col-sm-12">
						<div class="bg_vienvang" id="luannguhanhsinhkhac">
							1. Luận ngũ hành<span class="hidden-xs"> sinh khắc</span>
						</div>
					</div>
				</div>
			</div>
			<div class="body_box">
				<p><b id="tinhnguhanhthanchu">1.1. Tính ngũ hành thân chủ</b></p>
				<p>
					- Thân chủ sinh năm <?php echo $info_user['nam_sinh'] ?> nhằm năm <?php echo $info_user['namcanchi']; ?> có ngũ hành bản mệnh là <?php echo $lucthap['nghiahan'].' '.$lucthap['he']; ?><br/>

					- <?php echo $luannguhanh; ?>
				</p>
				<p><b id="tinhnguhanhdaysim">1.2. Tính ngũ hành dãy sim</b></p>
				<p>
					- Phương pháp tính ngũ hành dãy số điện thoại hết sức phức tạp đòi hỏi người có chuyên môn cao, am hiểu và ứng dụng được thiên can địa chi, ngũ hành và sự chuyển động được các cặp số để đảm bảo kết quả tốt nhất. Ở đây, chúng tôi xin đưa ra cách tổng quát nhất!<br/>
					- Số điện thoại : <?php echo $sosim; ?> được tạo bởi các cặp số như sau: 
						<?php foreach ($arr_capso as $key => $value): ?>
							<?php echo $value.', '; ?>
						<?php endforeach ?><br/>
					- Quy đổi thiên can địa chi của các cặp số có được kết quả sau:
				</p>

				<table class="tbl_bg1">
					<thead>
						<tr>
							<th>Thiên can, địa chi</th>
							<th>Ngũ hành</th>
							<th>Tính chất quyết định(&percnt;)</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($arr_capso_nguhanh as $key => $value): ?>
							<tr>
								<td>
									<?php 
									if (empty($value['can']) && empty($value['chi']))
										{
											echo '-';
										}
									else{
										if (!empty($value['can'])){
											$arr_can = array_unique($value['can']);
											foreach ($arr_can as $k1 => $v1){
												echo get_can_menh((int)$v1).', ';
											}
										}
										if (!empty($value['chi'])){
											$arr_chi = array_unique($value['chi']);
											foreach ($arr_chi as $k2 => $v2){
												echo get_chi_menh((int)$v2).', ';
											}
										}
									}?>
								</td>
								<td><?php echo $key; ?></td>
								<td><?php echo $value['phantram']; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<div class="div_outdisplay">
					<div class="row outer_flex">
						<div class="col-md-4 col-xs-4">
							<div class="box_ketluananh">
								<p>KẾT LUẬN</p>
								<p class="txt_score"><?php echo $sinhkhac_thanchu_sim['diem']; ?> điểm</p>
							</div>
						</div>
						<div class="col-md-8 col-xs-8">
							<div class="box_right_ketluan box_right_ketluan_cuutinh">
								<div class="border_dott mar-bot-15">
									<p>
										Dãy sim <?php echo $sosim; ?> thuộc hành <b style="color: #9d1c20"><?php echo $nguhanhsim; ?></b>
									</p>
								</div>
								<div class="border_dott">
									<i>
										Ngũ hành dãy sim thuộc <?php echo $nguhanhsim; ?> <?php echo $sinhkhac_thanchu_sim['loai']; ?> với ngũ hành <?php echo $lucthap['he']; ?> của thân chủ &nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp; <?php echo $sinhkhac_thanchu_sim['ketluan']; ?>
									</i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- 2 -->
			<div class="row distance_top">
				<div class="div_tit clearfix">
					<div class="col-md-9 col-sm-12">
						<div class="bg_vienvang" id="luanamduongtuongphoi">
							2. Luận âm dương<span class="hidden-xs"> tương phối</span>
						</div>
					</div>
					
				</div>
			</div>
			<div class="body_box">
				<p>
					Trong phong thủy Học tính Âm Dương luôn đóng vai trò rất quan trọng, theo đó mọi vật được chia theo 2 thái cực Âm Dương tương phối bổ trợ lẫn nhau. Bất cứ mọi sự kết hợp nếu quá thiên âm hoặc thiên dương thì sẽ tạo nên sự mất cân bằng (không tốt). Ứng dụng thuyết âm dương tương phối vào xem phong thủy sim hợp mệnh cũng tuân theo quy luật này.
				</p>
				<p><b id="tinhamduongcuabanmenh">2.1. Tính âm dương của bản mệnh</b></p>
				<p>
					- Thân chủ sinh năm <?php echo $info_user['nam_sinh']; ?> nhằm năm <?php echo $nam_can." ".$nam_chi;?> thuộc tuổi <?php echo $lucthap['tinh'];?> <?php echo $gioitinh;?>
				</p>
				<p><b id="tinhamduongcuadayso">2.2. Tính âm dương của dãy số </b></p>
				<p>
					Khi luận âm dương tương phối của dãy sim <?php echo $sosim; ?> được kết quả sau<br/>
					- Tổng số mạng vận âm (<?php echo $daudayso_soluong['am']; ?> số):&nbsp;&nbsp;&nbsp;&nbsp;
					<?php foreach ($daudayso_soluong['mangam'] as $key => $value) {
						echo $value['txt'];
						if ( (int)$value['sluong']>1 ) {
							echo ' ('.$value['sluong'].' số), ';
						}else{
							echo ', ';
						}
					} ?>
					<br/>
					- Tổng số mang vận dương (<?php echo $daudayso_soluong['duong']; ?> số):&nbsp;&nbsp;&nbsp;&nbsp;
					<?php foreach ($daudayso_soluong['mangduong'] as $key => $value) {
						echo $value['txt'];
						if ( (int)$value['sluong']>1 ) {
							echo ' ('.$value['sluong'].' số), ';
						}else{
							echo ', ';
						}
					} ?>
				</p>
				<div class="div_outdisplay">
					<div class="row outer_flex">
						<div class="col-md-4 col-xs-4">
							<div class="box_ketluananh">
								<p>KẾT LUẬN</p>
								<p class="txt_score"><?php echo $amduong_thanchu_sim['diem']; ?> điểm</p>
							</div>
						</div>
						<div class="col-md-8 col-xs-8">
							<div class="box_right_ketluan box_right_ketluan_cuutinh">
								<div class="border_dott mar-bot-15">
									<p>
										Như vậy số mang vận <b style="color: #046c0c"><?php echo $daudayso_soluong['vuon']; ?></b>
									</p>
								</div>
								<div class="border_dott">
									<p>
										Dãy số mang vận <?php echo $daudayso_soluong['vuon']; ?> + Bản mệnh mang vận <?php echo $lucthap['tinh'];?> &nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp; Tạo ra hình thái <?php echo $amduong_thanchu_sim['loai'].' ('.$amduong_thanchu_sim['nxet'].')'; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- 3 -->
			<div class="row distance_top">
				<div class="div_tit clearfix">
					<div class="col-md-9 col-sm-12">
						<div class="bg_vienvang" id="luantutrumenh">
							3. Luận tứ trụ mệnh
						</div>
					</div>
				</div>
			</div>
			<div class="body_box">
				<p><b id="nguhanhdayso">3.1. Ngũ hành dãy số</b></p>
				<p>Dãy sim <?php echo $sosim; ?> thuộc hành <b style="color: #9d1c20"><?php echo $nguhanhsim; ?></b></p>
				<p><b id="tutrumenhthanchu">3.2. Tứ trụ mệnh thân chủ</b></p>
				<p>
					-Thân chủ sinh ngày <?php echo $info_user['ngay_sinh']."/".$info_user['thang_sinh']."/".$info_user['nam_sinh']; ?> nhằm ngày <?php echo $ngay['can']." ".$ngay['chi'] ?> tháng <?php echo $thang_can." ".$thang_chi; ?> năm <?php echo $nam_can." ".$nam_chi; ?><br/>
					- Phân tích can chi tàng ẩn của tứ trụ thân chủ ta có:
				</p>
				<table class="tbl_bg1">
					<thead>
						<tr>
							<th>Thiên can</th>
							<th>Tứ trụ mệnh</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($heTuTru_chitiet['mangcan'])): ?>
							<?php foreach ($heTuTru_chitiet['mangcan'] as $key => $value): ?>
								<tr>
									<td><?php echo $value['can_chi']; ?></td>
									<td><?php echo $value['menh']; ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
				<table class="tbl_bg1">
					<thead>
						<tr>
							<th>Địa chi</th>
							<th>Tứ trụ mệnh</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($heTuTru_chitiet['mangchi'])): ?>
							<?php foreach ($heTuTru_chitiet['mangchi'] as $key => $value): ?>
								<tr>
									<td><?php echo $value['can_chi']; ?></td>
									<td><?php echo $value['menh']; ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
				<p>
					- Khi phân tích ngũ hành của tứ trụ bản mệnh ta có<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Các hành vượng:<b>
										<?php foreach($heTuTru as $key=>$value){
                                       		if($value['loai']=="cao") echo $key." ";}?>
                                           		</b><br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Các hành suy: <b>
                    					<?php foreach($heTuTru as $key=>$value){
                                            	if($value['loai']=="thap")echo $key." ";
	                                            }?></b><br>
					<i>"Theo phong thủy nếu ngũ hành dãy số điện thoại đồng nhất với hành suy trong tứ trụ mệnh thân chủ sẽ có tác dụng bổ trợ, gia tăng thêm phần cát cho thân chủ. Nếu ngũ hành dãy số điện thoại đồng nhất với hành vượng trong tứ trụ mệnh thân chủ thì không có tác dụng bổ trợ, giúp đỡ cho thân chủ"</i>
				</p>
				<div class="div_outdisplay">
					<div class="row outer_flex">
						<div class="col-md-4 col-xs-4">
							<div class="box_ketluananh">
								<p>KẾT LUẬN</p>
								<p class="txt_score"><?php echo $ketluantutru['diem']; ?> điểm</p>
							</div>
						</div>
						<div class="col-md-8 col-xs-8">
							<div class="box_right_ketluan box_right_ketluan_cuutinh">
								<div class="border_dott">
									<span>
										Dãy sim <?php echo $sosim; ?> có ngũ hành <?php echo $nguhanhsim.' '.$ketluantutru['txt']; ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ketluan -->
			<div class="div_last_ketluan">
				<div class="row outer_flex">
					<div class="col-md-3 col-xs-12">
						<div class="row">
							<div class="col-xs-12">
								<div class="lastscore">
									Tổng điểm<br/><span><?php echo $sinhkhac_thanchu_sim['diem'] +  $amduong_thanchu_sim['diem'] + $ketluantutru['diem']; ?> điểm</span>
								</div>
							</div>
							<div class="col-xs-12 desktop_absolute">
								<div class="div_img_langnghe">
									<img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/langnghe.png" alt="lang nghe loi khuyen chuyen gia" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-xs-12">
						<div class="div_right_ketluan">
							<p class="titloikhuyen">
								Lời khuyên từ chuyên gia phong thủy
							</p>
							<p class="right_luangian">
								1. Phương pháp chấm điểm phong thủy sim số đẹp trên chỉ luận giải ý nghĩa của dãy số nên tổng điểm này không thể khẳng định dãy số điện thoại có hợp với bạn hay không.
							</p>
							<p class="right_luangian">
								2. Để xem sim phong thủy cần kết hợp đầy đủ 5 yếu tố: Âm dương tương phối, Ngũ hành - tứ trụ, Cửu tinh đồ pháp, Hành quẻ kinh dịch và Quan niệm dân gian mới có được kết quả chính xác nhất.
							</p>
							<div class="right_luangian">
								3. Sử dụng công cụ xem phong thủy sim dưới đây để biết dãy sim <?php echo $sosim ?> có tốt với công danh sự nghiệp, gia đạo hay công việc làm ăn của bạn hay không?
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
	<?php endif; ?>
	<section class="bot_4cc">
		<div class="div_img">
			<a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>">
		        <img style="width: 120px" src="<?php echo base_url();?>templates/site/images/4ccxemPTS/trangaytaiday.gif" alt="<?php echo current_url(); ?>" />
		      </a>
		</div>
		
		<?php if (isset($submit)): ?>
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