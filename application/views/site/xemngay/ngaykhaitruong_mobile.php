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
<div class="box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <p class="title-mobile-form mar-top-10">Nhập đầy đủ thông tin để có kết quả tốt nhất</p>
    
    <section class="box-form inner_box_red">
        <div class="boxOne">
            <form name="form_dongtho" action="" method="post">
                <div class="row">
                    <div class="col-xs-12">
                        <p><label>Xem theo ngày</label></p>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" name="" value="<?php echo date('j').'/'.date('n').'/'.date('Y') ?>" id="datepicker" />
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="text-right">
                                    <button type="button" class="button" onclick="congcuxemngay('<?php echo base_url($this->uri->segment(1));?>');">Xem</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="boxTwo">
            <form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
                <div class="row">
                    <div class="col-xs-12">
                        <p class=""><label>Xem theo tháng</label></p>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <section class="col-sm-6 col-xs-6">
                                <div class="row">
                                    <div class="col-xs-6">
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
                                    </div>
                                    <div class="col-xs-6">
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
                                    </div>
                                </div>
                            </section>
                            <section class="col-sm-6 col-xs-6">
                                <div class="text-right">
                                    <button type="submit" class="button">Xem</button>
                                </div>
                            </section>
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
            <form name="xemngay_theotuoi_khaitruong" method="post" onsubmit="xemngay_theotuoi_khaitruong_submit();">
                <div class="row">
                    <div class="col-xs-12">
                        <p class=""><label>Xem theo tuổi</label></p>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <section class="col-md-3 col-sm-3 col-xs-3">
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
                            <section class="col-md-3 col-sm-3 col-xs-3">
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
                            <section class="col-md-3 col-sm-3 col-xs-3">
                                <select name="nam_sinh">
                                    <?php foreach (list_age_text() as $key => $value):
                                    $selected = ((int)$value == 1992)?' selected="" ':'';
                                    ?>
                                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </section>
                            <section class="col-md-3 col-sm-3 col-xs-3">
                                <div class="text-right">
                                    <button type="submit" class="button">Xem</button>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <script>
                    function xemngay_theotuoi_khaitruong_submit(){
                        var frm    = document.xemngay_theotuoi_khaitruong;
                        var canchi = frm.nam_sinh.value;
                        var link   = 'xem-ngay-tot-khai-truong-tuoi-' + canchi + '.html';
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

    <div class="field">
        <div class="text-justify box_limit enable_limit">
            <br>
            <?php echo $this->my_seolink->get_text(); ?>
        </div>
        <button class="btn_toogle_limit clearfix" data-click="0" title="Xem thêm">
            <div class="lbl_view">Xem thêm mô tả</div><br>
            <span class="icon_chevron">&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></span>
        </button>
    </div>

    <div class="field">
       <div class="col-md-12">
          <section class="result" id="result">
            <?php if (isset($submit_form)): ?>
            <div class="result_table">
              <table class="table table-hover table-bordered table-responsive table-striped">
                <thead>
                  <tr class="success">
                    <td colspan="2"><p class="text-center"><label>Ngày <?php echo implode( '/', $duonglich ); ?> là ngày <b><?php echo $ngayhientai; ?></b> cho việc <?php echo $name; ?></p></label></td>
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
                            echo gan_link_gio_hoanghac_dao($value).' ; ';
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
                    <td><label>Ngũ Hành</label></td>
                    <td>
                      <?php if (!empty($result_nguhanh_huongdi)): ?>
                        <p>Ngày : <strong class="str_uppercase"><?php echo $result_nguhanh_huongdi['can_ngay'].' '.$result_nguhanh_huongdi['chi_ngay']; ?></strong></p>
                        <p><?php echo str_replace('.', '.<br>', $result_nguhanh_huongdi['content_nguhanh']) ; ?></p>
                      <?php endif ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label><a href="<?php echo base_url('chon-ngay-tot-theo-banh-to-bach-ky-nhat-A1344.html'); ?>" title="">Bành Tổ Bách Kị Nhật</a></label></td>
                    <td>
                      <?php if (!empty($result_tinh_banhtobachkinhat)): ?>
                        <p>- <strong><?php echo $arr_tinhngay_ki['canngay'] ?></strong> : <?php echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['canngay'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])); ?></p>
                        <p>- <strong><?php echo $arr_tinhngay_ki['chingay'] ?></strong> : <?php echo replace_tinh_banhtobachkinhat($result_tinh_banhtobachkinhat['chingay'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])); ?></p>
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
                    <td><label><a href="<?php echo base_url('thap-nhi-kien-tru-la-gi-A1329.html'); ?>">Thập Nhị Kiến Trừ</a> <span class="color_red">(<?php echo add_link_thap_nhi_kien_tru($result_tinhtrucngay['ten']);?>)</span></label></td>
                    <td>
                      <p><?php echo replace_tinhtrucngay($result_tinhtrucngay['tot'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                      <p><?php echo replace_tinhtrucngay($result_tinhtrucngay['xau'],array('thang'=>$arr_tinhngay_ki['thangduong'],'nam'=>$arr_tinhngay_ki['namduong'])) ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label><a href="<?php echo base_url('ngoc-hap-thong-thu-la-gi-A1343.html');?>">Ngọc Hạp Thông Thư</a></label></td>
                    <td>
                      <table style="border:1px solid #ccc" class="table table-hover">
                        <tr style="border:1px solid #ccc">
                          <td style="border:1px solid #ccc">
                            <strong>Sao tốt</strong>
                          </td>
                          <td style="border:1px solid #ccc">
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
            <div class="field clearfix">
              <div class="row">
                <div class="col-md-12">
                    <div class="dieuhuong2019 clearfix mgt0">
                        <?php $this->load->view('site/import/form_tv_2021'); ?>
                    </div>
                </div>
              </div>
            </div>
           <section class="field clearfix list_thang_tot_mb">
                <?php $sup_link = $this->uri->segment(1); ?>
                <?php if (!empty($info_listdatenext)): ?>
                    <?php foreach ($info_listdatenext as $key => $value): ?>
                        <div class="box_item_thang_mb">
                            <div class="box_thang_duong_am_mb clearfix">
                                <div class="box_duong_am box_duong">
                                    <p class="textTop">LỊCH DƯƠNG</p>
                                    <p class="textNumber"><?php echo $value['duonglich'][0] ?></p>
                                    <p class="textMonth">Tháng <?php echo $value['duonglich'][1] ?></p>
                                </div>
                                <div class="box_duong_am box_am">
                                    <p class="textTop">LỊCH ÂM</p>
                                    <p class="textNumber"><?php echo $value['amlich'][0] ?></p>
                                    <p class="textMonth">Tháng <?php echo $value['amlich'][1] ?></p>
                                </div>
                            </div>
                            <div class="box_ngay_detail">
                                <p class="type_ngay" style="text-align: center;">

                                    <?php if (preg_match('/color_black/', $value['ngayhientai'])): ?>
                                        <label class="color_black" >Ngày <?php echo $value['ngayhientai']; ?></label>
                                    <?php else: ?>    
                                        <label>Ngày <?php echo $value['ngayhientai']; ?></label>
                                    <?php endif ?>
                                    

                                </p>
                                <section>
                                    <p><?php echo $value['ngaythu'] ?>, <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>">ngày <?php echo join('/',$value['duonglich']) ?></a> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
                                    <p>Ngày <label class="canchi"><?php echo $value['ngaycanchi'] ?></label>, tháng <label class="canchi"><?php echo $value['thangcanchi'] ?></label>, năm <label class="canchi"><?php echo $value['namcanchi'] ?></label></p>
                                    <p><span class="text_black"><?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?></span></p>
                                    <p class="hourok"><i class="glyphicon glyphicon-time"></i>&nbspGIỜ TỐT TRONG NGÀY :</p>
                                    <p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
                                </section>
                                <p class="boxBtnxem"><a href="<?php echo base_url($sup_link.'/'.'ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>" class="btnXemchitietMb">Xem chi tiết</a></p>
                            </div>
                        </div>
                        <?php if ($value['duonglich'][0] == 15): ?>
                            <?php $this->load->view('site/adsen/code2'); ?>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- <p>Hiển thị các ngày tiếp theo</p> -->
            </section>
          </section>
       </div>
    </div>
    <!-- box tu van phong thuy -->
    <!-- end box tu van phong thuy -->
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
    <div class="field clearfix">
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
            </div>
        </div>
    </div>
</div>