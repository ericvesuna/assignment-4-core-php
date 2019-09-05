<?php
session_start();

require 'db_connection.php';

$productid = $_GET['id'];

if($productid == "")
 {
   $_SESSION['status']="Please Select Proper Product"; 
   echo "<script>window.location.href='list_product.php'</script>";   
 }
else
 { 	
	$sql="delete from product_details WHERE Product_Id='$productid'";

	 if($conn->query($sql) === TRUE)
 	  {
 		$_SESSION['status']="Product Deleted";
   		echo "<script>window.location.href='list_product.php'</script>";  
 	  }
	 else
 	 {
   	    $_SESSION['status']="Failed to Delete Product";	
   		echo "<script>window.location.href='list_product.php'</script>";
 	 }
 }
$conn->close();


?>