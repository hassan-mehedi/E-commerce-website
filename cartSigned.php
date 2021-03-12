<?php
session_start();
$email = $_SESSION['emailSend'];
$connect = mysqli_connect("localhost", "root", "", "ecommerce");

if (isset($_POST["add_to_cart"])) {
  $id = $_GET["id"];
  $query = "SELECT * FROM admin where product_id = '" . $id . "'";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_array($result);
  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'      =>  $_GET["id"],
        'item_name'      =>  $row["product_name"],
        'item_price'    =>  $row["product_price"],
        'item_quantity'    =>  $_POST["product_quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    } else {
      echo '<script>alert("Item Already Added")</script>';
    }
  } else {
    $item_array = array(
      'item_id'      =>  $_GET["id"],
      'item_name'      =>  $row["product_name"],
      'item_price'    =>  $row["product_price"],
      'item_quantity'    =>  $_POST["product_quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
  if ($_GET["action"] == "deleteAll") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      unset($_SESSION["shopping_cart"][$keys]);
      echo '<script>alert("All Item Removed")</script>';
      echo '<script>window.location="cartSigned.php"</script>';
    }
  }
  if ($_GET["action"] == "logout") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      unset($_SESSION["shopping_cart"][$keys]);
      echo '<script>alert("All Item Removed from cart")</script>';
      echo '<script>window.location="HomePage.php"</script>';
    }
  }
  if ($_GET["action"] == "buyAll") {

    $total = $_GET["total"];

    $queryUse = "SELECT * FROM user_info where email = '" . $email . "'";
    $con = mysqli_query($connect, $queryUse);
    $getRow = mysqli_fetch_array($con);
    $user_id = $getRow["user_id"];

    $queryTwo = "SELECT * FROM bank_balance where user_id = '" . $user_id . "'";
    $secondCon = mysqli_query($connect, $queryTwo);
    $rowTwo = mysqli_fetch_array($secondCon);
    $balance = $rowTwo["acc_balance"];
    $balance = $balance - $total;

    $queryThree = "UPDATE bank_balance SET acc_balance='" . $balance . "' WHERE user_id='" . $user_id . "'";
    mysqli_query($connect, $queryThree);
    echo  "<script>alert('Product was successfully bought')</script>";

    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      $id = $values["item_id"];
      $bought = $values["item_quantity"];

      $search = "SELECT * FROM admin where product_id = '" . $id . "'";
      $searchCon = mysqli_query($connect, $search);
      $res = mysqli_fetch_array($searchCon);
      $stock = $res["product_stock"];

      $new_ammount = $stock - $bought;

      $updateAmount = "UPDATE admin SET product_stock='" . $new_ammount . "' WHERE product_id='" . $id . "'";
      $updateQuery = mysqli_query($connect, $updateAmount);
      unset($_SESSION["shopping_cart"][$keys]);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cart</title>
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
                <li><a href="cartSigned.php?action=logout">Log Out</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Product Image -->

  <div class='container-fluid'>
    <div class='row'>
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if (!empty($_SESSION["shopping_cart"])) {
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
          ?>
              <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td>$ <?php echo $values["item_price"]; ?></td>
                <td>$ <?php echo number_format((float)$values["item_quantity"] * (float)$values["item_price"], 2); ?></td>
                <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
              </tr>
            <?php
              $total = $total + ((float)$values["item_quantity"] * (float)$values["item_price"]);
            }
            ?>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td align="left">$ <?php echo number_format($total, 2); ?></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td align="center"><a href="cartSigned.php?action=deleteAll"><span class="text-danger">Remove All</span></a></td>
              <td align="center"><a href="cartSigned.php?action=buyAll&total=<?php echo $total; ?>"><span class="text-success">Buy</span></a></td>
            </tr>
          <?php
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