<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<?php if( isset($error) && $error != '' ) echo $error; ?>
<header class="header_control">
  <label>Quản lý slide</label>
  <ul>
     <li><a href="<?php echo base_url('admin/slide/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/slide/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/slide/index');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Tiêu đề</span></th>
                <th><span>Hình ảnh</span></th>
                <th><span>vị trí</span></th>
                <th><a href="<?php echo $sort_link; ?>">Ngày cập nhật&nbsp;<i class="fa fa-sort-<?php echo $param['order'];?>" aria-hidden="true"></i></a></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/slide/edit?id='.$val['id'].'&page='.$get['page']);
                   $dir_img = MEDIAPATH.'/images/slide/'.$val['image'];
                   $img = is_file( $dir_img ) ? base_url('media/images/slide/_thumbs/Images/'.$val['image']) : base_url('templates/admin/images/no-image.png');
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link; ?>"><?php echo $val['name'];?></a></td>
                <td><a href="<?php echo $edit_link; ?>"><img src="<?php echo $img;?>" /></a></td>
                <td style="text-align: center;"><input type="text" value="<?php echo $val['orders'];?>" style="width:50px" disabled="true" /></td>
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