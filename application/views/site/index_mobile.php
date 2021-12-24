<?php
    $CI = &get_instance();
    $CI->load->model('site/article_model');
    $article_feature = $CI->article_model->Db_article_feature();
    // get_action(array('view'=>$view));
    ?> 
<!DOCTYPE HTML>
<html lang="vi">
    <head>
    	<?php //$this->load->view('site/import/script/header/google_script.php');?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content=""/>
        <title><?php echo $title;?></title>
        <meta name="keywords" content="<?php echo $keywords;?>"/>
        <meta name="description" content="<?php echo $description;?>"/>
        <meta name="google-site-verification" content="DMt7__k37k_t-zNGEJ-PHM2Z3squptD3NKH3r5tKRzI" />
        <meta name='dmca-site-verification' content='UmpDQWhNb1FTRm1BQVIzbW1lWWVPdz090' />
        <link rel="icon" type="image/png" href="<?php echo base_url('fivico_2.png');?>"/>
        <?php if (!isset($notmetaviewport)): ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0"/>
        <?php endif ?>
        <?php if( isset($noindex) ) echo $noindex;?>
        <?php if (isset($_GET['gioitinh']) or isset($_GET['sl'])): ?>
            <meta name="robots" content="noindex, nofollow" />
        <?php endif ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href="<?php echo base_url('templates/site/bootstrap/css/bootstrap.min.css'); ?>?<?php echo filemtime('templates/site/bootstrap/css/bootstrap.min.css')?>" />
        <link rel='stylesheet' href="<?php echo base_url('templates/site/css/style.css?99991'); ?>" />
        <link rel='stylesheet' href="<?php echo base_url('templates/site/css/new-mobile-css/style_mobile.css'); ?>?<?php echo filemtime('templates/site/css/new-mobile-css/style_mobile.css')?>" />
        <link rel="canonical" href="<?php echo current_url(); ?>" />
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/jquery.min.js'); ?>"></script>
        <script data-ad-client="ca-pub-7619887841727759" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
            ga('create', 'UA-93357117-1', 'auto');
            ga('send', 'pageview');
            
        </script>
        <?php if (filter_block_out_ads()): ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({
                  google_ad_client: "ca-pub-7619887841727759",
                  enable_page_level_ads: true
                });
            </script>
        <?php endif ?>
        <script type="text/javascript">
        	function scrollTo(box, forpx){
			    var x=$(box).offset();
			    forpx = parseInt(forpx);
			    var height_x=x.top - forpx;
			    $("html, body").animate({scrollTop:height_x},1);
			}
        </script>
        <!-- add schema -->
        <?php if ($view == 'site/home/index'): ?>
            <?php $this->load->view('site/import/schemas/sh_schema'); ?>
        <?php else: ?>
            <?php $this->load->view('site/import/schemas/sh_schema_archivepage'); ?>
        <?php endif ?>
        <?php $this->load->view('site/import/schemas/sh_schema_allpage'); ?>
        <?php $this->load->view('site/import/schemas/sh_schemaBreadcum'); ?>
        <?php $this->load->view('site/import/schemas/sh_schemaFaq.php'); ?>
        <?php $this->load->view('site/import/schemas/sh_schemaArticle.php'); ?>
        <!-- end -->
        <?php $this->load->view('site/ads/header'); ?>
    </head>
    <body>
        <div id="div-gpt-ad-1611804837286-0"></div>
        <script>
            googletag.cmd.push(function() { googletag.display(staticSlot); });
        </script>
    	<!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LTNW2R"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 824906731;
            var google_custom_params = window.google_tag_params;
            var google_remarketing_only = true;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/824906731/?guid=ON&amp;script=0"/>
            </div>
        </noscript>
    	<section class="bgMenuShow"></section>
        <div class="container no-pd" id="mainWrap">
        	<header>
        		<div class="text-center bannerTopMb">
        			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('templates/site/images/newmobile/banner.jpg'); ?>" alt="banner"></a>
        		</div>
        		<div class="menu-newmobile">
        			<ul class="ul_newmoble1 text-center">
        				<li class="lv1" id="do_boi_bai">
                            <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                                <img src="<?php echo base_url('templates/site/images/menu_mobi/menu_boi_bai.png'); ?>" alt="" class="clk_boi_bai"> <br>
                                <span>Bói bài</span>
                            </a>
                        </li>
                        <li class="lv1" id="do_tv2019">
        					<a href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">
        						<img src="<?php echo base_url('templates/site/images/menu_mobi/menu_tu_vi.png'); ?>" alt="" class="clk_tuvi2018"> <br>
        						<span>Tử vi 2022</span>
        					</a>
        				</li>
        				<li class="lv1" id="do_xb">
        					<a href="<?php echo base_url('xem-ngay-tot-xau.html'); ?>">
        						<img src="<?php echo base_url('templates/site/images/menu_mobi/menu_ngay_tot.png'); ?>" alt="" class="clk_ngay_tot"> <br>
        						<span>Ngày tốt</span>
        					</a>
        				</li>
        				<li class="lv1" id="do_tv">
        					<a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>" class="clk_tuvi">
        						<img src="<?php echo base_url('templates/site/images/menu_mobi/menu_boi_sim.png'); ?>" alt=""><br>
        						<span>Bói sim</span>
        					</a>
        				</li>
        				<li class="lv1" id="menu-newmobile-home">
    						<img src="<?php echo base_url('templates/site/images/menu_mobi/menu.png'); ?>" alt=""><br>
    						<span>Menu</span>
        				</li>

        			</ul>
        			<div class="menu-search">
        				<form name="form_search_notfound" action="" method="post" onsubmit="return search_notfound();">
        					<input type="text" name="inputsearch" value="" placeholder="search" autocomplete="off">
        					<button type="submit" name="submit"><img src="<?php echo base_url('templates/site/images/newmobile/search.png'); ?>" alt=""></button>
	        				<div class="close-menu-search">
		        				<span>x</span>
		        			</div>
        				</form>
        			</div>
        		</div>
        	</header>

            <div id="content_menu_mobile" class="clearfix hidden">
                <?php echo $this->my_config->get_top_menu_mobile(); ?>
            </div>

        	<section class="body-content-mobile">
        		<section class="body-mobile">
        			<div class="box-mobile">
        				<?php if (filter_block_out_ads()): ?>
		                    <div class="width100 adsHomeXuyentrang text-center">
                                <?php $this->load->view('site/ads/all_page'); ?>
		                        <!--
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                -->
                                <!-- xemvanmenh_header -->
                                <!--
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-client="ca-pub-7619887841727759"
                                     data-ad-slot="9526937165"
                                     data-ad-format="auto"
                                     data-full-width-responsive="true"></ins>
                                <script>
                                     (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                                -->
		                    </div>
		                <?php endif ?>
        			</div>
        			<!-- Load view -->
    				<?php $this->load->view($view);?>
        			<!-- End load view -->
					
					<!-- start body foot all page -->
					<div class="box-mobile-xemtuvi">
						<div class="text-center">
                            <a href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">
<!--                                <img class="imageBannerSidebar" alt="Tử vi 2021" src="http://xemvanmenh.local.com/templates/site/images/Tuvi2022.gif">-->
                               <img src="<?php echo base_url('templates/site/images/Tuvi2022.gif'); ?>" alt="tử vi 2022">
                            </a>
						</div>
						<div class="form-xtv">
							<div class="box-form" style="background-color: #e45f9836;margin-top: 5px;">
								<form method="post" name="mb_ftv_2020_ft" id="mb_ftv_2020_ft" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" onsubmit="frm_tra_cuu_tu_vi('mb_ftv_2020_ft'); return false;">
									<div class="row">
										<div class="col-xs-4">
											<select name="nam_sinh" required="">
                                                <?php for($i= 1950; $i<=2010; $i++): ?>
                                                    <?php $slt = (int)$i == 1992 ? 'selected=""' : ''; ?>
                                                    <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                                                <?php endfor ?>
                                            </select>
										</div>
										<div class="col-xs-5">
                                            <select class="gioitinh" name="gioi_tinh">
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
										</div>
										<div class="col-xs-2 no-pd">
											<button type="submit" name="submit">xem</button>
										</div>
									</div>
								</form>
							</div>
						</div><br>
                        <div class="text-center m-btom">
                            <a href="<?php echo base_url('khai-pha-cac-buoc-xem-sim-dien-thoai-chinh-xac.html'); ?>"><img src="<?php echo base_url('templates/site/images/newmobile/chonsim.png'); ?>" alt=""></a>
                        </div>
					</div>
					<?php $this->my_config->get_right_menu_mobile();?>

					<div class="box-mobile">
						<div class="title-new-mobile">Thư viện tổng hợp</div>
						<div class="article-new-mobile">
							<div class="row">
                                <div class="col-xs-5">
                                    <div class="avarta">
                                        <a href="<?php echo base_url('sim-phong-thuy-co-phai-la-vat-pham-phong-thuy.html'); ?>"><img class="lazy" data-src="<?php echo base_url('templates/site/images/landing/naenter.jpg'); ?>" alt="quesdt" title="" /></a>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <a href="<?php echo base_url('sim-phong-thuy-co-phai-la-vat-pham-phong-thuy.html'); ?>">Sim điện thoại có phải là vật phẩm phong thủy?</a>
                                    <p>Mỗi con số trong dãy sim điện thoại đều mang những năng lượng riêng, tùy theo trật tự của dãy số mà Sim điện thoại có thể ảnh hưởng tới bạn theo hướng tốt (Cát) hay xấu (hung)</p>
                                </div>
                            </div>
                            <div class="row">
								<div class="col-xs-5">
									<div class="avarta">
										<a href="<?php echo base_url('cach-tinh-que-so-dien-thoai.html'); ?>"><img class="lazy" data-src="<?php echo base_url('templates/site/images/landing/naenter.jpg'); ?>" alt="quesdt" title="" /></a>
									</div>
								</div>
								<div class="col-xs-7">
									<a href="<?php echo base_url('cach-tinh-que-so-dien-thoai.html'); ?>">Dùng kinh dịch chọn sim phong thủy tốt cho 4 đại nghiệp đời người!</a>
									<p>Bằng những gợi ý quẻ dịch sim tốt cho 4 đại nghiệp, bạn có thể chọn dãy sim phong thủy hợp tuổi thỏa mong muốn hỗ trợ công danh, tài vận, tình duyên gia đạo hay hóa giải vận hạn</p>
								</div>
							</div>

							<?php if (!empty($article_feature)): ?>
	                            <?php foreach ($article_feature as $key => $value): ?>
	                            <?php
	                                $link = base_url($value['slug'].'-A'.$value['id'].'.html'); 
	                                $summary = $value['summary'];
	                                $image_article = base_url('media/images/article/'.$value['id'].'/'.$value['avatar']);
	                                $name = $value['name'];
	                                ?>
								<div class="row">
									<div class="col-xs-5">
										<div class="avarta">
											<a href="<?php echo $link; ?>"><img class="lazy" data-src="<?php echo $image_article; ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" /></a>
										</div>
									</div>
									<div class="col-xs-7">
										<a href="<?php echo $link; ?>"><?php echo $name; ?></a>
										<p><?php echo word_limiter($summary,22); ?></p>
									</div>
								</div>
								<?php endforeach ?>
                            <?php endif ?>
						</div>
					</div>
					
					<!-- End body foot all page -->
        		</section>

        		<footer class="clearfix">
        			<ul class="clearfix">
        				<?php
                            $arr_footer = array(
								array(
                                     'Xem ngày tốt xấu',
                                     'xem-ngay-tot-trong-thang-$thang-nam-$nam',
                                     'xem-ngay-tot-xau.html'
                                 ),
								array(
                                    'Ngày tốt mua xe',
                                    'xem-ngay-tot-mua-xe-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-mua-xe.html'
                                ),
								array(
                                    'Ngày tốt xuất hành',
                                    'xem-ngay-tot-xuat-hanh-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-xuat-hanh.html'
                                ),
								array(
                                    'Ngày tốt cưới hỏi',
                                    'xem-ngay-tot-cuoi-hoi-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-ket-hon.html'
                                ),
								array(
                                    'Ngày tốt động thổ',
                                    'xem-ngay-tot-dong-tho-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-dong-tho.html'
                                ),
								array(
                                    'Ngày tốt mua nhà',
                                    'xem-ngay-tot-mua-nha-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-mua-nha.html'
                                ),
								array(
                                    'Ngày tốt khai trương',
                                    'xem-ngay-tot-khai-truong-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-khai-truong.html'
                                ),
								// array('Ngày tốt<br> xây dựng','xem-ngay-tot-xay-dung-trong-thang-$thang-nam-$nam'),
								array(
                                    'Ngày tốt đổ mái nhà',
                                    'xem-ngay-tot-do-tran-lop-mai-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-do-tran-lop-mai.html'
                                ),
								array(
                                    'Ngày tốt nhập trạch',
                                    'xem-ngay-tot-nhap-trach-nha-moi-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-nhap-trach-nha-moi.html'
                                ),
								array(
                                    'Ngày hoàng đạo',
                                    'xem-ngay-hoang-dao-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-hoang-dao.html'
                                ),
								// array('Ngày tốt<br> ký hợp đồng','xem-ngay-tot-ky-hop-dong-trong-thang-$thang-nam-$nam'),
								// array('Ngày tốt<br> nhận chức','xem-ngay-tot-nhan-chuc-trong-thang-$thang-nam-$nam'),
								array(
                                    'Ngày tốt an táng',
                                    'xem-ngay-tot-an-tang-trong-thang-$thang-nam-$nam',
                                    'xem-ngay-tot-an-tang.html'
                                ),
                            ); 
                            $i = 0;
                            ?>
                        <?php foreach ($arr_footer as $key => $value): ?>
                        	<li class="footerButtonCl">
	        					<a class="<?php echo $key==0?'active':'';?>" href="#menuFootTab<?php echo $key; ?>" rel="noindex"><?php echo $value[0]; ?></a>
	        				</li>
                        <?php endforeach; ?>
        			</ul>
        			<section class="boxFooter">
        				<?php foreach ($arr_footer as $key => $value): ?>
	        				<div class="miniboxFooter <?php echo $key==0?'active':''; ?>" id="menuFootTab<?php echo $key; ?>">
	        					<div class="title-footer-new-mobile">
                                    <p class="title_p text-center">
                                      <a href="<?php echo base_url($value[2]);?>" title="">
                                         <label><?php echo $value[0]; ?></label> 
                                      </a>
                                    </p>
                                </div>
			        			<ul class="xemngay-all clearfix">
			        				<?php
                                        for ($j = 1; $j  <= 12 ; $j ++):
                                      		$link_a = base_url($value[1].'.html');
                                      		$link_a = str_replace('$thang', $j, $link_a);
                                      		$link_a = str_replace('$nam','2022', $link_a);
                                      	?>
			        				<li>
			        					<a href="<?php echo $link_a; ?>" rel="nofollow"><?php echo $value[0]; ?> <?php echo ' tháng '.$j.' năm 2022'.''; ?></a>
			        				</li>
			        				<?php
			        					endfor; 
			        				?>
			        			</ul>
	        				</div>
        				<?php endforeach; ?>
        			</section>
        			<script type="text/javascript">
        				$(document).ready(function() {
        					$('.footerButtonCl a').click(function() {
        						$('.footerButtonCl a').removeClass('active');
        						$('.miniboxFooter').removeClass('active');

        						$(this).addClass('active');
        						var iHref = $(this).attr('href');
        						$('.boxFooter '+iHref).addClass('active');
        					});
        				});
        			</script>
        			<div class="text-center text-foot-newmobile">
                        <div class="text-center">
                            <?php echo $this->my_config->get_config('footer'); ?>
                        </div>
                        <?php echo $this->my_config->get_config('textfoot'); ?>
        			</div>
                    <div class="col-md-12 col-sm-12 col-xs-12 item_footer">
                        <div class="col-xs-3 text-center" >
                            <a href="gioi-thieu.html"><p >Giới Thiệu</p></a>
                        </div>
                        <div class="col-xs-3 text-center item_mobile_footer1" >
                            <a href="dieu-khoan.html"><p >Điều Khoản</p></a>
                        </div>
                        <div class="col-xs-3 text-center item_mobile_footer" >
                            <a href="bao-mat.html"><p >Bảo Mật</p></a>
                        </div>
                        <div class="col-xs-3 text-center item_mobile_footer" >
                            <a href="lien-he.html"><p >Liên Hệ</p></a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 " >
                        <div class="col-xs-6 text-center social_footer" >
                            <span>Social:</span>
                            <a  href="<?php if($this->my_config->get_config('socialtwitter')){ echo $this->my_config->get_config('socialtwitter');} ?>"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg></a>
                            <a  href="<?php if($this->my_config->get_config('socialfacebook')){ echo $this->my_config->get_config('socialfacebook');} ?>"><svg  aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.3V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0 -48-48z"></path></svg></a>
                            <a  href="<?php if($this->my_config->get_config('socialprinterest')){ echo $this->my_config->get_config('socialprinterest');} ?>"><svg  aria-hidden="true" focusable="false" data-prefix="fab" data-icon="pinterest" class="svg-inline--fa fa-pinterest" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg></a>
                        </div>
                    </div>
        		</footer>
        	</section>
        	
        	<div class="scrollToTop" id="backtotop-mobile">
	            <a href="#" id="back-to-top" title="Về đầu trang" class="show">
	            <img src="<?php echo base_url('templates/site/images/newmobile/up.png'); ?>" alt="">
	            </a>
	        </div>
        </div>
        <?php $this->load->view('site/import/box_facebookchat');?>
        <?php $this->load->view('site/import/box_menu_fix_bot.php');?>

        <script type="text/javascript" src="<?php echo base_url('templates/site/bootstrap/js/bootstrap.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/function.js?123456');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/mobile/function_mb.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/jquery.lazy.min.js');?>"></script>
        <script type="text/javascript">
            $(function() {
             $('.lazy').lazy();
            });
        </script>
    </body>
</html>
<script>
	$(document).ready(function(){

        //menu mb
            //menu lam lai
            var myflag = 0;
            $('#content_menu_mobile').on('click', function(e) {
                if (e.target == this){
                    $(this).addClass('hidden');
                    $(this).removeClass('fixedbg');
                    myflag = 0;
                }
            });

            $('#menu-newmobile-home').click(function(){
                if (myflag == 0) {
                    $('#content_menu_mobile').removeClass('hidden');
                    $('#content_menu_mobile').addClass('fixedbg');
                    myflag = 1;
                }else{
                    $('#content_menu_mobile').addClass('hidden');
                    $('#content_menu_mobile').removeClass('fixedbg');
                    myflag = 0;
                }
            });

            $('.mnRight-closeBtn , .li_close_menu').click(function(){
                $('#content_menu_mobile').addClass('hidden');
                $('#content_menu_mobile').removeClass('fixedbg');
                myflag = 0;
            });
        //menu mb

	    $('.body-content-mobile').click(function(){
	    	// if (show_menu_mobile) {
	    	// 	$('#mainWrap').removeClass('fixedPos');
		    // 	show_menu_mobile = 0;
		    // 	$('#menu-newmobile-home').find('.ul2').slideUp('slow');
		    // 	$('.mnRight-closeBtn').hide();
	    	// }
	    	$('.menu-bottom').find('ul').hide();
	    });

	    $('.menu-bottom').on('click',function(){
	    	$(this).find('ul').slideToggle('slow');
	    });
	    $('#search-mobile').on('click',function(){
	    	$('.menu-search').show('slow');
	    	$('.ul_newmoble1').css('background-color', 'black');
	    });
	    $('.close-menu-search').on('click',function(){
	    	$('.menu-search').hide('slow');
	    	$('.ul_newmoble1').css('background-color', '#71685b');
	    });
	});

	$(".scrollToTop").click(function() {
      	$("html, body").animate({
        	scrollTop: 0
      	}, 800);
      	return false
    });
    function search_notfound() {
        var frm = document.form_search_notfound;
        var inputsearch  = frm.inputsearch.value;
        window.location.href = "https://www.google.com.vn/search?q=site:xemvanmenh.net "+inputsearch+"";
        return false;
    }
</script>
