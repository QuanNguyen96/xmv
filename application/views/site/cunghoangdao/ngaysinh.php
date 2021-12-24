
<div class="">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class=" clearfix">
    <div class="">
        <h1 class="cunghoangdao_heading"><?php echo $this->my_seolink->get_name(); ?></h1>
        <?php $this->load->view('site/adsen/code1');?>
        <div class="field clearfix">
            <div class="col-md-12"><?php echo $this->my_seolink->get_text(); ?></div>
        </div>
        <?php $this->load->view('site/import/form_cung_hoang_dao_cung_menh');?>
        <div class="chd_ngay_sinh_slg">
        	<p>Khám phá đặc điểm cung hoàng đạo</p>
        	<p>qua ngày sinh nhật của bạn</p>
        </div>
        <div class="chd_ngay_sinh_note">Click để xem bói ngày sinh, tử vi cung hoàng đạo của bạn</div>
        <div class="row chd_ngay_sinh_control chd_slick" data-slick='{"slidesToShow": 5, "slidesToScroll": 3}'>
        	<?php for ($i=1; $i <=12 ; $i++):?>
        		<div class="col-md-1">
        			<span class="chd_ngay_sinh_control_span" id="<?php echo 'chd_ngay_sinh_control_'.$i;?>" data="<?php echo $i; ?>"><?php echo '<strong>Tháng</strong><strong> '.$i.'</strong>';?></span>
        		</div>
        	<?php endfor; ?>	
        </div>
        <?php for ($i = 1; $i <= 12 ; $i++): 
        		$date    = $i.'/1/'.date('Y');
        		$so_ngay = date('t',strtotime($date)); 
        		$so_hang = ceil($so_ngay/7);
        		$stt = 1;
                $mobi_active = $i == 1? 'mobi_active' : '';
        ?>
        	<div class="chd_ngay_sinh_tbl mobi_chd_ngay_sinh_tbl <?php echo $mobi_active; ?> " id="<?php echo 'chd_ngay_sinh_tbl_'.$i;?>"> 
        		<div class="chd_ngay_sinh_tbl_tt"><?php echo 'Tháng '.$i;?></div>
                <table class="table-striped">
        			<tbody>
                        <?php for ($j=1; $j <= $so_hang ; $j++):
                                $count = 0;
                        ?>
                            <tr>
                                <?php while ( $count < 7) {
                                    $print_stt = $stt <= $so_ngay ? $stt : '';
                                    if($stt <= $so_ngay)
                                    {
                                        $slug = $cung_hoang_dao_ngay_sinh[$i.','.$stt];
                                        $link = base_url($slug);
                                        echo '<td><a href="'.$link.'">'.$print_stt.'</a></td>';
                                    }
                                    else
                                        echo '<td></td>';
                                    $count++;
                                    $stt++;
                                } ?>
                            </tr>
                        <?php endfor; ?>                     
                    </tbody>
        		</table>
        	</div>
        <?php endfor; ?>	
        <div class="cung_hoang_dao_text">
            <?php echo $this->my_seolink->get_text_foot(); ?>
        </div>
    </div>
</div>         
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/slick/slick-theme.css');?>"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/site/slick/slick.css');?>"> 
<script type="text/javascript" src="<?php echo base_url('templates/site/slick/slick.min.js'); ?>"></script>   
<script type="text/javascript">
    $(function(){
        var screen_width = $( window ).width();
        if(screen_width > 760)
        {
            $('.chd_ngay_sinh_control_span').click(function(){
                var id = $(this).attr('data');
                $('.chd_ngay_sinh_control_span').removeClass('chd_active');
                $(this).addClass('chd_active');
                $('.chd_ngay_sinh_tbl').removeClass('chd_tbl_active');
                $('#chd_ngay_sinh_tbl_'+id).addClass('chd_tbl_active');
                var scroll_chd = $('#chd_ngay_sinh_tbl_'+id).offset().top;
                $("html, body").animate({
                      scrollTop: scroll_chd
                  });
            });
        }
        else
        {
            $('.chd_slick').slick({
                dots: true,
            });
            $('.chd_ngay_sinh_control_span').click(function(){
                var id = $(this).attr('data');
                $('.chd_ngay_sinh_control_span').removeClass('chd_active');
                $(this).addClass('chd_active');
                $('.mobi_chd_ngay_sinh_tbl').removeClass('mobi_active');
                $('#chd_ngay_sinh_tbl_'+id).addClass('mobi_active');
            });

        } 
    });
</script>

