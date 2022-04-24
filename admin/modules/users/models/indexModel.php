<?php
#Hàm hiển thị danh sách theo trang
function get_users($start=1,$num_per_page=5,$where=''){
    $list_users = db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start},{$num_per_page}");
    return $list_users;
}
#Hàm cập nhật thông tin nhóm quản trị
function update_team_user($data, $id){
    return db_update('tbl_users',$data,"`user_id`={$id}");
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
#Hàm lấy t.tin theo id
function get_user_by_username($username){
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username`='{$username}'");
    if(!empty($item))
        return $item;
    return false;
}

#Hàm đổi mật khẩu
function change_pass($username,$data){
    return db_update('tbl_users',$data,"`username`='{$username}'");
}
#Kiểm tra xem tài khoản đúng mật khẩu không
function check_pass_old($username,$pass_old){
    $check_pass_old=db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$pass_old}'");
    if($check_pass_old > 0){
        return true;
    }
    return false;
}
#Cập nhật thông tin tài khoản
function update_user_login($data,$username){
    return db_update('tbl_users',$data,"`username`='{$username}'");
}
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
function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id`={$id}");
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

function add_user($data)
{
    return db_insert('tbl_users', $data);
}
function check_active_token($active_token)
{
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE  `active_token`= '{$active_token}' AND `is_active`='0'");
    if ($check_token > 0) {
        return true;
    }
    return false;
}

function active_user($active_token)
{
    return db_update('tbl_users', array('is_active' => '1'), "`active_token`='{$active_token}'");
}

#hàm kiểm tra xem user có tồn tại trong hệ thống và chưa được kích hoạt
function check_user_exists($email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `is_active`='0'");
    if ($check_user > 0) {
        return true;
    }
    return false;
}

#xóa tài khoản theo user
function delete_user($email)
{
    return db_delete('tbl_users', "`email`='{$email}'");
}

//login
#Kiểm tra đăng nhập
function check_login($username, $password)
{
    $check_login = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`= '{$username}' AND `password`='{$password}' AND `role`='1'");
    if ($check_login > 0) {
        return true;
    }
    return false;
}

#Check quyền truy cập
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

function check_email($email)
{
    $check_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `is_active`='1'");
    if ($check_email > 0) {
        return true;
    }
    return false;
}

function active_pass($email, $reset_pass_token)
{
    return db_update('tbl_users', array('reset_pass_token' => "{$reset_pass_token}"), "`email`='{$email}'");
}

//Hàm kiểm tra xem mã reset_pass_token có tồn tại trong hệ thống không
function check_reset_pass_token($reset_pass_token)
{
    $check_pass_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_pass_token`= '{$reset_pass_token}'");
    if ($check_pass_token > 0) {
        return true;
    }
    return false;
}

//Hàm thay đổi mật khẩu
function reset_pass_user($reset_pass_token, $new_pass)
{
    return db_update('tbl_users', array('password' => $new_pass, 'reset_pass_date' => date("Y-m-d h:i:s", time())), "`reset_pass_token`='{$reset_pass_token}'");
}
