<?php session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


include('main/conn.php');

$productID = isset($_GET['id']) ? $_GET['id'] : null;
$productName = isset($_GET['product']) ? $_GET['product'] : null;


?>



<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
                    <div class="col-lg-8 mx-auto login-form bg-light p-3 m-3 mt-5 rounded">
                        <h3>Gallery for <?php echo $productName; ?></h3>

                        <form method="POST" enctype="multipart/form-data" action="#!" id="gallery-form">
                            <input type="text" value="<?php echo $productID; ?>" name="id" hidden>
                            <div class="img-upload position-relative">
                                <div id="imagePreview" class="image-preview"></div>
                                <h5 class="choose-img">Click to choose Main Image</h5>
                                <input type="file" name="image[]" id="imageFile" required placeholder="choose image" accept="image/png, image/gif, image/jpeg, image/webp, image/*" multiple>
                            </div>
                            <br>

                            <br> <button type="submit">Submit</button>
                            <div id="message"></div>
                        </form>


                    </div>

                </div>
            </section>



            <section>
                <div class="row">

                    <?Php
                    $sql = "SELECT * FROM gallery WHERE product_id = '$productID'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-4">
                        <img src="images/<?php echo $row['images']; ?>" alt="foyer">
                        <a id="deleteButton" href="gallery/delete.php?id=<?php echo $row['id']; ?>&image=<?php echo $row['images']; ?>" class="btn btn-danger gallery-delete">Double Click to Delete
                        </a>
                    </div>

                    <?php } ?>

                </div>
            </section>
        </div>
    </div>


    <script src="main/script.js"></script>

    <script>
        $(document).ready(function() {
            $("#gallery-form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    type: "POST",
                    url: "gallery/add.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#message").html(response);
                        location.reload();
                    },
                    error: function(error) {
                        $("#message").html(error.responseText);
                    }
                });
            });
        });
    </script>

<script>
$(document).ready(function() {
    var deleteButtonClickCount = 0;

    $('#deleteButton').on('click', function(event) {
        // Increase the click count on each click
        deleteButtonClickCount++;

        // Reset the click count after a short delay
        setTimeout(function() {
            deleteButtonClickCount = 0;
        }, 300);

        // Check if the button was double-clicked
        if (deleteButtonClickCount === 2) {
            // Perform the deletion action
            window.location.href = $(this).attr('href');
        }

        // Prevent the default click action
        event.preventDefault();
    });
});
</script>

</body>

</html>