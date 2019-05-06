<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'contacts/contacts.css',
    'page_id' => 'contacts',
    'page_title' => 'Контакты'
];

$APP->includeHeaderWithParams($metainfo);

?>
<p>
    <i>Тут информация о связи с нами.</i> <br><br>
    Пиши мне в вк: <a href="https://vk.com/megas781" target="_blank">megas781</a>
</p>

<?php $APP->includeFooterWithParams(); ?>
