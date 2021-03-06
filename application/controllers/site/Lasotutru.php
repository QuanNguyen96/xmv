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
                    'name' => 'Xem tu???i',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'L?? s??? qu??? c???c',
                    'slug' => 'la-so-quy-coc',
                ),
            );
            $data['breadcrumb'] = breadcrumb($breadcrumb);
            $this->my_seolink->set_seolink();
            $data['title']       = $this->my_seolink->get_title();
            $data['keywords']    = $this->my_seolink->get_keywords();
            $data['description'] = $this->my_seolink->get_description();
            $data['page_text']  = $this->my_seolink->get_text();
            /*$data['title']       = 'qu??? c???c to??n m???nh';
            $data['keywords']    = 'qu??? c???c to??n m???nh';
            $data['description'] = 'qu??? c???c to??n m???nh';*/
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
                '11'=>'Thu???n C??n (??? qi??n)',
                '12'=>'Thi??n Tr???ch L?? (??? l??)',
                '13'=>'Thi??n H???a ?????ng Nh??n (?????? t??ng r??n)',
                '14'=>'Thi??n L??i V?? V???ng (?????? w?? w??ng)',
                '15'=>'Thi??n Phong C???u (??? g??u)',
                '16'=>'Thi??n Th???y T???ng (??? s??ng)',
                '17'=>'Thi??n S??n ?????n (??? d??n)',
                '18'=>'Thi??n ?????a B?? (??? p??)',
                '21'=>'Tr???ch Thi??n Qu???i (??? gu??i)',
                '22'=>'Thu???n ??o??i (??? du??)',
                '23'=>'Tr???ch H???a C??ch (??? g??)',
                '24'=>'Tr???ch L??i T??y (??? su??)',
                '25'=>'Tr???ch Phong ?????i Qu?? (?????? d?? gu??)',
                '26'=>'Tr???ch Th???y Kh???n (??? k??n)',
                '27'=>'Tr???ch S??n H??m (??? xi??n)',
                '28'=>'Tr???ch ?????a T???y (??? cu??)',
                '31'=>'H???a Thi??n ?????i H???u (?????? d?? y??u)',
                '32'=>'H???a Tr???ch Khu?? (??? ku??)',
                '33'=>'Thu???n Ly (??? l??)',
                '34'=>'H???a L??i Ph??? H???p (?????? sh?? k??)',
                '35'=>'H???a Phong ?????nh (??? d??ng)',
                '36'=>'H???a Th???y V??? T??? (?????? w??i j??)',
                '37'=>'H???a S??n L??? (??? l??)',
                '38'=>'H???a ?????a T???n (??? j??n)',
                '41'=>'L??i Thi??n ?????i Tr??ng (?????? d?? zhu??ng)',
                '42'=>'L??i Tr???ch Quy Mu???i (?????? gu?? m??i)',
                '43'=>'L??i H???a Phong (??? f??ng)',
                '44'=>'Thu???n Ch???n (??? zh??n)',
                '45'=>'L??i Phong H???ng (??? h??ng)',
                '46'=>'L??i Th???y Gi???i (??? xi??)',
                '47'=>'L??i S??n Ti???u Qu?? (?????? xi??o gu??)',
                '48'=>'L??i ?????a D??? (??? y??)',
                '51'=>'Phong Thi??n Ti???u S??c (?????? xi??o ch??)',
                '52'=>'Phong Tr???ch Trung Phu (?????? zh??ng f??)',
                '53'=>'Phong H???a Gia Nh??n (?????? ji?? r??n)',
                '54'=>'Phong L??i ??ch (??? y??)',
                '55'=>'Thu???n T???n (??? x??n)',
                '56'=>'Phong Th???y Ho??n (??? hu??n)',
                '57'=>'Phong S??n Ti???m (??? ji??n)',
                '58'=>'Phong ?????a Quan (??? gu??n)',
                '61'=>'Th???y Thi??n Nhu (??? x??)',
                '62'=>'Th???y Tr???ch Ti???t (??? ji??)',
                '63'=>'Th???y H???a K?? T??? (?????? j?? j??)',
                '64'=>'Th???y L??i Tru??n (??? ch??n)',
                '65'=>'Th???y Phong T???nh (??? j??ng)',
                '66'=>'Thu???n Kh???m (??? k??n)',
                '67'=>'Th???y S??n Ki???n (??? ji??n)',
                '68'=>'Th???y ?????a T??? (??? b??)',
                '71'=>'S??n Thi??n ?????i S??c (?????? d?? ch??)',
                '72'=>'S??n Tr???ch T???n (??? s??n)',
                '73'=>'S??n H???a B?? (??? b??)',
                '74'=>'S??n L??i Di (??? y??)',
                '75'=>'S??n Phong C??? (??? g??)',
                '76'=>'S??n Th???y M??ng (??? m??ng)',
                '77'=>'Thu???n C???n (??? g??n)',
                '78'=>'S??n ?????a B??c (??? b??)',
                '81'=>'?????a Thi??n Th??i (??? t??i)',
                '82'=>'?????a Tr???ch L??m (??? l??n)',
                '83'=>'?????a H???a Minh Di (?????? m??ng y??)',
                '84'=>'?????a L??i Ph???c (??? f??)',
                '85'=>'?????a Phong Th??ng (??? sh??ng)',
                '86'=>'?????a Th???y S?? (??? sh??)',
                '87'=>'?????a S??n Khi??m (??? qi??n)',
                '88'=>'Thu???n Kh??n (??? k??n)',
            );
            $i=1;
            foreach ($arr as $key => $row) {
                //$this->lasotutru_model->db->where('id',$i)->update('ci_laso_que',['name'=>$row]);
                $i++;
            }
        }*/
        
        
        /*function update_laso_que(){
            $list1 = array(
                'gi??p'  => 'ch???n',
                '???t'    => 't???n',
                'b??nh'  => 'ly',
                '??inh'  => 'kh??n',
                'm???u'   => 'c???n',
                'k???'    => 'kh??n',
                'canh'  => '??o??i',
                't??n'   => 'c??n',
                'nh??m'  => 'kh???m',
                'qu??'   => 'c???n',
            );
            $list2 = array(
                'gi??p'  => 'ch???n',
                '???t'    => 't???n',
                'b??nh'  => 'ly',
                '??inh'  => 'kh??n',
                'm???u'   => 'c???n',
                'k???'    => 'kh??n',
                'canh'  => '??o??i',
                't??n'   => 'c??n',
                'nh??m'  => 'kh???m',
                'qu??'   => 'c???n',
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
                'gi??p'  => ['t??','th??n','th??n','tu???t','ng???','d???n'],
                '???t'    => ['s???u','m??o','t???','m??i','d???u','h???i'],
                'b??nh'  => ['t??','d???n','th??n','ng???','th??n','tu???t'],
                '??inh'  => ['m??o','t???','m??i','d???u','h???i','s???u'],
                'm???u'   => ['t??','d???n','th??n','ng???','th??n','tu???t'],
                'k???'    => ['s???u','m??o','t???','m??i','d???u','h???i'],
                'canh'   => ['t??','d???n','th??n','ng???','th??n','tu???t'],
                't??n'    => ['s???u','m??o','t???','m??i','d???u','h???i'],
                'nh??m'  => ['t??','d???n','th??n','ng???','th??n','tu???t'],
                'qu??'     => ['s???u','m??o','t???','m??i','d???u','h???i'],
            );
            $list2 = array(
                'gi??p'  => 'ch???n',
                '???t'    => 't???n',
                'b??nh'  => 'ly',
                '??inh'  => 'kh??n',
                'm???u'   => 'c???n',
                'k???'    => 'kh??n',
                'canh'  => '??o??i',
                't??n'   => 'c??n',
                'nh??m'  => 'kh???m',
                'qu??'   => 'c???n',
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