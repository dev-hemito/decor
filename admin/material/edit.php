<?php
// material/edit.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editmaterialID = !empty($_POST['material-id']) ? intval($_POST['material-id']) : 0;
    $editmaterial = !empty($_POST['edit-material-name']) ? htmlspecialchars($_POST['edit-material-name'], ENT_QUOTES, 'UTF-8') : null;

    // Update material data in the database
    $sql = "UPDATE material SET material='$editmaterial' WHERE id='$editmaterialID'";

    if (mysqli_query($conn, $sql)) {
        echo "material updated successfully!";
    } else {
        echo "Error updating material: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
