<!-- form nay cho mt -->
<form class="minibox dt-padding-10" name="form_tuvi20192" id="form_tuvi20192" method="post" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" onsubmit="frm_tra_cuu_tu_vi('form_tuvi20192'); return false;">
	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<select name="nam_sinh" required="">
				<?php for($i= 1947; $i<=2006; $i++): ?>
                    <?php $slt = (int)$i == 1990 ? 'selected=""' : ''; ?>
                    <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                <?php endfor ?>
			</select>
		</div>
		<div class="col-md-3 col-xs-6">
			<select class="gioitinh" name="gioi_tinh">
				<option value="1" selected="">Nam</option>
				<option value="2">Nữ</option>
			</select>
		</div>
		<div class="col-md-4 col-md-offset-4">
			<button type="submit">Xem kết quả</button>
		</div>
	</div>
</form>