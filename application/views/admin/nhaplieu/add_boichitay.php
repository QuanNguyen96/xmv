<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?ac=save';
$link_save_close = $post_url.'?ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm nội dung bói chỉ tay</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index_boichitay');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Tên chỉ tay</label>
              <input type="text" name="name_text" value="" placeholder="" />
           </div>
           <div class="field">
              <label>Slug</label>
              <input type="text" name="name_slug" value="" placeholder="" />
           </div>
           <div class="field">
              <label>Nội dung</label>
              <textarea name="content_chitay" id="demo" class="demo"></textarea>
           </div>
        </div>
        <div class="tabs_right">
          
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
  <script type="text/javascript">
    var ckeditor_config = {
              base_url       : '<?php echo base_url(); ?>',
              connector_path : 'ckfinder/user/connector',
              html_path      : 'ckfinder/user/html' 
    }
  </script>
  <script>
        CKEDITOR.replace( 'demo' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
       