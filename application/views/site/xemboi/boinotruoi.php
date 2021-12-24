<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix col-md-12">
  	<h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
 	<div class="field">
      	<div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="text-success">
        <span class="glyphicon glyphicon-hand-right"></span><b> QUÝ BẠN HÃY CLICK VÀO VỊ TRÍ NỐT RUỒI MUỐN XEM</b>
    </div>
    
    <?php  
        $arr_not_ruoi = array(
                                'tai' => array(
                                            'ten' => 'Nốt ruồi ở tai',
                                            'link' => 'xem-boi-not-ruoi-o-tai-co-y-nghia-gi-A562'
                                            ),
                                'mieng' => array(
                                            'ten' => 'Nốt ruồi ở miệng',
                                            'link' => 'xem-boi-not-ruoi-o-mieng-co-y-nghia-gi-A563'
                                            ),
                                'moi' => array(
                                            'ten' => 'Nốt ruồi ở môi',
                                            'link' => 'xem-boi-not-ruoi-o-moi-co-y-nghia-gi-A564'
                                            ),
                                'ngontay' => array(
                                            'ten' => 'Nốt ruồi ở ngón tay',
                                            'link' => 'xem-boi-not-ruoi-o-ngon-tay-co-y-nghia-gi-A565'
                                            ),
                                'longbantay' => array(
                                            'ten' => 'Nốt ruồi ở lòng bàn tay',
                                            'link' => 'xem-boi-not-ruoi-o-long-ban-tay-co-y-nghia-gi-A566'
                                            ),
                                'longbanchan' => array(
                                            'ten' => 'Nốt ruồi ở lòng bàn chân',
                                            'link' => 'xem-boi-not-ruoi-o-long-ban-chan-co-y-nghia-gi-A567'
                                            ),
                                'mubantay' => array(
                                            'ten' => 'Nốt ruồi ở mu bàn tay',
                                            'link' => 'xem-boi-not-ruoi-o-mu-ban-tay-co-y-nghia-gi-A568'
                                            ),
                                'cotay' => array(
                                            'ten' => 'Nốt ruồi ở cổ tay',
                                            'link' => 'xem-boi-not-ruoi-o-co-tay-co-y-nghia-gi-A588'
                                            ),
                                'bantay' => array(
                                            'ten' => 'Nốt ruồi ở bàn tay',
                                            'link' => 'xem-boi-not-ruoi-o-ban-tay-co-y-nghia-gi-A569'
                                            ),
                                'tay' => array(
                                            'ten' => 'Nốt ruồi ở tay',
                                            'link' => 'xem-boi-not-ruoi-o-tay-co-y-nghia-gi-A587'
                                            ),

                                'canhtay' => array(
                                            'ten' => 'Nốt ruồi ở cánh tay',
                                            'link' => 'xem-boi-not-ruoi-o-canh-tay-co-y-nghia-gi-A570'
                                            ),
                                'mat' => array(
                                            'ten' => 'Nốt ruồi ở trên mắt',
                                            'link' => 'xem-boi-not-ruoi-o-tren-mat-co-y-nghia-gi-A571'
                                            ),
                                'face' => array(
                                            'ten' => 'Nốt ruồi ở trên mặt',
                                            'link' => 'xem-boi-not-ruoi-o-tren-khuon-mat-co-y-nghia-gi-A589'
                                            ),
                                'longmay' => array(
                                            'ten' => 'Nốt ruồi ở lông mày',
                                            'link' => 'xem-boi-not-ruoi-o-long-may-co-y-nghia-gi-A572'
                                            ),
                                'saulung' => array(
                                            'ten' => 'Nốt ruồi ở sau lưng',
                                            'link' => 'xem-boi-not-ruoi-o-sau-lung-co-y-nghia-gi-A573'
                                            ),
                                'trongmat' => array(
                                            'ten' => 'Nốt ruồi ở trong mắt',
                                            'link' => 'xem-boi-not-ruoi-o-trong-mat-co-y-nghia-gi-A574'
                                            ),
                                'nguc' => array(
                                            'ten' => 'Nốt ruồi ở ngực',
                                            'link' => 'xem-boi-not-ruoi-o-nguc-co-y-nghia-gi-A575'
                                            ),
                                'cam' => array(
                                            'ten' => 'Nốt ruồi ở cằm',
                                            'link' => 'xem-boi-not-ruoi-o-cam-co-y-nghia-gi-A576'
                                            ),
                                'vai' => array(
                                            'ten' => 'Nốt ruồi ở vai',
                                            'link' => 'xem-boi-not-ruoi-o-vai-co-y-nghia-gi-A577'
                                            ),
                                'mui' => array(
                                            'ten' => 'Nốt ruồi ở mũi',
                                            'link' => 'xem-boi-not-ruoi-o-mui-co-y-nghia-gi-A578'
                                            ),

                                
                                'tran' => array(
                                            'ten' => 'Nốt ruồi ở trán',
                                            'link' => 'xem-boi-not-ruoi-o-tran-co-y-nghia-gi-A579'
                                            ),
                                'bung' => array(
                                            'ten' => 'Nốt ruồi ở bụng',
                                            'link' => 'xem-boi-not-ruoi-o-bung-co-y-nghia-gi-A580'
                                            ),
                                'nach' => array(
                                            'ten' => 'Nốt ruồi ở nách',
                                            'link' => 'xem-boi-not-ruoi-tren-co-the/not-ruoi-o-nach'
                                            ),
                                'co' => array(
                                            'ten' => 'Nốt ruồi ở cổ',
                                            'link' => 'xem-boi-not-ruoi-o-co-co-y-nghia-gi-A582'
                                            ),
                                'gay' => array(
                                            'ten' => 'Nốt ruồi ở gáy',
                                            'link' => 'xem-boi-not-ruoi-o-gay-co-y-nghia-gi-A583'
                                            ),
                                'vungkin' => array(
                                            'ten' => 'Nốt ruồi ở vùng kín',
                                            'link' => 'not-ruoi-o-vung-kin-nam-va-nu-chu-ve-da-dam-A584'
                                            ),
                                'chan' => array(
                                            'ten' => 'Nốt ruồi ở chân',
                                            'link' => 'xem-boi-not-ruoi-o-chan-co-y-nghia-gi-A585'
                                            ),
                                'ma' => array(
                                            'ten' => 'Nốt ruồi ở má',
                                            'link' => 'xem-boi-not-ruoi-o-ma-co-y-nghia-gi-A586'
                                            ),
                                'mong' => array(
                                            'ten' => 'Nốt ruồi ở mông',
                                            'link' => 'xem-boi-not-ruoi-tren-co-the/not-ruoi-o-mong'
                                            ),
                                'duoimat' => array(
                                            'ten' => 'Nốt ruồi ở đuôi mắt',
                                            'link' => 'xem-boi-not-ruoi-tren-co-the/not-ruoi-o-ganduoimat'
                                            ),
                            );

    ?>
    <div class="list_notruoi">
        <div class="row">
            <?php foreach ($arr_not_ruoi as $key => $value): ?>
                <div class="col-md-3 col-xs-4">
                   <div class="item_notruoi">
                        <a href="<?php echo base_url($value['link']); ?>.html">
                            <img src="<?php echo base_url('templates/site/images/vitrinotruoi/'.$key.'.jpg'); ?>" alt="not-ruoi-o-<?php echo $key; ?>">
                            <p><?php echo $value['ten']; ?></p>
                        </a>
                   </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php if (isset($content) && !empty($content)): ?>
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <b>Nốt ruồi ở <?php echo $content['position_text']; ?> ứng chiếu với số mệnh của bạn</b>
            </div>
            <div class="panel-body text-justify">
                <?php echo $content['content']; ?>
            </div>
        </div>
    <?php endif ?>
 	<div class="field clearfix">
      	<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
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
    <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
</div>
