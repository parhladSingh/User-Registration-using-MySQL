<?php
 $username = $_POST['Username'];
 $password = $_POST['Password'];
 $check = 1;

 // Database connection
 $conn = new mysqli('localhost_name','your_username','your_password','database_name');
 if($conn->connect_error){
     echo "$conn->connect_error";
     die("Connection Failed : ". $conn->connect_error);
 } else {
     $sql = "Select * from `users` where Username='$username' and Password='$password'";
     $rowcount = mysqli_num_rows(mysqli_query($conn, $sql));
     if (mysqli_query($conn, $sql)) {
        if($rowcount == 1){
            $check = 1;
        } else{
            $check = 0;
        }
        
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
     $conn->close();
 }

if($check){
    header("Location: login.png");
    exit;
}
else{
    header("Location: error.png");
    exit;
}

?>