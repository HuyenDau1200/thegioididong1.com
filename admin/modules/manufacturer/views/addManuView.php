<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới nhà cung cấp</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="name">Tên nhà cung cấp</label>
                        <input type="text" name="name" id="name" value="<?= set_value('name') ?>">
                        <?php form_error('name') ?>
                        <label for="address">Địa chỉ nhà cung cấp</label>
                        <input type="text" name="address" id="address" value="<?= set_value('address') ?>">
                        <?php form_error('address') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>