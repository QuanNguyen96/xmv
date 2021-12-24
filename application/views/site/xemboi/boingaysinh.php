<?php
if( !isset($ngay) )  $ngay  = 9;
if( !isset($thang) ) $thang = 4;
if( !isset($nam) )   $nam   = 1990;
?>

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
        <div class="col-md-12">
            <?php $text =  $this->my_seolink->get_text();
                echo str_replace($arr_search,$arr_replace, $text);
             ?>
        </div>
      </div>
    <?php endif ?>
    
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="xemBoiNgaySinh" action="/xem-boi-ngay-sinh.html" method="post">
       <div class="field">
         <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
            <select name="ngay" class="myinput">
                <?php 
                    for( $i = 1; $i<= 31; $i++ ){
                        $slt = $ngay == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thang" class="myinput">
                <?php 
                    for( $i = 1; $i<= 12; $i++ ){
                        $slt = $thang == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="nam" class="myinput">
                <?php 
                    for( $i = 1950; $i<= 2025; $i++ ){
                        $slt = $nam == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
       </div>
       <div class="field field_center">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit">Xem kết quả</button>
          </div>
       </div>
    </form>
    
 </div>
 <div class="box_content">
 <div class="col-md-12 col-sm-12 col-xs-12 box_xvm">
 <?php if( isset($luan) && !empty($luan)): ?>
          <div class="boingaysinh"> 
            <div class="text-center">
              <h3>Thông tin về bạn</h3>
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
            <div class="show_nd">
                <table>
                 <tbody>
                     <tr>
                        <th>Ngày sinh</th>
                        <td><?php echo $ngay.' tháng '.$thang.' năm '.$nam;?></td>
                     </tr>
                     <tr>
                        <th>Cung</th>
                        <td><?php echo $luan['cung'];?></td>
                     </tr>
                     <tr>
                        <th>Số hên</th>
                        <td><?php echo $luan['sohen'];?></td>
                     </tr>
                     <tr>
                        <th>Nguyên tố</th>
                        <td><?php echo $luan['nguyento'];?></td>
                     </tr>
                     <tr>
                        <th>Phẩm chất</th>
                        <td><?php echo $luan['phamchat'];?></td>
                     </tr>
                     <tr>
                        <th>Tính chất</th>
                        <td><?php echo $luan['tinhchat'];?></td>
                     </tr>
                     <tr>
                        <th>Tính cách điển hình</th>
                        <td><?php echo $luan['tinhcachdienhinh'];?></td>
                     </tr>
                     <tr>
                        <th>Bất lợi</th>
                        <td><?php echo $luan['batloi'];?></td>
                     </tr>
                 </tbody>
              </table>
              <ul>
                <li>
                   <h4>Tính cách:</h4>
                   <div><?php echo $luan['tinhcach'];?></div>
                </li>
                <li>
                   <h4>Tình yêu:</h4>
                   <div><?php echo $luan['tinhyeu'];?></div>
                </li>
                <li>
                   <h4>Sức khỏe:</h4>
                   <div><?php echo $luan['suckhoe'];?></div>
                </li>
                <li>
                   <h4>Gia đình:</h4>
                   <div><?php echo $luan['giadinh'];?></div>
                </li>
                <li>
                   <h4>Sự nghiệp:</h4>
                   <div><?php echo $luan['sunghiep'];?></div>
                </li>
                <li>
                   <h4>Tổng quát:</h4>
                   <div><?php echo $luan['tongquat'];?></div>
                </li>
              </ul>
            </div>
          </div> 
          <div class="field">
            <div class="showInternalLink">
            	<section class="cpnInternalLink">
                <a href="<?php echo base_url('xem-tu-vi-nam-2021.html');?>" class="cst">Xem bói năm 2021</a>
            		<a href="<?php echo base_url('/xem-boi-tu-vi-2022-cua-12-con-giap.html');?>" class="cst">Xem bói năm 2022</a>
            		<a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>" class="cst">Xem bói sim</a>
            	</section>
              <?php //echo show_internal_link(3); ?>
            </div>
          </div>
          <div class="field">
            <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace,  $this->my_seolink->get_text_foot()); ?></div>
          </div>
          
          <div class="field">
            
            <!-- <?php if (!empty($oneAge_nam)): ?>
              <p><span class="btn_nhaynhay"></span><a href="<?php echo base_url($oneAge_nam['slug'].'-A'.$oneAge_nam['id'].'.html'); ?>">Xem tử vi tuổi <?php echo $info_user['namcanchi'] ?> năm 2018 nam mạng</a></p>
            <?php endif ?>
            <?php if (!empty($oneAge_nu)): ?>
              <p><span class="btn_nhaynhay"></span><a href="<?php echo base_url($oneAge_nu['slug'].'-A'.$oneAge_nu['id'].'.html'); ?>">Xem tử vi tuổi <?php echo $info_user['namcanchi'] ?> năm 2018 nữ mạng</a></p>
            <?php endif ?> -->
          </div>
          <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
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
          <div class="box_content">
            <div class="box_content_tt1">
              Công cụ xem bói hợp tuổi quý bạn
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>">
                <div class="text-center">
                      <div class="thumbnail">
                        <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-tinh-yeu.jpg'); ?>" alt="">
                      </div>
                      <div><p>Xem bói tình yêu</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem tử vi trọn đời</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-vo-chong.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem tuổi vợ chồng</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ten.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem bói theo tên</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-tuoi-ket-hon.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-ket-hon.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem tuổi kết hôn</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-sinh-con.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem tuổi sinh con</p></div>
                </div>
              </a>
            </div>
          </div>
         <?php endif;?>
          <?php if ($_POST): ?>
            <div class="field clearfix">
              <div class="col-md-12">
                  <?php 
                      echo str_replace($arr_search,$arr_replace,  $this->my_seolink->get_text());
                   ?>
              </div>
            </div>
          <?php endif ?>
          <div class="field clearfix">
            <div class="col-md-12">
              <?php if ($getComment): ?>
                  <?php echo $getComment; ?>
              <?php endif ?>
            </div>
          </div> 
    </div>     
 </div>
<!--  <script>
    $(document).ready(function(){
      $('.shownoidung').on('click',function(){
          var code = $('.code').val();
          var date_created = '<?php echo strtotime(date('j-n-Y')) ?>';
          var url = window.location.href;
          if (code == '') {
              alert('Quý vị vui lòng nhập mã xác nhận!');
          }else{
              $.ajax({
                  url: '<?php echo base_url(); ?>' + 'ajax-check-code',
                  type:'POST',
                  dataType: 'json',
                  data:{
                    code: code,date:date_created,url:url,
                  },
                  success:function(response){
                    if (response.check == true) {
                      $('.show_nd').removeClass('hidden');
                      $('.form-shownd').hide();
                    }else{
                        alert(response.mes);
                    }
                  }
            });
        }
        return false;
      });
    });
</script> -->
