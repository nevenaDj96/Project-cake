<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | Anketa</title>
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
                    <img src="slike/source/anketa_cupcake.jpg" class="levo" width="430px" height="560px"/>

                    <h1>Tvoj izbor kolača?</h1>

                    <?php
                    if (isset($_POST['btnSubmit'])) {
      					include("db.inc");
                        $rbAnketa = $_POST['rbAnketa'];
                        $upit = "INSERT INTO `anketa_rezultati`(odabrana_opcija) VALUES ('$rbAnketa')";
                        $rez = mysqli_query($konekcija,$upit);

                        if ($rez == true) {
                            echo 'Hvala sto ste popunili anketu.';
                        } else {
                            $greska = mysqli_error();
                            echo 'Greska: ' . $greska;
                        }
                    }
                    ?>

                    <form onsubmit="return anketa();" name="formular" method="POST" >
                        <div class="anketa">
                            Čokoladni&nbsp&nbsp
                            <input type="radio" id="cokoladni" name="rbAnketa" value="Cokoladni" /><div id="cokoladni_c"></div> <br/>
                            Voćni&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" id="vocni" name="rbAnketa" value="Vocni" /><div id="vocni_v"></div><br/>
                            Posni&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" id="posni" name="rbAnketa" value="Posni" /><div id="posni_p"></div><br/>	<br/>
                            <input type="submit" id="btnSubmit" name="btnSubmit" class="button" value="Glasaj"  />
                        </div>
                    </form>
                </div>	

            </div>

        </div>
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