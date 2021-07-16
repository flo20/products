
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product-list";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
  }
//echo "Connected successfully";
 //$query = "SELECT * FROM Books";

// if ($result = mysqli_query($conn, $query ))
//   //echo "Query was successful";
//   $row = mysqli_fetch_array($result);
//   echo "Your book info is " .$row[1] .$row[2] .$row[3] .$row[4];
// }
?>

