<?php 
	// include "includes/header.php";
	include "includes/dbcon.php";
	

	function img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError){
		
	  $fileExt = explode('.', $fileName);
	  $fileActualExt = strtolower(end($fileExt));

	  if ($fileActualExt == 'jpg' || $fileActualExt == 'jpeg') {
		if ($fileError === 0) {
		  if ($fileSize < 2000000) {
			list($width, $height) = getimagesize($fileTmpName);
			if ($width >= 1200 && $height >= 600) {
			  // Create image resource
			  $image = imagecreatefromjpeg($fileTmpName);

			  // Trim image to 1200x600
			  $newImage = imagecreatetruecolor(1200, 600);
			  imagecopyresampled($newImage, $image, 0, 0, 0, 0, 1200, 600, $width, $height);

			  // Save image as JPG
			  $fileNewName = "slider_img".$post_Id. ".jpg";
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

	}
	
	function upd_db($caption1,$caption2,$post_Id,$conn){
	$stmt = $conn->prepare("UPDATE carousel_items SET caption = :caption1, caption2 = :caption2 WHERE id = :id" );
    $stmt->bindParam(':caption1', $caption1);
    $stmt->bindParam(':caption2', $caption2);
	$stmt->bindparam(':id',$post_Id);
	
 $stmt->execute();
 	//echo " <script>alert(' yes i the function upd_db inside here have executed') </script>";
		//sleep(3);
  	 header("location:../index.php");
	}
	
	
	//echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	
				
if (isset($_POST['submit1'])) {
	echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	echo "<br>".$caption1 = $_POST['caption1'];
	echo "<br>".$caption2 = $_POST['caption21'];
	echo "<br>".$post_Id = $_POST['id1'];
	echo "<br>".$fileName = $_FILES['Change_Image1']['name'];
	echo "<br>".$fileTmpName = $_FILES['Change_Image1']['tmp_name'];
	echo "<br>".$fileSize = $_FILES['Change_Image1']['size'];
	echo "<br>".$fileError = $_FILES['Change_Image1']['error'];
	 echo "<br> All variables Grabed";
	// grab image variables
	
	
	//upload image
	img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);
		//update db
		upd_db($caption1,$caption2,$post_Id,$conn);
  
}if (isset($_POST['submit2'])) {
	echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	echo "<br>".$caption1 = $_POST['caption2'];
	echo "<br>".$caption2 = $_POST['caption22'];
	echo "<br>".$post_Id = $_POST['id2'];
	echo "<br>".$fileName = $_FILES['Change_Image2']['name'];
	echo "<br>".$fileTmpName = $_FILES['Change_Image2']['tmp_name'];
	echo "<br>".$fileSize = $_FILES['Change_Image2']['size'];
	echo "<br>".$fileError = $_FILES['Change_Image2']['error'];
	
	//image upload
	img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);
	//update db
	upd_db($caption1,$caption2,$post_Id,$conn);
  
}if (isset($_POST['submit3'])) {
	echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	echo "<br>".$caption1 =  $_POST['caption3'];
	echo "<br>".$caption2 = $_POST['caption23'];
	echo "<br>".$post_Id = $_POST['id3'];
	echo "<br>".$fileName = $_FILES['Change_Image3']['name'];
	echo "<br>".$fileTmpName = $_FILES['Change_Image3']['tmp_name'];
	echo "<br>".$fileSize = $_FILES['Change_Image3']['size'];
	echo "<br>".$fileError = $_FILES['Change_Image3']['error'];
	
	
	//image upload
	img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);
	// put data in db
	upd_db($caption1,$caption2,$post_Id,$conn);
	
  
}if (isset($_POST['submit4'])) {
	echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	echo "<br>".$caption1 = $_POST['caption4'];
	echo "<br>".$caption2 = $_POST['caption24'];
	echo "<br>".$post_Id = $_POST['id4'];
	echo "<br>".$fileName = $_FILES['Change_Image4']['name'];
	echo "<br>".$fileTmpName = $_FILES['Change_Image4']['tmp_name'];
	echo "<br>".$fileSize = $_FILES['Change_Image4']['size'];
	echo "<br>".$fileError = $_FILES['Change_Image4']['error'];

	//image upload
	img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);
	//update db
	upd_db($caption1,$caption2,$post_Id,$conn);
  
}
echo"<br><br><br><br><br>";  
include "includes/footer.php";