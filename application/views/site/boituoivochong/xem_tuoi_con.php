<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="form_xem_tuoi_sinh_con" action="" method="post" onsubmit="send_form_xem_tuoi_sinh_con();">
        <div class="field">
            <div class="col-md-2">
                <label>Ngày sinh bố</label>
            </div>
            <div class="col-md-3 col-xs-4">
                <select name="ngaysinh_cha">
                    <option value="">Ngày sinh cha</option>
                    <?php
                        for($i=1 ; $i <= 31 ; $i++){
                            $selectd = $send_input_ngaysinh_cha == $i ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <select name="thangsinh_cha">
                    <option value="">Tháng sinh</option>
                    <?php
                        for($i=1 ; $i <= 12 ; $i++){
                            $selectd = $send_input_thangsinh_cha == $i ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <select name="namsinh_cha" id="namsinh_cha">
                    <?php foreach (list_age_text() as $key => $value): ?>
                        <?php $selected = $key==$iCcChong?'selected=""':''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="col-md-2">
                <label>Ngày sinh mẹ</label>
            </div>
            <div class="col-md-3 col-xs-4">
                <select name="ngaysinh_me">
                    <option value="">Ngày sinh mẹ</option>
                    <?php
                        for($i=1 ; $i <= 31 ; $i++){
                            $selectd = $send_input_ngaysinh_me == $i ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <select name="thangsinh_me">
                    <option value="">Tháng sinh</option>
                    <?php
                        for($i=1 ; $i <= 12 ; $i++){
                            $selectd = $send_input_thangsinh_me == $i ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <select name="namsinh_me" id="namsinh_me">
                    <?php foreach (list_age_text() as $key => $value): ?>
                        <?php $selected = $key==$iCcVo?'selected=""':''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="col-md-2">
                <label>Ngày sinh con</label>
            </div>
            <div class="col-md-3 col-xs-4">
                <select name="ngaysinh_con">
                    <option value="">Ngày sinh con :</option>
                    <?php
                        for($i=1 ; $i <= 31 ; $i++){
                            $selectd = $send_input_ngaysinh_con == $i ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <select name="thangsinh_con">
                    <option value="">Tháng sinh</option>
                    <?php
                        for($i=1 ; $i <= 12 ; $i++){
                            $selectd = $send_input_thangsinh_con == $i ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <select name="namsinh_con" required="">
                <?php
                    for($i=2000 ; $i <= 2027 ; $i++){
                        ?>
                        <?php $selected = $i==$iNsCon?'selected=""':''; ?>
                        <?php
                        echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
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
    </form>
    <script type="text/javascript">
        function send_form_xem_tuoi_sinh_con() {
            var frm = document.form_xem_tuoi_sinh_con;
            var canchi_chong = frm.namsinh_cha.value;
            var namsinh_chong   = $('#namsinh_cha option:selected').text();
            var canchi_vo = frm.namsinh_me.value;
            var namsinh_vo   = $('#namsinh_me option:selected').text();
            var url = "<?php echo base_url('xem-tuoi-sinh-con/chong-tuoi-"+canchi_chong+"-"+namsinh_chong+"-vo-tuoi-"+canchi_vo+"-"+namsinh_vo+"-sinh-con-nam-nao-tot');?>.html";
            document.form_xem_tuoi_sinh_con.action  = url;
        }
    </script>
    <?php if ($submit == 1): ?>
    <div class="field boxTool_new clearfix" id="font16">
        <div class="col-md-12 clearfix">
            <div class="col-md-12">
                <div class="show_3tuoi">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center"><label>Thông tin tuổi cha, mẹ và con :</label><br></div>
                        <div class="panel-body">
                            <div id="result">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="boxImageOne">
                                            <img src="<?php echo public_url('images/icon/sinh-con.jpg'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table table-responsive table-hover table-bordered table_cuatui">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th style="width:10%"></th>
                                                    <th style="width:30%">Tuổi Cha </th>
                                                    <th style="width:30%">Tuổi Mẹ </th>
                                                    <th style="width:30%">Tuổi Con </th>
                                                </tr>
                                                <tr>
                                                    <td class="rhead"><label>Dương lịch</label></td>
                                                    <td>
                                                        <p><?php echo $send_input_ngaysinh_cha ?>/<?php echo $send_input_thangsinh_cha ?>/<?php echo $send_input_namsinh_cha ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $send_input_ngaysinh_me ?>/<?php echo $send_input_thangsinh_me ?>/<?php echo $send_input_namsinh_me ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $send_input_ngaysinh_con ?>/<?php echo $send_input_thangsinh_con ?>/<?php echo $send_input_namsinh_con ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2" class="rhead"><label>Âm lịch</label></td>
                                                    <td>
                                                        <p><?php echo $sinh_am_lich_cha[0] ?>/<?php echo $sinh_am_lich_cha[1] ?>/<?php echo $sinh_am_lich_cha[2] ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $sinh_am_lich_me[0] ?>/<?php echo $sinh_am_lich_me[1] ?>/<?php echo $sinh_am_lich_me[2] ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $sinh_am_lich_con[0] ?>/<?php echo $sinh_am_lich_con[1] ?>/<?php echo $sinh_am_lich_con[2] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Ngày <?php echo get_chi_replace($canchi_ngay_show_cha); ?> tháng <?php echo get_chi_replace($canchi_thang_show_cha); ?>, năm <?php echo get_chi_replace($canchi_nam_show_cha); ?></p>
                                                    </td>
                                                    <td>
                                                        <p>Ngày <?php echo get_chi_replace($canchi_ngay_show_me); ?> tháng <?php echo get_chi_replace($canchi_thang_show_me); ?>, năm <?php echo get_chi_replace($canchi_nam_show_me); ?></p>
                                                    </td>
                                                    <td>
                                                        <p>Ngày <?php echo get_chi_replace($canchi_ngay_show_con); ?> tháng <?php echo get_chi_replace($canchi_thang_show_con); ?>, năm <?php echo get_chi_replace($canchi_nam_show_con); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="rhead"><label>Mệnh</label></td>
                                                    <td>
                                                        <p><?php echo $menh_sinh_cha['nghiahan'].' '.$menh_sinh_cha['he']; ?> (<?php echo $menh_sinh_cha['lucthap_giai'] ?>)</p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $menh_sinh_me['nghiahan'].' '.$menh_sinh_me['he']; ?> (<?php echo $menh_sinh_me['lucthap_giai'] ?>)</p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $menh_sinh_con['nghiahan'].' '.$menh_sinh_con['he']; ?> (<?php echo $menh_sinh_con['lucthap_giai'] ?>)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <?php //if(isset($dieu_huong_tv_2021_link_nam)): ?>
                                                        <ul class="ul_anchor_tv2021">
                                                            <li><a href="<?php echo base_url($dieu_huong_tv_2021_link_nam);?>"><?php echo $dieu_huong_tv_2021_text_nam;?></a></li>
                                                            <li><a href="<?php echo base_url($dieu_huong_tv_2021_link_nu); ?>"><?php echo $dieu_huong_tv_2021_text_nu; ?></a></li>
                                                        </ul>
                                                        <?php //endif; ?>
                                                        <?php if ($link_tuvi_2021_nam): ?>
                                                            <ul class="ul_anchor_tv2021">
                                                                <li><a class="is_link" href="<?php echo base_url($link_tuvi_2021_nam); ?>">Xem tử vi 2021 tuổi <?php echo $send_input_namsinh_cha; ?> nam mạng</a></li>
                                                                <li><a class="is_link" href="<?php echo base_url($link_tuvi_2021_nu); ?>">Xem tử vi 2021 tuổi <?php echo $send_input_namsinh_me; ?> nữ mạng</a></li>

                                                                <li><a class="is_link" href="<?php echo base_url($dieu_huong_tv_2022_link_nam); ?>"><?php echo $dieu_huong_tv_2022_text_nam; ?> </a></li>
                                                                <li><a class="is_link" href="<?php echo base_url($dieu_huong_tv_2022_link_nu); ?>"><?php echo $dieu_huong_tv_2022_text_nu; ?></a></li>
                                                            </ul>  
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $diem = $show_point_nguhanh_chong_con + $show_point_nguhanh_vo_con + $show_point_thiencan_chong_con + $show_point_thiencan_me_con + $show_point_diachi_chong_con + $show_point_diachi_me_con;
                                            if ($diem>=13) {
                                              $ketluan = '=> <span class="text-danger">Tốt cho việc sinh con</span>';
                                            }elseif ($diem>=10 && $diem<=12) {
                                              $ketluan = '=> Trung bình, có thể sinh con';
                                            }else{
                                              $ketluan = '=> Chưa tốt cho việc sinh con, nên chọn một năm khác';
                                            }
                                        ?>
                                        <p class="alert alert-warning">Chồng tuổi <?php echo $send_input_namsinh_cha; ?> vợ tuổi <?php echo $send_input_namsinh_me ?> sinh con năm <?php echo $send_input_namsinh_con; ?> <?php echo $ketluan; ?></p>
                                    </div>
                                </div>
                                <!-- update table info age vo chong con -->
                                <div class="row">
                                    <div class="col-md-12"><br>
                                        <table class="table table-bordered table-hover table_cuatui table-responsive text-center">
                                            <tr>
                                                <td>
                                                    #
                                                </td>
                                                <td><p class="text-center">Cha với con</p></td>
                                                <td><p class="text-center">Mẹ với con</p></td>
                                                <td><p class="text-center">Cha với mẹ</p></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-right">Ngũ hành sinh khắc</p>
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo ($show_point_nguhanh_chong_con); ?></span><br> (<label class="<?php echo get_color_text_by_scores($show_point_nguhanh_chong_con, 4); ?>"><?php echo $show_luan_nguhanh_chong_con; ?></label>)
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo ($show_point_nguhanh_vo_con); ?></span><br> (<label class="<?php echo get_color_text_by_scores($show_point_nguhanh_vo_con, 4); ?>"><?php echo $show_luan_nguhanh_vo_con ?></label>)
                                                </td>
                                                <td>
                                                    <span>&nbsp</span><br>
                                                    <label class="<?php echo get_color_text_by_scores($show_point_nguhanh_chong_vo, 4); ?>"><?php echo $show_luan_nguhanh_chong_vo; ?></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-right">Thiên can xung hợp</p>
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo $show_point_thiencan_chong_con; ?></span><br> (<label class="<?php echo get_color_text_by_scores($show_point_thiencan_chong_con); ?>"><?php echo $show_luan_thiencan_cha_con; ?></label>)
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo $show_point_thiencan_me_con; ?></span><br> (<label class="<?php echo get_color_text_by_scores($show_point_thiencan_me_con); ?>"><?php echo $show_luan_thiencan_me_con; ?></label>)
                                                </td>
                                                <td>
                                                    <span>&nbsp</span><br>
                                                    <label class="<?php echo get_color_text_by_scores($show_point_thiencan_cha_me); ?>"><?php echo $show_luan_thiencan_cha_me; ?></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-right">Địa chi xung hợp</p>
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo $show_point_diachi_chong_con; ?></span><br> (<label class="<?php echo get_color_text_by_scores($show_point_diachi_chong_con); ?>"><?php echo $show_luan_diachi_cha_con; ?></label>)
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo $show_point_diachi_me_con; ?></span><br> (
                                                    <label class="<?php echo get_color_text_by_scores($show_point_diachi_me_con); ?>"><?php echo $show_luan_diachi_me_con; ?></label>)
                                                </td>
                                                <td>
                                                    <span>&nbsp</span><br>
                                                    <label class="<?php echo get_color_text_by_scores($show_point_diachi_cha_me); ?>"><?php echo $luan_diachi_cha_me; ?></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tổng
                                                </td>
                                                <td>
                                                    <span class="color_red"><?php echo $show_point_nguhanh_chong_con + $show_point_thiencan_chong_con + $show_point_diachi_chong_con ?></span>
                                                </td>
                                                <td><span class="color_red"><?php echo $show_point_nguhanh_vo_con + $show_point_thiencan_me_con + $show_point_diachi_me_con ?></span>
                                                    
                                                </td>
                                                <td>
                                                    <p class="text-center" style="font-weight: bold;"><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-'.$send_input_namsinh_cha.'-va-tuoi-vo-'.$send_input_namsinh_me.'.html'); ?>">Xem chồng <?php echo $send_input_namsinh_cha; ?> vợ <?php echo $send_input_namsinh_me; ?><br> có hợp nhau không?</a></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <section class="alert alert-warning">
                                            <p><label><a class="is_link" href="<?php echo base_url('xem-tuoi-sinh-con/sinh-con-'.$send_input_namsinh_con.'-hop-tuoi-bo-me-khong.html'); ?>">Sinh con năm <?php echo $send_input_namsinh_con ?> tháng nào tốt, ngày nào tốt?</a></label></p>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($arr_5nam) && !empty($arr_5nam)): ?>
                    <div class="text-center" id="arrowToTable"><b>Những năm sinh con hợp tuổi chồng <?php echo $send_input_namsinh_cha; ?> vợ <?php echo $send_input_namsinh_me; ?></b></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tuổi con</th>
                                <th class="text-center">Điểm đánh giá</th>
                                <th class="text-center">Luận giải chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($arr_5nam as $key => $value): ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td class="text-center"><?php echo $value['sinh_am_lich_con']['2'].' - '.$value['menh_sinh_con']['canchi']; ?></td>
                                <td class="text-center"><?php echo $value['tongdiem']; ?></td>
                                <td class="text-center"><a href="#<?php echo $value['namsinhcon']; ?>" data-id="<?php echo $value['namsinhcon']; ?>" class="clickkk">Xem chi tiết</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                    <?php if (isset($arr_5nam)): ?>
                    <?php foreach ($arr_5nam as $key => $value): ?>
                        <?php $this->load->view('site/boituoivochong/import_vochong_con', $value); ?>
                    <?php endforeach ?>
                    <div class="field">
                        <?php echo $this->my_seolink->get_text_foot(); ?>
                    </div>
                    <?php endif ?>
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p>
                        - Ngoài phép xem tuổi sinh con hợp bố mẹ, thì quý bạn cũng cần lựa chọn cho con của mình một cái tên hợp phong thủy, khi trưởng thành sẽ đỗ đạt, thành tài. Để xem tên hợp phong thủy, mời quý bạn tham khảo tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>"><b> Xem bói tên cho con</b></a>
                    </p>
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
                <div class="">
                    <ul class="pager">
                        <li class="previous">
                            <a style="font-weight: bold;" href="<?php echo base_url('xem-tuoi-sinh-con/sinh-con-'.($send_input_namsinh_con+1).'-hop-tuoi-bo-me-khong.html'); ?>">Bố tuổi <?php echo $send_input_namsinh_cha ?>, mẹ tuổi <?php echo $send_input_namsinh_me; ?> sinh con năm <?php echo $send_input_namsinh_con + 1; ?> có tốt không? →</a> 
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <!-- boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
                        <?php
                            $namsinhnam = $send_input_namsinh_cha;
                            $namsinhnu  = $send_input_namsinh_me;

                            $canchinam  = $canchi_nam_show_cha;
                            $canchinu   = $canchi_nam_show_me;

                            $canchislug_nam = list_age_text((int)$namsinhnam);
                            $canchislug_nu =  list_age_text((int)$namsinhnu);
                         ?>
                        <div class="hidden_destop">
                            <div class="col-md-12">
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
                                <br>
                                <div class="bg_vienvang_full">
                                    <div class="txt_1">Xem ngày tốt cho các công việc hợp tuổi <?php echo $namsinhnu ?></div>

                                    <div class="ul_list ul_list_sao" id="ul_list_sao">
                                        <div class="text-justify box_limit enable_limit">
                                            <ul class="ul">
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
                                        <button id="btn_toogle_limit" class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
                                            <div class="lbl_view">Hiển thị thêm</div><br>
                                            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden_mobile">
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
                        </div>
                    <!-- end boxdieuhuong 8cc xemngaytheotuoi [sinhcon] -->
                </div>

                <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
                
                <div class="clearfix">
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

            <div class="col-md-12">
                <?php if ($getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php
        $canchi = get_chi_replace($canchi_nam_show_cha);
        $slugcanchi = $this->vnkey->format_key($canchi_nam_show_cha); 
        $namsinh  = $send_input_namsinh_cha;
        ?>
    <div class="field" id="font16">
        <div class="row">
            <div class="col-md-12">
                <p class="title_h2">Xem theo mục đích công việc khác</p>
                <div class="nenxanh">
                    <form name="form_search_congviec" onsubmit="return search_congviec_foot();">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>
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
    </div>
    <div class="field">
        <?php $this->load->view('site/import/import_anhduong'); ?>
    </div>
    <?php endif ?>
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
<script>
    $(document).ready(function(){
       $('.clickkk').on('click',function(){
          var id = $(this).data('id');
          $('.autohidden').addClass('hidden');
          $('#'+id).removeClass('hidden');
       });
    });
</script>