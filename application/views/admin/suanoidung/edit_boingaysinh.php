<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Sửa nội dung bói ngày sinh</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index_boingaysinh');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Cung</label>
              <input type="text" value="<?php echo $item['cung']; ?>" disabled="">
           </div>
           <div class="field">
              <label>Số hên</label>
              <input name ="sohen" type="text" value="<?php echo $item['sohen']; ?>">
           </div>

           <div class="field">
              <label>Nguyên tố</label>
              <textarea name="nguyento" id="demo" class="demo"><?php echo $item['nguyento']; ?></textarea>
           </div>

           <div class="field">
              <label>Phẩm chất</label>
              <textarea name="phamchat" id="demo1" class="demo"><?php echo $item['phamchat']; ?></textarea>
           </div>

           <div class="field">
              <label>Tính chất</label>
              <textarea name="tinhchat" id="demo2" class="demo"><?php echo $item['tinhchat']; ?></textarea>
           </div>

           <div class="field">
              <label>Tính cách điển hình</label>
              <textarea name="tinhcachdienhinh" id="demo3" class="demo"><?php echo $item['tinhcachdienhinh']; ?></textarea>
           </div>

           <div class="field">
              <label>Bất lợi</label>
              <textarea name="batloi" id="demo4" class="demo"><?php echo $item['batloi']; ?></textarea>
           </div>

           <div class="field">
              <label>Tính cách</label>
              <textarea name="tinhcach" id="demo5" class="demo"><?php echo $item['tinhcach']; ?></textarea>
           </div>

           <div class="field">
              <label>Tình yêu</label>
              <textarea name="tinhyeu" id="demo6" class="demo"><?php echo $item['tinhyeu']; ?></textarea>
           </div>

           <div class="field">
              <label>Sức khỏe</label>
              <textarea name="suckhoe" id="demo7" class="demo"><?php echo $item['suckhoe']; ?></textarea>
           </div>

           <div class="field">
              <label>Gia đình</label>
              <textarea name="giadinh" id="demo8" class="demo"><?php echo $item['giadinh']; ?></textarea>
           </div>

           <div class="field">
              <label>Sự nghiệp</label>
              <textarea name="sunghiep" id="demo9" class="demo"><?php echo $item['sunghiep']; ?></textarea>
           </div>

           <div class="field">
              <label>Tổng quát</label>
              <textarea name="tongquat" id="demo10" class="demo"><?php echo $item['tongquat']; ?></textarea>
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

        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
       