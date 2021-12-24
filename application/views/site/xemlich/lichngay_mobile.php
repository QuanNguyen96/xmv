<?php
$url_lich_thang = 'xem-lich-van-nien/lich-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html';
$url_lich_ngay  = 'xem-ngay-tot-xau/ngay-'.$lichngay['ngayduong'].'-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html';
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/css/xemlich.css?v=1');?>">
<section>
	<div class="col-md-12">
	    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
	        <?php echo $breadcrumb; ?>
	    <?php endif ?>
	</div>
	<div class="box-mobile clearfix">
		<h1 class="title-new-mobile"><?php echo $this->my_seolink->get_name(); ?></h1>
		<div class="text-justify">
			<section id="pageTextAuto">
				<p class="title_lvn">Lịch vạn niên</p>
				<div class="text-justify">
					<?php echo $this->my_seolink->get_text(); ?>
				</div>
			</section>
		</div>
        <div class="banglich">
	       <div class="banglich1">
	          <div class="row">
	            <div class="col-xs-3">
	              <div class="banglich1_preview" onclick="show_lichngay(<?php echo $lichngay['ngaytruoc']['0'] ?>,<?php echo $lichngay['ngaytruoc']['1'] ?>,<?php echo $lichngay['ngaytruoc']['2'] ?>)"></div>
	            </div>
	            <div class="col-xs-6">
	               <div class="banglich1_show">
	                 Tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?>
	               </div>
	            </div>
	            <div class="col-xs-3">
	              <div class="banglich1_next" onclick="show_lichngay(<?php echo $lichngay['ngaytiep']['0'] ?>,<?php echo $lichngay['ngaytiep']['1'] ?>,<?php echo $lichngay['ngaytiep']['2'] ?>)"></div>
	            </div>
	          </div>
	       </div>
	       <div class="banglich2">
	          <div class="row">
	             <div class="col-xs-4">
	               <div class="banglich2_preview" onclick="show_lichngay(<?php echo $lichngay['ngaytruoc']['0'] ?>,<?php echo $lichngay['ngaytruoc']['1'] ?>,<?php echo $lichngay['ngaytruoc']['2'] ?>)">Hôm qua</div>
	             </div>
	             <div class="col-xs-4 text-center">
	               <div class="banglich2_number"><?php echo $lichngay['ngayduong'];?></div>
	               <div class="banglich2_text"><?php echo $lichngay['thu'];?></div>
	             </div>
	             <div class="col-xs-4">
	               <div class="banglich2_next" onclick="show_lichngay(<?php echo $lichngay['ngaytiep']['0'] ?>,<?php echo $lichngay['ngaytiep']['1'] ?>,<?php echo $lichngay['ngaytiep']['2'] ?>)">Ngày mai</div>
	             </div>
	          </div>
	          <div class="banglich2_summary">
	          </div>
	       </div>
	       <div class="banglich3">
	         <div class="row">
	            <div class="col-xs-4">
	               <ul>
	                 <li>NĂM <?php echo $lichngay['namcanchi'];?></li>
	                 <li>THÁNG <?php echo $lichngay['thangcanchi'];?></li>
	                 <li>NGÀY <?php echo $lichngay['ngaycanchi'];?></li>
	               </ul>
	            </div>
	            <div class="col-xs-4">
	               <div class="banglic3_vong_tron">
	                  <div class="banglic3_vong_tron1">Tháng <?php echo $lichngay['thangam']; ?></div>
	                  <div class="banglic3_vong_tron2"><?php echo $lichngay['ngayam'];?></div>
	               </div>
	            </div>
	            <div class="col-xs-4">
	               <ul>
	                 <li>NGÀY <?php echo $lichngay['ngayhoangdao'];?></li>
	                 <li>NGŨ HÀNH: </li>
	                 <li><b><?php echo $lichngay['nguhanh'];?></b></li>
	               </ul>
	            </div>
	         </div>
	       </div>
	       <div class="banglich4">
	          <div class="banglich4_tt">Giờ hoàng đạo</div>
	          <ul>
	            <?php foreach ($lichngay['giohoangdao']['hoangdao'] as $key => $value):?>
	            <li><?php echo $value; ?></li>
	            <?php endforeach; ?>
	          </ul>  
	       </div>
	       <div class="banglich5">
	         <div class="row"> 
	           <div class="col-xs-3">
	             <div class="banglich5_bv">
	               <a href="<?php echo base_url($url_lich_ngay); ?>" title="">Xem chi tiết</a>
	             </div>
	           </div>
	           <div class="col-xs-3">
	             <div class="banglich5_thang">
	               <a href="<?php echo base_url($url_lich_thang);?>" title="">Lịch tháng</a>
	             </div>
	           </div>
	           <div class="col-xs-3">
	             <div class="banglich5_ngay">
	               <a href="<?php echo base_url('doi-ngay-duong-lich-sang-am-lich.html'); ?>" title="">Đổi ngày</a>
	             </div>
	           </div>
	           <div class="col-xs-3">
	             <div class="banglich5_tv">
	               <a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html'); ?>" title="">Tử vi 2020</a>
	             </div>
	           </div>
	         </div>
	       </div>
	    </div>
		<div class="row">
	        <div class="col-xs-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
	    </div>
		<div class="box-mobile">
			<div class="row">
				<div class="col-sm-12">
					<div class="dieuhuong2019">
			            <?php $this->load->view('site/import/form_tv_2021'); ?>
			          </div>
				</div>
			</div>
		</div>
		<div class="box-mobile">
			<?php $this->load->view('site/import/frame_xemngayvoicongviec_mb'); ?>
		</div>
		<div class="box-mobile">
			<div class="row">
                <div class="col-md-12">
                    
                    <?php if (isset($getComment) and $getComment): ?>
                        <?php echo $getComment; ?>
                    <?php endif ?>

                </div>
            </div>
		</div>
	</div>
</section>
<script type="text/javascript">
	function show_lichngay(ngay,thang,nam)
    {
      $.ajax({
          url: '<?php echo base_url('ajaxlichngay_mb');?>',
          type: 'POST',
          dataType: 'json',
          data: {ngay:ngay,thang:thang,nam:nam}, 
          beforeSend: function() {
            //echo.fadeOut();
            //submit.html('Sending....'); // change submit button text
          },
          success: function(data) {
                    $('.banglich').html(data.html);
          },
          error: function(e) {
            console.log(e)
          }
        });
    }

    function show_lichthang(thang,nam){
        $.ajax({
          url: '<?php echo base_url('site/xemlich/ajax_get_lichthang_mb');?>',
          type: 'POST',
          dataType: 'json',
          data: {ngay:1,thang:thang,nam:nam}, 
          beforeSend: function() {
            //echo.fadeOut();
            //submit.html('Sending....'); // change submit button text
          },
          success: function(data) {
              $('.tableCalendarAfterMb').html(data.html);
          },
          error: function(e) {
            console.log(e)
          }
        });
    }
</script>