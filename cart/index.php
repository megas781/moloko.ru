<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'cart/cart.css',
    'page_id' => 'cart',
    'page_title' => 'Корзина',
    'script_path' => HTTP_ROOT . 'cart/cart.js'
];

$APP->includeHeaderWithParams($metainfo);

?>

<div id="cart-products-container">
<!--Здесь контент заполняется с помощью js-->
</div>




<div class="summary">
    <div class="wr960">
        <table class="summary-table" cellspacing="8">

            <tr>
                <td>Товары(3)</td>
                <td>690 руб</td>
            </tr>
            <tr>
                <td>Доставка</td>
                <td>449 руб</td>
            </tr>
            <tr style="font-weight: bold">
                <td>Итого</td>
                <td>1139 руб</td>
            </tr>

        </table>
        <form action="/cart/order/" method="post">
            <input type="submit" class="blue-button" value="Оформить заказ" >
        </form>

    </div>
</div>

<?php $APP->includeFooterWithParams($metainfo); ?>
