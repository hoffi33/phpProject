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
            <img src="images/logoTest2.png" width="180px">
        </div>
        <navigation>
            <ul id="mainMenu">
                <li><a href="index.php">Strona Główna</a></li>
                <li><a href="products.php">Rowery</a></li>
                <li><a href="">O nas</a></li>
                <li><a href="">Kontakt</a></li>
                <li><a href="">Zaloguj się</a></li>
            </ul>
        </navigation>

        <a href="cart.php"> <img src="images/shopping-cart.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu" onclick="menuTogg()">
    </div>
</div>

<div class="smallContainer">
    <table>
        <tr>
            <th>Uzupełnij dane do wysyłki</th>
            <th></th>
            <th></th>
        </tr>
    </table>
    <br>
    <form action="orderSum.php" method="post">
        Imie <input type="text" pattern="[A-Za-ząęźżśóćńł]{1,32}" name="name" required><br>
       Nazwisko <input type="text" pattern="[A-Za-ząęźżśóćńł]{1,32}"name="surname" required><br>
        Ulica <input type="text" pattern="[A-Za-ząęźżśóćńł]{1,32}" name="street" required><br>
        Nr. mieszkania <input type="number" name="street_num" min="1" required><br>
        Miasto <input type="text" pattern="[A-Za-ząęźżśóćńł]{1,32}" name="city" required><br>
        Kod pocztowy <input type="text" name="postal_code" placeholder="XX-XXX" pattern="^\d{2}-\d{3}$" required><br>
        Województwo <input type="text" name="state" list="wojewodztwa" required>
        <datalist id="wojewodztwa">
            <option value="dolnośląskie">
            <option value="kujawsko-pomorskie">
            <option value="lubelskie">
            <option value="lubuskie">
            <option value="łódzkie">
            <option value="małopolskie">
            <option value="mazowieckie">
            <option value="opolskie">
            <option value="podkarpackie">
            <option value="podlaskie">
            <option value="pomorskie">
            <option value="śląskie">
            <option value="świętokrzyskie">
            <option value="warmińsko-mazurskie">
            <option value="wielkopolskie">
            <option value="Zachodniopomorskie">
        </datalist><br>
        Numer telefonu  <input type="tel"  name="phone_num" placeholder="XXX-XXX-XXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required><br>
        <input type="submit" class="button" value="Zamawiam"></a>
    </form>
<br><br>

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



