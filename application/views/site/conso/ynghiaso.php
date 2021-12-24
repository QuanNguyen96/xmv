<article class="row categoryArticle">
    <?php if (isset($breadcrumb)): ?>
        <div class="col-md-12"><?php echo $breadcrumb; ?></div>
    <?php endif ?>

    <?php if (isset($name) && $name != null): ?>
        <div class="col-md-12 box_content_tt text-uppercase">
            <h1 style="font-size: 25px;margin:0;padding:14px 0"><?php echo $name; ?></h1>
        </div>
    <?php endif ?>

    <?php if (isset($text) && $text != null): ?>
        <div class="col-md-12 txt_top_bot">
            <?php echo $text; ?>
        </div>
    <?php endif ?>

    <div class="col-md-12">
        <?php $this->load->view('site/import/form_ynghiaso'); ?>
    </div>
    
    <?php if (isset($text_foot) && $text_foot != null): ?>
        <div class="col-md-12 txt_top_bot">
            <?php echo $text_foot; ?>
        </div>
    <?php endif ?>
    <?php $this->load->view('site/conso/cclq_y_nghia_so');?> 
</article>