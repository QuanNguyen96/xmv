<?php
    $param = $_GET;
    $param['order'] = !isset($param['order']) || $param['order'] == 'desc' ? 'asc' : 'desc';
    $sort_link  = current_url().'?'.http_build_query($param); 
    ?>
<article>
    <?php if( isset($success) && $success != '' ) echo $success; ?>
    <header class="header_control">
        <label>Quản lý Comment</label>
        <ul>
            <li><a href="<?php echo base_url('admin/comment/add');?>" class="button">Thêm</a></li>
            <li><a href="#" class="button" onclick="submit_form('<?php echo base_url('admin/comment/delete');?>');">Xóa</a></li>
        </ul>
    </header>
    <div class="fillter">
        <form name="fillter" action="" method="get">
            <ul>
                <li><input type="text" name="key" value="<?php echo $get['key'];?>" placeholder="Nhập tiêu đề cần tìm..." /></li>
                <li>
                    <select name="url">
                        <option value="">Chọn comment</option>
                        <?php if ($url): ?>
                            <?php foreach ($url as $key => $value): ?>
                                <option value="<?php echo $value['url'] ?>"><?php echo $value['url']; ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </li>
                <li><button type="submit" name="" class="button">Lọc</button></li>
                <li><a href="<?php echo base_url('admin/comment/index');?>" class="button">Hủy</a></li>
            </ul>
        </form>
    </div>
    <form name="adminForm" id="adminForm" action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th class="text_center"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();"/></th>
                    <th><span>Name</span></th>
                    <th><span>Nội dung hỏi</span></th>
                    <th><span>Hỏi tại</span></th>
                    <th><span>Control</span></th>
                </tr>
            </thead>
            <tbody>
                <?php if( !empty($list) ):
                    foreach( $list as $val ):
                    $edit_link = base_url('admin/comment/edit?id='.$val['id'].'&page='.$get['page']);
                    $reAns = base_url('admin/comment/addAns?id='.$val['id'].'&page='.$get['page']);
                    ?>
                <tr>
                    <td><span><input type="checkbox" name="cid[]" value="<?php echo $val['id']; ?>" class="cid" /></span></td>
                    <td><a href="<?php echo $edit_link;?>"><?php echo $val['heading'] ?> <?php echo $val['name']; ?></a></td>
                    <td><?php echo $val['content']; ?></td>
                    <td><?php echo $val['url']; ?></td>
                    <td><a href="<?php echo $reAns; ?>">Trả lời comment</a></td>
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