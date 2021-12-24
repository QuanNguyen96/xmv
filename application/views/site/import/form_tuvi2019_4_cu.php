<div class="bg_formtuvi2019">
	<form method="post" action="<?php echo base_url('bai-viet-tu-vi-nam-2019.html'); ?>">
		<?php if (isset($notLink) and $notLink): ?>
			<div class="nameF">Xem tử vi 2019</div>
		<?php else: ?>
			<div class="nameF"><a style="text-decoration: underline;color: #efc38f;" href="<?php echo show_link_tv2019(); ?>">Xem tử vi 2019</a></div>
		<?php endif ?>
		
		<div class="row">
			<div class="col-md-3 col-md-offset-3">
				<select name="namsinh" class="myselect">
					<?php for($i= 1947; $i<=2006; $i++): ?>
                        <?php $slt = (int)$i == 1990 ? 'selected=""' : ''; ?>
                        <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                    <?php endfor ?>
				</select>
			</div>
			<div class="col-md-3">
				<select class="gioitinh_text myselect" name="gioitinh">
					<option value="nam" selected="">Nam</option>
					<option value="nu">Nữ</option>
				</select>
			</div>
		</div>
		<div class="row text-center margin_top">
			<div class="col-md-12 col-xs-12">
				<button class="buttonF" type="submit">Xem kết quả</button>
			</div>
		</div>
	</form>
</div>