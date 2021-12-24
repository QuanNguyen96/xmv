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
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <?php if (!$_POST): ?>
      <div class="field clearfix">
        <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?></div>
      </div>
    <?php endif ?>
    
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="" action="" method="post">
       <div class="field">
         <div class="col-md-6 col-md-offset-3 col-xm-6 col-sm-offset-3 col-xs-12">
           <input type="text" name="tentrai" value="<?php echo set_value('tentrai'); ?>" placeholder="Nhập tên bạn trai" />
         </div>
       </div>
       <div class="field">
         <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
            <select name="ngaysinhtrai">
                <option value="">Ngày sinh dương</option>
                <?php 
                    for( $i = 1; $i<= 31; $i++ ){
                        
                        echo '<option '.set_select('ngaysinhtrai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thangsinhtrai">
                <option value="">Tháng sinh</option>
                <?php 
                    for( $i = 1; $i<= 12; $i++ ){
                        echo '<option '.set_select('thangsinhtrai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="namsinhtrai">
                <option value="">Năm sinh</option>
                <?php 
                    $nam = isset($_POST['namsinhtrai']) ? $_POST['namsinhtrai'] : 1992; 
                    for( $i = 1950; $i<= 2025; $i++ ){
                        $slt = $nam == $i ? 'selected=""' :'';
                        echo '<option '.$slt.' value="'.$i.'" >'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
       </div>
       <div class="field">
         <div class="col-md-6 col-md-offset-3 col-xm-6 col-sm-offset-3 col-xs-12">
           <input type="text" name="tengai" value="<?php echo set_value('tengai'); ?>" placeholder="Nhập tên bạn gái" />
         </div>
       </div>
       <div class="field">
         <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
            <select name="ngaysinhgai">
                <option value="">Ngày sinh dương</option>
                <?php 
                    for( $i = 1; $i<= 31; $i++ ){
                        echo '<option '.set_select('ngaysinhgai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thangsinhgai">
                <option value="">Tháng sinh</option>
                <?php 
                    for( $i = 1; $i<= 12; $i++ ){
                        echo '<option '.set_select('thangsinhgai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="namsinhgai">
                <option value="">Năm sinh</option>
                <?php 
                    $nam = isset($_POST['namsinhgai']) ? $_POST['namsinhgai'] : 1992;  
                    for( $i = 1950; $i<= 2025; $i++ ){
                        $slt = $nam == $i ? 'selected=""' :'';
                        echo '<option '.$slt.' value="'.$i.'" >'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
       </div>
       <div class="field field_center">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button">Xem kết quả</button>
          </div>
       </div>
    </form>
    <div class="field clearfix">
      <div class="col-md-12">
          <?php if (isset($content)): ?>
              <div class="show_nd">
                <?php echo str_replace($arr_search,$arr_replace, $content); ?>
              </div>
              <div class="field">
                <div class="dieuhuong_tu_vi_2020">
  	            		<a href="<?php echo base_url('xem-tu-vi-nam-2021.html');?>" class="nut_ban_repon">Bói tử vi năm 2021</a>
                    <a href="<?php echo base_url('/xem-boi-tu-vi-2022-cua-12-con-giap.html');?>" class="nut_ban_repon">Xem bói năm 2022 của 12 con giáp</a>
  	            		<a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>" class="nut_ban_repon">Xem bói SĐT</a>
  	            </div>
	            </div> 
              <?php if(isset($dieu_huong_tv_2020_link_nam)): ?>
                <div class="field"> 
                  <div class="notification_tuvi_2020">
                    <ul>
                      <li>
                      <a href="<?php echo $dieu_huong_tv_2020_link_nam; ?>"><?php echo $dieu_huong_tv_2020_text_nam; ?></a>
                      </li>
                      <li>
                      <a href="<?php echo $dieu_huong_tv_2020_link_nu; ?>"><?php echo $dieu_huong_tv_2020_text_nu; ?></a>
                      </li>
                    </ul>
                  </div>
                </div>
               <?php endif; ?>
              <div class="col-md-12">
                <div class="alert alert-success clearfix">
                  <p>Ngoài việc xem bói tình yêu thì quý bạn cũng cần biết tuổi của 2 người có hợp nhau không, nếu xung khắc thì nhiều hay ít và cụ thể ở những điểm nào? Để khám phá điều này, mời quý bạn xem tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>"><b>Xem bói tuổi vợ chồng</b></a></p>
                </div>
                <div class="alert alert-success clearfix">
                  <p>Khi tình yêu của quý bạn đã chín muồi, thì quý bạn cũng nên <a href="<?php echo base_url('xem-tuoi-ket-hon.html'); ?>"> <span class="btn_nhaynhay"></span><b>Xem tuổi kết hôn</b></a> để xác định thời gian tổ chức lễ cưới đẹp nhất cho mình.</p>
                </div>
                <div class="alert alert-success clearfix">
                  <p>Vợ chồng quý bạn có thể hợp - khắc nhau ở nhiều điểm khác nhau. Nhưng chỉ cần <a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>"><span class="btn_nhaynhay"></span><b>Xem tuổi sinh con</b></a> để chọn năm sinh con hợp tuổi bố mẹ thì vợ chồng quý bạn sẽ có được hạnh phúc viên mãn trọn đời.</p>
                </div>
              </div>

              <div class="field">
                <div class="alert alert-success clearfix">
                  <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text_foot()); ?></div>
                </div>
              </div>
              <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
              <div class="box_content">
                <div class="box_content_tt1">
                  Công cụ xem bói hợp tuổi của quý bạn
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                        </div>
                        <div>Bói bài hàng ngày</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-mau-hop-menh.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/mau-hop-menh.jpg'); ?>" alt="">
                        </div>
                        <div>Xem màu hợp mệnh</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/boi-bai-tinh-yeu.jpg'); ?>" alt="">
                        </div>
                        <div>Bói bài tình yêu</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/la-so-tu-vi.jpg'); ?>" alt="">
                        </div>
                        <div>Lá số tử vi</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                        </div>
                        <div>Xem bói ngày sinh</div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6">
                  <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
                    <div class="text-center">
                        <div class="thumbnail">
                          <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                        </div>
                        <div>Tử vi trọn đời</div>
                    </div>
                  </a>
                </div>
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
    <?php if ($_POST): ?>
      <div class="field clearfix">
        <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?></div>
      </div>
    <?php endif ?>
    <div class="field clearfix">
      <?php if ($getComment): ?>
          <?php echo $getComment; ?>
      <?php endif ?>
    </div>
</div>