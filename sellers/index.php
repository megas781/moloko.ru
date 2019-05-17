<?php
require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'sellers/sellers.css',
    'page_id' => 'sellers',
    'page_title' => 'Продавцы',
];

$APP->includeHeaderWithParams($metainfo);

?>

<div class="search-form" action="" >
    <div class="select-input">
        <label for="locality">Искать ближе к:</label>
        <select name="locality" id="locality">
            <option value="moskva">Везде</option>
<!--            <option value="moskva">Москва</option>-->
            <?php

            $cities = $APP->getCities();

            foreach ($cities as $city) {
                echo "<option>".$city['city']."</option>";
            }
            ?>
        </select>
    </div>
    <div></div>
    <div class="search-input">
        <input class="search-textbox" type="text" placeholder="Поиск по сайту...">
        <input type="submit" value="Искать">
    </div>
</div>
<div class="sellers">

    <?php

    $sellers = $APP->getSellers();
    foreach ($sellers as $seller):
    ?>
    <section class="seller-card">
        <a href="./detail/?seller_id=<?php echo $seller['seller_id'] ?>"><img class="seller-card-image" src="<?php echo $seller['avatar_url'] ?>" alt="фотография продавца"></a>
        <a class="seller-card-name" href="./detail/?seller_id=<?php echo $seller['seller_id'] ?>"><?php echo $seller['surname'] . ' ' . $seller['name'] ?></a>
        <div class="seller-card-locality">пос. <?php echo $seller['village'] ?></div>
        <p class="seller-card-desc"><?php echo $APP->formatDescription($seller['description']) ?></p>
        <div class="flex-space"></div>
        <div class="seller-card-detail-button-positioner">
            <a href="./detail/?seller_id=<?php echo $seller['seller_id'] ?>" class="detail-link blue-button">Подробнее</a>
        </div>
    </section>
    <?php endforeach; ?>
</div>


<?php $APP->includeFooterWithParams(); ?>
