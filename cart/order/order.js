function orderRecalculateSumup() {

    //полная сумма за продукты
    document.querySelector('.js-products-price').textContent = String(getTotalPrice()) + ' руб';
    //полная сумма с доставкой
    document.querySelector('.js-total-price').textContent = String(getTotalPrice() + 449) + ' руб';

}

orderRecalculateSumup();

let k = 0;

function validateInput() {

    console.log(++k);

    let fio = document.getElementById('fio').value.trim();
    let address = document.getElementById('address').value.trim();
    let phoneNumber = document.getElementById('phone-number').value.trim();
    let privacyPolicyArgeementAccepted = document.getElementById('privacy-agreement-checkbox').checked;

    console.log(fio);
    console.log(`address: ${address}`);
    console.log(`phone  : ${phoneNumber}`);
    console.log(`privacy: ${privacyPolicyArgeementAccepted}`);
    console.log();


    let fioValidated = fio.match(/^[А-Яа-яЁё-]{2,}\s+[А-Яа-яЁё-]{2,}($|\s+[А-Яа-яЁё-]{2,}$)/u);
    // console.log(fioValidated);
    let addressValidated = address.match(/^[\dА-Яа-яЁё\s,.-]{2,}$/u);
    // console.log(addressValidated);
    let phoneNumberValidated = phoneNumber.match(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u);
    // console.log(`phoneNumberValidated: ${phoneNumberValidated}`);
    // console.log(privacyPolicyArgeement);


    let validateOrderButton = document.querySelector('#validate-order-button');
    if (fioValidated && addressValidated && phoneNumberValidated && privacyPolicyArgeementAccepted) {
        console.log('Валидируем!');
        validateOrderButton.classList.remove('disabled');
        validateOrderButton.disabled = false;
    } else {
        console.log('Не подходит');
        validateOrderButton.classList.add('disabled');
        validateOrderButton.disabled = true;
    }

}

//Событие изменения текста в input'aх
document.querySelectorAll('.js-order-textbox, #privacy-agreement-checkbox').forEach(function (value) {
    value.addEventListener('input', validateInput);
});