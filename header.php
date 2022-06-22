<?php
require ('session.php');
require ('request.php');
require ('user.php');
require ('func.php');
$dbhost = "localhost";
$dbname = "bikeShop";
$dbuser = "root";
$dbpassword = "root";
$pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpassword);
$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo -> exec("SET NAMES 'utf8'");
$request = new userRequest();
$session = new session;
?>