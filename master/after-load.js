//Методы, исполняемые после полной загрузки страницы

//Определение уже лежащих в корзине товаров при загрузке страницы
document.querySelectorAll('.product-card').forEach(function (product) {
    let addToCardButton = product.querySelector('.add-to-cart-button');
    let product_id = product.querySelector('.product_id_holder').value;

    if (getItemAt(product_id)) {
        addToCardButton.classList.add('tapped');
        addToCardButton.textContent = 'В корзине';
    }
});
//Определение количества уже лежащих в корзине товаров при загрузке страницы для кнопки корзины
if (getCartLength() > 0) {
    document.querySelector('#nav-cart').textContent = 'Корзина (' + getCartLength() + ')';
}

//Функционал кнопок stepper'a
document.querySelectorAll('.stepper').forEach(function (value, key, parent) {
    console.log('исполняешься??');
    let minusButton = value.querySelector('.stepper-minus');
    let stepper = value.querySelector('.stepper-number');
    let plusButton = value.querySelector('.stepper-plus');

    minusButton.addEventListener('click', function (e) {
        if (Number(stepper.textContent) > 1) {
            stepper.textContent = String(Number(stepper.textContent) - 1);
        }
    });
    plusButton.addEventListener('click', function (e) {
        stepper.textContent = Number(stepper.textContent) + 1;
    });
});


//Функционал кнопки "В корзину" для карточки товара
document.querySelectorAll('.product-card').forEach(function (product, key, parent) {

    let productId = product.querySelector('.product_id_holder').value;
    let productNumber = product.querySelector('.stepper-number');
    let addToCartButton = product.querySelector('.add-to-cart-button');

    //Тут то, что происходит при клике на кнопку "В корзину"
    addToCartButton.addEventListener('click', function (e) {
        if (addToCartButton.textContent === 'В корзину') {

            //Товар добавляется в локальное хранилище
            addItem(productId, productNumber.textContent);

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