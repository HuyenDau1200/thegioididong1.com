<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
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
    $total_row = sumCats();
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_cat = getCategories($start, $num_per_page);
    $data['listCat'] = $list_cat;
    $data['numPage']=$num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    load_view('index', $data);
}

function addAction() {
    $data['listCatOptions'] = categoriesRecusive();
    global $error, $title, $parentCat;
    if (isset($_POST['btn-add'])) {
        $error = [];
        if (empty($_POST['title'])) {
            $error['title'] = "Tên danh mục không được để trống!";
        } else {
            $title = $_POST['title'];
        }
        $parentCat = $_POST['parent-cat'];

        if (empty($error)) {
            $catItem = [
                'catTitle' => $title,
                'parentId' => $parentCat,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time())
            ];
            addCat($catItem);
            redirect("?mod=category");
        }
    }
    load_view('addCat', $data);
}

function updateAction() {
    $id = $_GET['id'];
    global $error;
    if (isset($_POST['btn-update'])) {
        if (empty($_POST['title'])) {
            $error['title'] = "Tên danh mục không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        $parentId = $_POST['parent-cat'];

        if (empty($error)) {
            $data = [
                'catTitle' => $title,
                'parentId' => $parentId,
                'updatedBy' => $_SESSION['user_login'],
                'updatedAt' => date('Y-m-d H:i:s', time())
            ];
            updateCat($data, $id);
            redirect('?mod=category');
        }
    }
    $data['infoCat'] = getCatById($id);
    $data['listCatOptions'] =categoriesRecusive();
    load_view('updateCat', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    if (isset($_POST['btn-delete'])) {
        deleteCat($id);
        redirect("?mod=category");
    }
    $data['infoCat'] = getCatById($id);
    $data['listCatOptions'] =categoriesRecusive();
    load_view('deleteCat', $data);
}