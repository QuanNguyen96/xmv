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
    <form name="search_xem_tuoi_lam_nha" action="" method="post" onsubmit="send_form_xem_tuoi_lam_nha();return false;">
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
                    <select name="namsinh" id="" class="myinput">
                        <?php foreach (list_age_text() as $key => $value): 
                            $selected = $iNamsinh==$key?'selected=""':'';
                        ?>
                            <option value="<?php echo $key; ?>" <?php echo $selected; ?> ><?php echo $value; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </section>
        <section class="form-inline">
            <div class="field row">
                <div class="col-md-3 col-md-offset-3 col-sm-4 col-xs-4">
                    <p class="control-label" for="pwd">Dự kiến làm nhà :</p>
                </div>
                <div class="col-md-3 col-sm-8 col-xs-8"> 
                    <select class="textsend" name="namlamnha">
                    <?php
                        for($i=date('Y') ; $i <= 2027 ; $i++){
                            $selected = $iNamlamnha==$i?'selected=""':'';
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
        function send_form_xem_tuoi_lam_nha() {
            var frm = document.search_xem_tuoi_lam_nha;
            var namsinh   = frm.namsinh.value;
            var namlamnha = frm.namlamnha.value;
            var nam   = $('.myinput option:selected').text();
            var url = "<?php echo base_url('xem-tuoi-lam-nha/tuoi-"+namsinh+"-sinh-nam-"+nam+"-lam-nha-"+namlamnha+"-co-tot-khong');?>.html";
            window.location.href  = url;
        }
    </script>
    <div class="field clearfix">
        <div class="">
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
                        <img src="<?php echo public_url('images/icon/lam-nha.jpg'); ?>">
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
                $namlamnha = $namlamnha;
            ?>
            <?php endif ?>
            <section class="">
                <div class="row">
                    <div class="col-md-12 form_nhap_tuoilamnha hidden">
                        <div class="ahihi clearfix" style="background-color: #e8b2c5;">
                            <form action="" method="POST">
                                <div class="text-center">
                                    <b><i>Quý vị vui lòng nhập thông tin dưới đây để xem thông tin chi tiết</i></b>
                                </div>
                                <br>
                                <div class="col-md-3">
                                    <label>Số điện thoại:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" id="phone" name="phone" value="" placeholder="Nhập SDT tại đây..." required="">
                                </div>
                                <div class="col-md-3 text-center">
                                    <button id="shownoidung">Nhận kết quả</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <div class="click_show">
                            <div class="col-md-12">
                                <h2 class="title_h2 h3">Gia chủ tuổi <?php echo $canchi; ?> làm nhà năm <?php echo $namlamnha; ?> - <?php echo $canchi_nam_lamnha_show; ?></h2>
                                <div>
                                    <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table-hover table_cuatui">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;"><strong>Stt</strong></td>
                                                <td style="text-align: center;"><strong>Tiêu chí</strong></td>
                                                <td style="text-align: center;"><strong>Đánh giá</strong></td>
                                                <td width="25%" style="text-align: center;"><strong>Kết luận</strong></td>
                                            </tr>
                                            <tr>
                                                <td><em>1</em></td>
                                                <td class="boidam">Thái Tuế</td>
                                                <td>
                                                    <?php
                                                        echo 'Năm '.$namlamnha.' ('.get_chi_replace($menh_nam_lamnha['canchi']).') quý bạn '.$tuoi_amlich.' tuổi, ';
                                                    ?>
                                                    <?php if (empty($get_thaitue)): ?>
                                                        sẽ không phạm phải Thái Tuế.
                                                    <?php else: ?>
                                                        sẽ phạm phải Thái Tuế
                                                    <?php endif ?>
                                                </td>
                                                <td colspan="1" rowspan="4" class="boidam">
                                                    <p>Tuổi <?php echo $namsinh; ?> trong năm <?php echo get_chi_replace($menh_nam_lamnha['canchi']); ?> <?php echo $namlamnha; ?> 
                                                    <label><?php
                                                        echo '<b style="color:#9f1719;">'.$pham_content.'</b>';
                                                    ?></label></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><em>2</em></td>
                                                <td class="boidam">Hoang Ốc</td>
                                                <td>
                                                    <?php
                                                        echo 'Năm '.$namlamnha.' ('.get_chi_replace($menh_nam_lamnha['canchi']).') quý bạn '.$tuoi_amlich.' tuổi, ';
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
                                                <td>Năm <?php echo $namlamnha; ?> là năm <?php echo get_chi_replace($menh_nam_lamnha['canchi']); ?>, tuổi <?php echo $canchi; ?> của quý bạn 
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
                                                        echo 'Năm '.$namlamnha.' ('.get_chi_replace($menh_nam_lamnha['canchi']).') quý bạn '.$tuoi_amlich.' tuổi, ';
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
                                                <td colspan="4">
                                                    <i>
                                                    " Quý bạn chỉ cần phạm vào 1 trong 4 hạn Thái Tuế, Hoang Ốc, Kim Lâu, Tam Tai, thì không thể làm nhà " 
                                                    </i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <?php if ($luangiai_pham_check): ?> 
                                    <div class="bs-callout bs-callout-warning luangiaipham">
                                        <p>
                                            <a href="<?php echo base_url('xem-ngay-tot-dong-tho.html'); ?>" style="font-weight: bold;">Xem tuổi <?php echo $canchi; ?> làm nhà năm <?php echo $namlamnha; ?> tháng nào tốt ?</a>
                                        </p>                           
                                        <p>
                                            <a href="<?php echo base_url('xem-huong-nha-tot-xau/tuoi-'.get_chi_replace_slug($slugcanchi).'-xay-nha-huong-nao-tot.html'); ?>" style="font-weight: bold;">Tuổi <?php echo $canchi; ?> xây nhà hướng nào tốt</a>
                                        </p>    
                                        <p>
                                            <a href="<?php echo $dieu_huong_tv_2021_link_nam; ?>" style="font-weight: bold;">
                                                <?php echo $dieu_huong_tv_2021_text_nam; ?>
                                            </a>
                                        </p> 
                                        <p>
                                            <a href="<?php echo $dieu_huong_tv_2021_link_nu; ?>" style="font-weight: bold;">
                                                <?php echo $dieu_huong_tv_2021_text_nu; ?>
                                            </a>
                                        </p> 
                                        <p>
                                            <a href="<?php echo $dieu_huong_tv_2022_link_nam; ?>" style="font-weight: bold;">
                                                <?php echo $dieu_huong_tv_2022_text_nam; ?>
                                            </a>
                                        </p> 
                                        <p>
                                            <a href="<?php echo $dieu_huong_tv_2022_link_nu; ?>" style="font-weight: bold;">
                                                <?php echo $dieu_huong_tv_2022_text_nu; ?>
                                            </a>
                                        </p>                      
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="col-md-12">
                                <p class=""><span class="text-danger"><b>LƯU Ý</b></span>: <br>
                                    <i>- Nếu các bạn vẫn muốn làm nhà năm <?php echo $namlamnha; ?>, thì bạn nhất định phải <b>MƯỢN TUỔI</b> để tiến hành. <br>
                                    - Nếu năm <?php echo $namlamnha ?> không phù hợp để tuổi <?php echo $canchi; ?> <?php echo $namsinh; ?> tiến hành xây dựng nhà cửa thì quý bạn hãy <b>tham khảo một năm gần nhất tốt với việc làm nhà</b> của bạn. 
                                    <br><br></i></p>
                                    
                            </div>
                            <?php if (!$luangiai_pham_check): ?>
                                <h3 class="title_h2 h4">Những năm gần nhất cho người tuổi <?php echo $canchi; ?> <?php echo $namsinh; ?> xây dựng nhà được đại cát đại lợi</h3>
                                <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table-hover table_cuatui">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><span style="font-size:16px"><strong>Stt</strong></span></td>
                                            <td style="text-align: center;"><span style="font-size:16px"><strong>Năm nên làm nhà</strong></span></td>
                                            <td style="text-align: center;"><span style="font-size:16px"><strong>Luận giải</strong></span></td>
                                        </tr>
                                        <?php if (!empty($getNamthicong)): ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($getNamthicong as $key => $value): ?>
                                                <?php
                                                    // $slug_can_chi_get_n_t_c = $this->vnkey->format_key($value['can'].' '.$value['chi']); 
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $key; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('xem-tuoi-lam-nha/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-lam-nha-'.$key.'-co-tot-khong.html'); ?>">
                                                        Xem tuổi <?php echo $canchi; ?> làm nhà năm <?php echo $key; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        
                                    </tbody>
                                </table>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-12 click_show">
                        <h3 class="title_h2 h4">Dưới đây là những tuổi có thể làm nhà trong năm <?php echo $namlamnha; ?></h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" dir="ltr" class="table table-bordered table-hover table_cuatui">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><strong>Stt</strong></td>
                                        <td style="text-align: center;"><m><strong>Tuổi mượn</strong></m></td>
                                        <td style="text-align: center;"><m><strong>Luận giải</strong></m></td>
                                    </tr>
                                    <?php
                                        $i = 1;  
                                    ?>
                                    <?php foreach ($muontuoilamnha as $key => $value): ?>
                                        <?php 
                                            $slug_canchi_mtln   = $this->vnkey->format_key($value['canchi_tuoi']);
                                        ?>
                                        <?php if (empty($value['tamtai']) && $value['hoangoc']['is_hoangoc']== 0 && empty($value['kimlau']) && empty($value['thaitue'])): ?>
                                            <tr>
                                                <td><em><?php echo $i++; ?></em></td>
                                                <td><?php echo $key;?></td>
                                                <td>
                                                    <a href="<?php echo base_url('xem-tuoi-lam-nha/tuoi-'.$slug_canchi_mtln.'-sinh-nam-'.$key.'-lam-nha-'.$namlamnha.'-co-tot-khong.html'); ?>">
                                                    Xem tuổi <?php echo get_chi_replace($value['canchi_tuoi']) ?> làm nhà năm <?php echo $namlamnha; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                        
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-md-12">
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
                        <?php if (!$luangiai_pham_check): ?>
                            <div class="bs-callout bs-callout-warning luangiaipham">
                                <p><a href="<?php echo base_url('xem-ngay-tot-dong-tho.html'); ?>" style="font-weight: bold;">Xem tuổi <?php echo $canchi; ?> làm nhà năm <?php echo $namlamnha; ?> tháng nào tốt ?</a></p>                           
                                <p><a href="<?php echo base_url('xem-huong-nha-tot-xau/tuoi-'.get_chi_replace_slug($slugcanchi).'-xay-nha-huong-nao-tot.html'); ?>" style="font-weight: bold;">Tuổi <?php echo $canchi; ?> xây nhà hướng nào tốt</a></p>
                                    <p>

                                        <a href="<?php echo base_url($dieu_huong_tv_2021_link_nam); ?>" style="font-weight: bold;">
                                            <?php echo $dieu_huong_tv_2021_text_nam; ?>
                                        </a>
                                    </p>
                                    <?php if(isset($dieu_huong_tv_2021_text_nu)){?>
                                        <p>
                                            <a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>" style="font-weight: bold;">
                                                <?php echo $dieu_huong_tv_2021_text_nu; ?>
                                            </a>
                                        </p>
                                    <?php } ?>
                                    <p>
                                        <a href="<?php echo base_url($dieu_huong_tv_2022_link_nam); ?>" style="font-weight: bold;">
                                            <?php echo $dieu_huong_tv_2022_text_nam; ?>
                                        </a>
                                    </p> 
                                    <p>
                                        <a href="<?php echo base_url($dieu_huong_tv_2022_link_nu); ?>" style="font-weight: bold;">
                                            <?php echo $dieu_huong_tv_2022_text_nu; ?>
                                        </a>
                                    </p>                           
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-md-12">
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
                    
                    <div class="col-md-12">
                        <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
                    </div>
                    
                </div>
                <div class="field">
                    <?php $this->load->view('site/import/import_anhduong'); ?>
                </div>
            </section>
        <?php endif ?>

        
    </div>
    <?php if ($submit == 1): ?>
        <div class="field clearfix">
            <div class="col-md-12">
                <h3 class="title_h2 color_red boidam">Xem theo mục đích công việc khác</h3>
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
        <div class="field" id="boxTool_new">
            <div class="panel panel-info">
                <div class="panel-heading"><p class="title_p boidam">Để cho kế hoạch làm nhà được chu đáo, giúp công việc được hanh thông, suôn sẻ, quý bạn cần tra cứu:</p></div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <p>1. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-huong-nha-tot-xau/tuoi-'.$slugcanchi.'-xay-nha-huong-nao-tot.html'); ?>">Xem hướng nhà hợp tuổi <?php echo $canchi; ?></a> để lựa chọn hướng nhà đẹp với tuổi của mình</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>2. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-dong-tho.html'); ?>">Xem ngày động thổ</a> hợp tuổi <?php echo $canchi; ?> để lựa chọn ngày tốt động thổ hợp tuổi <?php echo $canchi; ?> của mình</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>3. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-do-tran-lop-mai.html'); ?>">Xem ngày đổ mái</a> để lựa chọn ngày tốt đổ trần, lợp mái hợp tuổi <?php echo $canchi; ?> của mình</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>4. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-nhap-trach-nha-moi.html'); ?>">Xem ngày nhập trạch</a> để lựa chọn ngày tốt nhập trạch về nhà mới hợp tuổi <?php echo $canchi; ?> của mình</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>5. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-mua-nha/tuoi-'.$slugcanchi.'-mua-nha-nam-'.date('Y').'-co-tot-khong.html'); ?>">Xem tuổi <?php echo $canchi; ?> mua nhà năm <?php echo $namsinh; ?></a> để tham khảo những năm mà quý bạn có thể mua nhà, mua đất</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>6. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-hop-nhau/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-hop-voi-tuoi-nao.html'); ?>">Xem người sinh năm <?php echo $canchi; ?> hợp với tuổi nào</a> để tham khảo xem tuổi của mình hợp với tuổi nào trên tất cả các phương diện</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>7. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-hop-lam-an-voi-tuoi-nao.html'); ?>">Xem tuổi làm ăn hợp với <?php echo $canchi; ?></a> : quý bạn có thể tham khảo các tuổi hợp với mình trong công việc làm ăn</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>8. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">Xem tuổi vợ chồng</a> : tham khảo xem vợ chồng quý bạn hợp nhau như thế nào hoặc những tuổi hợp với quý bạn trong quan hệ vợ chồng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>9. Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">Xem tuổi sinh con</a>: tham khảo những năm sinh con hợp với tuổi của bố mẹ</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="field clearfix">
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
<!-- <script>
    $(document).ready(function(){
        $('#shownoidung').on('click',function(){
            var url = window.location.href;
            var date_insert = '<?php //echo date('j').'/'.date('n').'/'.date('Y'); ?>'
            var phone = $('#phone').val();
            // alert(phone.length);
            var phone_length = phone.length;
            if (phone_length == 0) {
                alert('Quý vị vui lòng nhập thông tin theo yêu cầu');
            }else{
                // var regex   = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                // var test    = regex.test(email);
                if (phone_length == 10 || phone_length == 11){
                    $.ajax({
                        url: '<?php //echo base_url(); ?>' + 'site/boituoivochong/ajax_insert_info_user',
                        type:'POST',
                        data:{
                            phone: phone,
                            link: url,
                            date: date_insert,
                        },
                        success:function(response){
                            $('.click_show').removeClass('hidden');
                            $('.form_nhap_tuoilamnha').hide();
                        }
                    });
                }else{
                    alert('Quý vị vui lòng nhập đúng định dạng số điện thoại');
                }
            }
            return false;
        });
    });
</script> -->

