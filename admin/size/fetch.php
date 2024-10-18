<?php
// size/fetch.php

include('../main/conn.php');

// Fetch categories from the database
$sql = "SELECT * FROM size";
$result = mysqli_query($conn, $sql);

// Generate table rows dynamically
echo '<tr>
<th width="70%">Categories</th>
<th>Action</th>
</tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['size'] . '</td>';
    echo '<td>
    <a href="#" class="edit-btn" data-editID="' . $row['id'] . '"><i class="fa fa-pen"></i></a> 
    <a href="#" class="text-danger delete-btn" data-deleteID="' . $row['id'] . '"><i class="fa fa-trash"></i></a>
  </td>';
    echo '</tr>';
}

mysqli_close($conn);
