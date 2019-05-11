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


}

$APP = App::getInstance();
