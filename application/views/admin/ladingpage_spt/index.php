<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/plugins/select2/css/select2.css'); ?>"> 
<script type="text/javascript" src="<?php echo base_url('templates/admin/plugins/select2/js/select2.js'); ?>"></script>
 <?php
$post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
?>
<article>
<?php if( isset($error) ) echo $error; ?>
<form name="adminForm" id="form" action="" method="post">
<header class="header_control">
  <label>Lading page Sim phong thủy</label>
  <ul>
     <li><a href="#" onclick="submit_form('<?php echo base_url('admin/ladingpage_spt/index?act=save_close');?>')" class="button">Lưu cài đặt</a></li>
     <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index');?>" class="button">Đóng</a></li>
  </ul>
</header>
<div id="tabs">
      <ul class="tabs_control">
        <li><a href="#tabs-1">Cài đặt nội dung</a></li>
        <li><a href="#tabs-2">Cài đặt bài viết</a></li>
        <li><a href="#tabs-3">Cài đặt SEO</a></li>
      </ul>
      <div id="tabs-1">
        <div class="tabs_left">
          <?php foreach ($arr_textarea as $key => $value):?>
          <div class="field">
              <label><?php echo $value;?></label>
               <textarea name="<?php echo $key;?>" id="<?php echo $key;?>">
               	<?php echo $item[$key];?>
               </textarea>
           </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div id="tabs-2">
        <div class="tabs_left">
           <div class="field">
              <label>Bài viết sim hợp tuổi</label>
              <?php 
                 $arr_bv_sim_hop_tuoi = $item['bv_sim_hop_tuoi'] != '' ? 
                 unserialize($item['bv_sim_hop_tuoi']) : array();
              ?> 
              <select name="bv_sim_hop_tuoi[]" class="select2" multiple="">
              	<option value="">Chọn bài viết</option>
              	<?php foreach ($list_article as $key => $value): 
                        $slt = in_array($value['id'], $arr_bv_sim_hop_tuoi) ? 'selected=""' : '';
              	?>
              	  <option value="<?php echo $value['id'];?>" <?php echo $slt;?>>
              	  	 <?php echo $value['name'];?>
              	  </option>
              	<?php endforeach ?>
              </select>
           </div>
           <div class="field">
              <label>Bài viết sim hợp mệnh</label>
              <?php 
                 $arr_bv_sim_hop_menh = $item['bv_sim_hop_menh'] != '' ? 
                 unserialize($item['bv_sim_hop_menh']) : array();
              ?> 
              <select name="bv_sim_hop_menh[]" class="select2" multiple="">
              	<option value="">Chọn bài viết</option>
              	<?php foreach ($list_article as $key => $value): 
                        $slt = in_array($value['id'], $arr_bv_sim_hop_menh) ? 'selected=""' : '';
              	?>
              	  <option value="<?php echo $value['id'];?>" <?php echo $slt;?>>
              	  	 <?php echo $value['name'];?>
              	  </option>
              	<?php endforeach ?>
              </select> 
           </div> 
           <div class="field">
              <label>Bài viết ý nghĩa số điện thoại</label>
              <?php 
                 $arr_bv_so_dien_thoai = $item['bv_so_dien_thoai'] != '' ? 
                 unserialize($item['bv_so_dien_thoai']) : array();
              ?> 
              <select name="bv_so_dien_thoai[]" class="select2" multiple="">
              	<option value="">Chọn bài viết</option>
              	<?php foreach ($list_article as $key => $value): 
                        $slt = in_array($value['id'], $arr_bv_so_dien_thoai) ? 'selected=""' : '';
              	?>
              	  <option value="<?php echo $value['id'];?>" <?php echo $slt;?>>
              	  	 <?php echo $value['name'];?>
              	  </option>
              	<?php endforeach ?>
              </select> 
           </div> 
           <div class="field">
              <label>Bài viết ý nghĩa số</label>
              <?php 
                 $arr_bv_y_nghia_so = $item['bv_y_nghia_so'] != '' ? 
                 unserialize($item['bv_y_nghia_so']) : array();
              ?> 
              <select name="bv_y_nghia_so[]" class="select2" multiple="">
              	<option value="">Chọn bài viết</option>
              	<?php foreach ($list_article as $key => $value): 
                        $slt = in_array($value['id'], $arr_bv_y_nghia_so) ? 'selected=""' : '';
              	?>
              	  <option value="<?php echo $value['id'];?>" <?php echo $slt;?>>
              	  	 <?php echo $value['name'];?>
              	  </option>
              	<?php endforeach ?>
              </select> 
           </div>  
        </div>
      </div>
      <div id="tabs-3">
        <div class="tabs_left">
           <div class="field">
              <label>Title</label>
              <input type="text" name="title" value="<?php echo $item['title'];?>" />
           </div>
           <div class="field">
              <label>Keywords</label>
               <textarea name="keywords"><?php echo $item['keywords'];?></textarea> 
           </div>
           <div class="field">
              <label>Description</label>
               <textarea name="description"><?php echo $item['description'];?></textarea> 
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
  <script type="text/javascript">
    var ckeditor_config = {
              base_url       : '<?php echo base_url(); ?>',
              connector_path : 'ckfinder/user/connector',
              html_path      : 'ckfinder/user/html' 
    }
  </script>

  <?php foreach ($arr_textarea as $key => $value):?>
  <script>
        CKEDITOR.replace( '<?php echo $key;?>' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
    </script>
  <?php endforeach; ?>   
      
<script type="text/javascript">
	$(document).ready(function() {
    $('.select2').select2({ 
      width: '100%',
      placeholder: "Lựa chọn bài viết",
        allowClear: true 
    });
});
</script>     