<?php
// size/delete.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deletesizeID = !empty($_POST['deleteID']) ? intval($_POST['deleteID']) : 0;

    // Delete size from the database
    $sql = "DELETE FROM size WHERE id='$deletesizeID'";

    if (mysqli_query($conn, $sql)) {
        echo "size deleted successfully!";
    } else {
        echo "Error deleting size: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
