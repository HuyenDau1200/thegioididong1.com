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
    $total_row = sumManus();
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_cat = getManufacturers($start, $num_per_page);
    $data['listManufacturer'] = $list_cat;
    $data['numPage']=$num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    load_view('index', $data);
}

function addAction() {
    global $error, $name, $address;
    if (isset($_POST['btn-add'])) {
        $error = [];
        if (empty($_POST['name'])) {
            $error['name'] = "Tên nhà cung cấp không được để trống!";
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ nhà cung cấp không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
            $data = [
                'supplierName' => $name,
                'address' => $address,
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time())
            ];
            addManu($data);
            redirect("?mod=manufacturer");
        }
    }
    load_view('addManu');
}

function updateAction() {
    $id = $_GET['id'];
    global $error;
    if (isset($_POST['btn-update'])) {
        if (empty($_POST['name'])) {
            $error['title'] = "Tên nhà cung cấp không được để trống!";
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ nhà cung cấp không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
            $data = [
                'supplierName' => $name,
                'address' => $address,
                'updatedAt' => date('Y-m-d H:i:s', time())
            ];
            updateManu($data, $id);
            redirect("?mod=manufacturer");
        }
    }

    $data['infoManu'] = getManuById($id);
    load_view('updateManu', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    if (isset($_POST['btn-delete'])) {
        deleteManu($id);
        redirect("?mod=manufacturer");
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=manufacturer");
    }

    $data['infoManu'] = getManuById($id);
    load_view('deleteManu', $data);
}