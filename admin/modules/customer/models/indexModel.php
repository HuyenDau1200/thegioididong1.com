<?php
/**
 * Get List Customer.
 *
 * @param $start
 * @param $num_per_page
 * @param $where
 * @return array
 */
function getListCustomer($start = 1, $num_per_page = 5, $where = ''){
    return db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start}, {$num_per_page}");
}

/**
 * Sum customer.
 *
 * @return int|string
 */
function sumCustomers() {
    return db_num_rows("SELECT * FROM `tbl_users` WHERE `role` = 0");
}

/**
 * Check is active.
 *
 * @param $isActive
 * @return bool
 */
function checkActive($isActive) {
    if($isActive == 1)
        return true;
    return false;
}

function user_exists($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `role` = 0 AND `isActive` = 1 AND (`username`= '{$username}' OR `email`= '{$email}' )");
    if ($check_user > 0) {
        return true;
    }
    return false;
}

/**
 * Add user.
 *
 * @param $data
 * @return int|string
 */
function add_user($data)
{
    return db_insert('tbl_users', $data);
}

/**
 * Update user.
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function update_user($data, $id) {
    return db_update('tbl_users', $data, "`userId` = {$id}");
}

/**
 * Check user exists and don't actived yet.
 *
 * @param $email
 * @return bool
 */
function check_user_exists($email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `is_active`='0'");
    if ($check_user > 0) {
        return true;
    }
    return false;
}

/**
 * Delete customer.
 *
 * @param $id
 * @return int|string
 */
function delete_user($id)
{
    return db_delete('tbl_users', "`userId` = {$id}");
}

/**
 * Info user.
 *
 * @param $id
 * @return array|false|string[]|null
 */
function infoUser($id) {
    $sql = "SELECT * FROM `tbl_users` WHERE `userId` = {$id}";
    return db_fetch_row($sql);
}

/**
 * Change pass.
 *
 * @param $data
 * @param $id
 * @return int|string
 */
function changePass($data, $id) {
    return db_update('tbl_users', $data, "`user_id` = {$id}");
}

/**
 * Get user by id.
 *
 * @param $id
 * @return array|false|string[]|null
 */
function getUserById($id) {
    $sql = "SELECT * FROM `tbl_users` WHERE `userId` = {$id}";
    return db_fetch_row($sql);
}