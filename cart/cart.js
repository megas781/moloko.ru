//Этот скрипт подгружается из load-selected-products.js

document.querySelector('.js-products-price').textContent = String(getTotalPrice()) + ' руб';

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
            document.querySelector('.js-products-price').textContent = String(getTotalPrice()) + ' руб';
            document.querySelector('.js-total-price').textContent = String(getTotalPrice() + 449) + ' руб';
        });
    })
});


