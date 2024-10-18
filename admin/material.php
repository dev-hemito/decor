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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <h3>Add material</h3>

                        <form id="materialForm" method="POST" action="#!">

                            <input type="text" placeholder="material" name="material-name">

                            <br> <button type="submit">Submit</button>
                        </form>

                        <div id="message"></div>
                    </div>

                </div>
            </section>

            <section>
                <div class="container">
                    <div class="col-lg-10 mx-auto ">
                        <div id="materialTableContainer">
                            <table class="table-striped table">

                                <!-- Table rows will be dynamically added here -->
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="popup-overlay"></div>
                <div id="editFormContainer">
                    <span class="fa fa-times close-btn"></span>
                    <form id="editmaterialForm">
                        <input type="hidden" id="editmaterialID" name="material-id">
                        <!-- New input for material name -->
                        <input type="text" placeholder="Edit material" name="edit-material-name" id="editmaterialName">
                        <br>
                        <!-- Submit button inside the form -->
                        <button type="submit" id="editSubmitBtn">Update</button>
                    </form>
                </div>

            </section>

            <section>
                <!-- material-form.html -->

                <!-- Confirmation popup -->
                <div id="confirmationPopup" class="text-center bordered">
                    <p>Are you sure you want to delete this material?</p>
                    <button class="btn btn-success" id="confirmDeleteBtn">Yes</button>
                    <button class="btn btn-danger" id="cancelDeleteBtn">No</button>
                </div>

                <!-- ... (Remaining code) -->

            </section>

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="main/script.js"></script>
    <script>
        // material-script.js

        $(document).ready(function() {
            // Function to fetch and update the material table
            function updatematerialTable() {
                $.ajax({
                    type: "GET",
                    url: "material/fetch.php", // Create a PHP script to fetch categories from the database
                    success: function(response) {
                        $("#materialTableContainer table").html(response);
                    },
                    error: function() {
                        console.log("Error fetching material data.");
                    }
                });
            }

            // Event listener for form submission
            $("#materialForm").on("submit", function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "material/add.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#message").html(response);
                        updatematerialTable(); // Update the material table after adding a material
                        $("#materialForm")[0].reset(); // Reset the form
                    },
                    error: function() {
                        $("#message").html("<p>Error submitting the form.</p>");
                    }
                });
            });

            $("#materialTableContainer").on("click", ".edit-btn", function() {
                var editID = $(this).data("editid");

                // Fetch the material name corresponding to the edit button clicked
                var materialName = $(this).closest("tr").find("td:first").text();

                // Set the material ID and name in the hidden edit form inputs
                $("#editmaterialID").val(editID);
                $("#editmaterialName").val(materialName);

                // Show the hidden form as a popup
                $("#editFormContainer , .popup-overlay").show();
            });

            $(".popup-overlay , .close-btn").on("click", function() {
                $("#editFormContainer , .popup-overlay").hide();
            })


            // Event listener for "Update" button click in the edit form
            $("#editmaterialForm").on("submit", function(event) {
                event.preventDefault(); // Prevent the default form submission

                var editFormData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "material/edit.php",
                    data: editFormData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#message").html(response);
                        updatematerialTable();
                        $("#editFormContainer").hide();
                    },
                    error: function() {
                        $("#message").html("<p>Error updating the material.</p>");
                    }
                });
                $("#editFormContainer , .popup-overlay").hide();
            });

            $("#materialTableContainer").on("click", ".delete-btn", function() {
                var deleteID = $(this).data("deleteid");

                // Show the confirmation popup
                $("#confirmationPopup , .popup-overlay").show();

                // Set the deleteID as a data attribute in the popup
                $("#confirmationPopup").data("deleteid", deleteID);
            });

            // Event listener for confirmation popup "Yes" button
            $("#confirmDeleteBtn").on("click", function() {
                var deleteID = $("#confirmationPopup").data("deleteid");

                // Proceed with the deletion using AJAX
                $.ajax({
                    type: "POST",
                    url: "material/delete.php",
                    data: {
                        deleteID: deleteID
                    },
                    success: function(response) {
                        $("#message").html(response);
                        updatematerialTable();
                        $("#confirmationPopup").hide();
                    },
                    error: function() {
                        $("#message").html("<p>Error deleting the material.</p>");
                        $("#confirmationPopup").hide();
                    }
                });
                $(".popup-overlay").hide();
            });

            // Event listener for confirmation popup "No" button
            $("#cancelDeleteBtn , .popup-overlay").on("click", function() {
                // Hide the confirmation popup without performing any action
                $("#confirmationPopup ,  .popup-overlay").hide();
            });

        
            // Initial load of the material table
            updatematerialTable();

        });
    </script>

    <style>
        table tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        table td {
            padding: 10px;
        }

        table th {
            background-color: #0f5faa;
            color: #fff;
            padding: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
        }

        form button {
            background-color: #0f5faa;
            color: #fff;
            padding: 10px;
            width: 100%;
        }
    </style>

</body>

</html>