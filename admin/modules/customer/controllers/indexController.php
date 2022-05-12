<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexAction() {
    $num_rows = sumCustomers();
    //Số lượng bản ghi trên trang
    $num_per_page = 5;
    //Tống số lượng bản ghi
    $total_row = $num_rows;
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $data['listCustomer'] = getListCustomer($start, $num_per_page, "WHERE `role` = 0");
    $data['num_page']=$num_page;
    $data['page']=$page;
    $data['start']=$start;
    load_view('index', $data);
}

function addAction() {
    global $error, $username, $firstName, $lastName, $email, $password, $tel, $address;
    if (isset($_POST['btn-add'])) {
        $error = [];
        //fistName
        if (empty($_POST['firstName'])) {
            $error['firstName'] = "Họ không được để trống!";
        } else {
            $firstName = $_POST['firstName'];
        }

        //lastname
        if (empty($_POST['lastName'])) {
            $error['lastName'] = "Tên không được để trống!";
        } else {
            $lastName = $_POST['lastName'];
        }

        //Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = "Tên đăng nhập không được để trống!";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng!";
            } else {
                $username = $_POST['username'];
            }
        }

        //Kiểm tra password
        if (empty($_POST['password'])) {
            $error['password'] = "Mật khẩu không được để trống!";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng!";
            } else {
                $password = md5($_POST['password']);
            }
        }

        //Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Email không được để trống!";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng!";
            } else {
                $email = $_POST['email'];
            }
        }

        //Kiểm tra số điện thoại
        if (empty($_POST['tel'])) {
            $error['tel'] = "Số điện thoại không được để trống!";
        } else {
            if (!is_tel($_POST['tel'])) {
                $error['tel'] = "Số điện thoại chỉ gồm các chữ số bao gồm 10-15 ký tự!";
            } else {
                $tel = $_POST['tel'];
            }
        }

        //Kiểm tra địa chỉ
        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
            //Kiểm tra dữ liệu trùng
            if (!user_exists($username, $email)) {
                $data = array(
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'phoneNumber' => $tel,
                    'address' => $address,
                    'role' => '0',
                    'createdAt' => date('Y-m-d H:i:s',time()),
                    'updatedAt' => date('Y-m-d H:i:s',time()),
                    'createdBy' => $_SESSION['admin_login'],
                    'updatedBy' => $_SESSION['admin_login'],
                    'isActive' => 1
                );
                add_user($data);
                redirect("?mod=customer");
            } else {
                $error['account'] = "Tên đăng nhập hoặc email đã tồn tại!";
            }
        }
    }
    load_view('add');
}

function updateAction() {
    $id = (int)$_GET['id'];
    global $error, $firstName, $lastName, $tel, $address;
    if (isset($_POST['btn-update'])) {
        $error = [];
        //fistName
        if (empty($_POST['firstName'])) {
            $error['firstName'] = "Họ không được để trống!";
        } else {
            $firstName = $_POST['firstName'];
        }

        //lastname
        if (empty($_POST['lastName'])) {
            $error['lastName'] = "Tên không được để trống!";
        } else {
            $lastName = $_POST['lastName'];
        }

        //Kiểm tra số điện thoại
        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = "Số điện thoại không được để trống!";
        } else {
            if (!is_tel($_POST['phone_number'])) {
                $error['phone_number'] = "Số điện thoại chỉ gồm các chữ số bao gồm 10-15 ký tự!";
            } else {
                $tel = $_POST['phone_number'];
            }
        }

        //Kiểm tra địa chỉ
        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
                $data = [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'phoneNumber' => $tel,
                    'address' => $address,
                    'updatedAt' => date('Y-m-d H:i:s',time()),
                    'updatedBy' => $_SESSION['admin_login']
                ];
                update_user($data, $id);
                redirect("?mod=customer");
        }
    }
    $data['info_user'] = infoUser($id);
    load_view('update', $data);
}

/**
 * Reset Pass.
 *
 * @return void
 */
function resetPassAction() {
    $id = (int) $_GET['id'];
    global $error, $passNew, $confirmPass;
    if (isset($_POST['btn-submit'])) {
        // pass new
        if (empty($_POST['pass-new'])) {
            $error['pass-new'] = "Trường mật khẩu mới không được để trống!";
        } else {
            if (!(strlen($_POST['pass-new']) >= 6 && strlen($_POST['pass-new']) <= 32)) {
                $error['pass-new'] = "Độ dài của password bao gồm 6 - 32 ký tự!";
            } else if (!is_password($_POST['pass-new'])) {
                $error['pass-new'] = "Mật khẩu bao gồm các ký tự chữ cái, chữ số, dấu gạch dưới, các ký tự đặc biệt và từ 6 - 32 ký tự";
            } else {
                $passNew = md5($_POST['pass-new']);
            }
        }

        //confirm pass
        if (empty($_POST['confirm-pass'])) {
            $error['confirm-pass'] = "Trường xác nhận mật khẩu không được để trống!";
        } else {
            $confirmPass = md5($_POST['confirm-pass']);
        }

        if (empty($error)) {
            if ($passNew == $confirmPass) {
                $data = [
                    'password' => $passNew,
                    'resetPassDate' => date('Y-m-d H:i:s', time())
                ];
                changePass($data, $id);
                redirect("?mod=customer");
            } else {
                $error['confirm-pass'] = "Trường xác nhận mật khẩu không khớp với trường mật khẩu mới!";
            }
        }
    }
    $data['info_user'] = infoUser($id);
    load_view('reset', $data);
}

function deleteAction() {
    $id = (int)$_GET['id'];
    if (isset($_POST['btn-delete'])) {
        delete_user($id);
        redirect("?mod=customer");
    }
    if (isset($_POST['btn-back'])) {
        redirect("?mod=customer");
    }
    $data['info_user'] = infoUser($id);
    load_view('delete', $data);
}

