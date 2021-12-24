<link rel="stylesheet" href="<?php
echo base_url('templates/site/jquery_ui'); ?>/jquery_ui.css"/>
<script src="<?php
echo base_url('templates/site/jquery_ui'); ?>/jquery_ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: 'd/m/yy'});
    });
</script>
<link rel="stylesheet" type="text/css" href="<?php
echo base_url('templates/site/css/xemngaytotxau.css'); ?>">
<div class="col-md-12">
    <?php
    if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php
        echo $breadcrumb; ?>
    <?php
    endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><a href="#">XEM NGÀY TỐT XẤU</a></h1>
</div>
<?php
$this->load->view('site/adsen/code1'); ?>
<div class="clearfix"></div>
<section class="boxFormXemNgay inner_box_red box_xvm ">
    <div class="boxOne">
        <form name="search_xemngay" action="" method="post" onsubmit="send_form();return false;">
            <div class="row">
                <div class="col-md-3 col-xm-3 col-xs-12">
                    <p><label>Xem theo ngày</label></p>
                </div>
                <div class="col-md-6 col-xm-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="input_time" id="datepicker" class="text-center" value="<?php
                            echo $xemngay['duonglich'][0] . '/' . $xemngay['duonglich'][1] . '/' . $xemngay['duonglich'][2]; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="field field_center">
                        <button type="submit" class="button" onclick="xemngay('<?php
                        echo base_url(); ?>')">Xem kết quả
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="boxTwo">
        <form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
            <div class="row">
                <div class="col-md-3 col-xm-3 col-xs-12">
                    <p class=""><label>Xem theo tháng</label></p>
                </div>
                <div class="col-md-6 col-xm-6 col-xs-12">
                    <div class="row">
                        <section class="col-md-4 col-sm-4 col-xs-4">
                            <select name="thang">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $selected = ($i == date('n')) ? ' selected="" ' : '';
                                    ?>
                                    <option <?php
                                    echo $selected; ?> value="<?php
                                    echo $i; ?>"><?php
                                        echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </section>
                        <section class="col-md-4 col-sm-4 col-xs-4">
                            <select name="nam">
                                <?php
                                for ($i = 1947; $i <= 2027; $i++) {
                                    $selected = ($i == date('Y')) ? ' selected="" ' : '';
                                    ?>
                                    <option <?php
                                    echo $selected; ?> value="<?php
                                    echo $i; ?>"><?php
                                        echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </section>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="field field_center">
                        <button type="submit" class="button">Xem kết quả</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
        $arr_seolink = str_replace('$thang', '"+thang+"', $arr_seo_link_thang);
        $arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
        ?>
        <script type="text/javascript">
            function send_form_dong_tho() {
                var frm = document.formSearch;
                var thang = frm.thang.value;
                var nam = frm.nam.value;
                window.location.href = "<?php echo base_url() . $arr_seolink; ?>.html";
            }
        </script>
    </div>
    <div class="boxThree">
        <form name="xemngay_theotuoi_index" method="post" onsubmit="xemngay_theotuoi_index_submit();">
            <div class="row">
                <div class="col-md-3 col-xm-3 col-xs-12">
                    <p class=""><label>Xem theo tuổi</label></p>
                </div>
                <div class="col-md-6 col-xm-6 col-xs-12">
                    <div class="row">
                        <section class="col-md-4 col-sm-4 col-xs-4">
                            <select name="thang">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $selected = ($i == date('n')) ? ' selected="" ' : '';
                                    ?>
                                    <option <?php
                                    echo $selected; ?> value="<?php
                                    echo $i; ?>"><?php
                                        echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </section>
                        <section class="col-md-4 col-sm-4 col-xs-4">
                            <select name="nam">
                                <?php
                                for ($i = 1947; $i <= 2027; $i++) {
                                    $selected = ($i == date('Y')) ? ' selected="" ' : '';
                                    ?>
                                    <option <?php
                                    echo $selected; ?> value="<?php
                                    echo $i; ?>"><?php
                                        echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </section>

                        <section class="col-md-4 col-sm-4 col-xs-4">
                            <select name="nam_sinh">
                                <?php
                                foreach (list_age_text() as $key => $value):
                                    $selected = ((int)$value == 1992) ? ' selected="" ' : '';
                                    ?>
                                    <option <?php
                                    echo $selected; ?> value="<?php
                                    echo $key; ?>"><?php
                                        echo $value; ?></option>
                                <?php
                                endforeach ?>
                            </select>
                        </section>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="field field_center">
                        <button type="submit" class="button">Xem kết quả</button>
                    </div>
                </div>
            </div>

            <script>
                function xemngay_theotuoi_index_submit() {
                    var frm = document.xemngay_theotuoi_index;
                    var canchi = frm.nam_sinh.value;
                    var link = 'xem-ngay-tot-tuoi-' + canchi + '.html';
                    var domain = '<?php echo base_url(); ?>';
                    frm.action = domain + link;
                }
            </script>
        </form>
        <?php
        $arr_seolink = str_replace('$thang', '"+thang+"', $arr_seo_link_thang);
        $arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
        ?>
    </div>
</section>
<div class="field">
    <div class="col-md-12">
        <section class="seolink_text text_tren">
            <div class="js_Form_content">
                <div class="js_content_height"><?php
                    echo $this->my_seolink->get_text(); ?></div>
            </div>
        </section>
    </div>
</div>
<div class="clearfix"></div>

<div id="homNayNgayTotHayXau">
    <div class="box_content_tt_ngay_tot">
        <p class="ngay_hom_nay_tot"><a href="#">ngày hôm nay tốt hay xấu? (<?php
                echo $xemngay['duonglich'][0] . '/' . $xemngay['duonglich'][1] . '/' . $xemngay['duonglich'][2]; ?>)</a></p>
    </div>
    <div class="box_tu_ngay">
        <p><span>Tức ngày:</span> <?php
            echo $xemngay['ngaycanchi']; ?>, tháng <?php
            echo $xemngay['thangcanchi']; ?> năm <?php
            echo $xemngay['namcanchi']; ?> (<?php
            echo $xemngay['amlich'][0] . '/' . $xemngay['amlich'][1] . '/' . $xemngay['amlich'][2]; ?> âm lịch)</p>
        <p><span>Phạm bách kỵ:</span>
            <?php
            if (!empty($result_tinhngayki)): ?>
        <p>
            <?php
            foreach ($result_tinhngayki as $key => $value): ?>
                <strong>
                    <?php echo $value[0] ?>
                </strong>
            <?php
            endforeach ?>
        </p>
        <?php
        else: ?>
            Không phạm ngày kỵ nào.
        <?php
        endif; ?>

        </p>
        <p class="box_tu_ngay_la_ngay">NGÀY <?php
            echo $xemngay['duonglich'][0] . '/' . $xemngay['duonglich'][1] . '/' . $xemngay['duonglich'][2]; ?> LÀ <span> <?php
                echo !empty($xemngay['tot_cho_cong_viec']) ? '<span class="color_red">NGÀY TỐT</span>' : '<span class="">NGÀY XẤU</span>'; ?></span>
        </p>
    </div>
</div>

<?php
if (!empty($xemngay['tot_cho_cong_viec'])): ?>
    <div class="ngay_tot_cho_vie">
        <p class="ngay_tot_cho_cong_vie">Ngày tốt cho các việc:</p>
        <?php
        echo implode(', ', $xemngay['tot_cho_cong_viec']) ?>
    </div>
<?php
else: ?>
    <div class="ngay_tot_cho_vie">
        <p><span class="ngay_xau">Ngày xấu:</span> <span
                    class="ko_tot">KHÔNG TỐT ĐỂ TIẾN HÀNH CÔNG VIỆC TRỌNG ĐẠI</span>
        </p>
    </div>
<?php
endif; ?>
<div class="bangthongtinngay">
    <div class="row btttitle">
        Thông tin ngày <?php
        echo $xemngay['duonglich'][0] . '/' . $xemngay['duonglich'][1] . '/' . $xemngay['duonglich'][2]; ?>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Giờ Hoàng Đạo
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            if (!empty($xemngay['gio_hoang_dao_hac_dao']['hoang_dao'])) {
                foreach ($xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] as $key => $value) {
                    echo gan_link_gio_hoanghac_dao($value) . ' , ';
                }
            } ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Giờ Hắc Đạo
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            if (!empty($xemngay['gio_hoang_dao_hac_dao']['hac_dao'])) {
                foreach ($xemngay['gio_hoang_dao_hac_dao']['hac_dao'] as $key => $value) {
                    echo gan_link_gio_hoanghac_dao($value) . ' ; ';
                }
            } ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Ngũ hành
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            echo $xemngay['nguhanh']; ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            bành tổ bách <br> kỵ nhật
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            if (!empty($result_tinh_banhtobachkinhat)): ?>
                <?php
                echo $arr_tinhngay_ki['canngay'] ?>: <?php
                echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['canngay'],
                    array('thang' => $arr_tinhngay_ki['thangduong'], 'nam' => $arr_tinhngay_ki['namduong'])); ?>
                <?php
                echo $arr_tinhngay_ki['chingay'] ?>: <?php
                echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['chingay'],
                    array('thang' => $arr_tinhngay_ki['thangduong'], 'nam' => $arr_tinhngay_ki['namduong'])); ?>
            <?php
            endif; ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Khổng minh <br> lục diệu
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            if (!empty($result_tinh_khongminh)): ?>
                <?php
                if (!empty($result_tinh_khongminh['tinh_khongminh'])): ?>
                    Ngày : <strong class="<?php
                    echo $result_tinh_khongminh['tinh_khongminh'][2]['saotot'] == 1 ? 'color_red' : 'color_black'; ?>"></strong> - <?php
                    echo $result_tinh_khongminh['tinh_khongminh'][2]['content_khongminh'] ?>
                <?php
                endif ?>
            <?php
            endif ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Nhị thập bát tú
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            Sao <?php
            echo $result_tinhthapnhibattu[1] ?> - <?php
            echo($result_tinhthapnhibattu[2]['title']) ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Thập nhị kiến trừ
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            echo $result_tinhtrucngay['ten']; ?>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Ngọc hạp thông thư
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <ul class="btt_ngoc_hap">
                <li>
                    <p>Sao tốt</p>
                    <div>
                        <?php
                        echo $result_tinhsaototsaoxau['sao_tot'] ?>
                    </div>
                </li>
                <li>
                    <p>Sao xấu</p>
                    <div>
                        <?php
                        echo $result_tinhsaototsaoxau['sao_xau'] ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row bttrow">
        <div class="col-md-3 col-sm-3 bttlft">
            Hướng xuất hành
        </div>
        <div class="col-md-9 col-sm-9 bttrgt">
            <?php
            echo $result_nguhanh_huongdi['huongtot'] ?>
        </div>
    </div>
