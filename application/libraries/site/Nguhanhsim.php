<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Nguhanhsim
{
    /** Dinh nghia ngu hanh
     *  1 : KIM
     *  2 : MOC
     *  3 : THUY
     *  4 : HOA
     *  5 : THO
     * */
    /** Dinh nghia thien can
     *  1  : GIAP
     *  2  : AT
     *  3  : BINH
     *  4  : DINH
     *  5  : MAU 
     *  6  : KY 
     *  7  : CANH
     *  8  : TAN
     *  9  : NHAM
     *  10 : QUY
     **/
    private $thien_can_ngu_hanh = array( /** thien_can => ngu_hanh **/ 1 => 2, 2 => 2, 3 => 4, 4 => 4, 5 => 5, 6 => 5, 7 => 1, 8 => 1, 9 => 3, 10 => 3);
    /** Dinh nghia dia chi
     * 1  : TY
     * 2  : SUU
     * 3  : DAN
     * 4  : MAO
     * 5  : THIN
     * 6  : TY
     * 7  : NGO
     * 8  : MUI
     * 9  : THAN
     * 10 : DAU
     * 11 : TUAT
     * 12 : HOI
     * */
    private $dia_chi_ngu_hanh = array( /** dia_chi => ngu_hanh **/ 1 => 3, 2 => 5, 3 => 2, 4 => 2, 5 => 5, 6 => 4, 7 => 4, 8 => 5, 9 => 1, 10 => 1, 11 => 5, 12 => 3);
    private $canchi = array('0' => '10,4', '1' => '1,1', '2' => '2,2 ', '3' => '3,3', '4' => '4,4', '5' => '5,5', '6' => '6,6 ', '7' => '7,7', '8' => '8,8', '9' => '9,9', '10' => '10,10', '11' => '1,11', '12' => '2,12', '13' => '3,1', '14' => '4,2', '15' => '5,3', '16' => '6,4', '17' => '7,5', '18' => '8,6', '19' => '9,7', '20' => '10,8', '21' => '1,9', '22' => '2,10', '23' => '3,11', '24' => '4,12', '25' => '5,1', '26' => '6,2', '27' => '7,3', '28' => '8,4', '29' => '9,5', '30' => '10,6', '31' => '1,7', '32' => '2,8', '33' => '3,9', '34' => '4,10', '35' => '5,11', '36' => '6,12', '37' => '7,1', '38' => '8,2', '39' => '9,3', '40' => '10,4', '41' => '1,5', '42' => '2,6', '43' => '3,7', '44' => '4,8', '45' => '5,9', '46' => '6,10', '47' => '7,11', '48' => '8,12', '49' => '9,1', '50' => '10,2', '51' => '1,3', '52' => '2,4', '53' => '3,5', '54' => '4,6', '55' => '5,7', '56' => '6,8', '57' => '7,9', '58' => '8,10', '59' => '9,11', '60' => '10,12', '61' => '1,1', '62' => '2,2 ', '63' => '3,3', '64' => '4,4', '65' => '5,5', '66' => '6,6 ', '67' => '7,7', '68' => '8,8', '69' => '9,9', '70' => '10,10', '71' => '1,11', '72' => '2,12', '73' => '3,1', '74' => '4,2', '75' => '5,3', '76' => '6,4', '77' => '7,5', '78' => '8,6', '79' => '9,7', '80' => '10,8', '81' => '1,9', '82' => '2,10', '83' => '3,11', '84' => '4,12', '85' => '5,1', '86' => '6,2', '87' => '7,3', '88' => '8,4', '89' => '9,5', '90' => '10,6', '91' => '1,7', '92' => '2,8', '93' => '3,9', '94' => '4,10', '95' => '5,11', '96' => '6,12', '97' => '7,1', '98' => '8,2', '99' => '9,3');
    private $phan_tram = array(0 => 3.5, 1 => 3.5, 2 => 5.5, 3 => 5.5, 4 => 8.5, 5 => 8.5, 6 => 13, 7 => 13, 8 => 19.5, 9 => 19.5);
    private $arr_phone = array();
    public function __construct()
    {
    }
    public function test()
    {
        for ($i = 1; $i <= 10; $i++) {
            echo $this->dia_chi_ngu_hanh[$i] . '<br/>';
        }
    }
    public function set_phone($phone)
    {
        $length_phone = strlen($phone);
        $phone        = $length_phone == 10 ? $phone : substr($phone, 1, 10);
        for ($i = 0; $i < 10; $i++) {
            $arr_phone[$i]['number']   = substr($phone, $i, 1);
            $arr_phone[$i]['phantram'] = $this->phan_tram[$i];
        }
        $this->arr_phone = $arr_phone;
    }
    public function get_nguhanh()
    {
        $i   = 0;
        $str = '';
        foreach ($this->arr_phone as $key => $val) {
            $str = $str . $val['number'];
            $i++;
            if ($i == 2) {
                //echo $str.'</br>';
                //                if( !isset($this->canchi[(int)$str]) )
                //                {
                //                    echo (int)$str;
                //                    exit();
                //                }
                $canchi                               = $this->canchi[(int) $str];
                $arr_canchi                           = explode(',', $canchi);
                $can                                  = (int) $arr_canchi[0];
                $chi                                  = (int) $arr_canchi[1];
                $this->arr_phone[$key - 1]['nguhanh'] = $this->thien_can_ngu_hanh[$can];
                $this->arr_phone[$key]['nguhanh']     = $this->dia_chi_ngu_hanh[$chi];
                $i                                    = 0;
                $str                                  = '';
            }
        }
        $nguhanh_total    = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0
        );
        $nguhanh_phantram = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0
        );
        foreach ($this->arr_phone as $key => $val) {
            $nguhanh_total[$val['nguhanh']]++;
            $nguhanh_phantram[$val['nguhanh']] = $nguhanh_phantram[$val['nguhanh']] + $val['phantram'];
        }
        arsort($nguhanh_total);
        $nguhanh_desc = array_keys($nguhanh_total);
        arsort($nguhanh_phantram);
        foreach ($nguhanh_total as $key => $val) {
            $ngu_hanh_total_sort[] = $key;
        }
        foreach ($nguhanh_phantram as $key => $val) {
            $nguhanh_phantram_sort[] = $key;
        }
        if ($nguhanh_total[$ngu_hanh_total_sort[0]] > $nguhanh_total[$ngu_hanh_total_sort[1]]) {
            $menh = $ngu_hanh_total_sort[0];
        } else {
            $menh = $nguhanh_phantram_sort[0];
        }
        return $menh;
    }
    public function xemnguhanh()
    {
        if ($_POST) {
            $phone = $this->input->post('phone');
            $this->set_phone($phone);
            $this->get_nguhanh();
            $nguhanh_total    = array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0
            );
            $nguhanh_phantram = array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0
            );
            foreach ($this->arr_phone as $key => $val) {
                $nguhanh_total[$val['nguhanh']]++;
                $nguhanh_phantram[$val['nguhanh']] = $nguhanh_phantram[$val['nguhanh']] + $val['phantram'];
            }
            echo "<pre>";
            print_r($this->arr_phone);
            echo "</pre>";
            //echo "<pre>";
            //        print_r($nguhanh_total);
            //        echo "</pre>";
            arsort($nguhanh_total);
            echo 'So lan xuat hien ngu hanh';
            echo "<pre>";
            print_r($nguhanh_total);
            echo "</pre>";
            echo 'Sắp xếp ngũ hành theo số lần xuất hiện từ cao đến thấp';
            $nguhanh_desc = array_keys($nguhanh_total);
            echo "<Pre>";
            print_r($nguhanh_desc);
            echo "</pre>";
            //echo "<pre>";
            //        print_r($nguhanh_phantram);
            //        echo "</pre>";
            arsort($nguhanh_phantram);
            echo 'Diem cua cac ngu hanh';
            echo "<pre>";
            print_r($nguhanh_phantram);
            echo "</pre>";
            foreach ($nguhanh_total as $key => $val) {
                $ngu_hanh_total_sort[] = $key;
            }
            foreach ($nguhanh_phantram as $key => $val) {
                $nguhanh_phantram_sort[] = $key;
            }
            //echo "<pre>";
            //        print_r($ngu_hanh_total_sort);
            //        echo "</pre>";
            //        echo "<pre>";
            //        print_r($nguhanh_phantram_sort);
            //        echo "</pre>";
            if ($nguhanh_total[$ngu_hanh_total_sort[0]] > $nguhanh_total[$ngu_hanh_total_sort[1]]) {
                $menh = $ngu_hanh_total_sort[0];
            } else {
                $menh = $nguhanh_phantram_sort[0];
            }
            echo 'Số điện thoại <b>' . $phone . '</b> Mệnh:<b>' . $menh . '</b>';
        }
