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
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
           <div class="field" id="field_title">
              <label>Tên sản phẩm</label>
              <input type="text" name="name" id="name" value="<?php echo set_value('name');?>"/>
           </div>
           <div class="field" id="field_title">
              <label>Giá nhập: vnđ</label>
              <input type="text" name="gianhap" id="gianhap" value="<?php echo set_value('gianhap');?>" style="width:150px" onkeyup="formatnumber('gianhap')"/>
           </div>
           <div class="field" id="field_title">
              <label>Giá bán: vnđ</label>
              <input type="text" name="giaban" id="giaban" value="<?php echo set_value('giaban');?>" style="width:150px" onkeyup="formatnumber('giaban')"/>
           </div>
           <div class="field" id="field_title">
              <label>Số lượng và size:</label>
              <ul class="size_soluong" data="1">
                 <li class="size" id="size1"> 
                    <span>Size:</span><input type="text" name="size[]" value="" style="width:60px" />
                    <span>Số lượng:</span><input type="text" name="soluong[]" value="" style="width:60px" />
                 </li>
              </ul>
              <br />
              <button type="button" class="add_size"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm size</button>
           </div>
        </div>
        <div class="tabs_right">
           <div class="field">
              <label>Chọn lô nhập</label>
              <select name="lohang" class="form_control">
                 <option value="">Chọn lô nhập</option>
              </select>
           </div>
           <div class="field">
              <label>Ảnh đại diện & Ảnh sản phẩm</label>
              <input id="xFilePath" name="avatar" type="hidden" size="60" />
              <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
              <div class="avatar" id="avatar"></div>
           </div>
        </div>
      </div>
</div>
</form>
</article>  
  <script type="text/javascript">
    $(function(){
        $('.add_size').click(function(){
               var curent_id  = parseInt($('.size_soluong').attr('data'));
               var new_curent = curent_id + 1;
               var new_id    = 'size'+ new_curent;
               var newhtml = '<li class="size" id="size'+new_curent+'"><br/><span>Size:</span><input type="text" name="size[]" value="" style="width:60px" />  <span>Số lượng:</span><input type="text" name="soluong[]" value="" style="width:60px" /><button class="remove_size" type="button" data="'+new_curent+'" onclick="remove_size(\''+new_id+'\')" ><i class="fa fa-times" aria-hidden="true"></i></button></li>';
               $('.size_soluong').append(newhtml);
               $('.size_soluong').attr('data',new_curent);
        });
    });
    function remove_size(id){
              $('#'+id).remove();
    }
    function formatnumber(id){
                var text = $('#'+id).val();
                text = text.replace(/[.]/g, '');
                text = text.replace(/[a-zA-Z]/g, '');
                var length = text.length;
                var new_number = '';
                if( length > 3 )
                {
                   for( i = 0; i < length; i++ )
                    {
                        if( i % 3 == 0 && i != length  )
                        {
                            new_number = text.substr(-3, 3) + '.' + new_number;
                            var new_length = text.length - 3;
                            text       = text.substr(0, new_length);
                        }
                    }
                    if( text.length < 3 )
                    {
                       new_number = new_number.substr( 0, new_number.length - 1 );
                    }
                    
                }
                else
                {
                   new_number =  text;
                }
                $('#'+id).val(new_number);
    }
  </script>
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
    $('#avatar').html(html);
}
</script>            