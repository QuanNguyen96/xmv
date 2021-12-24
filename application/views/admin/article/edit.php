<?php
$post_url = base_url($this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method());

$link_save = $post_url . '?id=' . $_GET['id'] . '&ac=save';
$link_save_close = $post_url . '?id=' . $_GET['id'] . '&ac=save_close';
?>
<style>
    .hoidap {
        width: 100%;
        height: 25px;
        padding: 0px 0px;
    }

    .addQuestionAnswer {
        float: right;
    }
</style>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('templates/admin/plugins/'); ?>multi-select/css/multi-select.css">
<style type="text/css">
    .ms-container {
        width: 90%;
    }

    .search-input {
        width: 100%;
        border: 1px solid #38921b;
        margin-bottom: 5px;
        line-height: 18px;
        padding: 5px;
        box-sizing: border-box;
    }

    .ms-list {
        border: 1px solid #38921b !important;
        padding: 5px !important;
    }
</style>
<script src="<?php echo base_url('templates/admin/plugins/'); ?>multi-select/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url('templates/admin/plugins/'); ?>multi-select/js/jquery.quicksearch.js"></script>

<article>
    <?php if (isset($error)) echo $error; ?>
    <?php if (isset($success)) echo $success; ?>
    <form name="adminForm" id="form" action="" method="post">
        <header class="header_control">
            <label>Quản lý bài viết</label>
            <ul>
                <li><a href="#" onclick="submit_form('<?php echo $link_save_close; ?>')" class="button">Lưu & đóng</a>
                </li>
                <li><a href="#" onclick="submit_form('<?php echo $link_save; ?>')" class="button">Lưu tạm</a></li>
                <li>
                    <a href="<?php echo base_url($this->module_view . '/' . $this->router->fetch_class() . '/index'); ?>"
                       class="button">Đóng</a></li>
            </ul>
        </header>
        <div id="tabs">
            <ul class="tabs_control">
                <li><a href="#tabs-1">Cơ bản</a></li>
                <li><a href="#tabs-2">Seo google</a></li>
                <li><a href="#tabs-3">Mở rộng</a></li>
                <li><a href="#tabs-4">Bài viết cùng chuyên mục</a></li>
                <li><a href="#tabs-5">Chuyên mục liên quan</a></li>
                <li><a href="#tabs-6">Hỏi Đáp</a></li>
            </ul>
            <div id="tabs-1">
                <div class="tabs_left">
                    <div class="field" id="field_title">
                        <label>Tiêu đề bài viết</label>
                        <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Nội dung ( trên mục lục )</label>
                        <textarea name="content_2" id="demo2" class="demo"><?php echo $item['content_2']; ?></textarea>
                    </div>
                    <div class="field">
                        <label>Nội dung</label>
                        <textarea name="content" id="demo" class="demo"><?php echo $item['content']; ?></textarea>
                    </div>
                    <div class="field">
                        <label>Nội dung 1</label>
                        <textarea name="content_1" id="demo1" class="demo"><?php echo $item['content_1']; ?></textarea>
                    </div>
                    <div class="field">
                        <label>Mô tả ngắn</label>
                        <textarea name="summary" id="demo1" class="demo1"><?php echo $item['summary']; ?></textarea>
                    </div>
                </div>
                <div class="tabs_right">
                    <div class="field">
                        <label>Chuyên mục cha</label>
                        <select name="parent" class="form_control">
                            <option value="">Chọn chuyên mục cha</option>
                            <?php
                            if (!empty($category)):
                                foreach ($category as $val):
                                    $char = '';
                                    for ($i = 1; $i <= $val['level']; $i++) {
                                        $char .= '--';
                                    }
                                    $slt = $val['id'] == $item['parent'] ? 'selected=""' : '';
                                    ?>
                                    <option value="<?php echo $val['id']; ?>" <?php echo $slt; ?> ><?php echo $char . $val['name']; ?></option>
                                <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Ảnh đại diện</label>
                        <input id="xFilePath" name="avatar" type="hidden" size="60"
                               value="<?php echo $item['avatar']; ?>"/>
                        <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera"
                                                                                aria-hidden="true"></i> Chọn ảnh...
                        </div>
                        <?php $avatar = is_file(MEDIAPATH . 'images/article/' . $item['id'] . '/' . $item['avatar']) ? '<img src="' . base_url('media/images/article/' . $item['id'] . '/' . $item['avatar']) . '" />' : ''; ?>
                        <div class="avatar" id="avatar"><?php echo $avatar; ?></div>
                    </div>
                    <div class="field">
                        <label>Trạng thái</label>
                        <select name="state" class="form_control">
                            <option value="1" <?php if ($item['state'] == 1) echo 'selected=""'; ?> >Kích hoạt</option>
                            <option value="0" <?php if ($item['state'] == 0) echo 'selected=""'; ?>>Không kích hoạt
                            </option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Nổi bật</label>
                        <select name="feature" class="form_control">
                            <option value="1" <?php if ($item['feature'] == 1) echo 'selected=""'; ?> >Nổi bật</option>
                            <option value="0" <?php if ($item['feature'] == 0) echo 'selected=""'; ?>>Không nổi bật
                            </option>
                        </select>
                    </div>
                    <div class="field tag">
                        <label>Thêm Tag</label>
                        <input type="text" name="" id="tag" value="" placeholder="Các tag cách nhau bởi dấu ,"/>
                        <button type="button" class="button"
                                onclick="addTags('<?php echo base_url('admin/tags/ajax_add_tags') ?>',<?php echo $_GET['id']; ?>,'article')">
                            Thêm
                        </button>
                        <div class="listTag">
                            <?php if (!empty($listTag)):
                                foreach ($listTag as $val):
                                    ?>
                                    <a href="#" id="<?php echo 'tag_' . $val['id']; ?>"><i class="fa fa-times-circle"
                                                                                           aria-hidden="true"
                                                                                           onclick="removeTag(<?php echo $val['id']; ?>,'<?php echo base_url('admin/tags/ajax_remove_tags') ?>')"></i><?php echo $val['name']; ?>
                                    </a>
                                <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs-2">
                <div class="tabs_left">
                    <div class="field" id="field_slug">
                        <label>Đường dẫn (link: <a target="_blank"
                                                   href="<?php echo base_url() . $item['slug'] . '-A' . $item['id'] . '.html'; ?>"><?php echo base_url(); ?>
                                <span class="slug"><?php echo $item['slug'] . '-A' . $item['id'] . '.html'; ?></span>)</a></label>
                        <input type="text" name="slug" id="slug" value="<?php echo $item['slug']; ?>" placeholder=""/>
                    </div>
                    <div class="field">
                        <label>Tiêu đề (title)</label>
                        <input type="text" name="title" value="<?php echo $item['title']; ?>"
                               placeholder="Mặc định lấy tiêu đề bài viết"/>
                    </div>
                    <div class="field">
                        <label>Từ khóa (keywords)</label>
                        <textarea name="keywords" id="" class=""><?php echo $item['keywords']; ?></textarea>
                    </div>
                    <div class="field">
                        <label>Mô tả (description)</label>
                        <textarea name="description" id="" class=""><?php echo $item['description']; ?></textarea>
                    </div>
                    <div class="field">
                        <label>Robot (follow/nofollow)</label>
                        <select name="follow" class="form_control">
                            <option value="1" <?php if ($item['follow'] == 1) echo 'selected=""'; ?> >follow/index
                            </option>
                            <option value="0" <?php if ($item['follow'] == 0) echo 'selected=""'; ?> >nofollow/noindex
                            </option>
                        </select>
                    </div>
                </div>
                <div class="tabs_right">
                </div>
            </div>
            <div id="tabs-3">
                <div class="field">
                    <label>Tiêu đề form tử vi</label>
                    <input type="text" name="meta_form_title" value="<?php echo $item['meta_form_title']; ?>"
                           placeholder="Mặc định lấy tiêu đề bài viết"/>
                </div>
                <div class="field">
                    <label>Ảnh 1</label>
                    <input id="xFilePath1" name="image1" type="hidden" size="60"
                           value="<?php echo $item['image1']; ?>"/>
                    <div class="chose_picture" onclick="BrowseServerTv1();"><i class="fa fa-camera"
                                                                               aria-hidden="true"></i> Chọn ảnh...
                    </div>
                    <?php $image1 = is_file(MEDIAPATH . 'images/article/' . $item['id'] . '/' . $item['image1']) ? '<img src="' . base_url('media/images/article/' . $item['id'] . '/' . $item['image1']) . '" />' : ''; ?>
                    <div class="avatar1" id="avatar1"><?php echo $image1; ?></div>
                </div>
                <div class="field">
                    <label>ALT ảnh 1</label>
                    <input type="text" name="alt1" value="<?php echo $item['alt1']; ?>"
                           placeholder="Mặc định lấy tiêu đề bài viết"/>
                </div>
                <div class="field">
                    <label>Ảnh 2</label>
                    <input id="xFilePath2" name="image2" type="hidden" size="60"
                           value="<?php echo $item['image2']; ?>"/>
                    <div class="chose_picture" onclick="BrowseServerTv2();"><i class="fa fa-camera"
                                                                               aria-hidden="true"></i> Chọn ảnh...
                    </div>
                    <?php $image2 = is_file(MEDIAPATH . 'images/article/' . $item['id'] . '/' . $item['image2']) ? '<img src="' . base_url('media/images/article/' . $item['id'] . '/' . $item['image2']) . '" />' : ''; ?>
                    <div class="avatar2" id="avatar2"><?php echo $image2; ?></div>
                </div>
                <div class="field">
                    <label>ALT ảnh 2</label>
                    <input type="text" name="alt2" value="<?php echo $item['alt2']; ?>"
                           placeholder="Mặc định lấy tiêu đề bài viết"/>
                </div>
            </div>
            <div id="tabs-4">
                <?php if (isset($showHere)): ?>
                    <div class="">
                        <p><label><b style="font-size: 16px;margin-bottom: 10px;">Lựa chọn bài viết</b></label></p>
                        <select multiple="" class="searchable" name="article_relations[]" id="303multiselect">
                            <?php if ($articleAll): ?>
                                <?php foreach ($articleAll as $key => $value): ?>
                                    <?php
                                    $checkSelect = array_key_exists($value['id'], $articleRelations) ? 'selected' : '';
                                    ?>
                                    <option value='<?php echo $value['id'] ?>' <?php echo $checkSelect; ?>><?php echo $value['name'] ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                <?php endif ?>
                <table class="table table-border">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $arr_article_relation = array();
                    if ($item['article_relation'] != null)
                        $arr_article_relation = unserialize($item['article_relation']);
                    for ($i = 1; $i <= 5; $i++):
                        $input_name = 'article_relation[' . $i . '][name]';
                        $input_link = 'article_relation[' . $i . '][link]';
                        $input_name_value = isset($arr_article_relation[$i]['name']) ? $arr_article_relation[$i]['name'] : '';
                        $input_link_value = isset($arr_article_relation[$i]['link']) ? $arr_article_relation[$i]['link'] : '';
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><input type="text" name="<?php echo $input_name; ?>"
                                       value="<?php echo $input_name_value; ?>" class="form_control"></td>
                            <td><input type="text" name="<?php echo $input_link; ?>"
                                       value="<?php echo $input_link_value; ?>" class="form_control"></td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            <div id="tabs-5">
                <table class="table table-border">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $arr_article_category = array();
                    if ($item['article_category'] != null)
                        $arr_article_category = unserialize($item['article_category']);
                    for ($i = 1; $i <= 5; $i++):
                        $input_name = 'article_category[' . $i . '][name]';
                        $input_link = 'article_category[' . $i . '][link]';
                        $input_name_value = isset($arr_article_category[$i]['name']) ? $arr_article_category[$i]['name'] : '';
                        $input_link_value = isset($arr_article_category[$i]['link']) ? $arr_article_category[$i]['link'] : '';
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><input type="text" name="<?php echo $input_name; ?>"
                                       value="<?php echo $input_name_value; ?>" class="form_control"></td>
                            <td><input type="text" name="<?php echo $input_link; ?>"
                                       value="<?php echo $input_link_value; ?>" class="form_control"></td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            <div id="tabs-6">
                <button type="button" id="themHoiDap" class="button addQuestionAnswer">Thêm hỏi đáp</button>

                <table class="table table-border">
                    <thead>
                    <tr>
                        <th style="width: 45%;">Hỏi</th>
                        <th style="width: 45%;">Đáp</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="questionAnswer">
                    <?php
                    if(isset($item['questionAnswer'])){
                    $questionAnswers = json_decode($item['questionAnswer']);
                    ?>
                    <?php
                    if(!empty($questionAnswers)){
                    foreach($questionAnswers as $questionAnswer){?>
                        <tr>
                            <td><input type="text" name="hoi[]" value="<?php echo $questionAnswer->question;?>" class="form_control hoidap"></td>
                            <td><textarea style="height: 70px" type="text" name="dap[]"  class="form_control hoidap"><?php echo $questionAnswer->answer;?> </textarea></td>
                            <td width="50px">
                                <button type="button" class="button addQuestionAnswer">Xóa</button>
                            </td>
                        </tr>
                    <?php }}} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
    </form>
