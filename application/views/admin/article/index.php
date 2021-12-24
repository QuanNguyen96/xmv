<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<?php if( isset($error) && $error != '' ) echo $error; ?>
<header class="header_control">
  <label>Quản lý bài viết</label>
  <ul>
     <li><a href="<?php echo base_url('admin/article/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/article/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/article/index');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Tiêu đề bài viết</span></th>
                <th><span>Chuyên mục</span></th>
                <th><span>Thứ tự</span></th>
                <th><a href="<?php echo $sort_link; ?>">Ngày tạo&nbsp;<i class="fa fa-sort-<?php echo $param['order'];?>" aria-hidden="true"></i></a></th>
                <th><span>Người tạo</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/article/edit?id='.$val['id'].'&page='.$get['page']);
                   $edit_name = $val['state'] == 0 ? $val['name'].'<i class="nhap">(bản nháp)</i>' : $val['name']; 
                   $parent_link = base_url( 'admin/article/index?category='.$val['parent'] );
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link;?>"><?php echo $edit_name; ?></a></td>
                <td><a href="<?php echo $parent_link;?>"><?php echo $val['chuyenmuc'];?></a></td>
                <td><input type="text" name="" value="<?php echo $val['orders'];?>" style="width:50px; height:30px; border:1px solid #ccc;text-align: center;" /></td>
                <td><?php echo date('G:i - j/n/Y',$val['created_date']);?></td>
                <td><?php echo $val['created_by'];?></td>
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