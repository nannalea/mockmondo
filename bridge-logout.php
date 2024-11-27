<?php
session_start();
session_destroy();

$file='user-image.jpeg';
unlink("uploads/".$file);

header('Location: index');
exit();