<?php session_start() ?>

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
                <a href="planets.html">Bolygók</a>
            </li>
            <li>
                <a href="horoscope.html">Horoszkóp</a>
            </li>
            <li>
                <a href="index.html">Astrology</a>
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
                <tr>
                    <!-- profile_pic -->
                    <td>
                        <img src="../images/default_profile_picture.png" alt="default">
                    </td>
                </tr>
                <tr>
                    <td style="font-style: italic">
                        Username
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td>
                        <!--                Planet:-->
                    </td>
                </tr>

                <tr>
                    <td>
                        <!--                Zodiac sign:-->
                    </td>
                </tr>

            </table>
        </div>
    </aside>
</div>

<!--Main div-->
<div id="main">
    <main>
        <div class="container">
            <div class="text">Bejelentkezés</div>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <?php
                $blink = "";
                $account = "";
                $username = "";
                $password = "";

                if (isset($_SESSION["username"]) and isset($_SESSION["password"])) {
                    $username = $_SESSION["username"];
                    $password = $_SESSION["password"];
                    $blink = 'blink_me';
                }

                echo "
                    <div class='name-pwd'>
                        <!--Username-->
                        <label>Felhasználónév:<br> <input type=text name=username required ></label> <br/>
        
                        <!--Password-->
                        <label>Jelszó:<br><input type=password name=password required/></label> <br/>
                    </div>
                    ";


                include_once '../php/LoginHandler.php';

                $loginHandler = new LoginHandler();


                $username = $_POST["username"];
                $password = $_POST["password"];

                if (isset($_POST["submit"])) {
                    if (!$loginHandler->check_correct_login($username, $password)) {
                        echo "<div class=error-box>";
                        echo "Incorrect username or password!";
                        echo "</div>";
                    } else {
                        session_unset();
                        echo "sikeres bejelentkezés! $username";
                        $_SESSION["username"] = $username;
                        $_SESSION["login"] = true;
                    }
                }


                echo "
                    <!--Login In Button-->
                    <div class='submit-btn'>
                        <button id='bejelentkezes' type='submit' name='submit'>Bejelentkezés</button> 
                    </div>
                    
                    ";


                ?>
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