<?php
require ('session.php');
require ('request.php');
require ('user.php');
require ('func.php');
require ('cartFun.php');
$dbhost = "localhost";
$dbname = "bikeShop";     //23121_bikeShop
$dbuser = "root";     //23121_bikeShop
$dbpassword = "root";      //123abc12A
$pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpassword);
$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo -> exec("SET NAMES 'utf8'");
$request = new userRequest();
$session = new session;
$cart = new cartFun;
?>