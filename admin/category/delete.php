<?php
// category/delete.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteCategoryID = !empty($_POST['deleteID']) ? intval($_POST['deleteID']) : 0;

    // Delete category from the database
    $sql = "DELETE FROM category WHERE id='$deleteCategoryID'";

    if (mysqli_query($conn, $sql)) {
        echo "Category deleted successfully!";
    } else {
        echo "Error deleting category: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
