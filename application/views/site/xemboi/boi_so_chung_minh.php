<!-- load form validation -->
<script type="text/javascript" src="<?php echo public_url('bootstrap/js/validator.min.js'); ?>"></script>
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix">
    <div class="box_content">
        <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
        <?php $this->load->view('site/adsen/code1');?>
    <?php if (!isset($noidung_quechu)): ?>
        <div class="field clearfix">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
    <?php endif ?>
    
    <div class="text-center">
        <p><i>Quý bạn hãy nhập đầy đủ thông tin để nhận được kết quả tốt nhất nhất</i></p>
    </div>
    <?php if (isset($errors) and $errors): ?>
        <div class="page-text">
            <div class="alert alert-warning">
                <p><b>Bạn cần nhập đầy đủ và chính xác thông tin sau:</b></p>
                <?php echo $errors; ?>
            </div>
        </div>
    <?php endif ?>
    
    <form name="xemBoiSoChungMinh" method="POST" action="/xem-boi-so-chung-minh-nhan-dan.html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <section class="addBorderXBSCM">
                    <div class="row minibox">
                        <div class="col-md-12 col-sm-12">
                            <p><label>Nhập ngày sinh</label></p>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <select name="ngay" class="myinput">
                                        <option value="">Ngày</option>
                                        <?php for($i=1;$i<=31;$i++): ?>
                                            <option <?php echo set_select('ngay', $i); ?> value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select name="thang" class="myinput">
                                        <option value="">Tháng</option>
                                        <?php for($i=1;$i<=12;$i++): ?>
                                            <option <?php echo set_select('thang', $i); ?> value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select name="txtnam" class="myinput">
                                        <option value="">Năm</option>
                                        <?php 
                                         $ns = isset($_POST['txtnam']) ? $_POST['txtnam'] : 1992;  
                                         for($i=1950;$i<=2005;$i++): 
                                              $slt = $ns == $i ? 'selected=""' : '';
                                         ?>
                                            <option <?php echo $slt; ?> value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row minibox">
                        <div class="col-md-6 col-xs-12">
                            <p><label>Nhập số cmt</label></p>
                            <input type="number" name="txtcmt" class="myinput" value="<?php echo set_value('txtcmt'); ?>" placeholder="Nhập số cmtnd">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <p class="hidden-xs hidden-sm">&nbsp</p>
                            <button type="submit" name="btnxem" value="submit">XEM KẾT QUẢ</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
    </div>
    <?php if (isset($noidung_quechu) && !empty($noidung_quechu)): ?>

        <div id="result" class="box_content kqNdqc" style="padding: 10px;border-radius: 5px;">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="2" width="40%">
                                <p class="text-center" style="padding-top: 19px;"><label>THÔNG TIN CỦA BẠN</label></p>       
                            </td>
                            <td>
                                <p><b>Ngày sinh : </b><?php echo $ngay.'/'.$thang.'/'.$nam; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>Số CMND : </b><?php echo $socmt; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info my-alert">
                        <div class="panel-heading">
                            <h2 class="title_p h4" style="text-transform: uppercase;text-align: center;font-weight: bold;"><b class="que">Ý nghĩa của số CMND và ngày sinh</b></h2>
                        </div>
                        <div class="panel-body">
                            <p>
                            Ngũ hành số CMT của Quý vị: <?php echo $nguhanh; ?>
                        </p>
                        <p>
                            Ý Nghĩa của tuổi và số chứng minh thư: <?php echo $ynghia; ?>
                        </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <section class="alert my-alert">
                        <p>
                            <b>Hành quẻ bát quái</b><br>
                            <article>
                                Theo lý thuyết Kinh Dịch, mỗi sự vật hiện tượng đều bị chi phối bởi các quẻ trùng quái, trong đó quẻ Chủ là quẻ đóng vai trò chủ đạo, chi phối quan trọng nhất đến sự vật, hiện tượng đó. Bên cạnh đó là quẻ Hỗ, mang tính chất bổ trợ thêm. <br>
                            </article>
                            
                        </p>
                    </section>
                </div>
                <div class="col-md-12 tool_cmt_chem_tuyen">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-info my-alert">
                                <div class="panel-heading">
                                    <p><b>Quẻ chủ</b>: <b class="que"><?php _e($quechu); ?></b></p>
                                    <p style="font-size: 13px;">(Quẻ chủ đạo, chi phối đến mọi sự vật, hiện tượng)</p>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        <b>Nội Dung quẻ chủ(1-32 tuổi):</b>
                                    </p>
                                    <div class="text-justify strongnotstrong" style="font-weight: 400 !important;">
                                        <?php echo $noidung_quechu['noi_dung']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-info my-alert">
                                <div class="panel-heading">
                                    <p><b>Quẻ biến</b>(từ 32 tuổi): <b class="que"><?php _e($queho); ?></b></p>
                                    <p style="font-size: 13px;">(Quẻ mang tính chất bổ trợ)</p>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        <b>Nội Dung quẻ biến:</b> 
                                    </p>
                                    <div class="text-justify strongnotstrong" style="font-weight: 400 !important;">
                                        <?php echo $noidung_queho['noi_dung']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                .strongnotstrong{  }
                .strongnotstrong strong{ font-weight: 400 !important; }
            </style>
            <style type="text/css">
                .tool_cmt_chem_tuyen{ line-height: 25px; }
                .tool_cmt_chem_tuyen .que{
                  color: #00bcd4;
                  font-weight: bold;
                }
                .tool_cmt_chem_tuyen .boisocmt .form-control, .btn{
                  border-radius: 0px;
                }
                .tool_cmt_chem_tuyen .boisocmt form div{
                  margin-top: 10px;
                }
                .tool_cmt_chem_tuyen fieldset {
                    display: block;
                    -webkit-margin-start: 2px;
                    -webkit-margin-end: 2px;
                    -webkit-padding-before: 0.35em;
                    -webkit-padding-start: 0.75em;
                    -webkit-padding-end: 0.75em;
                    -webkit-padding-after: 0.625em;
                    min-width: -webkit-min-content;
                    border-width: 2px;
                    border-style: groove;
                    border-color: threedface;
                    border-image: initial;
                }
                .tool_cmt_chem_tuyen legend {
                    display: block;
                    width:auto;
                    padding: 0;
                    margin-bottom: 20px;
                    font-size: 21px;
                    line-height: inherit;
                    color: #333;
                    border: 0;
                }
            </style>
        </div>
        <?php if($_POST): ?>
        <div class="field">
          <div class="notification_tuvi_2020">
            <ul>
                <li>
                  <a href="<?php echo $dieu_huong_tv_2020_link_nam; ?>"><?php echo $dieu_huong_tv_2020_text_nam;?></a>
                </li>
                <li>
                   <a href="<?php echo $dieu_huong_tv_2020_link_nu; ?>"><?php echo $dieu_huong_tv_2020_text_nu; ?></a>
                </li> 
            </ul>
          </div> 
        </div>
        <?php endif; ?>
        <div class="field">
            <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
        </div>
        <?php if ($_POST): ?>
            <div class="field">
                <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
            </div>
        <?php endif ?>
        <?php if ($_POST): ?>
            <div class="field">
                <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
            </div>
            <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
        <?php endif ?>
        <div class="box_content">
            <div class="box_content_tt1">
              Công cụ xem bói hợp tuổi quý bạn
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-boi-cung-menh-theo-nam-sinh.html'); ?>">
                <div class="text-center">
                      <div class="thumbnail">
                        <img src="<?php echo base_url('templates/site/images/anhdaidien/cung-menh.jpg'); ?>" alt="">
                      </div>
                      <div><p>Xem bói cung mệnh</p></div>
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
              <a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/boi-bai-tinh-yeu.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem bói bài tình yêu</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                    </div>
                    <div><p>Tử vi hàng ngày</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                    </div>
                    <div><p>Tử vi trọn đời</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                    </div>
                    <div><p>Bói bài hàng ngày</p></div>
                </div>
              </a>
            </div>
        </div>
        <script type="text/javascript">
            var x = $('.kqNdqc').offset();
            var height_x = x.top;
            $("html, body").animate({scrollTop:height_x},1);
        </script>
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
</div>