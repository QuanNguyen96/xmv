
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <div class="row">
      <div class="col-md-12">
         <div class="lichthang">
        	<div class="lt_content">
        	   	<div class="lt_header">
        		 	<p>Tháng <?php echo $thang; ?> Năm <?php echo $nam;?></p>
        		 </div> 
        		 <div class="lt_body">
        		 	<div class="banglichthang" >
        		 		<?php echo $lichthang;?>
        		 	</div>
        		 </div>
                 <div class=""><a href="">Xem ngày tốt tháng <?php echo $thang; ?> Năm <?php echo $nam;?></a></div> 
        	</div>
        </div>
      </div>
    </div>
    <div class="row">
       <div class="col-md-12"><h3>Xem lịch vạn niên năm 2018</h3></div>
       <div class="col-md-6">
          <ul>
            <?php for( $i = 1; $i<=6; $i++ ): 
                    $link = base_url('xem-lich-van-nien/lich-thang-'.$i.'-nam-'.$nam.'.html'); 
            ?> 
            <li><a href="<?php echo $link;?>"><?php echo 'Lịch vạn niên tháng '.$i.' năm 2018';?></a></li>
            <?php endfor; ?>
          </ul>
       </div>
       <div class="col-md-6">
          <ul>
            <?php for( $i = 7; $i<=12; $i++ ): 
                    $link = base_url('xem-lich-van-nien/lich-thang-'.$i.'-nam-'.$nam.'.html'); 
            ?> 
            <li><a href="<?php echo $link;?>"><?php echo 'Lịch vạn niên tháng '.$i.' năm 2018';?></a></li>
            <?php endfor; ?>
          </ul>
       </div>
    </div>
    <div class="row">
      <div class="col-md-12"><h3>Xem lịch vạn niên theo năm</h3></div>
      <div class="col-md-12 listnam">
        <?php for( $i = 2000; $i<=2050; $i++ ): ?>
          <a href="<?php echo base_url('xem-lich-am-duong-'.$i.'.html');?>"><?php echo 'Năm '.$i; ?></a>
        <?php endfor; ?>
      </div>
    </div>
    <div class="row">
       <div class="col-md-12"><h3>Xem ngày tốt xấu</h3></div>
       
    </div>
    <div class="row">
       <div class="col-md-12"><h3>Công cụ được xem nhiều nhất</h3></div>
       
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

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

</script>
