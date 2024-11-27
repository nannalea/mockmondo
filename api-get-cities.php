<?php
$cities = [
    ['city_name'=>'København, Danmark', 'city_image'=>'copenhagen.png', 'city_airport'=>'CPH'],
    ['city_name'=>'Svalbard, Norge', 'city_image'=>'svalbard.png', 'city_airport'=>'LYR'],
    ['city_name'=>'Pantelleria, Sicilien, Italien', 'city_image'=>'pantelleria.png', 'city_airport'=>'PNL'],
    ['city_name'=>'Tel Aviv, Israel', 'city_image'=>'tel-aviv.png',  'city_airport'=>'TLV'],
    ['city_name'=>'Namibe, Angola', 'city_image'=>'namibe.png', 'city_airport'=>'MSZ'],
    ['city_name'=>'Tokyo, Japan', 'city_image'=>'tokyo.png', 'city_airport'=>'NRT']
];
echo json_encode($cities);