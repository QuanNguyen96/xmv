<div class="row shareButton">
    <?php
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <div class="col-facebook">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="VUGmNv3n"></script>
        <div class="fb-like" data-href="<?php echo $CurPageURL ?>" data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
    </div>
    <div class="col-chiaSeLink" >
        <p onclick="copyStringToClipboard('<?php echo $CurPageURL;?>', $(this))"><i class="iconChiaSeLink"></i>Chia sẻ link </p>
    </div>
</div>