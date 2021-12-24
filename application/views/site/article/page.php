
<article class="row categoryArticle">
  <div class="col-md-12"><?php echo $breadcrumb; ?></div>
  <div class="col-md-12">
    <?php if (!empty($category['heading_h1'])): ?>
      <h1 class="box_content_tt title_p"><?php echo $category['heading_h1']; ?></h1>
    <?php endif ?>
  </div>
  <?php $this->load->view('site/ads/title'); ?>
  <div class="col-md-12">
    <?php echo $category['content']; ?>
  </div>
   
  <div class="col-md-12">
    <section>
      <?php if (isset($lich)): ?>
        <?php echo $lich; ?>
      <?php endif ?>
    </section>
  </div>
  <?php if( !empty($congcu) ): ?>
  <div class="col-md-12 list_congcu">
    <ul>
      <?php foreach( $congcu as $val ): 
                $link_congcu =  base_url($val['slug'].'.html');
      ?>
       <li>
         <a href="<?php echo $link_congcu;?>">
            <img src="<?php echo base_url('media/images/menu/'.$val['avatar']);?>" alt="<?php echo $val['name'];?>" />
         </a>
         <h3 class="title_h3"><a href="<?php echo $link_congcu;?>"><?php echo $val['name'];?></a></h3>
         <p>
           <?php echo $val['content'];?>
         </p>
       </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endif; ?>
</article>
<section class="row listArticlePage">
  <div class="col-md-12 col-sm-12">
    <h2 class="box_content_tt title_p"">Danh mục tin tức <?php echo $category['name']; ?></h2>
  </div>
  <div class="col-md-12 col-sm-12">
    <div class="row boxListArticlePage">
      <?php if (!empty($list_article)): ?>
        <?php foreach ($list_article as $key => $value): ?>
          <?php
            $link = base_url($value['slug'].'-A'.$value['id'].'.html'); 
            $summary = $value['summary'];
            $image_article = base_url('media/images/article/'.$value['id'].'/'.$value['avatar']);
            $name = $value['name'];
          ?>
          <section class="col-md-12 col-sm-12">
            <div class="minibox clearfix">
              <div class="boxLeft">
                <a href="<?php echo $link; ?>"><img src="<?php echo $image_article; ?>"></a>
              </div>
              <div class="boxRight">
                <p class="title_p"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></p>
                <p><?php echo $summary; ?></p>
              </div>
            </div>
          </section>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>
  <div class="col-md-12 col-sm-12">
    <?php echo $pagination; ?>
  </div>
  <div class="col-md-12">
    <?php if (isset($getComment) and $getComment): ?>
        <?php echo $getComment; ?>
    <?php endif ?>
  </div>
</section>