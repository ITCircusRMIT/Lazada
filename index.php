<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: customer_login.php");
        exit();
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header("Location: customer_login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en-Uk">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style1.css"/>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <script
      src="https://kit.fontawesome.com/c23e7a09a4.js"
      crossorigin="anonymous"
    ></script>
    <title>Lazada</title>
  </head>

  <body>
    <header>
      <div class="header container">
        <div class="logo">
          <a href="index.php"><img src="img/lazada-logo-white.png"/></a>
        </div>
        <div class="search">
          <form class="search-bar">
            <input type="text" placeholder="Search..." name="search" />
            <button type="submit">
              <span class="material-symbols-outlined">search</span>
            </button>
          </form>
        </div>
        <nav>
          <img src="img/shopping-basket.png" />
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
              <hr/>

              <a href="customer_account.php" class="sub-menu-link">
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
    <main>
      <section class="top-main">
        <div class="cate-slide">
          <div class="category">
            <nav>
              <a href="#" class="cate-item"
                >Electronic Devices<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Electronic Accessories<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >TV & Home Appliances<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Health & Beauty<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Babies & Toys<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Groceries & Pets<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Home & Lifestyle<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a
                href="https://www.youtube.com/watch?v=e9mVfv3b-4E"
                target="_blank"
                class="cate-item"
                >Women <img src="img/pitr_Coffee_cup_icon.png" /><span
                  class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Men's Fashion & Accessories<span
                  class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Kid's Fashion & Accessories<span
                  class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Sports & Travel<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
              <a href="#" class="cate-item"
                >Automotive & Motorcycles<span class="material-symbols-outlined"
                  >double_arrow</span
                ></a
              >
            </nav>
          </div>
          <div class="slider">
            <div class="slides">
              <input type="radio" name="radio-btn" id="radio1" />
              <input type="radio" name="radio-btn" id="radio2" />
              <input type="radio" name="radio-btn" id="radio3" />
              <input type="radio" name="radio-btn" id="radio4" />
              <input type="radio" name="radio-btn" id="radio5" />
              <div class="slide first">
                <img
                  src="img\182494-10-hoat-dong-sinh-nhat-lazada.jpg"
                  alt=""
                />
              </div>
              <div class="slide">
                <img src="img\lazada-6-6-6.jpg.webp" alt="" />
              </div>
              <div class="slide">
                <img src="img\lazada-12.12.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="img\maxresdefault.jpg" alt="" />
              </div>
              <div class="slide">
                <img
                  src="img\top-12-thuong-hieu-sieu-uu-dai-dip-khuyen-mai-lazada-1212.jpg"
                  alt=""
                />
              </div>
              <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
                <div class="auto-btn5"></div>
              </div>
            </div>
            <div class="navigation-manual">
              <label for="radio1" class="manual-btn"></label>
              <label for="radio2" class="manual-btn"></label>
              <label for="radio3" class="manual-btn"></label>
              <label for="radio4" class="manual-btn"></label>
              <label for="radio5" class="manual-btn"></label>
            </div>
          </div>
          <script type="text/javascript">
            var counter = 1;
            setInterval(function () {
              document.getElementById("radio" + counter).checked = true;
              counter++;
              if (counter > 5) {
                counter = 1;
              }
            }, 5000);
          </script>
        </div>
      </section>

      <section id="feature">
        <a href="#" style="text-decoration: none"
          ><div class="feature-box">
            <img src="img/TB15wgLWBr0gK0jSZFnXXbRRXXa.png" />
            <div class="title">
              <h1 class="special">LazMall</h1>
            </div>
          </div></a
        >
        <a href="#" style="text-decoration: none"
          ><div class="feature-box">
            <img src="img/TB1UiNthUT1gK0jSZFhXXaAtVXa.png" />
            <div class="title">
              <h1 class="special">Vouchers</h1>
            </div>
          </div></a
        >
        <a href="#" style="text-decoration: none"
          ><div class="feature-box">
            <img src="img/TB1DahvhO_1gK0jSZFqXXcpaXXa.png" />
            <div class="title">
              <h1 class="particular">Top Up & eCoupon</h1>
            </div>
          </div></a
        >
        <a href="#" style="text-decoration: none"
          ><div class="feature-box">
            <img src="img/TB1CDWbBYj1gK0jSZFuXXcrHpXa.png" />
            <div class="title">
              <h1 class="special">LazGlobal</h1>
            </div>
          </div></a
        >
      </section>

      <section id="advertisment">
        <div class="advertisment-box">
          <a href="#"
            ><img src="img/7fec4986-3e06-43ed-b061-37ede9492149.png"
          /></a>
        </div>
        <div class="advertisment-box">
          <a href="#"
            ><img src="img/6f9c62de-baed-4b2d-a3f8-acb400602154.png"
          /></a>
        </div>
        <div class="advertisment-box">
          <a href="#"
            ><img src="img/e18b9151-748e-4de5-82dc-93d85aa809f0.png"
          /></a>
        </div>
      </section>

      <section id="product1">
        <div class="product-container">
          <div class="title-box">
            <h2>Popular</h2>
          </div>
          <div class="view">
          <?php $css = file_get_contents('style1.css');
                echo '<style>'.$css.'</style>';
              $product_data = file_get_contents('vendor1.json');
              $products = json_decode($product_data, true);
          
              if(!empty($products)){
                foreach($products as $product){
                  ?>
                  <div class="product-info" onclick="toggleAddToCart()">
                      <div class="product-image">
                        <img src="<?php echo "product-images/" . $product['productImage'] ?>">
                      </div>
                      <div class="product-details">
                        <h5><?php echo $product['productName']; ?></h5>
                        <p><?php echo $product['productDescription']; ?></p>
                        <h4><?php echo $product['productPrice']; ?> VND</h4>
                      </div>
                      <div class="add-to-cart">
                          <button class="add-to-cart-btn" onclick="">Add to cart</button>
                      </div>
                  </div>
                <?php
              }
            }
          ?>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <nav>
        <a href="#">About Us</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms</a>
        <a href="#">Support</a>
        <a href="#">Contact Us</a>
      </nav>
      <p>© 2022 Copyright: Circus Team</p>
    </footer>
  </body>
</html>