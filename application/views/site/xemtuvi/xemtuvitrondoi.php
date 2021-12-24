<?php 
    $html_xemboiSDT      = $this->load->view('site/import/rep_xemboiSDT', '', true);
    $html_ynghiaso       = $this->load->view('site/import/rep_ynghiaso', '', true);
    $html_sohoptuoi      = $this->load->view('site/import/rep_sohoptuoi', '', true);
    $html_sohopmenh      = $this->load->view('site/import/rep_sohopmenh', '', true);
    $arr_search  = array('$rep_xemboiSDT', '$rep_ynghiaso', '$rep_sohoptuoi', '$rep_sohopmenh');
    $arr_replace = array($html_xemboiSDT, $html_ynghiaso, $html_sohoptuoi, $html_sohopmenh);
 ?>
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content">
	<h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
	<?php $this->load->view('site/adsen/code1');?>
	<div class="field">
	  	<div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?></div>
	</div>
	<div class="text-center">
		<p><i>Quý bạn hãy nhập đầy đủ thông tin để nhận được kết quả tốt nhất</i></p>
	</div>
	<div class="box_xvm clearfix text-center">
		<?php
			$iCanchiSlug = isset($iCanchiSlug)?$iCanchiSlug:'canh-ngo'; 
		?>
		<form action="" method="POST" name="form_tuvi">
			<div class="col-md-5">
				<select name="namsinh_tv" id="namsinh_tv">
					<?php foreach (list_age_text() as $key => $value): ?>
						<?php $selected = $iCanchiSlug==$key?'selected=""':''; ?>
							<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-md-4">
				<select name="giotinh" id="gioitinh_tv" required="">
					<?php if (isset($gioitinh) && $gioitinh == 'nu') {
						$slt = 'selected=""';
					} ?>
					<option value="nam">Nam</option>
					<option value="nu" <?php if (isset($slt)) {
						echo $slt;
					} ?>>Nữ</option>
				</select>
			</div>
			<div class="col-md-3">
				<button type="submit" id="submit_tv" value="submit">Xem ngay</button>
			</div>
		</form>
	</div>
</div>
<article class="row detailArticle box_xvm clearfix">
	<?php if (isset($content) && !empty($content)): ?>
		<div class="col-md-12 show_tv">
			<?php if ($gioitinh == 'nam'):?>
				<?php 
					$text_s = "Nữ";
					echo $content['content_nam']; 
				?>
			<?php else: ?>
				<?php
					$text_s = "Nam";
					echo $content['content_nu']; 
				?>
			<?php endif ?>
		</div>
		<div class="col-md-12" id="show_tuvi_click">
			<label style="background-color: #841012; padding: 5px;color: #fff;border-radius: 15px;" for="">Xem Thêm tử vi trọn đời tuổi <?php echo $canchi_text; ?> <?php echo $text_s; ?><span class="glyphicon glyphicon-chevron-right"></span></label>
		</div>
		<div class="col-md-12 hidden show_click">
			<?php if ($gioitinh == 'nam'): ?>
				<?php echo $content['content_nu']; ?>
			<?php else: ?>
				<?php echo $content['content_nam']; ?>
			<?php endif ?>
		</div>

		<div class="col-md-12">
			<?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
			<?php $this->load->view('site/import/form_tv_2021'); ?>
		</div>
		
		<div class="col-md-12">
			<ul>
				<li>
					<a href="<?php echo base_url($send_link); ?>">Tử vi của tuổi <?php echo $canchi_text; ?> năm 2018 nam mạng</a>
				</li>
				<li>
					<a href="<?php echo base_url($send_link1); ?>">Tử vi của tuổi <?php echo $canchi_text; ?> năm 2018 nữ mạng	</a>
				</li>
				
				<li>
					<a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>">Xem lá số tử vi</a>
				</li>
				<li>
					<a href="<?php echo base_url($send_link_laman); ?>">Tuổi <?php echo $canchi_text ?> hợp làm ăn với tuổi nào</a>
				</li>
				<li>
					<a href="<?php echo base_url($send_link_mauhop); ?>">Xem màu hợp mệnh <?php echo $menh_text; ?></a>
				</li>
			</ul>
		</div>
		<div class="col-md-12">
			<?php $this->load->view('site/import/import_anhduong'); ?>
		</div>
	<?php endif ?>
</article>
<div class="field clearfix">
  	<div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text_foot()); ?></div>
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
<div class="row">
	<div class="col-md-12">
		<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#submit_tv').on('click',function(){
			var frame = document.form_tuvi;
			var canchi = $('#namsinh_tv').val();
			var link = 'xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-'+ canchi + '.html';
			var domain = '<?php echo base_url(); ?>';
			frame.action = domain + link;
		});

		$('#show_tuvi_click').on('click',function(){
			$('.show_click').fadeToggle("slow");
			$('.show_click').removeClass('hidden');
		});
	});
</script>