<link rel="stylesheet" href="<?php echo base_url('templates/site/jquery_ui/jquery_ui.css');?>" />
<script src="<?php echo base_url('templates/site/jquery_ui/jquery_ui.min.js'); ?>"></script>
<script>
  	$(function() {
    	$( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
    	$( "#datepicker1" ).datepicker({ dateFormat: 'd/m/yy' });
    	$( "#datepicker2" ).datepicker({ dateFormat: 'd/m/yy' });
  	});
</script>
<section>
	<div class="col-md-12">
	    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	        <?php echo $breadcrumb; ?>
	    <?php endif ?>
	</div>
	<div class="box-mobile">
		<h3 class="title-new-mobile"><?php echo $this->my_seolink->get_name(); ?></h3>
        <?php $this->load->view('site/adsen/code1'); ?>
		<p class="title-mobile-form">Nhập đầy đủ thông tin để có kết quả tốt nhất</p>
		<div class="box-form inner_box_red mar-negative">
			<div class="form-group clearfix">
				<form name="search_xemngay" action="" method="post" onsubmit="send_form();return false;">
					<div class="row">
						<div class="col-xs-12">
							<label for="">Xem theo Ngày</label>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6">
									<input id="datepicker" class="" name="input_time" value="<?php echo date('j').'/'.date('n').'/'.date('Y'); ?>">
								</div>
								<div class="col-xs-3"></div>
								<div class="col-xs-3 text-right">
									<button type="submit" onclick="xemngay('<?php echo base_url(); ?>')">Xem</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="form-group clearfix">
				<form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
					<div class="row">
						<div class="col-xs-12">
							<label for="">Xem theo tháng</label>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-3">
									<select name="thang" id="">
										<?php
					                        for ($i=1; $i<=12 ; $i++) { 
					                          $selected = ($i==2017)?' selected="" ':'';
					                          ?>
					                          <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
					                          <?php
					                        } 
					                  	?>
									</select>
								</div>
								<div class="col-xs-3">
									<select name="nam" id="">
										<?php
					                      	for ($i=1947; $i<=2027 ; $i++) {
					                        $selected = ($i==date('Y'))?' selected="" ':'';
					                        ?>
					                        <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
					                        <?php
					                      	} 
					                  	?>
									</select>
								</div>
								<div class="col-xs-3"></div>
								<div class="col-xs-3 text-right">
									<button type="submit" name="submit" value="submit" class="">Xem</button>
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>

			<div class="form-group clearfix">
				<form name="xemngay_theotuoi_index_mb" action="" method="post" onsubmit="xemngay_theotuoi_index_mb_submit();">
					<div class="row">
						<div class="col-xs-12">
							<label for="">Xem theo tuổi</label>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-3">
									<select name="thang" id="">
										<?php
					                        for ($i=1; $i<=12 ; $i++) { 
					                          $selected = ($i==(int)date('m'))?' selected="" ':'';
					                          ?>
					                          <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
					                          <?php
					                        } 
					                  	?>
									</select>
								</div>
								<div class="col-xs-3">
									<select name="nam" id="">
										<?php
					                      	for ($i=1947; $i<=2027 ; $i++) {
					                        $selected = ($i==date('Y'))?' selected="" ':'';
					                        ?>
					                        <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
					                        <?php
					                      	} 
					                  	?>
									</select>
								</div>
								<div class="col-xs-3">
									<select name="nam_sinh">
										<?php foreach (list_age_text() as $key => $value): 
			                                $selected = ((int)$value == 1992)?' selected="" ':'';
			                                ?>
			                                <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
			                            <?php endforeach ?>
									</select>
								</div>
								<div class="col-xs-3 text-right">
									<button type="submit" name="submit" value="submit" class="">Xem</button>
								</div>
							</div>
						</div>
						
					</div>
					<script>
						function xemngay_theotuoi_index_mb_submit(){
						  var frm    = document.xemngay_theotuoi_index_mb;
	                      var canchi = frm.nam_sinh.value;
	                      var link   = 'xem-ngay-tot-tuoi-' + canchi + '.html';
	                      var domain = '<?php echo base_url(); ?>';
	                      frm.action = domain + link;
						}
					</script>
				</form>
			</div>


			<script type="text/javascript">
	        	function send_form() {
		            var frm = document.search_xemngay;
		            var input_time   = frm.input_time.value;
		            var arr = input_time.split('/');
		            window.location.href = "<?php echo base_url(); ?>xem-ngay-tot-xau/ngay-"+arr[0]+"-thang-"+arr[1]+"-nam-"+arr[2]+".html";
	        	}
	      	</script>
	      	<?php
	      		$arr_seo_link_thang = 'xem-ngay-tot-trong-thang-$thang-nam-$nam'; 
          		$arr_seolink = str_replace('$thang', '"+thang+"', $arr_seo_link_thang);
          		$arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
        	?>
	      	<script type="text/javascript">
	          	function send_form_dong_tho() {
              		var frm   = document.formSearch;
              		var thang = frm.thang.value;
              		var nam   = frm.nam.value;
              		window.location.href = "<?php echo base_url().$arr_seolink; ?>.html";
	          	}
	        </script>
		</div>


		<div class="text-justify box_limit enable_limit">
			<br>
			<?php echo $this->my_seolink->get_text(); ?>
		</div>
		<button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
			<div class="lbl_view">Xem thêm mô tả</div><br>
            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
        </button>

        <div class="clearfix"></div>
        <div id="homNayNgayTotHayXau">
            <div class="box_content_tt_ngay_tot">
                <p class="ngay_hom_nay_tot">
                    <a href="#">
                        Ngày  (<?php
                        echo $xemngay['duonglich'][0] . '/' . $xemngay['duonglich'][1] . '/' . $xemngay['duonglich'][2]; ?>) là ngày tốt hay xấu?</a>
                </p>
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
        <div class="clearfix"></div>

		<div class="title-not-bgr-img">
			<p>Thông tin ngày</p>
			<p><?php echo $xemngay['duonglich'][0].'/'.$xemngay['duonglich'][1].'/'.$xemngay['duonglich'][2]; ?></p>
		</div>
		<div class="box-gio-hoangdao">
			<div class="title-xemngay"><span><a href="<?php echo base_url('xem-ngay-tot-hoang-dao.html'); ?>">Giờ Hoàng Đạo</a></span></div>
			<div class="text-center">
				<p><?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] ) ){
                         foreach ($xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] as $key => $value) {
                            echo gan_link_gio_hoanghac_dao($value).' ; ';
                          }
                        }?></p>
			</div>
		</div>
		<div class="box-gio-hacdao">
			<div class="title-xemngay"><span>giờ hắc đạo</span></div>
			<div class="text-center">
				<p><?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hac_dao'] ) ){
                          foreach ($xemngay['gio_hoang_dao_hac_dao']['hac_dao'] as $key => $value) {
                            echo gan_link_gio_hoanghac_dao($value).' ; ';
                          }
                        }?></p>  
			</div>
		</div>
		<div class="box-ngayky">
			<div class="title-xemngay"><span>Các ngày kỵ</span></div>
			<div class="text-center">
				<?php if (!empty($result_tinhngayki)): ?>
                    <p>
                      	<span>Phạm phải ngày :</span> 
                      	<?php foreach ($result_tinhngayki as $key => $value): ?>
                        	<strong><?php echo $value[0] ?></strong> : <?php echo $value[1] ?><br>
                      	<?php endforeach ?>
                    </p>
              	<?php else: ?>
                	<p>Không phạm bất kỳ ngày 
                        <a href="<?php echo base_url('ngay-nguyet-ky-va-nhung-dieu-chua-biet-ve-mung-05-14-23-A624.html'); ?>">Nguyệt kỵ</a>, 
                        Nguyệt tận, 
                        <a href="<?php echo base_url('ngay-tam-nuong-la-gi-va-nhung-dieu-kieng-ky-ma-ban-can-biet-A621.html'); ?>">Tam nương</a>, 
                        <a href="<?php echo base_url('ngay-duong-cong-ky-nhat-la-gi-va-cach-tinh-ngay-trong-thang-A646.html'); ?>">Dương Công kỵ nhật</a> nào.
                    </p>
              	<?php endif ?>  
			</div>
		</div>
		<div class="box-nguhanh">
			<div class="title-xemngay"><span>Ngũ Hành</span></div>
			<div class="text-center">
				<?php if (!empty($result_nguhanh_huongdi)): ?>
                    <p><b>Ngày : <span><?php echo $result_nguhanh_huongdi['can_ngay'].' '.$result_nguhanh_huongdi['chi_ngay']; ?></span></strong></b></p>
                	<p><?php echo str_replace('.', '.<br>', $result_nguhanh_huongdi['content_nguhanh']) ; ?></p>
              	<?php endif ?> 
			</div>
		</div>
		<div class="box-btbkn">
			<div class="title-xemngay"><span>Bành tổ bách kỵ nhật</span></div>
			<div class="text-center">
				<?php if (!empty($result_tinh_banhtobachkinhat)): ?>
                    <p>- <strong><?php echo $arr_tinhngay_ki['canngay'] ?></strong> : <?php echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['canngay'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])); ?></p>
                    <p>- <strong><?php echo $arr_tinhngay_ki['chingay'] ?></strong> : <?php echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['chingay'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])); ?></p>
              	<?php endif ?>  
			</div>
		</div>
		<div class="box-kmld">
			<div class="title-xemngay"><span>Khổng minh lục điệu</span></div>
			<div class="text-center">
				<?php if (!empty($result_tinh_khongminh)): ?>
                    <?php if (!empty($result_tinh_khongminh['tinh_khongminh'])): ?>
						<p style="font-weight: bold;">
							Ngày : <strong class="<?php echo $result_tinh_khongminh['tinh_khongminh'][2]['saotot']==1?'color_red':'color_black'; ?>"><?php echo $result_tinh_khongminh['tinh_khongminh'][2]['name'] ?></strong>
						</p>
						<p class="text-justify">
							tức <?php echo $result_tinh_khongminh['tinh_khongminh'][2]['content_khongminh'] ?>
						</p>
						<div>
							<?php echo $result_tinh_khongminh['tinh_khongminh'][2]['content_tho'] ?>
						</div>
                    <?php endif ?>
              	<?php endif ?>  
			</div>
		</div>
		<div class="box-ntbt">
			<div class="title-xemngay"><span>Nhị thập bát tú : Sao <?php echo $result_tinhthapnhibattu[1] ?></span></div>
			<div class="text-justify">
				<p><label>Tên ngày : </label><?php echo ($result_tinhthapnhibattu[2]['title']) ?></p>
              	<p><label class="color_red">Nên làm : </label><?php echo ($result_tinhthapnhibattu[2]['nenlam']) ?></p>
              	<p><label>Kiêng cữ : </label><?php echo ($result_tinhthapnhibattu[2]['kilam']) ?> <?php echo replace_tinhtrucngay($result_tinhthapnhibattu[2]['seo_ki'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
              	<p><label>Ngoại lệ : </label><?php echo ($result_tinhthapnhibattu[2]['ngoaile']) ?></p>
			</div>
		</div>
		<div class="box-tnkt">
			<div class="title-xemngay"><span>Thập nhị kiến trừ : <?php echo $result_tinhtrucngay['ten'] ?></span></div>
			<div class="text-justify">
				<p><?php echo replace_tinhtrucngay($result_tinhtrucngay['tot'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
              	<p><?php echo replace_tinhtrucngay($result_tinhtrucngay['xau'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>  
			</div>
		</div>
		<div class="box-nhtt">
			<div class="title-xemngay"><span>Ngọc Hạp thông thư</span></div>
			<div class="text-center">
				<p><?php echo $result_tinhsaototsaoxau['sao_tot'] ?></p>  
				<p><?php echo $result_tinhsaototsaoxau['sao_xau'] ?></p>
			</div>
		</div>
		<div class="box-huongxuathanh">
			<div class="title-xemngay"><span>Hướng xuất hành</span></div>
			<div class="text-center">
				<p><?php echo $result_nguhanh_huongdi['huongtot'] ?></p>
				<p><?php echo replace_tinhtrucngay($result_nguhanh_huongdi['seo_ketluan'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
				<p><?php echo $result_nguhanh_huongdi['huongxau'] ?></p>  
			</div>
		</div>
		<div class="box-lythuanphong">
			<div class="title-xemngay"><span>Giờ xuất hành theo lý thuần phong</span></div>
			<div class="text-center">
				<?php if (!empty($result_tinh_khongminh['tinh_gioxuathanh'])): ?>
                    <?php foreach ($result_tinh_khongminh['tinh_gioxuathanh'] as $key => $value): ?>
                      <p>
                        <strong><?php echo $key; ?></strong>
                        <span>
                          <?php echo $value[2]['content_gio'] ?>
                        </span>
                      </p>
                    <?php endforeach ?>
              	<?php endif ?>  
			</div>
		</div>
		<br>
		<div class="box_xvm clearfix">
			<div class="dieuhuong2019 clearfix mgt0">
                <?php $this->load->view('site/import/form_tv_2021'); ?>
            </div>
		</div>

		<div>
			<?php $this->load->view('site/adsen/code2'); ?>
		</div>
		<div class="box-next-day">
			<div class="text-danger title-next-day">Xem các ngày tiếp theo</div>
			<?php echo $ngayketiep; ?>
		</div>
		<div>
			<?php $this->load->view('site/adsen/code3'); ?>
		</div>
		<div class="text-justify">
			<?php echo $this->my_seolink->get_text_foot(); ?>
		</div>
		<div class="col-md-12">
            <?php $this->load->view('site/sh_comment/get_by_theme'); ?>
        </div>
		<?php $this->load->view('site/import/frame_tuvi2018_mb'); ?>
		<?php $this->load->view('site/import/frame_tuvihangngay_mb'); ?>
		<div>
			<?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>
		</div>
	</div>
</section>
