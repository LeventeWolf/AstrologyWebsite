<?php session_start();

if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
    $isLoggedIn = true;
} else {
    header('Location: login.php');
}

if (isset($_FILES["upload-btn"])) {
    echo $_FILES['profile-pic']['name'];
}

include_once '../php/FileUploadHandler.php';
$fileUploadHandler = new FileUploadHandler();
$fileUploadHandler->upload();


include_once '../php/AccountHandler.php';
$accHand = new AccountHandler();

$username = $_SESSION["username"];
$email = $accHand->get_email($username);

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
                    <td>
                        <?php
                        include_once '../php/FileHandler.php';

                        $username = $_SESSION['username'];

                        $profile_picture_path = FileHandler::get_profile_picture_path($username);

                        echo "<img src=$profile_picture_path alt='default_icon'>";
                        ?>

                    </td>
<!--                    <td headers="i"><img src="../images/default_profile_picture.png" alt="default"></td>-->
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
            <h2>Number of Visits:</h2>
            <?php echo "<div class='visits'> $_COOKIE[$username] </div> "; ?>
            <h2>Change profile picture</h2>
            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <label for="file-upload">Profilkép:</label>
                <input type='file' name='image' accept="image/*"/>
                <input type='submit' name='upload-btn' value='Upload'/>
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