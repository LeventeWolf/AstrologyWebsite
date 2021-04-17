<?php
session_start();

if (isset($_POST['submit-btn'])) {

    if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
        $error_msg = "You must have an email!";

    if (!isset($_POST["password"]) || trim($_POST["password"]) === "" ||
        !isset($_POST["passwordre"]) || trim($_POST["passwordre"]) === "")
        $error_msg = "You must have a password with passoword checker!";

    if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
        $error_msg = "You must have a username!";


    $username = $_POST['username'];
    $pwd1 = $_POST['password'];
    $pwd2 = $_POST['passwordre'];
    $email = $_POST['email'];

    include_once '../php/RegistrationHandler.php';

    $registrationHandler = new RegistrationHandler();

    if (!isset($error_msg)){
        if (!$registrationHandler->is_username_valid($username)) {
            $error_msg = "This username is already taken!";
        } elseif (!$registrationHandler->is_password_length_valid($pwd1)) {
            $error_msg = "Password must be minimum 8 character long";
        } elseif (!$registrationHandler->is_passwords_match($pwd1, $pwd2)) {
            $error_msg = "Passwords don't match!";
        } elseif (!$registrationHandler->is_email_valid($email)) {
            $error_msg = "Invalid email!";
        } else {
            $fileHandler = $registrationHandler->get_fileHandler();
            $fileHandler->write_user_to_file($username, $pwd1, $email);
            $fileHandler->create_folder_for_user($username);



            $_SESSION["username"] = $username;
            $_SESSION["password"] = $pwd1;
            $_SESSION["isRegistered"] = true;
            $_SESSION["isLoggedIn"] = false;

            $_COOKIE[$username] = 0;

            header("Location: login.php");
        }
    }

}
?>

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
                <a href="planets.php">Bolygók</a>
            </li>
            <li>
                <a href="horoscope.php">Horoszkóp</a>
            </li>
            <li>
                <a href="index.php">Astrology</a>
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
                <!-- profile_pic -->
                <tr>
                    <td><img src="../images/default_profile_picture.png" alt="default"></td>
                </tr>

                <!-- username -->
                <tr>
                    <td>
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
        <div class="container">
            <div class="text">Regisztráció</div>
            <form method="POST" action="register.php">
                <!--Labels & inputs-->
                <div class="labels">
                    <label>Felhasználónév:<br> <input type="text" name="username" ></label> <br/>

                    <label>Jelszó:<br> <input type="password" name="password" /></label> <br/>

                    <label>Jelszó ismét:<br> <input type="password" name="passwordre" /></label> <br/>


                    <label>E-mail: <input type="email" name="email" /></label> <br/>

                    <comment>
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
                </div>

                <!--Error-box-->
                <?php if (isset($error_msg)) echo "<div class=error-box>$error_msg</div>"; ?>

                <!--Regisztráció-->
                <input id="regisztracio" type="submit" name="submit-btn" value="Regisztráció"/>

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