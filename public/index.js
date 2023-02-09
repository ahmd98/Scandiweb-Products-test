if (window.location.pathname === "/add_product") {
  let dvd = document.querySelector(".DVD-container");
  let book = document.querySelector(".book-container");
  let furn = document.querySelector(".Furniture-container");
  let productType = localStorage.getItem("#productType");

  if (productType === null) {
    dvd.style.display = "none";
    book.style.display = "none";
    furn.style.display = "none";
  }

  let prod_type = document.querySelector(".selectType");
  prod_type.addEventListener("change", (event) => {
    if (event.target.value === "Book") {
      dvd.style.display = "none";
      book.style.display = "block";
      furn.style.display = "none";
    } else if (event.target.value === "DVD") {
      dvd.style.display = "block";
      book.style.display = "none";
      furn.style.display = "none";
    } else if (event.target.value === "Furniture") {
      dvd.style.display = "none";
      book.style.display = "none";
      furn.style.display = "block";
    } else if (event.target.value === "typeswitcher") {
      dvd.style.display = "none";
      book.style.display = "none";
      furn.style.display = "none";
    }
  });
  function checksku() {
    jQuery.ajax({
      url: "checkform.php",
      data: "sku=" + $("#sku").val(),
      type: "POST",
      success: function (data) {
        $("#checkSku").html(data);
      },
      error: function () {},
    });
  }
  $(function () {
    const $productForm = $("#product_form");
    if ($productForm.length) {
      $productForm.validate({
        rules: {
          sku: {
            required: true,
          },
          name: {
            required: true,
          },
          price: {
            required: true,
          },
          size: {
            required: true,
          },
          width: {
            required: true,
          },
          length: {
            required: true,
          },
          height: {
            required: true,
          },
          weight: {
            required: true,
          },
        },
        errorPlacement: function (error, element) {
          error.insertAfter($(element).parent("div"));
        },

        messages: {
          sku: {
            required: "SKU is required",
          },
          name: {
            required: "Name is required",
          },
          price: {
            required: "Price is required",
          },
          size: {
            required: "Size is required",
          },
          height: {
            required: "Height is required",
          },
          width: {
            required: "Width is required",
          },
          length: {
            required: "Length is required",
          },
          weight: {
            required: "Weight is required",
          },
        },
      });
    }
  });
}
