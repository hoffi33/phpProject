<?php
require ('header.php');
global $pdo;
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt -> execute();
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){

}

function showCategory($cat_id = null){
    global $pdo;
    if($cat_id){
        $stmt = $pdo->prepare("SELECT * FROM products WHERE cat_id = :cid");
        $stmt -> bindValue(':cid',$cat_id,PDO::PARAM_INT);
        $stmt -> execute();
    }else{
        $stmt = $pdo->prepare("SELECT * FROM products");
    $stmt -> execute();
    }

    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];

        echo "<div class=\"fourthColumn\">";
        echo "<a href=product.php?product_id=$id>";
        echo "<img src=images/".$row['indeks'].".jpg>";
        echo "<h4>" . $row['title'] . "</h4>";
        echo "</a>";
        echo "<p>" . $row['price'] . "zł</p>";
        echo "</div>";
    }
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
            <a href="index.php">
                <a href="index.php"><img src="images/logoTest2.png" width="180px"></a>
            </a>
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
                    echo "<li><a href=\"account.php\">Zaloguj się</a></li>";
                }
                ?>
            </ul>
        </navigation>

        <a href="cart.php"> <img src="images/shopping-cart.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu" onclick="menuTogg()">
    </div>
    <div class="smallContainer">
        <div class="row">
            <h2 class="title">Nasze Rowery</h2>
            <small>Kategoria</small>
            <form action="" method="post">
            <select name="bikes" method="post">
                <option>Wszystkie</option>
            <?php
            global $pdo;
            $stmt= $pdo->prepare("SELECT * FROM categories");
            $stmt -> execute();
            while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
            }
            ?>
            </select>
            <input type="submit" name="submit" value="Filtruj">
            </form>
        </div>

        <div class="row">

            <?php
            $dbhost = "localhost";
            $dbname = "23121_bikeShop";     //23121_bikeShop
            $dbuser = "23121_bikeShop";     //23121_bikeShop
            $dbpassword = "123abc12A";      //123abc12A
            $pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpassword);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo -> exec("SET NAMES 'utf8'");

                if(!empty($_POST['bikes'])) {
                    $selected = $_POST['bikes'];
                    if($selected=="Wszystkie"){
                        showCategory();
                    }
                    elseif ($selected=="Górskie"){
                        showCategory(4);
                    }
                    elseif ($selected=="Kolarzówki"){
                        showCategory(3);
                    }
                    elseif ($selected=="Zjazdowe"){
                        showCategory(2);
                    }
                    elseif ($selected=="Elektryczne"){
                        showCategory(1);
                    }

                } else {
                    showCategory();
                }



            ?>

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
</body>
</html>
