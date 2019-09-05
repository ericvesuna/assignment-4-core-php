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

$productid = $_POST["productid"];




echo $target_file;
//echo "<br>";
//echo $imageFileType;
//echo "<br>";
//echo "<br><br>";

 //echo $category_name;
// echo "<br>";
// echo "bb" .$fileupload;
 //echo "<br>";
 //echo $price;
 echo "<br>";
 echo $productid;



if($fileupload == "")
    {
        $fileupload == NULL;
        echo "no image";
        $sql="update product_details SET Product_Name ='$productname', Product_Price = '$price', Product_Category_Id = '$category_name' WHERE Product_Id = '$productid'";
    }
  

  else if ($imageFileType == "jpg" || imageFileType == "jpeg" || $imageFileType == "png")
        {
          if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$target_file))
           {
             //echo "The file ". basename( $_FILES["uploadfile"]["name"]). " has been uploaded.";
             
             $sql="update product_details SET Product_Name ='$productname', Product_Price = '$price', Product_Image = '$filename', Product_Category_Id = '$category_name' WHERE Product_Id = '$productid'";           
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

























if($update_fileupload == "")
    {
        $update_fileupload == NULL;
        echo "no image";
        $sql="update product_details SET Product_Name ='$update_productname', Product_Price = '$update_price', Product_Category_Id = '$update_category_name' WHERE Product_Id = '$update_productid'";
    }
  

  else if ($update_imageFileType == "jpg" || $update_imageFileType == "jpeg" || $update_imageFileType == "png")
        {
          if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$target_file))
           {
             //echo "The file ". basename( $_FILES["uploadfile"]["name"]). " has been uploaded.";
             
             $sql_update="update product_details SET Product_Name ='$update_productname', Product_Price = '$update_price', Product_Image = '$update_filename', Product_Category_Id = '$update_category_name' WHERE Product_Id = '$update_productid'";           
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





?>