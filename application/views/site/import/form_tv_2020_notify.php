<?php 
$form_name = 'frm_tv_'.rand();
?>
<div class="form_tv_2020_notify">
	<div class="f_tv_2020_ntf_title">
		<div>Trọn bộ tử vi 2020 <br>Chiêm đoán vận mệnh cho tuổi 1950 - 2009</div>
		<div>Trọn bộ tử vi 2020 - Chiêm đoán<br>vận mệnh cho tuổi 1950 - 2009</div>
	</div>
    <div class="f_tv_2020_ntf_f">
    	<div class="f_tv_2020_ntf_f_t1">Tra cứu tử vi 2020</div>
    	<div class="f_tv_2020_ntf_f_t2">Bạn vui lòng nhập chính xác thông tin của mình!</div>
    	<form name="<?php echo $form_name;?>" id="<?php echo $form_name;?>" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" method="post" class="" onsubmit="frm_tra_cuu_tu_vi('<?php echo $form_name;?>'); return false;">
    		<div class="f_tv_2020_ntf_fip">
    			<select name="nam_sinh" class="select_tool">
					<?php for ($i=1950; $i < 2010; $i++):
		                    $slt = $i == 1992 ? 'selected=""' : '';  
		            ?>
		                <option value="<?php echo $i;?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
		            <?php endfor; ?>    
				</select>
    		</div>
    		<div class="f_tv_2020_ntf_fip">
    			<select name="gioi_tinh" class="select_tool">
					<option value="1">Nam</option>
		            <option value="2">Nữ</option>
				</select>
    		</div>
    		<div class="f_tv_2020_ntf_fip">
    			<button class="bt_xemngay" type="submit">Xem ngay</button>
    		</div>
    		<input type="hidden" name="nam_xem" value="2020">
		</form>
    </div>
</div>