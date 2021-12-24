<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
$link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<?php if(isset($success)) echo $success; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Sửa sản phẩm</label>
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
              <input type="text" name="name" id="name" value="<?php echo $item['name'];?>"/>
           </div>
           <div class="field">
              <label>Giá bán</label>
              <input type="text" name="giaban" id="giaban" placeholder="Nhập giá bán..." style="width:200px;" onkeyup="formatnumber('giaban')" value="<?php echo number_format($item['giaban'],0,'.',".");?>" />
           </div>
           <div class="field">
              <label>Giá khuyến mãi:</label>
              <input type="text" name="giakhuyenmai" id="giakhuyenmai" placeholder="Nhập giá khuyến mãi..." style="width:200px;" onkeyup="formatnumber('giakhuyenmai')" value="<?php echo number_format($item['giakhuyenmai'],0,'.',".");?>" />
           </div>
           <div class="field">
              <label>Nội dung</label>
              <textarea name="content" id="demo" class="demo"><?php echo $item['content'];?></textarea>
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
                           $slt = $val['id'] == $item['parent'] ? 'selected=""' : '';
                 ?>
                     <option value="<?php echo $val['id'];?>" <?php echo $slt;?> ><?php echo $char . $val['name'];?></option>
                 <?php endforeach; endif; ?>
              </select>
           </div>
           <div class="field">
              <label>Ảnh đại diện</label>
              <input id="xFilePath" name="avatar" type="hidden" size="60" value="<?php echo $item['avatar'];?>" />
              <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
              <?php $avatar = is_file( MEDIAPATH.'images/product/'.$item['id'].'/'.$item['avatar'] ) ? '<img src="'.base_url('media/images/product/'.$item['id'].'/'.$item['avatar']).'" />' : '';?>
              <div class="avatar" id="avatar"><?php echo $avatar;?></div>
           </div>
           <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1" <?php if( $item['state'] == 1 ) echo 'selected=""'; ?> >Kích hoạt</option>
                 <option value="0" <?php if( $item['state'] == 0 ) echo 'selected=""'; ?>>Không kích hoạt</option>
              </select>
           </div>
           <div class="field">
              <label>Nổi bật</label>
              <select name="feature" class="form_control">
                 <option value="1" <?php if( $item['feature'] == 1 ) echo 'selected=""'; ?> >Nổi bật</option>
                 <option value="0" <?php if( $item['feature'] == 0 ) echo 'selected=""'; ?>>Không nổi bật</option>
              </select>
           </div>
           <div class="field">
              <label>Ẩn giá</label>
              <select name="hidden_price" class="form_control">
                 <option value="0" <?php if( $item['hidden_price'] == 0 ) echo 'selected=""'; ?>>Không ẩn giá</option>
                 <option value="1" <?php if( $item['hidden_price'] == 1 ) echo 'selected=""'; ?> >Ẩn giá</option>
              </select>
           </div>
           <div class="field tag">
              <label>Thêm Tag</label>
              <input type="text" name="" id="tag" value="" placeholder="Các tag cách nhau bởi dấu ," />
              <button type="button" class="button" onclick="addTags('<?php echo base_url('admin/tags/ajax_add_tags') ?>',<?php echo $_GET['id'];?>,'product')">Thêm</button>
              <div class="listTag">
                <?php if( !empty($listTag) ):
                     foreach($listTag as $val):
               ?>
                <a href="#" id="<?php echo 'tag_'. $val['id'];?>"><i class="fa fa-times-circle" aria-hidden="true" onclick="removeTag(<?php echo $val['id'];?>,'<?php echo base_url('admin/tags/ajax_remove_tags') ?>')" ></i><?php echo $val['name'];?></a>
               <?php endforeach; endif; ?>
              </div>
              
           </div>
        </div>
      </div>
      <div id="tabs-2"><div class="tabs_left">
           <div class="field" id="field_slug">
              <label>Đường dẫn (link: <?php echo base_url();?><span class="slug"><?php echo $item['slug'].'.html';?></span>)</label>
              <input type="text" name="slug" id="slug" value="<?php echo $item['slug'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Tiêu đề (title)</label>
              <input type="text" name="title" value="<?php echo $item['title'];?>" placeholder="Mặc định lấy tiêu đề bài viết" />
           </div>
           <div class="field">
              <label>Từ khóa (keywords)</label>
              <textarea name="keywords" id="" class=""><?php echo $item['keywords'];?></textarea>
           </div>
           <div class="field">
              <label>Mô tả (description)</label>
              <textarea name="description" id="" class=""><?php echo $item['description'];?></textarea>
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
    var html     = '<img src="'+link_img+'"  style="max-width:100%; max-height:200px" />';
    $('#avatar').html(html);
}
</script>
<script type="text/javascript">
$('#quick_add_category').click(function(){
       $('#add_category').slideToggle();
});
</script>
<script>
function add_category(){
    var category   =  $('#add_category input').val();
    var parent     =  $( "#add_category select option:selected" ).val();
    $.ajax({
		url: '<?php echo base_url('admin/article/ajax_add_category') ?>', // form action url
		type: 'POST', // form submit method get/post
		dataType: 'json', // request type html/json/xml
		data:{category:category, parent:parent}, // serialize form data 
		beforeSend: function() {
			//submit.html('Sending....'); // change submit button textư
            $('.message').remove();
		},
		success: function(data) {
            if( data.state == 'error' ){
                 $('#add_category').append('<li class="message">'+data.message+'</li>');
            }else{
                $('#select_category').append(data.message);
                $('#add_category').slideUp();
            }
		},
		error: function(e) {
			console.log(e)
		}
	});
    //$('#add_category').slideUp();
}

</script>            