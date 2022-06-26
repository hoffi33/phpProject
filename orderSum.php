<?php
require ('header.php');
global $pdo;
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
                <li><a href="">Zaloguj się</a></li>
                <?php

                echo $session->getUser()->getId();
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
</div>

<div class="smallContainer">
<?php
//saving data  from order to database

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

$ordered = $cart->getProducts();
foreach ($ordered as $product) {
    $pid = $product['pid'];
    $quantity = $product['quantity'];
    $stmt = $pdo->prepare("INSERT INTO order_product (id,order_id,product_id,quantity) VALUES (null, :last, :pid,:quantity)");
    $stmt->bindValue(':last', $last, PDO::PARAM_INT);
    $stmt->bindValue(':pid', $pid, PDO::PARAM_INT);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->execute();
}
$cart->clearCart();
?>
    <h2>Zamówienie złożone! <a href="index.php"> Wróć na stronę główną.</a></h2><br>
    <h3>Na podany adres email wysłaliśmy potwierdzenie zamówienia. :)</h3>

    <?php
    mail($_POST['email'], "Zamówienie numer $last", "Wysyłamy potwierdzenie zamówienia nr $last." . "\n" ."Dane do wysyłki: " ."\n" .
        "Imie: " . $_POST['name'] . "\n" . "Nazwisko: " . $_POST['surname'] . "\n" . "Ulica: " . $_POST['street'] . "\n" . "Numer domu: " . $_POST['street_num'] . "\n"
        . "Miasto: " . $_POST['city'] . "\n" . "Kod pocztowy: " . $_POST['postal_code'] . "\n"  . "Województwo: " . $_POST['state'] . "\n"  . "Numer telefonu: " . $_POST['phone_num'] . "\n" . "Jeśli dostrzegasz błąd w ww. danych - niezwłocznie odezwij się do nas!");
    ?>
    <br><br><br>
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




