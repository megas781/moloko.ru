<?php

include_once '../../App.php';

print_r($_POST);

//Достаем фамилию
if (isset($_POST['fio']) and $_POST['fio'] !== '' and preg_match('/^[А-Яа-яЁё-]{2,}\s+[А-Яа-яЁё-]{2,}($|\s+[А-Яа-яЁё-]{2,})$/u', $_POST['fio'])) {
    $fio = htmlspecialchars($_POST['fio']);
} else {
    echo 0;
    return;
}

//Достаем адрес
if (isset($_POST['address']) and $_POST['address'] !== '' and preg_match('/^[\dА-Яа-яЁё\s,.-]{2,}$/u', $_POST['address'])) {
    $address = htmlspecialchars($_POST['address']);
} else {
    echo 0;
    return;
}

//Достаем номер телефона
if (isset($_POST['phoneNumber']) and $_POST['phoneNumber'] !== '' and preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u', $_POST['phoneNumber'])) {
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
} else {
    echo 0;
    return;
}

//Достаем способ оплаты
if (isset($_POST['paymentMethod']) and $_POST['paymentMethod'] !== '') {

    switch ($_POST['paymentMethod']) {
        case 'cash':
        case 'online':
            $paymentMethod = $_POST['paymentMethod'];
            break;
        default:
            echo 0;
            return;
    }

} else {
    echo 0;
    return;
}

if (isset($_POST['privacyPolicyArgeement']) and $_POST['privacyPolicyArgeement'] === 'true') {
    $paymentMethod = htmlspecialchars($_POST['paymentMethod']);
} else {
    echo 0;
    return;
}

//Достаем карзину
if (isset($_POST['cart']) and is_array($_POST['cart']) and count($_POST['cart']) > 0) {
    $cart = $_POST['cart'];
} else {
    echo 0;
    return;
}

//Достаём необязательный комментарий
if (isset($_POST['orderComment'])) {
    $orderComment = htmlspecialchars($_POST['orderComment']);
} else {
    //на всякий случай. При исправной работе $_POST['orderComment'] всегда существует (по крайней мере '')
    $orderComment = '';
}

//Сначала добавляем заказ в таблицу

$APP->addOrder($fio,$address,$phoneNumber,$paymentMethod, $orderComment, $cart);


//foreach ($cart as $productId => $quantity) {
//
//
//
//}