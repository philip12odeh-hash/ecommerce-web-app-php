<?php include 'includes/header.php' ?>
<?php include 'includes/dbcon.php' ?>

<div class="admHome_Container">
	<div class="page_title"> <h2>CHANGE IMAGE SLIDER IMAGES</h2></div>
	
	<div class="thin_separator">  </div>
	
	<div class="content_holder">
	
		<div class="content-left">
		
			<a href="admin_home.php"><div class="logo_holder" style="background-image: url('../images/logo.jpg')"> </div></a>
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
				<li> maximum number of characters for caption is 60 characters including space; please case your captions properly</li>
			</ol>
			</div>
			<!-- db querry to fetch slider data-->
				<?php $stmt = $conn->prepare("SELECT * FROM carousel_items");
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
					$result = $stmt->fetchAll();
					//test if query worked
					$i=1;
					
				foreach($result as $value){
				
				echo "<hr><br>";
				echo "<b> Slide Number : $i"; echo "</b><br>";
					$img_link = str_replace("'","",$value["image_link"] );
					$caption1 = str_replace("'","",$value["caption"] );
					$caption2 = str_replace("'","",$value["caption2"] );
					$img_link = "..\\".$img_link;
				
					
				 echo ' <form action="slider_Processor.php" method="post" enctype="multipart/form-data">
						Caption1
						<input type="text" name="caption'.$i.'" value="'.$caption1.'" max="60">
						caption 2
						<input type="text" name="caption2'.$i.'" value="'.$caption2.'" max="60">
						<img src="'.$img_link.' " width="150px" height="70px">
						<input type="number" name="id'.$i.'" value="'.$i.'" readonly >
						Change slide image
						<input type="file" name="Change_Image'.$i.'" >
						<input type="submit" name="submit'.$i.'" value="Edit_Slide">
					';
					echo "<br>";
					$i++;
				}
			
				
				?>
		</div>
	</div>

</div>

<?php include 'includes/footer.php' ?>