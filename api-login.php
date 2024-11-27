<?php
ini_set('display_errors', '1');
require_once __DIR__.'/_x.php';

_validate_email();
_validate_password();

// Success
echo json_encode(['info'=>'ok', 'message'=>"{$_POST['user_email']} {$_POST['user_password']}"]);