<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
?>
<article>
	<div class="col-md-12">
		<form name="adminForm" id="form" action="" method="post">
			<header class="header_control">
				<label>Bói Bài Tarot</label>
				<ul>
	     			<li><a href="#" onclick="submit_form('<?php echo base_url('admin/nhaplieu/add_boibaitarot?act=save_close');?>')" class="button">Lưu & đóng</a></li>
	     			<li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/boibaitarot');?>" class="button">Đóng</a></li>
	  			</ul>
			</header>
			<hr>
			<div class="tabs_left">
				<div class="field">
					<label>Số</label>
					<input type="text" name="number" value="" required="">
				</div>
				<div class="field">
					<label>Tên lá bài</label>
					<input type="text" name="name" value="" required="">
				</div>
				<div class="field">
					<label>Giới thiệu</label>
					<textarea name="gioi_thieu" id="cke" cols="30" rows="10"></textarea>
				</div>
				<div class="field">
					<label>Tổng quan</label>
					<textarea name="tong_quan" id="cke1" cols="30" rows="10"></textarea>
				</div>
				<div class="field">
					<label>Tình yêu</label>
					<textarea name="tinh_yeu" id="cke2" cols="30" rows="10"></textarea>
				</div>
				<div class="field">
					<label>Công việc</label>
					<textarea name="cong_viec" id="cke3" cols="30" rows="10"></textarea>
				</div>
				<div class="field">
					<label>Sức khỏe</label>
					<textarea name="suc_khoe" id="cke4" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="tabs_right">
				
			</div>
		</form>
	</div>
</article>
<script>
	CKEDITOR.replace( 'cke' );
	CKEDITOR.replace( 'cke1' );
	CKEDITOR.replace( 'cke2' );
	CKEDITOR.replace( 'cke3' );
	CKEDITOR.replace( 'cke4' );
</script>