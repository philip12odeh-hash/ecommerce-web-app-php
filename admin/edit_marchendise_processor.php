<?php 
	include "includes/header.php";
	include 'includes/dbcon.php';
	

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
			  $fileNewName = "c".$post_Id. ".jpg";
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
	
	function upd_db($item_size,$item_type,$brand,$material,$image_link,$time_stamp,$price,$description,$post_Id,$conn){
	$stmt = $conn->prepare("UPDATE allmachendise SET SIZE = :SIZE, TYPE = :TYPE, BRAND = :BRAND, MATERIAL = :MATERIAL,IMAGE_LINK = :IMAGE_LINK,TIME_STAMP = :TIME_STAMP, PRICE = :PRICE, DESCRIPTION = :DESCRIPTION WHERE id = :id" );
    $stmt->bindParam(':SIZE', $item_size);
    $stmt->bindParam(':TYPE', $item_type);
	$stmt->bindParam(':BRAND', $brand);
    $stmt->bindParam(':MATERIAL', $material);
	$stmt->bindParam(':IMAGE_LINK', $image_link);
    $stmt->bindParam(':TIME_STAMP', $time_stamp);
	$stmt->bindParam(':PRICE', $price);
    $stmt->bindParam(':DESCRIPTION', $description);
	$stmt->bindparam(':id',$post_Id);
	
 $stmt->execute();
  echo " <br> <b>yes i the function upd_db inside here have executed and the db has been updated</b>";
	}
	function del_rec($item_size,$item_type,$brand,$material,$image_link,$time_stamp,$price,$description,$post_Id){
		
	};
	
	
	//echo"form connected to processor !!! and it was sent with submit button";
	// grab form data and row id 
	$i = 1;
	$db_items_length = 20; // this should come from db
	for($i; $i <= $db_items_length; $i++){			
		if (isset($_POST['submit'])) {
			if($_POST['submit'] === "Edit_Item".$i){
			echo"form connected to processor !!! and it was sent with submit button";
			echo "<br> ITEM ID : ".$post_Id = $_POST['ID'.$i];
			echo "<br> ITEM SIZE : ".$item_size = $_POST['SIZE'.$i];
			echo "<br> ITEM TYPE : ".$item_type = $_POST['TYPE'.$i];
			echo "<br> BRAND : ".$brand = $_POST['BRAND'.$i];
			echo "<br> MATERIAL  : ".$material = $_POST['MATERIAL'.$i];
			echo "<br> TIME_STAMP : ".$time_stamp = $_POST['TIME_STAMP'.$i];
			echo "<br> PRICE : ".$price = $_POST['PRICE'.$i];
			echo "<br> DESCRIPTION : ".$description = $_POST['DESCRIPTION'.$i];
			echo "<br>";
			// grab image variables
				echo "<br>IMAGE FILE_NAME : ".$fileName = $_FILES['Change_Image'.$i]['name'];
				echo "<br>IMAGE TEMP_FILE_NAME : ".$fileTmpName = $_FILES['Change_Image'.$i]['tmp_name'];
				echo "<br>IMAGE FILE_SIZE : ".$fileSize = $_FILES['Change_Image'.$i]['size'];
				echo "<br>IMAGE ERRORS : ".$fileError = $_FILES['Change_Image'.$i]['error'];
				echo "<br>IMAGE_LINK : ".$image_link = "images/c".$post_Id.".jpg";
				echo "<br> IS IMAGE VARIABLES GRABED?";
			
			
			echo "<br> we are going to perform an edit actions";
			//upload image
			img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);
				//update db
			upd_db($item_size,$item_type,$brand,$material,$image_link,$time_stamp,$price,$description,$post_Id,$conn);
			
			
			}
		  
}
	}
include 'includes/footer.php';