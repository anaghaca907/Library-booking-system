<?php
include("db.php");
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['return'])) {
    $book_id = $_POST['book_id'];
    $student_name = $_POST['student_name'];

    $sql = "DELETE FROM issued_books WHERE book_id='$book_id' AND student_name='$student_name'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Book Returned Successfully!');</script>";
    } else {
        echo "<script>alert('Error Returning Book');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Return Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
<h2>Return Book</h2>
<form method="post">
    <input type="text" name="book_id" placeholder="Book ID" required><br>
    <input type="text" name="student_name" placeholder="Student Name" required><br>
    <button name="return">Return Book</button>
</form>
<br>
<a href="index.php">⬅ Back to Dashboard</a>
</div>
</body>
</html>
