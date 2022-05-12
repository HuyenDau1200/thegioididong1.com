<?php

function construct() {
    load_model('index');
    load('helper', 'format');
    load('helper', 'categories');
    load('helper', 'product');
    load('helper', 'carts');
}

function detailAction(){
    $id = (int)$_GET['id'];
    $data['infoPage'] = getInfoPage($id);
    load_view('index', $data);
}