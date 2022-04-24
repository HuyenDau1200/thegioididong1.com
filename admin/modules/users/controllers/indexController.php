
<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
}

function loginAction()
{
    global $error, $username, $password;

    if (isset($_POST['btn-login'])) {
        $error = array();
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = "Tên đăng nhập không được để trống!";
        } else {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = "Độ dài của username bao gồm 6 - 32 ký tự!";
            } else if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập phải bao gồm chữ cái, số, dấu gạch ngang, dấu chấm và từ 6 - 32 ký tự!";
            } else {
                $username = $_POST['username'];
            }
        }
        #Kiểm tra password
        if (empty($_POST['password'])) {
            $error['password'] = "Mật khẩu không được để trống!";
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Độ dài của password bao gồm 6 - 32 ký tự!";
            } else if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu bao gồm các ký tự chữ cái, chữ số, dấu gạch dưới, các ký tự đặc biệt và từ 6 - 32 ký tự";
            } else {
                $password = md5($_POST['password']);
            }
        }

        #Kết luận
        if (empty($error)) {
            #Xử lý login
            if (check_login($username, $password)) {
                //Lưu trữ phiên đăng nhập
                $_SESSION['admin_is_login'] = true;
                $_SESSION['admin_login'] = $username;
                //Chuyển hướng vào hệ thống
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại!";
            }
        }
    }
    load_view('login');
}
function logoutAction()
{
    unset($_SESSION['admin_is_login']);
    unset($_SESSION['admin_login']);
    redirect("?mod=users&action=login");
}

function set_new_passAction()
{
    $reset_pass_token = $_GET['reset_pass_token'];
    if (check_reset_pass_token($reset_pass_token)) {
        global $error, $new_pass, $confirm_pass;
        if (isset($_POST['btn-set-new-pass'])) {
            $error = array();
            //Kiểm tra định dạng của mật khẩu
            if (empty($_POST['new_pass'])) {
                $error['new_pass'] = "Vui lòng nhập mật khẩu mới!";
            } else {
                if (!is_password($_POST['new_pass'])) {
                    $error['new_pass'] = "Mật khẩu không đúng định dạng!";
                } else {
                    $new_pass = md5($_POST['new_pass']);
                }
            }

            //Xác nhận lại mật khẩu
            if (empty($_POST['confirm_pass'])) {
                $error['confirm_pass'] = "Vui lòng xác nhận lại mật khẩu mới!";
            } else {
                $confirm_pass = md5($_POST['confirm_pass']);
            }

            //Kiểm tra xem new_pass = confirm_pass không
            if ($new_pass != $confirm_pass) {
                $error['reset_pass'] = "Trường xác nhận mật khẩu không khớp với trường mật khẩu mới!";
            } else {
                reset_pass_user($reset_pass_token, $new_pass);
                echo "Cập nhật mật khẩu thành công, vui lòng click <a href='?mod=users&action=login'>vào đây</a> để đăng nhập vào hệ thống!";
            }
        }
        load_view('reset_pass');
    } else {
        echo "Mã kích hoạt đổi mật khẩu không tồn tại trong hệ thống hoặc đã hết hạn, bạn vui lòng kiểm tra lại gmail để kiểm tra lại mã!";
    }
}

#Cập nhật tài khoản
function updateAction()
{
    global $error;
    if (isset($_POST['btn-update'])) {
        $error = array();
        #Tên hiển thị
        if (empty($_POST['firstName'])) {
            $error['firstName'] = "Họ không được để trống!";
        } else {
            $firstName = $_POST['firstName'];
        }
        if (empty($_POST['lastName'])) {
            $error['lastName'] = "Tên không được để trống!";
        } else {
            $lastName = $_POST['lastName'];
        }

        #số điện thoại
        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = "Số điện thoại không được để trống!";
        } else {
            $phone_number = $_POST['phone_number'];
        }

        #địa chỉ
        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
            $data = array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phone_number,
                'address' => $address
            );
            update_user_login($data, user_login());
        }
    }
    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('update', $data);
}

#Thiết lập mật khẩu
function resetAction()
{
    #validation form
    global $error;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        #Mật khẩu cũ
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = "Trường mật khẩu cũ không được để trống!";
        } else {
            $pass_old = md5($_POST['pass-old']);
        }

        #Mật khẩu mới
        if (empty($_POST['pass-new'])) {
            $error['pass-new'] = "Trường mật khẩu mới không được để trống!";
        } else {
            if (!(strlen($_POST['pass-new']) >= 6 && strlen($_POST['pass-new']) <= 32)) {
                $error['pass-new'] = "Độ dài của password bao gồm 6 - 32 ký tự!";
            } else if (!is_password($_POST['pass-new'])) {
                $error['pass-new'] = "Mật khẩu bao gồm các ký tự chữ cái, chữ số, dấu gạch dưới, các ký tự đặc biệt và từ 6 - 32 ký tự";
            } else {
                $pass_new = md5($_POST['pass-new']);
            }
        }

        #Xác nhận lại mật khẩu
        if (empty($_POST['confirm-pass'])) {
            $error['confirm-pass'] = "Trường xác nhận mật khẩu không được để trống!";
        } else {
            $confirm_pass = md5($_POST['confirm-pass']);
        }
        if (empty($error)) {
            if (check_pass_old(user_login(), $pass_old)) {
                if ($pass_new == $confirm_pass) {
                    $data = array(
                        'password' => $pass_new
                    );
                    change_pass(user_login(), $data);
                    redirect("?mod=users&action=login");
                } else {
                    $error['confirm-pass'] = "Trường xác nhận mật khẩu không khớp với trường mật khẩu mới!";
                }
            } else {
                $error['pass-old'] = "Mật khẩu cũ không chính xác!";
            }
        }
    }
    load_view('reset');
}
