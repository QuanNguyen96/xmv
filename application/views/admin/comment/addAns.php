<?php
    $post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
    
    $link_save = $post_url.'?ac=save&id='.$_GET['id'];
    $link_save_close = $post_url.'?ac=save_close&id='.$_GET['id'];
    ?>
<article>
    <?php if( isset($error) ) echo $error; ?>
    <form name="adminForm" id="form" action="" method="post">
        <header class="header_control">
            <label>Thêm Trả lời từ admin</label>
            <ul>
                <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
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
                        <label for="name">
                        Name user
                        </label>
                        <input type="text" name="name" id="name" value="<?php echo set_value('name');?>" placeholder="" />
                    </div>
                    <div class="field">
                        <label for="email">Email user</label>
                        <input type="text" name="email" id="email" value="<?php echo set_value('email');?>" placeholder="" />
                    </div>
                    <div class="field">
                        <label for="content">Content admin</label>
                        <textarea name="content" id="demo" class="demo"><?php echo set_value('content');?></textarea>
                    </div>
                    <div class="field">
                        <label for="content">Bạn là user hay admin</label>
                        <select name="is_admin" class="form_control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="hidden" name="url" id="url" value="" placeholder="" />
                        <input type="hidden" name="parent_id" value="<?php echo $_GET['id'];?>" placeholder="" />
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
    CKEDITOR.replace( 'demo' );
    CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
    CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
    CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
    CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
</script>