<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
    load('helper', 'carts');
    load('helper', 'format');
}

/**
 * Login.
 *
 * @return void
 */
function loginAction()
{
    global $error, $username, $password;
    #Thuật toán đặt cờ hiệu
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
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                //Chuyển hướng vào hệ thống
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại!";
            }
        }
    }
    load_view('login');
}

/**
 * Register.
 *
 * @return void
 */
function regAction()
{
    global $error, $firstName, $lastName, $email, $phoneNumber, $address, $username, $password;
    if (isset($_POST['btn-reg'])) {
        $error = [];

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

        //email
        if (empty($_POST['email'])) {
            $error['email'] = "Email không được để trống!";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng!";
            } else {
                $email = $_POST['email'];
            }
        }

        //phone number
        if (empty($_POST['phoneNumber'])) {
            $error['phoneNumber'] = "Số điện thoại không được để trống!";
        } else {
            if (!is_phoneNumber($_POST['phoneNumber'])) {
                $error['phoneNumber'] = "Số điện thoại không đúng định dạng!";
            } else {
                $phoneNumber = $_POST['phoneNumber'];
            }
        }

        // address
        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        //username
        if (empty($_POST['username'])) {
            $error['username'] = "Tên đăng nhập không được để trống!";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng!";
            } else {
                $username = $_POST['username'];
            }
        }

        //password
        if (empty($_POST['password'])) {
            $error['password'] = "Mật khẩu không được để trống!";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu từ 6-32 ký tự bao gồm chữ cái, số và các ký tự đặc biệt trong đó chữ cái đầu phải viết hoa";
            } else {
                $password = md5($_POST['password']);
            }
        }

        if (empty($error)) {
            //Kiểm tra xem user đã tồn tại trong hệ thống mà chưa được active => xóa tài khoản này đi => để đăng ký tài khoản khác
            if (check_user_exists($email)) {
                delete_user($email);
            }
            //Kiểm tra dữ liệu trùng
            if (!user_exists($username, $email)) {
                $active_token = md5($username . time());
                $data = array(
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'username' => $username,
                    'password' => md5($password),
                    'email' => $email,
                    'phoneNumber' => $phoneNumber,
                    'address' => $address,
                    'role' => '0',
                    'createdAt' => date('Y-m-d H:i:s', time()),
                    'updatedAt' => date('Y-m-d H:i:s', time()),
                    'activeToken' => $active_token
                );
                add_user($data);
                #Gửi mã vào email
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Chào bạn {$firstName} {$lastName}</p>
                <p>Chúc mừng bạn đã trở thành khách hàng của chúng tôi</p>
                <p>Vui lòng click vào link sau: <a href='{$link_active}'>Kích hoạt</a> để kích hoạt tài khoản!</p>
                <p>Team support from thegioididong.com</p>";
                send_mail($email, $firstName. " ".$lastName , '[Thế giới di động] Kích hoạt tài khoản', $content);
                redirect("?mod=users&action=messageActive");
            } else {
                $error['account'] = "Tên đăng nhập hoặc email đã tồn tại!";
            }
        }
    }
    load_view('reg');
}

/**
 * Message Active.
 *
 * @return void
 */
function messageActiveAction() {
    load_view("messageActive");
}

/**
 * Active account.
 *
 * @return void
 */
function activeAction()
{
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    // Kiểm tra xem mã active_token có tồn tại trong hệ thống mà chưa được active
    if (check_active_token($active_token)) {
        // Nếu tồn tại, active tài khoản
        active_user($active_token);
        echo "Bạn đã kích hoạt thành công, vui lòng click <a href='{$link_login}'>vào đây</a> để đăng nhập!";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt trước đó, vui lòng click <a href='{$link_login}'>vào đây</a> để đăng nhập!";
    }
}

/**
 * Log out.
 *
 * @return void
 */
function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?");
}

/**
 * Loss pass.
 *
 * @return void
 */
