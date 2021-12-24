<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <form name="search_xem_tuoi_hop_lam_an" action="" method="post" onsubmit="send_form_xem_tuoi_hop_lam_an();return false;">
       	<div class="field clearfix">
         	<div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-6">
            	<label>Năm sinh (DL):</label>
        	</div>
        	<div class="col-md-3 col-sm-3 col-xs-6">
	            <?php
	                echo include_select_not_act('namsinh');
	            ?>
        	</div>
       </div>
       <div class="field field_center clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="submit" class="button" name="check">Xem kết quả</button>
          </div>
       </div>
    </form>
    
    <div class="field">
      	<div class="col-md-12">
        	<?php if (isset($submit_form)): ?>
				<div id="result">
					<section class="row">
						<div class="col-md-12 col-sm-12">
							<div class="panel panel-success">
						      <div class="panel-heading"><p class="text-center"><label>Hợp các tuổi nam</label></p></div>
						      <div class="panel-body">
						      	<?php //dd($send_namhop); ?>
						      	<?php if (!empty($send_namhop)): ?>
						      		<table class="table table-striped table-bordered table-hover">
							      		<thead>
					      					<tr class="success">
												<th style="text-align:center;">Năm sinh nam</th>
												<th style="text-align:center;">Mệnh</th>
												<th style="text-align:center;">Thiên can</th>
												<th style="text-align:center;">Địa chi</th>
												<th style="text-align:center;">Cung mệnh</th>
												<th style="text-align:center;">Niên mệnh năm sinh</th>
												<th style="text-align:center;">Điểm</th>
											</tr>
					      				</thead>
					      				<tbody>
					      					<?php foreach ($send_namhop as $key => $value): ?>
						      					<tr class="">
												   <td class="alt2" style="vertical-align: middle;"><b><span style="color:#FF0066"><u><?php echo $value['namhop'] ?></u></span></b></td>
												   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_menh_vochong']; ?></span></td>
												   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_thiencan_vochong']; ?></span></td>
												   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_diachi_vochong']; ?></span></td>
												   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_cungkham_vochong']; ?></span></td>
												   <td class="alt2"><?php echo $value['info']['show_thienmenh_vochong']; ?></td>
												   <td class="alt2" style="vertical-align: middle;text-align:center;"><b><span style="color:#FF0066"><?php echo $value['info']['total_scores']; ?></span></b></td>
												</tr>
							      			<?php endforeach ?>
							      		
							      		</tbody>
						      		</table>
						      	<?php endif ?>
						      </div>
						    </div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="panel panel-success">
						      <div class="panel-heading"><p class="text-center"><label>Hợp các tuổi nữ</label></p></div>
						      <div class="panel-body">
						      	<?php if (!empty($send_nuhop)): ?>
						      		<table class="table table-striped table-bordered table-hover">
							      		<thead>
					      					<tr class="success">
												<th style="text-align:center;">Năm sinh nữ</th>
												<th style="text-align:center;">Mệnh</th>
												<th style="text-align:center;">Thiên can</th>
												<th style="text-align:center;">Địa chi</th>
												<th style="text-align:center;">Cung mệnh</th>
												<th style="text-align:center;">Niên mệnh năm sinh</th>
												<th style="text-align:center;">Điểm</th>
											</tr>
					      				</thead>
					      				<tbody>
							      		<?php foreach ($send_nuhop as $key => $value): ?>
					      					<tr class="">
											   <td class="alt2" style="vertical-align: middle;"><b><span style="color:#FF0066"><u><?php echo $value['namhop'] ?></u></span></b></td>
											   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_menh_vochong']; ?></span></td>
											   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_thiencan_vochong']; ?></span></td>
											   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_diachi_vochong']; ?></span></td>
											   <td class="alt2"><span style="color:#0000CC"><?php echo $value['info']['show_cungkham_vochong']; ?></span></td>
											   <td class="alt2"><?php echo $value['info']['show_thienmenh_vochong']; ?></td>
											   <td class="alt2" style="vertical-align: middle;text-align:center;"><b><span style="color:#FF0066"><?php echo $value['info']['total_scores']; ?></span></b></td>
											</tr>
							      		<?php endforeach ?>
							      		</tbody>
						      		</table>
						      	<?php endif ?>
						      </div>
						    </div>
						</div>
					</section>
				</div>
			<?php endif ?>
      	</div>
    </div>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
</div>
<script type="text/javascript">
  	function send_form_xem_tuoi_hop_lam_an() {
      	var frm = document.search_xem_tuoi_hop_lam_an;
      	var namsinh  = frm.namsinh.value;
      	var nam   = $('.myinput option:selected').text();
      	window.location.href = "<?php echo base_url('xem-tuoi-lam-an/tuoi-"+namsinh+"-sinh-nam-"+nam+"-hop-lam-an-voi-tuoi-nao');?>.html";
  	}
</script>










