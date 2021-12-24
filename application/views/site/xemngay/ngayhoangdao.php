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
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    
    <section class="boxFormXemNgay">
      <div class="boxOne">
        <form name="form_dongtho" action="" method="post">
           <div class="row">
              <div class="col-md-4 col-xm-4 col-xs-12">
                <p><label>Xem theo ngày</label></p>
              </div>
              <div class="col-md-4 col-xm-4 col-xs-12">
               <input type="text" name="" value="<?php echo date('j').'/'.date('n').'/'.date('Y') ?>" id="datepicker" />
              </div>
              <div class="col-md-4">
               <div class="field field_center">
                  <button type="button" class="button" onclick="congcuxemngay('<?php echo base_url($this->uri->segment(1));?>');">Xem kết quả</button>
               </div>
              </div>
           </div>
        </form>
      </div>
      <div class="boxTwo">
        <form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
          <div class="row">
              <div class="col-md-4 col-xm-4 col-xs-12">
                <p class=""><label>Xem theo tháng</label></p>
              </div>
              <div class="col-md-4 col-xm-4 col-xs-12">
                <div class="row">
                  <section class="col-md-6 col-sm-6 col-xs-6">
                    <select name="thang">
                      <?php
                        for ($i=1; $i<=12 ; $i++) { 
                          $selected = (date('n')==$i)?' selected="" ':'';
                          ?>
                          <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                          <?php
                        } 
                      ?>
                    </select>
                  </section>
                  <section class="col-md-6 col-sm-6 col-xs-6">
                    <select name="nam">
                      <?php
                      for ($i=1947; $i<=2027 ; $i++) {
                        $selected = ($i==date('Y'))?' selected="" ':'';
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                      } 
                      ?>
                    </select>
                  </section>
                </div>
                
                
              </div>
              <div class="col-md-4">
                <div class="field field_center">
                  <button type="submit" class="button">Xem kết quả</button>
                </div>
              </div>
            </div>
        </form>
        <?php
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
    </section>

    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field">
       <div class="col-md-12">
          <section class="result" id="result">
            <?php if (isset($submit_form)): ?>
            <div class="result_table">
              <table class="table table-hover table-bordered table-responsive table-striped">
                <thead>
                  <tr class="success">
                    <td colspan="2"><p class="text-center"><label>Ngày <?php echo implode( '/', $duonglich ); ?> là ngày <b><?php echo $ngayhientai; ?></b></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <label><a href="<?php echo base_url('xem-ngay-tot-hoang-dao.html'); ?>">Giờ Hoàng Đạo</a></label>
                    </td>
                    <td>
                      <p><?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] ) ){
                          foreach ($xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] as $key => $value) {
                            echo gan_link_gio_hoanghac_dao($value).' , ';
                          }
                        }?></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Giờ Hắc Đạo</label></td>
                    <td>
                      <p><?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hac_dao'] ) ){
                          foreach ($xemngay['gio_hoang_dao_hac_dao']['hac_dao'] as $key => $value) {
                            echo gan_link_gio_hoanghac_dao($value).' ; ';
                          }
                        }?></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Các Ngày Kỵ</label></td>
                    <td>
                      <?php if (!empty($result_tinhngayki)): ?>
                        <p>
                          <span>Phạm phải ngày :</span> 
                          <?php foreach ($result_tinhngayki as $key => $value): ?>
                            <strong><?php echo $value[0] ?></strong> : <?php echo $value[1] ?><br>
                          <?php endforeach ?>
                        </p>
                      <?php else: ?>
                        <p>Không phạm bất kỳ ngày Nguyệt kỵ, Nguyệt tận, Tam nương, Dương Công kỵ nhật nào.</p>
                      <?php endif ?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td><label><a href="<?php echo base_url('nhi-thap-bat-tu-la-gi-A1342.html'); ?>">Nhị Thập Bát Tú</a> (<?php echo $result_tinhthapnhibattu[1] ?>)</label></td>
                    <td>
                      <div>
                        <p><label>Tên ngày : </label><?php echo tinhthapnhibattu_replace($result_tinhthapnhibattu[2]['title']) ?></p>
                        <p><label class="color_red">Nên làm : </label><?php echo tinhthapnhibattu_replace($result_tinhthapnhibattu[2]['nenlam']) ?></p>
                        <p><label>Kiêng cữ : </label><?php echo tinhthapnhibattu_replace($result_tinhthapnhibattu[2]['kilam']) ?> <?php echo replace_tinhtrucngay($result_tinhthapnhibattu[2]['seo_ki'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                        <p><label>Ngoại lệ : </label><?php echo tinhthapnhibattu_replace($result_tinhthapnhibattu[2]['ngoaile']) ?></p>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><label><a href="<?php echo base_url('thap-nhi-kien-tru-la-gi-A1329.html'); ?>">Thập Nhị Kiến Trừ</a> <span class="color_red">(<?php echo $result_tinhtrucngay['ten'] ?>)</span></label></td>
                    <td>
                      <p><?php echo replace_tinhtrucngay($result_tinhtrucngay['tot'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                      <p><?php echo replace_tinhtrucngay($result_tinhtrucngay['xau'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                    </td>
                  </tr>
                  
                  <tr>
                    <td><label>Giờ xuất hành Theo Lý Thuần Phong</label></td>
                    <td>
                      <div>
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
                    </td>
                  </tr>
                </tbody>
              </table>
              
            </div>
            
            <?php endif ?>

            
            <div class="field alert alert-success clearfix">
              <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
            </div>
            <div class="clearfix">
              <div class="row">
                <div class="col-md-12">
                    <div class="dieuhuong2019 clearfix mgt0">
                        <?php $this->load->view('site/import/form_tv_2021'); ?>
                    </div>
                </div>
              </div>
            </div>
            <div class="result_calendar">
              <div class="row">
                <section class="col-md-12">
                  <article class="listDay_good">
                    <table>
                      <thead>
                        <tr>
                          <th>
                            <p><label>Ngày</label></p>
                          </th>
                          <th>
                            <p><label>Ngày tốt trong tháng <?php echo $duonglich[1] ?> năm <?php echo $duonglich[2] ?></label></p>
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
                                    <p>Ngày <?php echo $value['ngayhientai'] ?></p>
                                  </div>
                                </section>
                              </td>
                              <td>
                                <section class="boxRightListDay">
                                  <p><span class="text_red"><?php echo $value['ngaythu'] ?>,  <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>">ngày <?php echo join('/',$value['duonglich']) ?></a></span> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
                                  <p>Ngày <label><?php echo $value['ngaycanchi'] ?></label>, tháng <label><?php echo $value['thangcanchi'] ?></label>, năm <label><?php echo $value['namcanchi'] ?></label></p>
                                  <p>Ngày <span class="text_black"><a href="<?php echo base_url('xem-ngay-tot-hoang-dao.html'); ?>"><?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?></span></a></p>
                                  <p><label>Giờ tốt trong ngày :</label></p>
                                  <p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
                                  <p><a href="<?php echo base_url($this->uri->segment(1).'/'.'ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>" class="bg_red">Xem chi tiết</a></p>
                                </section>
                              </td>
                            </tr>
                            <!-- adsen -->
                              <?php if ($value['duonglich'][0] == 15): ?>
                              <tr>
                                <td colspan="2">
                                  <?php $this->load->view('site/adsen/code2'); ?>
                                </td>
                              </tr>
                            <?php endif ?>
                            <!-- end adsen -->
                          <?php endforeach ?>
                        <?php endif ?>
                        

                      </tbody>
                    </table>
                  </article>
                </section>
              </div>
            </div>
          </section>
       </div>
    </div>
    <?php if (isset($submit_form)): ?>
       <div class="field">
        <?php $this->load->view('site/import/import_anhduong'); ?>
      </div>
    <?php endif ?>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                
                <?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>

            </div>
        </div>
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
            </div>
        </div>
    </div>
</div>
 