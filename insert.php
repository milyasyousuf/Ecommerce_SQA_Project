<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

	$sql="select * from users where (email='$email');";
	$res=$mysqli->query($sql);
	if (mysqli_num_rows($res) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($res);
		if($email==$row['email'])
		{
			echo "Email already exists";
			header("Refresh: 3; url=register.php");
		}
	}
	else { //here you need to add else condition
		if($mysqli->query("INSERT INTO users (fname, lname, address, city, pin, email, password) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd')")){
			echo 'Registration Success!!';
			header("Refresh: 3; url=login.php");
		} else {
			echo 'Registration Failure!!';
			header ("Refresh: 3; url=register.php");
		}
	}

?>
