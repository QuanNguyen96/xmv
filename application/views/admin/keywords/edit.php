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
  <label>Sửa Kw</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field" id="field_slug">
              <label>Archortext</label>
              <input type="text" name="anchor_text" id="anchor_text" value="<?php echo $item['anchor_text'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Url</label>
              <input type="text" name="internal_link" value="<?php echo $item['internal_link'];?>" placeholder="" />
           </div>
           
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
    <script>
        CKEDITOR.replace( 'text_foot' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
       