<?php
// category-fetch.php

include('../main/conn.php');

// Fetch categories from the database
$sql = "SELECT * FROM size";
$result = mysqli_query($conn, $sql);

// Generate HTML for dropdown options
$options = '<option value="" disabled selected>Select Size</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['id'] . '">' . $row['size'] . '</option>';
}

mysqli_close($conn);

echo $options;
?>