<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Sửa slide ảnh</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu & đóng</a></li>
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
              <input type="text" name="name" value="<?php echo $item['name'];?>" />
           </div>
           <div class="field">
              <label>Link</label>
              <input type="text" name="link" value="<?php echo $item['link'];?>" />
           </div>
           <div class="field">
              <label>Thứ tự</label>
              <input type="text" name="orders" value="<?php echo $item['orders'];?>" style="width:50px"  />
           </div>
           <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1" <?php if( $item['state'] == 1 ) echo 'selected=""'; ?> >Kích hoạt</option>
                 <option value="0" <?php if( $item['state'] == 0 ) echo 'selected=""'; ?>>Không kích hoạt</option>
              </select>
           </div>
           <div class="field">
              <label>Ảnh đại diện</label>
              <input id="xFilePath" name="image" type="hidden" size="60" value="<?php echo $item['image'];?>" />
              <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
              <?php $image = is_file( MEDIAPATH.'images/slide/'.$item['image'] ) ? '<img src="'.base_url('media/images/slide/'.$item['image']).'" />' : '';?>
              <div class="image" id="image"><?php echo $image;?></div>
           </div>
        </div>
      </div>
</div>
<input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
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