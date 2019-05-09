<?php
require_once '../../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . '/sellers/detail/seller-detail.css',
    'page_id' => 'sellers',
    'page_title' => 'Галиева Екатерина'
];

$APP->includeHeaderWithParams($metainfo);

?>

<div class="seller-contacts">
    <span class="contact-item">8 (904) 771-92-73</span>
    <span class="contact-item">galievaekaterina68@mail.ru</span>
    <span class="contact-item">Село Слюсарёво, МО</span>
</div>


<img class="seller-avatar" src="<?php echo HTTP_ROOT . '/images/seller1.png' ?>" alt="фотография продавца">

<p class="seller-desc">В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что держит качество наших продуктов на высоком уровне.</p>


<h2 class="locality-title">Село Слюсарёво, Московская область</h2>

<div class="locality-map-container">
    <div id="map" style="width: 600px; height: 400px"></div>
</div>

<script>
    ymaps.ready(init);

    function init() {
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [55.76, 37.64],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 14
        });
    }
</script>

<h2 style="margin-top: 40px">Товары Продавца</h2>

<div class="products">

    <section class="product">
        <img class="product-image" src="/images/milk.png" alt="image">
        <a class="product-title" href="/products/detail/">Молоко пастеризованное 3%, 1л</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/">Галиева Екатерина</a></div>
            <div class="seller-locality">Село Слюсарёво, МО</div>
        </div>
        <div class="product-price">230 руб.</div>
        <div class="product-controls">
            <div class="product-quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
            <span class="add-to-cart-button blue-button">В корзину</span>
        </div>
    </section>
    <section class="product">
        <img class="product-image" src="/images/milk.png" alt="image">
        <a class="product-title" href="/products/detail/">Молоко пастеризованное 3%, 1л</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/">Галиева Екатерина</a></div>
            <div class="seller-locality">Село Слюсарёво, МО</div>
        </div>
        <div class="product-price">230 руб.</div>
        <div class="product-controls">
            <div class="product-quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
            <span class="add-to-cart-button blue-button">В корзину</span>
        </div>
    </section>
    <section class="product">
        <img class="product-image" src="/images/milk.png" alt="image">
        <a class="product-title" href="/products/detail/">Молоко пастеризованное 3%, 1л</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/">Галиева Екатерина</a></div>
            <div class="seller-locality">Село Слюсарёво, МО</div>
        </div>
        <div class="product-price">230 руб.</div>
        <div class="product-controls">
            <div class="product-quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
            <span class="add-to-cart-button blue-button">В корзину</span>
        </div>
    </section>
    <section class="product">
        <img class="product-image" src="/images/milk.png" alt="image">
        <a class="product-title" href="/products/detail/">Молоко пастеризованное 3%, 1л</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/">Галиева Екатерина</a></div>
            <div class="seller-locality">Село Слюсарёво, МО</div>
        </div>
        <div class="product-price">230 руб.</div>
        <div class="product-controls">
            <div class="product-quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
            <span class="add-to-cart-button blue-button">В корзину</span>
        </div>
    </section>

</div>

<?php $APP->includeFooterWithParams(); ?>
