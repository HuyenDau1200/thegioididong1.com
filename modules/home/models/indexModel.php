<?php
/**
 * Get List Phone.
 *
 * @return array
 */
function getListPhone() {
    $result = [];
    $listProducts = db_fetch_array("SELECT * FROM `tbl_products`");
    foreach ($listProducts as $product) {
        if(getParentIdById($product['catId']) == 1) {
            $result[] = $product;
        }
    }
    return $result;
}

/**
 * Get Parent Id By Cat Id.
 *
 * @param $id
 * @return mixed|string
 */
function getParentIdById($id) {
    $catItem = db_fetch_row("SELECT * FROM `tbl_categories` WHERE `catId`={$id}");
    return $catItem['parentId'];
}

/**
 * Get List Product By Cat Id
 *
 * @param $catId
 * @return array
 */
function getListProductByCatId($catId) {
    $result = [];
    $listProducts = db_fetch_array("SELECT * FROM `tbl_products`");
    foreach ($listProducts as $product) {
        if ($product['catId'] == $catId) {
            $result[] = $product;
        }
    }
    return $result;
}

/**
 * Get Top 10 Product order by 'createdAt' desc.
 *
 * @return array
 */
function getTopProduct() {
    return db_fetch_array("select * from `tbl_products` order by `createdAt` desc limit 10");
}

/**
 * Get List Cat Parent.
 *
 * @return array
 */
function getListCatParent() {
    return db_fetch_array("SELECT * FROM `tbl_categories` WHERE `parentId`=0");
}

/**
 * get List Cat.
 *
 * @return array
 */
function getListCat() {
    return db_fetch_array("SELECT * FROM `tbl_categories`");
}

/**
 * Count Items By Parent Id.
 *
 * @param $catId
 * @return int|string
 */
function countItem($catId) {
    return db_num_rows("SELECT * FROM `tbl_categories` WHERE `parentId` = {$catId}");
}