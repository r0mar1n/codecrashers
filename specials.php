<?php
include('conn.php');
include('login.php');
session_start();
if (isset($_SESSION['authn'])) {
    $user = $_SESSION['user'];
} else {
    $user = "Login/Sign Up";
}
$sel = "SELECT * FROM special WHERE 1";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Specials</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hostel_style.css">
    <link rel="icon" type="image/png" href="./folder images/logo2.png" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-xxl position-relative p-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <div class="logo">
                <a href="index.php"><img class="logo-img" src="./folder images/logo.png" width="100" height="100"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a <?php
                        if (isset($_SESSION['authn'])) {
                            print "href='cartdemo.php'";
                        } else {
                            //echo '<script>alert("You need to login/signup!""); </script>';
                            print "href='log.php'";
                        }
                        ?> class="nav-item nav-link">My Cart</a>
                    <a <?php
                        if (isset($_SESSION['authn'])) {
                            print "href='o.php'";
                        } else {
                            //echo '<script>alert("You need to login/signup!""); </script>';
                            print "href='log.php'";
                        }
                        ?> class="nav-item nav-link">Order History</a>
                    <img src="./folder images/profile.jpeg" alt="user_profile" class=" user-pic" onclick="toggleMenu()">

                </div>
            </div>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="./folder images/profile.jpeg" alt="">
                        <?php print "<h3>" . $user . "</h3>"; ?>
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <img src="./folder images/user-avatar.png" alt="pic" <?php
                                                                                if (isset($_SESSION['authn'])) {
                                                                                    print "href='profile.php'";
                                                                                } else {
                                                                                    print "href='log.php'";
                                                                                }
                                                                                ?>>
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img src="./folder images/logout.png" alt="pic">
                        <p>Logout</p>
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <main>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <?php
                    while ($row = $query->fetch_assoc()) {
                        print "<div class='col-lg-6'>";
                        print "<div class='d-flex align-items-center'>";
                        print "<div class='w-100 d-flex flex-column text-start ps-4'>";
                        print "<h5><img class='flex-shrink-0 img-fluid rounded' src=" . $row['img'] . " style='width: 80px;'>";
                        print "<span>" . $row['name'] . "</span></h5>";
                        print "</div></div></div>";
                    }
                    ?>


                </div>
            </div>
    </main>
    <div class="blank">

    </div>
    </main>
    <footer>
        <div class="footer">
            <span class="smaller-font">&copy; CodeCrashers All rights reserved.<br /><span class="xsmall-font">Agnethon 2024</span></span>
        </div>
    </footer>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>