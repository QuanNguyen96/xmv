<div class="box_content box_xvm">
    <h1 class="box_content_tt">404 Not Found</h1>
    <p class="text-center">Hãy nhập đầy đủ thông tin của bạn để tìm kiếm</p>
    <form name="form_search" action="" method="post" onsubmit="return search_congviec_foot();">
        <div class="field">
            <div class="col-md-3 col-sm-3 col-xs-6 col-md-offset-3">
                <input type="text" name="inputsearch" value="" placeholder="Tìm kiếm" />
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <button type="submit" class="button" name="check">Xem kết quả</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    function search_congviec_foot() {
        var frm = document.form_search;
        var inputsearch  = frm.inputsearch.value;
        window.location.href = "https://www.google.com.vn/search?q=site:xemvanmenh.net "+inputsearch+"";
        return false;
    }
</script>