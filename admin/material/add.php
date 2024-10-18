<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $materialName = !empty($_POST['material-name']) ? htmlspecialchars($_POST['material-name'], ENT_QUOTES, 'UTF-8') : null;

    // Insert material data into the database
    $sql = "INSERT INTO material (material) VALUES ('$materialName')";

    if (mysqli_query($conn, $sql)) {
        echo "material added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
