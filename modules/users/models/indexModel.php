<?php
function get_list_users(){
    $result=db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id){
    $item=db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id`={$id}");
    return $item;
}

function user_exists($username,$email){
    $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE  `username`= '{$username}' OR `email`= '{$email}'");
    if($check_user > 0){
        return true;
    }
    return false;
}

function add_user($data){
    return db_insert('tbl_users',$data);
}
function check_active_token($active_token){
    $check_token=db_num_rows("SELECT * FROM `tbl_users` WHERE  `active_token`= '{$active_token}' AND `is_active`='0'");
    if($check_token > 0){
        return true;
    }
    return false;
}

function active_user($active_token){
    return db_update('tbl_users',array('is_active' => '1'),"`active_token`='{$active_token}'");
}

#hàm kiểm tra xem user có tồn tại trong hệ thống và chưa được kích hoạt
function check_user_exists($email){
    $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `is_active`='0'");
    if($check_user > 0){
        return true;
    }
    return false;
}

#xóa tài khoản theo user
function delete_user($email){
    return db_delete('tbl_users',"`email`='{$email}'");
}

//login
#Kiểm tra đăng nhập
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

function check_email($email){
    $check_email=db_num_rows("SELECT * FROM `tbl_users` WHERE `email`= '{$email}' AND `is_active`='1'");
    if($check_email > 0){
        return true;
    }
    return false;
}

function active_pass($email,$reset_pass_token){
    return db_update('tbl_users',array('reset_pass_token' => "{$reset_pass_token}"),"`email`='{$email}'");
}

//Hàm kiểm tra xem mã reset_pass_token có tồn tại trong hệ thống không
function check_reset_pass_token($reset_pass_token){
    $check_pass_token=db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_pass_token`= '{$reset_pass_token}'");
    if($check_pass_token > 0){
        return true;
    }
    return false;
}

//Hàm thay đổi mật khẩu
function reset_pass_user($reset_pass_token,$new_pass){
    return db_update('tbl_users',array('password' => $new_pass,'reset_pass_date' => date("Y-m-d h:i:s",time())),"`reset_pass_token`='{$reset_pass_token}'");
}

