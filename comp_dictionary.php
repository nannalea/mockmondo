<?php
$languages_allowed = ['en', 'dk'];
$language = $_GET['language'] ?? 'dk';
if( ! in_array($language, $languages_allowed) ){
    $language = 'dk';
}

$dictionary=[
    
    'en_Trips' => 'Trips',
    'dk_Trips' => 'Trips',

    'en_Login' => 'Login',
    'dk_Login' => 'Log ind',
    

    'en_Flights' => 'Flights',
    'dk_Flights' => 'Fly',

    'en_Stays' => 'Stays',
    'dk_Stays' => 'Overnatning',

    'en_Car_Rental' => 'Car Rental',
    'dk_Car_Rental' => 'Billeje',

    'en_Ferries' => 'Ferries',
    'dk_Ferries' => 'Færger',

    'en_Experiences' => 'Experiences',
    'dk_Experiences' => 'Oplevelser',

    'en_Packages' => 'Packages',
    'dk_Packages' => 'Pakkerejser',

    'en_Travel_Restrictions' => 'Travel Restrictions',
    'dk_Travel_Restrictions' => 'Rejserestriktioner',


    'en_From' => 'From',
    'dk_From' => 'Fra',

    'en_To' => 'To',
    'dk_To' => 'Til',

    'en_to' => 'to',
    'dk_to' => 'til',

    'en_Search' => 'Search',
    'dk_Search' => 'Søg',


    'en_Welcome' => 'Welcome',
    'dk_Welcome' => 'Velkommen',

    'en_Find' => 'Find',
    'dk_Find' => 'Find',

    'en_a' => 'a',
    'dk_a' => 'en',

    'en_flexible' => 'flexible',
    'dk_flexible' => 'fleksibel',

    'en_flight' => 'flight',
    'dk_flight' => 'flybillet',

    'en_for' => 'for',
    'dk_for' => 'til',

    'en_your' => 'your',
    'dk_your' => 'din',

    'en_next' => 'next',
    'dk_next' => 'næste',

    'en_trip' => 'trip',
    'dk_trip' => 'rejse',

    'en_delete' => 'Delete',
    'dk_delete' => 'Slet',

];
?>