<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>📚 Library Management System</h1>
    <a href="add_book.php">➕ Add Book</a>
    <a href="view_books.php">📖 View Books</a>
    <a href="issue_book.php">📦 Issue Book</a>
    <a href="view_issued_books.php">📋 View Issued</a>
    <a href="return_book.php">🔙 Return Book</a>
    <a href="logout.php">🚪 Logout</a>
</div>
</body>
</html>