function loss_passAction()
{
    global $error;
    if (isset($_POST['btn-confirm-email'])) {
        $email = $_POST['email'];
        //Kiểm tra xem email có tồn tại trên hệ thống không
        if (check_email($email)) {
            //Nếu tồn tại, tạo mã token
            $reset_pass_token = md5($email . time());
            active_pass($email, $reset_pass_token);
            $link_send_to_email = base_url("?mod=users&action=set_new_pass&reset_pass_token={$reset_pass_token}");
            $content = "
                <p>Bạn đã quên mật khẩu?</p>
                <p>Vui lòng click <a href='{$link_send_to_email}'>tại đây</a> để xác nhận lấy lại mật khẩu!</p>";
            send_mail($email, '', '[Thế giới di động] Lấy lại mật khẩu', $content);
            redirect("?mod=users&action=messageLossPass");
        } else {
            $error['email'] = "Không tồn tại email trong hệ thống!";
        }
    }
    load_view('loss_pass');
}

/**
 * Message confirm email to set new password when loss pass.
 *
 * @return void
 */
function messageLossPassAction() {
    load_view('messageLossPass');
}

/**
 * Set new password.
 *
 * @return void
 */
function set_new_passAction()
{
    $reset_pass_token = $_GET['reset_pass_token'];
    if(check_reset_pass_token($reset_pass_token)){
        global $error, $new_pass, $confirm_pass;
        if (isset($_POST['btn-set-new-pass'])) {
            $error = [];
            //Kiểm tra định dạng của mật khẩu
            if (empty($_POST['new_pass'])) {
                $error['new_pass']="Vui lòng nhập mật khẩu mới!";
            }
            else{
                if(!is_password($_POST['new_pass'])){
                    $error['new_pass']="Mật khẩu không đúng định dạng!";
                }
                else{
                    $new_pass=md5($_POST['new_pass']);
                }
            }

            //Xác nhận lại mật khẩu
            if (empty($_POST['confirm_pass'])) {
                $error['confirm_pass'] = "Vui lòng xác nhận lại mật khẩu mới!";
            }
            else{
                $confirm_pass = md5($_POST['confirm_pass']);
            }

            //Kiểm tra xem new_pass = confirm_pass không
            if($new_pass != $confirm_pass){
                $error['reset_pass'] = "Trường xác nhận mật khẩu không khớp với trường mật khẩu mới!";
            }
            else{
                reset_pass_user($reset_pass_token, $new_pass);
                redirect("?mod=users&action=successResetPass");
            }
        }
        load_view('reset_pass');
    }
    else{
        echo "Mã kích hoạt đổi mật khẩu không tồn tại trong hệ thống hoặc đã hết hạn, bạn vui lòng kiểm tra lại gmail để kiểm tra lại mã!";
    }
}

/**
 * Success reset pass.
 *
 * @return void
 */
function successResetPassAction() {
    load_view('successResetPass');
}

/**
 * @return void
 */
function updateAccountAction() {
    global $error, $lastName, $firstName, $phone_number, $address;
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
                'address' => $address,
                'updatedAt' => date('Y-m-d H:i:s', time())
            );
            update_user_login($data, user_login());
        }
    }
    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('updateAccount', $data);
}

function changePassAction() {
    global $error;
    if (isset($_POST['btn-submit'])) {
        $error = [];
        //old pass
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = "Trường mật khẩu cũ không được để trống!";
        } else {
            $pass_old = md5($_POST['pass-old']);
        }

        //new pass
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

        //confirm pass
        if (empty($_POST['confirm-pass'])) {
            $error['confirm-pass'] = "Trường xác nhận mật khẩu không được để trống!";
        } else {
            $confirm_pass = md5($_POST['confirm-pass']);
        }
        if (empty($error)) {
            if (check_pass_old(user_login(), $pass_old)) {
                if ($pass_new == $confirm_pass) {
                    $data = [
                        'password' => $pass_new,
                        'resetPassDate' => date('Y-m-d H:i:s', time())
                    ];
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
