<?php
    $cars = json_decode(file_get_contents('cars.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/main.css">
    <title>Auto Scam</title>
</head>
<body>
    <div class="site-layout">
        <div class="menu">
            <div class="content-vertical">
                <button id="close-menu" onclick="closeMenu()">&#171;</button>
                <a href="index.php">
                    <img src="images/logo.png" alt="">
                </a>
                <div class="text">
                    <a href="addCar.php">Sludinājumi</a>
                </div>
            </div>
        </div>
        <div class="header">
            <button id="show-menu" onclick="showMenu()">☰</button>
            <form class="search">
                <input type="text" class="search">
                <input type="submit" value="Meklēt" value="Submit">
            </form>
        </div>
        <main>
            <div class="layout">
                <h2>Lineārs izkārtojums <input type="checkbox" name="layout" id="mode-change"></h2>
            </div>
            <div class="post-container">
            <?foreach($cars as $car){?>
                <a href="#" class="post">
                    <div class="image" style="background-image: url('<?=$car['attels']?>')">
                        <span class="image-text"><?=$car['apraksts']?></span>
                    </div>
                    <div class="post-text">
                        <h2><?=$car['marka']." ".$car['modelis']?></h2>
                        <div class="year">Ražošanas gads: <span class="spces"><?=$car['gads']?></span> </div>
                        <div class="tilpums">Dzinējs tilpums: <span class="spces"><?=$car['tilpums']?> l</span> </div>
                        <div class="num">Nobrauciens: <span class="spces"><?=$car['nobraukums']?> km</span> </div>
                        <div class="price" ><span class="money">$<?=$car['cena']?></span> </div>
                    </div>
                </a>
                <?}?>
            </div> 
        </main>
    </div>
    <script>
        window.onresize = function(){ location.reload(); }
        function showMenu() {
            $(".menu").css("width", "17em");
            $(".menu").css("animation", "pop-in .5s ease-out 1");
            $(".content-vertical").css("display", "block");
            setTimeout(() => {
                $(".menu").css("animation", "none");
            }, 470);
        }
        function closeMenu() {
            $(".menu").css("animation", "pop-out .5s ease-out 1");
            setTimeout(() => {
                $(".menu").css("width", 0);
                $(".content-vertical").css("display", "none");
            }, 500);
        }
    </script>
</body>
</html>