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
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="cus_account.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script
      src="https://kit.fontawesome.com/c23e7a09a4.js"
      crossorigin="anonymous"
    ></script>
    <title>My Account | Lazada</title>
  </head>
  <body>
    <header>
        <div class="header container">
            <div class="logo">
              <a href="index.php"><img src="img/lazada-logo-white.png"/></a>
            </div>
            <nav>
              <a href="#"><img src="img/shopping-basket.png"></a>
            </nav>
        </div>
    </header>
    <main>
        <div class="profile">
            <div class="menu">
                <a href="#" id="active" class="link">My Account</a>
            </div>
            <div class="myacc">
                <h1>My Account</h1>
                <div class="info"><h2>Username:</h2><p><?php echo $_SESSION['user']; ?></p></div>
                <?php
                    $json_data = file_get_contents("vendor_account.json");
                    $users = json_decode($json_data, true);

                    if(!empty($users)) {
                        foreach($users as $user) {
                            if($user['username'] == $_SESSION['user']) {
                            ?>
                            <div class="info"><h2>Business Name:</h2><p><?php echo $user['business']; ?></p></div>
                            <div class="info"><h2>Business Address:</h2><p><?php echo $user['address']; ?></p></div>
                            <?php
                            } 
                        }
                    }
                ?>
                <a href="?logout" class="sub-link">
                  <img src="img/logout.png">
                  <p>Logout</p>
                </a>
            </div>
            <div class="edit-img">
            <?php
              $customer_data = file_get_contents('user_account.json');
              $customers = json_decode($customer_data, true);

              if (!empty($customers)) {
                foreach ($customers as $customer) {
                  if ($customer['username'] == $_SESSION['user']) {
                    if ($customer['avatar'] == "") {
                      ?><img src="img/default avatar.jpg"><?php
                    } else {
                      ?>
                    <div class="user-info">
                    <img src="<?php echo "customer-avatars/" . $customer['avatar'] ?>">
                    </div>
                    <?php
                    }
              }
            }
          }
              ?>
              <button onclick="" class="btn">Change Profile Image</button>
            </div>
        </div>
    </main>
  </body>
  <footer>
    <nav>
      <a href="#">About Us</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms</a>
      <a href="#">Support</a>
      <a href="contact.html">Contact Us</a>
    </nav>
      <p>?? 2022 Copyright: Circus Team</p>
  </footer>
</html>