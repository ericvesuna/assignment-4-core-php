<?php
session_start();
require 'db_connection.php';

?>


<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie" lang="en" dir="ltr"><![endif]-->
<!--[if gt IE 8]> <html class="no-js gt-ie8 ie" lang="en" dir="ltr"><![endif]-->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" />
<title>Vital Partners Leading Dating and Introduction Agency in Sydney &amp; Canberra</title>
<link href="css/default.css" rel="stylesheet" type="text/css" media="all">
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all">
<!--<link href="css/small-resolution.css" rel="stylesheet" type="text/css" media="all">
<link href="css/medium-resolution.css" rel="stylesheet" type="text/css" media="all">
<link href="css/high-resolution.css" rel="stylesheet" type="text/css" media="all">-->

<!-- jQuery library (served from Google) -->

<!-- bxSlider Javascript file -->




<!-- My validation Javascript file -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>


<script type="text/javascript">
function category_value(val)
 {
  var cat_value= val;
var cat_text = cat_value.options[cat_value.selectedIndex].text;


  document.getElementById('cat_name').innerHTML = cat_text;
 }

</script>


 <!-- ENd    -->



<!-- bxSlider CSS file -->
<link href="styling.css" rel="stylesheet" />
<!-- Responsive -->
<link href="css/responsive.css" rel="stylesheet" />



</head>

<body>




<!--wrapper-starts-->
<div id="wrapper"> 
  
 <!--header-starts-->
  <header class="clearfix">

    <div class="container"><!--container Start-->

		<div class="Logo_Cont left"><!--Logo_Cont Start-->
                    	
           <a href="index.html"><img src="images/logo.png" alt=""  /></a>
        
        </div><!--Logo_Cont End-->
		
		<div class="Home_Cont_Right right"><!--Home_Cont_Right Start-->
                    	
            <div class="Home_Cont_Right_Top left"><!--Home_Cont_Right_Top Start-->
                 
				 <div class="Top_Search1 left">Call Us Today! (02) 9017 8413</div>
				 <div class="Top_Search2 right"><input  id="tags1" name="" type="text" onclick="this.value='';" onblur="validate_field('phone');"  value="Type desired Job Location" /></div>
           
        	</div><!--Home_Cont_Right_Top End-->

			<div class="Home_Cont_Right_Bottom left"><!--Home_Cont_Right_Bottom Start-->
				<div class="toggle_menu"><a href="javascript:void(0)">Menu</a></div>
                 <div id= "topMenu">
                 	<ul>
                 		<li><a href="index.html">Home</a></li>
                 		<li><a href="blog_index.html">Dating Blog</a></li>
                 		<li><a href="who_we_help.html">Who We Help</a></li>
                 		<li><a href="why_vital.html">Why Vital</a></li>
                 		<li><a href="reviews.html">Reviews</a></li>
                 		<li><a href="contact_us.html">Contact Us</a></li>
                 	</ul>
                 </div>
           
        	</div><!--Home_Cont_Right_Bottom End-->
        
        </div><!--Home_Cont_Right End-->

	</div><!--container End-->

  </header>
  <!--header-ends-->

  <div class="section banner_section who_we_help">
  	<div class="container">
  		<h4>Edit Product</h4>
  	</div>
  </div>

  <!-- Content Section Start-->



<?php

$product_id = $_GET['id'];


	$sql1="SELECT p.*, c.category_name FROM product_details AS p INNER JOIN category AS c ON p.Product_Category_Id=c.category_id AND p.Product_Id='$product_id'";
        $result = $conn->query($sql1);
         $row=$result->fetch_assoc();
         $product_id = $row['Product_Id'];
         $product_name = $row['Product_Name'];
         $product_price = $row['Product_Price'];
         $product_image= $row['Product_Image'];
         $product_category_id = $row['Product_Category_Id'];



?>



