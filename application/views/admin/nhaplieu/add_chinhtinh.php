<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?ac=save';
$link_save_close = $post_url.'?ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm nội dung sao chính tinh</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/chinhtinh');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Tên sao</label>
              <select name="name_sao" id="" class="form_control">
              	<?php foreach ($saochinh as $key => $value): ?>
              		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
              	<?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <label>Vị trí</label>
              <select name="position" id="" class="form_control">
              	<?php foreach ($position as $key => $value): ?>
              		<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
              	<?php endforeach ?>
              </select>
           </div>
           <div class="field">
            	<?php foreach ($cung as $key => $value): ?>
                <input type="text" name="cung[]" value="<?php echo $value; ?>">
                <textarea name="content[]" id="<?php echo 'demo'.$key; ?>" class="demo"></textarea>
                <br>
            	<?php endforeach ?>
           </div>
        </div>
        <div class="tabs_right">
          <!--  <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1">Sẵn sàng</option>
                 <option value="0">Chưa sẵn sàng</option>
              </select>
           </div>
           <div class="field">
              <label>Robot (follow/nofollow)</label>
              <select name="" class="form_control">
                 <option value="">follow</option>
                 <option value="">nofollow</option>
              </select>
           </div> -->
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
        CKEDITOR.replace( 'demo1' );
        CKEDITOR.replace( 'demo2' );
        CKEDITOR.replace( 'demo3' );
        CKEDITOR.replace( 'demo4' );
        CKEDITOR.replace( 'demo5' );
        CKEDITOR.replace( 'demo6' );
        CKEDITOR.replace( 'demo7' );
        CKEDITOR.replace( 'demo8' );
        CKEDITOR.replace( 'demo9' );
        CKEDITOR.replace( 'demo10' );
        CKEDITOR.replace( 'demo11' );
        CKEDITOR.replace( 'demo12' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
       