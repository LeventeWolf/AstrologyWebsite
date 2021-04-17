<?php session_start();

if (isset($_SESSION['username'])) {
            return true;
    header('Location: login.php');
}




if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
    $isLoggedIn = true;
} else {
    header('Location: login.php');
}


include_once '../php/AccountHandler.php';
$accHand = new AccountHandler();
$username = $_SESSION["username"];
$email = $accHand->get_email($username);

if (isset($_POST['submit-btn'])) {

    if (!isset($_POST["profil-pic"]) )
        $error_msg = "You must have an picture to upload!";

    $pic = $_POST['profil-pic'];


    if (!isset($error_msg)){
        if (!$accHand->is_picture_valid($pic)) {
            $error_msg = "This file extension is not proper!";
        } else {
            $fileHandler = $accHand->get_fileHandler();
            $fileHandler->write_user_to_file($pic,$username);


        }
    }

}
?>

include_once '../php/AccountHandler.php';
$accountHandler = new AccountHandler();

$username = $_SESSION["username"];
$email = $accountHandler->get_email($username);


?>

<html lang="hu">
<head>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/profile.css">
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
            <li><a href="index.php">Astrology</a></li>

            <?php if ($isLoggedIn) {
                echo "
                <!-- Profile -->
                <li class='active-wrapper'><a class='active' href='profile.php'>Profile</a></li>
                
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


            <h2>Email:</h2>
            <?php echo "<div class='email'> $email </div> "; ?>
            <h2>Number of Visits: (on your computer lmao)</h2>
            <?php echo "<div class='visits'> $_COOKIE[$username] </div> "; ?>
            <h2>Change profile picture</h2>
            <form action="profile.php" method="POST">

                <label for="file-upload">Profilkép:</label>

                <input type="file" id="file-upload" name="profile-pic" accept="image/*"/> <br/>

                <input type="submit" name="upload-btn" value="Feltöltés"/>
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