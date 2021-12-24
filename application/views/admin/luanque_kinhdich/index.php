<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<header class="header_control">
  <label>Quản lý seo link</label>
  <ul>
     <li><a href="<?php echo base_url('admin/luanque_kinhdich/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/luanque_kinhdich/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/luanque_kinhdich/index');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th>Tên quẻ</th>
                <th>Nghĩa tên quẻ</th>
                <th>Ngoại quái</th>
                <th>Nội quái</th>
                <th>Phân tích thoán từ</th>
                <th>Phân tích thoán truyện</th>
                <th>Sơ lược từng hào</th>
                <th>Ý nghĩa quẻ</th>
                <th>Tốt cho việc gì</th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/luanque_kinhdich/edit?id='.$val['id'].'&page='.$get['page']);
            ?>
             <tr>
                <td><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></td>
                <td><a href="<?php echo $edit_link;?>"><?php echo $val['tenque']; ?></a></td>
                <td><?php echo $val['nghia_tenque'];?></td>
                <td><?php echo $val['nghia_ngoai'];?></td>
                <td><?php echo $val['nghia_noi'];?></td>
                <td><?php echo word_limiter($val['phantich_thoantu'], 20, '...');?></td>
                <td><?php echo word_limiter($val['phantich_thoantruyen'], 20, '...');?></td>
                <td><?php echo word_limiter($val['soluoc'], 20, '...');?></td>
                <td><?php echo word_limiter($val['ynghia'], 20, '...');?></td>
                <td><?php echo word_limiter($val['totchoviec'], 20, '...');?></td>
                
             </tr>
            <?php endforeach; endif; ?> 
         </tbody>
      </table> 
  </form>  
  <div class="pagination">
    <div class="total_reco">Số bản ghi: <?php echo $total_recod;?></div>
    <?php echo $pagination; ?>
  </div>
</article>              