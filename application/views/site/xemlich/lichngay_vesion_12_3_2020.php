<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field txt_content">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="row" style="clear: both;">
      <div class="col-md-6">
            <div class="lichngay">
                <div class="ln_content">
                  <div class="lncontrol prev text-center">
                      <span class="glyphicon glyphicon-arrow-left" onclick="show_lichngay(<?php echo $lichngay['ngaytruoc']['0'] ?>,<?php echo $lichngay['ngaytruoc']['1'] ?>,<?php echo $lichngay['ngaytruoc']['2'] ?>)"></span>
                    </div> 
                    <div class="ln_header">
                        <p>Tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?></p>
                    </div> 
                    <div class="lncontrol nex text-center">
                      <span class="glyphicon glyphicon-arrow-right" onclick="show_lichngay(<?php echo $lichngay['ngaytiep']['0'] ?>,<?php echo $lichngay['ngaytiep']['1'] ?>,<?php echo $lichngay['ngaytiep']['2'] ?>)"></span>
                      </div>
                    <div class="ln_body ln_body_1">
                        <h3><?php echo $lichngay['ngayduong'];?></h3>
                        <p><?php echo 'Ngày '.$lichngay['ngayam'].' Tháng'.$lichngay['thangam'].' Năm '.$lichngay['namam'].'(AL)'; ?></p>
                    </div>
                    <div class="ln_body ln_body_2">
                    <ul>
                      <li>Ngày: <b><?php echo $lichngay['ngaycanchi'];?></b></li>
                      <li>Tháng: <b><?php echo $lichngay['thangcanchi'];?></b></li>
                      <li>Năm: <b><?php echo $lichngay['namcanchi'];?></b></li>
                    </ul>
                    <ul>
                      <li>Ngày:<?php if ($lichngay['ngayhoangdao'] == 'Hoàng đạo'): ?>
                                <b style="color: red;"><?php echo $lichngay['ngayhoangdao'];?></b>
                            <?php else: ?>
                                <b><?php echo $lichngay['ngayhoangdao'];?></b>
                            <?php endif ?>
                            </li>
                      <li>Trực:<b><?php echo $lichngay['truc']['ten'];?></b></li>
                      <li>Ngũ Hành: <b style="font-size: 12px!important"><?php echo $lichngay['nguhanh'];?></b></li>
                    </ul>
                    </div>
                    <div class="text-center thu">
                        <p><?php echo $lichngay['thu'];?></p>
                    </div>
                    <div class="ln_body ln_body_3">
                    <ul>
                            <p class="">Giờ tốt</p>
                      <?php foreach ($lichngay['giohoangdao']['hoangdao'] as $key => $value):?>
                      <li style="color: red;"><?php echo $value;?></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul>
                            <p style="color: black!important;">Giờ xấu</p>
                      <?php foreach ($lichngay['giohoangdao']['hacdao'] as $key => $value):?>
                      <li style="color: black!important;"><?php echo $value;?></li>
                        <?php endforeach; ?>
                    </ul>
                    </div>
                    <div class="ln_footer">
                    <div class="lncontrol  text-center">
                      <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$lichngay['ngaytruoc']['0'].'-thang-'.$lichngay['ngaytruoc']['1'].'-nam-'.$lichngay['ngaytruoc']['2'].'.html'); ?>">Ngày hôm qua</a>
                    </div> 
                        <div class="lndetail text-center">
                            <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$lichngay['ngayduong'].'-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html'); ?>">Chi tiết</a>
                        </div>
                      <div class="lncontrol  text-center">
                        <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$lichngay['ngaytiep']['0'].'-thang-'.$lichngay['ngaytiep']['1'].'-nam-'.$lichngay['ngaytiep']['2'].'.html'); ?>">Ngày mai</a>
                      </div>
                    </div>
                </div>   
            </div>
        </div>
      <div class="col-md-6">
         <div class="lichthang">
          <div class="lt_content">
              <div class="lt_header">
                <div class="left_prev">
                  <span class="glyphicon glyphicon-arrow-left" onclick="show_lichthang(<?php echo $lichngay['thangtruoc']['1'] ?>,<?php echo $lichngay['thangtruoc']['2'] ?>)"></span>
                </div>
              <p class="box_aside_tt1"><a href="<?php echo base_url('xem-lich-van-nien/lich-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html'); ?>">Tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?></a></p>
              <div class="right_next">
                <span class="glyphicon glyphicon-arrow-right" onclick="show_lichthang(<?php echo $lichngay['thangtiep']['1'] ?>,<?php echo $lichngay['thangtiep']['2'] ?>)"></span>
              </div>
             </div> 
             <div class="lt_body">
              <div class="banglichthang_ngay" >
                <?php echo $lichthang;?>
              </div>
              <p class="star_hd"><span class="text-yellow"><span class="glyphicon glyphicon-star"></span></span>&nbsp;:Ngày hoàng đạo &nbsp;<span class="text-black"><span class="glyphicon glyphicon-star"></span>&nbsp;:Ngày hắc đạo</p>
             </div>
                 <div class="lt_btom"><a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$lichngay['thangduong'].'-nam-'. $lichngay['namduong'].'.html'); ?>">Xem ngày tốt tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?></a></div> 
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="dieuhuong2019">
            <?php $this->load->view('site/import/form_tv_2021'); ?>
          </div>
        </div>    
    </div>
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
    <div class="field txt_content alert alert-success">
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
                    $('.ln_content').html(data.html);
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
