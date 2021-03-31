<?php session_start();?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Astrology - Register</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/register.css">
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
            <li>
                <a href="login.php">Login</a>
            </li>
            <li class="active-wrapper">
                <a class="active" href="register.php">Register</a>
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
            <div class="text">Regisztráció</div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label>Felhasználónév: <input type="text" name="username" required ></label> <br/>

                <label>Jelszó: <input type="password" name="password" required/></label> <br/>

                <label>Jelszó ismét: <input type="password" name="passwordre" required/></label> <br/>

                <comment>
                    <!--                <label>E-mail: <input type="email" name="email" required/></label> <br/>-->
                    <!---->
                    <!---->
                    <!--mezőcsoportosítás-->
                    <!--                <fieldset>-->
                    <!--mezőcsoportosítás felirata-->
                    <!--                    <legend>Születési adatok</legend>-->
                    <!---->
                    <!--                    <label>Teljes név*: <input type="text" name="full-name" size="25" required /></label> <br/>-->
                    <!---->
                    <!--                    <label>Születési dátum*: <input type="date" name="date-of-birth" min="1900-01-01" required /></label> <br/>-->
                    <!---->
                    <!--                    <label>Születési óra*: <input type="number" name="date-hour" min="0" max="23" required /></label> <br/>-->
                    <!---->
                    <!--                    <label>Születési perc*: <input type="number" name="date-minute" min="0" max="60" /></label> <br/>-->
                    <!---->
                    <!--                    <label>Hely*: <input type="text" name="place" size="25" required/></label> <br/>-->
                    <!---->
                    <!---->
                    <!--                    Nem:-->
                    <!--                    <label for="op1">Férfi:</label>-->
                    <!--                    <input type="radio" id="op1" name="sex" value="m"/>-->
                    <!--                    <label for="op2">Nő:</label>-->
                    <!--                    <input type="radio" id="op2" name="sex" value="f"/>-->
                    <!--                    <label for="op3">Egyéb:</label>-->
                    <!--                    <input type="radio" id="op3" name="sex" value="other" checked/> <br/>-->
                    <!--                </fieldset>-->
                    <!---->
                    <!--                Kedvenc bolygó:-->
                    <!--                <select>-->
                    <!--                    <option value="earth" selected>Föld</option>-->
                    <!--                    <option value="moon" >Hold</option>-->
                    <!--                    <option value="mars">Mars</option>-->
                    <!--                    <option value="jupiter">Jupiter</option>-->
                    <!--                    <option value="saturn">Szaturnusz</option>-->
                    <!--                </select> <br>-->
                    <!---->
                    <!--                Kedvenc szín:-->
                    <!--                <input type="color" name="color"/> <br/>-->
                    <!---->
                    <!--                <label for="introduction">Megjegyzés (300 karakter):</label> <br/>-->
                    <!--                <textarea id="introduction" name="intro" maxlength="300"></textarea> <br/>-->
                    <!---->
                    <!---->
                    <!---->
                    <!--                <input type="hidden"/> <br>-->
                    <!---->
                    <!--                Általános szerződési feltételek elfogadása:-->
                    <!--                <input  type="checkbox"> <br>-->
                    <!---->
                    <!--                <input type="reset" name="reset-btn" value="Adatok törlése"/>-->
                </comment>

                <input type="submit" name="submit-btn" value="Adatok elküldése"/>
                <br>

                <!-- HandleRegistration  -->
                <?php
                if (isset($_POST['submit-btn'])) {
                    $username = $_POST['username'];

                    $pwd1 = $_POST['password'];
                    $pwd2 = $_POST['passwordre'];

                    include_once '../php/RegistrationHandler.php';

                    $registrationHandler = new RegistrationHandler();

                    if (! $registrationHandler->is_username_valid($username)) {
                        echo "<div class=error-box>";
                        echo "This username is already taken!";
                        echo "</div>";
                    } elseif (! $registrationHandler->is_passwords_match($pwd1, $pwd2)) {
                        echo "<div class=error-box>";
                        echo "Passwords don't match!";
                        echo "</div>";
                    } else {
                        $fileHandler = $registrationHandler->get_fileHandler();
                        $fileHandler->write_user_to_file($username, $pwd1);
                        $fileHandler->create_folder_for_user($username);


                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $pwd1;
                    }
                }
                ?>
                <!-- HandleRegistration END  -->

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