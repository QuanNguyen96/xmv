<div class="row">
    <div class="col-md-12">
        <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
            <?php echo $breadcrumb; ?>
        <?php endif ?>
    </div>
</div>
<div class="box_xvm clearfix">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field">
        <?php if ($duongChiTay): ?>
            <div class="ok" style="transition: all 0.9s ease-in-out 0s; transform: rotateY(360deg);">
                <div class="alert alert-success">
                    <div class="text-center text-danger"><b><?php echo $duongChiTay['name_text'] ?></b></div>
                    <div class="text-justify">
                        <div style="background-color:#fff;padding:10px;line-height:25px;">
                            <?php echo $duongChiTay['content_chitay']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_content no-border">
                <div class="dieuhuong2019 clearfix mgt0">
                    <?php $this->load->view('site/import/form_tv_2021'); ?>
                </div>
            </div>
        <?php endif ?>
        
        <h3><i><b>Quý bạn vui lòng chọn đường chỉ tay muốn xem:</b></i></h3>
        <section class="images_chitay">
            <div class="row">
                <?php if ($allChiTay): ?>
                    <?php foreach ($allChiTay as $key => $value): ?>
                        <div class="col-md-4 lucian" data-name="<?php echo $value['name_slug'] ?>">
                            <div class="thumbnail text-center">
                                <a href="<?php echo base_url('xem-boi-chi-tay/'.$value['name_slug'].'.html'); ?>">
                                    <img class="quay" src="<?php echo base_url('templates/site/images/chitay.jpg'); ?>" alt="<?php echo $value['name_text'] ?>">
                                    <div><b><?php echo $value['name_text']; ?></b></div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </section>

        <?php if (!$duongChiTay): ?>
            <div class="box_content no-border">
                <div class="dieuhuong2019 clearfix mgt0">
                    <?php $this->load->view('site/import/form_tv_2021'); ?>
                </div>
            </div>
        <?php endif ?>

        
    </div>
    <div class="field textfoot">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
        <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
    </div>
    <div class="box_content textfoot">
        <div class="box_content_tt1">
          Công cụ xem bói hợp tuổi của quý bạn
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                </div>
                <div>Xem bói ngày sinh</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-tuoi-lam-an.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-lam-an.jpg'); ?>" alt="">
                </div>
                <div>Xem tuổi làm ăn</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                </div>
                <div>Xem tử vi hàng ngày</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/not-ruoi-chuan.jpg'); ?>" alt="">
                </div>
                <div>Xem bói nốt ruồi</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-tinh-yeu.jpg'); ?>" alt="">
                </div>
                <div>Xem bói tình yêu</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('quan-am-linh-xam.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/quan-am-linh-xam.jpg'); ?>" alt="">
                </div>
                <div>Gieo quẻ quan âm</div>
            </div>
          </a>
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
<script>
    $(document).ready(function(){
        $('.lucian').on('click',function(){
            $('.textfoot').removeClass('hidden')
            $('.quay').css({
                '-webkit-transition': 'all .4s ease-in-out',
                '-moz-transition': 'all .4s ease-in-out',
                '-ms-transition': 'all .4s ease-in-out',
                '-o-transition': 'all .4s ease-in-out',
                'transition': 'all .4s ease-in-out',
                '-webkit-transform': 'rotateY(360deg)',
                '-moz-transform': 'rotateY(360deg)',
                '-ms-transform': 'rotateY(360deg)',
                '-o-transform': 'rotateY(360deg)',
                'transform': 'rotateY(360deg)',
            });
            $('.lucian').hide(3000);
            $('.lucian').removeClass('col-md-4');
            $('.lucian').addClass('col-md-12');
            $(this).show(2000);
            var name = $(this).data('name');
            var html = '';
            $.ajax({
                url: '<?php echo base_url('site/xemboi/ajax_get_content_chitay'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {name_slug:name},
                success:function(response){
                    html+= '<div class="alert alert-success">';
                        html+= '<div class="text-center text-danger"><b>'+response.name_text+'</b></div>';
                        html+= '<div class="text-justify"><div style="background-color:#fff;padding:10px;line-height:25px;">'+response.content_chitay+'</div></div>';
                    html+= '</div>';
                    $('.ok').html(html);
                    setTimeout(function(){
                        $('.ok').removeClass('hidden');
                        $('.ok').show('slow');
                        $('.ok').css({
                            '-webkit-transition': 'all .4s ease-in-out',
                            '-moz-transition': 'all .4s ease-in-out',
                            '-ms-transition': 'all .4s ease-in-out',
                            '-o-transition': 'all .4s ease-in-out',
                            'transition': 'all .9s ease-in-out',
                            '-webkit-transform': 'rotateY(360deg)',
                            '-moz-transform': 'rotateY(360deg)',
                            '-ms-transform': 'rotateY(360deg)',
                            '-o-transform': 'rotateY(360deg)',
                            'transform': 'rotateY(360deg)',
                        });
                    }, 5000);
                }
            });
        });
    });
</script>
