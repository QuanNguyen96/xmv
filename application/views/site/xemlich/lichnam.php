<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php if ($key == 1): ?>
          <?php $this->load->view('site/adsen/code1'); ?>
        <?php endif ?>
    <div class="field txt_content">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
      </div>
    <div class="row">
      <?php foreach( $list as $key => $val ): ?>
        <?php 
          switch ($key) {
            case '1':
              $name_day = 'January';
              break;
            case '2':
              $name_day = 'February';
              break;
            case '3':
              $name_day = 'March';
              break;
            case '4':
              $name_day = 'April';
              break;
            case '5':
              $name_day = 'May';
              break;
            case '6':
              $name_day = 'June';
              break;
            case '7':
              $name_day = 'July';
              break;
            case '8':
              $name_day = 'August';
              break;
            case '9':
              $name_day = 'September';
              break;
            case '10':
              $name_day = 'October';
              break;
            case '11':
              $name_day = 'November';
              break;
            case '12':
              $name_day = 'December';
              break;
            default:
              $name_day = '';
              break;
          }
        ?>
        
      <div class="col-md-12">
         <div class="col-md-12">
         	  <div class="trangxinh  clearfix">
              <div class="col-md-4 img_thang hidden-xs">
            <img src="<?php echo base_url('templates/site/images/imglich/thang'.$key.'.png'); ?>" alt="img">
          </div>
          <div class="col-md-8">
            <div class="lichthang">
              <div class="lt_content">
                 <div class="lt_body">
                   <p class="clearfix txt_btom"><a href="<?php echo base_url('xem-lich-van-nien/lich-thang-'.$key.'-nam-'.$nam.'.html'); ?>"><?php echo 'Lịch âm dương tháng '.$key.' năm '.$nam; ?></a></p>
                  <div class="banglichthang" >
                    
                    <div>
                      <?php echo $val;?>
                    </div>
                     <div class="text-center" style="clear: both;">
                      <p class="<?php echo 'title_t'.$key; ?>"><?php echo $name_day; ?></p>
                    </div>
                  </div>
                  <p class="star_hd"><span class="text-yellow"><span class="glyphicon glyphicon-star"></span></span>&nbsp;:Ngày hoàng đạo &nbsp;<span class="text-black"><span class="glyphicon glyphicon-star"></span>&nbsp;:Ngày hắc đạo</p>
                  <div class="dauan">
                    <img src="<?php echo base_url('templates/site/images/imglich/dauan.png'); ?>" alt="img">
                  </div>
                 </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-md-offset-3 alert alert-info text-center" style="clear: both; font-weight: bold;">
                <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$key.'-nam-'.$nam.'.html'); ?>">Ngày tốt trong tháng <?php echo $key; ?> năm <?php echo $nam; ?></a>
              </div>
            </div>
            <div class="col-md-12">
              <?php if($key == date("n", strtotime("+1 month"))): ?>
                  <div class="row">
                       <div class="col-md-12"><h3 class="box_aside_tt1">Xem ngày tốt xấu</h3></div>
                       
                       <form name="" action="" method="post" onsubmit="xemngaytotxau_f(); return false;">
                          <div class="col-md-6 col-md-offset-3 list-work">
                            <div class="row">
                               <div class="col-md-6">
                                  <select name="xntx_f_thang" id="xntx_f_thang">
                                      <option value="" required="">Chọn tháng</option>
                                      <?php for( $i = 1; $i<=12; $i++ ): ?>
                                       <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                      <?php endfor; ?>
                                   </select>
                               </div>
                               <div class="col-md-6">
                                  <select name="xntx_f_nam" id="xntx_f_nam"  required="">
                                      <option value="">Chọn năm</option>
                                      <?php for( $i = 1947; $i<=2027; $i++ ): ?>
                                       <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                      <?php endfor; ?>
                                   </select>
                               </div>
                               <div class="col-md-12">
                                  <select name="xntx_f_md" id="xntx_f_md" required="">
                                      <option value="">Chọn mục đích công việc</option>
                                      <?php foreach($mangcongcu as $key => $val): ?>
                                        <option value="<?php echo $key;?>"><?php echo $val; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                               </div>
                               <div class="col-md-12 text-center">
                                  <button type="submit">Xem chi tiết</button>
                               </div>
                            </div> 
                          </div>
                       </form> 
                    </div>
              <?php endif ?>
            </div>
         </div>
      </div>
      <?php if ($key == 2): ?>
        <div class="col-md-12">
          <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
          <!-- Responsive_1 -->
          <!-- <ins class="adsbygoogle"
               style="display:block"
               data-ad-client="ca-pub-7619887841727759"
               data-ad-slot="5583224082"
               data-ad-format="auto"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script> -->
          <?php $this->load->view('site/adsen/code1'); ?>
        </div>
      <?php endif ?>
      <?php if ($key == 4): ?>
        <div class="col-md-12">
        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- Responsive_2 -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7619887841727759"
     data-ad-slot="8330529125"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
    <?php $this->load->view('site/adsen/code2'); ?>
        </div>
      <?php endif ?>
      <?php if ($key == 6): ?>
        <div class="col-md-12">
        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- Responsive_3 -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7619887841727759"
     data-ad-slot="4099161140"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
        </div>
      <?php endif ?>
      <?php if ($key == 8): ?>
        <div class="col-md-12">
        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- Responsive_4 -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7619887841727759"
     data-ad-slot="8733019655"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
        </div>
      <?php endif ?>
      <?php if ($key == 10): ?>
        <div class="col-md-12">
        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- Responsive_5 -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7619887841727759"
     data-ad-slot="1009963376"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
        </div>
      <?php endif ?>
    <?php endforeach; ?>
    </div>
    <div class="field clearfix txt_content alert alert-success">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
        <div class="col-md-12">
                    
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
  	</div>
    <div>
      <div class="col-md-12">
        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- Responsive_6 -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7619887841727759"
     data-ad-slot="9176706937"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" style="clear: both;"><h3 class="box_aside_tt1">Xem lịch vạn niên theo năm</h3></div>
      <div class="col-md-12 listnam">
        <?php for( $i = 2000; $i<=2050; $i++ ): 
        	$class_bgyl = $i == 2018?'bg_uutien':'';
        ?>
          <a class="<?php echo $class_bgyl; ?>" href="<?php echo base_url('xem-lich-am-duong-'.$i.'.html');?>"><?php echo 'Năm '.$i; ?></a>
        <?php endfor; ?>
      </div>
    </div>
    <div class="row">
         <form action="" method="POST" name="formdoingay">
       <div class="col-md-12"><h3 class="title_dt">Đổi ngày âm dương</h3></div>
       <div class="col-md-6 col-md-offset-3 col-xs-12">
         <div class="row">
            <div class="col-md-4">
               <select name="mDay" id="doingay_ngay" required="">
                <option value="">Chọn ngày</option>
                <?php for($i =1; $i<=31;$i++): 
                  $slt = $i == date('j')?'selected=""':'';
                ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('mDay',$i); ?>><?php echo $i; ?></option>
                <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4">
               <select name="mMonth" id="doingay_thang" required="">
                 <option value="">Chọn tháng</option>
                 <?php for($i=1; $i<=12;$i++): 
                  $slt = $i == date('n')?'selected=""':'';
                 ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('mMonth',$i); ?>><?php echo $i; ?></option>
                  <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4">
               <select name="mYear" id="doingay_nam" required="">
                 <option value="">Chọn năm</option>
                 <?php for($i=1950;$i<= 2030;$i++): 
                  $slt = $i == date('Y')?'selected=""':'';
                 ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('mYear',$i); ?>><?php echo $i; ?></option>
                 <?php endfor ?>
               </select>
            </div>
            <div class="col-md-6 text-center">
               <button type="submit" name="" id="doiduong">Dương sang âm</button>
            </div>
            <div class="col-md-6 text-center">
               <button type="submit" name="" id="doiam">Âm sang dương</button>
            </div>
         </div>
       </div>
    </form>
    </div>
    <div class="row">
       <div class="col-md-12"><h3 class="title_dt">Xem âm lịch ngày hôm nay</h3></div>
       <div class="col-md-6 col-md-offset-3">
         <div class="row">
            <form action="<?php echo base_url('xem-lich-van-nien.html'); ?>" method="POST" name="showngay">
            <div class="col-md-4">
               <select name="show_ngay" id="show_ngay">
                 <option value="">Chọn ngày</option>
                 <?php for($i=1;$i<=31;$i++): 
                  $slt = $i == date('j')?'selected=""':'';
                 ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                  <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4">
               <select name="show_thang" id="show_thang">
                 <option value="">Chọn Tháng</option>
                 <?php for($i=1;$i<=12;$i++): 
                  $slt = $i == date('n')?'selected=""':'';
                 ?>
                    <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                  <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4">
               <select name="show_nam" id="show_nam">
                 <option value="">Chọn năm</option>
                 <?php for($i=1950;$i<=2030;$i++): 
                  $slt = $i == date('Y')?'selected=""':'';
                 ?>
                    <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                 <?php endfor ?>
               </select>
            </div>
            <div class="col-md-12 text-center">
               <button type="submit" name="submit" value="submit">Xem chi tiết</button>
            </div>
         </div>
         </form>
       </div>
    </div>
    <form action="" method="POST" name="lichtheothang" onsubmit="sumit_form_lichtheothang();">
      <div class="row">
       <div class="col-md-12"><h3 class="title_dt">Tra lịch vạn niên theo tháng</h3></div>
       <div class="col-md-6 col-md-offset-3">
         <div class="row">
            <div class="col-md-4">
               <select name="" id="thang_lichthang" required="">
                 <option value="">Chọn tháng</option>
                 <?php for($i=1; $i<=12;$i++): 
                  $slt = $i == date('n')?'selected=""':'';
                 ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('thang_lichthang',$i); ?>><?php echo $i; ?></option>
                  <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4">
               <select name="" id="nam_lichthang" required="">
                 <option value="">Chọn năm</option>
                 <?php for($i=1950;$i<= 2030;$i++): 
                  $slt = $i == date('Y')?'selected=""':'';
                 ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('nam_lichthang',$i); ?>><?php echo $i; ?></option>
                 <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4 text-center">
              <button type="submit" name="">Xem chi tiết</button>
            </div>
         </div>
       </div>
    </div>
    </form>
    <form action="" method="POST" name="xemtheonam" onsubmit="submit_form_xemnam();">
      <div class="row">
       <div class="col-md-12"><h3 class="title_dt">Xem lịch âm dương theo năm</h3></div>
       <div class="col-md-6 col-md-offset-3">
         <div class="row">
            <div class="col-md-4">
               <select name="" id="xemnam_nam" required="">
                 <option value="" >Chọn năm</option>
                 <?php for($i=1950; $i<=2030;$i++): 
                  $slt = $i == date('Y')?'selected=""':'';
                 ?>
                  <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo $slt; ?>><?php echo $i; ?></option>
                  <?php endfor ?>
               </select>
            </div>
            <div class="col-md-4 text-center">
              <button type="submit" name="" id="xemnam">Xem âm lịch</button>
            </div>
         </div>
       </div>
    </div>
    </form>
    <div class="row">
       <div class="col-md-12"><h3 class="box_aside_tt1">Công cụ được xem nhiều nhất</h3></div>
       <div class="col-md-12">
       	<div class="col-md-6 tool_view_much">
       		<div class="row">
       			<div class="col-md-4">
       				<img src="<?php echo base_url('media/images/menu/hinh-anh-chuc-mung-nam-moi-2018-than-tai.png'); ?>" alt="tuvi2018">
       			</div>
       			<div class="col-md-8">
       				<a href="<?php echo base_url('tu-vi-2018.html'); ?>">Xem tử vi 2018</a>
       			</div>
       		</div>
       	</div>
       	<div class="col-md-6 tool_view_much">
       		<div class="row">
       			<div class="col-md-4">
       				<img src="<?php echo base_url('media/images/menu/boi-cung-menh.png'); ?>" alt="tuvi">
       			</div>
       			<div class="col-md-8">
       				<a href="<?php echo base_url(); ?>">Xem tử vi hàng ngày</a>
       			</div>
       		</div>
       	</div>
       	<div class="col-md-6 tool_view_much">
       		<div class="row">
       			<div class="col-md-4">
       				<img src="<?php echo base_url('media/images/menu/boi%20bien%20so%20xe.png'); ?>" alt="ngaytotxau">
       			</div>
       			<div class="col-md-8">
       				<a href="<?php echo base_url('xem-ngay-tot-xau.html'); ?>">Xem ngày tốt xấu</a>
       			</div>
       		</div>
       	</div>
       	<div class="col-md-6 tool_view_much">
       		<div class="row">
       			<div class="col-md-4">
       				<img src="<?php echo base_url('media/images/menu/boi-so-dien-thoai.png') ?>" alt="boi so dien thoai">
       			</div>
       			<div class="col-md-8">
       				<a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>">Xem bói số điện thoại</a>
       			</div>
       		</div>
       	</div>
       	<div class="col-md-6 tool_view_much">
       		<div class="row">
       			<div class="col-md-4">
       				<img src="<?php echo base_url('media/images/menu/lam-an.png'); ?>" alt="tuoi lam an">
       			</div>
       			<div class="col-md-8">
       				<a href="<?php echo base_url('tuoi-lam-an.html'); ?>">Xem tuổi hợp làm ăn</a>
       			</div>
       		</div>
       	</div>
       </div>     
    </div>
    <div class="row">
      <div class="col-md-12">
         <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
      </div>
    </div>
