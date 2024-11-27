<?php
ini_set('display_errors', 1);

// Optimize the code => change double quotes to single quotes

// Random file naming:
// $random_image_name = bin2hex(random_bytes(5)); // Gives a random name to each image uploaded, at double the value noted (eg. random_bytes at 5 = 10 digits)
// echo $random_image_name;
// exit();

$file='user-image.jpeg';
unlink("uploads/".$file);

// Folder that the images will be uploaded to:
$target_dir = 'uploads/';
// echo basename($_FILES['fileToUpload']['name']; // circle.png
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']); // images/circle.png
// echo $target_file;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // png | jpg | zip
// echo $imageFileType;
$user_image_name = 'user-image';
$user_image_name = $user_image_name.'.'.$imageFileType;
$tmp_name = $_FILES['fileToUpload']['tmp_name']; // /Applications/MAMP/tmp/php/phpOPwW7l
//echo $tmp_name;
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "uploads/$user_image_name");

header('Location: profile');
exit();

// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// // Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }