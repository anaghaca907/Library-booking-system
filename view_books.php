<?php
session_start();
include("db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Fetch all books from database
$sql = "SELECT * FROM books ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>📚 All Books in Library</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No books found.</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="add_book.php">➕ Add Another Book</a> |
        <a href="index.php">🏠 Back to Dashboard</a>
    </div>
</body>
</html>
