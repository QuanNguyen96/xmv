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
  <label>Sửa bài viết xông đất</label>
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
              <input type="text" name="link" id="slug" value="<?php echo $item['link'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Tiêu đề</label>
              <input type="text" name="title" value="<?php echo $item['title'];?>" placeholder="" />
           </div>
           <div class="field">
              <label>Năm sinh</label>
              <select name="nam_sinh" class="form_control">
                <option value="">Chọn năm sinh</option>
                <?php for ($i=1950; $i < 2010 ; $i++):
                       $slt = $i == $item['nam_sinh'] ? 'selected=""' : '';   
                ?>
                   <option value="<?php echo $i; ?>" <?php echo $slt;?>><?php echo $i; ?></option>
                <?php endfor; ?>  
              </select>
           </div>
           <div class="field">
              <label>Năm xem</label>
              <select name="nam_xem" class="form_control">
                <?php for ($i=2020; $i < 2025 ; $i++):
                        $slt = $i == $item['nam_xem'] ? 'selected=""' : '';    
                ?>
                   <option value="<?php echo $i; ?>" <?php echo $slt;?> ><?php echo $i; ?></option>
                <?php endfor; ?>  
              </select>
           </div>
           <div class="field">
              <label>Chi năm</label>
              <select name="dia_chi" class="form_control">
                 <option value="">Chọn chi năm</option>  
                 <?php foreach ($dia_chi as $key => $value): 
                     $slt = $item['dia_chi'] ==  $key ? 'selected=""':'';
                 ?>
                   <option value="<?php echo $key; ?>" <?php echo $slt; ?>><?php echo $value; ?></option> 
                 <?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <label>Giới tính</label>
              <select name="gioi_tinh" class="form_control">
                 <option value="">Chọn giới tính</option>
                 <?php foreach ($gioi_tinh as $key => $value): 
                     $slt = $item['gioi_tinh'] ==  $key ? 'selected=""':'';  
                 ?>
                    <option value="<?php echo $key; ?>" <?php echo $slt; ?>><?php echo $value; ?></option> 
                 <?php endforeach ?>
              </select>
           </div>
        </div>
        <div class="tabs_right">
           
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

  