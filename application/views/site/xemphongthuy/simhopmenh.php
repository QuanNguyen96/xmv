<section class="four-tool">
  <p class="title_l1">Xem phong thủy sim<span class="hidden-xs"> hợp mệnh <?php echo @$menh_nguoi; ?></span></p>
   <?php if (isset($text)): ?>
      <div class="txt_top_bot">
        <?php echo $text; ?>
      </div>
   <?php endif ?>
  <p>&nbsp;</p>
  <div class="outer_form">
    <div class="title_l4">Số bạn<span class="hidden-xs"> đang dùng</span> có hợp mệnh <?php echo @$menh_nguoi; ?> không?</div>
    <div class="form_bg_bapcaihong">
      <?php $this->load->view('site/import/form_xemsimhopmenh'); ?>
    </div>
  </div>

  <?php if (isset($text_foot)): ?>
      <div class="txt_top_bot">
        <?php echo $text_foot; ?>
      </div>
   <?php endif ?>
</section>