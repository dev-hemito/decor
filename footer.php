
<footer class="footer bg-dark">
    <div class="container">
        <div class="row mb-n4">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="footer-widget">
                    <a class="footer-brand" href="./">
                        <img src="assets/images/decor-logo-white.png" alt="images_not_found">
                    </a>
                    <p>Decor Stories specializes in a wide array of interior products, blending style and
                        functionality to transform spaces into aesthetically pleasing and personalized environments.
                    </p>


                </div>

            </div>
            <div class="col-lg-2 col-sm-6 mb-4">
                <div class="footer-widget">
                    <h4 class="title">Quick Links</h4>
                    <ul class="footer-menu">

                        <li class="footer-menu-items"><a class="footer-menu-link" href="./">Home</a></li>
                        <li class="footer-menu-items"><a class="footer-menu-link" href="about">About</a></li>
                        <li class="footer-menu-items"><a class="footer-menu-link" href="shop">Shop</a></li>
                        <!-- <li class="footer-menu-items"><a class="footer-menu-link" href="gallery">Gallery</a></li> -->
                        <li class="footer-menu-items"><a class="footer-menu-link" href="contact">Contact</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 mb-4">
                <div class="footer-widget">
                    <h4 class="title">usefull Links</h4>
                    <ul class="footer-menu">
                        <!-- <li class="footer-menu-items"><a class="footer-menu-link" href="return-policy">Return Policy</a></li> -->
                        <li class="footer-menu-items"><a class="footer-menu-link" href="terms-conditions">Terms & Conditions</a></li>
                        <li class="footer-menu-items"><a class="footer-menu-link" href="privacy-policy">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="footer-widget f-contact">
                    <h4 class="title">Contact Us</h4>

                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt"></i>
                        <p class="mb-2">Opposite, Mc Donalds, Chakkaraparambu,<br> Vyttila, Ernakulam, Kerala 682032</p>
                    </div>

                    <div class="d-flex">
                        <i class="fa fa-envelope"></i>
                        <p class="mb-2"> <a href="mailto:info@decorstories.in">info@decorstories.in</a></p>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone"></i>
                        <p> <a href="tel:+919656000337">+91 96560 00337</a></p>
                    </div>

                    <p>
                        <!-- Social Icons -->
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <!-- Add more social icons as needed -->
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="copy-right bg-dark">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="border-top">
                        <div class="row mb-n4">
                            <div class="col-12 col-md-6 mb-4 order-last order-md-first">
                                <p class="text-center text-md-start">Copyright &copy; <span id="currentYear"></span> <a href="https://hemitodigital.in/">Decor Stories.</a> All
                                    Rights
                                    Reserved
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>


<div class="popup-overlay"></div>

<div id="product-modal-view" class="col-md-10 pt-3">
    <div class="container">
        <i class="fa fa-times modal-close"></i>
        <div class="py-3"></div>
        <div class="row">

            <div class="col-md-4">
                <img src="" class="product-image" alt="">
            </div>
            <div class="col-md-8">
                <h3 class="product-name"></h3>

                <p class="price">
                    <del class="old-price"></del>
                    <span class="new-price"></span>
                </p>
                <pre class="product-description-container"></pre>

                <div class="product-add-to-cart">
                    <span class="control-label">Quantity</span>

                    <div class="product-count style d-flex my-4">
                        <div class="count d-flex">
                            <input type="number" min="1" max="100" step="1" value="1">
                            <div class="button-group">
                                <button class="count-btn increment">
                                    <span class="ion-chevron-up"></span>
                                </button>
                                <button class="count-btn decrement">
                                    <span class="ion-chevron-down"></span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <button class="whatsapp-order2">
                                <i class="fab fa-whatsapp"></i> Enquire
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed-contact">

    <a href="tel:+919656000337" target="_blank"><i class="fa fa-phone"></i></a>

    <a href="https://wa.me/919656000337?text=Hi%20Decor" target="_blank"><i class="fab fa-whatsapp"></i></a>

</div>

<!-- Vendor JS -->

<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="assets/js/plugins/ajax-contact.js"></script>
<script src="assets/js/plugins/jquery.waypoints.min.js"></script>
<script src="assets/js/plugins/ajax-mailchimp.js"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/plugins/scroll-up.js"></script>

<script>
    $(document).ready(function() {
        $('.product-thumb').on('click', function() {
            // Find the closest product-card ancestor to the clicked image
            let productCard = $(this).closest('.product-card');

            // Extract data from the product card
            let productTitle = productCard.find('.product-title').text();
            let productImageSrc = productCard.find('.product-thumb img').attr('src');
            let productDescription = productCard.find('.product-description').html();
            let oldprice = productCard.find('.old-price').text();
            let newprice = productCard.find('.new-price').text();

            // Add a class to the .product-thumb element
            $('.product-thumb').addClass('clicked');

            // Select the modal elements to update
            let modal = $('#product-modal-view');
            let modalTitle = modal.find('.product-name');
            let modalImage = modal.find('.product-image');
            let modalDescription = modal.find('.product-description-container');
            let modaloldprice = modal.find('.old-price');
            let modalnewprice = modal.find('.new-price');

            // Update the modal elements with the product information
            modalTitle.text(productTitle);
            modaloldprice.text(oldprice);
            modalnewprice.text(newprice);
            modalImage.attr('src', productImageSrc);

            // Clear existing content in the container
            modalDescription.empty();

            // Append the product description to the container
            modalDescription.html(productDescription);

            // Show the modal
            modal.fadeIn();
            $('.popup-overlay').fadeIn();
        });

        $('.modal-close, .popup-overlay').on('click', function() {
            // Remove the class added to the .product-thumb element
            $('.product-thumb.clicked').removeClass('clicked');

            $('#product-modal-view, .popup-overlay').fadeOut();
        });
    });
</script>



<script>
    $(document).ready(function() {
        // WhatsApp number
        var whatsappNumber = '919846161051';

        // Event listener for the "Enquire" button
        $('.whatsapp-order').click(function() {
            var productCard = $(this).closest('.product-card');
            var productName = productCard.find('.product-title').text().trim();
            var productPrice = productCard.find('.product-price').text().trim();

            var message = encodeURIComponent(`I would like to enquire about: ${productName}, priced at ${productPrice}`);
            var whatsappUrl = `https://wa.me/${whatsappNumber}?text=${message}`;

            window.open(whatsappUrl, '_blank');
        });
    });
</script>


<script>
    $(document).ready(function() {
        // WhatsApp number
        var whatsappNumber = '919846161051';

        // Event listener for the "Enquire" button
        $('.whatsapp-order2').click(function() {
            var container = $(this).closest('.container');
            var productName = container.find('.product-name').text().trim();
            var productPrice = container.find('.new-price').text().trim();
            var quantity = container.find('input[type="number"]').val().trim();
            var message = encodeURIComponent(`I would like to enquire about: ${productName}, priced at ${productPrice}, Quantity: ${quantity}`);
            var whatsappUrl = `https://wa.me/${whatsappNumber}?text=${message}`;

            // Open WhatsApp chat in a new tab
            window.open(whatsappUrl, '_blank');
        });
    });
</script>


<!-- Add this script before the closing </body> tag -->
<script>
    window.addEventListener("load", function() {
        setTimeout(function() {
            document.body.classList.add("loaded");
        }, 100); // Adjust the delay if needed
    });
</script>



<script src="assets/js/main.js"></script>

</body>

</html>