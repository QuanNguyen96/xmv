<?php 
$arr_hoa_giap = array(
     1=> array('name'=>'Tý','slug'=>'ty'),
     2=> array('name'=>'Sửu','slug'=>'suu'),
     3=> array('name'=>'Dần','slug'=>'dan'),
     4=> array('name'=>'Mão','slug'=>'mao'),
     5=> array('name'=>'Thìn','slug'=>'thin'),
     6=> array('name'=>'Tỵ','slug'=>'ti'),
     7=> array('name'=>'Ngọ','slug'=>'ngo'),
     8=> array('name'=>'Mùi','slug'=>'mui'),
     9=> array('name'=>'Thân','slug'=>'than'),
     10=> array('name'=>'Dậu','slug'=>'dau'),
     11=> array('name'=>'Tuất','slug'=>'tuat'),
     12=> array('name'=>'Hợi','slug'=>'hoi'),
);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/css/xemlich_vesion_13_3_2020.css'); ?>">
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class=" clearfix col-md-12">
    <h1 class="heading_style_1"><?php echo $this->my_seolink->get_name(); ?></h1>
    <?php $this->load->view('site/adsen/code1');?>
    <div class="field">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
    </div>
    <div class="frm_tv_hang_ngay">
        <div>
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <label>Xem tử vi theo ngày:</label>
                </div>
                <form action="" name="frm_tvn_theo_ngay" id="frm_tvn_theo_ngay" method="post" onsubmit="tvn_theo_ngay(); return false;">
                  <div class="col-md-5 col-xs-8">
                    <input type="text" name="tvn_ngay" value="<?php echo $ngay_xem;?>" id="tvhn_ngay_input">
                  </div>
                  <div class="col-md-2 col-xs-4">
                     <input type="submit" name=""  value="Xem ngay">
                  </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <label>Tử vi hàng ngày theo tuổi:</label>
                </div>
                <form action="" name="frm_tvn_theo_tuoi" id="frm_tvn_theo_tuoi" method="post" onsubmit="tvn_theo_tuoi(); return false;">
                  <div class="col-md-5 col-xs-8">
                      <input type="text" name="tvn_ngay" value="<?php echo $ngay_xem;?>" id ="tvhn_ngay_input_1">
                      <select name="tvn_tuoi">
                        <?php foreach (list_age_text() as $key => $value): 
                        ?>
                          <option value="<?php echo $key; ?>"><?php echo $value;?></option>   
                        <?php endforeach ?>
                      </select>
                  </div>
                  <div class="col-md-2 col-xs-4">
                     <input type="submit" name="" value="Xem ngay">
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div class="tvhn_muc_luc content_body">
        <div class="content_mucluc">
            <div class="muc_luc" id="click_menu_1" onclick="clickmenu2('click_menu_1');">
                <div class="content_text">
                  <span class="text_mucluc">MỤC LỤC</span>
                </div>
            </div>
            <div class="muc_luc tbale_mucluc" id="click_menu_2" onclick="clickmenu2('click_menu_2');">
                <div class="content_text">
                  <span class="text_mucluc">MỤC LỤC</span>
                  <span class="text_mucluc_2">Thu gọn</span>
                </div>
                <div class="menu_text_2">
                    <div class="content_link_text">
                       <div class="link_text_1">
                        <?php 
                            $i = 0;
                        foreach($list_nam_sinh as $key => $value): 
                          $i++;
                        ?> 
                        <div>
                          <a href="#<?php echo $value['slug'];?>"><?php echo $i;?>. Tử vi ngày <?php echo $ngay_xem;?> tuổi <?php echo $value['text'];?></a>
                        </div>
                        <?php endforeach ?>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tvhn_content">
       <?php foreach ($list_nam_sinh as $key => $value): 
              $heading_tuoi = 'tử vi ngày '.$ngay_xem.' '.$value['text'];

       ?>
         <div class="" id="<?php echo $value['slug'];?>">
           <div class="tvhn_content_heading"><?php echo $heading_tuoi;?></div>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="bg_tv_theo_tuoi">
                   <span class="bg_tv_theo_tuoi_tt"><?php echo $heading_tuoi;?></span>
                </div>
              </div>
            </div>
            <ul class="tv_theo_tuoi_ul">
             <li>
               <b>Công danh:</b>
               <?php echo $y_nghia_que[$key]; ?>
             </li>
             <li>
               <b>Tình duyên gia đạo:</b>
               <?php echo $y_nghia_quan_he[$key]; ?>
             </li>
             <li>
               <b>Sức khỏe:</b>
               <?php echo $y_nghia_ngu_hanh[$key]; ?>
             </li>
           </ul> 
         </div>
       <?php endforeach ?>
    </div>
    <div class="field clearfix">
        <div class="row">
            <div class="col-md-5">
               <h4 class="tvn_sub_tt">Xem tử vi 5 ngày tiếp theo</h4> 
               <ul class="tvn_sub_list">
                   <?php foreach ($list_5_ngay_tiep as $key => $value):
                          $link_ngay_tiep = base_url('tu-vi-hang-ngay/tu-vi-tuoi-'.$tuoi_slug.'-ngay-hom-nay-'.$value['ngay_duong'].'-'.$value['thang_duong'].'-'.$value['nam_duong'].'.html');
                   ?>
                    <li><a href="<?php echo $link_ngay_tiep;?>"><?php echo 'Xem tử vi ngày '.$value['ngay_duong'].' tháng '.$value['thang_duong'].' năm '.$value['nam_duong'];?></a></li>
                   <?php endforeach; ?> 
               </ul>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-5">
               <h4 class="tvn_sub_tt">Xem tử vi 5 ngày trước</h4> 
               <ul class="tvn_sub_list">
                   <?php foreach ($list_5_ngay_truoc as $key => $value):
                           $link_ngay_truoc = base_url('tu-vi-hang-ngay/tu-vi-tuoi-'.$tuoi_slug.'-ngay-hom-nay-'.$value['ngay_duong'].'-'.$value['thang_duong'].'-'.$value['nam_duong'].'.html');
                   ?>
                    <li><a href="<?php echo $link_ngay_truoc;?>"><?php echo 'Xem tử vi ngày '.$value['ngay_duong'].' tháng '.$value['thang_duong'].' năm '.$value['nam_duong'];?></a></li>
                   <?php endforeach; ?> 
               </ul>
            </div>
        </div>
    </div>
    <div class="field clearfix">
        <div class="col-md-12"><?php echo $this->my_seolink->get_text_foot(); ?></div>
    </div>

    <div class="field">
        <div class="col-md-12">
            <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url('templates/site/jquery_ui/jquery_ui.css');?>" />
