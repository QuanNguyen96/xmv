<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<?php if( isset($error) && $error != '' ) echo $error; ?>
<header class="header_control">
  <label>Quản lý quản trị viên</label>
  <ul>
     <li><a href="<?php echo base_url('admin/user/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/user/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/user/index');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Tên người quản trị</span></th>
                <th><span>Email</span></th>
                <th><span>Nhóm quản trị</span></th>
                <th><span>Người tạo</span></th>
                <th><a href="<?php echo $sort_link; ?>">Ngày tạo&nbsp;<i class="fa fa-sort-<?php echo $param['order'];?>" aria-hidden="true"></i></a></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/user/edit?id='.$val['id'].'&page='.$get['page']);
                   $manage = '';
                   foreach( $val['manage'] as $val1 )
                   {
                    $manage.='<a href=""><i class="fa fa-users"></i>&nbsp;&nbsp;'.$val1['name'].'</a>&nbsp;&nbsp;&nbsp;';
                   }
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link;?>"><?php echo $val['fullname']; ?></a></td>
                <td><span><?php echo $val['email'];?></span></td>
                <td><?php echo $manage; ?></td>
                <td><?php echo $val['created_by'];?></td>
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