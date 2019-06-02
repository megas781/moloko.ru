<?php
require_once 'App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'main.css',
    'page_id' => 'main',
    'page_title' => 'Главная'
];

$APP->includeHeaderWithParams($metainfo);

?>

<div class="greeting">

    <span class="greeting-text-1">Домашнее молоко</span>
    <span class="greeting-text-2">в массы!</span>

</div>

<div class="numbers">
    <div class="number-cell">
        <img src="images/number1.png" alt="курьеры" class="number-thumbnail">
        <span class="number-value">100+</span>
        <span class="number-text">Курьеров по всей Московской области</span>
    </div>
    <div class="number-cell">
        <img src="images/number2.png" alt="фермеры" class="number-thumbnail">
        <span class="number-value">40+</span>
        <span class="number-text">Фермеров, успешно распространяющих свою продукцию</span>
    </div>
    <div class="number-cell">
        <img src="images/number3.png" alt="люди" class="number-thumbnail">
        <span class="number-value">4000+</span>
        <span class="number-text">Довольных клиентов</span>
    </div>
</div>

<h2 class="cell-container-title">Товары</h2>
<div class="products">
    <?php $APP->printThreeRandomProducts(); ?>
</div>
<a class="more-detail" href="/products">Все товары</a>

<h2 class="cell-container-title">Продавцы</h2>

<div class="sellers">
    <?php $APP->printThreeRandomSellers(); ?>
</div>
<a class="more-detail" href="/sellers">Все продавцы</a>

<div class="buying-process">
    <h1 class="cell-container-title">Процесс покупки</h1>

    <div class="bp-steps">
        <div class="bp-step">
            <img class="bp-step-image" src="images/step1.png" alt="">
            <span class="bp-step-text">Делаете заказ</span>
        </div>
        <div class="bp-separator"></div>
        <div class="bp-step">
            <img class="bp-step-image" src="images/step2.png" alt="">
            <span class="bp-step-text">Курьер доставляет заказ в удобное для вас время</span>
        </div>
        <div class="bp-separator"></div>
        <div class="bp-step">
            <img class="bp-step-image" src="images/step3.png" alt="">
            <span class="bp-step-text">Продавец получает деньги только после доставки товара</span>
        </div>
    </div>
</div>

<a href="http://moloko.glebkalachev.ru/products" class="goto-products-link blue-button">Перейти к товарам</a>

<?php $APP->includeFooterWithParams(); ?>
