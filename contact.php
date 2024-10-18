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
                    <h2 class="bread-crumb-title">Contact</h2>
                    <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>

    <!-- bread crumb section end -->

    <section class="contact-section section-padding-bottom">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-3 mb-4">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">Contact Us</h3>
                    </div>
                    <!-- contact-title-section end -->
                    <div class="contact-address">
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title"><span class="ion-ios-home"></span>Address</h4>
                            <p>
                                Opposite, Mc Donalds, Chakkaraparambu, Vyttila, Ernakulam, Kerala 682032
                            </p>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title"><span class="ion-ios-telephone"></span>Email</h4>
                            <ul>
                               
                                <li>
                                    <a class="mailto" href="mailto:info@decorstories.in">info@decorstories.in</a>
                                </li>
                                <li><a class="mailto" href="mailto:sales@decorstories.in">sales@decorstories.in</a></li>
                                <li>
                                    <a class="mailto" href="mailto:decorstoriez@gmail.com">decorstoriez@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title"><span class="ion-email"></span> Phone</h4>
                            <ul>
                                <li>
                                    <a class="phone-number" href="tel:+919656000337">+91 96560 00337</a>
                                </li>
                                <li>
                                    <a class="phone-number" href="tel:+917736085088 ">+91 77360 85088</a>
                                </li>
                            </ul>
                        </div>

                        <!-- address-list end -->

                    </div>
                </div>
                <div class="enquiry-form col-lg-8 offset-lg-1 mb-4">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">For Quick Enquiries</h3>
                    </div>
                    <!-- contact-title-section end -->

                    <form id="contactForm" class="row contact-us-form appointment-form query_form" action="#" method="POST" novalidate="novalidate">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label" for="name">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name*">
                            </div>
                            <!-- Name filed end -->
                            <div class="col-lg-6">
                                <label class="form-label" for="email">Your Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Your Email*">
                            </div>
                            <!-- email filed end -->
                            <div class="col-lg-6">
                                <label class="form-label" for="subject">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number">
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Your subject*">
                            </div>
                            <!-- Subject filed end -->
                            <div class="col-12">
                                <label class="form-label" for="massage">Your Message</label>
                                <textarea class="form-control massage-control" name="massage" id="massage" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <!-- Message filed end -->
                            <div class="col-12">
                                <button id="contactSubmit" type="button" class="btn btn-dark" onclick="Send()" style="
    margin-top: 30px;">Send Message</button>
                                <p class="form-message mt-3"></p>
                            </div>
                        </div>
                    </form>


                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script src="https://smtpjs.com/v3/smtp.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


                    <script>
                        function Send() {
                            event.preventDefault();

                            var name = document.getElementById("name").value;
                            var email = document.getElementById("email").value;
                            var subject = document.getElementById("subject").value;
                            var phone = document.getElementById("phone").value;
                            var msg = document.getElementById("massage").value;

                            // Validation: Check if any of the required fields is empty
                            if (!name || !email || !subject || !phone || !msg) {
                                swal("Error", "Please fill in all the required fields.", "error");
                                return; // Stop execution if validation fails
                            }

                            // Update button text
                            $('.query_form .btn').text('Sending...');

                            var body = "Name: " + name + "<br/>Email: " + email + "<br/>Subject: " + subject + "<br/>phone: " + phone +
                                "<br/>Message: " + msg;

                            Email.send({
                                Host: "smtp.elasticemail.com",
                                Username: "website.enquiry.mailer@gmail.com",
                                Password: "88A13DA696E1DA754571F28C500545642B31",
                                To: 'hisham1off@gmail.com, website.enquiry.mailer@gmail.com', // Add the second email address here
                                From: "website.enquiry.mailer@gmail.com",
                                Subject: "Decor Stories Website Enquiry",
                                Body: body
                            }).then(function(message) {
                                // Handle email sending success or failure if needed
                                // Assuming the button should be updated here as well
                                $('.query_form .btn').text('Message sent');
                                $('.query_form')[0].reset();
                            });
                        }
                    </script>

                </div>
            </div>
        </div>
    </section>

    <div class="map" style="margin-bottom: -8px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.354278019042!2d76.31301817397112!3d9.987565773250708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d6570ce0d29%3A0x63e4646f067e3683!2sDecor%20Stories!5e0!3m2!1sen!2sin!4v1706006214390!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- main content end -->

    <?php include("footer.php"); ?>