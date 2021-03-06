<?php session_start();

if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Meaning of Planets</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/planets.css">
    <link rel="stylesheet" href="../css/animations.css">
</head>

<body>


<!--Header-->
<div id="header">
    <header>
        <p>AstrologyWebsite</p>
    </header>
</div>

<!--Top-Navigation-bar-->
<div id="nav">
    <nav>
        <ul>
            <!-- Planets -->
            <li class="active-wrapper"><a class="active" href="planets.php">Bolygók</a></li>

            <!-- Horoscope -->
            <li><a href="horoscope.php">Horoszkóp</a></li>

            <!-- Astrology -->
            <li><a href="index.php">Astrology</a></li>

            <?php if ($isLoggedIn) {
                echo "
                <!-- Profile -->
                <li><a href='profile.php'>Profile</a></li>
                
                <!-- Sign out -->
                <li><a href='../php/logout.php'>Sign Out</a></li>
                ";
            } else {
                echo "
                <!-- Login -->
                <li><a href='login.php'>Login</a></li>
    
                <!-- Register -->
                <li><a href='register.php'>Register</a></li>
                ";
            }
            ?>

        </ul>
    </nav>
</div>

<!--Sidebar-->
<div id="sidebar">
    <aside>
        <div>
            <table>
                <tr>
                    <!-- profile_pic -->
                    <td>
                        <?php
                        if ( $isLoggedIn) {
                            include_once '../php/FileHandler.php';

                            $username = unserialize($_SESSION['account'])["username"];

                            $profile_picture_path = FileHandler::get_profile_picture_path($username);

                            echo "<img src=$profile_picture_path alt='default_icon'>";
                        } else
                            echo "<a href='login.php'> Bejelentkezés </a> "
                        ?>

                    </td>
                </tr>
                <tr>
                    <td><?php if ($isLoggedIn) { echo "$username";} ?>
                        <hr>
                    </td>
                </tr>

                <!-- Planet -->
                <tr>
                    <td></td>
                </tr>

                <!-- Zodiac sign -->
                <tr>
                    <td></td>
                </tr>

            </table>
        </div>
    </aside>
</div>

