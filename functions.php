<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function get_doors(){
    global $pdo;
    $res = $pdo->query("SELECT * FROM doors");
    return $res->fetchAll();
}

function get_door($id){
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM doors WHERE id = ?");
    $stmt = $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_to_cart($door){
    if(isset($_SESSION['cart'][$door['id']])){
        //если товар уже есть в корзине
        $_SESSION['cart'][$door['id']]['qty'] += 1;
    }else{
        //если товара нет в корзине
        $_SESSION['cart'][$door['id']] = [
            'name' => $door['name'],
            'price' => $door['price'],
            'image' => $door['image'],
            'qty' => 1
        ];
    }

    //количество товара в корзине
    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;

    //сумма товара в корзине
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $door['price'] : $_SESSION['cart.sum'];
}