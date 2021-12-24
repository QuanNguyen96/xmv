<?php
    $labai = array(
      array('0','0','0',1, 'background-position:0px -0px;'),
      array('1','0','1',1, 'background-position:71px -0px;'),
      array('2','0','2',1, 'background-position:213px -0px;'),
      array('3','0','3',1, 'background-position:213px -0px;'),
      array('4','1','0',2, 'background-position:0px -96px;'),
      array('5','1','1',2, 'background-position:71px -96px;'),
      array('6','1','2',2, 'background-position:142px -96px;'),
      array('7','1','3',2, 'background-position:213px -96px;'),
      array('8','2','0',3, 'background-position:0px -192px;'),
      array('9','2','1',3, 'background-position:71px -192px;'),
      array('10','2','2',3, 'background-position:142px -192px;'),
      array('11','2','3',3, 'background-position:213px -192px;'),
      array('12','3','0',4,'background-position:0px -288px;'),
      array('13','3','1',4, 'background-position:71px -288px;'),
      array('14','3','2',4, 'background-position:142px -288px;'),
      array('15','3','3',4,'background-position:213px -288px;'),
      array('16','4','0',5,'background-position:0px -384px;'),
      array('17','4','1',5,'background-position:71px -384px;'),
      array('18','4','2',5,'background-position:142px -384px;'),
      array('19','4','3',5,'background-position:213px -384px;'),
      array('20','5','0',6,'background-position:0px -480px;'),
      array('21','5','1',6,'background-position:71px -480px;'),
      array('22','5','2',6,'background-position:142px -480px;'),
      array('23','5','3',6,'background-position:213px -480px;'),
      array('24','6','0',7,'background-position:0px -576px;'),
      array('25','6','1',7,'background-position:71px -576px;'),
      array('26','6','2',7,'background-position:142px -576px;'),
      array('27','6','3',7,'background-position:213px -576px;'),
      array('28','7','0',8,'background-position:0px -672px;'),
      array('29','7','1',8,'background-position:71px -672px;'),
      array('30','7','2',8,'background-position:142px -672px;'),
      array('31','7','3',8,'background-position:213px -672px;'),
      array('32','8','0',9,'background-position:0px -768px;'),
      array('33','8','1',9,'background-position:71px -768px;'),
      array('34','8','2',9,'background-position:142px -768px;'),
      array('35','8','3',9,'background-position:213px -768px;'),
      array('36','9','0',10,'background-position:0px -864px;'),
      array('37','9','1',10,'background-position:71px -864px;'),
      array('38','9','2',10,'background-position:142px -864px;'),
      array('39','9','3',10,'background-position:213px -864px;'),
    );
    $xaobai = $labai;    
    shuffle($xaobai);  
    $labai1 = rand(0,19);      
    $labai2 = rand(0,19);    
