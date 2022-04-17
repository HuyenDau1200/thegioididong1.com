<?php
/**
 * Ham hien thi danh sach danh muc theo trang
 *
 * @param $start
 * @param $num_per_page
 * @return array
 */
function getProducts($start = 1, $num_per_page = 5) {
    return db_fetch_array("SELECT * FROM `tbl_products` LIMIT {$start},{$num_per_page}");
}

/**
 * Lay so luong danh muc
 *
 * @return int
 */
function sumProducts() {
    return db_num_rows("SELECT * FROM `tbl_products`");
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
 * List Manufacturer Options
 *
 * @return array
 */
function listManuOptions() {
    $listManu = db_fetch_array("SELECT * FROM `tbl_manufacturers`");
    $result = [];
    foreach ($listManu as $item) {
        $result[] = [
            'value' => $item['manufactureId'],
            'label' => $item['manufactureName']
        ];
    }
    return $result;
}

/**
 * List Color Options
 *
 * @return array
 */
function listColorOptions() {
    $listColor = db_fetch_array("SELECT * FROM `tbl_colors`");
    $result = [];
    foreach ($listColor as $item) {
        $result[] = [
            'value' => $item['colorId'],
            'label' => $item['colorName']
        ];
    }
    return $result;
}
/**
 * Ham them san pham
 *
 * @param $data
 * @return int|string
 */
function addProduct($data)
{
    return db_insert('tbl_products', $data);
}

/**
 * get Product by Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getProductById($id) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `productId`={$id}");
}

/**
 * Update Product
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updateProduct($data, $id) {
    return db_update('tbl_products', $data, "`productId` = {$id}");
}

/**
 * Delete Product
 *
 * @param $id
 * @return int|string
 */
function deleteProduct($id) {
    return db_delete('tbl_products', "`productId` = {$id}");
}