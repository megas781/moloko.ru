<?php
require_once '../App.php';

//При вызове header'a обязтельно нужно указать путь до .css файла, который нужно подключить
$stylePath = HTTP_ROOT . 'products/products.css';

$APP->includeHeaderWithParams(['style_path' => $stylePath]);

?>




<?php $APP->includeFooterWithParams(); ?>
