<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<header class="header_control">
  <label>Tử vi ngày - Ý nghĩa ngũ hành</label>
  <ul>
     <li><a href="<?php echo base_url('admin/tuvingay_nguhanh/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/tuvingay_nguhanh/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/tuvingay_nguhanh/index');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th>ID</th>
                <th><span>Tên ngũ hành kết hợp</span></th>
                <th><span>Ý nghĩa</span></th>
                <th><span>Sửa</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/tuvingay_nguhanh/edit?id='.$val['id'].'&page='.$get['page']);
                   if($val['y_nghia'] == null)
                    $y_nghia = 'chưa có';
                   else
                    $y_nghia = '<a href="'.$edit_link.'">Xem chi tiết </a>';
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><?php echo $val['ngu_hanh_key'];?></td>
                <td><a href="<?php echo $edit_link;?>"><?php echo $val['ngu_hanh_name']; ?></a></td>
                <td><?php echo $y_nghia; ?></td>
              <td><a href="<?php echo $edit_link;?>">Sửa</a></td>
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