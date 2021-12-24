<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="search_xem_tuoi_ket_hon" action="" method="post" onsubmit="send_form_xem_tuoi_ket_hon();">
        <section class="form-inline">
            <div class="row">
                <div class="col-md-4">
                    <p class="text-center"><label>Tuổi của bạn(Âm lịch) :</label></p>
                    <select name="namsinh" class="namsinh myinput" id="">
                        <?php foreach (list_age_text() as $key => $value): ?>
                            <?php $selected = $iNamsinh==$key?'selected=""':''; ?>
                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <p class="text-center"><label>Giới tính</label></p>
                    <select name="gioitinh">
                        <option value="0" <?php echo $iGioitinh=='nam'?'selected=""':''; ?>>Nam</option>
                        <option value="1" <?php echo $iGioitinh=='nu'?'selected=""':''; ?>>Nữ</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <p class="text-center"><label>Năm kết hôn :</label></p>
                    <select class="textsend" name="namkethon">
                    <?php
                        for($i=2017 ; $i <= 2027 ; $i++){
                            $selected = $iNamkethon==$i?'selected=""':'';
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <p class="" style="font-size: 12px;text-align: center;"><i>Quý bạn vui lòng sử dụng: <a href="<?php echo base_url('doi-ngay-duong-lich-sang-am-lich.html'); ?>">Đổi Ngày Dương Lịch Sang Ngày Âm Lịch</a> nếu không nhớ năm sinh âm lịch của mình</i></p>
                </div>
                <div class="col-md-12 text-center">
                    <p>&nbsp</p>
                    <button type="submit" class="button">Xem chi tiết</button>
                </div>
            </div>

        </section>
    </form>
    <script type="text/javascript">
        function send_form_xem_tuoi_ket_hon() {
            var frm = document.search_xem_tuoi_ket_hon;
            var namsinh   = frm.namsinh.value;
            var gioitinh = frm.gioitinh.value;
            var nam   = $('.myinput option:selected').text();
            if (gioitinh == 0) {
                gioitinh    = 'nam';
                var url = "<?php echo base_url('xem-tuoi-ket-hon/"+gioitinh+"-tuoi-"+namsinh+"-"+nam+"-lay-vo-nam-nao-tot');?>.html";
            }
            else{
                gioitinh = 'nu';
                var url = "<?php echo base_url('xem-tuoi-ket-hon/"+gioitinh+"-tuoi-"+namsinh+"-"+nam+"-lay-chong-nam-nao-tot');?>.html";
            }
            
            document.search_xem_tuoi_ket_hon.action  = url;
        }
    </script>
    <div class="field clearfix">
        <div class="boxTool_new">
            <?php if (isset($info_user)): ?>
            <?php
                $canchi   = get_chi_replace($info_user['namcanchi']); 
                $slugcanchi = get_can_slug($info_user['canchinam_text']['can']).'-'.get_chi_slug($info_user['canchinam_text']['chi']);
                $namsinh  = $namsinh; 
                ?>
            <div class="row">
                <div class="col-md-12">
                    <p class="title_p h3" style="font-size: 18px;font-weight: bold;">Thông tin gia chủ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="boxImageOne">
                        <img src="<?php echo public_url('images/icon/ket-hon.jpg'); ?>">
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
                                <p><?php echo $info_user['canchinam_text']['chi']; ?></p>
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
                $namkethon = $namkethon;
            ?>
            <?php endif ?>
            <section class="" id="boxTool_new">
                <div class="row">
                    <?php if (isset($show_gioitinh) && $show_gioitinh == 'Nữ'): ?>
                        <div class="col-md-12">
                        <h2 class="title_h2 h4 boidam"><?php echo $gioitinh; ?> tuổi <?php echo $canchi; ?> kết hôn năm <?php echo $namkethon; ?> - <?php echo $canchi_nam_kethon_show; ?></h2>
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
                                        <td><em>1</em></td>
                                        <td class="boidam">Kim Lâu</td>
                                        <td>
                                            <?php
                                                echo 'Năm '.$namkethon.' ('.$menh_nam_kethon['canchi'].') quý bạn '.$tuoi_amlich.' tuổi, ';
                                            ?>
                                            , tuổi này 
                                            <?php if (empty($get_kimlau)): ?>
                                            sẽ không phạm phải kim lâu.
                                            <?php else: ?>
                                            sẽ phạm phải <?php echo $get_kimlau['name'].' '.$get_kimlau['content']?>
                                            <?php endif ?>
                                        </td>
                                        <td colspan="1" rowspan="4" class="boidam">
                                            <p class="boidam">Tuổi <?php echo $namkethon; ?> trong năm <?php echo $menh_nam_kethon['canchi']; ?> <?php echo $namkethon; ?> 
                                            <?php
                                                echo $pham_content;
                                            ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <h3 class="title_h2 h4 boidam">Quý bạn có thể tham khảo những năm khác mà tuổi <?php echo $canchi; ?> <?php echo $namsinh; ?> của mình có thể kết hôn :</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table_cuatui">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><span style="font-size:16px"><strong>Stt</strong></span></td>
                                        <td style="text-align: center;"><span style="font-size:16px"><strong>Năm tốt để cưới hỏi</strong></span></td>
                                        <td style="text-align: center;"><span style="font-size:16px"><strong>Luận giải</strong></span></td>
                                    </tr>
                                    <?php if (!empty($getNamkethon)): ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($getNamkethon as $key => $value): ?>
                                            <?php
                                                // $slug_can_chi_get_n_t_c = $this->vnkey->format_key($value['can'].' '.$value['chi']); 
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $key; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('xem-ngay-tot-ket-hon.html'); ?>">
                                                    Xem ngày tốt cưới hỏi năm <?php echo $key; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($show_gioitinh) && $show_gioitinh == 'Nữ'): ?>
                        <div class="col-md-12">
                            <h2 class="title_c title_h1 h4 boidam">kết quả phép xem tuổi  <?php echo $canchi; ?> lấy vợ/lấy chồng tuổi nào thì hợp</h2>
                            <div class="text-center">
                                <table class="table table-hover table-bordered table_cuatui table_cangiua">
                                    <tr>
                                        <td><label>STT</label></td>
                                        <td><label>Tuổi hợp</label></td>
                                        <td><label>Can chi</label></td>
                                        <td><label>Điểm đánh giá</label></td>
                                        <td><label>Luận giải chi tiết</label></td>
                                    </tr>
                                    <?php if (!empty($send_nuhop)): ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($send_nuhop as $key => $value): ?>   <?php if ($value['namhop'] - $namsinh >= -2 && $value['namhop'] - $namsinh <= 10): 
                                                if ($value['info']['total_scores'] >= 4) {
                                                    $cl = 'text_red';
                                                }else{
                                                    $cl = 'text_black';
                                                }
                                            ?>
                                                <tr class="<?php echo $cl; ?>">
                                                    <td>
                                                        <p><?php echo $i++; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $value['namhop'] ?></p>
                                                    </td>
                                                    <td><?php echo $value['info']['al_tuoichong_show'] ?></td>
                                                    <td>
                                                        <p><?php echo $value['info']['total_scores'] ?></p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <a style="color: #337ab7;" href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-'.$namsinh.'-va-tuoi-vo-'.$value['namhop'].'.html'); ?>">Xem tuổi <?php echo get_chi_replace($canchi); ?> và tuổi <?php echo get_chi_replace($value['info']['al_tuoichong_show']) ?></a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    
                                </table>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (isset($show_gioitinh) && $show_gioitinh == 'Nam'): ?>
                        <div class="col-md-12">
                            <h2 class="title_c title_h1 h4 boidam">kết quả phép xem tuổi  <?php echo $canchi; ?> lấy vợ/lấy chồng tuổi nào thì hợp</h2>
                            <div class="text-center">
                                <table class="table table-hover table-bordered table_cuatui table_cangiua">
                                    <tr>
                                        <td><label>STT</label></td>
                                        <td><label>Tuổi hợp</label></td>
                                        <td><label>Can chi</label></td>
                                        <td><label>Điểm đánh giá</label></td>
                                        <td><label>Luận giải chi tiết</label></td>
                                    </tr>
                                    <?php if (!empty($send_namhop)): ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($send_namhop as $key => $value): ?>
                                            <?php if ($value['namhop'] - $namsinh >= -2 && $value['namhop'] - $namsinh <= 10):
                                                if ($value['info']['total_scores'] >= 4) {
                                                    $cl = 'text_red';
                                                }else{
                                                    $cl = 'text_black';
                                                }
                                             ?>
                                                <tr class="<?php echo $cl; ?>">
                                                    <td>
                                                        <p><?php echo $i++; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $value['namhop'] ?></p>
                                                    </td>
                                                    <td><?php echo $value['info']['al_tuoivo_show'] ?></td>
                                                    <td>
                                                        <p><?php echo $value['info']['total_scores'] ?></p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <a style="color: #337ab7;" href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-'.$namsinh.'-va-tuoi-vo-'.$value['namhop'].'.html'); ?>">Xem tuổi <?php echo get_chi_replace($canchi); ?> và tuổi <?php echo get_chi_replace($value['info']['al_tuoivo_show']) ?></a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    
                                </table>
                            </div>
                        </div>
                    <?php endif ?>

                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <p>
                                Khi đã lựa chọn được năm kết hôn hợp tuổi mình rồi, thì quý bạn cũng nên <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>"><b>Xem tuổi sinh con hợp tuổi bố mẹ</b></a> Điều này sẽ giúp gia đình quý bạn càng thêm hạnh phúc, ấm êm.
                            </p>
                            <p>
                                Đồng thời: quý bạn cũng cần lựa chọn tên con theo phong thủy tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>"><b>Xem bói tên cho con</b></a> để đứa bé khi trưởng thành sẽ thành đạt và hạnh phúc.
                            </p>
                        </div>
                        <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
                        <div class="notification_tuvi_2020">
                          <ul>

                            <?php if(isset($dieu_huong_tv_2021_link)): ?>
                            <li><a href="<?php echo $dieu_huong_tv_2021_link;?>"><?php echo $dieu_huong_tv_2021_text;?></a></li>
                            <?php endif; ?>

                            <?php if(isset($dieu_huong_tv_2022_link)): ?>
                            <li><a href="<?php echo $dieu_huong_tv_2022_link;?>"><?php echo $dieu_huong_tv_2022_text;?></a></li>
                            <?php endif; ?>

                            <?php if(isset($dieu_huong_sim)): ?>
                                <?php foreach ($dieu_huong_sim as $key => $value): ?>
                                   <li><a href="<?php echo base_url($value['link']);?>"><?php echo $value['anchor'];?></a></li> 
                                <?php endforeach ?>
                            <?php endif; ?>    
                          </ul>
                        </div>
                        
                        <!-- boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
                            <?php
                                $namsinhnam = $iNam;
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

                        <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
                        
                        <div class="box_content">
                            <div class="box_content_tt1">
                                Các công cụ Xem bói - Tử vi liên quan
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <a href="<?php echo base_url('xem-lich-am-duong-2018.html'); ?>">
                                    <div class="text-center">
                                          <div class="thumbnail">
                                            <img src="<?php echo base_url('templates/site/images/anhdaidien/am-duong-2018.jpg'); ?>" alt="">
                                          </div>
                                          <div>Lịch âm dương 2018</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <a href="<?php echo base_url('xem-lich-van-nien.html'); ?>">
                                    <div class="text-center">
                                            <div class="thumbnail">
                                                <img src="<?php echo base_url('templates/site/images/anhdaidien/lich-van-nien.jpg'); ?>" alt="">
                                            </div>
                                            <div>Xem âm lịch hôm nay</div>
                                    </div>
                                </a>
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
                              <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
                                <div class="text-center">
                                    <div class="thumbnail">
                                      <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                                    </div>
                                    <div>Xem bói ngày sinh</div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-xs-6">
                              <a href="<?php echo base_url('quan-am-linh-xam.html'); ?>">
                                <div class="text-center">
                                    <div class="thumbnail">
                                      <img src="<?php echo base_url('templates/site/images/anhdaidien/quan-am-linh-xam.jpg'); ?>" alt="">
                                    </div>
                                    <div>Gieo quẻ quan âm</div>
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
                <div class="row">
                        <div class="col-md-12">
                            <h3 class="title_h2 h4 color_red" style="text-transform: uppercase;">Xem theo mục đích công việc khác</h3>
                            <div class="nenxanh">
                                <form name="form_search_congviec" onsubmit="return search_congviec_foot();">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <td class="text_center">
                                                <label>Năm sinh <?php echo $namsinh; ?></label>
                                            </td>
                                            <td>
                                                <input type="hidden" name="namsinh" value="<?php echo $namsinh; ?>">
                                                <input type="hidden" name="canchi" value="<?php echo $slugcanchi; ?>">
                                                <select name="congviec">
                                                    <option value="xem-tuoi-lam-an/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-lam-an-voi-tuoi-nao.html">Xem tuổi làm ăn</option>
                                                    <option value="xem-tuoi-lam-nha/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-lam-nha-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi làm nhà</option>
                                                    <option value="xem-tuoi-hop-nhau/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-voi-tuoi-nao.html">Xem tuổi hợp</option>
                                                    <option value="xem-tuoi-ket-hon/nam-tuoi-<?php echo $slugcanchi; ?>-<?php echo $namsinh; ?>-lay-vo-nam-nao-tot.html">Xem tuổi kết hôn</option>
                                                    <option value="xem-tuoi-mua-nha/tuoi-<?php echo $slugcanchi; ?>-mua-nha-nam-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi mua nhà</option>
                                                    <option value="xem-tuoi-sinh-con.html">Xem tuổi sinh con</option>
                                                    <option value="xem-huong-nha-tot-xau/tuoi-<?php echo $slugcanchi; ?>-xay-nha-huong-nao-tot.html">Xem hướng nhà tốt xấu</option>
                                                    <option value="xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html">Xem tuổi vợ chồng</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="button">Xem chi tiết</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <script type="text/javascript">
                                    function search_congviec_foot() {
                                        var frm = document.form_search_congviec;
                                        var congviec  = frm.congviec.value;
                                        window.location.href = "<?php echo base_url('');?>"+congviec;
                                        return false;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <?php $this->load->view('site/import/import_anhduong'); ?>
                    </div>
            </section>
        <?php endif ?>

        
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->my_seolink->get_text_foot(); ?>
                
            </div>
        </div>
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






