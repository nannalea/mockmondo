<?php
ini_set('display_errors', '1');

define('_ITEM_NAME_MIN_LEN', 2);
define('_ITEM_NAME_MAX_LEN', 10);

define('_ITEM_PRICE_REGEX', '/^[1-9][0-9]*\.[0-9]{2}$/');
// From 1-9, from 0-9 *=many times, .followed by, from 0-9, {2} = max two chars

define('_USER_NAME_MIN_LEN', 2);
define('_USER_NAME_MAX_LEN', 16);

define('_USER_LAST_NAME_MIN_LEN', 2);
define('_USER_LAST_NAME_MAX_LEN', 10);

define('_REGEX_EMAIL', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');

define('_REGEX_PASSWORD', '/^(?=.*[A-Za-z])(?=.*?[0-9])[A-Za-z\d@$!%*#?&]{6,}$/');


// ##############################
function _validate_item_name(){
  $error_message = 'item_name min '._ITEM_NAME_MIN_LEN.' max '._ITEM_NAME_MAX_LEN.' characters';
  if( ! isset($_POST['item_name'])){ _respond($error_message, 400); }
  $_POST['item_name'] = trim($_POST['item_name']);
  if( strlen($_POST['item_name']) < _ITEM_NAME_MIN_LEN ){ _respond($error_message, 400); }
  if( strlen($_POST['item_name']) > _ITEM_NAME_MAX_LEN ){ _respond($error_message, 400); }
  return $_POST['item_name'];
}

// ##############################
function _validate_item_price(){
  $error_message = 'item_price must be a whole number or have two decimals';
  if( ! isset($_POST['item_price'])){ _respond($error_message, 400); }
  $_POST['item_price'] = trim($_POST['item_price']);
  if( ctype_digit($_POST['item_price']) ){ 
      $_POST['item_price'] = $_POST['item_price'].'.00'; 
      }
  $_POST['item_price'] = str_replace(',', '.', $_POST['item_price']);
  if( ! preg_match(_ITEM_PRICE_REGEX, $_POST['item_price'])){ _respond($error_message, 400); }
  return $_POST['item_price'];
}

// ##############################
function _validate_user_name(){
  $error_message = 'user_name min '._USER_NAME_MIN_LEN.' max '._USER_NAME_MAX_LEN.' characters';
  if( ! isset($_POST['user_name'])){ _respond($error_message, 400); }
  $_POST['user_name'] = trim($_POST['user_name']);
  if( strlen($_POST['user_name']) < _USER_NAME_MIN_LEN ){ _respond($error_message, 400); }
  if( strlen($_POST['user_name']) > _USER_NAME_MAX_LEN ){ _respond($error_message, 400); }
  return $_POST['user_name'];
}

// ##############################
function _validate_user_last_name(){
  $error_message = 'user_last_name min '._USER_LAST_NAME_MIN_LEN.' max '._USER_LAST_NAME_MAX_LEN.' characters';
  if( ! isset($_POST['user_last_name']) ){ _respond($error_message, 400); }
  $_POST['user_last_name'] = trim($_POST['user_last_name']);
  if( strlen($_POST['user_last_name']) < _USER_LAST_NAME_MIN_LEN ){ _respond($error_message, 400); }
  if( strlen($_POST['user_last_name']) > _USER_LAST_NAME_MAX_LEN ){ _respond($error_message, 400); }
  return $_POST['user_last_name'];
}

// ##############################
function _validate_email(){
$error_message = 'email missing or invalid';
if( ! isset($_POST['user_email']) ){ _respond($error_message, 400); }
$_POST['user_email'] = trim($_POST['user_email']);
if( ! preg_match(_REGEX_EMAIL, $_POST['user_email']) ){ _respond($error_message, 400); }
return $_POST['user_email'];
}

// ##############################
function _validate_password(){
$error_message = 'password missing or invalid';
if( ! isset($_POST['user_password']) ){ _respond($error_message, 400); }
$_POST['user_password'] = trim($_POST['user_password']);
if( ! preg_match(_REGEX_PASSWORD, $_POST['user_password']) ){ _respond($error_message, 400); }
return $_POST['user_password'];
}

// ##############################
function _validate_item_image(){
if($_FILES['item_image']['error'] === UPLOAD_ERR_INI_SIZE) {
  _respond('item_image too large', 400);
}

$item_image_temp_name = $_FILES["item_image"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
$image_mime = mime_content_type($_FILES["img"]["tmp_name"]); // reads the mime inside the file
$accepted_image_formats = ['image/png', 'image/jpeg', 'image/jpg'];
if( ! in_array($image_mime, $accepted_image_formats) ){
  http_response_code(400);
  echo 'Image not allowed';
  exit();
}
$user_image_name = 'user-image';
switch($image_mime){
  case 'image/png':
    $user_image_name .= '.png';
  break;
  case 'image/jpeg':
    $user_image_name .= '.jpeg';
  break;
  case 'image/jpg':
    $user_image_name .= '.jpeg';
  break;
}
}

// if(move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/$user_image_name")){
//   echo 'OK';
//   exit();
// }  

// ##############################
function _respond( $message = '',  $http_response_code = 200 ){
  header('Content-Type: application/json');
  http_response_code($http_response_code);
  $response = is_array($message) ? $message : ['info'=>$message];
  echo json_encode($response);
  exit();
}
