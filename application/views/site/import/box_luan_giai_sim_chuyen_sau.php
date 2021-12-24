<!-- Lam popup sau 1' hien thi -->
<div> 
    <!-- Modal -->
    <div class="modal fade mypopup tuvansim" id="luangiai" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <span  class="close" data-dismiss="modal">&nbsp;</span>
                <div class="modal-body xemboisim">
                    <h4>Bạn có muốn chúng tôi tư vấn xem phong thủy sim của bạn không?</h4>
                    <div class="data_form_view_submit data_form_view_submit_luangiai">
                        
                    </div>
                    <p class="text-center h6"><i>Hãy điền đầy đủ thông tin vào form dưới đây để được chúng tôi tư vấn sớm nhất!</i></p>
                    <form action="" class="form_submit_tu_van form_submit_tu_van_luangiai" name="form_tu_van_xem_phong_thuy_sim" method="post" onsubmit="submit_form_tu_van_xem_phong_thuy_sim();return false;">
                        <div class="">
                            <label for="name">Nhập họ tên:</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                        </div>
                        <div class="">
                            <label for="day_birth">Nhập ngày sinh:</label>
                            <section class="row">
                                <select name="ngaysinh" required="">
                                    <option value="">Ngày</option>
                                    <?php 
                                        for( $i = 1; $i<= 31; $i++ ){
                                            $slt = $ngay_sinh == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                                <select name="thangsinh"  required="">
                                    <option value="">Tháng</option>
                                    <?php 
                                        for( $i = 1; $i<= 12; $i++ ){
                                            $slt = $thang_sinh == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                                <select name="namsinh" id="namsinh"  required="">
                                    <option value="">Năm</option>
                                    <?php 
                                        for( $i = 1950; $i<= 2025; $i++ ){
                                            $slt = $nam_sinh == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </section>
                        </div>
                        <div class="">
                            <label for="giosinh">Giờ sinh:</label>
                            <select name="giosinh" class="" required="">
                                <option value="">Giờ sinh</option>
                                <?php foreach (gio_sinh() as $key => $value): 
                                         $slt = $value == $gio_sinh ? 'selected=""' : ''; 
                                ?>
                                    <option <?php echo $slt; ?> value="<?php echo $value;?>">
                                        <?php echo $value;?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="gioitinh">Chọn giới tính:</label>
                            <select class="" id="gioitinh" name="gioitinh" required="">
                                <option value="Nam" <?php if( $gioi_tinh == 'Nam' ) echo 'selected=""';?> >Nam</option>
                                <option value="Nữ" <?php if( $gioi_tinh == 'Nữ' ) echo 'selected=""';?>>Nữ</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="phone_now">Nhập số điện thoại hiện tại hoặc email của bạn:</label>
                            <input type="text" name="phone_now" id="phone_now" class="form-control" required="">
                        </div>
                        <div class="">
                            <label for="phone_view">Nhập số điện thoại muốn xem (hiện tại):</label>
                            <input type="number" name="phone_view" id="phone_view" class="" value="<?php echo $so_sim;?>" required="">
                        </div>
                        <br>
                        <div class=" text-center">
                            <button type="submit" class="">Gửi ngay</button>
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
                    $('.data_form_view_submit_luangiai').html(data_response);
                    $('.form_submit_tu_van_luangiai').fadeOut('slow');
                }
                else{
                    $('.data_form_view_submit_luangiai').html(data_response);
                }
            }
            else{
                $('.data_form_view_submit_luangiai').html('<p class="alert alert-warning">Có lỗi từ hệ thống vui lòng thử lại sau ít phút nhé!</p>');
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