<!--Main div-->
<div id="main">
    <main>
        <!--Tablazat-->
        <table>
            <tr>
                <th>Bolygók</th>
                <th>Tulajdonságaik</th>
            </tr>


            <tr>
                <td>
                    <h3 class="szemely">Nap</h3>
                    <img src="../images/sun.png" alt="nap">
                </td>

                <td>A fő világító égitest, Ő adja az életerőt , a személyiség 20-25%-át teszi ki, Mivel az oroszlán
                    jegyéhez
                    kapcsolható
                    , így a nap is a fensőbbséget, az irányítást, az ünnepet, a dicsőséget és más ehhez hasonló
                    szimbólumokat képvisel
                </td>


            </tr>

            <tr>

                <td>
                    <h3 class="szemely">Hold</h3>
                    <img src="../images/moon.jpg" alt="hold">
                </td>


                <td>Második legfontosabb égitest, mivel egy nagyon gyorsan halad, jellemző rá a változékonyság.
                    Hasonlóképpen
                    változnak az érzelmeink is napról napra ,óráról órára más lehet a hangulatunk, ezért főleg a hold
                    felelős.
                    Szimbólumai: Anyaság , érzelmesség, gondoskodás, alárendeltség, alkalmazkodóképesség, intuitivitás,
                    stb..

                </td>
            </tr>
            <tr>

                <td>
                    <h3 class="szemely">Merkúr</h3>
                    <img src="../images/mercury.png" alt="merkur">
                </td>
                <td>A merkúr magát a gondolkodásmódunkat , beszédmódunkat jelképezi. A merkúr mondhatni egy szemüveg,
                    amin
                    keresztül
                    a világot látjuk. Semleges bolygó tehát nincs polaritása , nemtelen. Ide tartozik: mozgás, írás,
                    gondolkodás, érzékelés
                    , rövidebb utazások ide kattintva az összes analógiát elérheted
                </td>
            </tr>

            <tr>

                <td>
                    <h3 class="szemely">Mars</h3>
                    <img src="../images/mars.jpg" alt="mars">
                </td>
                <td>Az erő szimbóluma. Bármi amiben megjelenik az erőszak valmilyen formája, ott ott van a mars. Akár
                    egy
                    futásról van szó,
                    kitartás kell, erő kell hozzá. De egy sebész, egy fodrászban is megjelenik(konkrétan megfosz a
                    hajadtól) az
                    erőszak ,nem kell
                    ehhez gyilkosnak lenni, nem is feltétlenül rossz dolog, ha így nézzük. MAgát a férfiasságot is
                    jelenti
                </td>
            </tr>

            <tr>

                <td>
                    <h3 class="szemely">Vénusz</h3>
                    <img src="../images/venus.png" alt="venusz">
                </td>
                <td>Érdekes, mert a vénusznak elég szerteágazóak az analógiái. Egyrészt a mars , a férfi párját a
                    nőiességet,
                    a szépséget is jelképezi
                    ,másrészt a pénz, ingatlanok szimbóluma is. Persze a nőnek a nőiességét, egy férfinek a neki tetsző
                    nőt
                    jelenti.


                </td>
            </tr>

            <tr>

                <td>
                    <h3 class="szemely">Jupiter</h3>
                    <img src="../images/jupiter.png" alt="jupiter">
                </td>
                <td>A nagy szerencse bolygójának is nevezik, amelyik házban áll , azon a területen lehetünk igazán
                    boldogok.
                    Mivel tudunk azonosulni, beleélni magunkat? Erre a kérdésre is választ ad a jupiter. Bár fontos,hogy
                    megbecsüljük,
                    amit a jupiter ad,mert ha elutasítjuk a felkínált boldogságot, súlyos árat kell majd fizetnünk.
                </td>
            </tr>

            <tr>

                <td>
                    <h3 class="szemely">Szaturnusz</h3>
                    <img src="../images/saturn.png" alt="szaturnusz">
                </td>
                <td><q>A nagy szerencsétlenség bolygólya</q> persze ez is csak mondás, lehet nagyon hasznosan is
                    használni az
                    életünkben.
                    A sazturnusz magát a határokat, a korlátainkat jelenti. Ha szeretnénk céltudatosak, elszántak
                    tervszerűek
                    lenni, a szaturnusz
                    kiváló erre. De ha a feladatokkal, szabályokkal szembe szeretnénk menni elég kiábrándító élmeny
                    lesz.
                </td>
            </tr>

            <tr>
                <td>
                    <h3 class="transz">Uránusz</h3>
                    <img src="../images/uranus.png" alt="uranusz">
                </td>
                <td>Transzcendens bolygó, azaz már kevésbé hat a személyiségre mint az előzőek. Az új világi dolgokat,
                    az
                    informatikát
                    ,elektronikát, heterótól eltérő szexualitásokat, műanyag dolgokat és minden mást jelent, ami 100 éve
                    nem
                    létezett. De a
                    hirtelen létrejövő eseményeket is jelképezi.
                </td>
            </tr>

            <tr>

                <td>
                    <h3 class="transz">Uránusz</h3>
                    <img src="../images/neptun.png" alt="neptun">
                </td>
                <td>A zavarosság és az áldozathozatal bolygója. Könnyű rossz dologként megélni, de ha belegndolunk, a
                    szerelem
                    egy rózsazín
                    felhő, a drogok ,az alkoholos italok is a zavarosság párhuzamai. Az önfeláldozás, vagy áldozati
                    szerep pedig
                    az emberen múlik
                    honnan közelíti meg. Áldozatot hozok mert fontos nekem, vagy áldozat leszek és siránkozok, mert
                    mindig a
                    rövidebbet húzom? Ez a kérdés
                </td>
            </tr>
            <tr>

                <td>
                    <h3 class="transz">Plútó</h3>
                    <img src="../images/pluto.png" alt="pluto">
                </td>
                <td>Ez élet és a halál kapuja a Plútó. A szexualitás is hozzáköthető. Persze a halált nem kell
                    feltétlenül
                    konkrétan értelmezni
                    A halál lehet az adott év halála és egy új kezdete, egy kapcsolat halála és egy új kezdete. Vagy
                    éppen az
                    egyetemet sikerül befejezni.
                </td>
            </tr>


        </table>
        <h2>Random bolygo generátor</h2>
        <?php



        ?>



        <h2>
            Űrzene
        </h2>
        <audio controls>
            <source src="../media/urzene.mp3" type="audio/mpeg">
            sajnos nem tudunk neznét betölteni
        </audio>
    </main>
</div>

<!--Footer-->
<div id="footer">
    <footer>
        Készítette: Wolf Levente és Molnár Ádám
    </footer>
</div>


</body>
</html>