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
                    <div class="col-lg-10 mx-auto ">
                        <h3>View Product</h3>
                    </div>
                    <div id="message"></div>
                    <div id="product-list"></div>

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


    <div id="confirmationPopup" class="text-center popup-form bordered">
        <p>Are you sure you want to delete this Product?</p>
        <button class="btn btn-success" id="confirmDeleteBtn">Yes</button>
        <button class="btn btn-danger" id="cancelDeleteBtn">No</button>
    </div>


    <script src="main/script.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch products on page load
            fetchProducts();

            // Function to fetch products
            function fetchProducts() {
                $.ajax({
                    type: "GET",
                    url: "product/fetch-product.php", // Your PHP script to fetch products
                    success: function(response) {
                        $("#product-list").html(response);
                    },
                    error: function() {
                        console.log('Error fetching products.');
                    }
                });
            }


            $(document).on('click', '.delete-btn', function (event) {
                // Prevent the default action
                event.preventDefault();
                var deleteID = $(this).data("deleteid");
                $("#confirmationPopup").data("deleteid", deleteID);

                // Show the confirmation popup
                $(".popup-overlay").show();
                $("#confirmationPopup").show();
            });



            // Handle cancel button click
            $("#cancelDeleteBtn").on("click", function() {
                $(".popup-overlay").hide();
                $("#confirmationPopup").hide();
            });

            // Handle confirm delete button click
            $("#confirmDeleteBtn").on("click", function() {
                var deleteID = $("#confirmationPopup").data("deleteid");
                // Proceed with the deletion using AJAX
                $.ajax({
                    type: "POST",
                    url: "product/delete.php",
                    data: {
                        deleteID: deleteID
                    },
                    success: function(response) {
                        $("#message").html(response);
                        $(".popup-overlay").hide();
                        $("#confirmationPopup").hide();
                        fetchProducts();
                    },
                    error: function() {
                        $("#message").html("<p>Error deleting the product.</p>");
                        $(".popup-overlay").hide();
                        $("#confirmationPopup").hide();
                    }
                });
            });

        });
    </script>



</body>

</html>