<form id="frm_edit_product" action="" method="post" enctype="multipart/form-data">
<input type="hidden" value=<?php echo $product_id; ?> name="productid">
  
    <p id='error_msg'  align="center" style="color:red;font-family: Arial bold;font-size:18px;"></p>
   <div class="section content_section">

	
	<div class="container">
		<div class="filable_form_container">
			<div class="form_container_block">
				<ul>
					<li class="fileds">
						<div class="name_fileds">
							<label>Product Name<span style="color:red">*</span></label>
							<input name="productname" type="text" value="<?php echo $product_name; ?>" > 
						</div>
					</li>
					<li class="fileds">
						<div class="name_fileds">
							<label>Product Price<span style="color:red">*</span></label>
							<input name="price" type="text" value=<?php echo $product_price; ?>> 
						</div>
					</li>
					<li class="fileds">
						<div class="upload_fileds">
							<label>Upload Image</label>
							<input id="uploadFile" name="uploadfile" type="file" placeholder="Choose File" class="mandatory_fildes"><span id="image_name"><?php echo $product_image; ?></span>
						</div>						
					</li>
					<li class="fileds">
						<div class="name_fileds">
							<label>Select Category<span style="color:red">*</span></label>
							<select name="category" class="select category" style="z-index: 10; opacity: 0;" onchange="category_value(this)">                  
							
							<?php     
 
							    $sql="Select * from category";

                                 $result = $conn->query($sql);
                                 if($result->num_rows > 0)
                                  {
                                  while($row=$result->fetch_assoc())
                                   {
                                   	 if($product_category_id == $row['category_id'])
                                   	  {
                                   	  	$selected_category = $row['category_name'];

                                   	    echo "<option value=' ".$row['category_id']."' selected=true>".$row["category_name"]."</option>";  	
                                   	  }
                                   	 else
                                   	  {
                                   		echo "<option value=".$row["category_id"].">".$row["category_name"]."</option>";
                                      }
                                   }
                                  }
                                  else
                                   {
                                   	echo "No Category Available";
                                   }
                               ?>
                                    
							</select><span class="select" id="cat_name"><?php echo $selected_category; ?></span> 
						</div>
					</li>
				</ul>
				<div class="next_btn_block">
					<div class="next_btn">
					<button type="submit" class="submitbt" name="submit" >Submit   <span><img src="images/small_triangle.png" alt="small_triangle"> </button> 
					
					</div>
				</div>
			</div>
		</div>
	</div>		
  </div>
 </form>




  <!-- Content Section End-->

						



<div class="section clearfix section-colored7"><!--section start--> 
    	
	<div class="container"><!--container Start-->
		
		<div class="Download_Cont_Top_Left left"><!--Download_Cont_Top Start-->
			<img src="images/icon5.png" alt=""> <h1 style="display:inline;">FREE: Men Are From Mars</h1> <a href="#">Download Now</a>

		</div><!--Download_Cont_Top End-->	
		
	</div><!--container End-->

</div><!--section End-->




 <!--footer-starts-->
  <footer class="footer_wrapper">

    <div class="container"><!--container Start-->
		
		<div class="Footer_Cont_Top clearfix"><!--Footer_Cont_Top Start-->

			<span class="left"><img src="images/foot_logo.png" alt=""></span>
			<p class="right">Shortcut your search to happiness right now. 
