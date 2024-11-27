<?php
ini_set('display_errors', '1');
require_once __DIR__.'/_x.php';

$correct_email = 'a@a.com';
$correct_password = 'albert7';

if( ! filter_var( $_POST['user_email'], FILTER_VALIDATE_EMAIL ) ) {
    header('Location: index');
    // echo json_encode("invalid email filter");
    exit();
}

// Are the login-informations correct / do they match the hard-coded values:
if( $_POST['user_email'] != $correct_email) {
    header('Location: index');
    // echo json_encode("invalid email");
    exit();
}

if( $_POST['user_password'] != $correct_password) {
    header('Location: index');
    // echo("invalid password");
    exit();
}

// Success
session_start();
$_SESSION['user_name'] = 'Albert';
$_SESSION['user_name_initial'] = 'A';
$_SESSION['user_email'] = 'a@a.com';
$_SESSION['user_airport'] = 'CPH';
header('Location: profile');
exit();