</article>
<script type="text/javascript">
    $('.searchable').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try search'>",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try research'>",
        afterInit: function (ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function (e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function (e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function () {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function () {
            this.qs1.cache();
            this.qs2.cache();
        }
    });
</script>
<script>
    $(function () {
        $("#tabs").tabs();
        $('#themHoiDap').click(function(){
            string = '<tr><td><input type="text" name="hoi[]" value="" class="form_control hoidap"></td> <td><textarea style="height: 70px" name="dap[]" class="form_control hoidap"></textarea></td> <td width="50px"> <button type="button" class="button addQuestionAnswer">Xóa</button> </td> </tr>';
            $('#questionAnswer').append(string);
        });

        $('#questionAnswer').on('click','.addQuestionAnswer',function(){
            $(this).parent().parent().remove();
        })

    });
</script>
<script type="text/javascript">
    var ckeditor_config = {
        base_url: '<?php echo base_url(); ?>',
        connector_path: 'ckfinder/user/connector',
        html_path: 'ckfinder/user/html'
    }
</script>
<script>
    CKEDITOR.replace('demo');
    CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
    CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path + '?type=Images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path + '?type=Images';
    CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path + '?command=QuickUpload&type=Files';
    CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path + '?command=QuickUpload&type=Images';
</script>
<script>
    CKEDITOR.replace('demo1');
    CKEDITOR.replace('demo2');
    CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
    CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path + '?type=Images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path + '?type=Images';
    CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path + '?command=QuickUpload&type=Files';
    CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path + '?command=QuickUpload&type=Images';
</script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
        finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }

    function SetFileField(fileUrl) {
        document.getElementById('xFilePath').value = fileUrl;
        var link_img = fileUrl;
        var html = '<img src="' + link_img + '"  style="max-width:100%; max-height:200px" />';
        $('#avatar').html(html);
    }
</script>
<script type="text/javascript">
    /** Double image tv2019 **/
    // Image 01 tv2019
    function BrowseServerTv1() {
        var finder = new CKFinder();
        finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
        finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
        finder.selectActionFunction = SetFileFieldTv1;
        finder.popup();
    }

    function SetFileFieldTv1(fileUrl) {
        document.getElementById('xFilePath1').value = fileUrl;
        var link_img = fileUrl;
        var html = '<img src="' + link_img + '"  style="max-width:100%; max-height:200px" />';
        $('#avatar1').html(html);
    }

    // Image 02 tv2019
    function BrowseServerTv2() {
        var finder = new CKFinder();
        finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
        finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
        finder.selectActionFunction = SetFileFieldTv2;
        finder.popup();
    }

    function SetFileFieldTv2(fileUrl) {
        document.getElementById('xFilePath2').value = fileUrl;
        var link_img = fileUrl;
        var html = '<img src="' + link_img + '"  style="max-width:100%; max-height:200px" />';
        $('#avatar2').html(html);
    }
</script>
<script type="text/javascript">
    $('#quick_add_category').click(function () {
        $('#add_category').slideToggle();
    });
</script>
<script>
    function add_category() {
        var category = $('#add_category input').val();
        var parent = $("#add_category select option:selected").val();
        $.ajax({
            url: '<?php echo base_url('admin/article/ajax_add_category') ?>', // form action url
            type: 'POST', // form submit method get/post
            dataType: 'json', // request type html/json/xml
            data: {category: category, parent: parent}, // serialize form data
            beforeSend: function () {
                //submit.html('Sending....'); // change submit button textư
                $('.message').remove();
            },
            success: function (data) {
                if (data.state == 'error') {
                    $('#add_category').append('<li class="message">' + data.message + '</li>');
                } else {
                    $('#select_category').append(data.message);
                    $('#add_category').slideUp();
                }
            },
            error: function (e) {
                console.log(e)
            }
        });
        //$('#add_category').slideUp();
    }

</script>