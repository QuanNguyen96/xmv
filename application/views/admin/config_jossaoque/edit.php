<article>
    <div class="row">
        <div class="col-lg-12 col-md-12 ad_form">
            <h4 class="ad_title"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Nội dung quẻ &raquo; Chỉnh sửa</h4>
            <?php if(isset($success)): ?>
            <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-ok"></span>&nbsp; Luu thành công.!</div>
            <?php endif; ?>
            <form name="" id="item_add" action="" method="post" enctype="multipart/form-data">
                <div class="ad_toolbar text-right" style="float: right;clear: both;">
                    <button type="submit" name="save-close" class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-ok"></span>&nbsp;Lưu & Đóng</button>
                    <a href="<?php echo base_url('admin/config_jossaoque/index'); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>&nbsp;Đóng</a>
                </div>
                <div role="tabpanel" class="tabpanel">
                    
                    <div class="tab-content" style="padding: 25px;">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <div class="">
                                <div class="row">
                                    <div class="list-group col-lg-12 col-xs-12">
                                        <label>Name :</label>
                                        <p><?php echo $item['ten']; ?></p>
                                    </div>
                                    <div class="list-group col-lg-12 col-xs-12">
                                        <label>Lời đoán :</label>
                                        <input type="text" name="loidoan" id="loidoan" value="<?php echo $item['loidoan']; ?>"/>
                                    </div>
                                    <div class="list-group">
                                        <label>Text</label>
                                        <textarea name="diengiai" class="form-control ckeditor" rows=""><?php echo $item['diengiai'];?></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $item['id'];?>" />
            </form>
        </div>
    </div>
</article>
<script type="text/javascript">
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $("#item_add").validate({
        rules:{
            title:{
                required:true,
            },
            link:{
                required:true,
            },
            parent:{
                required:true,
            }
        },
        messages:{
            title:{
                required:'Tiêu đề không được để trống',
            },
            link:{
                required:'Link không được để trống',
            },
            parent:{
                required:'Bạn phải chọn Menu',
            }
        }
    });
</script>