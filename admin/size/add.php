<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $sizeName = !empty($_POST['size-name']) ? htmlspecialchars($_POST['size-name'], ENT_QUOTES, 'UTF-8') : null;

    // Insert size data into the database
    $sql = "INSERT INTO size (size) VALUES ('$sizeName')";

    if (mysqli_query($conn, $sql)) {
        echo "size added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
