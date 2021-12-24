<div class="box_xvm">
	<form class="minibox" method="post" action="<?php echo base_url('bai-viet-tu-vi-nam-2019.html'); ?>">
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-md-4 col-xs-6">
				<select name="namsinh" required="">
					<?php for($i= 1947; $i<=2006; $i++): ?>
                        <?php $slt = (int)$i == 1990 ? 'selected=""' : ''; ?>
                        <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                    <?php endfor ?>
				</select>
			</div>
			<div class="col-md-4 col-xs-6">
				<select class="gioitinh" name="gioitinh">
					<option value="nam">Nam</option>
					<option value="nu">Nữ</option>
				</select>
			</div>
			<div class="col-md-4 col-xs-12 text-center">
				<button type="submit">Xem ngay</button>
			</div>
		</div>
	</form>
	<hr>
</div>