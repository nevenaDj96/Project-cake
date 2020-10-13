<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Poslasticarnica | Registracija</title>
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
                    <h1 class="heder1">Registracija</h1><br/>

                    <?php
					
					
					
                    if (isset($_POST['unos'])) {
                       include("db.inc");
                        $korIme = $_POST['KorIme'];
                        $lozinka = $_POST['Lozinka'];
                        $ime = $_POST['Ime'];
                        $prezime = $_POST['Prezime'];
                        $pol = $_POST['pol'];
                        $grad = $_POST['grad'];
                        $email = $_POST['email'];
						
					$reg_ime="/^[A-Z][a-z]{1,14}$/";
					$reg_mail="/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/";
					$reg_username="/^[a-z0-9\_]+$/";
					$reg_password="/[^\/.,<>:;*?A-Z]$/";
					
					$greske=array();
					
					
					if(!preg_match($reg_ime,$ime)){
						$greske[]="Niste lepo napisali ime !!";
					}
					if(!preg_match($reg_ime,$prezime)){
						$greske[]="Niste lepo napisali prezime!!";
					}
					if(!preg_match($reg_mail,$email)){
						$greske[]="E-mail adresa nije napisana u ispravnom formatu !!";
					}
					if(!preg_match($reg_username,$korIme)){
						$greske[]="Za username se mogu koristiti samo mala slova, brojevi i _ !!!";
					}
					if(!preg_match($reg_password,$lozinka)){
						$greske[]="Za lozinku se mogu koristiti samo mala slova i brojevi !!";
					}
					if(count($greske)>0){
						print "<ul style='color:red;'>";
					        foreach($greske as $greska){
							    print "<li>".$greska."</li>";
							}
							print "</ul>";
					}
					else{
						
                        $upit = "INSERT INTO `korisnici`(`kor_ime`, `lozinka`, `ime`, `prezime`, `pol`, `grad`, `email`)"
                                . " VALUES ('$korIme','$lozinka','$ime','$prezime','$pol','$grad','$email')";
                        $rez = mysqli_query($konekcija,$upit);

                        if ($rez == true)
                            echo 'Uspesno ste se registrovali.';
                        else {
                            $greska = mysqli_error();
                            if ($greska == "Duplicate entry 'c' for key 'PRIMARY'") {
                                echo 'Trazeni username je vec zauzet.';
                            } else {
                                echo 'Greska: ' . $greska;
                            }
                        }
                    }
					}
                    ?>

                    <div id="tabela3">
                        <form autocomplete="off" onsubmit="return provera();" name="formular" method="POST" >
                            <table id="tbform">
                                <tr>
                                    <td class="naziv">Ime:</td>
                                    <td><input type="text" class="text-box" id="Ime" name="Ime" maxlength="20" /></td>
                                </tr>
                                <tr>
                                    <td class="naziv">Prezime:</td>
                                    <td><input type="text" class="text-box" id="Prezime" name="Prezime" maxlength="20" /></td>
                                </tr>
                                <tr>
                                    <td class="naziv">Korisničko ime:</td>
                                    <td><input type="text" class="text-box" id="KorIme" name="KorIme" maxlength="20" /></td>
                                </tr>
                                <tr>
                                    <td class="naziv">Lozinka:</td>
                                    <td><input type="password" class="text-box" id="Lozinka" name="Lozinka" maxlength="20" /></td>
                                </tr>
                                <tr>
                                    <td>Izaberite pol: </td>
                                    <td>M:<input type="radio" name="pol" id="M" value="M"/> Z:<input type="radio" name="pol" id="Z" value="Z"/></td>
                                </tr>
                                <tr>
                                    <td> Izaberite grad:  </td>
                                    <td>
                                        <select name="grad" id="grad">
                                            <option value="0">Izaberite grad...</option>
                                            <option value="Beograd">Beograd</option>
                                            <option value="Čačak">Čačak</option>
                                            <option value="Kragujevac">Kragujevac</option>
                                            <option value="Novi Sad">Novi Sad</option>
                                            <option value="Leskovac">Leskovac</option>
                                            <option value="Niš">Niš</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Email:  </td>
                                    <td><input type="text" name="email" id="email"/></td>
                                </tr>

                        </form>
                        <tr>
                            <td><input type="submit" name="unos" value="Registruj se"  id="dugme" ></td>
                            <td><input type="reset" name="ponisti" value="Poništi"  id="ponisti" onClick="location.reload()"/></td>
                        </tr>

                        </table>
                        <div id="ispisivanje"></div> 
                    </div>			
                </div>
            </div>
            <div class="clear"></div>
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