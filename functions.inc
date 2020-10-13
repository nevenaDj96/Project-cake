<?php

function main_menu() {
   include("db.inc");
    session_start();
    if (isset($_SESSION['id_uloge'])) {
        $id_uloge = $_SESSION['id_uloge'];
    } else {
        $id_uloge = 0;
    }
    $upit = "SELECT url, naslov, id_stavke FROM meni_stavke WHERE id_nad_stavke is null and id_uloge <= $id_uloge ORDER BY red_br";
    $rez = mysqli_query($konekcija,$upit);
    while ($red = mysqli_fetch_array($rez)) {
        $url = $red['url'];
        $naslov = $red['naslov'];
        echo "<li><a href='$url'>$naslov</a>";

        $id_stavke = $red['id_stavke'];
        $upit2 = "SELECT `url`, `naslov` FROM `meni_stavke` WHERE id_nad_stavke = $id_stavke and `id_uloge` <= $id_uloge ORDER BY red_br";
        $rez2 = mysqli_query($konekcija,$upit2);
        $num = mysqli_num_rows($rez2);
        if ($num > 0) {
            echo '<ul>';
        }
        while ($red2 = mysqli_fetch_array($rez2)) {
            $url2 = $red2['url'];
            $naslov2 = $red2['naslov'];
            echo "<li><a href='$url2'>$naslov2</a></li>";
        }
        if ($num > 0) {
            echo '</ul>';
        }
        echo '</li>';
    }
}

function footer_menu() {
    include("db.inc");
    //session_start();
    if (isset($_SESSION['id_uloge'])) {
        $id_uloge = $_SESSION['id_uloge'];
    } else {
        $id_uloge = 0;
    }
    $upit = "SELECT `url`, `naslov` FROM `meni_stavke` WHERE `id_uloge` <= $id_uloge";
    $rez = mysqli_query($konekcija,$upit);
    while ($red = mysqli_fetch_array($rez)) {
        $url = $red['url'];
        $naslov = $red['naslov'];
        echo "<li><a href='$url'>$naslov</a></li>";
    }
}

?>