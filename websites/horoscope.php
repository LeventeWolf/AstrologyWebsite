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
    <title>Egy horoszkóp értelmezése</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/horoscope.css">
    <link rel="stylesheet" href="../css/sidebar.css"/>
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
            <li><a href="planets.php">Bolygók</a></li>

            <!-- Horoscope -->
            <li class="active-wrapper"><a class="active" href="horoscope.php">Horoszkóp</a></li>

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
                <!-- Profile_Picutre -->

                <tr>
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
<!--                <tr><td><img src="../images/default_profile_picture.png" alt="default"></td></tr>-->

                <!-- Username -->
                <tr><td headers="i" id="username"><?php if ($isLoggedIn) echo "$username" ?><hr></td></tr>

                <!-- Planet -->
                <tr><td></td></tr>

                <!-- Zodiac sign -->
                <tr><td></td></tr>
            </table>
        </div>
    </aside>
</div>

<!--Main div-->
<div id="main">
    <main>
        <div>

            <article class="first-section">

                <h1>
                    Horoszkóp értelmezése
                </h1>

                <p>
                    Legtöbben a napi horoszkópról ismerjük az asztrológiát, azonban ez sokkal több a látszatnál.<br>

                    Onnan tudhatjuk, hogy valaki ponos elemzést csinál, hogy megkérdezi a pontos <strong> óra percét és
                    helyét </strong> a
                    születésünknek, enélkül nem lehet pontos
                    következtetéseket levonni.
                </p>

                <p><strong>4 főbb</strong> egységre bonthatjuk magát a horoszkópot, legonkább egy több rétegű tortához
                    lehetne hasonlítani.
                </p>


                <ol>
                    <li>
                        <u>Zodiákus:</u>
                        Állatövi jegyek Kostól indulva a halakig A jegyek a dolgok minőségt jelzik, például az egó
                        minőségét
                        nevezzük személyiségnek.
                        Hasonlóképpen az <em>akaratunknak</em> (mars), <em>gondolkodásunknak</em>(merkúr) és a többi
                        bolygónak is van saját minősége,
                        milyensége.

                    </li>

                    <li>
                        Házak:
                        Egy-egy házat egy-egy életterületnek tekinthetünk ezek pontosítják, hogy egyes tulajdonságainkat
                        milyen
                        életterületen éljük.
                        Pl 8-as ház mutatja milyen a szexualitásod, 4-es milyen a családod stb sok dolog az életben. 12
                        ház van a
                        jegyekhez hasonlóan, azonban
                        az elhelyezkedésük teljesen független tűlük és nem is egyenletes.

                    </li>

                    <li>
                        Bolygók:
                        Amíg a jegyek a hogyan, a házak a hol kérdésre válaszoltak, addig a bolygók a mit kérdésre. Ők
                        az
                        összeköttető csomópontok, ők mutatják
                        mi történik az életedben, viszont jegyek, házak nélkül nem tudnán mit leolvasni
                    </li>

                    <li>
                        Fényszögek:
                        Bonyolodik a helyzet, ugyanis ez meghatványozza a felső három hatványhalmazát. A fényszögek a
                        bolygók közti
                        kapcsolatot jelentik.
                        Pl ha a hold az anyukát jelképezi a nap pedig az apukát és ezek szemnen állnak egymással. Akkor
                        a való
                        életben is egymás ellentétei
                    </li>


                </ol>

                <p id="outline">
                    Ezeknek a kombonációszáma olyan nagy, hogy lehetetlenné teszi ,hogy két ugyanolyan ember jöjjön a
                    világra.
                    Nem beszélve arról, hogy mindenki más következtetéseket von le, más családba születik, más
                    döntéseket hoz.


                </p>

                <p id="kepletkep">
                    <img src="../images/keplet.jpg" alt="keplet" usemap="#keplet">

                    <map name="keplet">
                        <area shape="circle" coords="110,30,40" alt="Bolygók" href="planets.php">
                        <area shape="circle" alt="Bolygók" coords="100,230,40" href="planets.php">
                        <area alt="Bolygók" href="planets.php" shape="circle" coords="250,190,40">

                    </map>

                </p>

            </article>


        </div>
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