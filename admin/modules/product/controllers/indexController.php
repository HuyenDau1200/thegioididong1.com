<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
     load_model('index');
     load('lib', 'validation');
     load('helper', 'format');
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
    $total_row = sumProducts();
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);

    //Trang hiện hành
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $data['listProduct'] = getProducts($start, $num_per_page);
    $data['numPage']=$num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    $data['sumProducts'] = $total_row;
    load_view('index', $data);
}

function addAction() {
    $data['listCatOptions'] = categoriesRecusive();
    $data['listManuOptions'] = listManuOptions();
    $data['listColorOptions'] = listColorOptions();

    global $error, $code, $productName, $price, $promotionPrice, $productDesc, $productDetail, $catId, $manufacturerId, $colorId, $upload_file, $fileName, $qty;

    //Xu ly upload file anh
        if (isset($_FILES['file'])) {
            $upload_dir = "public/images/";
            $upload_file = $upload_dir . basename($_FILES['file']['name']);
            #Xử lý upload đúng định dạng file ảnh
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array($type, $type_allow)) {
                $error['type'] = "Chỉ được upload file có đuôi png, jpg, gif, jpeg!";
            } else {
                #Upload file có kích thước < 20 MB
                $file_size = $_FILES['file']['size'];
                if ($file_size > 29000000) {
                    $error['file-size'] = "Chỉ được upload file có kích thước < 20MB!";
                }
                if (file_exists($upload_file)) {
                    $count = 1;
                    $upload_file_new = $upload_dir . pathinfo($upload_file)['filename'] . " - Copy." . pathinfo($upload_file)['extension'];
                    if (!file_exists($upload_file_new)) {
                        $upload_file = $upload_file_new;
                    } else {
                        while ($count < 100) {
                            $upload_file_new = $upload_dir . pathinfo($upload_file)['filename'] . " - Copy ({$count})." . pathinfo($upload_file)['extension'];
                            if (!file_exists($upload_file_new)) {
                                $upload_file = $upload_file_new;
                                break;
                            }
                            $count++;
                        }
                    }
                }
            }
            if (!isset($error['type']) && !isset($error['file-size'])) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    $fileName = basename($upload_file);
                }
            }
        }

    //Add product
    if (isset($_POST['btn-add'])) {
        $error = [];
        if (empty($_POST['product-code'])) {
            $error['code'] = "Mã sản phẩm không được để trống!";
        } else {
            $code = $_POST['product-code'];
        }

        if (empty($_POST['product-name'])) {
            $error['name'] = "Tên sản phẩm không được để trống!";
        } else {
            $productName = $_POST['product-name'];
        }

        if (empty($_POST['price'])) {
            $error['price'] = "Giá sản phẩm không được để trống!";
        } else {
            $price = $_POST['price'];
        }

        $promotionPrice = empty($_POST['promotion-price']) ? null : $_POST['promotion-price'];
        $productDesc = empty($_POST['desc']) ? null : $_POST['desc'];
        $productDetail = empty($_POST['detail']) ? null : $_POST['detail'];

        if (empty($_POST['qty'])) {
            $error['qty'] = "Vui lòng nhập số lượng sản phẩm!";
        }
        else {
            $qty = $_POST['qty'];
        }

        if (empty($_POST['cat'])) {
            $error['cat'] = "Vui lòng chọn danh mục cha!";
        } else {
            $catId = $_POST['cat'];
        }

        if (empty($_POST['manufacturer'])) {
            $error['manufacturer'] = "Vui lòng chọn nhà cung cấp!";
        } else {
            $manufacturerId = $_POST['manufacturer'];
        }

        if (empty($_POST['color'])) {
            $error['color'] = "Vui lòng chọn màu sắc sản phẩm!";
        } else {
            $colorId = $_POST['color'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Vui lòng chọn ảnh sản phẩm hoặc chọn lại hình ảnh đúng định dạng! (Chỉ được upload file có đuôi png, jpg, gif, jpeg với kích thước < 20MB)";
        }

        if (empty($error)) {
            $product = [
                'productSku' => $code,
                'productName' => $productName,
                'productThumb' => $fileName,
                'price' => $price,
                'promotionPrice' => $promotionPrice,
                'productDesc' => $productDesc,
                'productDetail' => $productDetail,
                'qty' => $qty,
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time()),
                'catId' => $catId,
                'manufactureId' => $manufacturerId,
                'colorId' => $colorId
            ];
            addProduct($product);
            redirect("?mod=product");
        }
    }
    load_view('addProduct', $data);
}

