<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'format');
    //load('helper', 'categories');
    load('helper', 'carts');
}

#Load model
#Load view
#Load lib
#load helper


function indexAction(){
    $data['listPhone'] = getListPhone();
    $data['listLaptop'] = getListProductByCatId(3);
    $data['listTopProduct'] = getTopProduct();
    $data['listCatParent'] = getListCatParent();
    $data['listCat'] = getListCat();
    load_view('index', $data);
}