Live a life without regrets and take action today!</p>
		</div><!--Footer_Cont_Top End-->
		
		<div class="Footer_Cont_Top2 clearfix"><!--Footer_Cont_Top2 Start-->

			<h1>Call Us Today! (02) 9017 8413</h1>
			 <a href="#">Book an Appointment <img src="images/icon7.png" alt=""></a>
 			 <a href="#">Contact a Consultant <img src="images/icon6.png" alt=""></a>
		</div><!--Footer_Cont_Top2 End-->
		
		<div class="Footer_Cont_Top3 clearfix"><!--Footer_Cont_Top3 Start-->
			
			<div class="Foot_Link1"><!--Foot_Link1 Start-->

				<h1>CONTACT INFO</h1>

				<div class="Foot_Link2"><!--Foot_Link2 Start-->
					 
				  <span>4/220 George St, Sydney NSW 2000</span>
				  <p>Phone: (02) 9017 8413</p>
				  <p>Email: <a href="mailto:info@syd.vitalpartners.com.au" target="_blank">info@syd.vitalpartners.com.au</a></p>

				</div><!--Foot_Link2 End-->

				<div class="Foot_Link2"><!--Foot_Link2 Start-->
					 
				  <span>Canberra City Act 2600 </span>
				  <p>Phone: (02) 9017 8426</p>
				  <p>Email: <a href="mailto:can@syd.vitalpartners.com.au" target="_blank">can@syd.vitalpartners.com.au</a></p>

				</div><!--Foot_Link2 End-->

			</div><!--Foot_Link1 End-->

			<div class="Foot_Link1"><!--Foot_Link2 Start-->
				<h1>RECENT POSTS</h1>

				<div class="Foot_Link3"><!--Foot_Link3 Start-->
					<ul>
						<li><a href="#">How to Recover After a Bad Date</a></li>
                        <li><a href="#">Review | Vital Partners Review</a></li>
                        <li><a href="#">Review | Vital Partners Review</a></li>
                        <li><a href="#">Review | Vital Partners Derek and Julie</a></li>
                        <li><a href="#">7 Rules for a Happy Relationship | Vital Partners Dating Sydney</a></li>
					</ul>
				</div><!--Foot_Link3 End-->

			</div><!--Foot_Link1 End-->

			<div class="Foot_Link1"><!--Foot_Link2 Start-->
				<h1>RECENT TWEETS</h1>

				<div class="Foot_Link4"><!--Foot_Link4 Start-->
					<ul>
						<li class="left">
							<p>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital Partners </p> 
			             <div class="Page_Link left"><a  href="#">http://t.co/hGCgHEU6If</a></div>
						 <div class="Page_Link right"> 1 week ago</div>
					    </li>
                      <li class="left">
							<p>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital Partners </p> 
			             <div class="Page_Link left"><a  href="#">http://t.co/hGCgHEU6If</a></div>
						 <div class="Page_Link right"> 2 week ago</div>
					    </li>
					</ul>
				</div><!--Foot_Link4 End-->

			</div><!--Foot_Link2 End-->

		
		</div><!--Footer_Cont_Top3 End-->
	
	</div><!--container End-->

    <div class="section clearfix section-colored9"><!--section section-colored9 start--> 
            
        <div class="container"><!--container Start-->
            
          <div class="Foot_Link5 left"><!--Foot_Link5 Start-->
				&copy; VitalPartners.com.au
		  </div><!--Foot_Link5 End-->

			<div class="Foot_Link6 left"><!--Foot_Link5 Start-->
				<a href="contact_us.html">Contact</a> |  <a href="terms_of_use.html">Terms of Use</a> |   <a href="privacy_policy.html">Privacy Policy</a> |  <a href="disclaimer.html">Disclaimer</a>
            </div><!--Foot_Link6 End-->


			<div class="Foot_Link7 right"><!--Foot_Link7 Start-->
				<span>FOLLOW US:</span>

				<ul class="social_media">
					<li><a href="#" class="fb">facebook</a></li>
					<li><a href="#" class="twitter">Twitter</a></li>
					<li><a href="#" class="linkedin">LinkedIn</a></li>
					<li><a href="#" class="you_tube">You Tube</a></li>
					<li><a href="#" class="gplus">googl plus</a></li>
				</ul>


				<!-- <p><a href="#"><img src="images/icon10.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon11.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon12.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon13.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon14.png" alt=""></a></p> -->
			</div><!--Foot_Link7 End-->
            
      </div><!--container End-->
    
    </div><!--section section-colored9 End--> 
	 
    <div class="section section-colored10"><!--section section-colored9 start--> 
            
        <div class="container"><!--container Start-->
			<div class="Foot_Link8 "><!--Foot_Link8 Start-->
			<a href="#">Who Designed This Site?</a> <a href="#">Who  Built This Site?</a>
			</div><!--Foot_Link8 End-->
		</div><!--container End-->
    
    </div><!--section section-colored9 End--> 
  </footer>
  <!--footer-ends--> 

  <!-- Sticky Contact Number Start
  <div class="fixed_contact_number">
  	<div class="container">
  		<div class="contact_number">
  			<span>Call Us Today! (02) 9017 8413</span>
  			<a href="contact_us.html">Conatct Us</a>
  		</div>  		
  	</div>
  </div>
   Sticky Contact Number End-->

