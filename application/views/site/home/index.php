<link rel="stylesheet" href="<?php echo base_url('templates/site/jquery_ui/jquery_ui.css');?>" />
<script src="<?php echo base_url('templates/site/jquery_ui/jquery_ui.min.js'); ?>"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'd/m/yy' });
  });
</script>
<div class="box_content box_xvm box_ngaytotxau text-center">
    <h1 class="box_content_tt"><a href="<?php echo base_url('xem-ngay-tot-xau.html'); ?>">XEM NGÀY HÔM NAY TỐT HAY XẤU? NÊN LÀM GÌ HÔM NAY?</a></h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <?php
      $arr_seo_link_thang = 'xem-ngay-tot-trong-thang-$thang-nam-$nam'; 
    ?>
    <section class="boxFormXemNgay">
      <div class="boxOne">
        <form name="search_xemngay" action="" method="post" onsubmit="send_form();return false;">
          <div class="row">
            <div class="col-md-4 col-xm-4 col-xs-12">
              <p><label>Xem theo ngày</label></p>
            </div>
            <div class="col-md-4 col-xm-4 col-xs-12">
             <input type="text" name="input_time" id="datepicker" value="<?php echo date('j').'/'.date('n').'/'.date('Y'); ?>" />
            </div>
            <div class="col-md-4">
             <div class="field field_center">
                <button type="submit" class="button" onclick="xemngay('<?php echo base_url(); ?>')">Xem kết quả</button>
             </div>
            </div>
         </div>
        </form>
      </div>
      <script type="text/javascript">
        function send_form() {
            var frm = document.search_xemngay;
            var input_time   = frm.input_time.value;
            var arr = input_time.split('/');
            window.location.href = "<?php echo base_url(); ?>xem-ngay-tot-xau/ngay-"+arr[0]+"-thang-"+arr[1]+"-nam-"+arr[2]+".html";
        }
      </script>
      <div class="boxTwo">
        <form name="formSearch" action="" method="post" onsubmit="send_form_dong_tho();return false;">
          <div class="row">
              <div class="col-md-4 col-xm-4 col-xs-12">
                <p class=""><label>Xem theo tháng</label></p>
              </div>
              <div class="col-md-4 col-xm-4 col-xs-12">
                <div class="row">
                  <section class="col-md-6 col-sm-6 col-xs-6">
                    <select name="thang">
                      <?php
                        for ($i=1; $i<=12 ; $i++) { 
                          $selected = ($i==date('m'))?' selected="" ':'';
                          ?>
                          <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                          <?php
                        } 
                      ?>
                    </select>
                  </section>
                  <section class="col-md-6 col-sm-6 col-xs-6">
                    <select name="nam">
                      <?php
                      for ($i=1947; $i<=2027 ; $i++) {
                        $selected = ($i==date('Y'))?' selected="" ':'';
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                      } 
                      ?>
                    </select>
                  </section>
                </div>
              </div>
              <div class="col-md-4">
                <div class="field field_center">
                  <button type="submit" class="button">Xem kết quả</button>
                </div>
              </div>
          </div>
        </form>
        <?php
          $arr_seolink = str_replace('$thang', '"+thang+"', $arr_seo_link_thang);
          $arr_seolink = str_replace('$nam', '"+nam+"', $arr_seolink);
        ?>
        <script type="text/javascript">
          function send_form_dong_tho() {
              var frm   = document.formSearch;
              var thang = frm.thang.value;
              var nam   = frm.nam.value;
              window.location.href = "<?php echo base_url().$arr_seolink; ?>.html";
          }
        </script>
      </div>
    </section>
 </div>


  <div class="box_content box_xvm text-center">
    <div class="box_content_tt1"><a class="color_white bold" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">XEM TỬ VI 2022</a></div>
    <?php
      $form_name = 'frm_tv_home_1';
      ?>

      <div class="tool_tuvi ftv_home" id="bangtratv2020" style="width: auto!important; background: none!important; height: auto!important;padding-top: 0px!important; margin: 20px!important;">

          <div class="tra_cuu frm_tv_2021">
              <div class="background_tra_cuu_2">
                  <div class="background_tra_cuu_3">
                  </div>


          <div class="tool_text_2">Bạn vui lòng nhập chính xác thông tin của mình!</div>
            <form
                name="<?php echo $form_name;?>"
                id="<?php echo $form_name;?>"
                action="<?php echo base_url('site/article/ajax_bai_viet_tu_vi'); ?>"
                method="post"
                class="form_tool"
                onsubmit="frm_tra_cuu_tu_vi_home2('<?php echo $form_name;?>'); return false;"
            >
          <select name="nam_sinh" class="select_tool">
            <?php for ($i=1950; $i <= 2009; $i++):
                          $slt = $i == 1992 ? 'selected=""' : '';
                  ?>
                      <option value="<?php echo $i;?>" <?php echo $slt; ?> ><?php echo $i; ?></option>
                  <?php endfor; ?>
          </select>
          <select name="gioi_tinh" class="select_tool">
            <option value="1">Nam</option>
            <option value="2">Nữ</option>
          </select>
