<div class="box-mobile">
    <h3 class="title-new-mobile">Xem ngày tốt xấu</h3>
    <div class="box-form">
        <form name="" action="" method="post" onsubmit="xemngaytotxau_frame(); return false;">
            <div class="form-group clearfix">
                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <select name="xntx_f_thang" id="xntx_f_thang_frame">
                                <option value="" required="">Chọn tháng</option>
                                <?php for( $i = 1; $i<=12; $i++ ): ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <select name="xntx_f_nam" id="xntx_f_nam_frame"  required="">
                                <option value="">Chọn năm</option>
                                <?php for( $i = 1947; $i<=2027; $i++ ): ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">
                            <select name="xntx_f_md" id="xntx_f_md_frame" required="">
                                <option value="">Chọn mục đích công việc</option>
                                <?php foreach($mangcongcu as $key => $val): ?>
                                    <option value="<?php echo $key;?>"><?php echo $val; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="" name="check">Xem</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function xemngaytotxau_frame(){
        var thang    = $('#xntx_f_thang_frame').val();
        var nam      = $('#xntx_f_nam_frame').val();
        var congcu   = $('#xntx_f_md_frame').val();
        var link = congcu+'-trong-thang-'+thang+'-nam-'+nam+'.html';
        var newURL = window.location.protocol + "//" + window.location.host +'/'+link;
        window.location = newURL;
        return false; 
    }
</script>