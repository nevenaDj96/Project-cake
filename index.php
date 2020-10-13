<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<?php
include("db.inc");
?>
    <head>
        <title>Poslasticarnica | Pocetna</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="Author" content="Nevena Đaković" /> 
        <meta http-equiv="Content-Language" content="sr" /> 
        <link rel="shortcut icon" href="slike/source/favicon.ico" />
        <!--script-->
        <script src="js.js" type="text/javascript" charset="utf-8"></script>
        <!-- css -->
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="slajder/style.css"  type="text/css"/>
        <!-- jquery -->
        <script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

        <!--slajder-->
        <script src="slajder/script.js"></script>
        <script src="slajder/slajder1.js"></script>
    </head>
    <body>

        <div id="omotac">
            <div id="header">
                <div id="naslovna_slika" class="he">
                    <a href="index.php" alt="Logo" title="Nazad Na Pocetnu"><img src="slike/source/logo.jpg" /></a>

                    <div id="sreach" >
                        <form  id="sreach1" > 
                            <input type="text" id="pretrazi" placeholder="Unesite ime kolača.." />
                        </form>
                        <div class="sreachtab">
                            <input type="button" class="txttab" value="Search" onClick="pretraga();"></input> 
                        </div>
                    </div>
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

            <!-- HEADER KRAJ --->

            <div id="contents">


                <div id="slajder1-sadrzaj1">
                    <div class="slajder_slike"><ul>
                            <?php
                       
                            $upit = "SELECT `url_slike` FROM `slike` WHERE  `mesto` = 'slide' ORDER BY `red_br`";
                            $rez = mysqli_query($konekcija,$upit);
                            $br = 1;
                            while ($red = mysqli_fetch_array($rez)) {
                                $slika = $red['url_slike'];
                                echo "<li><img src='slike/slide/$slika' title='slider$br' id='sl$br'/></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="slajder_kruzici">
                        <div>
                            <?php
                   
                            $upit = "SELECT `url_male_slike` FROM `slike` WHERE  `mesto` = 'slide' ORDER BY `red_br`";
                            $rez = mysqli_query($konekcija,$upit);
                            while ($red = mysqli_fetch_array($rez)) {
                                $slika = $red['url_male_slike'];
                                echo "<a title='slider0'><span><img src='slike/slide/$slika'/></a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>	

                <img class="zvezdice_donje" src="slike/source/zvezdice_gornje.png"/>
                <h2 class="headerNaPocetnoj">O Poslasticarnici </h2><br/>
                <p class="paragrafNaPocetnoj">Današnji kupac sve manje ima vremena da se bavi odredjenim poslovima. Zbog velikih obaveza na poslu, sve je manje slobodnog vremena. Iz tog razloga, kupci ce sve više želeti da utroše svoje vreme na najefikasnij nacin. Kupovina svih njegovih potreba pod jednim krovom, je koncept koji rešav... <a href="onama.php">nastavi o nama</a></p>

                <a href="tajne.php"><div class="linkSaPozadinom1"><p>Ostali prave kolace, mi pravimo nešto mnogo više od toga, nešto što ce vas uvek uciniti srecnim!<br/> Pogledajte kakva se <strong><em>tajna</em></strong> krije u našim kolacima.</p></div></a>
                <a href="cenovnik.php"><div class="linkSaPozadinom2"><p>Poznati smo po kolacima najboljeg ukusa, ali i po najpristupacnijoj ceni.<br/>Ovde možete videti <strong><em>cene</em></strong> vasih omiljenih kolaca.</p></div></a>
                <a href="kontakt.php"><div class="linkSaPozadinom3"><p>Poručite najlepše kolače.<br/>Današnji kupac sve manje ima vremena. <strong><em>Porucite</em></strong> putem telefona ili email-om, i mi vam dostavljamo u najkracem mogucem roku!</p></div></a>

                <img class="zvezdice_donje" src="slike/source/zvezdice_donje.png"/>

                <div id="navfooter">
                    <ul>
                        <?php
                        footer_menu();
                        ?>
                    </ul>
                </div>
                <div style="clear:both"></div>
                <script type="text/javascript" src="slajder/slajder1.js"></script>
                <script type="text/javascript" src="slajder/script.js"></script>
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
        <script src="js.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html> 