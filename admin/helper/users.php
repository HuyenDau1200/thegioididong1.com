<?php

// function check_login($username, $password)
// {
//     $list_users=db_fetch_array("SELECT * FROM `tbl_users`");
//     $count = 0;
//     foreach ($list_users as $item) {
//         if ($username == $item['username'] && md5($password) == $item['password']) {
//             return true;
//         }
//     }
//     return false;
// }

//Trả về true nếu đã login
function is_login(){
    if(isset($_SESSION['admin_is_login'])){
        return true;
    }
    return false;
}

//Trả về username của người login
function user_login(){
    if(!empty($_SESSION['admin_login']))
        return $_SESSION['admin_login'];
    return false;
}

//Trả về fullname
function get_fullName($username){
    $list_users =db_fetch_array("SELECT * FROM `tbl_users`");
    if(isset($_SESSION['admin_is_login'])){
        foreach($list_users as $user){
            if($user['username'] == $username){
                return $user['fullname'];
            }
        }
    }
}

function info_user($field='id'){
    $list_users =db_fetch_array("SELECT * FROM `tbl_users`");
    if(isset($_SESSION['admin_is_login'])){
        foreach($list_users as $user){
            if($user['username'] == $_SESSION['admin_login']){
                if(array_key_exists($field,$user))
                    return $user[$field];
            }
        }
    }
    return false;
}
