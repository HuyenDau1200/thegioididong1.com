<?php
get_header();
?>
<div id="main-content-wp" class="clearfix detail-product-page">
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
                    <li>
                        <a href="" title=""><?= $infoProduct['productName'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" class="main-thumb" src="admin/public/images/<?= $infoProduct['productThumb']?>" data-zoom-image="admin/public/images/<?= $infoProduct['productThumb']?>"/>
                        </a>
                       <div id="list-thumb">
                            <a href="" data-image="admin/public/images/<?= $infoProduct['productThumb']?>" data-zoom-image="admin/public/images/<?= $infoProduct['productThumb']?>">
                                <img id="zoom" src="admin/public/images/<?= $infoProduct['productThumb']?>" />
                            </a>
                        </div>
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?= $infoProduct['productName'] ?></h3>
                        <div class="desc">
                            <?= $infoProduct['productDesc'] ?>
                        </div>
                        <div class="num-product">
                            Sản phẩm:
                            <?php if($infoProduct['qty'] > 0) {?>
                            <span class="status">Còn <?= $infoProduct['qty']?> sản phẩm</span>
                            <?php } else {?>
                            <span class="status">Hết hàng</span>
                            <?php }?>
                        </div>
                        <p class="price"><?= currency_format($infoProduct['promotionPrice'])?></p>
                        <a href="<?= $infoProduct['url_add_cart'] ?>" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                   <?= $infoProduct['productDetail']?>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <?php if($listProductRelated) { ?>
                    <ul class="list-item">
                        <?php foreach ($listProductRelated as $product) {?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?= $product['productId'] ?>" title="" class="thumb">
                                <img src="admin/public/images/<?= $product['productThumb']?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?= $product['productId'] ?>" title="" class="product-name"><?= $product['productName']?></a>
                            <div class="price">
                                <span class="new"><?= currency_format($product['promotionPrice'])?></span>
                                <span class="old"><?= currency_format($product['price'])?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=add&id=<?= $product['productId']?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php get_sidebar() ?>
    </div>
</div>
<?php get_footer()?>
