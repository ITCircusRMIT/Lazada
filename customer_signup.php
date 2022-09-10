<?php require("user_register.class.php") ?>
<?php
    if(isset($_POST['submit'])) {
        $user = new RegisterUser($_POST['username'], $_POST['password'], $_POST['address']);
    }
?>
<?php
    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $folder = "customer-avatars/";

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];

        move_uploaded_file($fileTmpName, $folder . $fileName);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="customer_signup.css" />
    <title>Customer Sign-up</title>
  </head>

  <body>
    <div class="customer">
      <nav class="nav nav-pills nav-fill">
        <a
          class="nav-link bg-light text-dark rounded-0 rounded-top active"
          aria-current="page"
          href="customer_signup.php">For Customer</a>
        <a class="nav-link text-light" href="vendor_signup.php">For Seller</a>
        <a class="nav-link text-light" href="logistic_signup.php">For Logistic</a>
      </nav>
      <hr size="5px" />
      <div class="login">
        <p>Already member? <a href="customer_login.php">Login here</a></p>
        <h1 class="text-center">Welcome to Lazada !</h1>

        <form action="" method="post" enctype="multipart/form-data" autocomplete="off" id="signup" class="needs-validation">
          <div class="form-field">
            <label class="form-label" for="username">Username</label>
            <input
              class="form-control"
              name="username"
              type="text"
              id="username"
              required
            />
            <small></small>
          </div>
          <div class="form-field">
            <label class="form-label" for="password">Password</label>
            <input
              class="form-control"
              name="password"
              type="password"
              id="password"
              required
            />
            <small></small>
          </div>
          <br />
          <div class="form-field">
            <label class="form-label" for="profile-picture">Profile Picture</label>
            <input type="file" name="file" class="form-control" id="profile-picture" />
          </div>
          <br />

          <div class="form-field">
            <label class="form-label" for="address">Address</label>
            <input
              class="form-control"
              name="address"
              type="text"
              id="address"
              required
            />
            <small></small>
          </div>

          <input class="btn w-100" type="submit" name="submit" value="SIGN UP">
          <p class="error" style="color: #ff0000;"><?php echo @$user->error ?></p>
            <p class="success" style="color: #00E100;"><?php echo @$user->success ?></p>
        </form>
      </div>
      <div class="text-center">
        <img id="i1" src="img/laz lion 2.gif" alt="" />
        <img id="i2" src="img/lazada-white.png" alt="" />
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>