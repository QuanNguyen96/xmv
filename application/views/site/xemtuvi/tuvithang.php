<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix">
  	<div class="box_content">
       <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="text-center">
        <p><i>Quý bạn hãy nhập đầy đủ thông tin để nhận được kết quả tốt nhất</i></p>
    </div>
    <?php
        $iNamsinh = isset($iNamsinh)?$iNamsinh:'canh-ngo';
        $iThangxem = isset($iThangxem)?$iThangxem:6;
        $iNamxem = isset($iNamxem)?$iNamxem:date('Y');
    ?>
    <form action="" method="POST" name="form_tuvithang">
        <div class="form-group">
            <div class="col-md-3" align="right">
                <span>Năm sinh:</span>
            </div>
            <div class="col-md-9">
                <select name="namsinh" id="nam_sinh">
                    <?php foreach (list_age_text() as $key => $value): ?>
                        <?php $selected = $iNamsinh==$key?'selected=""':''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group clear">
            <div class="col-md-3" align="right">
                <span>Tháng xem</span>
            </div>
            <div class="col-md-3">
                <select name="thangxem" id="thang_xem" required="">
                    <?php for($i=1;$i<=12;$i++): ?>
                        <?php $selected = $iThangxem==$i?'selected=""':''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col-md-3" align="right">
                <span>Năm xem</span>
            </div>
            <div class="col-md-3">
                <select name="namxem" id="nam_xem" required="">
                    <?php for($i=date('Y');$i<= 2050;$i++): ?>
                        <?php $selected = $iNamxem==$i?'selected=""':''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="text-center clear">
            <button type="submit" class="button" id="xemtuvi_thang">Xem ngay</button>
        </div>
    </form> 
    </div>
    <div class="field">
        <?php if (isset($total_info) && !empty($total_info)): ?>
            <table class="table table-bordered bg" cellpadding="0" cellspacing="0">
                <tbody>
                    <?php foreach ($total_info as $key => $value): ?>
                        <tr>
                            <td style="vertical-align: middle;">
                                <div class="text-center"><a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['ngay'].'-thang-'.$value['thang'].'-nam-'.$value['nam'].'.html'); ?>"><?php echo $value['ngay'].'<br>'.$value['thang'].'<br>'.$value['nam']; ?></a>
                                </div>
                            </td>
                            <td width="30%" class="text-center">
                                <b class="text-success">Sao <?php echo $value['content'][2]['name']; ?></b>
                                <div><?php echo $value['content'][2]['title']; ?></div>
                            </td>
                            <td class="text-justify">
                               <div><span class="text-danger"><b>Nên Làm</b>:</span> <?php echo $value['content'][2]['nenlam']; ?></div>
                               <div><b>Kị Làm:</b> <?php echo $value['content'][2]['kilam']; ?></div>
                            </td>
                            <td width="20%" class="text-center" style="vertical-align: middle;">
                                <b><a href="<?php echo base_url('tu-vi-hang-ngay/tu-vi-ngay-'.$value['ngay'].'-thang-'.$value['thang'].'-nam-'.$value['nam'].'.html'); ?>">Xem tử vi ngày <?php echo $value['ngay'].'/'.$value['thang'].'/'.$value['nam']; ?></a></b>
                            </td>
                        </tr>
                        <?php if ($value['ngay'] == date('j')): ?>
                            <tr>
                                <td colspan="4" style="background-color: #fff;">
                                    <div class="alert alert-success">
                                        <p>Tử vi hàng tháng đã giúp quý bạn xem tử vi từng ngày trong tháng của bạn như thế nào. Thế nhưng để nắm bắt tài vận cũng như phòng tránh hoạn nạn thì quý bạn cần nắm bắt "Cuộc Đời" của chính mình. Để đạt được điều này, quý bạn có thể khám phá tại <span class="btn_nhaynhay"></span> <a style="color: blue;" href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>"><b> Lấy lá số tử vi trọn đời có bình giải </b></a></p>
                                    </div>
                                    <div class="text-center">
                                        Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất
                                    </div>
                                    <form name="" action="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" method="post">
                                        <div class="field">
                                            <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 col-md-offset-3 col-xs-12">
                                                <input type="text" name="hovaten" value="" placeholder="Nhập họ và tên" required="" />
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <select name="gioitinh" required="">
                                                    <option value="">Giới tính</option>
                                                    <option value="1">Nam giới</option>
                                                    <option value="0">Nữ giới</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
                                                <select name="ngay" required="">
                                                    <option value="">Ngày sinh dương</option>
                                                    <?php 
                                                        for( $i = 1; $i<= 31; $i++ ){
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-4">
                                                <select name="thang" required="">
                                                    <option value="">Tháng</option>
                                                    <?php 
                                                        for( $i = 1; $i<= 12; $i++ ){
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-4">
                                                <select name="nam" required="">
                                                    <option value="">Năm</option>
                                                    <?php 
                                                        for( $i = 1950; $i<= 2040; $i++ ){
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 col-xs-8">
                                                <select name="gio" required="">
                                                    <option value="">Giờ sinh</option>
                                                    <?php 
                                                        $list_gio_sinh_operator = list_gio_sinh_operator();
                                                        ?>
                                                    <?php foreach ($list_gio_sinh_operator as $key => $value): ?>
                                                        <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-4">
                                                <select name="namxem" required="">
                                                    <option value="">Năm xem</option>
                                                    <?php 
                                                        for( $i = 2015; $i<= 2040; $i++ ){
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field field_center">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="button">Xem kết quả</button>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php
                                                    if ($this->session->has_userdata('message')) {
                                                         echo $this->session->userdata('message');
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                        <input type="hidden" name="lich" value="1" />
                                    </form>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
             
            <?php //$this->load->view('site/import/box_dieuhuong2019'); ?>
            <?php $this->load->view('site/import/form_tv_2021'); ?>
            <?php if (isset($post)): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box_content">
                        <div class="box_content_tt1">
                          Các công cụ Xem bói - Tử vi liên quan
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>">
                                <div class="text-center">
                                      <div class="thumbnail">
                                        <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-tinh-yeu.jpg'); ?>" alt="">
                                      </div>
                                      <div>Bói bài tình yêu</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <a href="<?php echo base_url('xem-boi-bai-thoi-van.html'); ?>">
                                <div class="text-center">
                                        <div class="thumbnail">
                                            <img src="<?php echo base_url('templates/site/images/anhdaidien/thoi-van.jpg'); ?>" alt="">
                                        </div>
                                        <div>Xem bói bài thời vận</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-xs-6">
                          <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>">
                            <div class="text-center">
                                <div class="thumbnail">
                                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-tron-doi.jpg'); ?>" alt="">
                                </div>
                                <div>Tử vi trọn đời</div>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-4 col-xs-6">
                          <a href="<?php echo base_url('quan-am-linh-xam.html'); ?>">
                            <div class="text-center">
                                <div class="thumbnail">
                                  <img src="<?php echo base_url('templates/site/images/anhdaidien/quan-am-linh-xam.jpg'); ?>" alt="">
                                </div>
                                <div>Gieo quẻ quan âm</div>
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
                          <a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">
                            <div class="text-center">
                                <div class="thumbnail">
                                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-tuoi-vo-chong.jpg'); ?>" alt="">
                                </div>
                                <div>Xem tuổi vợ chồng</div>
                            </div>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
        <?php endif ?>
    </div>
 	<div class="field clearfix">
      	<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    </div>
    <?php $this->load->view('site/adsen/code_migd'); ?>
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
		$('#xemtuvi_thang').on('click',function(){
			var frame 	= document.form_tuvithang;
			var thang 	= $('#thang_xem').val();
			var nam 	= $('#nam_xem').val();
			var link 	= 'tu-vi-hang-thang/tu-vi-thang-'+thang+'-nam-'+nam+'.html';
			var domain 	= '<?php echo base_url(); ?>';
			frame.action = domain + link;
		});
	});
</script>