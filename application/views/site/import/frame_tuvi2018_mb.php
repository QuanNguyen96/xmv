<div class="box-mobile">
    <h3 class="title-new-mobile">Xem tử vi trọn đời</h3>
    <div class="box-form">
<!--        <form method="post" name="send_frame_xem_tu_vi_2018_mobile" onsubmit="return search_frame_xem_tu_vi_2018_mobile();">-->
<!--            <div class="form-group clearfix">-->
<!--                <div class="row">-->
<!--                    <div class="col-xs-5">-->
<!--                        <select class="gioitinh" name="gioitinh">-->
<!--                            <option value="nam">Nam</option>-->
<!--                            <option value="nu">Nữ</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="col-xs-5">-->
<!--                        --><?php
//                            echo include_select_not_act_for_sidebar("namsinh_frame_tuvi2018_mb");
//                        ?>
<!--                    </div>-->
<!--                    <div class="col-xs-2">-->
<!--                        <button type="submit" name="submit" value="submit" class="">Xem</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->

                <form action="" method="post" name="form_tuvi" id="form_tuvi">
                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-xs-5">
                                <select id="gioitinh_tv" name="giotinh">
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                            </div>
                            <div class="col-xs-5">
                                <?php
                                    echo include_select_not_act_for_sidebar("namsinh_tv");
                                ?>
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" name="submit" value="submit" id="submit_tv" class="">Xem</button>
                            </div>
                        </div>
                    </div>
                </form>
        <script type="text/javascript">
            $('#submit_tv').on('click',function(){
                var frame = document.form_tuvi;
                var canchi = $('.namsinh_tv').val();
                var link = 'xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-'+ canchi + '.html';
                var domain = '<?php echo base_url(); ?>';
                frame.action = domain + link;
            });
            //function search_frame_xem_tu_vi_2018_mobile() {
            //    var frm   = document.send_frame_xem_tu_vi_2018_mobile;
            //    var canchi  = frm.namsinh_frame_tuvi2018_mb.value;
            //    var namsinh = $('.namsinh_frame_tuvi2018_mb option:selected').text();
            //    var gioitinh  = frm.gioitinh.value;
            //
            //    url_sub_nam   = "xem-tu-vi-nam-2018-tuoi-"+canchi+"-"+gioitinh+"-mang-sinh-nam-"+namsinh;
            //    url_sub_nu    = "xem-tu-vi-tuoi-"+canchi+"-nam-2018-"+gioitinh+"-mang-sinh-nam-"+namsinh;
            //    url_sub = "";
            //    url_sub = gioitinh=="nam"?url_sub_nam:url_sub_nu;
            //    $.ajax({
            //        url:"<?php //echo base_url();?>//home/get_list_link",
            //        data:{
            //            url_sub : url_sub
            //        },
            //        type:"POST",
            //        dataType:"text",
            //
            //        success: function(result){
            //            // alert(result);
            //            window.location.href = result;
            //        },
            //        error:function (xhr, ajaxOptions, thrownError){
            //            //On error, we alert user
            //            // alert(thrownError);
            //        }
            //
            //    });
            //    return false;
            //}
        </script>
    </div>
</div>