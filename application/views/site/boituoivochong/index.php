<?php
    $tuoivo = $tuoi['tuoivo'];
    $tuoichong = $tuoi['tuoichong'];
    $namsinhnam     = $send_input_tuoichong;
    $namsinhnu      = $send_input_tuoivo;
    $canchinam      = $al_tuoichong_show;
    $canchinu       = $al_tuoivo_show;
    $al_tuoichong   = $al_tuoichong;
    $al_tuoivo      = $al_tuoivo;
    $slugcanchinam  = $this->vnkey->format_key($al_tuoichong_show);
    $slugcanchinu   = $this->vnkey->format_key($al_tuoivo_show);
    $arr_input      = array(
        '$namsinhnam'    => $namsinhnam,
        '$namsinhnu'     => $namsinhnu,
        '$canchinam'     => $canchinam,
        '$canchinu'      => $canchinu,
        '$namsinhnam'    => $namsinhnam,
        '$slugcanchinam' => $slugcanchinam,
        '$slugcanchinu'  => $slugcanchinu,
    );
?>
<link rel="stylesheet" href="<?php echo base_url('templates/site/css/xemtuoivochong.css'); ?>" />
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm xemboituoivochong">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form  name="search_tuoivochong" onsubmit="send_form(); return false;" action="" method="post">
        <section class="clearfix">
            <div class="field">
                <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
                    <select name="tuoichong" required="">
                        <option value="">Năm sinh chồng</option>
                        <?php
                            $cr_sl = isset($tuoichong) ? $tuoichong : 1992; 
                            for($i=1970 ; $i <= 2027 ; $i++){
                                $slt = $i == $cr_sl ? 'selected=""' : '';
                                echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                            }
                        ?>
                        <?php
                            for($i=1947 ; $i <= 1969 ; $i++){
                                echo '<option value="'.$i.'" >'.$i.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <select name="tuoivo" required="">
                        <option value="">Năm sinh vợ</option>
                        <?php
                            $cr_sl = isset($tuoivo) ? $tuoivo : 1992; 
                            for($i=1970 ; $i <= 2027 ; $i++){
                                $slt = $i == $cr_sl ? 'selected=""' : '';
                                echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
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
            <div class="field field_center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="button">Xem kết quả</button>
                </div>
            </div>
        </section>
    </form>
        
            
    <section class="clearfix">
        <?php if ($submit == 1): ?>
            <div class="field" id="boxTool_new"> 
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title_p h3" style="text-transform: uppercase;text-align: center;">Kết quả xem chồng tuổi <?php echo $canchinam; ?> vợ tuổi <?php echo $canchinu; ?></h2>
                        </div>
                    </div>
                    <div class="row show_nd">
                        <div class="col-md-12">
                            <h3 class="title_c h4 boidam"><b>Thông tin chung về chồng tuổi <?php echo $canchinam; ?> vợ tuổi <?php echo $canchinu; ?></b></h3>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered text_center">
                                <tr style="background: #9f1719;color: #fff;">
                                    <td style="text-align: center;">
                                        <label>Tiêu chí</label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label>Thông tin tuổi chồng</label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label>Thông tin tuổi vợ</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;font-weight: bold;">Năm sinh dương lịch: </td>
                                    <td><?php echo $namsinhnam; ?></td>
                                    <td><?php echo $namsinhnu; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;font-weight: bold;">Năm sinh âm lịch: </td>
                                    <td><?php echo get_chi_replace($canchinam); ?></td>
                                    <td><?php echo get_chi_replace($canchinu); ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;font-weight: bold;">Ngũ Hành Bản Mệnh: </td>
                                    <td><?php echo $menh_tuoichong['nghiahan'].' '.$menh_tuoichong['he']?></td>
                                    <td><?php echo $menh_tuoivo['nghiahan'].' '.$menh_tuoivo['he']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;font-weight: bold;">Cung phi: </td>
                                    <td><?php echo $cung_tuoichong['cung']?></td>
                                    <td><?php echo $cung_tuoivo['cung']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;font-weight: bold;">Ngũ hành cung phi: </td>
                                    <td><?php echo $cung_tuoichong['menh']?></td>
                                    <td><?php echo $cung_tuoivo['menh']?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <ul class="ul_anchor_tv2021">
                                            <li><a href="<?php echo base_url($dieu_huong_tv_2021_link_nam);?>"><?php echo $dieu_huong_tv_2021_text_nam;?></a></li>
                                            <li><a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>"><?php echo $dieu_huong_tv_2021_text_nu; ?></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row show_nd">
                        <div class="col-md-12">
                            <h3 class="title_c h4 boidam">Bình giải chồng tuổi <?php echo $canchinam; ?> vợ tuổi <?php echo $canchinu; ?></h3>
                        </div>
                        <div class="col-md-12"> 
                            <table class="table table-hover table-bordered">
                                <thead style="background: #9f1719;color: #fff;">
                                    <tr>
                                        <td width="15%" class="text-center">
                                            <label>Tiêu chí</label>
                                        </td>
                                        <td width="25%" class="text-center">
                                            <label class="color_white">HỢP</label>
                                        </td>
                                        <td width="25%" class="text-center">
                                            <label class="color_white">BÌNH HÒA</label>
                                        </td>
                                        <td width="25%" class="text-center">
                                            <label class="color_white">KHẮC</label>
                                        </td>
                                        
                                        <td width="10%" class="text-center">
                                            <label>Điểm</label>
                                        </td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td style="padding-top: 25px;"><label>Ngũ hành bản mệnh</label></td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_menh,2,$show_menh_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_menh,1,$show_menh_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_menh,0,$show_menh_vochong); ?>
                                    </td>
                                   
                                    <td class="text-center">
                                        <?php echo $show_scores_menh; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 25px;"><label>Thiên can </label></td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_thiencan,2,$show_thiencan_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_thiencan,1,$show_thiencan_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_thiencan,0,$show_thiencan_vochong); ?>
                                    </td>
                                    
                                    <td class="text-center">
                                        <?php echo $show_scores_thiencan; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 25px;"><label>Địa chi</label></td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_diachi,2,$show_diachi_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_diachi,1,$show_diachi_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_diachi,0,$show_diachi_vochong); ?>
                                    </td>
                                    
                                    <td class="text-center">
                                        <?php echo $show_scores_diachi; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 25px;"><label>Cung phi: </label></td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_cungkham,2,$show_cungkham_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_cungkham,1,$show_cungkham_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_cungkham,0,$show_cungkham_vochong); ?>
                                    </td>
                                    
                                    <td class="text-center">
                                        <?php echo $show_scores_cungkham; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 25px;"><label>Ngũ Hành Cung Phi</label></td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_thienmenh,2,$show_thienmenh_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_thienmenh,1,$show_thienmenh_vochong); ?>
                                    </td>
                                    <td class="">
                                        <?php echo show_text_scores($show_scores_thienmenh,0,$show_thienmenh_vochong); ?>
                                    </td>
                                    <td class="hidden_destop">
                                    
                                    <td class="text-center">
                                        <?php echo $show_scores_thienmenh; ?>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 show_nd">
                            <p class="title_c">Kết luận : <label>Tổng điểm <?php echo $total_scores; ?></label></p>
                        </div>
                        
                        <div class="col-md-12 show_nd">
                            <section>
                                <?php echo replace_page_text($total_content,$arr_input); ?>
                            </section>
                            <?php $this->load->view('site/adsen/code_ads_chan_cong_cu'); ?>
                            <?php if(isset($dieu_huong_sim)): ?>
                            <div class="anchor_simhoptuoi">
                                <ul>
                                    <?php foreach ($dieu_huong_sim as $key => $value): ?>
                                       <li><a href="<?php echo base_url($value['link']);?>"><?php echo $value['anchor'];?></a></li> 
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bs-callout bs-callout-warning">
                                            <p><label class="iconMax iconMaxOne"></label> <a href="<?php echo base_url('phuong-phap-hoa-giai-xung-khac-vo-chong-hon-nhan-A630.html'); ?>" style="font-weight: bold;">Khám phá phương pháp hóa giải xung khắc của chồng <?php echo $namsinhnam; ?> vợ <?php echo $namsinhnu; ?></a></p>                           
                                            <p><label class="iconMax iconMaxTwo"></label> <a href="<?php echo base_url('xem-tuoi-sinh-con/sinh-con-'.date('Y').'-hop-tuoi-bo-me-khong.html'); ?>" style="font-weight: bold;">Bố tuổi <?php echo $namsinhnam; ?> mẹ tuổi <?php echo $namsinhnu; ?> sinh con năm <?php echo date('Y'); ?> tốt hay xấu?</a></p> 
                                            <p><label class="iconMax iconMaxTwo"></label> <a href="<?php echo base_url('xem-tuoi-sinh-con/sinh-con-'.(date('Y')+1).'-hop-tuoi-bo-me-khong.html'); ?>" style="font-weight: bold;">Bố tuổi <?php echo $namsinhnam; ?> mẹ tuổi <?php echo $namsinhnu; ?> sinh con năm <?php echo (date('Y')+1); ?> tốt hay xấu?</a></p>

                                            <p><label class="iconMax iconMaxThree"></label> <a href="<?php echo base_url($dieu_huong_tv_2021_link_nam); ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2021_text_nam; ?></a></p>
                                            <p><label class="iconMax iconMaxThree"></label> <a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2021_text_nu; ?> </a></p>

                                            <p><label class="iconMax iconMaxThree"></label> <a href="<?php echo base_url($dieu_huong_tv_2022_link_nam); ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2022_text_nam; ?></a></p>
                                            <p><label class="iconMax iconMaxThree"></label> <a href="<?php echo base_url($dieu_huong_tv_2022_link_nu); ?>" style="font-weight: bold;"><?php echo $dieu_huong_tv_2022_text_nu; ?> </a></p>
                                        </div>
                                    </div>
                                    
                                    <!-- boxdieuhuong 8cc xemngaytheotuoi [vochong] -->
                                        <?php 
                                            $canchislug_nam = list_age_text((int)$namsinhnam);
                                            $canchislug_nu =  list_age_text((int)$namsinhnu);
                                         ?>
                                        <div class="col-md-12">
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
                                            <br>
                                            <div class="bg_vienvang_full">
                                                <div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnu ?></div>
                                                <ul class="ul_list ul_list_sao" id="ul_list_sao">
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Xuất Hành hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-khai-truong-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Khai Trương hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-mua-xe-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Mua Xe hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Cưới Hỏi hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-mua-nha-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Mua Nhà hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-dong-tho-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Động Thổ hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('xem-ngay-tot-nhap-trach-tuoi-'.$canchislug_nu) ?>.html">Xem ngày tốt Nhập Trạch hợp tuổi <?php echo $canchinu ?> <?php echo $namsinhnu ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <!-- end boxdieuhuong 8cc xemngaytheotuoi [vochong] -->

                                    <div class="col-md-12">
                                        <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <section>
                                            <div class="box_xvm" style="border: 1px solid #ccc;">
                                                <h2 class="box_content_tt1 fontMiniMb">Xem lại - Xem tuổi vợ chồng theo cung phi</h2><br>
                                                <!-- load form 1 - form tuoi vo chong -->
                                                <form  name="search_tuoivochong_extra" onsubmit="send_form_vo_chong_extra(); return false;" action="" method="post">
                                                    <section class="clearfix">
                                                        <div class="field">
                                                            <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
                                                                <select name="tuoichong" required="">
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
                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <select name="tuoivo" required="">
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
                                                        <div class="field field_center">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <button type="submit" class="button">Xem kết quả</button>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </form>
                                                <script type="text/javascript">
                                                    function send_form_vo_chong_extra() {
                                                        var frm = document.search_tuoivochong_extra;
                                                        var tuoichong   = frm.tuoichong.value;
                                                        var tuoivo  = frm.tuoivo.value;
                                                        window.location.href = "<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong');?>/tuoi-chong-"+tuoichong+"-va-tuoi-vo-"+tuoivo+".html";
                                                    }
                                                </script>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="box_xvm" style="border: 1px solid #ccc;">
                                                <h2 class="box_content_tt1 fontMiniMb">Xem tuổi vợ chồng làm ăn tốt hay xấu</h2><br>
                                                <!-- load form 2 - form xem tuoi vo chong lam an -->
                                                <form name="search_xem_tuoi_hop_lam_an" action="" method="post" onsubmit="send_form_xem_tuoi_hop_lam_an();return false;">
                                                    <div class="clearfix">
                                                        <div class="field clearfix">
                                                            <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
                                                                <label>Năm sinh vợ hoặc chồng (AL) :</label>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-6">
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
                                                        <div class="field field_center clearfix">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                             <button type="submit" class="button" name="check">Xem kết quả</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script type="text/javascript">
                                                    function send_form_xem_tuoi_hop_lam_an() {
                                                        var frm = document.search_xem_tuoi_hop_lam_an;
                                                        var namsinh  = frm.namsinh.value;
                                                        var nam   = $('.myinput option:selected').text();
                                                        window.location.href = "<?php echo base_url('xem-tuoi-lam-an/tuoi-"+namsinh+"-sinh-nam-"+nam+"-hop-lam-an-voi-tuoi-nao');?>.html";
                                                    }
                                                </script>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="box_xvm" style="border: 1px solid #ccc;">
                                                <h2 class="box_content_tt1 fontMiniMb">Xem bói tình yêu theo ngày tháng năm sinh</h2><br>
                                                <!-- load form 3 - form xem boi tinh yeu -->
                                                <form name="" action="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html');
                                                 ?>" method="post">
                                                    <section class="clearfix">
                                                        <div class="field">
                                                            <div class="col-md-6 col-md-offset-3 col-xm-6 col-sm-offset-3 col-xs-12">
                                                                <input type="text" name="tentrai" value="" placeholder="Nhập tên bạn trai" />
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
                                                                <select name="ngaysinhtrai">
                                                                    <option value="">Ngày sinh dương</option>
                                                                    <?php 
                                                                        $ngay = isset($ngay) ? $ngay : '';
                                                                        for( $i = 1; $i<= 31; $i++ ){
                                                                            $slt = $ngay == $i ? 'selected=""' :'';
                                                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 col-sm-4 col-xs-4">
                                                                <select name="thangsinhtrai">
                                                                    <option value="">Tháng sinh</option>
                                                                    <?php 
                                                                        $thang = isset($thang) ? $thang : '';
                                                                        for( $i = 1; $i<= 12; $i++ ){
                                                                            $slt = $thang == $i ? 'selected=""' :'';
                                                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 col-sm-4 col-xs-4">
                                                                <select name="namsinhtrai">
                                                                    <option value="">Năm sinh</option>
                                                                    <?php 
                                                                        for( $i = 1950; $i<= 2025; $i++ ){
                                                                            // $slt = $nam == $i ? 'selected=""' :'';
                                                                            echo '<option value="'.$i.'" >'.$i.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="col-md-6 col-md-offset-3 col-xm-6 col-sm-offset-3 col-xs-12">
                                                                <input type="text" name="tengai" value="" placeholder="Nhập tên bạn gái" />
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
                                                                <select name="ngaysinhgai">
                                                                    <option value="">Ngày sinh dương</option>
                                                                    <?php 
                                                                        for( $i = 1; $i<= 31; $i++ ){
                                                                            $slt = $ngay == $i ? 'selected=""' :'';
                                                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 col-sm-4 col-xs-4">
                                                                <select name="thangsinhgai">
                                                                    <option value="">Tháng sinh</option>
                                                                    <?php 
                                                                        for( $i = 1; $i<= 12; $i++ ){
                                                                            $slt = $thang == $i ? 'selected=""' :'';
                                                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 col-sm-4 col-xs-4">
                                                                <select name="namsinhgai">
                                                                    <option value="">Năm sinh</option>
                                                                    <?php 
                                                                        for( $i = 1950; $i<= 2025; $i++ ){
                                                                            // $slt = $nam == $i ? 'selected=""' :'';
                                                                            echo '<option value="'.$i.'" >'.$i.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="field field_center">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <button type="submit" class="button">Xem kết quả</button>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bs-callout bs-callout-info">
                                            <p style="font-weight: bold;">* Ngoài ra, chồng tuổi <?php echo $namsinhnam; ?> nên xem thêm:  </p>   
                                            <div class="tableMinPro">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>" style="font-weight: bold;">Bói tình yêu qua ngày tháng năm sinh</a></p>
                                                        </td>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" style="font-weight: bold;">Lá số tử vi tuổi <?php echo $namsinhnam; ?> có bình giải chi tiết</a></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slugcanchinam.'-sinh-nam-'.$namsinhnam.'-hop-lam-an-voi-tuoi-nao.html'); ?>" style="font-weight: bold;">Xem tuổi <?php echo $namsinhnam; ?> hợp làm ăn với tuổi nào</a></p>
                                                        </td>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>" style="font-weight: bold;">Bói ngày hôm nay tốt hay xấu với tuổi <?php echo $namsinhnam; ?></a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bs-callout bs-callout-warning">
                                            <p style="font-weight: bold;">* Vợ tuổi <?php echo $namsinhnu; ?> nên xem thêm:  </p>   
                                            <div class="tableMinPro">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>" style="font-weight: bold;">Bói bài tình yêu cho tuổi <?php echo $namsinhnu; ?></a></p>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                - <a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>" style="font-weight: bold;">
                                                                    Xem bói nốt ruồi tài lộc
                                                                </a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slugcanchinu.'-sinh-nam-'.$namsinhnu.'-hop-lam-an-voi-tuoi-nao.html'); ?>" style="font-weight: bold;">Xem tuổi <?php echo $namsinhnu; ?> hợp làm ăn với tuổi nào</a></p>
                                                        </td>
                                                        <td>
                                                            <p>- <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>" style="font-weight: bold;">Xem tên của bạn có ý nghĩa gì</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="field field_center show_nd">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php echo $this->my_seolink->get_text_foot(); ?>
            </div>
        </div>
        
        <div class="field">
            <div class="row">
                <div class="col-md-12">
                    
                    <?php if (isset($getComment) and $getComment): ?>
                        <?php echo $getComment; ?>
                    <?php endif ?>

                </div>
                <div class="col-md-12">
                    <?php $this->load->view('site/sh_comment/get_by_theme'); ?>
                </div>
            </div>
        </div>
    
        <?php if ($submit==1): ?>
            <div class="field">
                <?php $this->load->view('site/import/import_anhduong'); ?>
            </div>
        <?php endif ?>
    </section>
</div>
<script type="text/javascript">
    function send_form() {
        var frm = document.search_tuoivochong;
        var tuoichong   = frm.tuoichong.value;
        var tuoivo  = frm.tuoivo.value;
        window.location.href = "<?php echo base_url($this->uri->segment(1).'/');?>tuoi-chong-"+tuoichong+"-va-tuoi-vo-"+tuoivo+".html";
    }
</script>