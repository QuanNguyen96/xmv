<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm Router</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo base_url('admin/router/add?act=save_close');?>')" class="button">Lưu & đóng</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Tổng quan</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Router</label>
              <input type="text" name="router_key" value="" />
           </div>
           <div class="field">
              <label>Result</label>
              <input type="text" name="router_result" value="" />
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