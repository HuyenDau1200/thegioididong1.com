<?php get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Bạn có chắc chắn muốn xóa danh mục này?</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title" value="<?php echo $info_post_cat['postCatTitle']?>" readonly="readonly">
                        <button type="submit" name="btn-deleteCat" id="btn-submit">Xóa</button>
                        <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>