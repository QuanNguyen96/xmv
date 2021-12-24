<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
$arr_y_nghia = array();
if($item['y_nghia'] != null) 
  $arr_y_nghia = unserialize($item['y_nghia']);
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Tử vi hàng ngày - Sửa quẻ</label>
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
              <label>Tên quẻ</label>
              <input type="text" name="name" id="slug" value="<?php echo $item['name'];?>" placeholder="" disabled="" />
           </div>
           <div class="field">
              <label>ID Quẻ</label>
              <input type="text" name="que_id" value="<?php echo $item['que_id'];?>" placeholder="" disabled="" />
           </div>
           <?php for ( $i=1; $i <= 8 ; $i++ ):?>
           <div class="field">
              <label><b><?php echo 'Ý nghĩa '.$i.' :';?></b></label>
              <textarea name="y_nghia[<?php echo $i;?>]" id="<?php echo 'editor_'.$i; ?>" class="demo"><?php if(isset($arr_y_nghia[$i])) echo $arr_y_nghia[$i];?></textarea>
           </div>
           <?php endfor; ?>
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
  <script type="text/javascript">
    var ckeditor_config = {
              base_url       : '<?php echo base_url(); ?>',
              connector_path : 'ckfinder/user/connector',
              html_path      : 'ckfinder/user/html' 
    }
  </script>
  <?php for ($i=1; $i <=8 ; $i++):?>
  <script>
        CKEDITOR.replace( '<?php echo 'editor_'.$i;?>' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
<?php endfor; ?>
       