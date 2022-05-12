<?php get_header() ?>
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            <?php get_sidebar(); ?>
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                <li class="all"><a href="?mod=product">Tất cả <span class="count">(<?= $sumOrders ?>) |</span></a></li>
                                <li class="in-stock"><a href="">Đặt hàng thành công <span class="count">(<?= sumOrderByStatus(DAT_HANG_THANH_CONG) ?>) |</span></a></li>
                                <li class="out-of-stock"><a href="">Đang xử lý <span class="count">(<?= sumOrderByStatus(DANG_XU_LY) ?>) | </span></a></li>
                                <li class="out-of-stock"><a href="">Giao hàng thành công <span class="count">(<?= sumOrderByStatus(GIAO_THANH_CONG)?>) | </span></a></li>
                                <li class="out-of-stock"><a href="">Đã hủy <span class="count">(<?= sumOrderByStatus(DA_HUY)?>) | </span></a></li>
                            </ul>
                            <form method="GET" class="form-s fl-right">
                                <input type="text" name="s" id="s">
                                <input type="submit" name="sm_s" value="Tìm kiếm">
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
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
                                    <td><span class="thead-text">Ngày cập nhật</span></td>
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
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
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
                                            <td><span class="tbody-text"><?= $order['orderUpdatedAt']?></span></td>
                                            <td><span class="tbody-text"><?= $order['status']?></span></td>
                                            <td class="clearfix">
                                                <ul class="list-operation">
                                                    <li><a href="?mod=order&action=detail&id=<?= $order['orderId']?>" title="Xem chi tiết" class="edit">Xem chi tiết</a></li>
                                                    <?php if(checkStatusById($order['orderId']) != DANG_XU_LY && checkStatusById($order['orderId']) != GIAO_THANH_CONG) { ?>
                                                    <li><a href="?mod=order&action=update&id=<?= $order['orderId']?>&st=<?=DANG_XU_LY?>" title="Tiến hành xử lý" class="update">Tiến hàng xử lý</a></li>
                                                    <?php }?>
                                                    <?php if(checkStatusById($order['orderId']) != GIAO_THANH_CONG) { ?>
                                                    <li><a href="?mod=order&action=update&id=<?= $order['orderId']?>&st=<?=GIAO_THANH_CONG?>" title="Giao thành công" class="update">Giao thành công</a></li>
                                                    <?php }?>
                                                    <?php if(checkStatusById($order['orderId']) != DA_HUY && checkStatusById($order['orderId']) != GIAO_THANH_CONG) { ?>
                                                    <li><a href="?mod=order&action=update&id=<?= $order['orderId']?>&st=<?=DA_HUY?>" title="Hủy đơn" class="update">Hủy đơn</a></li>
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
                        <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                        <?= get_pagging($numPage, $page, "?mod=order")?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>