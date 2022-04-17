<?php
/**
 * Ham hien thi danh sach mau sac theo trang
 *
 * @param $start
 * @param $num_per_page
 * @return array
 */
function getColors($start = 1, $num_per_page = 5) {
    return db_fetch_array("SELECT * FROM `tbl_colors` LIMIT {$start},{$num_per_page}");
}

/**
 * Lay so luong mau sac
 *
 * @return int
 */
function sumColors() {
    return db_num_rows("SELECT * FROM `tbl_colors`");
}

/**
 * Ham them nha cung cap
 *
 * @param $data
 * @return int|string
 */
function addColor($data)
{
    return db_insert('tbl_colors', $data);
}

/**
 * Get Manufacturer by Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getColorById($id) {
    return db_fetch_row("SELECT * FROM `tbl_colors` WHERE `colorId`={$id}");
}

/**
 * Update Manufacturer
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updateColor($data, $id) {
    return db_update('tbl_colors', $data, "`colorId` = {$id}");
}

/**
 * Delete Manufacturer
 *
 * @param $id
 * @return int|string
 */
function deleteColor($id) {
    return db_delete('tbl_colors', "`colorId` = {$id}");
}