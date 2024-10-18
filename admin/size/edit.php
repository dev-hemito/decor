<?php
// size/edit.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editsizeID = !empty($_POST['size-id']) ? intval($_POST['size-id']) : 0;
    $editsize = !empty($_POST['edit-size-name']) ? htmlspecialchars($_POST['edit-size-name'], ENT_QUOTES, 'UTF-8') : null;

    // Update size data in the database
    $sql = "UPDATE size SET size='$editsize' WHERE id='$editsizeID'";

    if (mysqli_query($conn, $sql)) {
        echo "size updated successfully!";
    } else {
        echo "Error updating size: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
