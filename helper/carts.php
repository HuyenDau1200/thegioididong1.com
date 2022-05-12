<?php

/**
 * Sum products in Cart.
 *
 * @return int|mixed
 */
function getNumOrderCart() {
    if (isset($_SESSION['cart']))
        return $_SESSION['cart']['info']['num_order'];
    return 0;
}

/**
 * Get list buy cart.
 *
 * @return false|mixed
 */
function getListBuyCart() {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['urlDeleteCart'] = "?mod=cart&action=delete&id={$item['productId']}";
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}

/**
 * Get total cart.
 *
 * @return false|mixed
 */
function getTotalCart() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}
