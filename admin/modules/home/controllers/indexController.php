<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
     load_model('index');
}

#Load model
#Load view
#Load lib
#load helper
function indexAction(){
    redirect("?mod=product");
    load_view('index');
}
