<?php
require ('header.php');

if($session -> getUser() -> isAnon()){
    $res = user::checkPass($_POST['login'], $_POST['pass']);


    if($res instanceof user){           //jesli true to logowanie udane
        $session->updateSession($res);
        echo "Logowanie powiodlo sie " . $session->getUser()->getLogin();
    }else{
        header('Location: login.php');
    }

}