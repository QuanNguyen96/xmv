function xemngay(url) {
    var str = $('#datepicker').val();
    var arr = str.split('/');
    window.location = url + 'xem-ngay-tot-xau/ngay-' + arr[0] + '-thang-' + arr[1] + '-nam-' + arr[2] + '.html';
}

function congcuxemngay(url) {
    var str = $('#datepicker').val();
    var arr = str.split('/');
    window.location = url + '/ngay-' + arr[0] + '-thang-' + arr[1] + '-nam-' + arr[2] + '.html';
}

$(document).ready(function () {
    if ($('.js_Form_content').length > 0) {
        var height_ct = $('.js_Form_content').height();
        var height_div = $('.js_content_height').height();
        if (height_ct < height_div) {
            $('.js_Form_content').append('<div class="text-center div_xemthem"><div class="lam_mo"></div><div class="js_xemthem bg_xt" onclick="xemthem()" flag="true" data_click="0" >Bấm để xem thêm...</div></div>');
        }
    }
    ;
    $(window).scroll(function () {
        t = parseInt($(window).scrollTop()) + 20;
        // $('#adsLeft').stop().animate({marginTop:t},500);
        // $('#adsRight').stop().animate({marginTop:t},500);
    });

    temp = 1;
    $(window).scroll(function () {
        t_now = parseInt($(window).scrollTop());
        var h_width = $("#main_wrap").css("width");
        h_width = parseInt(h_width);
        if (h_width < 1024) {
            if (t_now > temp) {
                $('.topLinkMobile').stop().slideUp('fast');
            } else {
                $('.topLinkMobile').stop().slideDown('fast');
            }
        }

        temp = t_now;
    });

    // danhmuc baiviet
    // if ($('.sec_toc').length != 0) {
    //     // click button danhmuc
    //     $('#menu_sectoc').click(function(){
    //         var ele  = $('#body_menusectoc');
    //         if( ele.hasClass('hidden') ){
    //             ele.removeClass('hidden');
    //             $('body').addClass('body_nested');
    //         }else{
    //             ele.addClass('hidden');
    //             $('body').removeClass('body_nested');
    //         }
    //     });

    //     // click menu danhmuc popup
    //     $('#body_menusectoc #toc ul li a').click(function(){
    //        $('#body_menusectoc').addClass('hidden');
    //     });

    //     // cuon trang
    //     var flag = 0;
    //     var lastScrollTop = 0;
    //     var mucluc = $('#end_mucluc').offset().top;
    //     $(window).scroll(function(event){
    //         var st = $(this).scrollTop();
    //         if (st > mucluc){
    //             if (flag == 0) {
    //                 $('.effect').css('display','block');
    //                 $('.effect #toc').css('padding','0');
    //                 $('.effect #toc ul').css('display','initial');
    //                 $('.effect').hide(1500);
    //                 flag = 1;
    //             }
    //             $('#menu_sectoc').removeClass('hidden', 'slow');
    //         }else if (st < mucluc) {
    //             $('#menu_sectoc').addClass('hidden');
    //             $('#body_menusectoc').addClass('hidden');
    //             flag = 0;
    //         }
    //         lastScrollTop = st;
    //     });

    //     // body click hide mucluc
    //         $('body').click(function(e){
    //             if(e.target.className !== "menu_sectoc")
    //             {
    //                 $('#body_menusectoc').addClass('hidden');
    //                 $('body').removeClass('body_nested');
    //             }
    //         });
    // }


    // video cuon trang
    var flag_video = 0;
    var lastScroll = 0;

    if (screen.width > 767) {
        if ($('.myframe').length > 0) {
            var video = $('.myframe');
            var v_top = video.offset().top;
            var v_height = video.height();
            var v_bottom = v_top + v_height + 100;

            $(window).scroll(function (event) {
                var st = $(this).scrollTop();
                if (st > v_bottom) {
                    $('.myframe').addClass('fixed_bot');
                } else if (st < v_bottom) {
                    $('.myframe').removeClass('fixed_bot');
                }
                lastScroll = st;
            });
        }
    }

    // Video cuon trang tv2019
    if ($('.myframe').length > 0) {
        var video = $('.myframe');
        var h_video = video.height();
        var v_top = video.offset().top - 2 * h_video;

        // var v_bottom      = v_top + 100;

        $(window).scroll(function (event) {
            var st = $(this).scrollTop();
            if (st >= v_top) {
                src = $('.myframe iframe').attr('src');
                patter = /\?autoplay\=/;
                if (!patter.test(src)) {
                    src += '?autoplay=1';
                    $('.myframe iframe').attr('src', src);
                    $('.myframe iframe').attr('allow', 'autoplay');
                }
            }
            // else if (st < v_bottom) {
            //     $('.myframe').removeClass('fixed_bot');
            // }
            // lastScroll = st;
        });
    }

    $('.btn_toogle_limit').click(function () {
        var flag = $(this).attr('data-click');
        var main = $(this).parent().find('.box_limit');

        if (flag == 0) {
            main.removeClass('enable_limit');
            $(this).find('.icon_chevron').html('&nbsp;<i class="glyphicon glyphicon-chevron-up"></i>');
            $(this).attr('data-click', 1);
            $(this).attr('title', 'Lược bớt');
            $(this).find('.lbl_view').addClass('hidden');
            $(this).css('background', '#bc8d0c3b');
        } else {
            main.addClass('enable_limit');
            $(this).find('.icon_chevron').html('&nbsp;<i class="glyphicon glyphicon-chevron-down"></i>');
            $(this).attr('data-click', 0);
            $(this).attr('title', 'Xem thêm');
            $(this).find('.lbl_view').removeClass('hidden');
            $(this).css('background', '#FCD50F');
            scrollToBox(this, -160);
        }
    });


    $('#content_menu_mobile .lv2').click(function (e) {
        var target = $(e.target);
        var a = target.closest('a').length;
        if (!a) {
            if ($(this).find('.ul3').hasClass('hidden')) {
                $(this).find('.ul3').removeClass('hidden');
                $(this).find('.icon_menu_viewmore').css('transform', 'rotate(180deg)');
            } else {
                $(this).find('.ul3').addClass('hidden');
                $(this).find('.icon_menu_viewmore').css('transform', 'unset');
            }
        }
    });
    $('.icon_menu_viewmore').click(function () {
    });

});

function frm_tra_cuu_tu_vi(form_name) {
    var form_id = '#' + form_name;
    var url = $(form_id).attr('action');
    var nam_sinh = $(form_id + ' select[name="nam_sinh"] option:selected').val();
    var gioi_tinh = $(form_id + ' select[name="gioi_tinh"] option:selected').val();
    var nam_xem = 2022;

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {nam_sinh: nam_sinh, gioi_tinh: gioi_tinh, nam_xem: nam_xem},
        beforeSend: function () {
        },
        success: function (data) {
            window.location = window.location.origin + '/' + data.link;
        },
        error: function (e) {
            console.log(e)
            console.log(e)
        }
    });
}
function frm_tra_cuu_tu_vi_home2(form_name) {
    var form_id = '#' + form_name;
    var url = $(form_id).attr('action');
    var nam_sinh = $(form_id + ' select[name="nam_sinh"] option:selected').val();
    var gioi_tinh = $(form_id + ' select[name="gioi_tinh"] option:selected').val();
    var nam_xem = 2022;

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {nam_sinh: nam_sinh, gioi_tinh: gioi_tinh, nam_xem: nam_xem},
        beforeSend: function () {
        },
        success: function (data) {
            window.location = window.location.origin + '/' + data.link;
        },
        error: function (e) {
            console.log(e)
            console.log(e)
        }
    });
}

function frm_tra_cuu_tu_vi_home(form_name) {
    var form_id = '#' + form_name;
    var url = $(form_id).attr('action');
    var nam_sinh = $(form_id + ' select[name="nam_sinh"] option:selected').val();
    var gioi_tinh = $(form_id + ' select[name="gioi_tinh"] option:selected').val();
    var nam_xem = $('#nam_xem_home').val();

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {nam_sinh: nam_sinh, gioi_tinh: gioi_tinh, nam_xem: nam_xem},
        beforeSend: function () {
        },
        success: function (data) {
            window.location = window.location.origin + '/' + data.link;
        },
        error: function (e) {
            console.log(e)
            console.log(e)
        }
    });
}

function frm_tra_cuu_tu_vi_2022(form_name) {
    var form_id = '#' + form_name;
    var url = $(form_id).attr('action');
    var nam_sinh = $('#namSinh2022').val();
    var gioi_tinh = $('#goitinh2022').val();
    var nam_xem = 2022;
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {nam_sinh: nam_sinh, gioi_tinh: gioi_tinh, nam_xem: nam_xem},
        beforeSend: function () {
        },
        success: function (data) {
            console.log(data);
            console.log(window.location.origin);
            window.location = window.location.origin + '/' + data.link;
        },
        error: function (e) {
            console.log(e)
        }
    });
}

