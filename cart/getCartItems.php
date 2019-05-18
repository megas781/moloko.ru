<?php

include_once '../App.php';


//Скрипт, используемый AJAX для извлечения данных о выбранных товарах
echo json_encode($APP->fetchAssocData('
    select * from (select * from products where product_id in (' . $_GET['selectedProducts'] . ') ) p
        join seller_to_products stp on p.product_id = stp.product_id
        join sellers s on stp.seller_id = s.seller_id
        join villages v on s.village_id = v.village_id
    '));