<?php 
    $html_xemboiSDT      = $this->load->view('site/import/rep_xemboiSDT', '', true);
    $html_ynghiaso       = $this->load->view('site/import/rep_ynghiaso', '', true);
    $html_sohoptuoi      = $this->load->view('site/import/rep_sohoptuoi', '', true);
    $html_sohopmenh      = $this->load->view('site/import/rep_sohopmenh', '', true);
    $arr_search  = array('$rep_xemboiSDT', '$rep_ynghiaso', '$rep_sohoptuoi', '$rep_sohopmenh');
    $arr_replace = array($html_xemboiSDT, $html_ynghiaso, $html_sohoptuoi, $html_sohopmenh);
    $arr_ngu_hanh = array(
         'kim'  => 'Kim',
         'moc'  => 'Mộc',
         'thuy' => 'Thủy',
         'hoa'  => 'Hỏa',
         'tho'  => 'Thổ',
    );
 ?>
<div class="col-md-12">
    <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
    <?php endif ?>
</div>
<div class="box_xvm clearfix">
    <div class="box_content">
         <h1 class="box_content_tt"><?php echo $this->my_seolink->get_name(); ?></h1>
         <?php $this->load->view('site/adsen/code1'); ?>
        <div class="field">
            <div class="col-md-12">
                <?php $text =  $this->my_seolink->get_text();
                    echo str_replace($arr_search,$arr_replace, $text);
                 ?>
            </div>
        </div>
        <p><i>Quý bạn vui lòng nhập đầy đủ thông tin để nhận được kết quả chính xác nhất</i></p>
        <br>
        <div class="col-md-6">
            <div class="text-center"><i>Xem theo mệnh</i></div><br>
            <form action="" method="POST" name="form_mauxehopmenh">
                <div class="col-md-6">
                    <select name="menh" id="menh">
                        <?php 
                           $cr_select = isset($_POST['menh']) ? $_POST['menh'] : '';
                        foreach ($arr_ngu_hanh as $key => $value):
                            $slt = $cr_select == $key ? 'selected=""' : '';
                        ?>
                           <option value="<?php echo $key;?>" <?php echo $slt; ?> ><?php echo $value;?></option> 
                        <?php endforeach; ?>    
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" id="xemmauxe" class="button">Xem kết quả</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="text-center"><i>Xem theo năm sinh</i></div><br>
            <form action="" method="POST" name="form_mauxehopmenhxemnam">
                <div class="col-md-6">
                    <?php  
                        $arr_menh = array(
                            '1960' => 'tho',
                            '1961' => 'tho',
                            '1968' => 'tho',
                            '1969' => 'tho',
                            '1976' => 'tho',
                            '1977' => 'tho',
                            '1990' => 'tho',
                            '1991' => 'tho',
                            '1998' => 'tho',
                            '1999' => 'tho',
                            '2006' => 'tho',
                            '2007' => 'tho',
                            '1956' => 'hoa',
                            '1957' => 'hoa',
                            '1964' => 'hoa',
                            '1965' => 'hoa',
                            '1978' => 'hoa',
                            '1979' => 'hoa',
                            '1986' => 'hoa',
                            '1987' => 'hoa',
                            '1994' => 'hoa',
                            '1995' => 'hoa',
                            '2008' => 'hoa',
                            '2009' => 'hoa',
                            '2016' => 'hoa',
                            '2017' => 'hoa',
                            '1954' => 'kim',
                            '1955' => 'kim',
                            '1962' => 'kim',
                            '1963' => 'kim',
                            '1970' => 'kim',
                            '1971' => 'kim',
                            '1984' => 'kim',
                            '1985' => 'kim',
                            '1992' => 'kim',
                            '1993' => 'kim',
                            '2000' => 'kim',
                            '2001' => 'kim',
                            '2014' => 'kim',
                            '2015' => 'kim',
                            '1950' => 'moc',
                            '1951' => 'moc',
                            '1958' => 'moc',
                            '1959' => 'moc',
                            '1972' => 'moc',
                            '1973' => 'moc',
                            '1980' => 'moc',
                            '1981' => 'moc',
                            '1988' => 'moc',
                            '1989' => 'moc',
                            '2002' => 'moc',
                            '2003' => 'moc',
                            '2010' => 'moc',
                            '2011' => 'moc',
                            '2018' => 'moc',
                            '2019' => 'moc',
                            '1952' => 'thuy',
                            '1953' => 'thuy',
                            '1966' => 'thuy',
                            '1967' => 'thuy',
                            '1974' => 'thuy',
                            '1975' => 'thuy',
                            '1982' => 'thuy',
                            '1983' => 'thuy',
                            '1996' => 'thuy',
                            '1997' => 'thuy',
                            '2004' => 'thuy',
                            '2005' => 'thuy',
                            '2012' => 'thuy',
                            '2013' => 'thuy',
                            
                        );

                        $cr_select = isset($_POST['namsinh']) ? $_POST['namsinh'] : '';
                    ?>
                    <select name="namsinh" id="menhnamsinh">
                        <?php for ($i=1960; $i <= 2020; $i++):
                               if(isset($arr_menh[$i])):
                        ?>
                        <option value="<?php echo $arr_menh[$i];?>" <?php echo set_select('namsinh', $arr_menh[$i]);?> ><?php echo $i;?></option>
                        <?php endif; endfor; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" id="xemmauxexemnam" value="submit" name="xemnam" class="button">Xem kết quả</button>
                </div>
            </form>
        </div>
    </div>
    <div class="fild" style="clear: both;">
    	<?php if (isset($noidung) && !empty($noidung)): ?>
    		<?php echo str_replace($arr_search,$arr_replace, $noidung['content']);; ?>
            
    	<?php endif ?>
    </div>
    <div class="field clearfix">
      	<div class="col-md-12"><?php $text_foot =  $this->my_seolink->get_text_foot();
                    echo str_replace($arr_search,$arr_replace, $text_foot);
                 ?></div>
    </div>
    <?php if (isset($noidung) and $noidung): ?>
        <?php $this->load->view('site/adsen/code_ads_chan_cong_cu');?>
        <div class="field clearfix">
            <div class="dieuhuong2019 clearfix mgt0">
                <?php $this->load->view('site/import/form_tv_2021'); ?>
            </div>
        </div>
    <?php endif ?>
    
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
<script>
	$(document).ready(function(){
		$('#xemmauxe').on('click',function(){
			var frame = document.form_mauxehopmenh;
			var menh = $('#menh').val();
			var link = 'xem-mau-hop-menh/menh-'+menh+'-hop-mau-gi' + '.html';
			var domain = '<?php echo base_url(); ?>';
			frame.action = domain + link;
		});

        $('#xemmauxexemnam').on('click',function(){
            var frame = document.form_mauxehopmenhxemnam;
            var menh = $('#menhnamsinh').val();
            var link = 'xem-mau-hop-menh/menh-'+menh+'-hop-mau-gi' + '.html';
            var domain = '<?php echo base_url(); ?>';
            frame.action = domain + link;
        });
	});
</script>