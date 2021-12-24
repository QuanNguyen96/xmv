<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form method="post" name="search_form_xem_lich" action="<?php echo base_url('xem-lich-van-nien.html') ?>">
       <div class="minibox">
            <table>
              <tbody>
                  <tr>
                  <td><label>Chọn ngày( dương lịch )</label></td>
                </tr>
                  <tr>
                      <td>
                          <select name="thang">
                            <?php
                              for($i=1 ; $i <= 12 ; $i++){
                                  $selectd = '';
                                  echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                              }
                          ?>
                          </select>
                          <select name="nam">
                            <?php
                              $selectd = '';
                              for($i=1947 ; $i <= 2027 ; $i++){
                                  $selectd = '';
                                echo '<option value="'.$i.'" '.$selectd.'>'.$i.'</option>';
                              }
                          ?>
                          </select>
                      </td>
                  </tr>
              </tbody>
            </table>
       </div>
       <div>
          <input name="act" value="search" type="hidden">
          <div class="boxButton field_center">
             <button class="button">Xem ngay</button>
             <span></span>
          </div>
       </div>
    </form>
    <div class="field clearfix">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field clearfix">
       <div class="col-md-12">
          <div class="ngayhientai">
           <div id="result">
              <?php if( isset( $content['noidung'] ) ):?>
                <?php
                  $content_replace_lich = $content['noidung'];
                  $content_replace_lich =  str_replace("Xem ngày tốt xấu", "Lịch vạn sự", $content_replace_lich);
                  $content_replace_lich = str_replace('/ngay-duong-sang-am', '/xem-ngay-tot-xau', $content_replace_lich);
                  $content_replace_lich = str_replace('/thang', '-thang', $content_replace_lich);
                  $content_replace_lich = str_replace('/nam', '-nam', $content_replace_lich);
                ?>
                <div class=""><?php echo $content_replace_lich; ?></div>
              <?php endif; ?>  
            </div>
          </div>
          
       </div>
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
 