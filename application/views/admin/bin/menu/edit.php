<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<?php if( isset($success) ) echo $success; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm Menu</label>
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
              <label>Tên chuyên mục</label>
              <input type="text" name="name" id="name" value="<?php echo $item['name'];?>"  />
           </div>
           <div class="field">
              <label>Nội dung</label>
              <textarea name="content" id="content" class="content"><?php echo $item['content'];?></textarea>
           </div>
        </div>
        <div class="tabs_right">
          <?php if( $item['module'] == 'hyperlink' ): ?> 
            <div class="field">
              <label>Link liên kết</label>
              <input type="text" name="hyperlink" value="<?php echo $item['hyperlink']; ?>" />
              <input type="hidden" name="parent" value="0" />
            </div>  
          <?php else: ?> 
           <div class="field">
              <label>Chọn chuyên mục cha</label>
              <?php echo selectbox( $category,array( 'name'=>'parent','class'=>'form_control','id'=>'parent','selected'=>$item['parent'],'curent_id'=>$item['id'],'level'=>$item['level'],'extend'=>'onchange="select_parent()"') ); ?>
           </div>
           <script type="text/javascript">
                function select_parent(){
                    var parent = document.getElementById("parent").value;
                    $.ajax({
                			url: '<?php echo base_url('admin/menu/ajax_get_position') ?>', 
                			type: 'POST',
                			dataType: 'json', 
                			data: {id:parent},
                			beforeSend: function() {
                			},
                			success: function(data) {
                               $('#position').html(data.result);
                			},
                			error: function(e) {
                				console.log(e)
                			}
                		});
                }
            </script>
           <?php endif; ?> 
           <div class="field position">
              <label>Chọn vị trí hiển thị</label>
              <ul class="position" id="position">
                <?php if( !empty( $position ) ):
                        foreach( $position as $val ):
                        $pck = in_array( $val['name'], $cr_position ) ? 'checked=""' : '';
                 ?>
                 <li><input type="checkbox" value="<?php echo $val['name'];?>" name="position[]" <?php echo $pck;?> />&nbsp; <span><?php echo ucfirst($val['title']);?></span></li>
                 <?php endforeach; endif; ?>
              </ul>
           </div>
           <div class="field">
              <label>Ảnh đại diện</label>
              <input id="xFilePath" name="avatar" type="hidden" size="60" value="<?php echo $item['avatar'];?>"  />
              <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
              <?php $avatar = is_file( MEDIAPATH.'images/menu/'.$item['avatar'] ) ? '<img src="'.base_url('media/images/menu/'.$item['avatar']).'" />' : '';?>
              <div class="avatar" id="avatar"><?php echo $avatar;?></div>
           </div>
           <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1" <?php if( $item['state'] == 1 ) echo 'selected=""'; ?> >Kích hoạt</option>
                 <option value="0" <?php if( $item['state'] == 0 ) echo 'selected=""'; ?>>Không kích hoạt</option>
              </select>
           </div>
        </div>
      </div>
      <div id="tabs-2"><div class="tabs_left">
           <div class="field" id="field_slug">
              <label>Đường dẫn (link: <?php echo base_url($item['slug'].'.html');?><span class="slug"></span>)</label>
              <input type="text" name="slug" id="slug" value="<?php echo $item['slug'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Tiêu đề (title)</label>
              <input type="text" name="title" value="<?php echo $item['title'];?>" placeholder="Mặc định lấy tiêu đề bài viết" />
           </div>
           <div class="field">
              <label>Từ khóa (keywords)</label>
              <textarea name="keywords" id="keywords" class=""><?php echo $item['keywords'];?></textarea>
           </div>
           <div class="field">
              <label>Mô tả (description)</label>
              <textarea name="description" id="description" class=""><?php echo $item['description'];?></textarea>
           </div>
           <div class="field">
              <label>Thẻ Heading (h1)</label>
              <input type="text" name="heading_h1" value="<?php echo $item['heading_h1'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Robot (follow/nofollow)</label>
              <select name="follow" class="form_control">
                 <option value="1" <?php if( $item['follow'] == 1 ) echo 'selected=""'; ?> >follow/index</option>
                 <option value="0" <?php if( $item['follow'] == 0 ) echo 'selected=""'; ?> >nofollow/noindex</option>
              </select>
           </div>
        </div>
        <div class="tabs_right">
        
        </div>
      </div>
      <div id="tabs-3">
         <div class="tabs_left">
           <div class="field">
              <label>Đường dẫn tĩnh</label>
              <input type="text" name="router" value="<?php echo $item['router'];?>" placeholder="Chỉ dành cho kỹ thuật" />
           </div>
           <div class="field">
              <label>Filter Url</label>
              <input type="text" name="filter_router" value="<?php echo $item['filter_router'];?>" placeholder="Chỉ dành cho kỹ thuật" />
           </div>
        </div>
      </div>
</div>
<input type="hidden" name="id" value="<?php echo $item['id'];?>" /> 
<input type="hidden" name="curent_parent" value="<?php echo $item['parent'];?>" /> 
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
        CKEDITOR.replace( 'content' );
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