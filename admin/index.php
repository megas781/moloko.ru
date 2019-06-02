<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'admin/admin.css',
    'page_id' => 'admin',
    'page_title' => 'Просмотр заказов'
];

$APP->includeHeaderWithParams($metainfo);

?>

<?php

$orders = $APP->getOrders();


?>


    <div id="orders">

        <!--        Здесь будет цикл заказов-->
        <?php foreach ($orders as $order):

            $totalPrice = 449;

            ?>
            <div class="order">

                <h3 class="order-title">Заказ #<?php echo $order['order_id'] ?>
                    — <?php echo $order['order_datetime'] ?></h3>

                <table class="order-products">
                    <tbody>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Объем, л</th>
                        <th>Цена/шт</th>
                        <th>Кол-во</th>
                        <th>Всего</th>
                    </tr>


                    <!--                Здесь будет цикл товаров-->
                    <?php

                    $orderProducts = $APP->getProductsByOrderId($order['order_id']);

                    $itemCount = 0;
                    foreach ($orderProducts as $orderProduct): ?>
                        <tr>
                            <td><?php $itemCount++;
                                echo $itemCount ?></td>
                            <td><?php echo $orderProduct['title'] ?></td>
                            <td><?php echo $orderProduct['volume'] ?> л</td>
                            <td><?php echo $orderProduct['price'] ?> руб</td>
                            <td><?php echo $orderProduct['quantity'] ?></td>
                            <td><?php echo $orderProduct['price'] * $orderProduct['quantity'] ?> руб</td>
                        </tr>

                        <?php
                        $totalPrice += $orderProduct['price'] * $orderProduct['quantity'];
                    endforeach;
                    ?>

                    <tr>
                        <td></td>
                        <td>Доставка</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>449 руб</td>
                    </tr>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Итого</th>
                        <td><?php echo $totalPrice ?> руб</td>
                    </tr>

                    </tbody>
                </table>


            </div>
        <?php endforeach; ?>
    </div>

<?php $APP->includeFooterWithParams($metainfo); ?>