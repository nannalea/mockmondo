<?php
ini_set('display_errors', '1');

$email_already_in_system = 'a@a.com';

if( $email_already_in_system == $_POST['user_email']){
    http_response_code(400);
    exit();
}

if( $email_already_in_system !== $_POST['user_email']){
    http_response_code(200);
    exit();
}

// Success