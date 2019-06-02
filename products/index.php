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

?>


    <form class="search-form" action="" method="get">
        <div class="select-input">
            <label for="category">Категория:</label>
            <?php

            //массив, с помощью которого опции категорий подгружаются динамически
            $categories = [
                'all' => ['Все', 0],
                'milk' => ['Молоко', 1],
                'sour_cream' => ['Сметана', 2],
                'butter' => ['Масло', 3],
                'cream' => ['Сливки', 4],
                'cottage_cheese' => ['Творог', 5],
                'kefir' => ['Кефир', 6],
                'ryazhenka' => ['Ряженка', 7],
                'cheese' => ['Сыр', 8],
                'yogurt' => ['Йогурт', 9],
            ];

            //Извлечение категории
            if (isset($_GET['category'])) {
                //Если в php есть данная категория
                if (isset($categories[$_GET['category']])) {
                    $category = $_GET['category'];
                } else {
                    //Если не распознает, какая категория, то ставит дефолтную категорию all
                    $category = 'all';
                }
            } else {
                $category = 'all';
            }

            ?>
            <select name="category" id="category">
                <?php foreach ($categories as $key => $value): ?>
                    <option value="<?php echo $key ?>" <?php if ($category === $key) echo 'selected' ?>><?php echo $value[0] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="select-input">
            <label for="category">Сортировка:</label>
            <?php

            //массив, с помощью которого опции сортировки подгружаются динамически
            $sorts = [
                'new' => ['Сначала новые', 0],
                'cheap' => ['Сначала дешевые', 1],
                'expensive' => ['Сначала дорогие', 2],
            ];

            //Извлечение сортировки
            if (isset($_GET['sort'])) {
                if (isset($sorts[$_GET['sort']])) {
                    $sort = $_GET['sort'];
                } else {
                    //Если не распознает, какая категория, то ставит дефолтную категорию all
                    $sort = 'new';
                }
            } else {
                $sort = 'new';
            }

            ?>
            <select name="sort" id="sort">
                <?php foreach ($sorts as $key => $value): ?>
                    <option value="<?php echo $key ?>" <?php if ($key === $sort) echo 'selected'?>><?php echo $value[0] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!--    Поставил под сомнение надобность текстового поиска на странице товаров-->
        <!--        <div class="search-input">-->
<!--            <input class="search-textbox" type="text" placeholder="Поиск по сайту...">-->
<!--            <input type="submit" value="Искать">-->
<!--        </div>-->
    </form>
    <div class="order-products">
        <?php $APP->printArrayOfProducts($APP->getProducts(0, $sort, $category)) ?>
    </div>


<?php $APP->includeFooterWithParams($metainfo); ?>