<?php
$arr_gio_sinh = array(
    '23 giờ đến 1 giờ' => '23 - 1 giờ',
    '1 giờ đến 3 giờ' => '1 - 3 giờ',
    '3 giờ đến 5 giờ' => '3 - 5 giờ',
    '5 giờ đến 7 giờ' => '5 - 7 giờ',
    '7 giờ đến 9 giờ' => '7 - 9 giờ',
    '9 giờ đến 11 giờ' => '9 - 11 giờ',
    '11 giờ đến 13 giờ' => '11 - 13 giờ',
    '13 giờ đến 15 giờ' => '13 - 15 giờ',
    '15 giờ đến 17 giờ' => '15 - 17 giờ',
    '17 giờ đến 19 giờ' => '17 - 19 giờ',
    '19 giờ đến 21 giờ' => '19 - 21 giờ',
    '21 giờ đến 23 giờ' => '21 - 23 giờ'
);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/css/tv_lg.css?').filemtime('templates/site/css/tv_lg.css');?>">
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm xemboisim">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <p class="lbl_tieude_boiso">Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="simdepForm" action="" method="post" onsubmit="submit_form_bsdt();">
        <div class="row div_innerForm">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="form-group clearfix">
                    <div class="width75 fl_l mb_width65">
                        <input type="text" name="sosim" value="<?php echo isset($so_sim) ? $so_sim : '' ; ?>" placeholder="Nhập số điện thoại" required="" />
                    </div>
                    <div class="width5 fl_l ">&nbsp;</div>
                    <div class="width20 fl_l mb_width30">
                        <select class="form" id="gioitinh" name="gioitinh" required="">
                        <option value="Nam" <?php echo isset($gioi_tinh_val) ? ( ($gioi_tinh_val == 'Nam') ? 'selected=""' : '' ) : '' ?>>Nam</option>
                        <option value="Nữ" <?php echo isset($gioi_tinh_val) ? ( ($gioi_tinh_val == 'Nữ') ? 'selected=""' : '' ) : '' ?>>Nữ</option>
                    </select>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="width20 fl_l mb_width45">
                        <select name="giosinh" required="">
                            <?php 
                             $cr_gio_sinh = isset($post['giosinh']) ? $post['giosinh'] : '';  
                             foreach ($arr_gio_sinh as $key => $value):
                                 $slt = $key == $cr_gio_sinh ? 'selected=""' : ''; 
                             ?>
                               <option <?php echo $slt;?> value="<?php echo $key;?>">
                                 <?php echo $value;?>
                               </option> 
                            <?php endforeach; ?>    
                        </select> 
                    </div>
                    <div class="width5 fl_l mb_width10">&nbsp;</div>
                    <div class="width20 fl_l mb_width45">
                        <select name="ngaysinh" required="">
                            <option value="" selected="" disabled="">Ngày sinh</option>
                            <?php 
                                for( $i = 1; $i<= 31; $i++ ){
                                    $slt = isset($ngay_duong) ? ( ($ngay_duong == $i) ? 'selected=""' : '' ) : '';
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                    <div class="width5 fl_l mb_width0">&nbsp;</div>
                    <div class="width20 fl_l mb_width45">
                        <select name="thangsinh" required="">
                            <option value="" selected="" disabled="">Tháng sinh</option>
                            <?php 
                                for( $i = 1; $i<= 12; $i++ ){
                                    $slt = isset($thang_duong) ? ( ($thang_duong == $i) ? 'selected=""' : '' ) : '';
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                    <div class="width5 fl_l mb_width10">&nbsp;</div>
                    <div class="width25 fl_l mb_width45">
                        <select name="namsinh" id="namsinh">
                            <option value="" selected="" disabled="">Năm sinh</option>
                            <?php 
                                for( $i = 1950; $i<= 2025; $i++ ){
                                    $nam_duong = isset($nam_duong) ? $nam_duong : 1992;
                                    $slt = $nam_duong == $i ? 'selected=""' : '';
                                    echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
                <button type="submit" class="button" id="btn_xemboisim">Xem kết quả</button>
            </div>
        </div>
        <input type="hidden" name="option" value="com_boi"/>
        <input type="hidden" name="view" value="simdep"/>
        <input type="hidden" name="Itemid" value="37"/>

        <script type="text/javascript">
            function submit_form_bsdt() {
                var frm = document.simdepForm;
                var ngaysinh = frm.ngaysinh.value;
                var thangsinh = frm.thangsinh.value;
                var namsinh = frm.namsinh.value;
                var url = "xem-boi-so-dien-thoai.html?utm_medium="+namsinh+"&ns="+ ngaysinh+'-'+thangsinh+'-' + namsinh;
                document.simdepForm.action  = url;
            }
        </script>
    </form>
    <div class="field" style="padding: 2px 10px;line-height: 25px;text-align: justify;">
        <?php if($_POST): ?>
        <div class="col-md-12">
            <div class="form-group clearfix">
                <div class="icon_tieudelon mb_width25 width10 fl_l text-center"><img src="<?php echo base_url('templates/site/images/xemboisdt/icon_tieudelon.jpg'); ?>" alt="icon tiêu đề"><span>I</span></div>
                <div class="div_tieudelon mb_width75 width90 fl_r">
                    <h2 class="h3 color_green bsdt_text_tieude">KẾT QUẢ XEM BÓI SỐ ĐIỆN THOẠI CỦA BẠN</h2>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php
            $search = array(
              'Sim này vẫn chưa đẹp. Mời bạn Click vào đây để tìm sim khác hợp với mệnh <b>Kim</b> của mình',
              'Sim này vẫn chưa đẹp. Mời bạn Click vào đây để tìm sim khác hợp với mệnh <b>Mộc</b> của mình',
              'Sim này vẫn chưa đẹp. Mời bạn Click vào đây để tìm sim khác hợp với mệnh <b>Thuỷ</b> của mình',
              'Sim này vẫn chưa đẹp. Mời bạn Click vào đây để tìm sim khác hợp với mệnh <b>Hoả</b> của mình',
              'Sim này vẫn chưa đẹp. Mời bạn Click vào đây để tìm sim khác hợp với mệnh <b>Thổ</b> của mình',
            );
            $replace = array('','','','','');
            ?>
        <?php if ($_POST): ?>
            <?php
                $ngaysinh   = $ngayduong  = isset( $ngaysinh ) ? $ngaysinh : 6;
                $thangsinh  = $thangduong = isset( $thangsinh ) ? $thangsinh : 6;
                $namsinh    = $namduong   = isset( $namsinh ) ? $namsinh : 1986;
                ?>
            <?php if (isset($success)): ?>
                <section class="boxLuanSim" style="line-height: 25px;">
                    <div class="thongtin">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="div_sosim">
                                    <div class="div_icon width10 fl_l"><img src="<?php echo base_url('templates/site/images/xemboisdt/icon_sim.png'); ?>" alt=""></div>
                                    <div class="width90 fl_l">
                                        <span class="lbl_sosim">&nbsp;&nbsp;<b>Số sim:</b></span>
                                        <span class="nd_sosim"><?php echo $so_sim; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="div_nguhanh">
                                    <div class="div_icon width10 fl_l"><img src="<?php echo base_url('templates/site/images/xemboisdt/icon_nguhanh.png'); ?>" alt=""></div>
                                    <div class="width90 fl_l">
                                        <span class="lbl_nguhnah">&nbsp;&nbsp;<b>Ngũ hành dãy số:</b></span>
                                        <span class="nd_nguhanh"><?php echo $ngu_hanh_day_so_val;?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="div_sosim">
                                    <div class="width100 fl_l" style="padding-right: 10px;">
                                        <p><b>Thân chủ:</b> <?php echo $gioi_tinh_val; ?> sinh vào ngày <?php echo $ngay_duong."/".$thang_duong."/".$nam_duong;?> </p>
                                        <p><b>Âm lịch:</b> <?php echo $ngay_am."/".$thang_am."/".$nam_am;?></p>   
                                        <p><b>Theo Can chi:</b> <b style="color:#03C;"><?php echo $ngay_can_val." ".$ngay_chi_val; ?></b> tháng <b style="color:#03C;"><?php echo $thang_can_val." ".$thang_chi_val; ?></b> năm <b style="color:#03C;"><?php echo $nam_can_val." ".$nam_chi_val; ?></b>  </p>  
                                        <p><b>Ngũ hành:</b> <b style="color:#03C;"><?php echo $ngu_hanh_nap_am_val; ?></b> <?php echo $luan_nam_sinh;?> </p>  
                                        <p><b>Số lượng chỉ:</b> <?php echo $so_luong;?> lượng <?php echo $so_chi;?> chỉ. <?php echo $luan_luong_chi;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="icon_tieudelon mb_width25 width10 fl_l text-center"><img src="<?php echo base_url('templates/site/images/xemboisdt/icon_tieudelon.jpg'); ?>" alt="icon tiêu đề"><span>II</span></div>
                            <div class="div_tieudelon mb_width75 width90 fl_r">
                                <p class="h4 color_green bsdt_text_tieude"> Phân tích luận phong thủy sim theo ngày sinh thân chủ:</p>
                            </div>
                        </div>
                    </div>
                    <div class="tableLuanSim">
                        <section class="boxlistContentSim clearfix boxFullWidth boxListContentCustom row">
                            <div class="form-group clearfix dis_flex">
                                <div class="mb_width100 fl_l width10 tieudenho tbl_cell">
                                    01
                                </div>
                                <div class="mb_width100 width90 fl_l ndung_nho tbl_cell">
                                    <div class="form-group">
                                        <div class="text_tieudenho">
                                            <span class="border_bottom">Luận Âm dương phối</span>
                                        </div>
                                        <div class="xbsdt_summ">
                                            Âm dương là hai khái niệm để chỉ hai thực thể đối lập ban đầu tạo nên toàn bộ vũ trụ. Ý niệm âm dương đã ăn sâu trong tâm thức người Việt từ ngàn xưa và được phản chiếu rất rõ nét trong ngôn ngữ nói chung và các con số nói riêng. Người xưa quan niệm rằng các số chẵn mang vận âm, các số lẻ mang vận dương.
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">1.1 Luận âm dương bên trong dãy số:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width26 fl_l div_diem_mb padding box_shadow margin">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_day_so; ?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width37 fl_l mb_width100 padding">
                                                <div class="box_shadow padding">
                                                    <div class="bottom_green text-uppercase"><b>Vận âm</b></div>
                                                    <div class="bottom_green"><i>Số mang vận âm:</i> <b><?php echo $so_van_am; ?></b></div>
                                                    <div><i>Chiếm số phần trăm:</i> <b><?php echo $ty_le_am; ?>%</b></div>
                                                </div>
                                            </div>
                                            <div class="mb_nd width37 fl_l mb_width100 padding">
                                                <div class="box_shadow padding">
                                                    <div class="bottom_green text-uppercase"><b>Vận dương</b></div>
                                                    <div class="bottom_green"><i>Số mang vận dương:</i> <b><?php echo $so_van_duong; ?></b>  </div>
                                                    <div><i>Chiếm số phần trăm:</i> <b><?php echo $ty_le_duong; ?>%</b></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div><span class="icon_chuong"></span><span><i><?php echo ucfirst($luan_am_duong_day_so); ?></i></span></div>
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">1.2 Luận tính âm dương của dãy số và thân chủ:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width26 fl_l div_diem_mb padding box_shadow margin">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_vuong; ?> ĐIỂM
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div><span class="icon_chuong"></span>
                                                <span>
                                                    <i>
                                                        Thân chủ sinh năm  <b><?php echo $nam_can_val." ".$nam_chi_val;?></b>, thuộc tuổi<b> <?php echo $vuong_than_chu_val;?> <?php echo $gioi_tinh_val;?></b>. <?php echo $luan_vuong_than_chu;?>.
                                                    </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group clearfix dis_flex margin_top">
                                <div class="mb_width100 fl_l width10 tieudenho tbl_cell">
                                    02
                                </div>
                                <div class="mb_width100 width90 fl_l ndung_nho tbl_cell">
                                    <div class="form-group">
                                        <div class="text_tieudenho">
                                            <span class="border_bottom">Xem Ngũ Hành - Luận Tứ Trụ</span>
                                        </div>
                                        <div class="xbsdt_summ">
                                            Theo triết học cổ Trung Hoa, tất cả vạn vật đều phát sinh từ năm nguyên tố cơ bản và luôn luôn trải qua năm trạng thái được gọi là: Mộc, Hỏa, Thổ, Kim và Thủy. hay còn gọi là Ngũ hành. Học thuyết Ngũ hành diễn giải sự sinh hoá của vạn vật qua hai nguyên lý cơ bản Tương sinh và Tương khắc trong mối tương tác và quan hệ của chúng. 
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">2.1 Xem ngũ hành của dãy số và Thân chủ:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width30 fl_l div_diem_mb padding box_shadow margin">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_ngu_hanh;?>  ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width70 fl_l mb_width100 padding">
                                                <div class="form-group">
                                                    <div class="box_shadow padding width100">
                                                        <span class="icon_sim"></span>
                                                        <i>
                                                            <?php echo $ngu_hanh_than_chu_val;?> (<?php echo $ngu_hanh_nap_am_val;?> - )
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="form-group margin_top">
                                                    <div class="box_shadow padding width100">
                                                        <span class="icon_nguhanh"></span>
                                                        <b>Ngũ hành dãy số: </b><b style="color:#03C;"> <?php echo $ngu_hanh_day_so_val; ?></b>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div><span class="icon_chuong"></span><span><i><?php echo ucfirst($luan_ngu_hanh_than_chu_day_so); ?></i></span></div>
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">2.2 Xem Tứ Trụ của dãy số và Thân chủ:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width30 fl_l div_diem_mb padding box_shadow margin">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_tu_tru;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width70 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100">
                                                    <div>
                                                        <i>
                                                            Giờ <b><?php echo $gio_chi_val; ?></b>, ngày <b><?php echo $ngay_can_val." ".$ngay_chi_val ?></b> tháng <b><?php echo $thang_can_val." ".$thang_chi_val; ?></b> năm <b><?php echo $nam_can_val." ".$nam_chi_val; ?></b>. Phân tích tứ trụ theo ngũ hành được thành phần như sau:
                                                        </i>
                                                    </div>
                                                    <div>
                                                        <table width="100%" cellspacing="0" cellpadding="3" bordercolor="#000" border="1" align="center" style="border-collapse: collapse;text-align: center!important;">
                                                            <?php if ($this->agent->is_mobile()): 
                                                                    if(isset($mang_ngu_hanh_tu_tru_val) && !empty($mang_ngu_hanh_tu_tru_val)):  
                                                            ?>
                                                                <tbody>
                                                                    <?php foreach ($mang_ngu_hanh_tu_tru_val as $key => $value): ?>
                                                                        <tr>
                                                                            <td class="td_mobile">

                                                                                <img src="<?php echo base_url('templates/site/images/sim'); ?>/<?php echo $value; ?>.png"/>
                                                                                <?php echo $value; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $mang_ngu_hanh_tu_tru_count[$key]; ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                </tbody>
                                                                
                                                            <?php else : ?>
                                                                <tbody>
                                                                    <tr>
                                                                        <?php foreach ($mang_ngu_hanh_tu_tru_val as $key => $value): ?>
                                                                            <td>
                                                                                <?php echo $value; ?>
                                                                                <div class="text-center"><img src="<?php echo base_url('templates/site/images/sim'); ?>/<?php echo $value; ?>.png"/></div>
                                                                            </td>
                                                                        <?php endforeach ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php foreach ($mang_ngu_hanh_tu_tru_count as $key => $value): ?>
                                                                            <td>
                                                                                <?php echo $value; ?>
                                                                            </td>
                                                                        <?php endforeach ?>
                                                                    </tr>
                                                                </tbody>
                                                            <?php endif; endif ?>
                                                        </table>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <i>Các hành vượng: </i>
                                                            <b>
                                                                <?php if(!empty($mang_hanh_vuong_val)) echo join(' ', $mang_hanh_vuong_val); ?>
                                                            </b>
                                                        </div>
                                                        <div>
                                                            <i>Các hành suy: </i>
                                                            <b>
                                                                <?php if(!empty($mang_hanh_suy_val)) echo join(' ', $mang_hanh_suy_val); ?>
                                                            </b>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="icon_chuong"></span>
                                                        <span>
                                                            <i>
                                                                Dãy số mang hành <?php echo $ngu_hanh_day_so_val; ?>, <?php echo $luan_tu_tru; ?>.
                                                            </i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">2.3 Ngũ hành sinh khắc bên trong dãy số:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width30 fl_l div_diem_mb padding box_shadow margin">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_sinh_khac;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width70 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100">
                                                    <div>
                                                        <i>
                                                            Phân tích dãy số theo thứ tự từ trái sang phải, được các số:
                                                        </i>
                                                    </div>
                                                    <div style="overflow: auto;">
                                                        <?php if ($this->agent->is_mobile()): ?>
                                                            <table style="text-align: center; width:100%;border:1px solid #000">
                                                                <?php if ($mang_day_so): ?>
                                                                    <?php foreach ($mang_day_so as $key => $value): ?>
                                                                        <tr>
                                                                            <td style='border:1px solid #000'>
                                                                                <span style='color:#006699; font-weight:bold;'>
                                                                                    <img src="<?php echo base_url('templates/site/images/sim/').$mang_ngu_hanh_day_so_val[$key]; ?>.png"/>
                                                                                </span>
                                                                            </td>
                                                                            <td style='border:1px solid #000'>
                                                                                <strong><?php echo $value ?></strong>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                <?php endif ?>
                                                            </table>
                                                        <?php else : ?>
                                                            <table style="text-align: center; width:100%;">
                                                                <tr>
                                                                    <?php foreach ($mang_day_so as $key => $value): ?>
                                                                        <td style='border:1px solid #000'>
                                                                            <strong><?php echo $value ?></strong>
                                                                        </td>
                                                                    <?php endforeach ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php foreach ($mang_ngu_hanh_day_so_val as $key => $value): ?>
                                                                        <td style='border:1px solid #000'>
                                                                            <span style='color:#006699; font-weight:bold;'>
                                                                                <img src="<?php echo base_url('templates/site/images/sim/').$value; ?>.png"/>
                                                                            </span>
                                                                        </td>
                                                                    <?php endforeach ?>
                                                                </tr>
                                                            </table>
                                                        <?php endif ?>
                                                    </div>

                                                    <div>
                                                        <span class="icon_chuong"></span>
                                                        <span>
                                                            <i>
                                                                Theo chiều từ trái sang phải (chiều thuận của sự phát triển), xảy ra <?php echo $so_quan_he_tuong_sinh; ?> quan hệ tương sinh và <?php echo $so_quan_he_tuong_khac; ?> quan hệ tương khắc.
                                                            </i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group clearfix dis_flex margin_top">
                                <div class="mb_width100 fl_l width10 tieudenho tbl_cell">
                                    03
                                </div>
                                <div class="mb_width100 width90 fl_l ndung_nho tbl_cell">
                                    <div class="form-group">
                                        <div class="text_tieudenho">
                                            <span class="border_bottom">Xem Cửu Tinh đồ bên trong dãy số</span>
                                        </div>
                                        <div class="xbsdt_summ">
                                            Chúng ta đang ở thời kỳ Hạ Nguyên, vận 8 (từ năm 2004 - 2023) do sao Bát bạch quản nên số 8 là vượng khí. Sao Bát Bạch nhập Trung cung của Cửu tinh đồ, khí của nó có tác dụng mạnh nhất và chi phối toàn bộ địa cầu. 
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width30 fl_l div_diem_mb padding box_shadow margin">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_cuu_tinh_do_phap;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width70 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100">
                                                    <div class="text-center">
                                                        <img alt="sonban" src="<?php echo base_url('templates/site/images/sonban.gif') ?>"/>
                                                    </div>

                                                    <div class="margin_top">
                                                        <span class="icon_chuong"></span>
                                                        <span>
                                                            <i>
                                                                <p><?php echo $luan_cuu_tinh_do_phap; ?></p>
                                                            </i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group clearfix dis_flex margin_top">
                                <div class="mb_width100 fl_l width10 tieudenho tbl_cell">
                                    04
                                </div>
                                <div class="mb_width100 width90 fl_l ndung_nho tbl_cell">
                                    <div class="form-group">
                                        <div class="text_tieudenho">
                                            <span class="border_bottom">Hành Quẻ kinh Dịch bên trong dãy số</span>
                                        </div>
                                        <div class="xbsdt_summ">
                                            Theo lý thuyết Kinh Dịch, mỗi sự vật hiện tượng đều bị chi phối bởi các quẻ trùng quái, trong đó quẻ Chủ là quẻ đóng vai trò chủ đạo, chi phối quan trọng nhất đến sự vật, hiện tượng đó. Bên cạnh đó là quẻ Hỗ, mang tính chất bổ trợ thêm.
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">4.1 Luận quẻ chủ của số:</div>
                                        <div class="form-group clearfix">
                                            <div class="width25 fl_l div_diem_mb padding box_shadow margin_top">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_que_chu;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width75 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100 clearfix dis_flex">
                                                    <div class="img_que text-center width35 fl_l text-center mb_width100 tbl_cell">
                                                       <p class="text-uppercase"><b class=" text-center">Quẻ chủ số <?php echo $que_chu_so;?></b></p>
                                                        <img width="50" alt="111111" src="<?php echo base_url('templates/site/images/que/'.$que_chu_so.'.gif'); ?>"/>
                                                        <p><b> <?php echo $que_chu_val;?></b></p>
                                                    </div>

                                                    <div class="nd_que width65 fl_l mb_width100 tbl_cell">
                                                        Quẻ chủ của dãy số là quẻ số<b style="color:#03C;"> <?php echo $que_chu_so; ?>| <?php echo $que_chu_val; ?></b>.
                                                        <div class="div_diengiai">
                                                            <?php echo $infoQuedich['diengiai'];?>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="muccon_tieude">4.2 Luận quẻ hỗ của số:</div>
                                        <div class="form-group clearfix">
                                            <div class="width25 fl_l div_diem_mb padding box_shadow margin_top">
                                                <div class="luandayso_sodiem">
                                                    <?php echo $diem_que_ho;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width75 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100 clearfix dis_flex">
                                                    <div class="img_que text-center width35 fl_l text-center mb_width100 tbl_cell">
                                                        <p class="text-uppercase"><b class=" text-center">Quẻ hỗ số <?php echo $que_ho_so;?></b></p>
                                                        <img width="50" alt="111111" src="<?php echo base_url('templates/site/images/que/'.$que_ho_so.'.gif'); ?>"/>
                                                        <p><b> <?php echo $infoQueho['ten'];?></b></p>
                                                    </div>

                                                    <div class="nd_que width65 fl_l mb_width100 tbl_cell">
                                                        Quẻ Hỗ được tạo thành từ quẻ thượng là quẻ số<b style="color:#03C;"> <?php echo $que_chu_so; ?>| <?php echo $que_chu_val; ?></b>, các hào 5,4,3 của quẻ chủ, quẻ hạ là các hào 4,3,2 của quẻ chủ. Đây là quẻ số <?php echo $que_ho_so; ?> <?php echo $que_ho_val; ?>.
                                                        <div class="div_diengiai">
                                                            <?php echo $infoQueho['diengiai']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group clearfix dis_flex margin_top">
                                <div class="mb_width100 fl_l width10 tieudenho tbl_cell">
                                    05
                                </div>
                                <div class="mb_width100 width90 fl_l ndung_nho tbl_cell">
                                    <div class="form-group">
                                        <div class="text_tieudenho">
                                            <span class="border_bottom">Xem tổng số nút  và cặp số đẹp trong dãy số</span>
                                        </div>
                                    </div>

                                    <div class="div_muccon">
                                        <div class="muccon_tieude">5.1 Tổng số nút:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width25 fl_l div_diem_mb box_shadow margin">
                                                <div class="luandayso_sodiem luandayso_sodiem_nopad">
                                                    <?php echo $diem_tong_nut;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width75 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100 clearfix">
                                                    <div>
                                                        <span class="icon_chuong"></span>
                                                        <span><i>Tổng số nút của dãy số: <?php echo $tong_nut_day_so; ?> - <?php echo $luan_tong_nut; ?></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="muccon_tieude">5.2 Các cặp số đẹp:</div>
                                        <div class="form-group clearfix dis_flex">
                                            <div class="width25 fl_l div_diem_mb box_shadow margin">
                                                <div class="luandayso_sodiem luandayso_sodiem_nopad">
                                                    <?php echo $diem_so_dac_biet;?> ĐIỂM
                                                </div>
                                            </div>
                                            <div class="mb_nd width75 fl_l mb_width100 padding">
                                                <div class="box_shadow padding width100 clearfix">
                                                    <div>
                                                        <span class="icon_chuong"></span>
                                                        <span><i>
                                                            <?php if ($luan_day_so_dac_biet): ?>
                                                                <?php foreach ($luan_day_so_dac_biet['day_so'] as $key => $value): ?>
                                                                    <?php echo $value; ?>(<?php echo isset($luan_day_so_dac_biet['loai'][$key])?$luan_day_so_dac_biet['loai'][$key]:''; ?>)
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <style type="text/css">
                                .diengiaiSim{  }
                                .diengiaiSim p{ text-indent: unset !important;font-size: 16px !important; }
                                .diengiaiSim span{ text-indent: unset !important;font-size: 16px !important; }
                            </style>

                            <?php if( isset( $check_sim['luansim'] ) && $check_sim['luansim'] != null ): ?>
                            <div class="col-md-12">
                                <div class="luanDiemShow">
                                    <p class="">Tổng kết</p>
                                </div>
                                <div class="bottomLuanDiemShow">
                                    <div class="luanSim">
                                        <?php echo $check_sim['luansim'];?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?> 

                            <div class="form-group clearfix margin_top">
                                <div class="text-center tongdiem">
                                    <p class="td_diem">Tổng điểm <?php echo $tong_diem; ?>/10 </p>
                                    <p class="td_binh"><?php echo $ket_luan; ?></p>
                                    <p class="td_sim"><?php echo $so_sim;?></p>
                                </div>
                            </div>
                            <?php if ($_POST): 
                                 $btn_lg_tt = 'Luận giải số điện thoại chuyên sâu';
                                 if($this->agent->is_mobile())
                                   $btn_lg_tt = 'Luận giải SĐT chuyên sâu';       
                            ?>
                            <div class="row tv_lg">
                              <div class="col-md-6 col-xs-12">
                                  <span class="btn_tv_lg btn_tv" data-toggle="modal" data-target="#tuvan">Tư vấn chọn sim phong thủy</span>
                              </div>  
                              <div class="col-md-6 col-xs-12">
                                  <span class="btn_tv_lg btn_lg"  data-toggle="modal" data-target="#luangiai"><?php echo $btn_lg_tt; ?></span>
                              </div> 
                            </div>
                            <?php endif ?>
                            <div class="xbs_control">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-md-offset-2">
                                        <a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>">Xem lại từ đầu</a>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                       <a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>">Xem cho người khác</a> 
                                    </div>
                                </div>  
                            </div>
                            <!--
                            <div class="form-group clearfix margin_top">
                                <div class="dieuhuong2019 clearfix mgt0">
                                    <?php $this->load->view('site/import/form_tv_2021'); ?>
                                </div>
                            </div>
                            -->
                        </section>
                    </div>
                </section>
            <?php endif ?>
        <?php endif ?>
    </div>
    <?php if (isset($success)): ?>
    <div class="xbs_pmlq col-md-12">
        <h3>Phần mềm xem bói liên quan</h3>
        <div class="xbs_pmlq_bb">
            <h4>Bói bài hàng ngày - Đoán Hung Cát hàng ngày</h4>
            <div>
                <div class="field hangngaybutton bbnh_ok">
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-6">
                     <a href="<?php echo base_url('boi-bai-hang-ngay.html?gioitinh=nam&amp;sl=14');?>" class="button btn_xao_bai">Nam xáo 7 lần</a>
                   </div>
                   <div class="col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-6">
                     <a href="<?php echo base_url('boi-bai-hang-ngay.html?gioitinh=nu&amp;sl=18');?>" class="button btn_xao_bai">Nữ xáo 9 lần</a>
                   </div>
                </div>
                <div class="imgboibai">
                    <img src="<?php echo base_url('templates/site/images/Capture.png');?>" alt="">
                </div>
            </div>
        </div>
        <div class="xbs_pmlq_tv">
            <h4>Lấy lá số tử vi - Bình giải vận hạn cuộc đời</h4>
            <div><?php $this->load->view('site/import/form_xem_tu_vi'); ?></div>
        </div>
        <div class="xbs_pmlq_xbty">
            <h4>Xem bói tình yêu theo tên và ngày sinh của 2 người</h4>
            <div><?php $this->load->view('site/import/form_xem_boi_tinh_yeu'); ?></div>
        </div>
        <div class="xbs_pmlq_xbns">
            <h4>Xem bói ngày sinh</h4>
            <div>
                <form name="" action="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>" method="post">
                   <div class="field">
                     <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
                        <select name="ngay">
                            <?php 
                                for( $i = 1; $i<= 31; $i++ ){
                                    $slt = 1 == $i ? 'selected=""' :'';
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                             ?>
                         </select>
                     </div>
                     <div class="col-md-2 col-sm-4 col-xs-4">
                         <select name="thang">
                            <?php 
                                for( $i = 1; $i<= 12; $i++ ){
                                    $slt = 1 == $i ? 'selected=""' :'';
                                    echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                }
                             ?>
                         </select>
                     </div>
                     <div class="col-md-2 col-sm-4 col-xs-4">
                         <select name="nam">
                            <?php 
                                for( $i = 1950; $i<= 2025; $i++ ){
                                    $slt = 1992 == $i ? 'selected=""' :'';
                                    echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                                }
                             ?>
                         </select>
                     </div>
                   </div>
                   <div class="field field_center">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                         <button type="submit">Xem kết quả</button>
                      </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="field">
        <div class="col-md-12">
            <div class="js_Form_content">
              <div class="js_content_height"><?php echo $this->my_seolink->get_text(); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php $this->load->view('site/sh_comment/get_by_theme'); ?>
    </div>
    <div class="field">
        <div class="col-md-12">
            <?php if ($getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>
        </div>
    </div>
</div>
<?php if ($_POST):
 $this->load->view('site/import/box_luan_giai_sim_chuyen_sau',$popup);
 $this->load->view('site/import/box_tu_van_chon_sim_phong_thuy',$popup); 
 endif ?>    
<script>
    $(document).ready(function(){
        $('#btn_xemboisim').on('click',function(){
            var frame = document.simdepForm;
            var namsinh = $('#namsinh').val();
            var domain = '<?php echo base_url(); ?>';
            var link = 'xem-boi-so-dien-thoai.html';
            frame.action = domain + link;
        });
    });
</script>
<style type="text/css">
    /*Luan sim*/
    .contentPage{ background: #fff;border-radius: 20px 20px 0px 0px; }
    .contentPage .title_h1{ color: #fff;text-transform: uppercase;background: #6a1700 url('../images/bg-title-init.png');color: white;position: relative;height: 46px;line-height: 46px;text-align: center;font-weight: bold;font-size: 14px;text-transform: uppercase;border-radius: 0px 40px 40px 0px; }
    .contentPage .title_h1:before{ position: absolute;left: -22px;top: -21px;/* bottom: 0px; */width: 31px;height: 67px;background: url(../images/title_page_all.png) 100% 100% no-repeat;content: " "; }
    .bodyPage{ padding: 34px 21px; }
    .luanSim .bodyLuanSim{  }
    .boxFormSim{ width: 80%;margin: 0px auto; }
    .boxFormSim img{ width: 100%; }
    .boxFormSim .bgFormSim{ background: url('../images/bg-form-submit.png') 100%;background-size: 100%;padding: 8px 10px; }
    .boxFormSim .bgFormSim .title_h2{ font-size: 16px;font-weight: bold;text-transform: uppercase;text-align: center;margin-bottom: 20px; }
    .boxFormSim .title_label{ text-align: right; }
    .color_red{ font-weight: bold;color: #950008 !important; }

    .luanDiemShow{ color: #871111;font-family: uvnbutlong;padding: 8px;font-size: 18px;margin-bottom: 12px;margin-top: 30px; }
    .luanDiemShow p{ font-size: 16px;font-weight: bold; }
    .contentLuanDiemShow{ background: #fffff4;border:1px solid #e6e6e6;padding: 10px 8px;text-align: justify; }
    .contentLuanDiemShow p{ font-style: italic; }

    .bottomLuanDiemShow{}
    .bottomLuanDiemShow .title_p{ font-weight: bold; }
    .bottomLuanDiemShow table{margin:0px auto;}
    .bottomLuanDiemShow table tr{}
    .bottomLuanDiemShow table tr td{width:42px;}
    .boxgreen{background:#5abd1c;color:#fff;padding:5px;}
    .textred{color:#bc0000 !important;}

    .totalPoint{  }
    .totalPoint .b_title{ font-weight: bold; }
    .totalPoint .b_sonaykha{ font-weight: bold; }
    .totalPoint .b_number{ font-weight: bold;font-size: 18px;color: #209500; }
    .totalPoint .marginCenter{ width: 70%;margin: 0px auto;padding: 15px 10px;border: 1px solid #fbf1d8;border-radius: 4px;background: #fbfbfb; }
    .totalPoint .numbernull{ font-weight: bold; }
    .bgnMuaHangOrginjust{ background: #ff7200; }
    .btnSimHopLuanSim{ background: #209500;padding: 12px 59px;color: #fff;font-weight: bold;font-size: 14px;margin: 15px 0px; }
</style>
