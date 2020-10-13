<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | Cenovnik</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="Author" content="Nevena Đaković" /> 
        <meta http-equiv="Content-Language" content="sr" /> 
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="shortcut icon" href="slike/source/favicon.ico" />
        <script src="js/jquery-1.4.min.js"></script>
        <script src="js/jquery-1.11.0.min.js"></script>
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

                    <h1 class="heder1">CENOVNIK</h1>
                    <form class="cen">
                        <table>

                            <script>
                                if (window.XMLHttpRequest) {
                                    xmlhttp = new XMLHttpRequest();
                                }
                                else {
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.open("GET", "cenovnik.xml", false);
                                xmlhttp.send();
                                xmlDoc = xmlhttp.responseXML;
                                document.write("<table border='1'><thead><th>Naziv</th><th>Kolicina</th><th>Cena </th><th>Opis</th></thead>");
                                var x = xmlDoc.getElementsByTagName("kolac");
                                for (i = 0; i < x.length; i++) {
                                    document.write("<tr align='center'><td>");
                                    document.write(x[i].getElementsByTagName("naziv")[0].childNodes[0].nodeValue);
                                    document.write("</td><td>");
                                    document.write(x[i].getElementsByTagName("kolicina")[0].childNodes[0].nodeValue);
                                    document.write("</td><td>");
                                    document.write(x[i].getElementsByTagName("cena")[0].childNodes[0].nodeValue);
                                    document.write("</td><td>");
                                    document.write(x[i].getElementsByTagName("opis")[0].childNodes[0].nodeValue);
                                    document.write("</td></tr>");
                                }
                                document.write("</table>");
                            </script>
                        </table>
                    </form>
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