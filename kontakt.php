<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | Kontakt</title>
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
                    <h2 class="kontaktHeader"> Posetite nas, ili nam pišite!</h2>
                    <img src="slike/source/kontakt_cupcake.jpg" class="levo"/>
                    <a href="http://goo.gl/maps/rKCh4" target="_blank"><img src="slike/source/mapa.jpg" class="desno"/></a>

                    <form class="kontakt" style="margin: 30px"  method="post" name="contactform" id="contFrm" action="mailto:poslasticarnica@blabla.com">
                        <table class="conc">
                            <tr><td>
                                    <h4>Postavite pitanje:</h4>
                            </tr></td>
                            <tr>
                                <td>
                                    <select name="kat" id="kat">
                                        <option>Razno</option>
                                        <option>Primedba</option>
                                        <option>Predlog za poslovnu saradnju</option>
                                    </select>
                                    <div id="katgreska"></div></td>
                            </tr>
                            <tr>
                                <td><textarea col="30" rows="3" class="box"  name='taPoruka'id="taPoruka" placeholder="Napišite poruku.." ></textarea>
                                    <div id="porukagreska"></div></td>
                            </tr>
                            <tr>
                                <td> 
                                    <input type="button" name="btnPosalji" id="btnPosalji" value="Pošalji" class="button"/>
                                    <input type="reset" value="Poništi" class="button" onClick="ponisti();"/>
                                </td>
                            </tr>
                        </table>
						<?php
						include('db.inc');
						if (isset($_request['btnPosalji']))
						{
							$text = $_request['taPoruka'];
							$kat = $_request['kat'];
							$upitpor = "Insert into 'poruke'('id_poruke', 'kategorija','tekst','id_korisnika') VALUES ('','".$kat."','".$text."',2);";
							$rezpor = mysqli_query($konekcija,$upitpor);
							
							
						}
						?>
                    </form> 
                    <div style="clear:both"></div>
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