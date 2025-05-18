<?php
$conn = new mysqli('localhost', 'root', '', 'login_db');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$new_password = $_POST['password'];


$sql = "UPDATE users1 SET password='$new_password' WHERE email='$email'";

if ($conn->query($sql)== TRUE) {
    
    header("Location: login.html");
    exit();
} else {
    echo "Error updating password:".$conn->error;
}

$conn->close();
?> 