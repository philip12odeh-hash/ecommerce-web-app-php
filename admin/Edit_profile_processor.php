<?php 
	include "includes/header.php";
	include 'includes/dbcon.php';

if(isset($_POST['submit'])){
	echo "your are welcome to start processing;";
		$id = "Owner";
			// grab image variables
			echo "<br> FIRST NAME : ".$firstname = $_POST['fname'];
			echo "<br> SECOND NAME : ".$secondname = $_POST['sname'];
			echo "<br> EMAIL : ".$email = $_POST['email'];
			echo "<br> PHONE NO: : ".$phone_no = $_POST['phone_no'];
			echo "<br> PASSWORD  : ".$password = $_POST['password'];
			echo "<br> PASSWORD  : ".$password = password_hash($password, PASSWORD_DEFAULT);
			
				echo "<br>IMAGE FILE_NAME : ".$fileName = $_FILES['logo']['name'];
				echo "<br>IMAGE TEMP_FILE_NAME : ".$fileTmpName = $_FILES['logo']['tmp_name'];
				echo "<br>IMAGE FILE_SIZE : ".$fileSize = $_FILES['logo']['size'];
				echo "<br>IMAGE ERRORS : ".$fileError = $_FILES['logo']['error'];
				//echo "<br>IMAGE_LINK : ".$image_link = "images/c".$post_Id.".jpg";
			
			// update db with details
			if(isset($firstname) && !empty($firstname) && isset($secondname) && !empty($secondname) && isset($email) && !empty($email) && isset($phone_no) && !empty($phone_no) && isset($password) && !empty($password) ){
				
				$stmt = $conn->prepare("UPDATE store_owner SET First_Name = :firstname, Second_Name = :secondname, Email = :email, Phone_Number = :phone_no, PASSWORD = :password  WHERE id = :id" );
				$stmt->bindParam(':firstname', $firstname);
				$stmt->bindParam(':secondname', $secondname);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':phone_no', $phone_no);
				$stmt->bindParam(':password', $password);
				$stmt->bindparam(':id',$id);
	
				$stmt->execute();
				echo " <br> yes i the function upd_db inside here have executed";
				
			}
			if(isset($fileName)&& !empty($fileName) && isset($fileTmpName) && !empty($fileTmpName)&& isset($fileSize) && !empty($fileSize) && isset($fileError) && empty($fileError)){
				
				echo "<br> yes we are ready to uplaod image <br> <hr>";
				
				
				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));

				  if ($fileActualExt == 'jpg' || $fileActualExt == 'jpeg' ) {
					if ($fileError === 0) {
					  if ($fileSize < 2000000) {
						list($width, $height) = getimagesize($fileTmpName);
						if ($width >= 200 && $height >= 200) {
						  // Create image resource
						  $image = imagecreatefromjpeg($fileTmpName);

						  // Trim image to 1200x600
						  $newImage = imagecreatetruecolor(200, 200);
						  imagecopyresampled($newImage, $image, 0, 0, 0, 0, 200, 200, $width, $height);

						  // Save image as JPG
						  $fileNewName = "logo.jpg";
						  $fileDestination = '..\images/' . $fileNewName;
						  imagejpeg($newImage, $fileDestination, 90);

						  echo "Image uploaded and trimmed successfully!";
						} else {
						  echo "Image dimensions must be at least 1200x600!";
						}
					  } else {
						echo "File is too big!";
					  }
					} else {
					  echo "Error uploading file!";
					}
				  } else {
					echo "Only JPG images are allowed!";
				  }

				
			}else{echo "problem uploading profile Image";}
			
}else {echo "Away from here you can through the wrong path";}























include 'includes/footer.php';