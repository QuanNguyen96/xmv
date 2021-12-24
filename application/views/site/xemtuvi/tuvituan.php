<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix">
  	<div class="box_content">
       <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
       <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="text-center">
        <p><i>Quý bạn hãy nhập đầy đủ thông tin để nhận được kết quả tốt nhất</i></p>
    </div>
    <form action="" method="POST" name="form_tuvingay">
        <div class="form-group">
            <div class="col-md-3">
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
        <div class="text-center clear">
            <button type="submit" class="button" id="xemtuvi_ngay">Xem ngay</button>
        </div>
    </form> 
    </div>
    <div class="field">
        <?php if (isset($total_info) && !empty($total_info)): ?>
            <table class="table table-bordered bg" cellpadding="0" cellspacing="0">
                <tbody>
                    <?php foreach ($total_info as $key => $value): ?>
                        <tr>
                            <td>
                                <div class="text-center"><a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['ngay'].'-thang-'.$value['thang'].'-nam-'.$value['nam'].'.html'); ?>"><?php echo $value['ngay'].'<br>'.$value['thang'].'<br>'.$value['nam']; ?></a>
                                </div>
                                
                            </td>
                            <td width="20%" class="text-center">
                                <b class="">Sao <?php echo $value['content'][2]['name']; ?></b>
                                <div><?php echo $value['content'][2]['title']; ?></div>
                            </td>
                            <td class="text-justify">
                               <div><span class=""><b class="">Nên Làm:</b></span> <?php echo $value['content'][2]['nenlam']; ?></div>
                               <div><b>Kị Làm:</b> <?php echo $value['content'][2]['kilam']; ?></div>
                            </td>
                            <td width="20%" style="vertical-align: middle; text-align: center;">
                                <a href="<?php echo base_url('tu-vi-hang-ngay/tu-vi-ngay-'.$value['ngay'].'-thang-'.$value['thang'].'-nam-'.$value['nam'].'.html'); ?>"><b>Xem tử vi ngày <?php echo $value['ngay'].'/'.$value['thang'].'/'.$value['nam']; ?></b></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

              <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
              <?php $this->load->view('site/import/form_tv_2021'); ?>
            <div class="">
                <div class="box_content">
                    <div class="box_content_tt1">
                      Các công cụ Xem bói - Tử vi liên quan
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
                            <div class="text-center">
                                  <div class="thumbnail">
                                    <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                                  </div>
                                  <div>Tử vi hàng ngày</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('xem-boi-bai-thoi-van.html'); ?>">
                            <div class="text-center">
                                    <div class="thumbnail">
                                        <img src="<?php echo base_url('templates/site/images/anhdaidien/thoi-van.jpg'); ?>" alt="">
                                    </div>
                                    <div>Xem bói bài thời vận</div>
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
                      <a href="<?php echo base_url('tu-vi-hang-thang.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-thang.jpg'); ?>" alt="">
                            </div>
                            <div>Tử vi hàng tháng</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                            </div>
                            <div>Bói bài hàng ngày</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('quan-am-linh-xam.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/quan-am-linh-xam.jpg'); ?>" alt="">
                            </div>
                            <div>Xin xăm quan âm</div>
                        </div>
                      </a>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
 	<div class="field clearfix">
      	<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
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
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
        </div>
    </div>
</div>