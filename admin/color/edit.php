<?php
// color/edit.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editcolorID = !empty($_POST['color-id']) ? intval($_POST['color-id']) : 0;
    $editcolor = !empty($_POST['edit-color-name']) ? htmlspecialchars($_POST['edit-color-name'], ENT_QUOTES, 'UTF-8') : null;

    // Update color data in the database
    $sql = "UPDATE color SET color='$editcolor' WHERE id='$editcolorID'";

    if (mysqli_query($conn, $sql)) {
        echo "color updated successfully!";
    } else {
        echo "Error updating color: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
