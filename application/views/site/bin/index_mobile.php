<?php
    $CI = &get_instance();
    $CI->load->model('site/article_model');
    $article_feature = $CI->article_model->Db_article_feature();
    // get_action(array('view'=>$view));
    ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content=""/>
        <title><?php echo $title;?></title>
        <meta name="keywords" content="<?php echo $keywords;?>"/>
        <meta name="description" content="<?php echo $description;?>"/>
        <link rel="icon" type="image/png" href="<?php echo base_url('fivico_2.png');?>"/>
        <?php if (!isset($notmetaviewport)): ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0"/>
        <?php endif ?>
        <?php if( isset($noindex) ) echo $noindex;?>
        <link rel='stylesheet' href="<?php echo base_url('templates/site/bootstrap/css/bootstrap.min.css'); ?>" />
        <link rel='stylesheet' href="<?php echo base_url('templates/site/css/style.css'); ?>" />
        <link rel='stylesheet' href="<?php echo base_url('templates/site/css/customer_style.css'); ?>" />
        <link rel='stylesheet' href="<?php echo base_url('templates/site/css/ads.css'); ?>" />
        <link rel='stylesheet' href="<?php echo base_url('templates/site/css/new-mobile-css/style-mobile.css'); ?>" />
        <link rel="canonical" href="<?php echo current_url(); ?>" />
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/jquery.min.js'); ?>"></script>
    </head>
    <body>
        <div class="container no-pd">
        	<header>
        		<div class="text-center">
        			<img src="<?php echo base_url('templates/site/images/newmobile/banner.jpg'); ?>" alt="banner">
        		</div>
        		<div class="menu-newmobile">
        			<ul class="ul_newmoble1 text-center">
        				<li class="lv1">
        					<a href="">
        						<img src="<?php echo base_url('templates/site/images/newmobile/xemboi-8.png'); ?>" alt=""> <br>
        						<span>Xem Bói</span>
        					</a>
        				</li>
        				<li class="lv1">
        					<a href="">
        						<img src="<?php echo base_url('templates/site/images/newmobile/xinloc-8.png'); ?>" alt=""> <br>
        						<span>Xin lộc</span>
        					</a>
        				</li>
        				<li class="lv1">
        					<a href="">
        						<img src="<?php echo base_url('templates/site/images/newmobile/tuvi-8.png'); ?>" alt=""></i> <br>
        						<span>Tử vi</span>
        					</a>
        				</li>
        				<li class="lv1">
        					<a href="">
        						<i class="glyphicon glyphicon-search"></i> <br>
        						<span>Search</span>
        					</a>
        				</li>
        				<li class="lv1" id="menu-newmobile-home">
    						<i class="glyphicon glyphicon-align-justify"></i> <br>
    						<span>Home</span>
    						<ul>
    							<li class="lv2">
    								<a href="">Lịch vạn niên</a>
    							</li>
    							<li class="lv2">
    								<a href="">Xem ngày</a>
    							</li>
    							<li class="lv2">
    								<a href="">Xin lộc thánh</a>
    							</li>
    							<li class="lv2">
    								<a href="">Xem tuổi</a>
    							</li>
    							<li class="lv2">
    								<a href="">Xem bói</a>
    							</li>
    						</ul>
        				</li>
        			</ul>
        		</div>
        	</header>

        	<section class="body-content-mobile">
        		<section class="body-mobile">
        			<!-- Load view -->
    				<?php $this->load->view($view);?>
        			<!-- End load view -->
					
					<!-- start body foot all page -->
					<div class="box-mobile-xemtuvi">
						<div class="text-center m-btom">
							<a href=""><img src="<?php echo base_url('templates/site/images/newmobile/chonsim.png'); ?>" alt=""></a>
						</div>
						<div class="text-center">
							<img src="<?php echo base_url('templates/site/images/newmobile/1_trangchu_fix.jpg'); ?>" alt="">
						</div>
						<div class="form-xtv">
							<div class="box-form">
								<form action="" method="POST">
									<div class="row">
										<div class="col-xs-4">
											<select name="" id="">
												<option value="">Giới tính</option>
											</select>
										</div>
										<div class="col-xs-5">
											<select name="" id="">
												<option value="">Năm sinh</option>
											</select>
										</div>
										<div class="col-xs-2 no-pd">
											<button type="submit" name="submit">xem</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Tử vi</h3>
						<ul class="ul-all">
							<li>
								<a href="">Tử vi 2018</a>
							</li>
							<li>
								<a href="">Xem lá số tử vi</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tháng</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tuần</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng ngày</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Xem tuổi</h3>
						<ul class="ul-all">
							<li>
								<a href="">Tử vi 2018</a>
							</li>
							<li>
								<a href="">Xem lá số tử vi</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tháng</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tuần</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng ngày</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Xem bói</h3>
						<ul class="ul-all">
							<li>
								<a href="">Tử vi 2018</a>
							</li>
							<li>
								<a href="">Xem lá số tử vi</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tháng</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tuần</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng ngày</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Xin lộc thánh</h3>
						<ul class="ul-all">
							<li>
								<a href="">Tử vi 2018</a>
							</li>
							<li>
								<a href="">Xem lá số tử vi</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tháng</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tuần</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng ngày</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Lịch vạn niên</h3>
						<ul class="ul-all">
							<li>
								<a href="">Tử vi 2018</a>
							</li>
							<li>
								<a href="">Xem lá số tử vi</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tháng</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tuần</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng ngày</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Xem ngày</h3>
						<ul class="ul-all">
							<li>
								<a href="">Tử vi 2018</a>
							</li>
							<li>
								<a href="">Xem lá số tử vi</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tháng</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng tuần</a>
							</li>
							<li>
								<a href="" class="newnew">xem tử vi hàng ngày</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Tâm linh</h3>
						<ul class="ul-all">
							<li>
								<a href="">Bài viết tâm linh</a>
							</li>
						</ul>
					</div>

					<div class="box-mobile">
						<h3 class="title-new-mobile">Thư viện tổng hợp</h3>
						<div class="article-new-mobile">
							<div class="row">
								<div class="col-xs-5">
									<div class="avarta">
										<img src="<?php echo base_url('media/images/article/370/h%E1%BA%AFt-x%C3%AC-2_230x154.jpg'); ?>" alt="">
									</div>
								</div>
								<div class="col-xs-7">
									<a href="">Giải mã hiện tượng Hắt xì hơi (Nhảy mũi)...</a>
									<p>nếu bạn bị hắt xì hơi nhiều lần, liên tục,…</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-5">
									<div class="avarta">
										<img src="<?php echo base_url('media/images/article/370/h%E1%BA%AFt-x%C3%AC-2_230x154.jpg'); ?>" alt="">
									</div>
								</div>
								<div class="col-xs-7">
									<a href="">Giải mã hiện tượng Hắt xì hơi (Nhảy mũi)...</a>
									<p>nếu bạn bị hắt xì hơi nhiều lần, liên tục,…</p>
								</div>
							</div>
						</div>
					</div>
					<!-- End body foot all page -->
        		</section>

        		<footer class="clearfix">
        			<ul class="clearfix">
        				<li>
        					<a href="">Xem ngày tốt xấu</a>
        				</li>
        				<li>
        					<a href="">Xem ngày động thổ</a>
        				</li>
        				<li>
        					<a href="">Xem ngày xuất hành</a>
        				</li>
        				<li>
        					<a href="">Xem ngày cưới hỏi</a>
        				</li>
        			</ul>
        			<div class="title-footer-new-mobile">Xem ngày tốt xấu</div>
        			<ul class="xemngay-all">
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        				<li>
        					<a href="">Xem ngày tốt xấu tháng 1 năm 2018</a>
        				</li>
        			</ul>
        			<div class="text-center text-foot-newmobile">
        				<p>Copyright ©2017 Xemtuvi Allrights reserved</p>
        				<p>Liên hệ với chúng tôi :</p>
        				<p>hotro.xemvanmenh@gmail.com</p>
        			</div>
        		</footer>
        	</section>
        </div>
      

        <script type="text/javascript" src="<?php echo base_url('templates/site/bootstrap/js/bootstrap.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/function.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('templates/site/js/jquery.lazy.min.js');?>"></script>
    </body>
</html>
<script>
	// $(document).ready(function(){
	//     $("#menu-newmobile-home").click(function(){
	//         $(this).find('ul').slideToggle();
	//     });
	// });
</script>