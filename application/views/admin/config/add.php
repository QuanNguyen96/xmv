<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm cấu hình</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo base_url('admin/config/add?act=save_close');?>')" class="button">Lưu & đóng</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index');?>" class="button">Đóng</a></li>
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
              <input type="text" name="name" value="<?php echo set_value('name');?>" />
           </div>
           <div class="field">
              <label>Type</label>
              <select name="type" style="height: 30px; border:1px solid #ccc; padding-left:10px; min-width:200px;">
                 <option value="">Select Type</option>
                 <option value="text"<?php echo set_select('type','text');?>>Text</option>
                 <option value="textarea"<?php echo set_select('type','textarea');?>>Textarea</option>
                 <option value="editor"<?php echo set_select('type','editor');?>>Editor</option>
                 <option value="select"<?php echo set_select('type','select');?>>Select</option>
                 <option value="radio"<?php echo set_select('type','radio');?>>Radio</option>
                 <option value="checkbox"<?php echo set_select('type','checkbox');?>>Checkbox</option>
                 <option value="file"<?php echo set_select('type','file');?>>File</option>
              </select>
           </div>
           <div class="field">
              <label>Title</label>
              <input type="text" name="title" value="<?php echo set_value('title');?>"  />
           </div>
           <div class="field">
              <label>Config</label>
              <textarea name="config"><?php echo set_value('config');?></textarea>
           </div>
           <div class="field">
              <label>Value</label>
              <input type="text" name="value" value="<?php echo set_value('value');?>"  />
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
           