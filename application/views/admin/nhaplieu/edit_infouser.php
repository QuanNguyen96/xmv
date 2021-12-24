<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thông tin người dùng</label>
  <ul>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index_infouser');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Link</label>
              <input type="text" name="url" value="<?php echo $item['url'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Ngày nhập</label>
              <input type="text" name="date_submit" value="<?php echo $item['date_submit'];?>" />
           </div>
           <div class="field">
              <label>Ngày sinh</label>
              <input type="text" name="ngaysinh" value="<?php echo $item['ngaysinh'];?>" />
           </div>
           <div class="field">
              <label>Tháng sinh</label>
              <input type="text" name="thangsinh" value="<?php echo $item['thangsinh'];?>" />
           </div>
           <div class="field">
              <label>Năm sinh sinh</label>
              <input type="text" name="namsinh" value="<?php echo $item['namsinh'];?>" />
           </div>
           <div class="field">
              <label>Email</label>
              <input type="text" name="email" value="<?php echo $item['email'];?>" />
           </div>
           <div class="field">
              <label>Điện thoại</label>
              <input type="text" name="phone" value="<?php echo $item['phone'];?>" />
           </div>
        </div>
        <div class="tabs_right">
           
        </div>
      </div>
</div>
<input type="hidden" name="id" value="<?php echo $item['id'];?>" />
</form>
</article>  
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
