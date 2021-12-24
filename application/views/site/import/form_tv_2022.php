<div class="tra_cuu">
    <div class="background_tra_cuu_2">
        <div class="background_tra_cuu_3">
        </div>
        <p class="tra_cuu_2022">TRA CỨU TỬ VI 2022</p>
        <p class="vui_long">Bạn vui lòng nhập chính xác thông tin của mình!</p>
        <form name="frm_tv" id="frm_tv" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" method="post" class="form_tool" onsubmit="frm_tra_cuu_tu_vi_2022moi('frm_tv'); return false;">
            <div class="row">
                <div class="col-md-8">
                    <div class="input_select">
                        <div class="select_op">
                            <select name="nam_sinh">
                                <?php for ($i=1950; $i < 2012; $i++):
                                    $slt = $i == 1992 ? 'selected=""' : '';
                                    ?>
                                    <option value="<?php echo $i;?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="select_op">
                            <div class="row">
                                <div class="col-6 gioitinh">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="gioi_tinh" class="custom-control-input" checked value="1">
                                        <label class="custom-control-label" for="customRadioInline1">Nam</label>
                                    </div>
                                </div>
                                <div class="col-6 gioitinh">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="gioi_tinh" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="customRadioInline2">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4">
                    <input class="xem_ngay" type="submit" value="Xem ngay">
                </div>
            </div>
            <input type="hidden" name="nam_xem" value="2022">
        </form>
    </div>
</div>