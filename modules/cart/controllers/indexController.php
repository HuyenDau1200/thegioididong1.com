<?php
function construct() {
    load_model('index');
    //load_model('order');
    load('helper', 'format');
    load('helper', 'categories');
    load('helper', 'product');
    load('helper', 'carts');
    load('lib', 'validation');
    load('lib', 'email');
}

function indexAction(){
    $data['listBuyCart'] = getListBuyCart();
    $data['numOrderCart'] = getNumOrderCart();
    load_view('index', $data);
}

function addAction() {
    $id = (int) $_GET['id'];
    if (user_login()) {
        add_cart($id);
        redirect("?mod=cart&action=index");
    } else {
        redirect("?mod=users&action=login");
    }
}

function deleteAction () {
    $id = (int)$_GET['id'];
    deleteCart($id);
    redirect("?mod=cart");
}

function updateAjaxAction () {
    $id = (int) $_POST['id'];
    $qty = (int) $_POST['qty'];
    //Lấy thông tin sản phẩm
    $item = get_product_by_id($id);
    //Kiểm tra thử trong giỏ hàng có tồn tại key:$id hay chưa ?
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        //Cập nhập số lượng
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;
        //Cập nhập tổng tiền
        $subTotal = $qty * $item['price'];
        $_SESSION['cart']['buy'][$id]['subTotal'] = $subTotal;
        //Cập nhập toàn bộ giỏ hàng
        update_info_cart();
        //Lấy tổng giá trị trong giỏ hàng
        $total = getTotalCart();
        //Giá trị trả về
        $data = [
            'numOrder' => $_SESSION['cart']['info']['num_order'],
            'subTotal' => currency_format($subTotal),
            'total' => currency_format($total),
        ];
        echo json_encode($data);
        $data1 = [
            'qtyOrdered' => $qty
        ];
        updateCartItem($data1, $_SESSION['cart']['infoCart']['cartId'], $_SESSION['cart']['buy'][$id]['productId']);
    }
}

/**
 * Check out.
 *
 * @return void
 */
function checkoutAction() {
    $data['infoUser'] = getInfoUser();
    global $error, $fullname, $email, $phone, $address, $note;
    if (isset($_POST['order-now'])) {
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Họ và tên không được để trống!";
        } else {
            $fullname = $_POST['fullname'];
        }

        $email = $_POST['email'];

        if (empty($_POST['phone'])) {
            $error['phone'] = " Số điện thoại người nhận không được để trống!";
        } else {
            if (!is_phoneNumber($_POST['phone'])) {
                $error['phoneNumber'] = "Số điện thoại không đúng định dạng!";
            } else {
                $phone = $_POST['phone'];
            }
        }

        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ nhận hàng không được để trống!";
        } else {
            $address = $_POST['address'];
        }

        $note = $_POST['note'];

        $order = [];
        $orderItems = [];
        $total = 0;
        $subtotal = [];
        if (empty($error)) {
            $data = [
                'customerName' => $fullname,
                'customerEmail' => $email,
                'customerAddress' => $address,
                'customerPhone' => $phone,
                'note' => $note,
                'orderCreatedAt' => date('Y-m-d H:i:s', time()),
                'orderUpdatedAt' => date('Y-m-d H:i:s', time()),
                'status' => "Đặt hàng thành công",
                'cartId' => $_SESSION['cart']['infoCart']['cartId']
            ];
            addOrder($data);
            $order = $data;
             foreach ($_SESSION['cart']['buy'] as $item) {
                $data = [
                    'productId' => $item['productId'],
                    'productPrice' => $item['price'],
                    'qtyOrdered' => $item['qty'],
                    'orderId' => getLastOrderId()
                ];
                $subtotal[$item['productId']] = $item['price']*$item['qty'];
                $total += $subtotal[$item['productId']];
                $orderItems[] = $data;
                addOrderItem($data);
            }
            unset($_SESSION['cart']);
            $content = "<h2>Chào bạn {$fullname}</h2>
                <h2>Chúc mừng bạn đã đặt hàng thành công. Chi tiết đơn hàng như sau:</h2>
                <h3>Thông tin người nhận: </h3>
                <p>Họ tên: <strong>{$order['customerName']}</strong></p>
                <p>Số điện thoại: <strong>{$order['customerPhone']}</strong></p>
                <p>Email: <strong>{$order['customerEmail']}</strong></p>
                <p>Địa chỉ giao hàng: <strong>{$order['customerAddress']}</strong></p>
                <h3>Chi tiết đơn hàng:</h3>
                <table>
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Giá</td>
                            <td>Số lượng mua</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php forearch($orderItems as $item) {
                                
                        ?>
                        <tr>
                            <td>{$item['productId']}</td>
                            <td>{$item['productPrice']}</td>
                            <td>{$item['qtyOrdered']}</td>
                            <td>{$subtotal[$item['productId']]}</td>
                            <td></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <h3>Tổng đơn hàng: <strong>{$total}</strong></h3>
                <p>Team support from thegioididong.com</p>";
            send_mail($email, $fullname , '[Thế giới di động] Đặt hàng thành công', $content);
            redirect("?mod=cart&action=successOrder");
        }
    }
    load_view('checkout', $data);
}

/**
 * Success order.
 *
 * @return void
 */
function successOrderAction() {
    load_view('successOrder');
}