?>
<link rel="stylesheet" href="<?php echo base_url('templates/site/css/boibai.css');?>" />
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm block_boibai tinhyeu">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="col-md-12 field">
        <div class="col-md-12 field"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <div class="col-md-12 field">
        <div class="" id="bbhn_thong_bao">Hãy nghĩ đến người bạn yêu và click Hình dưới :</div>
        <div class="bbnh_ok text-center">
            <?php 
                $tongdiem = 0; 
                $i = 0;
                foreach( $xaobai as $key => $val ): 
                $i++;
                if( $key == $labai1 || $key == $labai2 )
                {
                   $class = 'la_bai_ok';
                   $tongdiem = $tongdiem + $val[3];
                }
                else
                {
                  $class = 'la_bai_ko_ok';
                }
                ?>
            <div class="la_bai <?php echo $class;?>" id="#la_bai<?php echo $val[0].'_'.$val[1];?>" style="<?php echo $val[4];?>"></div>
            <?php if($i==20) break; endforeach; ?>   
        </div>
        <div id="ok_bbhn_okok" data-ok="da_co_cap_chon"></div>
        <button class="btn_xao_bai"> </button>
        <div id="bbhn_ket_qua_cuoi_cung" style="text-align:left;display:none;">
            <br />
            <div id="boi_bai_tinh_yeu_diem"><?php echo $tongdiem; ?> ĐIỂM </div>
            <div class="an">
                <b>LỜI GIẢI CHO CẶP BÀI <?php echo $tongdiem; ?> ĐIỂM: </b>
                <br />
                <div class="luan">
                  
                </div>
                <section class="xemorder" style="display: none;">
                  <div class="dieuhuong_tu_vi_2020">
                    <a href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>" class="nut_ban_repon">XEM BÓI TÌNH YÊU NĂM 2021</a>
                    <a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html'); ?>" class="nut_ban_repon">XEM BÓI TÌNH YÊU NĂM 2020</a>
                    <a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>" class="nut_ban_repon">Bói SĐT 2020</a>
                  </div>
                  <div class="" style="margin-top: 8px;text-align: center;">
                    <a class="md_nut_bam btn_delete_first" href="<?php echo current_url();?>">Xóa và xem lại từ đầu</a>
                    <a class="md_nut_bam btn_load_againt" href="<?php echo current_url();?>">Xem cho người khác</a>
                  </div>
                </section>
            </div>
            <div class="form-nhanketqua clearfix hidden" style="background-color: #f7e6ec;">
                <form action="" method="POST">
                    <br>
                    <div class="text-center">
                        <i style="color: black;">Vui lòng Soạn tin nhắn theo cú pháp <b>DK PT1</b> gửi <b>5657</b> để lấy <b>Mã xác nhận</b>. Sau khi nhập <b>Mã</b>, ngay lập tức quý bạn sẽ nhận được kết quả xem bói tình yêu chi tiết.</i>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label style="color: black;">Mã xác nhận:</label>
                    </div>
                    <div class="col-md-6">
                        <input style="color: black;" type="text" class="code" maxlength="50" name="code" value="" placeholder="Nhập mã xác nhận tại đây..." required="">
                    </div>
                    <div class="col-md-3 text-center">
                        <button class="shownoidung">Nhận kết quả</button>
                    </div>
                </form>
            </div>
            <div class="xemthem hidden"><a class="md_nut_bam" href="<?php echo base_url('xem-boi-bai-tinh-yeu.html');?>">Xem cho người khác</a></div>
        </div>
        
    </div>
    <div class="box_content box_xvm box_ngaytotxau">
      <div class="box_content_tt">xem bói tình yêu</div>
      <br>
      <div class="text-center">Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</div>
      <br>
      <form name="" action="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>" method="post">
         <div class="field">
           <div class="col-md-6 col-md-offset-3 col-xm-6 col-sm-offset-3 col-xs-12">
             <input type="text" name="tentrai" value="<?php echo set_value('tentrai'); ?>" placeholder="Nhập tên bạn trai" />
           </div>
         </div>
         <div class="field">
           <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
              <select name="ngaysinhtrai">
                  <option value="">Ngày sinh dương</option>
                  <?php 
                      for( $i = 1; $i<= 31; $i++ ){
                          
                          echo '<option '.set_select('ngaysinhtrai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                      }
                   ?>
               </select>
           </div>
           <div class="col-md-2 col-sm-4 col-xs-4">
               <select name="thangsinhtrai">
                  <option value="">Tháng sinh</option>
                  <?php 
                      for( $i = 1; $i<= 12; $i++ ){
                          echo '<option '.set_select('thangsinhtrai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                      }
                   ?>
               </select>
           </div>
           <div class="col-md-2 col-sm-4 col-xs-4">
               <select name="namsinhtrai">
                  <option value="">Năm sinh</option>
                  <?php 
                      for( $i = 1950; $i<= 2025; $i++ ){
                          // $slt = $nam == $i ? 'selected=""' :'';
                          echo '<option '.set_select('namsinhtrai', $i).' value="'.$i.'" >'.$i.'</option>';
                      }
                   ?>
               </select>
           </div>
         </div>
         <div class="field">
           <div class="col-md-6 col-md-offset-3 col-xm-6 col-sm-offset-3 col-xs-12">
             <input type="text" name="tengai" value="<?php echo set_value('tengai'); ?>" placeholder="Nhập tên bạn gái" />
           </div>
         </div>
         <div class="field">
           <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
              <select name="ngaysinhgai">
                  <option value="">Ngày sinh dương</option>
                  <?php 
                      for( $i = 1; $i<= 31; $i++ ){
                          echo '<option '.set_select('ngaysinhgai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                      }
                   ?>
               </select>
           </div>
           <div class="col-md-2 col-sm-4 col-xs-4">
               <select name="thangsinhgai">
                  <option value="">Tháng sinh</option>
                  <?php 
                      for( $i = 1; $i<= 12; $i++ ){
                          echo '<option '.set_select('thangsinhgai', $i).' value="'.$i.'" '.$slt.'>'.$i.'</option>';
                      }
                   ?>
               </select>
           </div>
           <div class="col-md-2 col-sm-4 col-xs-4">
               <select name="namsinhgai">
                  <option value="">Năm sinh</option>
                  <?php 
                      for( $i = 1950; $i<= 2025; $i++ ){
                          // $slt = $nam == $i ? 'selected=""' :'';
                          echo '<option '.set_select('namsinhgai', $i).' value="'.$i.'" >'.$i.'</option>';
                      }
                   ?>
               </select>
           </div>
         </div>
         <div class="field field_center">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <button type="submit" class="button">Xem kết quả</button>
            </div>
         </div>
      </form>
    </div>
    <div class="field clearfix">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
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
<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
<script type="text/javascript" language="javascript">
    var bbty_so_lan_bam = 0 ;
    jQuery.fn.shuffle_labai = function () {
            var j;
            for (var i = 0; i < this.length; i++) {
                j = Math.floor(Math.random() * this.length);
          if(j!=i)
          {
            if($(this[i]).hasClass("la_bai_ok")==false && $(this[j]).hasClass("la_bai_ok")==false)
            {
              $(this[i]).before($(this[j]));
            }
            else
            {
              var bbhn_c = Math.floor(Math.random() * this.length);
              if($(this[bbhn_c]).hasClass("la_bai_ok")==false)
              {
                $(this[i]).before($(this[bbhn_c]));
              }
            }
          }
            }
        };
      
    jQuery.fn.loai_labai = function () {
            var j;
        var i_bbty_solan_bo = Math.floor(Math.random() * 7) + 2;
        var bbty_so_bai_cl = this.length;
            for (var i = 0; i <= i_bbty_solan_bo; i++) {
                j = Math.floor(Math.random() * this.length);
          if($(this[j]).hasClass("la_bai_ok")==false)
          {
            $(this[j]).fadeOut(1000);
            bbty_so_bai_cl-=1;
            setTimeout(function(){
              $(this[j]).remove();
              $(".la_bai").shuffle_labai(); 
            },1000);
          }
            }
        bbty_so_lan_bam += 1 ;
        if(bbty_so_bai_cl==2 || bbty_so_lan_bam>=8)
        {
          $(".la_bai_ko_ok").fadeOut(1000);
          $(".la_bai_ok").fadeIn(1000);
          setTimeout(function(){
              $(".la_bai_ko_ok").remove();
            },1000);
                $.ajax({
              type: "POST",
              dataType: 'json',
                    url: "<?php echo base_url('xem-boi-bai-tinh-yeu.html');?>",
              data: {diem:<?php echo $tongdiem;?>},
              success: function(result)
                    {
                       $('.luan').html(result.luan);
                       $('.xemorder').fadeIn('fast');
              }
            });    
          $("#bbhn_ket_qua_cuoi_cung").fadeIn(1000);
          $("#bbhn_thong_bao").text("CẶP BÀI ĐIỂM CỦA BẠN :");
        }
        };
    $(function(){
      $(".la_bai").shuffle_labai();
      $(".la_bai").fadeOut(10); 
    });
    $(".btn_xao_bai").click(function(){
      $(".la_bai").fadeIn(300);
        $(".bbnh_ok").fadeIn(300);
      $(".btn_xao_bai").remove();
      $("#bbhn_thong_bao").text("Hãy nghĩ đến người bạn yêu và click vào lá bài ngẫu nhiên cho đến khi chỉ còn hai lá bài !!!");
    });
    $(".la_bai").click(function(){
        $("#bbhn_thong_bao").text("Hãy nghĩ đến người bạn yêu và click vào lá bài ngẫu nhiên cho đến khi chỉ còn hai lá bài !!!");
        $(".la_bai").loai_labai();
    });
    
</script>
<script>
    $(document).ready(function(){
      // $('.shownoidung').on('click',function(){
      //     var code = $('.code').val();
      //     var date_created = '<?php echo strtotime(date('j-n-Y')) ?>';
      //     var url = window.location.href;
      //     if (code == '') {
      //         alert('Quý vị vui lòng nhập mã xác nhận!');
      //     }else{
      //       $.ajax({
      //           url: '<?php echo base_url(); ?>' + 'ajax-check-code',
      //           type:'POST',
      //           dataType: 'json',
      //           data:{
      //             code: code,date:date_created,url:url,
      //           },
      //           success:function(response){
      //             if (response.check == true) {
      //               $('.an').removeClass('hidden');
      //               $('.form-nhanketqua').hide();
      //             }else{
      //               alert(response.mes);
      //             }
      //           }
      //       });
      //     }
      //     return false;
      // });
    
      // $('#nhanketqua').on('click',function(){
      //   $('.an').removeClass('hidden');
      //   $(this).hide();
      // });
    });
function $_GET(q, s) {
    s = (s) ? s : window.location.search;
    var re = new RegExp('&amp;' + q + '=([^&amp;]*)', 'i');
    return (s = s.replace(/^\?/, '&amp;').match(re)) ? s = s[1] : s = '';
}
$(document).ready(function(){
  var click = $_GET('click');
  if (click == 'true') {
    $('html, body').animate({scrollTop: $('#bbhn_thong_bao').offset().top},800);
    $('.btn_xao_bai').trigger('click');
  }
});
</script>