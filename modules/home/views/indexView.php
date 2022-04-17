<?php
get_header();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/sl0.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/sl1.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/sl2.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/sl3.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.1234
                            </p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với vô vàn ưu đãi khủng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <?php if(!empty($listTopProduct)) {?>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($listTopProduct as $product) { ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?= $product['productId']?>" title="" class="thumb">
                                <img src="admin/public/images/<?= $product['productThumb']?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?= $product['productId']?>" title="" class="product-name"><?= $product['productName']?></a>
                            <div class="price">
                                <span class="new"><?= currency_format($product['promotionPrice'])?></span>
                                <span class="old"><?= currency_format($product['price'])?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <?php if (!empty($listPhone)) {?>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($listPhone as $phone) { ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?= $phone['productId']?>" title="" class="thumb">
                                <img src="admin/public/images/<?= $phone['productThumb']?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?= $phone['productId']?>" title="" class="product-name"><?= $phone['productName']?></a>
                            <div class="price">
                                <span class="new"><?= currency_format($phone['promotionPrice'])?></span>
                                <span class="old"><?= currency_format($phone['price'])?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=order" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php } ?>

            <?php if(!empty($listLaptop)) { ?>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($listLaptop as $laptop) { ?>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="admin/public/images/<?= $laptop['productThumb']?>">
                            </a>
                            <a href="" title="" class="product-name"><?= $laptop['productName']?></a>
                            <div class="price">
                                <span class="new"><?= currency_format($laptop['promotionPrice'])?></span>
                                <span class="old"><?= currency_format($laptop['price'])?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <?php } ?>

        </div>
        <?php get_sidebar() ?>
    </div>
</div>
<?php get_footer()?>
