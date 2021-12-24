<article>
    <div class="row">
        <div class="col-lg-12 col-md-12 ad_form">
            <h4 class="ad_title"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Nội dung quẻ &raquo; Danh sách quẻ</h4>
            <?php if(isset($add_ok)): ?>
            <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-ok"></span>&nbsp; <?php echo $add_ok; ?></div>
            <?php endif; ?>
            <form name="adminForm" id="adminForm" action="" method="post">
                <?php if(isset($delete_ok)):?>
                <div class="alert alert-success" role="alert">
                    <b><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Xóa thành công.!</b>
                </div>
                <?php endif;?>
                <div class="ad_toolbar text-right">
                    <!-- <a href="<?php echo base_url('admin/config_jossaoque/add'); ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Thêm</a> 
                    <button type="submit" name="save-close" class="btn btn-danger btn-xs" onclick="delete_menu('<?php echo base_url('admin/config_jossaoque/delete'); ?>')"> <span class="glyphicon glyphicon-trash"></span>&nbsp;Xóa</button> -->
                    <a href="<?php echo base_url('admin/home/index'); ?>" class="btn btn-default btn-xs"><b><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Đi ra</b></a>
                </div>
                <div class="search">
                    <div class="">
                        <ul>
                            <li style="display: inline-block;" class="col-lg-2 col-md-3 col-sm-3  col-xs-12">
                                <input type="text" name="key" value="" placeholder="Nhập tiêu đề..." class="form-control" />
                            </li>
                            <li style="display: inline-block;" class="col-lg-2 col-md-2 col-sm-3  col-xs-12">
                                <button name="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span>&nbsp;Tìm kiếm</button>
                                <a href="" class="btn btn-danger btn-sm" >Hủy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <th width="5%"><input type="checkbox" name="check_all" id="checkall" onclick="checkAll();" /></th>
                        <th><a href="">Tiêu đề</a></th>
                        <th>Link</th>
                        <th class="text-center">Hành động</th>
                    </thead>
                    <tbody>
                        <?php if(!empty($list)):
                            foreach($list as $key=>$val): 
                                
                            ?>
                        <tr id="tr_<?php echo $val['id'];?>">
                            <td><input type="checkbox" name="cid[]" value="<?php echo $val['id'];?>" class="cid" /></td>
                            <td><a href="<?php echo base_url('admin/config_jossaoque/edit/'.$val['id']); ?>"><?php echo $val['ten'];?></a></td>
                            <td><?php echo $val['diengiai'];?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('admin/config_jossaoque/edit/'.$val['id']); ?>" class="btn btn-success btn-xs">Sửa</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </form>
            <?php if(isset($pagination)):?>
            <div class="text-right">
                <?php echo $pagination; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</article>
<script type="text/javascript">
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>