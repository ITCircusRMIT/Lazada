<?php require("product-upload-class.php"); ?>
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
<?php
    if(isset($_POST['upload'])) {
        $product = new ProductUpload($_POST['productName'], $_POST['price'], $_POST['description']);
    }
?>
<?php
    if(isset($_POST['upload'])) {
        $file = $_FILES['file'];
        $folder = "product-images/";

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];

        move_uploaded_file($fileTmpName, $folder . $fileName);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="vendor1.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script
      src="https://kit.fontawesome.com/c23e7a09a4.js"
      crossorigin="anonymous"
    ></script>
    <title>Add New Product</title>
  </head>
  <body>
    <header>
      <div class="sidenav">
        <div class="logo">
          <a href="index.php"><img src="img/lazada-logo-white.png"/></a>
        </div>
        <a href="vendor1.php" id="link1" class="active">Add New Product</a>
        <a href="vendor2.php" id="link2">View My Products</a>
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
      <form action="" method="post" enctype="multipart/form-data" autocomplete="off" id="addproduct">
        <label for="pname">Product Name</label>
        <input type="text" id="pname" name="productName" minlength="10" maxlength="20" required><br>
        <label for="pprice">Price</label>
        <input type="number" id="pprice" name="price" required>
        <label for="pprice">(VND)</label><br>
        <label for="pimage">Product Image</label>
        <input type="file" id="pimage" name="file" required><br>
        <label for="pdscrpt">Product Description</label><br><br>
        <textarea id="pdscrpt" name="description" maxlength="500" required></textarea><br>
        <div class="button">
          <input type="submit" id="submit" name="upload" value="Add Product">
          <input type="reset" id="reset" value="Clear">
        </div>
        <p class="error" style="color: #ff0000;"><?php echo @$product->error ?></p>
        <p class="success" style="color: #00E100;"><?php echo @$product->success ?></p>
      </form>
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