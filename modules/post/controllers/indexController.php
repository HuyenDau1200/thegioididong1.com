<?php

function construct() {
    load_model('index');
    load('helper', 'format');
    load('helper', 'categories');
    load('helper', 'product');
    load('helper', 'carts');
}

function indexAction() {
    $num_rows = sum_posts();
    $num_per_page = 8;
    $total_row = $num_rows;
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

function detailAction() {
    $id = (int)$_GET['id'];
    $data['infoPost'] = infoPost($id);
    load_view('detail', $data);
}