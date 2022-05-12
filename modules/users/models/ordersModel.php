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
function getListOrders($email, $start = 1, $num_per_page = 5) {
    $listOrder = db_fetch_array("SELECT * FROM `tbl_orders` WHERE `customerEmail` = '{$email}' LIMIT {$start},{$num_per_page}");
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
 * Get Email By Username.
 *
 * @param $username
 * @return mixed|string|null
 */
function getEmailByUsername($username) {
    if (!(empty($username))) {
        $infoUser = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
        return $infoUser['email'];
    }
    return null;
}
/**
 * Count orders.
 *
 * @return int|string
 */
function sumOrders($email) {
    return db_num_rows("SELECT * FROM `tbl_orders` WHERE `customerEmail` = '{$email}'");
}

/** Sum orders by status.
 *
 * @param $status
 * @return int|string
 */
function sumOrderByStatus($email, $status) {
    return db_num_rows("SELECT * FROM `tbl_orders` WHERE `status` = '{$status}' AND `customerEmail` = '{$email}'");
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