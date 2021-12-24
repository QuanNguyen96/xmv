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
                <label>Ngày sinh: </label>
            </div>
            <div class="col-md-3">
                <select name="ngaysinh" id="ngayysinh" required="">
                    <?php for($i=1;$i<=31;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('ngaysinh',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="thangsinh" id="thang_sinh" required="">
                    <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('thangsinh',$i); ?>><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="namsinh" id="nam_sinh">
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
                <label>Giờ sinh: </label>
            </div>
            <div class="col-md-9">
                <select name="giosinh" id="" class="form-control">
                    <option value="">Giờ sinh</option>
                    <option value="24">giờ Tý (23h-1h)</option>
                    <option value="2">giờ Sửu (1h-3h)</option>
                    <option value="4">giờ Dần (3h-5h)</option>
                    <option value="6">giờ Mão (5h-7h)</option>
                    <option value="8">giờ Thìn (7h-9h)</option>
                    <option value="10">giờ Tị (9h-11h)</option>
                    <option value="12">giờ Ngọ (11h-13h)</option>
                    <option value="14">giờ Mùi (13h-15h)</option>
                    <option value="16" selected="">giờ Thân (15h-17h)</option>
                    <option value="18">giờ Dậu (17h-19h)</option>
                    <option value="20">giờ Tuất (19h-21h)</option>
                    <option value="22">giờ Hợi (21h-23h)</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <label>Giới tính: </label>
            </div>
            <div class="col-md-3">
                <select name="gioitinh" id="">
                    <option value="nam">Nam</option>
                    <option value="nu">Nữ</option>
                </select>
            </div>
        </div>
        <div class="text-center clear">
            <button type="submit" class="button" id="xemtuvi_ngay">Xem ngay</button>
        </div>
    </form> 
    </div>
    <div class="field clearfix">
        <?php if (isset($content)): ?>
            <div class="alert alert-success text-center"><b>Phép cân xương tính số ứng chiếu bản mệnh cho kết quả bằng <?php echo $total_luongCanXuong; ?> Lượng <?php echo $total_chiCanXuong; ?> Chỉ</b></div>
            <div class="alert alert-info">
                <p><?php echo $content['luan_so']; ?></p>
                <p><?php echo $content['tho']; ?></p>
                <p><?php echo $content['nghia_tho']; ?></p>
            </div>
            <?php $this->load->view('site/import/box_dieuhuong2019'); ?>
            <div class="alert alert-success">
                <p>Phép cân xương tính số đời chỉ mới chỉ nói sơ lược cuộc đời của quý bạn. Để tìm hiểu chi tiết và chính xác về <b>"Vận Mạng"</b> của mình, quý bạn cần khám phá <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>"><b>Lá số tử vi có bình giải</b></a></p>
            </div>
            <div class="alert alert-success">
                <p>
                    <b>Ngoài ra:</b> quý bạn cũng nên khám phá cuộc đời mình qua phép <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>"><b>Xem bói ngày sinh</b></a>  Những điểm nổi bật về cuộc sống của quý bạn sẽ được thể hiện thông qua ngày sinh của mình.
                </p>
            </div>
            <div class="col-md-12">
                <div class="box_content">
                    <div class="box_content_tt1">
                      Các công cụ Xem bói - Tử vi liên quan
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('xem-lich-am-duong-2018.html'); ?>">
                            <div class="text-center">
                                  <div class="thumbnail">
                                    <img src="<?php echo base_url('templates/site/images/anhdaidien/am-duong-2018.jpg'); ?>" alt="">
                                  </div>
                                  <div>Lịch âm dương 2018</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="<?php echo base_url('xem-lich-van-nien.html'); ?>">
                            <div class="text-center">
                                    <div class="thumbnail">
                                        <img src="<?php echo base_url('templates/site/images/anhdaidien/lich-van-nien.jpg'); ?>" alt="">
                                    </div>
                                    <div>Xem âm lịch hôm nay</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('xem-boi-cung-menh-theo-nam-sinh.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/cung-menh.jpg'); ?>" alt="">
                            </div>
                            <div>Xem bói cung mệnh</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ten.jpg'); ?>" alt="">
                            </div>
                            <div>Xem bói tên</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-vo-chong.jpg'); ?>" alt="">
                            </div>
                            <div>Xem tuổi vợ chồng</div>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                      <a href="<?php echo base_url('gieo-que-dich-so.html'); ?>">
                        <div class="text-center">
                            <div class="thumbnail">
                              <img src="<?php echo base_url('templates/site/images/anhdaidien/gieo-que-dinh-dich.jpg'); ?>" alt="">
                            </div>
                            <div>Gieo Quẻ Kinh Dịch</div>
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
    <div class="field clearfix">
        <div class="row">
            <div class="col-md-12">
               <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
            </div> 
        </div>
    </div>
</div>