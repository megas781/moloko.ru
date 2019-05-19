let theAddToCartButton = document.querySelector('#detail-product-add-to-cart-button');
let productId = new URL(location.href).searchParams.get('product_id');
if (getQuantityOf(productId)) {
    theAddToCartButton.classList.add('tapped');
    theAddToCartButton.textContent = 'В корзине';
}

document.querySelector('#detail-product-add-to-cart-button').addEventListener("click", function (e) {

    let productId = new URL(location.href).searchParams.get('product_id');
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