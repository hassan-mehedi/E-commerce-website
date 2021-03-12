<?php

$warn = "";

if (isset($_POST['insert'])) {
    $target = "images/".basename($_FILES['image']['name']);
    $db = mysqli_connect("localhost", "root", "", "ecommerce");

    $product_image = $_FILES['image']['name'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_rating = $_POST['product_rating'];
    $product_stock = $_POST['product_stock'];
    $product_type = $_POST['product_type'];

    $sql = "INSERT INTO admin (product_name, product_image, product_rating, product_price, product_stock, product_type) VALUES 
            ('$product_name', '$product_image', '$product_rating', '$product_price', '$product_stock', '$product_type')";
    
    mysqli_query($db, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $warn = "<script>alert('Your product is showed for sell');</script>";
        echo $warn;
        include 'Sell.php';
        exit();
    }
    else{
        $warn = "<script>alert('Error');</script>";
        echo $warn;
        include 'Sell.php';
        exit();
    }
}