</div>

<div class="chi_tiet_ngay">
    <a href="<?php
    echo base_url('xem-ngay-tot-xau/ngay-' . $xemngay['duonglich'][0] . '-thang-' . $xemngay['duonglich'][1] . '-nam-' . $xemngay['duonglich'][2] . '.html'); ?>">Xem
        chi tiết ngày <?php
        echo $xemngay['duonglich'][0] . '/' . $xemngay['duonglich'][1] . '/' . $xemngay['duonglich'][2]; ?></a>
</div>
<div class="box_content_tt_ngay_tot xem_ngay_tot">
    <p><a href="#">XEM NGÀY TỐT THEO NGÀY</a></p>
    <div class="content_xem_ngay_tot">
        <div class="row">
            <form name="xem_ngay_theo_ngay" id="xem_ngay_theo_ngay" action="" method="post"
                  onsubmit="xemngaytheongay(); return false;">
                <div class="col-md-6 select_left">
                    <select name="ngay">
                        <?php
                        for ($i = 1; $i <= 31; $i++):
                            $slt = $i == date('j') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?>><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>
                    <select name="thang">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            $slt = $i == date('n') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?>><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>
                    <select name="nam">
                        <?php
                        for ($i = 2020; $i <= 2025; $i++):
                            $slt = $i == date('Y') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?>><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>

                </div>
                <div class="col-md-6 select_right">
                    <input type="submit" value="Xem Kết Quả">
                </div>
                <div class="clearfix clear_data clear"></div>
            </form>
        </div>
        <div class="clearfix clear_data clear"></div>
    </div>
