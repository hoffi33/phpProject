<?php
require ('header.php');
global $pdo;

$stmt = $pdo->prepare("INSERT INTO orders (id,name,surname, email, street,street_num,city,postal_code,state,phone_num) VALUES (null, :name, :surname, :email, :street, :street_num, :city, :postal_code, :state, :phone_num)");
$stmt->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
$stmt->bindValue(':surname', $_POST['surname'],PDO::PARAM_STR);
$stmt->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
$stmt->bindValue(':street', $_POST['street'],PDO::PARAM_STR);
$stmt->bindValue(':street_num', $_POST['street_num'],PDO::PARAM_STR);
$stmt->bindValue(':city', $_POST['city'],PDO::PARAM_STR);
$stmt->bindValue(':postal_code', $_POST['postal_code'],PDO::PARAM_STR);
$stmt->bindValue(':state', $_POST['state'],PDO::PARAM_STR);
$stmt->bindValue(':phone_num', $_POST['phone_num'],PDO::PARAM_STR);
$stmt->execute();

$last = $pdo->lastInsertId();           //id ostatniego orders id

$stmt = $pdo->prepare("INSERT INTO order_product (id,order_id,product_id,quantity) VALUES (null, :last,:pid,:quantity)");
$stmt -> bind

?>
