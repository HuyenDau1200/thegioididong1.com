<?php
/**
 * Ham hien thi danh sach danh muc theo trang
 *
 * @param $start
 * @param $num_per_page
 * @return array
 */
function getCategories($start = 1, $num_per_page = 5) {
    return db_fetch_array("SELECT * FROM `tbl_categories` LIMIT {$start},{$num_per_page}");
}

/**
 * Lay so luong danh muc
 *
 * @return int
 */
function sumCats() {
    return db_num_rows("SELECT * FROM `tbl_categories`");
}

/**
 * ham lay tat ca danh muc
 *
 * @return array
 */
function getAllCategories() {
    return db_fetch_array("SELECT * FROM `tbl_categories`");
}

/**
 * Ham de quy danh muc san pham
 *
 * @param $id
 * @param $char
 * @return array
 */
$result = array();
function categoriesRecusive($id = 0, $char = '') {
    $data = getAllCategories();
    $result = [];
    foreach ($data as $item) {
        if($item['parentId'] == $id) {
            $result[] = [
                'value' => $item['catId'],
                'label' => $char. $item['catTitle']
            ];
            foreach ($data as $item1) {
                if($item1['parentId'] == $item['catId']) {
                    $result[] = [
                        'value' => $item1['catId'],
                        'label' => $char. '--'. $item1['catTitle']
                    ];
                    foreach ($data as $item2) {
                        if($item2['parentId'] == $item1['catId']) {
                            $result[] = [
                                'value' => $item2['catId'],
                                'label' => $char. '----'. $item2['catTitle']
                            ];
                        }
                    }
                }
            }
        }
    }
    return $result;
}

/**
 * Ham them danh muc san pham
 *
 * @param $data
 * @return int|string
 */
function addCat($data)
{
    return db_insert('tbl_categories', $data);
}

/**
 * get Category by Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getCatById($id) {
    return db_fetch_row("SELECT * FROM `tbl_categories` WHERE `catId`={$id}");
}

/**
 * Update Cat
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updateCat($data, $id) {
    return db_update('tbl_categories', $data, "`catId` = {$id}");
}

/**
 * Delete Cat
 *
 * @param $id
 * @return int|string
 */
function deleteCat($id) {
    return db_delete('tbl_categories', "`catId` = {$id}");
}