</div>
<script type="text/javascript">
	function show_lichngay(ngay,thang,nam)
	  {
	  	$.ajax({
    			url: '<?php echo base_url('ajaxlichngay');?>',
    			type: 'POST',
    			dataType: 'json',
    			data: {ngay:ngay,thang:thang,nam:nam}, 
    			beforeSend: function() {
    				//echo.fadeOut();
    				//submit.html('Sending....'); // change submit button text
    			},
    			success: function(data) {
                    $('.ln_content').html(data.html);
    			},
    			error: function(e) {
    				console.log(e)
    			}
    		});
	  }
    // function doingayamduong()
    // {
        
    //     alert('sss');
    //     return false;
    // }

     function sumit_form_lichtheothang() {
      var frame = document.lichtheothang;
      var thang = $('#thang_lichthang').val();
      var nam   = $('#nam_lichthang').val();
      var link  = 'xem-lich-van-nien/lich-thang-'+thang+'-nam-'+nam+'.html';
      var domain = '<?php echo base_url(); ?>';
      frame.action = domain + link;
    }
    // doi ngay
    $('#doiduong').on('click',function(){
        var frame = document.formdoingay; 
        var doingay_ngay = $('#doingay_ngay').val();
        var doingay_thang = $('#doingay_thang').val();
        var doingay_nam = $('#doingay_nam').val();
        var link = 'doi-ngay-duong-lich-sang-am-lich.html';
        var domain = '<?php echo base_url(); ?>';
        frame.action = domain + link;
    });

    $('#doiam').on('click',function(){
        var frame = document.formdoingay; 
        var doingay_ngay = $('#doingay_ngay').val();
        var doingay_thang = $('#doingay_thang').val();
        var doingay_nam = $('#doingay_nam').val();
        var link = 'doi-ngay-am-lich-sang-duong-lich.html';
        var domain = '<?php echo base_url(); ?>';
        frame.action = domain + link;
    });

    function submit_form_xemnam() {
      var frame = document.xemtheonam;
      var nam = $('#xemnam_nam').val();
      var link = 'xem-lich-am-duong-'+nam+'.html';
      var domain = '<?php echo base_url(); ?>';
      frame.action = domain + link;
    }
</script>