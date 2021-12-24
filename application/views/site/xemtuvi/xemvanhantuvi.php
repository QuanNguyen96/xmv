<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix">
    <div class="box_content">
       <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
       <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="text-center">
        <p><i>Quý bạn hãy nhập đầy đủ thông tin để nhận được kết quả tốt nhất</i></p>
    </div>
    <form action="" method="POST">
        <div class="form-group">
            <div class="col-md-3">
                <div align="right">
                    <span><label for="">Ngày sinh</label></span>
                </div>
            </div>
            <div class="col-md-3">
                <select name="ngaysinh" id="" required="">
                    <?php for($i=1;$i<=31;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('ngaysinh',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="thangsinh" id="" required="">
                    <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('thangsinh',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="namsinh" id="">
                    <?php foreach (list_age_text() as $key => $value): ?>
                        <option value="<?php echo $key; ?>" <?php echo set_select('namsinh',$key); ?> <?php if ($value == 1990): ?>
                            <?php echo 'selected=""'; ?>
                        <?php endif ?>><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <div align="right">
                    <span><label for="">Giới tính</label></span>
                </div>
            </div>
            <div class="col-md-3">
                <select name="gioitinh" id="" required="">
                    <?php 
                        if (isset($gioitinh_slug) && $gioitinh_slug =='nam') {
                            $slt = 'selected=""';
                        }
                        if (isset($gioitinh_slug) && $gioitinh_slug =='nu') {
                            $slt = 'selected=""';
                        }
                    ?>
                    <option value="nam" <?php if (isset($slt)) {
                        echo $slt;
                    } ?>>Nam</option>
                    <option value="nu" <?php if (isset($slt)) {
                        echo $slt;
                    } ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="form-group clear">
            <div class="col-md-3">
                <div align="right">
                    <span><label for="">Năm xem</label></span>
                </div>
            </div>
            <div class="col-md-3">
                <select name="namxem" id="" required="">
                    <?php for($i=date('Y');$i<=2050;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('namxem',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="text-center clear">
            <button type="submit" class="button">Xem ngay</button>
        </div>
    </form> 
    </div>
    <div class="field">
        <?php if (isset($submit)): ?>
            <!-- form nhập mã -->
            <div class="form-shownd clearfix hidden" style="background-color: #f7e6ec;">
                <form action="" method="POST">
                    <br>
                    <div class="text-center">
                        <i>Vui lòng Soạn tin nhắn theo cú pháp <b>DK PT1</b> gửi <b>5657</b> <i>(3000đ/sms)</i> để lấy <b>Mã xác nhận</b> ,Sau khi nhập <b>Mã</b>, quý bạn sẽ nhận được kết quả chi tiết.</i>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label>Mã xác nhận:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="code" maxlength="50" name="code" value="" placeholder="Nhập mã xác nhận tại đây..." required="">
                    </div>
                    <div class="col-md-3 text-center">
                        <button class="shownoidung">Nhận kết quả</button>
                    </div>
                </form>
            </div>
            <!-- end form nhập mã -->
            <div class="panel panel-danger show_nd">
                <div class="panel-heading">
                    <div class="text-center">
                        <label>Luận Sao Chiếu Mệnh năm <?php echo $namxem; ?> tuổi <?php echo $canchi_text; ?></label>
                    </div>
                </div>
                <div class="panel-body text-justify">
                    <?php if (isset($content_sao) && !empty($content_sao)): ?>
                        <?php echo $content_sao; ?>
                    <?php endif ?>
                </div>
            </div>
            
            <div class="panel panel-info show_nd">
                <div class="panel-heading">
                    <div class="text-center">
                        <label>Luận Vận Hạn của tuổi <?php echo $canchi_text; ?></label>
                    </div>
                </div>
                <div class="panel-body text-justify">
                    <?php echo $content_han; ?>
                </div>
            </div>
            <div>
                <?php if ($gioitinh_slug == 'nam'): ?>
                    <p><span class="btn_nhaynhay"></span>Luận giải chi tiết vận hạn năm 2018:<a href="<?php echo base_url($send_link); ?>"><b>Tử vi tuổi <?php echo $canchi_text; ?> năm 2018 nam mạng</b></a></p>
                <?php else: ?>
                    <p><span class="btn_nhaynhay"></span>Luận giải chi tiết vận hạn năm 2018:<a href="<?php echo base_url($send_link); ?>"><b>Tử vi tuổi <?php echo $canchi_text; ?> năm 2018 nữ mạng</b></a></p>
                <?php endif ?>
                <p><span class="btn_nhaynhay"></span>Luận giải chi tiết tử vi trọn đời của bạn:<a href="<?php echo base_url('xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-'.$canchi_slug.'.html'); ?>"><b>Tử vi trọn đời tuổi <?php echo $canchi_text; ?> <?php echo $gioitinh_text ?> mạng</b></a></p>
            </div>
            <div class="show_nd">
                <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table-hover table_cuatui">
                    <tbody>
                        <tr>
                            <td style="text-align: center;"><strong>STT</strong></td>
                            <td style="text-align: center;"><strong>Tiêu chí</strong></td>
                            <td style="text-align: center;"><strong>Đánh giá</strong></td>
                        </tr>
                        <tr>
                            <td><em>1</em></td>
                            <td class="boidam">Thái Tuế</td>
                            <td>
                                <?php
                                    echo 'Năm '.$namxem.' ('.$canchi_text_namxem.') quý bạn '.$tuoi.' tuổi, ';
                                ?>
                                <?php if (empty($get_thaitue)): ?>
                                    sẽ không phạm phải Thái Tuế.
                                <?php else: ?>
                                    sẽ phạm phải Thái Tuế
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td><em>2</em></td>
                            <td class="boidam">Hoang Ốc</td>
                            <td>
                                <?php
                                    echo 'Năm '.$namxem.' ('.$canchi_text_namxem.') quý bạn '.$tuoi.' tuổi';
                                ?>
                                , 
                                <span>
                                <?php if ($get_hoangoc['is_hoangoc'] == 0): ?>
                                sẽ không phạm phải hoang ốc.<?php echo $get_hoangoc['translate'];?>
                                <?php else: ?>
                                sẽ phạm phải <?php echo $get_hoangoc['content'].' '.$get_hoangoc['translate']?>
                                <?php endif ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><em>3</em></td>
                            <td class="boidam">Tam Tai</td>
                            <td>Năm <?php echo $namxem; ?> là năm <?php echo $canchi_text_namxem; ?>, tuổi <?php echo $canchi_text; ?> của quý bạn 
                                <?php 
                                if (empty($get_tamtai)){ 
                                    echo 'Như vậy sẽ không phạm phải tam tai';
                                }
                                else{
                                    echo 'Như vậy sẽ phạm phải tam tai';
                                } 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><em>4</em></td>
                            <td class="boidam">Kim Lâu</td>
                            <td>
                                <?php
                                    echo 'Năm '.$namxem.' ('.$canchi_text_namxem.') quý bạn '.$tuoi.' tuổi';
                                ?>
                                , tuổi này 
                                <?php if (empty($get_kimlau)): ?>
                                sẽ không phạm phải kim lâu.
                                <?php else: ?>
                                sẽ phạm phải <?php echo $get_kimlau['name'].' '.$get_kimlau['content']?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Kết Luận</b></td>
                            <td colspan="2">
                                <p>- Năm nay quý bạn gặp <b> sao <?php echo $saochieumenh; ?></b> chiếu mệnh</p>
                                <p>- Năm <?php echo $namxem ?> quý bạn gặp phải <b> hạn <?php echo $ten_han; ?></b></p>
                                <?php if (!empty($phamkimlau)): ?>
                                    <p>- Năm <?php echo $namxem ?> quý bạn phạm phải <b><?php echo $phamkimlau; ?></b></p>
                                <?php endif ?>
                                <?php if (!empty($phamthaitue)): ?>
                                    <p>- Năm <?php echo $namxem ?> quý bạn phạm phải <b><?php echo $phamthaitue; ?></b></p>
                                <?php endif ?>
                                <?php if (!empty($phamtamtai)): ?>
                                    <p>- Năm <?php echo $namxem ?> quý bạn phạm phải <b><?php echo $phamtamtai; ?></b></p>
                                <?php endif ?>
                                <?php if (!empty($phamhoangoc)): ?>
                                    <p>- Năm <?php echo $namxem ?> quý bạn phạm phải <b><?php echo $phamhoangoc; ?></b></p>
                                <?php endif ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php $this->load->view('site/import/box_dieuhuong2019'); ?>
            </div>
            <div class="alert alert-success" style="clear: both;">
                <p>
                    - Công cụ xem vận hạn theo năm của chúng tôi chỉ giúp quý bạn xem vận hạn theo từng năm mà thôi. Để nắm bắt cơ hội cũng như phòng tránh hạn một cách chủ động nhất, quý bạn phải biết được vận hạn cuộc đời mình như thế nào. Để khám phá điều này, quý bạn tham khảo tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>"><b> Lấy lá số tử vi trọn đời có bình giải</b></a>
                </p>
            </div>
            <div class="alert alert-success">
                <p>
                    - Mặt khác, khi đã biết vận hạn năm 2018 rồi, thì quý bạn cũng cần biết vận hạn tốt xấu theo từng ngày của mình. Để khám phá điều này, quý bạn xem tại: <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>"><b>Tử vi hàng ngày 12 con giáp </b></a>
                </p>
            </div>
            <div class="alert alert-success">
                <p>
                    - Ngoài ra: nếu trong ngày mà quý bạn gặp hiện tượng Hắt xì hơi, giật mắt trá,...một cách bất thường. Đó có thể là một điềm, quý bạn hãy tham khảo xem:
                </p>
                <p>
                    <span class="btn_nhaynhay"></span><a href="<?php echo base_url('nhay-mat-trai-hay-mat-trai-giat-hen-hay-xui-nhu-the-nao-A364.html'); ?>"><b>Giật mắt trái là điềm gì</b></a>
                </p>
                <p>
                    <span class="btn_nhaynhay"></span><a href="<?php echo base_url('mat-phai-giat-va-nhung-diem-bao-khi-gap-phai-hien-tuong-nhay-mat-phai-A363.html'); ?>"><b>Giật mắt phải là điềm gì </b></a>
                </p>
                <p>
                    <span class="btn_nhaynhay"></span><a href="<?php echo base_url('hat-xi-hoi-hat-xi-hoi-co-y-nghia-gi-nhay-mui-nhieu-lan-diem-bao-gi-A370.html'); ?>"><b>Hắt xì hơi là điềm gì </b></a>
                </p>
            </div>
        <?php endif ?>
    </div>
    <div class="field clearfix">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                
                <?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function(){
        $('.shownoidung').on('click',function(){
            var code = $('.code').val();
            var date_created = '<?php echo strtotime(date('j-n-Y')) ?>';
            var url = window.location.href;
            if (code == '') {
                alert('Quý vị vui lòng nhập mã xác nhận!');
            }else{
                $.ajax({
                    url: '<?php echo base_url(); ?>' + 'ajax-check-code',
                    type:'POST',
                    dataType: 'json',
                    data:{
                        code: code,date:date_created,url:url,
                    },
                    success:function(response){
                        if (response.check == true) {
                            $('.show_nd').removeClass('hidden');
                            $('.form-shownd').hide();
                        }else{
                            alert(response.mes);
                        }
                    }
              });
        }
        return false;
        });
    });
</script> -->