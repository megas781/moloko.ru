// localStorage.clear();
function getCart() {
    if (JSON.parse(localStorage.getItem('cart'))) {
        return JSON.parse(localStorage.getItem('cart'));
    } else {
        return {};
    }
}
function addItem(product_id, quantity) {
    let array =  getCart();
    array[product_id] = quantity;
    localStorage.setItem('cart', JSON.stringify(array));
}
function removeItem(product_id) {
    let array =  getCart();
    array[product_id] = undefined;
    localStorage.setItem('cart', JSON.stringify(array));
}






document.querySelectorAll('.stepper').forEach(function (value, key, parent) {

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


//Включение "tapped" для кнопки "В корзину", где это надо


//Привязка к "В корзину" для карточки товара
document.querySelectorAll('.product').forEach(function (product, key, parent) {

    let productId = product.querySelector('.product_id_holder').value;
    let productNumber = product.querySelector('.stepper-number');
    let addToCartButton = product.querySelector('.add-to-cart-button');

    addToCartButton.addEventListener('click', function (e) {
        if (addToCartButton.textContent === 'В корзину') {

            addItem(productId, productNumber.textContent);

            addToCartButton.textContent = 'В корзине';
            addToCartButton.classList.toggle('tapped');

        } else {

            addToCartButton.textContent = 'В корзину';
            addToCartButton.classList.toggle('tapped');

            removeItem(productId);
        }
        console.log(localStorage);
    });
});




