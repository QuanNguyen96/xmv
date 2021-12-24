<!-- form nay cho mb -->
<form class="minibox dt-padding-10" method="post" action="<?php echo base_url('bai-viet-tu-vi-nam-2019.html'); ?>">
	<div class="row">
		<div class="col-xs-5 text-center">
			<select name="namsinh" required="">
				<?php for($i= 1947; $i<=2006; $i++): ?>
                    <?php $slt = (int)$i == 1990 ? 'selected=""' : ''; ?>
                    <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                <?php endfor ?>
			</select>
		</div>
		<div class="col-xs-5 text-center">
			<select class="gioitinh" name="gioitinh">
				<option value="nam" selected="">Nam</option>
				<option value="nu">Nữ</option>
			</select>
		</div>
		<div class="col-xs-2 text-center">
			<button type="submit">Xem</button>
		</div>
	</div>
</form>