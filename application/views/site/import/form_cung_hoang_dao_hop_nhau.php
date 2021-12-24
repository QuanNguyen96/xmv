<div class="form_boi_cung_hoang_dao">
    <div class="row">
        <div class="col-md-7 col-centered">
            <div class="form_boi_cung_hoang_dao_content">
                <div>
                    <img src="<?php echo base_url('templates/site/images/cunghoangdao/frm_cung_hoang_dao_img.jpg'); ?>" alt=" ">
                </div>
                <div class="form_boi_cung_hoang_dao_title">Bói tình yêu các cung hoàng đạo</div>
                <div>
                    <form action="" method="post" id="<?php echo 'cung_hoang_dao_hop_nhau_'.md5(time());?>" onsubmit="cung_hoang_dao_hop_nhau(this.id); return false;">
                        <select name="cung1">
                            <?php foreach (cung_hoang_dao() as $key => $value): ?>
                                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                            <?php endforeach ?>
                        </select>
                        <select name="cung2">
                            <?php foreach (cung_hoang_dao() as $key => $value): ?>
                                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                            <?php endforeach ?>
                        </select>
                        <button type="submit">Xem độ hợp</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>