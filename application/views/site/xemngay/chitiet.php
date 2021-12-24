 <?php if (isset($_GET['component'])): ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>noi dung nhung</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel='stylesheet' href="<?php echo base_url('templates/site/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel='stylesheet' href="<?php echo base_url('templates/site/css/style.css'); ?>" />
  </head>
  <body>
  
  </body>
  </html>
  
<?php endif ?>
<link rel="stylesheet" href="<?php echo base_url('templates/site/jquery_ui'); ?>/jquery_ui.css"/>
<script src="<?php echo base_url('templates/site/jquery_ui'); ?>/jquery_ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
  });
</script>
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="desktop_padding">
      <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
      <?php
        if (!isset($_GET['component'])) {
          ?>
          <section class="boxFormXemNgay inner_box_red">
            <div class="boxOne">
              <form name="search_xemngay" action="" method="post" onsubmit="send_form();return false;">
                <div class="row">
                  <div class="col-md-3 col-xm-3 col-xs-12">
                    <p><label>Xem theo ngày</label></p>
                  </div>
                  <div class="col-md-6 col-xm-6 col-xs-12">
                   <div class="row">
                     <div class="col-md-8">
                       <input type="text" name="input_time" id="datepicker" value="<?php echo $xemngay['duonglich'][0].'/'.$xemngay['duonglich'][1].'/'.$xemngay['duonglich'][2]; ?>" />
                     </div>
                   </div>
                  </div>
                  <div class="col-md-3">
                   <div class="field field_center">
                      <button type="submit" class="button" onclick="xemngay('<?php echo base_url(); ?>')">Xem kết quả</button>
                   </div>
                  </div>
               </div>
              </form>
            </div>
            <div class="boxTwo">
              <form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
                <div class="row">
                    <div class="col-md-3 col-xm-3 col-xs-12">
                      <p class=""><label>Xem theo tháng</label></p>
                    </div>
                    <div class="col-md-6 col-xm-6 col-xs-12">
                      <div class="row">
                        <section class="col-md-4 col-sm-4 col-xs-4">
                          <select name="thang">
                            <?php
                              for ($i=1; $i<=12 ; $i++) { 
                                $selected = ($i==date('n'))?' selected="" ':'';
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              } 
                            ?>
                          </select>
                        </section>
                        <section class="col-md-4 col-sm-4 col-xs-4">
                          <select name="nam">
                            <?php
                            for ($i=1947; $i<=2027 ; $i++) {
                              $selected = ($i== date('Y'))?' selected="" ':'';
                              ?>
                              <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php
                            } 
                            ?>
                          </select>
                        </section>
                      </div>
                    </div>
                    <div class="col-md-3">
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

            <div class="boxThree">
              <form name="xemngay_theotuoi_index" method="post" onsubmit="xemngay_theotuoi_index_submit();">
                <div class="row">
                    <div class="col-md-3 col-xm-3 col-xs-12">
                      <p class=""><label>Xem theo tuổi</label></p>
                    </div>
                    <div class="col-md-6 col-xm-6 col-xs-12">
                      <div class="row">
                        <section class="col-md-4 col-sm-4 col-xs-4">
                          <select name="thang">
                            <?php
                              for ($i=1; $i<=12 ; $i++) { 
                                $selected = ($i==date('n'))?' selected="" ':'';
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              } 
                            ?>
                          </select>
                        </section>
                        <section class="col-md-4 col-sm-4 col-xs-4">
                          <select name="nam">
                            <?php
                            for ($i=1947; $i<=2027 ; $i++) {
                              $selected = ($i== date('Y'))?' selected="" ':'';
                              ?>
                              <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php
                            } 
                            ?>
                          </select>
                        </section>

                        <section class="col-md-4 col-sm-4 col-xs-4">
                          <select name="nam_sinh">
                            <?php foreach (list_age_text() as $key => $value): 
                                $selected = ((int)$value == 1992)?' selected="" ':'';
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php endforeach ?>
                          </select>
                        </section>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field field_center">
                        <button type="submit" class="button">Xem kết quả</button>
                      </div>
                    </div>
                </div>

                <script>
                    function xemngay_theotuoi_index_submit(){
                      var frm    = document.xemngay_theotuoi_index;
                      var canchi = frm.nam_sinh.value;
                      var link   = 'xem-ngay-tot-tuoi-' + canchi + '.html';
                      var domain = '<?php echo base_url(); ?>';
                      frm.action = domain + link;
                    }
                </script>
              </form>
              <?php
                $arr_seolink = str_replace('$thang', '"+thang+"', $arr_seo_link_thang);
                $arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
              ?>
            </div>
          </section>
        <?php } ?>


      <div class="field">
        <div class="col-md-12">
          <?php echo $this->my_seolink->get_text(); ?>
        </div>
      </div>
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
    </div>

    <div class="field">
      <div class="col-md-12">
          <div class="box result" id="result">
            <div class="result_table">
              
              <table class="table  table-bordered table-responsive">
                <thead>
                  <tr class="success">
                    <td colspan="2"><p class="text-center"><label>Thông tin ngày <?php echo $xemngay['duonglich'][0].'/'.$xemngay['duonglich'][1].'/'.$xemngay['duonglich'][2]; ?></p></label></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><label><a href="<?php echo base_url('xem-ngay-tot-hoang-dao.html'); ?>">Giờ Hoàng Đạo</a></label></td>
                    <td>
                      <p>
                        <?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] ) ){
                          foreach ($xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] as $key => $value) {
                            echo gan_link_gio_hoanghac_dao($value).' , ';
                          }
                        }?>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Giờ Hắc Đạo</label></td>
                    <td>
                      <p>
                        <?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hac_dao'] ) ){
                          foreach ($xemngay['gio_hoang_dao_hac_dao']['hac_dao'] as $key => $value) {
                            echo gan_link_gio_hoanghac_dao($value).' ; ';
                          }
                        }?>
                      </p>
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
                        <p>Không phạm bất kỳ ngày 
                          <a href="<?php echo base_url('ngay-nguyet-ky-va-nhung-dieu-chua-biet-ve-mung-05-14-23-A624.html'); ?>">Nguyệt kỵ</a>, 
                          Nguyệt tận, 
                          <a href="<?php echo base_url('ngay-tam-nuong-la-gi-va-nhung-dieu-kieng-ky-ma-ban-can-biet-A621.html'); ?>">Tam nương</a>, 
                          <a href="<?php echo base_url('ngay-duong-cong-ky-nhat-la-gi-va-cach-tinh-ngay-trong-thang-A646.html'); ?>">Dương Công kỵ nhật</a> nào.
                        </p>
                      <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Ngũ Hành</label></td>
                    <td>
                      <?php if (!empty($result_nguhanh_huongdi)): ?>
                        <p>Ngày : <strong class="str_uppercase"><?php echo $result_nguhanh_huongdi['can_ngay'].' '.$result_nguhanh_huongdi['chi_ngay']; ?></strong></p>
                        <p><?php echo str_replace('.', '.<br>', $result_nguhanh_huongdi['content_nguhanh']) ; ?></p>
                      <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Bành Tổ Bách Kị Nhật</label></td>
                    <td>
                      <?php if (!empty($result_tinh_banhtobachkinhat)): ?>
                        <p>- <strong><?php echo $arr_tinhngay_ki['canngay'] ?></strong> : <?php echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['canngay'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])); ?></p>
                        <p>- <strong><?php echo $arr_tinhngay_ki['chingay'] ?></strong> : <?php echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['chingay'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])); ?></p>
                      <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Khổng Minh Lục Diệu</label></td>
                    <td>
                      <?php if (!empty($result_tinh_khongminh)): ?>
                        <?php if (!empty($result_tinh_khongminh['tinh_khongminh'])): ?>
                          <p>Ngày : <strong class="<?php echo $result_tinh_khongminh['tinh_khongminh'][2]['saotot']==1?'color_red':'color_black'; ?>"><?php echo $result_tinh_khongminh['tinh_khongminh'][2]['name'] ?></strong></p>
                          <p>tức <?php echo $result_tinh_khongminh['tinh_khongminh'][2]['content_khongminh'] ?></p>
                          <div>
                            <?php echo $result_tinh_khongminh['tinh_khongminh'][2]['content_tho'] ?>
                          </div>
                        <?php endif ?>
                      <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Nhị Thập Bát Tú <span class="color_red">Sao <?php echo $result_tinhthapnhibattu[1] ?></span></label></td>
                    <td>
                      <p><label>Tên ngày : </label><?php echo ($result_tinhthapnhibattu[2]['title']) ?></p>
                      <p><label class="color_red">Nên làm : </label><?php echo ($result_tinhthapnhibattu[2]['nenlam']) ?></p>
                      <p><label>Kiêng cữ : </label><?php echo ($result_tinhthapnhibattu[2]['kilam']) ?> <?php echo replace_tinhtrucngay($result_tinhthapnhibattu[2]['seo_ki'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                      <p><label>Ngoại lệ : </label><?php echo ($result_tinhthapnhibattu[2]['ngoaile']) ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Thập Nhị Kiến Trừ <span class="color_red"><?php echo $result_tinhtrucngay['ten'] ?></span></label></td>
                    <td>
                      <p><?php echo replace_tinhtrucngay($result_tinhtrucngay['tot'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                      <p><?php echo replace_tinhtrucngay($result_tinhtrucngay['xau'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Ngọc Hạp Thông Thư</label></td>
                    <td>
                      <table style="border:1px solid #ccc" class="table table-hover">
                        <tr style="border:1px solid #ccc">
                          <td style="border:1px solid #ccc;text-align: center;">
                            <strong class="color_red">Sao tốt</strong>
                          </td>
                          <td style="border:1px solid #ccc;text-align: center;">
                            <strong class="color_black">Sao xấu</strong>
                          </td>
                        </tr>
                        <tr style="border:1px solid #ccc">
                          <td style="border:1px solid #ccc">
                            <p><?php echo $result_tinhsaototsaoxau['sao_tot'] ?></p>
                          </td>
                          <td style="border:1px solid #ccc">
                            <p><?php echo $result_tinhsaototsaoxau['sao_xau'] ?></p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Hướng xuất hành</label></td>
                    <td>
                      <p><?php echo $result_nguhanh_huongdi['huongtot'] ?></p>
                      <p><?php echo replace_tinhtrucngay($result_nguhanh_huongdi['seo_ketluan'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                      <p><?php echo $result_nguhanh_huongdi['huongxau'] ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Giờ xuất hành Theo Lý Thuần Phong</label></td>
                    <td>
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
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="field clearfix">
                <div class="dieuhuong2019 clearfix mgt0">
                    <?php $this->load->view('site/import/form_tv_2021'); ?>
                </div>
              </div>
              
              <?php $this->load->view('site/adsen/code2'); ?>
            </div>
          </div>
          
          <!-- link xem ngay dep thang tiep theo  -->
          <?php $thangtiep = ( (int)date('m') == 12 ) ? 1 : (int)date('m') + 1; ?>
          <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-trong-thang-').(int)date('m').'-nam-'.(int)date('Y'); ?>.html"><label>Ngày tốt tháng <?php echo (int)date('m'); ?> năm <?php echo (int)date('Y'); ?></label></a> <br/>
          <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-trong-thang-').$thangtiep.'-nam-'.(int)date('Y'); ?>.html"><label> Ngày tốt tháng <?php echo  $thangtiep; ?> năm <?php echo (int)date('Y'); ?></label></a>
          <!--  end link xem ngay dep thang tiep theo  -->

          <?php
            if (!isset($_GET['component'])){
              ?>
              <div class="ngaytotxau_list ngayketiep">
                <h3 class="h3">Xem các ngày tiếp theo</h3>
                <?php echo $ngayketiep; ?>
              </div>

                <div class="field">
                  <div class="col-md-12">
                    <?php echo $this->my_seolink->get_text_foot(); ?>
                  </div>
                </div>
                <div class="col-md-12">
                    <?php $this->load->view('site/sh_comment/get_by_theme'); ?>
                </div>
              <?php $this->load->view('site/adsen/code3'); ?>
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
              <?php
            } 
          ?>
      </div>
    </div>
</div> 
<script type="text/javascript">
  function send_form() {
      var frm = document.search_xemngay;
      var input_time   = frm.input_time.value;
      var arr = input_time.split('/');
      window.location.href = "<?php echo base_url(); ?>xem-ngay-tot-xau/ngay-"+arr[0]+"-thang-"+arr[1]+"-nam-"+arr[2]+".html";
  }
</script>
