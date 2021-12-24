<div class="import_frm_xem_tuoi_vo_chong">
	<div class="import_frm_xem_tuoi_vo_chong_tt">
		Xem tuổi vợ chồng
	</div>
	<div class="import_frm_xem_tuoi_vo_chong_ct">
	   <form name="frm_xem_tuoi_vo_chong" id="frm_xem_tuoi_vo_chong" action="" method="post" onsubmit="frmxemtuoivochong(); return false;">
	   	  <div class="import_frm_xem_tuoi_vo_chong_it">
	   	  	 <select name="nam_sinh_chong" required="">
	   	  	 	<option value="">Năm sinh chồng</option>
	   	  	 	<?php for ($i=1970; $i <=2027; $i++):?>
	   	  	 		<option value="<?php echo $i;?>"><?php echo $i;?></option>
	   	  	 	<?php endfor; ?>
	   	  	 	<?php for ($i=1947; $i <=1969; $i++):?>
	   	  	 		<option value="<?php echo $i;?>"><?php echo $i;?></option>
	   	  	 	<?php endfor; ?>		
	   	  	 </select>
	   	  	 <select name="nam_sinh_vo" required="">
	   	  	 	<option value="">Năm sinh vợ</option>
	   	  	 	<?php for ($i=1970; $i <=2027; $i++):?>
	   	  	 		<option value="<?php echo $i;?>"><?php echo $i;?></option>
	   	  	 	<?php endfor; ?>
	   	  	 	<?php for ($i=1947; $i <=1969; $i++):?>
	   	  	 		<option value="<?php echo $i;?>"><?php echo $i;?></option>
	   	  	 	<?php endfor; ?>	
	   	  	 </select>
	   	  </div>
	   	  <div class="import_frm_xem_tuoi_vo_chong_it">
	   	  	 <button type="submit">Xem kết quả</button>
	   	  </div>
	   </form>
	</div>
</div>