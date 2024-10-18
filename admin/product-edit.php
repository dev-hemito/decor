<?php session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


include('main/conn.php');

if (isset($_GET['id'])) {
    $productId = (int)$_GET['id']; // Get the product ID from the URL and sanitize it

    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the product data
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid product ID!";
    exit();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $productName = !empty($_POST['product-name']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['product-name'], ENT_QUOTES, 'UTF-8')) : null;
    $metaTitle = !empty($_POST['meta-title']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['meta-title'], ENT_QUOTES, 'UTF-8')) : null;
    $metaDescription = !empty($_POST['meta-description']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['meta-description'], ENT_QUOTES, 'UTF-8')) : null;
    $actualPrice = !empty($_POST['actual-price']) ? mysqli_real_escape_string($conn, $_POST['actual-price']) : null;
    $salePrice = !empty($_POST['sale-price']) ? mysqli_real_escape_string($conn, $_POST['sale-price']) : null;
    $details = !empty($_POST['details']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['details'], ENT_QUOTES, 'UTF-8')) : null;
    $tags = !empty($_POST['tags']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['tags'], ENT_QUOTES, 'UTF-8')) : null;

    $categoryId = !empty($_POST['category']) ? (int) $_POST['category'] : null;
    $sizeId = !empty($_POST['size']) ? (int) $_POST['size'] : null;
    $materialId = !empty($_POST['material']) ? (int) $_POST['material'] : null;
    $colorId = !empty($_POST['color']) ? (int) $_POST['color'] : null;

    $typeArray = !empty($_POST['type']) ? $_POST['type'] : [];
    $typeValues = array_map(function($value) use ($conn) {
        return mysqli_real_escape_string($conn, htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }, $typeArray);
    $typeValue = implode('&', $typeValues);

    $status = !empty($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : null;

    $image = $product['image'];  // Default to existing image

    // Handle image upload if a new image is provided
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $uploadDir = 'images/';
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $uniqueFileName = time() . '_' . str_replace(' ', '_', $fileName);
        $targetFilePath = $uploadDir . $uniqueFileName;

        if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            $image = mysqli_real_escape_string($conn, $uniqueFileName);
        } else {
            $error = "Error uploading the image.";
        }
    }

    // Update product data in the database
    $sql = "UPDATE products SET 
        product_name = " . ($productName ? "'$productName'" : "NULL") . ",
        meta_title = " . ($metaTitle ? "'$metaTitle'" : "NULL") . ",
        meta_description = " . ($metaDescription ? "'$metaDescription'" : "NULL") . ",
        actual_price = " . ($actualPrice ? "'$actualPrice'" : "NULL") . ",
        sale_price = " . ($salePrice ? "'$salePrice'" : "NULL") . ",
        details = " . ($details ? "'$details'" : "NULL") . ",
        tags = " . ($tags ? "'$tags'" : "NULL") . ",
        image = " . ($image ? "'$image'" : "NULL") . ",
        category_id = " . ($categoryId ? $categoryId : "NULL") . ",
        size_id = " . ($sizeId ? $sizeId : "NULL") . ",
        material_id = " . ($materialId ? $materialId : "NULL") . ",
        color_id = " . ($colorId ? $colorId : "NULL") . ",
        type = " . ($typeValue ? "'$typeValue'" : "NULL") . ",
        status = " . ($status ? "'$status'" : "NULL") . "
        WHERE id = $productId";

    if (mysqli_query($conn, $sql)) {
        header('Location: product-view.php'); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>


<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="main/style.css">

</head>



<body>

    <div class="row">
        <div class="col-3">
            <?php include('main/menu.php'); ?>
        </div>
        <div class="col-9">

            <section>
                <div class="container">
                    <div class="col-lg-10 mx-auto login-form bg-light p-3 m-3 mt-5 rounded">
                        <h3>New Product</h3>

                        <form method="POST" enctype="multipart/form-data" action="">

                            <input type="text" placeholder="Product Name" name="product-name" value="<?php echo htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?>">

                            <!-- Image Upload -->
                            <div class="img-upload position-relative">
                                <div id="imagePreview" class="image-preview">
                                    <!-- Display existing image if available -->
                                    <?php if (!empty($product['image'])): ?>
                                        <img src="images/<?php echo $product['image']; ?>" alt="Product Image" style="max-width: 100%; height: auto;">
                                    <?php endif; ?>
                                </div>
                                <h5 class="choose-img">Click to choose Main Image</h5>
                                <input type="file" name="image" id="imageFile" placeholder="choose image" accept="image/png, image/gif, image/jpeg, image/webp, image/*">
                            </div>

                            <!-- Category -->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-center">
                                        <select name="category" id="categoryDropdown" required>
                                            <option value="1" <?php echo $product['category_id'] == 1 ? 'selected' : ''; ?>>Active</option>
                                            <option value="0" <?php echo $product['category_id'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                                        </select>
                                        <span class="add-button category-add-btn">+</span>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-4">
                                    <select name="status" id="status" required>
                                        <option value="1" <?php echo $product['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                                        <option value="0" <?php echo $product['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Prices -->
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Actual Price" name="actual-price" value="<?php echo htmlspecialchars($product['actual_price'], ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Sale Price" name="sale-price" value="<?php echo htmlspecialchars($product['sale_price'], ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                            </div>

                            <!-- Description -->
                            <label for="" class="mt-3">Product Description</label>
                            <textarea name="details" id="" cols="20" rows="5"><?php echo htmlspecialchars($product['details'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                            <!-- Tags -->
                            <label for="" class="mt-3">Tags (separate by commas)</label>
                            <textarea name="tags" id="" cols="20" rows="3"><?php echo htmlspecialchars($product['tags'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                            <!-- Size, Material, and Color -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="mt-3">Size</label>
                                    <div class="d-flex">
                                        <select name="size" id="SizeDropdown">
                                            <option value="1" <?php echo $product['size_id'] == 1 ? 'selected' : ''; ?>>Active</option>
                                            <option value="0" <?php echo $product['size_id'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                                        </select>
                                        <span class="add-button size-add-btn">+</span>
                                    </div>
                                </div>

                                <!-- Similar code for Material and Color -->
                            </div>

                            <!-- Meta Title and Description -->
                            <label for="" class="mt-3">Meta Title</label>
                            <textarea name="meta-title" id="" cols="20" rows="2"><?php echo htmlspecialchars($product['meta_title'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                            <label for="" class="mt-3">Meta Description</label>
                            <textarea name="meta-description" id="" cols="20" rows="5"><?php echo htmlspecialchars($product['meta_description'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                            <!-- Type Checkboxes -->
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="type[]" id="Arrivals" value="New Arrivals" <?php echo strpos($product['type'], 'New Arrivals') !== false ? 'checked' : ''; ?>>
                                    <label for="Arrivals" class="mt-3">New Arrivals</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="type[]" id="Sellers" value="Best Sellers" <?php echo strpos($product['type'], 'Best Sellers') !== false ? 'checked' : ''; ?>>
                                    <label for="Sellers" class="mt-3">Best Sellers</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="type[]" id="Collections" value="Best Collections" <?php echo strpos($product['type'], 'Best Collections') !== false ? 'checked' : ''; ?>>
                                    <label for="Collections" class="mt-3">Best Collections</label>
                                </div>
                            </div>

                            <br>
                            <button type="submit">Submit</button>
                            <div id="message"></div>
                        </form>


                    </div>

                </div>
            </section>

        </div>
    </div>

    <!-- add popup -->

    <div class="popup-overlay"></div>

    <div class="popup-form" id="addCategory">
        <span class="fa fa-times close-btn"></span>
        <form id="categoryForm" method="POST" action="#!">

            <input type="text" placeholder="category Name" name="category-name">

            <br> <button type="submit">Submit</button>
        </form>
    </div>
    <div class="popup-form" id="addSize">
        <span class="fa fa-times close-btn"></span>
        <form id="sizeForm" method="POST" action="#!">

            <input type="text" placeholder="Add Size" name="size-name">

            <br> <button type="submit">Submit</button>
        </form>
    </div>

    <div class="popup-form" id="addMaterial">
        <span class="fa fa-times close-btn"></span>
        <form id="materialForm" method="POST" action="#!">

            <input type="text" placeholder="Add Material" name="material-name">

            <br> <button type="submit">Submit</button>
        </form>
    </div>
    <div class="popup-form" id="addcolor">
        <span class="fa fa-times close-btn"></span>
        <form id="colorForm" method="POST" action="#!">

            <input type="text" placeholder="Add color" name="color-name">

            <br> <button type="submit">Submit</button>
        </form>
    </div>



    <script src="main/script.js"></script>
    <script src="main/ajax.js"></script>


</body>

</html>