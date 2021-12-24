<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<header class="header_control">
  <label>Quản lý thông tin người dùng click xem lá số tử vi</label>
    <ul>
    <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/nhaplieu/delete_infouser');?>');">Xóa</a></li>
    <li><a href="" class="button" onclick="">Xuất Excel</a></li>
    </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/nhaplieu/index_info_lasotuvi');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Link</span></th>
                <th><span>Text</span></th>
                <th><span>Click</span></th>
                <th><span>Năm sinh</span></th>
                <th><span>Ngày</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                foreach( $list as $key => $val ): 
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><?php echo $val['url']; ?></td>
                <td><?php echo $val['text']; ?></td>
                <td><?php echo $val['total']; ?></td>
                <td><?php echo $val['namsinh']; ?></td>
                <td><?php echo date('j-n-Y H:i:s',$val['date_create']); ?></td>
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