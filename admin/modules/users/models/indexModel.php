<?php
#Hàm hiển thị danh sách theo trang
function get_users($start=1,$num_per_page=5,$where=''){
    $list_users = db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start},{$num_per_page}");
    return $list_users;
}
#Hàm cập nhật thông tin nhóm quản trị
function update_team_user($data, $id){
    return db_update('tbl_users',$data,"`userId`={$id}");
}
#Hàm lấy sl team quản trị theo role
function num_user_by_role($role){
    $count = db_num_rows("SELECT * FROM `tbl_users` WHERE `role` IN ('1','2','3') AND `role` = '{$role}'");
    return $count;
}
#Hàm lấy số lượng nhóm team quản trị
function sum_team(){
    $count = db_num_rows("SELECT * FROM `tbl_users` WHERE `role` IN ('1','2','3')");
    return $count;
}
#Hàm lấy thông tin team quản lý
function get_list_team_manager()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users` WHERE `role` IN ('1','2','3')");
    if(!empty($result))
        return $result;
    return false;
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
 * Change pass.
 *
 * @param $username
 * @param $data
 * @return int|string
 */
function change_pass($username,$data) {
    return db_update('tbl_users', $data, "`username`='{$username}'");
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
 * Update Account.
 *
 * @param $data
 * @param $username
 * @return int|string
 */
function update_user_login($data,$username) {
    return db_update('tbl_users', $data, "`username`='{$username}'");
}

/**
 * Info account.
 *
 * @return false|mixed
 */
function info_account()
{
    $list_users = db_fetch_array("SELECT * FROM `tbl_users`");
    if (isset($_SESSION['admin_is_login'])) {
        foreach ($list_users as $user) {
            if ($user['username'] == $_SESSION['admin_login']) {
                return $user;
            }
        }
    }
    return false;
}

/**
 * Get list users.
 *
 * @return array
 */
function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

/**
 * Get user by id.
 *
 * @param $id
 * @return array|false|string[]|null
 */
function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `userId`={$id}");
    return $item;
}

function user_exists($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE  `username`= '{$username}' OR `email`= '{$email}'");
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
 * Check active token.
 *
 * @param $active_token
 * @return bool
 */
function check_active_token($active_token)
{
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE  `active_token`= '{$active_token}' AND `is_active`='0'");
    if ($check_token > 0) {
        return true;
    }
    return false;
}

/**
 * Active user.
 *
 * @param $active_token
 * @return int|string
 */
function active_user($active_token)
{
    return db_update('tbl_users', array('is_active' => '1'), "`active_token`='{$active_token}'");
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
 * Delete user.
 *
 * @param $email
 * @return int|string
 */
function delete_user($email)
{
    return db_delete('tbl_users', "`email`='{$email}'");
}

/**
 * Check login.
 *
 * @param $username
 * @param $password
 * @return bool
 */
function check_login($username, $password)
{
    $check_login = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`= '{$username}' AND `password`='{$password}' AND `role`='1'");
    if ($check_login > 0) {
        return true;
    }
    return false;
}

/**
 * Check role.
 *
 * @param $role
 * @return void
 */
function check_role($role)
{
    //$check_role = db_fetch_row();
}
// #Trả về true nếu đã login
// function is_login(){
//     if(isset($_SESSION['is_login'])){
//         return true;
//     }
//     return false;
// }

/**
 * Check email.
 *
 * @param $email
 * @return bool
 */
function check_email($email)
{
    $check_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `is_active`='1'");
    if ($check_email > 0) {
        return true;
    }
    return false;
}

/**
 * Active pass.
 *
 * @param $email
 * @param $reset_pass_token
 * @return int|string
 */
function active_pass($email, $reset_pass_token)
{
    return db_update('tbl_users', array('reset_pass_token' => "{$reset_pass_token}"), "`email`='{$email}'");
}

/**
 * Check reset pass token exists in system?
 *
 * @param $reset_pass_token
 * @return bool
 */
function check_reset_pass_token($reset_pass_token)
{
    $check_pass_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_pass_token`= '{$reset_pass_token}'");
    if ($check_pass_token > 0) {
        return true;
    }
    return false;
}

/**
 * Change password.
 *
 * @param $reset_pass_token
 * @param $new_pass
 * @return int|string
 */
function reset_pass_user($reset_pass_token, $new_pass)
{
    return db_update('tbl_users', array('password' => $new_pass, 'reset_pass_date' => date("Y-m-d h:i:s", time())), "`reset_pass_token`='{$reset_pass_token}'");
}
