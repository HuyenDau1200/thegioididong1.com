<?php get_header() ?>
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            <?php get_sidebar() ?>
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Bạn có chắc chắn xóa nhà cung cấp này không?</h3>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST">
                            <label for="name">Tên nhà cung cấp</label>
                            <input type="text" name="name" id="name" value="<?= $infoManu['manufactureName'] ?>" readonly="readonly">
                            <?php form_error('name') ?>
                            <label for="address">Địa chỉ nhà cung cấp</label>
                            <input type="text" name="address" id="address" value="<?= $infoManu['address'] ?>" readonly="readonly">
                            <?php form_error('address') ?>
                            <button type="submit" name="btn-delete" id="btn-submit">Xóa</button>
                            <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>