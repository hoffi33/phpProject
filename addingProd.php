
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
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Roboto+Slab:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="header">


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
        <div class="row">
            <div class="firstColumn">
                <?php
                if($session -> getUser() -> isAnon()){
                    require ('account.php');
                }else{
                    if($session->getUser()->isAdmin()){

                        $indeks = $_POST['indeks'];
                        $title = $_POST['title'];
                        $price = $_POST['price'];
                        $descr = $_POST['decr'];
                        $name = $_POST['nazwa'];
                        $category_id = $_POST['category'];

$stmt = $pdo->prepare('INSERT INTO product (id, indeks, title, price, descr, nazwa, category_id) VALUES (null, :indeks, :title, :price, :descr, :nazwa, :category_id)');

$stmt->bindValue(':indeks', $indeks, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
$stmt->bindValue(':descr', $descr, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);

                        header('Location: admin.php');
                    }
                }



                ?>
            </div>
        </div>
        <br><br><br>
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
            function menuTogg(){
                if(mainMenu.style.maxHeight == "0px"){
                    mainMenu.style.maxHeight = "200px";
                }else{
                    mainMenu.style.maxHeight = "0px";
                }
            }
        </script>
</body>
</html>

