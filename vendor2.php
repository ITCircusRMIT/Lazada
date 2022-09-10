<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: vendor_login.php");
        exit();
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header("Location: vendor_login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="vendor.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script
      src="https://kit.fontawesome.com/c23e7a09a4.js"
      crossorigin="anonymous"
    ></script>
    <title>View My Products</title>
  </head>
  <body>
    <header>
      <div class="sidenav">
        <div class="logo">
          <a href="index.php"><img src="img/lazada-logo-white.png"/></a>
        </div>
        <a href="vendor1.php" id="link1">Add New Product</a>
        <a href="vendor2.php" id="link2" class="active">View My Products</a>
        <img src="img/user.png" class="user-pic" onclick="toggleMenu()"/>

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
          <?php
              $vendor_data = file_get_contents('vendor_account.json');
              $vendors = json_decode($vendor_data, true);

              if (!empty($vendors)) {
                foreach ($vendors as $vendor) {
                  if ($vendor['username'] == $_SESSION['user']) {
                    if ($vendor['avatar'] == "") {
                      ?>
                        <div class="user-info">
                        <img src="img/default avatar.jpg">
                        <h3><?php echo $_SESSION['user']; ?></h3>
                        </div>
                      <?php
                    } else {
                      ?>
                    <div class="user-info">
                    <img src="<?php echo "customer-avatars/" . $vendor['avatar'] ?>">
                    <h3><?php echo $_SESSION['user']; ?></h3>
                    </div>
                    <?php
                    }
              }}}
              ?>
            <hr />

            <a href="vendor_account.php" class="sub-menu-link">
              <img src="img/profile.png"/>
              <p>Edit Profile</p>
              <span>></span>
            </a>
            <a href="#" class="sub-menu-link">
              <img src="img/setting.png"/>
              <p>Setting & Privacy</p>
              <span>></span>
            </a>
            <a href="#" class="sub-menu-link">
              <img src="img/help.png"/>
              <p>Support</p>
              <span>></span>
            </a>
            <a href="?logout" class="sub-menu-link">
              <img src="img/logout.png"/>
              <p>Logout</p>
              <span>></span>
            </a>
          </div>
        </div>
        <script>
          let subMenu = document.getElementById("subMenu");

          function toggleMenu() {
            subMenu.classList.toggle("open-menu");
          }
        </script>
      </div>
    </header>
    <main>
      <div class="view">
      <?php $css = file_get_contents('vendor.css');
          echo '<style>'.$css.'</style>';
          $product_data = file_get_contents('vendor1.json');
          $products = json_decode($product_data, true);
          
          if(!empty($products)){
            foreach($products as $product){
              if ($product['seller'] == $_SESSION['user']) {
              ?>
              <div class="product-info">
                <a href="">
                <div class="product-image">
                  <img src="<?php echo "product-images/" . $product['productImage'] ?>">
                </div>
                <div class="product-details">
                <h3><?php echo $product['productName']; ?></h3>
                <p class="describe"><?php echo $product['productDescription']; ?></p>
                <p class="cost">Price: <?php echo $product['productPrice']; ?> VND</p>
                </div>
                </a>
              </div>
              <?php
              }
            }
          }
      ?>
      </div>
    </main>
    <footer>
      <nav>
        <a href="#">About Us</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms</a>
        <a href="#">Support</a>
        <a href="contact.html">Contact Us</a>
      </nav>
        <p>© 2022 Copyright: Circus Team</p>
    </footer>
  </body>
</html>