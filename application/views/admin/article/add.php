<?php
    $post_url  = base_url( $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method() );
    
    $link_save = $post_url.'?id='.$_GET['id'].'&ac=save';
    $link_save_close = $post_url.'?id='.$_GET['id'].'&ac=save_close';
    ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/plugins/');?>multi-select/css/multi-select.css">
<style type="text/css">
    .ms-container{ width: 90%; }
    .search-input{ width: 100%;border: 1px solid #38921b;margin-bottom: 5px;line-height: 18px;padding: 5px;box-sizing: border-box; }
    .ms-list{ border: 1px solid #38921b !important;padding: 5px !important; }
</style>
<script src="<?php echo base_url('templates/admin/plugins/');?>multi-select/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url('templates/admin/plugins/');?>multi-select/js/jquery.quicksearch.js"></script>

<article>
    <?php if( isset($error) ) echo $error; ?>
    <form name="adminForm" id="form" action="" method="post">
        <header class="header_control">
            <label>Quản lý bài viết</label>
            <ul>
                <li><a href="#" onclick="submit_form('<?php echo $link_save_close;?>')" class="button">Lưu & đóng</a></li>
                <li><a href="#" onclick="submit_form('<?php echo $link_save;?>')" class="button">Lưu tạm</a></li>
                <li><a href="<?php echo base_url($this->module_view.'/'.$this->router->fetch_class().'/index');?>" class="button">Đóng</a></li>
            </ul>
        </header>
        <div id="tabs">
            <ul class="tabs_control">
                <li><a href="#tabs-1">Cơ bản</a></li>
                <li><a href="#tabs-2">Seo google</a></li>
                <li><a href="#tabs-3">Mở rộng</a></li>
                <li><a href="#tabs-4">Bài viết cùng chuyên mục</a></li>
                <li><a href="#tabs-5">Chuyên mục liên quan</a></li>
            </ul>
            <div id="tabs-1">
                <div class="tabs_left">
                    <div class="field" id="field_title">
                        <label>Tiêu đề bài viết</label>
                        <input type="text" name="name" id="name" value="<?php echo set_value('name');?>"  />
                    </div>
                    <div class="field">
                        <label>Nội dung( trên mục lục)</label>
                        <textarea name="content_2" id="demo2" class="demo"><?php echo set_value('content_2');?></textarea>
                    </div>
                    <div class="field">
                        <label>Nội dung</label>
                        <textarea name="content" id="demo" class="demo"><?php echo set_value('content');?></textarea>
                    </div>
                    <div class="field">
                        <label>Nội dung 1</label>
                        <textarea name="content_1" id="demo1" class="demo"><?php echo set_value('content_1');?></textarea>
                    </div>
                    <div class="field">
                        <label>Mô tả ngắn</label>
                        <textarea name="summary" id="demo1" class="demo1"></textarea>
                    </div>
                </div>
                <div class="tabs_right">
                    <div class="field">
                        <label>Chuyên mục cha</label>
                        <select name="parent" class="form_control">
                            <option value="">Chọn chuyên mục cha</option>
                            <?php
                                if( !empty( $category ) ):
                                   foreach( $category as $val ):
                                       $char = '';
                                       for( $i=1; $i<= $val['level']; $i++ )
                                       {
                                          $char.='--';
                                       }
                                ?>
                            <option value="<?php echo $val['id'];?>" <?php echo set_select('parent',$val['id']) ?>  ><?php echo $char . $val['name'];?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Ảnh đại diện</label>
                        <input id="xFilePath" name="avatar" type="hidden" size="60" />
                        <div class="chose_picture" onclick="BrowseServer();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
                        <div class="avatar" id="avatar"></div>
                    </div>
                    <div class="field">
                        <label>Trạng thái</label>
                        <select name="state" class="form_control">
                            <option value="1" <?php echo set_select('state',1) ?>>Kích hoạt</option>
                            <option value="0" <?php echo set_select('state',0) ?>>Không kích hoạt</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Nổi bật</label>
                        <select name="feature" class="form_control">
                            <option value="1" <?php echo set_select('feature',0) ?>>Nổi bật</option>
                            <option value="0" <?php echo set_select('feature',0) ?>>Không nổi bật</option>
                        </select>
                    </div>
                    <div class="field tag">
                        <label>Thêm Tag</label>
                        <input type="text" name="" id="tag" value="" placeholder="Các tag cách nhau bởi dấu ," />
                        <button type="button" class="button" onclick="addTags('<?php echo base_url('admin/tags/ajax_add_tags') ?>',<?php echo $_GET['id'];?>,'article')">Thêm</button>
                        <div class="listTag">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs-2">
                <div class="tabs_left">
                    <div class="field">
                        <label>Tiêu đề (title)</label>
                        <input type="text" name="title" value="<?php echo set_value('title');?>" placeholder="Mặc định lấy tiêu đề bài viết" />
                    </div>
                    <div class="field">
                        <label>Từ khóa (keywords)</label>
                        <textarea name="keywords" id="" class=""><?php echo set_value('keywords');?></textarea>
                    </div>
                    <div class="field">
                        <label>Mô tả (description)</label>
                        <textarea name="description" id="" class=""><?php echo set_value('description');?></textarea>
                    </div>
                    <div class="field">
                        <label>Robot (follow/nofollow)</label>
                        <select name="follow" class="form_control">
                            <option value="1">follow/index</option>
                            <option value="0">nofollow/noindex</option>
                        </select>
                    </div>
                </div>
                <div class="tabs_right">
                </div>
            </div>
            <div id="tabs-3">
                <div class="field">
                    <label>Tiêu đề form</label>
                    <input type="text" name="meta_form_title" value="<?php echo set_value('meta_form_title');?>" placeholder="Mặc định lấy tiêu đề bài viết" />
                </div>
                <div class="field">
                    <label>Ảnh 1</label>
                    <input id="xFilePath1" name="image1" type="hidden" size="60" />
                    <div class="chose_picture" onclick="BrowseServerTv1();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
                    <div class="avatar1" id="avatar1"></div>
                </div>
                <div class="field">
                    <label>ALT ảnh 1</label>
                    <input type="text" name="alt1" value="<?php echo $item['alt1'];?>" placeholder="Mặc định lấy tiêu đề bài viết" />
                </div>
                <div class="field">
                    <label>Ảnh 2</label>
                    <input id="xFilePath2" name="image2" type="hidden" size="60" />
                    <div class="chose_picture" onclick="BrowseServerTv2();"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh...</div>
                    <div class="avatar2" id="avatar2"></div>
                </div>
                <div class="field">
                    <label>ALT ảnh 2</label>
                    <input type="text" name="alt2" value="<?php echo $item['alt2'];?>" placeholder="Mặc định lấy tiêu đề bài viết" />
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
                                        $checkSelect = array_key_exists($value['id'], $articleRelations)?'selected':''; 
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
                    for($i = 1; $i<=5; $i++): 
                           $input_name = 'article_relation['.$i.'][name]'; 
                           $input_link = 'article_relation['.$i.'][link]'; 
                    ?>
                       <tr>
                           <td><?php echo $i; ?></td>
                           <td><input type="text" name="<?php echo $input_name;?>" value="" class="form_control"></td>
                           <td><input type="text" name="<?php echo $input_link;?>" value="" class="form_control"></td>
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
                    for($i = 1; $i<=5; $i++): 
                           $input_name = 'article_category['.$i.'][name]'; 
                           $input_link = 'article_category['.$i.'][link]'; 
                    ?>
                       <tr>
                           <td><?php echo $i; ?></td>
                           <td><input type="text" name="<?php echo $input_name;?>" value="" class="form_control"></td>
                           <td><input type="text" name="<?php echo $input_link;?>" value="" class="form_control"></td>
                       </tr>
                    <?php endfor; ?>
                   </tbody>
               </table>
            </div> 
        </div>
    </form>
</article>
<script type="text/javascript">
    $('.searchable').multiSelect({
  selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try search'>",
  selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try research'>",
  afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});
</script>
<script>
    $( function() {
      $( "#tabs" ).tabs();
    } );
</script>
<script type="text/javascript">
    var ckeditor_config = {
              base_url       : '<?php echo base_url(); ?>',
              connector_path : 'ckfinder/user/connector',
              html_path      : 'ckfinder/user/html' 
    }
</script>
<script>
    CKEDITOR.replace( 'demo' );
    CKEDITOR.replace( 'demo1' );
    CKEDITOR.replace( 'demo2' );
    CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
    CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
    CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
    CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
</script>
<script>
    CKEDITOR.replace( 'demo1' );
    CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path;
    CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
    CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + '/' + ckeditor_config.html_path +'?type=Images';
    CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Files'; 
    CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + '/' + ckeditor_config.connector_path +'?command=QuickUpload&type=Images';
</script>

<script type="text/javascript">
    function BrowseServer()
    {
      var finder = new CKFinder();
      finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
      finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
        finder.selectActionFunction = SetFileField;
      finder.popup();
    }
    
    function SetFileField( fileUrl )
    {
        document.getElementById( 'xFilePath' ).value = fileUrl;
        var link_img = fileUrl;
        var html     = '<img src="'+link_img+'"/>';
        $('#avatar').html(html);
    }
</script>
<script type="text/javascript">
    /** Double image tv2019 **/
    // Image 01 tv2019
    function BrowseServerTv1()
    {
      var finder = new CKFinder();
      finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
      finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
        finder.selectActionFunction = SetFileFieldTv1;
      finder.popup();
    }
    
    function SetFileFieldTv1( fileUrl )
    {
        document.getElementById( 'xFilePath1' ).value = fileUrl;
        var link_img = fileUrl;
        var html     = '<img src="'+link_img+'"/>';
        $('#avatar1').html(html);
    }
    // Image 01 tv2019
    function BrowseServerTv2()
    {
      var finder = new CKFinder();
      finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
      finder.connectorPath = '<?php echo base_url('ckfinder/user/connector'); ?>';
        finder.selectActionFunction = SetFileFieldTv2;
      finder.popup();
    }
    
    function SetFileFieldTv2( fileUrl )
    {
        document.getElementById( 'xFilePath2' ).value = fileUrl;
        var link_img = fileUrl;
        var html     = '<img src="'+link_img+'"/>';
        $('#avatar2').html(html);
    }
</script>