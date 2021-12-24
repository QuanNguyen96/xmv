<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
                    /** VALIDATE đăng nhập **/
                 'login' => array(
                                       array(
                                                'field' => 'email',
                                                'label' => 'Email',
                                                'rules' => 'trim|required|valid_email',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống.',
                                                                    'valid_email' => '%s không đúng định dạng',
                                                                  )
                                                
                                            ),  
                                            
                                       array(
                                                'field' => 'password',
                                                'label' => 'Mật khẩu',
                                                'rules' => 'trim|required|min_length[6]|max_length[12]',
                                                'errors' => array(
                                                                     'required'    => '%s không được để trống.',
                                                                     'min_length'  => '%s phải có số ký tự tối thiểu là 6',
                                                                     'max_length'  => '%s có số ký tự tối đa là 12'
                                                                  )
                                                
                                            ),       
                                 
                                 ),
                
               'change_password' => array(   
                                            
                                       array(
                                                'field' => 'password',
                                                'label' => 'Mật khẩu hiện tại',
                                                'rules' => 'trim|required|min_length[6]|callback_password_check|md5',
                                                'errors' => array(
                                                                     'required'    => 'không được để trống %s',
                                                                     'min_length'  => '%s có số ký tự tối thiểu là 6',
                                                                     'password_check' => '%s không đúng'
                                                                  )
                                       ), 
                                       
                                       array(
                                                'field' => 'new_password',
                                                'label' => 'Mật khẩu mới',
                                                'rules' => 'trim|required|min_length[6]|md5',
                                                'errors' => array(
                                                                     'required'    => 'không được để trống %s',
                                                                     'min_length'  => '%s có số ký tự tối thiểu là 6',
                                                                  )
                                            ),    
                                            
                                     array(
                                                'field' => 'r_new_password',
                                                'label' => 'Nhập lại mật khẩu mới',
                                                'rules' => 'trim|required|md5|matches[new_password]',
                                                'errors' => array(
                                                                     'required'    => 'không được để trống %s',
                                                                     'matches'     => 'Nhập lại %s phải giống trường mật khẩu'
                                                                  )
                                            ),                  
                                 
                                 ), 
                                 
               'add_user' => array(
                                       array(
                                                'field' => 'email',
                                                'label' => 'Email',
                                                'rules' => 'trim|required|valid_email|is_unique[user.email]',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống.',
                                                                    'valid_email' => '%s không đúng định dạng',
                                                                    'is_unique'   => '%s đã tồn tại vui lòng chọn %s khác',
                                                                  )
                                                
                                            ),  
                                            
                                       array(
                                                'field' => 'password',
                                                'label' => 'Mật khẩu',
                                                'rules' => 'trim|required|min_length[6]|md5',
                                                'errors' => array(
                                                                     'required'    => '%s không được để trống.',
                                                                     'min_length'  => '%s phải có số ký tự tối thiểu là 6',
                                                                  )
                                                
                                            ),  
                                            
                                     array(
                                                'field' => 'r_password',
                                                'label' => 'Nhập lại mật khẩu',
                                                'rules' => 'trim|required|md5|matches[password]',
                                                'errors' => array(
                                                                     'required'     => '%s không được để trống.',
                                                                      'matches'     => '%s phải giống trường mật khẩu'
                                                                  )
                                                
                                            ), 
                                            
                                     array(
                                                'field' => 'fullname',
                                                'label' => 'Họ và tên',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống.',
                                                                  )
                                                
                                            ), 
                                     array(
                                                'field' => 'manage[]',
                                                'label' => 'Nhóm quản trị',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => 'Chưa chọn %s',
                                                                  )
                                                
                                            ),                           
                                 
                                 ),                                     
               'edit_user' => array(   
                                       array(
                                                'field' => 'password',
                                                'label' => 'Mật khẩu',
                                                'rules' => 'trim|min_length[6]|md5',
                                                'errors' => array(
                                                                     'min_length'  => '%s phải có số ký tự tối thiểu là 6',
                                                                  )
                                                
                                            ),  
                                            
                                     array(
                                                'field' => 'r_password',
                                                'label' => 'Nhập lại mật khẩu',
                                                'rules' => 'trim|md5|matches[password]',
                                                'errors' => array(
                                                                      'matches'     => '%s phải giống trường mật khẩu'
                                                                  )
                                                
                                            ), 
                                            
                                     array(
                                                'field' => 'fullname',
                                                'label' => 'Họ và tên',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống.',
                                                                  )
                                                
                                            ), 
                                     array(
                                                'field' => 'manage[]',
                                                'label' => 'Nhóm quản trị',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => 'Chưa chọn %s',
                                                                  )
                                                
                                            ),                           
                                 
                                 ),
               
               'edit_router' => array(   
                                            
                                       array(
                                                'field' => 'router_key',
                                                'label' => 'Router',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                     'required'    => 'không được để trống %s',
                                                                  )
                                       ), 
                                       
                                       array(
                                                'field' => 'router_result',
                                                'label' => 'Result',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                     'required'    => 'không được để trống %s',
                                                                  )
                                            ),    
                                                              
                                 
                                 ), 
                                 
               'add_article' => array(
                                       array(
                                                'field' => 'name',
                                                'label' => 'Tiêu đề',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ), 
                                        
                                        array(
                                                'field' => 'parent',
                                                'label' => 'Chuyên mục cha',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ),
                                                
                                        array(
                                                'field' => 'content',
                                                'label' => 'content',
                                                'rules' => 'trim',
                                                
                                            ),    
                                            
                                        array(
                                                'field' => 'follow',
                                                'label' => 'follow',
                                                'rules' => 'trim',
                                                
                                            ),   
                                         
                                        array(
                                                'field' => 'state',
                                                'label' => 'state',
                                                'rules' => 'trim',
                                                
                                            ), 
                                              
                                        array(
                                                'field' => 'keywords',
                                                'label' => 'keywords',
                                                'rules' => 'trim',
                                                
                                            ),  
                                      array(
                                                'field' => 'description',
                                                'label' => 'description',
                                                'rules' => 'trim',
                                                
                                            ), 
                                     array(
                                                'field' => 'title',
                                                'label' => 'title',
                                                'rules' => 'trim',
                                                
                                            ),
                                             
                                 
                                 ),                   
                                 
               'edit_article' => array(
                                       array(
                                                'field' => 'name',
                                                'label' => 'Tiêu đề',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ), 
                                        
                                        array(
                                                'field' => 'parent',
                                                'label' => 'Chuyên mục cha',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ),    
                                            
                                        array(
                                                'field' => 'slug',
                                                'label' => 'Đường dẫn',
                                                'rules' => 'trim|regex_match[/^[a-z0-9-]+$/]|callback_check_slug',
                                                'errors' => array(
                                                                    'regex_match' => '%s chỉ gồm các ký tự từ a-z, 0-9 và dấu -', 
                                                                    'check_slug'  => '%s đã tồn tại vui lòng chọn %s khác'
                                                                  )
                                                
                                            ),          
                                 
                                 ),  
                                 
             'add_product' => array(
                                       array(
                                                'field' => 'name',
                                                'label' => 'Tiêu đề',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ), 
                                        
                                        array(
                                                'field' => 'parent',
                                                'label' => 'Chuyên mục cha',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ),
                                            
                                        array(
                                                'field' => 'giaban',
                                                'label' => 'Giá bán',
                                                'rules' => 'trim|required|regex_match[/^[0-9.]+$/]',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                    'regex_match' => '%s không đúng định dạng tiền tệ',
                                                                  )
                                                
                                            ),
                                        array(
                                                'field' => 'giakhuyenmai',
                                                'label' => 'Giá khuyến mãi',
                                                'rules' => 'trim|regex_match[/^[0-9.]+$/]',
                                                'errors' => array(
                                                                    'regex_match' => '%s không đúng định dạng tiền tệ',
                                                                  )
                                                
                                            ),             
                                        array(
                                                'field' => 'content',
                                                'label' => 'content',
                                                'rules' => 'trim',
                                                
                                            ),    
                                            
                                        array(
                                                'field' => 'follow',
                                                'label' => 'follow',
                                                'rules' => 'trim',
                                                
                                            ),   
                                         
                                        array(
                                                'field' => 'state',
                                                'label' => 'state',
                                                'rules' => 'trim',
                                                
                                            ), 
                                              
                                        array(
                                                'field' => 'keywords',
                                                'label' => 'keywords',
                                                'rules' => 'trim',
                                                
                                            ),  
                                      array(
                                                'field' => 'description',
                                                'label' => 'description',
                                                'rules' => 'trim',
                                                
                                            ), 
                                     array(
                                                'field' => 'title',
                                                'label' => 'title',
                                                'rules' => 'trim',
                                                
                                            ),
                                             
                                 
                                 ), 
             
             'edit_product' => array(
                                       array(
                                                'field' => 'name',
                                                'label' => 'Tiêu đề',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ), 
                                        
                                        array(
                                                'field' => 'parent',
                                                'label' => 'Chuyên mục cha',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ),  
                                        
                                        array(
                                                'field' => 'giaban',
                                                'label' => 'Giá bán',
                                                'rules' => 'trim|required|regex_match[/^[0-9.]+$/]',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                    'regex_match' => '%s không đúng định dạng tiền tệ',
                                                                  )
                                                
                                            ),
                                        array(
                                                'field' => 'giakhuyenmai',
                                                'label' => 'Giá khuyến mãi',
                                                'rules' => 'trim|regex_match[/^[0-9.]+$/]',
                                                'errors' => array(
                                                                    'regex_match' => '%s không đúng định dạng tiền tệ',
                                                                  )
                                                
                                            ),       
                                            
                                        array(
                                                'field' => 'slug',
                                                'label' => 'Đường dẫn',
                                                'rules' => 'trim|regex_match[/^[a-z0-9-]+$/]|callback_check_slug',
                                                'errors' => array(
                                                                    'regex_match' => '%s chỉ gồm các ký tự từ a-z, 0-9 và dấu -', 
                                                                    'check_slug'  => '%s đã tồn tại vui lòng chọn %s khác'
                                                                  )
                                                
                                            ),          
                                 
                                 ),
             
             'add_menu' => array(
                                       array(
                                                'field' => 'name',
                                                'label' => 'Tiêu đề',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ),    
                                            
                                        array(
                                                'field' => 'module',
                                                'label' => 'Module',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ),  
                                        
                                        array(
                                                'field' => 'follow',
                                                'label' => 'follow',
                                                'rules' => 'trim',
                                                
                                            ),   
                                         
                                        array(
                                                'field' => 'state',
                                                'label' => 'state',
                                                'rules' => 'trim',
                                                
                                            ), 
                                              
                                        array(
                                                'field' => 'keywords',
                                                'label' => 'keywords',
                                                'rules' => 'trim',
                                                
                                            ),  
                                      array(
                                                'field' => 'description',
                                                'label' => 'description',
                                                'rules' => 'trim',
                                                
                                            ), 
                                     array(
                                                'field' => 'title',
                                                'label' => 'title',
                                                'rules' => 'trim',
                                                
                                            ),
                                    array(
                                                'field' => 'content',
                                                'label' => 'content',
                                                'rules' => 'trim',
                                                
                                            ),    
                                   array(
                                                'field' => 'router',
                                                'label' => 'router',
                                                'rules' => 'trim',
                                                
                                            ),
                                    array(
                                                'field' => 'filter_router',
                                                'label' => 'filter_router',
                                                'rules' => 'trim',
                                                
                                            ),                                                   
                                 
                                 ),                       
                                 
             'edit_menu' => array(
                                       array(
                                                'field' => 'name',
                                                'label' => 'Tiêu đề',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'required'    => '%s không được để trống',
                                                                  )
                                                
                                            ), 
                                            
                                        array(
                                                'field' => 'slug',
                                                'label' => 'Đường dẫn',
                                                'rules' => 'trim|required',
                                                'errors' => array(
                                                                    'regex_match'    => '%s không được để trống',
                                                                  )
                                                
                                            ),   
                                        
                                        array(
                                                'field' => 'follow',
                                                'label' => 'follow',
                                                'rules' => 'trim',
                                                
                                            ),   
                                         
                                        array(
                                                'field' => 'state',
                                                'label' => 'state',
                                                'rules' => 'trim',
                                                
                                            ), 
                                              
                                        array(
                                                'field' => 'keywords',
                                                'label' => 'keywords',
                                                'rules' => 'trim',
                                                
                                            ),  
                                      array(
                                                'field' => 'description',
                                                'label' => 'description',
                                                'rules' => 'trim',
                                                
                                            ), 
                                     array(
                                                'field' => 'title',
                                                'label' => 'title',
                                                'rules' => 'trim',
                                                
                                            ),
                                    array(
                                                'field' => 'content',
                                                'label' => 'content',
                                                'rules' => 'trim',
                                                
                                            ),
                                    array(
                                                'field' => 'router',
                                                'label' => 'router',
                                                'rules' => 'trim',
                                                
                                            ),
                                    array(
                                                'field' => 'filter_router',
                                                'label' => 'filter_router',
                                                'rules' => 'trim',
                                                
                                            ),                                                      
                                 
                                 ),    
                            
             'edit_khohang' => array(
                                array(
                                        'field'  => 'name',
                                        'label'  => 'Tên sản phẩm',
                                        'rules'  => 'trim|required',
                                        'errors' => array(
                                                           'required'   => '%s không được để trống.',
                                                         )

                                ),

                                array(

                                     'field'  => 'gianhap',
                                     'label'  => 'Giá nhập',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => '%s không được để trống.',
                                                      )

                                ),

                                array(

                                     'field'  => 'giaban',
                                     'label'  => 'Giá bán',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => '%s không được để trống.',
                                                      )

                                ),
                                
                                array(

                                     'field'  => 'size[]',
                                     'label'  => 'Size',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => '%s không được để trống.',
                                                      )

                                ),
                                
                                array(

                                     'field'  => 'soluong[]',
                                     'label'  => 'Số lượng',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => '%s không được để trống.',
                                                      )

                                ),
                                
                                array(

                                     'field'  => 'lohang',
                                     'label'  => 'Lô hàng',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => '%s chưa được chọn.',
                                                      )

                                ),

                                
                        ),   
                        
                      'edit_tags' => array(
                                array(
                                        'field'  => 'name',
                                        'label'  => 'Tên tag',
                                        'rules'  => 'trim|required',
                                        'errors' => array(
                                                           'required'   => '%s không được để trống.',
                                                         )

                                ),

                                array(

                                     'field'  => 'content',
                                     'label'  => 'Nội dung',
                                     'rules'  => 'trim',

                                ),

                                array(

                                     'field'  => 'title',
                                     'label'  => 'title',
                                     'rules'  => 'trim',

                                ),
                                
                                array(

                                     'field'  => 'keywords',
                                     'label'  => 'keywords',
                                     'rules'  => 'trim',

                                ),
                                
                                array(

                                     'field'  => 'description',
                                     'label'  => 'description',
                                     'rules'  => 'trim',

                                ),

                                
                        ),  
                        
                  'edit_slide' => array(
                                array(
                                        'field'  => 'name',
                                        'label'  => 'Tiêu đề',
                                        'rules'  => 'trim|required',
                                        'errors' => array(
                                                           'required'   => '%s không được để trống.',
                                                         )

                                ),

                                array(

                                     'field'  => 'link',
                                     'label'  => 'Đường link',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                           'required'   => '%s không được để trống.',
                                                      )

                                ),

                                array(

                                     'field'  => 'image',
                                     'label'  => 'Hình ảnh',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                           'required'   => '%s không được để trống.',
                                                      )

                                ),
                                
                                array(

                                     'field'  => 'orders',
                                     'label'  => 'orders',
                                     'rules'  => 'trim',

                                ),
                                
                                array(

                                     'field'  => 'state',
                                     'label'  => 'state',
                                     'rules'  => 'trim',

                                ),

                                
                        ), 
                        
                 'edit_manage' => array(
                                array(
                                        'field'  => 'name',
                                        'label'  => 'Tiêu đề',
                                        'rules'  => 'trim|required',
                                        'errors' => array(
                                                           'required'   => '%s không được để trống.',
                                                         )

                                ),

                                array(

                                     'field'  => 'link',
                                     'label'  => 'Link truy cập',
                                     'rules'  => 'trim|required|callback_check_link_access',
                                     'errors' => array(
                                                           'required'          => '%s không được để trống.',
                                                           'check_link_access' => '%s vượt quyền bạn được cấp phép',
                                                      )

                                ),
                                array(

                                     'field'  => 'state',
                                     'label'  => 'state',
                                     'rules'  => 'trim',

                                ),

                                
                        ),  
