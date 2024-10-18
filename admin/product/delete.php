<?php
session_start();

include('../main/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the deleteID from the POST data
    $deleteID = isset($_POST['deleteID']) ? $_POST['deleteID'] : '';

    // Fetch the main image associated with the product from the products table
    $sqlSelectMainImage = "SELECT image FROM products WHERE id = '$deleteID'";
    $resultSelectMainImage = mysqli_query($conn, $sqlSelectMainImage);
    $rowMainImage = mysqli_fetch_assoc($resultSelectMainImage);
    $mainImagePath = '../images/' . $rowMainImage['image'];

    // If the main image exists, delete it from the images folder
    if (file_exists($mainImagePath)) {
        unlink($mainImagePath); // Delete the main image file
    }

    // Fetch the gallery images associated with the product from the gallery table
    $sqlSelectGalleryImages = "SELECT images FROM gallery WHERE product_id = '$deleteID'";
    $resultSelectGalleryImages = mysqli_query($conn, $sqlSelectGalleryImages);

    // Loop through the gallery images and delete them from the images folder
    while ($rowGallery = mysqli_fetch_assoc($resultSelectGalleryImages)) {
        $galleryImagePath = '../images/' . $rowGallery['images'];
        if (file_exists($galleryImagePath)) {
            unlink($galleryImagePath); // Delete the gallery image file
        }
    }

    // Delete records from the gallery table
    $sqlDeleteGallery = "DELETE FROM gallery WHERE product_id = '$deleteID'";
    if (mysqli_query($conn, $sqlDeleteGallery)) {
        echo "Gallery images deleted successfully.";
    } else {
        echo "Error deleting gallery images: " . mysqli_error($conn);
    }

    // Delete the product from the products table
    $sqlDeleteProduct = "DELETE FROM products WHERE id = '$deleteID'";
    if (mysqli_query($conn, $sqlDeleteProduct)) {
        echo "Product and associated images deleted successfully.";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