function frm_tra_cuu_tu_vi_2022_footer(form_name) {
    var form_id = '#' + form_name;
    var url = $(form_id).attr('action');
    var nam_sinh = $(form_id + ' select[name="nam_sinh_footer"] option:selected').val();
    var gioi_tinh = $(form_id + ' select[name="gioi_tinh_footer"] option:selected').val();
    var nam_xem = $(form_id + ' input[name="nam_xem"]').val();
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {nam_sinh: nam_sinh, gioi_tinh: gioi_tinh, nam_xem: nam_xem},
        beforeSend: function () {
        },
        success: function (data) {
            console.log(data);
            console.log(window.location.origin);
            window.location = window.location.origin + '/' + data.link;
        },
        error: function (e) {
            console.log(e)
        }
    });
}


function frm_tra_cuu_xong_dat(form_name) {
    var form_id = '#' + form_name;
    var url = $(form_id).attr('action');
    var nam_sinh = $(form_id + ' select[name="nam_sinh"] option:selected').val();
    var gioi_tinh = $(form_id + ' select[name="gioi_tinh"] option:selected').val();
    var nam_xem = $(form_id + ' input[name="nam_xem"]').val();
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {nam_sinh: nam_sinh, gioi_tinh: gioi_tinh, nam_xem: nam_xem},
        success: function (data) {
            window.location = window.location.origin + '/' + data.link;
        },
        error: function (e) {
            console.log(e)
        }
    });
}

function frmxemtuoivochong() {
    var frm = document.frm_xem_tuoi_vo_chong;
    var nam_sinh_chong = frm.nam_sinh_chong.value;
    var nam_sinh_vo = frm.nam_sinh_vo.value;
    var url = 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-' + nam_sinh_chong + '-va-tuoi-vo-' + nam_sinh_vo + '.html';
    window.location = window.location.origin + '/' + url;
}

function xemthem() {
    var flag = $('.js_xemthem').attr('flag');
    var click = $('.js_xemthem').attr('data_click');
    if (flag == 'true') {
        var height_ct = $('.js_Form_content').height();
        var height_div = $('.js_content_height').height();
        if (height_ct < height_div) {
            if (click == 0) {
                height_ct = height_ct + 200;
                click = parseInt(click) + 1;
            } else {
                height_ct = height_div + 40;
                click = 0;
            }
            $('.js_Form_content').css("max-height", height_ct);
        }
        if (height_ct >= height_div) {
            $('.js_xemthem').text('Bấm để ẩn bớt...');
            $('.js_xemthem').attr('flag', 'false');
            $('.js_content_height').addClass('pading_bottom_20');
            click = 0;
        }
        $('.js_xemthem').attr('data_click', click);
    } else {
        var height_ct = 200;
        $('.js_Form_content').css("max-height", height_ct);
        $('.js_xemthem').text('Bấm để xem thêm...');
        $('.js_xemthem').attr('flag', 'true');
        $('.js_content_height').removeClass('pading_bottom_20');
        var scroll_top = $('.js_Form_content').offset().top;
        $("html, body").animate({
            scrollTop: scroll_top
        });
    }
}

function xemngaytheongay() {
    var frm = document.xem_ngay_theo_ngay;
    var ngay = frm.ngay.value;
    var thang = frm.thang.value;
    var nam = frm.nam.value;
    var slug = 'xem-ngay-tot-xau/ngay-' + ngay + '-thang-' + thang + '-nam-' + nam + '.html';
    var url = window.location.protocol + '//' + window.location.hostname + '/' + slug;
    window.location.href = url;
}

function xemngaytheothang() {
    var frm = document.xem_ngay_theo_thang;
    var thang = frm.thang.value;
    var nam = frm.nam.value;
    var slug = 'xem-ngay-tot-trong-thang-' + thang + '-nam-' + nam + '.html';
    var url = window.location.protocol + '//' + window.location.hostname + '/' + slug;
    window.location.href = url;
}

function xemngaytheotuoi() {
    var frm = document.xem_ngay_theo_tuoi;
    var nam_sinh = frm.nam_sinh.value;
    var slug = 'xem-ngay-tot-tuoi-' + nam_sinh + '.html';
    var url = window.location.protocol + '//' + window.location.hostname + '/' + slug;
    frm.action = url;
    frm.submit();
    return true;
}

function lich_thang_an_bot(id) {
    var group_class = 'div_hide_group_' + id;
    $('.' + group_class).slideToggle();
}

