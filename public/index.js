document.addEventListener("DOMContentLoaded", function () {
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
});
