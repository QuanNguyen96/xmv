<article>
<header class="header_control">
  <label>Thông tin mã code và thời gian người dùng nhập</label>
  <ul>
     <li><a href="#" class="button" onclick="">Xóa</a></li>
     <li><a href="<?php echo base_url('admin/nhaplieu/export_excel_info_code'); ?>" class="button" onclick="">Xuất Excel</a></li>
  </ul>
</header>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Link</span></th>
                <th><span>Code</span></th>
                <th><span>Ngày nhập</span></th>
                <th><span>Tổng/ngày</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if (!empty($list)): ?>
                <?php foreach ($list as $key => $val): ?>
                  <tr>
                    <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                    <td><?php echo $val['url']; ?></td>
                    <td><?php echo $val['code']; ?></td>
                    <td><?php echo date('j-n-Y',$val['date']); ?></td>
                    <td><?php echo $val['total']; ?></td>
                  </tr>
                <?php endforeach ?>
            <?php endif ?>
         </tbody>
      </table> 
  </form>  
</article>              