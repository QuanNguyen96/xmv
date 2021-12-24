<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="" action="" method="post">
       <div class="field">
         <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-3  col-xs-4">
            <select name="mDay">
                <option value="">Ngày</option>
                <?php 
                    for( $i = 1; $i<= 31; $i++ ){
                        $slt = $ngay == $i ? 'selected=""' :'';
                        echo '<option  value="'.$i.'" '.$slt.' '.set_select('mDay',$i).'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="mMonth">
                <option value="">Tháng</option>
                 <?php 
                    for( $i = 1; $i<= 12; $i++ ){
                        $slt = $thang == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.' '.set_select('mMonth',$i).'>'.$i.'</option>';
                    }
                 ?>
             </select>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-4">
             <select name="mYear">
                <option value="">Năm</option>
                <?php 
                    for( $i = 1950; $i<= 2025; $i++ ){
                        $slt = $nam == $i ? 'selected=""' :'';
                        echo '<option value="'.$i.'" '.$slt.'  '.set_select('mYear',$i).'>'.$i.'</option>';
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
       <input type="hidden" name="option" value="com_boi"/>
       <input type="hidden" name="view" value="amduong"/>
       <input type="hidden" name="Itemid" value="22"/>
    </form>
    <div class="field clearfix">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="field clearfix">
      <div class="col-md-12">
        <?php if( isset( $content['noidung'] ) ) echo $content['noidung']; ?>
      </div>
      <div class="col-md-12">
          <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
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