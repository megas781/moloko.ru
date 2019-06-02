<?php

require_once '../../App.php';

$product = $APP->getProductById($_GET['product_id']);

$metainfo = [
    'style_path' => HTTP_ROOT . 'products/detail/product-detail.css',
    'script_path' => HTTP_ROOT . 'products/detail/product-detail.js',
    'page_id' => 'products',
    'page_title' => $product['title']
];

$APP->includeHeaderWithParams($metainfo);

?>


<?php

echo '<pre>';
//print_r($product);
echo '</pre>';

?>
<section class="the-product">

    <img class="the-product__image" src="<?php echo $product['image_url'] ?>" alt="image">

    <div class="the-product__product-info">
        <h4>Описание</h4>
        <p class="the-product__product-desc">Энергетическая ценность <?php echo $product['energy_value']?>, белки <?php echo $product['squirrels'] ?> г, жиры <?php echo $product['fats'] ?> г, углеводы <?php echo $product['carbohydrates'] ?> г<br><br>
            Хранить при температуре <?php echo $product['storage_temperature_from'] ?> - <?php echo $product['storage_temperature_to'] ?>°C
            <br><br>
            Срок годности: <?php echo $product['shelf_live'] ?> дней <br><br>

        </p>
        <h4>Объем: <?php echo $product['volume'] ?> л</h4>
    </div>

    <div class="the-product__controls">
        <div>
            <div class="the-product__price"><?php echo $product['price'] ?> руб</div>

            <div class="the-product__quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
        </div>

        <span id="detail-product-add-to-cart-button" class="add-to-cart-button blue-button" productId="<?php echo $_GET['product_id'] ?>">В корзину</span>
    </div>
</section>

<h2>О продавце</h2>

<section class="the-product-detail-seller">
    <img class="the-product-detail-seller-avatar" src="<?php echo $product['avatar_url'] ?>" alt="">
    <div class="the-product-detail-seller-info">
        <a class="the-product-detail-seller-name-link" href="/sellers/detail/?seller_id=<?php echo $product['seller_id'] ?>"><h2><?php echo $product['surname'] . ' ' . $product['name'] ?></h2></a>
        <table>
            <tr>
                <td>Телефон:</td>
                <td><?php echo $product['phone_number'] ?></td>
            </tr>
            <tr>
                <td>email:</td>
                <td><?php echo $product['email'] ?></td>
            </tr>
        </table>
        <p>
            <?php echo $product['description'] ?>
        </p>
    </div>
</section>

<h2 class="locality-title">пос. <?php echo $product['village'] ?></h2>

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
            center: [<?php echo $product['lat'] ?>, <?php echo $product['lng']?>],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 14
        });
    }
</script>

<h2 class="other-products-title">Другие товары</h2>
<div class="order-products">
    <?php $APP->printThreeRandomProducts() ?>
</div>

<?php $APP->includeFooterWithParams($metainfo); ?>
