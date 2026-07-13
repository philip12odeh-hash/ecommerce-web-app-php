<?php include 'includes/header.php' ?>
<?php include 'includes/dbcon.php' ?>

<div class="admHome_Container">
	<div class="page_title"> <h2>EDIT MARCHENDISE</h2></div>
	
	<div class="thin_separator">  </div>
	
	<div class="content_holder">
	
		<div class="content-left">
		
			<div class="logo_holder" style="background-image: url('../images/logo.jpg')"> </div>
			<span> welcome</span> <br>
			<span> <?php if(isset($_SESSION["userid"])){echo "Store: ".$_SESSION["userid"]; }?> </span>
			<a href="admin_home.php"><div> Admin Home</div></a>
			<a href="edit_slider.php"><div>Edit Slider</div></a>
			<a href="upload_marchendise.php"><div>Upload Marchendise</div></a>
			<a href="edit_marchendise.php"><div> Edit Marchendise</div></a>
			<a href="edit_profile.php"><div> Edit Profile</div></a>
			
			
		</div>
		
		<div class="content-right">
			<div class="slider_page_instructions">
			 <center><h3> INSTRUCTIONS</h3></center>
			<ol> 
				<li> make sure image to be uploaded has dimension of atleast 1200 by 600 for good quality</li>
				<li>make sure the file type is jpg else file will not upload</li>
				<li>the size of the image must be less than or equal 2mb</li>
				<li>if you did not intend to change the image dont add image file</li>
				<li> maximum number of characters for caption is 60 characters including space; please case your captions properly</li>
			</ol>
			</div>
		
			<!-- db querry to fetch slider data-->
				<?php $stmt = $conn->prepare("SELECT * FROM allmachendise");
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
					$result = $stmt->fetchAll();
					//test if query worked
					$i=1;
					
				foreach($result as $value){
				
				echo "<hr><br>";
				// echo "<b> Slide Number : $i"; echo "</b><br>";
				echo	$id = str_replace("'","",$value["ID"]);
				echo	$size = str_replace("'","",$value["SIZE"] );
				echo	$type = str_replace("'","",$value["TYPE"] );
				echo	$brand = str_replace("'","",$value["BRAND"] );
				echo	$material = str_replace("'","",$value["MATERIAL"] );
				echo	$image_link = str_replace("'","",$value["IMAGE_LINK"]);
				echo	$time_stamp = str_replace("'","",$value["TIME_STAMP"] );
				echo	$price = str_replace("'","",$value["PRICE"] );
				echo	$description = str_replace("'","",$value["DESCRIPTION"] );
				
				echo "<hr>";
				
					
				 echo ' <form action="edit_marchendise_processor.php" method="post" enctype="multipart/form-data">
						ID_NO: 
						<input type="text" name="ID'.$i.'" value="'.$i.'" max="4" readonly>
						SIZE:
						<input type="text" name="SIZE'.$i.'" value="'.$size.'" max="60">
						TYPE:
						<input type="text" name="TYPE'.$i.'" value="'.$type.'" >
						BRAND:
						<input type="text" name="BRAND'.$i.'" value="'.$brand.'"  >
						MATERIAL:
						<input type="text" name="MATERIAL'.$i.'" value="'.$material.'"  >
						
						ITEM_IMAGE:
						<img src="..\\'.$image_link.'" width="150px" height="70px">
						CHANGE IMAGE:
						<input type="file" name="Change_Image'.$i.'" >
						TIME UPLOADED
						<input type="date" name="TIME_STAMP'.$i.'" value="'.$time_stamp.'"  >
						PRICE:
						<input type="text" name="PRICE'.$i.'" value="'.$price.'"  >
						DESCRIPTION
						<input type="text" name="DESCRIPTION'.$i.'" value="'.$description.'"  >
						<input type="submit" name="submit" value="Edit_Item'.$i.'">
					
					';
					echo "<br>";
					$i++;  
				}
			
				
				?>
		
		
			
		
		</div>
	</div>

</div>


<?php include 'includes/footer.php' ?>