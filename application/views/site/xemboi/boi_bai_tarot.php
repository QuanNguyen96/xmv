<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix">
    <div class="box_content">
        <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
        <?php $this->load->view('site/adsen/code1');?>
        <div class="field clearfix">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
        <div id="result" class="field kqNdqc" style="padding: 10px;border-radius: 5px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="huongdan">
                        <div class="text-center tarotindex" id="baiindex">
                            <div class="index">
                                <img src="<?php echo base_url('templates/site/images/tarot/index.jpg'); ?>" alt="">
                            </div>
                            
                        </div>
                        <div class="text-center">
                            <div class="bairut">
                                
                            </div>
                        </div>
                        <div class="noidungtarot">
                                
                        </div>

                        <article class="itnContentBBTR">
                            <div class="notification_tuvi_2020">
                                <a href="<?php echo base_url('xem-tu-vi-nam-2021.html');?>" class="nut_bam">Bói vận hạn năm 2021</a>
                                <a href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html');?>" class="nut_bam">Xem bói năm 2022 của 12 con giáp</a>
                            </div>
                            <section class="internalLink">
                                <a class="first" href="<?php echo current_url();?>">Xem lại từ đầu</a>
                                <a class="againt" href="<?php echo current_url();?>">Xem cho người khác</a>
                            </section>
                            <div class="row">
                                <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
                            </div>
                        </article>
                    </div>
                    <script>
                        $(document).ready(function(){
                            $('#baiindex').on('click',function(){
                                var rand = Math.floor(Math.random() * 22) + 1;
                                $('.index').css({
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
                                $('.index').hide(3000);
                                var img = '<img src="<?php echo base_url(''); ?>' + 'templates/site/images/tarot/'+ rand + '.JPG'+ '">';
                                setTimeout(function(){
                                    $('.bairut').html(img);
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>' + 'site/xemboi/ajax_get_info_tarot',
                                        type: 'POST',
                                        dataType: 'JSON',
                                        data: {id: rand},
                                        success:function(response){
                                            $('.noidungtarot').html(response.html);
                                            $('.itnContentBBTR').fadeIn('flas');
                                        },
                                    });
                                },3000);
                            });
                        });
                    </script>
                </div>
                <div class="col-md-12">
                    <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="box_content clearfix">
        <div class="box_content_tt1">
          Công cụ xem bói hợp tuổi quý bạn
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-cung-menh-theo-nam-sinh.html'); ?>">
            <div class="text-center">
                  <div class="thumbnail">
                    <img src="<?php echo base_url('templates/site/images/anhdaidien/cung-menh.jpg'); ?>" alt="">
                  </div>
                  <div><p>Xem bói cung mệnh</p></div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ten.jpg'); ?>" alt="">
                </div>
                <div><p>Xem bói theo tên</p></div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/boi-bai-tinh-yeu.jpg'); ?>" alt="">
                </div>
                <div><p>Xem bói bài tình yêu</p></div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                </div>
                <div><p>Tử vi hàng ngày</p></div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                </div>
                <div><p>Tử vi trọn đời</p></div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                </div>
                <div><p>Bói bài hàng ngày</p></div>
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