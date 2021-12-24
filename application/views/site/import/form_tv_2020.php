<?php 
$form_name = 'frm_tv_'.rand();

?>
<div class="tool_tuvi" id="bangtratv2020">
	<div class="tool_text_1">
		TRA CỨU TỬ VI 2020
	</div>
	<div class="tool_text_2">
		Bạn vui lòng nhập chính xác thông tin của mình!
	</div>
	<form name="<?php echo $form_name;?>" id="<?php echo $form_name;?>" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" method="post" class="form_tool" onsubmit="frm_tra_cuu_tu_vi('<?php echo $form_name;?>'); return false;">
		<select name="nam_sinh" class="select_tool">
			<?php for ($i=1950; $i < 2010; $i++):
                    $slt = $i == 1992 ? 'selected=""' : '';  
            ?>
                <option value="<?php echo $i;?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
            <?php endfor; ?>    
		</select>
		<select name="gioi_tinh" class="select_tool">
			<option value="1">Nam</option>
            <option value="2">Nữ</option>
		</select>
		<button class="bt_xemngay" type="submit">Xem ngay</button>
		<input type="hidden" name="nam_xem" value="2020">
	</form>
</div>