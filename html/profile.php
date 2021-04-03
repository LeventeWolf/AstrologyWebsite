<?php session_start();

if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>

<html lang="hu">
<head>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <meta charset="UTF-8">
    <title>Profile</title>
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
        <h1>Profile Info</h1>
        <div id="settings">
            <h2>Change profile picture</h2>
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