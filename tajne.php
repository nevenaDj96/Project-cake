<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | O Kolacima</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="Author" content="Nevena Đaković" /> 
        <meta http-equiv="Content-Language" content="sr" /> 
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="shortcut icon" href="slike/source/favicon.ico" />
        <script src="js.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8" ></script>

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

                    <img src="slike/source/tajne_cupcake.jpg" class="levo"/>
                    <h1>NAŠA TAJNA</h1>
                    <h2>Recepti starih majstora</h2>
                    <p>Cupcakes-i su definitivno najzdraviji kolaci, prije svega zato što ne sadrže šecer. Prave se od suhog i koštunjavog voca i samim tim su potpuno prirodni i preporucljivi gotovo svima. Jako su preporucljivi za djecu, osobe na raznim dijetama (npr. mogu se jesti na vocni dan UN dijete), dugo mogu stajati u frižideru i odlicni su za izlete i putovanja...
                        Nugati se vrlo jednostavno prave: jednake kolicine suhog i koštunjavog voca se samelju u blenderu ili na mašinu za orahe, izmijese u glatko tijesto i oblikuju u kuglice ili kalupima za keks u oblike tipa srca, krugova, medvjedica i tako dalje.</p>
                    <span class="dalje1">
                        <p>Pored toga moguce je koristiti bilo koje koštunjavo i bilo koje suho voce-brusnice, suhe marelice, suhe jagode, brazilske i indijske orahe...
                            U smjesu se može iscijediti sok od narandže, a sa istom se mogu puniti i tufahije, ali o tome drugi put. Smjesa razrijedjena sa vodom se može koristiti kao premaz za palacinke bez šecera, za kolace i slicno.
                            Ako se sastojci melju na obicnu mašinu za orahe, prvo se melje suho, pa onda koštunjavo voce. </p>
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
                <p>Designed by Nevena Đakovic, &nbsp&nbsp&nbsp <a href="dokumentacija.pdf">Dokumentacija</a></p>
                <div class="social">
                    <a href="https://www.facebook.com/" target="_blank"><img src="slike/source/facebook.png" class="facebook" width="50px" height="50px" alt="facebook" /></a>
                    <a href="http://www.youtube.com/" target="_blank"><img src="slike/source/youtube.png" class="youtube" width="50px" height="50px" alt="youtube" /></a>
                    <a href="https://twitter.com/" target="_blank"><img src="slike/source/twitter.png" class="twitter" width="50px" height="50px" alt="twitter"/></a>
                    <img src="slike/source/arrow_up.jpg" alt="povratak na vrh strane" class="skrolovanje" title="Vrh strane"/>
                    <a href="rss.xml" target="_blank" ><img class="facebook" width="50px" height="50px" src="slike/source/rss_ikona.png"/></a>
                </div>
            </div>
        </div>
        <script src="js.js" type="text/javascript" charset="utf-8"></script>

    </body>
</html> 