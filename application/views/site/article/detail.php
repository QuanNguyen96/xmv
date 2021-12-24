<?php
$html_tuvi2019 = '<div class="box_xvm dieuhuong2019 text-center clearfix">' . $this->load->view('site/import/form_tuvi2019_4', '', true) . '</div>';
$html_xemboiSDT = $this->load->view('site/import/rep_xemboiSDT', '', true);
$html_ynghiaso = $this->load->view('site/import/rep_ynghiaso', '', true);
$html_sohoptuoi = $this->load->view('site/import/rep_sohoptuoi', '', true);
$html_sohopmenh = $this->load->view('site/import/rep_sohopmenh', '', true);
$html_frm_tv_2020 = $this->load->view('site/import/form_tv_2020', '', true);
$html_frm_tv_2021 = $this->load->view('site/import/form_tv_2021', '', true);
$html_frm_tv_2022 = $this->load->view('site/import/form_tv_2022', '', true);
$html_frm_xem_tu_vi = $this->load->view('site/import/form_xem_tu_vi', '', true);
$html_frm_xem_tuoi_vo_chong = $this->load->view('site/import/form_xem_tuoi_vo_chong', '', true);
$html_frm_tv_2020_notify = $this->load->view('site/import/form_tv_2020_notify', '', true);
$html_cclq_so_hop_tuoi = $this->load->view('site/conso/cclq_so_hop_tuoi', '', true);
$html_cclq_y_nghia_so = $this->load->view('site/conso/cclq_y_nghia_so', '', true);

$html_frm_cung_hoang_dao_cung_menh = $this->load->view('site/import/form_cung_hoang_dao_cung_menh', '', true);
$html_frm_cung_hoang_dao_nhom_mau = $this->load->view('site/import/form_cung_hoang_dao_nhom_mau', '', true);
$html_frm_cung_hoang_dao_hop_nhau = $this->load->view('site/import/form_cung_hoang_dao_hop_nhau', '', true);
$arr_search_new = array(
    '$rep_tuvi2019',
    '$rep_xemboiSDT',
    '$rep_ynghiaso',
    '$rep_sohoptuoi',
    '$rep_sohopmenh',
    '$frm_tv_2020',
    '$frm_tv_202_notify',
    '$frm_tv_2021',
    '$frm_tv_2022',
    '$form_xem_tu_vi',
    '$form_xem_tuoi_vo_chong',
    '$cclq_so_hop_tuoi',
    '$cclq_y_nghia_so',
    '$frm_cung_hoang_dao_cung_menh',
    '$frm_cung_hoang_dao_nhom_mau',
    '$frm_cung_hoang_dao_hop_nhau'
);

