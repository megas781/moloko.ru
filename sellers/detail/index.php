<?php
require_once '../../App.php';

$seller = $APP->getSellerById($_GET['seller_id']);


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


<img class="the-product-detail-seller-avatar" src="<?php echo $seller['avatar_url'] ?>" alt="фотография продавца">

<p class="seller-desc"><?php echo $seller['description'] ?></p>


<h2 class="product-card__locality-title">пос. <?php echo $seller['village'] ?></h2>

<div class="product-card__locality-map-container">
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
<?php $APP->printArrayOfProducts($APP->getProductsBySellerId($_GET['seller_id'])) ?>
</div>

<?php $APP->includeFooterWithParams($metainfo); ?>
