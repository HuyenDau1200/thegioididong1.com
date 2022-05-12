<?php get_header() ?>
<div id="main-content-wp" class="info-account-page clearfix">
    <div class="wp-inner">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="view-order">Danh sách đơn hàng đã đặt</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=product">Tất cả <span class="count">(<?= $sumOrders ?>) |</span></a></li>
                            <li class="in-stock"><a href="">Đặt hàng thành công <span class="count">(<?= sumOrderByStatus(getEmailByUsername(user_login()), DAT_HANG_THANH_CONG) ?>) |</span></a></li>
                            <li class="out-of-stock"><a href="">Đang xử lý <span class="count">(<?= sumOrderByStatus(getEmailByUsername(user_login()), DANG_XU_LY) ?>) | </span></a></li>
                            <li class="out-of-stock"><a href="">Giao hàng thành công <span class="count">(<?= sumOrderByStatus(getEmailByUsername(user_login()), GIAO_THANH_CONG)?>) | </span></a></li>
                            <li class="out-of-stock"><a href="">Đã hủy <span class="count">(<?= sumOrderByStatus(getEmailByUsername(user_login()), DA_HUY)?>)  </span></a></li>
                        </ul>

                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><span class="thead-text">STT</td>
                                <td><span class="thead-text">Mã đơn hàng</span></td>
                                <td><span class="thead-text">Họ tên người nhận</span></td>
                                <td><span class="thead-text">Email</span></td>
                                <td><span class="thead-text">Địa chỉ</span></td>
                                <td><span class="thead-text">Số điện thoại</span></td>
                                <td><span class="thead-text">Ghi chú</span></td>
                                <td><span class="thead-text">Số lượng mua</span></td>
                                <td><span class="thead-text">Tổng tiền</span></td>
                                <td><span class="thead-text">Ngày đặt hàng</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
                                <td><span class="thead-text">Thao tác</span></td>
                            </tr>
                            </thead>
                            <?php if(!empty($listOrder)) {
                                $temp = 0;
                                ?>
                                <tbody>
                                <?php foreach($listOrder as $order){
                                    $temp++;?>
                                    <tr>
                                        <td><span class="tbody-text"><?= $temp ?></span> </td>
                                        <td><span class="tbody-text"><?= $order['orderId']?></span></td>
                                        <td><span class="tbody-text"><?= $order['customerName']?></span></td>
                                        <td><span class="tbody-text"><?= $order['customerEmail']?></span></td>
                                        <td><span class="tbody-text"><?= $order['customerAddress']?></span></td>
                                        <td><span class="tbody-text"><?= $order['customerPhone']?></span></td>
                                        <td><span class="tbody-text"><?= $order['note']?></span></td>
                                        <td><span class="tbody-text"><?= $order['qtyOrdered']?></span></td>
                                        <td><span class="tbody-text"><?= currency_format($order['total'])?></span></td>
                                        <td><span class="tbody-text"><?= $order['orderCreatedAt']?></span></td>
                                        <td><span class="tbody-text"><?= $order['status']?></span></td>
                                        <td>
                                            <ul class="list-operation">
                                                <li><a href="?mod=users&controller=order&action=detail&id=<?= $order['orderId']?>" title="Xem chi tiết" class="edit">Xem chi tiết</a></li>
                                                <?php if(checkStatusById($order['orderId']) != DA_HUY && checkStatusById($order['orderId']) == DAT_HANG_THANH_CONG) { ?>
                                                    <li><a href="?mod=users&controller=order&action=cancel&id=<?= $order['orderId']?>&st=<?=DA_HUY?>" title="Hủy đơn" class="update">Hủy đơn</a></li>
                                                <?php }?>
                                            </ul>
                                        </td>
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
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php if($numPage > 1) {
                        echo get_pagging($numPage, $page, "?mod=users&controller=order&action=viewOrder");
                    }?>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php get_footer(); ?>
