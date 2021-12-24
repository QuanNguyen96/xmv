<link rel='stylesheet' href="<?php echo base_url('templates/site/css/xemlich_vesion_13_3_2020.css'); ?>?<?php echo filemtime('templates/site/bootstrap/css/bootstrap.min.css')?>" />
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="row">
        <div class="field txt_content">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
    </div>
    <?php
        $month_show_next_1 = ($thang+1>12)?($thang+1-12):($thang+1); 
        $year_show_next_1  = ($thang+1>12)?($nam+1):($nam);
        $month_show_next_2 = ($thang+2>12)?($thang+2-12):($thang+2); 
        $year_show_next_2  = ($thang+2>12)?($nam+1):($nam);
        ?>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: left;" class="text-left"><span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$month_show_next_1.'-nam-'.$year_show_next_1.'.html') ?>"><label>Xem ngày tốt tháng <?php echo $month_show_next_1; ?> năm <?php echo $year_show_next_1; ?></label></a>
            </p>
        </div>
        <div class="col-md-12">
            <p style="text-align: left;" class="text-right"><span class="btn_nhaynhay"></span>
                <a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$month_show_next_2.'-nam-'.$year_show_next_2.'.html') ?>">
                <label>Xem ngày tốt tháng <?php echo $month_show_next_2; ?> năm <?php echo $year_show_next_2; ?></label>
                </a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <div class="lichthang">
                <div class="lt_content">
                    <div class="lt_header">
                        <p class="box_aside_tt1">Lịch tháng <?php echo $thang; ?>/<?php echo $nam;;?></p>
                    </div>
                    <div class="lt_body">
                        <div class="banglichthang_sing" >
                            <?php echo $lichthang;?>
                        </div>
                        <p class="star_hd"><span class="text-yellow"><span class="glyphicon glyphicon-star"></span></span>&nbsp;:Ngày hoàng đạo &nbsp;<span class="text-black"><span class="glyphicon glyphicon-star"></span>&nbsp;:Ngày hắc đạo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="box_aside_tt1">Xem ngày tốt xấu</h3>
        </div>
        <form name="" action="" method="post" onsubmit="xemngaytotxau_f(); return false;">
            <div class="col-md-6 col-md-offset-3 list-work">
                <div class="row">
                    <div class="col-md-6">
                        <select name="xntx_f_thang" id="xntx_f_thang">
                            <option value="" required="">Chọn tháng</option>
                            <?php for( $i = 1; $i<=12; $i++ ): ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="xntx_f_nam" id="xntx_f_nam"  required="">
                            <option value="">Chọn năm</option>
                            <?php for( $i = 1947; $i<=2027; $i++ ): ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <select name="xntx_f_md" id="xntx_f_md" required="">
                            <option value="">Chọn mục đích công việc</option>
                            <?php foreach($mangcongcu as $key => $val): ?>
                            <option value="<?php echo $key;?>"><?php echo $val; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit">Xem chi tiết</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <form action="" method="POST" name="lichtheothang" onsubmit="sumit_form_lichtheothang();">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title_dt">Xem lịch vạn niên theo tháng</h3>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="" id="thang_lichthang" required="">
                            <option value="">Chọn tháng</option>
                            <?php for($i=1; $i<=12;$i++): 
                                $slt = $i == date('n')?'selected=""':'';
                                ?>
                            <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('thang_lichthang',$i); ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="" id="nam_lichthang" required="">
                            <option value="">Chọn năm</option>
                            <?php for($i=1950;$i<= 2030;$i++): 
                                $slt = $i == date('Y')?'selected=""':'';
                                ?>
                            <option value="<?php echo $i; ?>" <?php echo $slt; ?> <?php echo set_select('nam_lichthang',$i); ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" name="">Xem chi tiết</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <h3 class="title_dt">Xem lịch âm dương hôm nay</h3>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo base_url('xem-lich-van-nien.html'); ?>" method="POST" name="showngay">
                <div class="row">
                    <div class="col-md-4">
                        <select name="show_ngay" id="show_ngay">
                            <option value="">Chọn ngày</option>
                            <?php for($i=1;$i<=31;$i++): 
                                $slt = $i == date('j')?'selected=""':'';
                                ?>
                            <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="show_thang" id="show_thang">
                            <option value="">Chọn Tháng</option>
                            <?php for($i=1;$i<=12;$i++): 
                                $slt = $i == date('n')?'selected=""':'';
                                ?>
                            <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="show_nam" id="show_nam">
                            <option value="">Chọn năm</option>
                            <?php for($i=1950;$i<=2030;$i++): 
                                $slt = $i == date('Y')?'selected=""':'';
                                ?>
                            <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" name="submit" value="submit">Xem chi tiết</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="" method="POST" name="formdoingay">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title_dt">Đổi ngày âm dương</h3>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="mDay" id="doingay_ngay" required="">
                            <option value="">Chọn ngày</option>
                            <?php for($i =1; $i<=31;$i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo set_select('mDay',$i); ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="mMonth" id="doingay_thang" required="">
                            <option value="">Chọn tháng</option>
                            <?php for($i=1; $i<=12;$i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo set_select('mMonth',$i); ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="mYear" id="doingay_nam" required="">
                            <option value="">Chọn năm</option>
                            <?php for($i=1950;$i<= 2030;$i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo set_select('mYear',$i); ?>><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-6 text-center">
                        <button type="submit" name="" id="doiduong">Dương sang âm</button>
                    </div>
                    <div class="col-md-6 text-center">
                        <button type="submit" name="" id="doiam">Âm sang dương</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="field txt_content alert alert-success">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    </div>
    <div class="row">
        <?php $this->load->view('site/adsen/code2'); ?>
        <div class="col-md-12" style="clear: both;">
            <h3 class="box_aside_tt1"><a href="<?php echo base_url('xem-lich-am-duong-2018.html'); ?>">Xem lịch vạn niên năm 2018</a></h3>
        </div>
        <div class="col-md-6">
            <ul class="lich12thang">
                <?php for( $i = 1; $i<=6; $i++ ): 
                    $link = base_url('xem-lich-van-nien/lich-thang-'.$i.'-nam-2018'.'.html'); 
                    ?> 
                <li><a href="<?php echo $link;?>"><?php echo 'Lịch vạn niên tháng '.$i.' năm 2018';?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="lich12thang">
                <?php for( $i = 7; $i<=12; $i++ ): 
                    $link = base_url('xem-lich-van-nien/lich-thang-'.$i.'-nam-2018'.'.html'); 
                    ?> 
                <li><a href="<?php echo $link;?>"><?php echo 'Lịch vạn niên tháng '.$i.' năm 2018';?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="box_aside_tt1"><a href="<?php echo base_url('xem-ngay-tot-trong-thang-'.$thang.'-nam-'.$nam.'.html'); ?>"><?php echo 'Những ngày tốt trong tháng '.$thang.' năm '.$nam; ?></a></h3>
        </div>
        <?php $this->load->view('site/adsen/code3'); ?>
        <div class="col-md-12 listDay_good" id="result">
            <table>
                <thead>
                    <tr>
                        <th>
                            <p><label>Ngày</label></p>
                        </th>
                        <th>
                            <p><label><?php echo 'Ngày tốt xấu trong tháng '.$thang.' năm '.$nam; ?></label></p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i= 0;
                        foreach( $ngaytx as $key => $val ): 
                        $i++;
                        ?>
                    <tr>
                        <td>
                            <section class="clearfix">
                                <div class="boxLichduong_left">
                                    <p class="title_lichduong">Lịch dương</p>
                                    <p class="title_date"><label><?php echo $val['ngayduong'];?></label></p>
                                    <p class="title_month">Tháng <?php echo $val['thangduong'];?></p>
                                </div>
                                <div class="boxLichduong_right">
                                    <p class="title_licham">Lịch âm</p>
                                    <p class="title_date"><label><?php echo $val['ngayam'];?></label></p>
                                    <p class="title_month">Tháng <?php echo $val['thangam'];?></p>
                                </div>
                                <div class="boxLichduong_bottom">
                                    <?php $totxau = $val['ngayhoangdao'] == 'Hoàng đạo' ? 'Tốt' : 'Xấu'; ?>
                                    <p><b>Ngày <span class="color_black"><?php echo $totxau;?></span></b></p>
                                </div>
                            </section>
                        </td>
                        <td>
                            <section class="boxRightListDay">
                                <p><span class="text_red"><?php echo $val['thu']; ?>,  <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$i.'-thang-'.$thang.'-nam-'.$nam.'.html');?>">ngày <?php echo $val['ngayduong'].'/'.$val['thangduong'].'/'.$val['namduong'];?></a></span> nhằm ngày <span class="text_black"><?php echo $val['ngayam'].'/'.$val['thangam'].'/'.$val['namam'];?> Âm lịch</span></p>
                                <p>Ngày <label><?php echo $val['ngaycanchi'];?></label>, tháng <label><?php echo $val['thangcanchi'];?></label>, năm <label><?php echo $val['namcanchi'];?></label></p>
                                <p>Ngày <span class="text_black"><?php echo $val['ngayhoangdao'];?></span></p>
                                <p><label>Giờ tốt trong ngày :</label></p>
                                <p>
                                    <?php foreach( $val['giohoangdao']['hoangdao'] as $key1 =>$val1 ): ?>
                                    <span><?php echo $val1;?></span>
                                    <?php endforeach;?>
                                </p>
                                <p><a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$i.'-thang-'.$thang.'-nam-'.$nam.'.html');?>" class="bg_red">Xem chi tiết</a></p>
                            </section>
                        </td>
                    </tr>
                    <?php if ($val['ngayduong'] == 15): ?>
                    <tr>
                        <td colspan="2">
                            <?php $this->load->view('site/adsen/code4'); ?>
                        </td>
                    </tr>
                    <?php endif ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Xem ngày tốt xấu</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="box_aside_tt1">Công cụ được xem nhiều nhất</h3>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 tool_view_much">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url('media/images/menu/icona.png'); ?>" alt="tuvi2018">
                    </div>
                    <div class="col-md-8">
                        <a href="<?php echo base_url('tu-vi-2018.html'); ?>">Xem tử vi 2018</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 tool_view_much">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url('media/images/menu/boi-cung-menh.png'); ?>" alt="tuvi">
                    </div>
                    <div class="col-md-8">
                        <a href="<?php echo base_url(); ?>">Xem tử vi hàng ngày</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 tool_view_much">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url('media/images/menu/boi%20bien%20so%20xe.png'); ?>" alt="ngaytotxau">
                    </div>
                    <div class="col-md-8">
                        <a href="<?php echo base_url('xem-ngay-tot-xau.html'); ?>">Xem ngày tốt xấu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 tool_view_much">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url('media/images/menu/boi-so-dien-thoai.png') ?>" alt="boi so dien thoai">
                    </div>
                    <div class="col-md-8">
                        <a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>">Xem bói số điện thoại</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 tool_view_much">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url('media/images/menu/iconb.png'); ?>" alt="tuoi lam an">
                    </div>
                    <div class="col-md-8">
                        <a href="<?php echo base_url('tuoi-lam-an.html'); ?>">Xem tuổi hợp làm ăn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    function show_lich()
      { 
         var frm = document.showngay;
         var ngay = $('#show_ngay').val();
         var thang = $('#show_thang').val();
         var nam = $('#show_nam').val();
         var domain = '<?php echo base_url(); ?>';
         var link = 'xem-lich-van-nien-ngay';
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
                       
                       frm.action = domain + link;
                       $('.ln_content').html(data.html);
            },
            error: function(e) {
              console.log(e)
            }
          });
      }
    
    
       function sumit_form_lichtheothang() {
         var frame = document.lichtheothang;
         var thang = $('#thang_lichthang').val();
         var nam   = $('#nam_lichthang').val();
         var link  = 'xem-lich-van-nien/lich-thang-'+thang+'-nam-'+nam+'.html';
         var domain = '<?php echo base_url(); ?>';
         frame.action = domain + link;
       }
       // doi ngay
       $('#doiduong').on('click',function(){
           var frame = document.formdoingay; 
           var doingay_ngay = $('#doingay_ngay').val();
           var doingay_thang = $('#doingay_thang').val();
           var doingay_nam = $('#doingay_nam').val();
           var link = 'doi-ngay-duong-lich-sang-am-lich.html';
           var domain = '<?php echo base_url(); ?>';
           frame.action = domain + link;
       });
    
       $('#doiam').on('click',function(){
           var frame = document.formdoingay; 
           var doingay_ngay = $('#doingay_ngay').val();
           var doingay_thang = $('#doingay_thang').val();
           var doingay_nam = $('#doingay_nam').val();
           var link = 'doi-ngay-am-lich-sang-duong-lich.html';
           var domain = '<?php echo base_url(); ?>';
           frame.action = domain + link;
       });
</script>