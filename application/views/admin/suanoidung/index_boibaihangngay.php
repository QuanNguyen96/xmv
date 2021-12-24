<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link      = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<?php if( isset($error) && $error != '' ) echo $error; ?>
<header class="header_control">
  <label>Quản lý nội dung bói bài hàng ngày</label>
  <ul>
     <li><a href="<?php echo base_url('admin/suanoidung/add_boibaihangngay');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/suanoidung/delete_boibaihangngay');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Tìm theo tên cặp bài..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/suanoidung/index_boibaihangngay');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Cặp bài</span></th>
                <th><span>Luận</span></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($list as $key => $value): ?>
              <?php  $edit_link = base_url('admin/suanoidung/edit_boibaihangngay?id='.$value['id'].'&page='.$get['page']); ?>
              <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $value['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link; ?>"><?php echo $value['doi']; ?></a></td>
                <td><?php echo $value['luan']; ?></td>
              </tr>
            <?php endforeach ?>
         </tbody>
      </table> 
  </form>  
  <div class="pagination">
    <div class="total_reco">Số bản ghi: <?php echo $total_recod;?></div>
    <?php echo $pagination; ?>
  </div>
</article>              