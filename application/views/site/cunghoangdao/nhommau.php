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
         <?php $this->load->view('site/import/form_cung_hoang_dao_nhom_mau');?>
        <div class="chd_hop_nhau">
            <h3 class="chd_hop_nhau_tt">Khám phá nhóm máu 12 cung hoàng đạo</h3>
        	<div class="row">
        		<?php foreach ($list_cung_name as $key => $value): ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="chd_hop_nhau_item">
                            <div class="row chd_hop_nhau_item_1">
                                <div class="col-md-3 col-xs-3 chd_hop_nhau_item_img">
                                     <img src="<?php echo base_url('templates/site/images/cunghoangdao/nhommau/'.$key.'.png');?>" alt="<?php echo $value;?>" title="<?php echo $value;?>">
                                </div>
                                <div class="col-md-9 col-xs-9 chd_hop_nhau_item_tt">
                                    <p><?php echo 'Cung '.$value; ?></p>
                                    <p><?php echo '('.$list_cung_ngay[$key].')'; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                 <?php foreach ($list_nhom_mau as $key1 => $value1): 
                                          $slug = cung_hoang_dao_nhom_mau($key.','.$key1);
                                          $link = base_url($slug);
                                 ?>
                                     <div class="col-md-6 col-xs-6 chd_hop_nhau_item_it chd_nhom_mau_item_it">
                                         <div class="row">
                                         	<a href="<?php echo $link;?>">
	                                         	<div class="col-md-4 col-xs-4">
	                                         		<img src="<?php echo base_url('templates/site/images/cunghoangdao/nhommau/icon/'.$key1.'.jpg'); ?>" alt=" ">
	                                         	</div>
	                                         	<div class="col-md-8 col-xs-8 chd_nhom_mau_item_ct_2">
	                                         		<?php echo $value.'<br/> Nhóm máu '.$value1;?>
	                                         	</div>
	                                         </a>
                                         </div>
                                     </div>
                                 <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
        	</div>
        </div>
        <div class="cung_hoang_dao_text">
            <?php echo $this->my_seolink->get_text_foot(); ?>
        </div>
    </div>
</div>            