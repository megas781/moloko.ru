console.log();

//Подгрузка выбранных товаров
fetch('http://moloko.glebkalachev.ru/cart/getCartItems.php?selectedProducts=' + getSelectedProductIds().toString()).then(function (response) {
    return response.text();
}).then(function (productsJSON) {

    
    let products = JSON.parse(productsJSON);
    let container = document.querySelector('#cart-products-container');

    let k = 0;

    for (let i = 0; i < products.length; i++) {

        let cartCellNode = document.createElement('div');
        let product = products[i];
        console.log(product);
        cartCellNode.innerHTML = `
<section class="product">

    <img class="product-image" src="${product['image_url']}" alt="image">

    <div class="product-info">
        <a class="product-title" href="/products/detail/">${product['title']}</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span><a class="seller-name-link" href="/sellers/detail/">${product['name']} ${product['surname']}</a></div>
            <div class="seller-locality">пос. ${product['village']}</div>
        </div>
    </div>

    <div class="product-controls">
        <div>
            <div class="product-price-per-item">${product['price']} руб/шт</div>
            <div class="product-total-price">${product['price'] * getItemAt(product['product_id'])} руб</div>

            <div class="product-quantity stepper">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
        </div>

        <div class="delete-button"></div>
    </div>
</section>
            `;


        container.appendChild(cartCellNode);
    }

});
