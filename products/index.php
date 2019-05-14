<?php

require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'products/products.css',
    'page_id' => 'products',
    'page_title' => 'Товары'
];

$APP->includeHeaderWithParams($metainfo);

?>



<?php
//$conn = new mysqli('localhost','u0684531_default', 'Eo0nNox_','u0684531_moloko');
//$cities = $conn->query("select * from mos_cities")->fetch_all();
echo '<pre>';
//print_r(array_reverse($cities));
echo '</pre>';
?>


        <div class="search-form" action="" >
            <div class="select-input">
                <label for="locality">Искать ближе к:</label>
                <select name="locality" id="locality">
                    <option value="moskva">Везде</option>
                    <?php

                    $cities = $APP->getCities();

                    foreach ($cities as $city) {
                        echo "<option>".$city['city']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="select-input">
                <label for="locality">Сортировать:</label>
                <select name="locality" id="locality">
                    <option value="moskva">Сначала новые</option>
                    <option value="slusaryovo">Сначала дорогие</option>
                    <option value="kotelniky">Сначала дешевые</option>
                </select>
            </div>
            <div class="search-input">
                <input class="search-textbox" type="text" placeholder="Поиск по сайту...">
                <input type="submit" value="Искать">
            </div>
        </div>
        <div class="products">


            <?php
            $products = $APP->getProducts();
            foreach ($products as $item):
            ?>
            <section class="product">
                <img class="product-image" src="/images/milk.png" alt="image">
                <a class="product-title" href="./detail/?product_id=<?php echo $item['product_id'] ?>"><?php echo $item['title'] ?></a>
                <p class="product-desc">Объем <?php echo $item['volume'] ?>, энергетическая ценность <?php echo $item['energy_value']?>, белки <?php echo $item['squirrels'] ?> г, жиры <?php echo $item['fats'] ?> г, углеводы <?php echo $item['carbohydrates'] ?> г</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="/sellers/detail/?seller_id=<?php echo $item['seller_id'] ?>"><?php echo $item['surname'] . ' ' . $item['name'] ?></a></div>
                    <div class="seller-locality">пос. <?php echo $item['village'] ?></div>
                </div>
                <div class="product-price"><?php echo $item['price'] ?> руб</div>
                <div class="product-controls">
                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                    <span class="add-to-cart-button blue-button">В корзину</span>
                </div>
            </section>
            <?php endforeach; ?>
        </div>

            <?php $APP->includeFooterWithParams(); ?>