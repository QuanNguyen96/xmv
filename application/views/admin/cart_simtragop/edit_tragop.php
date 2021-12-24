<?php
    $post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
    
    $link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
    $link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
    ?>
<article>
    <?php if( isset($error) ) echo $error; ?>
    <?php if( isset($success) && $success != '' ) echo $success; ?>
    <form name="adminForm" id="form" action="" method="post">
        <header class="header_control">
            <label>Sửa Đơn đặt hàng mua trả góp</label>
            <ul>
                <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
                <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
                <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index_tragop');?>" class="button">Đóng</a></li>
            </ul>
        </header>
        <div>
                <div>
                    <div class="field">
                        <label>Tình trạng đơn hàng</label>
                        <select name="tinh_trang_donhang" id="" class="form-control">
                            <option value="0" <?php if($item['tinh_trang_donhang']==0) {echo 'selected'; }?> >Chưa giao dịch</option>
                            <option value="1" <?php if($item['tinh_trang_donhang']==1) {echo 'selected'; }?> >Đã hoàn thành đơn hàng</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label>Ghi chú bán hàng</label>
                    <textarea name="ghichu_banhang" id="" cols="30" rows="5"><?php echo $item['ghichu_banhang'];?></textarea>
                </div>
                <div class="field">
                    <label>Họ tên khách hàng</label>
                    <input type="text" name="ho_ten" value="<?php echo $item['ho_ten'];?>"  readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Số điện thoại khách hàng</label>
                    <input type="text" name="dien_thoai" readonly="readonly" value="<?php echo '0'.$item['dien_thoai'];?>"  class="form-control" />
                </div>
                <div class="field">
                    <label>Địa chỉ khách hàng</label>
                    <input type="text" name="dia_chi" readonly="readonly" value="<?php echo $item['dia_chi'];?>"  class="form-control" />
                </div>
                <div class="field">
                    <label>Đặt sim số</label>
                    <input type="text" name="sim" value="<?php echo $item['sim'];?>" readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Giá bán</label>
                    <input type="text" name="giaban" value="<?php echo $item['giaban'];?>" readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Thời hạn trả góp</label>
                    <input type="text" name="thoihan_tragop" value="<?php echo $item['thoihan_tragop'].' Tháng';?>" readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Lãi Suất</label>
                    <input type="text" name="lai_suat" value="<?php echo $item['lai_suat'].' %';?>" readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Số tiền trả trước</label>
                    <input type="text" name="tien_tratruoc" value="<?php echo $item['tien_tratruoc'];?>" readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Tiền trả hàng tháng</label>
                    <input type="text" name="tien_tra_hang_thang" value="<?php echo $item['tien_tra_hang_thang'];?>" readonly="readonly" class="form-control" />
                </div>
                <div class="field">
                    <label>Ghi chú của KH</label>
                    <input type="text" name="ghi_chu" readonly="readonly" value="<?php echo $item['ghi_chu'];?>" class="form-control"  />
                </div>
                <div class="field">
                    <label>Ngày đặt hàng</label>
                    <input type="text" name="ngay_dat_hang" readonly="readonly" value="<?php echo date('d/m/Y', $item['ngay_dat_hang']);?>" class="form-control"  />
                </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $item['id'];?>"  class="form-control" />
    </form>
</article>
<script>
        CKEDITOR.replace( 'ghichu' );
        CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
        CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
        CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
        CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
</script>