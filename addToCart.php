<?php
require ('header.php');
$cart->add($_GET['id']);
header('Location: cart.php');
?>