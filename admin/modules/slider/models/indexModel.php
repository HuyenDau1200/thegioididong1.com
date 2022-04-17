<?php

/**
 * Add Slider.
 *
 * @param $data
 * @return int|string
 */
function addSlider($data){
    return db_insert('tbl_sliders', $data);
}

/**
 * Get Post By Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getSliderById($id){
    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `sliderId`={$id}");
}

/**
 * Update Post.
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updateSlider($data, $id){
    return db_update('tbl_sliders', $data, "`sliderId`={$id}");
}

/**
 * Delete Post.
 *
 * @param $id
 * @return int|string
 */
function deleteSlider($id){
    return db_delete('tbl_sliders', "`sliderId`={$id}");
}

/**
 * get List Post.
 *
 * @param $start
 * @param $num_per_page
 * @param $where
 * @return array
 */
function getSliders($start = 1, $num_per_page = 5, $where=''){
    return db_fetch_array("SELECT * FROM `tbl_sliders` {$where} LIMIT {$start},{$num_per_page}");
}

/**
 * Count Sliders.
 *
 * @return int
 */
function sum_slider(){
    return db_num_rows("SELECT * FROM `tbl_sliders`");
}
