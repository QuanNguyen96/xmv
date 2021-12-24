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
    <form name="" action="" method="post">
       <div class="minibox">
         <table>
            <tbody>
               <tr>
                  <td><label>Chọn tháng( dương lịch )</label></td>
               </tr>
               <tr>
                  <td>
                     <select name="thang">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                     </select>
                     <select name="nam">
                        <option value="1947">1947</option>
                        <option value="1948">1948</option>
                        <option value="1949">1949</option>
                        <option value="1950">1950</option>
                        <option value="1951">1951</option>
                        <option value="1952">1952</option>
                        <option value="1953">1953</option>
                        <option value="1954">1954</option>
                        <option value="1955">1955</option>
                        <option value="1956">1956</option>
                        <option value="1957">1957</option>
                        <option value="1958">1958</option>
                        <option value="1959">1959</option>
                        <option value="1960">1960</option>
                        <option value="1961">1961</option>
                        <option value="1962">1962</option>
                        <option value="1963">1963</option>
                        <option value="1964">1964</option>
                        <option value="1965">1965</option>
                        <option value="1966">1966</option>
                        <option value="1967">1967</option>
                        <option value="1968">1968</option>
                        <option value="1969">1969</option>
                        <option value="1970">1970</option>
                        <option value="1971">1971</option>
                        <option value="1972">1972</option>
                        <option value="1973">1973</option>
                        <option value="1974">1974</option>
                        <option value="1975">1975</option>
                        <option value="1976">1976</option>
                        <option value="1977">1977</option>
                        <option value="1978">1978</option>
                        <option value="1979">1979</option>
                        <option value="1980">1980</option>
                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option selected="" value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                     </select>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="field field_center">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="button" class="button">Xem kết quả</button>
          </div>
       </div>
    </form>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field">
       <div class="col-md-12">
          <section class="result" id="result">
            <div class="result_calendar">
              <div class="row">
                <section class="col-md-12">
                  <article class="listDay_good">
                    <table>
                      <thead>
                        <tr>
                          <th>
                            <p><label>Ngày</label></p>
                          </th>
                          <th>
                            <p><label>Ngày tốt trong tháng <?php echo $duonglich[1] ?> năm <?php echo $duonglich[2] ?></label></p>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($info_listdatenext)): ?>
                          <?php foreach ($info_listdatenext as $key => $value): ?>
                            <tr>
                              <td>
                                <section class="clearfix">
                                  <div class="boxLichduong_left">
                                    <p class="title_lichduong">Lịch dương</p>
                                    <p class="title_date"><label><?php echo $value['duonglich'][0] ?></label></p>
                                    <p class="title_month">Tháng <?php echo $value['duonglich'][1] ?></p>
                                  </div>
                                  <div class="boxLichduong_right">
                                    <p class="title_licham">Lịch âm</p>
                                    <p class="title_date"><label><?php echo $value['amlich'][0] ?></label></p>
                                    <p class="title_month">Tháng <?php echo $value['amlich'][1] ?></p>
                                  </div>
                                  <div class="boxLichduong_bottom">
                                    <p>Ngày <?php echo $value['ngayhientai'] ?></p>
                                  </div>
                                </section>
                              </td>
                              <td>
                                <section class="boxRightListDay">
                                  <p><span class="text_red"><?php echo $value['ngaythu'] ?>, ngày <a href="<?php echo base_url('xem-ngay-tot-xau/ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>"><?php echo join('/',$value['duonglich']) ?></a></span> nhằm ngày <span class="text_black"><?php echo join('/',$value['amlich']) ?> Âm lịch</span></p>
                                  <p>Ngày <label><?php echo $value['ngaycanchi'] ?></label>, tháng <label><?php echo $value['thangcanchi'] ?></label>, năm <label><?php echo $value['namcanchi'] ?></label></p>
                                  <p>Ngày <span class="text_black"><?php echo $value['ngay_hoang_dao'][0].' ('.$value['ngay_hoang_dao'][1].')' ?></span></p>
                                  <p><label>Giờ tốt trong ngày :</label></p>
                                  <p><?php echo join(',',$value['gio_hoang_dao_hac_dao']['hoang_dao']); ?></p>
                                  <p><a href="<?php echo base_url($this->uri->segment(1).'/'.'ngay-'.$value['duonglich'][0].'-thang-'.$value['duonglich'][1].'-nam-'.$value['duonglich'][2].'.html'); ?>" class="bg_red">Xem chi tiết</a></p>
                                </section>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                  </article>
                </section>
              </div>
            </div>
            <div class="result_get_lich">
              <p class="title_p">Lịch vạn niên tháng <?php echo $duonglich[1] ?> năm <?php echo $duonglich[2] ?></p>
              <?php echo $content_get_lich; ?>
            </div>
          </section>
       </div>
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
            </div>
        </div>
    </div>
</div>
 