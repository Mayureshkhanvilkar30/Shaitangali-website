<?php
$conn = new mysqli('localhost', 'root', '', 'login_db');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users1 (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    
    $to = $email;
    $subject = "Welcome to Shaitangali!";
    $message = "Hello $username,\n\nWelcome to Shaitangali!\nHere is your login info:\nUsername: $username\nPassword: $password\n\nThank you!";
    $headers = "From: editormayuresh0130@gmail.com";

    mail($to, $subject, $message, $headers);


    header("Location: login.html");  
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>