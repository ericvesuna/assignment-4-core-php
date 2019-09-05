<?php
session_start();
require 'db_connection.php';

if(isset($_GET['page_no']) && $_GET['page_no']!="") 
  {
    $page_no = $_GET['page_no'];
  } 
else 
  {
    $page_no = 1;
  }

$per_page = 3;

 $sql1 ="select * from product_details";
 $result1 = $conn->query($sql1);
 $count =mysqli_num_rows($result1);
 

 $offset = ($page_no -1) * $per_page; 

 $total_pages=ceil($count/$per_page);







if(isset($_POST['multiple_delete']))
 {
    
  $checkbox=$_POST['checkbox'];
  $checkbox_count = count($checkbox);
 
 if($checkbox_count <= 0)
  {
  	$_SESSION['status'] = "No Record Seleted";
  }    
 else
  {


  for ($i=0; $i<$checkbox_count;$i++) 
   {
   	 $del_id = $checkbox[$i];
   	   if(is_numeric($del_id))
   	    {
   	       $sql2 = "delete from product_details WHERE Product_Id='$del_id'";

           if($conn->query($sql2) === TRUE)
         	{
         		 $_SESSION['status'] = "selected Record Deleted";
			  
        	  //echo "<script>alert('Slected Record deleted');window.location.href='list_product.php'</script>";  
         	}
       	   else
         	{
              echo "<script>alert('Failed to Delete selected Record');window.location.href='list_product.php'</script>";

         	} 
        }
    }
  }      
 }
 



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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

    $(document).ready(function () {
        $("#checkbox_All").click(function () {
         
         $(".checkbox").prop('checked', $(this).prop('checked'));
             
             

        });
    });
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
  		<h4>List Product</h4>
  	</div>
  </div>




















  <!-- Content Section Start-->

<form id="frm_list_product" action="" method="post" enctype="multipart/form-data">

<div class="section content_section">
	<div class="container">
		<div class="filable_form_container">
			<div class="mange_buttons">
			<?php 
               if(!$_SESSION['status'] == "")
			    {
			     echo "<p align='center' style='color:red;font-size:18px;font-family:Arial;'>".$_SESSION['status'];"</p>";

			    }
			    session_destroy();	
			?>
				<ul>
					<!--<li class="search_div">
				 <div class="Search">
				 	<input name="search" type="text" /> 
				 	<input type="submit" class="submit" value="submit">
				 </div>
					</li>-->
					<li><a href="add_product.php">Create Product</a></li>
					<li><button type="submit" name="multiple_delete" style="background-color:#a5cf3c;height:53px;width:125px;border-radius: 6px;text-align: center;color: white;border:none;margin-right: 35%;font-size: 14px;">Delete </button></li>
				</ul>
			</div>
			<div class="table_container_block">
				<table width="100%" >
					<thead>
						<tr>
						<th width="10%" style="text-align:center;padding:10px;">
							<input type="checkbox" class="checkbox" name="checkbox[]" id="checkbox_All"> <label class="css-label mandatory_checkbox_fildes" for="checkbox_All"></label>
						</th>
						<th style="text-align:center;padding:10px;">Product Name <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
						<th style="text-align:center;padding:10px;">Product Image</th>
						<th style="text-align:center;padding:10px;">Product Price</th>
						<th style="text-align:center;padding:10px;">Product Category <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
						<th style="text-align:center;padding:10px;">Action</th>
						</tr>
					</thead>
					<tbody>

                 
                 <?php
		     		 $sql="SELECT p.*, c.category_name FROM product_details AS p INNER JOIN category AS c ON p.Product_Category_Id=c.category_id LIMIT $offset,$per_page";

                    $result = $conn->query($sql);
                                 if($result->num_rows > 0)
                                  {
                                  while($row=$result->fetch_assoc())
                                   {
                                   	 if(!$row['Product_Image']=="")
                                   	  {
                                   	    $image = "uploads/".$row['Product_Image'];
                                   	  }
                                   	 else
                                   	  {
         								$image ="images/noimage.jpg";
                                   	  } 

                                     $id= $row['Product_Id'];
                                     $pname =$row['Product_Name'];
                            ?>
                           

						<tr >
							<td style="text-align:center;padding:10px;">
								<input type="checkbox" class="checkbox" name="checkbox[]" id="<?php echo $id; ?>" value="<?php echo $id; ?>" > <label class="css-label mandatory_checkbox_fildes" for="<?php echo $id; ?>"></label>
							</td>
							<td style="text-align:center;padding:10px;"><input type="hidden" id='hidden_Id' name='hidden_Name' value=<?php echo $row['Product_Name']; ?> ><?php echo $row['Product_Name']; ?></td>
							<td style="text-align:center;padding:10px;"><img src= <?php echo $image; ?> style="width:80px; height:auto;"/></td>
							<td style="text-align:center;padding:10px;"><?php echo $row['Product_Price']; ?></td>
							<td style="text-align:center;padding:10px;"><?php echo $row['category_name']; ?></td>
							<td>
								<div class="buttons" style="text-align:center;padding:10px;">
								  <a href="delete_file.php?id=<?php echo $id; ?>" onclick="return confirm(' you want to delete?\n <?php echo $pname; ?>');";  style="background-color:#fc5858;padding:7px;margin:5px;" >
								    		    <span class="glyphicon glyphicon-trash" style="color:white;"></span>
                                   </a>
								  
								   <a href="edit_product.php?id=<?php echo $id; ?>" style="background-color:#7c943b;padding:7px;" >
								    <span class="glyphicon glyphicon-pencil" style="color:white;"></span>
                                   </a>
								  
								</div>								
							</td>
						</tr>

                       <?php						
                                  }
                                 }
                                  else
                                   {
                                   	echo "No Category Available";
                                   }
                               $conn->close();
                               ?>
						
					</tbody>
				</table>
			</div>
			
			<div class="pagination" style="float:left;">
				<ul>
                   <li><a href="list_product.php?page_no=1">first</a></li>
				<?php
				  for($i=1;$i<=$total_pages;$i++)
				   {
				   	?>
				   	 <li><a href="list_product.php?page_no=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			 <?php } ?>

     				 <li><a href="list_product.php?page_no=<?php echo $total_pages; ?>">Last</a></li>
				</ul>
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

</body>
</html>