//                        |is_unique[config.name]
                'add_config' => array(
                                array(
                                        'field'  => 'name',
                                        'label'  => 'Name',
                                        'rules'  => 'trim|required|regex_match[/^[a-z0-9]+$/]',
                                        'errors' => array(
                                                           'required'   => '%s không được để trống.',
//                                                           'is_unique'  => '%s Đã tồn tại',
                                                           'regex_match' => '%s Chỉ bao gồm các ký tự a-z0-9'
                                                         )

                                ),

                                array(

                                     'field'  => 'type',
                                     'label'  => 'Type',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                           'required'          => '%s không được để trống.',
                                                      )

                                ),
                                array(

                                     'field'  => 'title',
                                     'label'  => 'Title',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                           'required'          => '%s không được để trống.',
                                                      )

                                ),
                                array(

                                     'field'  => 'config',
                                     'label'  => 'config',
                                     'rules'  => 'trim',

                                ),
                                array(

                                     'field'  => 'value',
                                     'label'  => 'value',
                                     'rules'  => 'trim',

                                ),  
                        ),
                        'edit_seolink' => array(
                                array(
                                        'field'  => 'link',
                                        'label'  => 'link',
                                        'rules'  => 'trim|required',
                                        'errors' => array(
                                                           'required'   => 'Link không được để trống.',
                                                         )

                                ),

                                array(

                                     'field'  => 'title',
                                     'label'  => 'title',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => 'Tiêu đề không được để trống.',
                                                      )

                                ),

                                array(
                                     'field'  => 'keywords',
                                     'label'  => 'keywords',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'   => 'Từ khóa không được để trống.',
                                                      )

                                ),

                                array(
                                     'field'  => 'description',
                                     'label'  => 'description',
                                     'rules'  => 'trim|required',
                                     'errors' => array(
                                                         'required'  =>'Mô tả không được để trống'
                                                      )
                                ),
                                
                                array(
                                     'field'  => 'text',
                                     'label'  => 'text',
                                     'rules'  => 'trim',
                                     'errors' => array(
                                                      )
                                ),
                                
                                 array(
                                     'field'  => 'name',
                                     'label'  => 'name',
                                     'rules'  => 'trim',
                                     'errors' => array(
                                                      )
                                )
                        ),              
                                           
    'boisim' => array(
        array(
            'field' => 'sosim',
            'label' => 'Số sim',
            'rules' => 'trim|required',
            'errors' => array('required' => 'Không được để trống %s', )),

        array(
            'field' => 'ngaysinh',
            'label' => 'Ngày sinh',
            'rules' => 'trim|required',
            'errors' => array('required' => 'Không được để trống %s', )),

        array(
            'field' => 'thangsinh',
            'label' => 'Tháng sinh',
            'rules' => 'trim|required',
            'errors' => array('required' => 'Không được để trống %s', )),
        array(
            'field' => 'namsinh',
            'label' => 'Năm sinh',
            'rules' => 'trim|required',
            'errors' => array('required' => 'Không được để trống %s', )),
        array(
            'field' => 'gioitinh',
            'label' => 'Giới tính',
            'rules' => 'trim|required',
            'errors' => array('required' => 'Không được để trống %s', )),
        array(
            'field' => 'giosinh',
            'label' => 'Giờ sinh',
            'rules' => 'trim|required',
            'errors' => array('required' => 'Không được để trống %s', )),

    ),

    'kiemtrasdt' => array(
            array(
                    'field'  => 'sosim',
                    'label'  => 'Số điện thoại',
                    'rules'  => 'trim|required|regex_match[/^(0[0-9]{9,10})$/]',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                       'regex_match' => '%s chưa đúng - Vui lòng nhập SĐT gồm 10/11 chữ số'
                                     )
                ),
        ),   
     'add_baiviettuvi' => array(
            array(
                    'field'  => 'link',
                    'label'  => 'Link bài viết',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'title',
                    'label'  => 'Tiêu đề',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'nam_sinh',
                    'label'  => 'Năm sinh',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'gioi_tinh',
                    'label'  => 'Giới tính',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'dia_chi',
                    'label'  => 'Chi năm sinh',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
        ), 
      'add_baivietxongdat' => array(
            array(
                    'field'  => 'link',
                    'label'  => 'Link bài viết',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'title',
                    'label'  => 'Tiêu đề',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'nam_sinh',
                    'label'  => 'Năm sinh',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'gioi_tinh',
                    'label'  => 'Giới tính',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
            array(
                    'field'  => 'dia_chi',
                    'label'  => 'Chi năm sinh',
                    'rules'  => 'trim|required',
                    'errors' => array(
                                       'required'   => 'Yêu cầu nhập %s',
                                     )
                ),
        ),                                                                                 
);                               