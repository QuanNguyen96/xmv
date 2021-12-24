$( function(){
  
  $(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$(".scrollToTop, .bar-bottom").fadeIn();
			if ($(this).scrollTop() > 500) $(".scrollTobottom").fadeOut();
			$(".navbar").addClass("navbar-fixed-top")
		} else {
			$(".scrollToTop").fadeOut();
			$(".navbar").removeClass("navbar-fixed-top");
			$(".scrollTobottom").fadeIn()
		}
	});
	$(".scrollToTop").click(function() {
		$("html, body").animate({
			scrollTop: 0
		}, 800);
		return false
	});
	$(".scrollTobottom").click(function() {
		$("html, body").animate({
			scrollTop: $(document).height()
		}, 800);
		return false
	});  
});


function search(url){
    var key = new String($('#search_sim').val());
    key = key.toLowerCase();
    key = key.replace(/[^0-9^*^x]/g, '');
	key = key.replace(/\*+/g, '*');
    
    if(key == '' || key.length < 2 || key.length > 11 ){
		alert("Nhập số cần tìm có ít nhất 2 chữ số và nhiều nhất 11 chữ số !");
        $('#search_sim').val('');
		$('#search_sim').focus();
		return false;
	} else {
		if( key.length == 10 || key.length == 11 ){
		    url = url+key+'.html';
		}else{
		   url = url+'tim-sim/'+key+'.html';
		}
        document.timkiem.action = url;
		return true;
	}
}

function submit_filter(id){
    
    var valu = $('#'+id+' option:selected').val();
    window.location = valu;
}