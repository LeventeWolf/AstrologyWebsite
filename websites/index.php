<?php session_start();


if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
    $isLoggedIn = true;
    $username = $_SESSION['username'];

    if (isset($_COOKIE[$username]))
        setcookie($username, $_COOKIE[$username] + 1, time() + (60*60*24*30), "/"); // 30 nap

} else {
    $isLoggedIn = false;
}


?>

<html lang="hu">
<head>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <meta charset="UTF-8">
    <title>Astrology</title>
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
            <li><a href="horoscope.php">Horoszkóp</a></li>

            <!-- Astrology -->
            <li class="active-wrapper"><a class="active" href="index.php">Astrology</a></li>

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
            } ?>

        </ul>
    </nav>
</div>

<!--Sidebar-->
<div id="sidebar">
    <aside>
        <div>
            <table>
                <tr>
                    <th id="i"></th>
                </tr>

                <!-- profile_pic -->
                <tr>
                    <td headers="i"><img src="../images/default_profile_picture.png" alt="default"></td>
                </tr>

                <!--Username-->
                <tr>
                    <td headers="i" id="username"><?php if ($isLoggedIn) echo "$_SESSION[username]" ?>
                        <hr>
                    </td>
                </tr>

                <!-- Planet:-->
                <tr>
                    <td headers="i"></td>
                </tr>

                <!--Zodiac sign:-->
                <tr>
                    <td headers="i"></td>
                </tr>
            </table>
        </div>
    </aside>
</div>

<!--Main div-->
<div id="main">
    <main>
        <h1>Bevezetés az Asztrológiába</h1>
        <h2>Mi is az asztrológia valójában?</h2>
        <p>

            Sokan azt hisszük, hogy jóslásról vagy személyiségelemzésről szól az asztrológia, azonban ez esetbnen nagyot
            tévedünk.
            Én leginkább úgy tudnám mondani, hogy ez egy szimbolikán alapuló következtetőrendszer. Valójában szó sincs a
            jóslásról,
            minden megmagyarázható, logikus és az ok-okozatok összefüggésén alapszik.</p>

        <p>Az aztrológia nem tudja megmondani mi lesz a jövőnk, és mivel a
            <mark>jövő képlékeny</mark>
            azt soha senki nem fogja tudni
            biztosra.
            Amit nyújtani tud, hogy ki tudja következtetni, bizonyos cselekedeteinknek milyen következményei lesznek,
            vagy
            éppen bizonyos
            következményeknek az életünkben milyen okai voltak. Ez arra mutat, hogy mi vagyunk a saját sorsunk kovácsai
            és
            mindig tehetünk
            magunkért, másokért és nem valami tőlünk független erő irányít mindent, persze részben erről is szó van.
            Talán ijesztő felelősséget vállalni az életünkért ,talán már gyakorlottak vagyunk benne, de ha nem hisszük
            járjunk utána.
        </p>

        <h2>Szimbolika</h2>
        <p>
            A szimbólumok ismerete valójában egy <b>nyelv</b> ,amit tudat alatt mindenki ismer.
            <i>Az emberek nem tudják nem kifejezni magukat</i> , ha pont semmit nem akarsz magadról sugalni,akkor is
            sugalsz
            valamit.<br>

            Mit is jelent, hogy szimbólum? <br>
            Egy szimbólumot egy felfoghatunk egy szóként,amit lefordíthatunk különböző nyelvekre. Minden nyelven máshogy
            hangzik,
            viszont jelentésben egyezik az adott dolog.
            Ugyanígy a szimbólumok is lefordíthatóak, olyan módon ahogy nem is gondolnánk.
            Vegyük például a nap szimbólumát: fensőbbség ,kiteljesedés, életerő, arany stb.
            Ezeket mindenki tudta eddig is, csak kérdezzünk okosan:
            Hogy érezzük magunkat ha kisüt a nap? Milyen színe van a napnak?<br>
            Ezen elv alapján le lehet fordítani a dolgokat, mivel analógok egymással.
            Mindegy hogy németről angolra, vagy franciáról kínaira fordítunk a lényeg ugyan az kell hogy maradjon.
            Aranyat lefordítom fensőbbségre, lehtséges? Persze a királyok is aranyat hordtak mindig.
            Életerőt lefordítom kiteljesedésre, működik? Igen ,hogyne függne össze az életerőnk, a kiteljesedéssel.
        </p>

        <h3>Bővebben...</h3>
        <iframe src="https://hu.wikipedia.org/wiki/Asztrol%C3%B3gia"></iframe>
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