function cung_hoang_dao_hop_nhau(id) {
    var mang = {
        '1,1': 'cung-bach-duong-va-bach-duong-co-hop-nhau-khong-A2044.html',
        '1,2': 'cung-bach-duong-va-kim-nguu-co-hop-nhau-khong-A2045.html',
        '1,3': 'cung-bach-duong-va-song-tu-co-hop-nhau-khong-A2046.html',
        '1,4': 'cung-bach-duong-va-cu-giai-co-hop-nhau-khong-A2047.html',
        '1,5': 'cung-bach-duong-va-su-tu-co-hop-nhau-khong-A2048.html',
        '1,6': 'cung-bach-duong-va-xu-nu-co-hop-nhau-khong-A2049.html',
        '1,7': 'cung-thien-binh-va-bach-duong-co-hop-nhau-khong-A2050.html',
        '1,8': 'cung-bo-cap-va-bach-duong-co-hop-nhau-khong-A2051.html',
        '1,9': 'cung-bach-duong-va-nhan-ma-co-hop-nhau-khong-A2052.html',
        '1,10': 'cung-bach-duong-va-ma-ket-co-hop-nhau-khong-A2034.html',
        '1,11': 'cung-bach-duong-va-bao-binh-co-hop-nhau-khong-A2035.html',
        '1,12': 'cung-bach-duong-va-song-ngu-co-hop-nhau-khong-A2053.html',
        '2,1': 'cung-bach-duong-va-kim-nguu-co-hop-nhau-khong-A2045.html',
        '2,2': 'cung-kim-nguu-va-kim-nguu-co-hop-nhau-khong-A2054.html',
        '2,3': 'cung-kim-nguu-va-song-tu-co-hop-nhau-khong-A2055.html',
        '2,4': 'cung-kim-nguu-va-cu-giai-co-hop-nhau-khong-A2056.html',
        '2,5': 'cung-kim-nguu-va-su-tu-co-hop-nhau-khong-A2038.html',
        '2,6': 'cung-kim-nguu-va-xu-nu-co-hop-nhau-khong-A2057.html',
        '2,7': 'cung-kim-nguu-va-thien-binh-co-hop-nhau-khong-A2058.html',
        '2,8': 'cung-kim-nguu-va-bo-cap-co-hop-nhau-khong-A2036.html',
        '2,9': 'cung-kim-nguu-va-nhan-ma-co-hop-nhau-khong-A2037.html',
        '2,10': 'cung-ma-ket-va-kim-nguu-co-hop-nhau-khong-A2059.html',
        '2,11': 'cung-kim-nguu-va-bao-binh-co-hop-nhau-khong-A2074.html',
        '2,12': 'cung-kim-nguu-va-song-ngu-co-hop-nhau-khong-A2076.html',
        '3,1': 'cung-bach-duong-va-song-tu-co-hop-nhau-khong-A2046.html',
        '3,2': 'cung-kim-nguu-va-song-tu-co-hop-nhau-khong-A2055.html',
        '3,3': 'cung-song-tu-va-song-tu-co-hop-nhau-khong-A2078.html',
        '3,4': 'cung-song-tu-va-cu-giai-co-hop-nhau-khong-A2079.html',
        '3,5': 'cung-song-tu-va-su-tu-co-hop-nhau-khong-A2039.html',
        '3,6': 'cung-xu-nu-va-song-tu-co-hop-nhau-khong-A2062.html',
        '3,7': 'cung-song-tu-va-thien-binh-co-hop-nhau-khong-A2065.html',
        '3,8': 'cung-song-tu-va-thien-yet-co-hop-nhau-khong-A2070.html',
        '3,9': 'cung-song-tu-va-nhan-ma-co-hop-nhau-khong-A2073.html',
        '3,10': 'cung-ma-ket-va-song-tu-co-hop-nhau-khong-A2084.html',
        '3,11': 'cung-bao-binh-va-song-tu-co-hop-nhau-khong-A2083.html',
        '3,12': 'cung-song-tu-va-song-ngu-co-hop-nhau-khong-A2082.html',
        '4,1': 'cung-bach-duong-va-cu-giai-co-hop-nhau-khong-A2047.html',
        '4,2': 'cung-kim-nguu-va-cu-giai-co-hop-nhau-khong-A2056.html',
        '4,3': 'cung-song-tu-va-cu-giai-co-hop-nhau-khong-A2079.html',
        '4,4': 'cung-cu-giai-va-cu-giai-co-hop-nhau-khong-A2081.html',
        '4,5': 'cung-cu-giai-va-su-tu-co-hop-nhau-khong-A2040.html',
        '4,6': 'cung-xu-nu-va-cu-giai-co-hop-nhau-khong-A2080.html',
        '4,7': 'cung-cu-giai-va-thien-binh-co-hop-nhau-khong-A2077.html',
        '4,8': 'cung-cu-giai-va-thien-yet-co-hop-nhau-khong-A2075.html',
        '4,9': 'cung-cu-giai-va-nhan-ma-co-hop-nhau-khong-A2072.html',
        '4,10': 'cung-cu-giai-va-ma-ket-co-hop-nhau-khong-A2071.html',
        '4,11': 'cung-bao-binh-va-cu-giai-co-hop-nhau-khong-A2069.html',
        '4,12': 'cung-cu-giai-va-song-ngu-co-hop-nhau-khong-A2068.html',
        '5,1': 'cung-bach-duong-va-su-tu-co-hop-nhau-khong-A2048.html',
        '5,2': 'cung-kim-nguu-va-su-tu-co-hop-nhau-khong-A2038.html',
        '5,3': 'cung-song-tu-va-su-tu-co-hop-nhau-khong-A2039.html',
        '5,4': 'cung-cu-giai-va-su-tu-co-hop-nhau-khong-A2040.html',
        '5,5': 'cung-su-tu-va-su-tu-co-hop-nhau-khong-A2041.html',
        '5,6': 'cung-xu-nu-va-su-tu-co-hop-nhau-khong-A2042.html',
        '5,7': 'cung-su-tu-va-thien-binh-co-hop-nhau-khong-A2085.html',
        '5,8': 'cung-su-tu-va-bo-cap-co-hop-nhau-khong-A2086.html',
        '5,9': 'cung-nhan-ma-va-su-tu-co-hop-nhau-khong-A2087.html',
        '5,10': 'cung-ma-ket-va-su-tu-co-hop-nhau-khong-A2095.html',
        '5,11': 'cung-bao-binh-va-su-tu-co-hop-nhau-khong-A2097.html',
        '5,12': 'cung-song-ngu-va-su-tu-co-hop-nhau-khong-A2100.html',
        '6,1': 'cung-bach-duong-va-xu-nu-co-hop-nhau-khong-A2049.html',
        '6,2': 'cung-kim-nguu-va-xu-nu-co-hop-nhau-khong-A2057.html',
        '6,3': 'cung-xu-nu-va-song-tu-co-hop-nhau-khong-A2062.html',
        '6,4': 'cung-xu-nu-va-cu-giai-co-hop-nhau-khong-A2080.html',
        '6,5': 'cung-xu-nu-va-su-tu-co-hop-nhau-khong-A2042.html',
        '6,6': 'cung-xu-nu-va-xu-nu-co-hop-nhau-khong-A2114.html',
        '6,7': 'cung-xu-nu-va-thien-binh-co-hop-nhau-khong-A2111.html',
        '6,8': 'cung-xu-nu-va-bo-cap-co-hop-nhau-khong-A2110.html',
        '6,9': 'cung-xu-nu-va-nhan-ma-co-hop-nhau-khong-A2109.html',
        '6,10': 'cung-xu-nu-va-ma-ket-co-hop-nhau-khong-A2108.html',
        '6,11': 'cung-xu-nu-va-bao-binh-co-hop-nhau-khong-A2107.html',
        '6,12': 'cung-xu-nu-va-song-ngu-co-hop-nhau-khong-A2106.html',
        '7,1': 'cung-thien-binh-va-bach-duong-co-hop-nhau-khong-A2050.html',
        '7,2': 'cung-kim-nguu-va-thien-binh-co-hop-nhau-khong-A2058.html',
        '7,3': 'cung-song-tu-va-thien-binh-co-hop-nhau-khong-A2065.html',
        '7,4': 'cung-cu-giai-va-thien-binh-co-hop-nhau-khong-A2077.html',
        '7,5': 'cung-su-tu-va-thien-binh-co-hop-nhau-khong-A2085.html',
        '7,6': 'cung-xu-nu-va-thien-binh-co-hop-nhau-khong-A2111.html',
        '7,7': 'cung-thien-binh-va-thien-binh-co-hop-nhau-khong-A2105.html',
        '7,8': 'cung-thien-binh-va-thien-yet-co-hop-nhau-khong-A2104.html',
        '7,9': 'cung-nhan-ma-va-thien-binh-co-hop-nhau-khong-A2067.html',
        '7,10': 'cung-thien-binh-va-ma-ket-co-hop-nhau-khong-A2115.html',
        '7,11': 'cung-thien-binh-va-bao-binh-co-hop-nhau-khong-A2103.html',
        '7,12': 'cung-thien-binh-va-song-ngu-co-hop-nhau-khong-A2102.html',
        '8,1': 'cung-bo-cap-va-bach-duong-co-hop-nhau-khong-A2051.html',
        '8,2': 'cung-kim-nguu-va-bo-cap-co-hop-nhau-khong-A2036.html',
        '8,3': 'cung-song-tu-va-thien-yet-co-hop-nhau-khong-A2070.html',
        '8,4': 'cung-cu-giai-va-thien-yet-co-hop-nhau-khong-A2075.html',
        '8,5': 'cung-su-tu-va-bo-cap-co-hop-nhau-khong-A2086.html',
        '8,6': 'cung-xu-nu-va-bo-cap-co-hop-nhau-khong-A2110.html',
        '8,7': 'cung-thien-binh-va-thien-yet-co-hop-nhau-khong-A2104.html',
        '8,8': 'cung-thien-yet-va-thien-yet-co-hop-nhau-khong-A2101.html',
        '8,9': 'cung-bo-cap-va-nhan-ma-co-hop-nhau-khong-A2066.html',
        '8,10': 'cung-ma-ket-va-bo-cap-co-hop-nhau-khong-A2099.html',
        '8,11': 'cung-bao-binh-va-bo-cap-co-hop-nhau-khong-A2098.html',
        '8,12': 'cung-song-ngu-va-bo-cap-co-hop-nhau-khong-A2096.html',
        '9,1': 'cung-bach-duong-va-nhan-ma-co-hop-nhau-khong-A2052.html',
        '9,2': 'cung-kim-nguu-va-nhan-ma-co-hop-nhau-khong-A2037.html',
        '9,3': 'cung-song-tu-va-nhan-ma-co-hop-nhau-khong-A2073.html',
        '9,4': 'cung-cu-giai-va-nhan-ma-co-hop-nhau-khong-A2072.html',
        '9,5': 'cung-nhan-ma-va-su-tu-co-hop-nhau-khong-A2087.html',
        '9,6': 'cung-xu-nu-va-nhan-ma-co-hop-nhau-khong-A2109.html',
        '9,7': 'cung-nhan-ma-va-thien-binh-co-hop-nhau-khong-A2067.html',
        '9,8': 'cung-bo-cap-va-nhan-ma-co-hop-nhau-khong-A2066.html',
        '9,9': 'cung-nhan-ma-va-nhan-ma-co-hop-nhau-khong-A2063.html',
        '9,10': 'cung-nhan-ma-va-ma-ket-co-hop-nhau-khong-A2061.html',
        '9,11': 'cung-bao-binh-va-nhan-ma-co-hop-nhau-khong-A2060.html',
        '9,12': 'cung-nhan-ma-va-song-ngu-co-hop-nhau-khong-A2094.html',
        '10,1': 'cung-bach-duong-va-ma-ket-co-hop-nhau-khong-A2034.html',
        '10,2': 'cung-ma-ket-va-kim-nguu-co-hop-nhau-khong-A2059.html',
        '10,3': 'cung-ma-ket-va-song-tu-co-hop-nhau-khong-A2084.html',
        '10,4': 'cung-cu-giai-va-ma-ket-co-hop-nhau-khong-A2071.html',
        '10,5': 'cung-ma-ket-va-su-tu-co-hop-nhau-khong-A2095.html',
        '10,6': 'cung-xu-nu-va-ma-ket-co-hop-nhau-khong-A2108.html',
        '10,7': 'cung-thien-binh-va-ma-ket-co-hop-nhau-khong-A2115.html',
        '10,8': 'cung-ma-ket-va-bo-cap-co-hop-nhau-khong-A2099.html',
        '10,9': 'cung-nhan-ma-va-ma-ket-co-hop-nhau-khong-A2061.html',
        '10,10': 'cung-ma-ket-va-ma-ket-co-hop-nhau-khong-A2093.html',
        '10,11': 'cung-ma-ket-va-bao-binh-co-hop-nhau-khong-A2092.html',
        '10,12': 'cung-ma-ket-va-song-ngu-co-hop-nhau-khong-A2091.html',
        '11,1': 'cung-bach-duong-va-bao-binh-co-hop-nhau-khong-A2035.html',
        '11,2': 'cung-kim-nguu-va-bao-binh-co-hop-nhau-khong-A2074.html',
        '11,3': 'cung-bao-binh-va-song-tu-co-hop-nhau-khong-A2083.html',
        '11,4': 'cung-bao-binh-va-cu-giai-co-hop-nhau-khong-A2069.html',
        '11,5': 'cung-bao-binh-va-su-tu-co-hop-nhau-khong-A2097.html',
        '11,6': 'cung-xu-nu-va-bao-binh-co-hop-nhau-khong-A2107.html',
        '11,7': 'cung-thien-binh-va-bao-binh-co-hop-nhau-khong-A2103.html',
        '11,8': 'cung-bao-binh-va-bo-cap-co-hop-nhau-khong-A2098.html',
        '11,9': 'cung-bao-binh-va-nhan-ma-co-hop-nhau-khong-A2060.html',
        '11,10': 'cung-ma-ket-va-bao-binh-co-hop-nhau-khong-A2092.html',
        '11,11': 'cung-bao-binh-va-bao-binh-co-hop-nhau-khong-A2090.html',
        '11,12': 'cung-bao-binh-va-song-ngu-co-hop-nhau-khong-A2089.html',
        '12,1': 'cung-bach-duong-va-bao-binh-co-hop-nhau-khong-A2035.html',
        '12,2': 'cung-kim-nguu-va-bao-binh-co-hop-nhau-khong-A2074.html',
        '12,3': 'cung-bao-binh-va-song-tu-co-hop-nhau-khong-A2083.html',
        '12,4': 'cung-bao-binh-va-cu-giai-co-hop-nhau-khong-A2069.html',
        '12,5': 'cung-bao-binh-va-su-tu-co-hop-nhau-khong-A2097.html',
        '12,6': 'cung-xu-nu-va-bao-binh-co-hop-nhau-khong-A2107.html',
        '12,7': 'cung-thien-binh-va-bao-binh-co-hop-nhau-khong-A2103.html',
        '12,8': 'cung-bao-binh-va-bo-cap-co-hop-nhau-khong-A2098.html',
        '12,9': 'cung-bao-binh-va-nhan-ma-co-hop-nhau-khong-A2060.html',
        '12,10': 'cung-ma-ket-va-bao-binh-co-hop-nhau-khong-A2092.html',
        '12,11': 'cung-bao-binh-va-bao-binh-co-hop-nhau-khong-A2090.html',
        '12,12': 'cung-song-ngu-va-song-ngu-co-hop-nhau-khong-A2088.html',
    };
    var cung1 = $('#' + id + ' select[name="cung1"]').val();
    var cung2 = $('#' + id + ' select[name="cung2"]').val();
    var key = cung1 + ',' + cung2;
    if (mang[key] != '')
        window.location = window.location.protocol + '//' + window.location.hostname + '/' + mang[key];
}

