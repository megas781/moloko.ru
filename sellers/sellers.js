let url = new URL(location.href);

let lastCity;
if (url.searchParams.get('locality')) {
    lastCity = url.searchParams.get('locality');
} else {
    lastCity = 'no-matter';
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
                console.log(`one: ${responseText}`);
                console.log(`two: ${status}`);
                console.log(`tre: ${jqXHR}`);
            }
        }
    );
    // $.ajax({
    //     type: 'GET',
    //     url: 'get-sellers-script.php',
    //     data: {
    //         locality: localitySelect.options[localitySelect.selectedIndex]
    //     },
    //     success: function (responseText, status, jqXHR) {
    //         switch (status) {
    //             case 'success':
    //                 console.log(`responseText: ${responseText}`);
    //                 break;
    //         }
    //     }
    // });
});
