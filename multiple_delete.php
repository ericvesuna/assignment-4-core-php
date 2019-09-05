<?php
require 'db_connection.php';
  $checkbox=$_POST['checkbox'];

  for ($i=0; $i<4;$i++) 
   {
   	 $a = $checkbox[$i];
    	  echo $a;
       $sql2 = "delete from product_details WHERE Product_Id='$del_id'";

       if($conn->query($sql2) === TRUE)
         {
        	echo "<script>alert('Slected Record deleted');window.location.href='list_product.php'</script>";  
         }
       else
         {
            echo "<script>alert('Failed to Delete selected Record');window.location.href='list_product.php'</script>";
         }    	

   }
?>