$arr_search = array_merge($arr_search, $arr_search_new);
$arr_replace_new = array(
    $html_tuvi2019,
    $html_xemboiSDT,
    $html_ynghiaso,
    $html_sohoptuoi,
    $html_sohopmenh,
    $html_frm_tv_2020,
    $html_frm_tv_2020_notify,
    $html_frm_tv_2021,
    $html_frm_tv_2022,
    $html_frm_xem_tu_vi,
    $html_frm_xem_tuoi_vo_chong,
    $html_cclq_so_hop_tuoi,
    $html_cclq_y_nghia_so,
    $html_frm_cung_hoang_dao_cung_menh,
    $html_frm_cung_hoang_dao_nhom_mau,
    $html_frm_cung_hoang_dao_hop_nhau
);
$arr_replace = array_merge($arr_replace, $arr_replace_new);
?>
<article class="detailArticle">
    <div class="col-md-12"><?php echo $breadcrumb; ?></div>
    <div class="col-md-12">
        <p class="article_time"><?php echo ngay_thu($item['created_date']); ?>, <?php echo date('j/n/Y',$item['created_date']);?> - <?php echo date('G:i',$item['created_date']);?></p>
    </div>
    <section>
        <header>
            <h1 class="title_p"><?php echo $item['name'] ?></h1>
        </header>
        <div class="adsTieudeArticle">
            <?php $this->load->view('site/ads/title'); ?>
        </div>
        <div class="page-text">

            <?php if (isset($tableofcontent)):
                $show_h3 = $check_bv_tu_vi == false ? 'show_toc3' : '';
                ?>
                <section class="sec_toc <?php echo $show_h3; ?>">
                    <div class="topTOC">
                        <?php echo $tableofcontent; ?>
                    </div>
                    <span id="end_mucluc">&nbsp;</span>
                    <div class="effect">
                        <?php echo $tableofcontent; ?>
                    </div>
                    <div id="menu_sectoc" class="btn_mucluc hidden">
                        Mục lục
                    </div>
                    <div id="body_menusectoc" class="hidden">
                        <?php echo $tableofcontent; ?>
                    </div>
                </section>
            <?php endif ?>
            <?php
            if (isset($item['content_2'])) {
                echo str_replace($arr_search, $arr_replace, $item['content_2']);
            }
            ?>
            <div id="content1" data="<?php echo $localRequest;?>"></div>
            <?php echo str_replace($arr_search, $arr_replace, $content); ?>
        </div>

        <?php
        //Faq không hiển thị.
        /*if($item['questionAnswer']!=''){
            $questionAnswers = json_decode($item['questionAnswer']);
            foreach($questionAnswers as $questionAnswer){ ?>
                <h2 id="seo-hinh-anh-la-gi" class="ftwp-heading"><strong><?php echo $questionAnswer->question;?></strong></h2>
                <blockquote class="wp-block-quote"><p><?php echo $questionAnswer->answer;?></p></blockquote>
            <?php }?>

        <?php };*/?>

        <!------------- noi dung tac gia - "<?php echo $localRequest;?>"-->
        <div class="userInfo">
            <div class="row">
                <div class="col-12 col-md-12">
                    <p><?php echo $noidung; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 avatarImage">
                <a href="<?php echo $linkuser; ?>"><img class="avatarUser" data="<?php echo $localRequest;?>" src="<?php echo $avata;?>" /></a>
                <a href="<?php echo $linkuser; ?>"><p class="UserName"><?php echo $username;?></p></a>
            </div>
        </div>
        <!------------- het noi dung tac gia -->

        <?php echo $this->load->view('site/import/share/share', '', true); ?>
        <div class="text-center">
            <!-- Composite Start -->
            <div id="M538390ScriptRootC819199">
            </div>
            <script src="https://jsc.mgid.com/n/e/netlink.xemvanmenh.net.819199.js" async></script>
            <!-- Composite End -->
        </div>
        <div>
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>
        </div>
        <div class="row">
            <?php $arr_article_relation = $item['article_relation'] != '' ? unserialize($item['article_relation']) : array(); ?>
            <div class="col-md-6 cmxt cmxt_bv">
                <div>
                    <p class="cmxt_tt" data="<?php echo $localRequest;?>">Bài viết liên quan</p>
                    <ul>
                        <?php if (!empty($arr_article_relation)): ?>
                            <?php foreach ($arr_article_relation as $key => $value): ?>
                                <li><a href="<?php echo $value['link']; ?>"><?php echo $value['name']; ?></a></li>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php $arr_cmxnn = $item['article_category'] != '' ? unserialize($item['article_category']) : array(); ?>
            <div class="col-md-6 cmxt cmxt_cm">
                <div>
                    <p class="cmxt_tt">Chuyên mục xem nhiều nhất</p>
                    <ul>
                        <?php if (!empty($arr_cmxnn)): ?>
                            <?php foreach ($arr_cmxnn as $key => $value): ?>
                                <li><a href="<?php echo $value['link']; ?>"><?php echo $value['name']; ?></a></li>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div>

            <?php
            $metaFormTitle = $item['meta_form_title'] ? $item['meta_form_title'] : 'Xem lá số tử vi theo ngày tháng năm sinh';
            ?>

            <div class="box_xvm clearfix" style="border: 1px solid #ccc;">
                <h2 class="box_content_tt1 fontMiniMb" id="box_content_tt1"><?php echo $metaFormTitle; ?></h2>
                <p class="text-center">Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
                <form name="" action="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" method="post">
                    <div class="field">
                        <div class="col-md-4 col-md-offset-3 col-sm-4 col-md-offset-3 col-xs-12">
                            <input type="text" name="hovaten" value="" placeholder="Nhập họ và tên"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <select name="gioitinh">
                                <option value="">Giới tính</option>
                                <option value="1">Nam giới</option>
                                <option value="0">Nữ giới</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
                            <select name="ngay">
                                <option value="">Ngày sinh dương</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            <select name="thang">
                                <option value="">Tháng</option>
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            <select name="nam">
                                <option value="">Năm</option>
                                <?php
                                for ($i = 1950; $i <= 2040; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="col-md-4 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
                            <select name="gio" required="">
                                <option value="">Giờ sinh</option>
                                <?php
                                $list_gio_sinh_operator = list_gio_sinh_operator();
                                ?>
                                <?php foreach ($list_gio_sinh_operator as $key => $value): ?>
                                    <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            <select name="namxem">
                                <option value="">Năm xem</option>
                                <?php
                                for ($i = 2015; $i <= 2040; $i++) {
                                    $selected = $i == date('Y') ? 'selected=""' : '';
                                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <input type="hidden" name="lich" value="1"/>
                    <div class="field field_center">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="button">Xem kết quả</button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php
                            if ($this->session->has_userdata('message')) {
                                echo $this->session->userdata('message');
                            }
                            ?>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <?php $this->load->view('site/import/form_tv_2022_footer'); ?>
        <?php if (!empty($item['content_1'])): ?>
            <div class="text-justify show_article">
                <?php echo str_replace($arr_search, $arr_replace, $item['content_1']); ?>
            </div>
        <?php endif ?>
        <div class="filed">
            <?php $this->load->view('site/import/import_anhduong'); ?>
        </div>
        <div>
            <p class="title_relation h3">
                Bài viết cùng danh mục
            </p>
            <div class="articleRelations">
                <ul>
                    <?php if (!empty($relationship)): ?>
                        <?php foreach ($relationship as $key => $value): ?>
                            <li>
                                <a href="<?php echo base_url($value['slug'] . '-A' . $value['id'] . '.html'); ?>"><?php echo $value['name'] ?></a>
                            </li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <section class="listTag">
            <div class="show_tag">
                <b> : </b>
                <?php if (!empty($listTag)): ?>
                    <?php foreach ($listTag as $key => $value): ?>
                        <a href="<?php echo base_url('tag/' . $value['slug'] . '.html'); ?>"><?php echo $value['name']; ?></a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </section>
    </section>
</article>
<?php if ($this->uri->uri_string() == 'chon-sim-phong-thuy-dung-cach-de-gia-sim-khong-con-la-van-de-cua-ban-A362'): ?>
    <?php $this->load->view('site/import/box_tu_van_xem_phong_thuy_sim'); ?>
<?php endif ?>

<script type="text/javascript">
    function clickmenu2(id) {
        if (id == 'click_menu_1') {
            //$('#click_menu_1').hide();
            //$('#click_menu_2').show();
        } else {
            //$('#click_menu_2').hide();
            //$('#click_menu_1').show();
        }
    }
</script>