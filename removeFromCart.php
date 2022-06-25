<?php
require ('header.php');
$cart->remove($_GET['id']);
header('Location: cart.php');
?>