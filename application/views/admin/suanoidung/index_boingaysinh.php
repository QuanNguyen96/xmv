<?php
$param = $_GET;
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link      = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<?php if( isset($error) && $error != '' ) echo $error; ?>
<header class="header_control">
  <label>Quản lý nội dung bói ngày sinh</label>
  <ul>
     <li><a href="<?php echo base_url('admin/suanoidung/add_boingaysinh');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/suanoidung/delete_boingaysinh');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Tìm theo tên cung..." /></li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a href="<?php echo base_url('admin/suanoidung/index_boingaysinh');?>" class="button">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Cung</span></th>
                <th><span>Số hên</span></th>
                <th><span>Nguyên tố</span></th>
                <th><span>Phẩm chất</span></th>
                <th><span>Tính chất</span></th>
                <th><span>Tính cách điển hình</span></th>
                <th><span>Bất lợi</span></th>
                <th><span>Tính cách</span></th>
                <th><span>Tình yêu</span></th>
                <th><span>Súc khỏe</span></th>
                <th><span>Gia đình</span></th>
                <th><span>Sự nghiệp</span></th>
                <th><span>Tổng quát</span></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($list as $key => $value): ?>
              <?php 
                $edit_link = base_url('admin/suanoidung/edit_boingaysinh?id='.$value['id'].'&page='.$get['page']);
               ?>
              <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $value['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link; ?>"><?php echo $value['cung']; ?></a></td>
                <td><?php echo $value['sohen']; ?></td>
                <td><?php echo $value['nguyento']; ?></td>
                <td><?php echo $value['phamchat']; ?></td>
                <td><?php echo $value['tinhchat']; ?></td>
                <td><?php echo $value['tinhcachdienhinh']; ?></td>
                <td><?php echo $value['batloi']; ?></td>
                <td><?php echo $value['tinhcach']; ?></td>
                <td><?php echo $value['tinhyeu']; ?></td>
                <td><?php echo $value['suckhoe']; ?></td>
                <td><?php echo $value['giadinh']; ?></td>
                <td><?php echo $value['sunghiep']; ?></td>
                <td><?php echo $value['tongquat']; ?></td>
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