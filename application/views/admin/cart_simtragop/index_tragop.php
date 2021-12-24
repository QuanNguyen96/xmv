<?php
    $param = $_GET;
    $param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
    $sort_link  = current_url().'?'.http_build_query($param); 
?>
<article>
    <?php if( isset($success) && $success != '' ) echo $success; ?>
    <header class="header_control">
        <label>Quản lý  Đơn hàng mua trả góp</label>
        <ul>
            
        </ul>
    </header>
    <div class="fillter">
        <form name="fillter" action="" method="get">
            <ul>
                <li><input class="form-control" type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tên / SĐT (khách hàng)" /></li>
                <li><button type="submit" name="" class="button">Lọc</button></li>
                <li><a href="<?php echo base_url('admin/cart/index_tragop');?>" class="button">Hủy</a></li>
            </ul>
        </form>
    </div>
    <form name="adminForm" id="adminForm" action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                    <th><span>Họ tên KH</span></th>
                    <th><span>Đặt sim số</span></th>
                    <th><span>Giá bán</span></th>
                    <th><span>Thời hạn trả góp</span></th>
                    <th><span>Lãi Suất</span></th>
                    <th><span>Số tiền trả trước</span></th>
                    <th><span>Tiền trả hàng tháng</span></th>
                    <th><span>Ngày đặt hàng</span></th>
                    <th><span>Tình trạng đơn hàng</span></th>
                </tr>
            </thead>
            <tbody>
                <?php if( !empty($list) ):
                    foreach( $list as $val ):
                        $edit_link = base_url('admin/cart/edit_tragop?id='.$val['id'].'&page='.$get['page']);
                    ?>
                    <tr>
                        <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                        <td><a href="<?php echo $edit_link;?>"><?php echo $val['ho_ten']; ?></a></td>
                        <td><?php echo $val['sim']; ?></td>
                        <td><?php echo number_format($val['giaban']);?></td>
                        <td><?php echo $val['thoihan_tragop'].' Tháng';?></td>
                        <td><?php echo $val['lai_suat'].' %';?></td>
                        <td><?php echo number_format($val['tien_tratruoc']);?></td>
                        <td><?php echo $val['tien_tra_hang_thang'].' đ';?></td>
                        <td><?php echo date('j/n/Y',$val['ngay_dat_hang']);?></td>
                        <td><?php if( $val['tinh_trang_donhang']== 0){echo 'Chưa giao dịch';} else{echo 'Đã hoàn thành';}?></td>
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