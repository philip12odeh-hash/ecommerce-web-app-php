
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
  echo " <br> yes i the function upd_db inside here have executed";
	}
	
	
	//echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	$i = 1;
	$db_items_length = 20;
	for($i; $i <= $db_items_length; $i++){			
if (isset($_POST['submit'.$i])) {
	echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	echo "<br>".$caption1 = $_POST['caption'.$i];
	echo "<br>".$caption2 = $_POST['caption2'.$i];
	echo "<br>".$post_Id = $_POST['id'.$i];
	echo "<br>".$fileName = $_FILES['Change_Image'.$i]['name'];
	echo "<br>".$fileTmpName = $_FILES['Change_Image'.$i]['tmp_name'];
	echo "<br>".$fileSize = $_FILES['Change_Image'.$i]['size'];
	echo "<br>".$fileError = $_FILES['Change_Image'.$i]['error'];
	 echo "<br> All variables Grabed";
	// grab image variables
	
	
	//upload image
	img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);
		//update db
	upd_db($caption1,$caption2,$post_Id,$conn);
  
}
	}