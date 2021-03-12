<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/footerstyle.css" />
  <script src="assets/check.js"></script>
  <?php include "boot.html"; ?>
</head>

<body>
  <!-- Navbar -->

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">SMEBD</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="HomePage.php">Home</a></li>
        <li><a href="Products.php">Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" action="Search.php" method="POST">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" required />
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" name="searchButton">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
        <li>
          <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
        </li>
        <li>
          <a href="Signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
        </li>
        <li>
          <a href="logIn.html"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Product Image -->

  <div class='container-fluid'>
    <h3>Popular</h3>
    <div class='row'>
      <?php
      $db = mysqli_connect("localhost", "root", "", "ecommerce");
      $sql = "SELECT * FROM admin";
      $result = mysqli_query($db, $sql);
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        $image_id = $row['product_id'];
        if ($i == 3) {
          break;
        }
        echo "<div class='col-md-4'>";
        echo "<div class='thumbnail'>";
        echo "<a href='display.php?imageID= $image_id'>";
        echo "<img
                src='images/" . $row['product_image'] . "'
                alt='" . $row['product_name'] . "'
                style='width: 100%; height:350px;'
              />";
        echo "<div class='caption'>";
        echo "<p>" . $row['product_name'] . "</p>";
        echo "<p>Price: " . $row['product_price'] . "</p>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
        $i++;
      }
      ?>
    </div>
  </div>
  <!-- Categories -->

  <div class="container-fluid">
    <h3>Categories</h3>
    <div class="row">
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="Shirts.php">
            <img src="images/shirtNew.jpg" alt="Shirt" style="width: 100%; height:135px;" />
            <div class="caption">
              <p>Shirts</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="T-shirts.php">
            <img src="images/tshirtNew.jpg" alt="T-shirt" style="width: 100%; height:135px;" />
            <div class="caption">
              <p>T-shirts</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="Pants.php">
            <img src="images/pant.jpg" alt="Pants" style="width: 100%; height:135px;" />
            <div class="caption">
              <p>Pants</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="Shoes.php">
            <img src="images/shoe.jpeg" alt="Shoe" style="width: 100%; height:135px;" />
            <div class="caption">
              <p>Shoes</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="Watch.php">
            <img src="images/watch_new.jpg" alt="Watch" style="width: 100%; height:135px;" />
            <div class="caption">
              <p>Watch</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="Jewellery.php">
            <img src="images/ring.jpg" alt="Utilities" style="width: 100%; height:135px;" />
            <div class="caption">
              <p>Jewellery</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- All products -->

  <div class='container-fluid'>
    <h3>Random Products</h3>
    <div class='row'>
      <?php

      $db = mysqli_connect("localhost", "root", "", "ecommerce");
      $sql = "SELECT * FROM admin ORDER BY product_stock ASC";
      $result = mysqli_query($db, $sql);
      $i = 1;
      while ($row = mysqli_fetch_array($result)) {
        $image_id = $row['product_id'];
        if ($i > 12)
          break;
        echo "<div class='col-md-2'>";
        echo "<div class='thumbnail'>";
        echo "<a href='display.php?imageID= $image_id'>";
        echo "<img
                src='images/" . $row['product_image'] . "'
                alt='" . $row['product_name'] . "'
                style='width: 100%; height:250px;'
              />";
        echo "<div class='caption'>";
        echo "<p>" . $row['product_name'] . "</p>";
        echo "<p>Price: " . $row['product_price'] . "</p>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
        $i++;
      }

      ?>
    </div>
  </div>

  <!-- Footer -->

  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p>SMEBD puts the utmost focus on empowering its sellers,<br> they form the backbone of our marketplace.
          </p>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6>Partners</h6>
          <ul class="footer-links">
            <li><a href="https://www.daraz.com.bd/">Daraz</a></li>
            <li>
              <a href="https://evaly.com.bd/">Evaly</a>
            </li>
            <li>
              <a href="https://www.rokomari.com/">Rokomari</a>
            </li>
            <li>
              <a href="https://bikroy.com/">Bikroy</a>
            </li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Contact Information</h6>
          <ul class="footer-links">
            <li><b>Phone Num:</b> +8801796632249, +881674420630</li>
            <li><b>Email:</b> digitalprocharok@gmail.com</li>
            <li><b>Address:</b> 1044, Khilbarirtek Paschim Para, Khilbarirtek, Gulshan Model Town -1212, Badda, Dhaka</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>