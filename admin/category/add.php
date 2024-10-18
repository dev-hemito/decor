<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $categoryName = !empty($_POST['category-name']) ? htmlspecialchars($_POST['category-name'], ENT_QUOTES, 'UTF-8') : null;

    // Insert category data into the database
    $sql = "INSERT INTO category (category) VALUES ('$categoryName')";

    if (mysqli_query($conn, $sql)) {
        echo "Category added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>