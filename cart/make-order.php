<?php

if (isset($_POST['cartSize']) and $_POST['cartSize'] > 0) {
    header('Location: http://moloko.glebkalachev.ru/cart/order/');
} else {
    header('Location: http://moloko.glebkalachev.ru/cart/');
}