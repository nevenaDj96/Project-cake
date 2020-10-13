<?php
$korisnik='root';
$lozinka='';
$host='localhost';
$konekcija=mysqli_connect($host,$korisnik,$lozinka) or die('Veza sa bazom nije uspostavljena'.mysql_error());
$baza=mysqli_select_db($konekcija,'ict_jd') or die ('Baza nije odabrana'.mysql_error());
?>