<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
     load_model('index');
     load('lib', 'validation');
}

#Load model
#Load view
#Load lib
#load helper
function indexAction() {
    //Phân trang
    //Số lượng bản ghi trên trang
    $num_per_page = 5;
    //Tống số lượng bản ghi
    $total_row = sumColors();
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $data['listColor'] = getColors($start, $num_per_page);
    $data['numPage']=$num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    load_view('index', $data);
}

function addAction() {
    global $error, $code, $colorName;
    if (isset($_POST['btn-add'])) {
        $error = [];
        if (empty($_POST['code'])) {
            $error['code'] = "Mã màu không được để trống!";
        } else {
            $code = $_POST['code'];
        }

        if (empty($_POST['color-name'])) {
            $error['name'] = "Tên màu không được để trống!";
        } else {
            $colorName = $_POST['color-name'];
        }

        if (empty($error)) {
            $data = [
                'colorCode' => $code,
                'colorName' => $colorName
            ];
            addColor($data);
            redirect("?mod=color");
        }
    }
    load_view('addColor');
}

function updateAction() {
    $id = $_GET['id'];
    global $error;
    if (isset($_POST['btn-update'])) {
        $error = [];
        if (empty($_POST['code'])) {
            $error['code'] = "Mã màu không được để trống!";
        } else {
            $code = $_POST['code'];
        }

        if (empty($_POST['color-name'])) {
            $error['name'] = "Tên màu không được để trống!";
        } else {
            $colorName = $_POST['color-name'];
        }

        if (empty($error)) {
            $data = [
                'colorCode' => $code,
                'colorName' => $colorName
            ];
            updateColor($data, $id);
            redirect("?mod=color");
        }
    }
    $data['infoColor'] = getColorById($id);
    load_view('updateColor', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    if (isset($_POST['btn-delete'])) {
        deleteColor($id);
        redirect("?mod=color");
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=color");
    }

    $data['infoColor'] = getColorById($id);
    load_view('deleteColor', $data);
}