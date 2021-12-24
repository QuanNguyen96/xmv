<div class="box_xvm my_khung">
	<p class="lbl_tieude_boiso">Hãy nhập đầy đủ thông tin để có kết quả tốt nhất</p>
	<form name="rep_ynghiaso" style="margin:20px 0" method="post" action="" onsubmit="rep_ynghiaso_submit();return false;">
		<div class="row">
			<div class="col-md-3 col-md-offset-3 col-xs-6 text-center">
				<select name="chonso" required="">
					<option value="" disabled="" selected="">Chọn số</option>
					<?php foreach (data_ynghiaso() as $key => $value): ?>
						<option value="<?php echo $value ?>"><?php echo $key ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<button type="submit" style="height: 36px;line-height: 36px;max-width: 100%">Xem ngay</button>
			</div>
		</div>
		<script>
			function rep_ynghiaso_submit(){
				var frm = document.rep_ynghiaso;
				var uri = frm.chonso.value;
		        var link= '<?php echo base_url() ?>' + uri + '.html';
		        window.location.href = link;
			}
		</script>
	</form>
</div>