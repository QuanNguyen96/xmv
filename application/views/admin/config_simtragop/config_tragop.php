<article>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Quản lý cấu hình Mua Trả góp</label>
</header>
<div class="field">
	<label>Thời Hạn Trả Góp (Tháng)</label>
	<input type="text" name="thoi_han" value="<?php echo $item['thoi_han'];?>" />
</div>
<div class="field">
	<label>Lãi Suất (%)</label>
	<input type="text" name="lai_suat" value="<?php echo $item['lai_suat'];?>" />
</div>
<div class="field">
	<button type="submit" name="save" value="save" class="button">Lưu</button>
</div>
</form>
</article>  
