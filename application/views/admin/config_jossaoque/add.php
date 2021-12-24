<article>
   <div class="row">
     <div class="col-lg-12 col-md-12 ad_form">
        <h4 class="ad_title"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Nội dung quẻ &raquo; Thêm mới</h4>
        <?php if(isset($success)): ?>
        <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-ok"></span>&nbsp; Luu thành công.!</div> 
        <?php endif; ?>
        <form name="" id="item_add" action="" method="post" enctype="multipart/form-data">
          <div class="ad_toolbar text-right">
           <button type="submit" name="save-close" class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-ok"></span>&nbsp;Lưu & Đóng</button>
           <a href="<?php echo base_url('admin/seosim/index'); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>&nbsp;Đóng</a>
          </div>  
        <div role="tabpanel" class="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Cơ bản</a></li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab1">
                <div class="row">
                    <div class="col-md-9">
                       <div class="list-group col-lg-6 col-xs-12">
                          <label>Tiêu đề *</label>
                          <input type="text" name="title" id="title" value="" class="form-control" placeholder="Tiêu đề trang" />
                          <?php echo form_error('title');?>
                       </div> 
                       <div class="list-group col-lg-6 col-xs-12">
                          <label>Link trang:</label>
                          <input type="text" name="link" id="link" value="" class="form-control" placeholder="" data-toggle="tooltip" data-placement="top" title="Coppy url của trang cần tạo seo dán vào đây." />
                          <?php echo form_error('link');?>
                       </div> 
                       <div class="list-group col-lg-6 col-xs-12">
                          <label>Tên công cụ *</label>
                          <input type="text" name="tencongcu" id="tencongcu" value="" class="form-control" placeholder="Tên công cụ" />
                          <?php echo form_error('tencongcu');?>
                       </div> 
                       <div class="clearfix"></div>
                       <div class="list-group">
                          <label>Từ khóa(keywords)</label>
                          <textarea name="keywords" class="form-control" rows="4"></textarea>
                       </div>
                       <div class="clearfix"></div>
                       <div class="list-group">
                          <label>Mô tả(Description)</label>
                          <textarea name="description" class="form-control" rows="4"></textarea>
                       </div>
                       <div class="clearfix"></div>
                       <div class="list-group">
                          <label>Text</label>
                          <textarea name="text" class="form-control ckeditor" rows=""></textarea>
                       </div>
                       <div class="clearfix"></div>
                       <div class="list-group">
                          <label>Text foot</label>
                          <textarea name="text_foot" class="form-control ckeditor" rows=""></textarea>
                       </div>
                       <div class="clearfix"></div>
                       <div class="list-group">
                          <label>Thông báo</label>
                          <textarea name="thongbao" class="form-control ckeditor" rows=""></textarea>
                       </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
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