<?php
const DAT_HANG_THANH_CONG = "Đặt hàng thành công";
const DANG_XU_LY = "Đang xử lý";
const GIAO_THANH_CONG = "Giao thành công";
const DA_HUY = "Đã hủy";

/**
 * list order.
 *
 * @return array
 */
function listOrders($start = 1, $num_per_page = 5) {
    $listOrder = db_fetch_array("SELECT * FROM `tbl_orders` LIMIT {$start},{$num_per_page}");
    foreach ($listOrder as &$item) {
        $orderItems = db_fetch_array("SELECT * FROM `tbl_orders` 
                    INNER JOIN `tbl_cart_items` ON `tbl_orders`.`cartId` = `tbl_cart_items`.`cartId`
                    INNER JOIN `tbl_products`ON `tbl_products`.`productId`= `tbl_cart_items`.`productId`
                    WHERE `orderId` = {$item['orderId']}");
        $total = 0; $qty = 0;
        foreach ($orderItems as $orderItem) {
            $total += $orderItem['qtyOrdered']*$orderItem['promotionPrice'];
            $qty += $orderItem['qtyOrdered'];
        }
        $item['total'] = $total;
        $item['qtyOrdered'] = $qty;
    }
    return $listOrder;
}

/**
 * Count orders.
 *
 * @return int|string
 */
function sumOrders() {
    return db_num_rows("SELECT * FROM `tbl_orders`");
}

/** Sum orders by status.
 *
 * @param $status
 * @return int|string
 */
function sumOrderByStatus($status) {
    return db_num_rows("SELECT * FROM `tbl_orders` WHERE `status` = '{$status}'");
}

/**
 * Get order by Id.
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getOrderById($id) {
    if ($id) {
        return db_fetch_row("SELECT * FROM `tbl_orders` WHERE `orderId` = {$id}");
    }
    return null;
}

/**
 * Get order items by cart id.
 *
 * @param $cartId
 * @return array|null
 */
function getOrderItemByCart($cartId) {
    if ($cartId) {
        $sql = "SELECT * FROM `tbl_cart_items` 
            INNER JOIN `tbl_products` ON `tbl_cart_items`.`productId` = `tbl_products`.`productId`
            WHERE `tbl_cart_items`.`cartId` = {$cartId}";
        return db_fetch_array($sql);
    }
    return null;
}

/**
 * Check status by order id.
 *
 * @param $id
 * @return mixed|string
 */
function checkStatusById($id) {
    $infoOrder = db_fetch_row("SELECT * FROM `tbl_orders` WHERE `orderId` = {$id}");
    return $infoOrder['status'];
}

/**
 * Update status.
 *
 * @param $orderId
 * @param $data
 * @return int|string
 */
function updateStatus($orderId, $data) {
    return db_update('tbl_orders', $data, "`orderId` = {$orderId}");
}