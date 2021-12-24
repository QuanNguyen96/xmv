<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content=">" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="noindex, nofollow"/>
        <link rel="stylesheet" href="<?php echo base_url('templates/admin/css/style.css') ?>" />
        <link rel="stylesheet" href="<?php echo base_url('templates/fonts/font-awesome-4.5.0/css/font-awesome.min.css') ?>" />
        <script type="text/javascript" src="<?php echo base_url('templates/admin/js/jquery-1.11.1.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/admin/js/jquery-ui.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/admin/js/function.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/ckeditor/ckeditor.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/ckfinder/ckfinder.js');?>"></script>
        <title>Quản trị website</title>
        <script type="text/javascript">
           $(function(){
              setTimeout(function(){ 
                  $('.success').slideUp();
              }, 2000);
           });
        
        </script>
	</head>
	<body>
       <header class="header">
          <div class="logo">
            <b><i class="fa fa-bars" aria-hidden="true"></i></b>
            <a href="<?php echo base_url('ql');?>">Administrator</a>
          </div>
          <?php $this->load->view( 'admin/block/nav' );?>
       </header>
       <section class="content"> 
         <?php $this->load->view( 'admin/block/aside' );?>
         <?php $this->load->view($view);?>
       </section>
       <footer>
          <p>designed by HT GROUP JSC vesion 1.0</p>
          <p>techweb.com.vn</p>
       </footer>
    </body>
</html>