<?php session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


include('main/conn.php');



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

                        <form method="POST" enctype="multipart/form-data" action="#!" id="product-form">

                            <input type="text" placeholder="Product Name" name="product-name">
                            <div class="img-upload position-relative">
                                <div id="imagePreview" class="image-preview"></div>
                                <h5 class="choose-img">Click to choose Main Image</h5>
                                <input type="file" name="image" id="imageFile" required placeholder="choose image" accept="image/png, image/gif, image/jpeg, image/webp, image/*">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-center">
                                        <select name="category" id="categoryDropdown" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="add-button category-add-btn">+</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select name="status" id="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Actual Price" name="actual-price">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Sale Price" name="sale-price">
                                </div>

                            </div>

                            <label for="" class="mt-3">Product Description</label>
                            <textarea name="details" id="" cols="20" rows="5"></textarea>

                            <label for="" class="mt-3">Tags (seperate by commas)</label>
                            <textarea name="tags" id="" cols="20" rows="3"></textarea>



                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="mt-3">Size</label>
                                    <div class="d-flex">
                                        <select name="size" id="SizeDropdown">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="add-button size-add-btn">+</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mt-3">Material</label>
                                    <div class="d-flex">
                                        <select name="material" id="MaterialDropdown">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="add-button material-add-btn">+</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mt-3">color</label>
                                    <div class="d-flex">
                                        <select name="color" id="colorDropdown">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="add-button color-add-btn">+</span>
                                    </div>
                                </div>
                            </div>

                            <label for="" class="mt-3">Meta Title</label>
                            <textarea name="meta-title" id="" cols="20" rows="2"></textarea>

                            <label for="" class="mt-3">Meta Description</label>
                            <textarea name="meta-description" id="" cols="20" rows="5"></textarea>

                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="type[]" id="Arrivals" value="New Arrivals">
                                    <label for="Arrivals" class="mt-3">New Arrivals</label>

                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="type[]" id="Sellers" value="Best Sellers">
                                    <label for="Sellers" class="mt-3">Best Sellers</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="type[]" id="Collections" value="Best Collections">
                                    <label for="Collections" class="mt-3">Best Collections
                                </div>
                            </div>
                            <br> <button type="submit">Submit</button>
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