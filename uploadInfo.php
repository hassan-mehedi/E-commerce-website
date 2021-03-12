<?php
$warn = "";
if (isset($_POST['create_account'])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $db = mysqli_connect("localhost", "root", "", "ecommerce");

    $str = rand();
    $user_id = md5($str);
    $image = $_FILES['image']['name'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $name = $firstName . ' ' . $lastName;
    $acc_number = $_POST['accNumber'];
    $acc_balance = rand(30000, 50000);

    $sql = "INSERT INTO user_info (user_id, name, email, password, number, address, image) VALUES 
            ('$user_id', '$name', '$email', '$password', '$phoneNumber', '$address', '$image')";

    $sqlTwo = "INSERT INTO bank_balance (user_id, acc_number, acc_balance) VALUES 
            ('$user_id', '$acc_number', '$acc_balance')";

    mysqli_query($db, $sql);
    mysqli_query($db, $sqlTwo);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        session_start();
        $_SESSION['emailSend'] = $email;
        include 'HomePageSigned.php';
    } else {
        $warn = "unsuccessful";
        echo $warn;
    }
}
