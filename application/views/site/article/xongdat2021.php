<?php

$arr_hoa_giap = array(
    1 => array('name' => 'Tý'),
    2 => array('name' => 'Sửu'),
    3 => array('name' => 'Dần'),
    4 => array('name' => 'Mão'),
    5 => array('name' => 'Thìn'),
    6 => array('name' => 'Tỵ'),
    7 => array('name' => 'Ngọ'),
    8 => array('name' => 'Mùi'),
    9 => array('name' => 'Thân'),
    10 => array('name' => 'Dậu'),
    11 => array('name' => 'Tuất'),
    12 => array('name' => 'Hợi'),
);
foreach ($arr_hoa_giap as $key => $value) {
    foreach ($arr_bai_viet_xong_dat as $key1 => $value1) {
        if ($value1['dia_chi'] == $key) {
            $arr_hoa_giap[$key]['bai_viet'][$value1['nam_sinh']][$value1['gioi_tinh']] = $value1;
            $arr_hoa_giap[$key]['nam_sinh'][$value1['nam_sinh']] = 1;
            unset($arr_bai_viet_xong_dat[$key1]);
        }
    }
}
?>
<div class="col-md-12"><?php echo $breadcrumb; ?></div>
<div class="col-md-12">
    <h1 class="box_content_tt title_p"><?php echo $category['name']; ?></h1>
