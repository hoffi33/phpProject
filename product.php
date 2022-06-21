<?php
$dbhost = "localhost";
$dbname = "bikeShop";
$dbuser = "root";
$dbpassword = "root";
$pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET NAMES 'utf8'");
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
            <img src="images/logoTest2.png" width="180px">
        </div>
        <navigation>
            <ul id="mainMenu">
                <li><a href="index.html">Strona Główna</a></li>
                <li><a href="products.php">Rowery</a></li>
                <li><a href="">Odzież ochronna</a></li>
                <li><a href="">Kontakt</a></li>
                <li><a href="">Zaloguj się</a></li>
            </ul>
        </navigation>
        <img src="images/shopping-cart.png" width="30px" height="30px">
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
                $dbname = "bikeShop";
                $dbuser = "root";
                $dbpassword = "root";
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
                        echo "<input type=\"number\" value=\"1\">";
                        echo "<a href=\"index.html\" class=\"button\">Dodaj do koszyka</a>";
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
                    <div class="row row-2">
                        <h2>Nasze inne rowery:</h2>
                        <a href="products.php"><p>Zobacz wiecej</p></a>
                    </div>
                </div>
                <div class="smallContainer">
                    <div class="row">
                        <div class="fourthColumn">
                            <img src="images/bike1.jpg">
                            <h4>GIANT REIGN E+ 0</h4>
                            <p>36 699 zł</p>
                        </div>
                        <div class="fourthColumn">
                            <img src="images/prod3.jpg">
                            <h4>KASK GIANT ROOST MIPS, OFF-ROAD</h4>
                            <p>459 zł</p>
                        </div>
                        <div class="fourthColumn">
                            <img src="images/bike3.jpg">
                            <h4>GIANT REVOLT E+</h4>
                            <p>24 299 zł</p>
                        </div>
                        <div class="fourthColumn">
                            <img src="images/prod4.jpg">
                            <h4>PEDAŁY PLATFORMOWE PINNER ELITE</h4>
                            <p>249 zł</p>
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
</body>
</html>