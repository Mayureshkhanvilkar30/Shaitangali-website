<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users1 WHERE username = '$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!-- HTML Section -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="icon" type="png" href="icon.png">
  <style>
    body {
       margin: 0;
      padding: 0;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 130vh;
      background-image: url('profile.png');
      margin: 0;
      font-family: Arial;
    }
    .navbar {
      background-color: transparent;
      padding: 25px;
      display: flex;
      align-items: right;
      justify-content: right;
    }
    .navbar a {
      color: gold;
      padding: 25px;
      text-decoration: none;
      font-weight: bold;
    }
    .navbar a:hover {
      text-decoration: underline;
    }
    .profile-container {
      max-width: 600px;
      margin: 40px auto;
      text-align: center;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
    }
    .profile-container img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #555;
    }
    input[type="text"], input[type="file"] {
      padding: 8px;
      width: 80%;
      margin: 10px 0;
    }
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #333;
      color: white;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }
    input[type="submit"]:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

<div class="navbar">
  <a href="home.html">Home</a>
  <a href="#">Profile</a>
  <a href="#">Birthday</a>
  <a href="#">Memory</a>
  <a href="login.html">Logout</a>
</div>

<div class="profile-container">
  <h2>User Profile</h2>
  <form action="update_profile.php" method="POST" enctype="multipart/form-data">
    <img src="<?php echo $user['profile_pic'] ? $user['profile_pic'] : 'uploads/default.png'; ?>" alt="Profile Photo"><br>
    
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
    <input type="text" value="<?php echo $user['email']; ?>" disabled><br>
    <input type="file" name="profile_pic"><br>
    
    <input type="submit" value="Update Profile">
  </form>
</div>

</body>
</html>

