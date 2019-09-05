<?php

require 'db_connection.php';

 $category_name = $_POST["category"];
 $fileupload= basename( $_FILES["uploadfile"]["name"]);
 $price = $_POST["price"];
 $productname = $_POST["productname"];


$target_dir = "uploads/";
$filename = time() .$fileupload;
$target_file = $target_dir .$filename;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));






//echo $target_file;
//echo "<br>";
//echo $imageFileType;
//echo "<br>";
//echo "<br><br>";

 //echo $category_name;
// echo "<br>";
 //echo $fileupload;
 //echo "<br>";
 //echo $price;
 //echo "<br>";
 //echo $productname;


if($fileupload == "")
    {
        $fileupload == NULL;
        echo "no image";
        $sql="insert into product_details(Product_Name, Product_Price, product_Image, Product_Category_Id) Values ('$productname','$price','$fileupload','$category_name')";
    }
  

  else if ($imageFileType == "jpg" || imageFileType == "jpeg" || $imageFileType == "png")
        {
          if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$target_file))
           {
             //echo "The file ". basename( $_FILES["uploadfile"]["name"]). " has been uploaded.";
             
              $sql="insert into product_details(Product_Name, Product_Price, product_Image, Product_Category_Id) Values ('$productname','$price','$filename','$category_name')";
           
           } 
          else 
           {
             echo "<script>alert('Sorry, there was an error uploading your file.');window.location.href='add_product.php'</script>";
           }
        }  
  else
    {
        echo "<script>alert('Please select only image file with .jpg or .png extension');window.location.href='add_product.php'</script>";
        

    }   




  if($conn->query($sql)=== TRUE)
   {
     echo "<script>alert('Record inserted');window.location.href='list_product.php'</script>";  
   }
   else
   {
     echo "<script>alert('Failed to insert Record');window.location.href='add_product.php'</script>";
   }

$conn->close();







?>