<script src="<?php echo base_url('templates/site/jquery_ui/jquery_ui.min.js'); ?>"></script>
<script>
  $(function() {
    $( "#tvhn_ngay_input" ).datepicker({ dateFormat: 'd/m/yy' });
    $( "#tvhn_ngay_input_1" ).datepicker({ dateFormat: 'd/m/yy' });
  });
  function tvn_theo_ngay()
  {
    var frm = document.frm_tvn_theo_ngay;
    var text = frm.tvn_ngay.value;
    var arr  = text.split("/");
    var slug = 'tu-vi-hang-ngay/tu-vi-ngay-'+arr[0]+'-thang-'+arr[1]+'-nam-'+arr[2]+'.html';
    window.location = window.location.origin + '/' + slug;
  }
  function tvn_theo_tuoi()
  {
    var frm = document.frm_tvn_theo_tuoi;
    var tuoi = frm.tvn_tuoi.value;
    var arr_tuoi = tuoi.split("-");
    var text_ngay = frm.tvn_ngay.value;
    var arr  = text_ngay.split("/");
    var slug = 'tu-vi-hang-ngay/tu-vi-tuoi-'+arr_tuoi[1]+'-ngay-hom-nay-'+arr[0]+'-'+arr[1]+'-'+arr[2]+'.html';
    window.location = window.location.origin + '/' + slug;
  }
</script>
<script type="text/javascript">
    
    function clickmenu2(id)
        {
            if (id == 'click_menu_1') 
            {       
                    $('#click_menu_1').hide();
                    $('#click_menu_2').show();
            }
            else {
                    $('#click_menu_2').hide();
                    $('#click_menu_1').show();
            }
        }
</script>    