<?php
ini_set('display_errors', '1');
require_once __DIR__.'/_x.php';

_validate_user_name();
_validate_email();
_validate_password();

$user = [
    'user_id' => uniqid(),
    'user_name' => $_POST['user_name'],
    'user_email' => $_POST['user_email'],
    'user_password' => $_POST['user_password']
];

// Success
echo json_encode(['info'=>'ok', 'message'=>"{$_POST['user_name']}"]);