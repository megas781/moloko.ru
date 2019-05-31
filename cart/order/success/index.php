<?php
require_once '../../../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'cart/order/success/success.css',
    'page_id' => '',
    'page_title' => ''
];

$APP->includeHeaderWithParams($metainfo);

?>
<script>
    // Проверяем, чтобы при входе на страницу success корзина не была пуста (надо нужна другая, более правильная проверка)
    if (getCartLength() === 0) {
        location.replace('http://' + location.hostname + '/cart/');
    }
</script>

<h1 class="success-label">Ваш заказ успешно оформлен!</h1>

<div class="flex-centering">
    <a href="/products/" class="back-to-products-link">Вернуться к списку товаров</a>
</div>

<?php $APP->includeFooterWithParams(); ?>
