<?php
$arr =  $_SESSION["shopping_cart"];
$email = $_SESSION['emailSend'];
$db = mysqli_connect("localhost", "root", "", "ecommerce");
if (!empty($arr)) {
  foreach ($arr as $keys => $values) {
    $pro_id = (int)$values['item_id'];
    $pro_name = $values['item_name'];
    $pro_quan = (int)$values['item_quantity'];
    $pro_price = $values['item_price'];
    $pro_total = number_format((float)$pro_quan * (float)$pro_price, 2);
    $sqlTwo = "INSERT INTO user_history (buyer_email, product_id, product_name, product_quantity, product_price, total) VALUES 
                ('$email', '$pro_id, '$pro_name', '$pro_quan', '$pro_price', '$pro_total')";
    mysqli_query($db, $sqlTwo);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Transaction</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        <li class="active"><a href="HomePageSigned.php">Home</a></li>
        <li><a href="ProductsSigned.php">Products</a></li>
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
                <li><a href="transaction.php">Transaction history</a></li>
                <li><a href="HomePage.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class='container-fluid'>
    <div class='row'>
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th width="25%">Item Name</th>
            <th width="15%">Quantity</th>
            <th width="15%">Price</th>
            <th width="15%">Total</th>
            <th width="15%">Product State</th>
            <th width="5%">Ratings</th>
            <th width="10%">Action</th>
          </tr>
          <?php
          if (!empty($arr)) {
            foreach ($arr as $keys => $values) {
              $pro_id = (int)$values['item_id'];
              $pro_name = $values['item_name'];
              $pro_quan = (int)$values['item_quantity'];
              $pro_price = $values['item_price'];
              $pro_total = number_format((float)$pro_quan * (float)$pro_price, 2);
          ?>
              <tr>
                <td><?php echo $pro_name; ?></td>
                <td><?php echo $pro_quan; ?></td>
                <td>$ <?php echo $pro_price; ?></td>
                <td>$ <?php echo $pro_total; ?></td>
                <td><?php echo 'Default'; ?></td>
                <td>
                  <form action="transaction.php">
                    <input type="number" placeholder="rate" />
                  </form>
                </td>
                <td>
                  <input type="submit" value="submit" />
                </td>
              </tr>
          <?php
            }
          }
          ?>

        </table>
      </div>
    </div>
  </div>

  <!-- Footer -->

  <footer class="site-footer" style="position:absolute; bottom:0; left:0; right:0;">
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