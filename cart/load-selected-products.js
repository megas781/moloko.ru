//Подгрузка выбранных товаров
fetch('http://moloko.glebkalachev.ru/cart/get-cart-items.php?selectedProducts=' + getSelectedProductIds().toString(), {headers: {'123mymymy' : 'yayaya'}}).then(function (response) {
    return response.text();
}).then(function (productsJSON) {
    
    console.log(`before error: ${productsJSON}`);
    
    //Парсим вернувшийся нам с сервера JSON с продуктами
    let products = JSON.parse(productsJSON);
    //Определяем контейнер, в который будем вставлять ячейки выбранных товаров
    let container = document.querySelector('#cart-products-container');

    //Проходимся по каждому товару
    for (let i = 0; i < products.length; i++) {

        //Создаем безликий div-wrapper. Просто потому что не хочу создавать section и добавлять ему классы
        let cartCellNode = document.createElement('div');
        //Извлекаем товар
        let product = products[i];
        //Перед началом генерации ячейки добавим данные о цене товара для работы дальнейшего js'a
        addPriceOf(product['product_id'], product['price']);

        console.log(product);

        //Непосредственно верстка ячейки
        cartCellNode.innerHTML = `
<section class="product">

    <img class="product-image" src="${product['image_url']}" alt="image">

    <div class="product-info">
        <a class="product-title" href="/products/detail?product_id=${product['product_id']}">${product['title']}</a>
        <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
        <div class="seller">
            <div class="seller-name"><span class="selle-name-label">Продавец:</span><a class="seller-name-link" href="/sellers/detail?seller_id=${product['seller_id']}">${product['name']} ${product['surname']}</a></div>
            <div class="seller-locality">пос. ${product['village']}</div>
        </div>
    </div>

    <div class="product-controls">
        <div>
            <div class="product-price-per-item">${product['price']} руб/шт</div>
            <div class="product-total-price" per-one="${product['price']}">${product['price'] * getQuantityOf(product['product_id'])} руб</div>

            <div class="product-quantity stepper" productId="${product['product_id']}">
                <span class="stepper-minus stepper-control">–</span>
                <span class="stepper-number">1</span>
                <span class="stepper-plus stepper-control">+</span>
            </div>
        </div>

        <div class="product-delete-button" productId="${product['product_id']}"></div>
    </div>
</section>
            `;

        //Добавляем новоиспеченную ячейку в контейнер
        container.appendChild(cartCellNode);
    }

}).then(function () {
    //Костыль, сделанный, чтобы пока что хоть как-то привязывать after-load к ajax-ячейкам.
    //Т.е. after-load.js загружается второй раз
    import('http://moloko.glebkalachev.ru/master/after-load.js?');
    import('http://moloko.glebkalachev.ru/cart/cart.js');
});



// let xhr = new XMLHttpRequest();
//
// xhr.open('GET', 'http://moloko.glebkalachev.ru/cart/getCartItems.php?selectedProducts=' + getSelectedProductIds().toString(), false);
// xhr.onload = function () {
//     // console.log('asdfdf');
//     if (this.status === 200) {
//
//         let products = JSON.parse(this.responseText);
//         let container = document.querySelector('#cart-products-container');
//
//         let k = 0;
//
//         for (let i = 0; i < products.length; i++) {
//
//             let cartCellNode = document.createElement('div');
//             let product = products[i];
//             console.log(product);
//             cartCellNode.innerHTML = `
// <section class="product">
//
//     <img class="product-image" src="${product['image_url']}" alt="image">
//
//     <div class="product-info">
//         <a class="product-title" href="/products/detail/">${product['title']}</a>
//         <p class="product-desc">Козье молоко (пастеризованное) 0.5л. Белок 2.8% до 3.2%. Жирность...</p>
//         <div class="seller">
//             <div class="seller-name"><span class="selle-name-label">Продавец:</span><a class="seller-name-link" href="/sellers/detail/">${product['name']} ${product['surname']}</a></div>
//             <div class="seller-locality">пос. ${product['village']}</div>
//         </div>
//     </div>
//
//     <div class="product-controls">
//         <div>
//             <div class="product-price-per-item">${product['price']} руб/шт</div>
//             <div class="product-total-price">${product['price'] * getQuantityOf(product['product_id'])} руб</div>
//
//             <div class="product-quantity stepper">
//                 <span class="stepper-minus stepper-control">–</span>
//                 <span class="stepper-number">1</span>
//                 <span class="stepper-plus stepper-control">+</span>
//             </div>
//         </div>
//
//         <div class="delete-button"></div>
//     </div>
// </section>
//             `;
//
//
//             container.appendChild(cartCellNode);
//         }
//     }
// }
//
// xhr.send();
