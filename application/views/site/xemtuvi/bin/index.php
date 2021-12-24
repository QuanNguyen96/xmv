<link rel="stylesheet" href="<?php echo base_url('templates/site/css/laso_html.css'); ?>" />
<div class="box_content box_xvm box_ngaytotxau clearfix">
    <h1 class="box_content_tt">XEM LÁ SỐ TỬ VI TRỌN ĐỜI</h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
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
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                <?php if( isset($html) ) echo $html; ?>
            </div>
            <div class="col-md-12">
                <?php echo $this->my_seolink->get_text_foot(); ?>
            </div>
            <div class="col-md-12">
                <?php if( isset($luangiai) ):?>
                    
                    <?php if (isset($luangiai) && !empty($luangiai)): 
                        $search = array('["','"]','","','\"');
                        $replace = array('','','','');
                    ?>
                    <div class="viktor">
                        <div>
                            <div class="text_all" style="text-align: center;">
                                <p class="tableOfContent" style="font-weight: bold;text-align: center;">NỘI DUNG BÌNH GIẢI LÁ SỐ TỬ VI TRỌN ĐỜI CỦA BẠN:</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                $i = 1; 
                            ?>
                            <div class="col-md-12">
                                <div class="text_all">
                                    <p class="tableOfContent text-center" style="font-weight: bold;color: #214806;">Xem tử vi trên các phương diện cuộc sống:</p>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="tongquat"><b><?php echo $i++; ?>: Tổng Quan</b></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['tong_quan']); ?></div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungthan"><b><?php echo $i++; ?>: Cung Thân</b></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_than']); ?></div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungmenh"><b><?php echo $i++; ?>: Cung Mệnh</b> <i>(Xem chí hướng, tính cách và khả năng của bạn)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_menh']); ?></div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungquanloc"><b><?php echo $i++; ?>: Cung Quan Lộc</b> <i>(Xem công danh - Sự nghiệp và học vấn)</i></p>
                                    <div class="boxAfterLaso">
                                        <?php echo str_replace($search,$replace,$luangiai['cung_quanloc']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Phận giàu hay nghèo vốn đã được định sẵn ngay từ khi chào đời. Ấy vậy mà “Nhân định sẽ thắng Thiên”. Bởi lẽ đó, con người dùng <b><a href="<?php echo base_url('xem-boi-so-dien-thoai.html') ?>">Sim Phong Thủy hợp tuổi</a></b> đổi vận của chính mình. Sim hợp tuổi kích công danh, thúc đẩy sự nghiệp giúp công danh sự nghiệp đang thăng thì càng thăng như diều gặp gió. Còn nếu trì trệ sẽ đón nhiều cơ hội và may mắn hơn.</p>
                                            <p><span class="btn_nhaynhay"></span>Công Danh, Học Tập và Nghề Nghiệp của con người thay đổi ở mỗi thời điểm. Có lúc thăng, cũng có lúc trầm. Điều này được thể hiện rất rõ trong lá số tử vi của quý bạn. Vận số là vậy nhưng chúng ta có thể cải biến bằng cách sử dụng <b><a href="<?php echo base_url('xem-mau-hop-menh/menh-'.$this->vnkey->format_key($info_user['lucthap']['he']).'-hop-mau-gi.html') ?>">màu hợp mệnh <?php echo $info_user['lucthap']['he'] ?></a>.</b> Tận dụng màu sắc hợp mệnh vạn việc công danh sự nghiệp của bạn sẽ có cơ hội gặp dữ hóa lành, hung hiểm hóa hanh cát.</p>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungtaibach"><b><?php echo $i++; ?>: Cung Tài Bạch</b><i>(Xem về tài lộc và tiền của)</i></p>
                                    <div class="boxAfterLaso">
                                        <?php echo str_replace($search,$replace,$luangiai['cung_taibach']); ?>
                                        
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Tiền tài, kinh doanh của quý bạn may hay khó đều được thể hiện rất rõ trong lá số tử vi. Nếu muốn kích tài vận trọn đời, quý bạn cần chọn <b><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$this->vnkey->format_key($canchi).'-sinh-nam-'.$namsinh.'-hop-lam-an-voi-tuoi-nao.html') ?>">tuổi <?php echo $canchi ?> hợp làm ăn với tuổi nào</a></b>? Yếu tố này đóng vai trò vô cùng to lớn đến thành - bại trong việc làm ăn của quý bạn.</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungthiendi"><b><?php echo $i++; ?>: Cung Thiên Di</b><i>(Xem về việc xuất hành đi xa và đối ngoại)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_thiendi']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Nếu cung Thiên Di cho biết được tốt xấu trong việc đối nội, đối ngoại, kết quả của những chuyến đi xa thì quý bạn hoàn toàn có thể chủ động thay đổi được kết quả công việc này bằng cách <b><a href="<?php echo base_url('xem-ngay-tot-xuat-hanh.html') ?>">Xem ngày xuất hành hợp tuổi <?php echo $canchi; ?></a></b>. Chọn được ngày xuất hành tốt âu vạn sự ắt được hanh thông, thuận lợi.</p>
                                        </div> 
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungphucduc"><b><?php echo $i++; ?>: Cung Phúc Đức</b> <i>(Xem về thọ, yếu, thịnh suy, tụ tán của họ hàng)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_phucduc']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Để đời người luôn hoan hỷ, giảm bớt u sầu thì trước mỗi công việc hay biến cố quý bạn nên thành tâm xin quẻ <b><a href="<?php echo base_url('quan-am-linh-xam.html') ?>">Quan âm Linh Xám</a></b>. Quẻ này giúp quý bạn luôn vững tâm lấy an ổn vinh hoa làm vốn quý trong cuộc sống đầy duyên nghiệp này.</p>
                                        </div> 
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungphuthe"><b><?php echo $i++; ?>: Cung Phu Thê</b> <i>(Xem về tình duyên vợ chồng)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_phuthe']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Thông qua luận giải lá số tử vi thì quý bạn đã biết được đời sống hôn nhân của mình rồi. Còn muốn biết cụ thể xem vợ chồng mình hợp - khắc ở điểm nào thì mời quý bạn  tham khảo tại <b><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html') ?>">Xem tuổi vợ chồng</a></b>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungtutuc"><b><?php echo $i++; ?>: Cung Tử Tức</b><i>(Xem về đường con cái)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_tutuc']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Trong mối quan hệ giữa bố mẹ và con cái có khi thuận, khi nghịch. Đừng bỏ qua <b><a href="<?php echo base_url('xem-tuoi-sinh-con.html') ?>">Xem Tuổi Sinh Con</a></b> hợp tuổi bố mẹ để cuộc sống gia đình luôn thuận hòa, tương lai của con cái theo đó cũng được hưởng hạnh phúc viên mãn trọn đời.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungdientrach"><b><?php echo $i++; ?>: Cung Điền Trạch</b> <i>Xem về tài sản đất đai</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_dientrach']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Điền trạch có sao hỷ tất thảy gia cảnh yên ổn, nhàn hạ, có không vong thì tán gia bại sản, có thái tuế phá phá toái. Vì lẽ đó, khi muốn gia tăng điền sản cần thiết <b><a href="<?php echo base_url('xem-tuoi-mua-nha.html') ?>">Xem tuổi mua nhà</a></b> kết hợp quan sát kỹ lưỡng những yếu tố cát hung của bất động sản đó mới mong có cuộc sống an lành, công việc, tiền tài như ý.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungtatach"><b><?php echo $i++; ?>: Cung Tật Ách</b> <i>(Xem về sức khỏe - bệnh tật)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_tatach']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Cung Tật Ách đã luận giải cho quý bạn biết về thân thể, sức khỏe và bệnh tật trong cuộc sống của mình. Để biết được những điều này một cách chi tiết nhất theo từng nằm thì quý bạn cần <b><a href="<?php echo base_url('xem-han-tu-vi.html') ?>">Xem vận hạn theo tuổi</a></b> của mình. Tất cả những điều tốt, xấu trong một năm sẽ hiện hữu giúp quý bạn nắm bắt được tất cả vận hạn của mình.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungphumau"><b><?php echo $i++; ?>: Cung Phụ Mẫu</b> <i>(Xem về quan hệ với cha mẹ và phúc phần của cha mẹ)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_phumau']); ?></div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cunghuynhde"><b><?php echo $i++; ?>: Cung Huynh Đệ</b> <i>(Xem về anh em bạn bè)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_huynhde']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Tất cả mọi điều, mọi vấn đế về mối quan hệ anh chị em, mối quan hệ bạn bè cũng như mối quan hệ hợp tác của quý bạn đã được luận giải tại cung Huynh Đệ của lá số tử vi. Thế nhưng để biết chi tiết mình hợp - khắc với mọi người ở những điểm nào thì quý bạn cần <b><a href="<?php echo base_url('xem-tuoi-hop-nhau/tuoi-'.$this->vnkey->format_key($canchi).'-sinh-nam-'.$namsinh.'-hop-voi-tuoi-nao.html') ?>">Xem Tuổi <?php echo $canchi; ?> hợp với tuổi nào</a></b>? (. Đây sẽ là tiền đề để quý bạn xây dựng nên tình bạn, tình anh em luôn gắn kết, bền lâu.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="cungnoboc"><b><?php echo $i++; ?>: Cung Nô Bộc</b><i>(Xem về cấp dưới- Người làm hay đồng nghiệp)</i></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['cung_noboc']); ?></div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="giaidoantrung"><b><?php echo $i++; ?>: Giải Đoán Chung</b></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['giaidoan_chung']); ?>
                                        <div class="alert alert-success">
                                            <p><span class="btn_nhaynhay"></span>Tổng hợp phần luận giải chi tiết về cuộc đời của quý bạn sẽ có tại <b>[<a href="<?php echo base_url('xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-'.$this->vnkey->format_key($canchi).'.html'); ?>">Tử Vi Trọn Đời tuổi <?php echo $canchi ?></a>]</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_all">
                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="loikhuyen"><b><?php echo $i++; ?>: Lời Khuyên ứng Xử</b></p>
                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['loikhuyen_ungxu']); ?></div>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="text_all">
                                    <p class="tableOfContent text-center" style="font-weight: bold;color: #214806;">Xem đại vận theo tuổi:</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text_all">
                                            <?php 
                                                $arr_dejson = json_decode($luangiai['daivan'],true);
                                                // echo "<pre>";
                                                // print_r($arr_dejson);
                                                // echo "</pre>";
                                                ?>
                                            <div>
                                                <?php foreach ($arr_dejson as $key => $value): ?>
                                                    <div>
                                                        <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id='<?php echo 'dh'.$key ?>'><b><?php echo $i++ ?>: <?php echo $value['Name']; ?></b></p>
                                                        <div class="boxAfterLaso">
                                                            <?php foreach ($value['Content'] as $key1 => $value1): ?>
                                                                <p><?php echo $value1; ?></p>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text_all">
                                    <p class="tableOfContent text-center" style="font-weight: bold;color: #214806;">Xem vận theo tuổi:</p>
                                </div>
                                <section class="row">
                                    <div class="col-md-6">
                                        <?php
                                            // Tinh cac nam gan tuoi nguoi xem nhat
                                            $ageUser = (int)date('Y')-$namsinh+1;
                                            // for age User
                                            $ageUserBefore  = $ageUser-5>=13?$ageUser-5:13;
                                            $ageUserAfter   = $ageUser+5<=61?$ageUser+5:61;
                                            $hadShow    = array();
                                            $kCount = 1;
                                            for ($age = $ageUserBefore; $age <= $ageUserAfter; $age++) {
                                                $kCount++;
                                                $hadShow[]    = $age;
                                                ?>
                                                <div class="text_all">
                                                    <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="vh<?php echo $age; ?>"><b><?php echo $i++; ?>: Vận Năm <?php echo $age; ?> tuổi</b></p>
                                                    <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['vannam_'.$age]); ?></div>
                                                </div>
                                                <?php
                                            }
                                            for ($j = 13; $j <= 61 ; $j++) {
                                                if (!in_array($j, $hadShow)) {
                                                    if ($kCount == 25) {
                                                        ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <?php
                                                    }
                                                    $kCount++;
                                                    ?>
                                                    <div class="text_all">
                                                        <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0" id="vh<?php echo $j; ?>"><b><?php echo $i++; ?>: Vận Năm <?php echo $j; ?> tuổi</b></p>
                                                        <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['vannam_'.$j]); ?></div>
                                                    </div>
                                                    <?php
                                                }
                                                
                                            } 
                                        ?>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text_all text-center" id="phuluc">
                                        <p class="text_red closeBoxAfter" data-toggle="modal" data-target="#myModal" data-seen="0"><b>Phụ Lục</b></p>
                                        <div class="boxAfterLaso"><?php echo str_replace($search,$replace,$luangiai['phu_luc']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                <?php endif; ?>
            </div>
            <div class="col-md-12 clearfix" style="float: left;">
                <?php if ($_POST): ?>
                    <?php if (!empty($oneAge)): ?>
                        <section style="line-height: 25px;padding-top: 15px;margin-top: 10px;">
                            <p dir="ltr">&nbsp;</p>
                            <div style="background: #f1eddb;border-radius: 4px;padding: 5px 8px;">
                                <p dir="ltr"><span style="font-size:18px"><strong>TRỌN BỘ <a href="<?php echo base_url(); ?>tu-vi-2018.html">TỬ VI 2018</a> CHO 60 TUỔI HOA GIÁP TỪ CHUYÊN GIA HÀNG ĐẦU</strong></span></p>
                                <p dir="ltr">
                                    <span class="btn_nhaynhay"></span><b><a href="<?php echo base_url($oneAge['slug'].'-A'.$oneAge['id'].'.html'); ?>">Tử vi tuổi <?php echo $canchi; ?> năm 2018 <?php echo $gioitinh ?> mạng</a></b>
                                </p>
                                <br>
                            </div>
                        </section>
                    <?php endif ?>
                    <div class="field">
                        <?php $this->load->view('site/import/import_anhduong'); ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.closeBoxAfter').click(function(){
            $('.boxAfterLaso').slideUp();
            $(this).addClass('open_here');
            /*var dataseen = $(this).attr('data-seen');
            if (dataseen == 0) {
                $(this).parent().children('.boxAfterLaso').slideDown('slow');
                $(this).attr('data-seen',1);
            }
            else{
                $(this).attr('data-seen',0);
            }
            var x = $(this).offset();
            var height_x = x.top;
            $("html, body").animate({
                scrollTop: height_x
            }, 800);*/
            var content_here = $(this).parent().children('.boxAfterLaso').html();
            $('.modal-body').html(content_here);
        });

        $('.closeBoxAfter b').click(function(){
            var head_text = $(this).text();
            $('.modal-title').text(head_text);

            /*var url  = '<?php echo current_url(); ?>';
            var dob  = '<?php echo isset($_POST['nam'])?$_POST['nam']:''; ?>';

            $.post("<?php echo base_url('site/data_member/create'); ?>",
            {
                name: text,
                url: url,
                dob: dob,
            },
            function(data, status){
                // alert("Data: " + data + "\nStatus: " + status);
            });*/
        });
    });
    var col_body = $("body").css("width");
	col_body = parseInt(col_body);
    // alert(col_body);
	if (col_body<=980) {
		$('.col-md-9').addClass('width100');
	}
