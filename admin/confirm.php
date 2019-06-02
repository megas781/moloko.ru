<?php
include_once '../App.php';

if (isset($_POST['checked']) and isset($_POST['orderId'])) {

    $value = $_POST['checked'];
    $orderId = $_POST['orderId'];

    switch ($value) {
        case 'true':
        case 'false':
            $APP->performSqlQuery('
            update stored_orders set confirmed = '.$value.' where order_id = '.$orderId.'
            ');
            break;
        default:
            break;
    }
}