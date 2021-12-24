<?php if ($this->mobile_detect->isMobile()): ?>
	<div class="boxFormXemNgay inner_box_red">
		<form class="form_vien" name="ngaytotxau_tuoicanchi" method="post" onsubmit="submit_formXemngay_totxau_theotuoi();">
			<div class="row">
				<div class="col-sm-8 col-xs-8">
					<p class=""><label>Chọn tháng (DL):</label></p>

					<div class="row">
						<section class="col-xs-5">
							<select name="thang">
								<?php
									for ($i=1; $i<=12 ; $i++) {
									$selected = isset($thang_xem) ? ($thang_xem == $i ? 'selected=""' : '') : ($i == (int)date('m') ? 'selected=""' : '');
								 ?>
									<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</section>
						<section class="col-xs-5">
							<select name="nam">
								<?php
									for ($i=1947; $i<=2027 ; $i++) {
										$selected = isset($nam_xem) ? ($nam_xem == $i ? 'selected=""' : '') : ($i == (int)date('Y') ? 'selected=""' : '');
								 ?>
									<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</section>
					</div>
				</div>

				<div class="col-sm-4 col-xs-4">
					<p><label>Chọn tuổi:</label></p>

					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<select name="nam_sinh">
								<?php foreach (list_age_text() as $key => $value):
									$selected = isset($canchislug) ? ($canchislug == $key ? 'selected=""' : '') : '';
								 ?>
									<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 text-center">
					<br>
					<button type="submit" class="button">Xem kết quả</button>
				</div>
			</div>
		</form>
	</div>
<?php else: ?>
	<div class="boxFormXemNgay inner_box_red box_cuoihoi_fix">
		<form class="form_vien" name="ngaytotxau_tuoicanchi" method="post" onsubmit="submit_formXemngay_totxau_theotuoi();">
            <div class="txt_1xnt">
                Xem Ngày Tốt Cưới Hỏi
            </div>
			<div class="row">
				<div class="col-md-5">
					<p class=""><label>Chọn tháng (Dương lịch):</label></p>
				</div>
				<div class="col-md-7">
					<div class="row">
						<section class="col-xs-5">
							<select name="thang">
								<?php
									for ($i=1; $i<=12 ; $i++) {
									$selected = isset($thang_xem) ? ($thang_xem == $i ? 'selected=""' : '') : ($i == (int)date('m') ? 'selected=""' : '');
								 ?>
									<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</section>
						<section class="col-xs-5">
							<select name="nam">
								<?php
									for ($i=1947; $i<=2027 ; $i++) {
										$selected = isset($nam_xem) ? ($nam_xem == $i ? 'selected=""' : '') : ($i == (int)date('Y') ? 'selected=""' : '');
								 ?>
									<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</section>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<p><label>Chọn tuổi:</label></p>
				</div>
				<div class="col-md-7">
					<div class="row">
						<div class="col-xs-5">
							<select name="nam_sinh">
								<?php foreach (list_age_text() as $key => $value):
									$selected = isset($canchislug) ? ($canchislug == $key ? 'selected=""' : '') : '';
								 ?>
									<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-md-offset-5">
					<div class="row">
						<div class="col-xs-5">
							<button type="submit" class="button" style="width: 100%">Xem kết quả</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php endif ?>
<script>
	function submit_formXemngay_totxau_theotuoi() {
		var frm    = document.ngaytotxau_tuoicanchi;
		var canchi = frm.nam_sinh.value;
     	var link   = 'xem-ngay-tot-tuoi-' + canchi + '.html';
    	var domain = '<?php echo base_url(); ?>';
     	frm.action = domain + link;
	}
</script>