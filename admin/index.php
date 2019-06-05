<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'admin/admin.css',
    'page_id' => 'admin',
    'page_title' => 'Администрационная панель',
    'script_path' => HTTP_ROOT . 'admin/admin.js'
];

$APP->includeHeaderWithParams($metainfo);


$login = 'admin';
$password = 'adminasdf';

if (isset($_POST['login']) and
    isset($_POST['password']) and
    $_POST['login'] === $login and
    $_POST['password'] === $password
):

    $orders = $APP->getOrders();
    ?>

    <div id="orders">

        <!--        Здесь будет цикл заказов-->
        <?php foreach ($orders as $order):

            $totalPrice = 449;

            ?>
            <div class="order">
                <input type="hidden" class="order-id" value="<?php echo $order['order_id'] ?>">
                <h3 class="order-title"><input class="confirm-checkbox"
                                               type="checkbox" <?php echo $order['confirmed'] == true ? 'checked' : '' ?>>Заказ
                    #<?php echo $order['order_id'] ?>
                    — <?php echo $order['order_datetime'] ?>,<br> тел. <?php echo $order['phone_number'] ?> - <?php echo $order['name'] . $order['fio'] ?></h3>

                <table class="admin-order-products">
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
                            <td>
                                <a href="<?php echo HTTP_ROOT . $orderProduct['product_id'] ?>"><?php echo $orderProduct['title'] ?></a>
                            </td>
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

<?php else: ?>
    <!--Форма входа на страницу-->

    <form action="index.php" method="post">

        <table>
            <tr>
                <td>Логин</td>
                <td><input type="text" name="login" value="admin"></td>
            </tr>
            <tr>
                <td>Пароль</td>
                <td><input type="password" name="password" id="password"></td>
                <script>
                    document.getElementById('password').focus();
                </script>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="blue-button" id="enter-button"></td>
            </tr>
        </table>

    </form>

<?php endif; ?>

<?php $APP->includeFooterWithParams($metainfo); ?>