<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("db.inc");
?>
    <head>
        <title>Poslasticarnica | O meni</title>
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
                    <div id="admin_korisnici" style="margin: 20px">
                        <h3>Korisnici</h3>
                        <br>
                            <table border="1">
                                <tr>
                                    <th>Red br</th>
                                    <th width="150">Brisanje</th>
                                    <th width="150">Kor. ime</th>
                                    <th width="150">Ime</th>
                                    <th width="150">Prezime</th>
                                    <th width="250">E-mail</th>
                                </tr>
                                <?php
                            
                                if ($_SESSION['id_uloge'] != 2) {
                                    header("Location: index.php");
                                }

                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $upit = "DELETE FROM `korisnici` WHERE `id_korisnika` = " . $id;
                                    $rez = mysqli_query($konekcija,$upit);
                                }

                                $upit = "select * from korisnici";
                                $rez = mysqli_query($konekcija,$upit);
                                $br = 1;
                                while ($red = mysqli_fetch_array($rez)) {
                                    $id = $red['id_korisnika'];
                                    $kor_ime = $red['kor_ime'];
                                    $ime = $red['ime'];
                                    $prezime = $red['prezime'];
                                    $email = $red['email'];
                                    echo "<tr>" .
                                    "<td>$br</td>" .
                                    "<td><a href='admin_panel.php?id=$id'>Obriši</a></td>" .
                                    "<td>" . $red['kor_ime'] . "</td>" .
                                    "<td>" . $red['ime'] . "</td>" .
                                    "<td>" . $red['prezime'] . "</td>" .
                                    "<td>" . $red['email'] . "</td>" .
                                    "</tr>";
                                    $br++;
                                }
                                ?>
                            </table>

                    </div>
                    <div id="admin_anketa" style="margin: 20px">
                        <h3>Rezultati ankete</h3>
                        <br>
                            <table border="1">
                                <tr>
                                    <th>Red br</th>
                                    <th width="250">Opcija</th>
                                    <th width="150">Broj</th>
                                </tr>
                                <?php
                                $upit = "SELECT `odabrana_opcija`, count(*) as broj FROM `anketa_rezultati` GROUP BY `odabrana_opcija` ORDER BY 2 DESC";
                                $rez = mysqli_query($konekcija,$upit);
                                $br = 1;
                                while ($red = mysqli_fetch_array($rez)) {
                                    echo "<tr>" .
                                    "<td>$br</td>" .
                                    "<td>" . $red['odabrana_opcija'] . "</td>" .
                                    "<td>" . $red['broj'] . "</td>" .
                                    "</tr>";
                                    $br++;
                                }

                                mysqli_close($konekcija);
                                ?>
                            </table>
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