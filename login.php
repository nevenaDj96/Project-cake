<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | Login</title>
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


                    <h2 class="kontaktHeder">Ulogujte se na naš sajt!</h2>


                    <img src="slike/source/kontakt_cupcake.jpg" class="levo"/>

                    <?php
                    if (!isset($_SESSION['id_korisnika'])) {
                        ?>

                        <div class="login">
                            <form onsubmit="return login();" name="formular" method="POST" >
                                <tr>
                                    <td>Korisničko ime:</td>
                                    <td><input class="forma_tekst" type="text" size="25" id="Username" name="Username" /></td><br/>
                                </tr><br/>
                                <tr>
                                    <td>Lozinka:</td>
                                    <td><input class="forma_tekst" type="password" size="25" id="Password" name="Password" /></td><br/>
                                </tr><br/>
                                <tr>
                                    <td><input  type="submit" id="btnSubmit" name="btnSubmit" class="button" value="Log in" ></td>
                                </tr>
                            </form>


                            <?php
                            if (isset($_POST['btnSubmit'])) {
                              include("db.inc");
                                $Username = $_POST['Username'];
                                $Password = $_POST['Password'];
                                $upit = "SELECT `id_korisnika`, `id_uloge` FROM `korisnici` WHERE `kor_ime` = '$Username' AND `lozinka` = '$Password'";
                                $rez = mysqli_query($konekcija,$upit);

                                if ($red = mysqli_fetch_array($rez)) {
                                    $id_korisnika = $red['id_korisnika'];
                                    $_SESSION['id_korisnika'] = $id_korisnika;
                                    $id_uloge = $red['id_uloge'];
                                    $_SESSION['id_uloge'] = $id_uloge;
                                    if ($id_uloge == 2) { // admin
                                        header("Location: admin_panel.php");
                                    } else {
                                        echo '<br>Uspešno logovanje.<br>';
                                        header("Location: login.php");
                                    }
                                } else {
                                    echo '<br>Neuspešno logovanje.<br>';
                                }
                            }
                        } else {
                            if (isset($_POST['btnLogout'])) {
                                session_destroy();
                                header("Location: index.php");
                            }
                            ?>
                            <form name="form_logout" method="POST" >
                                <tr>
                                    <td><input type="submit" id="btnLogout" name="btnLogout" class="button" value="Log out" style="margin: 100px" ></td>
                                </tr>
                            </form>
                            <?php
                        }
                        ?>

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