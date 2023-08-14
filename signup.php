<?php
	$username = $_POST['Username'];
	$gender = $_POST['gender'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];

	// Database connection
	$conn = new mysqli('localhost_name','your_username','your_password','database_name');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$sql = "INSERT INTO users (Username, Gender, Email, Password) VALUES ('$username','$gender','$email','$password')";
		if (mysqli_query($conn, $sql)) {
			header("Location: login.html");
            exit;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$conn->close();
	}
?>