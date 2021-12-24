<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="form_xem_tuoi_sinh_con" action="" method="post" onsubmit="send_form_xem_tuoi_sinh_con();">
       <div class="field">
        <div class="col-md-2">
          <label>Ngày sinh bố</label>
        </div>
        <div class="col-md-3 col-xs-4">
            <select name="ngaysinh_cha">
                <option value="">Ngày sinh cha</option>
                <?php
                  for($i=1 ; $i <= 31 ; $i++){
                      $selectd = $send_input_ngaysinh_cha == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                  }
                ?>
            </select>
        </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thangsinh_cha">
                <option value="">Tháng sinh</option>
                <?php
                  for($i=1 ; $i <= 12 ; $i++){
                      $selectd = $send_input_thangsinh_cha == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                  }
                ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="namsinh_cha" id="namsinh_cha">
                <?php foreach (list_age_text() as $key => $value): ?>
                  <option value="<?php echo $key; ?>" <?php if ($value == 1990): ?>
                    <?php echo 'selected=""'; ?>
                  <?php endif ?> <?php echo set_select('namsinh_cha',$key); ?>><?php echo $value; ?></option>
                <?php endforeach ?>
             </select>
         </div>
       </div>
       <div class="field">
        <div class="col-md-2">
          <label>Ngày sinh mẹ</label>
        </div>
         <div class="col-md-3 col-xs-4">
            <select name="ngaysinh_me">
                <option value="">Ngày sinh mẹ</option>
                <?php
                  for($i=1 ; $i <= 31 ; $i++){
                      $selectd = $send_input_ngaysinh_me == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                  }
                ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thangsinh_me">
                <option value="">Tháng sinh</option>
                <?php
                  for($i=1 ; $i <= 12 ; $i++){
                      $selectd = $send_input_thangsinh_me == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                  }
                ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="namsinh_me" id="namsinh_me">
                <?php foreach (list_age_text() as $key => $value): ?>
                  <option value="<?php echo $key; ?>" <?php if ($value == 1992): ?>
                    <?php echo 'selected=""'; ?>
                  <?php endif ?> <?php echo set_select('namsinh_me',$key); ?>><?php echo $value; ?></option>
                <?php endforeach ?>
             </select>
         </div>
       </div>
       <div class="field">
            <div class="col-md-2">
              <label>Ngày sinh con</label>
            </div>
            <div class="col-md-3 col-xs-4">
            <select name="ngaysinh_con">
                <option value="">Ngày sinh con :</option>
                <?php
                  for($i=1 ; $i <= 31 ; $i++){
                      $selectd = $send_input_ngaysinh_con == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                  }
                ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thangsinh_con">
                <option value="">Tháng sinh</option>
                <?php
                  for($i=1 ; $i <= 12 ; $i++){
                      $selectd = $send_input_thangsinh_con == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                  }
                ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="namsinh_con" required="">
                <?php
                  for($i=2015 ; $i <= 2025 ; $i++){
                      $selectd = date('Y') == $i ? 'selected=""' : '';
                      echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
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
    <script type="text/javascript">
        function send_form_xem_tuoi_sinh_con() {
            var frm = document.form_xem_tuoi_sinh_con;
            var canchi_chong = frm.namsinh_cha.value;
            var namsinh_chong   = $('#namsinh_cha option:selected').text();
            var canchi_vo = frm.namsinh_me.value;
            var namsinh_vo   = $('#namsinh_me option:selected').text();
            var url = "<?php echo base_url('xem-tuoi-sinh-con/chong-tuoi-"+canchi_chong+"-"+namsinh_chong+"-vo-tuoi-"+canchi_vo+"-"+namsinh_vo+"-sinh-con-nam-nao-tot');?>.html";
            document.form_xem_tuoi_sinh_con.action  = url;
        }
    </script>
    
<?php if ($submit == 1): ?>
  

<div class="field boxTool_new" id="font16">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><label>Thông tin tuổi cha, mẹ và con :</label><br></div>
        <div class="panel-body">
          <div id="result">
              <div class="row">
                <div class="col-md-4">
                  <div class="boxImageOne">
                        <img src="<?php echo public_url('images/icon/sinh-con.jpg'); ?>">
                    </div>
                </div>
                <div class="col-md-8">
                  <table class="table table-responsive table-hover table-bordered table_cuatui">
                   <thead>
                      
                   </thead>
                   <tbody>
                      <tr>
                         <th style="width:10%"></th>
                         <th style="width:30%">Tuổi Cha </th>
                         <th style="width:30%">Tuổi Mẹ </th>
                         <th style="width:30%">Tuổi Con </th>
                      </tr>
                      <tr>
                        <td class="rhead"><label>Dương lịch</label></td>
                        <td>
                          <p><?php echo $send_input_ngaysinh_cha ?>/<?php echo $send_input_thangsinh_cha ?>/<?php echo $send_input_namsinh_cha ?></p>
                        </td>
                        <td>
                          <p><?php echo $send_input_ngaysinh_me ?>/<?php echo $send_input_thangsinh_me ?>/<?php echo $send_input_namsinh_me ?></p>
                        </td>
                        <td>
                          <p><?php echo $send_input_ngaysinh_con ?>/<?php echo $send_input_thangsinh_con ?>/<?php echo $send_input_namsinh_con ?></p>
                        </td>
                      </tr>
                      <tr>
                         <td rowspan="2" class="rhead"><label>Âm lịch</label></td>
                         <td><p><?php echo $sinh_am_lich_cha[0] ?>/<?php echo $sinh_am_lich_cha[1] ?>/<?php echo $sinh_am_lich_cha[2] ?></p></td>
                         <td><p><?php echo $sinh_am_lich_me[0] ?>/<?php echo $sinh_am_lich_me[1] ?>/<?php echo $sinh_am_lich_me[2] ?></p></td>
                         <td><p><?php echo $sinh_am_lich_con[0] ?>/<?php echo $sinh_am_lich_con[1] ?>/<?php echo $sinh_am_lich_con[2] ?></p></td>
                      </tr>
                      <tr>
                        <td>
                          <p>Ngày <?php echo get_chi_replace($canchi_ngay_show_cha); ?> tháng <?php echo get_chi_replace($canchi_thang_show_cha); ?>, năm <?php echo get_chi_replace($canchi_nam_show_cha); ?></p>
                        </td>
                        <td>
                          <p>Ngày <?php echo get_chi_replace($canchi_ngay_show_me); ?> tháng <?php echo get_chi_replace($canchi_thang_show_me); ?>, năm <?php echo get_chi_replace($canchi_nam_show_me); ?></p>
                        </td>
                        <td>
                          <p>Ngày <?php echo get_chi_replace($canchi_ngay_show_con); ?> tháng <?php echo get_chi_replace($canchi_thang_show_con); ?>, năm <?php echo get_chi_replace($canchi_nam_show_con); ?></p>
                        </td>
                      </tr>
                      <tr>
                         <td class="rhead"><label>Mệnh</label></td>
                         <td><p><?php echo $menh_sinh_cha['nghiahan'].' '.$menh_sinh_cha['he']; ?> (<?php echo $menh_sinh_cha['lucthap_giai'] ?>)</p></td>
                         <td><p><?php echo $menh_sinh_me['nghiahan'].' '.$menh_sinh_me['he']; ?> (<?php echo $menh_sinh_me['lucthap_giai'] ?>)</p></td>
                         <td><p><?php echo $menh_sinh_con['nghiahan'].' '.$menh_sinh_con['he']; ?> (<?php echo $menh_sinh_con['lucthap_giai'] ?>)</p></td>
                      </tr>
                   </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading"><label><h2 class="h3 boidam">Chi tiết về mệnh cha, mẹ và con:</h2></label><br></div>
        <div class="panel-body">
          <div id="result">
              <div class="rows">
                <section class="alert alert-info">
                  <p class="h3 text-center boidam">1. Ngũ hành sinh khắc</p>
                  <div class="luangiai">
                    <p>
                      Là yếu tố đầu tiên và quan trọng hơn cả khi lựa chọn năm sinh con. Tốt nhất là Ngũ hành cha và mẹ tương sinh, bình hòa là không tương sinh và không tương khắc với con
                    </p>
                      <p>Mệnh của cha là <?php echo $menh_sinh_cha['he'] ?>, mẹ là <?php echo $menh_sinh_me['he'] ?>, con là <?php echo $menh_sinh_con['he'] ?></p>
                      <p>Như vậy:</p>
                      <p>
                        Ngũ hành của cha là <?php echo $menh_sinh_cha['he'] ?> <?php echo $show_luan_nguhanh_chong_con; ?> với <?php echo $menh_sinh_con['he'] ?> của con, 

                        <span><?php echo get_str_point_thiendia($show_point_nguhanh_chong_con); ?></span>
                      </p>
                      <p>Ngũ hành của mẹ là <?php echo $menh_sinh_me['he'] ?> <?php echo $show_luan_nguhanh_vo_con; ?> với <?php echo $menh_sinh_con['he'] ?> của con, <span><?php echo get_str_point_thiendia($show_point_nguhanh_vo_con); ?></span></p>
                      <?php
                        $total_nguhanh = $show_point_nguhanh_chong_con+$show_point_nguhanh_vo_con;
                      ?>
                      <p>Đánh giá điểm ngũ hành: <?php echo $total_nguhanh;?> /20 (tối đa 8/20)</p>
                  </div>
                </section>
               </div>
              <div class="rows">
                <section class="alert alert-success">
                  <p class="h3 text-center boidam">2. Thiên can xung hợp</p>
                  <div class="luangiai">
                    <p>Thiên can được đánh số theo chu kỳ 10 năm. Trong Thiên can có 4 cặp tương xung (xấu) và 5 cặp tương hóa (tốt). Thiên can của cha mẹ tương hóa với con là tốt nhất, bình hòa là không tương hóa và không tương xung với con.</p>
                      <p>Thiên can của cha là <?php echo $can_nam_show_cha; ?>, mẹ là <?php echo $can_nam_show_me; ?>, con là <?php echo $can_nam_show_con; ?></p>
                      <p>Như vậy:</p>
                      <p>Thiên can của cha là <?php echo $can_nam_show_cha; ?> <?php echo $show_luan_thiencan_cha_con; ?> với <?php echo $can_nam_show_con; ?> của con, <?php echo get_str_point($show_point_thiencan_chong_con); ?></p>
                      <p>Thiên can của mẹ là <?php echo $can_nam_show_me; ?> <?php echo $show_luan_thiencan_me_con; ?> với <?php echo $can_nam_show_con; ?> của con, <?php echo get_str_point($show_point_thiencan_me_con); ?></p>
                      <?php
                        $total_thiencan = $show_point_thiencan_chong_con+$show_point_thiencan_me_con;
                      ?>
                      <p>Đánh giá điểm thiên can: <?php echo $total_thiencan;?>/20 (tối đa 6/20)</p>
                  </div>
                </section>
              </div>
              <div class="rows">
                <section class="alert alert-warning">
                  <p class="h3 text-center boidam">3. Địa chi xung hợp</p>
                  <div class="luangiai">
                    <p>Địa chi được đánh số theo chu kỳ 12 năm, tương ứng 12 con Giáp cho các năm. Hợp xung của Địa chi bao gồm Tương hình (trong 12 Địa chi có 8 Địa chi nằm trong 3 loại chống đối nhau), Lục xung (6 cặp tương xung), Lục hại (6 cặp tương hại), Tứ hành xung, Lục hợp, Tam hợp. Địa chi của cha mẹ tương hợp với con là tốt nhất, bình hòa là không tương hợp và không tương xung với con.</p>
                    <div>
                      <p>Địa chi của cha là <?php echo $chi_nam_show_cha; ?>, mẹ là <?php echo $chi_nam_show_me; ?>, con là <?php echo $chi_nam_show_con; ?></p>
                      <p>Như vậy:</p>
                      <p>Địa chi của cha là <?php echo $chi_nam_show_cha; ?> <?php echo $show_luan_diachi_cha_con; ?> với <?php echo $chi_nam_show_con; ?> của con, <?php echo get_str_point($show_point_diachi_chong_con); ?></p>
                      <p>Địa chi của mẹ là <?php echo $chi_nam_show_me; ?> <?php echo $show_luan_diachi_me_con; ?> với <?php echo $chi_nam_show_con; ?> của con, <?php echo get_str_point($show_point_diachi_me_con); ?></p>
                      <?php
                        $total_diachi = $show_point_diachi_chong_con+$show_point_diachi_me_con;
                      ?>
                      <p>Đánh giá điểm địa chi: <?php echo $total_diachi;?>/20 (tối đa 6/20)</p>
                    </div>
                  </div>
                </section>
              </div>
              <div class="rows">
                <section class="alert alert-success" style="font-weight: bold;">
                  <p class="h3 text-center boidam">4. Tổng điểm <?php echo $total_nguhanh+$total_thiencan+$total_diachi;?> /20</p>
                  <div class="luangiai">
                    <p>Tổng điểm trên 16 là rất tốt để chọn tuổi sinh con năm <?php echo $send_input_namsinh_con;?></p>
                    <p>Tổng điểm từ 13 đến 16 là khá tốt.</p>
                    <p>Tổng điểm từ 10 đến 12 là bình hòa.</p>
                  </div>
                </section>
              </div>
          </div>
        </div>
      </div>  
      <div class="alert alert-info">
        <?php
          $slug_cha = $this->vnkey->format_key($canchi_nam_show_cha);
          $slug_me  = $this->vnkey->format_key($canchi_nam_show_me);
        ?>
        <ul>
          <li>
            Với bố tuổi <?php echo get_chi_replace($canchi_nam_show_cha); ?> và mẹ tuổi <?php echo get_chi_replace($canchi_nam_show_me); ?> quý bạn nên xem tuổi vợ chồng có hợp nhau không tại <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-'.$send_input_namsinh_cha.'-va-tuoi-vo-'.$send_input_namsinh_me.'.html'); ?>">Xem chồng tuổi <?php echo get_chi_replace($canchi_nam_show_cha); ?> vợ tuổi <?php echo get_chi_replace($canchi_nam_show_me); ?></a>
          </li>
          <li>
            Với bố tuổi <?php echo get_chi_replace($canchi_nam_show_cha); ?> quý bạn nên chọn tuổi hợp làm ăn để công việc kinh doanh được thuận lợi tại <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slug_cha.'-sinh-nam-'.$send_input_namsinh_cha.'-hop-lam-an-voi-tuoi-nao.html'); ?>">Xem tuổi làm ăn hợp với <?php echo get_chi_replace($canchi_nam_show_cha); ?></a>
          </li>
          <li>
            Với mẹ tuổi <?php echo get_chi_replace($canchi_nam_show_me); ?> quý bạn nên chọn tuổi hợp làm ăn để công việc kinh doanh được thuận lợi tại <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slug_me.'-sinh-nam-'.$send_input_namsinh_me.'-hop-lam-an-voi-tuoi-nao.html'); ?>">Xem tuổi làm ăn hợp với <?php echo get_chi_replace($canchi_nam_show_cha); ?></a>?
          </li>
        </ul>
      </div>  
  </div>
