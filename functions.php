<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function get_doors(){
    global $pdo;
    $res = $pdo->query("SELECT * FROM doors");
    return $res->fetchAll();
}