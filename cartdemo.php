<?PHP
include("conn.php");
session_start();
if (isset($_SESSION['authn'])) {
  $user = $_SESSION['user'];
} else {
  $user = "Login/Sign Up";
}
$sel = "SELECT * FROM cart WHERE user ='$user'";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Cart</title>
  <link rel="icon" type="image/png" href="./folder images/logo2.png" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profile_style.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Open Sans -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    .container {
      margin-top: 50px;
    }

    .cart {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .cart h2 {
      color: #295562;
      /* Change font color to #295562 */
      font-weight: 600;
      margin-top: 0;
      margin-bottom: 20px;
    }

    .item {
      padding: 15px;
      border-bottom: 1px solid #ddd;
      position: relative;
    }

    .item:last-child {
      border-bottom: none;
    }

    .item p {
      margin: 0;
    }

    .total-amount {
      font-size: 24px;
      font-weight: 600;
      margin-top: 20px;
      text-align: right;
      color: #007bff;
    }

    .btn-primary {
      background-color: #6c757d;
      /* Change button color to #6c757d */
      border-color: #6c757d;
      /* Change button border color */
      font-weight: 600;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #5a6268;
      /* Change button hover color to #5a6268 */
      border-color: #5a6268;
      /* Change button hover border color */
    }

    .btn-secondary {
      background-color: #295562 !important;
      /* Change button color to #295562 */
      border-color: #295562 !important;
      /* Change button border color */
      font-weight: 600;
      transition: background-color 0.3s;
    }

    .btn-secondary:hover {
      background-color: #295562 !important;
      /* Change button hover color to #295562 */
      border-color: #295562 !important;
      /* Change button hover border color */
    }

    .btn {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
    }

    .remove-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="heading">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
      <div class="logo">
        <a href="index.php"><img class="logo-img" src="./folder images/logo.png" width="100" height="100"></a>
      </div>
      <div class="nav-contain">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="./index.php" class="nav-item nav-link active">Home</a>
            <a href="cartdemo.php" class="nav-item nav-link">My Cart</a>
            <a href="o.php" class="nav-item nav-link">Order History</a>
            <img src="./folder images/profile.jpeg" alt="user_profile" class=" user-pic" onclick="toggleMenu()">
          </div>
        </div>
      </div>

      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="./folder images/profile.jpeg" alt="" <?php
                                                            if (isset($_SESSION['authn'])) {
                                                              print "href='profile.php'";
                                                            } else {
                                                              print "href='log.php'";
                                                            }
                                                            ?>>
            <?php print "<h3>" . $user . "</h3>"; ?>
          </div>
          <hr>
          <a href="profile.php" class="sub-menu-link">
            <img src="./folder images/user-avatar.png" alt="pic">
            <p>Edit Profile</p>
            <span>></span>
          </a>
          <a href="logout.php" class="sub-menu-link">
            <img src="./folder images/logout.png" alt="pic">
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <div class="container">
    <div class="cart">
      <h2>Your Cart</h2>
      <?php
      while ($row = $query->fetch_assoc()) {
        print "<div class='item'>";
        print "<i class='fas fa-trash remove-btn' onclick='removeItem(this)'></i>";
        print "<p><strong>Item Name:</strong>" . $row['name'] . "</p>";
        print "<p><strong>Quantity:</strong>" . $row['qnty'] . "</p>";
        print "<p><strong>Price:</strong>₹" . $row['amnt'] . "/-</p>";
        print "<div>";
      }
      ?>
      <div class="item">
        <i class="fas fa-trash remove-btn" onclick="removeItem(this)"></i>
        <p><strong>Item Name:</strong> Fried Rice</p>
        <p><strong>Quantity:</strong> 1</p>
        <p><strong>Price:</strong> Rs. 120.00</p>
      </div>
      <div class="item">
        <i class="fas fa-trash remove-btn" onclick="removeItem(this)"></i>
        <p><strong>Item Name:</strong> Coca Cola</p>
        <p><strong>Quantity:</strong> 1</p>
        <p><strong>Price:</strong> Rs. 10.00</p>
      </div>
      <hr>
      <p class="total-amount" id="totalAmount"><strong>Total Amount:Rs. 130</strong> </p>
      <div class="text-center mt-4">
        <button class="btn btn-primary mx-2">Add More Items <i class="fas fa-plus ml-1"></i></button>
        <button class="btn btn-secondary mx-2">Confirm Your Order <i class="fas fa-check-circle ml-1"></i></button>
      </div>
    </div>
  </div>
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

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const items = [{
          name: 'Sample Item',
          quantity: 2,
          price: 20.00
        },
        {
          name: 'Another Item',
          quantity: 1,
          price: 15.00
        }
      ];

      let totalAmount = 0;

      items.forEach(item => {
        totalAmount += item.quantity * item.price;
      });

      const totalAmountElement = document.getElementById('totalAmount');
      totalAmountElement.textContent = `Total Amount: Rs. 130`;
    });

    function removeItem(element) {
      const item = element.parentNode;
      item.parentNode.removeChild(item);
    }
  </script>
</body>

</html>