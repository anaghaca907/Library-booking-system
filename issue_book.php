<?php
session_start();
include("db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Fetch books for dropdown
$books = mysqli_query($conn, "SELECT * FROM books ORDER BY title ASC");

// When form is submitted
if (isset($_POST['issue'])) {
    $book_id = $_POST['book_id'];
    $student = $_POST['student'];

    if (!empty($book_id) && !empty($student)) {
        $query = "INSERT INTO issued_books (book_id, student) VALUES ('$book_id', '$student')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('✅ Book issued successfully!');</script>";
        } else {
            echo "<script>alert('❌ Error issuing book!');</script>";
        }
    } else {
        echo "<script>alert('⚠️ Please fill all fields.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
    <h2>📖 Issue a Book</h2>
    <form method="post">
        <label>Select Book:</label><br>
        <select name="book_id" required>
            <option value="">-- Select Book --</option>
            <?php
            while ($row = mysqli_fetch_assoc($books)) {
                echo "<option value='" . $row['id'] . "'>" . $row['title'] . " by " . $row['author'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="text" name="student" placeholder="Enter Student Name" required><br>
        <button type="submit" name="issue">Issue Book</button>
    </form>
    <br>
    <a href="index.php">🏠 Back to Dashboard</a>
</div>
</body>
</html>