</div>
<div class="clearfix clear_data"></div>
<div class="box_content_tt_ngay_tot xem_ngay_tot">
    <p><a href="#">XEM NGÀY TỐT THEO THÁNG</a></p>
    <div class="content_xem_ngay_tot">
        <div class="row">
            <form name="xem_ngay_theo_thang" id="xem_ngay_theo_thang" action="" method="post"
                  onsubmit="xemngaytheothang(); return false;">
                <div class="col-md-6 select_left">
                    <select name="thang">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            $slt = $i == date('n') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?>><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>
                    <select name="nam">
                        <?php
                        for ($i = 2020; $i <= 2025; $i++):
                            $slt = $i == date('Y') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?> ><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>
                </div>
                <div class="col-md-6 select_right">
                    <input type="submit" value="Xem Kết Quả">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="xem_ngay_tot_thang_5">
    <p class="title_xem_ngay_tot_5">Danh sách ngày tốt tháng <?php
        echo $xemngay['duonglich'][1]; ?> năm <?php
        echo $xemngay['duonglich'][2]; ?></p>
    <div class="content_detail_ngay_tot">
        <ul>
            <?php
            $count = 0;
            foreach ($listngaytot as $key => $value):
                if ($value['ngayhientai'] == 'Tốt' && $count < 5):
                    $count++;
                    ?>
                    <li><?php
                        echo 'Ngày ' . $value['duonglich'][0] . ' tháng ' . $value['duonglich'][1] . ' năm ' . $value['duonglich'][2]; ?>
                        <img src="<?php
                        echo base_url('templates/site/images/icon_arrow_right.jpg') ?>"> <a href="<?php
                        echo base_url('xem-ngay-tot-xau/ngay-' . $value['duonglich'][0] . '-thang-' . $value['duonglich'][1] . '-nam-' . $value['duonglich'][2] . '.html'); ?>"
                                                                                            rel="noffolow">Xem Chi
                            Tiết</a></li>
                <?php
                endif;
            endforeach;
            ?>
        </ul>
    </div>
