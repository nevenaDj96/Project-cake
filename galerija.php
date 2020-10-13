<!DOCTYPE html PUBLIC ">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | Galerija</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="Author" content="Nevena Đaković" /> 
        <meta http-equiv="Content-Language" content="sr" /> 
        <link rel="shortcut icon" href="slike/source/favicon.ico" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/lightbox.css" type="text/css"/>
        <script src="js/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/lightbox.min.js" type="text/javascript" charset="utf-8"></script>
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
                    <div class="container">
                        <h3 class="gal">Galerija kolača</h3>
                        <div class="image-row">
                            <div class="image-set">

                                <?php
								
								if(isset($_GET['start']))
	{
		$start=$_GET['start'];
	}
	else
	{
		$start=0;
	}
								
                               include("db.inc");
							   $upit1 = "select * from slike";
							   $rez1 = mysqli_query($konekcija,$upit1);
							   $broj_zapisa=mysqli_num_rows($rez1);
	$stranicenje=4;
                                $upit = "SELECT `url_slike`, `url_male_slike` FROM `slike` WHERE `mesto` = 'galerija' ORDER BY `red_br`";
                                $rez = mysqli_query($konekcija,$upit);
                                while ($red = mysqli_fetch_array($rez)) {
                                    $slika = $red['url_slike'];
                                    $mala = $red['url_male_slike'];
                                    echo "<a href='slike/galerija/$slika' data-lightbox='example-set' ><img src='slike/galerija/$mala'></a>";
                                }
								
								echo ("</ul>");
	echo ("<div style='position:relative;width:100%;float:left;'>");
	if($start!=0){
	 $nstart = $start - $stranicenje;
	 echo " <a href=\"index.php?page=galerija&start=$nstart\" style='float:left;color:#ccc;display:inline;'>Prethodna</a> ";
	}
	if($start<($broj_zapisa-$stranicenje)){
	 $nstart = $start + $stranicenje;
	 echo "  <a href=\"index.php?page=galerija&start=$nstart\" style='color:#ccc;float:right;display:inline;'>Sledeca</a>";
	}
	echo ("</div>");
	echo ("</div>");
                                ?>
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