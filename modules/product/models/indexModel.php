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
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `productId`={$productId}");
}

/**
 * Get List Product Same Category
 *
 * @param $catId
 * @return array
 */
function getProductsRelated($productId) {
    $infoProduct = db_fetch_row("SELECT * FROM `tbl_products` WHERE `productId`={$productId}");
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `catId`={$infoProduct['catId']}");
}



