<?php
$url_lich_thang = 'xem-lich-van-nien/lich-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html';
$url_lich_ngay  = 'xem-ngay-tot-xau/ngay-'.$lichngay['ngayduong'].'-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html';
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/css/xemlich.css?v=1');?>">
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="banglich">
       <div class="banglich1">
          <div class="row">
            <div class="col-md-4">
              <div class="banglich1_preview" onclick="show_lichngay(<?php echo $lichngay['ngaytruoc']['0'] ?>,<?php echo $lichngay['ngaytruoc']['1'] ?>,<?php echo $lichngay['ngaytruoc']['2'] ?>)"></div>
            </div>
            <div class="col-md-4">
               <div class="banglich1_show">
                 Tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?>
               </div>
            </div>
            <div class="col-md-4">
              <div class="banglich1_next" onclick="show_lichngay(<?php echo $lichngay['ngaytiep']['0'] ?>,<?php echo $lichngay['ngaytiep']['1'] ?>,<?php echo $lichngay['ngaytiep']['2'] ?>)"></div>
            </div>
          </div>
       </div>
       <div class="banglich2">
          <div class="row">
             <div class="col-md-3">
               <div class="banglich2_preview" onclick="show_lichngay(<?php echo $lichngay['ngaytruoc']['0'] ?>,<?php echo $lichngay['ngaytruoc']['1'] ?>,<?php echo $lichngay['ngaytruoc']['2'] ?>)">Hôm qua</div>
             </div>
             <div class="col-md-6 text-center">
               <div class="banglich2_number"><?php echo $lichngay['ngayduong'];?></div>
               <div class="banglich2_text"><?php echo $lichngay['thu'];?></div>
               <div class="banglich2_summary">
               </div>
             </div>
             <div class="col-md-3">
               <div class="banglich2_next" onclick="show_lichngay(<?php echo $lichngay['ngaytiep']['0'] ?>,<?php echo $lichngay['ngaytiep']['1'] ?>,<?php echo $lichngay['ngaytiep']['2'] ?>)">Ngày mai</div>
             </div>
          </div>
       </div>
       <div class="banglich3">
         <div class="row">
            <div class="col-md-4">
               <ul>
                 <li>NĂM <?php echo $lichngay['namcanchi'];?></li>
                 <li>THÁNG <?php echo $lichngay['thangcanchi'];?></li>
                 <li>NGÀY <?php echo $lichngay['ngaycanchi'];?></li>
               </ul>
            </div>
            <div class="col-md-4">
               <div class="banglic3_vong_tron">
                  <div class="banglic3_vong_tron1">Tháng <?php echo $lichngay['thangam']; ?></div>
                  <div class="banglic3_vong_tron2"><?php echo $lichngay['ngayam'];?></div>
               </div>
            </div>
            <div class="col-md-4">
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
           <div class="col-md-3">
             <div class="banglich5_bv">
               <a href="<?php echo base_url($url_lich_ngay); ?>" title="">Xem chi tiết</a>
             </div>
           </div>
           <div class="col-md-3">
             <div class="banglich5_thang">
               <a href="<?php echo base_url($url_lich_thang);?>" title="">Lịch tháng</a>
             </div>
           </div>
           <div class="col-md-3">
             <div class="banglich5_ngay">
               <a href="<?php echo base_url('doi-ngay-duong-lich-sang-am-lich.html'); ?>" title="">Đổi ngày</a>
             </div>
           </div>
           <div class="col-md-3">
             <div class="banglich5_tv">
               <a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html'); ?>" title="">Tử vi 2020</a>
             </div>
           </div>
         </div>
       </div>
    </div>
    
    <div class="field txt_content alert">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
        <div class="col-md-12">
                    
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
    </div>
    <div class="row" style="clear: both;">
       <div class="col-md-12"><h3 class="box_aside_tt1"><a href="<?php echo base_url('xem-lich-am-duong-'.date('Y').'.html'); ?>">Xem lịch vạn niên năm <?php echo date('Y'); ?></a></h3></div>
       <div class="col-md-6">
          <ul class="lich12thang">
            <?php for( $i = 1; $i<=6; $i++ ): 
                    $link = base_url('xem-lich-van-nien/lich-thang-'.$i.'-nam-'.$lichngay['namduong'].'.html');
            ?>
            
            <li><a href="<?php echo $link;?>"><?php echo 'Lịch vạn niên tháng '.$i.' năm '.date('Y');?></a></li>
            <?php endfor; ?>
          </ul>
       </div>
       <div class="col-md-6">
          <ul class="lich12thang">
            <?php for( $i = 7; $i<=12; $i++ ): 
                    $link = base_url('xem-lich-van-nien/lich-thang-'.$i.'-nam-'.$lichngay['namduong'].'.html'); 
            ?> 
            <li><a href="<?php echo $link;?>"><?php echo 'Lịch vạn niên tháng '.$i.' năm '.date('Y');?></a></li>
            <?php endfor; ?>
          </ul>
       </div>
    </div>
    <div class="row">
      <div class="col-md-12"><h3 class="box_aside_tt1">Xem lịch vạn niên theo năm</h3></div>
      <div class="col-md-12 listnam">
        <?php for( $i = 2000; $i<=2050; $i++ ):
            $class_bgyl = $i == date('Y') ? 'bg_uutien':'';
        ?>
          <a class="<?php echo $class_bgyl; ?>" href="<?php echo base_url('xem-lich-am-duong-'.$i.'.html');?>"><?php echo 'Năm '.$i; ?></a>
        <?php endfor; ?>
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
                    $('.banglich').html(data.html);
          },
          error: function(e) {
            console.log(e)
          }
        });
    }

    function show_lichthang(thang,nam){
        $.ajax({
          url: '<?php echo base_url('site/xemlich/ajax_get_lichthang');?>',
          type: 'POST',
          dataType: 'json',
          data: {ngay:1,thang:thang,nam:nam}, 
          beforeSend: function() {
            //echo.fadeOut();
            //submit.html('Sending....'); // change submit button text
          },
          success: function(data) {
              $('.lichthang').html(data.html);
          },
          error: function(e) {
            console.log(e)
          }
        });
    }
</script>
