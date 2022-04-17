<?php
get_header();
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?= $catTitle ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?= $catTitle ?></h3>
                    <div class="filter-wp fl-right">
                        <?php if ($sumProducts > 0 ) {?>
                        <p class="desc">Hiển thị <span><?php if ($sumProducts > $numPerPage ) { echo $numPerPage; } else echo $sumProducts?></span> trên <span><?= $sumProducts?></span> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="section-detail">
                    <?php if(!empty($listProduct)) {
                    ?>
                    <ul class="list-item clearfix">
                        <?php foreach ($listProduct as $product) { ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?= $product['productId']?>" title="" class="thumb">
                                <img src="admin/public/images/<?= $product['productThumb'] ?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?= $product['productId']?>" title="" class="product-name"><?= $product['productName'] ?></a>
                            <div class="price">
                                <span class="new"><?= currency_format($product['promotionPrice']) ?></span>
                                <span class="old"><?= currency_format($product['price']) ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <?php } else {?>
                    <p>Không tồn tại sản phẩm nào trong danh mục này!</p>
                    <?php }?>
                </div>
            </div>
            <?php if (!empty($listProduct)) {?>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                </div>
            </div>
            <?php }?>
        </div>
        <?php get_sidebar('category') ?>
    </div>
</div>
<?php get_footer()?>
