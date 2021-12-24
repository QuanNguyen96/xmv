<link href="<?php echo base_url('templates/admin/css/login.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
<div class="main">
	<div class="login">
		<div class="login-top">
			<img src="<?php echo base_url('templates/admin/images/p.png'); ?>"/>
		</div>
		<h1>Đăng nhập hệ thống</h1>
		<div class="login-bottom">
		<form name="" action="" method="post">
			<input type="text" name="email" placeholder="Nhập email" required=" "/>					
			<input type="password" name="password" class="password" placeholder="Nhập mật khẩu" required=" "/>						
			<input type="submit" value="Đăng nhập"/>
		</form>
		<a href="#"><p>Quên mật khẩu? Click vào đây</p></a>
		</div>
        <?php if( isset( $error ) ) echo $error; ?>
	</div>
</div>