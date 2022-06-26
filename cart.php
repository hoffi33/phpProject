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

<!----- cart ------->
<div class="smallContainer cart">
                <?php
                $inCart = $cart->getProducts();
                $finalPrice = 0;
                $finalProductPrice = 0;

if($inCart == null){
echo "W tej chwili twój koszyk jest pusty. <a href=\"products.php\">Sprawdź nasze produkty i znajdź coś dla siebie!</a><br><br>";
}else{
                            echo "<table>
    <tr>
        <th>Nazwa produktu</th>
        <th>Ilość</th>
        <th>Cena</th>
    </tr>
    <tr>
        <td><div class=\"cartInfo\">";

                    foreach ($inCart as $product) {
                        $prodCartId = $product['id'];
                        $price = $product['price'];
                        $quantity = $product['quantity'];
                        $indeks = $product['indeks'];
                        $title = $product['title'];
                        $id = $product['pid'];
                        $more = "<a href=\"addToCart.php?id=$id\">+</a>";
                        $less = "<a href=\"removeFromCart.php?id=$id\">-</a>";


echo "
<tr>
      <td><div class=\"cartInfo\">
                    <img src=images/" . $indeks . "-1.jpg>";
                        echo "<div>
                    <p>" . $title . "</p>
                    <small>Łączna cena: " . $quantity * $price . "PLN</small>
      
                </div>
            </div> </td>
            <td>" . $quantity . "<br>" . $more . " " . $less . "</td>
                    <td>" . $price . " </td>";

                        $finalProductPrice = $quantity * $price;
                        $finalPrice += $finalProductPrice;
                }
                echo "     </tr>
</table>
    <div class=\"finalPrice\">
        <table>
            <tr><td>Koszty dostawy</td>
            <td>GRATIS</td></tr>
            <tr><td>Całkowita wartość zamówienia</td>
                <td> $finalPrice PLN</td>
                </tr>
                <tr><td><a href=\"orders.php\" class=\"button\">ZŁÓŻ ZAMÓWIENIE</a></td></tr>
        </table>";
                    }
                ?>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>