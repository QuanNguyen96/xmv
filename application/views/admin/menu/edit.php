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
        <li><a href="#tabs-4">Sub link</a></li>
        <li><a href="#tabs-3">Hướng dẫn</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field" id="field_title">
              <label>Tên chuyên mục</label>
              <input type="text" name="name" id="name" value="<?php echo $item['name'];?>"  />
           </div>
           <div class="field">
              <label>Mô tả ngắn</label>
              <textarea name="summary" id="summary" class="summary"><?php echo $item['summary'];?></textarea>
           </div>
           <div class="field">
              <label>Nội dung(trên nếu có)</label>
              <textarea name="content" id="content" class="content"><?php echo $item['content'];?></textarea>
           </div>
           <div class="field">
              <label>Nội dung dưới(dưới nếu có)</label>
              <textarea name="content2" id="content2" class="content2"><?php echo $item['content2'];?></textarea>
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
           <div class="field">
              <?php
                $list_style_in_catalog  = list_style_in_catalog(); 
              ?>
              <label>Kiểu hiển thị(chỉ áp dụng với dm chính)</label>
              <select name="style_in_catalog" class="form_control">
                <option value="0">Không yêu cầu</option>
                 <?php foreach ($list_style_in_catalog as $key => $value): ?>
                    <?php
                      $selected = $item['style_in_catalog'] == $key?'selected=""':'';
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                 <?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <?php
                $list_cung_hoang_dao  = list_cung_hoang_dao(); 
              ?>
              <label>Chọn cung (chỉ áp dụng với danh mục <b>cung hoàng đạo</b>)</label>
              <select name="note1" class="form_control">
                <option value="0">Không yêu cầu</option>
                 <?php foreach ($list_cung_hoang_dao as $key => $value): ?>
                    <?php
                      $selected = $item['note1'] == $key?'selected=""':'';
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $key; ?>">Cung hoàng đạo <?php echo $value; ?></option>
                 <?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <?php
                $get_position_menu  = get_position_menu();
              ?>
              <label>Chọn danh sách công cụ liên quan</label>
              <select name="tool_relation" class="form_control">
                <option value="0">Không yêu cầu</option>
                 <?php foreach ($get_position_menu as $key => $value): ?>
                    <?php if (isset($value['ds'])): ?>
                      <?php
                        $selected = $item['tool_relation'] == $value['name']?'selected=""':'';
                      ?>
                      <option <?php echo $selected; ?> value="<?php echo $value['name']; ?>">Danh sách <?php echo $value['title']; ?></option>
                    <?php endif ?>
                 <?php endforeach ?>
              </select>
           </div>
           <!-- sort -->
           <div class="field">
              <label>Thứ tự (No.1)</label>
              <input class="form_control" type="" name="sort" value="<?php echo $item['sort']; ?>">
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
      <div id="tabs-4">
        <h4>Điền đầy đủ từ trên xuống</h4>
         <div class="tabs_left">
           <div class="field">
              <label>Link con thứ 1 </label>
              <input type="text" name="link1" value="<?php echo $item['link1'];?>" placeholder="" />
              <i class="fa fa-warning"></i><input type="text" name="action_link1" value="<?php echo $item['action_link1'];?>" placeholder="Không điền vào đây" />
           </div>
           <div class="field">
              <label>Link con thứ 2 </label>
              <input type="text" name="link2" value="<?php echo $item['link2'];?>" placeholder="" />
              <i class="fa fa-warning"></i><input type="text" name="action_link2" value="<?php echo $item['action_link2'];?>" placeholder="Không điền vào đây" />
           </div>
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
    <script>
        CKEDITOR.replace( 'content2' );
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