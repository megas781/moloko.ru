<?php
require_once '../../App.php';

$seller = $APP->getSellerById($_GET['seller_id']);
$sellerProducts = $APP->getProductsBySellerId($_GET['seller_id']);


$metainfo = [
    'style_path' => HTTP_ROOT . '/sellers/detail/seller-detail.css',
    'page_id' => 'sellers',
    'page_title' => ($seller['surname'] . ' ' . $seller['name'] . ' ' . $seller['otchestvo'])
];

$APP->includeHeaderWithParams($metainfo);

//echo '<pre>';
//print_r($seller);
//echo '</pre>';

?>

<div class="seller-contacts">
    <span class="contact-item"><?php echo $seller['phone_number'] ?></span>
    <span class="contact-item"><?php echo $seller['email'] ?></span>
    <span class="contact-item">пос. <?php echo $seller['village'] ?></span>
</div>


<img class="seller-avatar" src="/images/sellers_images/<?php echo $seller['seller_id'] ?>.jpg" alt="фотография продавца">

<p class="seller-desc"><?php echo $seller['description'] ?></p>


<h2 class="locality-title">пос. <?php echo $seller['village'] ?></h2>

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
            center: [<?php echo $seller['lat'] ?>, <?php echo $seller['lng'] ?>],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 14
        });
    }
</script>

<h2 style="margin-top: 40px">Товары Продавца</h2>


<?php
//echo '<pre>';
//print_r($sellerProducts);
//echo '</pre>';
?>

<div class="products">

    <?php
    foreach ($sellerProducts as $product):
        ?>
        <section class="product">
            <a href="/products/detail/?product_id=<?php echo $product['product_id'] ?>"><img class="product-image" src="/images/milk.png" alt="image"></a>
            <a class="product-title" href="/products/detail/?product_id=<?php echo $product['product_id'] ?>"><?php echo $product['title'] ?></a>
            <p class="product-desc">Объем <?php echo $product['volume'] ?>, энергетическая ценность <?php echo $product['energy_value']?>, белки <?php echo $product['squirrels'] ?> г, жиры <?php echo $product['fats'] ?> г, углеводы <?php echo $product['carbohydrates'] ?> г</p>
            <div class="seller">
                <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>"><?php echo $seller['surname'] . ' ' . $seller['name'] ?></a></div>
                <div class="seller-locality">пос. <?php echo $seller['village'] ?></div>
            </div>
            <div class="product-price"><?php echo $product['price'] ?> руб</div>
            <div class="product-controls">
                <div class="product-quantity stepper">
                    <span class="stepper-minus stepper-control">–</span>
                    <span class="stepper-number">1</span>
                    <span class="stepper-plus stepper-control">+</span>
                </div>
                <span class="add-to-cart-button blue-button">В корзину</span>
            </div>
        </section>
    <?php endforeach; ?>

</div>

<?php $APP->includeFooterWithParams(); ?>
