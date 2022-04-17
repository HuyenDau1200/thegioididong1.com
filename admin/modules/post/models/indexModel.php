<?php

/**
 * Add Post.
 *
 * @param $data
 * @return int|string
 */
function addPost($data){
    return db_insert('tbl_posts', $data);
}

/**
 * Get Post By Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getPostById($id){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `postId`={$id}");
}

/**
 * Update Post.
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updatePost($data, $id){
    return db_update('tbl_posts', $data, "`postId`={$id}");
}

/**
 * Delete Post.
 *
 * @param $id
 * @return int|string
 */
function deletePost($id){
    return db_delete('tbl_posts',"`postId`={$id}");
}

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
 * Get Post Cat By Id
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getPostCatById($id){
    return db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `postCatId`={$id}");
}

/**
 * Update Cat.
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function updateCat($data,$id){
    return db_update('tbl_post_cat',$data,"`postCatId`={$id}");
}

/**
 * Delete Post Cat.
 *
 * @param $id
 * @return int|string
 */
function deletePostCatById($id){
    return db_delete('tbl_post_cat',"`postCatId`={$id}");
}

/**
 * Add Post Cat.
 *
 * @param $data
 * @return int|string
 */
function add_cat($data){
    return db_insert('tbl_post_cat', $data);
}

/**
 * Get List Post Cart.
 *
 * @return array
 */
function getPostCat(){
    return db_fetch_array("SELECT * FROM `tbl_post_cat`");
}

/**
 * Count List Post Cat
 *
 * @return false|int|string
 */
function sum_cats(){
    return db_num_rows("SELECT * FROM `tbl_post_cat`");
}

/**
 * Get List Cat by Pagging
 *
 * @param $start
 * @param $num_per_page
 * @param $where
 * @return array
 */
function get_cat($start = 1, $num_per_page = 5, $where=''){
    return db_fetch_array("SELECT * FROM `tbl_post_cat` {$where} LIMIT $start,$num_per_page");
}
