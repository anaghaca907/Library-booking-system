<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == "admin" && $pass == "admin123") {
        $_SESSION['admin'] = $user;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid login credentials!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Library Admin Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>

