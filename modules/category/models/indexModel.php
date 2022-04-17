<?php
/**
 * Get List Product By Cat Id
 *
 * @param $catId
 * @param $start
 * @param $numPerPage
 * @return array
 */
function getProductsByCat($catId, $start = 1, $numPerPage = 16) {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `catId`={$catId} LIMIT {$start}, {$numPerPage}");
}

/**
 * Sum Products By Cat Id
 *
 * @param $catId
 * @return int
 */
function sumProductByCatId($catId) {
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `catId`={$catId}");
}

/**
 * Get CatTitle By Cat Id
 *
 * @param $catId
 * @return string|null
 */
function getCatTitle($catId) {
    $infoCat = db_fetch_row("SELECT * FROM `tbl_categories` WHERE `catId`={$catId}");
    if ($infoCat) {
        return $infoCat['catTitle'];
    }
    return null;
}

function getCatByParentId($parentId) {
    $listCat = db_fetch_array("SELECT * FROM `tbl_categories` WHERE `parentId`={$parentId}");
    if ($listCat) {
        $result = [];
        foreach ($listCat as $cat) {
            $result[] = $cat['catId'];
        }
        return implode(', ', $result);
    }
    return null;
}

function getListProductByParentId($parentId, $start = 1, $numPerPage = 16) {
    $listCat = getCatByParentId($parentId);
    if ($parentId != 0) {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `catId` IN ($listCat) LIMIT {$start}, {$numPerPage}");
    }
    return null;
}

