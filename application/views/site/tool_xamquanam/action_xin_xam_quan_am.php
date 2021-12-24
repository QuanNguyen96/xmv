<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<style>
    .xem_ngay{
        width: 120px!important;
    }
</style>
<div class="box_content box_xvm clearfix">
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
				<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>/css/xamlinhxam.css">
				<center>
		            <img src="<?php echo public_url(); ?>/images/xamlinhxam/xamquanamtren.jpg">
		            <input type="hidden" id="soxam" name="soxam" value="<?php if(isset($_SESSION['xinxam'])){echo $this->session->userdata('xinxam');}else{echo 0;} ?>">
		            <p class="lbl_loaixam" style="text-align: center;">
		                <b><font>Quán Âm Linh Xâm</font></b>
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
		                        <td><img src="<?php echo public_url(); ?>/images/xamlinhxam/huong.gif"></td>
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
		                            <img src="" data-value="<?php if(isset($_SESSION['kq_langieo'])){$kq_langieo = $this->session->userdata('kq_langieo');$kq_langieo[0];} ?>" id="img_1" />
		                            <img src="" data-value="<?php if(isset($_SESSION['kq_langieo'])){$kq_langieo = $this->session->userdata('kq_langieo');echo $kq_langieo[1];} ?>" id="img_2" />
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
							<a class="nut_ban_repon" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">GIEO QUẺ ĐẦU NĂM 2021</a>
							<a class="nut_ban_repon" href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">GIEO QUẺ ĐẦU NĂM 2022</a>
		            </div>
		            <div class="frm_tv_2020_hide hidden">
		            	<?php $this->load->view('site/import/form_tv_2021');?>
		            </div>
					<!-- Tạo thêm theo yêu cầu của Trang 12/2/2018 -->
					
					<div class="form-nhanque clearfix hidden" style="background-color: #f7e6ec;">
			          	<form action="" method="POST">
			          		<br>
			              	<div class="text-center">
			                  	<i>Vui lòng Soạn tin nhắn theo cú pháp <b>DK PT1</b> gửi <b>5657</b> để lấy <b>Mã xác nhận</b>. Sau khi nhập <b>Mã</b>, ngay lập tức quý bạn sẽ nhận được kết quả luận giải quẻ chi tiết. </i>
			              	</div>
			              	<br>
			              	<div class="col-md-3">
			                  	<label>Mã xác nhận:</label>
			              	</div>
			              	<div class="col-md-6">
			                  	<input type="text" class="code" maxlength="50" name="code" value="" placeholder="Nhập mã xác nhận tại đây..." required="">
			              	</div>
			              	<div class="col-md-3 text-center">
			                  	<button class="shownoidung">Nhận kết quả</button>
			              	</div>
			          	</form>
			        </div>
					<!-- end -->
		        </center>
        	</section>
      	</div>
    </div>
    <div class="field tool-refer hidden clearfix">
    	<div class="field clearfix">
	      <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
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
				url: '<?php echo base_url(); ?>site/tool_xamquanam/xinxam',
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
				url:'<?php echo base_url(); ?>site/tool_xamquanam/xinkeo',
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
			$.ajax({
				url:'<?php echo base_url(); ?>site/tool_xamquanam/xemnoidungque',
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
						html += 		'<center>' + data.noi_dung + '</center>';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr class="show_nd">';
						html += 	'<td>';
						html += 		'<center>' + data.dich_nghia + '</center>';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr class="show_nd">';
						html += 	'<td>';
						html += 		'<center>' + data.giai_nghia + '</center>';
						html += 	'</td>';
						html += '</tr>';

					    html += '<tr class="show_nd">';
						html += 	'<td class = lbl >';
						html += 		data.ten_cung.toUpperCase();
						html += 	'</td>';
						html += '</tr>';

						html += '<tr class="show_nd">';
						html += 	'<td class= text_justify >';
						html += 		 '<b><i>'+data.nd_cung+'</i></b>';
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
<!-- xử lý form hập số điện thoại -->
<!-- <script>
    $(document).ready(function(){
    	$('.shownoidung').on('click',function(){
	        var code = $('.code').val();
	        var date_created = '<?php echo strtotime(date('j-n-Y')) ?>';
	        var url = window.location.href;
	        if (code == '') {
	            alert('Quý vị vui lòng nhập mã xác nhận!');
	        }else{
	          	$.ajax({
	              	url: '<?php echo base_url(); ?>' + 'ajax-check-code',
	              	type:'POST',
	              	dataType: 'json',
	              	data:{
	                	code: code,date:date_created,url:url,
	              	},
	              	success:function(response){
		                if (response.check == true) {
		              		$('.show_nd').removeClass('hidden');
							$('.form-nhanque').hide();
		                }else{
		                  	alert(response.mes);
		                }
	              	}
	          });
        }
        return false;
    	});
    });
</script> -->