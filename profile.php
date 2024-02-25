<?PHP
include("conn.php");
session_start();
if (isset($_SESSION['authn'])) {
  $user = $_SESSION['user'];
} else {
  $user = "Login/Sign Up";
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="profile_style.css">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="./folder images/logo2.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./1.css">
</head>

<body>

  <div class="heading">

    <nav class="navbar navbar-expand-lg  px-4 px-lg-5 py-3 py-lg-0">
      <div class="logo">
        <img class="logo-img" src="./folder images/logo.png" width="100" height="100">
      </div>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="./index.php" class="nav-item nav-link active">Home</a>
          <a href="./menu.php" class="nav-item nav-link">Menu</a>
          <a href="" class="nav-item nav-link">My Cart</a>
          <a href="o.php" class="nav-item nav-link">Order History</a>
          <img src="./folder images/profile.jpeg" alt="user_profile" class=" user-pic" onclick="toggleMenu()">

        </div>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="./folder images/profile.jpeg" alt="">
            <h3>User details</h3>
          </div>
          <hr>
          <a href="./p2.html" class="sub-menu-link">
            <img src="./folder images/user-avatar.png" alt="pic">
            <p>Edit Profile</p>
            <span>></span>
          </a>
          <a href="" class="sub-menu-link">
            <img src="./folder images/settings.png" alt="pic">
            <p>Settings</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="./folder images/customer-support.png" alt="pic">
            <p>Help & support</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="./folder images/logout.png" alt="pic">
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <main>
    <hr class="mt-0 mb-4">
    <div class="row">
      <div class="col-xl-4">
        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Profile Picture</div>
          <div class="card-body text-center">
            <img class="img-account-profile rounded-circle mb-2" src="./images/user.png" alt>
            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
            <button class="btn btn-primary" type="button">Upload new image</button>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">
            <form>
              <!--username -->
              <div class="mb-3">
                <label class="small mb-1" for="inputUsername">Username </label>
                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username">
              </div>
              <!--full name -->
              <div class="row gx-3 mb-3">
                <!-- first name -->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">First name</label>
                  <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name">
                </div>
                <!-- last name -->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">Last name</label>
                  <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name">
                </div>
              </div>

              <div class="row gx-3 mb-3">

                <!-- Email ID-->
                <div class="mb-3">
                  <label class="small mb-1" for="inputEmailAddress">Email address</label>
                  <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address">
                </div>
                <!-- phone no. -->
                <div class="row gx-3 mb-3">

                  <div class="col-md-6">
                    <label class="small mb-1" for="inputPhone">Phone number</label>
                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number">
                  </div>

                  <!-- submit changes -->
                  <button class="btn btn-primary" type="button">Save changes</button>
            </form>
          </div>
        </div>
      </div>
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
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
  </script>
</body>

</html>