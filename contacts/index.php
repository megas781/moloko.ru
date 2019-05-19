<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'contacts/contacts.css',
    'page_id' => 'contacts',
    'page_title' => 'Контакты'
];

$APP->includeHeaderWithParams($metainfo);

?>
<!--<p>-->
<!--    <b>Глеб Калачев</b> (full-stack разработчик, web-дизайнер): <a href="https://vk.com/megas781" target="_blank">megas781</a><br><br>-->
<!--    <b>Влад Пинчер</b> (web-дизайнер, креативный директор): <a href="https://vk.com/densejer" target="_blank">densejer</a><br><br>-->
<!--    <b>Римма Семирханова</b> (контент-менеджер, главный бухгалтер): <a href="https://vk.com/rimmahka" target="_blank">rimmahka</a><br><br>-->
<!--    <b>Анастасия Воронина</b> (верстальщик): <a href="https://vk.com/vorosha0607" target="_blank">vorosha0607</a><br><br>-->
<!--    <b>Евгения Кузяева</b> (верстальщик): <a href="https://vk.com/kuzyaeva00" target="_blank">kuzyaeva00</a><br><br>-->
<!--    <b>Павел Еремин</b> (верстальщик): <a href="https://vk.com/id223867115" target="_blank">id223867115</a>-->
<!--</p>-->

<table class="contacts-table">
    <tr>
        <th>№</th>
        <th>Имя, фамилия</th>
        <th>Группа</th>
        <th>Обязанности</th>
        <th>Ссылка</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Глеб Калачев</td>
        <td>181-321</td>
        <td>full-stack разработчик, web-дизайнер</td>
        <td><a href="https://vk.com/megas781" target="_blank">megas781</a></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Влад Пинчер</td>
        <td>181-321</td>
        <td>web-дизайнер, креативный директор</td>
        <td><a href="https://vk.com/densejer" target="_blank">densejer</a></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Римма Семирханова</td>
        <td>181-361</td>
        <td>контент-менеджер, главный бухгалтер</td>
        <td><a href="https://vk.com/rimmahka" target="_blank">rimmahka</a></td>
    </tr>
    <tr>
        <td>4</td>
        <td>Анастасия Воронина</td>
        <td>181-321</td>
        <td>верстальщик</td>
        <td><a href="https://vk.com/vorosha0607" target="_blank">vorosha0607</a></td>
    </tr>
    <tr>
        <td>5</td>
        <td>Евгения Кузяева</td>
        <td>181-321</td>
        <td>верстальщик</td>
        <td><a href="https://vk.com/kuzyaeva00" target="_blank">kuzyaeva00</a></td>
    </tr>
    <tr>
        <td>6</td>
        <td>Павел Еремин</td>
        <td>181-321</td>
        <td>верстальщик</td>
        <td><a href="https://vk.com/id223867115" target="_blank">id223867115</a></td>
    </tr>
</table>

<?php $APP->includeFooterWithParams(); ?>
