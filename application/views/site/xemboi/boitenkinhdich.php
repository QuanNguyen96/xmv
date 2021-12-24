<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm">
	<div class="box_content clearfix">
		<h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
		<?php $this->load->view('site/adsen/code1');?>
	<?php if (!$_POST): ?>
		<div class="field clearfix">
	      	<div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
	    </div>
	<?php endif ?>
 	
    <div class="text-center">
    	<p>Quý bạn vui lòng nhập đầy đủ thông tin để có kết quả chính xác nhất:</p>
    </div>
	<form method="post" action="" name="form_xem_boi_ten">
   		<div class="form-group">
   			<div class="col-md-5" align="right">
				<p><label class="form_title">Họ và tên:</label></p>
			</div>
			<div class="col-md-5">
				<?php
                   $nameguest = isset($_POST['nameguest']) ? $_POST['nameguest'] : '';
				?>
				<input type="text" name="nameguest" value="<?php echo $nameguest; ?>" placeholder="Nhập tên của bạn..." class="myinput"  required="" />
			</div>
   		</div>
		<div class="text-center clear">
			<div class="col-md-12">
				<input type="hidden" name="option" value="com_boi"/>
	           	<input type="hidden" name="view" value="aicap"/>
	           	<input type="hidden" name="Itemid" value="28"/>
	         	<button type="submit" class="button">Xem ngay</button>
			</div>
		</div>
	</form>
	</div>
	<?php if (isset($iframe) && !empty($iframe)): ?>
		<div class="box_aside_tt1 clear">Kết quả phép xem bói tên của quý bạn</div>
		<iframe src="<?php echo $iframe; ?>" frameborder="0" width="100%" height="930px"></iframe>
	<?php endif ?>
	<?php if ($_POST): ?>
		<div class="field clearfix" style="margin-top:15px;">
	    	<div class="col-md-12">
	    		<div class="dieuhuong2019 clearfix mgt0">
                    <?php $this->load->view('site/import/form_tv_2021'); ?>
                </div>
	    	</div>
	    </div>
		<div class="field clearfix">
	      	<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
	    </div>
	<?php endif ?>
	<?php if ($_POST): ?>
		<div class="field clearfix">
	      	<div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
	    </div>
	<?php endif ?>
	<div class="field clearfix">
        <div class="row">
            <div class="col-md-12">
                
                <?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>
            </div>
            <div class="col-md-12">
            	<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
            </div>
        </div>
    </div>
    
</div>