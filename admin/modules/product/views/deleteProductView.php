<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Bạn có muốn xóa sản phẩm  không?</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product-code" id="product-code" value="<?= $infoProduct['productSku'] ?>">
                        <?php form_error('code') ?>
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product-name" id="product-name" value="<?= $infoProduct['productName'] ?>">
                        <?php form_error('name') ?>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?= $infoProduct['price'] ?>">
                        <?php form_error('price') ?>
                        <label for="promotion-price">Giá khuyến mãi</label>
                        <input type="text" name="promotion-price" id="promotion-price" value="<?= $infoProduct['promotionPrice'] ?>">
                        <label for="qty">Số lượng nhập</label>
                        <input type="text" name="qty" id="qty" value="<?= $infoProduct['qty'] ?>">
                        <?php form_error('qty') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?= $infoProduct['productDesc'] ?></textarea>
                        <label for="detail">Chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?= $infoProduct['productDetail'] ?></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="<?= $infoProduct['productThumb'] ?>" title="<?= $infoProduct['productThumb'] ?>" onchange="chooseFile(this)">
                            <img id="product-image" src="public/images/<?= $infoProduct['productThumb'] ?>" >
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="cat">
                            <option value="" selected="selected">-- Danh mục gốc --</option>
                            <?php foreach ($listCatOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" <?php if(!empty($infoProduct['catId']) && $infoProduct['catId'] == $option['value']) echo "selected='selected'"?> ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('cat') ?>
                        <label>Nhà cung cấp</label>
                        <select name="manufacturer">
                            <option value="" >-- Chọn nhà cung cấp --</option>
                            <?php foreach ($listManuOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" <?php if(!empty($infoProduct['supplierId']) && $infoProduct['supplierId'] == $option['value']) echo "selected='selected'"?> ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('manufacturer') ?>
                        <label>Màu sắc</label>
                        <select name="color">
                            <option value="" >-- Chọn màu sắc --</option>
                            <?php foreach ($listColorOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" <?php if(!empty($infoProduct['colorId']) && $infoProduct['colorId'] == $option['value']) echo "selected='selected'"?> ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('color') ?>
                        <button type="submit" name="btn-delete" id="btn-submit">Xóa</button>
                        <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
