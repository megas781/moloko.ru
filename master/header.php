<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Продукты - Молоко.ру</title>

    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/base.css' ?>">
    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/header.css' ?>">
    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/footer.css' ?>">
    <link rel="stylesheet" href="<?php echo $params['style_path'] ?>">

    <!--    Подключение Yandex.Map API-->
    <script src="https://api-maps.yandex.ru/2.1/?apikey=6a9a39c7-e8d9-4b7b-b568-94eb61f84ae7
>&lang=ru_RU" type="text/javascript">
    </script>

</head>
<body>

<div class="top-bar">
    <div class="wr960">
        <span class="top-bar-item">г. Москва, 5-ая Парковая 39</span>
        <span class="top-bar-item">Тех. Поддержка: 8 (495) 228-31-31</span>
    </div>
</div>

<header class="header">
    <div class="wr960">
        <a href="<?php echo HTTP_ROOT ?>"><img class="logo" src="<?php echo HTTP_ROOT . '/images/logo.png' ?>" alt="logo"></a>
    </div>
</header>

<nav class="nav">
    <div class="wr960">
        <div class="nav-links">

            <?php

            $navItems = [
                'main' => ['Главная', 'http://moloko.glebkalachev.ru', 1],
                'products' => ['Товары', 'http://moloko.glebkalachev.ru/products/', 2],
                'sellers' => ['Продавцы', 'http://moloko.glebkalachev.ru/sellers', 3],
                'about' => ['О сайте', 'http://moloko.glebkalachev.ru/about/', 4],
                'faq' => ['F.A.Q', 'http://moloko.glebkalachev.ru/faq/', 5],
                'contacts' => ['Контакты', 'http://moloko.glebkalachev.ru/contacts/', 6]
            ];

            foreach ($navItems as $page_id => $item) {
                echo '<a href="' . $item[1] . '" class="nav-item ' . ($params['page_id'] == $page_id ? 'active' : '') . '">' . $item[0] . '</a>';
            }

            ?>

        </div>

        <a class="nav-item nav-cart <?php echo($params['page_id'] == 'cart' ? 'active' : '') ?>"
           href="http://moloko.glebkalachev.ru/cart/">Корзина (3)</a>
    </div>
</nav>

<div class="breadcrumbs">
    <a class="breadcrumb-item first" href="">Главная</a>
    <span class="breadcrumb-item last"><?php echo $navItems[$params['page_id']][0] ?></span>
</div>

<h1 class="page-title wr960"><?php echo $params['page_title'] ?></h1>

<main class="content">
    <div class="wr960">
</html>