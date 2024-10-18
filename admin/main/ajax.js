function populateCategoryDropdown() {
  $.ajax({
    type: "GET",
    url: "product/fetch-category.php",
    success: function (data) {
      $("#categoryDropdown").html(data);
    },
    error: function () {
      console.log("Error fetching.");
    },
  });
}

function populateSizeDropdown() {
  $.ajax({
    type: "GET",
    url: "product/fetch-size.php",
    success: function (data) {
      $("#SizeDropdown").html(data);
    },
    error: function () {
      console.log("Error fetching.");
    },
  });
}

function populateMaterialDropdown() {
  $.ajax({
    type: "GET",
    url: "product/fetch-material.php",
    success: function (data) {
      $("#MaterialDropdown").html(data);
    },
    error: function () {
      console.log("Error fetching.");
    },
  });
}

function populatecolorDropdown() {
  $.ajax({
    type: "GET",
    url: "product/fetch-color.php",
    success: function (data) {
      $("#colorDropdown").html(data);
    },
    error: function () {
      console.log("Error fetching.");
    },
  });
}

// Call the function to populate category dropdown on page load
$(document).ready(function () {
  populateCategoryDropdown();
  populateSizeDropdown();
  populateMaterialDropdown();
  populatecolorDropdown();
});

$("#categoryForm").on("submit", function (event) {
  event.preventDefault(); // Prevent the default form submission

  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: "category/add.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      $("#message").html(response);
      populateCategoryDropdown();
      $("#categoryForm")[0].reset(); // Reset the form
    },
    error: function () {
      $("#message").html("<p>Error submitting the form.</p>");
    },
  });
  $(".popup-overlay , .popup-form").hide();
});

$("#sizeForm").on("submit", function (event) {
  event.preventDefault(); // Prevent the default form submission

  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: "size/add.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      $("#message").html(response);
      populateSizeDropdown();
      $("#sizeForm")[0].reset(); // Reset the form
    },
    error: function () {
      $("#message").html("<p>Error submitting the form.</p>");
    },
  });
  $(".popup-overlay , .popup-form").hide();
});

$("#materialForm").on("submit", function (event) {
  event.preventDefault(); // Prevent the default form submission
  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: "material/add.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      $("#message").html(response);
      populateMaterialDropdown();
      $("#materialForm")[0].reset(); // Reset the form
    },
    error: function () {
      $("#message").html("<p>Error submitting the form.</p>");
    },
  });
  $(".popup-overlay , .popup-form").hide();
});

$("#colorForm").on("submit", function (event) {
  event.preventDefault(); // Prevent the default form submission
  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: "color/add.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      $("#message").html(response);
      populatecolorDropdown();
      $("#colorForm")[0].reset(); // Reset the form
    },
    error: function () {
      $("#message").html("<p>Error submitting the form.</p>");
    },
  });
  $(".popup-overlay , .popup-form").hide();
});

$(document).ready(function () {
  $(".category-add-btn").click(function () {
    $("#addCategory , .popup-overlay").show();
  });
  $(".size-add-btn").click(function () {
    $("#addSize , .popup-overlay").show();
  });
  $(".material-add-btn").click(function () {
    $("#addMaterial , .popup-overlay").show();
  });
  $(".color-add-btn").click(function () {
    $("#addcolor , .popup-overlay").show();
  });
  $(".close-btn").click(function () {
    $(this).closest(".popup-form").hide();
    $(".popup-overlay").hide();
  });
  $(".popup-overlay").click(function () {
    $(".popup-overlay , .popup-form").hide();
  });
});

// product add

$(document).ready(function () {
  // Listen for form submission
  $("#product-form").submit(function (event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get form data
    var formData = new FormData($(this)[0]);

    // Make AJAX request
    $.ajax({
      type: "POST",
      url: "product/add.php", // Replace with your actual backend script URL
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        $("#message").html(response);
        $("#product-form")[0].reset(); 
        $("#imagePreview").html(''); 
        
      },
      error: function (error) {
        $("#message").html(error);
      },
    });
  });
});
