<?php 
$arr_gio_sinh = array(
'23 giờ đến 1 giờ',
'1 giờ đến 3 giờ',
'3 giờ đến 5 giờ',
'5 giờ đến 7 giờ',
'7 giờ đến 9 giờ',
'9 giờ đến 11 giờ',
'11 giờ đến 13 giờ',
'13 giờ đến 15 giờ',
'15 giờ đến 17 giờ',
'17 giờ đến 19 giờ',
'19 giờ đến 21 giờ',
'21 giờ đến 23 giờ',
);
?>
<!-- Modal -->
<div id="tuvan" class="modal fade mypopup luangiaisim" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content--> 
    <div class="modal-content">
      <span  class="close" data-dismiss="modal">&nbsp;</span>
      <div class="modal-body">
         <h4 class="luangiaisim_desk">Bạn muốn được tư vấn <b>chọn sim phong thủy</b> hợp bản mệnh từ chuyên gia Duy Tâm Phúc?
         </h4>
         <h4 class="luangiaisim_mobi">
           <span>Bạn muốn được tư vấn</span>
           <span>Sim phong thủy hợp bản mệnh?</span>
         </h4>
         <p class="text-center">Hãy điền đầy đủ thông tin dưới đây để chúng tôi có thể tư vấn trực tiếp cho bạn!</p>
         <div class="data_form_view_submit data_form_view_submit_luangiaisim">
                        
         </div>
         <div class="row">
           <div class="col-md-4">
             <img src="<?php echo base_url('templates/site/images/tv_lg_sim/img-lg.jpg');?>">
           </div>
           <div class="col-md-8 col-xs-12">
              <form action="" class="form_submit_tu_van form_submit_tu_van_tuvan" name="form_tu_van_chon_sim" method="post" onsubmit="submit_form_tu_van_chon_sim();return false;">
                 <div>
                  <label>Họ và tên <b>(*)</b>:</label>
                  <input type="text" name="name" value="" required="">
                 </div>
                 <div>
                  <label class="lbgt">Giới tính <b>(*)</b>:</label>
                  <input type="radio" name="gioitinh" required="" value="Nam" <?php if( $gioi_tinh == 'Nam' ) echo 'checked=""';?>> Nam
                  <input type="radio" name="gioitinh" required="" value="Nữ" <?php if( $gioi_tinh == 'Nữ' ) echo 'checked=""';?> class="rdon"> Nữ
                 </div>
                 <div>
                  <label>Năm sinh <b>(*)</b>:</label>
                  <select name="giosinh" required="" style="width: 80px;">
                    <option value="">Giờ sinh</option>
                    <?php foreach ($arr_gio_sinh as $key => $value): 
                            $slt = $value == $gio_sinh ? 'selected=""' : ''; 
                    ?>
                      <option value="<?php echo $value; ?>" <?php echo $slt;?>><?php echo $value; ?></option>
                    <?php endforeach ?>
                  </select>
                  <select name="ngaysinh" required="">
                    <option value="">Ngày</option>
                    <?php 
                      for( $i = 1; $i<= 31; $i++ ){
                          $slt = $i == $ngay_sinh ? 'selected=""' : '';
                          echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                      }
                    ?>
                  </select>
                  <select name="thangsinh" required="">
                    <option value="">Tháng</option>
                    <?php 
                      for( $i = 1; $i<= 12; $i++ ){
                          $slt = $i == $thang_sinh ? 'selected=""' : '';
                          echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                      }
                      ?>
                  </select>
                  <select name="namsinh" required="">
                    <option value="">Năm</option>
                    <?php 
                      for( $i = 1960; $i<= 2000; $i++ ){
                          $slt = $i == $nam_sinh ? 'selected=""' : '';
                          echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                      }
                    ?>
                  </select>
                 </div>
                 <div>
                  <label>Số điện thoại liên hệ <b>(*)</b>:</label>
                  <input type="text" name="phone" required="" value="<?php echo $so_sim; ?>">
                 </div>
                 <div>
                  <label>Email:</label>
                  <input type="text" name="email">
                 </div>
                 <div>
                  <label class="lbtr"></label>
                  <i>Hãy để chúng tôi lắng nghe mong muốn của bạn!</i>
                 </div>
                 <div>
                  <label>Yêu cầu mong muốn:</label>
                  <textarea name="yeucau"></textarea>
                 </div>
                 <div class="note">
                  <strong>Lưu ý</strong> <b>(*)</b> thông tin không được để trống
                 </div>
                 <div class="text-center">
                  <button type="submit">Gửi yêu cầu</button> 
                 </div>
              </form>
           </div>
         </div>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
function submit_form_tu_van_chon_sim() {
    var frm = document.form_tu_van_chon_sim;
    var iName  = frm.name.value;
    var iGiosinh  = frm.giosinh.value;
    var iNgaysinh  = frm.ngaysinh.value;
    var iThangsinh  = frm.thangsinh.value;
    var iNamsinh  = frm.namsinh.value;
    var iGioitinh  = frm.gioitinh.value;
    var iPhone  = frm.phone.value;
    var iEmail  = frm.email.value;
    var iYeucau  = frm.yeucau.value;

    $.post(
        "<?php echo base_url('ajax-tu-van-chon-sim'); ?>",
        {
            name: iName,
            giosinh:iGiosinh,
            ngaysinh: iNgaysinh,
            thangsinh: iThangsinh,
            namsinh: iNamsinh,
            gioitinh: iGioitinh,
            phone: iPhone,
            email: iEmail,
            yeucau:iYeucau
        },
        function(data,status){
            if (status == "success") {
                data_response = data.response;
                data_msg = data.msg;
                if (data_msg == 1) {
                    $('.data_form_view_submit_luangiaisim').html(data_response);
                    $('.form_submit_tu_van_tuvan').fadeOut('slow');
                }
                else{
                    $('.data_form_view_submit_luangiaisim').html(data_response);
                }
            }
            else{
                $('.data_form_view_submit_luangiaisim').html('<p class="alert alert-warning">Có lỗi từ hệ thống vui lòng thử lại sau ít phút nhé!</p>');
            }
            // alert("Data: " + data + "\nStatus: " + status);
        },
        "json",
    );
}
</script>