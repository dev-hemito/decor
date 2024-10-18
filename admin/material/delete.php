<?php
// material/delete.php

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deletematerialID = !empty($_POST['deleteID']) ? intval($_POST['deleteID']) : 0;

    // Delete material from the database
    $sql = "DELETE FROM material WHERE id='$deletematerialID'";

    if (mysqli_query($conn, $sql)) {
        echo "material deleted successfully!";
    } else {
        echo "Error deleting material: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
