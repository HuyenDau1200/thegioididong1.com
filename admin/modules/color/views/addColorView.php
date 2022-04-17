<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới màu sắc</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="code">Mã màu</label>
                        <input type="text" name="code" id="code" value="<?= set_value('code') ?>">
                        <?php form_error('code') ?>
                        <label for="color-name">Tên màu</label>
                        <input type="text" name="color-name" id="color-name" value="<?= set_value('colorName') ?>">
                        <?php form_error('name') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>