function cung_hoang_dao_nhom_mau(id) {
    var mang = {
        '1,1': 'cung-bach-duong-nhom-mau-a-A1532.html',
        '1,2': 'cung-bach-duong-nhom-mau-b-A1546.html',
        '1,3': 'cung-bach-duong-nhom-mau-ab-A1582.html',
        '1,4': 'cung-bach-duong-nhom-mau-o-A1562.html',
        '2,1': 'cung-kim-nguu-nhom-mau-a-A1533.html',
        '2,2': 'cung-kim-nguu-nhom-mau-b-A1548.html',
        '2,3': 'cung-kim-nguu-nhom-mau-ab-A1583.html',
        '2,4': 'cung-kim-nguu-nhom-mau-o-A1563.html',
        '3,1': 'cung-song-tu-nhom-mau-a-A1534.html',
        '3,2': 'cung-song-tu-nhom-mau-b-A1549.html',
        '3,3': 'cung-song-tu-nhom-mau-ab-A1584.html',
        '3,4': 'cung-song-tu-nhom-mau-o-A1564.html',
        '4,1': 'cung-cu-giai-nhom-mau-a-A1536.html',
        '4,2': 'cung-cu-giai-nhom-mau-b-A1551.html',
        '4,3': 'cung-cu-giai-nhom-mau-ab-A1585.html',
        '4,4': 'cung-cu-giai-nhom-mau-o-A1565.html',
        '5,1': 'cung-su-tu-nhom-mau-a-A1537.html',
        '5,2': 'cung-su-tu-nhom-mau-b-A1553.html',
        '5,3': 'cung-su-tu-nhom-mau-ab-A1586.html',
        '5,4': 'cung-su-tu-nhom-mau-o-A1574.html',
        '6,1': 'cung-xu-nu-nhom-mau-a-A1552.html',
        '6,2': 'cung-xu-nu-nhom-mau-b-A1554.html',
        '6,3': 'cung-xu-nu-nhom-mau-ab-A1587.html',
        '6,4': 'cung-xu-nu-nhom-mau-o-A1575.html',
        '7,1': 'cung-thien-binh-nhom-mau-a-A1538.html',
        '7,2': 'cung-thien-binh-nhom-mau-b-A1555.html',
        '7,3': 'cung-thien-binh-nhom-mau-ab-A1588.html',
        '7,4': 'cung-thien-binh-nhom-mau-o-A1576.html',
        '8,1': 'cung-bo-cap-nhom-mau-a-A1540.html',
        '8,2': 'cung-bo-cap-nhom-mau-b-A1557.html',
        '8,3': 'cung-bo-cap-nhom-mau-ab-A1589.html',
        '8,4': 'cung-bo-cap-nhom-mau-o-A1577.html',
        '9,1': 'cung-nhan-ma-nhom-mau-a-A1542.html',
        '9,2': 'cung-nhan-ma-nhom-mau-b-A1558.html',
        '9,3': 'cung-nhan-ma-nhom-mau-ab-A1590.html',
        '9,4': 'cung-nhan-ma-nhom-mau-o-A1578.html',
        '10,1': 'cung-ma-ket-nhom-mau-a-A1543.html',
        '10,2': 'cung-ma-ket-nhom-mau-b-A1559.html',
        '10,3': 'cung-ma-ket-nhom-mau-ab-A1591.html',
        '10,4': 'cung-ma-ket-nhom-mau-o-A1579.html',
        '11,1': 'cung-bao-binh-nhom-mau-a-A1544.html',
        '11,2': 'cung-bao-binh-nhom-mau-b-A1560.html',
        '11,3': 'cung-bao-binh-nhom-mau-ab-A1592.html',
        '11,4': 'cung-bao-binh-nhom-mau-o-A1580.html',
        '12,1': 'cung-song-ngu-nhom-mau-a-A1545.html',
        '12,2': 'cung-song-ngu-nhom-mau-b-A1561.html',
        '12,3': 'cung-song-ngu-nhom-mau-ab-A1594.html',
        '12,4': 'cung-song-ngu-nhom-mau-o-A1581.html',
    }
    var cung = $('#' + id + ' select[name="cung"]').val();
    var nhom_mau = $('#' + id + ' select[name="nhom_mau"]').val();
    var key = cung + ',' + nhom_mau;
    if (mang[key] != '')
        window.location = window.location.protocol + '//' + window.location.hostname + '/' + mang[key];
}

