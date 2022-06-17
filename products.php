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
                <li><a href="">Rowery</a></li>
                <li><a href="">Odzież ochronna</a></li>
                <li><a href="">Kontakt</a></li>
                <li><a href="">Zaloguj się</a></li>
            </ul>
        </navigation>
        <img src="images/shopping-cart.png" width="30px" height="30px">
        <img src="images/menu.png" class="menu" onclick="menuTogg()">
    </div>
    <div class="smallContainer">
        <div class="row">
            <h2 class="title">Nasze Rowery</h2>
            <small>Kategoria</small>
            <select>
                <option>Wszystko</option>
                <option>Górskie</option>
                <option>Kolarzowki</option>
                <option>Zjazdowe</option>
                <option>Elektryczne</option>
            </select>
        </div>

        <div class="row">
            <div class="fourthColumn">
                <img src="images/prod1.jpg">
                <h4>GIANT REIGN E+ 0</h4>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>36 699 zł</p>
            </div>
            <div class="fourthColumn">
                <img src="images/prod3.jpg">
                <h4>KASK GIANT ROOST MIPS, OFF-ROAD</h4>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p>459 zł</p>
            </div>
            <div class="fourthColumn">
                <img src="images/prod2.jpg">
                <h4>GIANT REVOLT E+</h4>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>24 299 zł</p>
            </div>
            <div class="fourthColumn">
                <img src="images/prod4.jpg">
                <h4>PEDAŁY PLATFORMOWE PINNER ELITE</h4>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <i class="fa fa-star-half-o checked"></i>
                </div>
                <p>249 zł</p>
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
