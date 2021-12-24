<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
    	<?php echo $this->my_seolink->get_text(); ?>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <div class="field" id="boxTool_new">
      	<div class="col-md-12">
      		<div class="text-center thumbnail">
      			<img src="<?php echo base_url('templates/site/images/khongminh.jpg'); ?>" alt="">
      		</div>
        	<section class="bgRightToolAllPage_toolnew">
        		<div class="gieoquekhongminh">
	                <div class="raque">
	                    <div id="hinhanhgieo" class="clearfix">
	                        <ul class="clearfix">
	                            <?php if( !empty($gieoque) ): 
	                                foreach( $gieoque as $key => $val ): 
	                                  $stt = $this->stt[$key];
	                                  $amduong = $val == 0 ? 'Dương' : 'Âm';
	                                ?>
	                            <li>
	                                <p><?php echo $stt;?></p>
	                                <p><img src="<?php echo base_url('templates/site/images/gieoquedoanso/'. $this->amduong[$val].'.jpg'); ?>"/>
	                                <p>
	                                <p><?php echo $amduong;?></p>
	                            </li>
	                            <?php endforeach; endif; ?>
	                        </ul>
	                    </div>
	                    <div class="hinhque">
	                    </div>
	                </div>
	                <div class="gieoxu">
	                    <div class="list_xu">
	                        <img src="<?php echo base_url('templates/site/images/gieoquedoanso/xuxapngua1.gif'); ?>" alt="Gieo quẻ đoán số" />
	                        <img src="<?php echo base_url('templates/site/images/gieoquedoanso/xuxapngua1.gif'); ?>" alt="Gieo quẻ đoán số" />
	                        <img src="<?php echo base_url('templates/site/images/gieoquedoanso/xuxapngua1.gif'); ?>" alt="Gieo quẻ đoán số" />
	                    </div>
	                    <div class="btng">
	                        <button id="btngieoque" type="button" onclick="gieoque();" ><?php echo $langieoque;?></button>
	                    </div>
	                </div>
	            </div>
	            <div class="ketquagieoque">
	            </div>
	            <div class="noidung"></div>
	            <div class="dieuhuong_tu_vi_2020 hidden">
	            	<a class="nut_ban_repon" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">XEM QUẺ ĐẦU NĂM 2021</a>
						<a class="nut_ban_repon" href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">XEM QUẺ ĐẦU NĂM 2022</a>
	            </div>
	            <div class="frm_tv_2020_hide hidden">
	            	<?php $this->load->view('site/import/form_tv_2021');?>
	            </div>
	            <style type="text/css">
	                .gieoquekhongminh{
	                margin: 50px auto;
	                text-align: center;
	                }
	                .gieoquekhongminh p{ text-align: center; }
	                .ketquagieoque{
	                width: 380px;
	                margin: 0px auto;
	                }
	                .gieoxu{
	                text-align: center;
	                }
	                .list_xu{
	                display:none;
	                }
	                #btngieoque{
	                margin:20px 0px;
	                }
	                #hinhanhgieo{
	                margin:10px 0px;
	                }
	                #hinhanhgieo ul{
	                    zoom: 1;
	                }
	                #hinhanhgieo ul:after{
	                    clear: both;

	                    content: ".";

	                    display: block;

	                    height: 0;

	                    line-height: 0;

	                    visibility: hidden;
	                }
	                #hinhanhgieo img{
	                margin:0px 5px;
	                }
	                #hinhanhgieo ul li{
	                display: inline-block;
	                list-style:none;
	                text-transform: uppercase;
	                font-size: 10px;
	                font-weight: bold;
	                width: auto;
	                float: left;
	                }
	                #hinhanhgieo ul li p:first-child{
	                color: #d714ef;
	                }
	                #hinhanhgieo ul li p:last-child{
	                color: #33af54;
	                }
	                #hinhanhgieo
	                .list_que{
	                width: 90px;
	                float: left;
	                text-align: center;
	                }
	                .divbien{
	                float:left;
	                }
	                .divbien img{
	                margin-top: 90px;
	                }
	                .binhluanque{
	                width:100%;
	                float:left;
	                }
	                .btng button, .btng a{
	                background: #23ce40;
	                padding: 5px 10px;
	                color: #fff;
	                border:1px solid #23ce40;
	                }
	            </style>
	            <script type="text/javascript">
	                function gieoque()
	                {	
	                	var text = $('#btngieoque').text();
				    	if (text == 'Nhận kết quả') {
				    		$('.tool-refer').removeClass('hidden');
				    	}
	                    $('.list_xu').show();
	                    $('#btngieoque').text('Đang gieo...');
	                    
	                    setTimeout(function(){
	                        ajax_gieoque();
	                         $('.list_xu').hide();
	                    }, 1000);
	                    
	                }
	                function ajax_gieoque()
	                {
	                    var url = window.location.href;
	                    $.ajax({
	                            url: url,
	                            type: 'POST', 
	                            dataType: 'json', 
	                            data:{url:url},
	                            beforeSend: function() {
	                            },
	                            success: function(data) {
	                                if( typeof data.hinhanhgieo != 'undefined' )
	                                      $('#hinhanhgieo').html(data.hinhanhgieo);
	                                if( typeof data.hinhque != 'undefined' )
	                                      $('.hinhque').html(data.hinhque);   
	                                if( typeof data.que != 'undefined' )
	                                $('.hinhque').append(data.que);
	                                      $('#btngieoque').text(data.btntext);
	                                if( typeof data.html_listque != 'undefined' )
	                                $('.ketquagieoque').append(data.html_listque);
	                                if( typeof data.noidung != 'undefined' ){
	                                	$('.noidung').append(data.noidung);
	                                	$('.dieuhuong_tu_vi_2020').removeClass('hidden');
	                                	$('.frm_tv_2020_hide').removeClass('hidden');
	                                }
	                                if( typeof data.gieolai != 'undefined' )
	                                $('.btng').html(data.gieolai);

	                            },
	                            error: function(e) {
	                                console.log(e)
	                            }
	                        });
	                }
	            </script>
        	</section>
      	</div>
    </div>
    <div class="field tool-refer hidden" style="clear: both;">
    	<div class="row">
	      	<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
	    </div>
	    <div class="alert alert-success" style="clear: both;">
	    	<p>
	    		- Phép Gieo Quẻ Khổng Minh chỉ giúp quý bạn đoán biết vận hung cát của mình trong ngày hôm nay mà thôi. Thế nên quý bạn cần khám phá <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>"><b>Bói tử vi trọn đời</b></a> để nắm bắt tài vận trong suốt cuộc đời của mình
	    	</p>
	    </div>
	    <div class="alert alert-success">
	    	<p>
	    		- Ngoài ra, quý bạn cần <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>"><b>Xem tử vi ngày hôm nay</b></a> Sự kết hợp của phép xem tử vi và phép gieo quẻ Khổng mInh sẽ giúp công việc trong ngày hôm nay của quý bạn thu được kết quả tuyệt vời nhất.
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
				url: '<?php echo base_url(); ?>site/tool_xamquanthanh/xinxam',
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
				url:'<?php echo base_url(); ?>site/tool_xamquanthanh/xinkeo',
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
				url:'<?php echo base_url(); ?>site/tool_xamquanthanh/xemnoidungque',
				data :{xamso : $('#soxam').val()},
				type:'post',
				dataType: 'json',
				success:function(data){
					$('#tbl_ketquagieo').removeClass('hidden');
					$('#tbl_ketquagieo').find('tr').remove();
					$('#form_gieoque').addClass('hidden');
					var html = '';

					    html += '<tr>';
						html += 	'<td>';
						html += 		'<center style = font-size:25px;font-weight:600 >Số ' + data.xam_so + ' - ' + data.vi_tri +'</center';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		'XÂM CHỮ';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center>' + data.xam_chu + '</center>';
						html += 	'</td>';
						html += '</tr>';

					    html += '<tr>';
						html += 	'<td class = lbl>';
						html += 		'DỊCH NGHĨA';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center>' + data.dich_nghia + '</center>';
						html += 	'</td>';
						html += '</tr>';

					    html += '<tr>';
						html += 	'<td class = lbl >';
						html += 		'LỜI BÀN';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td class= text_justify >';
						html += 		 data.loi_ban;
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<br/>Xâm đúng câu:';
						html += 	'</td>';
						html += '</tr>';

						html += '<tr>';
						html += 	'<td>';
						html += 		'<center><b><i>' + data.tho + '</i></b><center>';
						html += 	'</td>';
						html += '</tr>';

					$('#tbl_ketquagieo').addClass('width_30p');
					$('#tbl_ketquagieo').append(html);
				}
			});
		});
	});
</script>










