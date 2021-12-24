<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?ac=save';
?>
<article>
<?php if(isset($success)) echo $success; ?>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thông tin tài khoản</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu thay đổi </a></li>
     <li><a href="<?php echo base_url('admin');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field" id="field_title">
              <label>Email</label>
              <input type="text" name="email" id="name" value="<?php echo $item['email'];?>" disabled=""  />
           </div>
           <div class="field" id="field_title">
              <label>Họ và tên</label>
              <input type="text" name="fullname" id="name" value="<?php echo $item['fullname'];?>"/>
           </div>
           <div class="field">
              <label>Nhập mật khẩu hiện tại</label>
              <input type="password" name="password" id="name" value="" class="height_25"  />
           </div>
           <div class="field">
              <label>Nhập mật khẩu mới</label>
              <input type="password" name="new_password" id="name" value="" class="height_25"   />
           </div>
           <div class="field">
              <label>Nhập mật lại khẩu mới</label>
              <input type="password" name="r_new_password" id="name" value="" class="height_25"   />
           </div>
        </div>
      </div>
</div>
</form>
</article>  
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>