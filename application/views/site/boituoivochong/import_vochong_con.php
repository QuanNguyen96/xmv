<div class="panel panel-default autohidden hidden" id="<?php echo $namsinhcon; ?>">
    <div class="panel-heading">
        
        <label>
            <h2 class="h3 boidam">Chi tiết về mệnh cha, mẹ và con:</h2>
        </label>
        <br>
    </div>
    <div class="panel-body">
        <div id="result">
            <div class="rows">
                <section class="alert alert-info">
                    <p class="h3 text-center boidam">1. Ngũ hành sinh khắc</p>
                    <div class="luangiai">
                        <p>
                            Là yếu tố đầu tiên và quan trọng hơn cả khi lựa chọn năm sinh con. Tốt nhất là Ngũ hành cha và mẹ tương sinh, bình hòa là không tương sinh và không tương khắc với con
                        </p>
                        <p>Mệnh của cha là <?php echo $menh_sinh_cha['he'] ?>, mẹ là <?php echo $menh_sinh_me['he'] ?>, con là <?php echo $menh_sinh_con['he'] ?></p>
                        <p>Như vậy:</p>
                        <p>
                            Ngũ hành của cha là <?php echo $menh_sinh_cha['he'] ?> <?php echo $show_luan_nguhanh_chong_con; ?> với <?php echo $menh_sinh_con['he'] ?> của con, 
                            <span><?php echo get_str_point_thiendia($show_point_nguhanh_chong_con); ?></span>
                        </p>
                        <p>Ngũ hành của mẹ là <?php echo $menh_sinh_me['he'] ?> <?php echo $show_luan_nguhanh_vo_con; ?> với <?php echo $menh_sinh_con['he'] ?> của con, <span><?php echo get_str_point_thiendia($show_point_nguhanh_vo_con); ?></span></p>
                        <?php
                            $total_nguhanh = $show_point_nguhanh_chong_con+$show_point_nguhanh_vo_con;
                            ?>
                        <p>Đánh giá điểm ngũ hành: <?php echo $total_nguhanh;?> /20 (tối đa 8/20)</p>
                    </div>
                </section>
            </div>
            <div class="rows">
                <section class="alert alert-success">
                    <p class="h3 text-center boidam">2. Thiên can xung hợp</p>
                    <div class="luangiai">
                        <p>Thiên can được đánh số theo chu kỳ 10 năm. Trong Thiên can có 4 cặp tương xung (xấu) và 5 cặp tương hóa (tốt). Thiên can của cha mẹ tương hóa với con là tốt nhất, bình hòa là không tương hóa và không tương xung với con.</p>
                        <p>Thiên can của cha là <?php echo $can_nam_show_cha; ?>, mẹ là <?php echo $can_nam_show_me; ?>, con là <?php echo $can_nam_show_con; ?></p>
                        <p>Như vậy:</p>
                        <p>Thiên can của cha là <?php echo $can_nam_show_cha; ?> <?php echo $show_luan_thiencan_cha_con; ?> với <?php echo $can_nam_show_con; ?> của con, <?php echo get_str_point($show_point_thiencan_chong_con); ?></p>
                        <p>Thiên can của mẹ là <?php echo $can_nam_show_me; ?> <?php echo $show_luan_thiencan_me_con; ?> với <?php echo $can_nam_show_con; ?> của con, <?php echo get_str_point($show_point_thiencan_me_con); ?></p>
                        <?php
                            $total_thiencan = $show_point_thiencan_chong_con+$show_point_thiencan_me_con;
                            ?>
                        <p>Đánh giá điểm thiên can: <?php echo $total_thiencan;?>/20 (tối đa 6/20)</p>
                    </div>
                </section>
            </div>
            <div class="rows">
                <section class="alert alert-warning">
                    <p class="h3 text-center boidam">3. Địa chi xung hợp</p>
                    <div class="luangiai">
                        <p>Địa chi được đánh số theo chu kỳ 12 năm, tương ứng 12 con Giáp cho các năm. Hợp xung của Địa chi bao gồm Tương hình (trong 12 Địa chi có 8 Địa chi nằm trong 3 loại chống đối nhau), Lục xung (6 cặp tương xung), Lục hại (6 cặp tương hại), Tứ hành xung, Lục hợp, Tam hợp. Địa chi của cha mẹ tương hợp với con là tốt nhất, bình hòa là không tương hợp và không tương xung với con.</p>
                        <div>
                            <p>Địa chi của cha là <?php echo $chi_nam_show_cha; ?>, mẹ là <?php echo $chi_nam_show_me; ?>, con là <?php echo $chi_nam_show_con; ?></p>
                            <p>Như vậy:</p>
                            <p>Địa chi của cha là <?php echo $chi_nam_show_cha; ?> <?php echo $show_luan_diachi_cha_con; ?> với <?php echo $chi_nam_show_con; ?> của con, <?php echo get_str_point($show_point_diachi_chong_con); ?></p>
                            <p>Địa chi của mẹ là <?php echo $chi_nam_show_me; ?> <?php echo $show_luan_diachi_me_con; ?> với <?php echo $chi_nam_show_con; ?> của con, <?php echo get_str_point($show_point_diachi_me_con); ?></p>
                            <?php
                                $total_diachi = $show_point_diachi_chong_con+$show_point_diachi_me_con;
                                ?>
                            <p>Đánh giá điểm địa chi: <?php echo $total_diachi;?>/20 (tối đa 6/20)</p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="rows">
                <section class="alert alert-success arrowToTable" style="font-weight: bold;">
                    <a href="#arrowToTable" class="itemArrowToTable"><label class="" title="quay lại bảng danh sách tuổi hợp"></label></a>
                    <p class="h3 text-center boidam">4. Tổng điểm <?php echo $total_nguhanh+$total_thiencan+$total_diachi;?> /20</p>
                    <div class="luangiai">
                        <?php
                            $diem = ($total_nguhanh+$total_thiencan+$total_diachi);
                            if ($diem>=13) {
                              $ketluan = '=> <span class="text-danger">Tốt cho việc sinh con</span>';
                            }elseif ($diem>=10 && $diem<=12) {
                              $ketluan = '=> Trung bình, có thể sinh con';
                            }else{
                              $ketluan = '=> Chưa tốt cho việc sinh con, nên chọn một năm khác';
                            }
                            ?>
                        <p>Chồng tuổi <?php echo $send_input_namsinh_cha; ?> vợ tuổi <?php echo $send_input_namsinh_me ?> sinh con năm <?php echo $namsinhcon; ?> <?php echo $ketluan; ?></p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>