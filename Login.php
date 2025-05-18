<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check login credentials
    $sql = "SELECT * FROM users1 WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];         // Store user ID in session
        $_SESSION['username'] = $user['username'];  // Optional
        header("Location: home.html");            // Redirect to profile
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>
