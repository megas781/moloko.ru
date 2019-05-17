<?php

require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'products/products.css',
    'page_id' => 'products',
    'page_title' => 'Товары',
    'script_path' => 'products.js'
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
                    <option value="everywhere">Везде</option>
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
            <?php $APP->printArrayOfProducts($APP->getProducts()) ?>
        </div>


            <?php $APP->includeFooterWithParams($metainfo); ?>