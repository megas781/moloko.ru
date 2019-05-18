//Методы, нужные еще до загрузки страницы

//достать данные корзины
function getCart() {
    if (JSON.parse(localStorage.getItem('cart'))) {
        return JSON.parse(localStorage.getItem('cart'));
    } else {
        return {};
    }
}
function getCartLength() {
    return Object.entries(getCart()).length;
}
function getSelectedProductIds() {
    return Object.keys(getCart());
}
//проверить наличие товара в корзине
function getItemAt(product_id) {
    return getCart()[product_id];
}
//добавить товар в корзину
function addItem(product_id, quantity) {
    let array =  getCart();
    array[product_id] = quantity;
    localStorage.setItem('cart', JSON.stringify(array));
}
//удалить товар из корзины
function removeItem(product_id) {
    let array =  getCart();
    array[product_id] = undefined;
    localStorage.setItem('cart', JSON.stringify(array));
}