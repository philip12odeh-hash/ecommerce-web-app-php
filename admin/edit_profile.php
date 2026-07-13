<?php include 'includes/header.php' ?>
<?php include 'includes/dbcon.php' ?>

<div class="admHome_Container">
	<div class="page_title"> <h2>CHANGE YOUR PROFILE AND LOGIN DETAILS</h2></div>
	
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
			<div id="edit_profile_logo" style="background-image:url('../images/logo.jpg')">
				
			</div>
			<form action="Edit_profile_processor.php" method="POST" enctype="multipart/form-data">
			<b>Change logo Image:</b><br>
			<input type="file" name="logo" required><br>
			<b>First Name: </b><br>
			<input type="text" name = "fname" required><br>
			<b>Second Name: </b><br>
			<input type="text" name = "sname" required><br>
			<b>Email:</b> <br>
			<input type="email" name = "email" required><br>
			<b>Phone_no </b><br>
			<input type="tel" name = "phone_no"  minlength = "11" maxlength ="11" required><br>
			<b>Password</b> <br>
			<input type="password" name = "password"  minlength="8" required><br>
			<b>Save Changes</b><br>
			<input type="submit" name="submit" value="Change_Profile"><br>
			
		
		</div>
	</div>

</div>


<?php include 'includes/footer.php' ?>