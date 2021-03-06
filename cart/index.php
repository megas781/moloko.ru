<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'cart/cart.css',
    'page_id' => 'cart',
    'page_title' => 'Корзина',
    //здесь не надо указывать script_path, т.к. скрипт подгружается в load-selected-products.js
//    'script_path' => HTTP_ROOT . 'cart/cart.js'
];

$APP->includeHeaderWithParams($metainfo);

?>

<div id="cart-products-container">
<!--Здесь контент заполняется с помощью js-->
    <script src="load-selected-products.js"></script>

</div>




<div class="summary">
    <div class="wr960">
        <table class="summary-table" cellspacing="8">

            <tr>
                <td class="js-products-label">Товары</td>
                <td class="js-products-price">0 руб</td>
            </tr>
            <tr>
                <td>Доставка</td>
                <td class="js-delivery-price">449 руб</td>
            </tr>
            <tr style="font-weight: bold">
                <td>Итого</td>
                <td class="js-total-price">0 руб</td>
            </tr>

        </table>
        <form action="/cart/make-order.php" method="post">
            <input type="hidden" name="cartSize" value="" class="js-cart-size">

            <input id="checkout-button" type="submit" class="blue-button disabled" value="Оформить заказ" disabled>
        </form>

    </div>
</div>

<?php $APP->includeFooterWithParams($metainfo); ?>
