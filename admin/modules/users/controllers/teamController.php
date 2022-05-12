<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
}
function indexAction()
{
    //Phân trang
    //Xuất dữ liệu
    $num_rows = sum_team();
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

    // $list_users = db_fetch_array("SELECT * FROM `tbl_users` LIMIT {$start},{$num_per_page}");
    $list_team_manager = get_users($start, $num_per_page,"WHERE `role` IN ('1','2')");
    //$list_team_manager = get_list_team_manager();
    $data['list_team_manager'] = $list_team_manager;
    $data['num_page']=$num_page;
    $data['page']=$page;
    $data['start']=$start;
    load_view('teamIndex', $data);
}

#Thêm người dùng
function addAction()
{
    global $error, $username, $fullname, $email, $password, $tel, $address, $role;
    if (isset($_POST['btn-add'])) {
        $error = array();
        //Kiểm tra fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Họ và tên không được để trống!";
        } else {
            $fullname = $_POST['fullname'];
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

        //Kiểm tra quyền
        if (empty($_POST['role'])) {
            $error['role'] = "Quyền truy cập không được để trống!";
        } else {
            $role = $_POST['role'];
        }
        if (empty($error)) {
            //Kiểm tra dữ liệu trùng
            if (!user_exists($username, $email)) {
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'created_date' => time(),
                    'phone_number' => $tel,
                    'address' => $address,
                    'role' => $role
                );
                add_user($data);
                // redirect("?mod=users&controller=team");
            } else {
                $error['account'] = "Tên đăng nhập hoặc email đã tồn tại!";
            }
        }
    }
    load_view('add');
}

#Cập nhật thông tin
function updateAction()
{
    $id = $_GET['id'];
    global $error;
    if (isset($_POST['btn-update'])) {
        $error = array();
        #Tên hiển thị
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Họ và tên không được để trống!";
        } else {
            $fullname = $_POST['fullname'];
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

        #quyền truy cập
        if (empty($_POST['role'])) {
            $error['role'] = "Quyền truy cập không được để trống!";
        } else {
            $role = $_POST['role'];
        }

        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'phone_number' => $phone_number,
                'address' => $address,
                'role' => $role
            );
            update_team_user($data, $id);
        }
    }
    $info_user = get_user_by_id($id);
    $data['info_user'] = $info_user;
    load_view('updateTeam', $data);
}

#Đổi mật khẩu
function resetAction()
{
    $id = $_GET['id'];
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
            $user = get_user_by_id($id);
            $username = $user['username'];
            if (check_pass_old($username, $pass_old)) {
                if ($pass_new == $confirm_pass) {
                    $data = array(
                        'password' => $pass_new
                    );
                    change_pass($username, $data);
                    redirect("?mod=users&controller=team");
                } else {
                    $error['confirm-pass'] = "Trường xác nhận mật khẩu không khớp với trường mật khẩu mới!";
                }
            } else {
                $error['pass-old'] = "Mật khẩu cũ không chính xác!";
            }
        }
    }
    load_view('resetTeam');
}
