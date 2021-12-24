<div class="form_boi_nhom_mau">
    <div class="row">
        <div class="col-md-7 col-centered">
            <div class="form_boi_nhom_mau_content">
                <div>
                    <img src="<?php echo base_url('templates/site/images/cunghoangdao/frm_boi_ngay_sinh.jpg'); ?>" alt=" ">
                </div>
                <div class="form_boi_nhom_mau_title">Bạn thuộc cung hoàng đạo gì?</div>
                <div>
                    <form action="" method="post" id="<?php echo 'cung_hoang_dao_ngay_sinh_'.md5(time());?>" onsubmit="cung_hoang_dao_ngay_sinh(this.id); return false;">
                        <select name="ngay_sinh" required="">
                            <option value="">Ngày sinh</option>
                            <?php for ($i=1; $i <= 31 ; $i++):?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor; ?>    
                        </select>
                        <select name="thang_sinh" required="">
                            <option value="">Tháng sinh</option>
                            <?php for ($i=1; $i <= 12 ; $i++):?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor; ?>    
                        </select>
                        <button type="submit">Xem kết quả</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>