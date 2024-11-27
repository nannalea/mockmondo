<?php
ini_set('display_errors', 1);
// Always start with a try/catch in PHP, JS, etc.
// 'Try' to run the lines, if anything goes wrong 'catch' will return an error
try {
    // The from_city is whatever the user passes in the string, or / if not it will be auto defined as '' = nothing
    $from_city = $_GET['from_city'] ?? 0;
    //Connect to the database
    // var database = new connection function(sqlite=the technology we are using,go to directory)
    $db = new PDO('sqlite:'.__DIR__.'/db_trips.db');
    // Instructs browser to allow and show exceptions in the code:
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM flights WHERE from_city_name LIKE :from_city');
    $q->bindValue(':from_city', '%'.$from_city.'%');
    //Trigger the above lines to do an action:
    $q->execute();
    //                     Also: FETCH_OBJ
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($flights);

} catch(Exception $ex) {
    // echo $ex;
    http_response_code(400);
    echo json_encode(['info'=>'Oups, something went wrong!']);
}