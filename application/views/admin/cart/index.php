<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<header class="header_control">
  <label>Quản lý đơn hàng</label>
  <ul>
     <li><a href="<?php echo base_url('admin/cart/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/cart/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/cart/index');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Số điện thoại</span></th>
                <th><span>Giá bán(đ)</span></th>
                <th><span>Tên khách hàng</span></th>
                <th><span>Liên hệ</span></th>
                <th><span>Địa chỉ</span></th>
                <th><span>Nội dung</span></th>
                <th><a href="<?php echo $sort_link; ?>">created date&nbsp;<i class="fa fa-sort-<?php echo $param['order'];?>" aria-hidden="true"></i></a></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/cart/edit?id='.$val['id'].'&page='.$get['page']);
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><?php echo $val['sim'];?></td>
                <td><?php echo number_format($val['giaban']*1000000);?></td>
                <td><?php echo $val['fullname'];?></td>
                <td><?php echo $val['phone'];?></td>
                <td><?php echo $val['address'];?></td>
                <td><?php echo $val['message'];?></td>
                <td><?php echo date('G:i - j/n/Y',$val['created_date']);?></td>
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