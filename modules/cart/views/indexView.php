<?php
get_header();
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=cart" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php if (!empty($listBuyCart)) {?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Mã sản phẩm</td>
                        <td>Ảnh sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Số lượng</td>
                        <td colspan="2">Thành tiền</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listBuyCart as $item) { ?>
                        <tr>
                            <td><?= $item['productSku'] ?></td>
                            <td>
                                <a href="<?= $item['url']?>" title="" class="thumb">
                                    <img src="admin/public/images/<?= $item['productThumb'] ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?= $item['url']?>" title="" class="name-product"><?= $item['productName'] ?></a>
                            </td>
                            <td><?= currency_format($item['price']) ?></td>
                            <td>
                                <input type="number" name="qty[<?= $item['productId'] ?>]" class="num-order" data-id="<?=$item['productId']?>" value="<?=$item['qty']?>" min="1" max="10">
                            </td>
                            <td id="sub-total-<?= $item['productId'] ?>"><?= currency_format($item['subTotal']) ?></td>
                            <td>
                                <a href="<?= $item['urlDeleteCart']?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="clearfix">
                                <p id="total-price" class="fl-right">Tổng giá: <span><?= currency_format(getTotalCart())?></span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="clearfix">
                                <div class="fl-right">
                                    <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&action=delete" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
        <?php } else { ?>
            <div>
                <p>Không tồn tại sản phẩm nào trong giỏ hàng.</p>
                <p>Vui lòng click <a href="?">tại đây</a> để tiếp tục mua sắm!</p>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer()?>
