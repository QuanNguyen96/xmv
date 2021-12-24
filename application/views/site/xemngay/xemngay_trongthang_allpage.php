<?php
$ngay_hien_tai  = date('j');
$thang_hien_tai = date('n');
$thang_dang_xem = $input['thang'];
if($thang_hien_tai != $thang_dang_xem)
$ngay_hien_tai = 5;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
  } );
  </script>
  <div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?> 
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $name; ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="formSearch" action="" method="post" onsubmit="send_form();return false;">
       <div class="minibox">
         <table>
            <tbody>
               <tr>
                  <td><label>Chọn tháng( dương lịch )</label></td>
               </tr>
               <tr>
                  <td>
                     <select name="thang">
                      <?php
                        $cr_thang = isset($input['thang']) ? $input['thang'] : date('n'); 
                        for ($i=1; $i<=12 ; $i++) { 
                          $selected = $cr_thang == $i ? 'selected="" ':'';
                          ?>
                          <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                          <?php
                        } 
                      ?>
                     </select>
                     <select name="nam">
                          <?php
                          $cr_nam = isset($input['nam']) ? $input['nam'] : date('Y'); 
                          for ($i=1947; $i<=2027 ; $i++) {
                            $selected = $cr_nam == $i ? 'selected="" ':'';
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                          } 
                        ?>
                     </select>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="field field_center clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button">Xem kết quả</button>
          </div>
       </div>
    </form>
    <?php
      $arr_seolink =  $input['arr_seo']['link'];
      $arr_seolink = str_replace('$thang', '"+thang+"', $arr_seolink);
      $arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
    ?>
    <script type="text/javascript">
      function send_form() {
          var frm   = document.formSearch;
          var thang = frm.thang.value;
          var nam   = frm.nam.value;
          window.location.href = "<?php echo base_url().$arr_seolink; ?>.html";
      }
    </script>
    <div class="field clearfix">
      <div class="col-md-12"><?php echo $text; ?></div>
    </div>
    <?php
      $month_show_next_1 = ($duonglich[1]+1>12)?($duonglich[1]+1-12):($duonglich[1]+1); 
      $year_show_next_1  = ($duonglich[1]+1>12)?($duonglich[2]+1):($duonglich[2]);
      $month_show_next_2 = ($duonglich[1]+2>12)?($duonglich[1]+2-12):($duonglich[1]+2); 
      $year_show_next_2  = ($duonglich[1]+2>12)?($duonglich[2]+1):($duonglich[2]);

      $arr_seo_link_replace_trangxinh1 = str_replace('$thang', $month_show_next_1, $arr_seo_link);
      $arr_seo_link_replace_trangxinh1 = str_replace('$nam', $year_show_next_1, $arr_seo_link_replace_trangxinh1);

      $arr_seo_link_replace_trangxinh2 = str_replace('$thang', $month_show_next_2, $arr_seo_link);
      $arr_seo_link_replace_trangxinh2 = str_replace('$nam', $year_show_next_2, $arr_seo_link_replace_trangxinh2);
    ?>
    <div class="field">
      <div class="row">
        <div class="col-md-12">
          <p class="text-left"><span class="btn_nhaynhay"></span><a href="<?php echo base_url($arr_seo_link_replace_trangxinh1.'.html') ?>"><label>Xem ngày tốt <?php echo $list_anchortext; ?> tháng <?php echo $month_show_next_1; ?> năm <?php echo $year_show_next_1; ?></label></a>
          </p>
        </div>
        <div class="col-md-12">
          <p class="text-right"><span class="btn_nhaynhay"></span>
          <a href="<?php echo base_url($arr_seo_link_replace_trangxinh2.'.html') ?>">
            <label>Xem ngày tốt <?php echo $list_anchortext; ?> tháng <?php echo $month_show_next_2; ?> năm <?php echo $year_show_next_2; ?></label>
          </a>
            
          </p>
        </div>
      </div>
    </div>
    <div class="field clearfix">
       <div class="col-md-12">
          <section class="result" id="result">
            <div class="result_calendar">
              <div class="row">
                <section class="col-md-12">
                  <article class="listDay_good">
                    <div class="dieuhuong2019 clearfix mgb0">
                        <?php $this->load->view('site/import/form_tv_2021'); ?>
                    </div>
                    
                    <table>
                      <thead>
                        <tr>
                          <th>
                            <p><label>Ngày</label></p>
                          </th>
                          <th>
                            <p><label>Ngày tốt xấu trong tháng <?php echo $duonglich[1] ?> năm <?php echo $duonglich[2] ?></label></p>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($info_listdatenext)): ?>
                          <?php foreach ($info_listdatenext as $key => $value): ?>
                            <tr>
                              <td>
                                <section class="clearfix">
                                  <div class="boxLichduong_left">
                                    <p class="title_lichduong">Lịch dương</p>
                                    <p class="title_date"><label><?php echo $value['duonglich'][0] ?></label></p>
                                    <p class="title_month">Tháng <?php echo $value['duonglich'][1] ?></p>
                                  </div>
                                  <div class="boxLichduong_right">
                                    <p class="title_licham">Lịch âm</p>
                                    <p class="title_date"><label><?php echo $value['amlich'][0] ?></label></p>
                                    <p class="title_month">Tháng <?php echo $value['amlich'][1] ?></p>
                                  </div>
                                  <div class="boxLichduong_bottom">
                                    <p><b><span class="<?php echo preg_match('/color_black/', $value['ngayhientai'])?'color_black':''; ?>">Ngày</span> <?php echo $value['ngayhientai']; ?></b></p>
                                  </div>
                                </section>
                              </td>
                              <?php
                                if (isset($link_child)) {
                                  $input['link_parent'] = $link_child;
                                } 
                              ?>
                              <td>
                                <section class="boxRightListDay">
                                  <p><span class="text_red"><?php echo $value['ngaythu'] ?>,  <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>">ngày <?php echo join('/',$value['duonglich']) ?></a></span> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
                                  <p>Ngày <label><?php echo $value['ngaycanchi'] ?></label>, tháng <label><?php echo $value['thangcanchi'] ?></label>, năm <label><?php echo $value['namcanchi'] ?></label></p>
                                  <p>Ngày <span class="text_black"><?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?></span></p>
                                  <p><label>Giờ tốt trong ngày :</label></p>
                                  <p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
                                  <p><a href="<?php echo base_url($input['link_parent'].'/'.'ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>" class="bg_red">Xem chi tiết</a></p>
                                </section>
                              </td>
                            </tr>
                            <?php if ($value['duonglich'][0] == 10): ?>
                                <tr>
                                  <td colspan="2"><?php $this->load->view('site/adsen/code2'); ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($value['duonglich'][0] == date('j')): ?>
                                <tr>
                                  <td colspan="2"><?php $this->load->view('site/adsen/code3'); ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if($ngay_hien_tai == $key ):?>
                              <tr><td colspan="2">    
                              <?php $this->load->view('site/import/form_xem_ngay'); ?>
                              </td></tr>
                            <?php endif; ?>
                          <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                  </article>
                </section>
              </div>
            </div>
            <div class="result_get_lich">
              
              <section class="boxFormXemNgay">
                <div class="boxOne">
                  <section class="alert alert-info">
                    <p><b>Trên đây là kết quả chung nhất cho tất cả các tuổi! Trong một số công việc, ngày tốt phải là ngày hợp với tuổi. Để chọn được ngày tốt hợp nhất với tuổi của quý bạn, quý bạn có thể xem tại đây:</b></p>
                    <p class="text-center" style="text-align: center;font-weight: bold;text-transform: uppercase;color: #8e1215;">Xem ngày tốt hợp tuổi</p>
                    <p class="text-center" style="text-align: center;"><i style="font-size: 12px;">Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</i></p>
                    <form name="form_dongtho" action="" method="post">
                       
                        
                      <div class="row">
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-6 col-xm-6 col-xs-12">
                              <p><label>Nhập ngày muốn xem</label></p>
                            </div>
                            <div class="col-md-6 col-xm-6 col-xs-12">
                             <input type="text" name="" value="<?php echo date('j').'/'.date('n').'/'.date('Y') ?>" id="datepicker" /><br>
                             
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-xm-6 col-xs-12">
                              <p><label>Nhập tuổi của bạn</label></p>
                            </div>
                            <div class="col-md-6 col-xm-6 col-xs-12">
                             <select name="nam">
                               <option value="">Năm Sinh</option>
                              <?php 
                                  for( $i = 1950; $i<= 2005; $i++ ){
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                  }
                               ?>
                             </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="field field_center">
                              <button type="button" class="button" onclick="congcuxemngay('<?php echo base_url($link_parent);?>');">Xem kết quả</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </section>
                </div>
              </section>


            </div>
          </section>
       </div>
    </div>

     <div class="field clearfix">
      <div class="col-md-12">
        <?php echo $text_foot; ?>
      </div>
    </div>
    
    <div class="field">
        <?php $this->load->view('site/import/import_anhduong'); ?>
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
    <?php $this->load->view('site/adsen/code_migd'); ?>
</div>
 