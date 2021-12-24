<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      		<div class="text-center thumbnail">
      			<img src="<?php echo base_url('templates/site/images/dichso.png'); ?>" alt="">
      		</div>
        	<section class="bgRightToolAllPage_toolnew">
        		<section>
        			<style type="text/css">
					    .gieoquedichso{
					    margin: 50px auto;
					    text-align: center !important;
					    }
					    .gieoquedichso p{ text-align: center !important; }
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
					    #hinhanhgieo img{
					    margin:0px 5px;
					    }
					    .list_que{
					    width: 90px;
					    float: left;
					    text-align: center;
					    }
					    .divbien{
					    float:left;
					    }
					    .divbien img{
					    margin-top: 40px;
					    }
					    .binhluanque{
					    width:100%;
					    float:left;
					    padding:10px;
					    line-height:20px;
					    }
					</style>
					<script type="text/javascript">
					    function gieoque()
					    {	var text = $('#btngieoque').text();
					    	if (text == 'Nhận kết quả') {
					    		$('.tool-refer').removeClass('hidden');
					    		$('.dieuhuong_tu_vi_2020').removeClass('hidden');
					    		$('.showInternalLink').removeClass('hidden');
					    	}
					    	if (text == 'Gieo lại') {
					    		
					    		window.location.reload();
					    	}
					        $('.list_xu').show();
					        $('#btngieoque').text('Đang gieo...');
					        $('#hinhanhgieo').html('');
					        setTimeout(function(){
					            if (text != 'Gieo lại') {
					            	ajax_gieoque();
					            }
				             	$('.list_xu').hide();
					        }, 0000);
					        
					    }
					    function ajax_gieoque()
					    {
					        var url = '<?php echo base_url('site/tool_gieoque/gieoque_ajax');?>';
					        $.ajax({
					    			url: url,
					    			type: 'POST', 
					    			dataType: 'json', 
					    			data:{url:url},
					                beforeSend: function() {
					    			},
					    			success: function(data) {
					    			    $('#hinhanhgieo').html(data.hinhanhgieo);
					    			    $('.raque').append(data.que);
					                    $('#btngieoque').text(data.btntext);
					                    $('.ketquagieoque').append(data.html_listque);
					                    $('.binhluanque').append(data.html_que_text);
					    			},
					    			error: function(e) {
					    				console.log(e)
					    			}
					    		});
					    }
					</script>
				    <div class="gieoquedichso" style="text-align: center;">
				        <div class="raque">
				            <div id="hinhanhgieo"></div>
				            <?php if( !empty($gieoque) ): 
				                foreach( $gieoque as $val ): 
				                ?>
				            <p><img src="<?php echo base_url('templates/site/images/gieoquedoanso/'. $this->arr_gach[$val['mat_am']].'.gif'); ?>"/>
				            <p>
				                <?php endforeach; endif; ?>
				        </div>
				        <div class="gieoxu">
				            <div class="list_xu">
				                <img src="<?php echo base_url('templates/site/images/gieoquedoanso/xuxapngua.gif'); ?>" alt="Gieo quẻ đoán số" />
				                <img src="<?php echo base_url('templates/site/images/gieoquedoanso/xuxapngua1.gif'); ?>" alt="Gieo quẻ đoán số" />
				                <img src="<?php echo base_url('templates/site/images/gieoquedoanso/xuxapngua.gif'); ?>" alt="Gieo quẻ đoán số" />
				            </div>
				            <button id="btngieoque" type="button" onclick="gieoque();" ><?php echo $langieoque;?></button>
				        </div>
				    </div>
				    <div class="ketquagieoque clearfix">
				    </div>
				    <div class="binhluanque"></div>
				    <div class="showInternalLink hidden">
		            	<section class="cpnInternalLink">
		            		<a class="cst" href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>">BỐC QUẺ ĐẦU NĂM 2021</a>
							<a class="cst" href="<?php echo base_url('xem-boi-tu-vi-2022-cua-12-con-giap.html'); ?>">BỐC QUẺ ĐẦU NĂM 2022</a>
						</section>
		            </div>
				</section>
        	</section>
      	</div>
    </div>
    <div class="tool-refer hidden" style="clear: both;">
    	<div class="field">
      		<div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    	</div>
    	<div class="alert alert-success">
    		<p>
    			- Phép Gieo Quẻ Kinh Dịch đã giúp quý bạn biết được vận Cát - Hung của mình. Nhưng để có cái nhìn từ chi tiết đến tổng quan nhất về vận số của mình. Quý bạn cần kết hợp kết quả của phép gieo quẻ dịch số ở trên với kết quả của những phép xem tử vi sau đây:
    		</p>
    		<p>
    			<span class="btn_nhaynhay"></span> <a href="<?php echo base_url('xem-la-so-tu-vi.html'); ?>"><b>Lấy lá số tử vi có bình giải</b></a>để khám tự khám phá chi tiết về cuộc sống của mình
    		</p>
    		<p>
    			<span class="btn_nhaynhay"></span> <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>"><b>Xem Tử vi hàng ngày</b></a> nơi quý bạn khám phá tử vi ngày hôm nay của mình với kết quả chính xác nhất
    		</p>
    	</div>
		<?php $this->load->view('site/import/box_xinxam_gieoque'); ?>
    </div>
</div>
<div class="box_content">
	<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
</div>
<div class="box_content">
	<?php if (isset($getComment) and $getComment): ?>
        <?php echo $getComment; ?>
    <?php endif ?>
</div>










