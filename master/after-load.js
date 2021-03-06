//Методы, исполняемые после полной загрузки страницы


//Определение уже лежащих в корзине товаров при загрузке страницы
document.querySelectorAll('.add-to-cart-button').forEach(function (addToCartButton) {
    //Для кнопки "В корзину"
    let productId = addToCartButton.getAttribute('productId');
    if (getQuantityOf(productId)) {
        addToCartButton.classList.add('tapped');
        addToCartButton.textContent = 'В корзине';
    }
});
//Определение количества уже лежащих в корзине товаров при загрузке страницы для степпера
document.querySelectorAll('.stepper').forEach(function (stepper) {
    //Для числа в stepper'e
    let stepperNumberNode = stepper.querySelector('.stepper-number');
    let productId = stepper.getAttribute('productId');
    stepperNumberNode.textContent = getQuantityOf(productId) ? getQuantityOf(productId) : '1';
});


//Определение количества уже лежащих в корзине товаров при загрузке страницы для кнопки корзины
if (getCartLength() > 0) {
    document.querySelector('#nav-cart').textContent = 'Корзина (' + getCartLength() + ')';
}

//Функционал кнопок stepper'a
document.querySelectorAll('.stepper').forEach(function (stepper, key, parent) {
    console.log('исполняешься??');
    let minusButton = stepper.querySelector('.stepper-minus');
    let stepperNumberNode = stepper.querySelector('.stepper-number');
    let plusButton = stepper.querySelector('.stepper-plus');

    let productId = stepper.getAttribute('productId');

    minusButton.addEventListener('click', function (e) {
        if (Number(stepperNumberNode.textContent) > 1) {
            stepperNumberNode.textContent = String(Number(stepperNumberNode.textContent) - 1);
        }
        if (getQuantityOf(productId) && getQuantityOf(productId) > 1) {
            addItem(productId, stepperNumberNode.textContent);
            console.log(localStorage);
        }
    });
    plusButton.addEventListener('click', function (e) {
        stepperNumberNode.textContent = Number(stepperNumberNode.textContent) + 1;

        if (getQuantityOf(productId) && Number(stepperNumberNode.textContent) > 1) {
            addItem(productId, stepperNumberNode.textContent);
            console.log('plus  after step: ' + localStorage.getItem('cart'));
        }
    });

});


//Функционал кнопки "В корзину" для карточки товара
document.querySelectorAll('.product-card').forEach(function (product, key, parent) {

    let productId = product.querySelector('.stepper').getAttribute('productId');
    let productNumberNode = product.querySelector('.stepper-number');
    let addToCartButton = product.querySelector('.add-to-cart-button');

    //Тут то, что происходит при клике на кнопку "В корзину"
    addToCartButton.addEventListener('click', function (e) {
        if (addToCartButton.textContent === 'В корзину') {

            //Товар добавляется в локальное хранилище
            addItem(productId, productNumberNode.textContent);

            //Изменяется внешний вид кнопки
            addToCartButton.textContent = 'В корзине';
            addToCartButton.classList.toggle('tapped');

        } else {

            addToCartButton.textContent = 'В корзину';
            addToCartButton.classList.toggle('tapped');

            removeItem(productId);
        }

        //В любом случае изменяется кол-во товаров в корзине
        let cartLength = getCartLength();
        if (cartLength != 0) {
            document.querySelector('#nav-cart').textContent = 'Корзина (' + cartLength + ')';
        } else {
            document.querySelector('#nav-cart').textContent = 'Корзина';
        }

        console.log(localStorage);
    });

});