</div>
<div class="showMore">
    <p><a href="<?php
        echo base_url('xem-ngay-tot-trong-thang-' . $xemngay['duonglich'][1] . '-nam-' . $xemngay['duonglich'][2] . '.html'); ?>">Xem
            Thêm</a></p>
</div>


<div class="clearfix clear_data"></div>
<div class="box_content_tt_ngay_tot xem_ngay_tot">
    <p><a href="#">XEM NGÀY TỐT THEO TUỔI</a></p>
    <div class="content_xem_ngay_tot">
        <div class="row">
            <form name="xem_ngay_theo_tuoi" id="xem_ngay_theo_tuoi" action="" method="post"
                  onsubmit="xemngaytheotuoi(); return false;">
                <div class="col-md-7 select_left">
                    <select name="thang">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            $slt = $i == date('n') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?>><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>
                    <select name="nam">
                        <?php
                        for ($i = 2020; $i <= 2025; $i++):
                            $slt = $i == date('Y') ? 'selected=""' : '';
                            ?>
                            <option value="<?php
                            echo $i; ?>" <?php
                            echo $slt; ?> ><?php
                                echo $i; ?></option>
                        <?php
                        endfor; ?>
                    </select>
                    <select name="nam_sinh">
                        <?php
                        foreach (list_age_text() as $key => $value):
                            $selected = ((int)$value == 1992) ? ' selected="" ' : '';
                            ?>
                            <option <?php
                            echo $selected; ?> value="<?php
                            echo $key; ?>"><?php
                                echo $value; ?></option>
                        <?php
                        endforeach ?>
                    </select>
                </div>
                <div class="col-md-5 select_right">
                    <input type="submit" value="Xem Kết Quả">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="xem_ngay_tot_thang_5">
    <p class="title_xem_ngay_tot_5">Xem các ngày tiếp theo</p>
    <div class="content_detail_ngay_tot">
        <?php
        echo $ngayketiep; ?>
    </div>
</div>
<div>
    <div class="js_Form_content">
        <div class="js_content_height"><?php
            echo $this->my_seolink->get_text_foot(); ?></div>
    </div>
</div>
<div>
    <?php
    $this->load->view('site/sh_comment/get_by_theme'); ?>
</div>
<div>
    <?php
    if (isset($getComment) and $getComment): ?>
        <?php
        echo $getComment; ?>
    <?php
    endif ?>
</div>
<script type="text/javascript">
    function send_form() {
        var frm = document.search_xemngay;
        var input_time = frm.input_time.value;
        var arr = input_time.split('/');
        window.location.href = "<?php echo base_url(); ?>xem-ngay-tot-xau/ngay-" + arr[0] + "-thang-" + arr[1] + "-nam-" + arr[2] + ".html";
    }
</script>
