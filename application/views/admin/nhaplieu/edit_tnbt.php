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
  <label>A Dương Sửa nội dung Thập Nhị Bát Tú</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index_tuvi');?>" class="button">Đóng</a></li>
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
              <input type="text" name="name" value="<?php echo $item['name'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Tiêu Đề</label>
              <textarea name="title" id="demo3" class=""><?php echo $item['title'];?></textarea>
           </div>
           <div class="field">
              <label>Nên Làm</label>
              <textarea name="nenlam" id="demo" class=""><?php echo $item['nenlam'];?></textarea>
           </div>
           <div class="field">
              <label>Kị Làm</label>
              <textarea name="kilam" id="demo1" class=""><?php echo $item['kilam'];?></textarea>
           </div>
           <div class="field">
              <label>Ngoại Lệ</label>
              <textarea name="ngoaile" id="demo4" class=""><?php echo $item['ngoaile'];?></textarea>
           </div>
           <div class="field">
              <label>Seo Ki</label>
              <textarea name="seoki" id="demo2" class=""><?php echo $item['seo_ki'];?></textarea>
           </div>
        </div>
        <div class="tabs_right">
           <!-- <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1"<?php if($item['state'] == 1) echo 'selected=""';?>>Sẵn sàng</option>
                 <option value="0"<?php if($item['state'] == 0) echo 'selected=""';?>>Chưa sẵn sàng</option>
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
        CKEDITOR.replace( 'demo1' );
        CKEDITOR.replace( 'demo2' );
        CKEDITOR.replace( 'demo3' );
        CKEDITOR.replace( 'demo4' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
