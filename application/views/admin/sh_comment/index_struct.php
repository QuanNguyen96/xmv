<?php
    $param = $_GET;
    $param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
    $sort_link  = current_url().'?'.http_build_query($param); 
    ?>
<article>
    <?php if( isset($success) && $success != '' ) echo $success; ?>
    <header class="header_control">
        <label>Quản lý Comment thực</label>
        <ul>
            <li><a href="<?php echo base_url('admin/sh_comment/index_struct');?>" class="button">Xem theo cấu trúc</a></li>
            <li><a href="<?php echo base_url('admin/sh_comment/index');?>" class="button">Xem theo mới nhất</a></li>
            <li><a href="<?php echo base_url('admin/sh_comment/add');?>" class="button">Thêm</a></li>
            <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/sh_comment/delete');?>');">Xóa</a></li>
        </ul>
    </header>
    <div class="fillter">
        <form name="fillter" action="" method="get">
            <ul>
                <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
                <li>
                    <select name="url">
                        <option value="">Chọn url</option>
                        <?php if ($url): ?>
                            <?php foreach ($url as $key => $value): ?>
                                <option value="<?php echo $value['url_id'] ?>"><?php echo $value['url_id']; ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </li>
                <li><button type="submit" name="" class="button">Lọc</button></li>
                <li><a href="<?php echo base_url('admin/sh_comment/index');?>" class="button">Hủy</a></li>
            </ul>
        </form>
    </div>
    <form name="adminForm" id="adminForm" action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                    <th><span>Nội dung hỏi</span></th>
                    <th><span>Hỏi tại</span></th>
                    <th><span>Trạng thái</span></th>
                    <th><span>User/Admin</span></th>
                    <th><span>Thời gian tạo</span></th>
                    <th><span>Control</span></th>
                </tr>
            </thead>
            <tbody>
                <?php if( !empty($list) ):
                    foreach( $list as $val ):
                    $edit_link = base_url('admin/sh_comment/edit?id='.$val['id'].'&page='.$get['page']);
                    $reAns = base_url('admin/sh_comment/addAns?id='.$val['id'].'&root_id='.$val['root_id'].'&page='.$get['page']);
                    ?>
                <tr>
                    <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                    <td><a href="<?php echo $edit_link; ?>"><?php echo $val['heading'] ?> <?php echo $val['content']; ?></a></td>
                    <td><?php echo $val['url_id']; ?></td>
                    <td><?php echo get_status($val['status']); ?></td>
                    <td><?php echo $val['is_admin']?'QTV':'USER'; ?></td>
                    <td><?php echo $val['created_date']; ?></td>
                    <td><a href="<?php echo $reAns; ?>">Trả lời sh_comment</a></td>
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