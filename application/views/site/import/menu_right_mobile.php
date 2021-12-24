<?php
    $i = 0;
// doi vi tri tu vi 2021 len thu 2
if( !empty($data) ){
    for($k=0;$k<count($data);$k++){
        if(strcasecmp($data[$k]['name'], "tử vi") == 0)
        {
            for($h=0;$h<count($data[$k]['submenu']);$h++){
                if(strcasecmp($data[$k]['submenu'][$h]['name'], "tử vi 2021") == 0){
                    $temp=$data[$k]['submenu'][$h];
                    $data[$k]['submenu'][$h]=$data[$k]['submenu'][1];
                    $data[$k]['submenu'][1]=$temp;
                }
            }
        }

    }
}
    if( !empty($data) ):
       foreach($data as $val):
    ?>
<?php $i++; ?>
<div class="box-mobile">
    <div class="title-new-mobile"><?php echo $val['name'];?></div>
    <ul class="ul-all">
        <?php if( isset($val['submenu'])): ?>
            <?php foreach ($val['submenu'] as $val1): ?>
                <?php $arr_slug = array(
                    'xem-han-tu-vi',
                    'tu-vi-hang-ngay',
                    'xem-tu-vi-tuan-moi',
                    'tu-vi-hang-thang',
                    'xem-tu-vi-tron-doi',
                    'can-xuong-tinh-so-doi-nguoi',
                    'xem-boi-cung-menh-theo-nam-sinh',
                    'xem-mau-hop-menh',
                    'xem-boi-cung-menh-theo-nam-sinh',
                ); ?>
                <li>
                    <a <?php if (in_array($val1['slug'], $arr_slug)): ?>class="newnew"<?php endif ?> href="<?php echo base_url( $val1['slug'].'.html');?>" title="<?php echo $val1['name'];?>"><?php echo $val1['name'];?></a>
                </li>
            <?php endforeach ?>
        <?php endif; ?>
    </ul>
</div>
<?php if ($val['name'] == 'Lịch vạn niên 2018'): ?>
    <?php if (filter_block_out_ads()): ?>
        <div class="box-mobile">
            <div class="adsResponse1">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Right3_236x600_xuyentrang -->
                <ins class="adsbygoogle"
                    style="display:inline-block;width:236px;height:600px"
                    data-ad-client="ca-pub-7619887841727759"
                    data-ad-slot="3467388131"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    <?php endif ?>
<?php endif ?>
<?php endforeach; endif; ?>