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
    <?php
    $products = $APP->getProducts();

    for ($i = 0; $i <= 2; $i++):
    $item = $products[$i];
        ?>
        <section class="product-card">
            <input type="hidden" value="<?php echo $item['product_id'] ?>" class="product_id_holder">
            <a href="http://moloko.glebkalachev.ru/products/detail/?product_id=<?php echo $item['product_id'] ?>"><img class="product-card-image" src="<?php echo $item['image_url'] ?>" alt="image"></a>
            <a class="product-card-title" href="./detail/?product_id=<?php echo $item['product_id'] ?>"><?php echo $item['title'] ?></a>
            <p class="product-card-desc">Объем <?php echo $item['volume'] ?>, энергетическая ценность <?php echo $item['energy_value']?>, белки <?php echo $item['squirrels'] ?> г, жиры <?php echo $item['fats'] ?> г, углеводы <?php echo $item['carbohydrates'] ?> г</p>
            <div class="seller">
                <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/?seller_id=<?php echo $item['seller_id'] ?>"><?php echo $item['surname'] . ' ' . $item['name'] ?></a></div>
                <div class="seller-locality">пос. <?php echo $item['village'] ?></div>
            </div>
            <div class="flex-space"></div>
            <div class="product-card-price"><?php echo $item['price'] ?> руб</div>
            <div class="product-card-controls">
                <div class="product-card-quantity stepper" id="pr-st-<?php echo $item['product_id'] ?>">
                    <span class="stepper-minus stepper-control">–</span>
                    <span class="stepper-number">1</span>
                    <span class="stepper-plus stepper-control">+</span>
                </div>
                <span class="add-to-cart-button blue-button">В корзину</span>
            </div>
        </section>
    <?php endfor; ?>
</div>
<a class="more-detail" href="/products" target="_blank">Все товары</a>

<h2 class="cell-container-title">Продавцы</h2>

<div class="sellers">

    <?php

    $sellers = $APP->getSellers();
    for ($i = 0; $i <= 2; $i++):
    $seller = $sellers[$i];
        ?>
        <section class="seller-card">
            <a href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>"><img class="seller-card-image" src="<?php echo $seller['avatar_url'] ?>" alt="фотография продавца"></a>
            <a class="seller-card-name" href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>"><?php echo $seller['surname'] . ' ' . $seller['name'] ?></a>
            <div class="seller-card-locality">пос. <?php echo $seller['village'] ?></div>
            <p class="seller-card-desc"><?php echo $APP->formatDescription($seller['description']) ?></p>
            <div class="flex-space"></div>
            <div class="seller-card-detail-button-positioner">
                <a href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>" class="detail-link blue-button">Подробнее</a>
            </div>
        </section>
    <?php endfor; ?>

</div>
<a class="more-detail" href="/sellers" target="_blank">Все продавцы</a>

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

<a href="http://moloko.glebkalachev.ru/products" class="goto-products-link">Перейти к товарам</a>

<?php $APP->includeFooterWithParams(); ?>
