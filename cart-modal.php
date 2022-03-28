<div class="modal-body">
    <?if(!empty($_SESSION['cart'])):?>
        <table class="table">
            <tbody>
            <?foreach ($_SESSION['cart'] as $items => $item):?>
                <tr>
                    <td><?=$item['name']?></td>
                    <td><?=$item['image']?></td>
                    <td><?=$item['price']?></td>
                </tr>
            <?endforeach;?>
            <tr>
                <td>Товаров: <span id="qty"><?=$_SESSION['cart.qty']?></span><br>
                    На сумму: <span id="sum"><?=$_SESSION['cart.sum']?> руб.</span>
                </td>
            </tr>
            </tbody>
        </table>
    <?else:?>
        <h5 style="text-align: center">Корзина пуста</h5>
    <?endif;?>
</div>
<div class="modal-footer">
    <?if(!empty($_SESSION['cart'])):?>
        <button type="button" class="btn btn-danger" id="clear">Очистить корзину</button>
        <button type="button" class="btn btn-success">Оформить заказ</button>
    <?endif;?>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Продолжить покупки</button>
</div>
