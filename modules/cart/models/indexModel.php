<?php
/**
 * Get product by id.
 *
 * @param $id
 * @return array|false|string[]|null
 */
function get_product_by_id($id)
{
    $list_product = db_fetch_row("SELECT * FROM `tbl_products` where `productId` = {$id}");
    $list_product['url_add_cart'] = "?mod=cart&controller=index&action=add&id={$id}";
    $list_product['url'] = "?mod=product&controller=index&action=detail&id={$id}";
    return $list_product;
}

/**
 * Get userId by username.
 *
 * @param $username
 * @return false|int
 */
function getUserIdByName($username) {
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}'";
    $infoUsername = db_fetch_row($sql);
    if ($infoUsername) {
        return (int)$infoUsername['userId'];
    }
    return false;
}

function getLastCartId($userId) {
    $sql = "SELECT * FROM `tbl_carts` WHERE `userId`='{$userId}' ORDER BY `cartId` DESC LIMIT 1";
    $infoUser = db_fetch_row($sql);
    return $infoUser['cartId'];
}

function updateCartItem($data, $cartId, $productId) {
    return db_update('tbl_cart_items', $data, "`cartId` = {$cartId} AND `productId` = {$productId}");
}

/**
 * Check count product in Cart.
 *
 * @param $productId
 * @param $cartId
 * @return bool
 */
function checkProductInCart($productId, $cartId) {
    $sql = "SELECT * FROM `tbl_cart_items` WHERE `cartId` = {$cartId} AND `productId` = {$productId}";
    $count = db_num_rows($sql);
    if ($count > 0) {
        return true;
    }
    return false;
}
/**
 * Add product to Cart.
 *
 * @param $id
 * @return void
 */
function add_cart($id) {
    $item = get_product_by_id($id);
    $qty = 1; //Giá tri số lượng khi mua qty <=> 'quantity'
    if (!isset($_SESSION['cart']) && isset($_SESSION['user_login'])) {
        $data = [
            'userId' => getUserIdByName($_SESSION['user_login'])
        ];
        addCart($data);
        $_SESSION['cart']['infoCart'] = [
            'cartId' => getLastCartId($data['userId']),
            'userId' => $data['userId']
        ];
    }

    $result = $_SESSION['cart']['infoCart'];
    //Kiểm tra sản phẩm có tồn tại trong giỏ hàng không, nếu có thì $qty = $qty + 1
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;

        $data = [
            'qtyOrdered' => $qty
        ];
        updateCartItem($data, $_SESSION['cart']['infoCart']['cartId'], $_SESSION['cart']['buy'][$id]['productId']);
    }
    else {
        if (checkProductInCart($item['productId'], $_SESSION['cart']['infoCart']['cartId'])) {
            $data = [
                'qtyOrdered' => $qty
            ];
            updateCartItem($data, $_SESSION['cart']['infoCart']['cartId'], $item['productId']);
        } else {
            $data = [
                'productId' => $item['productId'],
                'cartId' => $_SESSION['cart']['infoCart']['cartId'],
                'qtyOrdered' => $qty,
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time())
            ];
            addCartItem($data);
        }
    }
    //Giỏ hàng chứa thông tin sản phẩm đã thêm
    $_SESSION['cart']['buy'][$id] = [
        'productId' => $item['productId'],
        'productUrl' => $item['url'],
        'productName' => $item['productName'],
        'price' => $item['price'],
        'productThumb' => $item['productThumb'],
        'productSku' => $item['productSku'],
        'qty' => $qty,
        'subTotal' => $item['price'] * $qty,
        'url' => "?mod=product&action=detail&id={$item['productId']}"
    ];
    update_info_cart();
}

/**
 * Add a record Cart.
 *
 * @return void
 */
function addCart($data) {
    return db_insert('tbl_carts', $data);
}

/**
 * Add cart item.
 *
 * @param $data
 * @return int|string
 */
function addCartItem($data) {
    return db_insert('tbl_cart_items', $data);
}

/**
 * Update Cart.
 *
 * @return void
 */
function update_info_cart() {
    //Nếu session cart được thiết lập
    if (isset($_SESSION['cart'])) {
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['subTotal'];
        }
        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

/**
 * Delete Cart Items.
 *
 * @param $id
 * @return void
 */
function deleteCart($id) {
    if (isset($_SESSION['cart'])) {
        #TH1:Xóa sản phẩm có $id trong giỏ hàng
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        } else {
            #TH2:Nếu ko có id xóa tất cả trong giỏ hàng
            unset($_SESSION['cart']);
        }
    }
}

function getInfoUser() {
    if (isset($_SESSION['user_login'])) {
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$_SESSION['user_login']}'";
        return db_fetch_row($sql);
    }
}


/**
 * Add Order.
 *
 * @param $data
 * @return int|string
 */
function addOrder($data) {
    return db_insert('tbl_orders', $data);
}

/**
 * Add order item.
 *
 * @param $data
 * @return int|string
 */
function addOrderItem($data) {
    return db_insert('tbl_order_items', $data);
}

/**
 * Get last order id.
 *
 * @return mixed|string
 */
function getLastOrderId() {
    $sql = "SELECT * FROM `tbl_orders` ORDER BY `orderId` DESC LIMIT 1";
    $infoOrder = db_fetch_row($sql);
    return $infoOrder['orderId'];
}

