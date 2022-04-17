<?php
function construct() {
    load_model('index');
    load('helper', 'format');
    load('helper', 'categories');
}

function indexAction() {
    $id = $_GET['id'];
    $numPerPage = 16;
    $totalRow = sumProductByCatId($id);
    $numPage = ceil($totalRow / $numPerPage);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $numPerPage;
    $catTitle = getCatTitle($id);
    if (getCatByParentId($id) && !empty(getListProductByParentId($id))) {
        $totalRow = count(getListProductByParentId($id, $start, $numPerPage));
        $numPage = ceil($totalRow / $numPerPage);
        $data['listProduct'] = getListProductByParentId($id, $start, $numPerPage);
        $data['numPage'] = $numPage;
    }
    else {
        $data['listProduct'] = getProductsByCat($id, $start, $numPerPage);
        $data['numPage'] = $numPage;
    }
    $data['page'] = $page;
    $data['start'] = $start;
    $data['numPerPage'] = $numPerPage;
    $data['catId'] = $id;
    $data['sumProducts'] = $totalRow;
    $data['catTitle'] = $catTitle;
    load_view('index', $data);
}

