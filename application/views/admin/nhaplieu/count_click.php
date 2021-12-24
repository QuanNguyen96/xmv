<article>
<header class="header_control">
  <label>Số lần click các tuổi</label>
  <ul>
     <li><a href="#" class="button" onclick="">Xóa</a></li>
  </ul>
</header>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Tuổi</span></th>
                <th><span>Ngày</span></th>
                <th><span>Số lần click</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if (!empty($list)): ?>
                <?php foreach ($list as $key => $val): ?>
                  <tr>
                    <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                    <td><?php echo $val['name_click']; ?></td>
                    <td><?php echo $val['date_click']; ?></td>
                    <td><?php echo $val['total']; ?></td>
                  </tr>
                <?php endforeach ?>
            <?php endif ?>
         </tbody>
      </table> 
  </form>  
</article>              