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

    <section class="hero-section">
        <div class="hero-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- swiper-slide start -->
                    <div class="hero-slide-item slider-height1 swiper-slide slide-bg1">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="hero-slide-content">
                                        <p class="text text-white animated">
                                            Style Your Space
                                        </p>
                                        <br>
                                        <h2 class="title text-dark delay1 animated">
                                            Curtains
                                        </h2>
                                        <br>
                                        <h2 class="title text-dark delay2 animated">
                                        Blinds & Roman Blinds
                                        </h2>
                                        <br>
                                        <a href="shop" class="btn animated btn-outline-dark">Transform Your Home</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide end-->

                    <!-- swiper-slide start -->
                    <div class="hero-slide-item slider-height1 swiper-slide slide-bg2">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="hero-slide-content">
                                        <p class="text text-white animated">
                                           Furnish Your Home
                                        </p>
                                        <br>
                                        <h2 class="title text-dark delay1 animated">
                                        Dining set
                                        </h2>
                                        <br>
                                        <h2 class="title text-dark delay2 animated">
                                        Sofas & Loose furniture

                                        </h2>
                                        <br>
                                        <a href="shop" class="btn animated btn-outline-dark">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide end-->
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- swiper navigation -->
            <div class="d-none d-lg-block">
                <div class="swiper-button-prev">
                    <i class="ion-chevron-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="ion-chevron-right"></i>
                </div>
            </div>
        </div>
    </section>


    <section class="banner-section section-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/blinds.webp" alt="">
                        <h4>Blinds</h4>
                        <div class="overlay">
                            <h5>Blinds</h5>
                            <p>
                                Roller blinds,
                                Zebra linds,
                                Vertical blinds etc.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="17" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/roman.webp" alt="">
                        <h4>Roman Blinds</h4>
                        <div class="overlay">
                            <h5>Roman Blinds</h5>
                            <p>
                                Classic Roman,
                                Clip Roman,
                                Vintage Roman etc.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="16" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/decorative-accessories.webp" alt="">
                        <h4>Decorative Accessories</h4>
                        <div class="overlay">
                            <h5>Decorative Accessories</h5>
                            <p>Unique accessories to personalize your space.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="19" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/curtain.webp" alt="">
                        <h4>Curtains</h4>
                        <div class="overlay">
                            <h5>Curtains</h5>
                            <p>Ripple curtain,
                                Pinch pleated curtain,
                                Box pleated curtain. etc.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="15" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/furniture.webp" alt="">
                        <h4>Furniture</h4>
                        <div class="overlay">
                            <h5>Furniture</h5>
                            <p>Explore a wide range of furniture for every room.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="18" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/lighting.webp" alt="">
                        <h4>Lighting</h4>
                        <div class="overlay">
                            <h5>Lighting</h5>
                            <p>Ambiance through varied lighting solutions.</p>
                            <a href="shop" class="mx-auto">View Products</a>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/wall-decor.webp" alt="">
                        <h4>Wall Decor</h4>
                        <div class="overlay">
                            <h5>Wall Decor</h5>
                            <p>Enhance walls with art, mirrors, and clocks.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="19" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/home-textiles.webp" alt="">
                        <h4>Home Textiles</h4>
                        <div class="overlay">
                            <h5>Home Textiles</h5>
                            <p>Comfort and style with our textile collection.</p>
                            <a href="shop" class="mx-auto">View Products</a>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/kitchen-dining.webp" alt="">
                        <h4>Dining</h4>
                        <div class="overlay">
                            <h5>Dining</h5>
                            <p>Essentials for modern kitchens and dining areas.</p>
                            <form action="shop" method="POST">
                                <input type="text" value="18" name="category" hidden>
                                <button type="submit" class="mx-auto">View Products</button>
                            </form>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/bathroom-accessories.webp" alt="">
                        <h4>Bathroom Decor</h4>
                        <div class="overlay">
                            <h5>Bathroom Decor</h5>
                            <p>Functional and aesthetic bathroom enhancements.</p>
                            <a href="shop" class="mx-auto">View Products</a>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/home-office.webp" alt="">
                        <h4>Home Office</h4>
                        <div class="overlay">
                            <h5>Home Office</h5>
                            <p>Optimize your workspace with ergonomic solutions.</p>
                            <a href="shop" class="mx-auto">View Products</a>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 g-0 col-md-6">
                    <div class="category-list">
                        <img src="assets/images/category/flooring.webp" alt="">
                        <h4>Flooring</h4>
                        <div class="overlay">
                            <h5>Flooring</h5>
                            <p>Diverse flooring options for every space.</p>
                            <a href="shop" class="mx-auto">View Products</a>
                        </div>
                    </div>
                </div> -->





            </div>
        </div>
    </section>



    <!-- product tab section start -->
    <section class="product-tab-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <!-- tabs liks start -->
                <div class="col-12">
                    <ul class="nav nav-pills product-tab-nav" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-arrivals">New
                                Arrivals</button>
                        </li>
                        <!-- <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-seller">Best
                                Sellers</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-onsale">On
                                Sale</button>
                        </li> -->
                    </ul>
                </div>
                <!-- tabs liks end -->
                <div class="col-12">
                    <div class="tab-content" id="pills-tabContent">
                        <!-- tab-pane one -->
                        <div class="tab-pane fade show active" id="pills-arrivals">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="row grid-view mb-n5">
                                        <!-- Rest of your HTML and PHP code -->

                                        <?php
                                        include('admin/main/conn.php');

                                        if (isset($_POST['category']) && $_POST['category'] != 1) {
                                            $selected_category_id = $_POST['category'];

                                            // Fetch products based on the selected category
                                            $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ? ORDER BY id DESC LIMIT 8");
                                            $stmt->bind_param("i", $selected_category_id);
                                        } else {
                                            // Fetch all products
                                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 8");
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
                                    </div>
                                    <!-- tab-pane end -->
                                    <!-- tab-pane two -->

                                    <!-- tab-pane end -->
                                    <!-- tab-pane three -->

                                    <!-- tab-pane end -->
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <a href="shop" class="btn btn-outline-dark">View More</a>
                                </div>

                            </div>
                        </div>
                    </div>
    </section>
    <!-- product tab section end -->

    <!-- decoration slider start -->

    <div class="decoration-slider-section bg-light section-padding-top section-padding-bottom d-none">
        <!-- section title section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="section-title text-center">
                        <h3 class="title">Shop By Room</h3>
                    </section>
                </div>
            </div>
        </div>
        <!-- section title section -->

        <div class="container-fluid px-xl-0">
            <div class="decoration-slider-active swiper-arrow arrow-position-center-fixed">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="#!room">
                                    <img src="assets/images/decoration/1.jpg" alt="image_not_found">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">Kitchen Room</h3>
                                    <a href="shop" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- swiper-slide end -->
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="#!room">
                                    <img src="assets/images/decoration/2.jpg" alt="image_not_found">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">Living Room</h3>
                                    <a href="shop" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- swiper-slide end -->
                        <div class="swiper-slide">
                            <div class="decoration">
                                <a class="decoration-thumb" href="#!room">
                                    <img src="assets/images/decoration/3.jpg" alt="image_not_found">
                                </a>
                                <div class="decoration-content">
                                    <h3 class="decoration-title">Bedroom</h3>
                                    <a href="shop" class="btn btn-outline-dark">Discover Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- swiper-slide end -->
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="decoration-slider-active swiper-button-prev"></div>
                <div class="decoration-slider-active swiper-button-next"></div>
            </div>
        </div>
    </div>
    <!-- decoration slider end -->
    <div class="featured-product-section section-padding-top section-padding-bottom bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="section-title text-center">
                        <h3 class="title">Featured Products</h3>
                    </section>
                </div>
                <div class="col-12">
                    <div class="featured-product swiper-arrow arrow-position-center">
                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">

                                <?php
                                // Fetch products with category_id equal to 17
                                $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 8");
                                $stmt->execute();
                                $result = $stmt->get_result(); // get the mysqli result
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Your product display code here
                                        echo '<div class="swiper-slide">
                                        <div class="product-list">
                                            <div class="product-card">
                                                <a href="#!room" class="product-thumb">
                                                    <span class="onsale bg-danger">sale!</span>
                                                    <img src="admin/images/' . $row['image'] . '" alt="image_not_found">
                                                </a>
                                                <div class="product-content">
                                                    <h4><a href="#!room" class="product-title">' . $row['product_name'] . '</a></h4>
                                                    <div class="product-group">
                                                        <h5 class="product-price"><del class="old-price">₹' . $row['actual_price'] . '</del> <span class="new-price">₹' . $row['sale_price'] . '</span></h5>
                                                        <button data-bs-toggle="modal" data-bs-target="#addto-cart-modal" class="product-btn product-thumb">Order Now</button>
                                                        <p class="product-description d-none">' . $row['details'] . '</p>
                                                        </div>
                                                </div>
                                                <ul class="actions actions-verticale">
                                                    <li class="product-thumb action quick-view">
                                                        <button data-bs-toggle="modal" data-bs-target="#product-modal"><i class="far fa-eye"></i></button>
                                                    </li>
                                                    <li class="action compare">
                                                        <button class="whatsapp-order"><i class="fab fa-whatsapp"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                }
                                $stmt->close();
                                ?>

                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="featured-product swiper-button-prev"></div>
                        <div class="featured-product swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- featured product end -->



    <?php include("footer.php"); ?>