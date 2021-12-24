<section class="four-tool">
  <h1 class="title_l1 mb_font_l1">Chấm điểm phong thủy sim số đẹp</h1>

  <div class="outer_form">
    <div class="form_bg_thanhchi">
      <form action="" method="post" name="form_tinhsimsodep">
        <p class="titform">*Bạn hãy điền thông tin dưới đây</p>
        <?php if (isset($error)): ?>
          <?php echo $error ?>
        <?php endif ?>
        <input type="tel" class="input_thanhchi mar-bot" placeholder="Số điện thoại" name="sosim" value="<?php echo (isset($sosim) ? $sosim : ''); ?>" required="">
        <div class="text-center">
          <button class="btn_thanhchi" type="submit">CHẤM ĐIỂM SIM</button>
        </div>
      </form>
    </div>
  </div>

  <?php if (isset($text) && $text != ''): ?>
    <div class="txt_top_bot"><?php echo $text; ?></div>
  <?php endif ?>

  <?php if (isset($submit)): ?>
    <div class="bg_hoavando">
      <h2>Kết quả chấm điểm sim <?php echo $sosim; ?></h2>
    </div>
    <section class="main_4cc">
      <div class="mucluc_4cc">
        <p class="txt_ml">Mục lục</p>
        <p>
          <a href="<?php echo current_url(); ?>#nguhanhsim">1. Ngũ hành sinh khắc trong dãy sim số đẹp</a>
        </p>
        <p>
          <a href="<?php echo current_url(); ?>#cuutinhsim">2. Cửu tinh trong Huyền Không Phi Tinh</a>
        </p>
        <p>
          <a href="<?php echo current_url(); ?>#quanniemsim">3. Quan niệm dân gian</a>
        </p>
        <p class="padd-l">
          <a href="<?php echo current_url(); ?>#capsodeptrongsim">3.1 Luận số sim <?php echo $sosim; ?></a>
        </p>
        <p class="padd-l">
          <a href="<?php echo current_url(); ?>#tongsonuocsim">3.2 Tính tổng nút (số nước) của dãy số</a>
        </p>
      </div>
      
      <!-- 1 -->
      <div class="row distance_top">
        <div class="div_tit clearfix">
          <div class="col-md-9 col-sm-12">
            <div class="bg_vienvang">
              <span id="nguhanhsim">1. Ngũ hành sinh khắc<span class="hidden-xs"> trong dãy sim số đẹp</span></span>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <span class="bg_do-rtopright">
              <?php echo $diemSinhkhac.' diểm'; ?>
            </span>
          </div>
        </div>
      </div>
      <div class="body_box">
        <p>
          <i>
          "Ngũ hành sinh khắc được ứng dụng rất nhiều phong việc luận phong thủy đời sống, bởi học thuyết ngũ hành cổ chỉ ra vạn vật trên đời nói chung và các con số nói riêng đều bắt nguồn ở 5 trạng thái: Kim, Mộc, Thủy, Hỏa, Thổ. Trong đó, quan hệ giữa 5 trạng thái này được xác định bởi 5 hình thái: Tương sinh, Tương hỗ, Không sinh không khắc, Sinh xuất và Tương Khắc mà Tương sinh là tốt nhất và tương khắc là xấu. Theo đó, trong dãy số xuất hiện càng nhiều quan hệ tương sinh thì số càng đẹp"
          </i>
        </p>
        <?php if (!empty($caccapso)): ?>
          <table class="tbl_bg1">
            <thead>
              <tr>
                <th>Dãy số</th>
                <th>Ngũ hành con số</th>
                <th>Quan hệ sinh/khắc</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($caccapso as $key => $value): ?>
                <tr>
                  <td><?php echo $value['so1']; ?> với <?php echo $value['so2']; ?></td>
                  <td><?php echo $value['nguhanh1']; ?> với <?php echo $value['nguhanh2']; ?></td>
                  <td><?php echo $value['loai']; ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php endif ?>  
        <div class="div_outdisplay">
          <div class="row outer_flex">
            <div class="col-md-4 col-xs-4">
              <div class="box_ketluando">
                <p>KẾT LUẬN</p>
                <img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/iconsim.png" alt="icon sim">
              </div>
            </div>
            <div class="col-md-8 col-xs-8">
              <div class="box_right_ketluan">
                <div class="border_dott mar-bot-15">
                  <span>
                    Khi luận phong thủy dãy sim số đẹp <?php echo $sosim; ?> theo ngũ hành sinh khắc có <?php echo $capso_tuongsinh; ?> quan hệ <b style="color: #47984b">tương sinh (tốt)</b>, <?php echo $capso_tuongkhac; ?> quan hệ <b style="color: #ac0a0a;">tương khắc (Xấu)</b>, <?php echo $capso_tuongho; ?> quan hệ <b style="color: #cec641;">tương hỗ (Khá)</b>, <?php echo $capso_binhhoa; ?> quan hệ không sinh không khắc (Bình thường)
                  </span>
                </div>
                <div class="border_dott">
                  <i>
                    Như vậy số <b style="color: #47984b">quan hệ Tốt</b> <?php echo $sosanh_sinh_khac; ?> số quan hệ Xấu
                  </i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- 2 -->
      <div class="row distance_top">
        <div class="div_tit clearfix">
          <div class="col-md-9 col-sm-12">
            <div class="bg_vienvang">
              <span id="cuutinhsim">2. Cửu tinh<span class="hidden-xs"> trong Huyền Không Phi Tinh</span></span>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <span class="bg_do-rtopright"><?php echo $diem8k;?> điểm</span>
          </div>
        </div>
      </div>
      <div class="body_box">
        <p>
          <i>
          Cửu tinh đồ pháp trong Huyền Không Phi Tinh miêu tả đặc tính và sự di chuyển của 9 sao, Khi ứng dụng Huyền không học nói chung và Cửu tinh đồ pháp nói riêng vào phong thủy các con số thì cửu tinh ở đây được miêu tả cho 9 con số từ 1 đến 9. Trong đó, số 8 hay còn gọi là Bát bạch là con số có nhiều giá trị may mắn, vinh phúc nhất.
          </i>
        </p>
        <div class="div_outdisplay">
          <div class="row outer_flex">
            <div class="col-md-4 col-xs-4">
              <div class="box_ketluando">
                <p>KẾT LUẬN</p>
                <div class="div_img_dayso">
                  <img src="<?php echo base_url();?>templates/site/images/sonban.gif" alt="son-ban">
                </div>
              </div>
            </div>
            <div class="col-md-8 col-xs-8">
              <div class="box_right_ketluan box_right_ketluan_cuutinh">
                <div class="border_dott mar-bot-15">
                  <span>
                    Dãy sim số đẹp <?php echo $sosim; ?> có xuất hiện <?php echo '<b>'.$dem8.'</b>'; ?> số 8
                  </span>
                </div>
                <div class="border_dott">
                  <i>
                    Dãy sim <?php if($dem8=="0")echo "<b>không</b>";?> nhận được vận khí từ sao Bát Bạch
                  </i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 3 -->
      <div class="row distance_top">
        <div class="div_tit clearfix">
          <div class="col-md-9 col-sm-12">
            <div class="bg_vienvang">
              <span id="quanniemsim">3. Quan niệm dân gian</span>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <span class="bg_do-rtopright"><?php echo $dacbiet['diem'] + $nuoc['diem'];?> điểm</span>
          </div>
        </div>
      </div>
      <div class="body_box">
        <p>
          <i>
          Phương pháp này áp dụng 100% từ quan niệm và kinh nghiệm dân gian về các con số, hiện nay các đơn vị luận sim số đẹp lấy tiêu chí này là then chốt trong việc luận gãy sim số đẹp cũng như phân chia các loại sim số đẹp. Tuy nhiên, trong cuốn Bách Thư được lưu truyền lại thì chỉ có một vài con số được truyền lại là dãy số vài trong sim số đẹp.
          </i>
        </p>
        <p id="capsodeptrongsim" class="txt_demucnho">3.1. Luận số sim <?php echo $sosim; ?> chúng tôi nhận thấy có các cặp số đẹp sau:</p>
        <p>
          <?php echo $dacbiet['mt']; ?>
        </p>
        <p id="tongsonuocsim" class="txt_demucnho">
          3.2. Tính tổng nút (số nước) của dãy số
        </p>
        <p>
          Dãy số <?php echo $sosim; ?> có tổng nút là <?php echo $nuoc['id']; ?><?php echo '. '.$nuoc['nuoc_diengiai']; ?>
        </p>
      </div>
      <!-- ketluan -->
      <div class="div_last_ketluan">
        <div class="row outer_flex">
          <div class="col-md-3 col-xs-12">
            <div class="row">
              <div class="col-xs-12">
                <div class="lastscore">
                  Tổng điểm<br/><span><?php echo $diemSinhkhac + $diem8k + ($dacbiet['diem'] + $nuoc['diem']);?> điểm</span>
                </div>
              </div>
              <div class="col-xs-12 desktop_absolute">
                <div class="div_img_langnghe">
                  <img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/langnghe.png" alt="lang nghe loi khuyen chuyen gia" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-xs-12">
            <div class="div_right_ketluan">
              <p class="titloikhuyen">
                Lời khuyên từ chuyên gia phong thủy
              </p>
              <p class="right_luangian">
                1. Dù tổng điểm này cao nhưng dãy sim số đẹp này chưa chắc đã <b>hợp với bạn</b> vì Phương pháp chấm điểm phong thủy sim số đẹp trên chỉ luận giải ý nghĩa của dãy số
              </p>
              <p class="right_luangian">
                2. Để xem sim phong thủy cần kết hợp đầy đủ 5 yếu tố: Âm dương tương phối, Ngũ hành - tứ trụ, Cửu tinh đồ pháp, Hành quẻ kinh dịch và Quan niệm dân gian mới có được kết quả chính xác nhất.
              </p>
              <div class="right_luangian">
                3. Sử dụng công cụ xem phong thủy sim dưới đây để biết dãy sim <?php echo $sosim; ?> có tốt với công danh sự nghiệp, gia đạo hay công việc làm ăn của bạn hay không?
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php endif ?>


  <section class="bot_4cc">
    <div class="div_img">
      <a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>">
        <img style="width: 120px" src="<?php echo base_url();?>templates/site/images/4ccxemPTS/trangaytaiday.gif" alt="<?php echo current_url(); ?>" />
      </a>
    </div>
    
    <?php if (isset($submit)): ?>
        <?php $this->load->view('site/import/form_xemboisodienthoai'); ?>
    <?php endif ?>

    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="div_box">
            <p class="title_l2">Các công cụ khác</p>
            <ul class="my_ul">
                <li class="clearfix">
                  <a href="<?php echo base_url('xem-boi-so-dien-thoai.html') ?>">
                    <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simhoptuoi.png" alt="cong-cu-sim-hop-tuoi"></div>
                    <span class="li_text">Xem bói SĐT bạn đang dùng</span>
                  </a>
                </li>
                <li class="clearfix">
                  <a href="<?php echo base_url('xem-sim-hop-menh-A864.html') ?>">
                    <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simdangdung.png" alt="cong-cu-xem-boi-sim-dang-dung"></div>
                    <span class="li_text">Xem phong thủy sim hợp mệnh</span>
                  </a>
                </li>
                <li class="clearfix">
                  <a href="<?php echo base_url('xem-sim-so-dien-thoai-hop-tuoi.html') ?>">
                    <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simkinhdich.png" alt="cong-cu-boi-sim-kinh-dich"></div>
                    <span class="li_text">Xem phong thủy sim hợp tuổi</span>
                  </a>
                </li>
                <li class="clearfix">
                  <a href="<?php echo base_url('boi-sim-theo-kinh-dich.html') ?>">
                    <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_simhopmenh.png" alt="cong-cu-sim-hop-menh"></div>
                    <span class="li_text">Xem bói sim theo Kinh Dịch</span>
                  </a>
                </li>
                <li class="clearfix">
                  <a href="<?php echo base_url('xem-boi-bien-so-xe.html') ?>">
                    <div class="li_img"><img src="<?php echo base_url();?>templates/site/images/4ccxemPTS/icon_boibiensoxe.png" alt="cong-cu-boi-bien-so-xe"></div>
                    <span class="li_text">Xem bói biển số xe hung cát</span>
                  </a>
                </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
        <div class="div_box">
          <p class="title_l2">Tin tức sim phong thủy</p>
          <ul class="my_ul">
            <li class="clearfix">
              <a href="<?php echo base_url('sim-phong-thuy.html');?>">
                <div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv1.jpg" alt="cong-cu-sim-hop-menh"></div>
                <div class="li_text">Sim phong thủy là gì?</div>
              </a>
            </li>
            <li class="clearfix">
              <a href="<?php echo base_url('cach-tinh-sim-dai-cat-la-gi-A1027.html'); ?>">
                <div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv2.jpg" alt="cong-cu-sim-hop-menh"></div>
                <span class="li_text">Sim Đại Cát - Luận Hung Cát SĐT</span>
              </a>
            </li>
            <li class="clearfix">
              <a href="<?php echo base_url('cach-chon-sim-so-dep-hop-tuoi-lam-an-theo-phong-thuy-A1071.html'); ?>">
                <div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv3.jpg" alt="cong-cu-sim-hop-menh"></div>
                <span class="li_text">Cách tìm SĐT hợp làm ăn</span>
              </a>
            </li>
            <li class="clearfix">
              <a href="<?php echo base_url('chon-so-hop-tuoi.html');?>">
                <div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv4.jpg" alt="cong-cu-sim-hop-menh"></div>
                <span class="li_text">Xem số hợp tuổi</span>
              </a>
            </li>
            <li class="clearfix">
              <a href="<?php echo base_url('con-so-may-man-theo-tuoi-cua-12-con-giap-A1092.html'); ?>">
                <div class="li_img_bv"><img src="<?php echo base_url(); ?>templates/site/images/4ccxemPTS/todelete/bv5.jpg" alt="cong-cu-sim-hop-menh"></div>
                <span class="li_text">Xem bói con số may mắn hợp tuổi</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </section>

  <?php if (isset($text_foot) && $text_foot != ''): ?>
    <div class="txt_top_bot">
      <?php echo $text_foot; ?>
    </div>
  <?php endif ?>

</section>