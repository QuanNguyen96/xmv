<div class="box-mobile">
    <h3 class="title-new-mobile">Xem tử vi hàng ngày</h3>
    <div class="box-form">
        <form action="" method="POST" name="form_tuvingay">
            <div class="row">
                <div class="form-group clearfix">
                    <div class="col-xs-4">
                        <label for="">Ngày sinh</label>
                    </div>
                    <div class="col-xs-8">
                        <div class="row">
                            <div class="col-xs-4">
                                <select name="ngaysinh" id="ngayysinh" required="">
                                    <?php for($i=1;$i<=31;$i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo set_select('ngaysinh',$i); ?>><?php echo $i; ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="thangsinh" id="thang_sinh" required="">
                                    <?php for($i=1;$i<=12;$i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo set_select('thangsinh',$i); ?>><?php echo $i; ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="namsinh" id="nam_sinh">
                                    <?php foreach (list_age_text() as $key => $value): ?>
                                        <option value="<?php echo $key; ?>" <?php echo set_select('namsinh',$key); ?> <?php if ($value == 1990): ?>
                                            <?php echo 'selected=""'; ?>
                                        <?php endif ?>><?php echo $value; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-xs-4">
                        <label for="">Ngày xem</label>
                    </div>
                    <div class="col-xs-8">
                        <div class="row">
                            <div class="col-xs-4">
                                <select name="ngayxem" id="ngay_xem" required="">
                                    <?php for($i=1;$i<=31;$i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo set_select('ngayxem',$i); ?> <?php if (date('j') == $i): ?>
                                            <?php echo 'selected=""'; ?>
                                        <?php endif ?>><?php echo $i; ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="thangxem" id="thang_xem" required="">
                                    <?php for($i=1;$i<=12;$i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo set_select('thangxem',$i); ?> <?php if ($i == date('n')): ?>
                                            <?php echo 'selected = ""'; ?>
                                        <?php endif ?>><?php echo $i; ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="namxem" id="nam_xem">
                                    <?php for($i=date('Y');$i<=2030;$i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo set_select('namxem',$i); ?>><?php echo $i; ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" onclick="" id="xemtuvi_ngay">Xem</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#xemtuvi_ngay').on('click',function(){
            var frame   = document.form_tuvingay;
            var ngay    = $('#ngay_xem').val();
            var thang   = $('#thang_xem').val();
            var nam     = $('#nam_xem').val();
            var link    = 'tu-vi-hang-ngay/tu-vi-ngay-'+ngay+'-thang-'+thang+'-nam-'+nam+'.html';
            var domain  = '<?php echo base_url(); ?>';
            frame.action = domain + link;
        });
    });
</script>