</script>
<style type="text/css">
    #modalOk{ width: 90% !important; }
</style>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" id="modalOk">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<style>
    @media (min-width: 768px) {
        .container {
            width: 100%;
        }
        /*.col-sm-8{ width: 100%; }*/
    }
    @media (min-width: 992px) {
        .container {
            width: 950px;
        }
        /*.col-sm-8{ width: auto; }*/
    }
    @media (min-width: 1200px) {
        .container {
            width: 1015px;
        }
        /*.col-sm-8{ width: auto; }*/
    }
    
    .text_red{
        cursor: pointer;
    }
    .text_red b{
    text-transform: uppercase;
    font-size: 14px;
    color: #06c;
    text-decoration: underline;
    line-height: 25px;
    font-weight: 400;
    
    }
    .width100{ width: 100%; }
    .open_here{ color: red !important; }
    .open_here b{ color: red !important; }
    .text_red b{ font-weight: 400; }
    .closeBoxAfter i{ 
        background:url('<?php echo base_url('public/templates/sitev2/images/bantay.png'); ?>');
        background-position: right top;
        background-size: 18px;
        background-repeat: no-repeat;
        padding-right: 21px; 
    }
    .text_all{
        text-align: justify;
        /* line-height: 30px; */
        padding: 5px 15px;
        line-height: 25px;
        /* font-weight: 400; */
        /* border: 1px dotted black; */
    }
    .nguyennhan{
    border-top: 1px solid #e68282;
    background-color: #ffffe6;
    padding: 10px;
    margin-bottom: 0px;
    color: #8c1a18;
    font-size: 14px;
    }
    .ketqua{
    /*border: 15px solid #5cb863;*/
    padding: 10px;
    margin-bottom: 0px;
    font-size: 14px;
    }
    .thamkhao{
    padding: 10px;
    }
    .mucluc li{
    cursor: pointer;
    color: green;
    }
    .viktor{
    width: 100%;
    float:left;
    margin: 0px auto;
    }
    .fix{
    position: fixed;
    top: 0px;
    overflow-y: scroll;
    height: 100%;
    }
    .menu-btn{
    position: fixed;
    bottom: 5px;
    left: 0px;
    z-index: 9999;
    float: left;
    border-radius: 0px!important;
    }
    .sidebar{
    position: fixed;
    top: 0px;
    left:0px;
    z-index: 100;
    }
    .site-overlay{
    z-index: 10!important;
    }
    .backtop{
    color: #fff;
    height: 50px;
    width: 50px;
    background-color:green;
    font-size: 40px;
    text-align: center;
    position: fixed;
    right: 0px;
    bottom: 5px;
    cursor: pointer;
    z-index: 99999999;
    border-radius: 33px;
    }
    .boxAfterLaso{ display: none; }
    .tableOfContent{
        color: red;
        text-transform: uppercase;
        font-size: 24px;
    }
    .modal{  }
    .modal button{
        background: none !important; 
        padding: 4px !important;
        width: auto !important;
        height: auto !important;
        line-height: 25px !important;
        background: #fff !important;
        color: #585858 !important;
    }
    .modal-header{ padding-bottom: 0px; }
    .modal-body{ padding-top: 0px; }
</style>
<script>
    $(document).ready(function(){
        $('.closeBoxAfter b').on('click',function(){
            var text    = $(this).text();
            var url     = window.location.href;
            var namsinh = '<?php echo isset($_POST['nam'])?$_POST['nam']:''; ?>';
            $.ajax({
                url: '<?php echo base_url() ?>'+'site/xemtuvi/ajax_insert_info_lasotuvi',
                type: 'POST',
                data: {text: text,url:url,namsinh:namsinh},
                success:function(response){

                }
            });
        });
    });
</script>