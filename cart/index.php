<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'cart/cart.css',
    'page_id' => 'cart',
    'page_title' => 'Корзина'
];

$APP->includeHeaderWithParams($metainfo);

?>
<h2>Тут собирается весь хлам, что ты хочешь купить</h2>

<p>Покупай больше, потому что у нас много промо-акций, которые не оставят тебя равнодушным. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid aperiam autem cum doloremque ducimus eaque est fugit, incidunt ipsa itaque, laboriosam maxime modi natus neque non officia optio possimus quibusdam, quis sapiente tenetur voluptatem. Adipisci cumque doloribus fuga ipsum, itaque, iusto molestiae nostrum officia sed sit vitae, voluptatem voluptatum.</p>

<?php $APP->includeFooterWithParams(); ?>
