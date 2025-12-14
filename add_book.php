<?php
include("db.php"); // connect to database
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];

    // insert data into database
    $sql = "INSERT INTO books (title, author) VALUES ('$title', '$author')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Book added successfully!');</script>";
    } else {
        echo "<script>alert('❌ Error adding book');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
    <h2>Add New Book</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Book Title" required><br>
        <input type="text" name="author" placeholder="Author Name" required><br>
        <button type="submit" name="add">Add Book</button>
    </form>
</div>
</body>
</html>
