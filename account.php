<?php
require ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep Rowerowy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Roboto+Slab:wght@200&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="navigationBar">
        <div class="logo">
            <a href="index.php"><img src="images/logoTest2.png" width="180px"></a>
        </div>
        <navigation>
            <ul id="mainMenu">
                <li><a href="index.php">Strona Główna</a></li>
                <li><a href="products.php">Rowery</a></li>
                <li><a href="">O nas</a></li>
                <li><a href="">Kontakt</a></li>
                <?php

                if(!$session->getUser()->isAnon())
                {
                    echo "<li><a href=\"logout.php\">Wyloguj się</a></li>";
                }else{
                    if($session->getUser()->isAdmin())
                    echo "<li><a href=\"account.php\">Zaloguj się</a></li>";
                }
                ?>
            </ul>
        </navigation>

        <a href="cart.php"> <img src="images/shopping-cart.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu" onclick="menuTogg()">
    </div>
</div>

<div class="acc">
    <div class="container">
        <div class="row">
            <div class="secondColumn">
                <img src="images/image1.jpg" width="100%">
            </div>
            <div class="secondColumn">
                <div class="form-con">
                    <div class="formB">
                        <span onclick="register()">Zarejestruj się</span>
                        <span onclick="login()">Zaloguj się</span>
                        <hr id="idF">
                    </div>
                    <form action="" method="post" id="registerF">
                        <input type="text" placeholder="Login" name="login">
                        <input type="text" placeholder="Email" name="Email">
                        <input type="text"  placeholder="Hasło" name="pass">
                        <button type="submit" class="button">Zarejestruj</button>
                    </form>
                    <form action="loggingIn.php" method="post" id="loginF">
                        <input type="text" placeholder="Login" name="login">
                        <input type="text"  placeholder="Hasło" name="pass">
                        <button type="submit" class="button">Zaloguj</button>
                    </form>
                </div>
            </div>
            "</div>
    </div>


</div>




<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footColumn">
                <h3>Przydatne linki</h3>
                <ul>
                    <li>Polityka Prywatności</li>
                    <li>Zwroty</li>
                    <li>Płatności</li>
                    <li>Dostawy</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyrights">Najlepszy Sklep | WPRG s24551</p>
    </div>
</div>

<script>
    var mainMenu = document.getElementById("mainMenu");
    mainMenu.style.maxHeight = "0px";

    function menuTogg() {
        if (mainMenu.style.maxHeight == "0px") {
            mainMenu.style.maxHeight = "200px";
        } else {
            mainMenu.style.maxHeight = "0px";
        }
    }
</script>
<script>

    var registerF = document.getElementById("registerF");
    var loginF = document.getElementById("loginF");
    var idF = document.getElementById("idF");

    function login(){
        registerF.style.transform = "translateX(0px)";
        loginF.style.transform = "translateX(0px)";
        idF.style.transform = "translateX(100px)"
    }
    function register(){
        registerF.style.transform = "translateX(300px)";
        loginF.style.transform = "translateX(300px)";
        idF.style.transform = "translateX(0px)";
    }

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>