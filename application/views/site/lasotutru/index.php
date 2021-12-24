<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm block_boibai hangngay">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form method="post" action="">
        <div class="field">
            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
                <select name="day">
                    <option value="">Ngày sinh dương</option>
                    <?php 
                        for( $i = 1; $i<= 31; $i++ ){
                            $df = $i==6?true:false;
                            echo '<option '.set_select('day', $i, $df).' value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="month">
                    <option value="">Tháng</option>
                    <?php 
                        for( $i = 1; $i<= 12; $i++ ){
                            $df = $i==6?true:false;
                            echo '<option '.set_select('month', $i, $df).' value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="year">
                    <option value="">Năm</option>
                    <?php 
                        for( $i = 1990; $i<= 2040; $i++ ){
                            $df = $i==1990?true:false;
                            echo '<option '.set_select('year', $i, $df).' value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
                <select name="hour">
                    <option value="">Giờ sinh</option>
                    <option value="1" <?php echo set_select('hour', 1); ?>>1h Sửu</option>
                    <option value="2" <?php echo set_select('hour', 2); ?>>2h Sửu</option>
                    <option value="3" <?php echo set_select('hour', 3); ?>>3h Dần</option>
                    <option value="4" <?php echo set_select('hour', 4); ?>>4h Dần</option>
                    <option value="5" <?php echo set_select('hour', 5); ?>>5h Mão</option>
                    <option value="6" <?php echo set_select('hour', 6); ?>>6h Mão</option>
                    <option value="7" <?php echo set_select('hour', 7); ?>>7h Thìn</option>
                    <option value="8" <?php echo set_select('hour', 8); ?>>8h Thìn</option>
                    <option value="9" <?php echo set_select('hour', 9); ?>>9h Tị</option>
                    <option value="10" <?php echo set_select('hour', 10); ?>>10h Tị</option>
                    <option value="11" <?php echo set_select('hour', 11); ?>>11h Ngọ</option>
                    <option value="12" <?php echo set_select('hour', 12); ?>>12h Ngọ</option>
                    <option value="13" <?php echo set_select('hour', 13); ?>>13h Mùi</option>
                    <option value="14" <?php echo set_select('hour', 14); ?>>14h Mùi</option>
                    <option value="15" <?php echo set_select('hour', 15); ?>>15h Thân</option>
                    <option value="16" <?php echo set_select('hour', 16); ?>>16h Thân</option>
                    <option value="17" <?php echo set_select('hour', 17); ?>>17h Dậu</option>
                    <option value="18" <?php echo set_select('hour', 18); ?>>18h Dậu</option>
                    <option value="19" <?php echo set_select('hour', 19); ?>>19h Tuất</option>
                    <option value="20" <?php echo set_select('hour', 20); ?>>20h Tuất</option>
                    <option value="21" <?php echo set_select('hour', 21); ?>>21h Hợi</option>
                    <option value="22" <?php echo set_select('hour', 22); ?>>22h Hợi</option>
                    <option value="23" <?php echo set_select('hour', 23); ?>>23h Tý</option>
                    <option value="24" <?php echo set_select('hour', 24); ?>>24h Tý</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <select name="minute">
                    <option value="">Phút sinh</option>
                    <option value="00" <?php echo set_select('minute', 00); ?>>00 phút</option>
                    <option value="05" <?php echo set_select('minute', 05); ?>>05 phút</option>
                    <option value="10" <?php echo set_select('minute', 10); ?>>10 phút</option>
                    <option value="15" <?php echo set_select('minute', 15); ?>>15 phút</option>
                    <option value="20" <?php echo set_select('minute', 20); ?>>20 phút</option>
                    <option value="25" <?php echo set_select('minute', 25); ?>>25 phút</option>
                    <option value="30" <?php echo set_select('minute', 30); ?>>30 phút</option>
                    <option value="35" <?php echo set_select('minute', 35); ?>>35 phút</option>
                    <option value="40" <?php echo set_select('minute', 40); ?>>40 phút</option>
                    <option value="45" <?php echo set_select('minute', 45); ?>>45 phút</option>
                    <option value="50" <?php echo set_select('minute', 50); ?>>50 phút</option>
                    <option value="55" <?php echo set_select('minute', 55); ?>>55 phút</option>
                </select>
            </div>
        </div>
        <div class="field field_center">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="button">Xem kết quả</button>
            </div>
        </div>
    </form>
    <div class="field clearfix">
        <?php if (isset($is_submit)): ?>
            <?php
                $namsinh = $send_input_namsinh;
                $canchi    = get_chi_replace($canchi_nam_show); 
                $slugcanchi = $this->vnkey->format_key($canchi);
            ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="text-center">Thông tin lá số</p>
                    </div>
                    <div class="panel-body">
                        <div id="result">
                            <div class="row">
                                <p>
                                    - <b>Ngày Sinh Tây Lịch:</b> <?php echo $sinhvaothu;?> <?php echo $send_input_ngaysinh;?>/<?php echo $send_input_thangsinh;?>/<?php echo $send_input_namsinh;?>(Dương lịch)
                                </p>
                                <p>
                                    - <b>Ngày Sinh Âm Lịch:</b> <?php echo $sinh_am_lich[0];?>/<?php echo $sinh_am_lich[1];?>/<?php echo $sinh_am_lich[2];?>
                                </p>
                                <p>
                                    - <b>Tứ Trụ:</b> năm <?php echo $canchi_nam_show;?>, tháng <?php echo $canchi_thang_show;?>, ngày <?php echo $canchi_ngay_show;?>, giờ <?php echo $canchi_gio['can'].' '.$canchi_gio['chi'];?>
                                </p>
                                <p>
                                    - <b>Lưỡng Đầu Kiềm:</b> <?php echo $str_can_al_nam;?> <?php echo $str_can_al_gio;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="row">
                        <section class="bs-callout bs-callout-info">
                            <img style="max-width: 100%" src="<?php echo base_url('templates/site/images/quy coc toan menh.jpg') ?>" >
                        </section>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="row">
                        <p class="text-center">Bảng thông tin quẻ</p>
                        <div class="luangiai">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="3" height="30" background="">
                                            <div align="center"><b><?php echo $laso_que['name']?></b></div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <div align="right"><b><?php echo $str_can_al_nam?></b> </div>
                                        </td>
                                        <td><img border="0" src="<?php echo base_url('templates/site/images/laso/'.$laso_cung_nam['image']);?>"></td>
                                        <td width="50%">
                                            <div align="left"> <b><?php echo $laso_cung_nam['cung']?> Trên</b></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div align="right"><b><?php echo $str_can_al_gio?></b> </div>
                                        </td>
                                        <td><img border="0" src="<?php echo base_url('templates/site/images/laso/'.$laso_cung_nam['image']);?>"></td>
                                        <td width="50%">
                                            <div align="left"> <b><?php echo $laso_cung_gio['cung']?> Dưới</b></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div align="center">
                                                <p class=""><?php echo $laso_luan['name'] ?></p>
                                                <?php echo $laso_luan['content']?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><label class="info_luandoan">Phần luận đoán</label></div>
                    <div class="panel-body">
                        <div id="result">
                            <div class="row">
                                <p>Dựa theo Tứ Trụ, quý bạn sinh vào năm <?php echo $canchi_nam_show;?>, tháng <?php echo $canchi_thang_show;?>, ngày <?php echo $canchi_ngay_show;?>, giờ <?php echo $canchi_gio['can'].' '.$canchi_gio['chi'];?>, Lưỡng đầu kiềm <?php echo $str_can_al_nam;?> <?php echo $str_can_al_gio;?> được quẻ <?php echo $laso_que['name']?>.</p>
                                <p>Theo Quỷ Cốc tiên sinh, đây là cục <?php echo $laso_luan['name'];?>, nghĩa là: </p>
                                <div class="text_page_luandoan">
                                    <p><?php echo $laso_luan['content']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <p>
                                    <?php echo str_replace('.', '.<br>', $laso_que['content']);?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="row">
                        <p class="text-center">Luận quẻ</p>
                        <div class="luangiai">
                            <div class="panel-body">
                                <div id="result" class="content_laso">
                                    <div class="row over_row">
                                        <div class="col-md-2">
                                            <label>Tên</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Lời thơ</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Ý nghĩa</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Tổng cách</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['tongcach']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['tongcach_ynghia']?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Cơ Nghiệp</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['conghiep']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['conghiep_ynghia']?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Huynh Đệ</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['huynhde']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['huynhde_ynghia']?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Sự nghiệp</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['sunghiep']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['sunghiep_ynghia']?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Hôn nhân</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['honnhan']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['honnhan_ynghia']?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Con cái</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['concai']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['concai_ynghia']?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Hậu vận</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['hauvan']?></label>
                                        </div>
                                        <div class="col-md-5">
                                            <label><?php echo $laso_que['hauvan_ynghia']?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 clearfix">
                <div class="alert alert-success">
                    <p>Qua Lá Số Quỷ Cốc thì quý bạn đã được biết sơ lược về cuộc đời mình. Để biết chi tiết hơn về vận hạn cuộc đời mình, quý bạn tham khảo tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>"><b> Lấy lá số tử vi có bình giải chi tiết</b></a></p>
                </div>
                <div class="clearfix">
                    <div class="dieuhuong2019 clearfix mgt0">
                        <?php $this->load->view('site/import/form_tv_2021'); ?>
                    </div>
                </div>
                <div class="box_content clearfix">
                    <div class="box_content_tt1">
                      Các công cụ Xem bói - Tử vi liên quan
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('gieo-que-dich-so.html'); ?>">
                            <div class="text-center">
                                  <div class="thumbnail">
                                    <img src="<?php echo base_url('templates/site/images/anhdaidien/gieo-que-dinh-dich.jpg'); ?>" alt="">
                                  </div>
                                  <div>Gieo quẻ kinh dịch</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
                            <div class="text-center">
                                    <div class="thumbnail">
                                        <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-vo-chong.jpg'); ?>" alt="">
                                    </div>
                                    <div>Xem tuổi vợ chồng</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                            </div>
                            <div>Tử vi hàng ngày</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                            </div>
                            <div>Bói bài hàng ngày</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ten.jpg'); ?>" alt="">
                            </div>
                            <div>Xem bói theo tên</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/not-ruoi-chuan.jpg'); ?>" alt="">
                            </div>
                            <div>Xem bói nốt ruồi</div>
                        </div>
                      </a>
                    </div>
                </div>
                <div class="box_content clearfix">
                   <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?> 
                </div>
            </div>
        <?php endif ?>
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
</div>