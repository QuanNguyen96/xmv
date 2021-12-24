<link rel="stylesheet" href="<?php echo base_url('templates/site/css/boibai.css');?>" />
<style type="text/css">
  .oneMagicItem{ margin-bottom: 10px;padding: 10px;border: 1px solid #ddd;border-radius: 5px; }
  .oneMagicItem .la_bai{ float: left;margin-right: 10px; }
  .oneMagicItem img{  }
</style>
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_content box_xvm block_boibai thoivan">
    <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1'); ?>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <p>Hãy nhập đầy đủ thông tin của bạn vào để có kết quả tốt nhất</p>
    <div class="col-md-12 field">
         <h2 style="text-align:center;font-size:20px;color:#F00;">Bói Bài Tây 32 Lá . Thành Tâm Chọn 3 Lá Bài Ưng Ý</h2>
         <div id="buoc_1">
           <?php for( $i=0; $i<32; $i++): ?>
           <div class="xap_bai" ></div>
           <?php endfor;?>
         </div>
         
         <div id="buoc_2">
            <h2 style="text-align:center;">Ba lá bài đã được chọn xong ! ngươi có chắc chắn với lựa chọn của mình không ?</h2>
		        <button id="btn_xem" class="md_nut_bam" style="width: 334px;height: 40px;line-height: 32px;">Chắc Chắn! Tôi Muốn Xem Ý Nghĩa</button>
         </div>
         
         <div style="text-align: center;">
             <div class="la_bai" title="1" style="display:none"></div>
             <div class="la_bai" title="2" style="display:none"></div>
             <div class="la_bai" title="3" style="display:none"></div>
         </div>
         <section class="kqXbbTv">.</section>
         <section class="" id="boi_bai_tbl">
            <?php foreach( $labai as $key => $val ): ?>
              <div class="oneMagicItem">
                <div class="clearfix">
                  <div class="la_bai" style="box-shadow: rgb(182, 203, 1) 0px 0px 10px;"><img src="<?php echo base_url('templates/site/images/'.$val['img']);?>"/></div>
                  <p><?php echo $val['luan'];?></p>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="xemthem">
              <div class="row">
                <div class="col-md-12">
                  <div class="dieuhuong_tu_vi_2020">
                    <a href="<?php echo base_url('xem-tu-vi-nam-2021.html'); ?>" class="nut_ban_repon">BÓI THỜI VẬN NĂM 2021</a>
                    <a href="<?php echo base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html'); ?>" class="nut_ban_repon">BÓI THỜI VẬN NĂM 2020</a>
                    <a href="<?php echo base_url('xem-boi-so-dien-thoai.html'); ?>" class="nut_ban_repon">Bói SIM</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-center" style="margin-bottom: 14px;">
                  <a class="md_nut_bam btn_delete_first" href="<?php echo current_url();?>">Xóa và xem lại từ đầu</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center" style="margin-bottom: 14px;">
                  <a class="md_nut_bam btn_load_againt" href="<?php echo current_url();?>">Xem cho người khác</a>
                </div>
              </div>
            </div>
         </section>
         
         <div class=""></div>
    
    </div>
    <div class="cclienquan col-md-12">
      <style>
        .text-white{
          color: #fff;
        }
        .text-yellow{
          color: yellow;
        }
        .imgboibai img{
          max-width: 100%;
        }
      </style>
      <div class="text-white"><b>CÔNG CỤ BÓI LIÊN QUAN</b></div>
      <div class="text-yellow"><a class="text-yellow" href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>"><b>Xem bói bài hàng ngày</b></a> <b>- Dự báo những điều sắp xảy đến với bạn trong 24h tới</b></div>
      <div class="field hangngaybutton bbnh_ok">
      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12">
         <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>?gioitinh=nam&sl=14" class="button btn_xao_bai" style="padding: 5px 7px;width: 179px;height: 41px;text-decoration: none;color: #fff48e;text-transform: uppercase;font-weight: bold;line-height: 32px;font-size: 16px;">Nam xáo 7 lần</a>
       </div>
       <div class="col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12">
         <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>?gioitinh=nu&sl=18" class="button btn_xao_bai" style="padding: 5px 7px;width: 179px;height: 41px;text-decoration: none;color: #fff48e;text-transform: uppercase;font-weight: bold;line-height: 32px;font-size: 16px;">Nữ xáo 9 lần</a>
       </div>
    </div>
      <div class="imgboibai">
        <img src="<?php echo base_url('templates/site/images/Capture.png'); ?>" alt="">
      </div>
      <br>
      <div class="text-yellow"><a class="text-yellow" href="<?php echo base_url('xem-boi-bai-tinh-yeu.html'); ?>"><b>Xem bói bài tình yêu</b></a> <b>- Biết ngay diễn biến tình cảm của bạn trong tương lai gần!!!</b></div>
      <div class="text-center imgboibai">
        <a href="<?php echo base_url('xem-boi-bai-tinh-yeu.html?click=true'); ?>">
          <img src="<?php echo base_url('templates/site/images/imgtinhyeu.PNG'); ?>" alt="">
        </a>
      </div>
    </div>
    <div class="field">
      <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
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
</div>
<?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
<div class="box_content">
        <div class="box_content_tt1">
          Các công cụ Xem bói - Tử vi liên quan
        </div>
        <div class="col-md-4 col-xs-6">
            <a href="<?php echo base_url('boi-bai-hang-ngay.html'); ?>">
                <div class="text-center">
                      <div class="thumbnail">
                        <img src="<?php echo base_url('templates/site/images/anhdaidien/hang-ngay.jpg'); ?>" alt="">
                      </div>
                      <div>Bói bài hàng ngày</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xs-6">
            <a href="<?php echo base_url('xem-boi-ngay-sinh.html'); ?>">
                <div class="text-center">
                        <div class="thumbnail">
                            <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ngay-sinh.jpg'); ?>" alt="">
                        </div>
                        <div>Xem bói ngày sinh</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-tinh-yeu-theo-ngay-sinh.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-tinh-yeu.jpg'); ?>" alt="">
                </div>
                <div>Xem bói tình yêu</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('tu-vi-hang-ngay.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/tu-vi-hang-ngay-2.jpg'); ?>" alt="">
                </div>
                <div>Tử vi hàng ngày</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-theo-ten.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/xem-boi-ten.jpg'); ?>" alt="">
                </div>
                <div>Xem bói theo tên</div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-xs-6">
          <a href="<?php echo base_url('xem-boi-not-ruoi-tren-co-the.html'); ?>">
            <div class="text-center">
                <div class="thumbnail">
                  <img src="<?php echo base_url('templates/site/images/anhdaidien/not-ruoi-chuan.jpg'); ?>" alt="">
                </div>
                <div>Xem bói nốt ruồi</div>
            </div>
          </a>
        </div>
    </div>
<script type="text/javascript">
$(function(){
	$(".la_bai").hide();
	});
var la_ing = 0;
$(".xap_bai").click(function(){
	la_ing+=1;
	if($(this).attr("title")!="1")
	{
		$(this).fadeOut(300);
	}
	$('.la_bai[title="'+la_ing+'"]').fadeIn();
	if(la_ing==3)
	{
		$("#buoc_1,#mo_dau_boi_bai").remove();
		$("#buoc_2").fadeIn(500);
		setInterval(rand_an_hien,500);
	}
});
$("#btn_xem").click(function(){
  $('#boi_bai_tbl').fadeIn(500);
  $('.la_bai').fadeIn();

  var x=$('.kqXbbTv').offset();
  var height_x=x.top;
  $("html, body").animate({scrollTop:height_x},1);
});
function show_kq(data,status)
{
	$("#boi_bai_tbl").html(data);
}
function rand_an_hien()
{
	$(".la_bai").css("box-shadow","0px 0px 10px rgb("+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+")");
}
</script>
