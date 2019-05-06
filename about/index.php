<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'about/about.css',
    'page_id' => 'about',
    'page_title' => 'О сайте'
];

$APP->includeHeaderWithParams($metainfo);

?>

<h2>Тут рассказывают о себе</h2>
<p>
    Вот например я такой классный! Например: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis corporis cum debitis dignissimos explicabo fugiat id impedit maiores minus odit optio quasi rem, soluta sunt tempora tenetur ut? Saepe.
</p>


<?php $APP->includeFooterWithParams(); ?>
