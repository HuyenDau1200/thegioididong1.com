<?php get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo $info_page['pageTitle'] ?>">
                        <?php form_error('title') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php echo $info_page['pageDesc'] ?></textarea>
                        <?php form_error('desc') ?>
                        <label for="detail">Nội dung chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor">
                        <?php echo $info_page['pageDetail'] ?>
                        </textarea></br>
                        <?php form_error('detail') ?>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>