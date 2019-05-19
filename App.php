<?php

define('ROOT', dirname(__FILE__) . '/');
define('HTTP_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/');

class App {

    protected static $_instance;

    //Подключение к базе данных
    protected $conn;

    private function __construct()
    {

    }
    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        self::$_instance->conn = new mysqli('localhost','u0684531_default', 'Eo0nNox_','u0684531_moloko');
        self::$_instance->conn->set_charset('utf8');
        return self::$_instance;
    }

    //универсальный fetcher данных
    public function fetchAssocData($query) {
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    //importing
    public function includeHeaderWithParams($params = []) {

        //Здесь как бы должен быть include header'a, а params – это словарь с данными
        require_once ROOT . 'master/header.php';

    }
    public function includeFooterWithParams($params = []) {

        //Здесь как бы должен быть include footer'a, а params – это словарь с данными
        require_once ROOT . 'master/footer.php';

    }


    //fetching data
    public function getCities() {
        return $this->conn->query("select * from mos_cities")->fetch_all(MYSQLI_ASSOC);
    }


    public function getSellers($count = 0, $randomized = false) {

        if ($randomized) {
            $options = ' order by Rand()';
        } else {
            $options = '';
        }

        if ($count != 0) {
            $options .= ' limit ' . $count;
        }

        return $this->conn->query("
        select * from sellers s inner join villages v on s.village_id = v.village_id
        " . $options)->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts($count = 0, $randomized = false) {


        if ($randomized) {
            $options = ' order by Rand()';
        } else {
            $options = '';
        }
        if ($count != 0) {
            $options .= ' limit ' . $count;
        }


        return $this->conn->query("
        select * from products p 
            join seller_to_products stp on p.product_id = stp.product_id 
            join sellers s on stp.seller_id = s.seller_id 
            join villages v on s.village_id = v.village_id
        " . $options)->fetch_all(MYSQLI_ASSOC);
    }
    public function getProductsBySellerId($seller_id) {
        return $this->conn->query("
        select * from (select * from sellers where seller_id = " . $seller_id . ") s 
            join seller_to_products stp on s.seller_id = stp.seller_id 
            join villages v on s.village_id = v.village_id 
            join products p on stp.product_id = p.product_id
        ")->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id) {
        return $this->conn->query("
        select * from (select * from products where product_id = " . $id . ") p
               join seller_to_products stp on p.product_id = stp.product_id
               join sellers s on stp.seller_id = s.seller_id
               join villages v on s.village_id = v.village_id
        ")->fetch_assoc();
    }
    public function getSellerById($id) {
        return $this->conn->query("
        select * from (select * from sellers where seller_id = " . $id . ") s join villages v on s.village_id = v.village_id; 
        ")->fetch_assoc();
    }

    //Working with strings
    public function formatDescription($string) {
        $returnValue;
        preg_match('~^.{80,100} ~u',$string,$matches);

        $returnValue = $matches[0];
        $returnValue = mb_substr($returnValue,0,strlen($returnValue) - 2) . '...';

        return $returnValue;

    }

    //View controlling
    public function printProductCell($item) {

        ?>
        <section class="product-card">
            <a href="/products/detail/?product_id=<?php echo $item['product_id'] ?>"><img class="product-card-image" src="<?php echo $item['image_url'] ?>" alt="image"></a>
            <a class="product-card-title" href="/products/detail/?product_id=<?php echo $item['product_id'] ?>"><?php echo $item['title'] ?></a>
            <p class="product-card-desc">Объем <?php echo $item['volume'] ?>, энергетическая ценность <?php echo $item['energy_value']?>, белки <?php echo $item['squirrels'] ?> г, жиры <?php echo $item['fats'] ?> г, углеводы <?php echo $item['carbohydrates'] ?> г</p>
            <div class="the-product-detail-seller">
                <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="the-product-detail-seller-name-link" href="/sellers/detail/?seller_id=<?php echo $item['seller_id'] ?>"><?php echo $item['surname'] . ' ' . $item['name'] ?></a></div>
                <div class="seller-locality">пос. <?php echo $item['village'] ?></div>
            </div>
            <div class="flex-space"></div>
            <div class="product-card-price"><?php echo $item['price'] ?> руб</div>
            <div class="product-card-controls">
                <div class="product-card-quantity stepper" productId="<?php echo $item['product_id'] ?>">
                    <span class="stepper-minus stepper-control">–</span>
                    <span class="stepper-number">1</span>
                    <span class="stepper-plus stepper-control">+</span>
                </div>
                <span class="add-to-cart-button blue-button" productId="<?php echo $item['product_id'] ?>">В корзину</span>
            </div>
        </section>
        <?php
    }
    public function printArrayOfProducts($arrayOfProducts, $count = 0) {

        if ($count == 0) {
            $count = count($arrayOfProducts);
        }

        for ($i = 0; $i <= $count - 1; $i++) {

            $product = $arrayOfProducts[$i];
            $this->printProductCell($product);

        }
    }

    public function printSellerCell($seller) {
        ?>
        <section class="seller-card">
        <a href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>"><img class="seller-card-image" src="<?php echo $seller['avatar_url'] ?>" alt="фотография продавца"></a>
        <a class="seller-card-name" href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>"><?php echo $seller['surname'] . ' ' . $seller['name'] ?></a>
        <div class="seller-card-locality">пос. <?php echo $seller['village'] ?></div>
        <p class="seller-card-desc"><?php echo $this->formatDescription($seller['description']) ?></p>
        <div class="flex-space"></div>
        <div class="seller-card-detail-button-positioner">
            <a href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=<?php echo $seller['seller_id'] ?>" class="detail-link blue-button">Подробнее</a>
        </div>
        </section>
        <?php
    }
    public function printArrayOfSellers($arrayOfSellers, $count = 0) {

        if ($count == 0) {
            $count = count($arrayOfSellers);
        }

        for ($i = 0; $i <= $count - 1; $i++) {

            $seller = $arrayOfSellers[$i];
            $this->printSellerCell($seller);

        }
    }

    public function printThreeRandomProducts() {
        $this->printArrayOfProducts($this->getProducts(3, true));
    }
    public function printThreeRandomSellers() {
        $this->printArrayOfSellers($this->getSellers(3, true));
    }

    public function printCartProductCell($item) {
        ?>

        <section class="product">

            <img class="product-image" src="/images/milk.png" alt="image">

            <div class="product-info">
                <a class="product-title" href="/products/detail/">Молоко пастеризованное 3%, 1л</a>
                <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span><a class="seller-name-link" href="/sellers/detail/">Галиева Екатерина</a></div>
                    <div class="seller-locality">Село Слюсарёво, МО</div>
                </div>
            </div>

            <div class="product-controls">
                <div>
                    <div class="product-price-per-item">230 руб/шт</div>
                    <div class="product-total-price">230 руб</div>

                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                </div>

                <div class="delete-button"></div>
            </div>
        </section>
        <?php
    }
}

$APP = App::getInstance();



