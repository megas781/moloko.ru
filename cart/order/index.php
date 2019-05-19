<?php
require_once '../../App.php';

$metainfo = [
    'style_path' => HTTP_ROOT . 'cart/order/order.css',
    'page_id' => 'cart',
    'page_title' => 'Оформление заказа',
    'script_path' => HTTP_ROOT . 'cart/order/order.js'
];

$APP->includeHeaderWithParams($metainfo);

?>

<form action="./success/" method="post" class="order-form">

    <div style="color: #999999">* - обязательное поле</div>

    <h3>Данные заказчика</h3>

    <div class="text-input">
        <label for="fio">Фамилия, имя, отчество*</label>
        <input class="textbox" type="text" id="fio">
    </div>

    <div class="text-input">
        <label for="address">Адрес*</label>
        <input class="textbox" type="text" id="address">
    </div>

    <div class="text-input">
        <label for="phone-number">Номер телефона*</label>
        <input class="textbox" type="text" id="phone-number">
    </div>

    <h3>Способ оплаты</h3>
    <div><input type="radio" name="payment-method" value="bankcard" id="bankcard" disabled style="vertical-align: center"><label for="bankcard" style="color: #999999">Банковской
            картой онлайн (временно не доступно)</label></div>
    <div><input type="radio" name="payment-method" value="cash" id="cash" checked><label for="cash">Наличными или
            картой при получении</label></div>

    <h3>Дополнительно</h3>
    <textarea class="order-comment" name="order-comment" id="order-comment" placeholder="Расскажите, как быстрее добраться к вам, укажите код домофона или другую информацию, которая может пригодиться курьеру. "></textarea>

    <label id="privacy-agreement" for="privacy-agreement-checkbox"><input type="checkbox" id="privacy-agreement-checkbox" value="checked"> Я принимаю условия
        <a href="#" target="_blank">Пользовательского соглашения</a> и даю своё согласие Яндексу на обработку моей персональной информации на условиях, определенных
        <a href="#" target="_blank">Политикой конфиденциальности</a>.</label>

    <div class="summary">
        <table class="summary-table" cellspacing="8">

            <tr>
                <td class="js-products-label">Товары</td>
                <td class="js-products-price"></td>
            </tr>
            <tr>
                <td>Доставка</td>
                <td class="js-delivery-price">449 руб</td>
            </tr>
            <tr style="font-weight: bold">
                <td>Итого</td>
                <td class="js-total-price">1139 руб</td>
            </tr>

        </table>

        <input type="submit" class="blue-button" value="Подтвердить заказ">
    </div>
</form>

<?php $APP->includeFooterWithParams($metainfo); ?>
