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
        <div class="form_boi_cung_hoang_dao">
            <div class="row">
                <div class="col-md-7 col-centered">
                    <div class="form_boi_cung_hoang_dao_content">
                        <div>
                            <img src="<?php echo base_url('templates/site/images/cunghoangdao/frm_cung_hoang_dao_img.jpg'); ?>" alt=" ">
                        </div>
                        <div class="form_boi_cung_hoang_dao_title">Bói tình yêu các cung hoàng đạo</div>
                        <div>
                            <form action="" method="post" id="<?php echo 'cung_hoang_dao_hop_nhau_'.md5(time());?>" onsubmit="cung_hoang_dao_hop_nhau(this.id); return false;">
                                <select name="cung1">
                                    <?php foreach (cung_hoang_dao() as $key => $value): ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                                    <?php endforeach ?>
                                </select>
                                <select name="cung2">
                                    <?php foreach (cung_hoang_dao() as $key => $value): ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                                    <?php endforeach ?>
                                </select>
                                <button type="submit">Xem độ hợp</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chd_hop_nhau">
            <h3 class="chd_hop_nhau_tt">KHÁM PHÁ ĐỘ TƯƠNG HỢP 12 CUNG HOÀNG ĐẠO TRONG TÌNH YÊU</h3>
        	<div class="row">
        		<?php foreach ($list_cung_name as $key => $value): ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="chd_hop_nhau_item">
                            <div class="row chd_hop_nhau_item_1">
                                <div class="col-md-3 col-xs-3 chd_hop_nhau_item_img">
                                     <img src="<?php echo base_url('templates/site/images/cunghoangdao/hopnhau/'.$key.'.png');?>" alt="<?php echo $value;?>" title="<?php echo $value;?>">
                                </div>
                                <div class="col-md-9 col-xs-9 chd_hop_nhau_item_tt">
                                    <p><?php echo 'Cung '.$value; ?></p>
                                    <p><?php echo '('.$list_cung_ngay[$key].')'; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                 <?php foreach ($list_cung_name as $key1 => $value1): 
                                        $slug = cung_hoang_dao_hop_nhau($key.','.$key1);
                                        $link = base_url($slug);
                                 ?>
                                     <div class="col-md-6 col-xs-6 chd_hop_nhau_item_it">
                                         <a href="<?php echo $link; ?>">
                                             <?php echo $value.'<br/> và '.$value1;?>
                                         </a>
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