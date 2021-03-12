<!DOCTYPE html>
<html lang="en">

<head>
  <title>Display</title>
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
        <li><a href="HomePageSigned.php">Home</a></li>
        <li class="active"><a href="ProductsSigned.php">Products</a></li>
        <li><a href="Sell.php">Sell</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" action="SearchSigned.php" method="POST">
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
          <a href="cartSigned.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
        </li>
        <li>
          <?php
          session_start();
          $email = $_SESSION['emailSend'];
          $db = mysqli_connect("localhost", "root", "", "ecommerce");
          $sql = "select * from user_info where email = '" . $email . "' limit 1";
          $result = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($result);
          echo "<div style='color: white;'>";
          echo "<img
                src='images/" . $row['image'] . "'
                alt='" . $row['name'] . "'
                width='50px'
                height='50px'
                style='border-radius: 50%;'
              />";
          echo "</div>";
          ?>
        </li>
        <li>
          <div>
            <div class="btn-group" style="margin-left: 10px; margin-top:8px;">
              <button type="button" class="btn">
                <?php
                echo "<span>" . $row['name'] . "</span>";
                ?>
              </button>
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="HomePage.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Product Image -->
  <?php
  $id = $_GET["imageID"];
  $db = mysqli_connect("localhost", "root", "", "ecommerce");
  $sql = "SELECT * FROM admin where product_id = '" . $id . "'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <img src='images/<?php echo $row['product_image']; ?>' alt='<?php echo $row['product_name']; ?>' style='width: 100%; height:350px;' />
      </div>
      <div class="col-md-7">
        <h2><?php echo $row['product_name']; ?></h2>
        <p>Ratings:
          <?php
          $loop = $row['product_rating'];
          $remains = 5 - $loop;
          for ($i = 0; $i < $loop; $i++) {
          ?>
            <span class="glyphicon glyphicon-star"></span>
          <?php
          }
          for ($i = 0; $i < $remains; $i++) {
          ?>
            <span class="glyphicon glyphicon-star-empty"></span>
          <?php
          }
          ?>
        </p>
        <p class="price"><?php echo $row['product_price']; ?></p>
        <p>In stock: <?php echo $row['product_stock']; ?></p>
        <form method="post" action="cartSigned.php?action=add&id=<?php echo $id; ?>">
        <label>Quantity:</label>
            <?php
            $stock = $row['product_stock'];
            if ($stock == 0) {
              echo "<strong> Not available </strong>";
            } else if($stock>0){
              echo "<select class='quan' id='product_type' name='product_quantity'>";
              for ($i = 1; $i <= $stock; $i++) {
                echo "<option>" . $i . "</option>";
              }
            }
            ?>
              </select><br><br>
          <input type="submit" name="add_to_cart" class="form-control btn btn-success" value="Add to Cart">
        </form>
      </div>
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