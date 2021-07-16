<?php
 include "common/addfunction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- Google font -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Custom CSS -->
<link rel="stylesheet" href="styles.css">
    <title>Products App</title>
</head>

<!-- Header -->
<header class="header-container">
<p>Product Add</p>
<div class="button-wrapper">
<label for="submit-form" tabindex="0" class="save-product-button">Save</label>

<button id="cancel-product-button" onclick="window.location.href = 'index.php';">
    Cancel
</button>
</div>
</header>
<!-- End of header -->
<body>

<!-- Main -->
<!-- Product Items -->

<main class="add-product-form">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="product_form" >

  <div class="form-field">
    <label for="sku" class="product-labels">SKU</label>
    <input type="text" name="sku" id="sku" placeholder="Type SKU" class="product-input" value="<?php echo htmlspecialchars($sku_info)?>"/>
  </div>
<!-- Error message -->
  <span> 
  <span class="error"><?php echo $sku_error;?></span>
  </span>

  <div class="form-field">
    <label for="name" class="product-labels">Name</label>
    <input type="text" name="name" id="name" placeholder="Type name"  class="product-input" value="<?php echo htmlspecialchars($name_info)?>"/>
  </div>
  <!-- Error message -->
  <span>
  <?php echo $name_error ?>
  </span>

  <div class="form-field">
    <label for="price" class="product-labels">Price (&#36;) </label>
    <input type="number" name="price" id="price" placeholder="Insert price"  class="product-input" value="<?php echo htmlspecialchars($price_info)?>"/>
  </div>
  <span>
  <?php echo $price_error ?>
  </span>
 

<!-- Dropdown list  -->
  <div class="form-field">
    <label for="productType" class="product-labels">Type Switcher</label>
    <select id="productType" name="productType">
      <option value="" disabled selected>Type Switcher</option>
      <option id="DVD" value="DVD">DVD</option>
      <option id="Furniture" value="Furniture">Furniture</option>
      <option id="Book" value="Book">Book</option>
    </select>
  </div>
  <span>
<?php echo $type_error ?>
  </span>

  <!-- Dynamically displayed product type -->
  <div class="product-description-container product_form2 product-size box DVD">
    <label for="size" class="product-labels">Size(MB)</label>
    <input type="number" name="size" id="size" placeholder="Insert size"  class="product-input" value="<?php echo htmlspecialchars($size_info)?>" />
    <span>
  <?php echo $size_error ?>
  </span>
  </div>
 

  <div class="product-description-container product_form2 product-dimension box Furniture">
    <div class="dimension-input">
      <label for="height" class="product-labels">Height (CM)</label>
      <input type="number" name="height" id="height" placeholder="Insert height" class="product-input" value="<?php echo htmlspecialchars($height_info)?>" />
    </div>
    <div class="dimension-input">
      <label for="width" class="product-labels">Width (CM)</label>
      <input type="number" name="width" id="width" placeholder="Insert width"  class="product-input" value="<?php echo htmlspecialchars($width_info)?>"/>
    </div>
    <div class="dimension-input">
      <label for="length" class="product-labels">Length (CM)</label>
      <input type="number" name="length" id="length" placeholder="Insert length"   class="product-input" value="<?php echo htmlspecialchars($length_info)?>"/>
    </div>
      <!-- Error message -->
   <span>
  <?php echo $width_error ?>
  </span>
  </div>
 

  <div class="product-description-container product_form2 product-weight box Book">
    <label for="password-input" class="product-labels"> Weight (KG) </label>
    <input type="number" name="weight" id="weight" placeholder="Insert weight" class="product-input"  class="product-input" />
      <!-- Error message -->
      <span>
  <?php echo $weight_error  ?>
  </span>

  </div> 
<!-- Hidden submit button -->
  <input type="submit" id="submit-form" class="hidden" name="submitform"/>
</form>

</main>
<!-- End of main -->

<!-- Footer -->
<?php include "./common/footer.php"?>
<!-- End of footer -->

  <!-- Bootsrap bundle with Popper first, then jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Display product type dynamically -->
<script>
  $(document).ready(function(){
    $("#productType").change(function(){
      $(this).find("option:selected").each(function(){
        const optionValue = $(this).attr("value");
        if(optionValue){
          $(".box").not("." + optionValue).hide();
          $("." + optionValue).show();
        }  else{
          $(".box").hide();
        }
      })
    }).change();
  });
</script>
</body>
</html>