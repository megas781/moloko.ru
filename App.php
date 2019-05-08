<?php

define('ROOT', dirname(__FILE__) . '/');
define('HTTP_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/');

class App {

    protected static $_instance;


    private function __construct()
    {

    }

    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function includeHeaderWithParams($params = []) {

        //Здесь как бы должен быть include header'a, а params – это словарь с данными
        require_once ROOT . 'master/header.php';

    }
    public function includeFooterWithParams($params = []) {

        //Здесь как бы должен быть include footer'a, а params – это словарь с данными
        require_once ROOT . 'master/footer.php';

    }
}

$APP = App::getInstance();