function updateAction() {
    $id = $_GET['id'];
    global $error;
    //Xu ly upload file anh
    if (isset($_FILES['file'])) {
        $upload_dir = "public/images/";
        $upload_file = $upload_dir . basename($_FILES['file']['name']);
        #Xử lý upload đúng định dạng file ảnh
        $type_allow = array('png', 'jpg', 'gif', 'jpeg');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if (!in_array($type, $type_allow)) {
            $error['type'] = "Chỉ được upload file có đuôi png, jpg, gif, jpeg!";
        } else {
            #Upload file có kích thước < 20 MB
            $file_size = $_FILES['file']['size'];
            if ($file_size > 29000000) {
                $error['file-size'] = "Chỉ được upload file có kích thước < 20MB!";
            }
            if (file_exists($upload_file)) {
                $count = 1;
                $upload_file_new = $upload_dir . pathinfo($upload_file)['filename'] . " - Copy." . pathinfo($upload_file)['extension'];
                if (!file_exists($upload_file_new)) {
                    $upload_file = $upload_file_new;
                } else {
                    while ($count < 100) {
                        $upload_file_new = $upload_dir . pathinfo($upload_file)['filename'] . " - Copy ({$count})." . pathinfo($upload_file)['extension'];
                        if (!file_exists($upload_file_new)) {
                            $upload_file = $upload_file_new;
                            break;
                        }
                        $count++;
                    }
                }
            }
        }
        if (!isset($error['type']) && !isset($error['file-size'])) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $fileName = basename($upload_file);
            }
        }
    }

    //Add product
    if (isset($_POST['btn-update'])) {
        $error = [];
        if (empty($_POST['product-code'])) {
            $error['code'] = "Mã sản phẩm không được để trống!";
        } else {
            $code = $_POST['product-code'];
        }

        if (empty($_POST['product-name'])) {
            $error['name'] = "Tên sản phẩm không được để trống!";
        } else {
            $productName = $_POST['product-name'];
        }

        if (empty($_POST['price'])) {
            $error['price'] = "Giá sản phẩm không được để trống!";
        } else {
            $price = $_POST['price'];
        }

        $promotionPrice = empty($_POST['promotion-price']) ? null : $_POST['promotion-price'];
        $productDesc = empty($_POST['desc']) ? null : $_POST['desc'];
        $productDetail = empty($_POST['detail']) ? null : $_POST['detail'];

        if (empty($_POST['qty'])) {
            $error['qty'] = "Vui lòng nhập số lượng sản phẩm!";
        }
        else {
            $qty = $_POST['qty'];
        }

        if (empty($_POST['cat'])) {
            $error['cat'] = "Vui lòng chọn danh mục sản phẩm!";
        } else {
            $catId = $_POST['cat'];
        }

        if (empty($_POST['manufacturer'])) {
            $error['manufacturer'] = "Vui lòng chọn nhà cung cấp!";
        } else {
            $manufacturerId = $_POST['manufacturer'];
        }

        if (empty($_POST['color'])) {
            $error['color'] = "Vui lòng chọn màu sắc sản phẩm!";
        } else {
            $colorId = $_POST['color'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Vui lòng chọn ảnh sản phẩm hoặc chọn lại hình ảnh đúng định dạng! (Chỉ được upload file có đuôi png, jpg, gif, jpeg với kích thước < 20MB)";
        }

        if (empty($error)) {
            $product = [
                'productSku' => $code,
                'productName' => $productName,
                'productThumb' => (empty($fileName)) ? getProductById($id)['productThumb'] : $fileName ,
                'price' => $price,
                'promotionPrice' => $promotionPrice,
                'productDesc' => $productDesc,
                'productDetail' => $productDetail,
                'qty' => $qty,
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time()),
                'catId' => $catId,
                'manufactureId' => $manufacturerId,
                'colorId' => $colorId
            ];
            updateProduct($product, $id);
            redirect("?mod=product");
        }
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=product");
    }
    $data['infoProduct'] = getProductById($id);
    $data['listCatOptions'] = categoriesRecusive();
    $data['listManuOptions'] = listManuOptions();
    $data['listColorOptions'] = listColorOptions();
    load_view('updateProduct', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    if (isset($_POST['btn-delete'])) {
        deleteProduct($id);
        redirect("?mod=product");
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=product");
    }
    $data['infoProduct'] = getProductById($id);
    $data['listCatOptions'] = categoriesRecusive();
    $data['listManuOptions'] = listManuOptions();
    $data['listColorOptions'] = listColorOptions();
    load_view('deleteProduct', $data);
}