<?php
const GIAO_THANH_CONG = "Giao thành công";

/**
 * Count orders.
 *
 * @return int|string
 */
function sumOrders() {
    return db_num_rows("SELECT * FROM `tbl_orders`");
}

/**
 * Count products.
 *
 * @return int|string
 */
function sumProducts() {
    return db_num_rows("SELECT * FROM `tbl_products`");
}

/** Sum customers.
 *
 * @return int|string
 */
function sumCustomer() {
    return db_num_rows("SELECT * FROM `tbl_users` WHERE `role` = 0 AND `isActive` = 1");
}

/**
 * list order.
 *
 * @return array
 */
function listTopOrder() {
    $listOrder = db_fetch_array("SELECT * FROM `tbl_orders` ORDER BY `orderCreatedAt` DESC LIMIT 3");
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
 * @return float|int
 */
function sumOrderMonth($status = GIAO_THANH_CONG) {
    $total = 0;

    $listOrder = db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = '{$status}'");
    foreach ($listOrder as $item) {
        $date1 = date('m', strtotime($item['orderCreatedAt']));
        if ($date1 == date('m', time())) {
            $orderItems = db_fetch_array("SELECT * FROM `tbl_orders` 
                        INNER JOIN `tbl_cart_items` ON `tbl_orders`.`cartId` = `tbl_cart_items`.`cartId`
                        INNER JOIN `tbl_products`ON `tbl_products`.`productId`= `tbl_cart_items`.`productId`
                        WHERE `orderId` = {$item['orderId']}");
            foreach ($orderItems as $orderItem) {
                $total += $orderItem['qtyOrdered']*$orderItem['promotionPrice'];
            }
        }
    }
    return $total;
}