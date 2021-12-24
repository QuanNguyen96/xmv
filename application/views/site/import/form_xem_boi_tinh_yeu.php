<form name="" action="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html');?>" method="post">
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
                $nam = isset($_POST['namsinhtrai']) ? $_POST['namsinhtrai'] : 1992; 
                for( $i = 1950; $i<= 2025; $i++ ){
                    $slt = $nam == $i ? 'selected=""' :'';
                    echo '<option '.$slt.' value="'.$i.'" >'.$i.'</option>';
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
                $nam = isset($_POST['namsinhgai']) ? $_POST['namsinhgai'] : 1992;  
                for( $i = 1950; $i<= 2025; $i++ ){
                    $slt = $nam == $i ? 'selected=""' :'';
                    echo '<option '.$slt.' value="'.$i.'" >'.$i.'</option>';
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