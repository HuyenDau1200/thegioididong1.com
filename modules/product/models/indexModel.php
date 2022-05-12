<?php

/**
 * Get CatTitle By Product Id
 *
 * @param $productId
 * @return mixed|string|null
 */
function getCatTitle($productId) {
    $infoProduct = db_fetch_row("SELECT * FROM `tbl_products` WHERE `productId`={$productId}");
    $infoCat = db_fetch_row("SELECT * FROM `tbl_categories` WHERE `catId`={$infoProduct['catId']}");
    if ($infoCat) {
        return $infoCat['catTitle'];
    }
    return null;
}

/**
 * @param $productId
 * @return array|false|string[]|null
 */
function infoProduct($productId) {
    $sql = "SELECT * FROM `tbl_products` WHERE `productId`={$productId}";
    $infoProduct = db_fetch_row($sql);
    $infoProduct['url_add_cart'] = "?mod=cart&action=add&id={$productId}";
    return $infoProduct;
}

/**
 * Get Products Related.
 *
 * @param $productId
 * @return array
 */
function getProductsRelated($productId) {
    $sql = "SELECT * FROM `tbl_products` WHERE `productId`={$productId}";
    $infoProduct = db_fetch_row($sql);
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `catId`={$infoProduct['catId']}");
}




