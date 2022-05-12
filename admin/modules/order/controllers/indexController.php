<?php

function construct() {
    load_model('index');
    load('helper', 'format');
}

function indexAction(){
    $num_per_page = 5;
    $total_row = sumOrders();
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $data['numPage'] = $num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    $data['sumOrders'] = $total_row;
    $data['listOrder'] = listOrders($start, $num_per_page);
    load_view('index', $data);
}

/**
 * Detail Action.
 *
 * @return void
 */
function detailAction() {
    $id = (int) $_GET['id'];
    $infoOrder = getOrderById($id);
    $data['infoOrder'] = $infoOrder;
    $data['listItems'] = getOrderItemByCart($infoOrder['cartId']);
    load_view('detail', $data);
}

/**
 * Update Action.
 *
 * @return void
 */
function updateAction(){
    $id = (int)$_GET['id'];
    $status = $_GET['st'];
    if ($status) {
        $data = [
            'status' => $status
        ];
        updateStatus($id, $data);
    }
    redirect("?mod=order");
}