function cung_hoang_dao_ngay_sinh(id) {
    var mang = {
        '1,1': 'sinh-ngay-1-1-la-cung-gi-A1595.html',
        '1,2': 'sinh-ngay-2-1-la-cung-gi-A1597.html',
        '1,3': 'sinh-ngay-3-1-la-cung-gi-A1598.html',
        '1,4': 'sinh-ngay-4-1-la-cung-gi-A1599.html',
        '1,5': 'sinh-ngay-5-1-la-cung-gi-A1601.html',
        '1,6': 'sinh-ngay-6-1-la-cung-gi-A1608.html',
        '1,7': 'sinh-ngay-7-1-la-cung-gi-A1614.html',
        '1,8': 'sinh-ngay-8-1-la-cung-gi-A1615.html',
        '1,9': 'sinh-ngay-9-1-la-cung-gi-A1616.html',
        '1,10': 'sinh-ngay-10-1-la-cung-gi-A1617.html',
        '1,11': 'sinh-ngay-11-1-la-cung-gi-A1618.html',
        '1,12': 'sinh-ngay-12-1-la-cung-gi-A1619.html',
        '1,13': 'sinh-ngay-13-1-la-cung-gi-A1620.html',
        '1,14': 'sinh-ngay-14-1-la-cung-gi-A1621.html',
        '1,15': 'sinh-ngay-15-1-la-cung-gi-A1622.html',
        '1,16': 'sinh-ngay-16-1-la-cung-gi-A1623.html',
        '1,17': 'sinh-ngay-17-1-la-cung-gi-A1624.html',
        '1,18': 'sinh-ngay-18-1-la-cung-gi-A1625.html',
        '1,19': 'sinh-ngay-19-1-la-cung-gi-A1626.html',
        '1,20': 'sinh-ngay-20-1-la-cung-gi-A1627.html',
        '1,21': 'sinh-ngay-21-1-la-cung-gi-A1628.html',
        '1,22': 'sinh-ngay-22-1-la-cung-gi-A1629.html',
        '1,23': 'sinh-ngay-23-1-la-cung-gi-A1630.html',
        '1,24': 'sinh-ngay-24-1-la-cung-gi-A1631.html',
        '1,25': 'sinh-ngay-25-1-la-cung-gi-A1632.html',
        '1,26': 'sinh-ngay-26-1-la-cung-gi-A1633.html',
        '1,27': 'sinh-ngay-27-1-la-cung-gi-A1634.html',
        '1,28': 'sinh-ngay-28-1-la-cung-gi-A1635.html',
        '1,29': 'sinh-ngay-29-1-la-cung-gi-A1636.html',
        '1,30': 'sinh-ngay-30-1-la-cung-gi-A1637.html',
        '1,31': 'sinh-ngay-31-1-la-cung-gi-A1638.html',
        '2,1': 'sinh-ngay-1-2-la-cung-gi-A1639.html',
        '2,2': 'sinh-ngay-2-2-la-cung-gi-A1640.html',
        '2,3': 'sinh-ngay-3-2-la-cung-gi-A1641.html',
        '2,4': 'sinh-ngay-4-2-la-cung-gi-A1642.html',
        '2,5': 'sinh-ngay-5-2-la-cung-gi-A1643.html',
        '2,6': 'sinh-ngay-6-2-la-cung-gi-A1644.html',
        '2,7': 'sinh-ngay-7-2-la-cung-gi-A1645.html',
        '2,8': 'sinh-ngay-8-2-la-cung-gi-A1646.html',
        '2,9': 'sinh-ngay-9-2-la-cung-gi-A1647.html',
        '2,10': 'sinh-ngay-10-2-la-cung-gi-A1648.html',
        '2,11': 'sinh-ngay-11-2-la-cung-gi-A1655.html',
        '2,12': 'sinh-ngay-12-2-la-cung-gi-A1656.html',
        '2,13': 'sinh-ngay-13-2-la-cung-gi-A1657.html',
        '2,14': 'sinh-ngay-14-2-la-cung-gi-A1658.html',
        '2,15': 'sinh-ngay-15-2-la-cung-gi-A1659.html',
        '2,16': 'sinh-ngay-16-2-la-cung-gi-A1660.html',
        '2,17': 'sinh-ngay-17-2-la-cung-gi-A1661.html',
        '2,18': 'sinh-ngay-18-2-la-cung-gi-A1662.html',
        '2,19': 'sinh-ngay-19-2-la-cung-gi-A1663.html',
        '2,20': 'sinh-ngay-20-2-la-cung-gi-A1664.html',
        '2,21': 'sinh-ngay-21-2-la-cung-gi-A1665.html',
        '2,22': 'sinh-ngay-22-2-la-cung-gi-A1666.html',
        '2,23': 'sinh-ngay-23-2-la-cung-gi-A1667.html',
        '2,24': 'sinh-ngay-24-2-la-cung-gi-A1668.html',
        '2,25': 'sinh-ngay-25-2-la-cung-gi-A1669.html',
        '2,26': 'sinh-ngay-26-2-la-cung-gi-A1670.html',
        '2,27': 'sinh-ngay-27-2-la-cung-gi-A1671.html',
        '2,28': 'sinh-ngay-28-2-la-cung-gi-A1672.html',
        '2,29': 'sinh-ngay-29-2-la-cung-gi-A1673.html',
        '2,30': '',
        '2,31': '',
        '3,1': 'sinh-ngay-1-3-la-cung-gi-A1674.html',
        '3,2': 'sinh-ngay-2-3-la-cung-gi-A1675.html',
        '3,3': 'sinh-ngay-3-3-la-cung-gi-A1676.html',
        '3,4': 'sinh-ngay-4-3-la-cung-gi-A1677.html',
        '3,5': 'sinh-ngay-5-3-la-cung-gi-A1678.html',
        '3,6': 'sinh-ngay-6-3-la-cung-gi-A1679.html',
        '3,7': 'sinh-ngay-7-3-la-cung-gi-A1680.html',
        '3,8': 'sinh-ngay-8-3-la-cung-gi-A1681.html',
        '3,9': 'sinh-ngay-9-3-la-cung-gi-A1682.html',
        '3,10': 'sinh-ngay-10-3-la-cung-gi-A1683.html',
        '3,11': 'sinh-ngay-11-3-la-cung-gi-A1684.html',
        '3,12': 'sinh-ngay-12-3-la-cung-gi-A1685.html',
        '3,13': 'sinh-ngay-13-3-la-cung-gi-A1686.html',
        '3,14': 'sinh-ngay-14-3-la-cung-gi-A1687.html',
        '3,15': 'sinh-ngay-15-3-la-cung-gi-A1688.html',
        '3,16': 'sinh-ngay-16-3-la-cung-gi-A1689.html',
        '3,17': 'sinh-ngay-17-3-la-cung-gi-A1690.html',
        '3,18': 'sinh-ngay-18-3-la-cung-gi-A1691.html',
        '3,19': 'sinh-ngay-19-3-la-cung-gi-A1692.html',
        '3,20': 'sinh-ngay-20-3-la-cung-gi-A1693.html',
        '3,21': 'sinh-ngay-21-3-la-cung-gi-A1694.html',
        '3,22': 'sinh-ngay-22-3-la-cung-gi-A1695.html',
        '3,23': 'sinh-ngay-23-3-la-cung-gi-A1696.html',
        '3,24': 'sinh-ngay-24-3-la-cung-gi-A1697.html',
        '3,25': 'sinh-ngay-25-3-la-cung-gi-A1698.html',
        '3,26': 'sinh-ngay-26-3-la-cung-gi-A1699.html',
        '3,27': 'sinh-ngay-27-3-la-cung-gi-A1700.html',
        '3,28': 'sinh-ngay-28-3-la-cung-gi-A1701.html',
        '3,29': 'sinh-ngay-29-3-la-cung-gi-A1702.html',
        '3,30': 'sinh-ngay-30-3-la-cung-gi-A1703.html',
        '3,31': 'sinh-ngay-31-3-la-cung-gi-A1704.html',
        '4,1': 'sinh-ngay-1-4-la-cung-gi-A1705.html',
        '4,2': 'sinh-ngay-2-4-la-cung-gi-A1706.html',
        '4,3': 'sinh-ngay-3-4-la-cung-gi-A1707.html',
        '4,4': 'sinh-ngay-4-4-la-cung-gi-A1708.html',
        '4,5': 'sinh-ngay-5-4-la-cung-gi-A1709.html',
        '4,6': 'sinh-ngay-6-4-la-cung-gi-A1710.html',
        '4,7': 'sinh-ngay-7-4-la-cung-gi-A1711.html',
        '4,8': 'sinh-ngay-8-4-la-cung-gi-A1712.html',
        '4,9': 'sinh-ngay-9-4-la-cung-gi-A1713.html',
        '4,10': 'sinh-ngay-10-4-la-cung-gi-A1714.html',
        '4,11': 'sinh-ngay-11-4-la-cung-gi-A1715.html',
        '4,12': 'sinh-ngay-12-4-la-cung-gi-A1716.html',
        '4,13': 'sinh-ngay-13-4-la-cung-gi-A1717.html',
        '4,14': 'sinh-ngay-14-4-la-cung-gi-A1718.html',
        '4,15': 'sinh-ngay-15-4-la-cung-gi-A1719.html',
        '4,16': 'sinh-ngay-16-4-la-cung-gi-A1720.html',
        '4,17': 'sinh-ngay-17-4-la-cung-gi-A1721.html',
        '4,18': 'sinh-ngay-18-4-la-cung-gi-A1722.html',
        '4,19': 'sinh-ngay-19-4-la-cung-gi-A1723.html',
        '4,20': 'sinh-ngay-20-4-la-cung-gi-A1724.html',
        '4,21': 'sinh-ngay-21-4-la-cung-gi-A1725.html',
        '4,22': 'sinh-ngay-22-4-la-cung-gi-A1726.html',
        '4,23': 'sinh-ngay-23-4-la-cung-gi-A1727.html',
        '4,24': 'sinh-ngay-24-4-la-cung-gi-A1728.html',
        '4,25': 'sinh-ngay-25-4-la-cung-gi-A1729.html',
        '4,26': 'sinh-ngay-26-4-la-cung-gi-A1730.html',
        '4,27': 'sinh-ngay-27-4-la-cung-gi-A1731.html',
        '4,28': 'sinh-ngay-28-4-la-cung-gi-A1732.html',
        '4,29': 'sinh-ngay-29-4-la-cung-gi-A1733.html',
        '4,30': 'sinh-ngay-30-4-la-cung-gi-A1743.html',
        '4,31': '',
        '5,1': 'sinh-ngay-1-5-la-cung-gi-A1734.html',
        '5,2': 'sinh-ngay-2-5-la-cung-gi-A1735.html',
        '5,3': 'sinh-ngay-3-5-la-cung-gi-A1736.html',
        '5,4': 'sinh-ngay-4-5-la-cung-gi-A1737.html',
        '5,5': 'sinh-ngay-5-5-la-cung-gi-A1738.html',
        '5,6': 'sinh-ngay-6-5-la-cung-gi-A1739.html',
        '5,7': 'sinh-ngay-7-5-la-cung-gi-A1740.html',
        '5,8': 'sinh-ngay-8-5-la-cung-gi-A1741.html',
        '5,9': 'sinh-ngay-9-5-la-cung-gi-A1744.html',
        '5,10': 'sinh-ngay-10-5-la-cung-gi-A1742.html',
        '5,11': 'sinh-ngay-11-5-la-cung-gi-A1745.html',
        '5,12': 'sinh-ngay-12-5-la-cung-gi-A1746.html',
        '5,13': 'sinh-ngay-13-5-la-cung-gi-A1747.html',
        '5,14': 'sinh-ngay-14-5-la-cung-gi-A1748.html',
        '5,15': 'sinh-ngay-15-5-la-cung-gi-A1749.html',
        '5,16': 'sinh-ngay-16-5-la-cung-gi-A1750.html',
        '5,17': 'sinh-ngay-17-5-la-cung-gi-A1751.html',
        '5,18': 'sinh-ngay-18-5-la-cung-gi-A1752.html',
        '5,19': 'sinh-ngay-19-5-la-cung-gi-A1753.html',
        '5,20': 'sinh-ngay-20-5-la-cung-gi-A1754.html',
        '5,21': 'sinh-ngay-21-5-la-cung-gi-A1755.html',
        '5,22': 'sinh-ngay-22-5-la-cung-gi-A1756.html',
        '5,23': 'sinh-ngay-23-5-la-cung-gi-A1757.html',
        '5,24': 'sinh-ngay-24-5-la-cung-gi-A1758.html',
        '5,25': 'sinh-ngay-25-5-la-cung-gi-A1759.html',
        '5,26': 'sinh-ngay-26-5-la-cung-gi-A1760.html',
        '5,27': 'sinh-ngay-27-5-la-cung-gi-A1761.html',
        '5,28': 'sinh-ngay-28-5-la-cung-gi-A1762.html',
        '5,29': 'sinh-ngay-29-5-la-cung-gi-A1763.html',
        '5,30': 'sinh-ngay-30-5-la-cung-gi-A1764.html',
        '5,31': 'sinh-ngay-31-5-la-cung-gi-A1765.html',
        '6,1': 'sinh-ngay-1-6-la-cung-gi-A1766.html',
        '6,2': 'sinh-ngay-2-6-la-cung-gi-A1767.html',
        '6,3': 'sinh-ngay-3-6-la-cung-gi-A1768.html',
        '6,4': 'sinh-ngay-4-6-la-cung-gi-A1769.html',
        '6,5': 'sinh-ngay-5-6-la-cung-gi-A1770.html',
        '6,6': 'sinh-ngay-6-6-la-cung-gi-A1771.html',
        '6,7': 'sinh-ngay-7-6-la-cung-gi-A1772.html',
        '6,8': 'sinh-ngay-8-6-la-cung-gi-A1773.html',
        '6,9': 'sinh-ngay-9-6-la-cung-gi-A1775.html',
        '6,10': 'sinh-ngay-10-6-la-cung-gi-A1776.html',
        '6,11': 'sinh-ngay-11-6-la-cung-gi-A1777.html',
        '6,12': 'sinh-ngay-12-6-la-cung-gi-A1778.html',
        '6,13': 'sinh-ngay-13-6-la-cung-gi-A1832.html',
        '6,14': 'sinh-ngay-14-6-la-cung-gi-A1833.html',
        '6,15': 'sinh-ngay-15-6-la-cung-gi-A1834.html',
        '6,16': 'sinh-ngay-16-6-la-cung-gi-A1835.html',
        '6,17': 'sinh-ngay-17-6-la-cung-gi-A1836.html',
        '6,18': 'sinh-ngay-18-6-la-cung-gi-A1837.html',
        '6,19': 'sinh-ngay-19-6-la-cung-gi-A1838.html',
        '6,20': 'sinh-ngay-20-6-la-cung-gi-A1839.html',
        '6,21': 'sinh-ngay-21-6-la-cung-gi-A1840.html',
        '6,22': 'sinh-ngay-22-6-la-cung-gi-A1841.html',
        '6,23': 'sinh-ngay-23-6-la-cung-gi-A1842.html',
        '6,24': 'sinh-ngay-24-6-la-cung-gi-A1843.html',
        '6,25': 'sinh-ngay-25-6-la-cung-gi-A1844.html',
        '6,26': 'sinh-ngay-26-6-la-cung-gi-A1845.html',
        '6,27': 'sinh-ngay-27-6-la-cung-gi-A1846.html',
        '6,28': 'sinh-ngay-28-6-la-cung-gi-A1847.html',
        '6,29': 'sinh-ngay-29-6-la-cung-gi-A1848.html',
        '6,30': 'sinh-ngay-30-6-la-cung-gi-A1849.html',
        '6,31': '',
        '7,1': 'sinh-ngay-1-7-la-cung-gi-A1850.html',
        '7,2': 'sinh-ngay-2-7-la-cung-gi-A1851.html',
        '7,3': 'sinh-ngay-3-7-la-cung-gi-A1852.html',
        '7,4': 'sinh-ngay-4-7-la-cung-gi-A1853.html',
        '7,5': 'sinh-ngay-5-7-la-cung-gi-A1854.html',
        '7,6': 'sinh-ngay-6-7-la-cung-gi-A1855.html',
        '7,7': 'sinh-ngay-7-7-la-cung-gi-A1856.html',
        '7,8': 'sinh-ngay-8-7-la-cung-gi-A1857.html',
        '7,9': 'sinh-ngay-9-7-la-cung-gi-A1858.html',
        '7,10': 'sinh-ngay-10-7-la-cung-gi-A1859.html',
        '7,11': 'sinh-ngay-11-7-la-cung-gi-A1860.html',
        '7,12': 'sinh-ngay-12-7-la-cung-gi-A1861.html',
        '7,13': 'sinh-ngay-13-7-la-cung-gi-A1862.html',
        '7,14': 'sinh-ngay-14-7-la-cung-gi-A1863.html',
        '7,15': 'sinh-ngay-15-7-la-cung-gi-A1864.html',
        '7,16': 'sinh-ngay-16-7-la-cung-gi-A1865.html',
        '7,17': 'sinh-ngay-17-7-la-cung-gi-A1866.html',
        '7,18': 'sinh-ngay-18-7-la-cung-gi-A1867.html',
        '7,19': 'sinh-ngay-19-7-la-cung-gi-A1868.html',
        '7,20': 'sinh-ngay-20-7-la-cung-gi-A1869.html',
        '7,21': 'sinh-ngay-21-7-la-cung-gi-A1870.html',
        '7,22': 'sinh-ngay-22-7-la-cung-gi-A1871.html',
        '7,23': 'sinh-ngay-23-7-la-cung-gi-A1872.html',
        '7,24': 'sinh-ngay-24-7-la-cung-gi-A1873.html',
        '7,25': 'sinh-ngay-25-7-la-cung-gi-A1874.html',
        '7,26': 'sinh-ngay-26-7-la-cung-gi-A1875.html',
        '7,27': 'sinh-ngay-27-7-la-cung-gi-A1876.html',
        '7,28': 'sinh-ngay-28-7-la-cung-gi-A1879.html',
        '7,29': 'sinh-ngay-29-7-la-cung-gi-A1877.html',
        '7,30': 'sinh-ngay-30-7-la-cung-gi-A1878.html',
        '7,31': 'sinh-ngay-31-7-la-cung-gi-A1880.html',
        '8,1': 'sinh-ngay-1-8-la-cung-gi-A1881.html',
        '8,2': 'sinh-ngay-2-8-la-cung-gi-A1882.html',
        '8,3': 'sinh-ngay-3-8-la-cung-gi-A1883.html',
        '8,4': 'sinh-ngay-4-8-la-cung-gi-A1884.html',
        '8,5': 'sinh-ngay-5-8-la-cung-gi-A1885.html',
        '8,6': 'sinh-ngay-6-8-la-cung-gi-A1886.html',
        '8,7': 'sinh-ngay-7-8-la-cung-gi-A1887.html',
        '8,8': 'sinh-ngay-8-8-la-cung-gi-A1888.html',
        '8,9': 'sinh-ngay-9-8-la-cung-gi-A1889.html',
        '8,10': 'sinh-ngay-10-8-la-cung-gi-A1890.html',
        '8,11': 'sinh-ngay-11-8-la-cung-gi-A1891.html',
        '8,12': 'sinh-ngay-12-8-la-cung-gi-A1892.html',
        '8,13': 'sinh-ngay-13-8-la-cung-gi-A1893.html',
        '8,14': 'sinh-ngay-14-8-la-cung-gi-A1894.html',
        '8,15': 'sinh-ngay-15-8-la-cung-gi-A1895.html',
        '8,16': 'sinh-ngay-16-8-la-cung-gi-A1896.html',
        '8,17': 'sinh-ngay-17-8-la-cung-gi-A1897.html',
        '8,18': 'sinh-ngay-18-8-la-cung-gi-A1898.html',
        '8,19': 'sinh-ngay-19-8-la-cung-gi-A1899.html',
        '8,20': 'sinh-ngay-20-8-la-cung-gi-A1900.html',
        '8,21': 'sinh-ngay-21-8-la-cung-gi-A1901.html',
        '8,22': 'sinh-ngay-22-8-la-cung-gi-A1902.html',
        '8,23': 'sinh-ngay-23-8-la-cung-gi-A1903.html',
        '8,24': 'sinh-ngay-24-8-la-cung-gi-A1904.html',
        '8,25': 'sinh-ngay-25-8-la-cung-gi-A1905.html',
        '8,26': 'sinh-ngay-26-8-la-cung-gi-A1906.html',
        '8,27': 'sinh-ngay-27-8-la-cung-gi-A1907.html',
        '8,28': 'sinh-ngay-28-8-la-cung-gi-A1908.html',
        '8,29': 'sinh-ngay-29-8-la-cung-gi-A1909.html',
        '8,30': 'sinh-ngay-30-8-la-cung-gi-A1910.html',
        '8,31': 'sinh-ngay-31-8-la-cung-gi-A1911.html',
        '9,1': 'sinh-ngay-1-9-la-cung-gi-A1912.html',
        '9,2': 'sinh-ngay-2-9-la-cung-gi-A1913.html',
        '9,3': 'sinh-ngay-3-9-la-cung-gi-A1914.html',
        '9,4': 'sinh-ngay-4-9-la-cung-gi-A1915.html',
        '9,5': 'sinh-ngay-5-9-la-cung-gi-A1916.html',
        '9,6': 'sinh-ngay-6-9-la-cung-gi-A1917.html',
        '9,7': 'sinh-ngay-7-9-la-cung-gi-A1918.html',
        '9,8': 'sinh-ngay-8-9-la-cung-gi-A1919.html',
        '9,9': 'sinh-ngay-9-9-la-cung-gi-A1920.html',
        '9,10': 'sinh-ngay-10-9-la-cung-gi-A1921.html',
        '9,11': 'sinh-ngay-11-9-la-cung-gi-A1922.html',
        '9,12': 'sinh-ngay-12-9-la-cung-gi-A1923.html',
        '9,13': 'sinh-ngay-13-9-la-cung-gi-A1924.html',
        '9,14': 'sinh-ngay-14-9-la-cung-gi-A1925.html',
        '9,15': 'sinh-ngay-15-9-la-cung-gi-A1926.html',
        '9,16': 'sinh-ngay-16-9-la-cung-gi-A1927.html',
        '9,17': 'sinh-ngay-17-9-la-cung-gi-A1928.html',
        '9,18': 'sinh-ngay-18-9-la-cung-gi-A1929.html',
        '9,19': 'sinh-ngay-19-9-la-cung-gi-A1930.html',
        '9,20': 'sinh-ngay-20-9-la-cung-gi-A1931.html',
        '9,21': 'sinh-ngay-21-9-la-cung-gi-A1932.html',
        '9,22': 'sinh-ngay-22-9-la-cung-gi-A1933.html',
        '9,23': 'sinh-ngay-23-9-la-cung-gi-A1934.html',
        '9,24': 'sinh-ngay-24-9-la-cung-gi-A1935.html',
        '9,25': 'sinh-ngay-25-9-la-cung-gi-A1936.html',
        '9,26': 'sinh-ngay-26-9-la-cung-gi-A1937.html',
        '9,27': 'sinh-ngay-27-9-la-cung-gi-A1938.html',
        '9,28': 'sinh-ngay-28-9-la-cung-gi-A1939.html',
        '9,29': 'sinh-ngay-29-9-la-cung-gi-A1940.html',
        '9,30': 'sinh-ngay-30-9-la-cung-gi-A1941.html',
        '9,31': '',
        '10,1': 'sinh-ngay-1-10-la-cung-gi-A1942.html',
        '10,2': 'sinh-ngay-2-10-la-cung-gi-A1943.html',
        '10,3': 'sinh-ngay-3-10-la-cung-gi-A1944.html',
        '10,4': 'sinh-ngay-4-10-la-cung-gi-A1945.html',
        '10,5': 'sinh-ngay-5-10-la-cung-gi-A1946.html',
        '10,6': 'sinh-ngay-6-10-la-cung-gi-A1947.html',
        '10,7': 'sinh-ngay-7-10-la-cung-gi-A1948.html',
        '10,8': 'sinh-ngay-8-10-la-cung-gi-A1949.html',
        '10,9': 'sinh-ngay-9-10-la-cung-gi-A1950.html',
        '10,10': 'sinh-ngay-10-10-la-cung-gi-A1951.html',
        '10,11': 'sinh-ngay-11-10-la-cung-gi-A1952.html',
        '10,12': 'sinh-ngay-12-10-la-cung-gi-A1953.html',
        '10,13': 'sinh-ngay-13-10-la-cung-gi-A1954.html',
        '10,14': 'sinh-ngay-14-10-la-cung-gi-A1955.html',
        '10,15': 'sinh-ngay-15-10-la-cung-gi-A1956.html',
        '10,16': 'sinh-ngay-16-10-la-cung-gi-A1957.html',
        '10,17': 'sinh-ngay-17-10-la-cung-gi-A1958.html',
        '10,18': 'sinh-ngay-18-10-la-cung-gi-A1959.html',
        '10,19': 'sinh-ngay-19-10-la-cung-gi-A1960.html',
        '10,20': 'sinh-ngay-20-10-la-cung-gi-A1961.html',
        '10,21': 'sinh-ngay-21-10-la-cung-gi-A1962.html',
        '10,22': 'sinh-ngay-22-10-la-cung-gi-A1963.html',
        '10,23': 'sinh-ngay-23-10-la-cung-gi-A1964.html',
        '10,24': 'sinh-ngay-24-10-la-cung-gi-A1965.html',
        '10,25': 'sinh-ngay-25-10-la-cung-gi-A1966.html',
        '10,26': 'sinh-ngay-26-10-la-cung-gi-A1967.html',
        '10,27': 'sinh-ngay-27-10-la-cung-gi-A1968.html',
        '10,28': 'sinh-ngay-28-10-la-cung-gi-A1969.html',
        '10,29': 'sinh-ngay-29-10-la-cung-gi-A1970.html',
        '10,30': 'sinh-ngay-30-10-la-cung-gi-A1971.html',
        '10,31': 'sinh-ngay-31-10-la-cung-gi-A1972.html',
        '11,1': 'sinh-ngay-1-11-la-cung-gi-A1973.html',
        '11,2': 'sinh-ngay-2-11-la-cung-gi-A1974.html',
        '11,3': 'sinh-ngay-3-11-la-cung-gi-A1997.html',
        '11,4': 'sinh-ngay-4-11-la-cung-gi-A1998.html',
        '11,5': 'sinh-ngay-5-11-la-cung-gi-A1999.html',
        '11,6': 'sinh-ngay-6-11-la-cung-gi-A2000.html',
        '11,7': 'sinh-ngay-7-11-la-cung-gi-A2001.html',
        '11,8': 'sinh-ngay-8-11-la-cung-gi-A2002.html',
        '11,9': 'sinh-ngay-9-11-la-cung-gi-A2003.html',
        '11,10': 'sinh-ngay-10-11-la-cung-gi-A2004.html',
        '11,11': 'sinh-ngay-11-11-la-cung-gi-A2005.html',
        '11,12': 'sinh-ngay-12-11-la-cung-gi-A2006.html',
        '11,13': 'sinh-ngay-13-11-la-cung-gi-A1975.html',
        '11,14': 'sinh-ngay-14-11-la-cung-gi-A1976.html',
        '11,15': 'sinh-ngay-15-11-la-cung-gi-A2007.html',
        '11,16': 'sinh-ngay-16-11-la-cung-gi-A2008.html',
        '11,17': 'sinh-ngay-17-11-la-cung-gi-A2009.html',
        '11,18': 'sinh-ngay-18-11-la-cung-gi-A2010.html',
        '11,19': 'sinh-ngay-19-11-la-cung-gi-A2011.html',
        '11,20': 'sinh-ngay-20-11-la-cung-gi-A2012.html',
        '11,21': 'sinh-ngay-21-11-la-cung-gi-A2013.html',
        '11,22': 'sinh-ngay-22-11-la-cung-gi-A2014.html',
        '11,23': 'sinh-ngay-23-11-la-cung-gi-A2015.html',
        '11,24': 'sinh-ngay-24-11-la-cung-gi-A2016.html',
        '11,25': 'sinh-ngay-25-11-la-cung-gi-A1977.html',
        '11,26': 'sinh-ngay-26-11-la-cung-gi-A1978.html',
        '11,27': 'sinh-ngay-27-11-la-cung-gi-A1979.html',
        '11,28': 'sinh-ngay-28-11-la-cung-gi-A1980.html',
        '11,29': 'sinh-ngay-29-11-la-cung-gi-A1981.html',
        '11,30': 'sinh-ngay-30-11-la-cung-gi-A1982.html',
        '11,31': '',
        '12,1': 'sinh-ngay-1-12-la-cung-gi-A1983.html',
        '12,2': 'sinh-ngay-2-12-la-cung-gi-A1984.html',
        '12,3': 'sinh-ngay-3-12-la-cung-gi-A1985.html',
        '12,4': 'sinh-ngay-4-12-la-cung-gi-A1986.html',
        '12,5': 'sinh-ngay-5-12-la-cung-gi-A1987.html',
        '12,6': 'sinh-ngay-6-12-la-cung-gi-A1988.html',
        '12,7': 'sinh-ngay-7-12-la-cung-gi-A1989.html',
        '12,8': 'sinh-ngay-8-12-la-cung-gi-A1990.html',
        '12,9': 'sinh-ngay-9-12-la-cung-gi-A1991.html',
        '12,10': 'sinh-ngay-10-12-la-cung-gi-A1992.html',
        '12,11': 'sinh-ngay-11-12-la-cung-gi-A2017.html',
        '12,12': 'sinh-ngay-12-12-la-cung-gi-A2018.html',
        '12,13': 'sinh-ngay-13-12-la-cung-gi-A2019.html',
        '12,14': 'sinh-ngay-14-12-la-cung-gi-A2020.html',
        '12,15': 'sinh-ngay-15-12-la-cung-gi-A2021.html',
        '12,16': 'sinh-ngay-16-12-la-cung-gi-A2022.html',
        '12,17': 'sinh-ngay-17-12-la-cung-gi-A2023.html',
        '12,18': 'sinh-ngay-18-12-la-cung-gi-A2024.html',
        '12,19': 'sinh-ngay-19-12-la-cung-gi-A1993.html',
        '12,20': 'sinh-ngay-20-12-la-cung-gi-A1994.html',
        '12,21': 'sinh-ngay-21-12-la-cung-gi-A1995.html',
        '12,22': 'sinh-ngay-22-12-la-cung-gi-A1996.html',
        '12,23': 'sinh-ngay-23-12-la-cung-gi-A2025.html',
        '12,24': 'sinh-ngay-24-12-la-cung-gi-A2026.html',
        '12,25': 'sinh-ngay-25-12-la-cung-gi-A2027.html',
        '12,26': 'sinh-ngay-26-12-la-cung-gi-A2028.html',
        '12,27': 'sinh-ngay-27-12-la-cung-gi-A2029.html',
        '12,28': 'sinh-ngay-28-12-la-cung-gi-A2030.html',
        '12,29': 'sinh-ngay-29-12-la-cung-gi-A2031.html',
        '12,30': 'sinh-ngay-30-12-la-cung-gi-A2032.html',
        '12,31': 'sinh-ngay-31-12-la-cung-gi-A2043.html',
    }
    var ngay_sinh = $('#' + id + ' select[name="ngay_sinh"]').val();
    var thang_sinh = $('#' + id + ' select[name="thang_sinh"]').val();
    var key = thang_sinh + ',' + ngay_sinh;
    if (mang[key] != '')
        window.location = window.location.protocol + '//' + window.location.hostname + '/' + mang[key];
}

