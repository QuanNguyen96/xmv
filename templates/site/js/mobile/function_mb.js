$(document).ready(function() {
    $('.viewShow').click(function() {
        var data_view = $(this).attr('data-view');
        // alert('hello');
        if (data_view == "on") {
            $(this).children('span').text('Thu gọn');
            $(this).parent().children('.contentMini').addClass('maxHeight1500');
            $(this).children('.imageButton').addClass('imageButtonClose');
            $(this).children('.imageButton').removeClass('imageButtonOpen');
            $(this).attr('data-view','off');

            // var x=$(this).offset();
            // var height_x=x.top;
            // alert(height_x);
            // $("html, body").animate({scrollTop:height_x},800);
            
        }
        else{
            $(this).children('span').text('Xem thêm mô tả');
            $(this).parent().children('.contentMini').removeClass('maxHeight1500');
            $(this).children('.imageButton').addClass('imageButtonOpen');
            $(this).children('.imageButton').removeClass('imageButtonClose');
            $(this).attr('data-view','on');
            scrollTo($(this).parent().children('.contentMini'), 100);
        }
    }); 

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.menu-newmobile').addClass('fixedTop');
        } else {
            $('.menu-newmobile').removeClass('fixedTop');
        }
    });

    // Scroll menu top
    // temp_mb    = 1;
    // $(window).scroll(function(){
    //     t_now_mb = parseInt($(this).scrollTop());
    //     if (t_now_mb > temp_mb) {
    //         $('.menu-newmobile').stop().fadeOut('fast');
    //     }
    //     else{
    //         $('.menu-newmobile').stop().fadeIn('fast');
    //     }
    //     temp_mb    = t_now_mb;
    // });
});
