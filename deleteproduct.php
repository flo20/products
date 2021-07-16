<?php  
//DB connection end 
include "common/dbconnection.php"; 

if(isset($_POST['delete-product'])){
	$checkbox = $_POST['product_id'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($conn,"DELETE FROM Items WHERE Item_no='".$del_id."'");
} header("Location:index.php");
}
mysqli_close($conn);
?>
