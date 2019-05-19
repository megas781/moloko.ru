//Этот скрипт подгружается из load-selected-products.js
function recalculateSumup() {
    //полная сумма за продукты
    document.querySelector('.js-products-price').textContent = String(getTotalPrice()) + ' руб';
    //полная сумма с доставкой
    document.querySelector('.js-total-price').textContent = String(getTotalPrice() + 449) + ' руб';

    //Кнопка "Оформить заказ"
    let checkoutButton = document.querySelector('#checkout-button');

    //Обновлеие счетчика корзины
    if (getCartLength()) {
        //В корзине что-то есть. Корзина со счетчиком
        document.querySelector('.nav-cart').textContent = 'Корзина (' + getCartLength() + ')';

        //Убрать сообщение о пустой корзине
        let cartIsEmptyLabel = document.querySelector('#cart-is-empty');
        if (cartIsEmptyLabel) {
            document.querySelector('#cart-products-container').removeChild(cartIsEmptyLabel);
        }

        checkoutButton.classList.remove('disabled');
        checkoutButton.removeAttribute('disabled');

    } else {
        //В корзине пусто. Корзина без счетчика
        document.querySelector('.nav-cart').textContent = 'Корзина';

        //Добавить сообщение о пустой корзине
        let cartIsEmptyLabel = document.createElement('div');
        cartIsEmptyLabel.id = 'cart-is-empty';
        cartIsEmptyLabel.innerHTML = `
        <div id="cart-is-empty-label">Корзина пуста :((</div>
        <div id="cart-is-empty-text">Перейдите в каталог товаров, выберите нужное и возвращайтесь в корзину, чтобы сделать заказ</div>
        <a href="http://moloko.glebkalachev.ru/products" class="goto-products-link blue-button">Перейти к товарам</a>
        `;
        document.querySelector('#cart-products-container').appendChild(cartIsEmptyLabel);

        checkoutButton.classList.add('disabled');
        checkoutButton.disabled = true;
    }

    //Счетчик для формы
    document.querySelector('.js-cart-size').value = getCartLength();

}

//Первоначальный подсчет при загрузке стрницы
recalculateSumup();

//Пересчет subtotal'a товара
document.querySelectorAll('.product').forEach(function (product) {

    console.log('продукты есть??');

    let stepper = product.querySelector('.stepper');

    let productId = stepper.getAttribute('productId');
    let productTotalPriceNode = product.querySelector('.product-total-price');

    stepper.querySelectorAll('.stepper-control').forEach(function (stepperControl) {
        stepperControl.addEventListener('click', function (e) {
            //Пересчет для ячейки
            productTotalPriceNode.textContent = String(Number(getQuantityOf(productId) * productTotalPriceNode.getAttribute('per-one'))) + ' руб';
            //Пересчет для sum up'a
            recalculateSumup();
        });
    })
});
//Функционал кнопки удаления
document.querySelectorAll('.product-delete-button').forEach(function (deleteButton) {

    console.log('doing??');
    deleteButton.addEventListener('click', function (e) {
        let productId = deleteButton.getAttribute('productId');
        removeItem(productId);
        let cellFrame = deleteButton.parentElement.parentElement.parentElement;
        cellFrame.parentElement.removeChild(cellFrame);
        recalculateSumup();
    });

});

