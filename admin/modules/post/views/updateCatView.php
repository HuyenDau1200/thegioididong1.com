<?php get_header()?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa danh mục bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                    <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title" value="<?php echo $info_post_cat['postCatTitle']?>">
                        <?php form_error('title')?>
                        <button type="submit" name="btn-updateCat" id="btn-submit">Cập nhật</button>
                        <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>