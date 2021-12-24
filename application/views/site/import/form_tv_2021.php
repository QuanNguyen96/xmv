<style>
    .background_tra_cuu_2{
        padding: 10px!important;
    }
    .background_tra_cuu_2 p{
        text-align: center;
    }
    .box_xvm select{
        width: 68%;
    }
    .tra_cuu{
        margin-bottom: 35px;
    }
    @media (max-width: 576px) {
        .tra_cuu .background_tra_cuu_2 #frm_tv .row .col-xs-6 select{
            padding: 0px 18px!important;
        }
        .tra_cuu .background_tra_cuu_2 #frm_tv .row .col-xs-6{
            margin-bottom: 10px;
        }

        .tra_cuu .background_tra_cuu_2 #frm_tv .row .col-xs-12 input{
            padding: 4px 20px!important;
        }
    }
</style>

<div class="tra_cuu">
    <div class="background_tra_cuu_2" style="text-align: center">
        <div class="background_tra_cuu_3"></div>
        <p class="tra_cuu_2021">TRA CỨU TỬ VI 2022</p>
        <p class="vui_long">Nhập chính xác thông tin của mình!</p>
        <form name="frm_tv" id="frm_tv" action="<?php
        echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" method="post" class="form_tool"
              onsubmit="frm_tra_cuu_tu_vi('frm_tv'); return false;">
            <div class="row" style="display: flex;flex-flow: row wrap;justify-content: space-evenly;">
                <div class="col-md-3 col-xs-6">
                    <select name="nam_sinh">
                        <?php
                        for ($i = 1950; $i < 2010; $i++) {
                            $slt = $i == 1992 ? 'selected=""' : ''; ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?> ><?php
                                echo $i; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="col-md-3 col-xs-6">
                    <select name="gioi_tinh">
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                    </select>
                </div>
                <div class="col-md-4 col-xs-12">
                    <input class="xem_ngay" type="submit" value="Xem ngay" style="padding-left: 30px; padding-right: 30px;"/>
                </div>
            </div>
            <input type="hidden" name="nam_xem" value="2021">
        </form>
    </div>
</div>
