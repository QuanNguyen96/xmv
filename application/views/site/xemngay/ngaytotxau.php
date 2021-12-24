
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
  } );
  </script>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="" action="" method="post">
       <div class="field">
         <div class="col-md-4 col-md-offset-4 col-xm-4 col-sm-offset-4 col-xs-12">
           <input type="text" name="" value="<?php echo $xemngay['duonglich'][0].'/'.$xemngay['duonglich'][1].'/'.$xemngay['duonglich'][2] ?>" id="datepicker" />
         </div>
       </div>
       <div class="field field_center">

          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="button" class="button" onclick="congcuxemngay('<?php echo base_url($this->uri->uri_string());?>');">Xem kết quả</button>
          </div>
       </div>
    </form>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field">
       <div class="col-md-12">
                <div class="ngayhientai">
                 Ngày <?php echo implode( '/', $xemngay['duonglich'] ); ?> là ngày <b><?php echo $ngayhientai; ?></b> cho việc <?php echo $name; ?>
                </div>
                <div class="ngaytotxau_list">
                 <p class="ngaytotxau_list_p">Thông tin chung</p>
                 <div>
                     <ul class="ul clearfix">
                        <li><?php echo $xemngay['ngaythu']; ?> ngày: <?php echo implode( '/', $xemngay['duonglich'] ); ?> (<i>dương lịch</i>) - <?php echo implode( '/', $xemngay['amlich'] ); ?> (<i>âm lịch</i>)
                            <b>Ngày:</b> <?php echo $xemngay['ngaycanchi'];?>, tháng <?php echo $xemngay['thangcanchi'];?>, năm <?php echo $xemngay['namcanchi'];?>
                        </li>
                
                        <li><b>Ngày:</b> <?php echo $xemngay['ngay_hoang_dao'][0];?> [<?php echo $xemngay['ngay_hoang_dao'][1]; ?>] </li>
                
                        <li><b>Tuổi xung khắc ngày:</b> <?php echo $xemngay['tuoi_xung_ngay']; ?></li>
                
                        <li><b>Giờ tốt trong ngày:</b>
                
                            <?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] ) ){
                
                                   echo implode( ' ; ', $xemngay['gio_hoang_dao_hac_dao']['hoang_dao'] );
                
                            } ?>
                
                        </li>
                
                        <li><b>Giờ xấu trong ngày:</b>
                
                            <?php if( !empty( $xemngay['gio_hoang_dao_hac_dao']['hac_dao'] ) ){
                
                                   echo implode( ' ; ', $xemngay['gio_hoang_dao_hac_dao']['hac_dao'] );
                
                            } ?>
                
                        </li>
                
                        <li><b>Hướng tốt:</b>
                
                            <?php echo $xemngay['huong_hy_than'];?>; <?php echo $xemngay['huong_tai_than'];?>
                
                        </li>
                
                        <li><b>Hướng xấu:</b>
                
                            <?php echo $xemngay['huong_hac_than'];?>
                
                        </li>
                
                     </ul>
                
                 </div>
                
                </div>
                
                
                
                <div class="ngaytotxau_list">
                
                 <h3><?php echo $name. ' theo Trực' ?></h3>
                
                 <p class="ngaytotxau_list_p"> <span><?php echo $xemngay['trucngay']['ten'];?></span></p>
                
                 <div>
                
                    <ul>
                
                       <li><b>Việc nên làm:</b> <?php echo $xemngay['trucngay']['tot']; ?></li>
                
                       <li><b>Việc không nên làm:</b> <?php echo $xemngay['trucngay']['xau']; ?></li>
                
                    </ul>
                
                 </div>
                
                </div>
                
                
                
                <div class="ngaytotxau_list">
                
                 <h3><?php echo $name. ' theo Nhị thập bát tú' ?></h3>
                
                 <p class="ngaytotxau_list_p"> <span><?php echo $xemngay['thapnhibattu']['ten']; ?></span></p>
                
                 <div>
                
                     <ul>
                
                        <li><b><?php echo $xemngay['thapnhibattu']['ghichu']; ?></b></li>
                
                        <li><b>Việc nên làm:</b> <?php echo $xemngay['thapnhibattu']['nen']; ?></li>
                
                        <li><b>Việc không nên làm: </b> <?php echo $xemngay['thapnhibattu']['kieng']; ?></li>
                
                        <li><b>Ngoại lệ: </b><?php echo $xemngay['thapnhibattu']['ngoaile']; ?></li>
                
                     </ul>
                
                 </div>
                
                </div>
       </div>
    </div>
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
                  <p><label>Ngày tốt trong tháng 3 năm 2017</label></p>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <section class="clearfix">
                    <div class="boxLichduong_left">
                      <p class="title_lichduong">Lịch dương</p>
                      <p class="title_date"><label>28</label></p>
                      <p class="title_month">Tháng 3</p>
                    </div>
                    <div class="boxLichduong_right">
                      <p class="title_licham">Lịch âm</p>
                      <p class="title_date"><label>28</label></p>
                      <p class="title_month">Tháng 3</p>
                    </div>
                    <div class="boxLichduong_bottom">
                      <p>Ngày dưới trung bình</p>
                    </div>
                  </section>
                </td>
                <td>
                  <section class="boxRightListDay">
                    <p><span class="text_red">Thứ 4, ngày 3/7/2017</span> nhằm ngày <span class="text_black">4/3/2017 Âm lịch</span></p>
                    <p>Ngay dinh dau, thang dinh hoi, nam giap dan</p>
                    <p>Ngày <span class="text_black">nguyen vu hac dao truc thu</span></p>
                    <p>Giờ tốt trong ngày</p>
                    <p><span class="text_black">Dưới trung bình</span> Phần nhiều phần tốt</p>
                    <p><a href="" class="bg_red">Xem chi tiết</a></p>
                  </section>
                </td>
              </tr>
            </tbody>
          </table>
        </article>
      </section>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

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
 