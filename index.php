<?php
require_once 'App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'main.css',
    'page_id' => 'main',
    'page_title' => 'Главная'
];

$APP->includeHeaderWithParams($metainfo);

?>

<h2>Ееее, бой! Самая главная страница всего Молоко.ру!</h2>
<p>
    Относись к этой странице с уважением!
</p>

<?php $APP->includeFooterWithParams(); ?>
