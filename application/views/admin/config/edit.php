<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Sửa cấu hình</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/listconfig');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cài đặt thông số</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field">
              <label>Name</label>
              <input type="text" name="name" value="<?php echo $item['name'];?>" />
           </div>
           <div class="field">
              <label>Type</label>
              <select name="type" style="height: 30px; border:1px solid #ccc; padding-left:10px; min-width:200px;">
                 <option value="">Select Type</option>
                 <option value="text" <?php if( $item['type'] == 'text' ) echo 'selected=""'; ?>>Text</option>
                 <option value="textarea" <?php if( $item['type'] == 'textarea' ) echo 'selected=""'; ?>>Textarea</option>
                 <option value="editor" <?php if( $item['type'] == 'editor' ) echo 'selected=""'; ?>>Editor</option>
                 <option value="select"<?php if( $item['type'] == 'select' ) echo 'selected=""'; ?>>Select</option>
                 <option value="radio"<?php if( $item['type'] == 'radio' ) echo 'selected=""'; ?>>Radio</option>
                 <option value="checkbox"<?php if( $item['type'] == 'checkbox' ) echo 'selected=""'; ?>>Checkbox</option>
                 <option value="file"<?php if( $item['type'] == 'file' ) echo 'selected=""'; ?>>File</option>
              </select>
           </div>
           <div class="field">
              <label>Title</label>
              <input type="text" name="title" value="<?php echo $item['title'];?>"  />
           </div>
           <div class="field">
              <label>Config</label>
              <input type="text" name="config" value="<?php echo $item['config'];?>"  />
           </div>
           <div class="field">
              <label>Value</label>
              <input type="text" name="value" value="<?php echo $item['value'];?>"  />
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

  function BrowseServer()
  {
      var finder = new CKFinder();
      finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
      finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
      finder.selectActionFunction = SetFileField;
      finder.popup();
  }

  function SetFileField( fileUrl )
  {
      document.getElementById( 'xFilePath' ).value = fileUrl;
      var link_img = fileUrl;
      var html     = '<img src="'+link_img+'"  style="max-width:100%; max-height:200px" />';
      $('#avatar').html(html);
  }

  </script>
           