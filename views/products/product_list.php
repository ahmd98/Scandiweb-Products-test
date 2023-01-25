<nav
  class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">PRODUCT LIST</a>
    <button
      class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-outline-primary me-2" href="/add_product">ADD</a>
        </li>
        <li class="nav-item">
          <form action="/delete_product" method="POST" id="delete-product">
            <button id="delete-product-btn" name="product_delete_btn" class="btn btn-outline-primary" type="submit">MASS DELETE</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="list">
  <div class="container">
    <div class="row">
      <?php foreach ($products as $product) { ?>
          <div class="card">
            <label class="form-check-label">
            <input form="delete-product" type="checkbox" class="delete-checkbox form-check-input" name="product_delete_sku[]" value="<?php echo $product['sku'] ?>"/>
            </label>
              <p><?php echo $product['sku'] ?></p>
              <p><?php echo $product['name'] ?></p>
              <p><?php echo $product['price'] . "$" ?></p>
              <p><?php echo $product['value'] ?></p>
          </div>
      <?php } ?>
    </div>
  </div>
</div>

