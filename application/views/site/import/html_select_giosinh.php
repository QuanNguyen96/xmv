<?php 
    $giosinh  = isset($giosinh) ? $giosinh : '';
    if (!function_exists('check_postGiosinh')) {
        function check_postGiosinh($match, $giosinh = null){
            $slt = '';
            if ($giosinh == $match) {
                $slt = 'selected=""';
            }
            return $slt;
        }
    }
 ?>
<option value="" disabled="" <?php echo check_postGiosinh('', $giosinh); ?>>Giờ sinh</option>
<option value="23 giờ đến 1 giờ" <?php echo check_postGiosinh('23 giờ đến 1 giờ', $giosinh); ?>>23 - 1 giờ</option>
<option value="1 giờ đến 3 giờ" <?php echo check_postGiosinh('1 giờ đến 3 giờ', $giosinh); ?>>1 - 3 giờ</option>
<option value="3 giờ đến 5 giờ" <?php echo check_postGiosinh('3 giờ đến 5 giờ', $giosinh); ?>>3 - 5 giờ</option>
<option value="5 giờ đến 7 giờ" <?php echo check_postGiosinh('5 giờ đến 7 giờ', $giosinh); ?>>5 - 7 giờ</option>
<option value="7 giờ đến 9 giờ" <?php echo check_postGiosinh('7 giờ đến 9 giờ', $giosinh); ?>>7 - 9 giờ</option>
<option value="9 giờ đến 11 giờ" <?php echo check_postGiosinh('9 giờ đến 11 giờ', $giosinh); ?>>9 - 11 giờ</option>
<option value="11 giờ đến 13 giờ" <?php echo check_postGiosinh('11 giờ đến 13 giờ', $giosinh); ?>>11 - 13 giờ</option>
<option value="13 giờ đến 15 giờ" <?php echo check_postGiosinh('13 giờ đến 15 giờ', $giosinh); ?>>13 - 15 giờ</option>
<option value="15 giờ đến 17 giờ" <?php echo check_postGiosinh('15 giờ đến 17 giờ', $giosinh); ?>>15 - 17 giờ</option>
<option value="17 giờ đến 19 giờ" <?php echo check_postGiosinh('17 giờ đến 19 giờ', $giosinh); ?>>17 - 19 giờ</option>
<option value="19 giờ đến 21 giờ" <?php echo check_postGiosinh('19 giờ đến 21 giờ', $giosinh); ?>>19 - 21 giờ</option>
<option value="21 giờ đến 23 giờ" <?php echo check_postGiosinh('21 giờ đến 23 giờ', $giosinh); ?>>21 - 23 giờ</option>
