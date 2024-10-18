<?php
// category/edit.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editCategoryID = !empty($_POST['category-id']) ? intval($_POST['category-id']) : 0;
    $editCategory = !empty($_POST['edit-category-name']) ? htmlspecialchars($_POST['edit-category-name'], ENT_QUOTES, 'UTF-8') : null;

    // Update category data in the database
    $sql = "UPDATE category SET category='$editCategory' WHERE id='$editCategoryID'";

    if (mysqli_query($conn, $sql)) {
        echo "Category updated successfully!";
    } else {
        echo "Error updating category: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
