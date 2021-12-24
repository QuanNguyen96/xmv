<div class="row">
    <div class="col-md-12">
        <div class="box_aside boxAside">
            <h2 class="box_aside_tt1">TRA CỨU TỬ VI 2022 CỦA 12 CON GIÁP<img class="iconNhayNhay" src="/templates/site/images/icon/new.gif"></h2>

            <form name="frm_tv_footer" id="frm_tv_footer" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>"
                  method="post" class="form_tool" onsubmit="frm_tra_cuu_tu_vi_2022_footer('frm_tv_footer'); return false;">
                <div class="row boxAside" style="padding: 15px 0px 0px 1px; border: 1px solid #ccc; margin-left: 0px; margin-right: 0px;">
                    <div class="col-md-8">
                        <div class="input_select">
                            <div class="select_op">
                                <select name="nam_sinh_footer">
                                    <?php for ($i = 1950; $i < 2012; $i++):
                                        $slt = $i == 1992 ? 'selected=""' : '';
                                        ?>
                                        <option value="<?php echo $i; ?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="select_op" style="padding: 0px 10px;">
                                <div class="row">
                                    <select name="gioi_tinh_footer">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        <input class="" style="width: 100%" type="submit" value="Xem ngay">
                    </div>
                </div>
                <input type="hidden" name="nam_xem" value="2022">
            </form>
        </div>
    </div>

</div>