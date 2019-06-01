let lastCategory = 'all';
let lastSort = 'new';

document.getElementById('category').addEventListener('change', function () {
    let categoryString = this.options[this.selectedIndex].value;
    // console.log(categoryString);
    if (lastCategory !== categoryString) {
        location.assign('http://' + location.hostname + `/products?category=${categoryString}&sort=${lastSort}`);
        lastCategory = categoryString;
    }
});


