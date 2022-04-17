<?php
function construct(){
    load_model('index');
    load('lib', 'validation');
}

function indexAction(){
    //Phân trang
    //Xuất dữ liệu
    $num_rows = sum_slider();
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

    $data['listSlider'] = getSliders($start, $num_per_page);
    $data['numPage'] = $num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    load_view('index',$data);
}

function addAction(){
    global $error, $title, $fileName;

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

    //Add Post
    if (isset($_POST['btn-add'])) {
        $error = [];
        if (empty($_POST['title'])) {
            $error['title'] = "Tiêu đề bài viết không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Vui lòng chọn ảnh sản phẩm hoặc chọn lại hình ảnh đúng định dạng! (Chỉ được upload file có đuôi png, jpg, gif, jpeg với kích thước < 20MB)";
        }

        if (empty($error)) {
            $slider = [
                'sliderName' => $title,
                'sliderImage' => $fileName,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time()),
            ];
            addSlider($slider);
            redirect("?mod=slider");
        }
    }
    load_view('add');
}

function updateAction(){
    $id = $_GET['id'];
    global $error, $title, $fileName;
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

    //Add Post
    if (isset($_POST['btn-update'])) {
        $error = [];
        if (empty($_POST['title'])) {
            $error['title'] = "Tiêu đề bài viết không được để trống!";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Vui lòng chọn ảnh sản phẩm hoặc chọn lại hình ảnh đúng định dạng! (Chỉ được upload file có đuôi png, jpg, gif, jpeg với kích thước < 20MB)";
        }

        if (empty($error)) {
            $slider = [
                'sliderName' => $title,
                'sliderImage' => (empty($fileName)) ? getSliderById($id)['sliderImage'] : $fileName,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time()),
            ];
            updateSlider($slider, $id);
            redirect("?mod=slider");
        }
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=slider");
    }

    $data['infoSlider'] = getSliderById($id);
    load_view('update', $data);
}

function deleteAction(){
    $id = $_GET['id'];
    if (isset($_POST['btn-delete'])) {
        deleteSlider($id);
        redirect("?mod=slider");
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=slider");
    }

    $data['infoSlider'] = getSliderById($id);
    load_view('delete', $data);
}