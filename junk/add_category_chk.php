<?php

require 'db_connection.php';

 $categoryname=$_POST["add_category"];

 $sql="Select category_name from category WHERE category_name='$categoryname'";
   
  $result = $conn->query($sql);
  $rowcount = $result->num_rows;
 
   if($rowcount > 0)
     {
         echo "<script>alert('category name already exist');window.location.href='add_category.php'</script>"; 
     }

 else
 { 
 $sql1="insert into category(category_name) Values ('$categoryname')";
 
  if($conn->query($sql1)=== TRUE)
   {
   	 echo "<script>alert('Inserted');window.location.href='add_category.php'</script>";

   }
   else
   {
   	 echo "<script>alert('Failed');window.location.href='add_category.php'</script>";
   }
}
$conn->close();

?>