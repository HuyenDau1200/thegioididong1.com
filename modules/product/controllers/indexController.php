<?php
function construct() {
    load_model('index');
    load('helper', 'format');
    load('helper', 'categories');
}

function detailAction() {
    $id = $_GET['id'];
    $data['catTitle'] = getCatTitle($id);
    $data['infoProduct'] = infoProduct($id);
    $data['listProductRelated'] = getProductsRelated($id);
    load_view('detail', $data);
}

