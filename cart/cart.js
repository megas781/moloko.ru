//Этот скрипт подгружается из load-selected-products.js

//Пересчет subtotal'a товара
document.querySelectorAll('.product').forEach(function (product) {

    console.log('продукты есть??');

    let stepper = product.querySelector('.stepper');

    let productId = stepper.getAttribute('productId');
    let productTotalPriceNode = product.querySelector('.product-total-price');

    stepper.querySelectorAll('.stepper-control').forEach(function (stepperControl) {
        stepperControl.addEventListener('click', function (e) {
            productTotalPriceNode.textContent = String(Number(getQuantityOf(productId) * productTotalPriceNode.getAttribute('per-one'))) + ' руб';
        });
    })
});