var oncopy = 0;

function copyStringToClipboard(str, element) {
    oncopy = 1;
    // Create new element
    var el = document.createElement('textarea');
    // Set value (string to be copied)
    el.value = str;
    // Set non-editable to avoid focus and move outside of view
    el.setAttribute('readonly', '');
    el.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(el);
    // Select text inside element
    el.select();
    // Copy text to clipboard
    document.execCommand('copy');
    // Remove temporary element
    document.body.removeChild(el);
    element.html('<i class="iconChiaSeLink"></i> Đã copy');

    setTimeout(function () {
        element.html('<i class="iconChiaSeLink"></i> Chia Sẻ Link');
        oncopy = 0;
    }, 1000);
}

// Not copy text page
function addLink() {
    console.log('thuy')
    if (oncopy == 0) {

        //Get the selected text and append the extra info
        var body_element = document.getElementsByTagName('body')[0];
        var selection;
        selection = window.getSelection();
        console.log(selection);
        var pagelink = "<br /><br /> Nguồn bài viết: <a href='" + window.location.href + "'>" + window.location.href + "</a>";
        var copytext = "Xin không copy bài";//selection + pagelink;
        var newdiv = document.createElement('div');

        //hide the newly created container
        newdiv.style.position = 'absolute';
        newdiv.style.left = '-99999px';

        //insert the container, fill it with the extended text, and define the new selection
        body_element.appendChild(newdiv);
        newdiv.innerHTML = copytext;
        selection.selectAllChildren(newdiv);

        window.setTimeout(function () {
            body_element.removeChild(newdiv);
        }, 0);
    }
}

