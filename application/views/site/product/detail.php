
<script type="text/javascript" src="<?php echo base_url('templates/site/js/jquery-ui.min.js');?>"></script>
<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
</script>    
<div class="container">
  <div class="row">
    <div class="col-md-12"><?php echo $breadcrumb; ?></div>
  </div>
  <div class="row">
     <article class="col-md-9">
          <div class="col-md-5 product_slide_show">
           <div class="content">
              <img src="<?php echo base_url('media/images/product/'.$item['id'].'/'.$item['avatar']);?>" class="" alt="<?php echo $item['name'];?>" />
           </div>
         </div>
         <div class="col-md-7 product_info">
           <div class="content">
              <h1><?php echo $item['name'];?></h1>
              <div class="product_price">
                 <p><span>Mã sản phẩm:</span> JE234</p>
                 <?php echo giaban($item); ?>
              </div>
              <div class="product_support">
                 <p>Hãy gọi ngay vào Hotline để được tư vấn trực tiếp về sản phẩm</p>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                    <img src="<?php echo base_url('templates/site/images/hotline002.png'); ?>" class="hidden-xs"/>
                    <p><a href="tel:+84962187999">0962.187.999</a></p>
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                    <img src="<?php echo base_url('templates/site/images/hotline002.png'); ?>" class="hidden-xs"/>
                    <p><a href="tel:+84962187999">0962.187.999</a></p>
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                    <img src="<?php echo base_url('templates/site/images/hotline002.png'); ?>" class="hidden-xs" />
                    <p><a href="tel:+84962187999">0962.187.999</a></p>
                 </div>
              </div>
              <div class="clearfix"></div>
              <div class="product_order">
                 <button type="button" onclick="datmua(<?php echo $item['id'];?>)">Đặt mua ngay</button>
              </div>
           </div>
         </div>
         <div class="clearfix"></div>
         <div class="col-md-12">
            <div id="tabs">
              <ul>
                <li><a href="#tabs-1">Thông tin sản phẩm</a></li>
                <li><a href="#tabs-2">Chi tiết sản phẩm</a></li>
                <li class="hidden-xs"><a href="#tabs-3">Hỏi đáp sản phẩm</a></li>
              </ul>
              <div id="tabs-1">
                <?php echo $item['content'];?>
              </div>
              <div id="tabs-2">
                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
              </div>
              <div id="tabs-3">
              </div>
            </div>
         </div>
     </article>
     <aside class="col-md-3">
        <?php if( !empty($relationship) ): ?>
        <div class="block_right">
           <div class="block_right_title">
             <h3><span>Sản phẩm tương tự</span></h3>
           </div>
           <div class="block_right_content">
              <?php foreach( $relationship as $val ): 
                       $url = base_url( $link.'/'.$val['slug'].'.html' );
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
</div>
<script type="text/javascript">
function datmua(id){
             $.ajax({
    			url: '<?php echo base_url('addCart'); ?>',
    			type: 'POST', 
    			dataType: 'json',
    			data: { id:id}, 
    			beforeSend: function() {
    			},
    			success: function(data) {
    			    window.location = '<?php echo base_url('dat-hang.html'); ?>';
    			},
    			error: function(e) {
    				console.log(e)
    			}
    		});
}
</script>