<?php

// Start the session
session_start();

// Check if user is already logged in, redirect to admin panel if true
if(isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}

// If form submitted, check login credentials
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Connect to the database
include('main/conn.php');
  
  // Sanitize input fields
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  // Query database for user with given username and password
  $query = "SELECT * FROM admin WHERE username='$username'";
	
  $result = mysqli_query($conn, $query);
  
  // Check if query succeeded and a row was returned
  if(mysqli_num_rows($result) == 1) {
    
    // Get user ID from row and set session variable
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    
    // Redirect to admin panel
    $_SESSION["login_time_stamp"] = time(); 
    header('Location: index.php');
    exit();
    
  } else {
    
    // Display error message
    $error = 'Invalid username or password';
    
  }
  
  // Close database connection
  mysqli_close($conn);
  
}

?>



<!-- HTML code for login page -->
<html>

<head>
    <title>Login to Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="main/style.css">

    <style>
        .btn-primary {
            background-color: #212529!important;
            border-color: #212529!important;
            border-radius: 0px;
        }

        .form-control {
            border-radius: 0px;
        }
    </style>

</head>




<body>

    <div class="login-form min-vh-100 d-flex flex-column">
        <div class="container my-auto">
            <div class="row">
                <div class="col-md-9 col-lg-7 col-xl-5 mx-auto my-4">
                    <div class="bg-white border rounded p-4 py-sm-5 px-sm-5">
                        <div class="logo mb-4"> <a class="d-flex justify-content-center" href="index.php"><img src="../assets/images/decor-logo.png" alt="Decor" style="
    max-width: 65%" ;></a> </div>
						
						  <!-- Display error message if set -->
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
						
                        <form method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" id="username" required="" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" id="password" required="" placeholder="Password">
                            </div>
                            <div class="d-grid my-4">
                                <button class="btn btn-primary shadow-none" type="submit">Log In</button>
                            </div>
                        </form>

                        


                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light py-2">
            <p class="text-center text-1 text-muted mb-0">Copyright © 2024 <a href="#">Decor Stories</a>. All Rights Reserved.</p>
        </div>
    </div>


</body>

</html>
