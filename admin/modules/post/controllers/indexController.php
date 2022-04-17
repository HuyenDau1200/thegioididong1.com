<?php
function construct(){
    load_model('index');
    load('lib', 'validation');
}

function indexAction(){
    //Phân trang
    //Xuất dữ liệu
    $num_rows = sum_posts();
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

    $data['listPost'] = getPosts($start, $num_per_page);
    $data['numPage'] = $num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    load_view('index',$data);
}

function addAction(){
    global $error, $title, $postDesc, $postDetail, $postCatId, $fileName;

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

        $postDesc = empty($_POST['desc']) ? null : $_POST['desc'];
        $postDetail = empty($_POST['detail']) ? null : $_POST['detail'];

        if (empty($_POST['cat'])) {
            $error['cat'] = "Vui lòng chọn danh mục bài viết!";
        } else {
            $postCatId = $_POST['cat'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Vui lòng chọn ảnh sản phẩm hoặc chọn lại hình ảnh đúng định dạng! (Chỉ được upload file có đuôi png, jpg, gif, jpeg với kích thước < 20MB)";
        }

        if (empty($error)) {
            $post = [
                'postTitle' => $title,
                'postThumb' => $fileName,
                'postDesc' => $postDesc,
                'postDetail' => $postDetail,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time()),
                'postCatId' => $postCatId,
            ];
            addPost($post);
            redirect("?mod=post");
        }
    }
    $data['listCatOptions'] = getPostCat();
    load_view('add', $data);
}

function updateAction(){
    $id = $_GET['id'];

    global $error, $title, $postDesc, $postDetail, $postCatId, $fileName;
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

        $postDesc = empty($_POST['desc']) ? null : $_POST['desc'];
        $postDetail = empty($_POST['detail']) ? null : $_POST['detail'];

        if (empty($_POST['cat'])) {
            $error['cat'] = "Vui lòng chọn danh mục bài viết!";
        } else {
            $postCatId = $_POST['cat'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Vui lòng chọn ảnh sản phẩm hoặc chọn lại hình ảnh đúng định dạng! (Chỉ được upload file có đuôi png, jpg, gif, jpeg với kích thước < 20MB)";
        }

        if (empty($error)) {
            $post = [
                'postTitle' => $title,
                'postThumb' => (empty($fileName)) ? getPostById($id)['postThumb'] : $fileName,
                'postDesc' => $postDesc,
                'postDetail' => $postDetail,
                'createdBy' => $_SESSION['user_login'],
                'createdAt' => date('Y-m-d H:i:s', time()),
                'updatedAt' => date('Y-m-d H:i:s', time()),
                'postCatId' => $postCatId,
            ];
            updatePost($post, $id);
            redirect("?mod=post");
        }
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=post");
    }

    $data['listCatOptions'] = getPostCat();
    $data['infoPost'] = getPostById($id);
    load_view('update', $data);
}

function deleteAction(){
    $id = $_GET['id'];

    if (isset($_POST['btn-delete'])) {
        deletePost($id);
        redirect("?mod=post");
    }

    if (isset($_POST['btn-back'])) {
        redirect("?mod=post");
    }

    $data['listCatOptions'] = getPostCat();
    $data['infoPost'] = getPostById($id);
    load_view('delete', $data);
}