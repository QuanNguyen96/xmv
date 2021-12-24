<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm ">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="form_xem_huong_nha" action="" method="post" onsubmit="send_form_xem_huong_nha();">
        <div class="field">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <input type="text" name="hoten" value="<?php echo set_value('hoten'); ?>" placeholder="Họ và tên" />
            </div>
        </div>
        <div class="field">
            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
                <select name="year_birth" class="year_birth myinput" id="">
                    <?php foreach (list_age_text() as $key => $value): ?>
                        <?php $selected = $iNamsinh==$key?'selected=""':''; ?>
                        <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="quaydo">
                    <option value="">Độ quay</option>
                    <?php 
                        for( $i = 1; $i<= 359; $i++ ){
                            echo '<option '.set_select('quaydo', $i).' value="'.$i.'" >'.$i.' độ</option>';
                        }
                        ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <select name="gioitinh">
                    <option value="">Giới tính</option>
                    <option value="0" <?php echo set_select('gioitinh', 0); ?>>Nam</option>
                    <option value="1" <?php echo set_select('gioitinh', 1); ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="field field_center">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" name="option" value="com_boi">
                <input type="hidden" name="view" value="huongnha">
                <input type="hidden" name="Itemid" value="24">
                <button type="submit" class="button">Xem kết quả</button>
            </div>
        </div>
        
    </form>
    <script type="text/javascript">
        function send_form_xem_huong_nha() {
            var frm = document.form_xem_huong_nha;
            var year_birth   = frm.year_birth.value;
            var url = "<?php echo base_url('xem-huong-nha-tot-xau/tuoi-"+year_birth+"-xay-nha-huong-nao-tot');?>.html";
            document.form_xem_huong_nha.action  = url;
        }
    </script>

    
    <div class="field clearfix">
        <div class="col-md-12"><?php if(isset($content['noidung'])) echo $content['noidung']; ?></div>
    </div>
    <?php if ($_POST): ?>
        <div class="field">
            <?php $this->load->view('site/import/import_anhduong'); ?>
        </div>
        <div class="field">
            <div class="col-md-12">
                <div class="ep_cho_giua_trang_luon ep_cho_do_lim_thang_center_luon">
                    <div class="panel panel-default">
                      <div class="panel-heading"><p class="text-center"><b>Diên Niên</b></p></div>
                      <div class="panel-body">
                            <div>
                                <ul dir="ltr">
                                    <li style="text-align: justify;">Diên Niên thuộc sao Vũ Khúc vì đồng thuộc Kim Tinh là Du niên rất tốt, chủ về tuổi thọ, làm nên sự phát đạt, thứ nhất phát đạt về tài ngân châu báu. Cũng gọi nó là thần phúc đức, ở Tây Tứ Trạch thì hợp trạch, khiến cho nhà thịnh vượng lên, vì khi Kim gặp Kim thành vượng khí. Còn ở Đông Tứ Trạch là không hợp với nhà vì Kim với Mộc tương khắc. Như Diên Niên lâm Kiền, Đoài là đăng điện tốt hơn lâm Cấn, Khôn, Khảm là đắc vị, Còn lâm Chấn, Tốn, Ly là thất vị</li>
                                    <li style="text-align: justify;">Nếu bếp, giường, cửa, ngõ &nbsp;mà quay về hướng Chính tây mà thuộc Diên niên thì hướng này sẽ phát lợi cho người con gái út. Đường con cái úng sinh &nbsp;4 con, đã giàu lại còn trường thọ, ngày ngày vẫn có tiền bạc đến, sớm thành gia thất, hôn nhân vợ chồng thuận hòa, nhân khẩu và lục súc thịnh vượng,</li>
                                    <li style="text-align: justify;">Nếu bếp mà Đặt cung &nbsp;Diên Niên thì sẽ tuổi thọ kém, không tiền, hôn nhân khó thành,vợ chồng không hòa thuận, người thì ốm đau bệnh tật, lục súc ruộng nương đều thất bại</li>
                                    <li style="text-align: justify;">Trái lại nếu bếp Quay về hướng Diên Niên thì sẽ làm tăng tuổi thọ cho chủ nhà. Cầu tài, cầu lộc sẽ được như ý và sẽ ứng vào các năm Tỵ, Dậu, Sửu &nbsp;và trong 40 ngày &nbsp;hoặc 90 ngày sẽ có sự vui may khá lớn và sinh kế, cùng tài lộc mỗi ngày một trội lên, vì loại kim tinh thuộc số 4 và số 9 thập bội là 40 và 90</li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-info">
                      <div class="panel-heading">
                          <p class="text-center"><b>Sinh Khí</b> </p>
                      </div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Sinh Khí thuộc sao Tham Lang vì đồng thuộc Mộc Tinh là du niên rất tốt, đem lại sức sống mạnh và nguồn sanh lợi lộc vào nhà. Ở Đông Tứ Trạch thì hợp trạch hơn, khiến cho nhà thịnh vượng lên, vì Mộc Kim tương khắc</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Sinh khí lâm Chấn, Tốn mộc là đăng điện tốt nhiều hơn lâm Khảm Thủy, Ly là đắc vị. Còn lâm Càn, Đoài Cấn, Khôn là thất vị tốt ít. ( Diên niên này gặp cung tỷ hòa là đăng điện tốt bậc nhất, gặp cung tương sanh thì tốt bậc nhì, gặp cung tương khắc thất vị là tốt bậc 3</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nên đặt nhà cao, giường, bếp, giếng hướng vào 4 hướng cát, kỵ đặt hố phân</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Úng sanh 5 con, mau làm nên quan quý, và phát lên làm nhà cự phú, nhất là người con trai lớn, trăm việc vui mừng giao thiệp, hội họp, nếu trong chỗ trọng yếu có sự xây dựng, hay tu bổ mà gặp sinh khí hay Tham Lang thì đến 30 ngày hay 80 ngày có việc vui may đưa tới, vì loại mộc tinh thuộc số 3 và số 8 thập bội là 30 và 80 ( Những chỗ trọng yếu là cửa cái, chủ nhà, sơn chủ, bếp, phòng chủ)</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu đặt bếp lò thuộc hướng này sẽ ứng làm họa thay, hoặc không con, bị người phỉ báng và không giữ được tài vật , người thì đào vong, lục súc phá hoại</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Trái lại miệng lò xoay hướng này vợ chồng không con sẽ được sanh con, muốn cầu tài sẽ đại phú và ứng vào năm tháng Hợi, Mão, Mùi</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu nhà mà quay hướng này thì làm ăn được phát phúc</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-success">
                      <div class="panel-heading"><p class="text-center"><b>Thiên Y</b> </p></div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Thiên Y tức là sao Cự Môn vì đồng thuộc Thổ Tinh là du niên rất tốt, làm hưng vượng điền sản, đất, vườn, lục súc. Nó có tánh cách như một lương y, một cứu tinh năng giải trừ tai họa, năng gia bằng phúc đức. Ở Tây Tứ Trạch sẽ hợp với nhà vì Thổ sinh nhà Kim , Nếu ở Đông Tứ Trạch thì không hợp với nhà vì Mộc khắc Thổ, Thiên Y lâm Cấn Khôn là tỷ hòa đăng điện tốt nhiều hơn lâm Càn, Đoài, Ly, là tương sanh đắc vị, còn lâm Chấn, Tốn, Khảm là tướng khắc thất vị tốt vừa</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nên đặt nhà cao, mở cửa, giường tọa hướng vào phương chính Đông là bị hung</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Người con giữa được giàu sang</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Thiên Y là Thọ Tinh ( Sống Lâu) mà cũng là Cứu Tinh ( cứu giúp ) ứng vợ chồng hoàn hảo, sanh 3 con, giàu có người nhà ít đau yếu,không ai mang tật nguyền, người và lúc súc đều bình yên và thêm số đông,trong những chỗ trọng yếu sự xây dựng hay tu bổ lại mà gặp Thiên Y hay Cự môn thì đến 50 hoặc 100 ngày sẽ có việc vui may, tài lộc, bỏi lạo thổ tinh thuộc số 5 và 10 thập bội là 50 tới 100 ngày</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Bếp mà đặt hướng này sẽ ứng bệnh tật lâu dút, thân thể ốm yếu, nằm hoài thuốc thang không khỏi</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu bếp lò đặt hướng này sẽ được giải bệnh trừ tai họa. Muốn cầu tài cũng tốt vì sao Cự Môn thuộc Thổ ứng vào Thân, Tý, Thìn</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nên đặt các loại thực phẩm dự trữ trong gia đình vào hướng này là rất tốt</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-info">
                      <div class="panel-heading"><p class="text-center"><b>Phục Vị</b> </p></div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Phục Vị tức là sao Phụ Bật vì đồng thuộc Mộc Tinh bán cát, là du niên tiếp the.Ở chung phòng chủ hay sơn chủ và bếp sinh khí, diên niên, thiên y thì nó tốt tiếp theo, bằng thừa hung du niên chẳng ra gì. Ở Đông Tứ Trạch hợp với nhà vì nhà kim khắc mộc. Lâm Chấn, Tốn là tỷ hòa đăng diện tốt hơn lâm Khảm, Ly là đương sắc đắc vị, bằng lâm Càn, Đoài, Cấn, Khôn là tương khắc thất vị tốt ít</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nên đặt Giường nằm, là mộc tinh thứ nhì, ứng sự khá giả tuổi thọ cũng vừa vừa, sinh gái nhiều mà trai hiếm hoi, xây dựng những chộ trọng yếu nếu dùng phục vị thì đến 30 ngày hoặc 80 ngày có sự vui mừng, vì loại mộc tinh thuộc số 3 và số 8 nên thập bội là 30 hoặc 80</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Bếp mà đặt ở cung này chủ nhà sẽ không tiền, không của, khốn khổ, không ra gì.</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu hướng bếp đặt hướng này chủ nhà được tâm cầu sở đắc, muốn cầu tài cũng phát tiểu tài và ứng vào các năm Hợi, Mão, Mùi</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu đặt bàn thờ ở vị trí này cúng bái là rất tốt</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-warning">
                      <div class="panel-heading"><p class="text-center color_black"><b>Tuyệt Mệnh</b> </p></div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Tuyệt Mệnh tức là sao Phá Quân vì đồng thuộc Kim Tinh là du niên rất hung hại, đem tuyệt khí vào nhà, sinh kế rất bất lợi. Nó ở cung nào thì gây ra tai họa, Dù tỷ hòa hay tương sanh cũng vậy ( dù đăng điện hay đắc vị cung vây. Đông Tứ Trạch có nó thì nguy vì Kim khắc Mộc, như Chấn, Tốn, Ly là tương khắc</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Người trưởng nam trong gia đình gặp nhiều sự thất bại, úng về việc phá tan, hư hao, tai họa, tụng hình, quang sự nhiễu nhương</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Bếp đặt ở hướng này thì thọ khang, thêm người thêm của, sinh con dễ nuô</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Trái lại nếu bếp xoay hướng này, tật bệnh tử cong</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nên cất muối, mắm, cá mặt vào hướng này là an toàn</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-danger">
                      <div class="panel-heading"><p class="text-center color_black"><b>Họa Hại</b> </p></div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Họa Hại thuộc sao Lộc Tồn vì đồng thuộc Thổ Tinh, là một hung du niên, đem hung khí vào nhà, sinh ra nhiều tai họa. Cái sức hung hại cú nó tương đương với Lục sát. Đối với Đông Tứ Trạch thì là tương sinh, đối với Tây Tứ Trạch nó bị khắc, không nguy hại bằng tuyệt mạng và ngũ quỷ, làm hại đến nhị phòng, là sao cô quả, hiếm hoi con cái, những chứng bệnh đau mắt</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu Bếp mà đặt cung Họa Hại, sẽ không có bệnh tật không tán tài, nhưng tái lại miệng lò mà đặt xoay hướng này thì sinh ra thù oán, tranh chấp cãi vã, vợ chồng lục đục, làm ăn khó khăn</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nên để các đồ vật bằng sắt thép để vào hướng này là rất tốt</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading"><p class="text-center color_black"><b>Lục Sát</b> </p></div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Lục Sát tức là sao Văn Khúc vì đồng thuộc Thủy Tinh là hung du niên, đem sát khí vào nhà, chuyên ứng về tai nạn nước, dâm đãng. Nó ở bếp hại nhiều hơn ở chỗ khác. Cái sức lục gây tai họa của nó kém hơn Ngũ Quỷ và Tuyệt Mạng, vì nó thuộc thủy đối với Đông Tứ Trạch và Tây Tứ Trạch đều tương sinh. Phạm vào cung Khôn, Cấn, Tốn là hung là phạm tiểu phòng, ứng sự tà dâm, điều bất chính,</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Bếp đặt cung này thì không bị kiên cáo, không bị hỏa hoạn, có tiền của vào, không hao tổn người</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align: justify;">Nếu bếp quay về hướng này thì sẽ bị hao tài, mất đức</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>

                    <div class="panel panel-primary">
                      <div class="panel-heading"><p class="text-center color_black"><b>Ngũ Quỷ</b> </p></div>
                      <div class="panel-body">
                            <div>
                                <ul>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align:justify">Ngũ Quỷ tức là sao Liêm Trinh vì đồng thuộc Hỏa Tinh, là du niên rất hung đem lại tai họa vào nhà, thứ nhất là những chuyện quái dị, bệnh hoạn và các tai nạn máu lửa. Ngũ Quỷ ở Tây Tứ Trạch thì nguy nhất vì có Hỏa khắc Kim. Dù đang viên hay đắc vị cũng hại chủ nhà, úng về những mất mát, việc trốn tránh, tâm bệnh buồn thương</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align:justify">Nếu Bếp đặt cung Ngũ Quỷ thì sẽ không có trộm cướp, có nhiều người làm giúp việc đắc lực, tận tâm, phát tại thịnh vượng, không tai họa</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align:justify">Nếu bếp quay về hướng Ngũ Quỷ thì bị kiện tụng, khẩu thiệt</p>
                                    </li>
                                    <li dir="ltr">
                                    <p dir="ltr" style="text-align:justify">Nếu đặt một lu có chúa nước có nắp đậy ở cung Ngũ Quỷ để dùng thì lại là rất tốt</p>
                                    </li>
                                </ul>

                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- box tu van phong thuy -->
        <div class="field">
            <div class="row">
                <div class="col-md-12">
                    <fieldset style="border:1px solid #a94442; padding: 15px; margin-bottom: 20px;background-color: #d9edf7;">
                    <legend style="width: auto; border-bottom: 0px;text-shadow: 1px 1px 1px;"><b>THÔNG BÁO</b></legend>
                      <p>
                        Trên đây là những thông tin chung nhất, nên độ chính xác khoảng 80%. Thực tế thông tin chuẩn xác nhất cho từng người còn dựa vào: <br>
                        - Năm/tháng/ngày/giờ sinh của người đó <br>
                        - Mục đích muốn XEM TỬ VI để làm gì? <br>
                        Vui lòng nhập băn khoăn của bạn tại chuyên mục <b><a class="color_red" style="text-decoration: underline;" href="<?php echo base_url('tu-van-phong-thuy.html'); ?>">[Tư vấn hỏi đáp]</a></b> chuyên gia sẽ phản hồi câu hỏi của bạn trong thời gian sớm nhất thông qua Email hoặc Số điện thoại bạn để lại.
                      </p>
                   </fieldset>
                </div>
            </div>
        </div>
        <!-- end box tu van phong thuy -->
    <?php endif ?>
    
    <?php if ($run_sublink == 1): ?>
        <?php if (isset($info_user)): ?>
            <?php
                $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
                $canchi = get_chi_replace($info_user['namcanchi']);
                $namsinh    = $namsinh;
            ?>
            <div class="field" style="font-size: 16px;">
                <div class="row">
                    <div class="col-md-12">
                        <p class="title_p boidam">Nếu quý bạn xem hướng nhà và muốn quay theo hướng tốt của mình, thì cũng cần tham khảo các công cụ sau để công việc được tiến hành trôi chảy, hanh thông, thuận lợi:</p>
                        <div>
                            <ul class="ul">
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-dong-tho.html'); ?>">Xem ngày động thổ</a>: chọn lựa ngày tốt động thổ hợp tuổi <?php echo $canchi; ?> của quý bạn
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-do-tran-lop-mai.html'); ?>">Xem ngày đổ mái</a> : lựa chọn ngày tốt đổ trần, lợp mái hợp tuổi <?php echo $canchi; ?> của quý bạn
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-ngay-tot-nhap-trach-nha-moi.html'); ?>">Xem ngày nhập trạch</a> : lựa chọn ngày nhập trạch về nhà mới hợp tuổi <?php echo $canchi; ?> của quý bạn
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="title_p boidam">Quý bạn cũng nên tham khảo các công cụ hợp tuổi khác để:</p>
                        <div>
                            <ul class="ul">
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-lam-nha/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-lam-nha-'.date('Y').'-co-tot-khong.html'); ?>">xem tuổi làm nhà cho người sinh năm <?php echo $namsinh; ?></a> : tham khảo những tuổi của quý bạn tốt trong công việc xây nhà, làm nhà, sửa nhà
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-mua-nha.html'); ?>">xem tuổi mua nhà</a> của <?php echo $canchi; ?> : tham khảo những tuổi của quý bạn tốt trong việc mua nhà, mua đất.
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-lam-an/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-hop-lam-an-voi-tuoi-nao.html'); ?>">Xem tuổi làm ăn hợp với <?php echo $canchi; ?></a> : tham khảo những tuổi hợp với quý bạn trong lĩnh vực làm ăn buôn bán
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-hop-nhau/tuoi-'.$slugcanchi.'-sinh-nam-'.$namsinh.'-hop-voi-tuoi-nao.html'); ?>">xem người sinh năm <?php echo $namsinh; ?> hợp với tuổi nào</a>  : tham khảo các tuổi hợp với quý bạn trong mọi lĩnh vực của cuộc sống
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html'); ?>">Xem tuổi vợ chồng</a> : tham khảo xem vợ chồng quý bạn hợp nhau như thế nào hoặc những tuổi hợp với quý bạn trong quan hệ vợ chồng
                                </li>
                                <li>
                                    - Sử dụng công cụ <span class="btn_nhaynhay"></span><a href="<?php echo base_url('xem-tuoi-sinh-con.html'); ?>">Xem tuổi sinh con</a> : tham khảo những năm sinh con hợp với tuổi của bố mẹ
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
    <?php endif ?>
    
    <div class="field clearfix">
        <div class="col-md-12"></div>
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
</div>