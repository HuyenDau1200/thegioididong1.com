<?php
get_header();
?>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=cart&action=checkout" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form method="POST" action="" name="form-checkout">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên người nhận</label>
                            <input type="text" name="fullname" id="fullname" value="<?= $infoUser['firstName'].' '.$infoUser['lastName']?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?= $infoUser['email'] ?>">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?= $infoUser['address'] ?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" value="<?= $infoUser['phoneNumber'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                    <tr>
                        <td>Sản phẩm</td>
                        <td>Tổng</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (getListBuyCart() as $item) { ?>
                    <tr class="cart-item">
                        <td class="product-name"><?= $item['productName']?><strong class="product-quantity">x <?= $item['qty']?></strong></td>
                        <td class="product-total"><?= currency_format($item['subTotal'])?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?= currency_format(getTotalCart())?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Quý khách vui lòng kiểm tra hàng trước khi nhận hàng và thanh toán!</p>
                            </td>
                        </tr>
                    </tfoot>

                </table>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng" name="order-now">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<?php get_footer()?>
