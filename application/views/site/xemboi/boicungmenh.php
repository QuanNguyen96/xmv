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
    <div class="field">
        <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text()); ?></div>
    </div>
    <div class="text-center">
        <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    </div>
    <form name="form_boicungmenh" action="" method="post" class="clearfix">
       <div class="field text-center">
         <div class="col-md-3 col-md-offset-3">
             <select name="namsinh" id="namsinh">
               <?php for($i=1950;$i<=date('Y');$i++): ?>
                <?php $selected = $iNamsinh==$i?'selected=""':''; ?>
                  <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <?php endfor ?>
             </select>
         </div>
         <div class="col-md-3">
             <select name="gioitinh" id="gioitinh">
               <option value="nam" <?php echo $iSlug_gioitinh=='nam'?'selected=""':''; ?>>Nam giới</option>
               <option value="nu" <?php echo $iSlug_gioitinh=='nu'?'selected=""':''; ?>>Nữ giới</option> 
            </select>
         </div>
       </div>
       <div class="field field_center">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button" id="btn_boicungmenh">Xem kết quả</button>
          </div>
       </div>
    </form>
    <div class="">
    <?php if (isset($mang2)): ?>
        <div class="box_aside_tt1 clear">Thông tin của bạn</div>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo base_url('templates/site/images/senok.jpg'); ?>" alt="img">
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="40%">Năm sinh Dương lịch</td>
                        <td><?php echo $namsinh; ?></td>
                    </tr>
                    <tr>
                        <td width="40%">Năm sinh Âm lịch</td>
                        <td><?php echo $info_user['namcanchi']; ?></td>
                    </tr>
                    <tr>
                        <td width="40%">Cung mệnh</td>
                        <td><?php echo $que_menh; ?></td>
                    </tr>
                    <tr>
                        <td width="40%">Mệnh ngũ hành</td>
                        <td><?php echo $info_user['lucthap']['nghiahan'].' '.$info_user['lucthap']['he']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <table class="table table-bordered" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <td class="text-center" style="background-color: #a94442; color: #fff;"><b>Màu hợp</b></td>
                    <td class="text-center" style="background-color: #000; color: #fff;"><b>Màu kỵ</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="50%"><?php echo $mauhop['hop']; ?></td>
                    <td width="50%"><?php echo $mauhop['ky']; ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr >
                    <th class="text-center" style="background-color: #a94442; color: #fff;">Số hợp mệnh</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        <p>Mệnh của bạn thuộc <b><?php echo $info_user['lucthap']['he'] ?></b> hợp với các số: <?php echo $sohop; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <section class="">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-center" width="50%" style="background-color: #a94442; color: #fff;"><b>Hướng tốt</b></td>
                        <td  width="50%" class="text-center" style="background-color: #000; color: #fff;"><b>Hướng xấu</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php foreach ($mangketqua as $key => $value) {
                                echo $value.'<br>';
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($mangketqua1 as $key => $value) {
                                echo $value.'<br>';
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <?php if(isset($dieu_huong_tv_2020_link)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="notification_tuvi_2020">
                    <ul>
                        <li>
                          <a href="<?php echo $dieu_huong_tv_2020_link; ?>">
                             <?php echo $dieu_huong_tv_2020_text; ?>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="clearfix">
            <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
        </div>
        <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
    <?php endif ?>
    </div>
    <div class="row">
        <div class="col-md-12"><?php echo str_replace($arr_search,$arr_replace, $this->my_seolink->get_text_foot()); ?></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
    </div>
    <?php $this->load->view('site/sh_comment/get_by_theme'); ?>

 </div>
<script>
    $(document).ready(function(){
        $('#btn_boicungmenh').on('click',function(){
            var frame = document.form_boicungmenh;
            var namsinh = frame.namsinh.value;
            var gioitinh = frame.gioitinh.value;
            var link = 'xem-boi-cung-menh-theo-nam-sinh/'+gioitinh+'-sinh-nam-'+namsinh+'-menh-gi-cung-gi.html';
            var domain = '<?php echo base_url(); ?>';
            frame.action = domain + link;
        });
    }) ;
</script>