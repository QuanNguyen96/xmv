<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm sản phẩm</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
     <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cơ bản</a></li>
        <li><a href="#tabs-2">Seo google</a></li>
        <li><a href="#tabs-3">Hướng dẫn</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field" id="field_title">
              <label>Tiêu đề sản phẩm</label>
              <input type="text" name="name" id="name" value="<?php echo set_value('name');?>"  />
           </div>
           <div class="field">
              <label>Giá bán</label>
              <input type="text" name="giaban" id="giaban" placeholder="Nhập giá bán..." style="width:200px;" onkeyup="formatnumber('giaban')" value="<?php echo set_value('giaban');?>" />
           </div>
           <div class="field">
              <label>Giá khuyến mãi:</label>
              <input type="text" name="giakhuyenmai" id="giakhuyenmai" placeholder="Nhập giá khuyến mãi..." style="width:200px;" onkeyup="formatnumber('giakhuyenmai')" value="<?php echo set_value('giakhuyenmai');?>" />
           </div>
           <div class="clearfix"></div>
           <div class="field">
              <label>Nội dung</label>
              <textarea name="content" id="demo" class="demo"><?php echo set_value('content');?></textarea>
           </div>
        </div>
        <div class="tabs_right">
           <div class="field">
              <label>Chuyên mục cha</label>
              <select name="parent" class="form_control">
                 <option value="">Chọn chuyên mục cha</option>
                 <?php
                    if( !empty( $category ) ):
                       foreach( $category as $val ):
                           $char = '';
                           for( $i=1; $i<= $val['level']; $i++ )
                           {
                              $char.='--';
                           }
                 ?>
                     <option value="<?php echo $val['id'];?>" <?php echo set_select('parent',$val['id']) ?>  ><?php echo $char . $val['name'];?></option>
                 <?php endforeach; endif; ?>
              </select>
           </div>
           <div class="field">
              <label>Ảnh đại diện</label>
              <input id="xFilePath" name="avatar" type="hidden" size="60" />
              <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
              <div class="avatar" id="avatar"></div>
           </div>
           <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1" <?php echo set_select('state',0) ?>>Kích hoạt</option>
                 <option value="0" <?php echo set_select('state',0) ?>>Không kích hoạt</option>
              </select>
           </div>
           <div class="field">
              <label>Nổi bật</label>
              <select name="feature" class="form_control">
                 <option value="1" <?php echo set_select('feature',0) ?>>Nổi bật</option>
                 <option value="0" <?php echo set_select('feature',0) ?>>Không nổi bật</option>
              </select>
           </div>
           <div class="field tag">
              <label>Thêm Tag</label>
              <input type="text" name="" id="tag" value="" placeholder="Các tag cách nhau bởi dấu ," />
              <button type="button" class="button" onclick="addTags('<?php echo base_url('admin/tags/ajax_add_tags') ?>',<?php echo $_GET['id'];?>,'article')">Thêm</button>
              <div class="listTag">
              
              </div>
           </div>
        </div>
      </div>
      <div id="tabs-2"><div class="tabs_left">
           <div class="field">
              <label>Tiêu đề (title)</label>
              <input type="text" name="title" value="<?php echo set_value('title');?>" placeholder="Mặc định lấy tiêu đề bài viết" />
           </div>
           <div class="field">
              <label>Từ khóa (keywords)</label>
              <textarea name="keywords" id="" class=""><?php echo set_value('keywords');?></textarea>
           </div>
           <div class="field">
              <label>Mô tả (description)</label>
              <textarea name="description" id="" class=""><?php echo set_value('description');?></textarea>
           </div>
           <div class="field">
              <label>Robot (follow/nofollow)</label>
              <select name="follow" class="form_control">
                 <option value="1">follow/index</option>
                 <option value="0">nofollow/noindex</option>
              </select>
           </div>
        </div>
        <div class="tabs_right">
        
        </div>
      </div>
      <div id="tabs-3">
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
    $('#avatar').html(html);
}
</script>            