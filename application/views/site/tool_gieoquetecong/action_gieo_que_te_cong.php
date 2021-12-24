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
        		<div class="gieoquetecong">
	                <table class="">
	                    <thead>
	                        <tr>
	                            <th>Kim</th>
	                            <th>Mộc</th>
	                            <th>Thủy</th>
	                            <th>Hỏa</th>
	                            <th>Thổ</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>
	                                <div class="kim" id="cot1">
	                                </div>
	                            </td>
	                            <td>
	                                <div class="moc" id="cot2">
	                                </div>
	                            </td>
	                            <td>
	                                <div class="thuy" id="cot3">
	                                </div>
	                            </td>
	                            <td>
	                                <div class="hoa" id="cot4">
	                                </div>
	                            </td>
	                            <td>
	                                <div class="tho" id="cot5">
	                                </div>
	                            </td>
	                        </tr>
	                    </tbody>
	                    <tfoot>
	                        <tr>
	                            <td>Trắng</td>
	                            <td>Xanh</td>
	                            <td>Lam</td>
	                            <td>Đỏ</td>
	                            <td>Vàng</td>
	                        </tr>
	                        <tr class="img_gieoque">
	                            <td colspan="5">
	                                <img src="<?php echo base_url('templates/site/images/gieoquetecong/quay.gif'); ?>" alt="" title="" />
	                            </td>
	                        </tr>
	                        <tr>
	                            <td colspan="5" id="tdbtngqtc">
	                                <button type="button" onclick="gieoque();" id="btngieoque"><?php echo $solangieo; ?></button>
	                            </td>
	                        </tr>
	                    </tfoot>
	                </table>
	                <div class="ketquegieoquetecong"></div>
	                <div class="dieuhuong_tu_vi_2020 hidden">
							<a class="nut_ban_repon" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">GIẢI QUẺ ĐẦU NĂM 2021</a>
							<a class="nut_ban_repon" href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">GIẢI QUẺ ĐẦU NĂM 2022</a>
		            </div>
		            <div class="frm_tv_2020_hide hidden">
		            	<?php $this->load->view('site/import/form_tv_2021');?>
		            </div>
	            </div>
	            <style type="text/css">
	                .gieoquetecong table{
	                width:300px;
	                margin:0px auto;
	                text-align: center;
	                text-transform: uppercase;
	                font-size: 12px;
	                color: #f93da4;
	                } 
	                .gieoquetecong table thead th{
	                font-weight:normal !important;
	                text-align: center;
	                padding:5px 0px !important;
	                }
	                .gieoquetecong table tbody{
	                background: #ffeb88;
	                }
	                .gieoquetecong table tbody td{
	                height:200px;
	                padding:5px;
	                }
	                .gieoquetecong table tbody td>div{
	                width:50px;
	                height:100%;
	                float:left;
	                padding-top:20px;
	                }
	                .gieoquetecong table tbody td>div img{
	                margin:5px 0px;
	                }
	                .gieoquetecong table tfoot td{
	                padding:10px 0px !important;
	                }  
	                .kim{
	                background: #fff;
	                }
	                .moc{
	                background: #23ce40;
	                }
	                .thuy{
	                background: #2be2c9;
	                }
	                .hoa{
	                background: #fd4545;
	                }
	                .tho{
	                background: #c38923;
	                }
	                .img_gieoque{
	                display: none;
	                }
	                #tdbtngqtc a{
	                background: #23ce40;
	                padding: 5px 10px;
	                color: #fff;
	                }
	            </style>
	            <script type="text/javascript">
	                function gieoque()
	                {	var text = $('#btngieoque').text();
				    	if (text == 'Xem kết quả') {
				    		$('.tool-refer').removeClass('hidden');
				    	}
	                    $('.img_gieoque').show();
	                    $('#btngieoque').text('Ðang gieo...');
	                    setTimeout(function(){
	                        ajax_gieoque();
	                    }, 1000);
	                    
	                }
	                
	                function ajax_gieoque()
	                {
	                    var url = '<?php echo base_url('site/tool_gieoquetecong/gieoxu');?>';
	                    var url_post = window.location.href;
	                    $.ajax({
	                            url: url,
	                            type: 'POST', 
	                            dataType: 'json', 
	                            data:{url:url_post},
	                            beforeSend: function() {
	                            },
	                            success: function(data) {
	                              if( data.gieo == 'true' ) 
	                              { 
	                                  $('#cot1').append(data.cot1);
	                                  $('#cot2').append(data.cot2);
	                                  $('#cot3').append(data.cot3);
	                                  $('#cot4').append(data.cot4);
	                                  $('#cot5').append(data.cot5);
	                              }
	                              $('.img_gieoque').hide();
	                              if( typeof data.solangieo != 'undefined' )
	                                 $('#btngieoque').text(data.solangieo);
	                              if( typeof data.gieolai != 'undefined' )
	                                 $('#tdbtngqtc').html(data.gieolai); 
	                              if( typeof data.noidung != 'undefined' ){
	                              	$('.dataFoot').fadeIn();
	                                 $('.ketquegieoquetecong').html(data.noidung);    
	                                 $('.dieuhuong_tu_vi_2020').removeClass('hidden');
	                                 $('.frm_tv_2020_hide').removeClass('hidden');
	                              }
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
    <div class="field">
    	<style type="text/css">
    		.dataFoot{ display: none; }
    	</style>
      	<div class="col-md-12"><section class="dataFoot"><?php echo $this->my_seolink->get_text_foot(); ?></section></div>
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
    <div class="field tool-refer hidden" style="clear: both;">
    	<div class="alert alert-success">
    		<p>- Phép Gieo Quẻ Tế Công chỉ giúp quý bạn đoán biết vận hung cát của mình trong ngày hôm nay mà thôi. Thế nên quý bạn cần khám phá <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-tu-vi-tron-doi.html'); ?>"><b>Tử vi trọn đời</b></a> để nắm bắt tài vận trong suốt cuộc đời của mình</p>
    	</div>
    	<div class="alert alert-success">
    		<p>- Ngoài ra, quý bạn cần xem <span class="btn_nhaynhay"></span> <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>"><b>Tử vi cá nhân hàng ngày</b></a> Sự kết hợp của phép xem tử vi và phép gieo quẻ Tế Công sẽ giúp công việc trong ngày hôm nay của quý bạn thu được kết quả tuyệt vời nhất.</p>
    	</div>
		<?php $this->load->view('site/import/box_xinxam_gieoque'); ?>
    </div>
    <div class="field">
    	<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
    </div>
</div>










