<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | O nama</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="Author" content="Nevena Đaković" /> 
        <meta http-equiv="Content-Language" content="sr" /> 
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="shortcut icon" href="slike/source/favicon.ico" />
        <script src="js/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
        <div id="omotac">
            <div id="header">
                <div id="naslovna_slika">
                    <a href="index.php" alt="Logo" title="Nazad Na Pocetnu"><img src="slike/source/logo.jpg" /></a>

                </div>
                <div id="odgovor">
                    <p></p>
                </div>
                <div id="nav" class="meni">
                    <ul id="menu">
                        <?php
                        include_once './functions.inc';
                        main_menu();
                        ?>
                    </ul>
                </div>
            </div>

            <!-- HEADER KRAJ -->

            <div id="contents">

                <div id="sadrzaj">
                    <img src="slike/source/onama_cupcake.jpg" class="levo"/>
                    <h1>NAŠA PRICA</h1>
                    <h2>O Poslasticarnici </h2>
                    <p>Današnji kupac sve manje ima vremena da se bavi odredjenim poslovima. Zbog velikih obaveza na poslu, sve je manje slobodnog vremena. Iz tog razloga, kupci ce sve više želeti da utroše svoje vreme na najefikasnij nacin. Kupovina svih njegovih potreba pod jednim krovom, je koncept koji rešava njegove probleme.</p>
                    <span class="dalje">
                        <p>Prepoznajemo tu priliku i želimo da doprinesemo tom konceptu.

                            Nasa poslasticarnica kupcu nudi oazu mira, gde ce uz torte, kolace i kafu ili sok moci da odmori i prikupi snagu ili jednostavno da se opusti. Na drugoj strani Mi nudimo svojim kupcima kolace i manje torte za poneti (torte od kilogram ili dva). Bilo koja nenajavljena poseta Vama više ne predstavlja problem. Rodjendanske torte koje mogu da predstave bilo kojeg poznatog junaka, a da pri tom sadržaj nije mekani mus vec prave torte, oduševljavaju sve naše najmladje klijente!</p>
                    </span>
                </div>
            </div>
            <div id="navfooter">
                <ul>
                    <?php
                    footer_menu();
                    ?>
                </ul>
            </div>
            <!-- CONTENTS KRAJ --->

            <div id="footer">
                <p>Designed by Nevena Đaković, &nbsp&nbsp&nbsp <a href="dokumentacija.pdf">Dokumentacija</a></p>
                <div class="social">
                    <a href="https://www.facebook.com/" target="_blank"><img src="slike/source/facebook.png" class="facebook" width="50px" height="50px" alt="facebook" /></a>
                    <a href="http://www.youtube.com/" target="_blank"><img src="slike/source/youtube.png" class="youtube" width="50px" height="50px" alt="youtube" /></a>
                    <a href="https://twitter.com/" target="_blank"><img src="slike/source/twitter.png" class="twitter" width="50px" height="50px" alt="twitter"/></a>
                    <a href="rss.xml" target="_blank" ><img class="facebook" width="50px" height="50px" src="slike/source/rss_ikona.png"/></a>
                </div>
                <img src="slike/source/arrow_up.jpg" alt="povratak na vrh strane" class="skrolovanje" title="Vrh strane"/>
            </div>
        </div>
    </body>
</html> 