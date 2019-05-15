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

    /**
     * @return mixed
     */
    public function getSellers() {
        return $this->conn->query("
        select * from sellers s inner join villages v on s.village_id = v.village_id
        ")->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts() {
        return $this->conn->query("
        select * from products p 
            join seller_to_products stp on p.product_id = stp.product_id 
            join sellers s on stp.seller_id = s.seller_id 
            join villages v on s.village_id = v.village_id
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
    public function getProductsBySellerId($id) {
        return $this->conn->query("
        select * from (select * from seller_to_products where seller_id = " . $id . ") stp join products p on stp.product_id = p.product_id;
        ")->fetch_all(MYSQLI_ASSOC);
    }

    public function formatDescription($string) {
        $returnValue;
        preg_match('~^.{80,100} ~u',$string,$matches);

        $returnValue = $matches[0];
        $returnValue = mb_substr($returnValue,0,strlen($returnValue) - 2) . '...';

        return $returnValue;
    }
}

$APP = App::getInstance();



