<article class="detailArticle">
  <div class="col-md-12"><?php echo $breadcrumb; ?></div>
  <section style="clear: both;">
    <header>
      <h1 class="box_content_tt"><?php echo $category['name'] ?></h1>
    </header>
    <?php if ($this->uri->uri_string() == 'xem-tuoi-xong-nha-nam-2018-cho-12-con-giap'): ?>
        <?php 
          $nam_link = array(
            '1950' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-dan-sinh-nam-1950-A275',
            '1952' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-thin-sinh-nam-1952-A310',
            '1953' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-ty-sinh-nam-1953-A321',
            '1954' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-ngo-sinh-nam-1954-A297',
            '1955' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-mui-sinh-nam-1955-A291',
            '1956' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-than-sinh-nam-1956-A303',
            '1957' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-dau-sinh-nam-1957-A279',
            '1958' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-tuat-sinh-nam-1958-A322',
            '1959' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-hoi-sinh-nam-1959-A284',
            '1960' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-ty-sinh-nam-1960-A315',
            '1961' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-suu-sinh-nam-1961-A302',
            '1962' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-dan-sinh-nam-1962-A278',
            '1963' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-mao-sinh-nam-1963-A290',
            '1964' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-thin-sinh-nam-1964-A308',
            '1965' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-ty-sinh-nam-1965-A318',
            '1966' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-ngo-sinh-nam-1966-A295',
            '1967' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-mui-sinh-nam-1967-A292',
            '1968' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-than-sinh-nam-1968-A305',
            '1969' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-dau-sinh-nam-1969-A280',
            '1970' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-tuat-sinh-nam-1970-A311',
            '1971' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-hoi-sinh-nam-1971-A286',
            '1972' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-ty-sinh-nam-1972-A317',
            '1973' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-suu-sinh-nam-1973-A301',
            '1974' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-dan-sinh-nam-1974-A276',
            '1975' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-mao-sinh-nam-1975-A287',
            '1976' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-thin-sinh-nam-1976-A307',
            '1977' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-ty-sinh-nam-1977-A319',
            '1978' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-ngo-sinh-nam-1978-A298',
            '1979' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-mui-sinh-nam-1979-A293',
            '1980' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-canh-than-sinh-nam-1980-A304',
            '1981' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-dau-sinh-nam-1981-A282',
            '1982' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-tuat-sinh-nam-1982-A313',
            '1983' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-hoi-sinh-nam-1983-A285',
            '1984' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-ty-sinh-nam-1984-A316',
            '1985' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-suu-sinh-nam-1985-A299',
            '1986' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-dan-sinh-nam-1986-A274',
            '1987' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-mao-sinh-nam-1987-A288',
            '1988' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-thin-sinh-nam-1988-A309',
            '1989' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-ty-sinh-nam-1989-A320',
            '1991' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-tan-mui-sinh-nam-1991-A294',
            '1992' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-nham-than-sinh-nam-1992-A306',
            '1993' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-quy-dau-sinh-nam-1993-A281',
            '1994' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-giap-tuat-sinh-nam-1994-A312',
            '1995' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-at-hoi-sinh-nam-1995-A283',
            '1996' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-binh-ty-sinh-nam-1996-A314',
            '1997' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-dinh-suu-sinh-nam-1997-A300',
            '1998' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-mau-dan-sinh-nam-1998-A277',
            '1999' => 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-ky-mao-sinh-nam-1999-A289',
          );
        ?>
        <div class="col-md-12 boxAside">
          <div class="box2" style="clear: both;">
            <div class="col-md-4">
              <select name="nammuonxem" id="nammuonxem">
                <option value="">Chọn năm muốn tìm</option>
                <?php for($i = 1950; $i<= 1999; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor ?>
              </select>
            </div>
            <div class="col-md-4">
              <button type="button" id="subnammuonxem">Tìm kiếm</button>
            </div>
          </div>
        </div>
    <?php endif ?>
    <div>
      <?php echo $category['content'] ?>
    </div>
  </section>
</article>
<script>
  $(document).ready(function(){
    $('#xd_submit').on('click',function(){
        var link_xd = $('#xd_namsinh').val();
        var domain  = '<?php echo base_url(); ?>';
        window.location.href = domain + link_xd + '.html';
        return false;
    });
    $('#subnammuonxem').on('click',function(){
      var nammuonxem = $('#nammuonxem').val();
      var scrol = 'n'+ nammuonxem;
      $('html, body').animate({scrollTop: $('#'+scrol).offset().top},1500);
    });
  });
</script>