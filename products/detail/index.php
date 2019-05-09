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

<h2>О продавце</h2>

<section class="seller">
    <img class="seller-avatar" src="<?php echo HTTP_ROOT . '/images/seller1.png' ?>" alt="">
    <div class="seller-info">
        <h2>Галиева Екатерина</h2>
        <table>
            <tr>
                <td>Телефон:</td>
                <td>8 (904) 771-92-73</td>
            </tr>
            <tr>
                <td>email:</td>
                <td>galievaekaterina68@mail.ru</td>
            </tr>
        </table>
        <p>
            В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что
            держит качество наших продуктов на высоком уровне.
        </p>
    </div>
</section>

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

<?php $APP->includeFooterWithParams(); ?>
