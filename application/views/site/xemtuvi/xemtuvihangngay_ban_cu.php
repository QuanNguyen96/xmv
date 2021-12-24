<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/css/xemlich_vesion_13_3_2020.css'); ?>">
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix col-md-12">
    <div class="">
       <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
       <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="text-center">
        <p><i>Quý bạn vui lòng nhập đầy đủ thông tin để nhận được kết quả tốt nhất</i></p>
    </div>
    <form action="" method="POST" name="form_tuvingay">
        <div class="form-group">
            <div class="col-md-3" align="right">
                <span>Ngày sinh</span>
            </div>
            <div class="col-md-3">
                <select name="ngaysinh" id="ngayysinh" required="">
                    <?php 
                    $cr_ngay_sinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
                    for($i=1;$i<=31;$i++): 
                       $slt = $i == $cr_ngay_sinh ? 'selected=""' : '';
                    ?>
                        <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="thangsinh" id="thang_sinh" required="">
                    <?php 
                     $cr_thang_sinh = isset($_POST['thangsinh']) ? $_POST['thangsinh'] : '';
                    for($i=1;$i<=12;$i++): 
                      $slt = $i == $cr_thang_sinh ? 'selected=""' : '';
                    ?>
                        <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="namsinh" id="nam_sinh">
                    <?php 
                      $cr_nam_sinh = isset($_POST['namsinh']) ? $_POST['namsinh'] : 'nham-than';
                    foreach (list_age_text() as $key => $value): 
                       $slt = $key == $cr_nam_sinh ? 'selected=""' : '';
                    ?>
                        <option value="<?php echo $key; ?>" <?php echo $slt; ?>><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3" align="right">
                <span>Ngày xem</span>
            </div>
            <div class="col-md-3">
                <select name="ngayxem" id="ngay_xem" required="">
                    <?php for($i=1;$i<=31;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('ngayxem',$i); ?> <?php if (date('j') == $i): ?>
                            <?php echo 'selected=""'; ?>
                        <?php endif ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="thangxem" id="thang_xem" required="">
                    <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('thangxem',$i); ?> <?php if ($i == date('n')): ?>
                            <?php echo 'selected = ""'; ?>
                        <?php endif ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="namxem" id="nam_xem">
                    <?php for($i=date('Y');$i<=2030;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('namxem',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="text-center clear">
            <button type="submit" class="button" id="xemtuvi_ngay" name="xem">Xem ngay</button>
        </div>
    </form> 
    </div>
    
    <?php if (isset($info_user)): ?>
        <div class="row">
         <div class="col-md-4">
             <div class="thumbnail">
                 <img src="<?php echo base_url('templates/site/images/senok.jpg'); ?>" alt="img">
             </div>
         </div>
         <div class="col-md-8">
             <table class="table table-bordered" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="2" class="text-center"><span class="text-danger"><label>Thông tin của bạn</label></span></td>
            </tr>
            <tr>
                <td><span>Ngày Sinh Dương Lịch</span></td>
                <td><?php echo $info_user['ngay_sinh']; ?>/<?php echo $info_user['thang_sinh']; ?>/<?php echo $info_user['nam_sinh']; ?></td>
            </tr>
            <tr>
                <td>Ngày Sinh Âm Lịch</td>
                <td><?php echo $info_user['amlich'][0] ?>/<?php echo $info_user['amlich'][1] ?>/<?php echo $info_user['amlich'][2] ?></td>
            </tr>
            <tr>
                <td>Ngũ Hành Bản Mệnh</td>
                <td><?php echo $info_user['lucthap']['nghiahan'].' '.$info_user['lucthap']['he'] ?></td>
            </tr>
            <tr>
                <td class="text-center"><a href="<?php echo base_url('xem-tu-vi-tuan-moi.html'); ?>"><b><span class="glyphicon glyphicon-ok"></span> Tử Vi Tuần Mới</b></a></td>
                <td class="text-center">
                    <a href="<?php echo base_url('tu-vi-hang-thang/tu-vi-thang-'.$thangxem.'-nam-'.$namxem.'.html'); ?>"><b><span class="glyphicon glyphicon-ok"></span> Tử Vi Tháng <?php echo $duonglich['thangduong'] ?> năm <?php echo $duonglich['namduong']; ?></b></a>
                </td>
            </tr>
        </table>
         </div>   
        </div>
    <?php endif ?>
    <?php if (isset($thapnhibattu) && !empty($thapnhibattu)): ?>
        <div class="box_aside_tt1">Thông tin ngày <?php echo $duonglich['ngayduong'] ?>/<?php echo $duonglich['thangduong'] ?>/<?php echo $duonglich['namduong'] ?> của bạn</div>
        <div class="box_xvm">
            <table class="table table-bordered" cellpadding="0" cellpadding="0">
                <tr>
                    <td width="30%" class="text-center">
                        <b>Nhị Thập Bát Tú</b><br>
                        <span class="color_red"><?php echo 'sao '.$thapnhibattu[2]['name']; ?></span>
                        <div>
                            <?php echo $thapnhibattu[2]['title']; ?>
                        </div>
                    </td>
                    <td align="left">
                        <div>
                            <span class="corlor_red"><b class="text-danger">Nên Làm:</b></span>
                            <?php echo $thapnhibattu[2]['nenlam']; ?>
                        </div>
                        <div>
                            <label>Kiêng: </label>
                            <?php echo $thapnhibattu[2]['kilam']; ?>
                         </div>
                        <div>
                            <div>
                                <label class="text-danger">Ngoại lệ:</label>
                                <?php 
                                    $serach = array('$ngayxem','$thangxem','$namxem');
                                    $replace = array($ngayxem,$thangxem,$namxem);
                                    echo str_replace($serach, $replace, $thapnhibattu[2]['ngoaile']);
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php if (isset($text_ketluan)): ?>
                    <tr>
                        <td colspan="2" style="background-color:#e005bb0d;">
                            <i><span class="text-danger"><b>Lời Khuyên:</b></span>
                            <?php echo $text_ketluan; ?></i>
                        </td>
                    </tr>
                <?php endif ?>
            </table>
            
            <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
            <?php $this->load->view('site/import/form_tv_2020'); ?>
            <?php if (isset($info_user)): ?>
                <div class="box_aside_tt1"> Xem Thêm Tử Vi Các Ngày Tiếp Theo</div>
                <ul class="trangstyle clearfix">
                    <?php foreach ($five_day_next as $key => $value): 
                        $value = explode('-', trim($value));
                    ?>
                    <li>
                        <a href="<?php echo base_url('tu-vi-hang-ngay/tu-vi-ngay-'.$value[0].'-thang-'.$value[1].'-nam-'.$value[2].'.html'); ?>">Tử vi ngày <?php echo $value[0] ?> tháng <?php echo $value[1] ?> năm <?php echo $value[2] ?></a>
                    </li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
        <div class="box_content">
            <div class="box_content_tt1">
              Các công cụ Xem bói - Tử vi liên quan
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                <div class="text-center">
                      <div class="thumbnail">
                        <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                      </div>
                      <div><p>Bói bài hàng ngày</p></div>
                </div>
              </a>
            </div>
            <div class="col-md-4 col-xs-6">
              <a href="<?php echo base_url('xem-boi-bai-thoi-van.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/thoi-van.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem bói bài thời vận</p></div>
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
              <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xem bói ngày sinh</p></div>
                </div>
              </a>
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
              <a href="<?php echo base_url('quan-am-linh-xam.html'); ?>">
                <div class="text-center">
                    <div class="thumbnail">
                      <img src="<?php echo base_url('templates/site/images/anhdaidien/quan-am-linh-xam.jpg'); ?>" alt="">
                    </div>
                    <div><p>Xin xăm quan âm</p></div>
                </div>
              </a>
            </div>
          </div>
    <?php endif ?>
    <div class="row" style="clear: both;">
        <div class="box_aside_tt1"><a href="<?php echo base_url('xem-lich-van-nien.html'); ?>">Âm lịch hôm nay</a></div>
      <div class="col-md-6">
            <div class="lichngay">
                <div class="ln_content">
                  <div class="lncontrol prev text-center">
                      <span class="glyphicon glyphicon-arrow-left" onclick="show_lichngay(<?php echo $lichngay['ngaytruoc']['0'] ?>,<?php echo $lichngay['ngaytruoc']['1'] ?>,<?php echo $lichngay['ngaytruoc']['2'] ?>)"></span>
                    </div> 
                    <div class="ln_header">
                        <p>Tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?></p>
                    </div> 
                    <div class="lncontrol nex text-center">
                      <span class="glyphicon glyphicon-arrow-right" onclick="show_lichngay(<?php echo $lichngay['ngaytiep']['0'] ?>,<?php echo $lichngay['ngaytiep']['1'] ?>,<?php echo $lichngay['ngaytiep']['2'] ?>)"></span>
                      </div>
                    <div class="ln_body ln_body_1">
                        <h3><?php echo $lichngay['ngayduong'];?></h3>
                        <p><?php echo 'Ngày '.$lichngay['ngayam'].' Tháng'.$lichngay['thangam'].' Năm '.$lichngay['namam'].'(AL)'; ?></p>
                    </div>
                    <div class="ln_body ln_body_2">
                    <ul>
                      <li>Ngày: <b><?php echo $lichngay['ngaycanchi'];?></b></li>
                      <li>Tháng: <b><?php echo $lichngay['thangcanchi'];?></b></li>
                      <li>Năm: <b><?php echo $lichngay['namcanchi'];?></b></li>
                    </ul>
                    <ul>
                      <li>Ngày:<?php if ($lichngay['ngayhoangdao'] == 'Hoàng đạo'): ?>
                                <b style="color: red;"><?php echo $lichngay['ngayhoangdao'];?></b>
                            <?php else: ?>
                                <b><?php echo $lichngay['ngayhoangdao'];?></b>
                            <?php endif ?>
                            </li>
                      <li>Trực:<b><?php echo $lichngay['truc']['ten'];?></b></li>
                      <li>Ngũ Hành: <b style="font-size: 12px!important"><?php echo $lichngay['nguhanh'];?></b></li>
                    </ul>
                    </div>
                    <div class="text-center thu">
                        <p><?php echo $lichngay['thu'];?></p>
                    </div>
                    <div class="ln_body ln_body_3">
                    <ul>
                            <p class="">Giờ tốt</p>
                      <?php foreach ($lichngay['giohoangdao']['hoangdao'] as $key => $value):?>
                      <li style="color: red;"><?php echo $value;?></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul>
                            <p style="color: black!important;">Giờ xấu</p>
                      <?php foreach ($lichngay['giohoangdao']['hacdao'] as $key => $value):?>
                      <li style="color: black!important;"><?php echo $value;?></li>
                        <?php endforeach; ?>
                    </ul>
                    </div>
                    <div class="ln_footer">
                    <div class="lncontrol  text-center">
                      <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$lichngay['ngaytruoc']['0'].'-thang-'.$lichngay['ngaytruoc']['1'].'-nam-'.$lichngay['ngaytruoc']['2'].'.html'); ?>">Ngày hôm qua</a>
                    </div> 
                        <div class="lndetail text-center">
                            <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$lichngay['ngayduong'].'-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html'); ?>">Chi tiết</a>
                        </div>
                      <div class="lncontrol  text-center">
                        <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$lichngay['ngaytiep']['0'].'-thang-'.$lichngay['ngaytiep']['1'].'-nam-'.$lichngay['ngaytiep']['2'].'.html'); ?>">Ngày mai</a>
                      </div>
                    </div>
                </div>   
            </div>
        </div>
      <div class="col-md-6">
         <div class="lichthang">
            <div class="lt_content">
                <div class="lt_header">
                <div class="left_prev">
                  <span class="glyphicon glyphicon-arrow-left" onclick="show_lichthang(<?php echo $lichngay['thangtruoc']['1'] ?>,<?php echo $lichngay['thangtruoc']['2'] ?>)"></span>
                </div>
                    <p class="box_aside_tt1"><a href="<?php echo base_url('xem-lich-van-nien/lich-thang-'.$lichngay['thangduong'].'-nam-'.$lichngay['namduong'].'.html'); ?>">Tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?></a></p>
              <div class="right_next">
                <span class="glyphicon glyphicon-arrow-right" onclick="show_lichthang(<?php echo $lichngay['thangtiep']['1'] ?>,<?php echo $lichngay['thangtiep']['2'] ?>)"></span>
              </div>
                 </div> 
                 <div class="lt_body">
                    <div class="banglichthang_ngay" >
                        <?php echo $lichthang;?>
                    </div>
              <p class="star_hd"><span class="text-yellow"><span class="glyphicon glyphicon-star"></span></span>&nbsp;:Ngày hoàng đạo &nbsp;<span class="text-black"><span class="glyphicon glyphicon-star"></span>&nbsp;:Ngày hắc đạo</p>
                 </div>
                 <div class="lt_btom"><a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$lichngay['thangduong'].'-nam-'. $lichngay['namduong'].'.html'); ?>">Xem ngày tốt tháng <?php echo $lichngay['thangduong'] ?> Năm <?php echo $lichngay['namduong'];?></a></div> 
            </div>
        </div>
      </div>
    </div>
    <div class="field clearfix">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    </div>
    <div class="field">
        <div class="col-md-12">
            <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
        </div>
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
</div>
<script>
    $(document).ready(function(){
        $('#xemtuvi_ngay').on('click',function(){
            var frame   = document.form_tuvingay;
            var ngay    = $('#ngay_xem').val();
            var thang   = $('#thang_xem').val();
            var nam     = $('#nam_xem').val();
            var link    = 'tu-vi-hang-ngay/tu-vi-ngay-'+ngay+'-thang-'+thang+'-nam-'+nam+'.html';
            var domain  = '<?php echo base_url(); ?>';
            frame.action = domain + link;
        });
    });
</script>
<script type="text/javascript">
    function show_lichthang(thang,nam){
        $.ajax({
          url: '<?php echo base_url('site/xemlich/ajax_get_lichthang');?>',
          type: 'POST',
          dataType: 'json',
          data: {ngay:1,thang:thang,nam:nam}, 
          beforeSend: function() {
            //echo.fadeOut();
            //submit.html('Sending....'); // change submit button text
          },
          success: function(data) {
              $('.lichthang').html(data.html);
          },
          error: function(e) {
            console.log(e)
          }
        });
    }
    function show_lichngay(ngay,thang,nam)
      {
        $.ajax({
                url: '<?php echo base_url('ajaxlichngay');?>',
                type: 'POST',
                dataType: 'json',
                data: {ngay:ngay,thang:thang,nam:nam}, 
                beforeSend: function() {
                    //echo.fadeOut();
                    //submit.html('Sending....'); // change submit button text
                },
                success: function(data) {
                    $('.ln_content').html(data.html);
                },
                error: function(e) {
                    console.log(e)
                }
            });
      }
</script>