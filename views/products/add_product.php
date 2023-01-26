<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid ">
    <a class="navbar-brand " href="/">Product Add</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
      <li class="nav-item">
        <button type="submit" form='product_form' id="save_btn" class="btn btn-outline-primary me-2">Save</button>
      </li>
      <li class="nav-item">
        <a href="/"><button id="cancel-btn"class="btn btn-outline-primary me-2">Cancel</button></a>
      </li>
      </ul>
    </div>
    </div>
  </nav>
  <?php if (!empty($errors)) { ?>
                    <div class="container mb-5 alert alert-danger">
                       <ul class="m-0">
                        <?php foreach ($errors as $error): ?>
                                             <li><?= $error ?></li>
                           <?php endforeach; ?>
                           </ul>
                     </div>
<?php } ?>
<div class="container mt-5">
<form id="product_form"  method="POST">
  <div class="main mb-3">
    <label  for="sku">SKU</label>
    <input type="text" id="sku" name="sku" placeholder="#sku" value="<?php echo $_POST['sku'] ?? '' ?>" >
  </div>
  <div class="main mb-3">
    <label for="name">Name</label>
    <input type="text" name='name'  id="name" placeholder="#name" value="<?php echo $_POST['name'] ?? '' ?>" >
  </div>
  <div class="main mb-3">
    <label for="price" class="form-label">Price ($)</label>
    <input type="number" name='price' id="price" placeholder="#price" value="<?php echo $_POST['price'] ?? '' ?>" >
  </div>
  <div class="selection mb-5">
  <label id="select_label" for="typeswitcher">Type Switcher: </label>
  <select class="selectType" name="selectType" id="productType">
  <option selected value="Type Switcher"  id="typeswitcher">Type Switcher</option>
  <option id="DVD" value="DVD">DVD</option>
  <option id="Furniture" value="Furniture">Furniture</option>
  <option id="Book" value="Book">Book</option>
</select>
  </div>
<div class="DVD-container">
<div class="dvd mb-3">
    <label for="size" >Size (MB)</label>
    <input type="number" name='size' id="size" placeholder="#size" value="<?php echo $_POST['value'] ?? '' ?>" >
 </div>
  <span class="form-text">Please, provide size.</span>
</div>
<div class="Furniture-container">
<div class="height mb-3">
    <label for="height" >Height (CM)</label>
    <input type="number" name='height' id="height" placeholder="#height" value="<?php echo $_POST['height'] ?? '' ?>" >
 
</div>
  <div class="width mb-3">
    <label for="width" >Width (CM)</label>
    <input type="number" name='width' id="width" placeholder="#width" value="<?php echo $_POST['width'] ?? '' ?>" >
  
  </div>
  <div class="length mb-3">
    <label for="length" >Length (CM)</label>
    <input type="number" name='length' id="length" placeholder="#length" value="<?php echo $_POST['length'] ?? '' ?>" >
  </div>
  <span class="form-text">Please, provide dimensions.</span>
  </div>
  <div class="book-container">
<div class="weight mb-3">
    <label for="weight" >weight (KG)</label>
    <input type="number" name='weight'id="weight" placeholder="#weight" value="<?php echo $_POST['weight'] ?? '' ?>" >
</div>
  <span class="form-text">Please, provide weight.</span>
  </div>
</form>
</div>

