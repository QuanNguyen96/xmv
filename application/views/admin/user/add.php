<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?ac=save';
$link_save_close = $post_url.'?ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm quản trị viên</label>
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
              <label>Tên quản trị viên</label>
              <input type="text" name="fullname" id="name" value="<?php echo set_value('fullname');?>"  />
           </div>
           <div class="field" id="field_title">
              <label>Email đăng nhập</label>
              <input type="text" name="email" id="name" value="<?php echo set_value('email');?>"  />
           </div>
           <div class="field" id="field_title">
              <label>Mật khẩu</label>
              <input type="password" name="password" id="name" value="" class="height_25"  />
           </div>
           <div class="field" id="field_title">
              <label>Nhập lại mật khẩu</label>
              <input type="password" name="r_password" id="name" value="" class="height_25"  />
           </div>
           <?php if( $this->admin_auth->get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->admin_auth->get_root_email()):?>
           <div class="field" id="field_title">
              <label>Quyền sửa/xóa nội dung của người khác</label>
              <input type="radio" name="edit_delete" value="0" checked="" /> <span>Không</span> &nbsp;&nbsp;&nbsp;
              <input type="radio" name="edit_delete" value="1"/> <span>Có</span>
           </div>
           <?php endif; ?>
           <div class="field" id="field_title">
              <label>Nhóm quản trị</label>
              <?php if( !empty( $manage ) ): ?>
               <ul class="nqt">
                 <?php foreach( $manage as $val ): ?>
                    <li><input type="checkbox" name="manage[]" value="<?php echo $val['id'];?>" /><span><?php echo $val['name'];?></span></li>
                 <?php endforeach; ?>
               </ul>
              <?php endif; ?>
           </div>
        </div>
        <div class="tabs_right">
           <div class="field">
              <label>Trạng thái</label>
              <select name="state" class="form_control">
                 <option value="1" <?php echo set_select('state',0) ?>>Kích hoạt</option>
                 <option value="0" <?php echo set_select('state',0) ?>>Không kích hoạt</option>
              </select>
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