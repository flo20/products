<?php 
//variables with empty values
$sku_error= $name_error = $price_error = $type_error = $size_error = $height_error = $width_error = $length_error = $weight_error ="";
$sku_info = $name_info = $price_info = $type_info = $size_info = $height_info = $width_info = $length_info = $weight_info = "" ;

//DB connection 
include "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST['sku'])){
      $sku_error = "Please, provide sku";
  } else {
    $sku_info = test_input($_POST['sku']);
  }
  if(empty($_POST['name'])){
      $name_error = "Please, provide name";
  } else {
    $name_info = test_input($_POST['name']);
  }
  if(empty($_POST['price'])){
      $price_error = "Please, provide price";
  } else{
    $price_info = test_input($_POST['price']);
  }
  if(empty($_POST['size'])){
      $size_error = "Please, provide size";
  } else{
    $size_info = test_input($_POST['size']);
  }
  if(empty($_POST['height'])){
      $height_error = "Please, provide height";
  } else{
    $height_info = test_input($_POST['height']);
  }
  if(empty($_POST['width'])){
      $width_error = "Please, provide width";
  } else{
    $width_info = test_input($_POST['height']);
  }
  if(empty($_POST['length'])){
      $length_error = "Please, provide length";
  } else{
    $length_info = test_input($_POST['length']);
  }
  if(empty($_POST['weight'])){
      $weight_error  = "Please, provide weight";
  } else{
    $weight_info = test_input($_POST['weight']);
  }
  if(empty($_POST['productType'])){
      $type_error = "Please, provide the data of indicated type";
  } else {
    $type_info = test_input($_POST['productType']);
  }  
  if($sku_error && $name_error && $price_error && $type_error && $size_error && $height_error && $width_error && $length_error && $weight_error != ""){
        echo "Please, submit required data";
    } else {
    $sql1 = "SELECT Item_no FROM `Items` WHERE sku = '".mysqli_real_escape_string($conn,$_POST["sku"])."' LIMIT 1";
    $result1 = mysqli_query($conn, $sql1);
  
    if(mysqli_num_rows($result1) > 0 ){
      echo "This product already exists";
     } else {
  
      $sku_info  = $_POST['sku'];
      $name_info  = $_POST['name'];
      $price_info  = $_POST['price'];
      $size_info  = $_POST['size'];
      $height_info  = $_POST['height'];
      $width_info  = $_POST['width'];
      $length_info  = $_POST['length'];
      $weight_info  = $_POST['weight'];
  
      $queryitems = "INSERT INTO `Items` (`sku`, `name`, `price`) VALUES ('$sku_info', '$name_info', '$price_info')";
      mysqli_query($conn, $queryitems);
  
      if(!empty($_POST['weight'])){
         $querybook = "INSERT INTO `Books` (`weight`, `Item_no`) VALUES ('$weight_info', LAST_INSERT_ID())";
         mysqli_query($conn, $querybook);
      } else if(!empty($_POST['size'])){
        $querydvd = "INSERT INTO `DVDs` (`size`, `Item_no`) VALUES ('$size_info', LAST_INSERT_ID())";
        mysqli_query($conn, $querydvd);
      } else if(!empty($_POST['height']) && !empty($_POST['width']) && !empty($_POST['length'])){
         $queryfurniture = "INSERT INTO `Furniture` (`height`, `width`, `length`, `Item_no`) VALUES ('$height_info', '$width_info', '$length_info', LAST_INSERT_ID())";
         mysqli_query($conn, $queryfurniture);
      } 
      //redirect user to index page when successfull
      header('Location: index.php');
      exit; 
    } 
     }
  
} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>