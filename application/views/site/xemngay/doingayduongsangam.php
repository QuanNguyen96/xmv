<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/css/doingayamduong.css');?>">
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>

<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field clearfix">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="box_doi_ngay">
      <div class="box_doi_ngay1">
         <div class="row">
            <div class="col-md-6 col-xs-12">
               <div class="box_doi_ngay1_duong">
                  <div class="box_doi_ngay1_tt box_doi_ngay1_duong1">
                    Dương lịch
                  </div>
                  <form name="" action="" method="post">
                     <div class="box_doi_ngay1_duong2">
                        <div class="row">
                          <div class="col-md-4 col-xs-4">
                            <select name="ngay_duong" id="ngay_duong"onchange="doingayamduong('duong','ngay_duong');" data="ngay">
                              <option value="">Ngày DL</option>
                              <?php for($i=1; $i<=31; $i++):
                                      $slt = $i == $ngay_duong ? 'selected=""' : ''; 
                              ?>
                                <option value="<?php echo $i;?>" <?php echo $slt;?>><?php echo $i;?></option>
                              <?php endfor; ?>  
                            </select>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <select name="thang_duong" id="thang_duong" onchange="doingayamduong('duong','thang_duong');" data="thang">
                              <option value="">Tháng DL</option>
                              <?php for($i=1; $i<=12; $i++):
                                     $slt = $i == $thang_duong ? 'selected=""' : ''; 
                              ?>
                                <option value="<?php echo $i;?>" <?php echo $slt;?>><?php echo $i;?></option>
                              <?php endfor; ?>  
                            </select> 
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <select name="nam_duong" id="nam_duong" onchange="doingayamduong('duong','nam_duong');" data="nam">
                              <option value="">Năm DL</option>
                              <?php for($i=1950; $i<=2025; $i++):
                                     $slt = $i == $nam_duong ? 'selected=""' : ''; 
                              ?>
                                <option value="<?php echo $i;?>" <?php echo $slt;?>><?php echo $i;?></option>
                              <?php endfor; ?>  
                            </select>
                          </div>
                        </div>
                     </div>
                     <div class="box_doi_ngay1_duong3">
                        <div>Tháng <?php echo $thang_duong; ?></div>
                        <div><?php echo $ngay_duong; ?></div>
                        <div><?php echo $ngay_thu;?></div>
                        <div>Năm <?php echo $nam_duong;?></div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6 col-xs-12">
               <div class="box_doi_ngay1_am">
                  <div class="box_doi_ngay1_tt box_doi_ngay1_am1">
                    Âm lịch
                  </div>
                  <form name="" action="" method="post">
                     <div class="box_doi_ngay1_am2">
                        <div class="row">
                          <div class="col-md-4 col-xs-4">
                            <select name="ngay_am" id="ngay_am" onchange="doingayamduong('am','ngay_am');" data="ngay">
                              <option value="">Ngày DL</option>
                              <?php for($i=1; $i<=31; $i++):
                                     $slt = $i == $ngay_am ? 'selected=""' : ''; 
                              ?>
                                <option value="<?php echo $i;?>" <?php echo $slt;?>><?php echo $i;?></option>
                              <?php endfor; ?>  
                            </select>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <select name="thang_am" id="thang_am" onchange="doingayamduong('am','thang_am');" data="thang">
                              <option value="" >Tháng DL</option>
                              <?php for($i=1; $i<=12; $i++):
                                      $slt = $i == $thang_am ? 'selected=""' : ''; 
                              ?>
                                <option value="<?php echo $i;?>" <?php echo $slt;?>><?php echo $i;?></option>
                              <?php endfor; ?>  
                            </select> 
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <select name="nam_am" id="nam_am" onchange="doingayamduong('am','nam_am');" data="nam">
                              <option value="">Năm DL</option>
                              <?php for($i=1950; $i<=2025; $i++):
                                     $slt = $i == $nam_am ? 'selected=""' : ''; 
                              ?>
                                <option value="<?php echo $i;?>" <?php echo $slt;?>><?php echo $i;?></option>
                              <?php endfor; ?>  
                            </select>
                          </div>
                        </div>
                     </div>
                     <div class="box_doi_ngay1_am3">
                        <div>Tháng <?php echo $thang_am;?></div>
                        <div><?php echo $ngay_am; ?></div>
                        <div><?php echo $ngay_thu;?></div>
                        <div>Năm <?php echo $nam_am;?></div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="row hidden_desktop">
            <div class="col-xs-6">
                <div class="box_doi_ngay1_duong3">
                  <div>Tháng <?php echo $thang_duong; ?></div>
                  <div><?php echo $ngay_duong; ?></div>
                  <div><?php echo $ngay_thu;?></div>
                  <div>Năm <?php echo $nam_duong;?></div>
               </div>
            </div>
            <div class="col-xs-6">
               <div class="box_doi_ngay1_am3">
                  <div>Tháng <?php echo $ngay_am;?></div>
                  <div><?php echo $thang_am; ?></div>
                  <div><?php echo $ngay_thu;?></div>
                  <div>Năm <?php echo $nam_am;?></div>
               </div> 
            </div>
          </div>
      </div>
      <div class="box_doi_ngay2">
         <div class="row">
            <div class="col-md-3 col-xs-3">
              <div class="box_doi_ngay21">
                 <?php
                    $link_ngay_tot_chi_tiet = 'xem-ngay-tot-xau/ngay-'.$ngay_duong.'-thang-'.$thang_duong.'-nam-'.$nam_duong.'.html';
                 ?>
                 <a href="<?php echo base_url($link_ngay_tot_chi_tiet);?>" title="">Ngày chi tiết</a>
              </div>
            </div>
            <div class="col-md-3 col-xs-3">
              <div class="box_doi_ngay22">
                 <a href="<?php echo base_url('xem-lich-van-nien.html'); ?>" title="">Lịch vạn niên</a>
              </div>
            </div>
            <div class="col-md-3 col-xs-3">
              <div class="box_doi_ngay23">
                 <a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html');?>" title="">Tử vi 2020</a>
              </div>
            </div>
            <div class="col-md-3 col-xs-3">
              <div class="box_doi_ngay24">
                 <a href="<?php echo base_url('xem-ngay-tot-xau.html');?>" title="">Ngày tốt</a>
              </div>
            </div>
         </div>
      </div>
      <div class="box_doi_ngay3">
         <div class="box_doi_ngay31">
            <p><b>Dương lịch: </b><?php echo $ngay_thu;?>, ngày <?php echo $ngay_duong;?> - <?php echo $thang_duong;?> - <?php echo $nam_duong;?></p>
            <p><b>Âm lịch: </b>Ngày <?php echo $ngay_am;?> - <?php echo $thang_am;?> - <?php echo $nam_am;?>, ngày <?php echo $ngay_can_chi;?> tháng <?php echo $thang_can_chi;?> năm <?php echo $nam_can_chi;?> </p>
            <p>Ngày <?php echo $hoang_dao_hac_dao; ?> - Tiết <?php echo $tiet_khi;?> </p>
         </div>
         <div class="box_doi_ngay32">
            <div class="box_doi_ngay32_tt">Giờ hoàng đạo - hắc đạo</div>
            <div class="box_doi_ngay32_ct">
               <div class="row">
                  <div class="col-md-2">
                     <label>Hoàng đạo:</label>
                  </div>
                  <div class="col-md-10">
                      <ul>
                        <?php foreach ($list_gio_hoang_dao_hac_dao['hoang_dao'] as $key => $value): ?>
                           <li><?php echo $value; ?></li>
                        <?php endforeach ?>
                      </ul>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-2">
                     <label>Hắc đạo:</label>
                  </div>
                  <div class="col-md-10">
                      <ul>
                        <?php foreach ($list_gio_hoang_dao_hac_dao['hac_dao'] as $key => $value): ?>
                           <li><?php echo $value; ?></li>
                        <?php endforeach ?>
                      </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="box_doi_ngay32">
            <div class="box_doi_ngay32_tt">Ngũ hành</div>
            <div class="box_doi_ngay32_ct">
               <p>Ngũ hành niên mệnh: <b><?php echo $nguhanh;?></b></p>
               <p><?php echo str_replace('.', '.<br>', $ngu_hanh_tinh['content_nguhanh']) ; ?></p>
            </div>
         </div>
         <div class="box_doi_ngay32">
            <div class="box_doi_ngay32_tt">Sao tốt xấu</div>
            <div class="box_doi_ngay32_ct">
               <div class="row">
                  <div class="col-md-2">
                    <label>Sao tốt</label>
                  </div>
                  <div class="col-md-10">
                    <p><?php echo $sao_tot_xau['sao_tot']; ?></p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-2">
                    <label>Sao xấu</label>
                  </div>
                  <div class="col-md-10">
                    <p><?php echo $sao_tot_xau['sao_xau'];?></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="box_doi_ngay32">
            <div class="box_doi_ngay32_tt">Hướng xuất hành</div>
            <div class="box_doi_ngay32_ct">
               <p><?php echo $huong_tot_xau['huongtot'] ?></p>
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
    <div class="field">
      <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
    </div>
</div>  

<script type="text/javascript">
  function doingayamduong(cc_name, cc_select)
    {
       var flag = true;
       var ngay_thang_nam_key  = ['ngay','thang','nam'];
       var ngay_thang_nam_val  = [];
       var get_select   = $('#'+cc_select).attr('data');
       ngay_thang_nam_key.forEach(function(item, index, array) {
           var input_value = $('#'+item+'_'+cc_name).children("option:selected").val();
           if( input_value == '')
           {
             flag = false;
           }
           else
           {
              ngay_thang_nam_val.push(input_value);
           }
        });
       if(flag == false)
       {
         alert('Cần chọn ngày tháng năm');
       }
       else
       {

           $.ajax({
              url: window.location.origin+'/ajax-doingayamduong',
              type: 'POST', 
              dataType: 'json',
              data:{input_key:ngay_thang_nam_key, input_val:ngay_thang_nam_val,input_type:cc_name},
              beforeSend: function() {
              },
              success: function(data) {
                  $('.box_doi_ngay').html(data.html);
              },
              error: function(e) {
                  console.log(e)
              }
          });
       }  
       
    }
</script>