<?php require("vendor_login.class.php") ?>
<?php
    if (isset($_POST['submit'])) {
        $user = new LoginVendor($_POST['username'], $_POST['password']);
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
    <link rel="stylesheet" href="vendor_login.css" />
    <title>Vendor Log-in</title>
  </head>

  <body>
    <div class="vendor">
      <nav class="nav nav-pills nav-fill">
        <a class="nav-link text-light" href="customer_login.php">For Customer</a>
        <a
          class="nav-link bg-light text-dark rounded-0 rounded-top active"
          aria-current="page"
          href="vendor_login.php"
          >For Seller
        </a>
        <a class="nav-link text-light" href="logistic_login.php">For Logistic</a>
      </nav>
      <hr size="5px" />
      <div class="login">
        <p>New member? <a href="vendor_signup.php">Register here</a></p>
        <h1 class="text-center">Hi, please login !</h1>

        <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation">
          <div class="form-group was-validated">
            <label class="form-label" for="text">Username</label>
            <input class="form-control" type="text" name="username" id="username" required />
            <div class="invalid-feedback">Please enter your username</div>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="password">Password</label>
            <input
              class="form-control"
              type="password"
              name="password"
              id="password"
              required
            />
            <div class="invalid-feedback">Please enter your password</div>
          </div>
          <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" id="check" />
            <label class="form-check-label" for="check">Remember me</label>
          </div>
          <input class="btn w-100" type="submit" name="submit" value="LOG IN"/>
          <p class="error" style="color: #ff0000;"><?php echo @$user->error ?></p>
          <p class="success" style="color: #00E100;"><?php echo @$user->success ?></p>
        </form>
      </div>
      <div class="text-center">
        <img src="img/seller.png"/>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>