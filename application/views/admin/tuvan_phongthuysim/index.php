<?php
    $param = $_GET;
    $param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
    $sort_link  = current_url().'?'.http_build_query($param); 
    ?>
<article>
    <?php if( isset($success) && $success != '' ) echo $success; ?>
    <header class="header_control">
        <label>Quản lý Tv</label>
        <ul>
            <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/tuvan_phongthuysim/delete');?>');">Xóa</a></li>
        </ul>
    </header>
    <div class="fillter">
        <form name="fillter" action="" method="get">
            <ul>
                <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
                <li><button type="submit" name="" class="button">Lọc</button></li>
                <li><a href="<?php echo base_url('admin/tuvan_phongthuysim/index');?>" class="button">Hủy</a></li>
            </ul>
        </form>
    </div>
    <form name="adminForm" id="adminForm" action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                    <th><span>Name</span></th>
                    <th><span>Ngày sinh</span></th>
                    <th><span>Tháng sinh</span></th>
                    <th><span>Năm sinh</span></th>
                    <th><span>giờ sinh</span></th>
                    <th><span>giới tính</span></th>
                    <th><span>SDT hiện tại</span></th>
                    <th><span>SDT muốn xem</span></th>
                    <th><span>Thời gian nhập</span></th>
                </tr>
            </thead>
            <tbody>
                <?php if( !empty($list) ):
                    foreach( $list as $val ):
                    $edit_link = base_url('admin/tuvan_phongthuysim/edit?id='.$val['id'].'&page='.$get['page']);
                    ?>
                <tr>
                    <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                    <td><a href="<?php echo $edit_link;?>"><?php echo $val['name']; ?></a></td>
                    <td><?php echo $val['ngaysinh']; ?></td>
                    <td><?php echo $val['thangsinh']; ?></td>
                    <td><?php echo $val['namsinh']; ?></td>
                    <td><?php echo $val['giosinh']; ?></td>
                    <td><?php echo $val['gioitinh']; ?></td>
                    <td><?php echo $val['phone_now']; ?></td>
                    <td><?php echo $val['phone_view']; ?></td>
                    <td><?php echo $val['created_date']; ?></td>
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