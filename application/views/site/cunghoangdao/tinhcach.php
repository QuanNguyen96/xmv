 <div class="">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class=" clearfix">
    <div class="">
        <h1 class="cunghoangdao_heading"><?php echo $this->my_seolink->get_name(); ?></h1>
        <?php $this->load->view('site/adsen/code1');?>
        <div class="field clearfix">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
        <div class="list_cung">
        	<div class="row">
        		<?php foreach ($list_cung_name as $key => $value): 
                         $slug = $cung_hoang_dao_tinh_cach[$key];
                         $link = base_url($slug);   
                ?>
                <div class="col-md-2 col-xs-3 list_cung_item">
        			<a href="<?php echo $link;?>" class="">
        				<img src="<?php echo base_url('templates/site/images/cunghoangdao/tinhcach/'.$key.'.png');?>" alt="<?php echo $value;?>" title="<?php echo $value;?>">
        				<p class="cung_title"><?php echo $value;?></p>
        				<p class="cung_ngay"><?php echo $list_cung_ngay[$key];?></p>
        			</a>
        		</div>
                <?php endforeach ?>
        	</div>
        </div>
        <div class="cung_hoang_dao_text">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
        </div>
    </div>
</div>            