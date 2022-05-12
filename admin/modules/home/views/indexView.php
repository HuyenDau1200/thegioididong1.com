<?php get_header() ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Tổng quan</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <ul class="dashboard">
                        <li class="count-orders">
                            <img src="public/images/count-order.png" />
                            <p class="number"><span><?= sumOrders()?></span> đơn hàng</p>
                            <p class="desc">Tổng số đơn hàng</p>
                        </li>
                        <li class="products">
                            <img src="public/images/product.png" />
                            <p class="number"><span><?=sumProducts()?></span> sản phẩm</p>
                            <p class="desc">Tổng số sản phẩm</p>
                        </li>
                        <li class="sales-day">
                            <img src="public/images/customer.png" />
                            <p class="number"><span><?= sumCustomer()?></span> khách hàng</p>
                            <p class="desc">Tổng số khách hàng</p>
                        </li>
                        <li class="sales-month">
                            <img src="public/images/sales.png" />
                            <p class="number"><span><?=currency_format(sumOrderMonth(), 'Đ')?></span> </p>
                            <p class="desc">Doanh thu tháng này</p>
                        </li>
                    </ul>
                    <div class="table-responsive">
                       <div class="section" id="title-page">
                        <div class="clearfix">
                            <h3 id="index" class="fl-left"> 3 ĐƠN HÀNG GẦN ĐÂY NHẤT</h3>
                        </div>
                    </div>
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><span class="thead-text">Mã đơn hàng</span></td>
                                <td><span class="thead-text">Họ tên người nhận</span></td>
                                <td><span class="thead-text">Email</span></td>
                                <td><span class="thead-text">Số lượng mua</span></td>
                                <td><span class="thead-text">Tổng tiền</span></td>
                                <td><span class="thead-text">Thời gian đặt hàng</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
                            </tr>
                            </thead>
                            <?php if(!empty($listOrder)) {
                                ?>
                                <tbody>
                                <?php foreach($listOrder as $order){
                                    ?>
                                    <tr>
                                        <td><span class="tbody-text"><?= $order['orderId']?></span></td>
                                        <td><span class="tbody-text"><?= $order['customerName']?></span></td>
                                        <td><span class="tbody-text"><?= $order['customerEmail']?></span></td>
                                        <td><span class="tbody-text"><?= $order['qtyOrdered']?></span></td>
                                        <td><span class="tbody-text"><?= currency_format($order['total'])?></span></td>
                                        <td><span class="tbody-text"><?= $order['orderCreatedAt']?></span></td>
                                        <td><span class="tbody-text"><?= $order['status']?></span></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            <?php } ?>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
