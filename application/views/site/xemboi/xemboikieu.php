<div class="box_xvm">
    <style>
        fieldset 
        {
            border: 1px solid #ddd !important;
            margin: 0;
            /*xmin-width: 0;*/
            padding: 10px;       
            position: relative;
            border-radius:4px;
            background-color: #841012;
            padding-left:10px!important;
        }   
    
        legend
        {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0px;
            width: 35%;
            border-radius: 4px;
            color: #fff;
            padding: 5px 5px 5px 10px;
            background-color: #af5719;
        }
    </style>
    <div class="col-md-12">
        <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
            <?php echo $breadcrumb; ?>
        <?php endif ?>
    </div>
    <div class="box_content">
        <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
        <?php $this->load->view('site/adsen/code1');?>
    <?php if (!$_POST): ?>
        <div class="field clearfix">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
    <?php endif ?>
    
    <div class="text-center">
        <p><i>Quý bạn hãy nhập đầy đủ thông tin để nhận được kết quả tốt nhất nhất</i></p>
    </div>
    <form action="/xem-boi-kieu.html" method="POST" name="form_boikieu">
        <div class="form-group">
            <div class="col-md-3">
                <span>Ngày sinh</span>
            </div>
            <div class="col-md-3">
                <select name="ngaysinh" id="ngayysinh" class="myinput" required="">
                    <?php for($i=1;$i<=31;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('ngaysinh',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="thangsinh" id="thang_sinh" class="myinput"  required="">
                    <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('thangsinh',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="namsinh" class="myinput"  id="nam_sinh">
                    <?php foreach (list_age_text() as $key => $value): ?>
                        <option value="<?php echo $key; ?>" <?php echo set_select('namsinh',$key); ?> <?php if ($value == 1990): ?>
                            <?php echo 'selected=""'; ?>
                        <?php endif ?>><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <span>Giới tính</span>
            </div>
            <div class="col-md-3">
                <select name="gioitinh" id="" required="">
                    <?php 
                        $slt = '';
                        $slt1 = '';
                        if (isset($gioitinh_slug) && $gioitinh_slug =='nam') {
                            $slt = 'selected=""';
                        }
                        if (isset($gioitinh_slug) && $gioitinh_slug =='nu') {
                            $slt1 = 'selected=""';
                        }

                    ?>
                    <option value="nam" <?php echo $slt; ?>>Nam</option>
                    <option value="nu" <?php echo $slt1; ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="text-center clear">
            <button type="submit" class="button" id="xemtuvi_ngay">Xem ngay</button>
        </div>
    </form>
    </div>
    <?php if (isset($tho_show) && !empty($tho_show)): ?>
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                <b class="text-danger">Bói kiều tình yêu ứng với bản mệnh của gia chủ</b>
            </div>
            <div class="panel-body">
                <?php echo $tho_show['noidung']; ?>
            </div>
        </div>
        <div class="dieuhuong_tu_vi_2020">
                <a class="nut_ban_repon" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">XEM BÓI TÌNH YÊU NĂM 2021</a>
                <a class="nut_ban_repon" href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html'); ?>">XEM BÓI TÌNH YÊU NĂM 2020</a>
        </div>
        <?php if ($tho_show['dieu_huong']): ?>
            <div class="text-center">
                 <fieldset class="col-md-12">        
                    <legend>Thông Báo</legend>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php echo $tho_show['dieu_huong']; ?>
                        </div>
                    </div>
                </fieldset> 
            </div>
        <?php endif ?>

        <?php if ($_POST): ?>
            <div class="field">
                <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
            </div>
        <?php endif ?>
        <?php if ($_POST): ?>
            <div class="field clearfix">
                <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
            </div>
        <?php endif ?>
        <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
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