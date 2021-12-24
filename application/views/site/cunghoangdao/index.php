 <div class="">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?> 
</div>
<div class=" clearfix">
    <div class="">
        <h1 class="cunghoangdao_heading"><?php echo $this->my_seolink->get_name(); ?></h1>
        <?php $this->load->view('site/adsen/code1');?>
        <div class="field clearfix">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
        <div class="list_cung">
        	<div class="row">
        		<?php foreach ($list_cung_name as $key => $value): 
                        $link = base_url($cung_hoang_dao_12_cung[$key]);
                ?>
                <div class="col-md-2 col-xs-3 list_cung_item">
        			<a href="<?php echo $link; ?>" class="">
        				<img src="<?php echo base_url('templates/site/images/cunghoangdao/cung/'.$key.'.png');?>" alt="<?php echo $value;?>" title="<?php echo $value;?>">
        				<p class="cung_title"><?php echo $value;?></p>
        				<p class="cung_ngay"><?php echo $list_cung_ngay[$key];?></p>
        			</a>
        		</div>
                <?php endforeach ?>
        	</div>
        </div>
        <?php $this->load->view('site/import/form_cung_hoang_dao_hop_nhau');?>
        <div class="chd_box">
        	<div class="row">
        		<div class="col-md-6 chd_box_item">
        			<div class="chd_box_item_content">
        				<div class="chd_box_item_content_img">
        					<img src="<?php echo base_url('templates/site/images/cunghoangdao/icon_tinh_yeu.png'); ?>" alt=" ">
        				</div>
        				<div class="chd_box_item_content_title"><a href="<?php echo base_url('bi-mat-tinh-yeu-12-cung-hoang-dao-A2140.html'); ?>">Tình yêu</a></div>
        				<div  class="chd_box_item_content_ct">
        					Khám phá đặc điểm <a href="<?php echo base_url('bi-mat-tinh-yeu-12-cung-hoang-dao-A2140.html'); ?>">tình yêu 12 cung hoàng đạo</a>. Giải mã dấu hiệu 12 cung hoàng đạo khi yêu thật lòng, khi họ ghen, đơn phương và bật mí cách chinh phục 12 chòm sao theo từng bước
        				</div>
        			</div>
        		</div>
        		<div class="col-md-6 chd_box_item chd_box_ban_do">
        			<div class="chd_box_item_content">
        				<div class="chd_box_item_content_img">
        					<img src="<?php echo base_url('templates/site/images/cunghoangdao/icon_ban_do.png'); ?>" alt=" ">
        				</div>
        				<div class="chd_box_item_content_title"><a href="<?php echo base_url('cach-doc-ban-do-sao-ca-nhan-mien-phi-A2033.html'); ?>">Bản đồ sao cá nhân</a></div>
        				<div class="chd_box_item_content_ct">
        					<a href="<?php echo base_url('cach-doc-ban-do-sao-ca-nhan-mien-phi-A2033.html'); ?>">Bản đồ sao cá nhân (Natal Chart)</a> là gì?  Hướng dẫn cách lấy và đọc bản đồ sao miễn phí. Ngoài ra bạn có thể tìm hiểu về đặc điểm <a href="<?php echo base_url('cung-mat-trang-cua-12-cung-hoang-dao-A2136.html'); ?>">cung mặt trăng</a> ở 12 cung hoàng đạo
        				</div>
        			</div>
        		</div>
        		<div class="col-md-6 chd_box_item chd_box_y_nghia_ngay_sinh">
        			<div class="chd_box_item_content">
        				<div class="chd_box_item_content_img">
        					<img src="<?php echo base_url('templates/site/images/cunghoangdao/icon_ngay_sinh.png'); ?>" alt=" ">
        				</div>
        				<div class="chd_box_item_content_title"><a href="<?php echo base_url('xem-ban-thuoc-cung-hoang-dao-nao-A2139.html'); ?>">Ý nghĩa ngày sinh <br/> cung hoàng đạo</a></div>
                        <div class="form_y_nghia_ngay_sinh_chd">
                            <form action="" method="post" id="<?php echo 'cung_hoang_dao_ngay_sinh_'.md5(time());?>" onsubmit="cung_hoang_dao_ngay_sinh(this.id); return false;">
                                <div>
                                    <select name="ngay_sinh" required="">
                                        <option value="">Ngày sinh</option>
                                        <?php for ($i=1; $i <= 31 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor; ?> 
                                    </select>
                                    <select name="thang_sinh" required="">
                                        <option value="">Tháng sinh</option>
                                        <?php for ($i=1; $i <= 12 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor; ?>    
                                    </select>
                                </div>
                                <div>
                                    <button type="submit">Xem đặc điểm</button>
                                </div>
                            </form>
                        </div>
        				<div  class="chd_box_item_content_ct">
        					<a href="<?php echo base_url('xem-ban-thuoc-cung-hoang-dao-nao-A2139.html'); ?>">Bạn là cung gì trong 12 cung hoàng đạo</a> và đặc điểm chi tiết về cung hoàng đạo sinh ngày này trong chiêm tinh học
        				</div>
        			</div>
        		</div>
        		<div class="col-md-6 chd_box_item chd_box_tinh_cach">
        			<div class="chd_box_item_content">
        				<div class="chd_box_item_content_img">
        					<img src="<?php echo base_url('templates/site/images/cunghoangdao/icon_tinh_cach.png'); ?>" alt=" ">
        				</div>
        				<div class="chd_box_item_content_title"><a href="<?php echo base_url('dac-diem-tinh-cach-12-cung-hoang-dao-A2135.html'); ?>">Tính cách <br/> 12 cung hoàng đạo</a></div>
        				<div class="chd_box_item_content_ct">
        					Nhận dạng đặc điểm tính cách các cung hoàng đạo theo nam và nữ. Xem chi tiết tính cách chòm sao của bạn:
        				</div>
                        <div class="row chd_box_tinh_cach_ul">
                            <ul class="col-md-6 col-xs-6">
                                <li>1. <a href="<?php echo base_url('tinh-cach-cua-cung-bach-duong-A1600.html'); ?>">Bạch Dương</a></li>
                                <li>2. <a href="<?php echo base_url('tinh-cach-cua-cung-kim-nguu-A1602.html'); ?>">Kim Ngưu</a></li>
                                <li>3. <a href="<?php echo base_url('tinh-cach-cua-cung-song-tu-A1603.html'); ?>">Song Tử</a></li>
                                <li>4. <a href="<?php echo base_url('tinh-cach-cua-cung-cu-giai-A1604.html'); ?>">Cự Giải</a></li>
                                <li>5. <a href="<?php echo base_url('tinh-cach-cua-cung-su-tu-A1605.html'); ?>">Sư Tử</a></li>
                                <li>6. <a href="<?php echo base_url('tinh-cach-cua-cung-xu-nu-A1606.html'); ?>">Xử Nữ</a></li>
                            </ul>
                            <ul class="col-md-6 col-xs-6">
                                <li>7. <a href="<?php echo base_url('tinh-cach-cua-cung-thien-binh-A1607.html'); ?>">Thiên Bình</a></li>
                                <li>8. <a href="<?php echo base_url('tinh-cach-cua-cung-bo-cap-A1609.html'); ?>">Bọ Cạp</a></li>
                                <li>9. <a href="<?php echo base_url('tinh-cach-cua-cung-nhan-ma-A1610.html'); ?>">Nhân Mã</a></li>
                                <li>10. <a href="<?php echo base_url('tinh-cach-cua-cung-ma-ket-A1611.html'); ?>">Ma Kết</a></li>
                                <li>11. <a href="<?php echo base_url('tinh-cach-cua-cung-bao-binh-A1612.html'); ?>">Bảo Bình</a></li>
                                <li>12. <a href="<?php echo base_url('tinh-cach-cua-cung-song-ngu-A1613.html'); ?>">Song Ngư</a></li>
                            </ul>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="cung_hoang_dao_text">
            <?php echo $this->my_seolink->get_text_content(); ?>
        </div>
        <?php $this->load->view('site/import/form_cung_hoang_dao_nhom_mau');?>
        <div class="cung_hoang_dao_text">
            <?php echo $this->my_seolink->get_text_foot(); ?>
        </div>
    </div>
</div>        