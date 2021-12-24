<?php 
	$gioitinh = isset($gioitinh) ? $gioitinh : 'Nam'; 
?>
<form action="<?php echo base_url('xem-sim-so-dien-thoai-hop-tuoi.html') ?>" method="post">
	<p class="titform">*Bạn hãy điền thông tin dưới đây</p>
	<?php if ( !$this->agent->is_mobile() ): ?>
		<div class="row mar-bot">
			<div class="col-sm-8 col-xs-12">
				<input required="" type="tel" name="sosim" class="input_thanhchi" placeholder="Số điện thoại" value="<?php echo isset($sosim) ? $sosim : '' ; ?>">
			</div>
			<div class="col-sm-4 col-xs-12">
				<select required="" name="giosinh" id="" class="input_thanhchi">
					<?php $this->load->view('site/import/html_select_giosinh'); ?>
				</select>
			</div>
		</div>
		<div class="row mar-bot">
			<div class="col-sm-4 col-xs-4">
				<select required="" name="ngaysinh" id="" class="input_thanhchi">
					<option value="" selected="" disabled="">Ngày sinh</option>
					<?php 
                        for( $i = 1; $i<= 31; $i++ ){
                            $slt = isset($ngaysinh) ? ( ($ngaysinh == $i) ? 'selected=""' : '' ) : '';
                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                        }
                        ?>
				</select>
			</div>
			<div class="col-sm-4 col-xs-4">
				<select required="" name="thangsinh" id="" class="input_thanhchi">
					<option value="" selected="" disabled="">Tháng sinh</option>
					    <?php
						    for( $i = 1; $i<= 12; $i++ ){
                                $slt = isset($thangsinh) ? ( ($thangsinh == $i) ? 'selected=""' : '' ) : '';
                                echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                            }
                            ?>
				</select>
			</div>
			<div class="col-sm-4 col-xs-4">
				<select required="" name="namsinh" id="" class="input_thanhchi">
					<option value="" selected="" disabled="">Năm sinh</option>
						<?php 
	                        for( $i = 1950; $i<= 2025; $i++ ){
	                        	$namsinh = isset($namsinh) ? $namsinh : 1992;
	                            $slt = $namsinh == $i ? 'selected=""' : '';
	                            echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
	                        }
	                        ?>
				</select>
			</div>
		</div>
		<div class="row mar-bot" style="color: #fff;">
			<div class="col-md-2 col-md-offset-4 col-xs-6 text-center">
				<input type="radio" value="Nam" name="gioitinh" id="gt_nam" <?php echo ($gioitinh == 'Nam') ? 'checked=""' : ''?>><label for="gt_nam">&nbsp;&nbsp;Nam</label>
			</div>
			<div class="col-md-2 col-xs-6 text-center">
				<input type="radio" value="Nữ" name="gioitinh" id="gt_nu"  <?php echo ($gioitinh == 'Nữ') ? 'checked=""' : ''?>><label for="gt_nu">&nbsp;&nbsp;Nữ</label>
			</div>
		</div>
	<?php else : ?>
		<div class="row mar-bot">
			<div class="col-sm-12 col-xs-12">
				<input required="" type="tel" name="sosim" class="input_thanhchi" placeholder="Số điện thoại">
			</div>
		</div>
		<div class="row mar-bot">
			<div class="col-sm-4 col-xs-4">
				<select required="" name="ngaysinh" id="" class="input_thanhchi">
					<option value="" selected="" disabled="">Ngày sinh</option>
					<?php 
                        for( $i = 1; $i<= 31; $i++ ){
                            $slt = isset($ngaysinh) ? ( ($ngaysinh == $i) ? 'selected=""' : '' ) : '';
                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                        }
                        ?>
				</select>
			</div>
			<div class="col-sm-4 col-xs-4">
				<select required="" name="thangsinh" id="" class="input_thanhchi">
					<option value="" selected="" disabled="">Tháng sinh</option>
					    <?php
						    for( $i = 1; $i<= 12; $i++ ){
                                $slt = isset($thangsinh) ? ( ($thangsinh == $i) ? 'selected=""' : '' ) : '';
                                echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                            }
                            ?>
				</select>
			</div>
			<div class="col-sm-4 col-xs-4">
				<select required="" name="namsinh" id="" class="input_thanhchi">
					<option value="" selected="" disabled="">Năm sinh</option>
						<?php 
	                        for( $i = 1950; $i<= 2025; $i++ ){
	                            $slt = isset($namsinh) ? ( ($namsinh == $i) ? 'selected=""' : '' ) : '';
	                            echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
	                        }
	                        ?>
				</select>
			</div>
		</div>
		<div class="row mar-bot">
			<div class="col-sm-7 col-xs-7">
				<select required="" name="giosinh" id="" class="input_thanhchi">
					<?php $this->load->view('site/import/html_select_giosinh'); ?>
				</select>
			</div>
			<div class="col-sm-5 col-xs-5 text-center" style="line-height: 38px;color: #fff;">
				<input type="radio" value="Nam" name="gioitinh" id="gt_nam" <?php echo ($gioitinh == 'Nam') ? 'checked=""' : ''?>><label for="gt_nam">&nbsp;&nbsp;Nam</label>
				<input type="radio" value="Nữ" name="gioitinh" id="gt_nu"  <?php echo ($gioitinh == 'Nữ') ? 'checked=""' : ''?>><label for="gt_nu">&nbsp;&nbsp;Nữ</label>
			</div>
		</div>
	<?php endif; ?>

	<?php if (isset($error)): ?>
		<div class="my_err">
			<?php echo $error; ?>
		</div>
	<?php endif ?>
	<div class="text-center">
		<button class="btn_thanhchi">Xem kết quả</button>
	</div>
</form>
