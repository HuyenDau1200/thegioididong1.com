<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexCatAction()
{
    //Phân trang
    //Xuất dữ liệu
    $num_rows = sum_cats();
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

    $listCat = get_cat($start, $num_per_page);
    $data['listCat'] = $listCat;
    $data['numPage'] = $num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    load_view('indexCat', $data);
}

function addCatAction()
{
    global $error, $title;
    if (isset($_POST['btn-addCat'])) {
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Tên danh mục không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        if (empty($error)) {
            $data = array(
                'postCatTitle' => $title,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time())
            );
            add_cat($data);
            redirect("?mod=post&controller=cat&action=indexCat");
        }
    }
    load_view('addCat');
}

function updateCatAction()
{
    $id=$_GET['id'];
    $data['info_post_cat'] = getPostCatById($id);
    global $error, $title;
    if (isset($_POST['btn-updateCat'])){
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Tên danh mục không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        if (empty($error)) {
            $data = array(
                'postCatTitle' => $title,
                'updatedAt' => date('Y-m-d H:i:s', time())
            );
            updateCat($data, $id);
            redirect("?mod=post&controller=cat&action=indexCat");
        }
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=post&controller=cat&action=indexCat");
    }

    load_view('updateCat',$data);
}

function deleteCatAction()
{
    $id = $_GET['id'];
    $data['info_post_cat']= getPostCatById($id);
    if (isset($_POST['btn-deleteCat'])) {
        deletePostCatById($id);
        redirect("?mod=post&controller=cat&action=indexCat");
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=post&controller=cat&action=indexCat");
    }
    load_view('deleteCat',$data);
}