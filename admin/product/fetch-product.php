<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

include('../main/conn.php');

// Assuming you have a products table with fields id, product_name, etc.
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {


        while ($row = mysqli_fetch_assoc($result)) {

?>
            <div class="col-12 px-4">
                <div class="row product-list bg-light mb-4 p-3 shadow">
                    <div class="col-md-2">
                        <img src="images/<?php echo $row['image'] ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <h5><?php echo $row['product_name'] ?></h5>
                        <p><?php echo $row['details'] ?></p>
                        price: <del><?php echo $row['actual_price'] ?></del> <span class="text-success"><?php echo $row['sale_price'] ?></span>
                    </div>
                    <div class="col-md-3">

                        <a href="product-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info"><i class="fa fa-pen"></i></a>
                        <a href="#!" class="btn-danger btn delete-btn" data-deleteID="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></a><br><br>
                        <a href="product-image.php?id=<?php echo $row['id'] ?>&product=<?php echo $row['product_name'] ?>" class="btn btn-dark">View/Add Image</a>

                    </div>
                </div>
            </div>
<?php
        }

        echo '</table>';
    } else {
        echo 'No products found.';
    }
} else {
    echo 'Error: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>