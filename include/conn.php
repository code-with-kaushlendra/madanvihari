<?php 

$con=mysqli_connect("localhost","u784288082_mbh","0NEtaKb+","u784288082_mbh");
// $con=mysqli_connect("localhost","root","kadmin@12345","madan_vihari");


$conn = $con;


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!defined('SMTP_HOST')) {
    define('SMTP_HOST', 'smtp.gmail.com');
}
if (!defined('SMTP_PORT')) {
    define('SMTP_PORT', 587);
}
if (!defined('SMTP_USERNAME')) {
    define('SMTP_USERNAME', 'madanbiharihandicraft@gmail.com
');
}
if (!defined('SMTP_PASSWORD')) {
    define('SMTP_PASSWORD', 'hctnpuksqishgcbt');
}


?>