</div>
<?php
  $canchi = get_chi_replace($canchi_nam_show_cha);
  $slugcanchi = $this->vnkey->format_key($canchi_nam_show_cha); 
  $namsinh  = $send_input_namsinh_cha;
?>
<div class="field" id="font16">
  <div class="row">
    <div class="col-md-12">
      <p class="title_h2">Xem theo mục đích công việc khác</p>
      <div class="nenxanh">
        <form name="form_search_congviec" onsubmit="return search_congviec_foot();">
          <table class="table table-hover table-bordered">
            <tr>
              <td>
                <label>Năm sinh <?php echo $namsinh; ?></label>
              </td>
              <td>
                <input type="hidden" name="namsinh" value="<?php echo $namsinh; ?>">
                <input type="hidden" name="canchi" value="<?php echo $slugcanchi; ?>">
                <select name="congviec">
                  <option value="xem-tuoi-lam-an/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-lam-an-voi-tuoi-nao.html">Xem tuổi làm ăn</option>
                  <option value="xem-tuoi-lam-nha/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-lam-nha-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi làm nhà</option>
                  <option value="xem-tuoi-hop-nhau/tuoi-<?php echo $slugcanchi; ?>-sinh-nam-<?php echo $namsinh; ?>-hop-voi-tuoi-nao.html">Xem tuổi hợp</option>
                  <option value="xem-tuoi-ket-hon/nam-tuoi-<?php echo $slugcanchi; ?>-<?php echo $namsinh; ?>-lay-vo-nam-nao-tot.html">Xem tuổi kết hôn</option>
                  <option value="xem-tuoi-mua-nha/tuoi-<?php echo $slugcanchi; ?>-mua-nha-nam-<?php echo date('Y');?>-co-tot-khong.html">Xem tuổi mua nhà</option>
                  <option value="xem-tuoi-sinh-con.html">Xem tuổi sinh con</option>
                  <option value="xem-huong-nha-tot-xau/tuoi-<?php echo $slugcanchi; ?>-xay-nha-huong-nao-tot.html">Xem hướng nhà tốt xấu</option>
                  <option value="xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html">Xem tuổi vợ chồng</option>
                </select>
              </td>
              <td>
                <button class="button">Xem chi tiết</button>
              </td>
            </tr>
          </table>
        </form>
        <script type="text/javascript">
            function search_congviec_foot() {
                var frm = document.form_search_congviec;
                var congviec  = frm.congviec.value;
                window.location.href = "<?php echo base_url('');?>"+congviec;
                return false;
            }
        </script>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
    
</div>
