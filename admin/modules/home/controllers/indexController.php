<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
     load_model('index');
     load('helper', 'format');
}

#Load model
#Load view
#Load lib
#load helper
function indexAction(){
    $data['sumOrder'] = sumOrders();
    $data['sumProducts'] = sumProducts();
    $data['listOrder'] = listTopOrder();
    load_view('index', $data);
}
