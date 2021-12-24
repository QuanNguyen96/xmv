<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?&ac=save';
$link_save_close = $post_url.'?&ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
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
        <li><a href="#tabs-3">Cấu hình nâng cao</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field" id="field_title">
              <label>Tên chuyên mục</label>
              <input type="text" name="name" id="name" value="<?php echo set_value('name');?>"/>
           </div>
           <div class="field">
              <label>Mô tả ngắn</label>
              <textarea name="summary" id="summary" class="summary"><?php echo set_value('summary');?></textarea>
           </div>
           <div class="field">
              <label>Nội dung ( Nội dung trên nếu có )</label>
              <textarea name="content" id="demo" class="demo"><?php echo set_value('content'); ?></textarea>
           </div>
           <div class="field">
              <label>Nội dung dưới ( Nội dung dưới nếu có )</label>
              <textarea name="content2" id="demo2" class="demo2"><?php echo set_value('content2'); ?></textarea>
           </div>
           
        </div>
        <div class="tabs_right">
           <div class="field">
              <label>Chọn module</label>
              <select name="module" id="module" class="form_control" onchange="select_module()">
                <option value="">Chọn module</option>
                <?php foreach( $module as $val ): ?>
                  <option value="<?php echo $val['name'];?>"><?php echo $val['title'];?></option>
                <?php endforeach; ?>
              </select>
           </div>
           <script type="text/javascript">
                function select_module(){
                    var module = document.getElementById("module").value;
                    $('#hyperlink').remove();
                    if( module == 'hyperlink' || module == 'single' )
                    {
                        $('#cmc').hide();
                        if( module == 'hyperlink' )
                        {
                            var hyperlink ='<div class="field" id="hyperlink"><label>Nhập link liên kết</label><input type="text" name="hyperlink"/></div>';
                            $('#cmc').after(hyperlink);
                        }
                    }
                    else
                    {
                        $('#cmc').show();
                        $.ajax({
                			url: '<?php echo base_url('admin/menu/ajax_get_menu_module') ?>', 
                			type: 'POST',
                			dataType: 'json', 
                			data: {module:module},
                			beforeSend: function() {
                			},
                			success: function(data) {
                               $('#parent').html(data.result);
                			},
                			error: function(e) {
                				console.log(e)
                			}
                		  });
                    }
                }
            </script>
           <div class="field" id="cmc">
              <label>Chọn chuyên mục cha</label>
              <select name="parent" id="parent" class="form_control" onchange="select_parent()">
                <option value="0"> Là chuyên mục gốc</option>
              </select>
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
           <div class="field position">
              <label>Chọn vị trí hiển thị</label>
              <ul class="position" id="position">
                <?php if( !empty( $position ) ):
                        foreach( $position as $val ):
                 ?>
                 <li><input type="checkbox" value="<?php echo $val['name'];?>" name="position[]" />&nbsp; <span><?php echo ucfirst($val['title']);?></span></li>
                 <?php endforeach; endif; ?>
              </ul>
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
              <?php
                $list_style_in_catalog  = list_style_in_catalog(); 
              ?>
              <label>Kiểu hiển thị(chỉ áp dụng với dm chính)</label>
              <select name="style_in_catalog" class="form_control">
                <option value="0">Không yêu cầu</option>
                 <?php foreach ($list_style_in_catalog as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
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
                    <option value="<?php echo $key; ?>">Cung hoàng đạo <?php echo $value; ?></option>
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
                      <option value="<?php echo $value['name']; ?>">Danh sách <?php echo $value['title']; ?></option>
                    <?php endif ?>
                 <?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <label>Thứ tự (No.1)</label>
              <input class="form_control" type="" name="sort" value="<?php echo set_value('sort'); ?>">
           </div>
        </div>
      </div>
      <div id="tabs-2">
         <div class="tabs_left">
           <div class="field">
              <label>Tiêu đề (title)</label>
              <input type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Mặc định lấy tiêu đề bài viết" />
           </div>
           <div class="field">
              <label>Từ khóa (keywords)</label>
              <textarea name="keywords" id="keywords" class=""><?php echo set_value('keywords'); ?></textarea>
           </div>
           <div class="field">
              <label>Mô tả (description)</label>
              <textarea name="description" id="description" class=""><?php echo set_value('description'); ?></textarea>
           </div>
           <div class="field">
              <label>Robot (follow/nofollow)</label>
              <select name="follow" class="form_control">
                 <option value="1" <?php echo set_select('follow',1) ?> >follow/index</option>
                 <option value="0" <?php echo set_select('follow',0) ?>>nofollow/noindex</option>
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
              <input type="text" name="link1" value="" placeholder="" />
              <i class="fa fa-warning"></i><input type="text" name="action_link1" value="" placeholder="Không điền vào đây" />
           </div>
           <div class="field">
              <label>Link con thứ 2 </label>
              <input type="text" name="link2" value="" placeholder="" />
              <i class="fa fa-warning"></i><input type="text" name="action_link2" value="" placeholder="Không điền vào đây" />
           </div>
        </div>
      </div>
      <div id="tabs-3">
         <div class="tabs_left">
           <div class="field">
              <label>Đường dẫn tĩnh</label>
              <input type="text" name="router" value="" placeholder="Chỉ dành cho kỹ thuật" />
           </div>
           <div class="field">
              <label>Filter Url</label>
              <input type="text" name="filter_router" value="" placeholder="Chỉ dành cho kỹ thuật" />
           </div>
        </div>
      </div>
</div>
<input type="hidden" name="id" value="" /> 
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
        CKEDITOR.replace( 'demo2' );
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