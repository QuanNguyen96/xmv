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
  <label>Sửa Seolink</label>
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
              <label>Đường dẫn (link: <?php echo base_url();?><span class="slug"></span>)</label>
              <input type="text" name="link" id="slug" value="<?php echo $item['link'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Tên công cụ</label>
              <input type="text" name="name" value="<?php echo $item['name'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Tiêu đề (title)</label>
              <input type="text" name="title" value="<?php echo $item['title'];?>" placeholder="Mặc định lấy tiêu đề bài viết" />
           </div>
           <div class="field">
              <label>Từ khóa (keywords)</label>
              <textarea name="keywords" id="" class=""><?php echo $item['keywords'];?></textarea>
           </div>
           <div class="field">
              <label>Mô tả (description)</label>
              <textarea name="description" id="" class=""><?php echo $item['description'];?></textarea>
           </div>
           
           <div class="field">
              <label>Nội dung</label>
              <textarea name="text" id="demo" class="demo"><?php echo $item['text'];?></textarea>
           </div>
           <div class="field">
              <label>Nội dung phía dưới</label>
              <textarea name="text_foot" id="text_foot" class="text_foot"><?php echo $item['text_foot'];?></textarea>
           </div>
           <div class="field">
              <label>Nội dung giữa</label>
              <textarea name="text_content" id="text_content" class="text_content"><?php echo $item['text_content'];?></textarea>
           </div>
        </div>
        <div class="tabs_right">
           <div class="field">
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
    <script>
        CKEDITOR.replace( 'text_content' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
       