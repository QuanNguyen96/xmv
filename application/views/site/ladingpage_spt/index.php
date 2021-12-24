<!DOCTYPE html>
<html lang="vi">
<head>
  <?php $this->load->view('site/import/script/header/google_script.php');?>
  <meta charset="utf-8">
  <title><?php echo $title;?></title>
  <meta name="keywords" content="<?php echo $keywords;?>"/>
  <meta name="description" content="<?php echo $description;?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?php echo base_url('fivico_2.png');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/ladingpage_spt/');?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/ladingpage_spt/');?>css/style.css">

</head>
<body>
  <header>
    <section class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner">
            <a href="">
              <img src="<?php echo base_url('templates/site/ladingpage_spt/');?>images/banner.jpg" alt="Xem vận mệnh">
            </a>
          </div>
        </div>
      </div>
    </section>
  </header>
  <nav>
      <section class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="main_menu">
              <li><a href="<?php echo base_url();?>" class="mb_menu mb_home">Home</a></li>
              <li>
                 <a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>" class="mb_menu mb_xbs">Xem bói sim</a>
               </li>
              <li><a href="<?php echo base_url('xem-sim-so-dien-thoai-hop-tuoi.html');?>" class="mb_menu mb_sht">Sim hợp tuổi</a></li>
              <li><a href="<?php echo base_url('xem-sim-hop-menh-A864.html');?>" class="mb_menu mb_shm">Sim hợp mệnh</a></li>
              <li class="mb_hidden"><a href="<?php echo base_url('phong-thuy-sim-so-dep.html');?>">Phong thủy sim số đẹp</a></li>
            </ul>
            <div class="mb_menu">
              <span class="btn_menu">Menu</span>
              <div id="content_menu_mobile" class="clearfix hidden">
                  <?php echo $this->my_config->get_top_menu_mobile(); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </nav>
    <main>
       <section class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="main_content">
                <div class="main_box mo_dau">
                   <div class="main_box_title">
                    <h2 class="mbtt_text_new_style">
                      Tổng quan về sim phong thủy
                    </h2>
                   </div>
                   <div class="main_box_content">
                     <div class="js_Form_content">
                        <div class="js_content_height">
                       <?php echo $item['mo_dau'];?>
                       </div>
                     </div> 
                   </div>
                </div>  

                <div class="main_box main_box_border sim_phong_thuy">
                   <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">
                      I. Sim phong thủy
                    </h2>
                   </div>
                   <div class="main_box_content">
                    <div class="js_Form_content">
                      <div class="js_content_height">
                            <?php echo $item['sim_phong_thuy'];?>
                        </div>
                    </div>
                   </div>
                </div>

                <div class="main_box main_box_border cach_tinh_sim">
                   <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">
                      II. Cách tính sim phong thủy
                    </h2>
                   </div>
                   <div class="main_box_content">
                    <div class="js_Form_content">
                      <div class="js_content_height">
                        <?php echo $item['cach_tinh_sim'];?>
                      </div>
                    </div>
                    <div class="moigoi">
                      <p>Thay vì tự tính, bạn có thể sử dụng công cụ của chúng tôi tại</p>
                      <p><a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>">Xem bói số điện thoại hợp phong thủy</a></p>
                     </div> 
                   </div>
                </div>

                <div class="main_box main_box_border">
                   <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">
                      III. Phần mềm xem bói sim phong thủy
                    </h2>
                   </div>
                   <div class="main_box_content">
                    <div class="phan_mem_xem_boi">
                       <div class="js_Form_content">
                        <div class="js_content_height">
                          <?php echo $item['phan_mem_xem_boi'];?>
                        </div>
                      </div>  
                    </div>
                     </div>
                   <div class="main_box_form row">
                    <div class="col-md-8 offset-md-2 col-xs-12">
                      <form name="" action="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>" method="post" class="form_xemboisim">
                         <div>
                           <input type="text" name="sosim" placeholder="Nhập số điện thoại" required="">
                           <select name="gioitinh" required="">
                             <option value="Nam">Nam</option>
                             <option value="Nữ">Nữ</option>
                           </select>
                           <button type="submit">Xem kết quả</button>
                         </div>
                         <div class="mb_select">
                           <select name="giosinh" required="">
                            <option value="" disabled="" selected="">Giờ sinh</option>
                            <option value="23 giờ đến 1 giờ">23 - 1 giờ</option>
                            <option value="1 giờ đến 3 giờ">1 - 3 giờ</option>
                            <option value="3 giờ đến 5 giờ">3 - 5 giờ</option>
                            <option value="5 giờ đến 7 giờ">5 - 7 giờ</option>
                            <option value="7 giờ đến 9 giờ">7 - 9 giờ</option>
                            <option value="9 giờ đến 11 giờ">9 - 11 giờ</option>
                            <option value="11 giờ đến 13 giờ">11 - 13 giờ</option>
                            <option value="13 giờ đến 15 giờ">13 - 15 giờ</option>
                            <option value="15 giờ đến 17 giờ">15 - 17 giờ</option>
                            <option value="17 giờ đến 19 giờ">17 - 19 giờ</option>
                            <option value="19 giờ đến 21 giờ">19 - 21 giờ</option>
                            <option value="21 giờ đến 23 giờ">21 - 23 giờ</option>
                           </select>
                           <select name="ngaysinh" required="">
                             <option value="">Ngày sinh</option>
                             <?php for($i =1; $i<=31; $i++):?>
                               <option value="<?php echo $i;?>"><?php echo $i;?></option>
                             <?php endfor; ?> 
                           </select>
                           <select name="thangsinh" required="">
                             <option value="">Tháng sinh</option>
                             <?php for($i =1; $i<=12; $i++):?>
                               <option value="<?php echo $i;?>"><?php echo $i;?></option>
                             <?php endfor; ?> 
                           </select>
                           <select name="namsinh" required="">
                             <option value="">Năm sinh</option>
                             <?php for($i =1970; $i<=2009; $i++):?>
                               <option value="<?php echo $i;?>"><?php echo $i;?></option>
                             <?php endfor; ?> 
                             <?php for($i =1950; $i<=1969; $i++):?>
                               <option value="<?php echo $i;?>"><?php echo $i;?></option>
                             <?php endfor; ?> 
                           </select>
                         </div>
                      </form>
                     </div> 
                   </div>
                </div>

                <div class="main_box main_box_border">
                   <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">
                      IV. <?php echo $box_title['tong_hop_cong_cu'];?>
                    </h2>
                   </div>
                   <div class="main_box_content">
                   <div class="title_sao">
                       <span>1 - Xem sim phong thủy hợp tuổi</span>    
                     </div>
                     <div class="xem_sim_hop_tuoi">
                        <?php echo $item['xem_sim_hop_tuoi'];?>
                     </div>
                     <div class="row">
                       <div class="col-md-5 mx-auto">
                         <form name="" action="<?php echo base_url('xem-sim-so-dien-thoai-hop-tuoi.html'); ?>" method="post" class="form_xemsimphongthuyht">
                            <p class="form_title">*Hãy điền thông tin dưới đây</p>
                            <div>
                              <input type="text" name="sosim" required="">
                              <select class="mb_giosinh" name="giosinh" required="">
                                <option value="">Giờ sinh</option>
                                <option value="23 giờ đến 1 giờ">23 - 1 giờ</option>
                                <option value="1 giờ đến 3 giờ">1 - 3 giờ</option>
                                <option value="3 giờ đến 5 giờ">3 - 5 giờ</option>
                                <option value="5 giờ đến 7 giờ">5 - 7 giờ</option>
                                <option value="7 giờ đến 9 giờ">7 - 9 giờ</option>
                                <option value="9 giờ đến 11 giờ">9 - 11 giờ</option>
                                <option value="11 giờ đến 13 giờ">11 - 13 giờ</option>
                                <option value="13 giờ đến 15 giờ">13 - 15 giờ</option>
                                <option value="15 giờ đến 17 giờ">15 - 17 giờ</option>
                                <option value="17 giờ đến 19 giờ">17 - 19 giờ</option>
                                <option value="19 giờ đến 21 giờ">19 - 21 giờ</option>
                                <option value="21 giờ đến 23 giờ">21 - 23 giờ</option>
                              </select>
                            </div>
                            <div>
                              <select name="ngaysinh" required="">
                                <option value="">Ngày sinh</option>
                                <?php for($i =1; $i<=31; $i++):?>
                                 <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php endfor; ?> 
                              </select>
                              <select name="thangsinh" required="">
                                <option value="">Tháng sinh</option>
                                <?php for($i =1; $i<=12; $i++):?>
                                 <option value="<?php echo $i;?>"><?php echo $i;?></option>
                               <?php endfor; ?> 
                              </select>
                              <select name="namsinh" required="">
                                <option value="">Năm sinh</option>
                                <?php for($i =1970; $i<=2009; $i++):?>
                               <option value="<?php echo $i;?>"><?php echo $i;?></option>
                               <?php endfor; ?> 
                               <?php for($i =1950; $i<=1969; $i++):?>
                                 <option value="<?php echo $i;?>"><?php echo $i;?></option>
                               <?php endfor; ?> 
                              </select>
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn_xemketqua">Xem kết quả</button>
                            </div>
                         </form>
                       </div>
                     </div> 
                     <div class="title_sao">
                       <span>2 - Xem sim phong thủy hợp mệnh</span>    
                     </div>
                     <div class="xem_sim_hop_menh">
                        <?php echo $item['xem_sim_hop_menh'];?>
                     </div>

                     <div class="title_sao">
                       <span>3 - Xem sim phong thủy theo kinh dịch</span>    
                     </div>
                     <div class="xem_sim_kinh_dich">
                        <?php echo $item['xem_sim_kinh_dich'];?>
                     </div>
                     <div>
                       Sim kinh dịch là gì? để khám phá chi tiết, mời bạn xem tại
                     </div>
                     <div class="row">
                       <div class="col-md-6 mx-auto">
                         <form name="" action="<?php echo base_url('boi-sim-theo-kinh-dich.html'); ?>" method="post" class="form_xspt_kinhdich fm_kythu">
                            <p class="form_title">*Xem bói Sim Kinh Dịch</p>
                            <div class="text-center">
                              <input type="" name="sosim" placeholder="Số điện thoại" required="">
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn_xemketqua">Chấm điểm sim</button>
                            </div>
                         </form>
                       </div>
                     </div>
                     <div class="title_sao">
                       <span>4 - Xem phong thủy sim số đẹp</span>    
                     </div>
                     <div class="xem_sim_so_dep">
                        <?php echo $item['xem_sim_so_dep'];?>
                     </div>
                     <div>
                       Phong thủy sim số đẹp là gì? để khám phá chi tiết, mời bạn xem tại
                       <a href="<?php echo base_url('phong-thuy-sim-so-dep.html');?>" class="a_muiten">Phong thủy sim số đẹp</a>
                     </div>   
                     <p>Hoặc nhập chính xác thông tin tại công cụ sau:</p>  
                     <div class="row">
                       <div class="col-md-6 mx-auto">
                         <form name="form_tinhsimsodep" action="<?php echo base_url('phong-thuy-sim-so-dep.html');?>" method="post" class="form_xspt_kinhdich fm_kythu">
                            <p class="form_title">*Xem phong thủy Sim Số Đẹp</p>
                            <div class="text-center">
                              <input type="" name="sosim" placeholder="Số điện thoại" required="">
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn_xemketqua">Chấm điểm sim</button>
                            </div>
                         </form>
                       </div>
                     </div>
                     <div class="title_sao">
                       <span>5 - Chấm điểm số điện thoại bạn đang dùng</span>    
                     </div>
                     <div class="cham_diem_so">
                        <?php echo $item['cham_diem_so'];?>
                     </div>
                     <p>
                      Để xem số điện thoại đang dùng có phải là sim phong thủy hợp bản mệnh không, mời bạn xem tại
                     </p>
                     <div>
                       <a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>" class="a_muiten margin_0">Xem bói số điện thoại đang dùng tốt hay xấu</a>
                     </div>
                   </div>
                </div>
                <div class="main_box main_box_border">
                  <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">V - Các phương pháp xem sim phong thủy phổ biến</h2>
                  </div>
                  <div class="main_box_content">
                    <div class="title_sao">
                       <span>1 - Xem sim phong thủy bằng cách chia 80</span>    
                     </div>
                     <div class="xem_sim_chia_80">
                        <?php echo $item['xem_sim_chia_80'];?>
                     </div>
                     <div class="title_sao">
                       <span>2 - Xem sim phong thủy theo 2 số cuối</span>    
                     </div>
                     <div class="xem_sim_2_so">
                        <?php echo $item['xem_sim_2_so'];?>
                     </div>
                     <div class="title_sao">
                       <span>3 - Xem sim phong thủy theo 3 số cuối</span>    
                     </div>
                     <div class="xem_sim_3_so">
                        <?php echo $item['xem_sim_3_so'];?>
                     </div>
                     <div class="title_sao">
                       <span>4 - Xem sim phong thủy theo 4 số cuối</span>    
                     </div>
                     <div class="xem_sim_4_so">
                        <?php echo $item['xem_sim_4_so'];?>
                     </div>                  
                  </div> 
                </div>
                <div class="main_box main_box_border">
                  <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">VI - Các phương pháp chọn số theo phong thủy</h2>
                  </div>
                  <div class="main_box_content">
                  <div class="title_sao">
                     <span>1 - Cách chọn số hợp tuổi</span>    
                   </div>
                   <div class="chon_so_hop_tuoi">
                      <?php echo $item['chon_so_hop_tuoi'];?>
                   </div>
                  
                   <p>Hoặc xem tại công cụ:</p>
                   <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <form name="form_sohoptuoi" action="" method="post" class="form_chonso" onsubmit="form_sohoptuoi_submit();return false;">
                           <p>Mời bạn chọn tuổi của mình</p>
                           <div class="text-center">
                             <select name="chontuoi" required="">
                                <option value="" disabled="" selected="">Chọn tuổi</option>
                                <option value="tuoi-giap-ty-1984-hop-voi-so-nao-A998">Giáp Tý (1984)</option>
                                <option value="tuoi-at-suu-1985-hop-voi-so-nao-A999">Ất Sửu (1985)</option>
                                <option value="tuoi-binh-dan-1986-hop-voi-so-nao-A1000">Bính Dần (1986)</option>
                                <option value="tuoi-dinh-mao-1987-hop-voi-so-nao-A1001">Đinh Mão (1987)</option>
                                <option value="tuoi-mau-thin-1988-hop-voi-so-nao-A1002">Mậu Thìn (1988)</option>
                                <option value="tuoi-ky-ty-1989-hop-voi-so-nao-A1003">Kỷ Tỵ (1989)</option>
                                <option value="tuoi-canh-ngo-1990-hop-voi-so-nao-A1004">Canh Ngọ (1990)</option>
                                <option value="tuoi-tan-mui-1991-hop-voi-so-nao-A1005">Tân Mùi (1991)</option>
                                <option value="tuoi-nham-than-1992-hop-voi-so-nao-A1006">Nhâm Thân (1992)</option>
                                <option value="tuoi-quy-dau-1993-hop-voi-so-nao-A1007">Quý Dậu (1993)</option>
                                <option value="tuoi-giap-tuat-1994-hop-voi-so-nao-A1008">Giáp Tuất (1994)</option>
                                <option value="tuoi-at-hoi-1995-hop-voi-so-nao-A1009">Ất Hợi (1995)</option>
                                <option value="tuoi-binh-ty-1996-hop-voi-so-nao-A1010">Bính Tý (1996)</option>
                                <option value="tuoi-dinh-suu-1997-hop-voi-so-nao-A1011">Đinh Sửu (1997)</option>
                                <option value="tuoi-mau-dan-1998-hop-voi-so-nao-A1012">Mậu Dần (1998)</option>
                                <option value="tuoi-ky-mao-1999-hop-voi-so-nao-A1013">Kỷ Mão (1999)</option>
                                <option value="tuoi-canh-thin-2000-hop-voi-so-nao-A1014">Canh Thìn (2000)</option>
                             </select>
                             <button type="submit">Xem ngay</button>
                           </div>
                        </form>
                     </div>
                   </div>
                   <div class="title_sao">
                     <span>2 - Cách chọn số hợp mệnh</span>    
                   </div>
                   <div class="chon_so_hop_menh">
                      <?php echo $item['chon_so_hop_menh'];?>
                   </div>
                  
                   <p>Hoặc xem tại công cụ:</p>
                   <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <form name="form_sohopmenh" action="" method="post" class="form_chonso"onsubmit="form_sohopmenh_submit();return false;">
                           <p>Mời bạn chọn mệnh của mình</p>
                           <div class="text-center">
                             <select name="chonmenh" required="">
                                <option value="" disabled="" selected="">Chọn mệnh</option>
                                <option value="nguoi-menh-kim-hop-voi-so-nao-A1015">KIM</option>
                                <option value="nguoi-menh-moc-hop-voi-so-nao-A1016">MỘC</option>
                                <option value="nguoi-menh-thuy-hop-voi-so-nao-A1017">THỦY</option>
                                <option value="nguoi-menh-hoa-hop-voi-so-nao-A1018">HỎA</option>
                                <option value="nguoi-menh-tho-hop-voi-so-nao-A1019">THỔ</option>
                             </select>
                             <button type="submit">Xem ngay</button>
                           </div>
                        </form>
                     </div>
                   </div> 
                   <div class="title_sao">
                     <span>3 - Ý nghĩa số theo phong thủy</span>    
                   </div>
                   <div class="y_nghia_so">
                      <?php echo $item['y_nghia_so'];?>
                   </div>
                  
                   <p>Hoặc xem tại công cụ:</p>
                   <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <form name="form_ynghiaso" action="" method="post" class="form_chonso" onsubmit="form_ynghiaso_submit();return false;">
                           <p>Mời bạn chọn số cần xem</p>
                           <div class="text-center">
                             <select name="chonso" required="">
                                <option value="" disabled="" selected="">Chọn số</option>
                                <option value="y-nghia-so-00-la-gi-A881">00</option>
                                <option value="y-nghia-so-01-la-gi-A882">01</option>
                                <option value="y-nghia-so-02-la-gi-A883">02</option>
                                <option value="y-nghia-so-03-la-gi-A884">03</option>
                                <option value="y-nghia-so-04-la-gi-A885">04</option>
                                <option value="y-nghia-so-05-la-gi-A886">05</option>
                                <option value="y-nghia-so-06-la-gi-A887">06</option>
                                <option value="y-nghia-so-07-la-gi-A888">07</option>
                                <option value="y-nghia-so-08-la-gi-A889">08</option>
                                <option value="y-nghia-so-09-la-gi-A890">09</option>
                                <option value="y-nghia-so-10-la-gi-A891">10</option>
                                <option value="y-nghia-so-11-la-gi-A892">11</option>
                                <option value="y-nghia-so-12-la-gi-A893">12</option>
                                <option value="y-nghia-so-13-la-gi-A894">13</option>
                                <option value="y-nghia-so-14-la-gi-A895">14</option>
                                <option value="y-nghia-so-15-la-gi-A896">15</option>
                                <option value="y-nghia-so-16-la-gi-A897">16</option>
                                <option value="y-nghia-so-17-la-gi-A898">17</option>
                                <option value="y-nghia-so-18-la-gi-A899">18</option>
                                <option value="y-nghia-so-19-la-gi-A900">19</option>
                                <option value="y-nghia-so-20-la-gi-A901">20</option>
                                <option value="y-nghia-so-21-la-gi-A902">21</option>
                                <option value="y-nghia-so-22-la-gi-A903">22</option>
                                <option value="y-nghia-so-23-la-gi-A904">23</option>
                                <option value="y-nghia-so-24-la-gi-A905">24</option>
                                <option value="y-nghia-so-25-la-gi-A906">25</option>
                                <option value="y-nghia-so-26-la-gi-A907">26</option>
                                <option value="y-nghia-so-27-la-gi-A908">27</option>
                                <option value="y-nghia-so-28-la-gi-A909">28</option>
                                <option value="y-nghia-so-29-la-gi-A910">29</option>
                                <option value="y-nghia-so-30-la-gi-A911">30</option>
                                <option value="y-nghia-so-31-la-gi-A912">31</option>
                                <option value="y-nghia-so-32-la-gi-A913">32</option>
                                <option value="y-nghia-so-33-la-gi-A914">33</option>
                                <option value="y-nghia-so-34-la-gi-A915">34</option>
                                <option value="y-nghia-so-35-la-gi-A916">35</option>
                                <option value="y-nghia-so-36-la-gi-A917">36</option>
                                <option value="y-nghia-so-37-la-gi-A918">37</option>
                                <option value="y-nghia-so-38-la-gi-A919">38</option>
                                <option value="y-nghia-so-39-la-gi-A920">39</option>
                                <option value="y-nghia-so-40-la-gi-A921">40</option>
                                <option value="y-nghia-so-41-la-gi-A922">41</option>
                                <option value="y-nghia-so-42-la-gi-A923">42</option>
                                <option value="y-nghia-so-43-la-gi-A924">43</option>
                                <option value="y-nghia-so-44-la-gi-A925">44</option>
                                <option value="y-nghia-so-45-la-gi-A926">45</option>
                                <option value="y-nghia-so-46-la-gi-A927">46</option>
                                <option value="y-nghia-so-47-la-gi-A928">47</option>
                                <option value="y-nghia-so-48-la-gi-A929">48</option>
                                <option value="y-nghia-so-49-la-gi-A930">49</option>
                                <option value="y-nghia-so-50-la-gi-A931">50</option>
                                <option value="y-nghia-so-51-la-gi-A932">51</option>
                                <option value="y-nghia-so-52-la-gi-A933">52</option>
                                <option value="y-nghia-so-53-la-gi-A934">53</option>
                                <option value="y-nghia-so-54-la-gi-A935">54</option>
                                <option value="y-nghia-so-55-la-gi-A936">55</option>
                                <option value="y-nghia-so-56-la-gi-A937">56</option>
                                <option value="y-nghia-so-57-la-gi-A938">57</option>
                                <option value="y-nghia-so-58-la-gi-A939">58</option>
                                <option value="y-nghia-so-59-la-gi-A940">59</option>
                                <option value="y-nghia-so-60-la-gi-A941">60</option>
                                <option value="y-nghia-so-61-la-gi-A942">61</option>
                                <option value="y-nghia-so-62-la-gi-A943">62</option>
                                <option value="y-nghia-so-63-la-gi-A944">63</option>
                                <option value="y-nghia-so-64-la-gi-A945">64</option>
                                <option value="y-nghia-so-65-la-gi-A946">65</option>
                                <option value="y-nghia-so-66-la-gi-A947">66</option>
                                <option value="y-nghia-so-67-la-gi-A948">67</option>
                                <option value="y-nghia-so-68-la-gi-A949">68</option>
                                <option value="y-nghia-so-69-la-gi-A950">69</option>
                                <option value="y-nghia-so-70-la-gi-A951">70</option>
                                <option value="y-nghia-so-71-la-gi-A952">71</option>
                                <option value="y-nghia-so-72-la-gi-A953">72</option>
                                <option value="y-nghia-so-73-la-gi-A954">73</option>
                                <option value="y-nghia-so-74-la-gi-A955">74</option>
                                <option value="y-nghia-so-75-la-gi-A956">75</option>
                                <option value="y-nghia-so-76-la-gi-A957">76</option>
                                <option value="y-nghia-so-77-la-gi-A958">77</option>
                                <option value="y-nghia-so-78-la-gi-A959">78</option>
                                <option value="y-nghia-so-79-la-gi-A960">79</option>
                                <option value="y-nghia-so-80-la-gi-A961">80</option>
                                <option value="y-nghia-so-81-la-gi-A962">81</option>
                                <option value="y-nghia-so-82-la-gi-A963">82</option>
                                <option value="y-nghia-so-83-la-gi-A964">83</option>
                                <option value="y-nghia-so-84-la-gi-A965">84</option>
                                <option value="y-nghia-so-85-la-gi-A966">85</option>
                                <option value="y-nghia-so-86-la-gi-A967">86</option>
                                <option value="y-nghia-so-87-la-gi-A968">87</option>
                                <option value="y-nghia-so-88-la-gi-A969">88</option>
                                <option value="y-nghia-so-89-la-gi-A970">89</option>
                                <option value="y-nghia-so-90-la-gi-A971">90</option>
                                <option value="y-nghia-so-91-la-gi-A972">91</option>
                                <option value="y-nghia-so-92-la-gi-A973">92</option>
                                <option value="y-nghia-so-93-la-gi-A974">93</option>
                                <option value="y-nghia-so-94-la-gi-A975">94</option>
                                <option value="y-nghia-so-95-la-gi-A976">95</option>
                                <option value="y-nghia-so-96-la-gi-A977">96</option>
                                <option value="y-nghia-so-97-la-gi-A978">97</option>
                                <option value="y-nghia-so-98-la-gi-A979">98</option>
                                <option value="y-nghia-so-99-la-gi-A980">99</option>
                            </select>
                             <button type="submit">Xem ngay</button>
                           </div>
                        </form>
                     </div>
                   </div>
                  </div> 
                </div> 
                <div class="main_box main_box_border chon_mua_sim">
                   <div class="main_box_title main_box_title_style">
                    <h2 class="mbtt_text">
                      VII - Chọn mua sim phong thủy uy tín như thế nào?
                    </h2>
                   </div>
                   <div class="main_box_content">
                     <div class="js_Form_content">
                       <div class="js_content_height">
                         <?php echo $item['chon_mua_sim'];?>
                       </div>
                     </div>
                   </div>
                </div>
                <div class="main_box">
                  <div class="article_menu">
                    <ul>
                      <li class="active" data="bv_sim_hop_tuoi"><span>Sim hợp tuổi</span></li>
                      <li data="bv_sim_hop_menh"><span>Sim hợp mệnh</span></li>
                      <li data="bv_so_dien_thoai"><span>Ý nghĩa số điện thoại</span></li>
                      <li data="bv_y_nghia_so"><span>Ý nghĩa số</span></li>
                    </ul>
                  </div>
                  <?php
                   $flag = true; 
                   foreach ($list_article as $key => $value){
                     $hidden_class = $flag == true ? '' : 'hidden';
                     $flag = false;         
                  ?>
                  <div class="article_content <?php echo $key.' '.$hidden_class;?>">
                    <div class="row">
                      <?php if(!empty($value)): 
                             foreach ($value as $key1 => $value1):
                               $artc_link = base_url($value1['slug'].'-A'.$value1['id'].'.html');
                               $artc_img  = base_url('media/images/article/'.$value1['id'].'/'.$value1['avatar']);
                      ?>
                      <div class="col-md-4">
                        <div class="article_item">
                          <a href="<?php echo $artc_link;?>">
                            <img src="<?php echo $artc_img;?>" alt="<?php echo $value1['name'];?>">
                          </a>
                          <a href="<?php echo $artc_link;?>"><?php echo $value1['name'];?></a>
                        </div>
                      </div>
                     <?php endforeach; endif; ?>
                    </div>
                  </div>
                  <?php }; ?>
                </div>
              </div>
            </div>
          </div>
       </section>
    </main>
    <div class="arrowPageUp scrollToTop" id="arrowPageUp">
        <a href="#" id="back-to-top" title="Về đầu trang" class="show">
        <img src="<?php echo base_url('templates/site/images/icon/arrowPageUp.png'); ?>" width="40" height="40" alt="">
        </a>
    </div>
    <?php $this->load->view('site/import/box_menu_fix_bot.php');?>
    <div class="btn_xemboisim">
       <a href="<?php echo base_url('xem-boi-so-dien-thoai.html');?>">Xem bói sim</a> 
    </div>
    <script type="text/javascript" src="<?php echo base_url('templates/site/');?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('templates/site/ladingpage_spt/');?>bootstrap/js/bootstrap.min.js"></script>
    <script>
            $(document).ready(function(){
                    $(".scrollToTop").click(function() {
                      $("html, body").animate({
                        scrollTop: 0
                      }, 800);
                      return false
                    });
                    
                    var myflag = 0;
                    $('#content_menu_mobile').on('click', function(e) {
                        if (e.target == this){
                            $(this).addClass('hidden');
                            $(this).removeClass('fixedbg');
                            myflag = 0;
                        }
                    });

                    $('#menu-newmobile-home').click(function(){
                        if (myflag == 0) {
                            $('#content_menu_mobile').removeClass('hidden');
                            $('#content_menu_mobile').addClass('fixedbg');
                            myflag = 1;
                        }else{
                            $('#content_menu_mobile').addClass('hidden');
                            $('#content_menu_mobile').removeClass('fixedbg');
                            myflag = 0;
                        }
                    });

                    $('.mnRight-closeBtn , .li_close_menu').click(function(){
                        $('#content_menu_mobile').addClass('hidden');
                        $('#content_menu_mobile').removeClass('fixedbg');
                        myflag = 0;
                    });
                //menu mb
                $('.menu-bottom').on('click',function(){
                    $(this).find('ul').slideToggle('slow');
                });
                $('main').click(function(){
                    $('.menu-bottom').find('ul').hide();
                });
                $('#search-mobile').on('click',function(){
                    $('.menu-search').show('slow');
                    $('.ul_newmoble1').css('background-color', 'black');
                });
                $('.close-menu-search').on('click',function(){
                    $('.menu-search').hide('slow');
                    $('.ul_newmoble1').css('background-color', '#71685b');
                });
                $('.btn_menu').click(function(e){
                      $('#content_menu_mobile').removeClass('hidden');
                });
                $('#content_menu_mobile .lv2').click(function(e){
                    var target = $(e.target);
                    var a = target.closest('a').length;
                    if (!a) {
                        if ($(this).find('.ul3').hasClass('hidden')) {
                            $(this).find('.ul3').removeClass('hidden');
                            $(this).find('.icon_menu_viewmore').css('transform','rotate(180deg)');
                        }else{
                            $(this).find('.ul3').addClass('hidden');
                            $(this).find('.icon_menu_viewmore').css('transform','unset');
                        }
                    }
                });

                // Phần bài viết
                $('.article_menu ul li').click(function(e){
                     $('.article_menu ul li').removeClass('active');
                     $(this).addClass('active');
                     var tag = $(this).attr('data');
                     $('.article_content').addClass('hidden');
                     $('.'+tag).removeClass('hidden');
                });
                
                $(window).scroll(function() {
                  if ($(this).scrollTop() > 100) 
                  {
                     $('nav').addClass('nav_fix_top');
                  } 
                  else 
                  {
                     $('nav').removeClass('nav_fix_top');
                  }
                });

            });

        </script>
        <script>
            function form_sohoptuoi_submit(){
              var frm = document.form_sohoptuoi;
              var uri = frm.chontuoi.value;
                  var link= '<?php echo base_url() ?>' + uri + '.html';
                  window.location.href = link;
            }
            function form_sohopmenh_submit(){
              var frm = document.form_sohopmenh;
              var uri = frm.chonmenh.value;
                  var link= '<?php echo base_url() ?>' + uri + '.html';
                  window.location.href = link;
            }
            function form_ynghiaso_submit(){
              var frm = document.form_ynghiaso;
              var uri = frm.chonso.value;
              var link= '<?php echo base_url() ?>' + uri + '.html';
              window.location.href = link;
            }
            // Nút xem thêm
            $(function(){
                  var arr_box = ['mo_dau','sim_phong_thuy','cach_tinh_sim','chon_mua_sim','xem_sim_hop_tuoi','xem_sim_hop_menh','xem_sim_kinh_dich','xem_sim_so_dep','cham_diem_so','xem_sim_chia_80','xem_sim_2_so','xem_sim_3_so','xem_sim_4_so','chon_so_hop_tuoi','chon_so_hop_menh','y_nghia_so'];
                  arr_box.forEach(myfunction);
                  function myfunction(value)
                    {
                        var ct_class   = '.'+value+' .js_Form_content';
                        var div_class  = '.'+value+' .js_content_height';
                        var height_ct  = $(ct_class).height();
                      var height_div = $(div_class).height(); 
                      if( height_ct < height_div )
                      {

                         $('.'+value+' .js_Form_content').after('<div class="text-center"><button class="js_xemthem bg_xt" type="button" onclick="xemthem(\''+value+'\')" flag="true" >Xem thêm</button></div>');
                      }
                    }
                  
            });
            function xemthem(box_class)
              {
                  var flag = $('.'+box_class+' .js_xemthem').attr('flag');
                  if( flag == 'true')
                      {
                          var height_ct  = $('.'+box_class+' .js_Form_content').height();
                          var height_div = $('.'+box_class+' .js_content_height').height(); 
                          if(height_ct < height_div)
                           {
                               height_ct = height_div;
                               $('.'+box_class+' .js_Form_content').css("max-height",height_ct);
                               $('.'+box_class+' .js_xemthem').text('Ẩn bớt');
                               $('.'+box_class+' .js_xemthem').attr('flag','false'); 
                               $('.'+box_class+' .js_xemthem').addClass('bg_tg');
                               $('.'+box_class+' .js_xemthem').removeClass('bg_tx');
                           }
                          else 
                           {
                               $('.'+box_class+' .js_xemthem').text('Ẩn bớt');
                               $('.'+box_class+' .js_xemthem').attr('flag','false'); 
                               $('.'+box_class+' .js_xemthem').addClass('bg_tg');
                               $('.'+box_class+' .js_xemthem').removeClass('bg_tx');
                           }
                      } 
                  else
                  {
                      var height_ct = 200;
                      $('.'+box_class+' .js_Form_content').css("max-height",height_ct);
                      $('.'+box_class+' .js_xemthem').text('Xem thêm');
                      $('.'+box_class+' .js_xemthem').attr('flag','true'); 
                      $('.'+box_class+' .js_xemthem').addClass('bg_tx');
                      $('.'+box_class+' .js_xemthem').removeClass('bg_tg');
                  }    
              }
        </script>
</body>
</html>
