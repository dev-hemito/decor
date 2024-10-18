<!DOCTYPE html>
<html lang="en">
<!-- head start -->

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Decor Stories</title>
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<!-- head end -->

<body>

    <?php include("header.php"); ?>


    <!-- main content start -->
    <!-- bread crumb section start -->
    <nav class="breadcrumb-section breadcrumb-bg1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="bread-crumb-title">shop</h2>
                    <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb section end -->

    <div class="shop-page-layout section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="row align-items-center mb-5">
                        <div class="col-12 col-md-6 ">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-tabs justify-content-center justify-content-md-start align-items-center" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link grid active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link list" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex justify-content-center justify-content-md-end align-items-center">
                                <span class="sort-by">Sort by Category</span>

                                <form method="POST" action="">
                                    <select class="form-select" name="category" onchange="this.form.submit()">
                                        <option value="1" <?php if (!isset($_POST['category']) || $_POST['category'] == 1) echo 'selected'; ?>>All Products</option>
                                        <?php
                                        include('admin/main/conn.php');
                                        $sql = "SELECT * FROM category ORDER BY id DESC";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $selected = (isset($_POST['category']) && $_POST['category'] == $row['id']) ? 'selected' : '';
                                                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['category'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>



                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row grid-view mb-n5">
                                <!-- Rest of your HTML and PHP code -->

                                <?php
                                include('admin/main/conn.php');

                                if (isset($_POST['category']) && $_POST['category'] != 1) {
                                    $selected_category_id = $_POST['category'];
                                    // Fetch products based on the selected category
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ? ORDER BY id DESC");
                                    $stmt->bind_param("i", $selected_category_id);
                                } else {
                                    // Fetch all products
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
                                }

                                $stmt->execute();

                                $result = $stmt->get_result(); // get the mysqli result
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Your product display code here
                                        echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-5">
                <div class="product-card">
                    <a href="#!product" class="product-thumb">
                        <span class="onsale bg-danger">sale!</span>
                        <img src="admin/images/' . $row['image'] . '" alt="image_not_found">
                    </a>
                    <div class="product-content">
                        <h4><a href="#!product" class="product-title">' . $row['product_name'] . '</a></h4>
                        <div class="product-group">
                            <h5 class="product-price"><del class="old-price">₹' . $row['actual_price'] . '</del> <span class="new-price">₹' . $row['sale_price'] . '</span></h5>
                            <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn product-thumb">Order Now</button>
                            <p class="product-description d-none">' . $row['details'] . '</p>
                        </div>
                    </div>
                    <ul class="actions actions-verticale">
                        <li class="product-thumb product-thumb action quick-view">
                            <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="far fa-eye"></i></button>
                        </li>
                        <li class="action compare">
                            <button class="whatsapp-order"><i class="fab fa-whatsapp"></i></button>
                        </li>
                    </ul>
                </div>
            </div>';
                                    }
                                }

                                $stmt->close();
                                ?>


                                <!-- pagination -->
                                <!-- <div class="col-12 mb-5">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropleft"></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropright"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="row mb-n5 grid-view-list overflow-hidden">
                                <?php


                                include('admin/main/conn.php');

                                // Assuming you have a products table with fields id, product_name, etc.
                                $sql = "SELECT * FROM products ORDER BY id DESC";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {


                                        while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                            <div class="col-12 mb-5">
                                                <!-- product card list start -->
                                                <div class="product-card-list row mb-n5">
                                                    <a href="#!product" class="product-thumb-list col-md-4 mb-5">
                                                        <span class="onsale bg-danger">sale!</span>
                                                        <img src="admin/images/<?php echo $row['image'] ?>" alt="image_not_found">
                                                    </a>
                                                    <!-- thumb end -->
                                                    <div class="product-content-list col-md-8 mb-5">
                                                        <div class="product-category-links">
                                                            <a href="#">Bowls, Gadgets &amp; Utensils</a>, <a href="#">Drinkware</a>, <a href="#">Storage</a>, <a href="#">Table Linens</a>
                                                        </div>
                                                        <h4><a href="#!product" class="product-title"><?php echo $row['product_name'] ?></a></h4>
                                                        <h5 class="product-price-list"><del class="old-price"><?php echo $row['actual_price'] ?></del> <span class="new-price"><?php echo $row['sale_price'] ?></span>
                                                        </h5>
                                                        <p><?php echo $row['details'] ?></p>
                                                        <!-- actions  -->
                                                        <ul class="actions actions-horizontal">
                                                            <button class="whatsapp-order-2">
                                                                <i class="fab fa-whatsapp"></i> Enquire
                                                            </button>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- product card list end -->
                                            </div>
                                <?php }
                                    }
                                } ?>


                                <!-- product card list end -->

                                <!-- col-12 mb-5 end -->
                                <!-- pagination -->
                                <div class="col-12 mb-5">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropleft"></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <span class="ion-android-arrow-dropright"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop page layout end -->

    <!-- main content end -->

    <?php include("footer.php"); ?>