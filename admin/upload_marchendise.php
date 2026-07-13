<?php include 'includes/header.php' ?>
<?php include 'includes/dbcon.php' ?>

<div class="admHome_Container">
	<div class="page_title"> <h2>UPLOAD NEW CLOTH MARCHENDISE</h2></div>
	
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
				<li> make sure image to be uploaded has dimension of atleast 1500 by 1500 for good quality</li>
				<li>make sure the file type is jpg else file will not upload</li>
				<li>the size of the image must be less than or equal 2mb</li>
				
				<li> maximum number of characters for caption is 60 characters including space; please case your captions properly</li>
			</ol>
			</div>
			<?php
			

			$sql = "SELECT COUNT(*) FROM allmachendise";
			$result = $conn->query($sql);
			$number_of_rows = $result->fetchColumn();
			$index = $number_of_rows + 1;
			$number_of_forms_to_generate = $index + 20; // the loop will run 20times couse the index is subrated from the total
			echo '<form action="upload_marchendise_processor.php" method="post" enctype="multipart/form-data">';
			while($index <= $number_of_forms_to_generate){
				echo"<hr>";
				echo '
						<b> ITEM NO: '.$index.' </b><p>
						ID_NO: <p>
						<input type="text" name="ID'.$index.'" value="'.$index.'" max="4" readonly><p>
						SIZE:<p>
						<input type="text" name="SIZE'.$index.'" max="60"><p>
						TYPE:<p>
						<input type="text" name="TYPE'.$index.'"  ><p>
						BRAND:<p>
						<input type="text" name="BRAND'.$index.'"  ><p>
						MATERIAL:<p>
						<input type="text" name="MATERIAL'.$index.'"  ><p>
						IMAGE : 
						<input type="file" name="Change_Image'.$index.'" ><p>
						TIME UPLOADED<p>
						<input type="date" name="TIME_STAMP'.$index.'" ><p>
						PRICE:<p>
						<input type="text" name="PRICE'.$index.'"   ><p>
						DESCRIPTION<p>
						<input type="text" name="DESCRIPTION'.$index.'"  ><p>
						
					
					';
					echo "<br><br><br>";
					echo "<hr>";
				
				$index++;
				
				
			}
			echo '<input type="submit" name="submit" value="UPLOAD CLOTHES">';
			echo "<br> Number of rows is from table = " . $number_of_rows;
			
			
			?>
		
		</div>
	</div>

</div>


<?php include 'includes/footer.php' ?>