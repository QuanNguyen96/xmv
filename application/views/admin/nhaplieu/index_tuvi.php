<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<header class="header_control">
  <label>Quản lý nội dung tử vi trọn đời</label>
  <ul>
     <li><a href="<?php echo base_url('admin/nhaplieu/add_tuvi');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/nhaplieu/delete_tuvi');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/nhaplieu/index_tuvi');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Năm sinh</span></th>
                <th><span>Can chi slug</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/nhaplieu/edit_tuvi?id='.$val['id'].'&page='.$get['page']);
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link;?>"><?php echo $val['namsinh']; ?></a></td>
                <td><?php echo $val['canchi_slug'] ?></td>
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