<?php

$db = mysqli_connect("localhost", "root", "", "ecommerce");

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "select * from user_info where email = '" . $email . "' and password = '" . $password . "' 
				limit 1";
	$result = mysqli_query($db, $sql);

	if (mysqli_num_rows($result) == 1) {
		session_start();
		$_SESSION['emailSend'] = $email;
		if ($email == "deliveryman@gmail.com") {
			include 'delivery.php';
		} else {
			include 'HomePageSigned.php';
		}
		exit();
	} else {
		echo "<script>alert('Invalid username or password');</script>";
		include 'LogIn.html';
	}
}
?>
