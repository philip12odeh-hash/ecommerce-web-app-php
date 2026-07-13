<?php
  
    include "includes/dbcon.php";
    
?>


<!--- check existence of store owner account--->
<?php
	$ownerExist = $conn->prepare("SELECT * FROM store_owner");
					$ownerExist->execute();

	if($ownerExist->rowCount() > 0 ){
		
		header("Location:login.php");
		
	}
	
	include "includes/header.php";


?>

<h1> Congratulations on your New Store</h1>
<h3> Register your store</h3>


<div class="form_container">
	<div id="form_caption">Register Your Store</div>
<form action= "includes/processor.php" method="post" >

First Name 
<br><input type ="text" placeholder= "Enter your first name" name="firstName" required>
Second Name 
<br><input type ="text" placeholder= "Enter your second name " name="secondName" required>
Email 
<br><input type ="email" placeholder= "Enter your Email" name="Email" required>
Phone Number
<br><input type ="tel" placeholder= "place phone no: in the format 080....." name="phoneNumber" minlength = "11" maxlength ="11" required>
Password 
<br><input type ="password" placeholder= "Enter a password" name="password" minlength="8" required >
Password again
<br><input type ="password" placeholder= "Enter the password again" name="passwordcheck" minlength="8" required>
Store_Name<br> 
<input type ="text" placeholder= "Enter a name you want to be identified with" name="userid" required>
<input type="submit" name ="action_source" value="Register">

</form>

</div>

























<?php
    include "includes/footer.php";
?>