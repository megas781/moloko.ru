let fio = document.getElementById('fio');
let address = document.getElementById('address');
let phoneNumber = document.getElementById('phone-number');
let paymentMethod = document.querySelector('input[name="payment-method"][checked]');
let privacyPolicyArgeement = document.getElementById('privacy-agreement-checkbox');
let orderComment = document.getElementById('order-comment');

//Подгрузка суммы заказа
function orderRecalculateSumup() {

    //полная сумма за продукты
    document.querySelector('.js-products-price').textContent = String(getTotalPrice()) + ' руб';
    //полная сумма с доставкой
    document.querySelector('.js-total-price').textContent = String(getTotalPrice() + 449) + ' руб';

}
//Валидация введённых данных
function validateInput() {

    let fioValue = document.getElementById('fio').value.trim();
    let addressValue = document.getElementById('address').value.trim();
    let phoneNumberValue = document.getElementById('phone-number').value.trim();
    let privacyPolicyArgeementAcceptedValue = document.getElementById('privacy-agreement-checkbox').checked;

    console.log(fioValue);
    console.log(`address: ${addressValue}`);
    console.log(`phone  : ${phoneNumberValue}`);
    console.log(`privacy: ${privacyPolicyArgeementAcceptedValue}`);
    console.log();


    let fioValidated = fioValue.match(/^[А-Яа-яЁё-]{2,}\s+[А-Яа-яЁё-]{2,}($|\s+[А-Яа-яЁё-]{2,}$)/u);
    // console.log(fioValidated);
    let addressValidated = addressValue.match(/^[\dА-Яа-яЁё\s,.-]{2,}$/u);
    // console.log(addressValidated);
    let phoneNumberValidated = phoneNumberValue.match(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u);
    // console.log(`phoneNumberValidated: ${phoneNumberValidated}`);
    // console.log(privacyPolicyArgeement);


    let validateOrderButton = document.querySelector('#validate-order-button');
    if (fioValidated && addressValidated && phoneNumberValidated && privacyPolicyArgeementAcceptedValue) {
        console.log('Валидируем!');
        validateOrderButton.classList.remove('disabled');
        validateOrderButton.disabled = false;
    } else {
        console.log('Не подходит');
        validateOrderButton.classList.add('disabled');
        validateOrderButton.disabled = true;
    }

}

//вызов конфигурационных функций при загрузке
orderRecalculateSumup();
validateInput();

console.log(localStorage.getItem('cart'));

//Событие изменения текста в input'aх
document.querySelectorAll('.js-order-textbox, #privacy-agreement-checkbox').forEach(function (value) {
    value.addEventListener('input', validateInput);
});
//Функционал кнопки "Подтвердить заказ"
document.querySelector('#validate-order-button').addEventListener('click', function (e) {
    e.preventDefault();

    $.ajax(
        {
            type: 'POST',
            url: 'validate-the-order.php',
            data: {
                fio: fio.value,
                address: address.value,
                phoneNumber: phoneNumber.value,
                paymentMethod: paymentMethod.value,
                privacyPolicyArgeement: privacyPolicyArgeement.checked,
                orderComment: orderComment.value,
                cart: getCart()
            },
            success: function (responseText, status, jqXHR) {
                // console.log(`one: ${responseText}`);
                // console.log(`two: ${status}`);
                // console.log(`tre: ${jqXHR}`);

                switch (status) {
                    case 'success':
                        localStorage.setItem('cart', '{}');
                        localStorage.setItem('prices', '{}');
                        localStorage.setItem('success', 'true');
                        location.assign('http://' + location.hostname + '/cart/order/success/');
                        //Еще нужно после заказа отчистить корзину
                        //.....
                        break;
                }
            }
        }
    );
    
});
