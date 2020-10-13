/*Registracija*/
function provera() {
    var ime = document.getElementById('Ime').value;
    var prezime = document.getElementById('Prezime').value;
    var korIme = document.getElementById('KorIme').value;
    var lozinka = document.getElementById('Lozinka').value;
    var m = document.formular.pol[0];
    var z = document.formular.pol[1];
    var grad = document.formular.grad.options[document.formular.grad.selectedIndex].value;
    var email = document.getElementById('email').value;
    var pol = "";

    var ispisivanje = document.getElementById('ispisivanje');

    var reIme = /^[A-Z]{1}[a-z]{2,19}$/;
    var rePrezime = /^[A-Z]{1}[a-z]{3,19}$/;
    var reKorIme = /^[a-z]{3,20}$/;
    var reLozinka = /^([a-z])+[0-9]{1}$/;
    var reEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

    var greska = new Array();
    if (!(ime.match(reIme))) {
        document.getElementById("Ime").style.border = "2px solid red";
        greska.push("Ime nije u dobrom formatu!");
    }
    if (!(prezime.match(rePrezime))) {
        document.getElementById("Prezime").style.border = "2px solid red";
        greska.push("Prezime nije u dobrom formatu!");
    }
    if (!(korIme.match(reKorIme))) {
        document.getElementById("KorIme").style.border = "2px solid red";
        greska.push("Korisničko ime mora imati između 3 i 20 slova!");
    }
    if (!(lozinka.match(reLozinka))) {
        document.getElementById("Lozinka").style.border = "2px solid red";
        greska.push("Lozinka mora da sadrži jedan broj!");
    }

    if (!(m.checked || z.checked)) {
        m.style.border = "2px solid red";
        z.style.border = "2px solid red";
        greska.push("Izaberite pol!");
    }
    else {
        if (m.checked)
            pol = "muski"
        else
            pol = "zenski";
    }
    if (document.formular.grad.selectedIndex == "0") {
        document.formular.grad.style.border = "2px solid red";
        greska.push("Izaberite grad!");
    }
    if (!(email.match(reEmail))) {
        document.getElementById("email").style.border = "2px solid red";
        greska.push("E-mail nije u dobrom formatu!");
    }

    var poruka = "Ime: " + ime + " Prezime: " + prezime + " Lozinka: " + lozinka + " Pol: " + pol + " Grad: " + grad +
            " E-mail: " + email;

    if (greska.length > 0) {
        var greskeLista = "POGRESAN UNOS\n\n";
        for (var i = 0; i < greska.length; i++) {
            greskeLista += greska[i] + "\n ";
        }
        alert(greskeLista);
        return false;
    } else {

        var ntext = document.createTextNode(poruka);
        ispisivanje.appendChild(ntext);
        var nspace = document.createElement("br");
        ispisivanje.appendChild(nspace);
        ispisivanje.appendChild(nspace);
        ispisivanje.style.display = "block";

        return true;
    }
}


/* ANKETA */

function setCookie(c_name, value, exdays)
{
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    }
    else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;
}

function anketa() {
    var ukupno = 0;
    if (document.getElementById("cokoladni").checked) {
        var broj = getCookie("cokoladni");
        broj++;
        setCookie("cokoladni", broj, 30);
        document.getElementById("cokoladni_c").innerHTML = getCookie("cokoladni");
        ukupno++;
    }
    if (document.getElementById("vocni").checked) {
        var broj = getCookie("vocni");
        broj++;
        setCookie("vocni", broj, 30);
        document.getElementById("vocni_v").innerHTML = getCookie("vocni");
        ukupno++;
    }
    if (document.getElementById("posni").checked) {
        var broj = getCookie("posni");
        broj++;
        setCookie("posni", broj, 30);
        document.getElementById("posni_p").innerHTML = getCookie("posni");
        ukupno++;
    }
    if (ukupno == 1)
        return true;
    else
    {
        alert("Morate odbrati jednu ponuđenu opciju.");
        return false;
    }
}

function postaviankete() {
    document.getElementById("cokoladni_c").innerHTML = getCookie("cokoladni");
    document.getElementById("vocni_v").innerHTML = getCookie("vocni");
    document.getElementById("posni_p").innerHTML = getCookie("posni");
}

