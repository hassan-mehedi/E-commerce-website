<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sell Product</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/footerstyle.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
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

    <!-- Form -->

    <form action="adminInsert.php" method="POST" enctype="multipart/form-data">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <label for="Product">Product name</label>
            <input
              type="text"
              class="form-control"
              id="product_name"
              name="product_name"
              placeholder="Name"
            />
          </div>
          <div class="col-md-5">
            <label for="Product">Product price</label>
            <input
              type="text"
              class="form-control"
              id="product_price"
              name="product_price"
              placeholder="price"
            />
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <label for="Product">In stock</label>
            <input
              type="number"
              class="form-control"
              id="product_stock"
              name="product_stock"
              placeholder="stock"
            />
          </div>
          <div class="col-md-5">
            <label for="Product">Product rating</label>
            <input
              type="text"
              class="form-control"
              id="product_rating"
              name="product_rating"
              placeholder="ratings ex: (1-5)"
              required
              minlength="1"
              maxlength="1"
            />
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="form-group">
              <label for="sel1">Producy type</label>
              <select
                class="form-control"
                id="product_type"
                name="product_type"
              >
                <option>Shirt</option>
                <option>T-shirt</option>
                <option>Pants</option>
                <option>Shoes</option>
                <option>Jewellery</option>
                <option>Watch</option>
                <option>Electronics</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="form-group justify-content-center">
          <label for="image">Submit Image</label>
          <input
            type="file"
            class="form-control-file"
            id="image"
            name="image"
          />
        </div>
      </div>
      <div class="container">
        <div class="justify-content-center">
          <button
            type="submit"
            class="btn btn-primary"
            id="insert"
            name="insert"
          >
            Insert
          </button>
        </div>
      </div>
    </form>
    <!-- Footer -->

    <!-- Site footer -->
    <footer class="site-footer" style="margin-top: 130px;">
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
