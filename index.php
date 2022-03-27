<?php
error_reporting(-1);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                    <a class="btn btn-success" href="#">
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
                <div class="col-12 col-sm-6 col-md-4 card-item" id="door_<?=$door['id']?>" >
                    <div class="card">
                        <img src="images/<?=$door['image']?>" class="card-img-top" alt="<?=$door['name']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$door['name']?></h5>
                            <p class="card-text"><?=$door['description']?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Цена:</b> <?=$door['price']?> руб.</li>
                            <li class="list-group-item"><b>Тип двери:</b> <?=$door['type']?></li>
                            <li class="list-group-item"><b>Назначение:</b> <?=$door['appointment']?></li>
                            <li class="list-group-item"><b>Отделка:</b> <?=$door['open_type']?></li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">В корзину</a>
                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modal_<?=$door['id']?>">Подробнее</a>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="images/<?=$door['image']?>" alt="" class="img-responsive">
                    <p><?=$door['description']?></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Цена:</b> <?=$door['price']?> руб.</li>
                        <li class="list-group-item"><b>Тип двери:</b> <?=$door['type']?></li>
                        <li class="list-group-item"><b>Назначение:</b> <?=$door['appointment']?></li>
                        <li class="list-group-item"><b>Отделка:</b> <?=$door['open_type']?></li>
                        <li class="list-group-item"><b>Отделка:</b> <?=$door['construction']?></li>
                        <li class="list-group-item"><b>Отделка:</b> <?=$door['weight']?></li>
                        <li class="list-group-item"><b>Отделка:</b> <?=$door['size']?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary">В корзину</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <?endforeach;?>
</body>
</html>
