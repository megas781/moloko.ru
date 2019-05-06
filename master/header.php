<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Продукты - Молоко.ру</title>

    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/base.css' ?>">
    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/header.css' ?>">
    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/footer.css' ?>">
    <link rel="stylesheet" href="<?php echo $params['style_path']?>">

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
        <a href="<?php echo HTTP_ROOT ?>"><img class="logo" src="../images/logo.png" alt="logo"></a>
    </div>
</header>

<nav class="nav">
    <div class="wr960">
        <div class="nav-links">

            <?php
            $navItems = [
                ['main', 'Главная', 'http://moloko.glebkalachev.ru'],
                ['products', 'Товары', 'http://moloko.glebkalachev.ru/products/'],
                ['sellers', 'Продавцы', 'http://moloko.glebkalachev.ru/sellers/'],
                ['about', 'О сайте', 'http://moloko.glebkalachev.ru/about/'],
                ['faq', 'F.A.Q', 'http://moloko.glebkalachev.ru/faq/'],
                ['contacts', 'Контакты', 'http://moloko.glebkalachev.ru/contacts/']
            ];

            for ($i = 0; $i < count($navItems); $i++) {
                $item = $navItems[$i];

                echo '<a href="'. $item[2] .'" class="nav-item '. ($params['page_id'] == $item[0] ? 'active' : '') .'">'.$item[1].'</a>';
            }
            ?>

        </div>

        <a class="nav-item nav-cart <?php echo ($params['page_id'] == 'cart' ? 'active' : '') ?>" href="http://moloko.glebkalachev.ru/cart/">Корзина (3)</a>
    </div>
</nav>

<div class="breadcrumbs">
    <a class="breadcrumb-item first" href="">Главная</a>
    <span class="breadcrumb-item last">Товары</span>
</div>

<h1 class="page-title wr960"><?php echo $params['page_title'] ?></h1>

<main class="content">
    <div class="wr960">