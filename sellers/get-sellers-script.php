<?php

include_once '../App.php';

//print_r($_GET);


if (isset($_GET['locality'])) {
    if (preg_match('~^\d+$~', $_GET['locality']) and $_GET['locality'] > 0 or $_GET['locality'] === 'no-matter') {
        $localityId = $_GET['locality'];
    } else {
        echo 'default_case';
        return;
    }
} else {
    $localityId = 'no-matter';
}

if ($localityId === 'no-matter') {
    //Если у нас no-matter, то просто возвращаем ко всем городам
    $sellers = $APP->getSellers();
    echo json_encode($sellers);
    return;
} else {
    //Здесь у нас в $localityId какой-то положительный Integer
    //Попробуем запросить город с координатами

    //У нас есть id! Давайте достанем данные населенного пункта
    $city = $APP->getCityById($localityId);

//    print_r($city);

    if ($city) {
        //если город найден, то...
        $sellersWithVillages = $APP->getSellers();


        usort($sellersWithVillages, function ($vil1, $vil2) {

            $citylat = $GLOBALS['city']['lat'];
            $citylng = $GLOBALS['city']['lng'];

            $vLat1 = $vil1['lat'];
            $vLng1 = $vil1['lng'];

            $vLat2 = $vil2['lat'];
            $vLng2 = $vil2['lng'];

            $vector1 = (
            sqrt(
                pow($citylat - $vLat1, 2) +
                pow($citylng - $vLng1, 2)
            )
            );

            $vector2 = (
            sqrt(
                pow($citylat - $vLat2, 2) +
                pow($citylng - $vLng2, 2)
            )
            );

            return $vector1 > $vector2;

        });

//        echo "sorted:\n";
//        print_r($sellersWithVillages);

        echo json_encode($sellersWithVillages);

    } else {
        //По идеи здесь должна быть какая-нибудь обработка ошибки, но я просто выведу всех продавцов
        $cities = $APP->getCities();
        echo json_encode($cities);
        return;
    }
}