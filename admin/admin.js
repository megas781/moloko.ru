let changeCheckFunction = function (checkbox) {
    $.ajax({
        type: 'POST',
        url: 'confirm.php',
        data: {
            checked: checkbox.checked,
            orderId: checkbox.parentElement.parentElement.querySelector('.order-id').value
        },
        success: function (responseText) {
            console.log(`responseText ${responseText}`);
        }
    });
};


document.querySelectorAll('.order-title').forEach(function (title) {
    title.querySelector('.confirm-checkbox').addEventListener('click', changeCheckFunction);
});
document.querySelectorAll('.confirm-checkbox').forEach(function (checkbox) {
    checkbox.addEventListener('click', changeCheckFunction);
});