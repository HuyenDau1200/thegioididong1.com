
<?php
function construct()
{
    //    echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    //load('helper', 'users');
    load('lib', 'email');
}

#Load model
#Load view
#Load lib
#load helper
function indexAction()
{
    load('helper', 'format');
    $list_users = get_list_users();
    $data['list_users'] = $list_users;
    load_view('index', $data);
}
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
                $_SESSION['client_is_login'] = true;
                $_SESSION['client_login'] = $username;
                //Chuyển hướng vào hệ thống
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại!";
            }
        }
    }
    load_view('login');
}

function regAction()
{
    global $error, $username, $fullname, $email, $password;
    // echo send_mail('anhthongdau861@gmail.com','Đậu Thiện Thông','Kích hoạt khóa học PHP Master',"<a href='http://unitop.vn'>Kích hoạt</a>");
    if (isset($_POST['btn-reg'])) {
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

        if (empty($error)) {
            //Kiểm tra xem user đã tồn tại trong hệ thống mà chưa được active => xóa tài khoản này đi => để đăng ký tài khoản khác
            if (check_user_exists($email)) {
                delete_user($email);
            }
            //Kiểm tra dữ liệu trùng
            if (!user_exists($username, $email)) {
                $active_token = md5($username . time());
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'active_token' => $active_token
                );
                add_user($data);
                #Gửi mã vào email
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Chào bạn {$fullname}</p>
                <p>Chúc mừng bạn đã trở thành thành viên của Unitop</p>
                <p>Vui lòng click vào link sau: <a href='{$link_active}'>Kích hoạt</a> để kích hoạt tài khoản!</p>
                <p>Team support from Unitop</p>";
                send_mail('anhthongdau861@gmail.com', 'Đậu Thiện Thông', '[Unitop] Kích hoạt tài khoản', $content);
                redirect("?mod=users&action=login");
            } else {
                $error['account'] = "Tên đăng nhập hoặc email đã tồn tại!";
            }
        }
    }
    load_view('reg');
}
function activeAction()
{
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    #Kiểm tra xem mã active_token có tồn tại trong hệ thống không
    if (check_active_token($active_token)) {
        #Nếu tồn tại, active tài khoản
        active_user($active_token);
        echo "Bạn đã kích hoạt thành công, vui lòng click <a href='{$link_login}'>vào đây</a> để đăng nhập!";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt trước đó, vui lòng click <a href='{$link_login}'>vào đây</a> để đăng nhập!";
    }
    //echo $active_token;
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

//QUên mật khẩu
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
                <p>Chúc mừng bạn đã trở thành thành viên của Unitop</p>
                <p>Vui lòng click vào link sau: <a href='{$link_send_to_email}'>{$link_send_to_email}</a> để xác nhận lấy lại mật khẩu!</p>";
            send_mail('anhthongdau861@gmail.com', 'Đậu Thiện Thông', '[Unitop] Lấy lại mật khẩu', $content);
            echo "Vui lòng truy cập vào email của bạn để xác nhận thay đổi mật khẩu!";
            //redirect("?mod=users&action=login");
        } else {
            $error['email'] = "Không tồn tại email trong hệ thống!";
        }
    }
    load_view('loss_pass');
}

function set_new_passAction()
{
    $reset_pass_token = $_GET['reset_pass_token'];
    if(check_reset_pass_token($reset_pass_token)){
        global $error,$new_pass,$confirm_pass;
        if(isset($_POST['btn-set-new-pass'])){
            $error=array();
            //Kiểm tra định dạng của mật khẩu
            if(empty($_POST['new_pass'])){
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
            if(empty($_POST['confirm_pass'])){
                $error['confirm_pass']="Vui lòng xác nhận lại mật khẩu mới!";
            }
            else{
                $confirm_pass=md5($_POST['confirm_pass']);
            }

            //Kiểm tra xem new_pass = confirm_pass không
            if($new_pass != $confirm_pass){
                $error['reset_pass']="Trường xác nhận mật khẩu không khớp với trường mật khẩu mới!";
            }
            else{
                reset_pass_user($reset_pass_token,$new_pass);
                echo "Cập nhật mật khẩu thành công, vui lòng click <a href='?mod=users&action=login'>vào đây</a> để đăng nhập vào hệ thống!";
            }
        }
        load_view('reset_pass');
    }
    else{
        echo "Mã kích hoạt đổi mật khẩu không tồn tại trong hệ thống hoặc đã hết hạn, bạn vui lòng kiểm tra lại gmail để kiểm tra lại mã!";
    }
}
