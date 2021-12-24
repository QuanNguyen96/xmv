<?php 
/*

	Hàm hiện thông báo

*/



if(! function_exists('notification')) 

{

	function notification($hd = '', $class = '', $content = '') {

		return array(

			'hd' => $hd,

			'class' => $class,

			'info' => $content

		);

	}

}

	

/*

	Hàm tạo ra thông báo

*/



if(! function_exists('alert_messages'))

{

	function alert_messages($hd = 'hidden="true"', $class = '', $content = '') {

		return  "<div ".$hd."class='alert ".$class."'>

					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

				 	<strong><span class='glyphicon glyphicon-info-sign'></span> Thông báo: </strong> ".$content."

				</div>";

	}

}



function showMessage($class, $content) {

	$icon = "<span class='glyphicon glyphicon-exclamation-sign'></span>  Cảnh báo: ";

	if ($class == 'info') {

		$icon = "<span class='glyphicon glyphicon-ok-sign'></span>  Thông báo: ";

	}



	return '<div class="alert alert-'.$class.'">

		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>'.$icon.'</strong> '.$content.'

	</div>';

}

function notify($class, $content) {

	return array(

		'class' => $class,

		'content' => $content

	);

}

function noidung_cmt(){
	return $noidung = array(
		'0' => 'Nếu kết quả của bạn bằng 0, xin chia buồn cùng bạn. Số phận định sẵn bạn chỉ luôn là người đến sau, dù tài ba đến đâu thì bạn vẫn chỉ đứng thứ hai trong mọi chuyện, từ học hành, sự nghiệp đến yêu đương.Chính sự kém may mắn này khiến bạn luôn cảm thấy bức bối vì có những kẻ kém tài hơn nhưng lại qua mặt bạn. Tuy nhiên, hãy suy nghĩ một cách tích cực, sẽ có lúc bạn tỏa sáng và giành lại mọi thứ đáng lẽ thuộc về mình.',
		'1' => 'Xin chúc mừng nếu kết quả của bạn là 1. Bạn luôn gặp vận đỏ, số bạn sinh ra là để hưởng may mắn. Bạn được ban trí thông minh tuyệt vời, lại có tính cách mạnh mẽ để làm lãnh đạo.Tuy nhiên, không phải mọi thứ đều hoàn hảo. Đỏ bạc thì đen tình, bạn thành công trong sự nghiệp nhưng lại ‘đen’ về mặt tình yêu.Bên cạnh đó, để thành công lâu dài, bạn đừng quá nôn nóng mà hỏng việc, hãy từ tốn thôi. Ngoài 30 tuổi, bạn sẽ có thành công mà nhiều người mơ ước.',
		'2' => 'Bạn có năng lực nhưng lại hấp tấp, do đó đôi khi cẩu thả trong công việc. May cho bạn là bạn luôn có quý nhân phù trợ cho nên thường tai qua nạn khỏi.Hãy phát huy ưu điểm của bản thân là vui vẻ, tập trung làm việc, học hành. Bạn càng ít bon chen, đấu đá thì càng được quý nhân phù trợ. Vận may sẽ đến với bạn lúc bạn bi quan nhất.',
		'3' => 'Bạn là người chăm chỉ, mưu trí và kiên định. Bạn luôn cố làm mọi việc đến cùng, nỗ lực phấn đấu cho sự nghiệp học hành, công việc. Tuy nhiên, bạn đừng nên vì tiền tài mà lóa mắt kẻo gặp tai ương nhé. Trong sự nghiệp, bạn đừng nên đầu tư nóng vội hay cả tin người khác. Số phận của bạn ít gặp may mắn hơn người khác.',
		'4'	=> 'Đời bạn phải trải qua nhiều thăng trầm, bôn ba trong cuộc sống. Trong khi người khác ung dung thoải mái thì bạn thường phải chật vật với sự nghiệp học hành, tình yêu, công việc…Tuy nhiên, số phận bạn không phải hoàn toàn đen tối đâu nhé. Để hóa cát thành hung, bạn nên sống lạc quan vui vẻ. Cuộc đời bạn sẽ sang trang ở độ tuổi từ 30-40. Mặc dù sẽ có nhiều khó khăn ở thời điểm này, song bạn hãy cứ vững tin mà bước.',
		'5'	=> 'Những người này thường nổi tiếng vào thời trẻ tuổi, nhưng bắt đầu sa sút ở độ tuổi trung niên trở đi. Trong công việc, bạn cần phải làm việc nghiêm túc, luôn giữ tinh thần cầu thị. Ngoài ra, đừng bao giờ chơi cờ bạc hay những trò đỏ đen nhé, vì bạn không có số làm giàu trong nháy mắt đâu.Thời điểm vàng để thành công của bạn là từ 25-35 tuổi. Nếu bạn tha phương lập nghiệp, nhất là ở nước ngoài thì số phận của bạn sẽ thay đổi rất nhanh. Bạn sẽ được hưởng 1 tuổi già an vui.',
		'6' => 'Bạn là người có nghị lực hơn người, dám làm những việc khó khăn mà ít ai dám nhận và luôn thành công. Bạn điềm tĩnh, làm việc chắc chắn, khiến người khác luôn phải thán phục. Hãy tranh thủ thời trẻ tuổi để hoàn thành những mục tiêu khó nhất trong cuộc đời nhé.Cuộc đời bạn sẽ sang trang mới khi bước sang tuổi trung niên. Bạn sẽ gặp nhiều may mắn hơn và được hưởng tuổi già hạnh phúc miễn là đừng tham vàng bỏ ngãi.',
		'7'	=> 'Cuộc sống của bạn luôn phẳng lặng, ít sóng gió. Có thể nói, đây là cuộc sống mà nhiều người mong ước. Bạn ít gặp tai họa, bệnh tật, khó khăn hay thất bại. Sự nghiệp của bạn thăng tiến đều đều, tài vận ra vào vừa phải, còn tình yêu thì êm ả.Số bạn không giàu nhưng đủ tiền tiêu. Chỉ cần bạn đừng ép mình làm những việc quá sức, cuộc đời bạn sẽ an ổn đến cuối đời.',
		'8'	=> 'Bạn được người khác coi là kẻ thiên hạ vô song, may mắn hơn người dù bạn không phải là người ‘đẻ bọc điều’. Bạn biết cách điều khiển mọi việc theo ý mình.Trong công việc, bạn thường bị tiểu nhân quấy rối, ngáng đường nhưng luôn vượt qua được một cách xuất sắc. Dù gặp nhiều khó khăn trong cuộc sống, song bạn thường được quý nhân phù trợ để hóa hung thành cát.',
		'9'	=> 'Thoạt nhìn qua, ai cũng cho rằng bạn là người có số hưởng, lười nhác nhưng lại gặp thuận lợi vô cùng. Việc người khác không làm được nhưng chỉ cần bạn góp tay vào thì mọi thứ đều hanh thông, suôn sẻ.Thật sự bạn là người có đầu óc mẫn tiệp và sắc sảo, chỉ là do lười biếng nên mọi người mới nghĩ xấu về bạn thôi. Nếu bạn chăm chỉ hơn, chắc chắn bạn sẽ giành được nhiều thành công hơn nữa. Tuy nhiên, dù kết quả thế nào đi nữa thì tương lai vẫn nằm ở chính bạn. Chỉ cần cố gắng không ngừng, bạn sẽ thành công.',
	);
}

 ?>