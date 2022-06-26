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
        <div class="row">
            <div class="firstColumn">
                <h1>Znajdź swój wymarzony rower <br>JUŻ TERAZ!!</h1>
                <p>Zdrowo, omijając wszystkie korki. </p>
                <a href="products.php" class="button">SPRAWDŹ NASZĄ OFERTĘ <i class="fa fa-bicycle" aria-hidden="true"></i></a>
            </div>
            <div class="secondColumn">
                <img src="images/race-day.jpg">
            </div>
        </div>
    </div>
</div>
<div class="category">
    <div class="smallContainer">
         <div class="row">
            <div class="thirdColumn">
                <img src="images/cat2.png">
            </div>
            <div class="thirdColumn">
                <img src="images/cat1.jpg">
            </div>
            <div class="thirdColumn">
                <img src="images/cat3.jpg">
            </div>
        </div>
    </div>
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
</div>
<div class="specialOff">
    <div class="smallContainer">
        <div class="row">
        <div class="secondColumn">
            <img src="images/spec3.jpg" class="specialOff-img">
        </div>
        <div class="secondColumn">
            <p>Tylko u Nas!</p>
            <h1>GIANT TCR ADVANCED SL DISC</h1>
            <small>Zaawansowane technologie aerodynamiczne. Rewolucyjny Race Bike. Nowoczesne rozwiązania integracji hamulcow
            <br>To tylko jedne z wielu zalet najnowszego Gianta TCR!<br></small>
            <a href="product.php?product_id=5" class="button ">Kup Teraz &#8594;</a>
        </div>
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