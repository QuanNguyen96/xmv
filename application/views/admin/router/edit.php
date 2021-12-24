<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Sửa Router</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu & đóng</a></li>
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
              <input type="text" name="router_key" value="<?php echo $item['router_key'];?>" />
           </div>
           <div class="field">
              <label>Result</label>
              <input type="text" name="router_result" value="<?php echo $item['router_result'];?>" />
           </div>
        </div>
      </div>
</div>
<input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
</form>
</article>  
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>    