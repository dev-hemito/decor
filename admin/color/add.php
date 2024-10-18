<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $colorName = !empty($_POST['color-name']) ? htmlspecialchars($_POST['color-name'], ENT_QUOTES, 'UTF-8') : null;

    // Insert color data into the database
    $sql = "INSERT INTO color (color) VALUES ('$colorName')";

    if (mysqli_query($conn, $sql)) {
        echo "color added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
