<?php
require_once '../App.php';

$pathinfo = [
    'style_path' => HTTP_ROOT . 'for-sellers/main.css',
    'page_id' => '',
    'page_title' => ''
];

$APP->includeHeaderWithParams($pathinfo);



?>



<?php $APP->includeFooterWithParams($pathinfo); ?>
