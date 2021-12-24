<?php if( $this->admin_auth->is_login() ): 
  $aside  = $this->admin_auth->get_menu();
  $module = $this->router->fetch_class();
  $html   = '';
  if(!empty( $aside ))
  {
    $html.='<ul>';
    foreach( $aside as $val )
    {
        if( $val['parent'] == 0 )
        {
            $class = $module == $val['name'] ? 'white' : ''; 
            $html.='<li><a href="'.base_url($val['url']).'">'.$val['icon'].$val['title'].'<i class="fa fa-caret-left '.$class.'" aria-hidden="true"></i></a>';
            $html.='<ul>';
            foreach( $aside as $val1 )
            {
                if( $val1['parent'] == $val['id'] )
                {
                  $html.='<li><a href="'.base_url($val1['url']).'">'.$val1['title'].'</a></li>';
                }
            }
            $html.='</ul></li>';
        }
        
    }
    $html.='</ul>';
  }
  $html = str_replace('<ul></ul>','',$html);
?>
<aside>
    <div class="box_left sidebal">
       <?php echo $html;?>
    </div>
</aside>
<?php endif;?>