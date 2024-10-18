<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
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

    $image = null;  // Handle image upload separately

    // Handle image upload (similar to your existing code)
    if (isset($_FILES['image'])) {
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

    // Insert product data into the database
    $sql = "INSERT INTO products (product_name, meta_title, meta_description, actual_price, sale_price, details, tags, image, category_id, size_id, material_id, color_id, type, status)
    VALUES (" . 
    ($productName ? "'$productName'" : "NULL") . ", " .
    ($metaTitle ? "'$metaTitle'" : "NULL") . ", " .
    ($metaDescription ? "'$metaDescription'" : "NULL") . ", " .
    ($actualPrice ? "'$actualPrice'" : "NULL") . ", " .
    ($salePrice ? "'$salePrice'" : "NULL") . ", " .
    ($details ? "'$details'" : "NULL") . ", " .
    ($tags ? "'$tags'" : "NULL") . ", " .
    ($image ? "'$image'" : "NULL") . ", " .
    ($categoryId ? $categoryId : "NULL") . ", " .
    ($sizeId ? $sizeId : "NULL") . ", " .
    ($materialId ? $materialId : "NULL") . ", " .
    ($colorId ? $colorId : "NULL") . ", " .
    ($typeValue ? "'$typeValue'" : "NULL") . ", " .
    ($status ? "'$status'" : "NULL") . ")";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
