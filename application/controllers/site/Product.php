<?php
class Product extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $limit       = 20;
    public function __construct()
    {
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library(array('site/my_config'));
        $this->load->model(array('site/product_model'));
        $this->load->helper(array('product_helper','site_helper'));
    }
    
    public function page( $id ){
                          $category                = $this->product_model->db->where( 'id', $id )->get( 'menu' )->row_array();
                          $this->load->model('myconfig_model');
                          $listChildenMenuId   = $this->myconfig_model->Db_list_children_id( $category );
                          //$total               = $this->product_model->Db_count_list( $listChildenMenuId );
                          $data['list']        = $this->product_model->Db_list( $listChildenMenuId, $this->limit, $offset = 0 );
//                        $this->load->library('pagination');
//                        $config['base_url']   = base_url( $slug.'/page/');
//                        $config['total_rows'] = $total;
//                        $config['per_page']   = $this->limit;
//                        $config['last_link']  ='<i class="fa fa-fast-forward"></i>'; 
//                        $config['first_link'] ='<i class="fa fa-fast-backward"></i>';
//                        $config['next_link']  ='<i class="fa fa-step-forward"></i>';
//                        $config['prev_link']  ='<i class="fa fa-step-backward"></i>';
//                        $this->pagination->initialize($config);
//                        $data['pagination']  = $this->pagination->create_links();
                        $data['category']        = $category;
                        $data['title']       = $category['title'];
                        $data['keywords']    = $category['keywords'];
                        $data['description'] = $category['description'];
                        $data['product_feature'] = $this->product_model->Db_product_feature();
                        $data['arr_menu']   = $this->myconfig_model->Db_get_menu();
                        $menu               = $this->product_model->Db_get_Menu($category['id']);
                        $data['breadcrumb'] = breadcrumb($menu);
                        $data['link'] = createdlink($menu);
                        $data['tree_menu'] = $this->product_model->Db_get_TreeMenu($category);
                        $data['view'] = $this->action_view;
                        $this->load->view( $this->view, $data );  
    }
    
    public function detail($id = 0){
                          $product = $this->product_model->db->where( 'id', $id )->where( 'state',1 )->get('product')->row_array();
                          if( empty( $product ) ) redirect( 'error');
                          $data['item']        = $product;
                          $data['relationship']= $this->product_model->Db_list_relationship( $product['id'], $product['parent'] ); 
                          $data['title']       = $product['name'];
                          $data['keywords']    = $product['keywords'];
                          $data['description'] = $product['description'];
                          $menu                = $this->product_model->Db_get_Menu($product['parent']);
                          $data['breadcrumb']  = breadcrumb($menu);
                          $data['link'] = createdlink($menu);
                          $data['view'] = $this->action_view;
                          $this->load->view( $this->view, $data ); 
    }
    
    public function ajax_add_cart(){
                        if( $_POST ){
                             $id       = $this->input->post('id');
                             $quantity = 1;
                             $cart     = $this->session->userdata('cart');
                             if( $cart ){
                                 if( isset( $cart[ $id ] ) ){
                                     $cart[ $id ]['quantity'] = $cart[ $id ]['quantity'] + $quantity;
                                 }else{
                                    $cart[ $id ] = array( 'id'=>$id, 'quantity'=>$quantity );
                                 }
                             }else{
                                $cart = array( $id => array( 'id'=>$id, 'quantity'=>$quantity ) );
                             }
                             $this->session->set_userdata( 'cart', $cart );
                             $this->output
                                  ->set_content_type('application/json')
                                  ->set_output(json_encode(array('rt' => 'ok')));
                        }
    }
    
    public function cart(){
                       $add      = false;
                       $cart     = $this->session->userdata('cart');
                       $this->load->library('form_validation');
                       if( $_POST ){
                             if ($this->form_validation->run( 'addcart' ) == true ){
                                   $this->load->helper('string');
                                   $user['fullname'] =  strip_tags($this->input->post('fullname'));
                                   $user['phone']    =  strip_tags($this->input->post('phone'));
                                   $user['address']  =  strip_tags($this->input->post('address'));
                                   $user['message']  =  strip_tags($this->input->post('message'));
                                   $user['created_date']     = time();
                                   $user['code']             = random_string();
                                   $this->product_model->db->insert( 'cart', $user );
                                   foreach( $cart as $key => $val ){
                                       $this->product_model->db->insert( 'cart_product', array( 'cart_code'=>$user['code'], 'product_id'=>$val['id'], 'quantity'=>$val['quantity'] ) );
                                   }
                                   $this->session->unset_userdata('cart');
                                   $data['view'] = 'site/product/success_cart';
                                   $add = true;
                             }
                       }
                      if( $cart ){
                           $product_id = array();
                           foreach( $cart as $key => $val ){
                               $product_id[]  = $key;
                           }
                           $data['list'] = $this->product_model->db->select('id,name,slug,parent,avatar,giaban,giakhuyenmai,hidden_price')->where_in('id',$product_id)->get('product')->result_array();
                           $data['cart'] = $cart;
                       }
                       $data['title']       = '';
                       $data['keywords']    = '';
                       $data['description'] = '';
                       $data['view'] = $this->action_view;
                       $this->load->view( $this->view, $data ); 
    }
}