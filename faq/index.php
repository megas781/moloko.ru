<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'faq/faq.css',
    'page_id' => 'faq',
    'page_title' => 'F.A.Q'
];

$APP->includeHeaderWithParams($metainfo);

?>

тут отвечают на вопросы


<?php $APP->includeFooterWithParams(); ?>
