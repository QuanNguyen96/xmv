
<link rel="stylesheet" href="<?php echo base_url('templates/site/laso/laso_html.css'); ?>" />
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm box_ngaytotxau clearfix" style="border: none;">
    <h1 class="box_content_tt">XEM LÁ SỐ TỬ VI TRỌN ĐỜI</h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="" action="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" method="post">
        <div class="field">
            <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 col-md-offset-3 col-xs-12">
                <input type="text" name="hovaten" value="<?php echo set_value('hovaten'); ?>" placeholder="Nhập họ và tên" required="" />
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <select name="gioitinh" required="">
                    <option value="">Giới tính</option>
                    <option value="1" <?php echo set_select('gioitinh', 1); ?>>Nam giới</option>
                    <option value="0" <?php echo set_select('gioitinh', 0); ?>>Nữ giới</option>
                </select>
            </div>
        </div>
        <div class="field">
            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
                <select name="ngay" required="">
                    <option value="">Ngày sinh dương</option>
                    <?php 
                        for( $i = 1; $i<= 31; $i++ ){
                            echo '<option value="'.$i.'" '.set_select('ngay', $i).'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="thang" required="">
                    <option value="">Tháng</option>
                    <?php 
                        for( $i = 1; $i<= 12; $i++ ){
                            echo '<option value="'.$i.'" '.set_select('thang', $i).'>'.$i.'</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="nam" required="">
                    <option value="">Năm</option>
                    <?php 
                        for( $i = 1950; $i<= 2040; $i++ ){
                            $slt = $i == 1992 ? 'selected=""' : '';
                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
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
                        <option value="<?php echo $key ?>" <?php echo set_select('gio', $key); ?>><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="namxem" required="">
                    <option value="">Năm xem</option>
                    <?php 
                        for( $i = 2015; $i<= 2040; $i++ ){
                            $slt = $i == (int)date('Y') ? 'selected=""' :'';
                            echo '<option value="'.$i.'" '.set_select('namxem', $i).' '.$slt.'>'.$i.'</option>';
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
                <?php if( isset($success) ) echo $success; ?>
            </div>
            <div class="col-md-12">
                <?php if (isset($success)): ?>
                    <section class="lasoTuviWrap">
                        <div class="listBoxLaso">
                            <p class="title_l"><label>GIỚI THIỆU</label></p>
                            <div class="boxContentMini">
                                <section class="contentMini">
                                    <p dir="ltr">Ngày nay tồn tại rất nhiều luận giải của nhiều hệ phái Tử Vi không đồng nhất. Điều này cũng giống như quý bạn đi xem thầy thì có thầy nói kiểu này, có thầy lại nói kiểu khác, có thầy nói đúng, có thầy thì nói sai. Nhìn tổng quan thì do kinh nghiệm mỗi người khác nhau, học hỏi ở những sách tử vi khác nhau nên giải luận tử vi cũng khác nhau là điều tất yếu.</p>

                                    <p dir="ltr">Điểm quan trọng nhất trong Tử Vi là sao. Có SAO TỐT và SAO XẤU. Vậy quý bạn đã biết cách nhận biết sao tốt và sao xấu chưa? Trong lá số Tử vi có 12 cung bao gồm: Mệnh, Phúc Đức, Điền Trạch, Phụ Mẫu, Quan Lộc, Nô Bộc, Thiên Di, Tật Ách, Tử Tức, Phu Thê, Huynh Đệ. Một cung Thân được gửi bởi một trong mười hai cung này. Trong đó, mỗi cung sẽ có các sao hiện diện. Chính tinh được an ở chính giữa nằm phía trên, thường được đặt cỡ chữ to và rõ nhất cùng ký hiệu phía sau. Đó là</p>

                                    <p dir="ltr">(M) tức là Miếu địa: Tốt nhất.</p>

                                    <p dir="ltr">(V) tức là Vương địa: Tốt nhì.</p>

                                    <p dir="ltr">(Đ) tức là Đắt địa: Tốt ba.</p>

                                    <p dir="ltr">(H) tức là Hãm địa: Xấu.</p>

                                    <p dir="ltr">Phía dưới chính tinh có các sao bên phải và sao bên trái. Sao bên phải là các sao xấu, còn các sao bên trái là các sao tốt. Sao nào được in đậm thì sẽ quan trọng hơn so với những sao được in bình thường. Giả dụ một cung có cả sao tốt và sao xấu, nếu sao tốt mà kèm theo sao xấu thì sự tốt bị kéo lùi xuống, đồng thời sao xấu cũng đỡ xấu hơn vì được sao tốt kéo lên, giảm bớt sự xấu.</p>

                                    <p dir="ltr">Những bình giải Tử Vi của chúng tôi đều dựa trên những cơ sở lý luận của những tài liệu được giới chuyên môn đánh giá hàng đầu trong lĩnh vực Tử vi như Tử vi hàm số của Nguyễn Phát Lộc, Tử vi đẩu số của Văn Đằng Thái Thứ Lang và Tử vi đẩu số kinh điển của Phan Tử Ngư,... Trong thời gian tới bằng những tham vấn từ chuyên gia, chúng tôi sẽ tiếp tục cập nhật thêm những thuật toán mới để cung cấp lá số và bình giải lá số Tử vi đúng và chuẩn xác nhất.</p>

                                    <p dir="ltr">Hy vọng những thông tin luận giải tử vi của chúng tôi sẽ giúp quý bạn phần nào đoán giải vận mạng để tận dụng cát vận trời cho, chuyển hung thành cát đạt được danh lợi đề huề, công danh sáng rõ, tiền đồ vô lượng và phồn vinh phú quý.</p>
                                </section>
                                <p class="viewShow viewmore" data-view="on"><span>Xem thêm bài luận</span><br><label class="imageButton"></label></p>
                                
                            </div>
                        </div>
                        <?php if (isset($saochieutuvi) && !empty($saochieutuvi)): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>SAO CHIẾU TỬ VI THEO NĂM</label></p>
                                <div class="boxContentMini">
                                    <section class="contentMini">
                                        <div>
                                            <?php
                                                    echo $saochieutuvi['tho']; 
                                                    echo $saochieutuvi['ynghia'];
                                            ?>
                                        </div>
                                    </section>
                                    <p class="viewShow viewmore" data-view="on"><span>Xem thêm bài luận</span><br><label class="imageButton"></label></p>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (isset($saohantuvi) && !empty($saohantuvi)): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>SAO HẠN THEO NĂM</label></p>
                                <div class="boxContentMini">
                                    <section class="">
                                        <div>
                                            <?php 
                                                    echo $saohantuvi['tho']; 
                                                    echo $saohantuvi['ynghia'];
                                            ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php 
                            if(!empty($quedichtheonamsinh)) {
                        ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>Quẻ dịch theo năm sinh</label></p>
                                <div class="boxContentMini">
                                    <section class="">
                                        <?php 
                                            echo $quedichtheonamsinh['noidung'];
                                        ?>
                                    </section>
                                </div>
                            </div>
                        <?php
                            } 
                        ?>
                        <?php if (isset($luanCanChi) && $luanCanChi): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>Luận can chi theo năm sinh</label></p>
                                <div class="boxContentMini">
                                    <section class="">
                                        <div class="heading_laso"><?php echo $luanCanChi['item']; ?></div>
                                        <div>
                                            <?php echo $luanCanChi['content']; ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($luanCucAndMenh['content']): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label><?php echo $luanCucAndMenh['item']; ?></label></p>
                                <div class="boxContentMini">
                                    <section class="">
                                        <?php echo $luanCucAndMenh['content']; ?>
                                    </section>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="listBoxLaso">
                            <p class="title_l"><label>Lai nhân lá số tử vi</label></p>
                            <div class="boxContentMini">
                                <section class="">
                                    <?php if(!empty($noidung_lainhan)) {echo $noidung_lainhan;} ?>
                                </section>
                            </div>
                        </div>
                        <?php if (isset($luongchibinhgiai) && !empty($luongchibinhgiai)): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>Lượng chỉ bình giải: <?php $luong = ($luongchibinhgiai['luongchi'] < 10) ? 0 : substr($luongchibinhgiai['luongchi'], 0, 1); $chi = substr($luongchibinhgiai['luongchi'], -1); echo $luong .' lượng '.$chi .' chỉ'; ?></label></p>
                                <div>
                                    <content>
                                        <?php echo $luongchibinhgiai['tho'];
                                              echo $luongchibinhgiai['ynghia'];
                                         ?>
                                    </content>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($lucthaphoagiap): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>Ý nghĩa cục</label></p>
                                <div class="boxContentMini">
                                    <section class="">
                                        
                                        <?php echo $lucthaphoagiap['noidung']; ?>
                                        
                                    </section>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($contentThanCu['content']): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label><?php echo 'Thân cư '.$nameThanCu; ?></label></p>
                                <div class="boxContentMini">
                                    <section class="">
                                        <?php echo $contentThanCu['content']; ?>
                                    </section>
                                </div>
                            </div>
                        <?php endif ?>
                        
                        <div class="listBoxLaso">
                            <p class="title_l"><label>Ý nghĩa các sao trong 12 cung</label></p>
                            <?php
                                $runPosition = 1; 
                                $hookPosition = 1;
                            ?>
                            <div class="row">
                                <?php foreach ($this->tuvi_lib->cung as $keyCung => $valueCung): ?>
                                    <div class="col-md-6">
                                        <div class="boxYnghiaSao">
                                            <p class="title_icon title_iconsao viewbox closeBoxAfter" data-text="<?php echo $valueCung; ?>( <?php echo get_name_cung_tuvi($keyCung); ?> )" data-view="<?php echo $hookPosition; ?>"><?php _e($valueCung) ?> ( <?php echo get_name_cung_tuvi($keyCung); ?> ) <br><label>Xem chi tiết</label></p>
                                            <section class="content">
                                                <div class="fontweight400">
                                                    <?php if ($contentSaochinhtinhArr): ?>
                                                        <?php foreach ($contentSaochinhtinhArr as $keyCSCTA => $valueCSCTA): ?>
                                                            <?php if ($valueCSCTA['id_cung'] == $keyCung): ?>
                                                                <p><b><?php _e('Sao '.$valueCSCTA['name_sao']) ?> : </b></p>
                                                                <div class="fontweight400">
                                                                    <?php echo $valueCSCTA['content']; ?>
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                    <?php if ($contentSaophutinhArr[$keyCung]): ?>
                                                        <?php foreach ($contentSaophutinhArr[$keyCung] as $valueCSPTA): ?>
                                                            <div class="fontweight400">
                                                                <p><b><?php _e('Sao '.$valueCSPTA['name_sao']) ?></b></p>
                                                                <div>
                                                                    <?php echo $valueCSPTA['content']; ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </div>
                                                <div>
                                                    <?php if ($contentAfterCung[$keyCung]): ?>
                                                        <?php echo $contentAfterCung[$keyCung]; ?>
                                                    <?php endif ?>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <?php if ($runPosition%2==0): ?>
                                        <div class="col-md-12">
                                            <div class="contentByIcon contentByIcon<?php echo $hookPosition ?>">
                                                <button class="closeViewbox"></button>
                                                <div class="showContent">
                                                   <!-- Noi dung show -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php $hookPosition++; ?>
                                    <?php endif ?>
                                    <?php $runPosition++; ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="listBoxLaso">
                            <p class="title_l"><label>VẬN HẠN THEO CUNG</label></p>
                            <?php
                                $runPosition = 1; 
                                $hookPosition = 1;
                            ?>
                            <div class="row">
                                <?php if ($get_content_sao_detail): ?>
                                    <?php foreach ($get_content_sao_detail as $value): ?>
                                        <div class="col-md-6">
                                            <div class="boxYnghiaSao">
                                                <p class="title_icon title_icontron viewbox closeBoxAfter" data-text="<?php echo 'Cung '.$value['name_cung_chi']; ?>" data-view="<?php echo $hookPosition; ?>"><?php _e('Cung '.$value['name_cung_chi']); ?> <label>Xem chi tiết</label></p>
                                                <section class="content">
                                                    
                                                    <div class="fontweight400">
                                                        <?php if ($value['content_chinh_tinh']): ?>
                                                            <?php foreach ($value['content_chinh_tinh'] as $valueCCT): ?>
                                                                <p><b><?php _e('Sao '.$valueCCT['name_sao']) ?></b></p>
                                                                <div>
                                                                    <?php echo $valueCCT['content']; ?>
                                                                </div>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                        <?php if ($value['content_phu_tinh']): ?>
                                                            <?php foreach ($value['content_phu_tinh'] as $valuePCT): ?>
                                                                <p><b><?php _e('Sao '.$valuePCT['name_sao']) ?></b></p>
                                                                <div>
                                                                    <?php echo $valuePCT['content']; ?>
                                                                </div>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </div>
                                                    <div>
                                                        <?php if ($han_tong_quat): ?>
                                                            <?php if ($han_tong_quat['cung'] == $value['cung_chi']): ?>
                                                                <?php echo $han_tong_quat['content']; ?>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </div>
                                                    <div>
                                                        
                                                    </div>

                                                </section>
                                            </div>
                                        </div>
                                        <?php if ($runPosition%2==0): ?>
                                            <div class="col-md-12">
                                                <div class="contentByIcon contentByIcon<?php echo $hookPosition ?>">
                                                    <button class="closeViewbox"></button>
                                                    <div class="showContent">
                                                       <!-- Noi dung show -->
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $hookPosition++; ?>
                                        <?php endif ?>
                                        <?php $runPosition++; ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="listBoxLaso">
                            <p class="title_l"><label>VẬN HẠN THEO TUỔI</label></p>

                            <article>
                                <?php
                                    $runPosition = 1; 
                                    $hookPosition = 1;
                                    $firstAge = 1;
                                    $endAge = 9; 

                                    $xacDinhFrameAge = 0;
                                    $strlFrame = strlen($tuoi_am);
                                    if ($strlFrame == 1) {
                                        $xacDinhFrameAge = 0;
                                    }
                                    else{
                                        $firstFrame = substr($tuoi_am, 0, 1);
                                        $lastFrame = substr($tuoi_am, -1, 1);
                                        if ($lastFrame == 0) {
                                            $xacDinhFrameAge = $firstFrame - 1;
                                        }
                                        else{
                                            $xacDinhFrameAge = $firstFrame;
                                        }
                                    }
                                ?>
                                <p class="xacDinhFrame" data-type="before" data-show="<?php echo $xacDinhFrameAge-1; ?>"><span>Xem tuổi trước</span></p>
                                <?php
                                    if ($han_tuoi_trong_cung) {
                                        $frameCount = -1;
                                        for ($i = 1; $i <= 99 ; $i+=10) {
                                            $firstAge = $i;
                                            $endAge = $i+9;
                                            $frameCount++;
                                            // echo $frameCount;
                                            ?>
                                            <section class="frameCount frameCount<?php echo $frameCount; ?> <?php echo $xacDinhFrameAge==$frameCount?'onFrame':'offFrame'; ?>" data-frame="<?php echo $frameCount; ?>">
                                                <p class="title_vh_age">Vận hạn từ <?php echo $firstAge; ?> - <?php echo $endAge; ?> tuổi</p>
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <div class="row">
                                                            <?php
                                                                for ($j = $firstAge; $j <= $endAge ; $j++) {
                                                                    ?>
                                                                    <?php if (isset($han_tuoi_trong_cung[$j])): ?>
                                                                        <div class="col-md-4">
                                                                            <p class="title_box_vh_age closeBoxAfter" data-text="<?php echo 'Vận hạn '.$j.' tuổi'; ?>" data-view="<?php echo $hookPosition; ?>"><?php echo $j ?> tuổi - <?php echo $han_tuoi_trong_cung[$j]['year'] ?> <span class="title_icon_vh"></span></p>
                                                                            <div class="content">
                                                                                <?php if ($han_tuoi_trong_cung[$j]['han']): ?>
                                                                                    <?php foreach ($han_tuoi_trong_cung[$j]['han'] as $keyHTTC => $valueHTTC): ?>
                                                                                        <div class="">
                                                                                            <?php if ($key < 18): ?>
                                                                                                <?php if ($valueHTTC['max_age_18']): ?>
                                                                                                    <?php echo $valueHTTC['ynghia']; ?>
                                                                                                <?php endif ?>
                                                                                                <?php else: ?>
                                                                                                    <?php echo $valueHTTC['ynghia']; ?>
                                                                                            <?php endif ?>
                                                                                        </div>
                                                                                    <?php endforeach ?>
                                                                                <?php endif ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <?php if (($runPosition-$frameCount)%3==0): ?>
                                                                        <div class="col-md-12">
                                                                            <div class="contentByVh contentByVh<?php echo $hookPosition ?>">
                                                                                <button class="closeViewbox"></button>
                                                                                <div class="showContent">
                                                                                    <!-- Noi dung chuyen sang -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php $hookPosition++; ?>
                                                                    <?php endif ?>
                                                                    <?php if ($runPosition%10 ==0): ?>
                                                                        <div class="col-md-12">
                                                                            <div class="contentByVh contentByVh<?php echo $hookPosition ?>">
                                                                                <button class="closeViewbox"></button>
                                                                                <div class="showContent">
                                                                                    <!-- Noi dung chuyen sang -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php $hookPosition++; ?>
                                                                    <?php endif ?>
                                                                    <?php $runPosition++; ?>
                                                                    <?php     
                                                                } 
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            

                                            <?php
                                        }
                                    }
                                ?>
                                <p class="xacDinhFrame xacDinhFrameAfter" data-type="after" data-show="<?php echo $xacDinhFrameAge+1; ?>"><span>Xem tuổi sau</span></p>
                            </article>
                        </div>
                        <style type="text/css">
                            .frameCount{ display: none; }
                            .onFrame{ display: block; }
                            .xacDinhFrame{ width: 100%;text-align: center; }
                            .xacDinhFrame span{ display: block;width: 50%;margin: -1px auto 0 auto;padding: 7px 0;cursor: pointer;border-radius: 10px 10px 0px 0px;background: #f7f7f7;border: 1px solid #e1e1e1;text-align: center;color: #3498db; }
                            .xacDinhFrameAfter{  }
                            .xacDinhFrameAfter span{ border-radius: 0px 0px 10px 10px; }
                        </style>
                        <?php if ($han_tuoi_can): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>HẠN TUỔI CAN</label></p>
                                <div>
                                    <content>
                                        <?php echo $han_tuoi_can; ?>
                                    </content>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($han_tuoi_chi): ?>
                            <div class="listBoxLaso">
                                <p class="title_l"><label>HẠN TUỔI CHI</label></p>
                                <div>
                                    <content>
                                        <?php echo $han_tuoi_chi; ?>
                                    </content>
                                </div>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif ?>
            </div>
            <div class="col-md-12">
                <?php echo $this->my_seolink->get_text_foot(); ?>
            </div>

            <?php if (isset($success)): ?>
                
            <?php endif ?>
            <div class="col-md-12">
                <div class="row clearfix">
                    <?php if ($_POST): ?>
                        <?php if (!empty($oneAge)): ?>
                            <?php if (isset($box_cu)): ?>
                                <section style="line-height: 25px;padding-top: 15px;margin-top: 10px;">
                                    <p dir="ltr">&nbsp;</p>
                                    <div style="background: #f1eddb;border-radius: 4px;padding: 5px 8px;">
                                        <p dir="ltr"><span style="font-size:18px"><strong>TRỌN BỘ <a href="<?php echo base_url(); ?>xem-tu-vi-nam-2019-cua-12-con-giap.html">TỬ VI 2019</a> CHO 60 TUỔI HOA GIÁP TỪ CHUYÊN GIA HÀNG ĐẦU</strong></span></p>
                                        <p dir="ltr">
                                            <span class="btn_nhaynhay"></span><b><a href="<?php echo base_url($oneAge['slug'].'-A'.$oneAge['id'].'.html'); ?>">Tử vi tuổi <?php echo $canchi; ?> năm 2019 <?php echo $gioitinh ?> mạng</a></b>
                                        </p>
                                        <br>
                                    </div>
                                </section>
                            <?php endif ?>
                            
                            <?php $this->load->view('site/import/box_dieuhuong2019'); ?>

                        <?php endif ?>
                        <div class="field">
                            <?php $this->load->view('site/import/import_anhduong'); ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-md-12">
                <?php $this->load->view('site/sh_comment/get_by_theme'); ?>
            </div>
            <?php $this->load->view('site/adsen/code_migd'); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // $('.closeBoxAfter').click(function(){
        //     $('.boxAfterLaso').slideUp();
        //     $(this).addClass('open_here');
        //     /*var dataseen = $(this).attr('data-seen');
        //     if (dataseen == 0) {
        //         $(this).parent().children('.boxAfterLaso').slideDown('slow');
        //         $(this).attr('data-seen',1);
        //     }
        //     else{
        //         $(this).attr('data-seen',0);
        //     }
        //     var x = $(this).offset();
        //     var height_x = x.top;
        //     $("html, body").animate({
        //         scrollTop: height_x
        //     }, 800);*/
        //     var content_here = $(this).parent().children('.boxAfterLaso').html();
        //     $('.modal-body').html(content_here);
        // });

        // $('.closeBoxAfter b').click(function(){
        //     var head_text = $(this).text();
        //     $('.modal-title').text(head_text);

        //     /*var url  = '<?php echo current_url(); ?>';
        //     var dob  = '<?php echo isset($_POST['nam'])?$_POST['nam']:''; ?>';

        //     $.post("<?php echo base_url('site/data_member/create'); ?>",
        //     {
        //         name: text,
        //         url: url,
        //         dob: dob,
        //     },
        //     function(data, status){
        //         // alert("Data: " + data + "\nStatus: " + status);
        //     });*/
        // });
    });
    /*var col_body = $("body").css("width");
	col_body = parseInt(col_body);
    // alert(col_body);
	if (col_body<=980) {
		$('.col-md-9').addClass('width100');
	}*/
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

        $('.viewbox').click(function() {
            var data_view = $(this).attr('data-view');
            var content_here = $(this).parent().children('.content').html();
            $(this).parent().parent().parent().find('.showContent').html(content_here);
            $(this).parent().parent().parent().find('.contentByIcon').removeClass('shower');
            $(this).parent().parent().parent().find('.contentByIcon'+data_view).addClass('shower');
        });

        $('.title_box_vh_age').click(function() {
            var data_view = $(this).attr('data-view');

            $('.title_box_vh_age').children('.title_icon_vh').removeClass('title_icon_show');
            $(this).children('.title_icon_vh').addClass('title_icon_show');

            var content_here = $(this).parent().children('.content').html();
            $(this).parent().parent().parent().find('.showContent').html(content_here);
            $(this).parent().parent().parent().parent().find('.contentByVh').removeClass('shower');
            $(this).parent().parent().parent().find('.contentByVh'+data_view).addClass('shower');
        });

        $('.viewShow').click(function() {
            var data_view = $(this).attr('data-view');
            if (data_view == "on") {
                $(this).children('span').text('Thu gọn');
                $(this).parent().children('.contentMini').addClass('maxHeight1500');
                $(this).children('.imageButton').addClass('imageButtonClose');
                $(this).children('.imageButton').removeClass('imageButtonOpen');
                $(this).attr('data-view','off');
            }
            else{
                $(this).children('span').text('Xem thêm bài luận');
                $(this).parent().children('.contentMini').removeClass('maxHeight1500');
                $(this).children('.imageButton').addClass('imageButtonOpen');
                $(this).children('.imageButton').removeClass('imageButtonClose');
                $(this).attr('data-view','on');
                scrollTo($(this).parent().children('.contentMini'), 100);
            }
            
            
        });

        $('.closeViewbox').click(function() {
            $(this).parent().removeClass('shower');
        });

        $('.xacDinhFrame').click(function() {
            var data_frame = $(this).attr('data-show');
            data_frame = parseInt(data_frame);
            var data_type = $(this).attr('data-type');
            $('.frameCount'+data_frame).fadeIn('slow');
            if (data_type == 'before') {
                $(this).attr('data-show', data_frame-1);
            }
            else{
                $(this).attr('data-show', data_frame+1);
            }
            
        });
    });
</script>