<div class="form_boi_nhom_mau">
    <div class="row">
        <div class="col-md-7 col-centered">
            <div class="form_boi_nhom_mau_content">
                <div>
                    <img src="<?php echo base_url('templates/site/images/cunghoangdao/frm_boi_nhom_mau_img.jpg'); ?>" alt=" ">
                </div>
                <div class="form_boi_nhom_mau_title">Bói nhóm máu 12 cung hoàng đạo</div>
                <div>
                    <form action="" method="post" id="<?php echo 'cung_hoang_dao_nhom_mau_'.md5(time());?>" onsubmit="cung_hoang_dao_nhom_mau(this.id); return false;">
                        <select name="cung">
                            <?php foreach (cung_hoang_dao() as $key => $value): ?>
                                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                            <?php endforeach ?>
                        </select>
                        <select name="nhom_mau">
                            <?php foreach (nhom_mau() as $key => $value): ?>
                                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                            <?php endforeach ?>
                        </select>
                        <button type="submit">Xem kết quả</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>