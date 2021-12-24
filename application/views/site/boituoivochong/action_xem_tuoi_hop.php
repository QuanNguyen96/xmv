<section class="boxListContent">

	<div class="breadycrum">
        <ul class="breadcrumb">
          	<li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
          	<li><a href="<?php echo base_url($breadycrum_parent['slug'].'.html') ?>"><?php echo $breadycrum_parent['name'] ?></a></li>
          	<li class="active"><span><?php echo $item['name']; ?></span></li>
        </ul>
  	</div>

	<div class="boxTop_lc">

		<p><?php echo $name_tool; ?></p>

	</div>

	<div class="boxCenter_lc boxFormTool">

		<div class="row">

			<section class="col-md-5 col-sm-12">

				<?php $this->load->view('site/form_tool/form_'.$form);?>

				<div>

					

					<?php

						if ($is_child == 0) {

							echo $item['redirect_tool'];  	

						} 

					?>

				</div>

			</section>

			<section class="col-md-7 col-sm-12">

				<div class="rightFormTool">

					<?php

						if ($is_child == 0) {

							echo $item['content'];  	

						} 

						if ($is_child == 1) {

							echo $text;  	

						} 

					?>



				</div>

			</section>

		</div>

		<div class="row">

			<section class="col-md-12 col-sm-12">

				<?php if ($is_child == 1): ?>

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

			</section>

		</div>

		<div class="row">
            <div class="col-md-12">
                
                <?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>

            </div>
        </div>

	</div>

</section>

