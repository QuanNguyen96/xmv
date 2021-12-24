<link rel="stylesheet" href="<?php echo base_url('templates/site/jquery_ui/jquery_ui.css');?>" />
<script src="<?php echo base_url('templates/site/jquery_ui/jquery_ui.min.js'); ?>"></script>
<script>
  	$(function() {
    	$( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
  	});
</script>
<section>
	<div class="box-mobile">
		<h3 class="title-new-mobile"><a href="<?php echo base_url('xem-ngay-tot-xau.html');?>">Xem ngày tốt xấu</a></h3>
		<div class="box-form">
			<p class="title-mobile-form">Nhập đầy đủ thông tin để có kết quả tốt nhất</p>
			
				<div class="form-group clearfix">
					<form name="search_xemngay" action="" method="post" onsubmit="send_form();return false;">
						<div class="row">
							<div class="col-xs-5">
								<label for="">Xem theo Ngày</label>
							</div>
							<div class="col-xs-5">
								<input id="datepicker" class="" name="input_time" value="<?php echo date('j').'/'.date('n').'/'.date('Y'); ?>">
							</div>
							<div class="col-xs-2">
								<button type="submit" onclick="xemngay('<?php echo base_url(); ?>')">Xem</button>
							</div>
						</div>
					</form>
				</div>
				<div class="form-group clearfix">
					<form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
						<div class="row">
							<div class="col-xs-5">
								<label for="">Xem theo tháng</label>
							</div>
							<div class="col-xs-2">
								<select name="thang" id="">
									<?php
				                        for ($i=1; $i<=12 ; $i++) { 
				                          $selected = ($i==date('m'))?' selected="" ':'';
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
							<div class="col-xs-2"><button type="submit" name="submit" value="submit" class="">Xem</button></div>
						</div>
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
	</div>

	<div class="box-mobile">
	    <a class="color_yellow_cst bold" href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>"><div class="title-new-mobile">Xem tử vi 2022</div></a>
	    <div class="box-form">
		    <?php 
		      $form_name = 'frm_tv_home_1';
		      ?>
		      <div class="tool_tuvi ftv_home" id="bangtratv2020" style="background: none;">

                  <div class="tra_cuu">
                      <div class="background_tra_cuu_2" style="display: flex;flex-wrap: wrap;justify-content: center;">
                          <div class="background_tra_cuu_3">
                          </div>

		        <div class="tool_text_2">Nhập chính xác thông tin của mình!</div>
		        <form name="<?php echo $form_name;?>" id="<?php echo $form_name;?>" action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>" method="post" class="form_tool" onsubmit="frm_tra_cuu_tu_vi('<?php echo $form_name;?>'); return false;">
                    <div class="selectToolTuVi">
		          <select name="nam_sinh" class="select_tool">
		            <?php for ($i=1950; $i < 2010; $i++):
		                          $slt = $i == 1992 ? 'selected=""' : '';  
		                  ?>
		                      <option value="<?php echo $i;?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
		                  <?php endfor; ?>    
		          </select>
		          <select name="gioi_tinh" class="select_tool">
		            <option value="1">Nam</option>
		                  <option value="2">Nữ</option>
		          </select>
                        <div class="clearfix"></div>
                    </div>
		          <button class="bt_xemngay" type="submit">Xem ngay</button>
		          <input type="hidden" name="nam_xem" value="2021">
		        </form>
		      </div>
		      </div>
		      </div>
	    </div>
	  </div>
    <div class="box-mobile">
		<div class="adsResponse1">
			<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
		    <!-- xemvanmenh_title -->
		    <!-- <ins class="adsbygoogle"
		         style="display:block"
		         data-ad-client="ca-pub-7619887841727759"
		         data-ad-slot="1233815493"
		         data-ad-format="auto"
		         data-full-width-responsive="true"></ins>
		    <script>
		         (adsbygoogle = window.adsbygoogle || []).push({});
		    </script> -->
		<?php $this->load->view('site/ads/title');?>
		</div>
	</div>
	

	<div class="box-mobile">
		<h3 class="title-new-mobile"><a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>">Xem lá số tử vi</a></h3>
		<div class="box-form">
			<form name="" action="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" method="post">
				<div class="form-group clearfix">
					<div class="row">
						<div class="col-xs-12">
							<input type="text" name="hovaten" value="" placeholder="Nhập họ và tên" />
						</div>
					</div>
				</div>
				<div class="form-group clearfix">
					<div class="row">
						<div class="col-xs-3">
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
						<div class="col-xs-3">
							<select name="ngay">
				             	<option value="">Ngày sinh dương</option>
				                <?php 
				                    for( $i = 1; $i<= 31; $i++ ){
				                        echo '<option value="'.$i.'">'.$i.'</option>';
				                    }
				             	?>
			               	</select>
						</div>
						<div class="col-xs-3">
							<select name="thang">
			             	<option value="">Tháng</option>
			                <?php 
			                    for( $i = 1; $i<= 12; $i++ ){
			                        echo '<option value="'.$i.'">'.$i.'</option>';
			                    }
			             	?>
			               	</select>
						</div>
						<div class="col-xs-3">
							<select name="nam">
			             	<option value="">Năm</option>
			                <?php 
			                    for( $i = 1950; $i<= 2040; $i++ ){
			                        echo '<option value="'.$i.'">'.$i.'</option>';
			                    }
			             	?>
			               	</select>
						</div>
					</div>
				</div>
				<div class="form-group clearfix">
					<div class="row">
						<div class="col-xs-3">
							<select name="gioitinh">
								<option value="">Giới tính</option>
								<option value="1">Nam giới</option>
								<option value="0">Nữ giới</option>
							</select>
						</div>
						<div class="col-xs-3">
							<select name="namxem">
			             	<option value="">Năm xem</option>
			             	<?php 
			                    for( $i = 2015; $i<= 2040; $i++ ){
			                        echo '<option value="'.$i.'">'.$i.'</option>';
			                    }
			                 ?>
			               	</select>
						</div>
						<div class="col-xs-2">
							<button type="submit" name="submit" value="submit" class="">Xem</button>
							<input type="hidden" name="lich" value="1" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="box-mobile">
		<h3 class="title-new-mobile"><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">Xem tuổi vợ chồng</a></h3>
		<div class="box-form">
			<form name="search_tuoivochong" onsubmit="send_form_vochong(); return false;" action="" method="post">
				<div class="form-group clearfix">
					<div class="row">
						<div class="col-xs-5">
							<select name="tuoichong" required="">
			                    <option value="">Năm sinh chồng</option>
			                    <?php
			                        for($i=1970 ; $i <= 2027 ; $i++){
			                            echo '<option value="'.$i.'" >'.$i.'</option>';
			                        }
			                    ?>
			                    <?php
			                        for($i=1947 ; $i <= 1969 ; $i++){
			                            echo '<option value="'.$i.'" >'.$i.'</option>';
			                        }
			                    ?>
			                </select>
						</div>
						<div class="col-xs-5">
							<select name="tuoivo" required="">
			                    <option value="">Năm sinh vợ</option>
			                    <?php
			                        for($i=1970 ; $i <= 2027 ; $i++){
			                            echo '<option value="'.$i.'" >'.$i.'</option>';
			                        }
			                    ?>
			                    <?php
			                        for($i=1947 ; $i <= 1969 ; $i++){
			                            echo '<option value="'.$i.'" >'.$i.'</option>';
			                        }
			                    ?>
			                </select>
						</div>
						<div class="col-xs-2"><button type="submit" name="submit" value="submit" class="">Xem</button></div>
					</div>
				</div>
			</form>
			<script type="text/javascript">
			    function send_form_vochong() {
			        var frm = document.search_tuoivochong;
			        var tuoichong   = frm.tuoichong.value;
			        var tuoivo  = frm.tuoivo.value;
			        if (!tuoichong) {
			        	alert('Vui lòng không để trống!');
			        	return;
			        }
			        if (!tuoivo) {
			        	alert('Vui lòng không để trống!');
			        	return;
			        }
			        window.location.href = "<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/');?>tuoi-chong-"+tuoichong+"-va-tuoi-vo-"+tuoivo+".html";
			    }
			</script>
		</div>
	</div>
	

	<?php //$this->load->view('site/import/frame_tuvi2018_mb'); ?>
	<?php if ($main_menu): ?>
		<?php foreach ($main_menu as $val): ?>
			<div class="box-mobile">
				<h3 class="title-new-mobile"><?php echo $val['name'];?></h3>
				<?php if ($val['submenu']): ?>
					<div class="row">
					<?php foreach ($val['submenu'] as $val1): ?>
						<?php
							$val1['slug']  = str_replace('$nam','2018',$val1['slug']);
		                 	$val1_link   = base_url($val1['slug'].'.html');
		                 	$val1_avatar = base_url('media/images/menu/'.$val1['avatar']); 
						?>
						<div class="col-xs-6">
							<div class="text-center">
								<a href="<?php echo $val1_link; ?>">
									<img class="lazy" data-src="<?php echo $val1_avatar;?>" alt="<?php echo $val1['name'];?>" />
									<p><?php echo $val1['name'];?></p>
								</a>
							</div>
						</div>
					<?php endforeach ?>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach ?>
	<?php endif ?>
	

	
</section>
