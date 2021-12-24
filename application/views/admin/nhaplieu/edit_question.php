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
  <label>Nội dung câu hỏi</label>
  <ul>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/question');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Chủ đề</label>
              <input type="text" name="" value="<?php echo $item['them'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Chủ đề khác</label>
              <input type="text" name="" value="<?php echo $item['them1'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Họ và tên</label>
              <input type="text" name="" value="<?php echo $item['name'];?>" />
           </div>
           <div class="field">
              <label>Email</label>
              <input type="text" name="" value="<?php echo $item['email'];?>" />
           </div>
           <div class="field">
              <label>Điện thoại</label>
              <input type="text" name="" value="<?php echo $item['phone'];?>" />
           </div>
           <div class="field">
              <label>Ngày sinh</label>
              <input type="text" name="" value="<?php echo $item['ngaysinh'];?>" />
           </div>
           <div class="field">
              <label>Giờ sinh</label>
              <input type="text" name="" value="<?php echo $item['giosinh'];?>" />
           </div>
           <div class="field">
              <label>Nội dung</label>
              <textarea name="" id="demo" class=""><?php echo $item['content'];?></textarea>
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
