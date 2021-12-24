<div class="import_frm_xem_tu_vi">
	<div class="import_frm_xem_tu_vi_tt">
		Xem lá số tử vi trọn đời
	</div>
	<div class="import_frm_xem_tu_vi_ct">
	   <form name="" action="<?php echo base_url('xem-la-so-tu-vi.html');?>" method="post">
	   	  <div class="import_frm_xem_tu_vi_it">
	   	  	 <input type="text" name="hovaten" placeholder="Nhập họ và tên..." required="">
              <input type="hidden" value="1" name="lich">
	   	  	 <select name="gioitinh">
	   	  	 	 <option value="1" selected="">Nam giới</option>
	   	  	 	 <option value="0">Nữ giới</option>
	   	  	 </select>
	   	  </div>
	   	  <div class="import_frm_xem_tu_vi_it">
	   	  	  <select name="ngay" required="">
	   	  	 	 <option value="">Ngày sinh</option>
	   	  	 	 <?php for ($i=1; $i <= 31; $i++):?>
	   	  	 	 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	   	  	 	 <?php endfor; ?>	
	   	  	 </select>
	   	  	 <select name="thang" required="">
	   	  	 	 <option value="">Tháng sinh</option>
	   	  	 	 <?php for ($i=1; $i <= 12; $i++):?>
	   	  	 	 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	   	  	 	 <?php endfor; ?>
	   	  	 </select>
	   	  	 <select name="nam" required="">
	   	  	 	 <option value="">Năm sinh</option>
	   	  	 	 <?php for ($i=1950; $i <= 2020; $i++):?>
	   	  	 	 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	   	  	 	 <?php endfor; ?>
	   	  	 </select>
	   	  </div>
	   	  <div class="import_frm_xem_tu_vi_it">
	   	  	 <select name="gio" required="">
				<option value="">Giờ sinh</option>
				<option value="1" selected="selected">Tí (23g - 1g)</option>
				<option value="2">Sửu (1g - 3g)</option>
				<option value="3">Dần (3g - 5g)</option>
				<option value="4">Mão (5g - 7g)</option>
				<option value="5">Thìn (7g - 9g)</option>
				<option value="6">Tị (9g - 11g)</option>
				<option value="7">Ngọ (11g - 13g)</option>
				<option value="8">Mùi (13g - 15g)</option>
				<option value="9">Thân (15g - 17g)</option>
				<option value="10">Dậu (17g - 19g)</option>
				<option value="11">Tuất (19g - 21g)</option>
				<option value="12">Hợi (21g - 23g)</option>
			 </select>
	   	  	 <select name="namxem" required="">
	   	  	 	 <option value="">Năm xem</option>
	   	  	 	 <?php for ($i=2019; $i <= 2025; $i++):?>
	   	  	 	 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	   	  	 	 <?php endfor; ?>
	   	  	 </select> 
	   	  </div>
	   	  <div class="import_frm_xem_tu_vi_it">
	   	  	 <button type="submit">Xem kết quả</button>
	   	  </div>
	   </form>
	</div>
</div>