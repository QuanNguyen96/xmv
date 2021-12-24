<div class="cpnChatFb">
    <div class="chat_fb">
        <label>
            <img src="<?php echo base_url('templates/site/images/icon/messager.png'); ?>">
        </label>
    </div>
    <div class="chat_ms">
        <div class="cpnBtnChatClose">
            <div class="btnChatClose">
                <i class="glyphicon glyphicon-off"></i>
            </div>
        </div>
        <div id="fchat" class="fchat">
            <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/xemvanmenh.net/" data-width="250" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
            </div>
            <div class="chat-single"></div>
        </div>
    </div>
</div>

        <script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
    $(document).ready(function(){
        var show_ms = true;
        $('.chat_fb').click(function() {
            if (show_ms) {
                $('.chat_ms').stop().slideDown("slow");
                show_ms = false;
            } else {
                $('.chat_ms').stop().slideUp("slow");
                show_ms = true;
            }
        });

        $('.btnChatClose').click(function() {
            $('.chat_ms').stop().slideUp("slow");
            show_ms = true;
        });
    });
</script>