<?php
/**
 * get List Post.
 *
 * @param $start
 * @param $num_per_page
 * @param $where
 * @return array
 */
function getPosts($start = 1, $num_per_page = 5, $where=''){
    return db_fetch_array("SELECT * FROM `tbl_posts` {$where} LIMIT {$start},{$num_per_page}");
}

/**
 * Count Posts.
 *
 * @return int
 */
function sum_posts(){
    return db_num_rows("SELECT * FROM `tbl_posts`");
}

/**
 * Get Info Post.
 *
 * @param $id
 * @return array|false|string[]|null
 */
function infoPost($id) {
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `postId`={$id}");
}