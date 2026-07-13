<?php include 'includes/header.php' ?>
<?php include 'includes/dbcon.php' ?>

<div class="admHome_Container">
	<div class="page_title"> <h2>ADMIN HOME PAGE</h2></div>
	
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
		
		<div class="content-right admin_home_content-right" >
			<a href="edit_slider.php"><span style="background-image: url('images/edit_slider.jpg')">Edit Slider</span></a>
			
			<a href="upload_marchendise.php"><span style="background-image: url('images/Upload_cloths.jpg')">Upload Marchendise</span></a><br>
			
			<a href="edit_marchendise.php"><span style="background-image: url('images/upload_cloths.jpg')"> Edit Marchendise</span></a>
			
			<a href="edit_profile.php"><span style="background-image: url('images/edit_profile.jpg')"> Edit Profile</span></a>
		
		</div>
	</div>

</div>


<?php include 'includes/footer.php' ?>