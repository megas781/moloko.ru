<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'cart/cart.css',
    'page_id' => 'cart',
    'page_title' => 'Корзина'
];

$APP->includeHeaderWithParams($metainfo);

?>

<section class="product">

    <img class="product-image" src="/images/milk.png" alt="image">

    <div class="product-info">
        <a class="product-title" href="#">Молоко пастеризованное 3%, 1л</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span><a class="seller-name-link" href="#">Галиева Екатерина</a></div>
            <div class="seller-locality">Село Слюсарёво, МО</div>
        </div>
    </div>

    <div class="product-controls">
        <div>
            <div class="product-price-per-item">230 руб/шт</div>
            <div class="product-total-price">230 руб</div>

            <div class="product-quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
        </div>

        <span class="add-to-cart-button blue-button">В корзину</span>
    </div>
</section>

<?php $APP->includeFooterWithParams(); ?>
