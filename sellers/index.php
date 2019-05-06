<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'sellers/sellers.css',
    'page_id' => 'sellers',
    'page_title' => 'Продавцы'
];

$APP->includeHeaderWithParams($metainfo);

?>

тут продают!!


<?php $APP->includeFooterWithParams(); ?>
