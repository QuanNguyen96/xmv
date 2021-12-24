<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm slide ảnh</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo base_url('admin/slide/add?act=save_close');?>')" class="button">Lưu & đóng</a></li>
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
              <label>Tiêu đề</label>
              <input type="text" name="name" value="" />
           </div>
           <div class="field">
              <label>Link</label>
              <input type="text" name="link" value="" />
           </div>
           <div class="field">
              <label>Thứ tự</label>
              <input type="text" name="orders" value="0" style="width:50px"  />
           </div>
           <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1" <?php echo set_select('state',0) ?>>Kích hoạt</option>
                 <option value="0" <?php echo set_select('state',0) ?>>Không kích hoạt</option>
              </select>
           </div>
           <div class="field">
              <label>Hình ảnh</label>
              <input id="xFilePath" name="image" type="hidden" size="60"/>
              <div class="chose_picture" style="width:100px"  onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
              <div class="image" id="image"></div>
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
<script type="text/javascript">
function BrowseServer()
{
	var finder = new CKFinder();
	finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
	finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
    finder.selectActionFunction = SetFileField;
	finder.popup();
}

function SetFileField( fileUrl )
{
    document.getElementById( 'xFilePath' ).value = fileUrl;
    var link_img = fileUrl;
    var html     = '<img src="'+link_img+'"/>';
    $('#image').html(html);
}
</script>            