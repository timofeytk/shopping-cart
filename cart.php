<?php
session_start();
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

if(isset($_GET['cart'])){
    switch ($_GET['cart']){
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $door = get_door($id);

            if(!$door){
                echo json_encode(['code' => 'ok', 'answer' => 'Ошибка добавления товара']);
            }else{
                add_to_cart($door);
                ob_start();
                require __DIR__ . '/cart-modal.php';
                $cart = ob_get_clean();
                echo json_encode(['code' => 'ok', 'answer' => $cart]);
            }
            break;
        case 'show':
            require __DIR__ . '/cart-modal.php';
            break;

        case 'clear':
            if(!empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
            }
            require __DIR__ . '/cart-modal.php';
            break;
    }
}