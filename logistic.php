<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: logistic_login.php");
        exit();
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header("Location: logistic_login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lazada</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;500;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="logistic.css"/>
  </head>
  <body>
    <header>
      <div class="header container">
        <div class="logo">
          <a href="index.php"><img src="img/lazada-logo-white.png"/></a>
        </div>

        <nav>
          <img src="img/user.png" class="user-pic" onclick="toggleMenu()" />

          <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
            <?php
              $customer_data = file_get_contents('user_account.json');
              $customers = json_decode($customer_data, true);

              if (!empty($customers)) {
                foreach ($customers as $customer) {
                  if ($customer['username'] == $_SESSION['user']) {
                    if ($customer['avatar'] == "") {
                      ?>
                        <div class="user-info">
                        <img src="img/default avatar.jpg">
                        <h3><?php echo $_SESSION['user']; ?></h3>
                        </div>
                      <?php
                    } else {
                      ?>
                    <div class="user-info">
                    <img src="<?php echo "customer-avatars/" . $customer['avatar'] ?>">
                    <h3><?php echo $_SESSION['user']; ?></h3>
                    </div>
                    <?php
                    }
              }}}
              ?>
              <hr />

              <a href="logistic_account.php" class="sub-menu-link">
                <img src="img/profile.png" />
                <p>View Profile</p>
                <span>></span>
              </a>
              <a href="#" class="sub-menu-link">
                <img src="img/setting.png" />
                <p>Setting & Privacy</p>
                <span>></span>
              </a>
              <a href="#" class="sub-menu-link">
                <img src="img/help.png" />
                <p>Support</p>
                <span>></span>
              </a>
              <a href="?logout" class="sub-menu-link">
                <img src="img/logout.png" />
                <p>Logout</p>
                <span>></span>
              </a>
            </div>
          </div>
        </nav>
        <script>
          let subMenu = document.getElementById("subMenu");

          function toggleMenu() {
            subMenu.classList.toggle("open-menu");
          }
        </script>
      </div>
    </header>
    <div class="container">
      <div class="section-filter">
        <div class="section-left">
          <a href="#">All</a>
        </div>
        <div class="section-right">
          <button class="section-title">* Filter</button>
          <input type="text" class="section-search" placeholder="Search..." />
        </div>
      </div>
      <div class="product">
        <div class="product-list">
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
          <div class="product-item">
            <div class="product-item-information">
              <div class="product-item-thumb">
                <div class="product-item-img">
                  <img src="img/products-1.jpg" alt="" />
                </div>
                <span class="product-item-date">2022-30-08</span>
              </div>
              <div class="product-item-detail">
                <div class="product-item-name">Customer</div>
                <div class="product-item-phone">0899492264</div>
                <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="product-item-view">
              <button class="product-item-view-button">View</button>
            </div>
          </div>
        </div>
        <div class="product-detail">
          <div class="product-detail-header">
            <div class="product-detail-information">
              <div class="product-item-name">Customer</div>
              <div class="product-item-phone">0899492264</div>
              <div class="product-item-address">Quận Cam, Hồ Chí Minh</div>
            </div>
            <div class="product-detail-estimated">Giao hàng 1 ngày</div>
          </div>
          <div class="product-detail-body">
            <div class="product-detail-body-item">
              <div class="product-detail-img">
                <img src="img/products-1.jpg" alt="" />
              </div>
              <div class="product-detail-show">
                <h5 class="product-detail-title">Customer</h5>
                <p class="product-detail-desc">Product</p>
              </div>
            </div>
            <div class="product-detail-body-item">
              <div class="product-detail-img">
                <img src="img/products-1.jpg" alt="" />
              </div>
              <div class="product-detail-show">
                <h5 class="product-detail-title">Customer</h5>
                <p class="product-detail-desc">Product</p>
              </div>
            </div>
            <div class="product-detail-body-item">
              <div class="product-detail-img">
                <img src="img/products-1.jpg" alt="" />
              </div>
              <div class="product-detail-show">
                <h5 class="product-detail-title">Customer</h5>
                <p class="product-detail-desc">Product</p>
              </div>
            </div>
            <div class="product-detail-body-item">
              <div class="product-detail-img">
                <img src="img/products-1.jpg" alt="" />
              </div>
              <div class="product-detail-show">
                <h5 class="product-detail-title">Customer</h5>
                <p class="product-detail-desc">Product</p>
              </div>
            </div>
            <div class="product-detail-body-item">
              <div class="product-detail-img">
                <img src="img/products-1.jpg" alt="" />
              </div>
              <div class="product-detail-show">
                <h5 class="product-detail-title">Customer</h5>
                <p class="product-detail-desc">Product</p>
                <p class="product-price-desc">Product</p>
              </div>
            </div>
            <div class="product-detail-body-item">
              <div class="product-detail-img">
                <img src="img/products-1.jpg" alt="" />
              </div>
              <div class="product-detail-show">
                <h5 class="product-detail-title">Customer</h5>
                <p class="product-detail-desc">Product</p>
              </div>
            </div>
          </div>
          <div class="product-detail-action">
            <div class="product-detail-action-right">
              <button class="product-detail-btn product-detail-btn-warning">
                Contact
              </button>
            </div>
            <div class="product-detail-action-right">
              <button class="product-detail-btn product-detail-btn-danger">
                Cancel
              </button>
              <button class="product-detail-btn product-detail-btn-success">
                Delivered
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>