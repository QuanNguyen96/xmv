<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?ac=save';
$link_save_close = $post_url.'?ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm nội dung luận quẻ theo kinh dịch</label>
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
              <label>Quẻ</label>
              <select required="" name="id_que" id="" class="form_control">
                <option value="" disabled="">Chọn quẻ</option>
                <?php foreach ($listQue as $key => $value): ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['ten']; ?></option>
                <?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <label>Dịch tên quẻ</label>
              <input required="" type="text" name="nghia_tenque" value="" placeholder="" />
           </div>
           <div class="field">
              <label>Nghĩa ngoại quái</label>
              <input required="" type="text" name="nghia_ngoai" value="" placeholder="" />
           </div>
           <div class="field">
              <label>Nghĩa nội quái</label>
              <input required="" type="text" name="nghia_noi"/>
           </div>
           <div class="field">
              <label>Phân tích:Thoán từ</label>
              <textarea required="" name="phantich_thoantu" id="phantich_thoantu" class=""></textarea>
           </div>
           <div class="field">
              <label>Phân tích:Thoán truyện, thoán viết</label>
              <textarea required="" name="phantich_thoantruyen" id="phantich_thoantruyen" class=""></textarea>
           </div>
           
           <div class="field">
              <label>Sơ lược từng hào</label>
              <textarea required="" name="soluoc" id="soluoc" class=""></textarea>
           </div>
           <div class="field">
              <label>Ý nghĩa quẻ</label>
              <textarea required="" name="ynghia" id="ynghia" class=""></textarea>
           </div>
           <div class="field">
              <label>Tốt cho việc gì</label>
              <textarea required="" name="totchoviec" id="totchoviec" class=""></textarea>
           </div>
        </div>
        <div class="tabs_right">
           <div class="field">
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
  <script type="text/javascript">
    var ckeditor_config = {
              base_url       : '<?php echo base_url(); ?>',
              connector_path : 'ckfinder/user/connector',
              html_path      : 'ckfinder/user/html' 
    }
  </script>
  <script>
        CKEDITOR.replace( 'phantich_thoantu' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
  </script>
  <script>
        CKEDITOR.replace( 'phantich_thoantruyen' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
  </script>
  <script>
        CKEDITOR.replace( 'soluoc' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
  </script>
  <script>
        CKEDITOR.replace( 'ynghia' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
  </script>
  <script>
        CKEDITOR.replace( 'totchoviec' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
  </script>       