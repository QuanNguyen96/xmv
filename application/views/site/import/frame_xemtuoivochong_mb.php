<div class="box-mobile">
    <h3 class="title-new-mobile">Xem lại - Xem tuổi vợ chồng theo cung phi</h3>
    <div class="box-form">
        <form name="search_tuoivochong_frame" onsubmit="send_form_vochong_frame(); return false;" action="" method="post">
            <div class="form-group clearfix">
                <div class="row">
                    <div class="clearfix">
                        <div class="col-xs-6">
                            <select name="tuoichong_frame">
                                <option value="">Năm sinh chồng</option>
                                <?php
                                    for($i=1970 ; $i <= 2027 ; $i++){
                                        echo '<option value="'.$i.'" >'.$i.'</option>';
                                    }
                                ?>
                                <?php
                                    for($i=1947 ; $i <= 1969 ; $i++){
                                        echo '<option value="'.$i.'" >'.$i.'</option>';
                                    }
                                ?>
                             </select>
                        </div>
                        <div class="col-xs-6">
                            <select name="tuoivo_frame">
                                <option value="">Năm sinh vợ</option>
                                <?php
                                    for($i=1970 ; $i <= 2027 ; $i++){
                                        echo '<option value="'.$i.'" >'.$i.'</option>';
                                    }
                                ?>
                                <?php
                                    for($i=1947 ; $i <= 1969 ; $i++){
                                        echo '<option value="'.$i.'" >'.$i.'</option>';
                                    }
                                ?>
                             </select>
                        </div>
                    </div>
                    <div class="clearfix text-center">
                        <button type="submit" name="" id="xemtuoivochong_button_frame">Xem</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function send_form_vochong_frame() {
        var frm = document.search_tuoivochong_frame;
        var tuoichong   = frm.tuoichong_frame.value;
        var tuoivo  = frm.tuoivo_frame.value;
        window.location.href = "<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/');?>tuoi-chong-"+tuoichong+"-va-tuoi-vo-"+tuoivo+".html";
    }
</script>