
$( function(){
  $(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
		      $('.fillter').addClass('scroll_fillter');
              $('.header_control ul').addClass('scroll_control');
		} else {
			  $('.fillter').removeClass('scroll_fillter');
              $('.header_control ul').removeClass('scroll_control');
		}
	});
    
  $('.logo b').click( function(){
      var act = $('article').attr('data');
      if( act == 'up' )
      {
        $('article').attr('data','');
        $('aside').slideDown();
        $('article').removeClass('full');
      }
      else
      {
        $('article').attr('data','up');
        $('aside').slideUp();
        $('article').addClass('full');
      }
  });  
});

function submit_form(url){
             document.adminForm.action = url;
             document.adminForm.submit();
             return true;
}

function checkAll(){
            if($('#checkall').is(':checked')){
                $('.cid:checkbox').each(function(){
                   this.checked = true;
                });
            }
            else{
                $('.cid:checkbox').each(function(){
                   this.checked = false;
                });
            }
    
}

function set_slug( set_id, retun_id ){
    var text = $( '#'+set_id ).val();
    text = text.trim();
    text = replace_slug( text );
    $( '#'+retun_id ).val( text );
    $('.'+retun_id).text( text+'.html' );
}

function replace_slug( text ){
    text = text.replace( /å|ä|ā|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|ä|ą/gi, 'a' );
    text = text.replace( /ß|ḃ/gi, "b" );
    text = text.replace( /ç|ć|č|ĉ|ċ|¢|©/gi, 'c' );
    text = text.replace( /đ|ď|ḋ|đ/gi, 'd' );
    text = text.replace( /è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ę|ë|ě|ė/gi, 'e' );
    text = text.replace( /ḟ|ƒ/gi, "f" );
    text = text.replace(/ķ/gi, "k");
    text = text.replace( /ħ|ĥ/gi, "h");
    text = text.replace( /ì|í|î|ị|ỉ|ĩ|ï|î|ī|¡|į/gi, 'i');
    text = text.replace(/ĵ/gi, "j");
    text = text.replace(/ṁ/gi, "m");
   
    text = text.replace( /ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö|ø|ō/gi, 'o');
    text = text.replace(/ṗ/gi, "p");
    text = text.replace( /ġ|ģ|ğ|ĝ/gi, "g");
    text = text.replace( /ü|ù|ú|ū|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ü|ų|ů/gi, 'u');
    text = text.replace( /ỳ|ý|ỵ|ỷ|ỹ|ÿ/gi, 'y');
    text = text.replace( /ń|ñ|ň|ņ/gi, 'n');
    text = text.replace( /ŝ|š|ś|ṡ|ș|ş|³/gi, 's');
    text = text.replace( /ř|ŗ|ŕ/gi, "r");
    text = text.replace( /ṫ|ť|ț|ŧ|ţ/gi, 't');
   
    text = text.replace( /ź|ż|ž/gi, 'z');
    text = text.replace( /ł|ĺ|ļ|ľ/gi, "l");
   
    text = text.replace( /ẃ|ẅ/gi, "w");
   
    text = text.replace(/æ/gi, "ae");
    text = text.replace(/þ/gi, "th");
    text = text.replace(/ð/gi, "dh");
    text = text.replace(/£/gi, "pound");
    text = text.replace(/¥/gi, "yen");
   
    text = text.replace(/ª/gi, "2");
    text = text.replace(/º/gi, "0");
    text = text.replace(/¿/gi, "?");
   
    text = text.replace(/µ/gi, "mu");
    text = text.replace(/®/gi, "r");
   
    //thay thế chữ hoa
    text = text.replace( /Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Ą|Å|Ā/gi, 'A');
    text = text.replace( /Ḃ|B/gi, 'B');
    text = text.replace( /Ç|Ć|Ċ|Ĉ|Č/gi, 'C');
    text = text.replace( /Đ|Ď|Ḋ/gi, 'D');
    text = text.replace( /È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ę|Ë|Ě|Ė|Ē/gi, 'E');
    text = text.replace( /Ḟ|Ƒ/gi, "F");
    text = text.replace( /Ì|Í|Ị|Ỉ|Ĩ|Ï|Į/gi, 'I');
    text = text.replace( /Ĵ|J/gi, "J");
   
    text = text.replace( /Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ø/gi, 'O');
    text = text.replace( /Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ū|Ų|Ů/gi, 'U');
    text = text.replace( /Ỳ|Ý|Ỵ|Ỷ|Ỹ|Ÿ/gi, 'Y');
    text = text.replace(/Ł/gi, "L");
    text = text.replace(/Þ/gi, "Th");
    text = text.replace(/Ṁ/gi, "M");
   
    text = text.replace( /Ń|Ñ|Ň|Ņ/gi, "N");
    text = text.replace( /Ś|Š|Ŝ|Ṡ|Ș|Ş/gi, "S");
    text = text.replace(/Æ/gi, "AE");
    text = text.replace( /Ź|Ż|Ž/gi, 'Z');
   
    text = text.replace( /Ř|R|Ŗ/gi, 'R');
    text = text.replace( /Ț|Ţ|T|Ť/gi, 'T');
    text = text.replace( /Ķ|K/gi, 'K');
    text = text.replace( /Ĺ|Ł|Ļ|Ľ/gi, 'L');
   
    text = text.replace( /Ħ|Ĥ/gi, 'H');
    text = text.replace( /Ṗ|P/gi, 'P');
    text = text.replace( /Ẁ|Ŵ|Ẃ|Ẅ/gi, 'W');
    text = text.replace( /Ģ|G|Ğ|Ĝ|Ġ/gi, 'G');
    text = text.replace( /Ŧ|Ṫ/gi, 'T');
    text = text.replace( /!|\"|#|$|%|'|̣/gi, '');
    text = text.replace( /|́|̉|$|>/gi, '');
    text = text.replace( /'<[\/\!]*?[^<>]*?>'/gi, "");
   
    text = text.replace( /----/, " ");
    text = text.replace( /---/, " ");
    text = text.replace( /--/, " ");
   
    text = text.replace( /(\-)$/gi, '');
    text = text.replace( /^(\-)/gi, '');
    text = text.replace( /(\W+)/gi, '-');
    return text.toLowerCase();
}

function removeTag(id,url)
     {
        $.ajax({
        		url: url,
        		type: 'POST',
        		dataType: 'json',
        		data:{id:id},
        		beforeSend: function() {
        		},
        		success: function(data) {
        		   $('#tag_'+id).remove();
        		},
        		error: function(e) {
        			console.log(e)
        		}
        	});
     }

function addTags(url,id, module)
{
    var tags =  $('#tag').val();
    if( tags == '' ) 
    {
      alert('Bạn chưa nhập các tag');
    }
    else
    {
        $.ajax({
    		url: url,
    		type: 'POST', 
    		dataType: 'json',
    		data:{tags:tags, id:id, module:module},
    		beforeSend: function() {
    		},
    		success: function(data) {
                $('.listTag').append(data.html);
                $('#tag').val('');
    		},
    		error: function(e) {
    			console.log(e)
    		}
    	}); 
     }
}   

function formatnumber(id){
                var text = $('#'+id).val();
                text = text.replace(/[.]/g, '');
                text = text.replace(/[a-zA-Z]/g, '');
                var length = text.length;
                var new_number = '';
                if( length > 3 )
                {
                   for( i = 0; i < length; i++ )
                    {
                        if( i % 3 == 0 && i != length  )
                        {
                            new_number = text.substr(-3, 3) + '.' + new_number;
                            var new_length = text.length - 3;
                            text       = text.substr(0, new_length);
                        }
                    }
                    if( text.length < 3 )
                    {
                       new_number = new_number.substr( 0, new_number.length - 1 );
                    }
                    
                }
                else
                {
                   new_number =  text;
                }
                $('#'+id).val(new_number);
    }  