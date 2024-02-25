<?PHP
include("conn.php");
session_start();
if (isset($_SESSION['authn'])) {
    $user = $_SESSION['user'];
} else {
    $user = "Login/Sign Up";
}
$sel = "SELECT * FROM orders WHERE user ='$user'";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html>
<style>
    /* Global styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .container-xxl {
        margin-top: 50px;
        padding: 0;
    }

    .navbar {
        background-color: #295562;
    }

    .logo-img {
        max-width: 50px;
        height: auto;
    }

    .navbar-nav {
        display: flex;
        align-items: center;
    }

    .nav-item {
        margin-right: 20px;
        font-size: 16px;
    }

    .nav-link {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .nav-link:hover {
        color: #FFDE5C;
    }

    .user-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        margin-left: 30px;
    }

    .sub-menu-wrap {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 220px;
        max-height: 0;
        overflow: hidden;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: max-height 0.3s;
    }

    .sub-menu-wrap.open-menu {
        max-height: 200px;
    }

    .sub-menu {
        padding: 15px;
    }

    .sub-menu-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        margin-bottom: 10px;
    }

    .sub-menu-link img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    main {
        padding: 20px;
    }

    h3 {
        margin-bottom: 20px;
        color: #007bff;
        font-weight: 600;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        flex: 0 0 calc(50% - 20px);
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        padding: 15px;
        background-color: #295562;
        color: #FFDE5C;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-content {
        padding: 15px;
    }

    .card-content p {
        margin-bottom: 10px;
    }

    .total-amount {
        font-size: 20px;
        font-weight: 600;
        text-align: right;
        color: #007bff;
    }

    /* Footer styles */
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px 20px;
        background-color: #295562;
        color: #fff;
        text-align: center;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order History</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./menu_style.css">

</head>
<style>
    .card-header {
        border: 10px;
        color: #FFDE5C;
        background-color: #295562;
        justify-content: center;
    }
</style>

<body>

    <div class="container-xxl position-relative p-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <div class="logo">
                <img class="logo-img" src="./logo.png" width="100" height="100">
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="menu.php" class="nav-item nav-link">Menu</a>
                    <a href="#" class="nav-item nav-link">My Cart</a>
                    <a <?php
                        if (isset($_SESSION['authn'])) {
                            print "href='order.php'";
                        } else {
                            echo "<script>alert('You need to login/signup!'); </script>";
                            print "href='log.php'";
                        }
                        ?> class="nav-item nav-link">Order History</a>
                    <img src="profile.jpeg" alt="user_profile" class=" user-pic" onclick="toggleMenu()">

                </div>
            </div>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="profile.jpeg" alt="">
                        <?php print "<h3>" . $user . "</h3>"; ?>
                    </div>
                    <hr>
                    <a <?php
                        if (isset($_SESSION['authn'])) {
                            print "href='profile.php'";
                        } else {
                            print "href='log.php'";
                        }
                        ?> class="sub-menu-link">
                        <img src="./user-avatar.png" alt="pic">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="./customer-support.png" alt="pic">
                        <p>Help & support</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img src="./logout.png" alt="pic">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <main>
        <h3>Your Order History</h3>


        <div class='card-container'>

            <div class='card'>
                <div class='card-header'>
                    <h3>Status </h3>
                </div>
                <div class='card-content'>
                    <h5>Order #Ordernumber</h5>
                    <p>no.ofitems item(S)</p>
                    <p>Cost: ₹price/-</p>
                </div>
            </div>
        </div>

        <?php
        while ($row = $query->fetch_assoc()) {
            print "<div class='card-container'>";

            print "<div class='card'>";
            print "<div class='card-header'>";
            print "<h3>" . $row['status'] . "</h3>";
            print "</div>";
            print "<div class='card-content'>";
            print "<h5>Order #" . $row['oid'] . "</h5>";
            print "<p>" . $row['items'] . " item(S)</p>";
            print "<p>Cost: ₹" . $row['cost'] . "/-</p>";
            print "</div></div></div>";
        }
        ?>

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