<?php
session_start();

require 'db_connection.php';

$categoryid = $_GET['id'];

if($categoryid == "")
 {
   $_SESSION['status']="Please Select Proper Category"; 
   echo "<script>window.location.href='list_category.php'</script>";   
 }
else
 { 	
	$sql="delete from category WHERE category_id=$categoryid";

	if($conn->query($sql) === TRUE)
 	 {
   		$_SESSION['status']="Category Deleted"; 
   		echo "<script>window.location.href='list_category.php'</script>";  
 	 }
	else
 	 {
   		$_SESSION['status']="Failed to Delete Category";	
   		echo "<script>window.location.href='list_category.php'</script>";
 	 }
 }

$conn->close();

?>