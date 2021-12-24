<?php echo $this->my_message->get_flash_message(); ?>
<form name="adminForm" id="form" action="" method="post">
<div class="list_user">
    <div class="content_header">
      <h3><i class="fa fa-th"></i>Danh sách Tài khoản</h3>
      <ul class="content_control">
         <li><a href="<?php echo base_url('_qlthemtaikhoan'); ?>"><i class="fa fa-pencil-square"></i><span>Thêm mới</span></a></li>
         <li><a href="#" class="red" onclick="submit_form('<?php echo base_url('_qlxoataikhoan'); ?>');" ><i class="fa fa-trash"></i><span>Xóa</span></a></li>
         <li><a href="<?php echo base_url('quanly'); ?>" class="red"><i class="fa fa-times-circle"></i><span>Đóng</span></a></li>
      </ul>
    </div> 
    <div class="content_list">
      <table>
           <thead>
               <tr>
                   <th width="2%"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                   <th width="20%"><span>Tên quản trị</span></th>
                   <th width="20%"><span>email</span></th>
                   <th width="35%"><span>Nhóm quản trị</span></th>
                   <th width="8%"><span>Ngày tạo</span></th>
                   <th width="8%"><span>Người tạo</span></th>
                   <th width="7%"><span>Trạng thái</span></th>
               </tr>
           </thead>
           <tbody>
               <?php if( !empty( $list ) ): 
                      foreach( $list as $key => $val ):
                         if( $val['state'] == 1 ){
                            $stt = '<i class="fa fa-plus-circle publish" title="Đã kích hoạt"></i>';
                          } else{
                             $stt = '<i class="fa fa-minus-circle un_publish" title="Chưa kích hoạt"></i>'; 
                          }
               ?>
               <tr>
                  <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                  <td>
                      <a href="<?php echo base_url('_qlsuataikhoan/'.$val['id']);?>" title="Click để sửa">
                      <span><?php echo $val['fullname']; ?></span>
                      </a>
                  </td>
                  <td><?php echo $val['email']; ?></td>
                  <td>
                      <?php echo $val['group_manager'];?>
                  </td>
                  <td><span><?php echo date('G:i - j/n/Y',$val['created_date']);?></span></td>
                  <td><span><?php echo $val['created_by']; ?></span></td>
                  <td><span><?php echo $stt; ?></span></td>
               </tr>
               <?php endforeach; endif; ?>
               
           </tbody>
       </table>
    </div>
    <div class="content_foot">
        <div class="pagination">
        <?php echo $pagination; ?>
        </div>
    </div>
</div>
<input type="hidden" name="page" value="<?php echo $page; ?>" />
</form>