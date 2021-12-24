<!-- Comment member process -->
<?php
    $sh_recursive_comment = $this->sh_comment_lib->getByTheme($this->uri->uri_string());
?>
<div class="row">
    <div class="col-md-12">
        
        <section class="appComment">
            <section class="lbMsgCommentAuto0"></section>
            <header class="headerComment formCommentAuto">
                <form name="form_comment_auto_main" action="#" method="post" onsubmit="submit_form_comment_auto('main');return false;">
                    <div class="topForm">
                        <input type="hidden" value="<?php echo $this->uri->uri_string(); ?>" name="url_id"/><input type="hidden" value="0" name="parent_id"/>
                        <textarea class="dropfirst textarea" id="content" name="content" style="overflow-y: visible;" placeholder="Mời bạn nhập Bình luận" ></textarea>
                    </div>
                    <div class="centerForm clearfix">
                        <div class="cmt_right">                        
                            <button class="btnSend" id="btnSend">Gửi</button>
                        </div>
                    </div>
                    <div class="bottomForm">
                        <div class="midcmt">        
                            
                        </div>
                    </div>
                </form>
            </header>
            <article class="bodyComment">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <p style="font-size: 18px;font-weight: bold;text-align: center;padding: 0px;text-transform: uppercase;font-style: normal;">Bình luận</p>
                    </div>
                    <div class="panel-body">
                        <!-- comment DF -->
                        <?php if (isset($getComment) and $getComment): ?>
                            <?php echo $getComment; ?>
                        <?php endif ?>
                        <!-- end -->
                        <?php $number_order = 0; ?>
                        <?php if ($sh_recursive_comment['recordComment']): ?>
                            <?php foreach ($sh_recursive_comment['recordComment'] as $value): ?>
                                <?php
                                    $timeReport = report_for_time(strtotime($value['created_date']), time());
                                ?>
                                <div class="media <?php echo $number_order>=5?'hidden_order':''; ?>" data-comment = "<?php echo $number_order++; ?>">
                                    <span class="pull-left">
                                        <?php if ($value['is_admin']): ?>
                                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/icon_admin_64.jpg'); ?>" style="width: 32px; height: 32px;border-radius: 32px;">
                                        <?php else: ?>
                                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/person-icon.png'); ?>" style="width: 32px; height: 32px;">
                                        <?php endif ?>
                                    </span>
                                    <div class="media-body">
                                        <h4 class="media-heading" style="color: #8e0606;font-weight: bold;"><?php echo $value['is_admin']?$value['admin_name']:$value['member_name']; ?>&nbsp<?php echo $value['is_admin']?'<b class="qtv">Quản trị viên</b>':''; ?></h4>
                                        <div class="">
                                            <p style="text-align: justify;"><?php echo $value['content']; ?></p>
                                        </div>
                                        <div class="cpnAns">
                                            <div class="actionuser" data-cl="0">
                                                <a href="#" class="respondent" data-comment-id="<?php echo $value['id'] ?>"><i class="glyphicon glyphicon-comment"></i>&nbspTrả lời</a>
                                            </div>
                                        </div>
                                        <?php if ($value['children']): ?>
                                            <?php foreach ($value['children'] as $valueChid1): ?>
                                                <?php
                                                    $timeReport = report_for_time(strtotime($valueChid1['created_date']), time());
                                                ?>
                                                <div class="media">
                                                    <span class="pull-left">
                                                        <?php if ($valueChid1['is_admin']): ?>
                                                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/icon_admin_64.jpg'); ?>" style="width: 32px; height: 32px;border-radius: 32px;">
                                                        <?php else: ?>
                                                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/person-icon.png'); ?>" style="width: 32px; height: 32px;">
                                                        <?php endif ?>
                                                    </span>
                                                    <div class="media-body">
                                                        <h4 class="media-heading" style="color: #8e0606;font-weight: bold;"><?php echo $valueChid1['is_admin']?$valueChid1['admin_name']:$valueChid1['member_name']; ?>&nbsp<?php echo $valueChid1['is_admin']?'<b class="qtv">Quản trị viên</b>':''; ?></h4>
                                                        <div class="">
                                                            <p style="text-align: justify;"><?php echo $valueChid1['content'] ?></p>
                                                        </div>
                                                        <div class="cpnAns">
                                                            <div class="actionuser" data-cl="0">
                                                                <a href="#" data-comment-id="<?php echo $valueChid1['id'] ?>" class="respondent"><i class="glyphicon glyphicon-comment"></i>&nbspTrả lời</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <section class="commentFormJs">
                                                
                                                    </section>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                    <section class="commentFormJs">
                                        
                                    </section>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                    <div class="panel-footer text-center">
                        <?php
                            if ($number_order > 5) {
                                ?>
                                <div class="type-1">
                                    <a href="#" class="btn_nice btn_nice-2 show_order">
                                        <span class="txt">Xem thêm</span>
                                        <span class="round"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    </a>
                                </div>
                                <?php
                            }
                        ?>
                        <!-- <section>
                            <a href="#" id="view_more_page">
                                Xem thêm more
                            </a>
                        </section> -->
                        <section class="wrap_comment hidden">
                            <div class="pagcomment">
                                <span class="active">1</span>
                                <span onclick="listcomment(2,1,2);return false;" title="trang 2">2</span>
                                <span onclick="listcomment(2,1,3);return false;" title="trang 3">3</span>
                                <span onclick="listcomment(2,1,4);return false;" title="trang 4">4</span>
                                <span>...</span>
                                <span onclick="listcomment(2,1,132);return false;" title="trang 132">132</span>
                                <span onclick="listcomment(2,1,2);return false;" title="trang 2">»</span>
                            </div>
                        </section>
                    </div>
                </div>
            </article>
        </section>
        <section class="plugInCommentPopup">
            <div class="ajaxcomment">
                <div id="loadcomment">
                    <div class="wrap_popup">
                        <div class="titlebar">THÔNG TIN NGƯỜI GỬI<a href="#" class="back"><i class="glyphicon glyphicon-off"></i></a></div>
                        <div class="forminfo">
                            <form name="form_comment_acc_permit" action="#" method="post" onsubmit="submit_form_acc_permit_pop();return false;" id="form_comment_acc_permit">
                                <div class="cgd clearfix"> 
                                    <select name="gender">
                                        <option value="1">Anh</option>
                                        <option value="0">Chị</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Họ tên (bắt buộc)" class="cfmUserName" name="name">        
                                <input type="text" placeholder="Email (để nhận phản hồi qua Email)" class="cfmUserEmail" name="email">        
                                <input type="text" placeholder="Số điện thoại (để chuyên gia giải đáp trực tiếp)" class="cfmPhone" name="tel">   
                                <input type="hidden" id="set_typeform" name="typeform" value="">             
                                <div class="lbMsgPopCmt"></div>        
                                <button type="submit">Gửi bình luận</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<style type="text/css">
    
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.respondent').click(function(){
            var iCommentId = $(this).attr('data-comment-id');

            // Empty form
            $('.commentFormJs').html("");

            // Add form
            $(this).parent().parent().parent().parent('.media').children('.commentFormJs').html('<section class="lbMsgCommentAuto'+iCommentId+'"></section><header class="headerComment formCommentAuto"><form name="form_comment_auto" action="#" method="post" onsubmit="submit_form_comment_auto();return false;"> <div class="topForm"><input type="hidden" value="<?php echo $this->uri->uri_string(); ?>" name="url_id"/><input type="hidden" value="'+iCommentId+'" name="parent_id"/> <textarea  class="dropfirst textarea textarea_auto_forcus" id="content" name="content" style="overflow-y: visible;"></textarea> </div><div class="centerForm clearfix"> <div class="cmt_right"> <button type="submit" class="btnSend" id="btnSend">Gửi</button> </div></div></form></header>');
            $('.textarea_auto_forcus').focus();

            
            return false;
        });

        /** Close form user input **/
        $('.back').click(function(){
            $('.plugInCommentPopup').fadeOut();
            return false;
        });
    });

    /** Form submit comment auto **/
    function submit_form_comment_auto(typeform = ''){
        if (typeform == '') {
            var frm = document.form_comment_auto;
        }
        else{
            var frm = document.form_comment_auto_main;
        }
        
        var iParent_id  = frm.parent_id.value;
        var iUrl_id  = frm.url_id.value;
        var iContent  = frm.content.value;
        $('#set_typeform').val(typeform); 
        $.post(
            "<?php echo base_url('sh-process-comment-auto.html'); ?>",
            {
                parent_id: iParent_id,
                url_id: iUrl_id,
                content: iContent,
            },
            function(data,status){ 
                // Submit ok
                if (status == "success") {
                    // Nhan data response
                    data_response = data.response;
                    data_msg = data.msg;
                    data_acc = data.acc;

                    if (data_acc == 'yes') {
                        if (data_msg == 1) {
                            $('.lbMsgCommentAuto'+iParent_id).html(data_response);
                            $('#content').val('');
                        }
                        else{
                            $('.lbMsgCommentAuto'+iParent_id).html(data_response);
                        }
                    }
                    else{
                        // Reset form and clear validation
                        $("#form_comment_acc_permit")[0].reset();
                        $('.lbMsgPopCmt').html(data_response);

                        // Show form acc permit
                        $('.plugInCommentPopup').fadeIn('slow');
                    }
                }
                else{ 
                    // Else not ok
                    $('.lbMsgCommentAuto'+iParent_id).html('<p class="alert alert-warning">Có lỗi từ hệ thống vui lòng thử lại sau ít phút nhé!</p>');
                }
                // alert("Data: " + data + "\nStatus: " + status);
            },
            "json",
        );
    }

    /** Form submit acc permit **/
    function submit_form_acc_permit_pop(){

        var frm = document.form_comment_acc_permit;
        var iName  = frm.name.value;
        var iEmail  = frm.email.value;
        var iTel  = frm.tel.value;
        var iGender  = frm.gender.value;

        $.post(
            "<?php echo base_url('sh-process-acc-permittion.html'); ?>",
            {
                name: iName,
                email: iEmail,
                tel: iTel,
                gender: iGender,
            },
            function(data,status){
                // Submit ok
                if (status == "success") {
                    // Nhan data response
                    data_response = data.response;
                    data_msg = data.msg;
                    if (data_msg == 1) {
                        $('.plugInCommentPopup').fadeOut('slow');
                        // if (data_msg == 1) {
                        //     $('.lbMsgCommentAuto'+iParent_id).html(data_response);
                        //     $('.formCommentAuto form').fadeOut('slow');
                        // }
                        // else{
                        //     $('.lbMsgCommentAuto'+iParent_id).html(data_response);
                        // }
                    }
                    else{

                        $('.lbMsgPopCmt').html(data_response);
                    }
                    var typeform = $('#set_typeform').val(typeform);
                    submit_form_comment_auto(typeform); 
                 
                }
                else{ 
                    // Else not ok
                    $('.lbMsgPopCmt').html('<p class="alert alert-warning">Có lỗi từ hệ thống vui lòng thử lại sau ít phút nhé!</p>');
                }
                // alert("Data: " + data + "\nStatus: " + status);
            },
            "json",
        );
    }

    var is_show = 5;
    $('.show_order').click(function(){
        for(i = is_show ; i < is_show+10 ; i++){
            $(".hidden_order[data-comment='"+i+"']").fadeIn('slow');
        }
        is_show = is_show+10;
        return false;
    });
</script>