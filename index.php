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
<p>Product List</p>
<div class="button-wrapper">
<button 
class="add-product-button" 
id="btnSart" 
onclick="window.location.href ='addproduct.php';">ADD</button>

<label for="delete-product" tabindex="0" class="delete-checkbox">MASS DELETE</label>

</div>
</header>
<!-- End of header -->
<body>
<!-- Main -->
<?php 
//DB connection end 
include "common/dbconnection.php";
?>

<!-- Product Items -->
<main>


        <!-- Book -->
<form method="post" action="deleteproduct.php" class="product-wrapper">

<?php
$sql = "SELECT Books.weight,Items.sku,Items.name,Items.price,Items.Item_no
FROM Books,Items 
WHERE Items.Item_no = Books.Item_no";


$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0){
    while($row = mysqli_fetch_array($result)){
        $field1name = $row["sku"];
        $field2name = $row["name"];
        $field3name = $row["price"];
        $field4name = $row["weight"];
        $field5name = $row["Item_no"];

    
    ?>
 
        <div class='product item-1'>
       <input type="checkbox" name="product_id[]" class="delete-checkbox" value="<?php echo $row["Item_no"]; ?>" />
        <div class='product-description'>
          <p><?= $field1name ?></p>
          <p><?=$field2name ?></p> 
          <p><?=$field3name ."&#36;"?> </p>
          <p><?=$field4name ."KG"?></p>
        </div>
        </div>
<?php
    }
  }
    ?>



<!-- Furniture -->

<?php
 $sql = "SELECT Furniture.height,Furniture.width,Furniture.length,Items.Item_no, Items.sku, Items.name, Items.price
        FROM Furniture,Items 
        WHERE Items.Item_no = Furniture.Item_no";

$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0){
    while($row = mysqli_fetch_array($result)){
        $field1name = $row["sku"];
        $field2name = $row["name"];
        $field3name = $row["price"];
        $field4name = $row["height"];
        $field5name = $row["width"];
        $field6name = $row["length"];
        $field7name = $row["Item_no"];
    ?>

        <div class='product item-1'>
       <input type="checkbox" name="product_id[]" class="delete-checkbox" value="<?php echo $row["Item_no"]; ?>" />
        <div class='product-description'>
          <p><?=$field1name ?></p>
          <p><?=$field2name ?></p> 
          <p><?=$field3name ."&#36;"?></p>
          <p><?=$field4name ."x". $field5name ."x". $field6name ?></p>
        </div>
        </div>
<?php
    }
  }
    ?>


<!-- DVDs -->

<?php

$sql3 = "SELECT DVDs.size,Items.sku,Items.name,Items.price,Items.Item_no
FROM DVDs,Items 
WHERE Items.Item_no = DVDs.Item_no";

$result = $conn->query($sql3);

if(!empty($result) && $result->num_rows > 0){
    while($row = mysqli_fetch_array($result)){
        $field1name = $row["sku"];
        $field2name = $row["name"];
        $field3name = $row["price"];
        $field4name = $row["size"];
        $field5name = $row["Item_no"];
    ?>

        <div class='product item-1'>
       <input type="checkbox" name="product_id[]" class="delete-checkbox" value="<?php echo $row["Item_no"]; ?>" />
        <div class='product-description'>
          <p><?=$field1name ?></p>
          <p><?=$field2name ?></p> 
          <p><?=$field3name ."&#36;"?> </p>
          <p><?=$field4name ."MB"?></p>
        </div>
        </div>
<?php
    }
  }
    ?>

<!-- Hidden submit button -->
<input type="submit" name="delete-product" id="delete-product" class="hidden">
   </form>
</main>
<!-- End of main -->

<!-- Footer -->
<?php include "./common/footer.php"?>
<!-- End of footer -->

    <!-- Bootsrap bundle with Popper, the jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>