<?php
    class Lasotutru extends CI_Controller{
        public $module_view = 'site';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
            parent::__construct(); 
            $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
            $this->view        =  $this->module_view.'/'.$this->view;
            $this->load->model('site/lasotutru_model','md');
            $this->load->library(array('site/ngayamduong','site/lasotutru_lib','site/my_seolink', 'form_validation', 'site/comment_lib'));
            $this->load->helper(array('my_menh'));
        }
        public function index(){
            $this->load->library('site/vnkey');
            if($_POST){
                $input = $this->input->post();
                $ngaysinh = $input['day'];
                $thangsinh = $input['month'];
                $namsinh = $input['year'];
                $giosinh = $input['hour'];
                $phutsinh = $input['minute'];
                $data['is_submit']  = 1;
            }
            else{
                $ngaysinh = 6;
                $thangsinh = 6;
                $namsinh = 2000;
                $giosinh = 6;
                $phutsinh = 30;
            }
            $data['send_input_ngaysinh'] = $ngaysinh;
            $data['send_input_thangsinh'] = $thangsinh;
            $data['send_input_namsinh'] = $namsinh;
            $data['send_input_giosinh'] = $giosinh;
            $data['send_input_phutsinh'] = $phutsinh;
            
            /** doi du lieu **/
            
            $array_tuoi_duonglich   = array($ngaysinh,$thangsinh,$namsinh);
            $sinh_am_lich           = $this->ngayamduong->get_amlich($array_tuoi_duonglich);
            $data['sinh_am_lich']   = $sinh_am_lich;
            
            $sinhvaothu = $this->ngayamduong->get_ngaythu($array_tuoi_duonglich);
            $data['sinhvaothu'] = $sinhvaothu;
            //dd($sinh_am_lich);
            
            $canchi_al_ngay     = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
            $canchi_al_thang    = $this->ngayamduong->get_canchi_thang($sinh_am_lich);
            $canchi_al_nam      = $this->ngayamduong->get_canchi_nam($sinh_am_lich);
            
            $str_can_al_ngay    = get_can_menh($canchi_al_ngay['can']);
            $str_chi_al_ngay    = get_chi_menh($canchi_al_ngay['chi']);
            $str_can_al_thang    = get_can_menh((int)$canchi_al_thang['can']);
            $str_chi_al_thang    = get_chi_menh((int)$canchi_al_thang['chi']);
            $str_can_al_nam    = get_can_menh($canchi_al_nam['can']);
            $str_chi_al_nam    = get_chi_menh($canchi_al_nam['chi']);
            
            //dd($str_can_al_ngay);
            //dd($canchi_al_nam);
            $canchi_ngay_show        = get_can_menh($canchi_al_ngay['can']).' '.get_chi_menh($canchi_al_ngay['chi']); // vd : giap tuat
            $canchi_thang_show        = get_can_menh((int)$canchi_al_thang['can']).' '.get_chi_menh((int)$canchi_al_thang['chi']); // vd : giap tuat
            $canchi_nam_show        = get_can_menh($canchi_al_nam['can']).' '.get_chi_menh($canchi_al_nam['chi']); // vd : giap tuat
            $data['canchi_ngay_show'] = $canchi_ngay_show;
            $data['canchi_thang_show'] = $canchi_thang_show;
            $data['canchi_nam_show'] = $canchi_nam_show;
            
            // ----------------- xu ly gio sinh
            $giosinh = (int)$giosinh;
            if($giosinh % 2 == 0){
                $giosinh = $giosinh-1;
            }
            if($giosinh != 23){
                $giosinh_khoanggio    = $giosinh.'-'.($giosinh+2);
            }
            else{
                $giosinh_khoanggio = $giosinh.'-1';
            }
            $canchi_gio      = $this->lasotutru_lib->getgioCanHH(get_can_menh($canchi_al_ngay['can']),get_chi_menh($canchi_al_ngay['chi']),$giosinh_khoanggio);
            $data['canchi_gio'] = $canchi_gio;
            $data['str_can_al_nam'] = $str_can_al_nam;
            $data['str_can_al_gio'] = $canchi_gio['can'];
            
            $laso_cung_nam = $this->lasotutru_model->get_laso_cung($str_can_al_nam);
            $laso_cung_gio = $this->lasotutru_model->get_laso_cung($canchi_gio['can']);
            $data['laso_cung_nam']  = $laso_cung_nam;
            $data['laso_cung_gio']  = $laso_cung_gio;
            
            $laso_que   = $this->lasotutru_model->get_laso_que($str_can_al_nam,$canchi_gio['can']);
            $data['laso_que']   = $laso_que;
            $laso_luan   = $this->lasotutru_model->get_laso_luan($canchi_gio['can'],$canchi_gio['chi'],$str_can_al_nam);
            $data['laso_luan']   = $laso_luan;
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
            /** end doi du lieu **/
            // get breadcrumb
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Lá số quỷ cốc',
                    'slug' => 'la-so-quy-coc',
                ),
            );
            $data['breadcrumb'] = breadcrumb($breadcrumb);
            $this->my_seolink->set_seolink();
            $data['title']       = $this->my_seolink->get_title();
            $data['keywords']    = $this->my_seolink->get_keywords();
            $data['description'] = $this->my_seolink->get_description();
            $data['page_text']  = $this->my_seolink->get_text();
            /*$data['title']       = 'quỷ cốc toán mệnh';
            $data['keywords']    = 'quỷ cốc toán mệnh';
            $data['description'] = 'quỷ cốc toán mệnh';*/
            $data['view'] = $this->action_view;
            $this->load->view( $this->view, $data );  
        }
        
        function xem_tuoi_con(){
            $input = $this->input->get();
            if(!empty($input)){
                $ngaysinh_cha = $input['ngaysinh_cha'];
                $thangsinh_cha = $input['thangsinh_cha'];
                $namsinh_cha = $input['namsinh_cha'];
                $ngaysinh_me = $input['ngaysinh_me'];
                $thangsinh_me = $input['thangsinh_me'];
                $namsinh_me = $input['namsinh_me'];
                $ngaysinh_con = $input['ngaysinh_con'];
                $thangsinh_con = $input['thangsinh_con'];
                $namsinh_con = $input['namsinh_con'];
            }
            else{
                $ngaysinh_cha = 6;
                $thangsinh_cha = 6;
                $namsinh_cha = 2000;
                $ngaysinh_me = 6;
                $thangsinh_me = 6;
                $namsinh_me = 2000;
                $ngaysinh_con = 6;
                $thangsinh_con = 6;
                $namsinh_con = 2000;
            }
            $data['send_input_ngaysinh_cha'] = $ngaysinh_cha;
            $data['send_input_thangsinh_cha'] = $thangsinh_cha;
            $data['send_input_namsinh_cha'] = $namsinh_cha;
            $data['send_input_ngaysinh_me'] = $ngaysinh_me;
            $data['send_input_thangsinh_me'] = $thangsinh_me;
            $data['send_input_namsinh_me'] = $namsinh_me;
            $data['send_input_ngaysinh_con'] = $ngaysinh_con;
            $data['send_input_thangsinh_con'] = $thangsinh_con;
            $data['send_input_namsinh_con'] = $namsinh_con;
            
            /** doi du lieu **/
            // cha
            $array_tuoi_duonglich_cha   = array($ngaysinh_cha,$thangsinh_cha,$namsinh_cha);
            $sinh_am_lich_cha           = $this->ngayamduong->get_amlich($array_tuoi_duonglich_cha);
            $data['sinh_am_lich_cha']   = $sinh_am_lich_cha;
            
            $canchi_al_ngay_cha     = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_cha);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
            $canchi_al_thang_cha    = $this->ngayamduong->get_canchi_thang($sinh_am_lich_cha);
            $canchi_al_nam_cha      = $this->ngayamduong->get_canchi_nam($sinh_am_lich_cha);
            
            $canchi_ngay_show_cha        = get_can_menh($canchi_al_ngay_cha['can']).' '.get_chi_menh($canchi_al_ngay_cha['chi']); // vd : giap tuat
            $canchi_thang_show_cha        = get_can_menh((int)$canchi_al_thang_cha['can']).' '.get_chi_menh((int)$canchi_al_thang_cha['chi']); // vd : giap tuat
            $canchi_nam_show_cha        = get_can_menh($canchi_al_nam_cha['can']).' '.get_chi_menh($canchi_al_nam_cha['chi']); // vd : giap tuat
            $data['canchi_ngay_show_cha'] = $canchi_ngay_show_cha;
            $data['canchi_thang_show_cha'] = $canchi_thang_show_cha;
            $data['canchi_nam_show_cha'] = $canchi_nam_show_cha;
            
            $menh_sinh_cha = $this->md->getLucThap($canchi_nam_show_cha);   // hien thi menh
            $data['menh_sinh_cha'] = $menh_sinh_cha;
            
            // me
            $array_tuoi_duonglich_me   = array($ngaysinh_me,$thangsinh_me,$namsinh_me);
            $sinh_am_lich_me           = $this->ngayamduong->get_amlich($array_tuoi_duonglich_me);
            $data['sinh_am_lich_me']   = $sinh_am_lich_me;
            
            $canchi_al_ngay_me     = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_me);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
            $canchi_al_thang_me    = $this->ngayamduong->get_canchi_thang($sinh_am_lich_me);
            $canchi_al_nam_me      = $this->ngayamduong->get_canchi_nam($sinh_am_lich_me);
            
            $canchi_ngay_show_me        = get_can_menh($canchi_al_ngay_me['can']).' '.get_chi_menh($canchi_al_ngay_me['chi']); // vd : giap tuat
            $canchi_thang_show_me        = get_can_menh((int)$canchi_al_thang_me['can']).' '.get_chi_menh((int)$canchi_al_thang_me['chi']); // vd : giap tuat
            $canchi_nam_show_me        = get_can_menh($canchi_al_nam_me['can']).' '.get_chi_menh($canchi_al_nam_me['chi']); // vd : giap tuat
            $data['canchi_ngay_show_me'] = $canchi_ngay_show_me;
            $data['canchi_thang_show_me'] = $canchi_thang_show_me;
            $data['canchi_nam_show_me'] = $canchi_nam_show_me;
            
            $menh_sinh_me = $this->md->getLucThap($canchi_nam_show_me);   // hien thi menh
            $data['menh_sinh_me'] = $menh_sinh_me;
            
            // con
            $array_tuoi_duonglich_con   = array($ngaysinh_con,$thangsinh_con,$namsinh_con);
            $sinh_am_lich_con           = $this->ngayamduong->get_amlich($array_tuoi_duonglich_con);
            $data['sinh_am_lich_con']   = $sinh_am_lich_con;
            
            $canchi_al_ngay_con     = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_con);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
            $canchi_al_thang_con    = $this->ngayamduong->get_canchi_thang($sinh_am_lich_con);
            $canchi_al_nam_con      = $this->ngayamduong->get_canchi_nam($sinh_am_lich_con);
            
            $canchi_ngay_show_con        = get_can_menh($canchi_al_ngay_con['can']).' '.get_chi_menh($canchi_al_ngay_con['chi']); // vd : giap tuat
            $canchi_thang_show_con        = get_can_menh((int)$canchi_al_thang_con['can']).' '.get_chi_menh((int)$canchi_al_thang_con['chi']); // vd : giap tuat
            $canchi_nam_show_con        = get_can_menh($canchi_al_nam_con['can']).' '.get_chi_menh($canchi_al_nam_con['chi']); // vd : giap tuat
            $data['canchi_ngay_show_con'] = $canchi_ngay_show_con;
            $data['canchi_thang_show_con'] = $canchi_thang_show_con;
            $data['canchi_nam_show_con'] = $canchi_nam_show_con;
            
            $menh_sinh_con = $this->md->getLucThap($canchi_nam_show_con);   // hien thi menh
            $data['menh_sinh_con'] = $menh_sinh_con;
            
            /** end doi du lieu **/
            
            $this->load->view('lasotutru/xem_tuoi_con',$data);
        }
        
        /*function update_str(){
            $result = $this->lasotutru_model->db->select('*')->from('ci_laso_que')->get()->result_array();
            foreach ($result as $key => $value) {
                $update = trim($value['name']);
                $this->lasotutru_model->db->where('id',$value['id'])->update('ci_laso_que',['name'=>$update]);
            }
        }*/
        
        /*function update_laso(){
            $arr = array(
                '11'=>'Thuần Càn (乾 qián)',
                '12'=>'Thiên Trạch Lý (履 lǚ)',
                '13'=>'Thiên Hỏa Đồng Nhân (同人 tóng rén)',
                '14'=>'Thiên Lôi Vô Vọng (無妄 wú wàng)',
                '15'=>'Thiên Phong Cấu (姤 gòu)',
                '16'=>'Thiên Thủy Tụng (訟 sòng)',
                '17'=>'Thiên Sơn Độn (遯 dùn)',
                '18'=>'Thiên Địa Bĩ (否 pǐ)',
                '21'=>'Trạch Thiên Quải (夬 guài)',
                '22'=>'Thuần Đoài (兌 duì)',
                '23'=>'Trạch Hỏa Cách (革 gé)',
                '24'=>'Trạch Lôi Tùy (隨 suí)',
                '25'=>'Trạch Phong Đại Quá (大過 dà guò)',
                '26'=>'Trạch Thủy Khốn (困 kùn)',
                '27'=>'Trạch Sơn Hàm (咸 xián)',
                '28'=>'Trạch Địa Tụy (萃 cuì)',
                '31'=>'Hỏa Thiên Đại Hữu (大有 dà yǒu)',
                '32'=>'Hỏa Trạch Khuê (睽 kuí)',
                '33'=>'Thuần Ly (離 lí)',
                '34'=>'Hỏa Lôi Phệ Hạp (噬嗑 shì kè)',
                '35'=>'Hỏa Phong Đỉnh (鼎 dǐng)',
                '36'=>'Hỏa Thủy Vị Tế (未濟 wèi jì)',
                '37'=>'Hỏa Sơn Lữ (旅 lǚ)',
                '38'=>'Hỏa Địa Tấn (晉 jìn)',
                '41'=>'Lôi Thiên Đại Tráng (大壯 dà zhuàng)',
                '42'=>'Lôi Trạch Quy Muội (歸妹 guī mèi)',
                '43'=>'Lôi Hỏa Phong (豐 fēng)',
                '44'=>'Thuần Chấn (震 zhèn)',
                '45'=>'Lôi Phong Hằng (恆 héng)',
                '46'=>'Lôi Thủy Giải (解 xiè)',
                '47'=>'Lôi Sơn Tiểu Quá (小過 xiǎo guò)',
                '48'=>'Lôi Địa Dự (豫 yù)',
                '51'=>'Phong Thiên Tiểu Súc (小畜 xiǎo chù)',
                '52'=>'Phong Trạch Trung Phu (中孚 zhōng fú)',
                '53'=>'Phong Hỏa Gia Nhân (家人 jiā rén)',
                '54'=>'Phong Lôi Ích (益 yì)',
                '55'=>'Thuần Tốn (巽 xùn)',
                '56'=>'Phong Thủy Hoán (渙 huàn)',
                '57'=>'Phong Sơn Tiệm (漸 jiàn)',
                '58'=>'Phong Địa Quan (觀 guān)',
                '61'=>'Thủy Thiên Nhu (需 xū)',
                '62'=>'Thủy Trạch Tiết (節 jié)',
                '63'=>'Thủy Hỏa Ký Tế (既濟 jì jì)',
                '64'=>'Thủy Lôi Truân (屯 chún)',
                '65'=>'Thủy Phong Tỉnh (井 jǐng)',
                '66'=>'Thuần Khảm (坎 kǎn)',
                '67'=>'Thủy Sơn Kiển (蹇 jiǎn)',
                '68'=>'Thủy Địa Tỷ (比 bǐ)',
                '71'=>'Sơn Thiên Đại Súc (大畜 dà chù)',
                '72'=>'Sơn Trạch Tổn (損 sǔn)',
                '73'=>'Sơn Hỏa Bí (賁 bì)',
                '74'=>'Sơn Lôi Di (頤 yí)',
                '75'=>'Sơn Phong Cổ (蠱 gǔ)',
                '76'=>'Sơn Thủy Mông (蒙 méng)',
                '77'=>'Thuần Cấn (艮 gèn)',
                '78'=>'Sơn Địa Bác (剝 bō)',
                '81'=>'Địa Thiên Thái (泰 tài)',
                '82'=>'Địa Trạch Lâm (臨 lín)',
                '83'=>'Địa Hỏa Minh Di (明夷 míng yí)',
                '84'=>'Địa Lôi Phục (復 fù)',
                '85'=>'Địa Phong Thăng (升 shēng)',
                '86'=>'Địa Thủy Sư (師 shī)',
                '87'=>'Địa Sơn Khiêm (謙 qiān)',
                '88'=>'Thuần Khôn (坤 kūn)',
            );
            $i=1;
            foreach ($arr as $key => $row) {
                //$this->lasotutru_model->db->where('id',$i)->update('ci_laso_que',['name'=>$row]);
                $i++;
            }
        }*/
        
        
        /*function update_laso_que(){
            $list1 = array(
                'giáp'  => 'chấn',
                'ất'    => 'tốn',
                'bính'  => 'ly',
                'đinh'  => 'khôn',
                'mậu'   => 'cấn',
                'kỷ'    => 'khôn',
                'canh'  => 'đoài',
                'tân'   => 'càn',
                'nhâm'  => 'khảm',
                'quý'   => 'cấn',
            );
            $list2 = array(
                'giáp'  => 'chấn',
                'ất'    => 'tốn',
                'bính'  => 'ly',
                'đinh'  => 'khôn',
                'mậu'   => 'cấn',
                'kỷ'    => 'khôn',
                'canh'  => 'đoài',
                'tân'   => 'càn',
                'nhâm'  => 'khảm',
                'quý'   => 'cấn',
            );
            $i = 1;
            foreach ($list1 as $key1 => $row1) {
                foreach ($list2 as $key2 => $row2) {
                    $insert = array(
                        'can_nam'=>$key1,
                        'can_gio'=>$key2,
                        'que_nam'=>$row1,
                        'que_gio'=>$row2,
                        'name'=>''
                    );
                    if ($i>64) {
                        $this->lasotutru_model->db->where('id',$i)->insert('ci_laso_que',$insert);
                    }
                    else{
                        $this->lasotutru_model->db->where('id',$i)->update('ci_laso_que',$insert);
                    }
                    $i++;
                }
            }
        }*/
        
        /*function update_laso_luan(){
            $list1 = array(
                'giáp'  => ['tí','thân','thìn','tuất','ngọ','dần'],
                'ất'    => ['sửu','mão','tỵ','mùi','dậu','hợi'],
                'bính'  => ['tí','dần','thìn','ngọ','thân','tuất'],
                'đinh'  => ['mão','tỵ','mùi','dậu','hợi','sửu'],
                'mậu'   => ['tí','dần','thìn','ngọ','thân','tuất'],
                'kỷ'    => ['sửu','mão','tỵ','mùi','dậu','hợi'],
                'canh'   => ['tí','dần','thìn','ngọ','thân','tuất'],
                'tân'    => ['sửu','mão','tỵ','mùi','dậu','hợi'],
                'nhâm'  => ['tí','dần','thìn','ngọ','thân','tuất'],
                'quý'     => ['sửu','mão','tỵ','mùi','dậu','hợi'],
            );
            $list2 = array(
                'giáp'  => 'chấn',
                'ất'    => 'tốn',
                'bính'  => 'ly',
                'đinh'  => 'khôn',
                'mậu'   => 'cấn',
                'kỷ'    => 'khôn',
                'canh'  => 'đoài',
                'tân'   => 'càn',
                'nhâm'  => 'khảm',
                'quý'   => 'cấn',
            );
            foreach ($list2 as $key2 => $row2) {
                foreach ($list1 as $key1 => $row1) {
                    foreach($row1 as $key_row1 => $value_row1){
                        $insert = array(
                            'can_nam'=>$key2,
                            'can_gio'=>$key1,
                            'chi_gio'=>$value_row1,
                        );
                        $this->lasotutru_model->db->insert('ci_laso_luan',$insert);
                    }
                }
            }
        }*/
        
    }
?>