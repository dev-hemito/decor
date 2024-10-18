<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}


include('../main/conn.php');

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
        $uploadDir = '../images/';
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
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>
