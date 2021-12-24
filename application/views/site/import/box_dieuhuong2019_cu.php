<?php if ( ( !empty($oneAge) && isset($canchi) ) || !empty($oneAgeNam) && isset($canchi) || !empty($oneAgeNu) && isset($canchi) ): ?>
	<div class="dieuhuong2019 clearfix">
		<div class="lbl_ lbl_notification">
			<div class="txt_to">Thông báo</div>
			<div class="txt_be"><span class="hidden-xs">Để</span> nắm bắt vận <b>Hung<span class="hidden-xs">&nbsp;</span>-<span class="hidden-xs">&nbsp;</span>Cát</b> của mình trong năm 2019 Kỷ Hợi mời bạn xem tại!</div>
		</div>

		<?php if (isset($gioitinh_text) && !empty($oneAge)): ?>
			<div class="bg_nhieu">
				<div class="bf_muitenviendo">
					<a href="<?php echo base_url($oneAge['slug'].'-A'.$oneAge['id'].'.html'); ?>">
						Xem tử vi tuổi <?php echo $canchi; ?> năm 2019 <?php echo $gioitinh_text; ?> mạng
					</a>
				</div>
			</div>
		<?php else: ?>
			<div class="bg_nhieu">
				<?php if ( !empty($oneAgeNam) && !empty($oneAgeNu) ): ?>
					<div class="bf_muitenviendo">
						<a href="<?php echo base_url($oneAgeNam['slug'].'-A'.$oneAgeNam['id'].'.html'); ?>">
							Xem tử vi tuổi <?php echo $canchi; ?> năm 2019 nam mạng
						</a>
					</div>
					<div class="bf_muitenviendo">
						<a href="<?php echo base_url($oneAgeNu['slug'].'-A'.$oneAgeNu['id'].'.html'); ?>">
							Xem tử vi tuổi <?php if (isset($canchi2)){echo $canchi2;}else{echo $canchi;} ?> năm 2019 nữ mạng
						</a>
					</div>
				<?php endif ?>
			</div>
		<?php endif ?>

		<div class="lbl_ lbl_caytrevang">
			<div class="txt_to">Tử vi 2019</div>
			<div class="txt_be">Quý bạn có thể xem <b><a class="txt_black" href="<?php echo base_url('xem-tu-vi-nam-2019-cua-12-con-giap.html'); ?>">Tử vi năm 2019</a></b> cho người thân </div>
		</div>


		<?php $this->load->view('site/import/form_tuvi2019_4', array('notLink' => true)); ?>
	</div>
<?php endif ?>