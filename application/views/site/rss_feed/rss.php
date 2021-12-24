<?php
function xml_entities($string) {
    return str_replace(
        array("&", "<", ">", '"', "'","form_xem_tu_vi","$","rep_tuvi2019","rep_xemboiSDT","rep_ynghiaso","rep_sohoptuoi","rep_sohopmenh","frm_tv_2020","frm_tv_202_notify","frm_tv_2021","frm_tv_2022","form_xem_tuoi_vo_chong","cclq_so_hop_tuoi","cclq_y_nghia_so","frm_cung_hoang_dao_cung_menh","frm_cung_hoang_dao_nhom_mau","frm_cung_hoang_dao_hop_nhau")
        , array("&amp;", "&lt;", "&gt;", "&quot;", "&apos;","","","","","","","","","","","","","","","","","")
        , $string
    );
}
$items = '';
foreach ($article as $item){
    $items .= '<item>';
    $items .= "<title>" . xml_entities($item['title']) . "</title>";
    $items .= "<link>" .base_url(). xml_entities("{$item['slug']}-A{$item['id']}.html") . "</link>";
    $items .= "<description>" . xml_entities($item['description']) . "</description>";
    $items .= "<content>" . xml_entities(html_entity_decode($item['content'])) . "</content>";
    $items .= '</item>';
}
?>
<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?>
<rss version="2.0" xmlns:dc="<?php echo base_url(); ?>">
    <channel>
        <title>Xem vận mệnh - Đoán tương lai - Kích tài vận - Đón đào hoa</title>
        <link><?php echo base_url(); ?></link>
        <description>Tại sao phải xem vận mệnh cuộc đời? Xem bói vận mệnh nói lên điều gì về bạn? Hãy để chúng tôi giúp bạn làm chủ số phận ngay hôm nay và thay đổi số mệnh một cách thông minh</description>

        <?php echo $items; ?>

    </channel>
</rss>