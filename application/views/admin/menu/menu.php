<?php
$param = $_GET;
$edit_param =  http_build_query($param);
$param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
$sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
<?php if( isset($success) && $success != '' ) echo $success; ?>
<header class="header_control">
  <label>Quản lý Menu</label>
  <ul>
     <li><a href="<?php echo base_url('admin/menu/add');?>" class="button">Thêm</a></li>
     <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/menu/delete');?>');">Xóa</a></li>
  </ul>
</header>
<div class="fillter">
   <form name="fillter" action="" method="get"> 
     <ul>
        <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
        <li>
             <select name="module">
                <option value="">Lọc theo Module</option>
                <?php foreach($module as $val): 
                         $mslt = $val['name'] == $get['module'] ? 'selected=""' : '';
                ?>
                   <option value="<?php echo $val['name'];?>" <?php echo $mslt;?> ><?php echo $val['title'];?></option>
                <?php endforeach;?>
             </select>
        </li>
        <li>
             <select name="position">
               <option value="">Lọc theo Vị trí hiển thị</option>
               <?php foreach($position as $val): 
                       $pslt = $val['name'] == $get['position'] ? 'selected=""' : '';
               ?>
                   <option value="<?php echo $val['name'];?>" <?php echo $pslt;?> ><?php echo 'Vị trí '. $val['title'];?></option>
                <?php endforeach;?>
             </select>
        </li>
        <li><button type="submit" name="" class="button">Lọc</button></li>
        <li><a class="button" href="<?php echo base_url('admin/menu/index');?>">Hủy</a></li>
     </ul>
    </form>  
  </div>
  <form name="adminForm" id="adminForm" action="" method="post">
      <table class="table">
         <thead>
            <tr>
                <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                <th><span>Tiêu đề</span></th>
                <th><a href="<?php echo $sort_link; ?>">Ngày tạo&nbsp;<i class="fa fa-sort-<?php echo $param['order'];?>" aria-hidden="true"></i></a></th>
                <th><span>Người tạo</span></th>
            </tr>
         </thead>
         <tbody>
            <?php if( !empty($list) ):
                   $char ='';
                   foreach( $list as $val ):
                   $edit_link = base_url('admin/menu/edit?id='.$val['id'].'&'.$edit_param);
                   $edit_name = $val['state'] == 0 ? $val['name'].'<i class="nhap">(bản nháp)</i>' : $val['name']; 
                   if( $val['level'] > 0 ){
                      for( $i = 0; $i<= $val['level']; $i++ ){
                         $char.='---';
                      }
                   }
            ?>
             <tr>
                <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                <td><a href="<?php echo $edit_link;?>"><?php echo $char .' '. $edit_name; ?></a></td>
                <td><?php echo date('G:i - j/n/Y',$val['created_date']);?></td>
                <td><?php echo $val['created_by'];?></td>
             </tr>
            <?php $char =''; endforeach; endif; ?> 
         </tbody>
      </table> 
      <input type="hidden" name="module" value="<?php echo $get['module'];?>" />
      <input type="hidden" name="position" value="<?php echo $get['position'];?>" />
  </form>  
  <div class="pagination">
    <div class="total_reco">Số bản ghi: <?php echo $total_recod;?></div>
    <?php echo $pagination; ?>
  </div>
</article>             