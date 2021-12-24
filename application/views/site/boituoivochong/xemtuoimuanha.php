<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau" id="font16">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="search_xem_tuoi_mua_nha" action="" method="post" onsubmit="send_form_xem_tuoi_mua_nha();return false;">
        <section class="form-inline">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Tuổi của gia chủ (Âm lịch) :</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-3 col-sm-4 col-xs-4">
                    <select class="textsend" name="ngaysinh">
                    <?php
                        $selectd = '';
                        for($i=1 ; $i <= 31 ; $i++){
                            $selectd = '';
                            if ($send_input_ngaysinh == $i) {
                              $selectd = 'selected=""';
                            }
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <select class="textsend" name="thangsinh">
                    <?php
                        $selectd = '';
                        for($i=1 ; $i <= 12 ; $i++){
                            $selectd = '';
                            if ($send_input_thangsinh == $i) {
                              $selectd = 'selected=""';
                            }
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <select name="namsinh" class="namsinh myinput" id="">
                        <?php foreach (list_age_text() as $key => $value): ?>
                            <?php $selected = $iNamsinh==$key?'selected=""':''; ?>
                            <option <?php echo $selected; ?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </section>
        <section class="form-inline">
            <div class="field row">
                <div class="col-md-3 col-md-offset-3 col-sm-4 col-xs-4">
                    <p class="control-label" for="pwd">Dự kiến mua nhà :</p>
                </div>
                <div class="col-md-3 col-sm-8 col-xs-8"> 
                    <select class="textsend" name="nammuanha">
                    <?php
                        for($i=2017 ; $i <= 2027 ; $i++){
                            $selected = $iNammuanha==$i?'selected=""':'';
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </section>
        <section class="form-inline">
            <div class="row">
                <div class="col-md-12">
                    <p class="" style="font-size: 12px;text-align: center;"><i>Quý bạn vui lòng sử dụng: <a href="<?php echo base_url('doi-ngay-duong-lich-sang-am-lich.html'); ?>">Đổi Ngày Dương Lịch Sang Ngày Âm Lịch</a> nếu không nhớ năm sinh âm lịch của mình</i></p>
                </div>
            </div>
            <div class="row">
                <div class="field field_center">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="button">Xem kết quả</button><br />
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script type="text/javascript">
        function send_form_xem_tuoi_mua_nha() {
            var frm = document.search_xem_tuoi_mua_nha;
            var namsinh   = frm.namsinh.value;
            var nammuanha = frm.nammuanha.value;
            var nam   = $('.myinput option:selected').text();
            var url = "<?php echo base_url('xem-tuoi-mua-nha/tuoi-"+namsinh+"-mua-nha-nam-"+nammuanha+"-co-tot-khong');?>.html";
            window.location.href  = url;
        }
    </script>
    <div class="field clearfix" id="boxTool_new">
        <div class="">
            <?php if (isset($info_user)): ?>
            <?php
                $canchi   = get_chi_replace($info_user['namcanchi']); 
                $slugcanchi = get_can_slug($info_user['canchinam_text']['can']).'-'.get_chi_slug($info_user['canchinam_text']['chi']);
                $namsinh  = $namsinh; 
                ?>
            <div class="row">
                <div class="col-md-12">
                    <p class="title_p h3 text_center" style="font-size: 18px;font-weight: bold;">Thông tin gia chủ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="boxImageOne">
                        <img src="<?php echo public_url('images/icon/mua-nha.jpg'); ?>">
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>
                                <label>Năm sinh âm lịch:</label>
                            </td>
                            <td>
                                <p class="text-center"><?php echo $info_user['amlich'][2]; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Xem mệnh ngũ hành:</label>
                            </td>
                            <td>
                                <p><?php echo $info_user['lucthap']['nghiahan'].' '.$info_user['lucthap']['he'] ?> ( mệnh <?php echo $info_user['lucthap']['he'] ?> )</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Thiên can:</label>
                            </td>
                            <td>
                                <p><?php echo $info_user['canchinam_text']['can']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Địa chi:</label>
                            </td>
                            <td>
                                <p><?php echo get_chi_replace($info_user['canchinam_text']['chi']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cung mệnh:</label>
                            </td>
                            <td>
                                <p><?php echo $info_user['cung_user']['cung']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Niên mệnh năm sinh:</label>
                            </td>
                            <td>
                                <p><?php echo $info_user['cung_user']['menh']; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif ?>
        </div>
        <!-- xu ly cong cu -->
        <?php if ($submit == 1): ?>
            <?php if (isset($info_user)): ?>
            <?php
                $canchi   = get_chi_replace($info_user['namcanchi']); 
                $slugcanchi = get_can_slug($info_user['canchinam_text']['can']).'-'.get_chi_slug($info_user['canchinam_text']['chi']);
                $namsinh  = $namsinh; 
                $nammuanha = $nammuanha;
            ?>
            <?php endif ?>
            <section class="">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title_h2">Gia chủ tuổi <?php echo $canchi; ?> mua nhà năm <?php echo $nammuanha; ?> - <?php echo $canchi_nam_muanha_show; ?></h2>
                        <div>
                            <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table-hover table_cuatui">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><strong>Stt</strong></td>
                                        <td style="text-align: center;"><strong>Tiêu chí</strong></td>
                                        <td style="text-align: center;"><strong>Đánh giá</strong></td>
                                        <td style="text-align: center;"><strong>Kết luận</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;"><em>1</em></td>
                                        <td style="font-weight: bold;">Cửu trạch</td>
                                        <td>
                                            <?php
                                                echo 'Năm '.$nammuanha.' quý bạn '.$tuoi_amlich.' tuổi sẽ thuộc ';
                                            ?>
                                            <span>
                                                <b><?php echo $get_camtrach[0]; ?></b> trong cửu trạch
                                            </span>
                                        </td>
                                        <td colspan="1" rowspan="4">
                                            <p>Tuổi <?php echo $namsinh; ?> trong năm <?php echo get_chi_replace($menh_nam_muanha['canchi']); ?> <?php echo $nammuanha; ?> <br>
                                            <?php
                                                echo $pham_content;
                                            ?><br>
                                            <b>Quý bạn chỉ cần phạm vào 1 trong 3 hạn Cửu Trạch, Kim Lâu, Tam Tai, thì <label class="color_red">không thể mua nhà</label></b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;"><em>2</em></td>
                                        <td style="font-weight: bold;">Tam Tai</td>
                                        <td>Năm <?php echo $nammuanha; ?> là năm <?php echo get_chi_replace($menh_nam_muanha['canchi']); ?>, tuổi <?php echo $canchi; ?> của quý bạn 
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
                                        <td style="font-weight: bold;"><em>3</em></td>
                                        <td style="font-weight: bold;">Kim Lâu</td>
                                        <td>
                                            <?php
                                                echo 'Năm '.$nammuanha.' ('.get_chi_replace($menh_nam_muanha['canchi']).') quý bạn '.$tuoi_amlich.' tuổi';
                                            ?>
                                            , tuổi này 
                                            <?php if (empty($get_kimlau)): ?>
                                            sẽ không phạm phải kim lâu.
                                            <?php else: ?>
                                            sẽ phạm phải <?php echo $get_kimlau['name'].' '.$get_kimlau['content']?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <p class="title_h2">Quý bạn có thể tham khảo những năm khác mà tuổi <?php echo $canchi; ?> <?php echo $namsinh; ?> của mình có thể mua nhà:</p>
                        <div>
                            <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table-hover table_cuatui table_cangiua">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><span style="font-size:16px"><strong>STT</strong></span></td>
                                        <td style="text-align: center;"><span style="font-size:16px"><strong>NĂM NÊN MUA NHÀ</strong></span></td>
                                        <td style="text-align: center;"><span style="font-size:16px"><strong>CHI TIẾT LUẬN GIẢI</strong></span></td>
                                    </tr>
                                    <?php if (!empty($getNammuanha)): ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($getNammuanha as $key => $value): ?>
                                            <?php
                                                // $slug_can_chi_get_n_t_c = $this->vnkey->format_key($value['can'].' '.$value['chi']); 
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $key; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('xem-tuoi-mua-nha/tuoi-'.$slugcanchi.'-mua-nha-nam-'.$key.'-co-tot-khong.html'); ?>">
                                                    Xem tuổi <?php echo $canchi; ?> mua nhà năm <?php echo $key; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                
            </section>
        <?php endif ?>

        
    </div>
    <?php if ($submit == 1): ?>
        <div class="field clearfix" id="boxTool_new">
            <div class="clearfix" style="padding: 0px 5px;">
                <div class="box_content" style="border:none;">
                    <div class="alert alert-success">
                        <p>
                            <i>Bây giờ quý bạn đã chọn được năm mua nhà, thì quý bạn cũng cần lựa chọn ngày tháng mua nhà đẹp nhất với mình. Để tham khảo ngày tốt cho việc mua nhà, quý bạn tham khảo tại: <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-ngay-tot-mua-nha.html'); ?>"><b> Xem ngày mua nhà</b></a></i>
                        </p>
                    </div>
                </div>
                <div class="box_content" style="border:none;">
                    <div class="alert alert-success">
                        <i><p>
                            Thời điểm mua nhà đã quan trọng, thì hướng phong thủy của ngôi nhà càng quan trọng hơn. Để khám phá hướng nhà tốt xấu với tuổi của mình, quý bạn tham khảo tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-huong-nha-tot-xau.html'); ?>"><b>Xem hướng nhà hợp tuổi</b></a>
                        </p></i>
                    </div>
                </div>
                <div class="box_content" style="border:none;">
                    <div class="alert alert-success">
                        <i>
                            <p>
                            Việc mua nhà, mua đất thường sử dụng ngày âm (ngày tính theo Can Chi) và tiến hành tại các giờ tốt, giờ Hoàng Đạo trong ngày. Nên quý bạn cần sử dụng: <br>
                            <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-lich-am-duong-2020.html'); ?>"><b>Xem lịch vạn niên 2020</b></a> 
                            <br>
                            <span class="btn_nhaynhay"></span><a href="<?php echo base_url('doi-ngay-duong-lich-sang-am-lich.html'); ?>"><b>Đổi ngày dương sang ngày âm</b></a>
                                <br>
                                <span class="btn_nhaynhay"></span>
                                <a href="<?php echo base_url($dieu_huong_tv_2021_link_nam); ?>">
                                   <b><?php echo $dieu_huong_tv_2021_text_nam; ?></b>
                               </a>
                               <br> 
                               <span class="btn_nhaynhay"></span>
                                <a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>">
                                   <b><?php echo $dieu_huong_tv_2021_text_nu; ?></b>
                               </a> 
                                <br>
                                <span class="btn_nhaynhay"></span>
                                <a href="<?php echo base_url($dieu_huong_tv_2020_link_nam); ?>">
                                   <b><?php echo $dieu_huong_tv_2020_text_nam; ?></b>
                               </a>
                               <br> 
                               <span class="btn_nhaynhay"></span>
                                <a href="<?php echo base_url($dieu_huong_tv_2020_link_nu); ?>">
                                   <b><?php echo $dieu_huong_tv_2020_text_nu; ?></b>
                               </a> 
                        </p>
                        </i>
                    </div>
                </div>
                <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
                <?php if(isset($dieu_huong_sim)): ?>
                    <div class="anchor_simhoptuoi">
                        <ul>
                            <?php foreach ($dieu_huong_sim as $key => $value): ?>
                               <li><a href="<?php echo base_url($value['link']);?>"><?php echo $value['anchor'];?></a></li> 
                            <?php endforeach ?>
                        </ul>
                    </div>  
                <?php endif; ?>   
                <div class="box_content" style="border: none;">
                    <!-- boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
                        <?php
                            $namsinhnam = $info_user['nam_sinh'];
                            $canchinam  = $info_user['namcanchi'];
                            $canchislug_nam = $iNamsinh;
                         ?>
                        <div class="hidden_destop">
                            <div class="bg_vienvang_full">
                                <div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnam ?></div>
                                <div class="ul_list ul_list_sao" id="ul_list_sao">
                                    <div class="text-justify box_limit enable_limit">
                                        <ul class="ul">
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Xuất Hành hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-khai-truong-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Khai Trương hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-mua-xe-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Xe hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Cưới Hỏi hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-mua-nha-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Nhà hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-dong-tho-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Động Thổ hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('xem-ngay-tot-nhap-trach-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Nhập Trạch hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <button id="btn_toogle_limit" class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
                                        <div class="lbl_view">Hiển thị thêm</div><br>
                                        <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden_mobile">
                            <div class="bg_vienvang_full">
                                <div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnam ?></div>
                                <ul class="ul_list ul_list_sao" id="ul_list_sao">
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Xuất Hành hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-khai-truong-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Khai Trương hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-mua-xe-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Xe hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Cưới Hỏi hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-mua-nha-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Mua Nhà hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-dong-tho-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Động Thổ hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('xem-ngay-tot-nhap-trach-tuoi-'.$canchislug_nam) ?>.html">Xem ngày tốt Nhập Trạch hợp tuổi <?php echo $canchinam ?> <?php echo $namsinhnam ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <!-- end boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
                </div>

                <div class="fl_l width100">
                    <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
                </div>

                <div class="box_content">
                    <div class="box_content_tt1">
                      Các công cụ Xem bói - Tử vi liên quan
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('xem-boi-cung-menh-theo-nam-sinh.html'); ?>">
                            <div class="text-center">
                                  <div class="thumbnail">
                                    <img src="<?php echo base_url('templates/site/images/anhdaidien/cung-menh.jpg'); ?>" alt="">
                                  </div>
                                  <div>Xem bói cung mệnh</div>
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
                      <a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-sinh-con.jpg'); ?>" alt="">
                            </div>
                            <div>Xem tuổi sinh con</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                            </div>
                            <div>Bói bài hàng ngày</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('gieo-que-dich-so.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/gieo-que-dinh-dich.jpg'); ?>" alt="">
                            </div>
                            <div>Gieo quẻ dịch số</div>
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
                </div>
            </div>
        </div>
        
    <?php endif ?>
</div>
<div class="clearfix">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->my_seolink->get_text_foot(); ?>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
    </div>
</div>






