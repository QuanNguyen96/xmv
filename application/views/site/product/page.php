<div class="container">
  <div class="row">
    <div class="col-md-12"><?php echo $breadcrumb; ?></div>
  </div>
  <div class="row">
    <article class="col-md-9 col-sm-9 col-xs-12 col-md-push-3">
       <div class="col-md-12">
         <h1 class="listHeading"><?php echo $category['name'];?></h1>
       </div>
       <div class="listProduct"> 
         <?php foreach( $list as $val ): 
                   $product_avatar = base_url('media/images/product/'.$val['id'].'/'.$val['avatar']);
                   $product_url = $this->my_config->get_url_menu($arr_menu,$val['parent']);
                   $product_url = base_url( $product_url.'/'.$val['slug'].'.html' );
           ?>
            <div class="col-md-3 col-sm-3 col-xs-6 product product_left">
               <div class="">
                  <a href="<?php echo $product_url;?>"><img src="<?php echo $product_avatar; ?>" /></a>
                  <p><a href="<?php echo $product_url;?>"><?php echo $val['name'];?></a></p>
                  <?php giaban($val,'','',true);?>
               </div>
            </div>
            <?php endforeach; ?>
        </div>   
    </article>
    <aside class="col-md-3 col-sm-3 col-xs-12 col-md-pull-9">
        <?php if( count($tree_menu) > 1 ):?>
        <div class="block_right tree_menu">
           <ul>
           <?php foreach( $tree_menu as $val ): 
                   $url = $this->my_config->get_url_menu($arr_menu,$val['id']);
                   $slt = '';
                   if( $val['id'] == $category['id'] ) $slt = 'selected';
           ?>
              <li class="<?php echo $slt; ?>"><a href="<?php echo base_url($url.'.html');?>"><?php echo $val['name'];?></a></li>
           <?php endforeach; ?>
           </ul>
        </div>   
        <?php endif;?>
        <?php if( !empty( $product_feature ) ): ?>
        <div class="block_right">
           <div class="block_right_title">
             <h3><span>Sản phẩm nổi bật</span></h3>
           </div>
           <div class="block_right_content">
               <?php foreach( $product_feature as $val ): 
                       $url = $this->my_config->get_url_menu($arr_menu,$val['parent']);
                       $url = base_url( $url.'/'.$val['slug'].'.html' );
               ?>   
                    <div class="splq_items">
                         <div class="col-md-5">
                           <a href="<?php echo $url;?>">
                            <img src="<?php echo base_url('media/images/product/'.$val['id'].'/'.$val['avatar']);?>" class="img-responsive" />
                           </a>
                          </div>
                          <div class="col-md-7">
                            <p><a href="<?php echo $url;?>"><?php echo $val['name'];?></a></p>
                            <?php giaban($val,'Giá bán','Giá KM:');?>
                          </div>
                      </div>
               <?php endforeach; ?>
           </div>
         </div> 
         <?php endif; ?> 
    </aside>
  </div>