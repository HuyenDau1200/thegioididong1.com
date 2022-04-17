<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    //load('helper', 'users');
}

#Load model
#Load view
#Load lib
#load helper

function indexAction()
{
    //Phân trang
    //Xuất dữ liệu
    $num_rows = sum_pages();
    //Số lượng bản ghi trên trang
    $num_per_page = 5;
    //Tống số lượng bản ghi
    $total_row = $num_rows;
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_pages = get_page($start, $num_per_page);
    $data['list_pages'] = $list_pages;
    $data['num_page'] = $num_page;
    $data['page1'] = $page;
    $data['start'] = $start;
    load_view('index', $data);
}
function addAction()
{
    global $error, $title, $desc, $detail;
    if (isset($_POST['btn-add'])) {
        $error = array();
        //title
        if (empty($_POST['title'])) {
            $error['title'] = "Tên tiêu đề không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        //desc
        if (empty($_POST['desc'])) {
            $error['desc'] = "Mô tả ngắn không được để trống!";
        } else {
            $desc = $_POST['desc'];
        }

        //nội dung chi tiết
        if (empty($_POST['detail'])) {
            $error['detail'] = "Nội dung chi tiết không được để trống!";
        } else {
            $detail = $_POST['detail'];
        }

        if (empty($error)) {
            $data = array(
                'pageTitle' => $title,
                'pageDesc' => $desc,
                'pageDetail' => $detail,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time())
            );
            //thêm page vào database
            add_page($data);
            redirect("?mod=page");
        }
    }
    load_view('add');
}

function updateAction()
{
    $id = $_GET['id'];
    $info_page = get_page_by_id($id);
    $data['info_page'] = $info_page;
    global $error, $title, $desc, $detail;
    if (isset($_POST['btn-update'])) {
        $error = array();
        //title
        if (empty($_POST['title'])) {
            $error['title'] = "Tên tiêu đề không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        //desc
        if (empty($_POST['desc'])) {
            $error['desc'] = "Mô tả ngắn không được để trống!";
        } else {
            $desc = $_POST['desc'];
        }

        //nội dung chi tiết
        if (empty($_POST['detail'])) {
            $error['detail'] = "Nội dung chi tiết không được để trống!";
        } else {
            $detail = $_POST['detail'];
        }

        if (empty($error)) {
            $data = array(
                'pageTitle' => $title,
                'pageDesc' => $desc,
                'pageDetail' => $detail
            );
            //thêm page vào database
            update_page($data, $id);
            redirect("?mod=page");
        }
    }
    load_view('update', $data);
}

function deleteAction()
{
    $id = $_GET['id'];
    $info_page = get_page_by_id($id);
    $data['info_page'] = $info_page;
    if (isset($_POST['btn-delete'])) {
        delete_page($id);
        redirect("?mod=page");
    }
    load_view('delete',$data);
}