</div>
<div class="col-md-12 content_body">
    <div class="content_mucluc">
        <div class="muc_luc" id="click_menu_1" onclick="clickmenu2('click_menu_1');">
            <div class="content_text">
                <span class="text_mucluc">MỤC LỤC</span>
            </div>
        </div>
        <div class="muc_luc tbale_mucluc" id="click_menu_2" onclick="clickmenu2('click_menu_2');">
            <div class="content_text">
                <span class="text_mucluc">MỤC LỤC</span>
                <span class="text_mucluc_2">Thu gọn</span>
            </div>
            <div class="menu_text_1">
                <div class="text_1">
                    <a href="#bangtratv2020">I. BẢNG TRA XÔNG ĐẤT 2021</a>
                </div>
            </div>
            <div class="menu_text_2">
                <div class="text_1">
                    <a href="#bangtratv202012cg">II. BẢNG XÔNG ĐẤT NĂM 2021 CỦA 12 CON GIÁP</a>
                </div>
                <div class="content_link_text">
                    <div class="link_text_1">
                        <div>
                            <a href="#congiap_1">1. Xem tuổi xông đất tuổi Tý</a>
                        </div>
                        <div>
                            <a href="#congiap_2">2. Xem tuổi xông đất tuổi Sửu</a>
                        </div>
                        <div>
                            <a href="#congiap_3">3. Xem tuổi xông đất tuổi Dần</a>
                        </div>
                        <div>
                            <a href="#congiap_4">4. Xem tuổi xông đất tuổi Mão</a>
                        </div>
                        <div>
                            <a href="#congiap_5">5. Xem tuổi xông đất tuổi Thìn</a>
                        </div>
                        <div>
                            <a href="#congiap_6">6. Xem tuổi xông đất tuổi Tỵ</a>
                        </div>
                    </div>
                    <div class="link_text_2">
                        <div>
                            <a href="#congiap_7">7. Xem tuổi xông đất tuổi Ngọ</a>
                        </div>
                        <div>
                            <a href="#congiap_8">8. Xem tuổi xông đất tuổi Mùi</a>
                        </div>
                        <div>
                            <a href="#congiap_9">9. Xem tuổi xông đất tuổi Thân</a>
                        </div>
                        <div>
                            <a href="#congiap_10">10. Xem tuổi xông đất tuổi Dậu</a>
                        </div>
                        <div>
                            <a href="#congiap_11">11. Xem tuổi xông đất tuổi Tuất</a>
                        </div>
                        <div>
                            <a href="#congiap_12">12. Xem tuổi xông đất tuổi Hợi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text_main">
        <div class="content">
            <?php echo $category['content']; ?>
        </div>
    </div>

    <div class="tool_tuvi tool_xong_dat_2020" id="bangtratv2020">
        <div class="background_xong_dat"></div>
        <div class="tool_text_1 tool_xong_dat_a">
            TRA CỨU XÔNG ĐẤT 2021
        </div>
        <div class="tool_text_2">
            Bạn vui lòng nhập chính xác thông tin của mình!
        </div>
        <form name="frm_tv" id="frm_tv" action="<?php
        echo base_url('site/article/ajax_bai_viet_xong_dat'); ?>" method="post" class="form_tool" onsubmit="frm_tra_cuu_xong_dat('frm_tv'); return false;">
            <select name="nam_sinh" class="select_tool select_xong_dat">
                <?php
                for ($i = 1950; $i < 2000; $i++):
                    $slt = $i == 1992 ? 'selected=""' : ''; ?>
                    <option value="<?php echo $i; ?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="gioi_tinh" class="select_tool select_xong_dat">
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
            </select>
            <input type="hidden" name="nam_xem" value="2021"/>
            <button class="bt_xemngay" type="submit">Xem ngay</button>
        </form>
    </div>
    <div class="content_table_tuvi" id="bangtratv202012cg">
        <h2 class="text_shadow">
            Bảng xông đất năm 2021 của 12 con giáp
        </h2>
        <?php
        foreach ($arr_hoa_giap as $key => $value):
            $list_nam = array_keys($value['nam_sinh']);
            $str_nam = implode(', ', $list_nam);
            $title = 'Tuổi ' . $value['name'] . ' (' . $str_nam . ')';
            $img = base_url('templates/site/images/tuvi2020/' . $key . '.jpg');
            $id_neo = 'congiap_' . $key;
            ?>
            <div class="khoi_table_tuvi" id="<?php echo $id_neo; ?>">
                <div class="img_congiap">
                    <img class="format_img_congiap" src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                    <h3 class="text_tuoi text_tuoi_hide"><?php echo $title; ?></h3>
                </div>
                <div class="table_tuvi_cover">
                    <h3 class="text_tuoi"><?php echo $title; ?></h3>
                    <table class="table_tuvi">
                        <thead>
                        <tr>
                            <th class="th_text">Năm sinh</th>
                            <th class="th_text">Tuổi xông đất năm 2021</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($value['bai_viet'] as $nam_sinh_tuoi => $chi_tiet): ?>
                            <tr>
                                <td class="td_text"><?php echo $nam_sinh_tuoi; ?></td>
                                <td class="td_text">
                                    <a class="color_tag_a" href="<?php echo base_url($chi_tiet[1]['link']); ?>">
                                        <?php echo $chi_tiet[1]['title']; ?>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="text_main_2">
        <?php echo $category['content2']; ?>
    </div>
    <div class="col-md-12 col-sm-12">
        <p class="box_content_tt title_p"">Danh mục tin tức <?php echo $category['name']; ?></p>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="row boxListArticlePage">
            <?php if (!empty($list_article)):
                foreach ($list_article as $key => $value):
                    $link = base_url($value['slug'] . '-A' . $value['id'] . '.html');
                    $summary = $value['summary'];
                    $image_article = base_url('media/images/article/' . $value['id'] . '/' . $value['avatar']);
                    $name = $value['name'];
                    ?>
                    <section class="col-md-12 col-sm-12">
                        <div class="minibox clearfix">
                            <div class="boxLeft">
                                <a href="<?php echo $link; ?>"><img src="<?php echo $image_article; ?>"></a>
                            </div>
                            <div class="boxRight">
                                <p class="title_p"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></p>
                                <p><?php echo $summary; ?></p>
                            </div>
                        </div>
                    </section>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <?php echo $pagination; ?>
    </div>
</div>

<script type="text/javascript">

    function clickmenu2(id) {
        if (id == 'click_menu_1') {
            $('#click_menu_1').hide();
            $('#click_menu_2').show();
        } else {
            $('#click_menu_2').hide();
            $('#click_menu_1').show();
        }
    }
</script>
