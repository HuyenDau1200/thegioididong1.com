<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php set_value('title') ?>">
                        <?php form_error('title') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php set_value('desc') ?></textarea>
                        <?php form_error('desc') ?>
                        <label for="detail">Nội dung chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor">
                        <?php set_value('detail') ?>
                        </textarea></br>
                        <?php form_error('detail') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>