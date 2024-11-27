<?php
ini_set('display_errors', 1);

if($_FILES['item_image']['error'] === UPLOAD_ERR_INI_SIZE) {
  _respond('item_image too large', 400);
}

$item_image_temp_name = $_FILES["item_image"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["item_image"]["name"]); //images/circle.png
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
$image_mime = mime_content_type($_FILES["item_image"]["tmp_name"]); // reads the mime inside the file
$accepted_image_formats = ['image/png', 'image/jpeg'];
if( ! in_array($image_mime, $accepted_image_formats) ){
  http_response_code(400);
  echo 'Image not allowed';
  exit();
}
$user_image_name = 'user-image';
switch($image_mime){
  case 'image/png':
    $user_image_name .= '.jpeg';
  break;
  case 'image/jpeg':
    $user_image_name .= '.jpeg';
  break;
  case 'image/jpg':
    $user_image_name .= '.jpeg';
  break;
}

if(move_uploaded_file($_FILES["item_image"]["tmp_name"], "uploads/$user_image_name")){
  echo 'OK';
  exit();
}