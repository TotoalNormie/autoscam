<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Auto Scam</title>
</head>
<body>
    <div class="site-layout">
        <div class="menu">
            <div class="content-vertical">
                <button id="close-menu" onclick="closeMenu()">&#171;</button>
                <div class="logo">
                    <a href="index.html" class="logo">
                        <img src="images/logo.png" alt="logo">
                    </a>
                    <h1>Autoscam.lv</h1>
                    <span>"Buy High, Sell Cheap"</span>
                </div>
                <button id="forYou" onclick="info()"><h3>&#5167; Par mums</h3></button>
                <div class="info">
                    <p>Mūsu saite ir tieši priekš cilvēkiem, kuri grib atrast savu sapņu auto.</p>
                    <p>Šeit tu varēsi atrast visas mašīnas no "a" līdz "z" ar cenu zemāku par jebkuru citu saiti (nevajag to pārbaudīt).</p>
                    <p>Lieto mūsu filtrus un atrod tieši to, ko tu meklē.</p>
                    <p>Vari pievienot pats savu sludinājumu.</p>
                    <p>Vari lietot šo saiti uz savas mobīlās ierīces.</p>
                    <a href="tos.html">Terms of service.</a>
                </div>
                <form method="get" class="filter" id="main-form">
                    <h3>Filtri</h3>
                    <details>
                        <summary>Marka</summary>
                        <p>
                            <input type="checkbox" name="Audi" id="">
                            <label for="Audi">Audi</label> 
                        </p>
                        <p>
                            <input type="checkbox" name="BMW" id="">
                            <label for="BMW">BMW</label> 
                        </p>
                        <p>
                            <input type="checkbox" name="Mazda" id="">
                            <label for="Mazda">Mazda</label>
                        </p>
                        <p>
                            <input type="checkbox" name="Mercedes" id="">
                            <label for="Mercedes">Mercedes</label>
                        </p>
                        <p>
                            <input type="checkbox" name="Toyota" id="">
                            <label for="Toyota">Toyota</label>
                        </p>
                    </details>
                    <details>
                        <summary>Gads</summary>
                        <p> <input type="range" name="year" id="year-range" min="1990" max="2022" value="2022"> </p>
                        <p> <span id="year-out">2022</span>. gads </p>
                    </details>
                    <details>
                        <summary>Nobraukums</summary>
                        <input name="nobraukums" type="number" min="1" max="10000000">
                    </details>
                    <details>
                        <summary>Cena</summary>
                        <p>
                            <input type="range" name="price" id="price-range" min="0" max="100000" value="0">
                        </p>
                        <p><span id="price-out">0</span>€</p>
                    </details>
                    <button type="submit">Apstiprināt izvēli</button>
                </form>
                <div class="links">
                    <a id="otherSite" href="addCar.html">Pievienot Sludinājumu</a>
                </div>
            </div>
        </div>
        <div class="header">
            <button id="show-menu" onclick="showMenu()">☰</button>
            <div class="search">
                <input type="text" placeholder="Meklēt" class="search" form="main-form">
                <button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <main>
            <div class="layout">
                <h2><label for="layout">Lineārs izkārtojums: </label><input type="checkbox" name="layout" id="mode-change" onclick="line()"></h2>
            </div>
            <div class="post-container">
                <a href="#" class="post">
                    <div class="image">
                        <span class="image-text">Pārdodu 1998 gada Nissan Silvia S14. Automašīna ir perfektā stāvoklī ar mazu nobraukumu. Ir izieta tehniskā apskate. Automašīnai ir bijuši 3 īpašnieki. Nesen ir nomainīta eļļa, bremzes un dzesēšanas šķidrums. Bez kaulēšanās, zemāk par $35000 nepārdošu.</span>
                    </div>
                    <div class="post-text">
                        <h2>Nissan Silvia</h2>
                        <div class="year">Ražošanas gads: <span class="spces">1998</span> </div>
                        <div class="tilpums">Dzinējs tilpums: <span class="spces">2.0</span> </div>
                        <div class="num">Nobrauciens: <span class="spces">125000km</span> </div>
                        <div class="price" ><span class="money">$35000</span> </div>
                    </div>
                </a>
                
        </main>
    </div>
    <script>
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
        $(window).on("resize", function(){
            if($("html").width() >= 752){
                $(".menu").removeAttr("style");
                $(".content-vertical").removeAttr("style");
            }
            if($("html").width() <= 940){
                $("#mode-change").prop("checked", false);
                $(".post-container").removeAttr("style");
                $(".post").each(function(){
                    $(this).removeAttr("style");
                });
                $(".image").each(function(){
                    $(this).removeAttr("style");
                });
                $(".post-text").each(function(){
                    $(this).removeAttr("style");
                });
            }
        });
        $(document).on('input', '#price-range', function() {
            $('#price-out').html( $(this).val() );
        });
        $(document).on('input', '#year-range', function() {
            $('#year-out').html( $(this).val() );
        });
        function info() {
            $(".info").slideToggle();
        }
        function line() {
            if($("#mode-change").is(":checked")){
                $(".post-container").css("grid-template-columns", "1fr");
                $(".post").each(function(){
                    $(this).css('display', 'flex');
                    $(this).css('justify-content', 'space-between');
                });
                $(".image").each(function(){
                    $(this).css('width', 'auto');
                    $(this).css('height', '10em');
                    $(this).css('aspect-ratio', '16 / 9');
                    $(this).css('border-radius', '.8em 0 0 .8em');
                });
                $(".post-text").each(function(){
                    $(this).css('display', 'flex');
                    $(this).css('width', '100%');
                    $(this).css('justify-content', 'space-around');
                    $(this).css('align-items', 'center');
                });
            }else {
                $(".post-container").removeAttr("style");
                $(".post").each(function(){
                    $(this).removeAttr("style");
                });
                $(".image").each(function(){
                    $(this).removeAttr("style");
                });
                $(".post-text").each(function(){
                    $(this).removeAttr("style");
                });
            }
        }
        $(document).ready(line());
    </script>
</body>
</html>