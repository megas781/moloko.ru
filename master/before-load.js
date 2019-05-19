//Методы, нужные еще до загрузки страницы

//достать данные корзины
function getCart() {
    if (JSON.parse(localStorage.getItem('cart'))) {
        return JSON.parse(localStorage.getItem('cart'));
    } else {
        return {};
    }
}
//достать кол-во различных товаров в корзине
function getCartLength() {
    return Object.entries(getCart()).length;
}
//достать id всех товаров. Это нужно для ajax запроса
function getSelectedProductIds() {
    return Object.keys(getCart());
}
//Вернуть кол-во товара в корзине
function getQuantityOf(productId) {
    return getCart()[productId];
}
//добавить товар в корзину
function addItem(productId, quantity) {
    let array =  getCart();
    array[productId] = quantity;
    localStorage.setItem('cart', JSON.stringify(array));
}
//удалить товар из корзины
function removeItem(productId) {
    let array =  getCart();
    array[productId] = undefined;
    localStorage.setItem('cart', JSON.stringify(array));
}



//Работа с ценами
function getPrices() {
    if (JSON.parse(localStorage.getItem('prices'))) {
        return JSON.parse(localStorage.getItem('prices'));
    } else {
        return {};
    }
}
//Вернуть цену товара по ID
function getPriceOf(productId) {
    return getPrices()[productId];
}
function calculateProductTotalPrice(productId) {
    return getPriceOf(productId) * getQuantityOf(productId);
}
function addPriceOf(productId, price) {
    let array =  getPrices();
    array[productId] = price;
    localStorage.setItem('prices', JSON.stringify(array));
}