/* PRETRAGA */
function pretraga() {
    var rec = document.getElementById("pretrazi").value.toUpperCase();
    var Odgovor = document.getElementById("odgovor");
    if (rec == "") {
        odgovor.innerHTML = "Niste uneli ništa za pretragu!";
    }
    else {
        if (window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "cenovnik.xml", false);
        xmlhttp.send();
        xmlDoc = xmlhttp.responseXML;



        var rezultat = "";
        var svi_kolaci = xmlDoc.getElementsByTagName("kolac");
        for (var i = 0; i < svi_kolaci.length; i++) {




            var kolac_naziv = xmlDoc.getElementsByTagName("kolac")[i].getElementsByTagName("naziv")[0].childNodes[0].nodeValue.toUpperCase();

            if (kolac_naziv.toUpperCase().indexOf(rec) >= 0) {
                rezultat += "Naziv kolača: " + xmlDoc.getElementsByTagName("kolac")[i].getElementsByTagName("naziv")[0].childNodes[0].nodeValue + "</br>Količina: " + svi_kolaci[i].getElementsByTagName("kolicina")[0].childNodes[0].nodeValue + "</br>Cena: " + svi_kolaci[i].getElementsByTagName("cena")[0].childNodes[0].nodeValue + "</br>Opis: " + svi_kolaci[i].getElementsByTagName("opis")[0].childNodes[0].nodeValue;
                break;
            }
            else {
                rezultat = "";
            }
        }

        if (rezultat == "") {
            Odgovor.innerHTML = "Kolač nije pronadjen, pokušajte ponovo!";
        }
        else {
            Odgovor.innerHTML = rezultat;
        }
    }

}





/*PADAJUCI MENI*/

$(document).ready(function () {
    $('.meni ul li ul').css({
        display: "none",
        left: "auto"
    });
    $('.meni ul li ').hover(function () {
        $(this)
                .find('ul')
                .stop(true, true)
                .slideDown('fast');
    }, function () {
        $(this)
                .find('ul')
                .stop(true, true)
                .fadeOut('fast');
    });
});


/*ANIMACIJE*/

$(document).ready(function () {
    $('.dalje').hide();
    $('<input type="button" class="nastavi" value="Prikaži više"/>').insertBefore('.dalje');
    $('.nastavi').click(function () {
        $(this).hide();
        $(this).next().fadeIn(2000);
    });
});

$(document).ready(function () {
    $('.dalje1').hide();
    $('<input type="button" class="nastavi1" value="Prikaži više"/>').insertBefore('.dalje1');
    $('.nastavi1').click(function () {
        $(this).hide();
        $(this).next().fadeIn(2000);
    });
});


$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.skrolovanje').fadeIn();
        } else {
            $('.skrolovanje').fadeOut();
        }
    });

    $('.skrolovanje').click(function () {
        $("html, body").animate({scrollTop: 0}, 500);
        return false;
    });

});

$(document).ready(function () {
    $('#odgovor').hide();
    $('.txttab').click(function () {
        $('#odgovor').show('slow');
    });
    $('#odgovor').click(function () {
        $(this).hide('slow');
    })
});


/*KONTAKT*/

function kontakt() {
    var greske = new Array();
    var por = document.getElementById("taPoruka").value;

    if (por == "") {
        document.getElementById("porukagreska").innerHTML = "Napišite tekst koji želite da pošaljete!";
        document.getElementById("taPoruka").style.border = "2px solid red";
    } else {
        document.getElementById("taPoruka").style.border = "2px solid blue";
        document.getElementById("porukagreska").innerHTML = "";
    }
    document.kontakt.submit();
}

function ponisti() {

    document.getElementById("taPoruka").style.border = "";
    document.getElementById("porukagreska").innerHTML = "";

}

/* LOGIN */
function login()
{
    var username = document.getElementById('Username');
    var password = document.getElementById('Password');

    var re_username = /^[a-z]{2,}$/;
    var re_password = /^([a-z])+[0-9]{1}$/;
    var greske = new Array();
    var sadrzaj = new Array();

    if (!username.value.match(re_username))
    {
        document.getElementById("Username").style.border = "2px solid red";
        greske.push("Unesite ispravno vaše korisničko ime!");
    }
    else
    {
        document.getElementById("Username").style.border = "2px solid green";
        sadrzaj.push(username.value);
    }

    if (!password.value.match(re_password))
    {
        document.getElementById("Password").style.border = "2px solid red";
        greske.push("Lozinka mora da sadrži jedan broj!");
    }
    else
    {
        document.getElementById("Password").style.border = "2px solid green";
        sadrzaj.push(password.value);
    }

    if (greske.length > 0)
    {
        var listaGresaka = "POGRESAN UNOS \n\n";
        for (var i = 0; i < greske.length; i++)
        {
            listaGresaka += greske[i] + "\n";
        }
        alert(listaGresaka)
        return false;
    }
    else
        return true;

    if (username.value != "" && password.value != "")
    {
        alert('Uspesno ste se logovali!');
        document.getElementById('Username').innerHTMl = "";
        document.getElementById('Password').innerHTML = "";
    }
}