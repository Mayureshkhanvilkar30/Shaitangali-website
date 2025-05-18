<?php
session_start();
include 'db_connect.php';

$user_id = 1; // Replace with $_SESSION['id'] in real app
$username = $_POST['username'];

// File upload
if ($_FILES['profile_pic']['name']) {
    $target = "uploads/" . basename($_FILES['profile_pic']['name']);
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
    $sql = "UPDATE users1 SET username='$username', profile_pic='$target' WHERE id=$user_id";
} else {
    $sql = "UPDATE users1 SET username='$username' WHERE id=$user_id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating profile: " . $conn->error;
}
?>