?>
           <form name="" action="" method="post">
                <input type="text" name="phone" />
                <button type="submit">Xem ngũ hành</button>
           </form>
        <?php
    }
    public function nguhanhsim($phone)
    {
        $this->set_phone($phone);
        $this->get_nguhanh();
        $nguhanh_total    = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0
        );
        $nguhanh_phantram = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0
        );
        foreach ($this->arr_phone as $key => $val) {
            $nguhanh_total[$val['nguhanh']]++;
            $nguhanh_phantram[$val['nguhanh']] = $nguhanh_phantram[$val['nguhanh']] + $val['phantram'];
        }
        arsort($nguhanh_total);
        $nguhanh_desc = array_keys($nguhanh_total);
        $menh         = $nguhanh_desc[0];
        //arsort($nguhanh_phantram);
        //        foreach( $nguhanh_total as $key => $val )
        //        {
        //            $ngu_hanh_total_sort[] = $key;
        //        }
        //        foreach( $nguhanh_phantram as $key => $val )
        //        {
        //            $nguhanh_phantram_sort[] = $key;
        //        }
        //
        //
        //        if( $nguhanh_total[$ngu_hanh_total_sort[0]] > $nguhanh_total[$ngu_hanh_total_sort[1]] )
        //        {
        //            $menh = $ngu_hanh_total_sort[0];
        //        }
        //        else
        //        {
        //            $menh = $nguhanh_phantram_sort[0];
        //        }
        return $menh;
    }
    public function list_sim()
    {
        $data    = $this->db->select('sim')->get('sim')->result_array();
        $nguhanh = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0
        );
        foreach ($data as $val) {
            $menh = $this->nguhanhsim($val['sim']);
            $nguhanh[$menh]++;
        }
        $total = count($data);
        foreach ($nguhanh as $key => $val) {
            $phantram           = $val * 100 / $total;
            $arr_phantram[$key] = number_format($phantram) . '%';
        }
        echo "<pre>";
        print_r($arr_phantram);
        echo "</pre>";
    }
}
?>