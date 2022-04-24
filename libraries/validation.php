<?php
/**
 * Check username.
 *
 * @param $username
 * @return bool|void
 */
function is_username($username){
    $parttern="/^[A-Za-z0-9_\.]{6,32}$/";
    if(preg_match($parttern,$username,$matches)){
        return true;
    }
}

/**
 * Check password.
 *
 * @param $password
 * @return bool|void
 */
function is_password($password) {
    $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($parttern,$password,$matches)) {
        return true;
    }
}

/**
 * Check email.
 *
 * @param $email
 * @return bool|void
 */
function is_email($email) {
    $parttern = "/^[A-Za-z0-9_.]{5,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($parttern,$email,$matches)) {
        return true;
    }
}

/**
 * Check phone number.
 *
 * @param $phoneNumber
 * @return bool|void
 */
function is_phoneNumber($phoneNumber) {
    $parttern="/^[0-9]{9,12}+$/";
    if (preg_match($parttern, $phoneNumber,$matches)) {
        return true;
    }
}

/**
 * Set Value.
 *
 * @param $label_field
 * @return void
 */
function set_value($label_field){
    global $$label_field;
    if(isset($$label_field)){
        echo $$label_field;
    }
}

/**
 * Form error.
 *
 * @param $label_field
 * @return void
 */
function form_error($label_field){
    global $error;
    if(isset($error[$label_field])){
        echo "<span style=\"color:red; font-weight:bold\"> {$error[$label_field]}</span><br/>";
    }
}
