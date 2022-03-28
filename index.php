<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';
$doors_list = get_doors();

?>
<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Shopping Cart</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Shopping Cart</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </ul>
                    <a class="btn btn-success cart-btn" href="#" data-toggle="modal" data-target="#cart">
                        <span>Корзина</span>
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container">
            <div class="row">
                <?foreach($doors_list as $doors=>$door):?>
                <div class="col-12 col-sm-6 col-md-4 card-item" id="<?=$door['id']?>" >
                    <div class="card">
                        <img src="images/<?=$door['image']?>" class="card-img-top" alt="<?=$door['name']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$door['name']?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Цена:</b> <?=$door['price']?> руб.</li>
                            <?if(!empty($door['old_price'])):?>
                                <li class="list-group-item"><b>Старая цена:</b> <del><?=$door['price']?></del> руб.</li>
                            <?endif;?>
                            <li class="list-group-item"><b>Тип двери:</b> <?=$door['type']?></li>
                            <li class="list-group-item"><b>Назначение:</b> <?=$door['appointment']?></li>
                        </ul>
                        <div class="card-body">
                            <a href="?cart=add&id=<?=$door['id']?>" class="btn btn-primary add-to-cart" data-toggle="modal" data-target="#<?=$door['id']?>" data-id="<?=$door['id']?>">В корзину</a>
                            <a href="#" class="card-link" data-toggle="modal"  data-target="#modal_<?=$door['id']?>">Подробнее</a>
                        </div>
                    </div>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </section>
    <?foreach($doors_list as $doors=>$door):?>
    <div class="modal fade" id="modal_<?=$door['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?=$door['name']?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="images/<?=$door['image']?>" alt="" class="img-responsive">
                    <p><?=$door['description']?></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Цена:</b> <?=$door['price']?> руб.</li>
                        <?if(!empty($door['old_price'])):?>
                            <li class="list-group-item"><b>Старая цена:</b> <del><?=$door['price']?></del> руб.</li>
                        <?endif;?>
                        <li class="list-group-item"><b>Тип двери:</b> <?=$door['type']?></li>
                        <li class="list-group-item"><b>Назначение:</b> <?=$door['appointment']?></li>
                        <li class="list-group-item"><b>Тип покрытия:</b> <?=$door['open_type']?></li>
                        <li class="list-group-item"><b>Конструкция:</b> <?=$door['construction']?></li>
                        <li class="list-group-item"><b>Вес:</b> <?=$door['weight']?></li>
                        <li class="list-group-item"><b>Размеры:</b> <?=$door['size']?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="?cart=add&id=<?=$door['id']?>" class="btn btn-primary add-to-cart" data-toggle="modal" data-target="#<?=$door['id']?>" data-id="<?=$door['id']?>">В корзину</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <?endforeach;?>

    <div class="modal" tabindex="-1" id="cart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Корзина</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="cart-modal-content">

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            function showCart(cart){
                $('#cart .cart-modal-content').html(cart);
                $('#cart').modal();
            }

            $('.add-to-cart').click(function (e){
                e.preventDefault();
                let id = $(this).data('id');

                $.ajax({
                    url: 'cart.php',
                    type: 'GET',
                    data: {cart: 'add', id: 'id'},
                    dataType: 'json',
                    success: function(resp){
                        if(resp.code=='ok'){
                            showCart(resp.answer);
                        }else{
                            alert(resp.answer);
                        }
                    },
                    error: function(){
                        alert('Ошибка добавления товара');
                    }
                });
            });

            $('.cart-btn').click(function (e){
                e.preventDefault();

                $.ajax({
                    url: 'cart.php',
                    type: 'GET',
                    data: {cart: 'show'},
                    success: function (resp){
                        showCart(resp);
                    },
                    error: function (){
                        alert('Ошибка работы корзины');
                    }
                });
            });

            $('#cart .cart-modal-content').on('click', '#clear', function(){
                $.ajax({
                    url: 'cart.php',
                    type: 'GET',
                    data: {cart: 'show'},
                    success: function (resp){
                        showCart(resp);
                    },
                    error: function (){
                        alert('Ошибка работы корзины');
                    }
                });
            });
        });
    </script>
</body>
</html>
