<div class="box-mobile">
    <h3 class="title-new-mobile">Xem bói tình yêu theo ngày tháng năm sinh</h3>
    <div class="box-form">
        <form name="" action="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html');?>" method="post">
            <div class="form-group clearfix">
                <div class="clearfix">
                    <div class="col-xs-12">
                        <input type="text" name="tentrai" value="" placeholder="Nhập tên bạn trai"/><br>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <select name="ngaysinhtrai">
                                    <option value="">Ngày sinh dương</option>
                                    <?php 
                                        for( $i = 1; $i<= 31; $i++ ){
                                            $slt = $ngay == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="thangsinhtrai">
                                    <option value="">Tháng sinh</option>
                                    <?php 
                                        for( $i = 1; $i<= 12; $i++ ){
                                            $slt = $thang == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="namsinhtrai">
                                    <option value="">Năm sinh</option>
                                    <?php 
                                        for( $i = 1950; $i<= 2025; $i++ ){
                                            // $slt = $nam == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" >'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="col-xs-12">
                        <input type="text" name="tengai" value="" placeholder="Nhập tên bạn gái"/><br>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <select name="ngaysinhgai">
                                    <option value="">Ngày sinh dương</option>
                                    <?php 
                                        for( $i = 1; $i<= 31; $i++ ){
                                            $slt = $ngay == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="thangsinhgai">
                                    <option value="">Tháng sinh</option>
                                    <?php 
                                        for( $i = 1; $i<= 12; $i++ ){
                                            $slt = $thang == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <select name="namsinhgai">
                                    <option value="">Năm sinh</option>
                                    <?php 
                                        for( $i = 1950; $i<= 2025; $i++ ){
                                            // $slt = $nam == $i ? 'selected=""' :'';
                                            echo '<option value="'.$i.'" >'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix text-center">
                    <button type="submit">Xem</button>
                </div>
            </div>
        </form>
    </div>
</div>