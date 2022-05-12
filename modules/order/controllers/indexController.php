<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'carts');
}

#Load model
#Load view
#Load lib
#load helper


function indexAction(){
    load_view('index');
}
function updateAction(){
    $id=$_POST['id'];
    echo $id;
}
