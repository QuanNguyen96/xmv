<div class="container">
  <div class="row">
    <div class="col-md-7 col-sm-7 col-xs-12 ttsp">
       <h3 class="h3title">Thông tin sản phẩm</h3>
       <table>
          <thead>
             <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
             </tr>
          </thead>
          <tbody>
             <?php if( !empty($list) ):
                    $i=0;
                    foreach( $list as $val ):
                    $i++;
                    if( $val['hidden_price'] == 1 )
                    {
                        $giaban = 'Liên hệ';
                    }
                    else
                    {
                        $giaban = $val['giakhuyenmai'] != '' ? number_format($val['giakhuyenmai']) : number_format($val['giaban']);
                    }
             ?>
             <tr>
                <td style="text-align: center;"><?php echo $i; ?></td>
                <td><?php echo $val['name'];?></td>
                <td><img style="width:80px" src="<?php echo base_url('media/images/product/'.$val['id'].'/'.$val['avatar']);?>" /></td>
                <td style="text-align: center;">1</td>
                <td><?php echo $giaban; ?> đ</td>
             </tr>
             <?php endforeach; endif; ?>
          </tbody>
       </table>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1 ttkh">
       <h3 class="h3title">Thông tin khách hàng</h3>
       <ul>
         <li>
            <label>Họ và tên</label>
            <input type="text" name="fullname" value="" />
         </li>
         <li>
            <label>Số điện thoại</label>
            <input type="text" name="phone" value="" />
         </li>
         <li>
            <label>Địa chỉ</label>
            <textarea name="address"></textarea>
         </li>
         <li><button type="">Đặt mua</button></li>
       </ul>
    </div>
  </div>
</div>  