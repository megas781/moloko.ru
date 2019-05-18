let theAddToCartButton = document.querySelector('#detail-product-add-to-cart-button');
let productId = theAddToCartButton.getAttribute('productId');
if (checkItemAt(productId)) {
    theAddToCartButton.classList.add('tapped');
    theAddToCartButton.textContent = 'В корзине';
}

document.querySelector('#detail-product-add-to-cart-button').addEventListener("click", function (e) {

    let productId = this.getAttribute('productId');
    let productNumber = this.parentElement.querySelector('.stepper-number').textContent;

    if (this.textContent === 'В корзину') {

        addItem(productId, productNumber);

        this.textContent = 'В корзине';
        this.classList.toggle('tapped');

    } else {

        this.textContent = 'В корзину';
        this.classList.toggle('tapped');

        removeItem(productId);
    }
    console.log(localStorage);
});