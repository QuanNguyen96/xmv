<article class="detailArticle">
  <section>
    <header>
      <h1 class="box_content_tt title_p"><?php echo $item['name'] ?></h1>
    </header>
    <div>
      <?php echo $item['content'] ?>
    </div>
    <section class="row">
    	<div class="col-md-12 col-sm-12">
		    <div class="row boxListArticlePage">
		        <?php if (!empty($getListArticleTag)): ?>
					<?php foreach ($getListArticleTag as $key => $value): ?>
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
    </section>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (isset($getComment) and $getComment): ?>
                <?php echo $getComment; ?>
            <?php endif ?>

        </div>
    </div>
  </section>
</article>