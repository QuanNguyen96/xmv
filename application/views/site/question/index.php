<style>
    .chudekhac{
        display: none;
    }
</style>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <?php if (isset($return) && $return == 1): ?>
        <div class="col-md-12">
            <div class="alert alert-success return_question">
                <div class="text-center">
                    <p>Gửi câu hỏi thành công, chúng tôi sẽ phản hồi cho quý vị trong thời gian sớm nhất, xin cảm ơn!</p>
                </div>
            </div>
        </div>
    <?php endif ?>
    <form action="" method="POST">
        <div class="text-center">
            <h3 class="text-danger"><b>ĐẶT CÂU HỎI THEO CHỦ ĐỀ</b></h3>
            <br>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Họ và tên (*):</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="name" id="hovaten" value="" required="" placeholder="Nhập họ và tên ...">
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Email:</label>
            </div>
            <div class="col-md-9">
                <input type="text" id="email" name="email" value=""  placeholder="Nhập Email ...">
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Số điện thoại:</label>
            </div>
            <div class="col-md-9">
                <input type="number" id="phone" name="phone" value=""  placeholder="Nhập Số điện thoại ...">
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Ngày sinh (*):</label>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <select name="ngaysinh" id="ngaysinh" required="">
                            <?php for($i = 1; $i<=31;$i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="thangsinh" id="thangsinh" required="">
                            <?php for($i = 1; $i<=12;$i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="namsinh" id="namsinh" required="">
                            <?php for($i = 1950; $i<=date('Y');$i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Giờ sinh (*):</label>
            </div>
            <div class="col-md-9">
                <select name="gio" class="" required="" id="giosinh">
                    <?php 
                        $list_gio_sinh_operator = list_gio_sinh_operator();
                        ?>
                    <?php foreach ($list_gio_sinh_operator as $key => $value): ?>
                        <option value="<?php echo $value ?>"><?php echo $value; ?></option>
                    <?php endforeach ?>
              </select>
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Chủ đề (*):</label>
            </div>
            <div class="col-md-9">
                <select name="them" id="chude" required="">
                    <option value="">Chọn chủ đề</option>
                    <?php foreach ($them as $key => $value): ?>
                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                    <?php endforeach ?>
                    <option value="chu-de-khac">Chủ đề khác</option>
                </select>
            </div>
        </div>
        <div class="form-group clearfix chudekhac">
            <div class="col-md-3" align="right">
                <label for="">Chủ đề muốn hỏi (*):</label>
            </div>
            <div class="col-md-9">
                <input type="text" value="" name="them1" id="chudekhac" placeholder="Nhập chủ đề muốn hỏi...">
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-md-3" align="right">
                <label for="">Nội dung câu hỏi (*):</label>
            </div>
            <div class="col-md-9">
                <textarea name="content" id="content" style="width: 100%;" rows="10" required=""></textarea>
            </div>
        </div>
        <div class="form-group clearfix text-center">
            <button type="submit" id="submit" name="submit" value=""><span class="glyphicon glyphicon-send"></span>&nbsp;Gửi câu hỏi</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#chude').on('change',function(){
            var tenchude = $('#chude').val();
            if (tenchude == 'chu-de-khac') {
                $('.chudekhac').slideDown();
            }else{
                $('.chudekhac').slideUp();
            }
        });

        $('#submit').on('click',function(){
            var phone = $('#phone').val();
            var email = $('#email').val();
            if (phone == '' && email == '') {
                alert('Quý vị vui lòng nhập thông tin email hoặc số điện thoại, xin cảm ơn!'); return false;
            }
            
            if (email != '') {
                var regex   = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var test    = regex.test(email);
                if (test == false) {
                    alert('Quý vị vui lòng nhập đúng định dạng email');
                    return false;
                }
            }

            if (phone != '') {
                var phone1 = phone.length;
                if (phone1 < 10 || phone1 > 11) {
                    alert('Quý khách vui lòng nhập đúng số điện thoại');
                    return false;
                }else{
                    var str = phone;
                    var arr = str.split("");
                    var text = "";
                    var text1 = "";
                    text += arr[0] + arr[1] + arr[2];
                    var arr_index = ['096','097','098','086','016','091','094','088','093','090','089','092','018','099','019','012'].indexOf(text);
                    if (arr_index == -1) {
                        alert('Quý khách vui lòng nhập đúng số điện thoại');
                    }
                }
            }
            var tenchude = $('#chude').val();
            var hovaten  = $('#hovaten').val();
            var content  = $('#content').val();
            if (tenchude == '' || hovaten == '' || content == '') {
                alert('Quý vị vui lòng nhập đầy đủ thông tin các trường có dấu *');
                return false;
            }
            if (tenchude == 'chu-de-khac') {
                var chudekhac = $('#chudekhac').val();
                if (chudekhac == '') {
                    alert('Quý vị vui lòng nhập chủ đề muốn hỏi');
                    return false;
                }
            }
        });
        setTimeout(function(){
            $('.return_question').hide('slow');
        },5000);
    });
</script>