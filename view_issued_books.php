<?php
session_start();
include("db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Fetch issued book data with book details
$sql = "SELECT issued_books.id, books.title, books.author, issued_books.student, issued_books.date_issued 
        FROM issued_books 
        JOIN books ON issued_books.book_id = books.id 
        ORDER BY issued_books.date_issued DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Issued Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>📚 Issued Books List</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Issued To (Student)</th>
                <th>Date Issued</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['student'] . "</td>";
                    echo "<td>" . $row['date_issued'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No books have been issued yet.</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="issue_book.php">📖 Issue Another Book</a> |
        <a href="index.php">🏠 Back to Dashboard</a>
    </div>
</body>
</html>
