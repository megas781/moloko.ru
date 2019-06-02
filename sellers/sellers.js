let url = new URL(location.href);

let lastCity;
if (url.searchParams.get('locality')) {
    lastCity = url.searchParams.get('locality');
} else {
    lastCity = 'no-matter';
}


function formatDescription(string) {
    let returnValue = string.match(/^.{80,100} /u)[0];
    returnValue = returnValue.substr(0, returnValue.length - 1) + '...';
    return returnValue;
}


let localitySelect = document.getElementById('locality');

localitySelect.addEventListener('change', function () {

    $.ajax(
        {
            type: 'GET',
            url: 'get-sellers-script.php',
            data: {
                locality: localitySelect.options[localitySelect.selectedIndex].value
            },
            success: function (responseText, status, jqXHR) {

                switch (status) {
                    case 'success':

                        // console.log(responseText);
                        
                        if (responseText === 'default_case') {
                            //handle it!
                        } else {

                            let parsedSortedSellers = JSON.parse(responseText);

                            console.log(`parsed sorted sellers: \n ${JSON.stringify(parsedSortedSellers[0])}`);

                            let sellersContainer = document.getElementById('sellers');
                            sellersContainer.innerHTML = '';
                            
                            parsedSortedSellers.forEach(function (seller) {
                                // console.log(value);
                                let cell = `
        <section class="seller-card">
        <a href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=${seller['seller_id']}"><img class="seller-card-image" src="${seller['avatar_url']}" alt="фотография продавца"></a>
        <a class="seller-card-name" href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=${seller['seller_id']}">${seller['surname']} ${seller['name']}</a>
        <div class="seller-card-locality">пос. ${seller['village']}</div>
        <p class="seller-card-desc">${formatDescription(seller['description'])}</p>
        <div class="flex-space"></div>
        <div class="seller-card-detail-button-positioner">
            <a href="http://moloko.glebkalachev.ru/sellers/detail/?seller_id=${seller['seller_id']}" class="detail-link blue-button">Подробнее</a>
        </div>
        </section>
                                `;

                                sellersContainer.innerHTML += cell;

                            });
                            

                        }


                        break;
                }
            }
        }
    );
});
