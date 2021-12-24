<div class="box-mobile">
    <h3 class="title-new-mobile">Xem tuổi vợ chồng làm ăn tốt hay xấu</h3>
    <div class="box-form">
        <form name="search_xem_tuoi_hop_lam_an" action="" method="post" onsubmit="send_form_xem_tuoi_hop_lam_an();return false;">
            <div class="form-group clearfix">
                <div class="row">
                    <div class="clearfix">
                        <div class="col-xs-6">
                            <label>Năm sinh vợ hoặc chồng (AL)</label>
                        </div>
                        <div class="col-xs-6">
                            <select name="namsinh" class="namsinh myinput" id="">
                                <?php foreach (list_age_text() as $key => $value): ?>
                                    <?php if ($value >=1960): ?>
                                        <option value="<?php echo $key; ?>" <?php if ($value == 1970): ?>
                                            <?php echo 'selected=""'; ?>
                                        <?php endif ?>><?php echo $value; ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    function send_form_xem_tuoi_hop_lam_an() {
        var frm = document.search_xem_tuoi_hop_lam_an;
        var namsinh  = frm.namsinh.value;
        var nam   = $('.myinput option:selected').text();
        window.location.href = "<?php echo base_url('xem-tuoi-lam-an/tuoi-"+namsinh+"-sinh-nam-"+nam+"-hop-lam-an-voi-tuoi-nao');?>.html";
    }
</script>