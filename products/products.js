let url = new URL(location.href);

let lastCategory;
if (url.searchParams.get('category')) {
    lastCategory = url.searchParams.get('category');
} else {
    lastCategory = 'all';
}

let lastSort;
if (url.searchParams.get('sort')) {
    lastSort = url.searchParams.get('sort');
} else {
    lastSort = 'new';
}

//Обновление станицы при изменении категории
document.getElementById('category').addEventListener('change', function () {
    let categoryString = this.options[this.selectedIndex].value;

    //Эту проверку можно не делать, т.к. событие не обрабатывается, если параметр остался тем же
    // if (lastCategory !== categoryString) {
        location.assign('http://' + location.hostname + `/products?category=${categoryString}&sort=${lastSort}`);
        lastCategory = categoryString;
    // }
});


