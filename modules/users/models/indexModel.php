<?php
function get_list_users(){
    $result=db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id){
    $item=db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id`={$id}");
    return $item;
}

/**
 * Check user exists by email or username.
 *
 * @param $username
 * @param $email
 * @return bool
 */
function user_exists($username, $email) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE  `username`= '{$username}' OR `email`= '{$email}'");
    if($check_user > 0){
        return true;
    }
    return false;
}

/** Add user.
 *
 * @param $data
 * @return int|string
 */
function add_user($data){
    return db_insert('tbl_users', $data);
}

/**
 * Check exists active token.
 *
 * @param $active_token
 * @return bool
 */
function check_active_token($active_token) {
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE  `activeToken`= '{$active_token}' AND `isActive`='0'");
    if($check_token > 0){
        return true;
    }
    return false;
}

function active_user($active_token){
    return db_update('tbl_users', ['isActive' => '1'],"`activeToken`='{$active_token}'");
}

/**
 *
 * Check user exists and not actived yet (user đã tồn tại và chưa được active)
 *
 * @param $email
 * @return bool
 */
function check_user_exists($email) {
    $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `isActive`='0'");
    if($check_user > 0){
        return true;
    }
    return false;
}

/**
 * Delete user by email.
 *
 * @param $email
 * @return int|string
 */
function delete_user($email){
    return db_delete('tbl_users', "`email`='{$email}'");
}

/**
 * Check login.
 *
 * @param $username
 * @param $password
 * @return bool
 */
function check_login($username, $password){
    $check_login=db_num_rows("SELECT * FROM `tbl_users` WHERE `username`= '{$username}' AND `password`='{$password}'  AND `role`=0");
    if($check_login > 0){
        return true;
    }
    return false;
}

// #Trả về true nếu đã login
// function is_login(){
//     if(isset($_SESSION['is_login'])){
//         return true;
//     }
//     return false;
// }

/**
 * Check exists email.
 *
 * @param $email
 * @return bool
 */
function check_email($email) {
    $check_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `isActive`='1'");
    if ($check_email > 0) {
        return true;
    }
    return false;
}

function active_pass($email,$reset_pass_token){
    return db_update('tbl_users', ['resetPassToken' => "{$reset_pass_token}"], "`email`='{$email}'");
}

/**
 * Check exists reset pass token.
 *
 * @param $reset_pass_token
 * @return bool
 */
function check_reset_pass_token($reset_pass_token) {
    $check_pass_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `resetPassToken`= '{$reset_pass_token}'");
    if($check_pass_token > 0){
        return true;
    }
    return false;
}

/**
 * Change pass word.
 *
 * @param $reset_pass_token
 * @param $new_pass
 * @return int|string
 */
function reset_pass_user($reset_pass_token, $new_pass) {
    return db_update('tbl_users', ['password' => $new_pass, 'resetPassDate' => date("Y-m-d h:i:s",time())], "`resetPassToken`='{$reset_pass_token}'");
}

/**
 * Update Account.
 *
 * @param $data
 * @param $username
 * @return int|string
 */
function update_user_login($data, $username) {
    return db_update('tbl_users', $data, "`username`='{$username}'");
}

/**
 * Get user by username.
 *
 * @param $username
 * @return array|false|string[]
 */
function get_user_by_username($username){
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username`='{$username}'");
    if(!empty($item))
        return $item;
    return false;
}

/**
 * Check correct old pass.
 *
 * @param $username
 * @param $pass_old
 * @return bool
 */
function check_pass_old($username, $pass_old) {
    $check_pass_old = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$pass_old}'");
    if ($check_pass_old > 0) {
        return true;
    }
    return false;
}

/**
 * Change pass.
 *
 * @param $username
 * @param $data
 * @return int|string
 */
function change_pass($username,$data) {
    return db_update('tbl_users', $data, "`username`='{$username}'");
}

