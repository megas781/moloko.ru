<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/base.css' ?>">
    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/header.css' ?>">
    <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'master/footer.css' ?>">
    <link rel="stylesheet" href="<?php echo $params['style_path'] ?>">
    <!--    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">-->
    <link rel="shortcut icon" href="/favicon.png" type="image/png">

    <!--    JQuery – ты меня победил -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!--    Подключение Yandex.Map API-->
    <script src="https://api-maps.yandex.ru/2.1/?apikey=6a9a39c7-e8d9-4b7b-b568-94eb61f84ae7>&lang=ru_RU"
            type="text/javascript"></script>
    <script src="/master/before-load.js"></script>

    <!--    Подключение Метрики -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(53942956, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/53942956" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>

<!--    Веб мастер -->
    <meta name="yandex-verification" content="c2a8ef7034186f7f" />


    <!-- SEO -->
    <?php
    $rawMethod = $_SERVER['REQUEST_URI'];
    preg_match('~/(?:$|[A-Za-z/_-]+\??)~', $rawMethod, $matches);
    $path = $matches[0];

    switch ($path) {
        case '/products/?':
            if (isset($_GET['category'])) {
                $asdf = $path . 'category=' . $_GET['category'];
//                echo 'asdf: = ' . $asdf . ';  ';
                $meta = $this->getPageMetaByPath($asdf);
//                echo '   123123123   ';
            } else {
                $meta = $this->getPageMetaByPath($path);
//                echo '   66666666   ';

            }

            break;
        case null:
            $meta = [
                'title' => '',
                'h1' => '',
                'keywords' => 'купить домашний фермерский деревенский подукция доставка московская область москва',
                'description' => ''
            ];
            break;
        default:
            //Нормал кейс: path пропарсился
            $meta = $this->getPageMetaByPath($path);
            break;
    }
    ?>
    <title><?php echo $meta['title'] ?></title>
    <meta name="description" content="<?php echo $meta['description'] ?>">
    <meta name="keywords" content="<?php echo $meta['keywords'] ?>">

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
        <a href="<?php echo HTTP_ROOT ?>"><img class="logo" src="<?php echo HTTP_ROOT . '/images/logo.png' ?>"
                                               alt="logo"></a>
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
//                'about' => ['О сайте', 'http://moloko.glebkalachev.ru/about/', 4],
                'faq' => ['Вопрос-Ответ', 'http://moloko.glebkalachev.ru/faq/', 5],
                'contacts' => ['Контакты', 'http://moloko.glebkalachev.ru/contacts/', 6],

            ];

            foreach ($navItems as $page_id => $item) {
                echo '<a href="' . $item[1] . '" class="nav-item ' . ($params['page_id'] == $page_id ? 'active' : '') . '">' . $item[0] . '</a>';
            }

            ?>

        </div>

        <a id="nav-cart" class="nav-item nav-cart <?php echo($params['page_id'] == 'cart' ? 'active' : '') ?>"
           href="http://moloko.glebkalachev.ru/cart/">Корзина</a>
    </div>
</nav>
<?php if ($_SERVER['REQUEST_URI'] != '/' and $_SERVER['REQUEST_URI'] != '/index.php'):

    //Добавляем корзину в $navItems после генерации панели навигации. Теперь корзина будет отображаться в хлебных крошках
    $navItems['cart'] = ['Корзина'];
    $navItems['admin'] = ['Администрационная панель'];
    ?>
    <div class="breadcrumbs">
        <a class="breadcrumb-item first" href="">Главная</a>
        <span class="breadcrumb-item last"><?php echo $navItems[$params['page_id']][0] ?></span>
    </div>

    <h1 class="page-title wr960"><?php echo $meta['h1'] ?></h1>

<?php endif;
//echo $_SERVER['REQUEST_URI'] . "<br>";
//echo '$path: ' . $path;


?>

<main class="content">
    <div class="wr960">
