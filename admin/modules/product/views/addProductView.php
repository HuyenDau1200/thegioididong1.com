<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product-code" id="product-code" value="<?= set_value('code') ?>">
                        <?php form_error('code') ?>
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product-name" id="product-name" value="<?= set_value('productName') ?>">
                        <?php form_error('name') ?>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?= set_value('price') ?>">
                        <?php form_error('price') ?>
                        <label for="promotion-price">Giá khuyến mãi</label>
                        <input type="text" name="promotion-price" id="promotion-price" value="<?= set_value('promotionPrice') ?>">
                        <label for="qty">Số lượng nhập</label>
                        <input type="text" name="qty" id="qty" value="<?= set_value('qty') ?>">
                        <?php form_error('qty') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc" class="ckeditor"><?= set_value('productDesc') ?></textarea>
                        <label for="detail">Chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?= set_value('productDetail') ?></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="<?= set_value('fileName') ?>" onchange="chooseFile(this)">
                            <img id="product-image" src='<?= (!empty($fileName)) ? "public/images/".$fileName : "public/images/img-thumb.png" ?>' >
                        </div>
                        <?php form_error('file') ?>
                        <label>Danh mục sản phẩm</label>
                        <select name="cat">
                            <option value="" selected="selected">-- Danh mục gốc --</option>
                            <?php foreach ($listCatOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('cat') ?>
                        <label>Nhà cung cấp</label>
                        <select name="manufacturer">
                            <option value="" >-- Chọn nhà cung cấp --</option>
                            <?php foreach ($listManuOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('manufacturer') ?>
                        <label>Màu sắc</label>
                        <select name="color">
                            <option value="" >-- Chọn màu sắc --</option>
                            <?php foreach ($listColorOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('color') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
    function chooseFile(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#product-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
