<?php get_header() ?>
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            <?php get_sidebar() ?>
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Bạn có chắc chắn muốn xóa màu này không?</h3>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST">
                            <label for="code">Mã màu</label>
                            <input type="text" name="code" id="code" value="<?= $infoColor['colorCode'] ?>">
                            <label for="color-name">Tên màu</label>
                            <input type="text" name="color-name" id="color-name" value="<?= $infoColor['colorName'] ?>">
                            <button type="submit" name="btn-delete" id="btn-submit">Xóa</button>
                            <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>