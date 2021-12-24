<?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );

$link_save = $post_url.'?ac=save';
$link_save_close = $post_url.'?ac=save_close';
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Thêm bài viết xông đất</label>
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
          <div class="field" id="field_slug">
              <label>Đường dẫn (link: <?php echo base_url();?><span class="slug"></span>)</label>
              <input type="text" name="link" id="slug" value="" placeholder="" />
           </div>
           <div class="field">
              <label>Tiêu đề</label>
              <input type="text" name="title" value="" placeholder="" />
           </div>
           <div class="field">
              <label>Năm sinh</label>
              <select name="nam_sinh" class="form_control">
                <option value="">Chọn năm sinh</option>
                <?php for ($i=1950; $i < 2010 ; $i++):?>
                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>  
              </select>
           </div>
           <div class="field">
              <label>Năm xem</label>
              <select name="nam_xem" class="form_control">
                <option value="">Chọn năm xem</option>
                <?php for ($i=2020; $i < 2025 ; $i++):?>
                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>  
              </select>
           </div>
           <div class="field">
              <label>Chi năm</label>
              <select name="dia_chi" class="form_control">
                 <option value="">Chọn chi năm</option>  
                 <?php foreach ($dia_chi as $key => $value): ?>
                   <option value="<?php echo $key; ?>"><?php echo $value; ?></option> 
                 <?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <label>Giới tính</label>
              <select name="gioi_tinh" class="form_control">
                 <option value="1">Nam</option> 
                 <option value="2">Nữ</option> 
              </select>
           </div>
        </div>
        <div class="tabs_right">
           
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

       