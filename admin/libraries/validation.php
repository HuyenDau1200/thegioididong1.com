<?php
#Hàm is_tel()
function is_tel($tel){
    $parttern="/^[0-9]{10,15}$/";
    if(preg_match($parttern,$tel,$matches)){
        return true;
    }
}
#Hàm is_username()
function is_username($username){
    $parttern="/^[A-Za-z0-9_\.]{6,32}$/";
    if(preg_match($parttern,$username,$matches)){
        return true;
    }
}

#Hàm is_password()
function is_password($password){
    $parttern="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if(preg_match($parttern,$password,$matches)){
        return true;
    }
}

#Hàm is_email()
function is_email($email){
    $parttern="/^[A-Za-z0-9_.]{5,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if(preg_match($parttern,$email,$matches)){
        return true;
    }
}

#Hàm set_value()
function set_value($label_field){
    global $$label_field;
    if(isset($$label_field)){
        echo $$label_field;
    }
}

#Hàm form_error()
function form_error($label_field){
    global $error;
    if(isset($error[$label_field])){
        echo "<span style=\"color:red; font-weight:bold\"> {$error[$label_field]}</span><br/>";
    }
}
