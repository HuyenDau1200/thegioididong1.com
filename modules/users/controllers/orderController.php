<?php
function construct()
{
    load_model('orders');
    load('helper', 'carts');
    load('helper', 'format');
    load('helper', 'pagging');
}

/**
 * View Order Action .
 *
 * @return void
 */
function viewOrderAction() {
    $num_per_page = 5;
    $total_row = sumOrders(getEmailByUsername(user_login()));
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
    $data['listOrder'] = getListOrders(getEmailByUsername(user_login()), $start, $num_per_page);
    load_view('viewOrder', $data);
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

function cancelAction() {
    $id = (int)$_GET['id'];
    $status = $_GET['st'];
    if ($status) {
        $data = [
            'status' => $status
        ];
        updateStatus($id, $data);
    }
    redirect("?mod=users&controller=order&action=viewOrder");
}