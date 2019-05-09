<?php

require_once '../../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'products/detail/products-detail.css',
    'page_id' => 'products',
    'page_title' => 'Молоко пастеризованное 3%, 1л'
];

$APP->includeHeaderWithParams($metainfo);

?>


<section class="product">


    <img class="product-image" src="/images/milk.png" alt="image">

    <div class="product-info">
        <h4>Описание</h4>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность от 4% до 5%.
            <br><br>
            Хранить при температуре +4
            <br><br>
            Срок годности: 5 дней <br><br>

        </p>
        <h4>Объем: 1л</h4>
    </div>

    <div class="product-controls">
        <div>
            <div class="product-price">230 руб.</div>

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
