<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'sellers/sellers.css',
    'page_id' => 'sellers',
    'page_title' => 'Продавцы'
];

$APP->includeHeaderWithParams($metainfo);

?>

<div class="search-form" action="" >
    <div class="select-input">
        <label for="locality">Населённый пункт:</label>
        <select name="locality" id="locality">
            <option value="moskva">Москва</option>
            <option value="slusaryovo">Слюсарёво</option>
            <option value="kotelniky">Котельники</option>
            <option value="ustannoe">Устанное</option>
        </select>
    </div>
    <div></div>
    <div class="search-input">
        <input class="search-textbox" type="text" placeholder="Поиск по сайту...">
        <input type="submit" value="Искать">
    </div>
</div>
<div class="sellers">

    <section class="seller">
        <img class="seller-image" src="/images/seller1.png" alt="фото продавца">
        <a class="seller-name" href="#">Галиева Екатерина</a>
        <div class="seller-locality">Село Слюсарёво, МО</div>
        <p class="seller-desc">В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что держит качество наших продуктов на высоком уровне...</p>
        <div class="seller-detail-button-positioner">
            <a href="#" class="detail-link blue-button">Подробнее</a>
        </div>
    </section>
    <section class="seller">
        <img class="seller-image" src="/images/seller1.png" alt="фото продавца">
        <a class="seller-name" href="#">Галиева Екатерина</a>
        <div class="seller-locality">Село Слюсарёво, МО</div>
        <p class="seller-desc">В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что держит качество наших продуктов на высоком уровне...</p>
        <div class="seller-detail-button-positioner">
            <a href="#" class="detail-link blue-button">Подробнее</a>
        </div>
    </section>
    <section class="seller">
        <img class="seller-image" src="/images/seller1.png" alt="фото продавца">
        <a class="seller-name" href="#">Галиева Екатерина</a>
        <div class="seller-locality">Село Слюсарёво, МО</div>
        <p class="seller-desc">В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что держит качество наших продуктов на высоком уровне...</p>
        <div class="seller-detail-button-positioner">
            <a href="#" class="detail-link blue-button">Подробнее</a>
        </div>
    </section>
    <section class="seller">
        <img class="seller-image" src="/images/seller1.png" alt="фото продавца">
        <a class="seller-name" href="#">Галиева Екатерина</a>
        <div class="seller-locality">Село Слюсарёво, МО</div>
        <p class="seller-desc">В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что держит качество наших продуктов на высоком уровне...</p>
        <div class="seller-detail-button-positioner">
            <a href="#" class="detail-link blue-button">Подробнее</a>
        </div>
    </section>
    <section class="seller">
        <img class="seller-image" src="/images/seller1.png" alt="фото продавца">
        <a class="seller-name" href="#">Галиева Екатерина</a>
        <div class="seller-locality">Село Слюсарёво, МО</div>
        <p class="seller-desc">В продаже имеется домашнее молоко, сыр, сметана. Мы кормим коров только экологически чистой пищей, что держит качество наших продуктов на высоком уровне...</p>
        <div class="seller-detail-button-positioner">
            <a href="#" class="detail-link blue-button">Подробнее</a>
        </div>
    </section>

</div>


<?php $APP->includeFooterWithParams(); ?>
