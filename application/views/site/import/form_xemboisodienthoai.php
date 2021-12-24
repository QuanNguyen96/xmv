<div class="div_form_xbsdt box_xvm">
	<div class="title_l1">Xem bói số điện thoại</div>
	<div class="div_bgform">
		<p class="tit_form">Hãy nhập đủ thông tin của bạn vào để có kết quả tốt nhất:</p>
		<form name="" action="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>" method="post">
			<div class="row div_innerForm">
				<div class="col-md-12 col-xs-12">
					<div class="form-group clearfix">
						<div class="width75 fl_l mb_width65">
							<input type="tel" name="sosim" value="<?php echo isset($sosim) ? $sosim : ''; ?>" placeholder="Nhập số điện thoại" required="" />
						</div>
						<div class="width5 fl_l ">&nbsp;</div>
						<div class="width20 fl_l mb_width30">
							<select class="form border_r" id="gioitinh" name="gioitinh">
								<option value="Nam" selected="selected" <?php echo isset($gioitinh) ? ( ($gioitinh == 'Nam') ? 'selected=""' : '' ) : ''; ?>>Nam</option>
								<option value="Nữ" <?php echo isset($gioitinh) ? ( ($gioitinh == 'Nữ') ? 'selected=""' : '' ) : ''; ?>>Nữ</option>
							</select>
						</div>
					</div>
					<div class="form-group clearfix">
						<div class="width20 fl_l mb_width45">
							<select name="giosinh" required="">
								<?php $this->load->view('site/import/html_select_giosinh'); ?>
							</select>
						</div>
						<div class="width5 fl_l mb_width10">&nbsp;</div>
						<div class="width20 fl_l mb_width45">
							<select name="ngaysinh">
								<option value="" selected="" disabled="">Ngày sinh</option>
								<?php 
                                for( $i = 1; $i<= 31; $i++ ){
                                    $slt = isset($info_user['ngay_sinh']) ? ($info_user['ngay_sinh'] == $i ? 'selected=""' :'') : ($i == (int)date('d') ? 'selected=""' : '');
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                                ?>
							</select>
						</div>
						<div class="width5 fl_l mb_width0">&nbsp;</div>
						<div class="width20 fl_l mb_width45">
							<select name="thangsinh">
								<option value="" selected="" disabled="">Tháng sinh</option>
								<?php 
                                for( $i = 1; $i<= 12; $i++ ){
                                    $slt = isset($info_user['thang_sinh']) ? ($info_user['thang_sinh'] == $i ? 'selected=""' :'') : ($i == (int)date('m') ? 'selected=""' : '');
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                                ?>
							</select>
						</div>
						<div class="width5 fl_l mb_width10">&nbsp;</div>
						<div class="width25 fl_l mb_width45">
							<select name="namsinh" id="namsinh">
								<option value="" selected="" disabled="">Năm sinh</option>
								<?php 
                                for( $i = 1950; $i<= 2025; $i++ ){
                                    $slt = isset($info_user['nam_sinh']) ? ($info_user['nam_sinh'] == $i ? 'selected=""' :'') : ($i == (int)date('Y') ? 'selected=""' : '');
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                                ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row div_innerForm">
				<div class="col-md-12 col-xs-12 text-center">
					<button type="submit" class="button" id="btn_xemboisim">Xem kết quả</button>
				</div>
			</div>
			<input type="hidden" name="option" value="com_boi"/>
	        <input type="hidden" name="view" value="simdep"/>
	        <input type="hidden" name="Itemid" value="37"/>
		</form>
	</div>
</div>