<?php 
    $html_xemboiSDT      = $this->load->view('site/import/rep_xemboiSDT', '', true);
    $html_ynghiaso       = $this->load->view('site/import/rep_ynghiaso', '', true);
    $html_sohoptuoi      = $this->load->view('site/import/rep_sohoptuoi', '', true);
    $html_sohopmenh      = $this->load->view('site/import/rep_sohopmenh', '', true);
    $arr_search  = array('$rep_xemboiSDT', '$rep_ynghiaso', '$rep_sohoptuoi', '$rep_sohopmenh');
    $arr_replace = array($html_xemboiSDT, $html_ynghiaso, $html_sohoptuoi, $html_sohopmenh);
 ?>
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <?php if (!$_POST): ?>
      <div class="field clearfix">
        <div class="col-md-12">
          <?php 
              echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text());
           ?>
         </div>
      </div>
    <?php endif ?>
    
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="boiBienSoXe" action="/xem-boi-bien-so-xe.html" method="post">
        <div class="field">
          <?php if (isset($errors)): ?>
            <?php echo $errors; ?>
          <?php endif ?>
        </div>
       <div class="field">
         <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
             <select name="namsinh" required="">
                <option value="">Năm sinh</option>
                <?php 
                    $ns = isset($_POST['namsinh']) ? $_POST['namsinh'] : 1992;
                    for( $i = 1950; $i<= 2025; $i++ ){
                        $slt = $ns == $i ? 'selected=""' : ''; 
                        echo '<option value="'.$i.'" '.$slt .' >'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6">
             <input required="" type="text" name="tenxe" value="<?php echo set_value('tenxe'); ?>" placeholder="Tên xe" />
         </div>
       </div>
       <div class="field">
         <div class="col-md-2 col-md-offset-3 col-sm-4 col-xs-4">
             <input required="" type="text" name="bienso" value="<?php echo set_value('bienso'); ?>" placeholder="Biển số" />
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <input required="" type="text" name="somay" value="<?php echo set_value('somay'); ?>" placeholder="Số máy" />
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <input required="" type="text" name="sokhung" value="<?php echo set_value('sokhung'); ?>" placeholder="Số khung" />
         </div>
       </div>
       <div class="field">
         <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
            <select required="" class="display" name="id_mausacxe" size="1">
               <option value="1" <?php echo set_select('id_mausacxe', 1); ?>>Xanh lục, xanh rêu, xanh lá</option>
               <option value="2" <?php echo set_select('id_mausacxe', 2); ?>>Đỏ, cam, hồng, tím, mận chín, màu đồng</option>
               <option value="3" <?php echo set_select('id_mausacxe', 3); ?>>Vàng, be, nâu</option>
               <option value="4" <?php echo set_select('id_mausacxe', 4); ?>>Trắng, xám, bạc, ghi</option>
               <option value="5" <?php echo set_select('id_mausacxe', 5); ?>>Xanh biển, xanh lam, đen</option>
            </select>
         </div>
       </div>
       <div class="field field_center">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button" name="check">Xem kết quả</button>
          </div>
       </div>
    </form>
    <div class="field clearfix">
      <div class="col-md-12">
        <?php if (isset($content) and !isset($errors)): ?>
            <div class="show_nd">
              <?php echo $content['noidung']; ?>
              
            </div>
            <!-- form nhập mã -->
          <div class="form-shownd clearfix hidden" style="background-color: #f7e6ec;">
                  <form action="" method="POST">
                    <br>
                      <div class="text-center">
                          <i>Vui lòng Soạn tin nhắn theo cú pháp <b>DK PT1</b> gửi <b>5657</b> <i>(3000đ/sms)</i> để lấy <b>Mã xác nhận</b> ,Sau khi nhập <b>Mã</b>, quý bạn sẽ nhận được kết quả chi tiết.</i>
                      </div>
                      <br>
                      <div class="col-md-3">
                          <label>Mã xác nhận:</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="code" maxlength="50" name="code" value="" placeholder="Nhập mã xác nhận tại đây..." required="">
                      </div>
                      <div class="col-md-3 text-center">
                          <button class="shownoidung">Nhận kết quả</button>
                      </div>
                  </form>
              </div>
          <!-- end form nhập mã -->
        <?php endif ?>
      </div>
    </div>
    <?php if ($_POST and !isset($errors)): ?>
      <div class="alert alert-success" style="clear: both;">
        <p>
          - Khi sở hữu một chiếc xe mới thì tất cả chúng ta đều mong cầu chiếc xe sẽ đem tới tài lộc, may mắn và thành công cho mình. Thế nên, ngoài việc xem bói biển số xe hợp phong thủy với mình thì quý bạn cần phải:
        </p>
        <p>
          <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-ngay-tot-mua-xe.html'); ?>"><b>Xem ngày mua xe hợp tuổi</b></a> để chọn ngày tốt mua xe hợp nhất, đẹp nhất với tuổi của mình.
        </p>
        <?php   
                $arr_menh = array(
                    '1960' => 'tho',
                    '1961' => 'tho',
                    '1968' => 'tho',
                    '1969' => 'tho',
                    '1976' => 'tho',
                    '1977' => 'tho',
                    '1990' => 'tho',
                    '1991' => 'tho',
                    '1998' => 'tho',
                    '1999' => 'tho',
                    '2006' => 'tho',
                    '2007' => 'tho',
                    '1956' => 'hoa',
                    '1957' => 'hoa',
                    '1964' => 'hoa',
                    '1965' => 'hoa',
                    '1978' => 'hoa',
                    '1979' => 'hoa',
                    '1986' => 'hoa',
                    '1987' => 'hoa',
                    '1994' => 'hoa',
                    '1995' => 'hoa',
                    '2008' => 'hoa',
                    '2009' => 'hoa',
                    '2016' => 'hoa',
                    '2017' => 'hoa',
                    '1954' => 'kim',
                    '1955' => 'kim',
                    '1962' => 'kim',
                    '1963' => 'kim',
                    '1970' => 'kim',
                    '1971' => 'kim',
                    '1984' => 'kim',
                    '1985' => 'kim',
                    '1992' => 'kim',
                    '1993' => 'kim',
                    '2000' => 'kim',
                    '2001' => 'kim',
                    '2014' => 'kim',
                    '2015' => 'kim',
                    '1950' => 'moc',
                    '1951' => 'moc',
                    '1958' => 'moc',
                    '1959' => 'moc',
                    '1972' => 'moc',
                    '1973' => 'moc',
                    '1980' => 'moc',
                    '1981' => 'moc',
                    '1988' => 'moc',
                    '1989' => 'moc',
                    '2002' => 'moc',
                    '2003' => 'moc',
                    '2010' => 'moc',
                    '2011' => 'moc',
                    '2018' => 'moc',
                    '2019' => 'moc',
                    '1952' => 'thuy',
                    '1953' => 'thuy',
                    '1966' => 'thuy',
                    '1967' => 'thuy',
                    '1974' => 'thuy',
                    '1975' => 'thuy',
                    '1982' => 'thuy',
                    '1983' => 'thuy',
                    '1996' => 'thuy',
                    '1997' => 'thuy',
                    '2004' => 'thuy',
                    '2005' => 'thuy',
                    '2012' => 'thuy',
                    '2013' => 'thuy',
                    
                );
                $arr_menh_text = array(
                  'kim' => 'Kim',
                  'moc' => 'Mộc',
                  'thuy' => 'Thủy',
                  'hoa' => 'Hỏa',
                  'tho' => 'Thổ',
                );
                $menh_slug = isset($arr_menh[$namsinh])?$arr_menh[$namsinh]:1994;
                $menh_text = $arr_menh_text[$menh_slug];
        ?>
        <p>
          <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('/xem-mau-hop-menh/menh-'.$menh_slug.'-hop-mau-gi.html'); ?>"><b>Mệnh <?php echo $menh_text; ?> hợp màu gì</b></a> màu sắc hợp mệnh luôn đóng vai trò vô cùng quan trọng trong phong thủy cải vận của con người.
        </p>
      </div>
      <?php $this->load->view('site/xemboi/cclq_xem_boi_bien_so_xe');?> 
      <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
      <div class="clearfix">
        <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
      </div>
      <div class="box_content clearfix">
                <div class="box_content_tt1">
                  Công cụ xem bói hợp tuổi của quý bạn
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                        </div>
                        <div>Xem bói ngày sinh</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-vo-chong.jpg'); ?>" alt="">
                        </div>
                        <div>Xem tuổi vợ chồng</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                        </div>
                        <div>Xem tử vi trọn đời</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/la-so-tu-vi.jpg'); ?>" alt="">
                        </div>
                        <div>Lá số tử vi</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-sinh-con.jpg'); ?>" alt="">
                        </div>
                        <div>Xem tuổi sinh con</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-huong-nha-tot-xau.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/huong-nha-hop-tuoi.jpg'); ?>" alt="">
                        </div>
                        <div>Xem hướng nhà tốt xấu</div>
                    </div>
                  </a>
                </div>
              </div>
    <?php endif ?>
    
 </div>
 <?php if ($_POST): ?>
  <div class="field clearfix">
    <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?></div>
  </div>
  <?php endif ?>
  <div class="field clearfix">
    <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text_foot()); ?></div>
  </div>
 <div class="box_content">
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
    </div>
 </div>