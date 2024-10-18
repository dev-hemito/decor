<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $productID = !empty($_POST['id']) ? $_POST['id'] : null;

    // Check if productID is valid, perform additional validation if needed

    $uploadDir = '../images/'; // Set your gallery upload directory

    // Get the file details
    $files = $_FILES['image'];

    // Initialize an array to store uploaded file names
    $imageNames = [];

    // Loop through each file

    foreach ($files['name'] as $key => $fileName) {
        $fileTmpName = $files['tmp_name'][$key];

        // Generate a unique file name based on current time and original file name
        $uniqueFileName = time() . '_' . str_replace(' ', '_', $fileName);

        // Construct the target file path
        $targetFilePath = $uploadDir . $uniqueFileName;

        // Upload the file to the target path
        if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            // Insert product data into the database for each file
            $sql = "INSERT INTO gallery (images, product_id) VALUES ('$uniqueFileName', '$productID')";

            if (mysqli_query($conn, $sql)) {
            } else {
                $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file: $fileName<br>";
        }
    }
   
}
