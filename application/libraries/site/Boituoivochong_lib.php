<?php
    class Boituoivochong_lib {
        var $CI;
        function __construct(){
            $this->CI = &get_instance();
            $this->CI->load->model('site/boituoivochong_model');
        }
        function getNguhanh(){
            
        }
        function getLuannguhanh($input1 = null,$input2 = null){
            $input = $input1.$input2;
            // ngu hanh binh hoa 
            $nguhanh = array(
                '11'=>'Bình Hòa',   // binh hoa
                '22'=>'Bình Hòa',
                '33'=>'Bình Hòa ',
                '44'=>'Bình Hòa',
                '55'=>'Bình Hòa',
                
                '13'=>'Tương Khắc', // tuong khac
                '31'=>'Tương Khắc',
                '24'=>'Tương Khắc',
                '42'=>'Tương Khắc',
                '35'=>'Tương Khắc',
                '53'=>'Tương Khắc',
                '41'=>'Tương Khắc',
                '14'=>'Tương Khắc',
                '52'=>'Tương Khắc',
                '25'=>'Tương Khắc',
                
                '12'=>'Tương Sinh', // tuong Sinh
                '23'=>'Tương Sinh',
                '34'=>'Tương Sinh',
                '45'=>'Tương Sinh',
                '51'=>'Tương Sinh',
                '21'=>'Tương Sinh',
                '32'=>'Tương Sinh',
                '43'=>'Tương Sinh',
                '54'=>'Tương Sinh',
                '15'=>'Tương Sinh',
            );
            
            if(!array_key_exists($input,$nguhanh)){
                $input  = $input2.$input1;
            }
            if(array_key_exists($input,$nguhanh)){
                if(empty($input)){
                    return $nguhanh;
                }
                else{
                    return $nguhanh[$input];
                }
            }
            return 'Bình Hòa';
        }
        
        public function getCamTinhTuoiMenh($input){
            $arr = array(
                'can'   => $input['can'],
                'chi'   => $input['chi']
            );
            $rows = $this->CI->boituoivochong_model->db->where($arr)->from('ci_camtinh_tuoimenh')->get()->row_array();
            return $rows;
        }
        function getThiencanvochong($input1 = null,$input2 = null){
            $input = $input1.$input2;

            $thiencan = array(
                '11'=>'Bình Hòa',
                '12'=>'Bình Hòa',
                '22'=>'Bình Hòa',
                '33'=>'Bình Hòa ',
                '34'=>'Bình Hòa ',
                '44'=>'Bình Hòa',
                '55'=>'Bình Hòa',
                '56'=>'Bình Hòa',
                '66'=>'Bình Hòa',
                '77'=>'Bình Hòa',
                '78'=>'Bình Hòa',
                '88'=>'Bình Hòa ',
                '99'=>'Bình Hòa',
                '910'=>'Bình Hòa',
                '1010'=>'Bình Hòa',

                '16'=>'Tương Hợp',
                '27'=>'Tương Hợp',
                '38'=>'Tương Hợp',
                '49'=>'Tương Hợp',
                '510'=>'Tương Hợp',

                '15'=>'Tương Phá',
                '26'=>'Tương Phá',
                '38'=>'Tương Phá',
                '49'=>'Tương Phá',
                '510'=>'Tương Phá',
                '61'=>'Tương Phá',
                '72'=>'Tương Phá',
                '83'=>'Tương Phá',
                '94'=>'Tương Phá',
                '105'=>'Tương Phá',

                /*'13'=>'Tương Sinh',
                '14'=>'Tương Sinh',
                '23'=>'Tương Sinh',
                '24'=>'Tương Sinh',
                '35'=>'Tương Sinh',
                '36'=>'Tương Sinh',
                '45'=>'Tương Sinh',
                '46'=>'Tương Sinh',
                '57'=>'Tương Sinh',
                '58'=>'Tương Sinh',
                '67'=>'Tương Sinh',
                '68'=>'Tương Sinh',
                '79'=>'Tương Sinh',
                '710'=>'Tương Sinh',
                '89'=>'Tương Sinh',
                '810'=>'Tương Sinh',
                '91'=>'Tương Sinh',
                '92'=>'Tương Sinh',
                '101'=>'Tương Sinh',
                '102'=>'Tương Sinh',*/

                '17'=>'Tương Xung',
                '28'=>'Tương Xung',
                '39'=>'Tương Xung',
                '410'=>'Tương Xung',
                '16'=>'Tương Sinh',
                '27'=>'Tương Sinh',
                '38'=>'Tương Sinh',
                '49'=>'Tương Sinh',
                '510'=>'Tương Sinh',
                '61'=>'Tương Sinh',
                '72'=>'Tương Sinh',
                '83'=>'Tương Sinh',
                '94'=>'Tương Sinh',
                '105'=>'Tương Sinh',

            );
            
            if(!array_key_exists($input,$thiencan)){
                $input  = $input2.$input1;
            }
            if(array_key_exists($input,$thiencan)){
                if(empty($input)){
                    return $thiencan;
                }
                else{
                    return $thiencan[$input];
                }
            }
            return 'Bình Hòa';
        }

        function getThaitue($tuoi_amlich = null){
            $result = $tuoi_amlich%12;
            if ($result == 1) {
                return "Năm này bạn ".$tuoi_amlich.' phạm phải Thái Tuế';
            }
            return null;
        }

        function getCamtrach($tuoi_amlich = null){
            $result = $tuoi_amlich%9;
            $arr = array(
                0   => array('Lộc',1),
                1   => array('Phúc',1),
                2   => array('Đức',1),
                3   => array('Bại',0),
                4   => array('Hư',0),
                5   => array('Khốc',0),
                6   => array('Qủy',0),
                7   => array('Tử',0),
                8   => array('Bảo',1),
            );
            
            return $arr[$result];
        }

        function getThiencanvochong_menh($input1 = null,$input2 = null){
            $input1 = (int)trim($input1);
            $input2 = (int)trim($input2);
            $query1 = $this->CI->boituoivochong_model->db->select()
                                                        ->where('id',$input1)
                                                        ->from('ci_sao_can')
                                                        ->get()->row_array();
            $query2 = $this->CI->boituoivochong_model->db->select()
                                                        ->where('id',$input2)
                                                        ->from('ci_sao_can')
                                                        ->get()->row_array();
            // $input1_sub = $query[$input1];
            // $input2_sub = $query[$input2];
            $hetutru1    = $query1['he_tutru'];
            $hetutru2    = $query2['he_tutru'];
            $what_sinh1      = bang_tuong_sinh($hetutru1);
            $what_khac1      = bang_tuong_khac($hetutru1);

            $what_sinh2      = bang_tuong_sinh($hetutru2);
            $what_khac2      = bang_tuong_khac($hetutru2);
            // $what_sinh2      = bang_tuong_sinh($hetutru2);
            if ($what_sinh1 == $hetutru2) {
                return 'Tương Sinh';
            }
            if ($what_khac1 == $hetutru2) {
                return 'Tương khắc';
            }
            if ($what_sinh2 == $hetutru1) {
                return 'Tương sinh';
            }
            if ($what_khac2 == $hetutru1) {
                return 'Tương Khắc';
            }
            return 'Bình Hòa';
        }

        function getDiachivochong_menh($input1 = null,$input2 = null){
            $input1 = (int)trim($input1);
            $input2 = (int)trim($input2);
            $query1 = $this->CI->boituoivochong_model->db->select()
                                                        ->where('id',$input1)
                                                        ->from('ci_sao_chi')
                                                        ->get()->row_array();
            $query2 = $this->CI->boituoivochong_model->db->select()
                                                        ->where('id',$input2)
                                                        ->from('ci_sao_chi')
                                                        ->get()->row_array();
            // $input1_sub = $query[$input1];
            // $input2_sub = $query[$input2];
            $hetutru1    = $query1['hechi_tutru'];
            $hetutru2    = $query2['hechi_tutru'];
            $what_sinh1      = bang_tuong_sinh($hetutru1);
            $what_khac1      = bang_tuong_khac($hetutru1);

            $what_sinh2      = bang_tuong_sinh($hetutru2);
            $what_khac2      = bang_tuong_khac($hetutru2);
            // $what_sinh2      = bang_tuong_sinh($hetutru2);
            if ($what_sinh1 == $hetutru2) {
                return 'Tương Sinh';
            }
            if ($what_khac1 == $hetutru2) {
                return 'Tương khắc';
            }
            if ($what_sinh2 == $hetutru1) {
                return 'Tương sinh';
            }
            if ($what_khac2 == $hetutru1) {
                return 'Tương Khắc';
            }
            return 'Bình Hòa';
        }

        function getDiachivochong($input1 = null,$input2 = null){
            $input = $input1.$input2;
            //echo $input1.'-'.$input2;
            //exit();
            $diachi = array(
                '18'    => 'Lục Hại', // luc hai
                '27'    => 'Lục Hại',
                '36'    => 'Lục Hại',
                '45'    => 'Lục Hại',
                '912'   => 'Lục Hại',
                '1011'  => 'Lục Hại',
                '14'    => 'Chống Đối', // chong doi
                '369'   => 'Chống Đối',
                '2811'  => 'Chống Đối',
                '55'    => 'Chống Đối',
                '77'    => 'Chống Đối',
                '41'    => 'Lục Hình',  // luc hinh
                '36'    => 'Lục Hình',
                '912'   => 'Lục Hình',
                '112'   => 'Lục Hình',
                '58'    => 'Lục Hình',
                '710'   => 'Lục Hình',
                '12'    => 'Lục Hợp', // luc hop
                '312'   => 'Lục Hợp',
                '411'   => 'Lục Hợp',
                '510'   => 'Lục Hợp',
                '69'    => 'Lục Hợp',
                '78'    => 'Lục Hợp',
                '110'   => 'Lục Phá',  // luc pha
                '96'    => 'Lục Phá',
                '52'    => 'Lục Phá',
                '118'   => 'Lục Phá',
                '312'   => 'Lục Phá',
                '47'    => 'Lục Phá',
                '17'    => 'Lục Xung',  // luc xung
                '28'    => 'Lục Xung',
                '39'    => 'Lục Xung',
                '410'   => 'Lục Xung',
                '511'   => 'Lục Xung',
                '612'   => 'Lục Xung',

                '91'    => 'Tam Hợp',  // tam hop
                '95'    => 'Tam Hợp',
                '15'    => 'Tam Hợp',
                '37'    => 'Tam Hợp',
                '311'   => 'Tam Hợp',
                '610'   => 'Tam Hợp',
                '62'    => 'Tam Hợp',
                
                '102'   => 'Tam Hợp',
                '48'    => 'Tam Hợp',
                '128'   => 'Tam Hợp',
                '124'   => 'Tam Hợp',

                '44'   => 'Tam Hợp',   // -- continter
                '66'    => 'Tam Hợp',
                '88'   => 'Tam Hợp',
                '99'   => 'Tam Hợp',
                '1111'   => 'Tam Hợp',
                '11'    => 'Tam Hợp',
                '22'   => 'Tam Hợp',
                '33'   => 'Tam Hợp',

                '212'   => 'Tứ Đức Hợp',    // tu duc hop
                '35'    => 'Tứ Đức Hợp',
                '68'    => 'Tứ Đức Hợp',
                '911'   => 'Tứ Đức Hợp',
                '55'    => 'Tự Hình',   // tu hinh
                '77'    => 'Tự Hình',
                '1010'  => 'Tự Hình',
                '1212'  => 'Tự Hình',
                '16'    => 'Tứ Tuyệt', // tu tuyet
                '712'   => 'Tứ Tuyệt',
                '103'   => 'Tứ Tuyệt',
                '94'    => 'Tứ Tuyệt',
                '711'   => 'Tam Hợp',
            );
            if(!array_key_exists($input,$diachi)){
                $input  = $input2.$input1;
            }
            if(array_key_exists($input,$diachi)){
                if(empty($input)){
                    return $diachi;
                }
                else{
                    return $diachi[$input];
                }
            }
            return 'Bình Hòa';
        }

        function getCungkham($input1 = null,$input2 = null){
            $input = $input1.$input2;
            $cungkham = array(
                '14'=>'Sinh Khí',
                '19'=>'Diên Niên',
                '13'=>'Thiên Y',
                '11'=>'Phục Vị',
                '12'=>'Tuyệt Mạng',
                '17'=>'Họa Hại',
                '18'=>'Ngũ Quỷ',
                '16'=>'Lục Sát',
                '28'=>'Sinh Khí',
                '26'=>'Diên Niên',
                '27'=>'Thiên Y',
                '22'=>'Phục Vị',
                '23'=>'Tuyệt Mạng',
                '21'=>'Họa Hại',
                '29'=>'Ngũ Quỷ',
                '24'=>'Lục Sát',
                '39'=>'Sinh Khí',
                '34'=>'Diên Niên',
                '31'=>'Thiên Y',
                '33'=>'Phục Vị',
                '37'=>'Tuyệt Mạng',
                '32'=>'Họa Hại',
                '36'=>'Ngũ Quỷ',
                '38'=>'Lục Sát',
                '41'=>'Sinh Khí',
                '43'=>'Diên Niên',
                '49'=>'Thiên Y',
                '44'=>'Phục Vị',
                '48'=>'Tuyệt Mạng',
                '46'=>'Họa Hại',
                '42'=>'Ngũ Quỷ',
                '47'=>'Lục Sát',
                '67'=>'Sinh Khí',
                '62'=>'Diên Niên',
                '68'=>'Thiên Y',
                '66'=>'Phục Vị',
                '69'=>'Tuyệt Mạng',
                '64'=>'Họa Hại',
                '63'=>'Ngũ Quỷ',
                '61'=>'Lục Sát',
                '76'=>'Sinh Khí',
                '78'=>'Diên Niên',
                '72'=>'Thiên Y',
                '77'=>'Phục Vị',
                '73'=>'Tuyệt Mạng',
                '71'=>'Họa Hại',
                '79'=>'Ngũ Quỷ',
                '74'=>'Lục Sát',
                '82'=>'Sinh Khí',
                '87'=>'Diên Niên',
                '86'=>'Thiên Y',
                '88'=>'Phục Vị',
                '84'=>'Tuyệt Mạng',
                '89'=>'Họa Hại',
                '81'=>'Ngũ Quỷ',
                '83'=>'Lục Sát',
                '93'=>'Sinh Khí',
                '91'=>'Diên Niên',
                '94'=>'Thiên Y',
                '99'=>'Phục Vị',
                '96'=>'Tuyệt Mạng',
                '98'=>'Họa Hại',
                '97'=>'Ngũ Quỷ',
                '92'=>'Lục Sát',
            );
            if(!array_key_exists($input,$cungkham)){
                $input  = $input2.$input1;
            }
            if(array_key_exists($input,$cungkham)){
                if(empty($input)){
                    return $cungkham;
                }
                else{
                    return $cungkham[$input];
                }
            }
            return 'Bình Hòa';
        }

        function getThienmenh($input = null){
            // ngu hanh binh hoa 
            $thienmenh = array(
                '11'=>'Bình Hòa',   // binh hoa
                '22'=>'Bình Hòa',
                '33'=>'Bình Hòa ',
                '44'=>'Bình Hòa',
                '55'=>'Bình Hòa',
                
                '13'=>'Tương Khắc', // tuong khac
                '31'=>'Tương Khắc',
                '24'=>'Tương Khắc',
                '42'=>'Tương Khắc',
                '35'=>'Tương Khắc',
                '53'=>'Tương Khắc',
                '41'=>'Tương Khắc',
                '14'=>'Tương Khắc',
                '52'=>'Tương Khắc',
                '25'=>'Tương Khắc',
                
                '12'=>'Tương Sinh', // tuong Sinh
                '23'=>'Tương Sinh',
                '34'=>'Tương Sinh',
                '45'=>'Tương Sinh',
                '51'=>'Tương Sinh',
                '21'=>'Tương Sinh',
                '32'=>'Tương Sinh',
                '43'=>'Tương Sinh',
                '54'=>'Tương Sinh',
                '15'=>'Tương Sinh',
            );
            
            if(array_key_exists($input,$thienmenh)){
                if(empty($input)){
                    return $thienmenh;
                }
                else{
                    return $thienmenh[$input];
                }
            }
            return 'Bình Hòa';
        }

        function getScores($input){   // diem so theo tung bai luan
            $input = trim($input);
            $query = $this->CI->boituoivochong_model->db->select()
                                                ->from('ci_scores')
                                                ->where('name',$input)
                                                ->get();
            $result = $query->row_array();
            if(empty($result)){
                return '0';
            }
            return $result['scores'];
        }

        function getScores_codetheoseo($input = null){   // diem so theo tung bai luan
            $listDiem = array(
                'Tương khắc'    => 0,
                'Tương Sinh'    => 1,
                'Bình Hòa'      => 0.5,
                'Tương Hợp'     => 1,
                'Tương Phá'     => 0,
                'Tương Xung'    => 0,
                'Lục Hại'       => 0,
                'Chống Đối'     => 0,
                'Lục Hình'      => 0,
                'Lục Hợp'       => 1,
                'Lục Phá'       => 0,
                'Lục Xung'      => 0,
                'Tam Hợp'       => 1,
                'Tứ Đức Hợp'    => 1,
                'Tự Hình'       => 0.5,
                'Tứ Tuyệt'      => 0
            );
            if(array_key_exists($input,$listDiem)){
                return $listDiem[$input];
            }
            return 0;
        }

        function getscores_xemtuoicon($input){   // diem so theo tung bai luan
            $input = trim($input);
            $query = $this->CI->boituoivochong_model->db->select()
                                                ->from('ci_scores')
                                                ->where('name',$input)
                                                ->get();
            $result = $query->row_array();
            if(empty($result)){
                return false;
            }
            return $result;
        }

        function getScorescontent($input = null){
            $diemxau    = '<p class="alert alert-success" style="font-weight: bold;">Điều này cho thấy tuổi của 2 vợ chồng có NHIỀU ĐIỂM XUNG KHẮC với nhau. Cần xem thêm cách hóa giải xung khắc dưới đây để cuộc sống được hòa hợp</p>

            
            ';
            $diemtb     = '<p class="alert alert-success" style="font-weight: bold;">Đây là số điểm TRUNG BÌNH. Để chắc chắn và khắc phục những bất đồng, xung khắc quý bạn nên xem lại hoặc sử dụng các phương pháp hóa giải dưới đây.</p>

            
            ';
            $diemtot    = '<p class="alert alert-success" style="font-weight: bold;">Đây là một số điểm rất tuyệt vời, nó thể hiện rằng tuổi của hai vợ chồng quý bạn rất hợp nhau. Đồng thời bổ trợ cho nhau để vượt qua mọi khó khăn, trắc trở và hướng tới gia đình ấm êm, hạnh phúc, công danh phát đạt. Để đời sống vợ chồng thêm trọn vẹn quý bạn nên xem thêm cá ứng dụng xem tuổi sinh con, xem tuổi vợ chồng làm ăn dưới đây!<br />
            
            ';
            if ($input > 0 && $input < 4) {
                return $diemxau;
            }
            if ($input >= 4 && $input <= 5) {
                return $diemtb;
            }
            if ($input > 5) {
                return $diemtot;
            }
        }

        function getNamthicong($input = null){
            $namhientai = date('Y');
            $namsinh = $input['namsinh'];
            $menhsinh = $input['menhsinh'];
            $canchi_namsinh = $input['canchi_namsinh'];
            $chi_nam    = get_chi_menh($canchi_namsinh['chi']);
            //dd($menhsinh);
            $hoangoc = null;
            $kimlau  = null;
            $canchi_kimlau = null;
            $tamtai  = null;
            for($i = $namhientai; $i <= $namhientai+10; $i++){
                // so sanh hoang oc
                $tuoi_amlich = $i-$namsinh[2]+1;
                $hoangoc[$i] = $this->CI->boituoivochong_model->getHoangoc($tuoi_amlich);
            }
            //dd($hoangoc);
            foreach($hoangoc as $key => $value){
                if($value['is_hoangoc'] == 0){
                    //echo ''.$key.'-';
                    //dd($value);
                    $kimlau[$key] = $this->CI->boituoivochong_model->getKimlau($value['age']);
                }
            }
            //dd($kimlau);
            //dd($kimlau);
            // doi nam kim lau sang can chi
            foreach($kimlau as $key_kl => $value_kl){
                if(empty($value_kl)){
                    //get_can_menh($canchi_al_nam['can']).' '.get_chi_menh($canchi_al_nam['chi']);
                    $value_able = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$key_kl));
                    //dd($value_able);
                    $canchi_kimlau[$key_kl]['can'] = get_can_menh($value_able['can']);
                    $canchi_kimlau[$key_kl]['chi'] = get_chi_menh($value_able['chi']);
                    //$canchi_kimlau[$key_kl] = get_can_menh($value_able['can']).' '.get_chi_menh($value_able['chi']);
                }
            }
            foreach($canchi_kimlau as $key_tamtai => $value_tamtai){
                $sql = "select * from ci_tamtai where nam_tuoi like '%$chi_nam%' and nam_tamtai like '%".$value_tamtai['chi']."%'";
                //echo $sql.'<br>';
                $rows = $this->CI->boituoivochong_model->db->query($sql);
                $info = $rows->row_array();
                if(empty($info)){
                    $tamtai[$key_tamtai]    = $value_tamtai;
                }
            }
            return $tamtai;
            //dd($tamtai);
            //dd($canchi_kimlau);
        }

        function getNamkethon($input = null){
            $namhientai = date('Y');
            $namsinh = $input['namsinh'];
            $menhsinh = $input['menhsinh'];
            $canchi_namsinh = $input['canchi_namsinh'];
            $chi_nam    = get_chi_menh($canchi_namsinh['chi']);
            //dd($menhsinh);
            $thaitue = null;
            $kimlau  = null;
            $canchi_kimlau = null;
            $tamtai  = null;
            for($i = $namhientai; $i <= $namhientai+10; $i++){
                // so sanh hoang oc
                $tuoi_amlich = $i-$namsinh[2]+1;
                // $thaitue[$i] = $this->CI->boituoivochong_model->getHoangoc($tuoi_amlich);
                $thaitue[$i] = $this->getThaitue($tuoi_amlich);
            }
            //dd($hoangoc);
            foreach($thaitue as $key => $value){
                if(empty($value)){
                    //echo ''.$key.'-';
                    //dd($value);
                    $tuoi_amlich = $key-$namsinh[2]+1;
                    $kimlau[$key] = $this->CI->boituoivochong_model->getKimlau($tuoi_amlich);
                }
            }
            //dd($kimlau);
            // doi nam kim lau sang can chi
            foreach($kimlau as $key_kl => $value_kl){
                if(empty($value_kl)){
                    //get_can_menh($canchi_al_nam['can']).' '.get_chi_menh($canchi_al_nam['chi']);
                    $value_able = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$key_kl));
                    //dd($value_able);
                    $canchi_kimlau[$key_kl]['can'] = get_can_menh($value_able['can']);
                    $canchi_kimlau[$key_kl]['chi'] = get_chi_menh($value_able['chi']);
                    //$canchi_kimlau[$key_kl] = get_can_menh($value_able['can']).' '.get_chi_menh($value_able['chi']);
                }
            }
            foreach($canchi_kimlau as $key_tamtai => $value_tamtai){
                $sql = "select * from ci_tamtai where nam_tuoi like '%$chi_nam%' and nam_tamtai like '%".$value_tamtai['chi']."%'";
                //echo $sql.'<br>';
                $rows = $this->CI->boituoivochong_model->db->query($sql);
                $info = $rows->row_array();
                if(empty($info)){
                    $tamtai[$key_tamtai]    = $value_tamtai;
                }
            }
            return $tamtai;
            //dd($tamtai);
            //dd($canchi_kimlau);
        }

        function getNammuanha($input = null){
            $namhientai = date('Y');
            $namsinh = $input['namsinh'];
            $menhsinh = $input['menhsinh'];
            $canchi_namsinh = $input['canchi_namsinh'];
            $chi_nam    = get_chi_menh($canchi_namsinh['chi']);
            //dd($menhsinh);
            $hoangoc = null;
            $kimlau  = null;
            $canchi_kimlau = null;
            $tamtai  = null;
            for($i = $namhientai; $i <= $namhientai+10; $i++){
                // so sanh hoang oc
                $tuoi_amlich = $i-$namsinh[2]+1;
                $camtrach[$i] = array('camtrach'=>$this->getCamtrach($tuoi_amlich),'age'=>$tuoi_amlich);
            }
            // dd($camtrach);

            //dd($hoangoc);
            foreach($camtrach as $key => $value){
                if($value['camtrach'][1] == 1){
                    //echo ''.$key.'-';
                    //dd($value);
                    $kimlau[$key] = $this->CI->boituoivochong_model->getKimlau($value['age']);
                }
            }
            
            // doi nam kim lau sang can chi
            foreach($kimlau as $key_kl => $value_kl){
                if(empty($value_kl)){
                    //get_can_menh($canchi_al_nam['can']).' '.get_chi_menh($canchi_al_nam['chi']);
                    $value_able = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$key_kl));
                    //dd($value_able);
                    $canchi_kimlau[$key_kl]['can'] = get_can_menh($value_able['can']);
                    $canchi_kimlau[$key_kl]['chi'] = get_chi_menh($value_able['chi']);
                    //$canchi_kimlau[$key_kl] = get_can_menh($value_able['can']).' '.get_chi_menh($value_able['chi']);
                }
            }

            foreach($canchi_kimlau as $key_tamtai => $value_tamtai){
                $sql = "select * from ci_tamtai where nam_tuoi like '%$chi_nam%' and nam_tamtai like '%".$value_tamtai['chi']."%'";
                //echo $sql.'<br>';
                $rows = $this->CI->boituoivochong_model->db->query($sql);
                $info = $rows->row_array();
                if(empty($info)){
                    $tamtai[$key_tamtai]    = $value_tamtai;
                }
            }
            return $tamtai;
            //dd($tamtai);
            //dd($canchi_kimlau);
        }
        
        function getMuontuoilamnha($input = null){
            $hoangoc = null;
            $kimlau  = null;
            $canchi_kimlau = null;
            $tamtai  = null;
            $arr_list_age = null;
            $nam_sosanh_canchi_num = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$input));
            $nam_sosanh_canchi_text = get_chi_menh($nam_sosanh_canchi_num['chi']);
            for($i = 1947; $i <= 1997; $i++){
                // so sanh hoang oc
                $tuoi_amlich = $input-$i+1;
                $result_hoangoc = $this->CI->boituoivochong_model->getHoangoc($tuoi_amlich);
                $arr_list_age[$i]['hoangoc'] = $result_hoangoc;
            }
            for($i = 1947; $i <= 1997; $i++){
                // so sanh kim lau
                $tuoi_amlich = $input-$i+1;
                $result_kimlau = $this->CI->boituoivochong_model->getKimlau($tuoi_amlich);
                $arr_list_age[$i]['kimlau'] = $result_kimlau;
            }
            for($i = 1947; $i <= 1997; $i++){
                // so sanh tam tai
                $list_tuoi = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$i));
                $list_tuoi_canchi_text = get_chi_menh($list_tuoi['chi']);
                $arr_list_age[$i]['canchi_tuoi'] = get_can_menh($list_tuoi['can']).' '.get_chi_menh($list_tuoi['chi']);
                $sql = "select * from ci_tamtai where nam_tuoi like '%$list_tuoi_canchi_text%' and nam_tamtai like '%".$nam_sosanh_canchi_text."%'";
                //echo $sql.'<br>';
                $rows = $this->CI->boituoivochong_model->db->query($sql);
                $info = $rows->row_array();
                $arr_list_age[$i]['tamtai'] = $info;
            }
            for($i = 1947; $i <= 1997; $i++){
                // so sanh hoang oc
                $tuoi_amlich = $input-$i+1;
                $result_thaitue = $this->getThaitue($tuoi_amlich);
                $arr_list_age[$i]['thaitue'] = $result_thaitue;
            }
            return $arr_list_age;
        }

        function getMuontuoimuanha($input = null){
            $hoangoc = null;
            $kimlau  = null;
            $canchi_kimlau = null;
            $tamtai  = null;
            $arr_list_age = null;
            $nam_sosanh_canchi_num = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$input));
            $nam_sosanh_canchi_text = get_chi_menh($nam_sosanh_canchi_num['chi']);
            for($i = 1947; $i <= 1997; $i++){
                // so sanh cam trach
                $tuoi_amlich = $input-$i+1;
                $result_camtrach = $this->getCamtrach($tuoi_amlich);
                $arr_list_age[$i]['camtrach'] = $result_camtrach;
            }
            for($i = 1947; $i <= 1997; $i++){
                // so sanh kim lau
                $tuoi_amlich = $input-$i+1;
                $result_kimlau = $this->CI->boituoivochong_model->getKimlau($tuoi_amlich);
                $arr_list_age[$i]['kimlau'] = $result_kimlau;
            }
            for($i = 1947; $i <= 1997; $i++){
                // so sanh tam tai
                $list_tuoi = $this->CI->ngayamduong->get_canchi_nam(array(6,6,$i));
                $list_tuoi_canchi_text = get_chi_menh($list_tuoi['chi']);
                $arr_list_age[$i]['canchi_tuoi'] = get_can_menh($list_tuoi['can']).' '.get_chi_menh($list_tuoi['chi']);
                $sql = "select * from ci_tamtai where nam_tuoi like '%$list_tuoi_canchi_text%' and nam_tamtai like '%".$nam_sosanh_canchi_text."%'";
                //echo $sql.'<br>';
                $rows = $this->CI->boituoivochong_model->db->query($sql);
                $info = $rows->row_array();
                $arr_list_age[$i]['tamtai'] = $info;
            }
            return $arr_list_age;
        }

        
    }
?>