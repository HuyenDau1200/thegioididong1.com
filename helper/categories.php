<?php

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