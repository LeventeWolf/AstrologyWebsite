<?php
session_start();

include_once '../php/LoginHandler.php';

$loginHandler = new LoginHandler();

if (isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!$loginHandler->check_correct_login($username, $password)) {
        $error_msg = "Invalid username or password!";
    } else {
        $account = [
            "username" => $username,
            "date" => date("Y.m.d"),
        ];

        $_SESSION["account"] = serialize($account);
        $_SESSION["isLoggedIn"] = true;
        header("Location: index.php");
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Astrology - Login</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/sidebar.css">
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
            <li>
                <a href="planets.php">Bolygók</a>
            </li>
            <li>
                <a href="horoscope.php">Horoszkóp</a>
            </li>
            <li>
                <a href="index.php">Astrology</a>
            </li>
            <li class="active-wrapper">
                <a class="active" href="login.php">Login</a>
            </li>
            <li>
                <a href="register.php">Register</a>
            </li>
        </ul>
    </nav>
</div>

<!--Sidebar-->
<div id="sidebar">
    <aside>
        <div>
            <table>
                <!-- Profile_Picture -->


                <!--Username-->
                <tr>
                    <td>
                        <hr>
                    </td>
                </tr>

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
        <div class="container">
            <div class="text">Bejelentkezés</div>

            <form method="POST" action="login.php">
                <?php
                $blink = "";
                $username = "";
                $password = "";

                if (isset($_SESSION["isRegistered"]) and $_SESSION["isRegistered"]) {
                    $username = $_SESSION["username"];
                    $password = $_SESSION["password"];
                    $blink = 'blink';
                }

                //<!--Labels & inputs-->
                echo "<div class='labels'>
                        <!--Username-->
                        <label>Felhasználónév:<br> 
                            <input class='$blink' type=text name=username required value='$username' >
                        </label> <br/>
        
                        <!--Password-->
                        <label>Jelszó:<br>
                            <input class='$blink' value='$password' type=password name=password required />
                        </label> <br/>
                    </div>";

                // <!--Error-box-->
                if (isset($error_msg)) echo "<div class=error-box>$error_msg</div>"; ?>

                <!--Login In Button-->
                <div class='submit-btn'>
                    <button id='bejelentkezes' type='submit' name='submit'>Bejelentkezés</button>
                </div>

            </form>

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