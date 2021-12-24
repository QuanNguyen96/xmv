<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div>
    	<?php echo $this->my_seolink->get_text(); ?>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <div class="field" id="boxTool_new">
      	<div class="col-md-12">
        	<section class="bgRightToolAllPage_toolnew">
        		<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>/css/style_gieoque.css">
				<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>/css/xamtaquan.css">
	      		<center>
		            <img src="<?php echo public_url();?>/images/xamtaquan/xamtaquantren.jpg">
		            <input type="hidden" id="soxam" name="soxam" value="<?php if(isset($_SESSION['xinxamtaquan'])){echo $this->session->userdata('xinxamtaquan');}else{echo 0;} ?>">
		            <p class="lbl_loaixam" style="text-align: center;">
		                <b>Tướng Quân Linh Xâm</b>
		            </p>
		            <form action="" method="post" name="" id="form_gieoque">
		                <p style="text-align: center;">
		                    <b>
		                        <font>Hữu Cầu Tất Ứng<br>Đức Năng Thắng Số</font>
		                    </b>
		                </p>

		                <table id="tbl_xinxam">
		                    <tr>
		                        <td>
		                            <button id="btn_xinque" type="button"></button>
		                        </td>
		                    </tr>
		                    <tr>
		                        <td><img src="<?php echo public_url();?>/images/xamlinhxam/huong.gif"></td>
		                    </tr>
		                    <tr>
		                        <td><p>Xin Quí Vị Rửa Tay Rửa Mặt</p></td>
		                    </tr>
		                    <tr>
		                        <td><p>Thành Tâm Khấn Nguyện Điều Muốn Xin</p></td>
		                    </tr>
		                    <tr>
		                        <td><p>Và Chọn <b>Vòng Tròn Lưỡng Nghi</b> Để Xin Xâm</p></td>
		                    </tr>
		                </table>

		                <table id="tbl_xinkeo" class="hidden">
		                    <tr>
		                        <td>
		                            <span id="show_soxam">
		                            </span>
		                        </td>
		                    </tr>
		                    <tr class="hidden" id="tr_img_xinkeo">
		                        <td>
		                            <input type="hidden" id="gieo_tiep"  value="<?php if(isset($_SESSION['kq_langieo'])){echo 1;}else{echo 0;} ?>">
		                            <img src="" data-value="<?php if(isset($_SESSION['kq_langieo'])){$kq_langieo = $this->session->userdata('kq_langieo');echo $kq_langieo[0];} ?>" id="img_1" />
		                            <img src="" data-value="<?php if(isset($_SESSION['kq_langieo'])){$kq_langieo = $this->session->userdata('kq_langieo');echo $kq_langieo[1]; } ?>" id="img_2" />
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>
		                            <span class="xin_">Thành tâm xin keo trước khi xem lời giải đoán</span>
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>
		                            <input type="hidden" id="lan" name="lan" value="<?php if(isset($_SESSION['solan'])){echo $this->session->userdata('solan');}else{echo 0;} ?>">
		                            <button class="xin_" id="btn_xinkeo" type="button"></button>
		                            <button id="btn_noidung" class="hidden" type="button">Xem nội dung quẻ</button>
		                            <button class="hidden" id="out">Chưa xin được quẻ vui lòng thử lại</button>
		                        </td>
		                    </tr>
		                </table>
		            </form>

		            <table id="tbl_ketquagieo" class="hidden center-block">
		            </table>
		            <div class="dieuhuong_tu_vi_2020 hidden">
							<a class="nut_ban_repon" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">XIN QUẺ ĐẦU NĂM 2021</a>
							<a class="nut_ban_repon" href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">XIN QUẺ ĐẦU NĂM 2022</a>
		            </div>
		            <div class="frm_tv_2020_hide hidden">
		            	<?php $this->load->view('site/import/form_tv_2021');?>
		            </div>
		        </center>
        	</section>
      	</div>
    </div>
    <div class="field clearfix">
    	<style type="text/css">
    		.dataFoot{ display: none; }
    	</style>
      <div class="col-md-12"><section class="dataFoot"><?php echo $this->my_seolink->get_text_foot(); ?></section></div>
    </div>

    <div class="field tool-refer hidden">
    	<div class="alert alert-success" style="clear: both;">
    		<p>
    			- Ngoài việc xin xăm để cầu xin tốt lành cho công việc, quý bạn cũng cần biết ngày hôm nay của mình như thế nào. Mời quý bạn xem tài vận của mình tại <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-boi-bai-thoi-van.html'); ?>"><b>Xem bói bài thời vận</b></a>
    		</p>
    	</div>
    	<div class="alert alert-success" style="clear: both;">
    		<p>
    			- Để xem chi tiết công danh, tài lộc trong cuộc đời mình như thế nào, thì quý bạn hãy khám phá tại:  <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('can-xuong-tinh-so-doi-nguoi.html'); ?>"><b>Cân xương tính số đời người</b></a>
    		</p>
    	</div>
		<?php $this->load->view('site/import/box_xinxam_gieoque'); ?>
    </div>
    <div class="field">
        <div class="row">
            <div class="col-md-12">
                
                <?php if (isset($getComment) and $getComment): ?>
                    <?php echo $getComment; ?>
                <?php endif ?>

            </div>
        </div>
    </div>
    <div class="field">
    	<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
    </div>