<!--        <select id="nam_xem_home" name="nam_xem_home" class="select_tool">-->
<!--            <option value="2021">2021</option>-->
<!--            <option value="2022">2022</option>-->
<!--        </select>-->
          <button class="bt_xemngay" type="submit">Xem ngay</button>
          <!--<input type="hidden" name="nam_xem" value="2021">-->
        </form>
      </div>
      </div>
        <div class="clearfix"></div>
      </div>
  </div>


  <div class="box_content">
  <div class="adsResponse1">
   <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
    <!-- xemvanmenh_title -->
    <!-- <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-7619887841727759"
         data-ad-slot="1233815493"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script> -->
  <?php $this->load->view('site/ads/title'); ?>
  </div>
</div>
<div class="box_content box_xvm">
  <h2 class="box_content_tt1"><a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>">Xem lá số tử vi</a></h2>
  <p class="text-center">Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="" action="<?php echo base_url('xem-la-so-tu-vi.html'); ?>" method="post">
       <div class="field">
             <div class="col-md-4 col-md-offset-3 col-sm-4 col-md-offset-3 col-xs-12">
               <input type="text" name="hovaten" value="" placeholder="Nhập họ và tên" />
             </div>
             <div class="col-md-2 col-sm-2 col-xs-12">
               <select name="gioitinh">
                  <option value="">Giới tính</option>
                  <option value="1">Nam giới</option>
                  <option value="0">Nữ giới</option>
               </select>
             </div>
       </div>
       <div class="field">
           <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
             <select name="ngay">
                 <option value="">Ngày sinh dương</option>
                <?php 
                    for( $i = 1; $i<= 31; $i++ ){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                 ?>
               </select>
           </div>
           <div class="col-md-2 col-sm-2 col-xs-4">
              <select name="thang">
                 <option value="">Tháng</option>
                <?php 
                    for( $i = 1; $i<= 12; $i++ ){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                 ?>
               </select>
           </div>
           <div class="col-md-2 col-sm-2 col-xs-4">
              <select name="nam">
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
           <div class="col-md-4 col-md-offset-3 col-sm-2 col-sm-offset-3 col-xs-4">
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
              <select name="namxem">
                 <option value="">Năm xem</option>
                 <?php 
                    for( $i = 2015; $i<= 2040; $i++ ){
                      $selected = $i==date('Y')?'':'';
                        echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
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
</div>
<div class="box_content box_xvm">
  <?php 
          $nam_link = array(
            '1950' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-dan-sinh-nam-1950-A275',
            '1952' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-thin-sinh-nam-1952-A310',
            '1953' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-ty-sinh-nam-1953-A321',
            '1954' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-ngo-sinh-nam-1954-A297',
            '1955' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-mui-sinh-nam-1955-A291',
            '1956' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-than-sinh-nam-1956-A303',
            '1957' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-dau-sinh-nam-1957-A279',
            '1958' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-tuat-sinh-nam-1958-A322',
            '1959' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-hoi-sinh-nam-1959-A284',
            '1960' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-ty-sinh-nam-1960-A315',
            '1961' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-suu-sinh-nam-1961-A302',
            '1962' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-dan-sinh-nam-1962-A278',
            '1963' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-mao-sinh-nam-1963-A290',
            '1964' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-thin-sinh-nam-1964-A308',
            '1965' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-ty-sinh-nam-1965-A318',
            '1966' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-ngo-sinh-nam-1966-A295',
            '1967' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-mui-sinh-nam-1967-A292',
            '1968' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-than-sinh-nam-1968-A305',
            '1969' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-dau-sinh-nam-1969-A280',
            '1970' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-tuat-sinh-nam-1970-A311',
            '1971' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-hoi-sinh-nam-1971-A286',
            '1972' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-ty-sinh-nam-1972-A317',
            '1973' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-suu-sinh-nam-1973-A301',
            '1974' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-dan-sinh-nam-1974-A276',
            '1975' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-mao-sinh-nam-1975-A287',
            '1976' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-thin-sinh-nam-1976-A307',
            '1977' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-ty-sinh-nam-1977-A319',
            '1978' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-ngo-sinh-nam-1978-A298',
            '1979' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-mui-sinh-nam-1979-A293',
            '1980' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-than-sinh-nam-1980-A304',
            '1981' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-dau-sinh-nam-1981-A282',
            '1982' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-tuat-sinh-nam-1982-A313',
            '1983' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-hoi-sinh-nam-1983-A285',
            '1984' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-ty-sinh-nam-1984-A316',
            '1985' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-suu-sinh-nam-1985-A299',
            '1986' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-dan-sinh-nam-1986-A274',
            '1987' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-mao-sinh-nam-1987-A288',
            '1988' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-thin-sinh-nam-1988-A309',
            '1989' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-ty-sinh-nam-1989-A320',
            '1990' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-ngo-sinh-nam-1990-A296',
            '1991' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-mui-sinh-nam-1991-A294',
            '1992' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-than-sinh-nam-1992-A306',
            '1993' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-dau-sinh-nam-1993-A281',
            '1994' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-tuat-sinh-nam-1994-A312',
            '1995' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-hoi-sinh-nam-1995-A283',
            '1996' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-ty-sinh-nam-1996-A314',
            '1997' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-suu-sinh-nam-1997-A300',
            '1998' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-dan-sinh-nam-1998-A277',
            '1999' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-mao-sinh-nam-1999-A289',
          );
        ?>

  <h2 class="box_content_tt1"><a href="<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html');?>">Xem tuổi vợ chồng</a></h2>
  <br>
    <form  name="search_tuoivochong" onsubmit="send_form_vochong(); return false;" action="" method="post">
        <div class="field">
            <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
                <select name="tuoichong" required="">
                    <option value="">Năm sinh chồng</option>
                    <?php
                        for($i=1970 ; $i <= 2027 ; $i++){
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                        }
                    ?>
                    <?php
                        for($i=1947 ; $i <= 1969 ; $i++){
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <select name="tuoivo" required="">
                    <option value="">Năm sinh vợ</option>
                    <?php
                        for($i=1970 ; $i <= 2027 ; $i++){
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                        }
                    ?>
                    <?php
                        for($i=1947 ; $i <= 1969 ; $i++){
                            echo '<option value="'.$i.'" >'.$i.'</option>';
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
    <script type="text/javascript">
    function send_form_vochong() {
        var frm = document.search_tuoivochong;
        var tuoichong   = frm.tuoichong.value;
        var tuoivo  = frm.tuoivo.value;
        window.location.href = "<?php echo base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong/');?>tuoi-chong-"+tuoichong+"-va-tuoi-vo-"+tuoivo+".html";
    }
</script>
</div>

<?php $i = 0; ?>
<?php if( !empty($main_menu) ):
        foreach($main_menu as $val):
 ?>
 
 <div class="box_content">
     <h2 class="box_content_tt1"><?php echo $val['name'];?></h2>
     <ul class="box_content_gird">
       <?php if( isset( $val['submenu'] ) ):
              foreach( $val['submenu'] as $val1 ):
                 $val1['slug']  = str_replace('$nam','2018',$val1['slug']);
                 $val1_link   = base_url($val1['slug'].'.html');
                 $val1_avatar = base_url('media/images/menu/'.$val1['avatar']);
        ?>
       <li>
         <a href="<?php echo $val1['slug'].'.html';?>"><img class="lazy" data-src="<?php echo $val1_avatar;?>" alt="<?php echo $val1['name'];?>" /></a>
         <h3 class="h5"><a href="<?php echo $val1['slug'].'.html';?>"><?php echo $val1['name'];?></a></h3>
       </li>
       <?php endforeach; endif; ?>
     </ul>
 </div>
 <?php $i++; ?>
 <?php endforeach; endif; ?>
 <script>
  $(document).ready(function(){
    $('#xd_submit').on('click',function(){
        var link_xd = $('#xd_namsinh').val();
        var domain  = '<?php echo base_url(); ?>';
        window.location.href = domain + link_xd + '.html';
        return false;
    });
    $('#submit_tv').on('click',function(){
      var frame = document.form_tuvi;
      var canchi = $('#namsinh_tv').val();
      var link = 'xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-'+ canchi + '.html';
      var domain = '<?php echo base_url(); ?>';
      frame.action = domain + link;
    });
  });
</script>
