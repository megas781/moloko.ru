<?php

require_once '../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'products/products.css',
    'page_id' => 'products',
    'page_title' => 'Товары'
];

$APP->includeHeaderWithParams($metainfo);

?>
        <div class="search-form" action="" >
            <div class="select-input">
                <label for="locality">Населённый пункт:</label>
                <select name="locality" id="locality">
                    <option value="moskva">Москва</option>
                    <option value="slusaryovo">Слюсарёво</option>
                    <option value="kotelniky">Котельники</option>
                    <option value="ustannoe">Устанное</option>
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
            <section class="product">
                <img class="product-image" src="/images/milk.png" alt="image">
                <a class="product-title" href="./detail/">Молоко пастеризованное 3%, 1л</a>
                <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="#">Галиева Екатерина</a></div>
                    <div class="seller-locality">Село Слюсарёво, МО</div>
                </div>
                <div class="product-price">230 руб.</div>
                <div class="product-controls">
                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                    <span class="add-to-cart-button blue-button">В корзину</span>
                </div>
            </section>
            <section class="product">
                <img class="product-image" src="/images/milk.png" alt="image">
                <a class="product-title" href="./detail/">Молоко пастеризованное 3%, 1л</a>
                <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="#">Галиева Екатерина</a></div>
                    <div class="seller-locality">Село Слюсарёво, МО</div>
                </div>
                <div class="product-price">230 руб.</div>
                <div class="product-controls">
                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                    <span class="add-to-cart-button blue-button">В корзину</span>
                </div>
            </section>
            <section class="product">
                <img class="product-image" src="/images/milk.png" alt="image">
                <a class="product-title" href="./detail/">Молоко пастеризованное 3%, 1л</a>
                <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="#">Галиева Екатерина</a></div>
                    <div class="seller-locality">Село Слюсарёво, МО</div>
                </div>
                <div class="product-price">230 руб.</div>
                <div class="product-controls">
                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                    <span class="add-to-cart-button blue-button">В корзину</span>
                </div>
            </section>
            <section class="product">
                <img class="product-image" src="/images/milk.png" alt="image">
                <a class="product-title" href="./detail/">Молоко пастеризованное 3%, 1л</a>
                <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="#">Галиева Екатерина</a></div>
                    <div class="seller-locality">Село Слюсарёво, МО</div>
                </div>
                <div class="product-price">230 руб.</div>
                <div class="product-controls">
                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                    <span class="add-to-cart-button blue-button">В корзину</span>
                </div>
            </section>
            <section class="product">
                <img class="product-image" src="/images/milk.png" alt="image">
                <a class="product-title" href="./detail/">Молоко пастеризованное 3%, 1л</a>
                <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
                <div class="seller">
                    <div class="seller-name"><span class="selle-name-label">Продавец:</span> <a class="seller-name-link" href="#">Галиева Екатерина</a></div>
                    <div class="seller-locality">Село Слюсарёво, МО</div>
                </div>
                <div class="product-price">230 руб.</div>
                <div class="product-controls">
                    <div class="product-quantity stepper">
                        <span class="stepper-minus stepper-control">–</span>
                        <span class="stepper-number">1</span>
                        <span class="stepper-plus stepper-control">+</span>
                    </div>
                    <span class="add-to-cart-button blue-button">В корзину</span>
                </div>
            </section>
        </div>
            <?php $APP->includeFooterWithParams(); ?>