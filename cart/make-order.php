<?php

//такая вот офигенная проверка на наличие товаров в корзине
if (isset($_POST['cartSize']) and $_POST['cartSize'] > 0) {
    header('Location: http://moloko.glebkalachev.ru/cart/order/');
} else {
    header('Location: http://moloko.glebkalachev.ru/cart/');
}