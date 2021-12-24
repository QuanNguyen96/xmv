<div class="box_content box_xvm box_ngaytotxau">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="simdepForm" action="" method="post">
       <div class="field">
         <div class="col-md-4 col-md-offset-4 col-xm-4 col-sm-offset-4 col-xs-12">
           <input type="text" name="sosim" value="" placeholder="Nhập số điện thoại" />
         </div>
       </div>
       <div class="field">
         <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
            <select name="ngaysinh">
                <option value="">Ngày sinh</option>
                <?php 
                    for( $i = 1; $i<= 31; $i++ ){
                        $slt = $ngay == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="thangsinh">
                <option value="">Tháng sinh</option>
                <?php 
                    for( $i = 1; $i<= 12; $i++ ){
                        $slt = $thang == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="namsinh">
                <option value="">Năm sinh</option>
                <?php 
                    for( $i = 1950; $i<= 2025; $i++ ){
                        $slt = $nam == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.' >'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="field">
           <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
              <select class="form" id="gioitinh" name="gioitinh">
                    <option value="Nam" selected="selected">Nam</option>
                    <option value="Nữ">Nữ</option>
                 </select>
           </div>
           <div class="col-md-3 col-sm-3 col-xs-6">
              <select name="giosinh">
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
         </div>
       </div>
       <div class="field field_center">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button">Xem kết quả</button>
          </div>
       </div>
       <input type="hidden" name="option" value="com_boi"/>
       <input type="hidden" name="view" value="simdep"/>
       <input type="hidden" name="Itemid" value="37"/>
    </form>
    <div class="field clearfix">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field clearfix">
      <div class="col-md-12"><?php if(isset($content['noidung'])) echo $content['noidung']; ?></div>
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