</div>
<script type="text/javascript">
  	$(document).ready(function(){
		if($('#soxam').val() != 0){
			$('#tbl_xinkeo').removeClass('hidden');
			$('#tbl_xinxam').addClass('hidden');
			$('#show_soxam').text('Xâm số '+ $('#soxam').val());
		}

		if ($('#gieo_tiep').val() == 1) {
			$('#tr_img_xinkeo').removeClass('hidden');
			
			if($('#img_1').attr('data-value') == 1)
				$('#img_1').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/duong.png');
			
			if($('#img_1').attr('data-value') == 0)
				$('#img_1').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/am.png');

			if($('#img_2').attr('data-value') == 1)
				$('#img_2').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/duong.png');

			if($('#img_2').attr('data-value') == 0)
				$('#img_2').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/am.png');
			
			if ($('#img_1').attr('data-value') == 1 && $('#img_2').attr('data-value') == 0 ||
				$('#img_1').attr('data-value') == 0 && $('#img_2').attr('data-value') == 1 ){

				$('.xin_').addClass('hidden');
				$('#btn_noidung').removeClass('hidden');
			}
		}

		$('#btn_xinque').on('click',function(){
			$('#tbl_xinkeo').removeClass('hidden');
			$.ajax({
				url: '<?php echo base_url(); ?>site/tool_xamtaquan/xinxam',
				type: 'post',
				success:function(data){
					$('#soxam').val(data);
					$('#tbl_xinkeo').removeClass('hidden');
					$('#tbl_xinxam').addClass('hidden');
					$('#show_soxam').text('Xâm số '+ data);
				}
			});
		});

		var lan = parseInt($('#lan').val());
		$('#btn_xinkeo').on('click',function(){
			lan += 1;
			$('#lan').val(lan);
			$.ajax({
				url:'<?php echo base_url(); ?>site/tool_xamtaquan/xinkeo',
				type: 'post',
				data :{
					solan : lan,
				},
				dataType:'json',
				success:function(data){
					$('#tr_img_xinkeo').removeClass('hidden');
					$('#img_1').attr('data-value',parseInt(data[0]));
					if($('#img_1').attr('data-value') == 0)
						$('#img_1').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/am.png');
					if($('#img_1').attr('data-value') == 1)
						$('#img_1').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/duong.png');
					
					$('#img_2').attr('data-value',parseInt(data[1]))
					if($('#img_2').attr('data-value') == 0)
						$('#img_2').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/am.png');
					if($('#img_2').attr('data-value') == 1)
						$('#img_2').attr('src','<?php echo base_url(); ?>templates/site/images/xamlinhxam/duong.png');

					if ($('#img_1').attr('data-value') == 1 && $('#img_2').attr('data-value') == 0 ||
						$('#img_1').attr('data-value') == 0 && $('#img_2').attr('data-value') == 1 ){

						$('.xin_').addClass('hidden');
						$('#btn_noidung').removeClass('hidden');
					}

					if(data === 'false'){
						$('.xin_').addClass('hidden');
						$('#out').removeClass('hidden');
					}
				}
			});
		});

		$('#btn_noidung').click(function(){
			$('tbl_xemketqua').removeClass('hidden');
			$('.dataFoot').fadeIn('slow');
			$.ajax({
				url:'<?php echo base_url(); ?>site/tool_xamtaquan/xemnoidungque',
				data :{xamso : $('#soxam').val()},
				type:'post',
				dataType: 'json',
				success:function(data){
					$('#tbl_ketquagieo').removeClass('hidden');
					$('.dieuhuong_tu_vi_2020').removeClass('hidden');
					$('.frm_tv_2020_hide').removeClass('hidden');
					$('#form_gieoque').addClass('hidden');
					var html = '';

					    html += '<tr>';
						html += 	'<td>';
						html += 		'<center style = font-size:25px;font-weight:600 >Số ' + data.xam_so +'</center';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center style= width: 200px;height:300px><img style="padding-bottom:15px" src="../../' + data.url_img + '"></center>'
						html += 	'</td>';
						html += '</tr>';


						html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		data.ten_xam.toUpperCase();
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center>' + data.noi_dung + '</center>';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		'NGHĨA';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center>' + data.dich_nghia + '</center>';
						html += 	'</td>';
						html += '</tr>';

					    html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		'GIẢI';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center>' + data.giai_nghia + '</center>';
						html += 	'</td>';
						html += '</tr>';

					    html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		'Ý RẰNG';
						html += 	'</td>';
						html += '</tr>';

					    html += '<tr>';
						html += 	'<td class=text_justify>';
						html += 		data.y_nghia;
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		'LỜI BÀN';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td class= text_justify >';
						html += 		 '<b><i>'+data.loi_ban+'</i></b>,';
						html += 	'</td>';
						html += '</tr>';

					$('#tbl_ketquagieo').addClass('width_30p');
					$('#tbl_ketquagieo').append(html);
					$('.tool-refer').removeClass('hidden');
				}
			});
		});
	});
</script>










