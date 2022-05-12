<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wp-inner">
    <div class="wrap clearfix">
        <?php get_sidebar('user'); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?= $infoOrder['orderId'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin nhận hàng</h3>
                        <span class="detail"><?= $infoOrder['customerName'] ?> / <?= $infoOrder['customerAddress'] ?> / <?= $infoOrder['customerPhone'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail">Thanh toán tại nhà</span>
                    </li>
                    <li>
                        <h3 class="title">Trạng thái đơn hàng</h3>
                        <span class="detail"><?= $infoOrder['status'] ?></span>
                    </li>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <?php if(!empty($listItems)) {
                        $temp = 0;
                        $total = 0; $sumQtyOrdered = 0;
                    ?>
                    <table class="table info-exhibition">
                        <thead>
                        <tr>
                            <td class="thead-text">STT</td>
                            <td class="thead-text">Ảnh sản phẩm</td>
                            <td class="thead-text">Tên sản phẩm</td>
                            <td class="thead-text">Đơn giá</td>
                            <td class="thead-text">Số lượng</td>
                            <td class="thead-text">Thành tiền</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listItems as $item) {
                            $temp++;
                            $subTotal = $item['promotionPrice']*$item['qtyOrdered'];
                            $total += $subTotal;
                            $sumQtyOrdered += $item['qtyOrdered'];
                            ?>
                        <tr>
                            <td class="thead-text"><?= $temp?></td>
                            <td class="thead-text">
                                <div class="thumb">
                                    <img src="admin/public/images/<?= $item['productThumb']?>" alt="">
                                </div>
                            </td>
                            <td class="thead-text"><?= $item['productName']?></td>
                            <td class="thead-text"><?= currency_format($item['promotionPrice'])?></td>
                            <td class="thead-text"><?= $item['qtyOrdered']?></td>
                            <td class="thead-text"><?= currency_format($subTotal)?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }?>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?= $sumQtyOrdered?> sản phẩm</span>
                            <span class="total"><?= currency_format($total)?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
<?php get_footer(); ?>