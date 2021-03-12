<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shoe</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="stylesheet" href="assets/footerstyle.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <h3>All Products (Shoe)</h3>
    <div class='row'>
      <?php
      $db = mysqli_connect("localhost", "root", "", "ecommerce");
      $sql = "SELECT * FROM admin WHERE product_type='Shoes'";
      $result = mysqli_query($db, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $image_id = $row['product_id'];
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