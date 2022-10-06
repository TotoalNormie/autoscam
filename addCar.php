<?php
    session_start();
    $cars = json_decode(file_get_contents('cars.json'), true);
    if (@$_POST['token'] === @$_SESSION['token'] ){
        if(isset($_POST['submit'])){ 
            $cars[uniqid()] = [
                'marka' => $_POST['marka'],
                'modelis' => $_POST['modelis'],
                'gads' => $_POST['gads'],
                'tilpums' => $_POST['tilpums'],
                'apraksts' => $_POST['apraksts'],
                'attels' => $_POST['attels'],
                'nobraukums' => $_POST['nobraukums'],
                'cena' => $_POST['cena']
            ];
            file_put_contents('cars.json', json_encode($cars, JSON_PRETTY_PRINT));
      }
     
      $_SESSION['token'] = uniqid();

      file_put_contents('cars.json', json_encode($cars, JSON_PRETTY_PRINT));
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/input.css">
    <link rel="stylesheet" href="style/layout.css">
   
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
                    <a href="index.php">Sludinājumi</a>
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
            <div class="layout"></div>
            <div class="data">
                <div class="post-container"> 
                    <form class="form" method="post">
                    <input autocomplete="false"type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                        <div class="blakus">
                            <div class="column">
                                <label for="fname">Marka</label>
                                <select class="input" name="marka">
                                    <option hidden value="audi">Audi</option>
                                    <option value="Audi">Audi</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Mercedes">Mercedes</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Cits">Cits</option>
                                </select>
                                <label for="fname">Modelis</label>
                                <input class="input" type="text" name="modelis">
                            </div>
                            <div class="column">    
                                <label for="fname">Gads</label>
                                <input class="input" type="date" name="gads">
                                <label for="fname">Tilpums</label>
                                <input class="input" type="number" min="0" step="any" max="100" name="tilpums">
                            </div>
                        </div>
                        <div class="blakus">
                            <div class="center">
                                <div class="column">
                                    <label for="fname">Apraksts</label>
                                    <textarea class="input" id="textarea" maxlength="500" name="apraksts"></textarea>
                                </div>
                                <div class="column">
                                    <label for="fname">Attēls</label>
                                    <input type="text" placeholder="link" class="input" name="attels" />
                                    <label for="fname">Nobraukums</label>
                                    <input class="input"name="nobraukums" type="number" min="1" max="10000000">
                                    <label for="fname">Cena</label>
                                    <input class="input"name="cena" type="number" min="1" max="10000000">
                                </div>
                            </div>
                        </div>
                            <button class="submit" name="submit" type="submit">Iesniegt</button>
                    </form>
                </div>
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