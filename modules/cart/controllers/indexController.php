<?php

function construct() {
    load_model('index');
    load('helper', 'format');
    load('helper', 'categories');
    load('helper', 'product');
}

function indexAction(){
    load_view('index');
}