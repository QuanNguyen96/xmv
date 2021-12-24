$(document).ready(function(){
	if($('#soxam').val() != 0){
		$('#tbl_xinkeo').removeClass('hidden');
		$('#tbl_xinxam').addClass('hidden');
		$('#show_soxam').text('Xâm số '+ $('#soxam').val());
	}

	if ($('#gieo_tiep').val() == 1) {
		$('#tr_img_xinkeo').removeClass('hidden');
		
		if($('#img_1').attr('data-value') == 1)
			$('#img_1').attr('src','../../templates/site/images/tool_xamquanam/duong.png');
		
		if($('#img_1').attr('data-value') == 0)
			$('#img_1').attr('src','../../templates/site/images/tool_xamquanam/am.png');

		if($('#img_2').attr('data-value') == 1)
			$('#img_2').attr('src','../../templates/site/images/tool_xamquanam/duong.png');

		if($('#img_2').attr('data-value') == 0)
			$('#img_2').attr('src','../../templates/site/images/tool_xamquanam/am.png');
		
		if ($('#img_1').attr('data-value') == 1 && $('#img_2').attr('data-value') == 0 ||
			$('#img_1').attr('data-value') == 0 && $('#img_2').attr('data-value') == 1 ){

			$('.xin_').addClass('hidden');
			$('#btn_noidung').removeClass('hidden');
		}
	}

	$('#btn_xinque').on('click',function(){
		$('#tbl_xinkeo').removeClass('hidden');
		$.ajax({
			url: 'http://trumsim.vn/tuvikhoahoc.vn/site/tool_xamquanam/xinxam',
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
			url:'http://trumsim.vn/tuvikhoahoc.vn/site/tool_xamquanam/xinkeo',
			type: 'post',
			data :{
				solan : lan,
			},
			dataType:'json',
			success:function(data){
				$('#tr_img_xinkeo').removeClass('hidden');
				$('#img_1').attr('data-value',parseInt(data[0]));
				if($('#img_1').attr('data-value') == 0)
					$('#img_1').attr('src','http://trumsim.vn/tuvikhoahoc.vn/public/templates/sitev2/images/tool_xamquanam/am.png');
				if($('#img_1').attr('data-value') == 1)
					$('#img_1').attr('src','http://trumsim.vn/tuvikhoahoc.vn/public/templates/sitev2/images/tool_xamquanam/duong.png');
				
				$('#img_2').attr('data-value',parseInt(data[1]))
				if($('#img_2').attr('data-value') == 0)
					$('#img_2').attr('src','http://trumsim.vn/tuvikhoahoc.vn/public/templates/sitev2/images/tool_xamquanam/am.png');
				if($('#img_2').attr('data-value') == 1)
					$('#img_2').attr('src','http://trumsim.vn/tuvikhoahoc.vn/public/templates/sitev2/images/tool_xamquanam/duong.png');

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
			url:'http://trumsim.vn/tuvikhoahoc.vn/site/tool_xamquanam/xemnoidungque',
			data :{xamso : $('#soxam').val()},
			type:'post',
			dataType: 'json',
			success:function(data){
				$('#tbl_ketquagieo').removeClass('hidden');
				$('#form_gieoque').addClass('hidden');
				var html = '';

					html += '<tr>';
					html += 	'<td>';
					html += 		'<center>' + data.noi_dung + '</center>';
					html += 	'</td>';
					html += '</tr>';

					html += '<tr>';
					html += 	'<td>';
					html += 		'<center>' + data.dich_nghia + '</center>';
					html += 	'</td>';
					html += '</tr>';

					html += '<tr>';
					html += 	'<td>';
					html += 		'<center>' + data.giai_nghia + '</center>';
					html += 	'</td>';
					html += '</tr>';

				    html += '<tr>';
					html += 	'<td class = lbl >';
					html += 		data.ten_cung.toUpperCase();
					html += 	'</td>';
					html += '</tr>';

					html += '<tr>';
					html += 	'<td class= text_justify >';
					html += 		 '<b><i>'+data.nd_cung+'</i></b>,';
					html += 	'</td>';
					html += '</tr>';

				$('#tbl_ketquagieo').addClass('width_30p');
				$('#tbl_ketquagieo').append(html);
			}
		});
	});
});