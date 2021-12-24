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
            <label>Sửa Kw</label>
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
                    <div class="field">
                        <label for="content">Content</label>
                        <textarea name="content" id="demo" class="demo"><?php echo $item['content']; ?></textarea>
                    </div>
                </div>
                <div class="tabs_left">
                    <div class="field">
                        <label for="content">Trạng thái</label>
                        <select name="status" class="form_control">
                            <?php foreach (get_status() as $key => $value): ?>
                                <?php $selected = $item['status']==$key?'selected=""':''; ?>
                                <option <?php echo $selected; ?> value="<?php echo $key ?>"><?php echo $value; ?></option>
                            <?php endforeach ?>
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