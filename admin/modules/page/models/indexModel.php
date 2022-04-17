<?php
function delete_page($id){
    return db_delete('tbl_pages',"`pageId`={$id}");
}
function update_page($data, $id){
    return db_update('tbl_pages', $data, "`pageId`={$id}");
}
function get_page_by_id($id){
    $result=db_fetch_row("SELECT * FROM `tbl_pages` WHERE `pageId`={$id}");
    if(!empty($result))
        return $result;
    return false;
}
#Thêm page
function add_page($data){
    return db_insert('tbl_pages',$data);
}
function get_list_page(){
    $result=db_fetch_array("SELECT * FROM `tbl_pages`");
    if(!empty($result))
        return $result;
    return false;
}

function sum_pages(){
    return db_num_rows("SELECT * FROM `tbl_pages`");
}

function get_page($start=1,$num_per_page=5,$where=''){
    $list_users=db_fetch_array("SELECT * FROM `tbl_pages` {$where} LIMIT {$start},{$num_per_page}");
    return $list_users;
}