</div>

<!--wrapper-starts-->

<script type="text/javascript">
 

$(document).ready(function() {


$("#uploadFile").click(function(){
	$("#image_name").hide();
	});




 
jQuery.validator.addMethod("alphanumeric", function(value,element){
	return this.optional(element) || /[^\W_]+$/i.test(value);
   }, "Please enter only letters and numbers");
 



$("#frm_edit_product").validate({
 
  rules:{

 		productname: {
 				           required: true,
    			         alphanumeric: true,

 		        	   },

 		price: {
 			        required: true,
 			        number: true

            },       	 

 		category:{
               required: true
             } 

 	   },
 		
 
 	messages:{

 		productname:{
 					        required: "Please enter product name"
 					      },

 		price:{
            required: "Please enter price",
            number: "Please enter only number"
 		      },			

 		category:{
               required: "Please select Category"
             }
 				
 		     },
 
 	submitHandler: function(form){
 		form.submit();
 		//alert("WELCOME!\nRegistration Successfull");
 		//return true;
 		 		
 	}
 });
});
   
</script>
</body>
</html>


<?php
if(isset($_POST['submit']))
 {
   $update_category_name = trim($_POST["category"]);
   $update_fileupload= basename( $_FILES["uploadfile"]["name"]);
   $update_price = trim($_POST["price"]);
   $update_productname = trim($_POST["productname"]);

   $target_dir = "uploads/";
   $update_filename = time() .$update_fileupload;
   $update_target_file = $target_dir .$update_filename;
   $update_imageFileType = strtolower(pathinfo($update_target_file,PATHINFO_EXTENSION));
   $update_productid = $_POST["productid"];
if($update_category_name =="" || $update_price == "" || $update_productname == "")
 {
   echo '<script type="text/javascript">document.getElementById("error_msg").innerHTML = "Please Enter all the Details";</script>'; 
 }

else
 {

/*
 echo $update_target_file;
 echo "<br>";
 echo $update_imageFileType;
 echo "<br>";
 echo "<br><br>";

 echo $update_category_name;
 echo "<br>";
 echo "base: " .$update_fileupload;
 echo "<br>";
 echo $update_price;
 echo "<br>";
 echo "databse: " .$update_filename;
 echo "<br>";
 echo $update_productid;
*/
 	if($update_fileupload == "")
    {
        $update_fileupload == NULL;
        
        $sql_update="update product_details SET Product_Name ='$update_productname', Product_Price = '$update_price', Product_Category_Id = '$update_category_name' WHERE Product_Id = '$update_productid'";
    }
  

  else if ($update_imageFileType == "jpg" || $update_imageFileType == "jpeg" || $update_imageFileType == "png")
        {
          if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$update_target_file))
           {
             //echo "The file ". basename( $_FILES["uploadfile"]["name"]). " has been uploaded.";
             $sql_update="update product_details SET Product_Name ='$update_productname', Product_Price = '$update_price', Product_Image = '$update_filename', Product_Category_Id = '$update_category_name' WHERE Product_Id = '$update_productid'";           
             
           } 
          else 
           {
             echo '<script type="text/javascript">document.getElementById("error_msg").innerHTML = "Sorry, there was an error uploading your file";</script>';        
           }
        }  
  else
    {
    	echo '<script type="text/javascript">document.getElementById("error_msg").innerHTML = "Please select only image file with .jpg or .png extension";</script>';
        
    }   




  if($conn->query($sql_update)=== TRUE)
   {
   	  $_SESSION['status']="Product Updated";
     echo "<script>window.location.href='list_product.php'</script>";  
   }
   else
   {
   	  $_SESSION['status']="Failed to Updated Product";
     echo "<script>window.location.href='list_product.php'</script>";
   }
 
}

 }
$conn->close();
?>
