<?php
// color/delete.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deletecolorID = !empty($_POST['deleteID']) ? intval($_POST['deleteID']) : 0;

    // Delete color from the database
    $sql = "DELETE FROM color WHERE id='$deletecolorID'";

    if (mysqli_query($conn, $sql)) {
        echo "color deleted successfully!";
    } else {
        echo "Error deleting color: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
