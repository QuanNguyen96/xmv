<!-- Lam popup sau 1' hien thi -->
<div>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg hidden btn_show_modal_popup" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="padding: 3px 7px;border: 4px solid #000;border-radius: 45px;opacity: 1;">&times;</button>
                    <h4 class="modal-title text-center" style="color: #c10000;">Bạn có muốn chúng tôi tư vấn xem phong thủy sim của bạn không?</h4>
                </div>
                <div class="modal-body xemboisim">
                    <div class="data_form_view_submit">
                        
                    </div>
                    <p class="text-center h6"><i>Hãy điền đầy đủ thông tin vào form dưới đây để được chúng tôi tư vấn sớm nhất!</i></p>
                    <form action="" class="form_submit_tu_van" name="form_tu_van_xem_phong_thuy_sim" method="post" onsubmit="submit_form_tu_van_xem_phong_thuy_sim();return false;">
                        <div class="form-group">
                            <label for="name">Nhập họ tên:</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="day_birth">Nhập ngày, tháng, năm sinh:</label>
                            <section class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <select name="ngaysinh" class="form-control" required="">
                                        <option value="">Ngày</option>
                                        <?php 
                                            for( $i = 1; $i<= 31; $i++ ){
                                                $slt = $ngay == $i ? 'selected=""' :'';
                                                echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <select name="thangsinh" class="form-control" required="">
                                        <option value="">Tháng</option>
                                        <?php 
                                            for( $i = 1; $i<= 12; $i++ ){
                                                $slt = $thang == $i ? 'selected=""' :'';
                                                echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <select name="namsinh" id="namsinh" class="form-control" required="">
                                        <option value="">Năm</option>
                                        <?php 
                                            for( $i = 1950; $i<= 2025; $i++ ){
                                                $slt = $nam == $i ? 'selected=""' :'';
                                                echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                            </section>
                        </div>
                        <div class="form-group">
                            <label for="giosinh">Giờ sinh:</label>
                            <select name="giosinh" class="form-control" required="">
                                <option value="">Giờ sinh</option>
                                <option value="23 giờ đến 1 giờ">23 giờ đến 1 giờ</option>
                                <option value="1 giờ đến 3 giờ">1 giờ đến 3 giờ</option>
                                <option value="3 giờ đến 5 giờ">3 giờ đến 5 giờ</option>
                                <option value="5 giờ đến 7 giờ">5 giờ đến 7 giờ</option>
                                <option value="7 giờ đến 9 giờ">7 giờ đến 9 giờ</option>
                                <option value="9 giờ đến 11 giờ">9 giờ đến 11 giờ</option>
                                <option value="11 giờ đến 13 giờ">11 giờ đến 13 giờ</option>
                                <option value="13 giờ đến 15 giờ">13 giờ đến 15 giờ</option>
                                <option value="15 giờ đến 17 giờ">15 giờ đến 17 giờ</option>
                                <option value="17 giờ đến 19 giờ">17 giờ đến 19 giờ</option>
                                <option value="19 giờ đến 21 giờ">19 giờ đến 21 giờ</option>
                                <option value="21 giờ đến 23 giờ">21 giờ đến 23 giờ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gioitinh">Chọn giới tính:</label>
                            <select class="form-control" id="gioitinh" name="gioitinh" required="">
                                <option value="Nam" selected="selected">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone_now">Nhập số điện thoại hiện tại hoặc email của bạn:</label>
                            <input type="text" name="phone_now" id="phone_now" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="phone_view">Nhập số điện thoại muốn xem (hiện tại):</label>
                            <input type="number" name="phone_view" id="phone_view" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Gửi ngay</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
  
</div>
<section class="btnGirlTV">
    <img src="<?php echo base_url('templates/site/images/icon/tuvan.png'); ?>">
</section>
<script>
$(document).ready(function(){
    /*$("button").click(function(){
        $.post("<?php echo base_url('tu-van-xem-phong-thuy-sim-khach-hang.html'); ?>",
        {
            name: "Donald Duck",
            city: "Duckburg"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });*/

    // Sau 1' hien thi form
    setTimeout(function(){
        $('.btn_show_modal_popup').click();
    }, 60000);

    $('#myModal').on('hidden.bs.modal', function (e) {
        $('.btnGirlTV').slideDown('fast');
    });
    $('.btnGirlTV').click(function() {
        $('.btn_show_modal_popup').click();
        $(this).slideUp('fast');
    });
});
function submit_form_tu_van_xem_phong_thuy_sim() {
    var frm = document.form_tu_van_xem_phong_thuy_sim;
    var iName  = frm.name.value;
    var iNgaysinh  = frm.ngaysinh.value;
    var iThangsinh  = frm.thangsinh.value;
    var iNamsinh  = frm.namsinh.value;
    var iGiosinh  = frm.giosinh.value;
    var iGioitinh  = frm.gioitinh.value;
    var iPhone_now  = frm.phone_now.value;
    var iPhone_view  = frm.phone_view.value;

    $.post(
        "<?php echo base_url('tu-van-xem-phong-thuy-sim-khach-hang.html'); ?>",
        {
            name: iName,
            ngaysinh: iNgaysinh,
            thangsinh: iThangsinh,
            namsinh: iNamsinh,
            giosinh: iGiosinh,
            gioitinh: iGioitinh,
            phone_now: iPhone_now,
            phone_view: iPhone_view,
        },
        function(data,status){
            if (status == "success") {
                data_response = data.response;
                data_msg = data.msg;
                if (data_msg == 1) {
                    $('.data_form_view_submit').html(data_response);
                    $('.form_submit_tu_van').fadeOut('slow');
                }
                else{
                    $('.data_form_view_submit').html(data_response);
                }
            }
            else{
                $('.data_form_view_submit').html('<p class="alert alert-warning">Có lỗi từ hệ thống vui lòng thử lại sau ít phút nhé!</p>');
            }
            // alert("Data: " + data + "\nStatus: " + status);
        },
        "json",
    );
}
</script>
<style type="text/css">
    .btnGirlTV{ position: fixed;right: 62px;bottom: 10px;z-index: 500000000;display: none;box-shadow: 2px 2px 2px #ccc; }
    .btnGirlTV img{ width: 200px; }
    /*Tablet nhỏ(480 x 640)*/
    @media only screen and (max-width: 480px) {
        .modal-dialog{ margin: 22px; }
    }
    
</style>