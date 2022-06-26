<?php
require ('header.php');
global $pdo;
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

}


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

                    if ($session->getUser()->isAdmin()) {
                        echo "<li><a href=\"logout.php\">Wyloguj się</a></li>";
                        echo "<li><a href=\"admin.php\">Admin</a></li>";
                    } else {
                        echo "<li><a href=\"logout.php\">Wyloguj się</a></li>";
                    }
                }else {
                    if ($session->getUser()->isAdmin()) {
                        echo "<li><a href=\"account.php\">Zaloguj się</a></li>";
                        echo "<li><a href=\"admin.php\">Admin</a></li>";
                    } else {
                        echo "<li><a href=\"account.php\">Zaloguj się</a></li>";
                    }
                }
                ?>
            </ul>
        </navigation>

        <a href="cart.php"> <img src="images/shopping-cart.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu" onclick="menuTogg()">
    </div>
</div>
<!------ pojedynczy produkt ----->
<div class="smallContainer">
    <div class="singleProd">
        <div class="row">
            <div class="secondColumn">
                <?php
                $dbhost = "localhost";
                $dbname = "23121_bikeShop";     //23121_bikeShop
                $dbuser = "23121_bikeShop";     //23121_bikeShop
                $dbpassword = "123abc12A";      //123abc12A
                $pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("SET NAMES 'utf8'");
                $stmt = $pdo->prepare("SELECT * FROM products");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                }
                function showProd($id)
                {
                    global $pdo;
                    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=:id");
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id'];

                        echo "<img src=images/" . $row['indeks'] . "-1.jpg width=\"100%\" id=\"productImg\">";
                        echo"<div class=\"prodImages-row\">";
                        echo "<div class=\"prodImagesColumn\">";
                        echo "<img src=images/".$row['indeks']."-1.jpg width=\"100%\" class=sImg>";
                        echo "</div>";
                        echo "<div class=\"prodImagesColumn\">";
                        echo "<img src=images/".$row['indeks']."-2.jpg width=\"100%\" class=sImg>";
                        echo "</div>";
                        echo "<div class=\"prodImagesColumn\">";
                        echo "<img src=images/".$row['indeks']."-3.jpg width=\"100%\" class=sImg>";
                        echo "</div>";
                        echo "<div class=\"prodImagesColumn\">";
                        echo "<img src=images/".$row['indeks']."-4.jpg width=\"100%\" class=sImg>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class=\"secondColumn\">";
                        echo "<p>Rowery -> " . $row['nazwa'] . "</p>";
                        echo "<h1>" . $row['title'] . "</h1>";
                        echo "<h4>" . $row['price'] . "zł</h4>";
                        $id = $row['id'];
                        echo "<a href=\"addToCart.php?id=$id\" class=\"button\">Dodaj do koszyka</a>";
                        echo "<h3>Informacje o produkcie</h3>";
                        echo "<br>";
                        echo "<p>" . $row['descr'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }

                if (isset($_GET['product_id'])) {
                    showProd($_GET['product_id']);
                }
                ?>


                </div>
            </div>

                <!----- polecane produty ----->
        <div class="smallContainer">
            <h2 class="title">Polecane Produkty</h2>
            <div class="row">
                <div class="fourthColumn">
                    <a href="product.php?product_id=1">
                        <img src="images/bike1.jpg">
                        <h4>GIANT REIGN E+ 0</h4>

                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        <p>36.699zł</p>
                    </a>
                </div>
                <div class="fourthColumn">
                    <a href="product.php?product_id=3">
                        <img src="images/bike3-1.jpg">
                        <h4>TRANCE X ADVANCED PRO 29 2</h4>

                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p>25.999zł</p>
                    </a>
                </div>
                <div class="fourthColumn">
                    <a href="product.php?product_id=2">
                        <img src="images/bike2.jpg">
                        <h4>GIANT REVOLT E+</h4>

                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        <p>24.299zł</p>
                    </a>
                </div>
                <div class="fourthColumn">
                    <a href="product.php?product_id=7">
                        <img src="images/bike7-1.jpg">
                        <h4>PROPEL ADVANCED PRO DISC 0</h4>
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <i class="fa fa-star-half-o checked"></i>
                        </div>
                        <p>30.499zł</p>
                    </a>
                </div>
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
                    var productImg = document.getElementById("productImg");
                    var sImg = document.getElementsByClassName("sImg");
                    sImg[0].onclick = function () {
                        productImg.src = sImg[0].src;
                    }
                    sImg[1].onclick = function () {
                        productImg.src = sImg[1].src;
                    }
                    sImg[2].onclick = function () {
                        productImg.src = sImg[2].src;
                    }
                    sImg[3].onclick = function () {
                        productImg.src = sImg[3].src;
                    }
                </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>