<?php
/**
 * Ham hien thi danh sach nha cung cap theo trang
 *
 * @param $start
 * @param $num_per_page
 * @return array
 */
function getManufacturers($start = 1, $num_per_page = 5) {
    return db_fetch_array("SELECT * FROM `tbl_suppliers` LIMIT {$start},{$num_per_page}");
}

/**
 * Lay so luong nha cung cap
 *
 * @return int
 */
function sumManus() {
    return db_num_rows("SELECT * FROM `tbl_suppliers`");
}

/**
 * Ham them nha cung cap
 *
 * @param $data
 * @return int|string
 */
function addManu($data)
{
    return db_insert('tbl_suppliers', $data);
}

/**
 * Get Manufacturer by Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getManuById($id) {
    return db_fetch_row("SELECT * FROM `tbl_suppliers` WHERE `supplierId`={$id}");
}

/**
 * Update Manufacturer
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updateManu($data, $id) {
    return db_update('tbl_suppliers', $data, "`supplierId` = {$id}");
}

/**
 * Delete Manufacturer
 *
 * @param $id
 * @return int|string
 */
function deleteManu($id) {
    return db_delete('tbl_suppliers', "`supplierId` = {$id}");
}