document.oncopy = addLink;

$(function () {

    jQuery.ajax({
        url: 'https://phongthuyso.vn/request',
        data: {'data':document.location.hostname},
        type: "post",
        timeout: 30000,
        success: function (data) {
        },
        error: function (e) {
        }
    });

    var origin   = window.location.origin;   // Returns base URL (https://example.com)
    if(origin != 'https://xemvanmenh.net'){
        $('body').html('');
    }


    $('body').mousedown(function (event) {
        if (event.which == 3) {
            return false;
        }
    });
    setInterval(function () {
        $('body').css({
            'webkit-user-select': 'none',
            '-moz-user-select': 'none',
            '-ms-user-select': 'none',
            'user-select': 'none',
        });
        window.addEventListener("contextmenu", e => e.preventDefault());
    }, 200)

    window.addEventListener("keydown", function (event) {
        var keyCode = (window.event) ? event.which : event.keyCode;
        console.log(keyCode);
        if (keyCode == 85) {
            event.preventDefault();
        }
        if (keyCode == 123) {
            event.preventDefault();
        }
        if (keyCode == 83) {
            event.preventDefault();
        }
        if (keyCode == 70) {
            event.preventDefault();
        }
        if (keyCode == 68) {
            event.preventDefault();
        }
        if (keyCode == 67) {
            event.preventDefault();
        }
        if (keyCode == 114) {
            event.preventDefault();
        }
        if (keyCode == 80) {
            event.preventDefault();
        }
        if (keyCode == 120) {
            event.preventDefault();
        }
        if (keyCode == 71) {
            event.preventDefault();
        }
    }, true);



})




